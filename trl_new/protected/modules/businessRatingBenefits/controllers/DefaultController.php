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
	/*public function actionCreate()
	{
		$model=new BusinessRatingBenefits;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BusinessRatingBenefits']))
		{
			$model->attributes=$_POST['BusinessRatingBenefits'];
			if($model->save())
				$this->redirect(array('admin','id'=>$model->business_rating_benefits_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}*/
	public function actionCreate()
    {
        $model=new BusinessRatingBenefits;  // this is my model related to table
		
        if(isset($_POST['BusinessRatingBenefits']))
        {
            $rnd = rand(0,9999);  // generate random number between 0-9999
            $model->attributes=$_POST['BusinessRatingBenefits'];
 
            $uploadedFile=CUploadedFile::getInstance($model,'image');
			
		
		//	$newname= $model->getUrlFriendlyString($uploadedFile);
			
          $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
			
		//	$fileName = "{$rnd}-{$newname}";  // random number + file name
			
            $model->image = $fileName;
 
            if($model->save())
            {
		    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/rating_benefits/'.$fileName);  // image will uplode to rootDirectory/banner/
			    $this->redirect(array('admin'));
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
	/*public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BusinessRatingBenefits']))
		{
			$model->attributes=$_POST['BusinessRatingBenefits'];
			if($model->save())
				$this->redirect(array('admin','id'=>$model->business_rating_benefits_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}*/
	
	public function actionUpdate($id)
    {
        $model=$this->loadModel($id);
 
        if(isset($_POST['BusinessRatingBenefits']))
        {
            $model->attributes=$_POST['BusinessRatingBenefits'];
 
            $uploadedFile=CUploadedFile::getInstance($model,'image');
 			if($model->save())
            {
                if(!empty($uploadedFile))  // check if uploaded file is set or not
                {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../uploads/rating_benefits/'.$model->image);
                }
                $this->redirect(array('admin'));
            }
 
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
	/*public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
*/

     public function actionDelete($id)
        {
                if(Yii::app()->request->isPostRequest)
                {
                        // we only allow deletion via POST request
                        try{
                                // $this->loadModel($id)->delete();  // ORIGINAL LINE
  
// modify to:
                              $model = $this->loadModel($id);
                                // then, delete using a function:
                               // $this->deleteMyAssociatedImage($model->logo);
                                // or delete directly directly:  
                             //   @unlink("yourpath_where_you_store_the_image/".$model->filename);
								@unlink(Yii::app()->basePath.'/../uploads/rating_benefits/'.$model->image);

                                // then..delete the model:
                              $model->delete();

                        }
                        catch(CDbException $e){
                        }

                        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                        if(!isset($_GET['ajax']))
                                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                }
                else
                        throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('BusinessRatingBenefits');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new BusinessRatingBenefits('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BusinessRatingBenefits']))
			$model->attributes=$_GET['BusinessRatingBenefits'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BusinessRatingBenefits the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BusinessRatingBenefits::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param BusinessRatingBenefits $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='business-rating-benefits-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}