<?php

class DefaultController extends Controller
{
	
	public function actionGetlocation()
	{	
		$this->layout="no-layout";
		$this->render('getlocation');
	}
	
	public function actionGetcategory()
	{	
		$this->layout="no-layout";
		$this->render('getcategory');
	}

	
}