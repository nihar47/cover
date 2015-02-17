<?php

	/**
	 *  require for  Mailgun API 
	 */


require Yii::app()->basePath.'/vendor/mailgun/MailgunApi.php';



class DefaultController extends Controller
{	
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	
	public $layout='//layouts/business-user';
	
	/**
	 * @var string the current page URL'.
	 */
		
	public $curpage=null;
	
	/**
	 * @var business_id the which business are loged in
	 */
	
	public $business_id = 0;
	
	/**
	 * @var business_Info the which business are loged in get all business information like logo , business  name etc.
	 */
	
	public $business_Info = null;
	
	/**
	 * @var requests the which business are loged in get all business rating requests count.
	 */
	
	public $requests = null;
	
	/**
	 * @var requests the which business are loged in get all business rating count.
	 */
	
	public $business_Info_ratings = null;
	
	/**
	 * @var authintication code.
	 */
	
	public $code = null;
			
	/**
	 * @var mailgun Domain.
	 */
	
	public $mailgunDomain = null;
	
	/**
	 * @var mailgun API Key.
	 */
	
	public $mailgunApiKey = null;
		
	/**
	 * Specifies the init.
	 * This method is used by the basic config for this section for business info.
	 */
	
	public function init()
	{	
		
		/**
		* Checking for Business Authentication
		*/
	
			if(isset($_REQUEST['code']) && $_REQUEST['code'] !='' ){
				
					$code = $_REQUEST['code'];			
					$code_array = explode('-',$code);
					$business_id = $code_array[0];
					$authcode = $code_array[1];
						$customer_details = $this->load_business_Model($business_id);	
						$isValid =null;
				if($customer_details->authcode == $authcode &&  $customer_details->status == 'active'){
					$isValid = 1 ;
				}else{
					$isValid = 0 ;
				}
				
			
				if(! $isValid)  {
				throw new CHttpException(404,'The requested page does not exist.');
				}
			
			}else{
				
				throw new CHttpException(404,'The requested page does not exist.');
			}
			
			if(isset($code_array) && is_array($code_array)) {
				$this->business_id = $business_id;
				$this->code = $code;
			}
	
		/**
		 *initallization of business_Info
		*/
	 	$this->business_Info = $this->load_business_Model($this->business_id);
		/**
		 *initallization of business_Info_ratings
		*/
		$this->business_Info_ratings = 	$this->load_business_rating_overall($this->business_id);
	
		/**
		 *initallization of requests
		*/
		$this->requests = $this->get_request_count($this->business_id);	
		
		/**
		 * initallization mailgun Domain.
		 */
		
		$this->mailgunDomain = $this->load_mailgunDomain(10);
		
		/**
		 * initallization mailgun API Key.
		 */
		
		$this->mailgunApiKey =  $this->load_mailgunApiKey(8);
	
	
		
	}
	
	
	/**
	 * view business rating and comments for current business.
	 * If view is successful, the browser will be show business rating and comments which comment status is true.
	 */
	public function actionRating()
	{	
	
		/**
		 *getting current page URL for navigation
		*/
	
		$this->curpage = $this->getcurpage();
		
		/**
		 *getting rating currnt business raing
		*/
		
		$ratings = $this->load_business_rating($this->business_id);
		
		/**
		 *getting all grant access cusomers comment which comment status is true.
		*/
		
		$sql="SELECT user_id , date_posted ,  full_name , email_address , overall , comments ,notes FROM `trl_customer` WHERE `business_id` = $this->business_id
AND `allow_access` = '1'
AND `date_posted` != '0000-00-00'
AND `comment_status` = '1' ORDER BY `trl_customer`.`user_id` DESC ";

		$comments=Customer::model()->findAllBySql($sql);
	
		$this->render('rating' ,array(
				'ratings'=>$ratings,
				'comments' =>$comments,
			));
	}
	
