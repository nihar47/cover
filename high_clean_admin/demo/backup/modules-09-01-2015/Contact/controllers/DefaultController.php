<?php

class DefaultController extends Controller
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','update','admin','delete','viewsites','addsite'),
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
	public function actionViewSites($contact_id)
	{
	
		// site model
		$sites_model=new ContactsSite('search');
		$sites_model->unsetAttributes();  // clear any default values
		if(isset($_GET['ContactsSite']))
			$sites_model->attributes=$_GET['ContactsSite'];

		
		$this->render('view_sites',array(
			'model'=>$this->loadModel($contact_id), // Contact Model
			'sites_model' => $sites_model
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAddSite($contact_id)
	{
		$model=$this->loadModel($contact_id); // contact model
		$site_model=new ContactsSite; // site model

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ContactsSite']))
		{
			$site_model->attributes=$_POST['ContactsSite'];
			//$site_model->contact_id = $model->id;
			$date = date("Y-m-d H:i:s");
			$site_model->updated_at = $date;
			$model->created_at = $date;
			
			if($site_model->validate()) {
				if($site_model->save()) {
						
						// add entry for site contact relation
						$Model_SiteContactRelation = new SiteContactRelation;
						$Model_SiteContactRelation->site_id = $site_model->id;
						$Model_SiteContactRelation->contact_id = $model->id;
						$Model_SiteContactRelation->save();
					
					$this->redirect(array('admin'));
				}
			}
		}

		$this->render('add_site',array(
			'model'=>$model,
			'site_model'=>$site_model,
		));
	}


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Contact;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Contact']))
		{
			$model->attributes=$_POST['Contact'];
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

		if(isset($_POST['Contact']))
		{
			$model->attributes=$_POST['Contact'];
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
		$dataProvider=new CActiveDataProvider('Contact');
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
	
		$model=new Contact('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Contact']))
			$model->attributes=$_GET['Contact'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Contact the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Contact::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Contact $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='contact-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}