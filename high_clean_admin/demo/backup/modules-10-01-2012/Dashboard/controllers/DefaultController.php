<?php

class DefaultController extends Controller
{
	public $base_url_assets = null;
	public $layout='//layouts/column1';

	public function init() {
		$this->base_url_assets = '//' . CommonFunctions::remove_http(Yii::app()->getBaseUrl(true));
	}

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
				'actions'=>array('index'),
				'users'=>array('admin','doctor','assistant','patient'),
			),
                    array('deny',  // deny all users
				'users'=>array('*'),
			),
			
		);
	}



	public function actionIndex()
	{	
	
		$this->render('index');
	}


      

}