<?php

	class JobController extends Controller
	{

		public $base_url_assets = null;
		public $layout='//layouts/column1';

		
		 public function init() {
			$this->base_url_assets = '//' . CommonFunctions::remove_http(Yii::app()->getBaseUrl(true));
			
		}
		
		/**
		 * @return array action filters
		 */
		public function filters()
		{
			return array(
				'accessControl', // perform access control for CRUD operations
				'postOnly + delete', // we only allow deletion via POST request
			);
		}


		public function accessRules()
		{
			return array(
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions'=>array(
									'delete_sepervisor',
									'delete_site_sepervisor',
									'delete_staff_user',
									'view',
									'assign_supervisor',
									'assign_site_supervisor',
									'Assign_staff',
									'DownloadJobsheet',
									'DownloadQuote',
									'DownloadSwms',
									'approve_job',
									'change_job_status',
									'update_job_note',									
									'get_job_note',
									'update_purchase_order',
									'get_purchase_order',
									'BookJob',
									'RebookJob',
									'AddPurchaseOrder',
									'GetImageSrcByServiceId',
									'AddFrequencyJob',
									'jobImages',
									'Upload',
									'UploadBuildingPhoto',
									'UploadBuildingDocument',
									'DownloadJobBeforeAfterReport',
									
								),
					'users'=>array('admin'),
				),
				array('deny',  // deny all users
					'users'=>array('*'),
				),
			);
		}
			# $id i.e. job_id
		public function actionDownloadJobBeforeAfterReport($id) {
		
			$model = $this->loadModel($id);
			
			// before cleaning
			$criteria = new CDbCriteria();
			$criteria->select = "id,photo";
			$criteria->condition = "cleaning_status ='0' and job_id=".$id;
			$criteria->order = 'id desc';
			$job_images_before_cleaning = JobImages::model()->findAll($criteria);
			
			// after cleaning
			$criteria = new CDbCriteria();
			$criteria->select = "id,photo";
			$criteria->condition = "cleaning_status ='1' and job_id=".$id;
			$criteria->order = 'id desc';
			$job_images_after_cleaning = JobImages::model()->findAll($criteria);
		
			$mpdf=new mPDF('',   // mode - default ''
	                                                '',    // format - A4, for example, default ''
	                                                10,     // font size - default 0
	                                                '',    // default font family
	                                                12.7,    // margin_left
	                                                12.7,    // margin right
	                                                20,    // margin top
	                                                12.7,    // margin bottom
	                                                8,     // margin header
	                                                8,     // margin footer
	                                                'L');
		
		$msg = $this->renderPartial('job_before_cleaning_controller', 
			array(				
				'job_images_before_cleaning'=>$job_images_before_cleaning,
				'job_images_after_cleaning'=>$job_images_after_cleaning,
			)	
		, true);
		
	//$mpdf->SetHeader($store_name);
		$mpdf->debug = true;
	        $mpdf->mirrorMargins = 1 ;
	        $mpdf->use_kwt = true;
	        $mpdf->SetDisplayMode('fullpage');
	        $mpdf->list_indent_first_level = 0;
		$mpdf->WriteHTML($msg);
		

		
		
		//after cleaning photos
		$mpdf->AddPage();
		$msg2 = $this->renderPartial('job_after_cleaning_controller', 
			array(				
				'job_images_before_cleaning'=>$job_images_before_cleaning,
				'job_images_after_cleaning'=>$job_images_after_cleaning,
			)	
		, true);
		$mpdf->WriteHTML($msg2);	
		

		// footer	
		$footer_text = $this->renderPartial('job_quote_controller_footer', 
		array()
		, true);		
		$mpdf->SetHTMLFooter($footer_text);
		
		// $mpdf->showImageErrors = true;
		$pdf_name = "Job-".$id."- Before-After-Cleaning-Report";
		$pdf_name = preg_replace('/\s+/', '-', $pdf_name);
		$pdf_name = trim(preg_replace('/-+/', '-', $pdf_name), '-');
		$mpdf->Output($pdf_name.'.pdf','D');
		
		
		
		}	
			
		
			# $id i.e. job_id
		public function actionDownloadQuote($id) {
		
		
		// $id i.e. $job_id
		
		// job model
		$job_model = $this->loadModel($id);
		
		// quote model by job id
		$quote_model = Quotes::model()->findByPk($job_model->quote_id);
		
		// building model
		$building_model = Buildings::model()->findByPk($job_model->building_id);
		
		// site model
		$site_model = ContactsSite::model()->findByPk($quote_model->site_id);
		
		// contact model
		$contact_model = Contact::model()->findByPk($quote_model->contact_id);
		
		// contact model
		$company_model = Company::model()->findByPk($quote_model->company_id);
		
		// finding service under job
		$Criteria = new CDbCriteria();
		$Criteria->condition = "job_id = $id";
		$job_services_model = QuoteJobServices::model()->findAll($Criteria); 
				
		
		$msg = $this->renderPartial('job_quote_controller', 
			array(
				'job_model'=>$job_model,
				'quote_model'=>$quote_model,
				'building_model'=>$building_model,
				'site_model'=>$site_model,
				'contact_model'=>$contact_model,
				'company_model'=>$company_model,
				'job_services_model'=>$job_services_model,
			)	
		, true);
		
		
		$mpdf=new mPDF('',   // mode - default ''
	                                                '',    // format - A4, for example, default ''
	                                                10,     // font size - default 0
	                                                '',    // default font family
	                                                12.7,    // margin_left
	                                                12.7,    // margin right
	                                                20,    // margin top
	                                                12.7,    // margin bottom
	                                                8,     // margin header
	                                                8,     // margin footer
	                                                'L');
		//$mpdf->SetHeader($store_name);
		$mpdf->debug = true;
	        $mpdf->mirrorMargins = 1 ;
	        $mpdf->use_kwt = true;
	        $mpdf->SetDisplayMode('fullpage');
	        $mpdf->list_indent_first_level = 0;
		$mpdf->WriteHTML($msg);
		

				
		$footer_text = $this->renderPartial('job_quote_controller_footer', 
		array()
		, true);
		
		$mpdf->SetHTMLFooter($footer_text);
		
		// $mpdf->showImageErrors = true;
		$pdf_name = "Quote-".$id."-".$company_model->name."-".$site_model->site_name;
		$pdf_name = preg_replace('/\s+/', '-', $pdf_name);
		$pdf_name = trim(preg_replace('/-+/', '-', $pdf_name), '-');
		$mpdf->Output($pdf_name.'.pdf','D');
		
		
		
		}	
			
		
		
		# $id i.e. job_id
		public function actionDownloadJobsheet($id) {
		
		// $id i.e. $job_id
		
		// job model
		$job_model = $this->loadModel($id);
		
		// quote model by job id
		$quote_model = Quotes::model()->findByPk($job_model->quote_id);
		
		// building model
		$building_model = Buildings::model()->findByPk($job_model->building_id);
		
		// site model
		$site_model = ContactsSite::model()->findByPk($quote_model->site_id);
		
		// contact model
		$contact_model = Contact::model()->findByPk($quote_model->contact_id);
		
		// contact model
		$company_model = Company::model()->findByPk($quote_model->company_id);
		
		// finding service under job
		$Criteria = new CDbCriteria();
		$Criteria->condition = "job_id = $id";
		$job_services_model = QuoteJobServices::model()->findAll($Criteria); 		
		unset($Criteria);		
		$Criteria = new CDbCriteria();
		$Criteria->condition = "job_id = $id";
		$supervisor = JobSupervisor::model()->findAll($Criteria); 		
		unset($Criteria);				
		$Criteria = new CDbCriteria();
		$Criteria->condition = "job_id = $id";
		$siteSupervisor = JobSiteSupervisor::model()->findAll($Criteria);
		unset($Criteria);				
		$Criteria = new CDbCriteria();
		$Criteria->condition = "job_id = $id";
		$staffUser = JobStaff::model()->findAll($Criteria);
		
		
		$msg = $this->renderPartial('job_sheet_controller', 
			array(
				'job_model'=>$job_model,
				'quote_model'=>$quote_model,
				'building_model'=>$building_model,
				'site_model'=>$site_model,
				'contact_model'=>$contact_model,
				'company_model'=>$company_model,
				'job_services_model'=>$job_services_model,
				'supervisor'=>$supervisor,
				'siteSupervisor'=>$siteSupervisor,
				'staffUser'=>$staffUser,
			)	
		, true);
		
		$mpdf=new mPDF('',   // mode - default ''
	                                                '',    // format - A4, for example, default ''
	                                                10,     // font size - default 0
	                                                '',    // default font family
	                                                12.7,    // margin_left
	                                                12.7,    // margin right
	                                                20,    // margin top
	                                                12.7,    // margin bottom
	                                                8,     // margin header
	                                                8,     // margin footer
	                                                'L');
		//$mpdf->SetHeader($store_name);
		$mpdf->debug = true;
	        $mpdf->mirrorMargins = 1 ;
	        $mpdf->use_kwt = true;
	        $mpdf->SetDisplayMode('fullpage');
	        $mpdf->list_indent_first_level = 0;
		$mpdf->WriteHTML($msg);
		//--------------------2nd page -------------------
		$mpdf->AddPage();
		$msg2 = $this->renderPartial('job_sheet_controller2', 
			array(
				'job_model'=>$job_model,
				'job_services_model'=>$job_services_model,				
			)	
		, true);
		
		$mpdf->WriteHTML($msg2);		
		//--------------------3rd page -------------------
		
		// check first if this job having images
		
		$path = Yii::app()->basePath.'/../uploads/quote-building-service/';
		$image_count = 0;
		foreach($job_services_model as $service_row) {
			if(isset($service_row->image) && $service_row->image !=NULL && file_exists($path.$service_row->image)) {
				$image_count++;
			}
		}
		if( $image_count > 0 ) {
			$mpdf->AddPage();
			$msg3 = $this->renderPartial('job_sheet_controller3', 
				array(
					'job_services_model'=>$job_services_model,				
				)	
			, true);
			$mpdf->WriteHTML($msg3);
		}
		
 
		// $mpdf->showImageErrors = true;
		$pdf_name = "Jobsheet-".$id."-".$company_model->name."-".$site_model->site_name;
		$pdf_name = preg_replace('/\s+/', '-', $pdf_name);
		$pdf_name = trim(preg_replace('/-+/', '-', $pdf_name), '-');
		$mpdf->Output($pdf_name.'.pdf','D');
		
		
		}	
			
		
	
			# $id i.e. job_id
		public function actionDownloadSwms($id) {
		

				// $id i.e. $job_id
		
		// job model
		$job_model = $this->loadModel($id);
		
		// quote model by job id
		$quote_model = Quotes::model()->findByPk($job_model->quote_id);
		
		// building model
		$building_model = Buildings::model()->findByPk($job_model->building_id);
		
		// site model
		$site_model = ContactsSite::model()->findByPk($quote_model->site_id);
		
		// contact model
		$contact_model = Contact::model()->findByPk($quote_model->contact_id);
		
		// contact model
		$company_model = Company::model()->findByPk($quote_model->company_id);
		
		// finding service under job
		$Criteria = new CDbCriteria();
		$Criteria->condition = "job_id = $id";
		$job_services_model = QuoteJobServices::model()->findAll($Criteria); 		
		unset($Criteria);		
		$Criteria = new CDbCriteria();
		$Criteria->condition = "job_id = $id";
		$supervisor = JobSupervisor::model()->findAll($Criteria); 		
		unset($Criteria);				
		$Criteria = new CDbCriteria();
		$Criteria->condition = "job_id = $id";
		$siteSupervisor = JobSiteSupervisor::model()->findAll($Criteria);
		unset($Criteria);				
		$Criteria = new CDbCriteria();
		$Criteria->condition = "job_id = $id";
		$staffUser = JobStaff::model()->findAll($Criteria);
		
		$swms = array(); 
		$swms_ids = explode(',',$job_model->swms_ids);
		
		
		$msg = $this->renderPartial('job_swms_controller', 
			array(
				'job_model'=>$job_model,
				'quote_model'=>$quote_model,
				'building_model'=>$building_model,
				'site_model'=>$site_model,
				'contact_model'=>$contact_model,
				'company_model'=>$company_model,
				'job_services_model'=>$job_services_model,
				'supervisor'=>$supervisor,
				'siteSupervisor'=>$siteSupervisor,
				'staffUser'=>$staffUser,				
				'swms_ids'=>$swms_ids,				
			)	
		, true);
		

		
		$mpdf=new mPDF('',   // mode - default ''
	                                                '',    // format - A4, for example, default ''
	                                                10,     // font size - default 0
	                                                '',    // default font family
	                                                12.7,    // margin_left
	                                                12.7,    // margin right
	                                                20,    // margin top
	                                                12.7,    // margin bottom
	                                                8,     // margin header
	                                                8,     // margin footer
	                                                'L');
		
		$mpdf->debug = true;
		$mpdf->mirrorMargins = 1 ;
		$mpdf->use_kwt = true;
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->list_indent_first_level = 0;
		$mpdf->WriteHTML($msg);		
		
	
	
		// swms signature page
	/* 	$mpdf->AddPage();
		$msg2 = $this->renderPartial('job_swms_controller2', 
			array()	
		, true);
		
		$mpdf->WriteHTML($msg2);	
		
		
	 */
		
		$pdf_name = "SWMS-".$id."-".$company_model->name."-".$site_model->site_name;
		$pdf_name = preg_replace('/\s+/', '-', $pdf_name);
		$pdf_name = trim(preg_replace('/-+/', '-', $pdf_name), '-');
		$mpdf->Output($pdf_name.'.pdf','D');
		
		
	
		}	
		

	
		public function actionDelete_sepervisor($id)
		{
			$this->loadModelSuperViser($id)->delete();		
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		
		public function actionDelete_site_sepervisor($id)
		{
			$this->loadModelSiteSuperViser($id)->delete();
			
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		
		public function actionDelete_staff_user($job_id,$job_date)
		{
			//$this->loadModelStaff($id)->delete();
			JobStaff::model()->deleteAll(array("condition" =>  "job_id = ".$job_id." and job_date ='".$job_date."'" ));
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}

		
			public function loadModelSuperViser($id)
		{
			$model=JobSupervisor::model()->findByPk($id);
			if($model===null)
				throw new CHttpException(404,'The requested page does not exist.');
			return $model;
		}
		
			public function loadModelSiteSuperViser($id)
		{
			$model=JobSiteSupervisor::model()->findByPk($id);
			if($model===null)
				throw new CHttpException(404,'The requested page does not exist.');
			return $model;
		}
		
			public function loadModelStaff($id)
		{
			$model=JobStaff::model()->findByPk($id);
			if($model===null)
				throw new CHttpException(404,'The requested page does not exist.');
			return $model;
		}
		
		public function actionAssign_supervisor() {
				
				$job_id = isset($_POST['job_id']) ? $_POST['job_id'] : 0;	
				$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : 0;	
				
			if($job_id > 0 && $user_id > 0) {
			
			
			$job_model = $this->loadModel($job_id);
					if($job_model->approval_status != 'Approved By Admin' || $job_model->booked_status != 'Booked') {
					echo 'invalid'; exit;
					} else {
						$Criteria = new CDbCriteria();
						$Criteria->condition = "job_id = ".$job_id." and user_id =".$user_id;
						$model = JobSupervisor::model()->find($Criteria); 
						
						
						if(! isset($model->id)) {
						
								$user_model=User::model()->findByPk($user_id);
						
								$model = new JobSupervisor;
								$model->job_id = $job_id;
								$model->user_id = $user_id;
								$model->name = $user_model->first_name.' '.$user_model->last_name;
								$model->email = $user_model->email;
								$model->phone = $user_model->home_phone;
								$model->mobile = $user_model->mobile_phone;
								$model->save();
								echo '1'; exit;
						} else {
						echo '0' ; exit;  // This user already assigned
						}
				}
				
			}
		}


		public function actionAssign_site_supervisor() {
				
				$job_id = isset($_POST['job_id']) ? $_POST['job_id'] : 0;	
				$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : 0;	
				
			if($job_id > 0 && $user_id > 0) {
			
				
				
			$job_model = $this->loadModel($job_id);
			if($job_model->approval_status != 'Approved By Admin' || $job_model->booked_status != 'Booked') {
			echo 'invalid'; exit;
			} else {
				
				$Criteria = new CDbCriteria();
				$Criteria->condition = "job_id = ".$job_id." and user_id =".$user_id;
				$model = JobSiteSupervisor::model()->find($Criteria); 
				
				
				if(! isset($model->id)) {
				
						$user_model=User::model()->findByPk($user_id);
				
						$model = new JobSiteSupervisor;
						$model->job_id = $job_id;
						$model->user_id = $user_id;
						$model->name = $user_model->first_name.' '.$user_model->last_name;
						$model->email = $user_model->email;
						$model->phone = $user_model->home_phone;
						$model->mobile = $user_model->mobile_phone;
						$model->save();
						echo '1'; exit;
				} else {
				echo '0' ; exit;  // This user already assigned
				}	

			}
		
			}
			
			
		}

		
	public function actionAssign_staff() {
	
	
	$job_id = isset($_POST['job_id']) ? $_POST['job_id'] : 0;	
	$user_id = isset($_POST['user_id']) ? rtrim($_POST['user_id'], "_") : 0;	
	$pick_up_van = isset($_POST['pick_up_van']) ? $_POST['pick_up_van'] : '';	
	$get_to_job_site = isset($_POST['get_to_job_site']) ? $_POST['get_to_job_site'] : '';	
	$return_to_office = isset($_POST['return_to_office']) ? $_POST['return_to_office'] : '';	
	$job_date = isset($_POST['job_date']) ? $_POST['job_date'] : '';	
		
	$user_ids_list = explode('_',$user_id);	
			
			if($job_id > 0 && $user_id > 0 && ! empty($job_date) ) {
			
			
			$job_model = $this->loadModel($job_id);
					if($job_model->approval_status != 'Approved By Admin' || $job_model->booked_status != 'Booked') {
					echo 'invalid'; exit;
					} else {
						/* $Criteria = new CDbCriteria();
						$Criteria->condition = "job_id = ".$job_id." and user_id =".$user_id." and job_date ='".$job_date."'";
						$model = JobStaff::model()->find($Criteria); 
						
						 */
						//if(! isset($model->id)) {
						
						
							foreach($user_ids_list as $user_id) {
								JobStaff::model()->deleteAll(array("condition" =>  "job_id = ".$job_id." and user_id =".$user_id." and job_date ='".$job_date."'" ));
								$user_model = User::model()->findByPk($user_id);						
								$model = new JobStaff;
								$model->job_id = $job_id;
								$model->user_id = $user_id;
								$model->name = $user_model->first_name.' '.$user_model->last_name;
								$model->email = $user_model->email;
								$model->phone = $user_model->home_phone;
								$model->mobile = $user_model->mobile_phone;
								$model->pick_up_van = $pick_up_van;
								$model->get_to_job_site = $get_to_job_site;
								$model->return_to_office = $return_to_office;
								$model->job_date = $job_date;
								$model->save();
							}	
								echo '1'; exit;
						/* } else {
						echo '0' ; exit;  // This user already assigned
						} */
				}
				
			}
	
	}
		
		public function loadModel($id)
		{
			$model=QuoteJobs::model()->findByPk($id);
			if($model===null)
				throw new CHttpException(404,'The requested page does not exist.');
			return $model;
		}
		
		public function actionView($id) {
		
		Yii::app()->clientScript->scriptMap = array(
				'jquery-1.11.1.min.js' => false
			);
			
		
			$model = $this->loadModel($id);
			$quote_model =  Quotes::model()->findByPk($model->quote_id);
			$interval_days = CommonFunctions::getIntervalDays($model->job_started_date,$model->job_end_date);
			$Criteria = new CDbCriteria();
			$Criteria->condition = "job_id =".$id;
			$BuildingServices = QuoteJobServices::model()->findAll($Criteria); 

			$this->render('view_job_details',array(
				'model'=>$model,
				'quote_model'=>$quote_model,
				'BuildingServices'=>$BuildingServices,
				'interval_days' => $interval_days,
			));
				
		}

		
		
				
		public function actionJobImages($id) {
		

			$model = $this->loadModel($id);
			$quote_model =  Quotes::model()->findByPk($model->quote_id);
			
			// before cleaning
			$criteria = new CDbCriteria();
			$criteria->select = "id,photo";
			$criteria->condition = "cleaning_status ='0' and job_id=".$id;
			$criteria->order = 'id desc';
			$job_images_before_cleaning = JobImages::model()->findAll($criteria);
			
			// after cleaning
			$criteria = new CDbCriteria();
			$criteria->select = "id,photo";
			$criteria->condition = "cleaning_status ='1' and job_id=".$id;
			$criteria->order = 'id desc';
			$job_images_after_cleaning = JobImages::model()->findAll($criteria);
		
			// building photos
			$criteria = new CDbCriteria();
			$criteria->select = "id,photo";
			$criteria->condition = "building_id=".$model->building_id;
			$criteria->order = 'id desc';
			$building_images = BuildingImages::model()->findAll($criteria);
			
			// building photos
			$criteria = new CDbCriteria();
			$criteria->select = "id,doc";
			$criteria->condition = "building_id=".$model->building_id;
			$criteria->order = 'id desc';
			$building_documents = BuildingDocuments::model()->findAll($criteria);
				
			$this->render('job_images',array(
				'model'=>$model,
				'quote_model'=>$quote_model,
				'job_images_before_cleaning'=>$job_images_before_cleaning,				
				'job_images_after_cleaning'=>$job_images_after_cleaning,				
				'building_images'=>$building_images,
				'building_documents'=>$building_documents,
			));
		
		}
		
		
		public function actionUpload($id,$cleaning_status) {
        Yii::import("ext.EAjaxUpload.qqFileUploader");
 
        $folder='uploads/job_images/';// folder for uploaded files
        $allowedExtensions = array("jpg","jpeg","gif","png");
        $sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
 
        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
        $fileName=$result['filename'];//GETTING FILE NAME
 
 
		$vimage = new resize($folder.$result['filename']);
        $vimage->resizeImage(300, 225);
        $save_thumb = 'uploads/job_images/thumbs/' . $fileName;
        $vimage->saveImage($save_thumb);

 
 
		$model = new JobImages;
		$model->job_id = $id;
		$model->photo = $fileName;
		$model->cleaning_status = $cleaning_status;
		$model->date_added = date("Y-m-d");
		$model->save();
	
 
        echo $return;// it's array
}		
		
		public function actionUploadBuildingDocument($building_id) {
		
        Yii::import("ext.EAjaxUpload.qqFileUploader");
 
        $folder='uploads/building_documents/';// folder for uploaded files
        $allowedExtensions = array("doc","docx","pdf");
        $sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
 
        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
        $fileName=$result['filename'];//GETTING FILE NAME
		
		
		$model = new BuildingDocuments;
		$model->building_id = $building_id;
		$model->doc = $fileName;
		$model->date_added = date("Y-m-d");
		$model->save();
	
		
        echo $return;// it's array
}
		
		
		public function actionUploadBuildingPhoto($building_id) {
		
        Yii::import("ext.EAjaxUpload.qqFileUploader");
 
        $folder='uploads/building_images/';// folder for uploaded files
        $allowedExtensions = array("jpg","jpeg","gif","png");
        $sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
 
        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
        $fileName=$result['filename'];//GETTING FILE NAME
 
 
		$vimage = new resize($folder.$result['filename']);
        $vimage->resizeImage(300, 225);
        $save_thumb = 'uploads/building_images/thumbs/' . $fileName;
        $vimage->saveImage($save_thumb);

 
 
		$model = new BuildingImages;
		$model->building_id = $building_id;
		$model->photo = $fileName;
		$model->date_added = date("Y-m-d");
		$model->save();
	
 
        echo $return;// it's array
}
		
		public	function actionGetImageSrcByServiceId() 
		{
			$job_service_id = isset($_POST['job_service_id']) ? $_POST['job_service_id'] : 0;
			$model = QuoteJobServices::model()->findByPk($job_service_id);
			
			$path = Yii::app()->basePath.'/../uploads/quote-building-service/';			
			if(isset($model->image) && $model->image !=NULL && file_exists($path.$model->image)) {			
			$image_url = Yii::app()->getBaseUrl(true)."/uploads/quote-building-service/".$model->image;
			echo "<img src='".$image_url."' />";exit;
			} else {
			echo ''; exit;
			}		

		
		}
		
		// $id i.e. job_id	
		public function actionRebookJob($id) {
			$model = $this->loadModel($id);
			
			$afterRebookRedirectLink = Yii::app()->getBaseUrl(true) . '/index.php?r=Quotes/default/view&id='.$model->quote_id;
			if( isset($_REQUEST['from_job_details']) && $_REQUEST['from_job_details'] == 'yes' )
			$afterRebookRedirectLink = Yii::app()->getBaseUrl(true) . '/index.php?r=Quotes/Job/view&id='.$model->id;
						
		
			$deleteJobStaff ='';
			$job_started_date = isset($_POST['QuoteJobs']['job_started_date']) ? $_POST['QuoteJobs']['job_started_date'] : '';
			$job_end_date = isset($_POST['QuoteJobs']['job_end_date']) ? $_POST['QuoteJobs']['job_end_date'] : '';
			
			if( $job_started_date != $model->job_started_date )
			$deleteJobStaff = 'yes';
			else if( $job_end_date != $model->job_end_date )
			$deleteJobStaff = 'yes';
			
			
			if(isset($_POST['QuoteJobs']))
			{
			
				$model->attributes=$_POST['QuoteJobs'];
			
				if($model->validate())
				{
					 if($model->save(false)) {						
						
						if($deleteJobStaff == 'yes') // if dates are changed for job then only delete assigned staff members from table
						JobStaff::model()->deleteAll(array("condition" => "job_id=".(int)$model->id));						
						
						Yii::app()->request->redirect($afterRebookRedirectLink);
					} 
				}
			}
		
			$this->render('rebook_job',array('model'=>$model));
		}	
		
			
		// $id i.e. job_id	
		public function actionAddPurchaseOrder($id) {
			$model = $this->loadModel($id);
			
			$afterRebookRedirectLink = Yii::app()->getBaseUrl(true) . '/index.php?r=Quotes/default/view&id='.$model->quote_id;
			if( isset($_REQUEST['from_job_details']) && $_REQUEST['from_job_details'] == 'yes' )
			$afterRebookRedirectLink = Yii::app()->getBaseUrl(true) . '/index.php?r=Quotes/Job/view&id='.$model->id;
						
		
			if(isset($_POST['QuoteJobs']))
			{
			
				$model->attributes=$_POST['QuoteJobs'];
			
				if($model->validate())
				{
					 if($model->save(false)) {						
						
						Yii::app()->request->redirect($afterRebookRedirectLink);
					} 
				}
			}
		
			$this->render('job_purchase_order',array('model'=>$model));
		}	
		
	
		
		public function actionAddFrequencyJob($id) {
		
					$model = $this->loadModel($id);
					// find last job related this quote and building				
					$last_job_model = QuoteJobs::model()->findByAttributes(
					array(
					'quote_id'=>$model->quote_id,
					'building_id'=>$model->building_id
					),
					array('order'=>'id DESC')
					);
					
			$number_of_jobs = isset($_POST['number_of_jobs']) ? $_POST['number_of_jobs'] : 0;
			
			if(isset($_POST['yt0']) && $_POST['yt0'] == 'Save') {
			
				if(empty($number_of_jobs)) $number_of_jobs = 0;

				if( $number_of_jobs == 0)
				Yii::app()->user->setFlash('input_zero', "Please enter valid input, number should be greater than zero!");
			
				if( $number_of_jobs >= 100 )
				Yii::app()->user->setFlash('input_hundred', "Please enter valid input, number should be less than or equal to hundred!");
			
			
				if($number_of_jobs > 0 && $number_of_jobs <= 100){	
					
					$frequency_type = $model->frequency_type;
					$interval_days = CommonFunctions::getIntervalDays($model->job_started_date,$model->job_end_date);
					$staff_required = $model->staff_required;				
					
				 	$period_start_date = $last_job_model->job_started_date; // max date of job "job_started_date" related this quote
					$temp_period_start_date = $period_start_date;
					
					$frequency_model = FrequencyType::model()->findByPk($frequency_type);
					
					for($i=0;$i<$number_of_jobs;$i++) {
						$period_end_date = date('Y-m-d', strtotime($temp_period_start_date.' '.$frequency_model->value));
						$temp_period_start_date = $period_end_date;
					}
					
					$period_end_date = date('Y-m-d', strtotime($period_end_date.' + '.$interval_days.' days'));			
					QuoteJobService::addFrequencyJobs($model->id,$period_start_date,$period_end_date,$frequency_type,$interval_days,$staff_required);
					Yii::app()->request->redirect(Yii::app()->getBaseUrl(true) . '/index.php?r=Quotes/default/view&id='.$model->quote_id); 
				}
					
			}	
				
			$this->render('add_frequency_job',array('model'=>$model));
		}
		
		
		// $id i.e. job_id	
		public function actionBookJob($id) {
			$model = $this->loadModel($id);
			//echo '<pre>'; print_r($_POST); echo '</pre>';
			
			if($model->booked_status == 'Booked')
			Yii::app()->request->redirect(Yii::app()->getBaseUrl(true) . '/index.php?r=Quotes/Job/RebookJob&id='.$model->id);
			
			if(isset($_POST['QuoteJobs']))
			{
			$model->attributes=$_POST['QuoteJobs'];
			$model->booked_status = 'Booked';
				
			$staff_required = isset($_POST['QuoteJobs']['staff_required']) ? $_POST['QuoteJobs']['staff_required'] : 0;
			$frequency_type = isset($_POST['QuoteJobs']['frequency_type']) ? $_POST['QuoteJobs']['frequency_type'] : 0;
			$job_started_date = isset($_POST['QuoteJobs']['job_started_date']) ? $_POST['QuoteJobs']['job_started_date'] : '';
			$job_end_date = isset($_POST['QuoteJobs']['job_end_date']) ? $_POST['QuoteJobs']['job_end_date'] : '';
			$period_start_date = isset($_POST['period_start_date']) ? $_POST['period_start_date'] : '';
			$period_end_date = isset($_POST['period_end_date']) ? $_POST['period_end_date'] : '';
		
		
		
			
			
				if($model->validate())
				{	
				
				if(empty ($job_started_date) || $job_started_date == '0000-00-00' ) {
						Yii::app()->user->setFlash('job_started_date', "Please select job start date.");
					} else			
					if(empty ($job_end_date) || $job_end_date == '0000-00-00' ) {
						Yii::app()->user->setFlash('job_end_date', "Please select job end date.");				
				} else {
	
							 if($frequency_type != 1 && ! empty($period_start_date) && ! empty($period_end_date) ) {		
								if($period_start_date <= $job_started_date)
								$period_start_date = $job_started_date;
								$interval_days = CommonFunctions::getIntervalDays($job_started_date,$job_end_date);
								QuoteJobService::addFrequencyJobs($model->id,$period_start_date,$period_end_date,$frequency_type,$interval_days,$staff_required);
							}
				
							if($model->save(false)) {
							Yii::app()->request->redirect(Yii::app()->getBaseUrl(true) . '/index.php?r=Quotes/default/view&id='.$model->quote_id);
							}	
					} 
				}
			}
		
			$this->render('book_job',array('model'=>$model));
		}	
		
			

		public function actionGet_job_note() {
			$id = isset($_POST['job_id']) ? $_POST['job_id'] : 0;
			if($id > 0) {
			$model = $this->loadModel($id);
			echo $model->job_note; exit;
			}
		}
		
		
		public function actionGet_purchase_order() {
			$id = isset($_POST['job_id']) ? $_POST['job_id'] : 0;
			if($id > 0) {
			$model = $this->loadModel($id);
			echo $model->purchase_order; exit;
			}
		}
		
		
		public function actionUpdate_job_note() {
			$id = isset($_POST['job_id']) ? $_POST['job_id'] : 0;
			$job_note = isset($_POST['job_note']) ? $_POST['job_note'] : '';
			if($id > 0) {
				$model = $this->loadModel($id);
				$model->job_note = $job_note;
				if($model->save())
				echo '1'; exit;
			}
		}	
		
			
		public function actionUpdate_purchase_order() {
			$id = isset($_POST['job_id']) ? $_POST['job_id'] : 0;
			$purchase_order = isset($_POST['purchase_order']) ? $_POST['purchase_order'] : '';
			if($id > 0) {
				$model = $this->loadModel($id);
				$model->purchase_order = $purchase_order;
				if($model->save())
				echo '1'; exit;
			}
		}	
		
		
		public function actionChange_job_status() {
			$id = isset($_POST['job_id']) ? $_POST['job_id'] : 0;
			$job_status = isset($_POST['job_status']) ? $_POST['job_status'] : '';
			if($id > 0) {
				
				$supervisor_count = JobSupervisor::Model()->countByAttributes(array(
                        'job_id'=> $id
                        ));
				
				if($supervisor_count == 0) {
					echo 'assign_supervisor'; exit;
				}
				
				$site_supervisor_count = JobSiteSupervisor::Model()->countByAttributes(array(
                        'job_id'=> $id
                        ));
				
				
				if($site_supervisor_count == 0) {
					echo 'assign_site_supervisor'; exit;
				}
				
				$staff_count = JobStaff::Model()->countByAttributes(array(
                        'job_id'=> $id
                        ));
				
				
				if($staff_count == 0) {
					echo 'assign_staff'; exit;
				}
				
				$model = $this->loadModel($id);
				$model->job_status = $job_status;
				if($model->save())
				echo '1'; exit;
			}
		}	
		

		
		public function actionApprove_job() {
			$id = isset($_POST['job_id']) ? $_POST['job_id'] : 0;
			if($id > 0) {
				$model = $this->loadModel($id);
				$model->approval_status = 'Approved By Admin';
				if($model->save())
				echo '1'; exit;
			}
		
		}
		

		
		
}