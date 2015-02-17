<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class BusinessLogin extends CFormModel
{
	public $business_id;
	public $password;
	public $salt;
	public $rememberMe;
	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that business_id and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// business_id and password are required
			array('business_id, password, salt', 'required'),
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
			
		
		);
	}


	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new BusinessUserIdentity($this->business_id,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect business_id or password.');
		}
	}

	/**
	 * Logs in the user using the given business_id and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
	
		if($this->_identity===null)
		{ 
			$this->_identity=new BusinessUserIdentity($this->business_id,$this->password);
			 $this->_identity->authenticate();
			
		}
		if($this->_identity->errorCode===BusinessUserIdentity::ERROR_NONE)
		{
		
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else 
		return false;
		
	}
	

}
