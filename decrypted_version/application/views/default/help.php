<style>


</style>
<section>
		<div id="page_we">

			 <div class="center"> <img src="<?php echo base_url();?>images/welcome.jpg" width="116" height="34" border="0px" /> <br />
      <img src="<?php echo base_url();?>images/the.jpg" width="55" height="39" border="0px" />
      <div class="help"><?php echo HELP_CENTER;?> </div>
      <font style="font-size:14px; color:#333;"><?php echo DEFENSE_AGAINST_PROBLEMS;?></font><br />
	<br /><br />
	<script type="text/javascript" language="javascript">
				function remove_text_help()
				{
					if(document.getElementById('searchprj_help').value == "<?php echo SEARCH;?>" || document.getElementById('searchprj_help').value == "<?php echo PLEASE_ENTER_SEARCH_KEYWORD;?>")
					{
						document.getElementById('searchprj_help').value = "";
					}
				}
				function set_text_help()
				{
					if(document.getElementById('searchprj_help').value == "")
					{
						document.getElementById('searchprj_help').value = document.getElementById('searchval_help').value;
					}
				}
				function form_validate_help()
				{
					if(document.getElementById('searchprj_help').value == "" || document.getElementById('searchprj_help').value == "<?php echo SEARCH;?>" || document.getElementById('searchprj_help').value == "<?php echo PLEASE_ENTER_SEARCH_KEYWORD;?>")
					{
						document.getElementById('searchprj_help').value = "<?php echo PLEASE_ENTER_SEARCH_KEYWORD;?>";
						document.getElementById('searchval_help').value = "<?php echo PLEASE_ENTER_SEARCH_KEYWORD;?>";
						return false;
					}else{
						document.frmsearchhelp.submit();
					}
				}
			</script>
			
			
			
			<p><h3 class="faq_title"><?php echo FAQ;?></h3><span class="b_more"></span></p>
			<div class="clear"></div>
			<div class="help_srch">
				<?php
	$attributes = array('name'=>'frmsearchhelp','onsubmit'=>'return form_validate_help()','autocomplete'=>'off');
	echo form_open_multipart('help/search',$attributes);
?>
					<div class="help_srchtxt"><input type="text" name="searchprj_help" id="searchprj_help" value="<?php echo PLEASE_ENTER_SEARCH_KEYWORD;?>" onfocus="remove_text_help();" onblur="set_text_help()" /></div>
						<input type="hidden" name="searchval_help" id="searchval_help" value="<?php echo PLEASE_ENTER_SEARCH_KEYWORD;?>" />
					<input type="submit" class="help_srchbtn" value="" onclick="form_validate_help();" />
					<div class="clear"></div>
				</form>				
			</div>
			
			<div class="faq_con">
			
			
			
			<?php if($faq_category) {  $fcnt=0;  foreach($faq_category as $fcat) { ?>
			
				<div class="faq_div">
					<h3 style="text-transform:capitalize;"><?php echo anchor('help/faq/'.$fcat->faq_category_url_name,$fcat->faq_category_name); ?></h3>
					<ul>
						
						<?php $get_faq=$this->help_model->get_help_faq($fcat->faq_category_id);
					          
							  if($get_faq) {  foreach($get_faq as $hfaq) { 
							  
							  $faq_div_title=str_replace("'","",str_replace(array(',','+','"','%','!','@','#','$','^','&','*','(',')',';','?','<','>','/',':','`','~','-','.','..','...'),'',str_replace(' ','',$hfaq->question)));
							 
							
							 
							 
							 
							  $get_parent_category2=$this->help_model->get_parent_category_detail($hfaq->faq_category_id);
					
								if($get_parent_category2)
								{
									$parent_name2=$get_parent_category2->faq_category_url_name.'#';
								}
								
								else
								{
									$parent_name2='#';
								}
							  
							  
							  echo '<li>'.anchor('help/faq/'.$parent_name2.$faq_div_title,$hfaq->question,'style="text-transform:capitalize;"').'</li>';  
							 } } else { echo NO_FAQ; } ?> 
						
					</ul>
					<?php 
					
					$get_parent_category=$this->help_model->get_parent_category_detail($fcat->faq_category_id);
					
					if($get_parent_category)
					{
						$parent_name=$get_parent_category->faq_category_url_name.'#';
					}
					
					else
					{
						$parent_name='';
					}
					echo '<div class="clear" ></div>';
					echo anchor('help/faq/'.$parent_name.$fcat->faq_category_url_name,SEE_ALL,'class="all_btn"'); ?>
				</div>
				
				
				<?php   $fcnt++;   if($fcnt>3) { $fcnt=0; ?> <div class="clear" ></div> <?php }  } }  ?>
				
				
				
				
				
				 <div class="clear"></div>
			</div>
			
			
			<br /><br />
				<p><span class="b_more"></span></p>
			<br />
			
		<p style="text-align:center;"><?php echo anchor('help/school','<img src="'.base_url().'images/school_logo.jpg" alt="#" />'); ?></p><br />
			<div class="sc_para" style="width:707px;"><p><?php echo SCHOOL_NEWCOMER;?><?php echo anchor('help/school',CHECK_IT_OUT);?></p>
				<span><img src="<?php echo base_url();?>images/logo1.jpg" alt="" /></span>
				<span><img src="<?php echo base_url();?>images/gift.jpg" alt="" /></span>
				<span><img src="<?php echo base_url();?>images/logo3.jpg" alt="" /></span>
				<span><img src="<?php echo base_url();?>images/logo4.jpg" alt="" /></span>
				<span><img src="<?php echo base_url();?>images/logo5.jpg" alt="" /></span>
				<span><img src="<?php echo base_url();?>images/logo6.jpg" alt="" /></span>
				<span><img src="<?php echo base_url();?>images/logo7.jpg" alt="" /></span>
				<span><img src="<?php echo base_url();?>images/logo8.jpg" alt="" /></span>
			</div>
			
			<div class="guide_div">
				<h3><?php echo GUIDELINES;?></h3>
				<p><?php printf(GUIDE_TEXT_ON_HELP,$site_setting['site_name'],site_url('help/guidelines'));?> </p>
			</div>
			<div class="press_div">
				<h3><?php echo PRESS;?></h3>
				<p><b><?php printf(PRESS_MEMBER,$site_setting['site_name']);?>?
<?php echo LET_US_KNOW;?></b></p>
			</div>
			<div class="clear"></div>

	  </div>
</div></section>	
	

