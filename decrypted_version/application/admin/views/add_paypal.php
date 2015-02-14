<script type="text/javascript">
function set_sandbox(){
	document.getElementById('site_status').value = 'sandbox';
	document.getElementById('application_id').value = 'APP-80W284485P519543T';
	document.getElementById('paypal_email').value = 'fadmin_1321252063_biz@gmail.com';
	document.getElementById('paypal_username').value = 'fadmin_1321252063_biz_api1.gmail.com';
	document.getElementById('paypal_password').value = '1321252087';
	document.getElementById('paypal_signature').value = 'AAQNP4IUOwIbkYjIuH2o4oHIZiVzAXXPY8ZxlXELGuNXh541QLWnI56m';
	
	document.getElementById('first_name').value = 'rakesh';
	document.getElementById('last_name').value = 'patel';
	document.getElementById('email').value = 'rakesh007_patel@yahoo.co.in';
}

function get_username(){

}

</script>


<div id="con-tabs">

          <ul>

            <li><span style="cursor:pointer;"><?php echo anchor('transaction_type/list_paypal','Paypal','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>            

          </ul>

          <div id="text">

            <div id="1">

            

          
              <div class="fleft" style="width:100%;">

                <div style="height:10px;"></div>

				<table width="100%" border="0" cellpadding="0" cellspacing="0">

                  <tr>

                    <td><img src="<?php echo base_url(); ?>images/c2-t-l.jpg" alt="" height="4" width="7" /></td>

                    <td background="<?php echo base_url(); ?>images/c2-t.jpg" width="99%"></td>

                    <td><img src="<?php echo base_url(); ?>images/c2-t-r.jpg" alt="" height="4" width="7" /></td>

                  </tr>

                  <tr>

                    <td background="<?php echo base_url(); ?>images/c2-l.jpg"></td>

                    <td valign="top" bgcolor="#FFFFFF"><div id="deal-tabs">
	 				
                    
                    <?php $attspop = array(
  'width'      => '700',
  'height'     => '500',
  'scrollbars' => 'yes',
  'status'     => 'yes',
  'resizable'  => 'yes',
  'screenx'    => '350',
  'screeny'    => '75',
  'location'=>'no',
  'menubar'=>'no',
  'titlebar'=>'no',
  'toolbar'=>'no'
);
			?>
	 <div  class="testmail" style="float:right;">
	<?php echo anchor_popup('automation/index','Test Your Paypal Setting',$attspop);?>
  </div>
  
  
    
   
   
                     <div class="submit" style="float:right;">
							<input type="button" name="set" value="Set Sandbox Details" style="background:none; border:none; color:#FFFFFF; font-size:14px; cursor:pointer; padding-top:7px;" onclick="set_sandbox();" />
					  </div>  <div style="clear:both;"></div>
                      
                      
						<div id="deal-con">

							<div id="2" style="">

							  <div align="center">

								<div id="add-deal">

                                
                                  <?php if($error != "")

					{?>

						<div style="text-align:center; color:#f00;" class="msgdisp"><?php echo $error; ?></div>

					<?php }

			?>	


                                 <script language="javascript" src="<?php echo base_url(); ?>js/Tooltip.js"></script>

								  <?php

								  

								  $CI =& get_instance();

								 $base_url_site = $CI->config->slash_item('base_url_site');

		

		

									$attributes = array('name'=>'frm_paypal');

									echo form_open('transaction_type/add_paypal',$attributes);

								  ?>

									<fieldset class="step">
                                    
                                    
                                    
  

									<div class="fleft">

									  <label>Site Status<span>&nbsp;</span></label>

									  <span onMouseOver="show_bg('site_status')" onMouseOut="hide_bg('site_status')">

									 <!-- <input type="text" name="site_status" id="site_status" value="<?php echo $site_status; ?>" onFocus="show_bg('site_status')" onBlur="hide_bg('site_status')"/>-->

                                      <select name="site_status" id="site_status" onFocus="show_bg('site_status')" onBlur="hide_bg('site_status')">

                                     

                                       <option value="sandbox" <?php if($site_status=='sandbox'){ echo "selected"; } ?>>sand box</option>

                                        <option value="live" <?php if($site_status=='live'){ echo "selected"; } ?>>live</option>

                                      </select>

									  </span>

									

                                    </div>

									<div style="clear:both;"></div>

                                   

                                    

                                     <div class="fleft">

									  <label>Paypal Application Id<span>&nbsp;</span></label>

									  <span onMouseOver="show_bg('application_id')" onMouseOut="hide_bg('application_id')">

									  <input type="text" name="application_id" id="application_id" value="<?php echo $application_id; ?>" onFocus="show_bg('application_id')" onBlur="hide_bg('application_id')"/>

									  </span> (ex :: APP-80W284485P519543T)

									</div>

                                    

                                    



									<div style="clear:both;"></div>

                                   

                                    <div class="fleft">

									  <label>Paypal Email Id<span>&nbsp;</span></label>

									  <span onMouseOver="show_bg('paypal_email')" onMouseOut="hide_bg('paypal_email')">

									  <input type="text" name="paypal_email" id="paypal_email" value="<?php echo $paypal_email; ?>" onFocus="show_bg('paypal_email')" onBlur="hide_bg('paypal_email')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

                                    

                                    <div class="fleft">

									  <label>Paypal API Username<span>&nbsp;</span></label>

									  <span onMouseOver="show_bg('paypal_username')" onMouseOut="hide_bg('paypal_username')">

									  <input type="text" name="paypal_username" id="paypal_username" value="<?php echo $paypal_username; ?>" onFocus="show_bg('paypal_username')" onBlur="hide_bg('paypal_username')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

                                    

                                    <div class="fleft">

									  <label>Paypal API Password<span>&nbsp;</span></label>

									  <span onMouseOver="show_bg('paypal_password')" onMouseOut="hide_bg('paypal_password')">

									  <input type="password" name="paypal_password" id="paypal_password" value="<?php echo $paypal_password; ?>" onFocus="show_bg('paypal_password')" onBlur="hide_bg('paypal_password')"/>

									  </span>

									</div>

									<div style="clear:both;"></div>

                                    

                                    <div class="fleft">

									  <label>Paypal API Signature<span>&nbsp;</span></label>

									  <span onMouseOver="show_bg('paypal_signature')" onMouseOut="hide_bg('paypal_signature')">

									  <input type="text" name="paypal_signature" id="paypal_signature" value="<?php echo $paypal_signature; ?>" onFocus="show_bg('paypal_signature')" onBlur="hide_bg('paypal_signature')"/>

									  </span>

									</div>

								


									<div style="clear:both; height:10px;"></div>

                                    

                                    <div >

                                    (If active then you have to set cron job for every 5 minutes  with this URL <br/> <?php echo $base_url_site.'cron/cron_preapprove'; ?> <br/>Ex :: curl -s -o /dev/null  <?php echo $base_url_site.'cron/cron_preapprove'; ?>)

                                    </div>

                                    

                                    <div style="clear:both;height:10px;"></div>

                                    

                                    <div class="fleft">

									  <label>Paypal Fees taken from<span>&nbsp;</span></label>

									  <span onMouseOver="show_bg('fees_taken_from')" onMouseOut="hide_bg('fees_taken_from')">

									 <!-- <input type="text" name="fees_taken_from" id="fees_taken_from" value="<?php echo $fees_taken_from; ?>" onFocus="show_bg('fees_taken_from')" onBlur="hide_bg('fees_taken_from')"/>-->

									    <select name="fees_taken_from" id="fees_taken_from" onFocus="show_bg('fees_taken_from')" onBlur="hide_bg('fees_taken_from')">

                                                                         

                                        <option value="SENDER" <?php if($fees_taken_from=='SENDER'){ echo "selected"; } ?>>Donor</option>

                                        <option value="PRIMARYRECEIVER" <?php if($fees_taken_from=='PRIMARYRECEIVER'){ echo "selected"; } ?>>Project Owner</option>

                                      </select>

                                      

                                      </span>

									</div>

									<div style="clear:both;"></div>


                                <!-- <div class="fleft">
									  <label>Commission fees(%)<span>&nbsp;</span></label>
									  <span onMouseOver="show_bg('transaction_fees')" onMouseOut="hide_bg('transaction_fees')">
									  <input type="text" name="transaction_fees" id="transaction_fees" value="<?php echo $transaction_fees; ?>" onFocus="show_bg('transaction_fees')" onBlur="hide_bg('transaction_fees')"/>
									  </span>
									</div>
                                   
									<div style="clear:both;"></div>-->

                                          <input type="hidden" name="transaction_fees" id="transaction_fees" value="<?php echo $transaction_fees; ?>" onFocus="show_bg('transaction_fees')" onBlur="hide_bg('transaction_fees')"/> 

                         	 	<?php /*?> <div class="fleft">
									  <label>Maximum Donation Amount (<?php $site_setting['currency_symbol']; ?>)<span>&nbsp;</span></label>
									  <span onMouseOver="show_bg('donate_limit')" onMouseOut="hide_bg('donate_limit')">
									   <input type="text" name="donate_limit" id="donate_limit" value="<?php echo $donate_limit; ?>" onFocus="show_bg('donate_limit')" onBlur="hide_bg('donate_limit')"/>
									  </span>
									</div>
                                  
									<div style="clear:both;"></div><?php */?>

                                     <input type="hidden" name="donate_limit" id="donate_limit" value="<?php echo $donate_limit; ?>" onFocus="show_bg('donate_limit')" onBlur="hide_bg('donate_limit')"/>

                                   <!--   <div class="fleft">

									  <label>Gateway Status<span>&nbsp;</span></label>

									  <span onMouseOver="show_bg('gateway_status')" onMouseOut="hide_bg('gateway_status')">

									
									   <select name="gateway_status" id="gateway_status" onFocus="show_bg('gateway_status')" onBlur="hide_bg('gateway_status')">

                                     

                                       <option  value="0" <?php if($gateway_status=='0'){ echo "selected"; } ?>>Inactive</option>

                                        <option  value="1" <?php if($gateway_status=='1'){ echo "selected"; } ?>>Active</option>

                                      </select>

                                      

                                      </span>

									</div>

									<div style="clear:both;"></div>-->

                                    

                                    <input type="hidden" name="gateway_status" id="gateway_status" value="<?php echo $gateway_status; ?>" />

									<div class="fleft">

									  <label>&nbsp;<span>&nbsp;</span></label>

									  <span onMouseOver="show_bg('id')" onMouseOut="hide_bg('id')">

									  <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />

									  <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />

									  </span>

									</div>

									<div style="clear:both;"></div>

						   <div class="fleft" style="font-size:16px; width:315px; font-weight:bold; text-decoration:underline;">For Testing Your Adaptive PayPal Details</div>
                            	<div style="clear:both; height:15px;"></div>

						
                        
                          <div class="fleft">
							  <label>Paypal First Name<span>&nbsp;</span></label>
							  <span onMouseOver="show_bg('first_name')" onMouseOut="hide_bg('first_name')">
								  <input type="text" name="first_name" id="first_name" value="<?php echo $first_name; ?>" onFocus="show_bg('first_name')" onBlur="hide_bg('first_name')"/>
							  </span>

						</div><div style="clear:both; height:10px;"></div>
                        
                        <div class="fleft">
							  <label>Paypal Last Name<span>&nbsp;</span></label>
							  <span onMouseOver="show_bg('last_name')" onMouseOut="hide_bg('last_name')">
								  <input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>" onFocus="show_bg('last_name')" onBlur="hide_bg('last_name')"/>
							  </span>

						</div><div style="clear:both; height:10px;"></div>
                        
                        
                         <div class="fleft">
							  <label>Paypal Email Id<span>&nbsp;</span></label>
							  <span onMouseOver="show_bg('email')" onMouseOut="hide_bg('email')">
								  <input type="text" name="email" id="email" value="<?php echo $email; ?>" onFocus="show_bg('email')" onBlur="hide_bg('email')"/>
							  </span>

						</div><div style="clear:both; height:10px;"></div>
                                    
                                    
                        
                                    
                                    <div class="fleft">

									  <label>&nbsp;<span>&nbsp;</span></label>

									  <?php

										if($id=="")

										{

									  ?>

									  <div class="submit">

										<input type="submit" name="submit" value="Submit" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onClick=""/>

									  </div>

									  <?php

										}else{

									  ?>

									  <div class="submit">

										<input type="submit" name="submit" value="Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onClick=""/>

									  </div>

									  <?php

										}

									  ?>
										
                                         <div class="submit">

										<input type="submit" name="test_update" value="Test & Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " id="test_update" onClick="get_username();"/>

									  </div>
                                       
									  <div class="submit">

										<input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('transaction_type/list_paypal'); ?>'"/>

									  </div>

									</div>

									</fieldset>

								  </form>

								</div>

							  </div>

							</div>

						</div>

					</div></td>

                    <td background="<?php echo base_url(); ?>images/c2-r.jpg"></td>

                  </tr>

                  <tr>

                    <td><img src="<?php echo base_url(); ?>images/c2-b-l.jpg" alt="" height="4" width="7" /></td>

                    <td background="<?php echo base_url(); ?>images/c2-b.jpg"></td>

                    <td><img src="<?php echo base_url(); ?>images/c2-b-r.jpg" alt="" height="4" width="7" /></td>

                  </tr>

                </table>

              </div>

            </div>

          </div>

        </div>

      

      



<script>

var t1=null;



var auto_target_achive_info=" <b>YES :</b> All Preapprove Transaction commit When Project achieve its goal before its expiry date.<br /><br /><b>NO :</b> All Preapprove Transaction commit if project achieve its goal at expire date.";



function init()

{

 t1 = new ToolTip("a",true,40);

}





window.onload=function() { init() } 

</script>