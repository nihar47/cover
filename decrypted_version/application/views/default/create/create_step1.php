<link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.8.23/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.8.23/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery-ui-timepicker-addon.js"></script>
<script src="<?php echo base_url(); ?>/js/form_effort.js" ></script>
<script src="<?php echo base_url(); ?>js/jquery.form.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url();?>js/colorbox/colorbox.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/colorbox/jquery.colorbox.js"> </script>
<script type="text/javascript">
$(document).ready(function(){
				
				$("#iframe").colorbox({iframe:true, width:"490px", height:"250px"});
			});
		
</script>
<style type="text/css">
#ui-datepicker-div, .ui-datepicker {
	font-size: 85%;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$('#end_date').datetimepicker();
	$('#st_date').click(function(){
	$("#end_date").fadeIn();
	$("#numdaysdiv").fadeOut();
});
	$('.stepname').mouseover(function(){
			
			$('.stepname h2').addClass('h2hover');
		});
		
	$('.stepname').mouseover(function(){
			
			$('.stepname h2').addClass('h2hover');
		});

	$('#numdays').click(function(){
		$("#numdaysdiv").fadeIn();
		$("#end_date").fadeOut();
		
	});
	
	$("#numdaysdiv").keydown(function(event) {
        // Allow: backspace, delete, tab, escape, and enter
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
             // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) || 
             // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
    });
	$("#funding_goal").keydown(function(event) {
        // Allow: backspace, delete, tab, escape, and enter
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
             // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) || 
             // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
    });

	
});
</script>

<!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html51.js"></script>
    	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
	<![endif]-->

<script>
function filename(name)
{
	
	document.getElementById('file_name').value=name.replace("C:\\fakepath\\","");

}

function limitText(limitField, limitCount, limitNum) {
	var txtdesc = $('#project_title_text').val();
	document.getElementById("project_card_title").innerHTML = '<a class="category_title" href="#">'+txtdesc+'</a>';
	
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}

function limitpeek(limitField, limitCount, limitNum) {
	var txtdesc = $('#project_summary').val();
	//document.getElementById("project_card_title").innerHTML = '<a class="category_title" href="#">'+txtdesc+'</a>';
	document.getElementById("project_card_summary").innerHTML = '<p class="prop" style="heifgt:70px;">'+txtdesc+'</p>';
	
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}


function peekdesc()
{
	
	var projdesc = $('#project_summary').val();
//	document.getElementById("project_card_summary").innerHTML = '<p class="prop" style="heifgt:70px;">'+projdesc+'</p>';
}
function cardcategory()
{
	var projcat = $('#project_category').val();
	if(projcat=='')
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
				document.getElementById('project_card_category').innerHTML= '<a class="category_name" href="#">'+xmlhttp.responseText+'</a>';
			}
		}
		
		var url = '<?php echo site_url('start/project_getcategory'); ?>/'+projcat;
		
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
}

function end_dt()
{
	
	var date_ind = document.getElementById('day').value;
	
	document.getElementById("dl").innerHTML = date_ind+" "+"<?php echo DAYS_LEFT; ?>";
}
</script>
<script>
/* This submits the primary baseball picture form when the file upload name changes */
$(function() {
  $('.project_picture').on('change', function(event) {//alert("hi");
   // jQuery('#next_action').val('');
   // startSpinner($('#picture_file_field_display'),$('#campaign_summary_picture_saving'));
    $('#edit_project_picture_file').children().remove();
    $(this).prependTo('#edit_project_picture_file').addClass('hidden-file-field');
    $('#project_picture').submit();
    $(this).clone(true).prependTo("#picture_file_field_display").removeClass('hidden-file-field').removeAttr('id');
  });
});
function onSuccessfile(data, textStatus, jqXHR)
{
	var t = data.msg.success;


$('#ajaximage').attr('src',"<?php echo base_url(); ?>upload/thumb/"+data.image.img_name);
	if(t == '')
	{
		$("#not_valid_image").html(data.msg.error);
		$("#not_valid_image").slideDown();
	}
	else
	{
		$("#not_valid_image").slideUp();
	}
}



$(document).ready(function() {
 
  // bind form id and provide a simple callback function
  if ((pic = jQuery('#project_picture')).length )
    pic.ajaxForm({dataType: 'json',
      success: onSuccessfile,
      error: onError,
      complete: onComplete,
    });


 });
 
