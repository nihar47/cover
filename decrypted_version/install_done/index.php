<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Install Fundraisingscript</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!--[if IE 6]>
	<script type="text/javascript" src="unitpngfix.js"></script>
<![endif]--> 
</head>
<body>
<div class="wrap">

    	<div class="logo"><a href="index.html"><img src="images/logo.png" alt="" title="" border="0" /></a></div>
        
         
    
  
    
    
    
    
    <div class="main_content">
    		
			
			<div style="padding:15px;">
			
			<h2 style="padding:25px 0px 0px 0px;">Start Your Installation</h2>
			
			
			<?php 
			
$chk_arr=array();
$server_path=getcwd();	
	
$chk_setting=true;	
	
	
	if (phpversion() >= '5.0.0') {
		$chk_arr['PHP_Version']='<div class="success">PHP 5.0.0 or higher.</div>';
	} else {
		$chk_arr['PHP_Version']='<div class="error">Your host needs to use PHP 5.0.0 or higher to run Fundraisingscript.</div>';
		$chk_setting=false;	
	}
	
	
	
	
	
	if (extension_loaded('zlib'))
	{
		$chk_arr['zlib']='<div class="success">zlib extension is Active.</div>';
	} else {
		$chk_arr['zlib']='<div class="error">Your host needs to activate the zlib Libraray.</div>';
		$chk_setting=false;	
	}
	
	
	
	if (extension_loaded('xml'))
	{
		$chk_arr['xml']='<div class="success">XML extension is Active.</div>';
	} else {
		$chk_arr['xml']='<div class="error">Your host needs to activate the xml Libraray.</div>';
		$chk_setting=false;	
	}
	
	
	if(function_exists('mysql_connect') || function_exists('mysqli_connect'))
	{ 
		$chk_arr['MySQL_Connect']='<div class="success">Function Exists.</div>';
	} else {
		$chk_arr['MySQL_Connect']='<div class="error">MySQL_Connect Function does not Exists.</div>';
		$chk_setting=false;	
	}
	
	if (extension_loaded('gd')) 
	{
		$chk_arr['GD_Libraray']='<div class="success">GD Library is Active.</div>';		
	} else {	
		$chk_arr['GD_Libraray']='<div class="error">GD Library is Not Active.</div>';
		$chk_setting=false;	
	}


