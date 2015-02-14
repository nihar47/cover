<?php

/**
 * This is the model class for table "{{quote_jobs}}".
 *
 * The followings are the available columns in table '{{quote_jobs}}':
 * @property integer $id
 * @property integer $quote_id
 * @property integer $building_id
 * @property string $discount
 * @property string $final_total
 * @property string $si_staff_contractor
 * @property string $si_client
 * @property string $swms_ids
 * @property string $tool_types_ids
 * @property string $approval_status
 * @property string $booked_status
 * @property string $job_status
 * @property string $paid
 * @property string $signed_off
 * @property string $created_at
 * @property string $job_started_date
 * @property string $job_end_date
 */
class QuoteJobs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{quote_jobs}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('quote_id, building_id, created_at', 'required'),
			array('quote_id, building_id,staff_required,frequency_type', 'numerical', 'integerOnly'=>true),
			array('discount, paid', 'length', 'max'=>10),
			array('final_total, booked_status,staff_required', 'length', 'max'=>10),
			array('swms_ids, tool_types_ids,purchase_order', 'length', 'max'=>255),
			array('job_note', 'length', 'max'=>4000),
			array('approval_status', 'length', 'max'=>22),
			array('job_status', 'length', 'max'=>11),
			array('signed_off', 'length', 'max'=>3),
			array('original_record', 'length', 'max'=>3),
			array('si_staff_contractor, si_client, job_started_date, job_end_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, purchase_order, quote_id,original_record, frequency_type,staff_required,job_note, building_id, discount, final_total, si_staff_contractor, si_client, swms_ids, tool_types_ids, approval_status, booked_status, job_status, paid, signed_off, created_at, job_started_date, job_end_date', 'safe', 'on'=>'search'),
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
			'quote_id' => 'Quote',
			'building_id' => 'Building',
			'discount' => 'Discount',
			'final_total' => 'Final Total',
			'si_staff_contractor' => 'Si Staff Contractor',
			'si_client' => 'Si Client',
			'swms_ids' => 'Swms Ids',
			'tool_types_ids' => 'Tool Types Ids',
			'job_note' => 'Job Note',
			'approval_status' => 'Approval Status',
			'booked_status' => 'Booked Status',
			'job_status' => 'Job Status',
			'paid' => 'Paid',
			'signed_off' => 'Signed Off',
			'created_at' => 'Created At',
			'job_started_date' => 'Job Started Date',
			'job_end_date' => 'Job End Date',
			'staff_required' => 'Staff Required',
			'frequency_type' => 'Frequency Type',
			'original_record' => 'Original Record',
			'purchase_order' => 'Purchase order',
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
		$criteria->compare('quote_id',$this->quote_id);
		$criteria->compare('building_id',$this->building_id);
		$criteria->compare('discount',$this->discount,true);
		$criteria->compare('final_total',$this->final_total,true);
		$criteria->compare('si_staff_contractor',$this->si_staff_contractor,true);
		$criteria->compare('si_client',$this->si_client,true);
		$criteria->compare('swms_ids',$this->swms_ids,true);
		$criteria->compare('tool_types_ids',$this->tool_types_ids,true);
		$criteria->compare('job_note',$this->job_note,true);
		$criteria->compare('approval_status',$this->approval_status,true);
		$criteria->compare('booked_status',$this->booked_status,true);
		$criteria->compare('job_status',$this->job_status,true);
		$criteria->compare('paid',$this->paid,true);
		$criteria->compare('signed_off',$this->signed_off,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('job_started_date',$this->job_started_date,true);
		$criteria->compare('job_end_date',$this->job_end_date,true);
		$criteria->compare('staff_required',$this->staff_required);
		$criteria->compare('frequency_type',$this->frequency_type);
		$criteria->compare('original_record',$this->original_record);
		$criteria->compare('purchase_order',$this->purchase_order,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QuoteBuilding the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
