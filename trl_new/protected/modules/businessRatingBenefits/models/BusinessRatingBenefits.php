<?php

/**
 * This is the model class for table "{{business_rating_benefits}}".
 *
 * The followings are the available columns in table '{{business_rating_benefits}}':
 * @property integer $business_rating_benefits_id
 * @property string $image
 * @property string $business_rating_benefits
 */
class BusinessRatingBenefits extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{business_rating_benefits}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('image, business_rating_benefits', 'required'),
			
					array('image', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'), // this will allow empty field when page is update (remember here i create scenario update)
			array('image', 'length', 'max'=>1000, 'on'=>'insert,update'),
		
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('business_rating_benefits_id, image, business_rating_benefits', 'safe', 'on'=>'search'),
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
			'business_rating_benefits_id' => 'Rating Benefits Id',
			'image' => 'Image',
			'business_rating_benefits' => 'Rating Benefits',
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

		$criteria->compare('business_rating_benefits_id',$this->business_rating_benefits_id);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('business_rating_benefits',$this->business_rating_benefits,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BusinessRatingBenefits the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
