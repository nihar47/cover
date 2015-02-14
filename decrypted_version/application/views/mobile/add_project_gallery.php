	<div id="headerbar">
	<div class="wrap930">
	
	<!-- dd menu -->	
<div class="login_navl">
		
			
			
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr><td align="left" >	
	<div class="project_title_hd" style="padding-top:15px;" >
	
	
	<span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo $this->session->userdata('project_title'); ?></span>
	
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

<?php echo $this->load->view('dashboard_sidebar'); ?>

<!--side bar user panel-->


<div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">
           			
              
<style type="text/css">

#tab_all a{ color:#000000; text-decoration:none; }

#sts:hover{ font-weight:bold; }
</style>				
			

<?php
	$data['tab_sel'] = GALLERY;
	$this->load->view('overview_tabs',$data);

?>

<script type="text/javascript">

function submit_image_valid()
{
	





frmCheckform        = document.frm_addgallery;
        // assigh the name of the checkbox;
        var chks = document.getElementsByName('file_up[]');
 
        var hasChecked = false;
        // Get the checkbox array length and iterate it to see if any of them is selected
        for (var i = 0; i < chks.length; i++)
        {
                if (chks[i].value=='')
                {
                        check=false;
						var dv = document.getElementById('err1');
						dv.className = "error";
						dv.style.clear = "both";
						dv.style.minWidth = "110px";
						dv.style.margin = "5px";
						dv.innerHTML ='<?php echo IMAGE_REQUIRED; ?>';
						dv.style.display='block';
						
					  	hasChecked = true;
                        
						return false;
                }
				else 
				{
						
						value = chks[i].value;
						t1 = value.substring(value.lastIndexOf('.') + 1,value.length);
						if( t1=='jpg' || t1=='jpeg' || t1=='gif' || t1=='png' || t1=='JPEG' || t1=='JPG'  ||  t1=='PNG' || t1=='GIF' )
						{
							document.getElementById('err1').style.display='none';
							check=true;
						}
						else
						{						
							
							
							check=false;
							i=0;
							var dv = document.getElementById('err1');
		
							dv.className = "error";
							dv.style.clear = "both";
							dv.style.minWidth = "110px";
							dv.style.margin = "5px";
							dv.innerHTML = '<?php echo IMAGE_TYPE_NOT_VALID; ?>';
							dv.style.display='block';
							hasChecked = true;
							
							return false;
							
                    	   
					
					
						}
				
				
						
				}
				
        }
		
		
		
		
	 
	 
	 
}

function append_div2()
{
	var tmp_div2 = document.createElement("div");
	tmp_div2.className = "inner_content_two";
									
	
	var glry_cnt=document.getElementById('glry_cnt').value;
	document.getElementById('glry_cnt').value=parseInt(glry_cnt)+1;
	var num=parseInt(glry_cnt)+1;
	
	tmp_div2.id='galry'+num;
	
	content=document.getElementById('more2').innerHTML;							

		
	var str = '<div onclick="remove_gallery_div('+num+')" style="text-align:right;font-weight:bold;cursor:pointer;color:#990000;"><?php echo REMOVE;?></div>';
		
	tmp_div2.innerHTML = content +str;
	
	
	
	

	document.getElementById('add_more2').appendChild(tmp_div2);
							
	
	var myVerticalSlide2 = new Fx.Slide('add_more2');
	myVerticalSlide2.slideIn();
}


	function remove_gallery_div(id)
					{						
				
						var element = document.getElementById('galry'+id);
						var add_more = parent.document.getElementById('add_more2');
						
						var add_parent=add_more.parentNode.offsetHeight;
						
						
						var remove_height=parseInt(element.offsetHeight)+20;
						
						var final_height=add_parent - remove_height;
						
						
						
						
						element.parentNode.removeChild(element);
						add_more.parentNode.style.height = final_height+'px';
						
					
					
					}

</script>
	  
		   <div class="inner_content" style=" margin-top:11px;padding:12px; ">
		         
			
			
			<h3 id="dropmenu2"><?php echo ADD_GALLERY; ?></h3>
			
             <div style="clear:both;"></div>
			 
			 
		
		 
		 <?php		$attributes = array('name'=>'frm_addgallery','id'=>'frm_addgallery','onsubmit'=>'return submit_image_valid()');
					echo form_open_multipart('project/add_gallery/'.$project_id,$attributes); ?>
					
				
					
					
					
					
					
					<div class="clear"></div>
					
				
			<div id="add_more2"> 
				
				 <div id="more2"  class="inner_content_two">
				  
					  <div class="form-element-container">
						<div class="form-label">
							<label  class="all_text"><?php echo GALLERY; ?>:*</label>
							</div>
						   <input   name="file_up[]" type="file" class="" id="file_up" />
					 </div>
                  
				</div>
				
				</div>
				
					<input type="hidden" name="glry_cnt" id="glry_cnt" value="1" />
			<div><img src="<?php echo base_url(); ?>images/add.png" height="16" width="16" border="0" title="<?php echo ADD_MORE; ?>" onclick="append_div2();" style="cursor:pointer;" />
			
				
					
					 <div class="form-element-container">
						<div class="form-label">
							<label  class="all_text">&nbsp;</label>
							</div>
						   <input type="submit" name="submit" id="submit"  class="submit" onClick="submit_image_valid()"  value="<?php echo ADD_GALLERY; ?>" />
					 </div>
					 
					 
			
					<div class="clear"></div>
				</form>
		
			<div id="err1"></div>    
				 
				  <div id="err2"></div>
		

	
	
	
			
		</div>
		
		
		
		
		</div>
			
			
			
				
				
				<div class="clear"></div>		
				
				
					</div>
	<!-- left end ------>
		
       </div>
   