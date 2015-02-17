<?php

/**
 * This is the model class for table "{{customer}}".
 *
 * The followings are the available columns in table '{{customer}}':
 * @property integer $user_id
 * @property integer $business_id
 * @property integer $business_view
 * @property string $date_requested
 * @property string $full_name
 * @property string $email_address
 * @property string $allow_access
 * @property string $access_granted
 * @property string $last_send_reminder
 * @property string $date_posted
 * @property string $ediable_date
 * @property integer $qulity
 * @property integer $value
 * @property integer $timeliness
 * @property integer $experience
 * @property integer $satisfaction
 * @property integer $overall
 * @property integer $comments
 * @property string $comment_status
 * @property string $notes
 */
class Customer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{customer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('business_id, full_name, email_address', 'required'),
			
		//	array('business_id, qulity, value, timeliness, experience, satisfaction, overall', 'numerical', 'integerOnly'=>true),
			
			
		//	array('qulity, value, timeliness, experience, satisfaction, overall ', 'length', 'min'=>0, 'max'=>1),
			
		//	array('qulity, value, timeliness, experience, satisfaction, overall ', 'in','range'=>range(0,5)),
		
			array('business_id, business_view', 'numerical', 'integerOnly'=>true),
			
			array('qulity, value, timeliness, experience, satisfaction, overall', 'length', 'max'=>3),
			
			
			array('full_name, email_address', 'length', 'max'=>255),
			array('email_address', 'email'),
			array('allow_access, comment_status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, business_id, date_requested, full_name, email_address, allow_access, access_granted, last_send_reminder, date_posted, ediable_date, qulity, value, timeliness, experience, satisfaction, overall, comments, comment_status, notes', 'safe', 'on'=>'search'),
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
			'business' => array(self::BELONGS_TO, 'business', 'business_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'authcode' => 'authcode',
			'business_id' => 'Business',
			'business_view' => 'Business View',
			'date_requested' => 'Date Requested',
			'full_name' => 'Full Name',
			'email_address' => 'Email Address',
			'allow_access' => 'Allow Access',
			'access_granted' => 'Access Granted On',
			'last_send_reminder' => 'Last Send Reminder',
			'date_posted' => 'Date Posted',
			'ediable_date' => 'Ediable Date',
			'qulity' => 'Qulity',
			'value' => 'Value',
			'timeliness' => 'Timeliness',
			'experience' => 'Experience',
			'satisfaction' => 'Satisfaction',
			'overall' => 'Overall',
			'comments' => 'Experience Comments',
			'comment_status' => 'Comment Status',
			'notes' => 'Notes',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('authcode',$this->authcode,true);
		$criteria->compare('business_id',$this->business_id);
		$criteria->compare('business_view',$this->business_view,true);
		$criteria->compare('date_requested',$this->date_requested,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('email_address',$this->email_address,true);
		$criteria->compare('allow_access',$this->allow_access,true);
		$criteria->compare('access_granted',$this->access_granted,true);
		$criteria->compare('last_send_reminder',$this->last_send_reminder,true);
		$criteria->compare('date_posted',$this->date_posted,true);
		$criteria->compare('ediable_date',$this->ediable_date,true);
		$criteria->compare('qulity',$this->qulity);
		$criteria->compare('value',$this->value);
		$criteria->compare('timeliness',$this->timeliness);
		$criteria->compare('experience',$this->experience);
		$criteria->compare('satisfaction',$this->satisfaction);
		$criteria->compare('overall',$this->overall);
		$criteria->compare('comments',$this->comments);
		$criteria->compare('comment_status',$this->comment_status,true);
		$criteria->compare('notes',$this->notes,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Customer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
