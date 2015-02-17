<?php

class DefaultController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1-admin';

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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Customer;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Customer']))
		{
			$model->attributes=$_POST['Customer'];
			
			
			$date = date("Y-m-d");// current date
			
			if($model->allow_access)
				$model->access_granted =  $date;
			else
				$model->access_granted = '0000-00-00';
				
			
			$date = strtotime(date("Y-m-d", strtotime($date)) . " +1 month");
			$model->ediable_date =date("Y-m-d",$date)  ;
				
			
			$model->overall = round(($_POST['Customer']['qulity']+$_POST['Customer']['value']+$_POST['Customer']['timeliness']+$_POST['Customer']['experience']+$_POST['Customer']['satisfaction'])/5);
			
			
			$model->date_posted = $date;
			
			
			$model->authcode = $this->random_string(32);
			
			$model->comments = $_POST['Customer']['comments'];
			$model->notes=  $_POST['Customer']['notes'];	
			
			
			if($model->save())
				$this->redirect(array('admin','id'=>$model->user_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Customer']))
		{
			$model->attributes=$_POST['Customer'];
			
			$date = date("Y-m-d");// current date
			
			if($model->allow_access)
				$model->access_granted =  $date;
			else
				$model->access_granted = '0000-00-00';
			
			$model->overall=round(($_POST['Customer']['qulity']+$_POST['Customer']['value']+$_POST['Customer']['timeliness']+$_POST['Customer']['experience']+$_POST['Customer']['satisfaction'])/5);
			
			$model->date_posted= $date;
				
			
			$model->comments = $_POST['Customer']['comments'];
			$model->notes=  $_POST['Customer']['notes'];	
				
			//print_r($_POST);
			//exit();
			
			
			if($model->save())
				$this->redirect(array('admin','id'=>$model->user_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('managerequests'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Customer');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Customer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Customer']))
			$model->attributes=$_GET['Customer'];

		$this->render('admin',array(
			'model'=>$model,
		));
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
	 * Performs the AJAX validation.
	 * @param Customer $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='customer-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
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


	
}