/*	if(function_exists('apache_get_modules')) 
	{ 
		$module_arr=apache_get_modules();
		
		
		if(in_array('mod_rewrite',$module_arr))
		{
			$chk_arr['Mod_Rewrite']='<div class="success">Module Rewrite is installed.</div>';
		} else { 
			$chk_arr['Mod_Rewrite']='<div class="error">Module Rewrite is not installed.</div>';
			$chk_setting=false;	
		}
	
	} else {
		
		
		 
		 $test_base_url=str_replace('/install/index.php','','http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		 $test_base_url=str_replace('/install','',$test_base_url);		
		
		if(function_exists('file_get_contents')) 
		{ 
			 $show_cc = file_get_contents($test_base_url."test.php");
			
			if($show_cc=='mod_rewrite is working')
			{
				$chk_arr['Mod_Rewrite']='<div class="success">Module Rewrite is installed.</div>';	
			} else {
				$chk_arr['Mod_Rewrite']='<div class="error">Module Rewrite is not installed.</div>';
				$chk_setting=false;		
			}
			
		} else {
		
				$chk_arr['Mod_Rewrite']='<div class="success">Module Rewrite is installed.</div>';	
		}	
		
		
	}*/
	
	
	
	
	
	if(function_exists('get_loaded_extensions')) 
	{ 
		$ext_arr=get_loaded_extensions();
		
		if(in_array('ionCube Loader',$ext_arr))
		{
			$chk_arr['ionCube_Loader']='<div class="success">ionCube Loader is installed.</div>';
			
		} else { 
						
		$__oc=strtolower(substr(php_uname(),0,3));
		$__ln='ioncube_loader_'.$__oc.'_'.substr(phpversion(),0,3).(($__oc=='win')?'.dll':'.so');
		
		if(function_exists('dl'))
		{
			@dl($__ln);
		}
		
		if(function_exists('_il_exec'))
		{
			return _il_exec();
		}
		
		$__ln='/ioncube/'.$__ln;
		$__oid=$__id=realpath(ini_get('extension_dir'));
		$__here=dirname(__FILE__);
		
		if(strlen($__id)>1&&$__id[1]==':')
		{
			$__id=str_replace('\\','/',substr($__id,2));
			$__here=str_replace('\\','/',substr($__here,2));
		}
		
		$__rd=str_repeat('/..',substr_count($__id,'/')).$__here.'/';
		$__i=strlen($__rd);
		
		while($__i--)
		{
			if($__rd[$__i]=='/')
			{
				$__lp=substr($__rd,0,$__i).$__ln;
				
				if(file_exists($__oid.$__lp))
				{
					$__ln=$__lp;
					break;
				}
			}
		}
		
		
		if(function_exists('dl'))
		{
			@dl($__ln);
		}
			
		$chk_arr['ionCube_Loader']='<div class="error">Requires the ionCube PHP Loader '.basename($__ln).' to be installed.</div>';
		$chk_setting=false;	
			
			
			
		}
	
	} else {
		 
						
		$__oc=strtolower(substr(php_uname(),0,3));
		$__ln='ioncube_loader_'.$__oc.'_'.substr(phpversion(),0,3).(($__oc=='win')?'.dll':'.so');
		
		if(function_exists('dl'))
		{
			@dl($__ln);
		}
		
		if(function_exists('_il_exec'))
		{
			return _il_exec();
		}
		
		$__ln='/ioncube/'.$__ln;
		$__oid=$__id=realpath(ini_get('extension_dir'));
		$__here=dirname(__FILE__);
		
		if(strlen($__id)>1&&$__id[1]==':')
		{
			$__id=str_replace('\\','/',substr($__id,2));
			$__here=str_replace('\\','/',substr($__here,2));
		}
		
		$__rd=str_repeat('/..',substr_count($__id,'/')).$__here.'/';
		$__i=strlen($__rd);
		
		while($__i--)
		{
			if($__rd[$__i]=='/')
			{
				$__lp=substr($__rd,0,$__i).$__ln;
				
				if(file_exists($__oid.$__lp))
				{
					$__ln=$__lp;
					break;
				}
			}
		}
		
		
		if(function_exists('dl'))
		{
			@dl($__ln);
		}
			
		$chk_arr['ionCube_Loader']='<div class="error">Requires the ionCube PHP Loader '.basename($__ln).' to be installed.</div>';
		$chk_setting=false;	
			
	}
	
	
	echo "<pre><br /><br />";
	
	
	foreach($chk_arr as $ext => $chk)
	{
				echo $ext."&nbsp;&nbsp;".$chk."<br/><br/>";
	}
	
	
	if($chk_setting==false)
	{	
		echo "Please Active or Extend your server with the necessary Requirement extension or modules.";
		
	} else {  
	
		echo "All setting is ok Please click on the Installation button.";
	 		?>
		 <div align="center"><a href="configure_installation.php" class="read_more">INSTALL</a> </div> 		
		<?php 
	 }
	
	
	
	
	?>
			
			
			
			
			
			
			
			
			
			</div>
			
            
            
            
            
            
            <div class="clear"></div>
    </div><!--End of main_content-->

    
</div><!--End of wrap-->

<div class="footer">
	<div class="footer_content">
    
    	<div class="left_footer_content">
       
            <p>
        
            <span class="brown">&copy; Copyright Fundrasing Script. All Rights Reserved.</span>            
            </p>
        
        </div>
    
        
        
       
        
	</div>
</div><!--End of footer-->



</body>
</html>