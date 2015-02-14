<?php

class SiteController extends Controller
{
	public $layout='//layouts/column1';
	public $base_url_assets = null;
	
	public function init() {
		$this->base_url_assets = '//' . CommonFunctions::remove_http(Yii::app()->getBaseUrl(true));
	}
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
            
		if(Yii::app()->user->isGuest)
                    $this->redirect(Yii::app()->baseUrl.'/?r=site/login');



                 if(Yii::app()->user->name =='admin'  )
                             $this->redirect(Yii::app()->baseUrl.'/?r=Dashboard');


                 $this->redirect(Yii::app()->baseUrl.'/?r=site/login');

            
		
	}

	public function actionRq() {
	
		$SQL = "ALTER TABLE `hc_quote_jobs` ADD `purchase_order` VARCHAR( 255 ) NULL ";
		
		$connection = Yii::app()->db;
		$command= $connection->createCommand($SQL);
		$rowCount = $command->execute(); // execute the non-query SQL
		$dataReader = $command->query(); // execute a query SQL
		echo '<pre>'; print_r($dataReader); echo '</pre>';exit;
		
	}
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
                $error = Yii::app()->errorHandler->error;

                


                 if (Yii::app()->errorHandler->error['code'] == 403){
                    $base = Yii::app()->baseUrl;
		    header("Location: $base/admin/");
		    exit();

                 }
                 
                 if (Yii::app()->errorHandler->error['code'] == 404){
                    $base = Yii::app()->baseUrl;
		    header("Location: $base/admin/");
		    exit();

                     }



    
	}



	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{	
		
		$this->layout="login-layout";

		$this->pageTitle = 'High Clean Admin - Login';
		 
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{  
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
                      
                                  if(Yii::app()->user->profile==='admin')
                                     {
                                  //     $this->redirect(Yii::app()->user->returnUrl);
                                        /* Redirect browser */
					$base = Yii::app()->baseUrl;
					header("Location: $base/?r=Dashboard");
					exit();
                                     }
                                   if(Yii::app()->user->profile==='admin')
                                     {
                                  //     $this->redirect(Yii::app()->user->returnUrl);
                                        /* Redirect browser */
					$base = Yii::app()->baseUrl;
					header("Location: $base/?r=Dashboard");
					exit();
                                     }
                                       
                                     
                                     }
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	


	/**
	 * Logs out the current user and redirect to homepage.
	 */
	 
	public function actionLogout()
	{
              Yii::app()->user->logout();
              $this->redirect(Yii::app()->baseUrl);
	}
	
	

	   
     public function actionReset() {
        $model = new PasswordResetRequestForm;
        $msg = null;
        if(isset($_POST['PasswordResetRequestForm']))
       {
           $model->attributes = $_POST['PasswordResetRequestForm'];
          if($model->validate()){
          $email =  $_POST['PasswordResetRequestForm']['email'];
          $data_Model = User::model()->findByAttributes(array(),
                        $condition = 'email = :email AND status = :status',
                        $params = array(':email' => $email,':status' => '1')
                  );
          if($data_Model===NULL){
              $model->addError('email', 'No account found with that email address.');
          }else{
                //send link in a mail to reset a link
				
          }
        }
       }
       $this->render('reset', array(
            'model' => $model,
            'msg' => $msg,
        ));
    }

     public function actionResetaccount() {
      
        $model = new PasswordResetAccountForm;

         if (isset($_REQUEST['code']) && $_REQUEST['code'] != '') {
         $code = $_REQUEST['code'];
         $code_array = explode('-', $code);
         $business_id = $code_array[0];
         $authcode = $code_array[1];

         $business_model_data = User::model()->findByAttributes(array(),
                        $condition = 'business_id = :business_id AND authcode=:authcode AND status = :status',
                        $params = array(':business_id' => $business_id,'authcode'=> $authcode,':status' => 'active'));

          if($business_model_data===NULL){
             throw new CHttpException(404, 'The requested page does not exist.');
          }else{

                if(isset($_POST['PasswordResetAccountForm'])){
                     $model->attributes = $_POST['PasswordResetAccountForm'];
                    if($model->validate()){

                         $business_model_data->password = trim(md5($_POST['PasswordResetAccountForm']['password']));
                         $business_model_data->authcode = $this->random_string(32);
                                
                        if ($business_model_data->save()) {
                              
								/// mail code
                                header("Location: ".Yii::app()->getBaseUrl(true)."/business-login?reset=1");
                                EXIT();

                        }

                    }
                }
              
          }




      
        }else{
              throw new CHttpException(404, 'The requested page does not exist.');
         }
        
        $this->render('resetaccount', array(
            'model' => $model,
          
        ));   
     }


   

	
	

}