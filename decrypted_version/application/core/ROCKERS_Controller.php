<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



	require_once(APPPATH.'helpers/language_helper'.EXT);

	require_once(APPPATH.'helpers/custom_helper'.EXT);

	

class ROCKERS_Controller extends CI_Controller {



    public function __construct()

	{

	

	

		// get the CI superobject

		$CI =& get_instance();

		

		parent::__construct(); 

		

		/***** language *****/

		

		$supported_language=get_supported_lang();

		$default_language=get_current_language();

		$default_folder=$supported_language[$default_language];

		

		// Whatever we decided the lang was, save it for next time to avoid working it out again

		$lang = $_SESSION['lang_code'];

		

		// If no language has been worked out - or it is not supported - use the default

		if(empty($lang) or !in_array($lang, array_keys($supported_language)))

		{

			$lang = $default_language;

		}

			

		////////======check for $lang set====

		if(isset($lang))

		{

			if($lang!='')

			{

				$change_folder=$supported_language[$lang];

			}

		}

		

		////////======check for language folder exists====

		if(file_exists(base_path().'system/language/'.$change_folder))

		{

			if(file_exists(base_path().'application/language/'.$change_folder))

			{

			}

			else

			{

				$change_folder=$default_folder;

				$_SESSION['lang_code'] = $default_language;

				$this->config->set_item('language', $change_folder);

			}				

		}

		else

		{

			$change_folder=$default_folder;

			$_SESSION['lang_code'] = $default_language;

			$this->config->set_item('language', $change_folder);

		}

		

		 $_SESSION['lang_folder'] = $change_folder;

		 

		 /////===lock front side language=======

		 $this->config->set_item('language', $change_folder);

		 

		 

		/////===load the language files=======

		

		$this->lang->load('header',$_SESSION['lang_folder']); 

		$this->lang->load('user',$_SESSION['lang_folder']); 

		$this->lang->load('dashboard',$_SESSION['lang_folder']); 

		$this->lang->load('project',$_SESSION['lang_folder']); 

		$this->lang->load('help',$_SESSION['lang_folder']); 

		 

		 /***** language *****/

	}

	

} 



// END MY_Controller class



/* End of file MY_Controller.php */

/* Location: ./application/core/MY_Controller.php */