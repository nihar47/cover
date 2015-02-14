

<!--[if IE]>  
<script src="<?php echo base_url(); ?>js/html5.js"></script>
<![endif]-->  
<script src="<?php echo base_url(); ?>js/jquery.js" type="text/javascript"></script>
	
	<script src="<?php echo base_url(); ?>js/jquery.treeview.js" type="text/javascript"></script>
	
	<script type="text/javascript">
    $(document).ready(function(){
	
	// first example
	$("#browser").treeview({
		persist: "location",
		collapsed: true,
		unique: true
	});
	
	
});
    </script>
			
		<div class="faq_sidebar_div" >	
        	<ul id="browser" class="filetree">
                <li><span class="folder" id="faq_title" style="border-bottom:1px solid #959394; "><?php echo FAQ;?></span> 
					
                    <ul>
                        
						
					<?php if($all_faq_category) {  $fcatcnt=1;  
					
					 		
							foreach($all_faq_category as $parent) { ?>
						
						<li><span class="folder" style="border-bottom:none; text-transform:capitalize;"><img src="<?php echo base_url();?>images/li_arr.png" alt="" style="margin:0px 5px;"/><?php echo $parent->faq_category_name; ?></span>
                           
						   
			<?php $all_sub_faq_category=$this->help_model->get_sub_faq_category($parent->faq_category_id);
			
					if($all_sub_faq_category) {  ?>
					 	
						<ul id="folder1<?php echo $fcatcnt; ?>">   
						
						<?php foreach($all_sub_faq_category as $sub) { ?>
						         
                                <li><span class="file"><?php echo anchor('help/faq/'.$parent->faq_category_url_name.'#'.$sub->faq_category_url_name,$sub->faq_category_name,'style="text-transform:capitalize;"'); ?></span></li>                               
                           
						   <?php } ?>
						   
						    </ul>
						
						<?php }  ?>	
							
                        </li>
						
						
						<?php $fcatcnt++; } } else { ?> <li><?php echo NO_FAQ;?></li> <?php } ?>
                       
                    </ul>
               
			   
			    </li>
				
				
				
				
                
                <li><span class="folder" id="fund_title" style="border-bottom:1px solid #959394; text-transform:uppercase;"><?php echo $site_setting['site_name'];?> School</span>
					
                    <ul>
                        
						
					<?php if($school_title_list) {  
					
					 		
							foreach($school_title_list as $title) { ?>
						
						<li><span class="folder" style="border-bottom:none;"><img src="<?php echo base_url();?>images/li_arr.png" alt="" style="margin:0px 5px;"/><?php echo anchor('help/school/'.$title->school_url_title,$title->title,'class="school_title_link"'); ?></span>
                        
						
                        </li>
						
						
						<?php  } } else { ?> <li><?php echo NO_SCHOOL;?></li> <?php } ?>
                       
                    </ul>
                </li>
                
                <li><span class="folder" id="guide_title"><?php echo anchor('help/guidelines',GUIDELINES); ?></span>
                </li>
		
	</ul>
    		<br />
			<div class="sb_srch_txt">
			<script type="text/javascript" language="javascript">
				function remove_text_help()
				{
					if(document.getElementById('searchprj_help').value == "<?php echo SEARCH;?>" || document.getElementById('searchprj_help').value == "<?php echo PLEASE_ENTER_SEARCH_KEYWORD;?>" || document.getElementById('searchprj_help').value == "<?php echo SEARCH_FAQ;?>")
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
					if(document.getElementById('searchprj_help').value == "" || document.getElementById('searchprj_help').value == "<?php echo SEARCH;?>" || document.getElementById('searchprj_help').value == "<?php echo PLEASE_ENTER_SEARCH_KEYWORD;?>" || document.getElementById('searchprj_help').value == "<?php echo SEARCH_FAQ;?>")
					{
						document.getElementById('searchprj_help').value = "<?php echo PLEASE_ENTER_SEARCH_KEYWORD;?>";
						document.getElementById('searchval_help').value = "<?php echo PLEASE_ENTER_SEARCH_KEYWORD;?>";
						return false;
					}else{
						document.frmsearchhelp.submit();
					}
				}
			</script>
			<?php
	$attributes = array('name'=>'frmsearchhelp','onsubmit'=>'return form_validate_help()','autocomplete'=>'off');
	echo form_open_multipart('help/search',$attributes);
?>
			
					<input type="text" name="searchprj_help" id="searchprj_help"  onfocus="remove_text_help();" onblur="set_text_help()" value="<?php echo SEARCH_FAQ;?>" />
						<input type="hidden" name="searchval_help" id="searchval_help" value="<?php echo PLEASE_ENTER_SEARCH_KEYWORD;?>" /></div>
						<input type="submit" class="sb_srch_btn"  value="" onclick="form_validate_help();" />
						
				</form>
			
 			      
        </div>
		
		
		
		
