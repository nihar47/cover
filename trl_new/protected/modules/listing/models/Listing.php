<?php

/**
 * This is the model class for table "{{listing}}".
 *
 * The followings are the available columns in table '{{listing}}':
 * @property integer $listing_id
 * @property string $listing_type
 * @property integer $amount
 * @property string $listing_detail
 * @property string $listing_video
 */
class Listing extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{listing}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('listing_type, amount, listing_detail, listing_video', 'required'),
			array('amount', 'numerical', 'integerOnly'=>true),
			array('listing_type, listing_video', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('listing_id, listing_type, amount, listing_detail, listing_video', 'safe', 'on'=>'search'),
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
			'listing_id' => 'Listing',
			'listing_type' => 'Listing Type',
			'amount' => 'Amount',
			'listing_detail' => 'Listing Detail',
			'listing_video' => 'Listing Video',
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

		$criteria->compare('listing_id',$this->listing_id);
		$criteria->compare('listing_type',$this->listing_type,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('listing_detail',$this->listing_detail,true);
		$criteria->compare('listing_video',$this->listing_video,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Listing the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
