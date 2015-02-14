<?php

/**
 * This is the model class for table "{{job_staff}}".
 *
 * The followings are the available columns in table '{{job_staff}}':
 * @property integer $id
 * @property integer $job_id
 * @property integer $user_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $mobile
 * @property string $pick_up_van
 * @property string $get_to_job_site
 * @property string $return_to_office
 *
 * The followings are the available model relations:
 * @property QuoteJobs $job
 */
class JobStaff extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{job_staff}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('job_id, user_id, name,job_date', 'required'),
			array('job_id, user_id', 'numerical', 'integerOnly'=>true),
			array('name, email, phone, mobile, pick_up_van, get_to_job_site, return_to_office', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, job_id, job_date, user_id, name, email, phone, mobile, pick_up_van, get_to_job_site, return_to_office', 'safe', 'on'=>'search'),
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
			'job' => array(self::BELONGS_TO, 'QuoteJobs', 'job_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'job_id' => 'Job',
			'user_id' => 'User',
			'name' => 'Name',
			'email' => 'Email',
			'phone' => 'Phone',
			'mobile' => 'Mobile',
			'pick_up_van' => 'Pick Up Van',
			'get_to_job_site' => 'Get To Job Site',
			'return_to_office' => 'Return To Office',
			'job_date' => 'Job Date',
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
		$criteria->compare('job_id',$this->job_id);
		$criteria->compare('user_id',$this->user_id);
	 	$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('pick_up_van',$this->pick_up_van,true);
		$criteria->compare('get_to_job_site',$this->get_to_job_site,true);
		$criteria->compare('return_to_office',$this->return_to_office,true);
		$criteria->compare('job_date',$this->job_date,true);
	
		
		$criteria->group = 'job_date';
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			
		'sort'=>array(
            'defaultOrder'=>'job_date ASC',
        ),
		
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return JobStaff the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	
	
			public function getStaffMembersOndate($job_id,$job_date)
	{
			
			
			$Criteria = new CDbCriteria();
			$Criteria->condition = "job_id = $job_id && job_date='$job_date'";
			$staff_model = JobStaff::model()->findAll($Criteria); // find related buildings by quote id
		
			$all_staffs_on_date = array();
		
			foreach($staff_model as $staff_member) {
					$all_staffs_on_date[] = $staff_member->name;	
			}
		
			
			return implode(', ',$all_staffs_on_date); //.' - ('.count($all_staffs_on_date).')';
	}
	
}