	/**
	 * view business manage rating for current business.
	 * If view is successful, the browser will be show business Manage rating and comments .
	 */
	
	
	public function actionManageratings()
	{		
		
		/**
		 *getting current page URL for navigation
		*/
		
		$this->curpage = $this->getcurpage();	
		
		$sql="SELECT user_id , date_posted , ediable_date , full_name , email_address , qulity , value , timeliness , experience , satisfaction , overall , comments , comment_status ,notes FROM `trl_customer` WHERE `business_id` =$this->business_id AND `allow_access` = '1' AND `date_posted` != '0000-00-00' ORDER BY `trl_customer`.`user_id` DESC ";
		$customers=Customer::model()->findAllBySql($sql);
		$this->render('manageratings' ,array(
			'customers'=>$customers,
		));
	}
	
	
	/**
	 * view business rating request for current business.
	 * If view is successful, the browser will be show business Manage request.
	 */
	
	
	public function actionManagerequests()
	{	
	
		/**
		 *getting current page URL for navigation
		*/
		
		$this->curpage = $this->getcurpage();	
		
		
		/**
		*  Requesting user for rating
		*/
		
		$msg = null;
		if(isset($_POST['user']) && $_POST['user']=='yes' )
			{   
				$model=new Customer;
				$date = date("Y-m-d");// current date
				$date = strtotime(date("Y-m-d", strtotime($date)) . " +1 month"); // After 1 Month date
				$model->ediable_date =date("Y-m-d",$date)  ;
				$valid = $this->validuser($_POST['useremail'], $model->ediable_date);
				if($valid){
				
							$model->business_id=$this->business_id;	
							$model->full_name=$_POST['username'];
							$model->email_address=$_POST['useremail'];
							$model->authcode = $this->random_string(32);
							
							if($model->save()){
							$msg = "<div class='alert alert-success'>Well done! You have been successfully sent rating request.</div>" ;	
							}
			}else{
				$msg = "<div class='alert alert-danger'>sorry! You have sent rating request to this email address.</div>" ;
			}
	}
		
		/**
		* Get all current business rating request
		*/
		
		
		 $sql="SELECT user_id,date_requested ,full_name , email_address , allow_access , access_granted , last_send_reminder ,overall ,date_posted FROM `trl_customer` 		WHERE `business_id`=$this->business_id ORDER BY `trl_customer`.`date_requested` DESC";
		$customers=Customer::model()->findAllBySql($sql);
		
		
		$not_view_query = "SELECT user_id FROM `trl_customer` WHERE `business_id`=$this->business_id AND `business_view`=0 ORDER BY `trl_customer`.`date_requested` DESC";
		$not_view_customers=Customer::model()->findAllBySql($not_view_query);
		
			foreach($not_view_customers as $viewed_customers){
				$model=$this->loadModel($viewed_customers->user_id);
				$model->business_view=1 ;
				$model->save();
				
					
			}
		
		$this->render('managerequests' ,array(
			'customers'=>$customers,
			'not_view_customers' =>$not_view_customers ,
			'msg' => $msg ,
		));
	}

