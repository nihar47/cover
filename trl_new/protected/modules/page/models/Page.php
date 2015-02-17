<?php

/**
 * This is the model class for table "{{_pages}}".
 *
 * The followings are the available columns in table '{{_pages}}':
 * @property integer $PageID
 * @property string $Page_Name
 * @property string $Meta_Title
 * @property string $Meta_Keywords
 * @property string $Meta_Description
 * @property string $Page_Description
 */
class Page extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{pages}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Page_Name, Meta_Title, Meta_Keywords, Meta_Description, Page_Description', 'required'),
			array('Page_Name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('PageID, Page_Name, Meta_Title, Meta_Keywords, Meta_Description, Page_Description', 'safe', 'on'=>'search'),
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
			'PageID' => 'Page',
			'Page_Name' => 'Page Name',
			'Meta_Title' => 'Meta Title',
			'Meta_Keywords' => 'Meta Keywords',
			'Meta_Description' => 'Meta Description',
			'Page_Description' => 'Page Description',
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

		$criteria->compare('PageID',$this->PageID);
		$criteria->compare('Page_Name',$this->Page_Name,true);
		$criteria->compare('Meta_Title',$this->Meta_Title,true);
		$criteria->compare('Meta_Keywords',$this->Meta_Keywords,true);
		$criteria->compare('Meta_Description',$this->Meta_Description,true);
		$criteria->compare('Page_Description',$this->Page_Description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Page the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	//for user Friendly Page alias 
	
 	public static function getUrlFriendlyString($str)
		{
		   // convert spaces to '-', remove characters that are not alphanumeric
		   // or a '-', combine multiple dashes (i.e., '---') into one dash '-'.
		   $str = ereg_replace("[-]+", "-", ereg_replace("[^a-z0-9-]", "",
			  strtolower( str_replace(" ", "-", $str) ) ) );
		   return $str;
		}
	
}
