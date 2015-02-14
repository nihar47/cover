<!--<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>-->
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

height:120px !important; 
width:602px !important;
height:123px; 
width:531px;
overflow:hidden;
/*border:1px solid red;*/
}
</style>

<script>
function close_fancy(){
	
	parent.$.fn.colorbox.close();

}
</script>
<div class="fancy_main">    
<div class="inner_content_two" style="background-color:#E3F0FD;	border: 1px solid #9FC8DA; margin-bottom:0px;">
<?php
				  		$attributes = array('name'=>'frm_fund','target'=>'_parent');
						echo form_open_multipart('payment/add_fund_confirm',$attributes);
						$login_user = get_user_detail($project['user_id']);
						
						$don_user = get_user_detail($this->session->userdata('user_id'));
				  	?>

				<p><?php  
				$link = '<a href="'.site_url('member/'.$project['user_id']).'" target="_blank" >'.$login_user['user_name'].' '.$login_user['last_name'].'</a>';
				echo sprintf(ARE_YOU_SURE_YOU_WANT_TO_DONATE_ON_THE_PROJECT,set_currency($post_amount),$project['project_title'],$link);
				//echo 'Are you sure you want to donate on the project - '.$project['project_title'];
				?></p>
	
				<p>
                	<!-- <span>
                     	<?php if($don_user['fb_uid'] !=''){ ?> 
                        	<input type="checkbox" name="facebook" id="facebook" value="1" checked="checked" /></span> <span><?php echo SHARE_ON_FACEBOOK;?>
                        <?php }else{  ?>
                        	<input type="hidden" name="facebook" id="facebook" value="0" />
						<?php } ?>
                     </span> 
               		 <span style="margin-left:20px;">
                     <?php if($don_user['tw_id'] !=''){ ?> 
                        	<input type="checkbox" name="twitter" id="twitter" value="1" checked="checked" /></span> <span><?php echo SHARE_ON_TWITTER; ?>
                     <?php }else{  ?>
                        	<input type="hidden" name="twitter" id="twitter" value="0" />
					<?php } ?>
                     </span>-->
                </p>
              
					<div style="float:left; padding-left:190px; margin-right:20px;">
				
                <input type="submit" class="remindanchor" value="<?php echo CONFIRM; ?>" name="add" id="add"  /> 
                <input  type="button" class="remindanchor" value="<?php echo CANCEL; ?>" name="cancel" id="cancel"  onclick="close_fancy();" /> 
                  
                  
                  </div>
<div class="form-element-container" style="margin-left:150px;">
<input type="hidden" name="docomment" id="docomment" value="do_comment" />			
<input type="hidden" name="post_perk_id" id="post_perk_id" value="<?php echo $post_perk_id; ?>" />
<input type="hidden" name="post_id" id="post_id" value="<?php echo $post_id; ?>" />
<input type="hidden" name="post_gateway" id="post_gateway" value="<?php echo $post_gateway; ?>" />
<input type="hidden" name="post_amount" id="post_amount" value="<?php echo $post_amount; ?>" />
<input type="hidden" name="post_anonymous" id="post_anonymous" value="<?php echo $post_anonymous; ?>" />
<input type="hidden" name="post_email" id="post_email" value="<?php echo $post_email; ?>" />


<input type="hidden" name="cardnumber" id="cardnumber" value="<?php echo $cardnumber; ?>" />
<input type="hidden" name="cvv2Number" id="cvv2Number" value="<?php echo $cvv2Number; ?>" />
<input type="hidden" name="cardtype" id="cardtype" value="<?php echo $cardtype; ?>" />
<input type="hidden" name="card_expiration_month" id="card_expiration_month" value="<?php echo $card_expiration_month; ?>" />
<input type="hidden" name="card_expiration_year" id="card_expiration_year" value="<?php echo $card_expiration_year; ?>" />

<input type="hidden" name="card_first_name" id="card_first_name" value="<?php echo $card_first_name; ?>" />
<input type="hidden" name="card_last_name" id="card_last_name" value="<?php echo $card_last_name; ?>" />

<input type="hidden" name="card_address" id="card_address" value="<?php echo $card_address; ?>" />
<input type="hidden" name="card_city" id="card_city" value="<?php echo $card_city; ?>" />
<input type="hidden" name="card_state" id="card_state" value="<?php echo $card_state; ?>" />
<input type="hidden" name="card_zipcode" id="card_zipcode" value="<?php echo $card_zipcode; ?>" />

			  
			  </div>

<div style="clear:both;"></div>
</form>
</div>
</div>