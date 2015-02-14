<div id="con-tabs">
  <ul>
    <li><span style="cursor:pointer;"><?php echo anchor('affiliates','Stats','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>
    <li><span style="cursor:pointer;"><?php echo anchor('affiliates/common_settings','Common Settings'); ?></span></li>
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
                    
                    
                    
                    <!--noop-->
                    
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">

                <tr>

                  <td><img src="<?php echo base_url(); ?>images/c2-t-l.jpg" alt="" height="4" width="7" /></td>

                  <td background="<?php echo base_url(); ?>images/c2-t.jpg" width="99%"></td>

                  <td><img src="<?php echo base_url(); ?>images/c2-t-r.jpg" alt="" height="4" width="7" /></td>

                </tr>

                <tr>

                  <td background="<?php echo base_url(); ?>images/c2-l.jpg"></td>

                  <td valign="top"><table width="100%" border="0" bgcolor="#FFFFFF">

                      <tr>

                        <td class="inr-header"><div class="fleft">Stats</div>

                          <div class="fright"><a href="#"><img id="arrow_dig_it1" src="<?php echo base_url(); ?>images/down-arrow.png" alt="" border="0" onclick="show_block('dig_it1')"/></a></div></td>

                      </tr>

                      <tr>

                        <td valign="top"><div class="deals" style="display:block;" id="dig_it1">

                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">

                              <tr>

                                <td width="40%" height="30"></td>

                                <td width="12%" bgcolor="#888f91"><strong>Today</strong></td>

                                <td width="1%"></td>

                                <td width="12%" bgcolor="#888f91"><strong>This Week</strong></td>

                                <td width="1%"></td>

                                <td width="12%" bgcolor="#888f91"><strong>This Month</strong></td>

                                <td width="1%"></td>

                                <td width="12%" bgcolor="#888f91"><strong>Total</strong></td>

                                <td width="18%"></td>

                              </tr>

                              <tr>

                                <td colspan="9"><table width="100%" cellpadding="0" cellspacing="1" style="background:#888f91;">

                                    <tr onclick="toggle(this);" class="alter">

                                      <td width="20%" height="28" rowspan="4"><div class="pad-left"><strong>Affiliates</strong></div></td>

                                      <td width="20%" height="28" ><div><strong>Pending (<?php echo $site_setting['currency_symbol']; ?>)</strong></div></td>

                                      <td width="12%" align="center"><?php echo $affiliate_pending_today; ?></td>

                                      <td width="1%" ></td>

                                      <td width="12%" align="center"><?php echo $affiliate_pending_week; ?></td>

                                      <td width="1%" ></td>

                                      <td width="12%" align="center"><?php echo $affiliate_pending_month; ?></td>

                                      <td width="1%" ></td>

                                      <td width="12%" align="center"><?php echo $affiliate_pending_total; ?></td>

                                      <td width="18%" ></td>

                                    </tr>

                                    <tr onclick="toggle1(this);" class="alter1">

                                      <td height="28"><div><strong>Cancelled (<?php echo $site_setting['currency_symbol']; ?>)</strong></div></td>

                                      <td><?php echo $affiliate_cancel_today; ?></td>

                                      <td></td>

                                      <td><?php echo $affiliate_cancel_week; ?></td>

                                      <td></td>

                                      <td><?php echo $affiliate_cancel_month; ?></td>

                                      <td></td>

                                      <td><?php echo $affiliate_cancel_total; ?></td>

                                      <td></td>

                                    </tr>
                                    
                                     <tr onclick="toggle(this);" class="alter1">

                                      <td height="28"><div><strong>Pipeline (<?php echo $site_setting['currency_symbol']; ?>)</strong></div></td>

                                      <td><?php echo $affiliate_pipeline_today; ?></td>

                                      <td></td>

                                      <td><?php echo $affiliate_pipeline_week; ?></td>

                                      <td></td>

                                      <td><?php echo $affiliate_pipeline_month; ?></td>

                                      <td></td>

                                      <td><?php echo $affiliate_pipeline_total; ?></td>

                                      <td></td>

                                    </tr>
                                    
                                    
                                     <tr onclick="toggle1(this);" class="alter1">

                                      <td height="28"><div><strong>Completed (<?php echo $site_setting['currency_symbol']; ?>)</strong></div></td>

                                      <td><?php echo $affiliate_completed_today; ?></td>

                                      <td></td>

                                      <td><?php echo $affiliate_completed_week; ?></td>

                                      <td></td>

                                      <td><?php echo $affiliate_completed_month; ?></td>

                                      <td></td>

                                      <td><?php echo $affiliate_completed_total; ?></td>

                                      <td></td>

                                    </tr>
                                    
                                    

                                    <tr onclick="toggle(this);" class="alter">

                                      <td height="28" rowspan="3"><div class="pad-left"><strong>Affiliate Requests</strong></div></td>

                                      <td height="28" ><div><strong>Approved</strong></div></td>

                                      <td align="center"><?php echo $affiliate_approved_request_today; ?></td>

                                      <td align="center"></td>

                                      <td align="center"><?php echo $affiliate_approved_request_week; ?></td>

                                      <td align="center"></td>

                                      <td align="center"><?php echo $affiliate_approved_request_month; ?></td>

                                      <td align="center"></td>

                                      <td align="center"><?php echo $affiliate_approved_request_total; ?></td>

                                      <td align="center"></td>

                                    </tr>

                                    <tr onclick="toggle1(this);" class="alter1">

                                      <td height="28" class="deal-td-white"><div><strong>Waiting for Approved</strong></div></td>

                                      <td><?php echo $affiliate_waiting_request_today; ?></td>

                                      <td></td>

                                      <td><?php echo $affiliate_waiting_request_week; ?></td>

                                      <td></td>

                                      <td><?php echo $affiliate_waiting_request_month; ?></td>

                                      <td></td>

                                      <td><?php echo $affiliate_waiting_request_total; ?></td>

                                      <td></td>

                                    </tr>

									
                                    <tr onclick="toggle(this);" class="alter1">

                                      <td height="28" class="deal-td-white"><div><strong>Total</strong></div></td>

                                      <td><?php echo $affiliate_approved_request_today+$affiliate_waiting_request_today; ?></td>

                                      <td></td>

                                      <td><?php echo $affiliate_approved_request_week+$affiliate_waiting_request_week; ?></td>

                                      <td></td>

                                      <td><?php echo $affiliate_approved_request_month+$affiliate_waiting_request_month; ?></td>

                                      <td></td>

                                      <td><?php echo $affiliate_approved_request_total+$affiliate_waiting_request_total; ?></td>

                                      <td></td>

                                    </tr>
                                    
                                    
                                    
                                    
                                    
                                    
                                    <tr onclick="toggle1(this);" class="alter">

                                      <td height="28" rowspan="5"><div class="pad-left"><strong>Affiliate Withdaw Requests</strong></div></td>

                                      <td height="28" ><div><strong>Pending</strong></div></td>

                                      <td ><?php echo $affiliate_withdraw_request_pending_today; ?></td>

                                      <td ></td>

                                      <td ><?php echo $affiliate_withdraw_request_pending_week; ?></td>

                                      <td ></td>

                                      <td ><?php echo $affiliate_withdraw_request_pending_month; ?></td>

                                      <td ></td>

                                      <td ><?php echo $affiliate_withdraw_request_pending_total; ?></td>

                                      <td ></td>

                                    </tr>

                                    <tr onclick="toggle(this);" class="alter1">

                                      <td height="28" class="deal-td-white"><div><strong>Approved</strong></div></td>

                                      <td ><?php echo $affiliate_withdraw_request_approved_today; ?></td>

                                      <td></td>

                                      <td ><?php echo $affiliate_withdraw_request_approved_week; ?></td>

                                      <td></td>

                                      <td ><?php echo $affiliate_withdraw_request_approved_month; ?></td>

                                      <td></td>

                                      <td ><?php echo $affiliate_withdraw_request_approved_total; ?></td>

                                      <td></td>

                                    </tr>
                                    
                                    <tr onclick="toggle1(this);" class="alter1">

                                      <td height="28" class="deal-td-white"><div><strong>Reject</strong></div></td>

                                      <td ><?php echo $affiliate_withdraw_request_reject_today; ?></td>

                                      <td></td>

                                      <td ><?php echo $affiliate_withdraw_request_reject_week; ?></td>

                                      <td></td>

                                      <td ><?php echo $affiliate_withdraw_request_reject_month; ?></td>

                                      <td></td>

                                      <td ><?php echo $affiliate_withdraw_request_reject_total; ?></td>

                                      <td></td>

                                    </tr>
                                    
                                    <tr onclick="toggle(this);" class="alter1">

                                      <td height="28" class="deal-td-white"><div><strong>Success</strong></div></td>

                                      <td ><?php echo $affiliate_withdraw_request_success_today; ?></td>

                                      <td></td>

                                      <td ><?php echo $affiliate_withdraw_request_success_week; ?></td>

                                      <td></td>

                                      <td ><?php echo $affiliate_withdraw_request_success_month; ?></td>

                                      <td></td>

                                      <td ><?php echo $affiliate_withdraw_request_success_total; ?></td>

                                      <td></td>

                                    </tr>                                    
										
                                        
                                      <tr onclick="toggle1(this);" class="alter1">

                                      <td height="28" class="deal-td-white"><div><strong>Fail</strong></div></td>

                                      <td ><?php echo $affiliate_withdraw_request_fail_today; ?></td>

                                      <td></td>

                                      <td ><?php echo $affiliate_withdraw_request_fail_week; ?></td>

                                      <td></td>

                                      <td ><?php echo $affiliate_withdraw_request_fail_month; ?></td>

                                      <td></td>

                                      <td ><?php echo $affiliate_withdraw_request_fail_total; ?></td>

                                      <td></td>

                                    </tr>
                                    
                                    
                                      
                                  </table></td>

                              </tr>

                            </table>

                          </div></td>

                      </tr>

                    </table></td>

                  <td background="<?php echo base_url(); ?>images/c2-r.jpg"></td>

                </tr>

                <tr>

                  <td><img src="<?php echo base_url(); ?>images/c2-b-l.jpg" alt="" height="4" width="7" /></td>

                  <td background="<?php echo base_url(); ?>images/c2-b.jpg"></td>

                  <td><img src="<?php echo base_url(); ?>images/c2-b-r.jpg" alt="" height="4" width="7" /></td>

                </tr>

              </table>
                    
                    <!--noop-->
                    
                    
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