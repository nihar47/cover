
<script type="text/javascript">

function getstate(str)
{
	if(str=='')
	{
		return false;
	}
	
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else if(window.ActiveXObject) {
			try {
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {
					xmlhttp = false;
				}
			}
		}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById('state_div').innerHTML= xmlhttp.responseText;
			}
		}
		
		var url = '<?php echo site_url('home/getstate'); ?>/'+str;
		
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
	
}
function filename(name)
{
//	alert(name);
	document.getElementById('file_name').value=name;

}
</script>


<div id="headerbar">
	<div class="wrap930">
      	<div class="login_navl">
			
			 <div style="margin:15px 0px 0px 0px; float:left;">
         
         <span style="text-transform:capitalize;color:#2B5F94;font-size:17px; font-weight:bold;">  <?php echo MANAGE_YOUR_ACCOUNT_BELOW; ?> : </span>
          
		  <?php echo YOUR_NAME_DISPLAYED_TO_PEOPLE_YOU_SHARE_YOUR_FUND; ?>
		 
		   </div>
		   	
		   
         
		   	   
		  </div>
		<div class="clear"></div>
	</div>
</div> 
<div id="container">
<div class="wrap930" style="text-align:center;padding:15px 0px 20px 0px;">
		
	<!--side bar user panel-->

<?php echo $this->load->view('default/dashboard_sidebar'); ?>

<!--side bar user panel-->

<div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">
	<style type="text/css">
	.s_lleft
	{	
		width:198px !important;
	}
	.s_right {		
		width: 355px !important;		
	}
	
	</style>
   
		<style type="text/css">

#tab_all a{ color:#000000; text-decoration:none; }

</style>				

   
<?php
	$data['tab_sel'] = CHANGE_PASSWORD;
	$this->load->view('default/dashboard_tabs',$data);

?>
			 <?php
						$attributes = array('name'=>'frm_account');
						echo form_open_multipart('home/change_password',$attributes);
						
				  ?>
         
		   <div class="inner_content" style="margin-top:11px;padding:12px; ">
		      <br />
             <div class="clear"></div>
                
				 <div id="msg" align="center"><span><?php echo $error; ?></span></div>
				 
                    <div class="s_lleft"><label><?php echo OLD_PASSWORD; ?> : *</label></div>
                    <div class="s_right"><span>
                      <input type="password" name="old_password" id="old_password" value="<?php echo $old_password; ?>"  class="btn_input" />
                     </span></div>
					 <div class="clear"></div>
                   
                    <div class="s_lleft"><label><?php echo NEW_PASSWORD; ?> : *</label></div>
                    <div class="s_right"><span>
                      <input type="password" name="new_password" id="new_password" value="<?php echo $new_password; ?>"  class="btn_input" />
                     </span></div>
					 <div class="clear"></div>
                   
                    <div class="s_lleft"><label><?php echo CON_PASSWORD; ?> : *</label></div>
                    <div class="s_right"><span>
                      <input type="password" name="con_password" id="con_password" value="<?php echo $con_password; ?>"  class="btn_input" />
                     </span></div>
					 <div class="clear"></div>
                   
				 
                 
                      
					  
					   <input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id']; ?>" />
                     
					  
					   <div class="s_lleft"> &nbsp;</div>
					   
						 <div class="s_right">					
						
						<input type="submit" class="submit" style="font-weight:bold;" name="login" id="login" value="<?php echo SAVE_CHANGES; ?>"  />
					
						<input type="button" onClick="location.href='<?php echo site_url('home/dashboard');?>'" class="submit" style="font-weight:bold; margin-left:8px;" name="login" id="login" value="<?php echo CANCEL; ?>"   />
																	
						</div>
						
           <div class="clear"></div>
					
                    
                      
					 <div class="clear"></div>
                    
					  </form>
					
               
               
            
			</div>
			
            			 
				
    </div>
	
	<!--con left2-->
	  
	  
	  </div>
	  </div>