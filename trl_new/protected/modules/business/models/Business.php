<?php

/**
 * This is the model class for table "{{business}}".
 *
 * The followings are the available columns in table '{{business}}':
 * @property integer $business_id
 * @property string $owner_name
 * @property string $business_name
 * @property string $logo
 * @property string $email
 * @property string $password
 * @property string $salt
 * @property string $phone
 * @property string $website
 * @property string $last_logined_date
 * @property string $last_logined_ip
 * @property string $status
 * @property string $date_added
 */
class Business extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{business}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('owner_name, business_name, email, phone, status, website ', 'required'),
			
		//	array('owner_name, business_name, logo, email, password,  phone, website, last_logined_date, last_logined_ip, status, date_added', 'required'),
		
		array('logo', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'), // this will allow empty field when page is update (remember here i create scenario update)
		array('logo', 'length', 'max'=>255, 'on'=>'insert,update'),
		array('email', 'email'),
		array('website', 'match', 'pattern'=>'%\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))%s', 'message'=>'website is not a valid website address.'),
		
		
			array('owner_name, business_name, logo, email, password, website, last_logined_ip', 'length', 'max'=>255),
			array('salt', 'length', 'max'=>32),
			array('phone', 'length', 'max'=>100),
			array('status', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('business_id, owner_name, business_name, logo, email, password, salt, phone, website, last_logined_date, last_logined_ip, status, date_added', 'safe', 'on'=>'search'),
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
			'business_id' => 'Business',
			'authcode' => 'authcode',
			'owner_name' => 'Owner Name',
			'business_name' => 'Business Name',
			'logo' => 'Logo',
			'email' => 'E-mail',
			'password' => 'Password',
			'salt' => 'Salt',
			'phone' => 'Phone',
			'website' => 'Website',
			'last_logined_date' => 'Last Logined Date',
			'last_logined_ip' => 'Last Logined Ip',
			'status' => 'Status',
			'date_added' => 'Registration Date',
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

		$criteria->compare('business_id',$this->business_id);
		$criteria->compare('authcode',$this->authcode,true);
		$criteria->compare('owner_name',$this->owner_name,true);
		$criteria->compare('business_name',$this->business_name,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('last_logined_date',$this->last_logined_date,true);
		$criteria->compare('last_logined_ip',$this->last_logined_ip,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('date_added',$this->date_added,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Business the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
		// hash password
	public function hashPassword($password, $salt)
	{
		return md5($salt.$password);
	}
			
	// password validation
	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->salt)===$this->password;
	}
			
	//generate salt
	public function generateSalt()
	{
		return uniqid('',true);
	}
			
	public function beforeValidate()
	{
		$this->salt = $this->generateSalt();
		return parent::beforeValidate();
	}
			
	public function beforeSave()
	{
		$this->password = $this->hashPassword($this->password, $this->salt);
		return parent::beforeSave();
	}
	
	public static function getUrlFriendlyString($str)
		{
		   // convert spaces to '-', remove characters that are not alphanumeric
		   // or a '-', combine multiple dashes (i.e., '---') into one dash '-'.
		   $str = ereg_replace("[-]+", "-", ereg_replace("[^a-z0-9-]", "",
			  strtolower( str_replace(" ", "-", $str) ) ) );
		   return $str;
		}
	
	
}
