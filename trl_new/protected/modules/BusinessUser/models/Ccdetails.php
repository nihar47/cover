<?php

/**
 * This is the model class for table "{{ccdetails}}".
 *
 * The followings are the available columns in table '{{ccdetails}}':
 * @property integer $id
 * @property integer $business_id
 * @property string $name_on_card
 * @property string $business_address
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $card_number
 * @property string $expiration_mnt
 * @property string $expiration_year
 * @property string $ccv
 * @property string $modified_dt
 * @property string $created_dt
 *
 * The followings are the available model relations:
 * @property Business $business
 */
class Ccdetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{ccdetails}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('business_id, name_on_card, business_address, city, state, zip, card_number, expiration_mnt, expiration_year, ccv, modified_dt, created_dt', 'required'),
			array('business_id ,zip,card_number, expiration_mnt, expiration_year', 'numerical', 'integerOnly'=>true),
			array('name_on_card, business_address, city, state', 'length', 'max'=>255),
			array('zip, card_number', 'length', 'max'=>100),
			
			
			array('expiration_mnt', 'in','range'=>range(1,12)),
			array('expiration_year', 'in','range'=>range(2013,2050)),
			
			array('expiration_mnt, expiration_year, ccv', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, business_id, name_on_card, business_address, city, state, zip, card_number, expiration_mnt, expiration_year, ccv, modified_dt, created_dt', 'safe', 'on'=>'search'),
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
			'business' => array(self::BELONGS_TO, 'Business', 'business_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'business_id' => 'Business',
			'name_on_card' => 'Name On Card',
			'business_address' => 'Address',
			'city' => 'City',
			'state' => 'State',
			'zip' => 'Zip',
			'card_number' => 'Card Number',
			'expiration_mnt' => 'Month',
			'expiration_year' => 'Year',
			'ccv' => 'Ccv',
			'modified_dt' => 'Modified Dt',
			'created_dt' => 'Created Dt',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('business_id',$this->business_id);
		$criteria->compare('name_on_card',$this->name_on_card,true);
		$criteria->compare('business_address',$this->business_address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('card_number',$this->card_number,true);
		$criteria->compare('expiration_mnt',$this->expiration_mnt,true);
		$criteria->compare('expiration_year',$this->expiration_year,true);
		$criteria->compare('ccv',$this->ccv,true);
		$criteria->compare('modified_dt',$this->modified_dt,true);
		$criteria->compare('created_dt',$this->created_dt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ccdetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
