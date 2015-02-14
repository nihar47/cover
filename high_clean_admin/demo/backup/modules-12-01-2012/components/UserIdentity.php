<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	public $isBanned;
	
	
	public function authenticate()
	{

		
			//$users= User::model()->findByAttributes(array('username'=>$this->username));

		$users = User::model()->findByAttributes(array(),
		array( 'condition'=>'status=:status and username=:username or email=:email',
				'params'=>array(':status'=>'1', 
				'username' => $this->username, 
				'email'=> $this->username
				) 
			)
	);
	   
             if($users!=null){
              $this->password = md5($this->password);
             }
            if($users===null) {
                $this->errorCode = self::ERROR_USERNAME_INVALID;                
            }
             else if($users->password != $this->password){
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
            }
       
            else {
			
                $usergroup = Group::model()->findByAttributes(array('id'=>$users->role_id));

                $this->errorCode = self::ERROR_NONE;
				$this->_id = $users->id;
				$this->username = $usergroup->role_val;
				$this->setState('profile', $usergroup->role_val);           
				$this->setState('first_name', $users->first_name);
            }

			return !$this->errorCode;
        }
	
        
             
        public function getId() {
            return $this->_id;
        }

}