</script>
<?php
 
	$attributes = array('id'=>'project_picture','name'=>'project_picture','enctype'=>'multipart/form-data','class'=>'edit_project','method'=>'post','accept-charset'=>'UTF-8');
   echo form_open_multipart('start/create_step1_ajax/'.$id, $attributes);
?>

<div class="input-item-file" id="edit_project_picture_file" style="display:none"> </div>
</form>

<!--******************Section********************-->
<section>
  <?php
			$attributes = array('id'=>'frm_project','name'=>'frm_project');
			echo form_open_multipart('start/create_step1/'.$id, $attributes);
	  ?>
  <div id="page_we">
    <ul class="stepul">
      <?php   if($id!='' and $id!='0'){?>
      <li> <a href="<?php echo site_url('start/guideline/'.$id);?>">
        <div class="complete">
          <table align="center">
            <tr>
              <td align="center"><h1><?php echo GUIDELINES; ?></h1></td>
            </tr>
            <tr>
              <td align="center"><h2><img src="<?php echo base_url(); ?>/images/rightsign.png" style="margin-top:5px;" alt="" /></h2></td>
            </tr>
          </table>
        </div>
        </a>
         </li>
      <li> <a href="<?php echo site_url('start/create_step1/'.$id); ?>">
        <div class="stepname">
          <table align="center">
            <tbody>
              <tr>
                <td align="center"><h1><?php echo BASICS; ?></h1></td>
              </tr>
              <tr>
                <td><h2 class="h2normal">2</h2></td>
              </tr>
            </tbody>
          </table>
        </div>
        </a> </li>
      <li> <a href="<?php echo site_url('start/create_step2/'.$id); ?>">
        <div class="incompletestep">
          <table align="center">
            <tr>
              <!--<td align="center"><h1><?php echo PERKS; ?></h1></td>-->
              <td align="center"><h1><?php echo iGift; ?></h1></td>
            </tr>
            <tr>
              <td><h2>3</h2></td>
            </tr>
          </table>
        </div>
        </a> </li>
      <li> <a href="<?php echo site_url('start/create_step3/'.$id); ?>">
        <div class="incompletestep">
          <table align="center">
            <tr>
              <td align="center"><h1><?php echo PROJECT_DETAILS; ?></h1></td>
            </tr>
            <tr>
              <td><h2>4</h2></td>
            </tr>
          </table>
        </div>
        </a> </li>
      <li> <a href="<?php echo site_url('start/create_step4/'.$id); ?>">
        <div class="incompletestep">
          <table align="center">
            <tr>
              <td align="center"><h1><?php echo ACCOUNT_DETAILS; ?></h1></td>
            </tr>
            <tr>
              <td><h2>5</h2></td>
            </tr>
          </table>
        </div>
        </a> </li>
      <li> <a href="<?php echo site_url('start/create_step5/'.$id); ?>">
        <div class="incompletestep">
          <table align="center">
            <tr>
              <td align="center"><h1><?php echo REVIEW; ?></h1></td>
            </tr>
            <tr>
              <td><h2>6</h2></td>
            </tr>
          </table>
        </div>
        </a> </li>
      <li> <a href="<?php echo site_url('start/project_detail_preview/'.$id); ?>">
        <div class="incompletestep">
          <table align="center">
            <tr>
              <td align="center" style="padding: 0 0 5px;margin-top: 10px;"><img src="<?php echo base_url();?>images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td>
            </tr>
            <tr>
              <td><h2>7</h2></td>
            </tr>
          </table>
        </div>
        </a> </li>
         </li>
                       <li>
                    <a href="<?php echo site_url('start/launch_payment/'.$id); ?>">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo Payment; ?></h1></td></tr>
                            <tr><td>
                            <h2>8</h2></td></tr></table>
                        </div>
                    </a>
                </li>
                
      <?php }else{?>
      <li> <a href="#">
        <div class="stepname">
          <table align="center">
            <tbody>
              <tr>
                <td align="center"><h1><?php echo BASICS; ?></h1></td>
              </tr>
              <tr>
                <td><h2 class="h2normal">2</h2></td>
              </tr>
            </tbody>
          </table>
        </div>
        </a> </li>
      <li> <a href="#">
        <div class="incompletestep">
          <table align="center">
            <tr>
              <!--<td align="center"><h1><?php echo PERKS; ?></h1></td>-->
               <td align="center"><h1><?php echo iGift; ?></h1></td>
            </tr>
            <tr>
              <td><h2>3</h2></td>
            </tr>
          </table>
        </div>
        </a> </li>
      <li> <a href="#">
        <div class="incompletestep">
          <table align="center">
            <tr>
              <td align="center"><h1><?php echo PROJECT_DETAILS; ?></h1></td>
            </tr>
            <tr>
              <td><h2>4</h2></td>
            </tr>
          </table>
        </div>
        </a> </li>
      <li> <a href="#">
        <div class="incompletestep">
          <table align="center">
            <tr>
              <td align="center"><h1><?php echo ACCOUNT_DETAILS; ?></h1></td>
            </tr>
            <tr>
              <td><h2>5</h2></td>
            </tr>
          </table>
        </div>
        </a> </li>
      <li> <a href="#">
        <div class="incompletestep">
          <table align="center">
            <tr>
              <td align="center"><h1><?php echo REVIEW; ?></h1></td>
            </tr>
            <tr>
              <td><h2>6</h2></td>
            </tr>
          </table>
        </div>
        </a> </li>
      <li> <a href="#">
        <div class="incompletestep">
          <table align="center">
            <tr>
              <td align="center" style="padding: 0 0 5px;margin-top: 10px;"><img src="<?php echo base_url();?>images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td>
            </tr>
            <tr>
              <td><h2>7</h2></td>
            </tr>
          </table>
        </div>
        </a> </li>
         </li>
				       <li>
                    <a href="javascript://">
                        <div class="incompletestep">
                    <table align="center"><tr><td align="center">
                            <h1><?php echo Payment; ?></h1></td></tr>
                            <tr><td>
                            <h2>8</h2></td></tr></table>
                        </div>
                    </a>
                </li>
      <?php }?>
    </ul>
    <div class="step_cont_top">
      <h2><?php echo MEET_YOUR_NEW_PROJECT; ?></h2>
      <p><?php echo START_BY_GIVING_IT_A_NAME_A_PIC_AND_OTHER_IMPORTANT_DETAILS; ?></p>
    </div>
    <div class="step_cont2">
      <div class="step2_left">
        <?php if($error != "")
				{ ?>
        <div class="error" style="height:auto; margin:4px 0px 0px 0px;">
          <ul>
            <?php echo $error; ?>
          </ul>
        </div>
        <?php } ?>
        <style>
			#not_valid_image {color: #FF0000!important; font-size: 12px;font-weight: bold;margin: 0 0 0 15px;padding:2px 15px;text-align: left;}
			</style>
        <div id="not_valid_image" class="error" style="height:auto; margin:4px 0px 0px 0px; display:none;"> <?php echo $error; ?> </div>
        <label class="labe11"><?php echo PROJECT_IMAGE;?></label>
        <div class="image_upload marl30 lt"  id="picture_file_field_display">
          <input type="file" name="file1" id="file1"  class="project_picture" height="25px;" style="color:#FFFFFF; font-size:10px;">
        </div>
        <div style="float:left; margin-left:9px; color:#C00"> <font style="font-size:12px;"><?php echo 'Upload image greater than 800*600'; ?></font> </div>
        <div class="clr"></div>
        <label class="labe11"><?php echo PROJECT_TITLE;?>*</label>
        <div class="prjtitlediv">
          <input type="text" name="project_title_text" id="project_title_text" class="txt" onKeyDown="limitText(this.form.project_title_text,this.form.countdown,60);" onKeyUp="limitText(this.form.project_title_text,this.form.countdown,60);" value="<?php echo $project_title;?>"/>
        </div>
        <div class="clr"></div>
        <div style="float:left; margin-left:140px;"> <font style="font-size:12px;"><?php printf(MAX_CHAR,60); ?>
          <input readonly type="text" name="countdown" value="60" class="normal_label" style="border:none; width:15px; margin:0px; float:none;">
          <?php echo CHAR_LEFT; ?>.</font> </div>
        <div class="clr"></div>
        <label class="labe11"><?php echo CATEGORY; ?>*</label>
	
        <select tabindex="4" name="project_category" class="user_select" id="project_category" style="text-transform:capitalize;" onchange="return cardcategory()">
          <option value="" ><?php echo SELECT_CATEGORY; ?></option>
   <?php foreach($category_list as $row1)
								{ 
									if($row1['project_category_id']==$category_id) {
										echo "<optgroup label='".$row1['project_category_name']."'>";
									}
									else
									{
									echo "<optgroup label='".$row1['project_category_name']."'>";
									}
									
									if(isset($row1['children']) && !empty($row1['children'])){
										foreach($row1['children'] as $child){
											if($child['project_category_id']==$category_id) {
												echo "<optgroup label='--- ".$child['project_category_name']." ---'>";
											}
											else
											{
											echo "<optgroup label='--- ".$child['project_category_name']." ---'>";
											}
											
											if(isset($child['child']) && !empty($child['child'])){
												foreach($child['child'] as $c){
													if($c['project_category_id']==$category_id) {
											echo "<option value='".$c['project_category_id']."' selected='selected'>&nbsp;&nbsp;&nbsp;&nbsp;-- ".$c['project_category_name']."</option>";
											}
											else
											{
											echo "<option value='".$c['project_category_id']."'>&nbsp;&nbsp;&nbsp;&nbsp;-- ".$c['project_category_name']."</option>";
											}
													}
													echo "</optgroup>";
												
												}
										}
									}
								echo "</optgroup>";	
								}
							?>
        </select>
        <div class="clr"></div>
        <label class="labe11"><?php echo PROJECT_QUICK_PEEK;?>*</label>
        <textarea class="textarea1" onKeyUp="limitpeek(this.form.project_summary,this.form.des_countdown,135)" id="project_summary" name="project_summary"><?php echo $project_summary;?></textarea>
        <div style="float:left; margin-left:140px;"> <font style="font-size:12px;"><?php printf(MAX_CHAR,135); ?>
          <input readonly type="text" name="des_countdown" value="135" class="normal_label" style="border:none; width:25px; margin:0px; float:none;">
          <?php echo CHAR_LEFT; ?>.</font></div>
        <div class="clr"></div>
        <label class="labe11"><?php echo PROJECT_DURATION;?>*</label>
        <div class="radcont">
          <input type="radio" class="" name="duration" value="totalday" checked="checked" id="numdays" style="float:left;" />
          <p><?php echo NUMBER_OF_DAYS_50_DAYS; ?></p>
          <div class="clr"></div>
          <div style="float:left" id="shide">
            <div class="prjtitlediv" style="width:255px; margin:0" id="numdaysdiv">
              <input type="text" class="txt" name="endday" style="width:50px;" id="day" value="<?php echo $totaldays;?>" onkeyup="return end_dt();">
              <p class="par" id="par" style="line-height:22px;"><?php echo $site_setting['project_min_days']; ?>-<?php echo $site_setting['project_max_days']; ?> <?php echo DAYS ?>, <?php echo WE_RECOMMEND; ?> <?php echo $site_setting['project_max_days']; ?> <?php echo OR_LESS; ?></p>
            </div>
          </div>
          <script>
