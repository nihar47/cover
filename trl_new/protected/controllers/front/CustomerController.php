<?php

require Yii::app()->basePath.'/vendor/mailgun/MailgunApi.php';
class CustomerController extends Controller
{
	public $layout='//layouts/customer-user';
	
	
	/**
	 * @var string the current page URL'.
	 */
	
	
	public $curpage=null;
	
	/**
	 * @var authcode the which business are loged in
	 */
	
	public $authcode = null;
		
	/**
	 * @var customer_id the which business are loged in
	 */
	
	public $customer_id = 0;
	
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
	 * Specifies the init.
	 * This method is used by the basic config for this section for business info.
	 */
	
	public function init()
	{	
	
		$this->business_id = isset($_REQUEST['business_id']) ? mysql_real_escape_string($_REQUEST['business_id']) : 0;
		
		if($this->business_id == 0 ) {
			if(isset($_REQUEST['code'])) {
			$code = $_REQUEST['code'];
				$code_array = explode('-',$code);
				$this->customer_id = $code_array[0];
				if(isset($code_array[1])) { $this->authcode = $code_array[1]; }
				$customer_details = $this->loadCustomer($this->customer_id);				
				if(isset($this->authcode) && isset($customer_details->allow_access) && $customer_details->allow_access == '1' && isset($customer_details->authcode) && $customer_details->authcode == $this->authcode )
					$this->business_id = $customer_details->business_id;
				else
				 throw new CHttpException(404,'The requested page does not exist.');
			}
		}
		
		if($this->business_id == 0) {
				 throw new CHttpException(404,'The requested page does not exist.');
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
		
		/*
		* Set Session for current business user
		*/
		
			
		$session=new CHttpSession;
		$session->open();
		$session['business_id'] = $this->business_id; 
		$session['authcode'] = $this->authcode; 

		
	}
	
	  public function loadCustomer($id)
	 {
	  $model=Customer::model()->findByPk($id);
	  if($model===null)
	   throw new CHttpException(404,'The requested page does not exist.');
	  return $model;
	 }
	 
	public function load_business_Model($id)
	{
		$model=Business::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
		
	public function load_business_rating_overall($id)
	{
		$sql="SELECT count(`user_id`) as `business` , AVG(`qulity`) as qulity ,AVG(`value`) as value , AVG(`timeliness`) as timeliness , AVG(`experience`) as experience ,AVG(`satisfaction`) as satisfaction, AVG(`overall`) as overall FROM `trl_customer` 
WHERE `business_id` =$id
AND `allow_access` = '1'
AND `date_posted` != '0000-00-00'";
$model=Customer::model()->findAllBySql($sql);
	
	
	if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
			
	foreach($model as $rating)		
		return $rating->overall;
	
	
	}
	public function get_request_count($id)
	{
		$not_view_query = "SELECT user_id FROM `trl_customer` WHERE `business_id`=$id AND `business_view`=0 ORDER BY `trl_customer`.`date_requested` DESC";
		$model=Customer::model()->findAllBySql($not_view_query);
		
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return count($model);
		
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
	
		
	// For  get current page url
	public function getcurpage()
	{	
		///$curpage .= Yii::app()->getBaseUrl(true).'/backend.php?r=BusinessUser/';
		$curpage =null;
		//$curpage .=Yii::app()->createAbsoluteUrl("customer"); 
		
		$curpage .= '/'.Yii::app()->getController()->getAction()->controller->id;
		
		$curpage .= '/'.Yii::app()->getController()->getAction()->controller->action->id;
		return $curpage;
	}
	
	
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
	
							
	# Customer verification	
		public function	actionVerify() { 
		
		/**
		 *getting current page URL for navigation
		*/
	
			$this->curpage = $this->getcurpage();
			$model = new Customer;
			if(isset($_POST['Customer']))
			{
				$model->attributes=$_POST['Customer'];
				$model->business_id = $this->business_id;
				$model->authcode = $this->random_string(32);
				$business_id = $model->business_id;
				$full_name = $_POST['Customer']['full_name'];
				$email_address = $_POST['Customer']['email_address'];
				$date = date("Y-m-d");
				$date = strtotime(date("Y-m-d", strtotime($date)) . " +1 month");
				$model->ediable_date =date("Y-m-d",$date)  ;
			
				$connection = Yii::app()->db; 		
				
				$sql = "SELECT * from trl_customer where business_id=".$this->business_id." and email_address='".$email_address."' and ediable_date < $date";		
				$sResult = $connection->createCommand($sql)->queryAll();
				
				if(count($sResult) == 0) { 		
					if($model->save()) {
					
			
		
			/* Business details */
			$business_sql = "SELECT * from trl_business where business_id=".$this->business_id;
			$sBusinessResult = $connection->createCommand($business_sql)->queryRow();		
			
			$business_owner_name = isset($sBusinessResult['owner_name']) ? $sBusinessResult['owner_name'] : '';
			$business_name = isset($sBusinessResult['business_name']) ? urlencode($sBusinessResult['business_name']) : '';
			$businss_email = isset($sBusinessResult['email']) ? $sBusinessResult['email'] : '';
			
			
			/* email format details */
			$email_format_sql = "SELECT * from trl_email_format where email_format_ID=6";
			$sEmailFormatResult = $connection->createCommand($email_format_sql)->queryRow();
			if(isset($sEmailFormatResult['email_format'])) { $message_content = $sEmailFormatResult['email_format']; }
			
			
			/* Dynamic Email Formatting */
			
			$link =Yii::app()->getBaseUrl(true).'/admin?r=BusinessUser/default/managerequests&code='.$sBusinessResult["business_id"].'-'.$sBusinessResult["authcode"];
			
			
			$message_content = str_replace("{customer_name}","$full_name",$message_content);
			$message_content = str_replace("{business_name}","$business_name",$message_content);
			$message_content = str_replace("{customer_email}","$email_address",$message_content);
			$message_content = str_replace("{business_owner_name}","$business_owner_name",$message_content);
			$message_content = str_replace("{link}","$link",$message_content);
			
			
			/* Dynamic Email Formatting */	
			
			
			
			/* setting details*/
			$domainObj = Setting::model()->findByAttributes(array('setting_id'=>10));
			if(is_object($domainObj)) { $domain = $domainObj->meta_value; }

			$mailgun_api_keyObj = Setting::model()->findByAttributes(array('setting_id'=>8));
			if(is_object($mailgun_api_keyObj)) { $mailgun_api_key = $mailgun_api_keyObj->meta_value; }

			if(isset($domain) && isset($mailgun_api_key))			 {
			/*
			* Email to Business Admin
			*/
			$mailgun = new MailgunApi($domain, $mailgun_api_key);			
			$message = $mailgun->newMessage();
			$message->setFrom($email_address, $full_name);
			$message->addTo($businss_email,urldecode($business_name) );
			$message->setSubject($sEmailFormatResult['email_format_name']);
			$message->setHtml($message_content);
			$message->send();
			}
			
					
					$this->redirect(array('thankyou','business_id'=>$this->business_id,'business_name'=>$business_name,'msg'=>'success'));
					}
				} else {
				$model->addError('email', 'your email address is already exist, try another email address.');
				}			
			}
		 $this->render('customer-verification',array('model'=>$model));
		}	
		
# Customer verification	Thank you
		
		public function	actionThankyou($business_name = NULL) {
		$model['business_name'] = urldecode($business_name);
		$this->render('verify-thankyou',array('model'=>$model));
		}

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
	
	
		
		public function actionRateBusiness() {
		$this->curpage = $this->getcurpage();
		
		$model = $this->loadModel($this->customer_id);
		$business_details = $this->loadBusiness($model->business_id);		
		
		$todays_date = date("Y-m-d");
		$last_editable_date = $model->ediable_date;
	
		if(strtotime($todays_date) > strtotime($last_editable_date) && $model->allow_access == 1) {
		$this->redirect(array('invalidcustomer','business_id'=>$model->business_id,'business_name'=>$business_details->business_name,'msg'=>'fail'));
		}
		if(isset($_POST['Customer']))
		{
			$model->attributes=$_POST['Customer'];
			
			$date = date("Y-m-d");// current date
		
			$model->overall= ($_POST['Customer']['qulity']+$_POST['Customer']['value']+$_POST['Customer']['timeliness']+$_POST['Customer']['experience']+$_POST['Customer']['satisfaction'])/5;
				
			$last_posted_date = $model->date_posted;
			$model->date_posted = $date;				
			
			$model->comments = $_POST['Customer']['comments'];			
				
					
			if($model->save()) {
			
			$connection = Yii::app()->db; 
						/* Business details */
			$business_sql = "SELECT * from trl_business where business_id=".$this->business_id;
			$sBusinessResult = $connection->createCommand($business_sql)->queryRow();		
			
			$business_owner_name = isset($sBusinessResult['owner_name']) ? $sBusinessResult['owner_name'] : '';
			$business_name = isset($sBusinessResult['business_name']) ? urlencode($sBusinessResult['business_name']) : '';
			$businss_email = isset($sBusinessResult['email']) ? $sBusinessResult['email'] : '';
			
			
			/* email format details */
			$email_format_sql = "SELECT * from trl_email_format where email_format_ID=8";
			$sEmailFormatResult = $connection->createCommand($email_format_sql)->queryRow();
			if(isset($sEmailFormatResult['email_format'])) { $message_content = $sEmailFormatResult['email_format']; }
			
			
			/* Dynamic Email Formatting */
			
			$link =Yii::app()->getBaseUrl(true).'/admin?r=BusinessUser/default/manageratings&code='.$business_details->business_id.'-'.$business_details->authcode;
			
			$customer_full_name = urldecode($model->full_name);
			$business_owner_name = urldecode($business_details->business_name);
			$business_email_address = $business_details->email;
			$customer_email_address = $model->email_address;
			
			
			$message_content = str_replace("{customer_name}","$customer_full_name",$message_content);
			$message_content = str_replace("{business_name}","$business_name",$message_content);
			$message_content = str_replace("{customer_email}","$customer_email_address",$message_content);
			$message_content = str_replace("{business_owner_name}","$business_owner_name",$message_content);
			$message_content = str_replace("{link}","$link",$message_content);
			
			
			/* Dynamic Email Formatting */	
			
			
				/* setting details*/
			$domainObj = Setting::model()->findByAttributes(array('setting_id'=>10));
			if(is_object($domainObj)) { $domain = $domainObj->meta_value; }

			$mailgun_api_keyObj = Setting::model()->findByAttributes(array('setting_id'=>8));
			if(is_object($mailgun_api_keyObj)) { $mailgun_api_key = $mailgun_api_keyObj->meta_value; }

			if(isset($domain) && isset($mailgun_api_key))			 {
			
			$mailgun = new MailgunApi($domain, $mailgun_api_key);
			
			/*
			* Email to Business Admin
			*/
				
			$message = $mailgun->newMessage();
			$message->setFrom($customer_email_address,$customer_full_name);
			$message->addTo($business_email_address, $business_name);
			$message->setSubject($sEmailFormatResult['email_format_name']);
			$message->setHtml($message_content);
			$message->send();
			
			$message_content = '';
			/* email format details */
			$email_format_sql = "SELECT * from trl_email_format where email_format_ID=5";
			$sEmailFormatResult = $connection->createCommand($email_format_sql)->queryRow();
			if(isset($sEmailFormatResult['email_format'])) { $message_content = $sEmailFormatResult['email_format']; }
			
			$link =Yii::app()->getBaseUrl(true).'/customer/ratebusiness?code='.$this->customer_id.'-'.$this->authcode;
			$message_content = str_replace("{customer_name}","$customer_full_name",$message_content);
			$message_content = str_replace("{business_name}","$business_name",$message_content);
			$message_content = str_replace("{customer_email}","$customer_email_address",$message_content);
			$message_content = str_replace("{business_owner_name}","$business_owner_name",$message_content);
			$message_content = str_replace("{link}","$link",$message_content);
			
			$message = $mailgun->newMessage();
			$message->setFrom($business_email_address, $business_name);
			$message->addTo($customer_email_address,$customer_full_name);
			$message->setSubject($sEmailFormatResult['email_format_name']);
			$message->setHtml($message_content);
			$message->send();
			
			
			
			}
			
			$this->redirect(array('ratethankyou','business_id'=>$model->business_id,'business_name'=>$business_details->business_name,'msg'=>'success'));
		}	
		}
	
		$this->render('rate-business',array('model'=>$model,'business'=>$business_details));
		
		
		}
		
		public function actionInvalidCustomer($business_id = NULL) {
			$this->render('rate-business-invalid');
		}

		public function actionRateThankyou($business_name = NULL) {
					$model['business_name'] = urldecode($business_name);
					$this->render('rate-thankyou',array('model'=>$model));
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
		$model = Customer::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	
		public function loadBusiness($id)
	{
		$model=Business::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}