<style type="text/css">
#error p{
	color:#FF0000;
}
#error span{
	color:#0000FF;
}
</style>

<div id="headerbar">
	<div class="wrap930">
	
	<!-- dd menu -->	
<div class="login_navl">
		
			
			
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr><td align="left" >	
	<div class="project_title_hd" style="padding-top:15px;" >
	
	
	<span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo AFFILIATE_REQUEST; ?></span>
	
	</div>
	</td>
	<td align="right" >	
	
	<div class="project_title_hd" style="padding-top:15px; "  >
	<span id="sddm" style="float:right;">
		
		<?php if($this->session->userdata['project_id']!='' && $this->session->userdata['project_id']!=0) {  ?>
		
	 <?php echo anchor('user/my_project/',CHANGE_PROJECT,' style="text-transform:capitalize;color:#2B5F94;font-size:17px;text-decoration:none;" '); ?>
		
		<?php } ?>
		
	</span>
	</div>

</td></tr></table>

		  </div> 
		      
		<div class="clear"></div>
	</div>
</div>
<div id="container">
<div class="wrap930" style="padding:15px 0px 20px 0px;">	

<!--side bar user panel-->

<?php echo $this->load->view('default/dashboard_sidebar'); ?>

<!--side bar user panel-->


<div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">
           			
              
<style type="text/css">

#tab_all a{ color:#000000; text-decoration:none; }

#sts:hover{ font-weight:bold; }
</style>				
			


<?php
	$data['select']=$select;

	$this->load->view('default/affiliate/tab',$data);

?>


     
      
 <div class="inner_content" style=" margin-top:11px;padding:12px; ">
		         
				
			<h3 id="dropmenu2"><?php echo AFFILIATE_REQUEST; ?> </h3>
            
            
              <div class="clear"></div> 
  <!--noop-->
  
  
   <?php 			
		$affiliate_content=$affiliate_setting->affiliate_content;	
		
		if($affiliate_content!='') { ?>
        		
  <div id="recent-donate-detail">
        <div id="donor-update">
			<ul>
				<li class="">
  
 			<?php				
				$affiliate_content=str_replace('KSYDOU','"',$affiliate_content);
				$affiliate_content=str_replace('KSYSING',"'",$affiliate_content); 
				
				echo $affiliate_content;
			 ?>
             </li>
           </ul>
        </div> 
  </div>
  
  <div class="clear"></div>
  
  <?php } ?>
  
  
		<?php
			if($error)
			{
				echo '<div id="msg" align="center"><span>'.$error.'</span></div>';
			}
			
			
			$attributes = array('name' => 'frm_request');
			echo form_open('affiliate/request', $attributes);
		?>
		<div>
			<div align="right" class="normal_label" style="float:left;width:235px;padding-right:25px;"><?php echo SITE_CATEGORY;?><span style="color:#FF0000;">*</span></div>
			<div style="margin-bottom:10px;">
				<select name="site_category" id="site_category" class="btn_input" style="margin-bottom:5px; padding:0px;">
					
					<?php
						if($categories)
						{
							foreach($categories as $cat)
							{
								echo '<option value="'.$cat->project_category_id.'"';
								if($cat->project_category_id == $site_category)
								{
									echo 'selected="selected"';
								}
								echo '>'.ucwords($cat->project_category_name).'</option>';
							}
						}
					?>
				</select>
			</div>
		</div>
		<div>
			<div align="right" class="normal_label" style="float:left;width:235px;padding-right:25px;"><?php echo SITE_NAME;?><span style="color:#FF0000;">*</span></div>
			<div style="margin-bottom:10px;"><input type="text" name="site_name" id="site_name" value="<?php echo $site_name; ?>" class="btn_input" /></div>
		</div>
		<div>
			<div align="right" class="normal_label" style="float:left;width:235px;padding-right:25px;"><?php echo SITE_DESCRIPTION;?></div>
			<div style="margin-bottom:10px;"><textarea name="site_description" id="site_description" class="btn_textarea"  style="max-width: 250px;max-height: 66px;"><?php echo $site_description; ?></textarea></div>
		</div>
		<div>
			<div align="right" class="normal_label" style="float:left;width:235px;padding-right:25px;"><?php echo SITE_URL;?><span style="color:#FF0000;">*</span></div>
			<div style="margin-bottom:10px;"><input type="text" name="site_url" id="site_url" value="<?php echo $site_url; ?>" class="btn_input" /></div>
		</div>
		<div>
			<div align="right" class="normal_label" style="float:left;width:235px;padding-right:25px;"><?php echo WHY_DO_YOU_WANT_AN_AFFILIATE;?><span style="color:#FF0000;">*</span></div>
			<div><textarea name="why_affiliate" id="why_affiliate" class="btn_textarea" style="max-width: 250px;max-height: 66px;"><?php echo $why_affiliate; ?></textarea></div>
		</div>
		<div>
			<div align="right" style="float:left;width:235px;padding-right:25px;">&nbsp;</div>
			<div class="normal_label" style="float:none;width:auto;"><input type="checkbox" name="web_site_marketing" id="web_site_marketing" value="1" <?php if($web_site_marketing == '1'){ echo 'checked="checked"'; } ?> />&nbsp;<?php echo WEB_SITE_MARKETING;?></div>
		</div>
		<div>
			<div align="right" style="float:left;width:235px;padding-right:25px;">&nbsp;</div>
			<div class="normal_label" style="float:none;width:auto;"><input type="checkbox" name="search_engine_marketing" id="search_engine_marketing" value="1" <?php if($search_engine_marketing == '1'){ echo 'checked="checked"'; } ?> />&nbsp;<?php echo SEARCH_ENGINE_MARKETING;?></div>
		</div>
		<div>
			<div align="right" style="float:left;width:235px;padding-right:25px;">&nbsp;</div>
			<div class="normal_label" style="float:none;width:auto;"><input type="checkbox" name="email_marketing" id="email_marketing" value="1" <?php if($email_marketing == '1'){ echo 'checked="checked"'; } ?> />&nbsp;<?php echo EMAIL_MARKETING;?></div>
		</div>
		<div>
			<div align="right" class="normal_label" style="float:left;width:235px;padding-right:25px;"><?php echo SPECIAL_PROMOTIONAL_METHOD;?></div>
			<div style="margin-bottom:10px;"><input type="text" name="special_promotional_method" id="special_promotional_method" value="<?php echo $special_promotional_method; ?>" class="btn_input" /></div>
		</div>
		<div>
			<div align="right" class="normal_label" style="float:left;width:235px;padding-right:25px;"><?php echo SPECIAL_PROMOTIONAL_DESCRIPTION;?></div>
			<div style="margin-bottom:10px;"><textarea name="special_promotional_description" id="special_promotional_description" class="btn_textarea" style="max-width: 250px;max-height: 66px;"><?php echo $special_promotional_description; ?></textarea></div>
		</div>
		<div>
			<div align="right" style="float:left;width:235px;padding-right:25px;">&nbsp;</div>
			<div><input type="submit" class="submit" value="Request" /></div>
		</div>
          <div class="clear"></div>		
		</form>
        
        
        
       <!--noop-->
     </div>
		</div>
        <div class="clear"></div>		
				
				
					</div>
	<!-- left end ------>
		
       </div>