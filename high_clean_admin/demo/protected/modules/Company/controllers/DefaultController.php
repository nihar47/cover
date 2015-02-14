<?php

class DefaultController extends Controller
{

 public $layout='//layouts/column1';
 public $base_url_assets = null;
 
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','create','update','admin','delete','viewcontacts','addcontact','addquote'),
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
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionViewContacts($company_id)
	{
		
		$contact_model=new Contact('search');
		$contact_model->unsetAttributes();  // clear any default values
		if(isset($_GET['Contact']))
			$contact_model->attributes=$_GET['Contact'];

		
	
		$this->render('view_contacts',array(
			'model'=>$this->loadModel($company_id), // company Model
			'contact_model' => $contact_model // company model
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAddContact($company_id)
	{
	
		$model=$this->loadModel($company_id); // company model
		$contact_model = new Contact; // contact_model

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Contact']))
		{
			$contact_model->attributes=$_POST['Contact'];
			$contact_model->company_id = $model->id;
			$date = date("Y-m-d H:i:s");
			$contact_model->updated_at = $date;
			$contact_model->created_at = $date;
			
			if($contact_model->save())
				$this->redirect(array('admin'));
		}

		$this->render('add_contact',array(
			'model'=>$model,
			'contact_model'=>$contact_model,
		));
	}

	
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAddQuote($company_id)
	{
		$model=$this->loadModel($company_id); // company model
		$quote_model=new Quotes; // quote model
		$site_building_error_msg = '';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$site_buildings = isset($_POST['site_buildings']) ? $_POST['site_buildings'] : array();
		
		if(isset($_POST['Quotes']))
		{
		
			if(count($site_buildings) == 0) {
				$site_building_error_msg = "Please select at least one building";
			}
		
		
			$quote_model->attributes=$_POST['Quotes'];
			$quote_model->company_id = $model->id;
			
			if( $model->validate() && count($site_buildings) > 0) {
			if($quote_model->save()) {
			
				$temp_quote_id = $model->id;
					
					foreach($site_buildings as $value) {
						// delete if already exist by quote id.
					
						$model_quote_building_services_temp = new QuoteBuilding;
						$model_quote_building_services_temp->quote_id = $temp_quote_id;
						$model_quote_building_services_temp->building_id = $value;
						$model_quote_building_services_temp->created_at = date("Y-m-d");
						$model_quote_building_services_temp->save();
					}
					
					Yii::app()->request->redirect(Yii::app()->getBaseUrl(true) . '/index.php?r=Quotes/default/BuildingService&qid='.$model->id);
				}
			}	
		}

		$this->render('create_quote',array(
			'model'=>$model,
			'quote_model'=>$quote_model,
			'site_building_error_msg'=>$site_building_error_msg,
		));
	}

	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Company;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Company']))
		{
			$model->attributes=$_POST['Company'];
			$date = date("Y-m-d H:i:s");
			$model->updated_at = $date;
			$model->created_at = $date;
			
			if($model->save())
				$this->redirect(array('admin'));
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

		if(isset($_POST['Company']))
		{
			$model->attributes=$_POST['Company'];
			$date = date("Y-m-d H:i:s");
			$model->updated_at = $date;
			
			if($model->save())
				$this->redirect(array('admin'));
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Company');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
	Yii::app()->clientScript->scriptMap = array(
			'jquery-1.11.1.min.js' => false
		);
		
		// CgridView Records/page section
		if (isset($_GET['pageSize'])) {
		Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
		unset($_GET['pageSize']);
		}
	
	
		$model=new Company('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Company']))
			$model->attributes=$_GET['Company'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Company the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Company::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Company $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='company-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}