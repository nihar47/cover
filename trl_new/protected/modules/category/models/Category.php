<?php

/**
 * This is the model class for table "{{_category}}".
 *
 * The followings are the available columns in table '{{_category}}':
 * @property integer $category_id
 * @property integer $parent_id
 * @property string $name
 * @property string $description
 * @property integer $sort_order
 * @property integer $status
 * @property string $date_added
 * @property string $date_modified
 */
class Category extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{category}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name,  status', 'required'),
			array('parent_id, sort_order','numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('date_added, date_modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('category_id, parent_id, name, description, sort_order, status, date_added, date_modified', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'category_id' => 'Category',
			'parent_id' => 'Parent',
			'name' => 'Name',
			'description' => 'Description',
			'sort_order' => 'Sort Order',
			'status' => 'Status',
			'date_added' => 'Date Added',
			'date_modified' => 'Date Modified',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('status',$this->status);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	
	// For get all categories parents  like tree
	
	public function get_recursive_parents($category_id) {
		$stack = array();
			 $current_parent=Category::model()->findByPk($category_id);
			 $parent = $current_parent->parent_id;
			 while($parent!=0){
			 	$current_parent=Category::model()->findByPk($parent);
				$parent = $current_parent->parent_id;
			 	$stack[] = $current_parent->name;
				$this->get_recursive_parents($parent->category_id,0);
			 }
		$stack = array_reverse($stack);
		return $stack;
	}		
	
	
	// For get all categories parents
	public  function get_all_parents()
	{	
		
		
		 $Category_list = category::model()->findAll();
		 $parent_Category = array();
		 $parent_Category[0] = "-- Main Category --";
		 foreach($Category_list as $Category_value){
			if($Category_value->parent_id > 0){
					 $catnames = $this->get_recursive_parents($Category_value->category_id);
					 array_push($catnames,$Category_value->name);
					 $parent_Category[$Category_value->category_id] =  implode(" >> ",$catnames);
				}else{
				$parent_Category[$Category_value->category_id] = $Category_value->name;
				}
		}
		return $parent_Category;
	}
	
	
	// For get all categories
	
	public  function get_cat()
	{	
		
		
		 $Category_list = category::model()->findAll();
		 $parent_Category = array();
		 foreach($Category_list as $Category_value){
			if($Category_value->parent_id > 0){
					 $catnames = $this->get_recursive_parents($Category_value->category_id);
					 array_push($catnames,$Category_value->name);
					 $parent_Category[$Category_value->category_id] =  implode(" >> ",$catnames);
				}else{
				$parent_Category[$Category_value->category_id] = $Category_value->name;
				}
		}
		return $parent_Category;
	}
	

		//for user Friendly google  Category   
		public static function getUrlFriendlyString($str)
		{
		   // convert spaces to '-', remove characters that are not alphanumeric
		   // or a '-', combine multiple dashes (i.e., '---') into one dash '-'.
		   $str = ereg_replace("[-]+", "-", ereg_replace("[^a-z0-9-]", "",
			  strtolower( str_replace(" ", "-", $str) ) ) );
			$str = str_replace('-','_',$str);  
		   return $str;
		}
	
	
}
