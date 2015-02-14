<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $Avatar
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $role_id
 * @property string $last_logined
 * @property string $salt
 * @property string $ip_address
 * @property string $gender
 * @property string $date_of_birth
 * @property string $view_jobs
 * @property string $home_phone
 * @property string $mobile_phone
 * @property string $street
 * @property string $city
 * @property string $state_province
 * @property integer $country_id
 * @property string $zip_code
 * @property string $interested_in
 * @property string $created_at
 * @property string $updated_at
 */
class User extends CActiveRecord
{

	public $fullName;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, username, password,home_phone, mobile_phone, street, city, state_province, country_id, zip_code, country_id, interested_in', 'required'),
			array('role_id, country_id', 'numerical', 'integerOnly'=>true),
			array('Avatar, first_name, last_name, username, password, email, home_phone, mobile_phone, street, city, state_province, zip_code', 'length', 'max'=>255),
			array('salt, ip_address', 'length', 'max'=>32),
			array('gender', 'length', 'max'=>7),
			array('view_jobs', 'length', 'max'=>1),
			array('interested_in', 'length', 'max'=>17),
			array('last_logined, date_of_birth, created_at, updated_at', 'safe'),
			array('status', 'length', 'max'=>1),			
			array('Avatar', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'), // this 
			
			array('username','unique', 'className' => 'User'),
			array('email','unique', 'className' => 'User'),
			array('email', 'email'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id,fullName, Avatar, first_name, last_name, username, status, password, email, role_id, last_logined, salt, ip_address, gender, date_of_birth, view_jobs, home_phone, mobile_phone, street, city, state_province, country_id, zip_code, interested_in, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'Avatar' => 'Avatar',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'role_id' => 'Role',
			'last_logined' => 'Last Logined',
			'salt' => 'Salt',
			'ip_address' => 'Ip Address',
			'gender' => 'Gender',
			'date_of_birth' => 'Date Of Birth',
			'view_jobs' => 'Can view all jobs?',
			'home_phone' => 'Home Phone',
			'mobile_phone' => 'Mobile Phone',
			'street' => 'Street',
			'city' => 'City',
			'state_province' => 'State/Province',
			'country_id' => 'Country',
			'zip_code' => 'Zip Code',
			'interested_in' => 'What are you interested in?',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'status' => 'Status',
			
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
		$criteria->compare('Avatar',$this->Avatar,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('last_logined',$this->last_logined,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('ip_address',$this->ip_address,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('view_jobs',$this->view_jobs,true);
		$criteria->compare('home_phone',$this->home_phone,true);
		$criteria->compare('mobile_phone',$this->mobile_phone,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state_province',$this->state_province,true);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('zip_code',$this->zip_code,true);
		$criteria->compare('interested_in',$this->interested_in,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('status',$this->status,true);
		$criteria->addSearchCondition('concat(first_name, " ", last_name)', $this->fullName); 
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		
		// CgridView Records/page section			
		'pagination'=>array(
			'pageSize'=> Yii::app()->user->getState('pageSize',
			Yii::app()->params['defaultPageSize']),
		),	
		
		'sort'=>array(
            'defaultOrder'=>'id DESC',
        ),
		
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getFullName()
	{
			return $this->first_name . ' ' . $this->last_name;
	}
	
}
