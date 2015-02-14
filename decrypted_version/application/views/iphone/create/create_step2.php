<div data-role="header">
  <h1><?php echo CREATE_PROJECT; ?></h1>
  <?php echo anchor('home','Home','class="ui-btn-right"'); ?> </div>
<div class="pad15"><br />

  <h2> <span id="s1postJ"> 2. <?php echo CAMPAIGN_DETAILS; ?></span></h2><br />
   <!-- <link type="text/css" href="<?php echo base_url(); ?>counter/css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />	
    <script type="text/javascript" src="<?php echo base_url(); ?>counter/js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>counter/js/jquery-ui-1.8.18.custom.min.js"></script>-->
		<script type="text/javascript">
	
	
	$(function() {
		$( "#slider-range-max" ).slider({
			range: "max",
			min: <?php echo $site_setting['project_min_days'];?>,
			max: <?php echo $site_setting['project_max_days'];?>,
			value: <?php echo $total_days; ?>,
			slide: function( event, ui ) {
				$( "#total_days" ).val( ui.value );getend();
				
			}
		});
		$( "#total_days" ).val( $( "#slider-range-max" ).slider( "value" ) );
		
	});
	
	
	
	</script>


<script type="text/javascript">
function getend()
{
     var day=eval(document.getElementById('total_days').value);
	 var d = new Date();
	 d.setDate(d.getDate()+day);
		//alert(d);
		var n = d.getMonth(); 
		var n1 = d.getDate(); 
		var n2 = d.getFullYear(); 
		//var c=d.format('l, jS F Y ');
		var n3=n+1;
		
		
		//alert(n+1);
		//alert(n1);
		//alert(n2);
		
	   var  enddate = [n1,n+1,n2].join("-"); 
	 //  var edate = enddate.format("m/dd/yy");
	   //alert(edate); 
      document.getElementById('end_date').value=enddate;
}</script>
		
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
				//$attributes = array('id'=>'frm_project','name'=>'frm_project','onsubmit'=>'return submit_image_valid()');
				$attributes = array('id'=>'frm_project','name'=>'frm_project');
						
				 
			echo form_open_multipart('start_project/create_step2/'.$id, $attributes);
	  ?>
												     
<!--------------Step-1---------------------->
            	
<!--------------Step-2---------------------->
                <div id="step2" class="div" style="display:block;">
              	 <div class="inner_content_two">
					
						<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
							<label class="ui-input-text" for="name"><?php echo TOTAL_DAYS; ?> : *</label>
							<select tabindex="4" name="total_days" id="total_days" class="btn_input" style="text-transform:capitalize;">
								<option value="" ><?php echo TOTAL_DAYS; ?></option>
							<?php
								for($i=0;$i<=90;$i++)
								{
								echo "<option value='".$i."' selected='selected'>".$i."</option>";
								}
								
							?>
							</select>
							
						  </div>
						  
						  <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
							
							<div class="form-label">
							<label class="ui-input-text" for="amount"><?php echo FUND_GOAL; ?>(<?php echo $site_setting['currency_symbol']; ?>) : *</label>						<input type="text" name="amount" id="amount" size="10" class="btn_input" value="<?php echo $amount; ?>"/>
						</div>
							
						<div class="inner_content_two">
                    
                    
					  
					   <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
							<label class="ui-input-text" for="project_city"><?php echo CITY; ?> : *</label>
							<input type="text" name="project_city" id="city_text" size="10" class="btn_input" value="<?php echo $project_city; ?>"/>
					  </div>
					  
					   <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
							<label class="ui-input-text" for="project_state"><?php echo STATE; ?> : *</label>
						<input type="text" name="project_state" id="state_text" class="btn_input" size="10" value="<?php echo $project_state; ?>"/>
					  </div>
					  
					  <div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
					<label class="ui-input-text" for="project_country"><?php  echo COUNTRY;?> : *</label>
					<input type="text" name="project_country" id="country_text" class="btn_input" size="10" value="<?php echo $project_country; ?>"/>
					  </div>
					 
					 
					 </div>
				
					</div>
				   	 
                 </div>
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

