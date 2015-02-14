


<script type="text/javascript" src="<?php echo base_url(); ?>js2/jquery-1.5.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js2/tabs-navigation.js"></script> 

<script type="text/javascript">
$(document).ready(function() {
   // some code here
		var myVerticalSlide = new Fx.Slide('add_more');
		myVerticalSlide.slideIn();
 });
</script>

<!--<script type="text/javascript" src="<?php //echo base_url(); ?>js/jquery.min.js"></script>

<script type="text/javascript" src="<?php //echo base_url(); ?>js2/date.js"></script> 
<script type="text/javascript" src="<?php //echo base_url(); ?>js2/jquery.datePicker.js"></script>

<link href="<?php //echo base_url(); ?>js2/datePicker.css" rel="stylesheet" />
<script type="text/javascript" charset="utf-8">
Date.format = 'dd-mm-yyyy';
           jQuery(function()
            {

				jQuery('.date-pick').datePicker({clickInput:true})

            });
			



		</script>-->
	
		
<style type="text/css">
a.dp-choose-date {
	float: right;
	width: 16px;
	height: 16px;
	padding: 0;
	margin: 5px 237px 0px 0px;
	display: block;
	text-indent: -2000px;
	overflow: hidden;
	background: url(<?php echo base_url(); ?>js2/calendar-green.gif) no-repeat; 
}

	
	 

</style>

<div id="headerbar">
	<div class="wrap930">
	<!-- dd menu -->	
<div class="login_navl">
			
			
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr><td align="left" >	
	<div class="project_title_hd" style="padding-top:15px;" >
	
	
	<span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo CREATE_PROJECT; ?></span>
	
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




<div id="container" style="background:#FFFFFF;">
	<div class="wrapper" style="min-height:540px;">
	
	
     <?php if($error != "")
				{ ?>
                <div class="error" style="height:auto; margin:4px 0px 0px 0px;">
                <?php echo $error; ?>
                </div>
                <?php } ?>
  
  
  <!-- <div id="content-top" style="border:1px solid #000000; ">	  </div>-->
	
	<div style="height:18px;">&nbsp;</div>
		
	
      	<div class="block block-block step-navigation-block" id="block-block-11">
	    	<!--<div class="block-top">&nbsp;</div>-->
            	<div class="block-inner">
            		<div class="content">
                      
	 					
                       <div id="step-navigation">
                            <ul>
                               <li id="1" class=""><a href="<?php echo base_url(); ?>start_project/create_step1/<?php echo $id; ?>" ><span>&nbsp;</span></a></li>
                                <li id="2" class=""><a href="<?php echo base_url(); ?>start_project/create_step2/<?php echo $id; ?>" ><span>&nbsp;</span></a></li>
                                <li id="3" class=""><a href="<?php echo base_url(); ?>start_project/create_step3/<?php echo $id; ?>"><span>&nbsp;</span></a></li>
                                <li id="4" class=""><a href="<?php echo base_url(); ?>start_project/create_step4/<?php echo $id; ?>"><span>&nbsp;</span></a></li>
                             	<li id="5" class="first selected"><a href="#" class="5"  ><span>&nbsp;</span></a></li>
                            </ul>
                        					
						</div>
						
						  <div id="step-navigation2">
						 	 <ul>
                                <li style="padding-left:85px;"><span><?php echo PROJECT_DEATAILS; ?></span></li>
                                <li style="padding-left:45px;"><span><?php echo CAMPAIGN_DETAILS ?></span></li>
                                <li style="padding-left:35px;"><span><?php echo PROJECT_DESCRIPTION; ?></span></li>
                                <li style="padding-left:30px;"><span><?php echo ADDITIONAL_MEDIA; ?></span></li>
                             	<li style="padding-left:55px;"><span><?php echo PERK_ADDITION; ?></span></li>
                            </ul>
						</div>
						
						
                      
	
			</div>
            <div class="clear"><!-- --></div>
            </div> <!-- /block-inner, /block -->
           
      	</div>
      <!--left part for tab-->
	  <div style="float:left;">
	  
	  		<div id="cur_tab">5. <?php echo PERK_ADDITION; ?></div>
	  
	  </div>
	  
	 <!--left part for tab-->
	  
	   <div id="nav_forms" class="nav_div">
             <?php
				//$attributes = array('id'=>'frm_project','name'=>'frm_project','onsubmit'=>'return submit_image_valid()');
				$attributes = array('id'=>'frm_project','name'=>'frm_project');
						
				 
			echo form_open_multipart('start_project/create_step5/'.$id, $attributes);
	  ?>
												     
<!--------------Step-1---------------------->
            	
<!--------------Step-2---------------------->
                
