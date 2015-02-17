<?php

class BusinessModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'business.models.*',
			'business.components.*',
			
			'application.modules.businessAddress.models.*',        // businessAddress
            'application.modules.businessAddress.components.*',
			   
			'application.modules.businessLocation.models.*',        // businessLocation
            'application.modules.businessLocation.components.*',
				
			'application.modules.businessCategory.models.*',        // businessCategory
            'application.modules.businessCategory.components.*',

			
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
