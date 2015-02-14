<div data-role="header">
  <h1><?php echo CREATE_PROJECT; ?></h1>
  <?php echo anchor('home','Home','class="ui-btn-right"'); ?> </div>
<div class="pad15"><br />

  <h2> <span id="s1postJ"> 1. <?php echo PROJECT_DEATAILS; ?></span></h2><br />

<script type="text/javascript">
function LTrim( value ) {
	
	var re = /\s*((\S+\s*)*)/;
	return value.replace(re, "$1");
	
}

// Removes ending whitespaces
function RTrim( value ) {
	
	var re = /((\s*\S+)*)\s*/;
	return value.replace(re, "$1");
	
}

// Removes leading and ending whitespaces
function trim( value ) {
	
	return LTrim(RTrim(value));
	
}


</script>
		
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


	
	
     <?php if($error != "")
				{ ?>
                <div class="error" style="height:auto; margin:4px 0px 0px 0px;">
                <?php echo $error; ?>
                </div>
                <?php } ?>
  
  
 
		
	
      	

	  
	  
	 <!--left part for tab-->
	  
	   <div id="nav_forms" class="nav_div">
             <?php
				
				$attributes = array('id'=>'frm_project','name'=>'frm_project');
						
				 
			echo form_open_multipart('start_project/create_step1/'.$id, $attributes);
	  ?>
												     
<!--------------Step-1---------------------->
            	<div id="step1" class="div" style="display:block;">
                	
					<div class="inner_content_two">
					
							<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
							<label class="ui-input-text" for="name"><?php echo TITLE; ?> : *</label>
							<input type="text" name="project_title" id="project_title" value="<?php echo $project_title; ?>" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"/>
						  </div>
							
							
							<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
							<label class="ui-input-text" for="CATEGORY"><?php echo CATEGORY; ?> : *</label>
							<select tabindex="4" name="category_id" id="category_id" class="btn_input" style="text-transform:capitalize;">
								<option value="" ><?php echo SELECT_CATEGORY; ?></option>
							<?php
								foreach($categorylist as $row1)
								{
									
									if($row1->project_category_id==$category_id) {
									
									echo "<option value='".$row1->project_category_id."' selected='selected'>".$row1->project_category_name."</option>";
									}
									
									else
									{
									echo "<option value='".$row1->project_category_id."'>".$row1->project_category_name."</option>";
									
									}
								}
								
							?>
							</select>
						  </div>
						  
						  <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
							<label class="ui-input-text" for="name"><?php echo GOOGLE_ANALYTICAL_CODE; ?> : *</label>
							<input type="text" name="p_google_code" id="p_google_code" value="<?php echo $p_google_code; ?>" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"/>
                                (Ex :: UA-000000-0)
						  </div>
					</div>
					
						<div class="form-element-container" align="center" >
                      		<input type="hidden"  name="id" id="id"  value="<?php echo $id; ?>" />
							<input type="submit"  name="next" id="next" class="draft" border="none"  title="<?php echo NEXT; ?>" value="<?php echo NEXT; ?>" />
                            <input type="submit"  name="draft" id="draft" class="draft" border="none"  title="<?php echo SAVE; ?>" value="<?php echo SAVE; ?>" />
						</div>
                      
					
                </div>
<!--------------Step-2---------------------->
                
<!--------------Step 3---------------------->                 
                
<!--------------step-4---------------------->
                
<!--------------step-5----------------------> 
					
				  
	<!--------------step-5----------------------> 			
				
				
				 <div id="err1"></div>    
				 
				  <div id="err2"></div>   
				  
				   <div id="err3"></div>                   
                         
                </div>
               
               
            </form>
       


 </div> 