		/**
		* Get all current business address
		*/
	 
	
	public function get_all_address($id){
		$criteria = new CDbCriteria;
		$criteria->select = 'address_id, address'; // select fields which you want in output
		$criteria->condition = 'business_id = '.$id;
		$data = businessAddress::model()->findAll($criteria);
		return $data;
	}
	
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelrequest()
	{	
		
		$this->loadModel($_POST['id'])->delete();
		if($_POST['id']===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return true;
	
	}
	
	
	
	/**
	 * Check for valid user a particular model.
	 * If validation is successful, the browser will be redirected manage request
	 */
	
	
	public function validuser($useremail ,$date )
	{
		
		$sql = "SELECT * FROM `trl_customer` WHERE `email_address` = '".$useremail."' AND `ediable_date` <= '".$date."'";
		$valid_customer =Customer::model()->findAllBySql($sql);
		if(count($valid_customer) === 0){
						return true;
		}else{	
				return false;
		}		
	}
	
	/**
	 * Show  a particular Comments.
	 * If Show is successful, then comment will be show on rating page
	 */
	
	
	public function actionShow()
	{	
		if(isset($_POST['id']) && $_POST['id'] !=null){
			$model=$this->loadModel($_POST['id']);
			$model->comment_status = 1;
			$model->save();
		}
		
		if($_POST['id']===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return true;
		
	}
	
	/**
	 * Hide  a particular Comments.
	 * If Hide is successful, then comment will be Hide on rating page
	 */
	
	
	public function actionHide()
	{	
		if(isset($_POST['id']) && $_POST['id'] !=null){
			$model=$this->loadModel($_POST['id']);
			$model->comment_status = 0;
			$model->save();
		}
		
		if($_POST['id']===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return true;
	}
	
	
	/**
	 * Editrating will be send edit rating mail for user
	 */
	
	
	
	public function actionEditrating()
	{	
			
			if(isset($_POST['id']) && $_POST['id'] !=null){
			$model=$this->loadModel($_POST['id']);
			$model->save();
		
		
		/* Sendreminder Mail   */	
			$emailmodel = $this->load_emailFormat(5);
			
			
		$business_name =  $this->business_Info->business_name;
		$business_owner_name =  $this->business_Info->owner_name;
		$link =Yii::app()->getBaseUrl(true).'/customer/ratebusiness?code='.$model->user_id.'-'.$model->authcode;
		
		
		/* Dynamic Email Formatting */
		
		$emailmodel->email_format = str_replace("{customer_name}","$model->full_name",$emailmodel->email_format);
		$emailmodel->email_format = str_replace("{business_name}","$business_name",$emailmodel->email_format);
		$emailmodel->email_format = str_replace("{customer_email}","$model->email_address",$emailmodel->email_format);
		$emailmodel->email_format = str_replace("{business_owner_name}","$business_owner_name",$emailmodel->email_format);
		$emailmodel->email_format = str_replace("{link}","$link",$emailmodel->email_format);
		
		
		/* Dynamic Email Formatting */	
			
			
			
			
			$mailgun = new MailgunApi($this->mailgunDomain->meta_value, $this->mailgunApiKey->meta_value);			
			$message = $mailgun->newMessage();
			$message->setFrom($this->business_Info->email, $this->business_Info->owner_name);
			$message->addTo($model->email_address,urldecode($model->full_name) );
			$message->setSubject($emailmodel->email_format_name);
			$message->setHtml($emailmodel->email_format);
			$message->send();
		/* Sendreminder Mail   */		
				
			
			
			
			
		}
		if($_POST['id']===null)
			throw new CHttpException(404,'The requested page does not exist.');
		echo true;
	}
	
	
	
	
	
	
		/**
	 * Sndreminder will be send reminder mail for user
	 */
	
	
	
	public function actionSendreminder()
	{	
			$reminder =null;
			if(isset($_POST['id']) && $_POST['id'] !=null){
			$model=$this->loadModel($_POST['id']);
			$model->allow_access = 1;
			$model->last_send_reminder =  date("Y-m-d");// current date
			$reminder ='<em>Last send '. Yii::app()->dateFormatter->format("M-d-y",strtotime($model->last_send_reminder)).'</em>';
		 	$model->save();
		
		
		/* Sendreminder Mail   */	
			$emailmodel = $this->load_emailFormat(4);
			
			
		$business_name =  $this->business_Info->business_name;
		$business_owner_name =  $this->business_Info->owner_name;
		$link =Yii::app()->getBaseUrl(true).'/customer/ratebusiness?code='.$model->user_id.'-'.$model->authcode;
		
		/* Dynamic Email Formatting */
		
		$emailmodel->email_format = str_replace("{customer_name}","$model->full_name",$emailmodel->email_format);
		$emailmodel->email_format = str_replace("{business_name}","$business_name",$emailmodel->email_format);
		$emailmodel->email_format = str_replace("{customer_email}","$model->email_address",$emailmodel->email_format);
		$emailmodel->email_format = str_replace("{business_owner_name}","$business_owner_name",$emailmodel->email_format);
		$emailmodel->email_format = str_replace("{link}","$link",$emailmodel->email_format);
		
		/* Dynamic Email Formatting */		
		
		
		
		
		
		
			
			$mailgun = new MailgunApi($this->mailgunDomain->meta_value, $this->mailgunApiKey->meta_value);			
			$message = $mailgun->newMessage();
			$message->setFrom($this->business_Info->email, $this->business_Info->owner_name);
			$message->addTo($model->email_address,urldecode($model->full_name) );
			$message->setSubject($emailmodel->email_format_name);
			$message->setHtml($emailmodel->email_format);
			$message->send();
		/* Sendreminder Mail   */		
				
			
			
			
			
		}
		if($_POST['id']===null)
			throw new CHttpException(404,'The requested page does not exist.');
		echo $reminder;
	}
	
	
	/**
	 * Access will be granting access to user for rating particular business
	 */
	
	public function actionAccess()
	{	
		$access =null;
		if(isset($_POST['id']) && $_POST['id'] !=null){
			$model=$this->loadModel($_POST['id']);
			$model->allow_access = 1;
			$model->access_granted =  date("Y-m-d");// current date
		    $access ='<span>Access Granted On</span>
<p>'. Yii::app()->dateFormatter->format("M-d-y",strtotime($model->access_granted)).' Pending rating </p>
';
			$model->save();
		
		
		/* Access Granted Mail   */	
			$emailmodel = $this->load_emailFormat(3);
			
			
		$business_name =  $this->business_Info->business_name;
		$business_owner_name =  $this->business_Info->owner_name;
		$link =Yii::app()->getBaseUrl(true).'/customer/ratebusiness?code='.$model->user_id.'-'.$model->authcode;
		
	
		/* Dynamic Email Formatting */
		
		$emailmodel->email_format = str_replace("{customer_name}","$model->full_name",$emailmodel->email_format);
		$emailmodel->email_format = str_replace("{business_name}","$business_name",$emailmodel->email_format);
		$emailmodel->email_format = str_replace("{customer_email}","$model->email_address",$emailmodel->email_format);
		$emailmodel->email_format = str_replace("{business_owner_name}","$business_owner_name",$emailmodel->email_format);
		$emailmodel->email_format = str_replace("{link}","$link",$emailmodel->email_format);
		
		/* Dynamic Email Formatting */	
			
			
			
			
			
			
			$mailgun = new MailgunApi($this->mailgunDomain->meta_value, $this->mailgunApiKey->meta_value);			
			$message = $mailgun->newMessage();
			$message->setFrom($this->business_Info->email, $this->business_Info->owner_name);
			$message->addTo($model->email_address,urldecode($model->full_name) );
			$message->setSubject($emailmodel->email_format_name);
			$message->setHtml($emailmodel->email_format);
			$message->send();
		/* Access Granted Mail   */		
				
		
			
			
		}
		if($_POST['id']===null)
			throw new CHttpException(404,'The requested page does not exist.');
		echo $access;
	}
	
	
	
	
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */ 
	
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'accountinfo','profilesettings','managerequests','manageratings' and 'rating' actions
				'actions'=>array('accountinfo','profilesettings','managerequests','manageratings' ,'rating','show','hide','delrequest '),
				'users'=>array('business_admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	/**
	* For  get current page url
	*/ 
	public function getcurpage()
	{	
		$curpage =null;
		$curpage .=Yii::app()->createAbsoluteUrl("BusinessUser"); 
		$curpage .= '/'.Yii::app()->getController()->getAction()->controller->id;
		$curpage .= '/'.Yii::app()->getController()->getAction()->controller->action->id;
		return $curpage;
	}
	
	/**
	* For get days in  date diffrence...
	*/ 
	
	public function dateDiff($start, $end) {
						 $start_ts = strtotime($start);
 						 $end_ts = strtotime($end);
 						 $diff = $end_ts - $start_ts;
  						return round($diff / 86400);
	}
						
						
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Customer the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Customer::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}					
	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Business the loaded model
	 * @throws CHttpException
	 */
	
	
	public function load_business_Model($id)
	{
		$model=Business::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	
	/**
	* get request count for rating 
	*/
	
	
	
		public function get_request_count($id)
	{
		$not_view_query = "SELECT user_id FROM `trl_customer` WHERE `business_id`=$id AND `business_view`=0 ORDER BY `trl_customer`.`date_requested` DESC";
		$model=Customer::model()->findAllBySql($not_view_query);
		
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return count($model);
		
	}
	
	
		/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Customer Rating the loaded model
	 * @throws CHttpException
	 */
	
	
	public function load_business_rating($id)
	{
	
	$sql="SELECT count(`user_id`) as `business_id` ,
IFNULL(AVG(`qulity` ),0) as qulity ,
IFNULL(AVG(`value` ),0) as value , 
IFNULL(AVG(`timeliness` ),0) as timeliness , 
IFNULL(AVG(`experience` ),0) as experience , 
IFNULL(AVG(`satisfaction` ),0)as satisfaction, 
IFNULL(AVG(`overall` ),0) as overall 
FROM `trl_customer` 
WHERE `business_id` =$id
AND `allow_access` = '1' 
AND `date_posted` != '0000-00-00' 
";
$model=Customer::model()->findAllBySql($sql);
	


	if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	
	}
	
	
		/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Business Rating the loaded model
	 * @throws CHttpException
	 */
	
	public function load_business_rating_overall($id)
	{
		$sql="SELECT count(`user_id`) as `business` , AVG(`qulity`) as qulity , AVG(`value`) as value , AVG(`timeliness`) as timeliness , AVG(`experience`) as experience ,AVG(`satisfaction`) as satisfaction, AVG(`overall`) as overall FROM `trl_customer` 
WHERE `business_id` =$id
AND `allow_access` = '1'
AND `date_posted` != '0000-00-00'";
$model=Customer::model()->findAllBySql($sql);
	
	
	if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
			
	foreach($model as $rating)		
		return $rating->overall;
	
	
	}
	
	
	
	
	
	 public function actionAccountinfo()
	{	
		$this->curpage = $this->getcurpage();	
		
		 $model=$this->loadBuinessModel($this->business_id);
		 
		 $model_Ccdetails=$this->loadCcdetails($this->business_id);
		 
		
			
			  if(isset($_POST['Business']) &&  isset($_POST['Ccdetails']))
        		{
						 $model->attributes=$_POST['Business'];
					 
						 $model_Ccdetails->attributes=$_POST['Ccdetails'];
						 
						 if($model->validate())
							{
								// form inputs are valid, do something here
								
								
								 if($model_Ccdetails->validate())
									{
								// form inputs are valid, do something here
										$model_Ccdetails->modified_dt  =  date("Y-m-d  H:i:s");// current date
										$model->save() ;
										$model_Ccdetails->save();
										$this->redirect(array("accountinfo&code=".$this->code));
									}	
							}
						
				}
				
		  $this->render('accountinfo',array(
            'model'=>$model,
			'model_Ccdetails'=> $model_Ccdetails,
			
        ));
		
		
	}
	
	
	/**
	 * view business Profile settings in current business.
	 * If view is successful, the browser will be show business Profile settings.
	 */
	 
	
	public function actionProfilesettings()
    {
		$this->curpage = $this->getcurpage();	
		
        $model=$this->loadBuinessModel($this->business_id);

        if(isset($_POST['Business']))
        {
						
		    $model->attributes=$_POST['Business'];
 
            $uploadedFile=CUploadedFile::getInstance($model,'logo');
 			if($model->save())
            {
                if(!empty($uploadedFile))  // check if uploaded file is set or not
                {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/business_logo/'.$model->logo);
                }
				
				
				// for BusinessAddress
				
					if(isset($_POST['BusinessAddress'])){	
					
					// delete all old records 
					BusinessAddress::model()->deleteAll(array("condition"=>"business_id='$this->business_id'"));
					$BusinessAddress =new BusinessAddress;
		
						//insert all update records
						foreach($_POST['BusinessAddress']['address'] as $address ){
								if(!empty($address) && $address !=''){
										$BusinessAddress->setIsNewRecord(true);
										$BusinessAddress->address_id = null;
										$BusinessAddress->business_id = $model->business_id;
										$BusinessAddress->address = $address;
										$BusinessAddress->save();
								}
						
					
						}	
					}
					
					// for BusinessLocation
					
					if(isset($_POST['BusinessLocation'])){
					
						// delete all old records 
					BusinessLocation::model()->deleteAll(array("condition"=>"business_id='$this->business_id'"));
				
					$BusinessLocation=new BusinessLocation;
						
						//insert all update records with unique location
						
						$unique_location_ids= array_unique($_POST['BusinessLocation']['location_id']);
						foreach($unique_location_ids as $location_id ){
								if(!empty($address) && $address !=''){
										$BusinessLocation->setIsNewRecord(true);
										$BusinessLocation->business_location_id = null;
										$BusinessLocation->business_id = $model->business_id;
										$BusinessLocation->location_id = $location_id;
										$BusinessLocation->save();
								}
						
					
						}	
					}
					
					// for BusinessCategory
					
						if(isset($_POST['BusinessCategory'])){
						
						// delete all old records 
						BusinessCategory::model()->deleteAll(array("condition"=>"business_id='$this->business_id'"));
						$BusinessCategory=new BusinessCategory;
		
						
						//insert all update records with unique Category
						$unique_category_ids= array_unique($_POST['BusinessCategory']['category_id']);
						
						foreach($unique_category_ids as $category_id ){
								if(!empty($address) && $address !=''){
										$BusinessCategory->setIsNewRecord(true);
										$BusinessCategory->business_category_id = null;
										$BusinessCategory->business_id = $model->business_id;
										$BusinessCategory->category_id = $category_id;
										$BusinessCategory->save();
								}
						
					
						}	
					}
				
                $this->redirect(array("profilesettings&code=".$this->code));
            }
 
       	}
		
 
        $this->render('profilesettings',array(
            'model'=>$model,
			
        ));
   }
						
		/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Business the loaded model
	 * @throws CHttpException
	 */					
						
						
	public function loadBuinessModel($id)
	{
		$model=Business::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
		/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ccdetails the loaded model
	 * @throws CHttpException
	 */
	public function loadCcdetails($id)
	{
		$model=Ccdetails::model()->findByAttributes(array('business_id'=>$id));
		
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	
		/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Setting the loaded model
	 * @throws CHttpException
	 */
	
	public function load_mailgunDomain($id)
	{
		$model=Setting::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	
			/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Setting the loaded model
	 * @throws CHttpException
	 */
	
	public function load_mailgunApiKey($id)
	{
		$model=Setting::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	
			/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return EmailFormat the loaded model
	 * @throws CHttpException
	 */
	public function load_emailFormat($id)
	{
		$model=EmailFormat::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	
	/**
	*  Random string for authentication
	*/
	 public function random_string($length) {
   
   $token = "";
   $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
   $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
   $codeAlphabet.= "0123456789";
   for($i=0;$i<$length;$i++){
    $token .= $codeAlphabet[$this->crypto_rand_secure(0,strlen($codeAlphabet))];
   }
   return $token;
     
  }
  
  public function crypto_rand_secure($min, $max) {
   $range = $max - $min;
   if ($range < 0) return $min; // not so random...
   $log = log($range, 2);
   $bytes = (int) ($log / 8) + 1; // length in bytes
   $bits = (int) $log + 1; // length in bits
   $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
   do {
    $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
    $rnd = $rnd & $filter; // discard irrelevant bits
   } while ($rnd >= $range);
   return $min + $rnd;
  }
	
	
		
}