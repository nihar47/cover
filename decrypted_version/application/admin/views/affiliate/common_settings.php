<div id="con-tabs">
  <ul>
    <li><span style="cursor:pointer;"><?php echo anchor('affiliates','Stats'); ?></span></li>
    <li><span style="cursor:pointer;"><?php echo anchor('affiliates/common_settings','Common Settings','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
     <li><span style="cursor:pointer;"><?php echo anchor('affiliates/commission_settings','Commission Settings'); ?></span></li>
       <li><span style="cursor:pointer;"><?php echo anchor('affiliates/commission_history','Commission History'); ?></span></li>
       
        <li><span style="cursor:pointer;"><?php echo anchor('requests/affiliate_requests','Affiliate Request'); ?></span></li>
        <li><span style="cursor:pointer;"><?php echo anchor('affiliates/withdraw_request','Withdraw Fund Request'); ?></span></li>
     
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
                <div id="deal-con">
                  <div id="2" style="">
                    <div align="center">
                      <div id="add-deal">
						<?php
							$attributes = array('name'=>'common_settings');
							echo form_open('affiliates/common_settings',$attributes);
						?>
                        <fieldset class="step">
                        <div align="left"><br />
                          <br />
                          <br />
                        </div>
                       
                       
                       
                       
                         <div align="left"><strong style="font-size:15px; text-decoration:underline;">Affiliate Enable</strong></div>
                     <br />
<br />

                        <div class="fleft">
                          <label><b>Affiliate Status</b><span>&nbsp;</span></label>
                       
                         <select name="affiliate_enable" id="affiliate_enable" >
								<option value="1" <?php if($affiliate_enable == 1){ echo 'selected="selected"'; } ?>>Active</option>
								<option value="0" <?php if($affiliate_enable == 0){ echo 'selected="selected"'; } ?>>Inactive</option>
							</select>
                            
                            
                        </div>
                        <div style="clear:both;"></div>
                       
                          <br />
                          <br />
                        
                        
                        
                        
                       
                        <div align="left"><strong style="font-size:15px; text-decoration:underline;">Configuration</strong> :  This will be the <b>maximum time limit</b> within which the referral cookie has to be used (by the User), after this time gets elapsed the cookie will get expired or become unusable.</div>
                        <div align="left">
                          <br />
                          <br />
                        </div>
                        <div class="fleft">
                          <label><b>Referral Cookie Expire Time</b><span>&nbsp;</span></label>
                          <span onmouseover="show_bg('cookie_expire_time')" onmouseout="hide_bg('cookie_expire_time')">
                          <input type="text" name="cookie_expire_time" id="cookie_expire_time" value="<?php echo $cookie_expire_time; ?>" onfocus="show_bg('cookie_expire_time')" onblur="hide_bg('cookie_expire_time')"/>
                          &nbsp;<span style="float:left;margin-top:5px;margin-left:10px;">hrs</span> </span> </div>
                        <div style="clear:both;"></div>
                       
                        
                         <br />
                          <br />
                          <br />
                          <br />
                        
                        
                        <div align="left"><strong style="font-size:15px; text-decoration:underline;">Commission</strong></div>
                        <div align="left"> <br />
                          <br /><img src="<?php echo base_url(); ?>images/info.png" border="0" />This is the <b>maximum period</b> (in number of days) in which the commission amount will be in "holding" status. During this stage the user (An Affiliate) <b>cannot place a request for the Withdrawal</b>.<br />
                          <br />
                        </div>
                        <div class="fleft">
                          <label><b>Maximum Commission Holding Period</b><span>&nbsp;</span></label>
                          <span onmouseover="show_bg('commission_holding_period')" onmouseout="hide_bg('commission_holding_period')">
                          <input type="text" name="commission_holding_period" id="commission_holding_period" value="<?php echo $commission_holding_period; ?>" onfocus="show_bg('commission_holding_period')" onblur="hide_bg('commission_holding_period')"/>
                          &nbsp;<span style="float:left;margin-top:5px;margin-left:10px;">days</span> </span> </div>
                        <div style="clear:both;"></div>
                        <div align="left"><br />
                          <br />
                        </div>
                         <div align="left"><img src="<?php echo base_url(); ?>images/info.png" border="0" /><b>On enabling</b> this feature, affiliate user will <b>earn commission amount on every pledge</b>. (<b>Turn this off</b>, if you want affiliate user to be payed only for his <b>first pledge</b>)<br />
                          <br />
                        </div>
                        <div class="fleft">
                          <label><span>&nbsp;</span></label>
                          <span onmouseover="show_bg('pay_commission_pledge')" onmouseout="hide_bg('pay_commission_pledge')">
                          <input type="checkbox" name="pay_commission_pledge" id="pay_commission_pledge" value="1" <?php if($pay_commission_pledge == '1'){ echo 'checked="checked"'; } ?> onfocus="show_bg('pay_commission_pledge')" onblur="hide_bg('pay_commission_pledge')" style="width:auto;"/>
                          &nbsp;<span style="float:left;margin-top:5px;margin-left:10px;"><b>Enable Pay commission on every pledge</span> </b></span> </div>
                        <div style="clear:both;"></div>
                        <div align="left"><br />
                          <br />  <br />
                          <br />
                        </div>
                        <?php /*?>     
                        <div align="left"><img src="<?php echo base_url(); ?>images/info.png" border="0" />On enabling this feature, affiliate user will earn commission amount on every project listing. (Turn this off, if you want affiliate user to be payed only for his first project listing)<br />
                          <br />
                        </div>
                   
                        <div class="fleft">
                          <label><span>&nbsp;</span></label>
                          <span onmouseover="show_bg('pay_commission_project_listing')" onmouseout="hide_bg('pay_commission_project_listing')">
                          <input type="checkbox" name="pay_commission_project_listing" id="pay_commission_project_listing" value="1" <?php if($pay_commission_project_listing == '1'){ echo 'checked="checked"'; } ?> onfocus="show_bg('pay_commission_project_listing')" onblur="hide_bg('pay_commission_project_listing')" style="width:auto;"/>
                          &nbsp;<span style="float:left;margin-top:5px;margin-left:10px;"><b>Enable Pay commission on every project listing</b></span> </span> </div>
                        <div style="clear:both;"></div>
                        
                        
                        <div align="left"><br />
                          <br />
                          <br />
                        </div><?php */?>
                        
                        <input type="hidden" name="pay_commission_project_listing" id="pay_commission_project_listing" value="0" />
                        
                        
                        <div align="left"><strong style="font-size:15px; text-decoration:underline;">Withdrawal</strong></div>
                        <div align="left"><br />
                          <br />
                        </div>
                        
                        <div align="left"><img src="<?php echo base_url(); ?>images/info.png" border="0" />This is the <b>minimum amount to be earned</b> by an "Affiliate User" for placing a "withdrawal request".
                        <br />
                          <br />
                        </div>
                        <div class="fleft">
                          <label><b>Minimum Withdrawal Threshold Limit</b> (<?php echo $site_setting['currency_symbol'];?>)<span>&nbsp;</span></label>
                          <span onmouseover="show_bg('minimum_withdrawal_threshold')" onmouseout="hide_bg('minimum_withdrawal_threshold')">
                          <input type="text" name="minimum_withdrawal_threshold" id="minimum_withdrawal_threshold" value="<?php echo $minimum_withdrawal_threshold; ?>" onfocus="show_bg('minimum_withdrawal_threshold')" onblur="hide_bg('minimum_withdrawal_threshold')" />
                          &nbsp;<span style="float:left;margin-top:5px;margin-left:10px;"></span> </span> </div>
                        <div style="clear:both;"></div>
                        <div align="left"><br />
                          <br />
                        </div>
                        
                         <div align="left"><img src="<?php echo base_url(); ?>images/info.png" border="0" />This is the <b>amount which will be deducted</b> during the Affiliate cash withdrawal. (<b>Leave blank space for "no fee"</b> transaction)
                        <br />
                          <br />
                        </div>
                        
                        
                        <div class="fleft">
                          <label><b>Transaction Fee</b> (<?php echo $site_setting['currency_symbol'];?>)<span>&nbsp;</span></label>
                          <span onmouseover="show_bg('transaction_fee')" onmouseout="hide_bg('transaction_fee')">
                          <input type="text" name="transaction_fee" id="transaction_fee" value="<?php echo $transaction_fee; ?>" onfocus="show_bg('transaction_fee')" onblur="hide_bg('transaction_fee')" />
                          &nbsp;<span style="float:left;margin-top:5px;margin-left:10px;"></span> </span> </div>
                        <div style="clear:both;"></div>
                        <div align="left"><br />
                          <br />
                        </div>
                        
                         <div align="left"><img src="<?php echo base_url(); ?>images/info.png" border="0" />The selected option will be used as the default option for "<b>fee type</b>" during an "Affiliate cash withdrawal
                        <br />
                          <br />
                        </div>
                        <div class="fleft">
                          <label><b>Fees Type</b><span>&nbsp;</span></label>
                          <span onmouseover="show_bg('fee_type')" onmouseout="hide_bg('fee_type')">
                         
						  	<select name="fee_type" id="fee_type" >
								<option value="percentage" <?php if($fee_type == 'percentage'){ echo 'selected="selected"'; } ?>>percentage</option>
								<option value="amount" <?php if($fee_type == 'amount'){ echo 'selected="selected"'; } ?>>amount</option>
							</select>
                          &nbsp;<span style="float:left;margin-top:5px;margin-left:10px;"></span> </span> </div>
                        <div style="clear:both;"></div>
                        <div align="left"><br />
                          <br />
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        <div align="left"><strong style="font-size:15px; text-decoration:underline;">Affiliate Content</strong></div>
                        <div align="left"><br />
                          <br />
                        </div>
                        
                        <div align="left"><img src="<?php echo base_url(); ?>images/info.png" border="0" />This is the content <b>display at the time when user request for affiliate or user see affiliate page without login</b>.
                        <br />
                          <br />
                        </div>




<!-- /TinyMCE -->
                        <div class="">
                          <label><b>Content</b><span>&nbsp;</span></label>
                          <span onmouseover="show_bg('affiliate_content')" onmouseout="hide_bg('affiliate_content')">
                         <?php /*?> <textarea name="affiliate_content" id="affiliate_content" onfocus="show_bg('affiliate_content')" onblur="hide_bg('affiliate_content')" rows="25" cols="75" style="width: 589px;height: 487px;" ><?php echo $affiliate_content; ?></textarea><?php */?>
                          
                           <?php /*
										$vals = array(
											'name' => 'affiliate_content',
											'id' => 'affiliate_content',
											'width' => '68%',
											'height' => '400px',
											'value' => $affiliate_content,
										);
										echo form_fckeditor($vals)."";*/
									  ?>
                                      
                                      
                          &nbsp; </span>
                          
                          <div style="background:#fff; float:left; width:600px; padding:2px;">
                                        <!-- jQuery and jQuery UI -->
										<script src="<?php echo upload_url(); ?>editor/js/jquery-1.4.4.min.js" type="text/javascript" charset="utf-8"></script>
                                        <script src="<?php echo upload_url(); ?>editor/js/jquery-ui-1.8.7.custom.min.js" type="text/javascript" charset="utf-8"></script>
                                        <link rel="stylesheet" href="<?php echo upload_url(); ?>editor/css/smoothness/jquery-ui-1.8.7.custom.css" type="text/css" media="screen" charset="utf-8">
                                
                                        <!-- elRTE -->
                                        <script src="<?php echo upload_url(); ?>editor/js/elrte.min.js" type="text/javascript" charset="utf-8"></script>
                                        <link rel="stylesheet" href="<?php echo upload_url(); ?>editor/css/elrte.min.css" type="text/css" media="screen" charset="utf-8">
                                        
                                        <!-- elFinder -->
                                        <link rel="stylesheet" href="<?php echo upload_url(); ?>editor/css/elfinder.css" type="text/css" media="screen" charset="utf-8" /> 
                                        <script src="<?php echo upload_url(); ?>editor/js/elfinder.full.js" type="text/javascript" charset="utf-8"></script> 
                                        
                                     
                                        <script type="text/javascript" charset="utf-8">
                                            jQuery().ready(function() {
											
											
													elRTE.prototype.options.panels.web2pyPanel = ['save','copy', 'cut', 'paste', 'pastetext', 'pasteformattext', 'removeformat','undo', 'redo','strikethrough','bold', 'italic', 'underline', 'subscript', 'superscript','link', 'unlink', 'anchor','insertorderedlist', 'insertunorderedlist', 'justifyleft', 'justifyright','justifycenter', 'justifyfull', 'forecolor','hilitecolor', 'outdent', 'indent','horizontalrule', 'blockquote', 'div', 'stopfloat', 'css', 'nbsp', 'smiley', 'pagebreak','ltr', 'rtl','table', 'tableprops', 'tablerm',  'tbrowbefore', 'tbrowafter', 'tbrowrm', 'tbcolbefore', 'tbcolafter', 'tbcolrm', 'tbcellprops', 'tbcellsmerge', 'tbcellsplit','formatblock','fontsize', 'fontname','image', 'flash','elfinder','fullscreen'];
 elRTE.prototype.options.toolbars.web2pyToolbar = ['web2pyPanel'];
 
 
 
                                                var opts1 = {
                                                    cssClass : 'el-rte',
                                                    lang     : 'en',  // Set your language
                                                    allowSource : 1,  // Allow user to view source
                                                    height   : 450,   // Height of text area
                                                    toolbar  : 'web2pyToolbar',   // Your options here are 'tiny', 'compact', 'normal', 'complete', 'maxi', or 'custom'
                                                    cssfiles : ['<?php echo upload_url(); ?>editor/css/elrte-inner.css'],
                                                    // elFinder
                                                    fmAllow  : 1,
                                                    fmOpen : function(callback) {
                                                        $('<div id="myelfinder" />').elfinder({
                                                            url : '<?php echo upload_url(); ?>editor/connectors/php/connector.php', //You must configure this file. Look for 'URL'.  
                                                            lang : 'en',
                                                            dialog : { width : 900, modal : true, title : 'Files' }, // Open in dialog window
                                                            closeOnEditorCallback : true, // Close after file select
                                                            editorCallback : callback     // Pass callback to file manager
                                                        })
                                                    }
                                                    //End of elFinder
                                                }
                                                
                                                $('#affiliate_content').elrte(opts1);
                                                
                                            })
                                        </script>
                                        
                                        
                                        <textarea id="affiliate_content" name="affiliate_content" cols="50" rows="4">
                                                <?php echo $affiliate_content; ?>
                                            </textarea></div>
                                            
                           </div>
                        <div style="clear:both;"></div>
                        <div align="left"><br />
                          <br />
                        </div>
                        
                        
                        
                        
                        
                        <div class="fleft">
                          <label>&nbsp;<span>&nbsp;</span></label>
                          <div class="submit">
                            <input type="hidden" name="common_settings_id" id="common_settings_id" value="<?php echo $common_settings_id; ?>" />
                            <input type="submit" name="update" value="Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" />
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