<!--------------Step 3---------------------->                 
                
<!--------------step-4---------------------->
                
<!--------------step-5----------------------> 
					
				<div id="step5" class="div" style="display:block;">
					<script language="javascript" type="text/javascript">
						function append_div()
						{
							var tmp_div = document.createElement("div");
							tmp_div.className = "inner_content_two";
							
							
							var perk_cnt=document.getElementById('perk_cnt').value;
							document.getElementById('perk_cnt').value=parseInt(perk_cnt)+1;
							var num=parseInt(perk_cnt)+1;
							
							tmp_div.id='perk'+num;
							
							content=document.getElementById('more').innerHTML;							
						
								
							var str = '<div onclick="remove_perk_div('+num+')" style="text-align:right;font-weight:bold;cursor:pointer;color:#990000;"><?php echo REMOVE; ?></div>';
								
							tmp_div.innerHTML = content +str;
							document.getElementById('add_more').appendChild(tmp_div);
							
							var myVerticalSlide = new Fx.Slide('add_more');
							myVerticalSlide.slideIn();
						}
						function remove_perk_div(id)
						{						
					
							var element = document.getElementById('perk'+id);
							var add_more = parent.document.getElementById('add_more');
							
							var add_parent=add_more.parentNode.offsetHeight;
							
							
							var remove_height=parseInt(element.offsetHeight)+20;
							
							var final_height=add_parent - remove_height;
							
							
							
							
							element.parentNode.removeChild(element);
							add_more.parentNode.style.height = final_height+'px';
							
						
						
						}
						
						
					</script>
					<div id="add_more">
					<div id="more" class="inner_content_two">
				
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text"><?php echo PERK_TITLE; ?>:*</label>
							</div>
							<input type="text" name="perk_title[]" id="perk_title"  class="btn_input" />
						</div>
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text"><?php echo PERK_DESCRIPTION; ?>:*</label>
							</div>
							<textarea name="perk_description[]" id="perk_description"  class="btn_textarea"></textarea>
						</div>
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text"><?php echo PERK_AMMOUNT; ?>(<?php echo $site_setting['currency_symbol']; ?>):*</label>
							</div>
							<input type="text" name="perk_amount[]" id="perk_amount"  class="btn_input1" />
						</div>
						<div class="form-element-container">
							<div class="form-label">
								<label class="all_text"><?php echo TOTAL_CLAIM; ?>:*</label>
							</div>
							<input type="text" name="perk_total[]" id="perk_total"  class="btn_input1" />
						</div>
					</div>
					
					</div>
					<input type="hidden" name="perk_cnt" id="perk_cnt" value="1" />
					<div><img src="<?php echo base_url(); ?>images/add.png" height="16" width="16" border="0" title="Add More" onclick="append_div();" style="cursor:pointer;" /></div>
					
					
					
					
				<?php $chk_paypal=$this->home_model->check_project_user_paypal_add();

						if($chk_paypal==0) {  ?>
				
				<div align="center" style="padding:10px;"><?php echo anchor('home/verify_paypal/',PLEASE_SETUP_PAYPAL_EMAIL_ADDRESS,'style="color:#FF0000;" target="_blank" ');?></div>
				
				
				<?php }  $chk_amazon=$this->home_model->check_project_user_amazon_add();

						if($chk_amazon==0) {  ?>
                        
              <div align="center" style="padding:10px;"><?php echo anchor('home/amazon_account_verify/',PLEASE_SETUP_OR_VERIFY_AMAZON_ACCOUNT); ?> </div>
			   
			   
			  <?php }   ?>
              
              
              
					
					
					<div  style="float: left;padding-left: 200px;margin-right:0px;">
                      		<input type="hidden"  name="id" id="id"  value="<?php echo $id; ?>" />
							<input type="submit"  name="back" id="back" class="draft" border="none"  title="<?php echo BACK; ?>" value="<?php echo BACK; ?>" />
						</div>
                        
						  <div class="form-element-container" style="float:left;">
							<input type="submit"  name="next" id="next" class="draft" border="none"  title="<?PHP echo NEXT; ?>" value="<?PHP echo NEXT; ?>" />
						</div>
                       <div class="form-element-container" style="float:left;">
							<input type="submit"  name="draft" id="draft" class="draft" border="none"  title="<?php echo SAVE; ?>" value="<?php echo SAVE; ?>" />
						</div>
					
					
					
				</div>  
	<!--------------step-5----------------------> 			
				
				
				 <div id="err1"></div>    
				 
				  <div id="err2"></div>   
				  
				   <div id="err3"></div>                   
                         
                </div>
               
               
            </form>
       </div>     
    </div>
</div>