$(document).ready(function(){
	$('#par').click(function(){
		$('#day').focus();
	});
});
</script>
          <div class="clr"></div>
          <input type="radio" class="" name="duration" id="st_date" value="totaldate" style="float:left; margin:10px 0 0 0px;"/>
          <p style=" margin:10px 0 0 5px;"><?php echo END_ON_DATE_TIME; ?></p>
          <div class="clr"></div>
          <input type="text" name="end_date" id="end_date" class="prjtitlediv" value="" style="display:none; width:255px;" />
        </div>
        <div class="clr"></div>
        <label class="labe11"><?php echo FUNDING_GOAL; ?>*</label>
        <input type="text" class="stext2" id="funding_goal" name="amount" value="<?php echo $amount;?>" />
      </div>
    </div>
    <?php if($id == ''){?>
    <div class="step2_right">
      <!--<p class="arpare"><?php echo HOW_TO; ?>: 
      
      <a href="<?php echo site_url('help/faq/tst'); ?>" class="arink">
      <?php  echo MAKE_AN_AWESOME_PROJECT; ?>
      </a></p>
      <p class="arpare"><?php echo REFER_TO_OUR; ?>  <a href="<?php echo site_url('help'); ?>" class="arink"><?php echo PROJECT_HELP_CENTER; ?>.</a></p>-->
     
      <div class="project_card" style="margin-top:10px;">
        <?php 
				
                if(is_file('upload/thumb/'.$project['image']))
					{
						$img = $project['image'];
					
					}else{
					$img = NO_IMAGE;
					}
					
					if(is_file('upload/thumb/'.$project['image'])){
					?>
        <img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt="" id="ajaximage" class="project_img"/>
        <?php
					}else{ ?>
        <img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt="" id="ajaximage" class="project_img">
        <?php } ?>
        <div id="project_card_category"><a class="category_name" href="javascript://"><?php echo PROJECT_CATEGORY; ?></a></div>
        <div id="project_card_title"><a class="category_title" href="javascript://"><?php echo PROJECT_TITLE; ?></a></div>
        <p class="prop"><?php echo BY; ?></p>
        <?php echo anchor('user/profile/'.$user_info['user_id'],$user_info['user_name'].' '.$user_info['last_name'],'class="prjown"');?>
        <div id="project_card_summary">
          <p class="prop" style="height:60px;"><?php echo DESCRIPTION; ?></p>
        </div>
        <div class="clr"></div>
        <hr class="projhr">
        <div class="projectprg">
          <div style="width:100%;" class="prjprocal"></div>
        </div>
        <div class="one">0%</div>
        <ul class="projectdul">
          <li>
            <h2 class="currency"><?php echo $site_setting['currency_symbol']; ?></h2>
            <p class="raised"><?php echo RAISED; ?></p>
          </li>
          <li style="border:none;">
            <p style="float:right;" class="raised" ><?php echo DAYS_LEFT; ?></p>
            <h2 style="float:right; margin-left:10px;" class="day"></h2>
          </li>
        </ul>
      </div>
    </div>
    <?php }else{?>
    <div class="step2_right">
     <p class="arpare">This is how it will display be displayed to users on our site</p>
      <!--<p class="arpare"><?php echo HOW_TO; ?>:      <a href="<?php echo site_url('help/faq/tst'); ?>" class="arink">
 
      <?php  echo MAKE_AN_AWESOME_PROJECT; ?>
      </a>
      </p>
      <p class="arpare"><?php echo REFER_TO_OUR; ?>   <a href="<?php echo site_url('help'); ?>" class="arink"><?php echo PROJECT_HELP_CENTER; ?>.</a></p>-->
    
      <div class="project_card" style="margin-top:10px; height:auto;">
        <?php 
				
                if(is_file('upload/thumb/'.$project['image']))
					{
						$img = $project['image'];
					
					}else{
					$img = NO_IMAGE;
					}
					
					if(is_file('upload/thumb/'.$project['image'])){
					?>
        <img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt="" id="ajaximage" class="project_img"/>
        <?php
					}else{ ?>
        <img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt="" id="ajaximage" class="project_img">
        <?php } ?>
        <div id="project_card_category"><a class="category_name" href="#">
          <?php if($category_id){echo $this->startproject_model->get_project_getcategory($category_id);}else{echo 'Category';}?>
          </a></div>
        <div id="project_card_title"><a class="category_title" href="#"><?php echo $project_title;?></a></div>
        <p class="prop"><?php echo BY; ?></p>
        <?php echo anchor('user/profile/'.$user_info['user_id'],$user_info['user_name'].' '.$user_info['last_name'],'class="prjown"');?>
        <div id="project_card_summary">
          <p class="prop" style="height:70px !important;"><?php echo $project_summary;?></p>
        </div>
        <div class="clr"></div>
        <hr class="projhr">
        <div class="projectprg">
          <div style="width:0%;" class="prjprocal"></div>
        </div>
        <div class="one1">0%</div>
        <ul class="projectdul">
          <li>
            <h2 class="currency"><?php echo $site_setting['currency_symbol']; ?></h2>
            <p class="raised">0 <?php echo RAISED; ?></p>
          </li>
          <li>
            <p style="float:right;" class="raised" id="dl"><?php echo $totaldays." ".DAYS_LEFT; ?></p>
            <h2 style="float:right; margin-left:10px;" class="day"></h2>
          </li>
        </ul>
      </div>
    </div>
    <?php }?>
  </div>
  <div class="setp2btm">
    <div id="page_we">
      <input type="hidden"  name="id" id="id"  value="<?php echo $id; ?>" />
      
      <!-- <input type="button" class="stepbtn" value="Back" style="margin-left:346px;" />
      <input type="submit"  name="draft" id="draft" class="stepbtn" title="<?php echo SAVE; ?>" style="margin-left:346px;" value="<?php echo SAVE; ?>" />-->
      <input type="submit" style="margin-left:346px;"  name="next" id="next" class="stepbtn" title="<?php echo NEXT; ?>" value="<?php echo NEXT; ?>" />
      </form>
      <!--<a href="#" class="deleteprj">Delete Project</a>--> 
      <?php echo anchor('start/deleteproject_popup/'.$id,'Delete Project','id="iframe" class="deleteprj" title="Delete Project "'); ?> <?php echo anchor('home','EXIT','class="exitp" title="Exit Project "');?> </div>
  </div>
</section>

<!--******************Section********************--> 

