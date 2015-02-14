<div data-role="header">
  <h1><?php echo CREATE_PROJECT; ?></h1>
  <?php echo anchor('home','Home','class="ui-btn-right"'); ?> </div>
<div class="pad15"><br />
  <h2> <span id="s1postJ"> 5. <?php echo PERK_ADDITION; ?></span></h2><br />
  
   <div id="nav_forms" class="nav_div">
             <?php
				//$attributes = array('id'=>'frm_project','name'=>'frm_project','onsubmit'=>'return submit_image_valid()');
				$attributes = array('id'=>'frm_project','name'=>'frm_project');
						
				 
			echo form_open_multipart('start_project/create_step5/'.$id, $attributes);
	  ?>
	  
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
				
						<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
							<label class="ui-input-text" for="perk_title"><?php echo PERK_TITLE; ?>:*</label>
							<input type="text" name="perk_title[]" id="perk_title"  class="btn_input" />
						</div>
						
						<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
							<label class="ui-input-text" for="perk_description"><?php echo PERK_DESCRIPTION; ?>:*</label>
							<textarea name="perk_description[]" id="perk_description"  class="btn_textarea"></textarea>
						</div>
						
						<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
								<label class="ui-input-text" for="perk_amount"><?php echo PERK_AMMOUNT; ?>(<?php echo $site_setting['currency_symbol']; ?>):*</label>			<input type="text" name="perk_amount[]" id="perk_amount"  class="btn_input1" />
						</div>
						
						<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
						<label class="ui-input-text" for="perk_total"><?php echo TOTAL_CLAIM; ?>:*</label>
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
		<div id="err1"></div>    
				 
				  <div id="err2"></div>   
				  
				   <div id="err3"></div>                   		
	  
	 </div> 
   </form>
  
  
</div>