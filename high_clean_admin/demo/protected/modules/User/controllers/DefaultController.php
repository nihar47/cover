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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update','index','view','changestatus','changepassword'),
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
		$model=new User;

			
 	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$rnd = rand(0,99999);  // generate random number between 0-99999
			$uploadedFile=CUploadedFile::getInstance($model,'Avatar');
			if($uploadedFile) {
            $fileName = "{$rnd}-{$uploadedFile}"; 
			$model->Avatar = $fileName;
			} else {
			$model->Avatar = "{$rnd}";
			}
			
			$date = date("Y-m-d H:i:s");
			$model->updated_at = $date;
			$model->created_at = $date;
			
            
			  if ($model->validate()) {
                    $model->password = md5(trim($_POST['User']['password']));

				if($model->save()) {
				if(isset($fileName)){
					$save = Yii::app()->basePath.'/../uploads/users-profile-images/'.$fileName;
					$uploadedFile->saveAs($save);
					
					$vimage = new resize($save);
					$vimage->resizeImage(126, 117);
					$save_thumb = Yii::app()->basePath . '/../uploads/users-profile-images/thumbs/' . $model->Avatar;
					$vimage->saveImage($save_thumb);
					}
					$this->redirect(array('admin'));
				}
			}
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
		$old_file = $model->Avatar;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];	
			$date = date("Y-m-d H:i:s");
			$model->updated_at = $date;
				
			$_POST['User']['Avatar'] = $model->Avatar;				
			$rnd = rand(0,99999);  // generate random number between 0-99999			
			$uploadedFile=CUploadedFile::getInstance($model,'Avatar');
			
			if($uploadedFile) {
            $fileName = "{$rnd}-{$uploadedFile}"; 
			$model->Avatar = $fileName;
			} 
			
			if($model->save()) {
			
                   
                    if(isset($fileName)){
					$save = Yii::app()->basePath.'/../uploads/users-profile-images/'.$fileName;
					$save_thumb = Yii::app()->basePath . '/../uploads/users-profile-images/thumbs/' . $fileName;
					
					$uploadedFile->saveAs($save); // updloaded original image
					// convert original image to thumb 
					$vimage = new resize($save);
					$vimage->resizeImage(126, 117);					
					$vimage->saveImage($save_thumb);
					
					//delete previous image
					// $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/users-profile-images/'.$model->Avatar);
				    if(file_exists(Yii::app()->basePath.'/../uploads/users-profile-images/'.$old_file))
				    unlink(Yii::app()->basePath.'/../uploads/users-profile-images/'.$old_file);	
					
					
					if(file_exists(Yii::app()->basePath.'/../uploads/users-profile-images/thumbs/'.$old_file))
					unlink(Yii::app()->basePath.'/../uploads/users-profile-images/thumbs/'.$old_file);
					
					
					}
					$this->redirect(array('admin'));
               
				
			}	
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates status a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionChangeStatus($id)
	{
	
	
	$model = $this->loadModel($id);  // use whatever the correct class name is
	if($model->status == '1')
    $model->status = '0';
	else
	$model->status = '1';
	
    $model->save();
    return true;


	}

	
	
	public function actionChangePassword($id)
	{
		$model = new ChangePasswordForm;
		
		if(isset($_POST['ChangePasswordForm']))
		{
			$model->attributes=$_POST['ChangePasswordForm'];	
			
			if ($model->validate()) {
				$user_model=$this->loadModel($id);			            
				$user_model->password = md5(trim($model->password));

					if($user_model->save())
					$this->redirect(array('admin'));
					}	
			}

		$this->render('change_password',array(
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
		
		$model=$this->loadModel($id);
		
		//delete profile image
		// $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/users-profile-images/'.$model->Avatar);
		if(file_exists(Yii::app()->basePath.'/../uploads/users-profile-images/'.$model->Avatar))
		unlink(Yii::app()->basePath.'/../uploads/users-profile-images/'.$model->Avatar);	
		
		
		if(file_exists(Yii::app()->basePath.'/../uploads/users-profile-images/thumbs/'.$model->Avatar))
		unlink(Yii::app()->basePath.'/../uploads/users-profile-images/thumbs/'.$model->Avatar);
		
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
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
	
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}