<link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.8.23/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.8.23/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url();?>js/colorbox/colorbox.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/colorbox/jquery.colorbox.js"> </script>
<script type="text/javascript">
$(document).ready(function(){
				
				$("#iframe").colorbox({iframe:true, width:"490px", height:"250px"});
			});
		
</script>
<script>
function filename(name)
{
	
	document.getElementById('file_name').value=name.replace("C:\\fakepath\\","");

}

$(function() {
$('.prjtitlediv').datepicker({minDate:0});
$('.chklimit').live('click',function(){
	
	if(!$(this).siblings(".limittxt").is(":visible")) 
	{
		$(this).siblings(".limittxt").show();
	}
	else
	{
		$(this).siblings(".limittxt").hide();
	}
	
});
});



</script>
     <script language="javascript" type="text/javascript">
						function append_perk()
						{
							var tmp_div2 = document.createElement("div");
							tmp_div2.className = "perk_cont";
							
							var glry_cnt=document.getElementById('glry_cnt').value;
							var pkcnt = document.getElementById('perklab_cnt').value;
							document.getElementById('glry_cnt').value=parseInt(glry_cnt)+1;
							document.getElementById('glry_cnt').value=parseInt(glry_cnt)+1;
							
							var num=parseInt(glry_cnt)+1;
							
							tmp_div2.id='galry'+num;
							
							content=document.getElementById('more2').innerHTML;	
							
							$("#metemp").html(content);
							$("#metemp .dp input").remove();

							$("#metemp .dp").html('<input type="text" name="est_date[]" class="prjtitlediv" value="" style=" width:205px; margin:0px 0 0 5px;" title="fdfdF" />');

							$("#metemp").find('.limittxt').hide();
							
							
							content = $("#metemp").html();
							
							var set_cnt=document.getElementById('set_perk').value;
							if(set_cnt==0){
								var pkcntreplace = parseInt(glry_cnt)+1;
								
									
							}else
							{
								var pkcntreplace = parseInt(glry_cnt);
							}
							//parseInt(glry_cnt);= 'Perks #'+(parseInt(pkcnt)+1)
							
							content = content.replace('<?php echo PERKS; ?> #' + pkcnt, '<?php echo PERKS; ?> #' + pkcntreplace);
							
							
							var str = '<div onclick="remove_perk_div('+num+')" style="cursor:pointer" class="pclose rt marr10"><img src="<?php echo base_url();?>/images/delet.png" width="28px" height="28px"/><p class="lt martop10"><?php echo REMOVE_PERK; ?></p></div></div><div class="clear"></div>';

							tmp_div2.innerHTML = content +str;
							
							
							document.getElementById('add_more2').appendChild(tmp_div2);
							
							$('.prjtitlediv').datepicker({minDate:0});
							
						}
					
					
					function remove_perk_div(id)
					{						
				
						var element = document.getElementById('galry'+id);
						var add_more = parent.document.getElementById('add_more2');
						element.parentNode.removeChild(element);
						
					}
					

					</script>  
   
   <script>
  $(document).ready(function(){
	$('.stepname').mouseover(function(){
	$('.stepname h2').addClass('h2hover');
	});
	
	});
							function check_perk_amount(){
								var chks = document.getElementsByName('perk_amount[]');
						 		var maxval = <?php echo $site_setting['maximum_reward_amount']; ?>;
								var minval = <?php echo $site_setting['minimum_reward_amount']; ?>;
								document.getElementById('err1').innerHTML='';
								
								var hasChecked = false;
								// Get the checkbox array length and iterate it to see if any of them is selected
								for (var i = 0; i < chks.length; i++)
								{
								
									value = chks[i].value;
									if(parseFloat(value)<parseFloat(minval) || parseFloat(value)>parseFloat(maxval)){
										
										document.getElementById('err1').innerHTML='<?php echo '<ul><li>'.sprintf(PERK_AMOUNT_SHOULD_BETWEEN, set_currency($site_setting['minimum_reward_amount']),set_currency($site_setting['maximum_reward_amount'])).'</li></ul>'; ?>';
										document.getElementById('err1').style.display='block';
										return false;
									}
								}
								return true;				
						}
   </script>   
   <script type="text/javascript">
   function delete_perk(id)
   {
  			var r=confirm("<?php echo ARE_YOU_SURE_TO_DELETE_THIS_PERK; ?>");
			if (r==true)
			  {
			  	x=1;
				document.getElementById('add_more2_perk_'+id).style.display='none';
			  }
			else
			  {
			 	 x=0;
			  }
			
			if(x== 0)
			{
				return false;
			}
			if(id=='') { return false; }
			var strURL='<?php echo site_url('start/delete_perk/');?>/'+id;
			var xmlhttp;
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			
			}
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
			}
			xmlhttp.onreadystatechange=function()
				{
				
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					
					if(xmlhttp.responseText=='')
					{
						
						
			
					}
				}
			}
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
   }
   </script>              
