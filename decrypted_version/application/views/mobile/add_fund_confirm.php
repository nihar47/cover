<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url(); ?>FundrisingCss.css" rel="stylesheet" type="text/css" />

<style type="text/css">

.fancy_main{

	background-color:#2B5F94;

	border: 2px solid #2C6592;

    /*border-radius: 3px 3px 3px 3px;*/

	padding:10px;

	

}

.submit{

	text-transform:uppercase;

}



.inner_content_two{



height:101px !important; 

width:496px !important;

height:123px; 

width:531px;

overflow:hidden;

/*border:1px solid red;*/

}

</style>

<div class="fancy_main">    

<div class="inner_content_two" style="background-color:#E3F0FD;	border: 1px solid #9FC8DA; margin-bottom:0px;">

<?php

				  		$attributes = array('name'=>'frm_fund','target'=>'_parent');

						echo form_open_multipart('payment/add_fund_confirm',$attributes);

						$login_user=get_user_detail($project['user_id']);

				  	?>



				<p><?php  

				$link = '<a href="'.site_url('member/'.$project['user_id']).'" target="_blank" >'.$login_user['user_name'].' '.$login_user['last_name'].'</a>';

				echo sprintf(ARE_YOU_SURE_YOU_WANT_TO_DONATE_ON_THE_PROJECT,set_currency($post_amount),$project['project_title'],$link);

				//echo 'Are you sure you want to donate on the project - '.$project['project_title'];

				?></p>

	



					<div  style="float: left;padding-left: 150px;margin-right: 20px;">

					

                    <input type="submit" class="submit" value="<?php echo CONFIRM; ?>" name="add" id="add"  class="submit" />  <input type="submit" class="submit" value="<?php echo CANCEL; ?>" name="cancel" id="cancel"  class="submit" /> </div>

<div class="form-element-container" style="margin-left:150px;">

<input type="hidden" name="docomment" id="docomment" value="do_comment" />			

<input type="hidden" name="post_perk_id" id="post_perk_id" value="<?php echo $post_perk_id; ?>" />

<input type="hidden" name="post_id" id="post_id" value="<?php echo $post_id; ?>" />

<input type="hidden" name="post_gateway" id="post_gateway" value="<?php echo $post_gateway; ?>" />

<input type="hidden" name="post_amount" id="post_amount" value="<?php echo $post_amount; ?>" />

<input type="hidden" name="post_anonymous" id="post_anonymous" value="<?php echo $post_anonymous; ?>" />

<input type="hidden" name="post_email" id="post_email" value="<?php echo $post_email; ?>" />

			  

			  </div>



<div style="clear:both;"></div>

</form>

</div>

</div>