<style type="text/css">
 #ui-datepicker-div, .ui-datepicker{ font-size: 85%; }
 


</style>

<!--******************Section********************-->
<section>
	<div id="page_we">
    	<ul class="stepul">
        	
          <?php   if($id!='' and $id!='0'){?>
        		<li>
            	<a href="<?php echo site_url('start/guideline/'.$id);?>">
                	<div class="complete">
				<table align="center"><tr><td align="center">

                    	<h1><?php echo GUIDELINES; ?></h1></td></tr>
				<tr><td align="center">
                        <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></table>
                    </div>
                </a>
            </li>
                <li>
                    <a href="<?php echo site_url('start/create_step1/'.$id);?>">
                        <div class="complete">
                    <table align="center"><tbody><tr><td align="center">
                            <h1><?php echo BASICS; ?></h1></td></tr>
                            <tr><td>
                            <h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td></tr></tbody></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step2/'.$id); ?>">
                        <div class="stepname">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo PERKS; ?></h1></td></tr>
    						<tr><td>
                            <h2 class="h2normal">3</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step3/'.$id); ?>">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo PROJECT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                            <h2>4</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step4/'.$id); ?>">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo ACCOUNT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                            <h2>5</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('start/create_step5/'.$id); ?>">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo REVIEW; ?></h1></td></tr>
                            <tr><td>
                            <h2>6</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li style="margin-right:0;">
                    <a href="<?php echo site_url('start/project_detail_preview/'.$id); ?>">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center" style="padding: 0 0 5px;margin-top: 10px;">
                            <img src="<?php echo base_url();?>images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td></tr>
                            <tr><td>
                            <h2>7</h2></td></tr></table>
                        </div>
                    </a>
                </li>
          <?php }else{?>
                 <li>
                    <a href="#">
                        <div class="stepname">
                    <table align="center"><tbody><tr><td align="center">
                            <h1><?php echo BASICS; ?></h1></td></tr>
                            <tr><td>
                            <h2 class="h2normal">2</h2></td></tr></tbody></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo PERKS; ?></h1></td></tr>
    
                            
                           <tr><td>
                            <h2>3</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo PROJECT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                            <h2>4</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo ACCOUNT_DETAILS; ?></h1></td></tr>
                            <tr><td>
                            <h2>5</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo REVIEW; ?></h1></td></tr>
                            <tr><td>
                            <h2>6</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                <li style="margin-right:0;">
                    <a href="#">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center" style="padding: 0 0 5px;margin-top: 10px;">
                            <img src="<?php echo base_url();?>images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td></tr>
                            <tr><td>
                            <h2>7</h2></td></tr></table>
                        </div>
                    </a>
                </li>

           	
		   <?php }?> 
            
        </ul>
		
		
		<div class="step_cont_top">
				<h2><?php echo EVERY_PROJECT_NEEDS_GREAT_PERKS; ?></h2>
				<p><?php echo BE_CREATIVE_AND_PRICE_THEM_FAIRLY_EXPLORE_OTHER_PROJECTS_FOR_INSPIRATION; ?>!</p>
			</div>
            <p style="display:none;" id="metemp"></p>

            
             <?php
				
				$attributes = array('id'=>'frm_project','name'=>'frm_project');
				echo form_open_multipart('start/create_step2/'.$id, $attributes);
	  		?>
		<div class="step_cont2">
		
        	 
			
			<div class="step2_left">
			
             <div id="err1"  class="error" style="display:none;">
			 </div>    
            <?php if($error != "")
				{ ?>
                <div class="error" style="height:auto; margin:4px 0px 0px 0px;">
                <ul><?php echo $error; ?></ul>
                </div>
                <?php } ?>
				
				<?php if(!$perk) {?>
				<div class="perk_cont" id="more2">
					<table cellpadding="0" cellspacing="0">
					<tr>
						<td valign="top"><label class="perklabel" id="perk_num"><?php echo PERKS; ?> #1</label></td>
						<td>
							<table class="pdtable" cellpadding="5" cellspacing="0">
							<tr>
							<td ><?php echo AMOUNT; ?></td>
							<td class="nrght"><input type="text" style="width:199px; height:30px; margin:0px 5px;" name="perk_amount[]" id="perk_amount"/></td>	</tr>
							
							<tr>
							<td ><?php echo DESCRIPTION; ?></td>
							<td  class="nrght"><textarea  class="textarea2" style=" margin:0px 5px" name="perk_description[]" ></textarea></td>
						</tr>
						<tr>
							<td ><?php echo EST_DELIVERY_DATE; ?></td>
							<td  class="nrght">
                            <div class="dp"><input type="text" name="est_date[]" class="prjtitlediv" value="" style=" width:205px; margin:0px 0 0 5px;" /></div>
                           </td>
						</tr>
						
						<tr>
							<td ><img src="<?php echo base_url();?>/images/claimicon.png" style="float:left; margin-right:5px;" /> <?php echo CLAIMED; ?>
							 <div class="clr"></div>
							</td>
							<td  class="nrght"><input type="checkbox" name="limit_avail[]" class="chklimit" /><?php echo LIMIT; ?> #  <?php echo AVAILABLE; ?>
                            <input type="text" class="limittxt stext2" style="display:none; width:25px; float:right; height:30px; margin:0px 260px 0 5px;" name="perk_total[]"/>
							 <div class="clr"></div>
							</td>
						</tr>
						
						
							</table>
						</td>
					</tr>
					</table>
					
				<input type="hidden" name="perk_id[]" value="" />
				<input type="hidden" name="set_perk" value="0" id="set_perk"/>
		
			</div>
                <?php } ?>
                <?php $i=1;if($perk){
				
				foreach($perk as $prk){
				?>
                <input type="hidden" name="perk_id[]" value="<?php echo $prk->perk_id;?>" />
				<input type="hidden" name="set_perk" value="1" id="set_perk"/>
               		 <div id="add_more2_perk_<?php echo $prk->perk_id;?>">
					<div class="perk_cont" id="more2_perk">
					<table cellpadding="0" cellspacing="0">
					<tr>
						<td><label class="perklabel" id="perk_num_perk"><?php echo PERKS; ?> #<?php echo $i;?></label></td>
						<td>
							<table class="pdtable" cellpadding="5" cellspacing="0">
							<tr>
							<td ><?php echo AMOUNT; ?></td>
							<td class="nrght"><input type="text" style="width:199px; height:30px; margin:0px 5px;" name="perk_amount[]" id="perk_amount" value="<?php echo $prk->perk_amount;?>"/></td>	</tr>
							
							<tr>
							<td ><?php echo DESCRIPTION; ?></td>
							<td  class="nrght"><textarea  class="textarea2" style=" margin:0px 5px" name="perk_description[]" ><?php echo $prk->perk_description;?></textarea></td>
						</tr>
						<tr>
                        	<td ><?php echo EST_DELIVERY_DATE; ?></td>
							<td  class="nrght">
                            <div class="dp"><input type="text" name="est_date[]" class="prjtitlediv" style=" width:205px; margin:0px 0 0 5px;" value="<?php echo date('m/d/Y',strtotime($prk->perk_delivery_date));?>"/></div>
                           </td>
						</tr>

						<tr>
							<td ><img src="<?php echo base_url();?>/images/claimicon.png" style="float:left; margin-right:5px;" /><?php echo CLAIMED; ?>
							 <div class="clr"></div>
							</td>
							<td  class="nrght"><input type="checkbox" name="limit_avail[]" class="chklimit" <?php if($prk->perk_total > 0){?>checked="checked" <?php }?>/><?php echo LIMIT; ?> #  <?php echo AVAILABLE; ?>
                            <?php 
							if($prk->perk_total > 0)
							{
								$dis='block';
							}
							else
							{
								$dis='none';
							}
							?>
                            <input type="text" class="limittxt stext2" style="display:<?php echo $dis;?>; width:25px; float:right; height:30px; margin:0px 260px 0 5px;" name="perk_total[]" value="<?php echo $prk->perk_total;?>"/>
							 <div class="clr"></div>
							</td>
						</tr>
                        <?php if($i>1){?>
						<div onclick="delete_perk(<?php echo $prk->perk_id;?>);" style="cursor:pointer" class="pclose rt marr10"><img src="<?php echo base_url();?>/images/delet.png" width="28px" height="28px"/><p class="lt martop10"><?php echo REMOVE_PERK; ?></p></div></div><div class="clear"></div><?php }?>
						
							</table>
						</td>
					</tr>
					</table>
					
					
				</div>
					
                 </div>
                <?php 
				
				$i++;}}?>
				
            	<div id="add_more2">
					
                  
					
                 </div>
                
              
                <div class="clr"></div>
				<a style="" class="addp" href="javascript:void(0);"  onclick="append_perk();"><?php echo ADD_ANOTHER_PERK; ?></a>
			</div>
          	<div class="step2_right">
				<p class="arpare"><?php echo HOW_TO; ?>: &nbsp;</p><a href="<?php echo site_url('help/faq/tst'); ?>" class="arink"><?php  echo MAKE_AN_AWESOME_PROJECT; ?></a>
					<p class="arpare"><?php echo REFER_TO_OUR; ?> &nbsp;</p><a href="<?php echo site_url('help'); ?>" class="arink"><?php echo PROJECT_HELP_CENTER; ?>.</a><div class="clr"></div>
				<h3 class="step3h3"><?php echo WHAT_TO_OFFER; ?></h3>
				<p class="step1des"><?php echo COPIES_OF_WHAT_YOURE_MAKING_UNIQUE_EXPERIENCES_AND_LIMITED_EDITIONS_WORK_GREAT; ?><br /><br /></p>
				<p class="step1des">"<?php echo WOULD_YOU_BACK_YOUR_PROJECT; ?>"</p>
					
		

			</div>
            <div class="clr"></div>
		</div>
    </div>
	<div class="setp2btm">
	<div id="page_we">
    	<input type="hidden"  name="id" id="id"  value="<?php echo $id; ?>" />
        <input type="hidden" name="glry_cnt" id="glry_cnt" value="<?php echo $i;?>" />
        <input type="hidden" name="perklab_cnt" id="perklab_cnt" value="<?php echo $i;?>" />
        
        <input type="submit"  name="back" id="back" class="stepbtn" border="none" style="margin-left:346px;"  title="<?php echo BACK; ?>" value="<?php echo BACK; ?>" />
        
        <input type="submit"  name="draft" id="draft" class="stepbtn" border="none"  title="<?php echo SAVE; ?>" value="<?php echo SAVE; ?>" onclick="return check_perk_amount();" />
        
        <input type="submit"  name="next" id="next" class="stepbtn" border="none"  title="<?PHP echo NEXT; ?>" value="<?PHP echo NEXT; ?>" onclick="return check_perk_amount();" />
        
       </form> 
      
				
                  
					
                 
		 <?php echo anchor('start/deleteproject_popup/'.$id,'Delete Project','id="iframe" class="deleteprj"'); ?> 
		<?php echo anchor('home','EXIT','class="exitp"');?>
	</div>
	 <div class="perk_cont" id="more2" style="display:none;">
					<table cellpadding="0" cellspacing="0">
					<tr>
						<td valign="top"><label class="perklabel" id="perk_num"><?php echo PERKS; ?> #<?php echo $i;?></label></td>
						<td>
							<table class="pdtable" cellpadding="5" cellspacing="0">
							<tr>
							<td ><?php echo AMOUNT; ?></td>
							<td class="nrght"><input type="text" style="width:199px; height:30px; margin:0px 5px;" name="perk_amount[]" id="perk_amount"/></td>	</tr>
							
							<tr>
							<td ><?php echo DESCRIPTION; ?></td>
							<td  class="nrght"><textarea  class="textarea2" style=" margin:0px 5px" name="perk_description[]" ></textarea></td>
						</tr>
						<tr>
							<td ><?php echo EST_DELIVERY_DATE; ?></td>
							<td  class="nrght">
                            <div class="dp"><input type="text" name="est_date[]" class="prjtitlediv" value="" style=" width:205px; margin:0px 0 0 5px;" /></div>
                           </td>
						</tr>
						
						<tr>
							<td ><img src="<?php echo base_url();?>/images/claimicon.png" style="float:left; margin-right:5px;" /> <?php echo CLAIMED; ?>
							 <div class="clr"></div>
							</td>
							<td  class="nrght"><input type="checkbox" name="limit_avail[]" class="chklimit" /><?php echo LIMIT; ?> #  <?php echo AVAILABLE; ?>
                            <input type="text" class="limittxt stext2" style="display:none; width:25px; float:right; height:30px; margin:0px 260px 0 5px;" name="perk_total[]"/>
							 <div class="clr"></div>
							</td>
						</tr>
						
						
							</table>
						</td>
					</tr>
					</table>
					
				<input type="hidden" name="perk_id[]" value="" />
				</div>	
	</div>
	
</section>

