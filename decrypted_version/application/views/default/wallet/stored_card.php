<style type="text/css">
#error p{
	color:#FF0000;
}
#error span{
	color:#0000FF;
}
</style>

<div id="headerbar">
	<div class="wrap930">
	
	<!-- dd menu -->	
<div class="login_navl">
		
			
			
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr><td align="left" >	
	<div class="project_title_hd" style="padding-top:15px;" >
	
	
	<span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo CREDIT_CARD_TITLE; ?></span>
	
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

<?php echo $this->load->view('default/dashboard_sidebar'); ?>

<!--side bar user panel-->


<div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">
           			
              
<style type="text/css">

#tab_all a{ color:#000000; text-decoration:none; }

#sts:hover{ font-weight:bold; }
</style>				
			
<style>
        fieldset {
            overflow: auto;
            border: 0;
            margin: 0;
            padding: 0; }

        fieldset div {
            float: left;
			margin-left:15px; }

        fieldset.centered div {
            text-align: center; }
		h4{
		font-family:Tahoma, Geneva, sans-serif;
		color:#F00;
		
		}
        label {
            color: #183b55;
            display: block;
            margin-bottom: 5px; }

        label img {
            display: block;
            margin-bottom: 5px; }

        input.text {
            border: 1px solid #bfbab4;
            margin: 0 4px 8px 0;
            padding: 6px;
            color: #1e1e1e;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: inset 0px 5px 5px #eee;
            -moz-box-shadow: inset 0px 5px 5px #eee;
            box-shadow: inset 0px 5px 5px #eee; }
       
        </style>

<?php
	$data=array();
	$this->load->view('default/wallet/credit_card_tab',$data);

?>


     
      
 <div class="inner_content" style=" margin-top:11px;padding:12px; ">
		         
				
			<h3 id="dropmenu2"><?php echo MY_CREDIT_CARD; ?> </h3>
            
            
              <div class="clear"></div> 
  <!--noop-->
  
   <?php  if($error != '') {
   
   if($error=='fail') { ?>     
<div id="msg" align="center"><span>
	<?php echo CREDIT_CARD_AUTH_FAILED; ?>
</span></div><div class="clear"></div> 
<?php }   elseif($error=='update') {  ?>
        
        
   <div id="msg" align="center"><span style="color:#00CC00;">
	<?php echo CREDIT_CARD_SUCCESS_MSG; ?>
</span></div>   
 <div class="clear"></div>           
      <?php } else { ?> <div id="msg" align="center"><span>
	<?php echo $error; ?>
</span></div>
<div class="clear"></div> 
<?php  } } ?>
  
  <?php
	$attributes = array('name'=>'frmCardInfo','id'=>'frmCardInfo');
	echo form_open('stored_card/',$attributes);
?>


     <fieldset>
                <div>
                    <label class="normal_label"><?php echo CREDIT_CARD_STORE_NUMBER; ?></label>
                    <input type="text" class="btn_input" size="25" name="cardnumber" id="cardnumber" value="<?php echo $cardnumber; ?>"></input>
                </div>
                <div>
                    <label class="normal_label"><?php echo CREDIT_CARD_VERFICATION_NUMBER; ?></label>
                    <input type="text" class="btn_input" size="15" name="cvv2Number" id="cvv2Number" value="<?php echo $cvv2Number; ?>" ></input>
                </div>
                 </fieldset><br />
            <fieldset>
                <div>
                    <label class="normal_label"><?php echo CREDIT_CARD_TYPE; ?></label>
                   
                    <select name="cardtype" id="cardtype" class="btn_input" style="padding:0px;">
						<option value='Visa' <?php if($cardtype=='Visa') { ?> selected <?php } ?>>Visa</option>
                        <option value='MasterCard'  <?php if($cardtype=='MasterCard') { ?> selected <?php } ?>>MasterCard</option>
                        <option value='Discover'  <?php if($cardtype=='Discover') { ?> selected <?php } ?>>Discover</option>
                        <option value='Amex'  <?php if($cardtype=='Amex') { ?> selected <?php } ?>>Amex</option>
                    </select>
                    
                    
                </div>
                
                
                <div>
                    <label class="normal_label"><?php echo CREDIT_CARD_EXPIRY_DATE; ?></label>
                   
                   <select name="card_expiration_month" id="card_expiration_month" class="btn_input" style="padding:0px; width:42px;">
						<option value="1" <?php if($card_expiration_month==1) { ?> selected <?php } ?>>1</option>
						<option value="2"  <?php if($card_expiration_month==2) { ?> selected <?php } ?>>2</option>
						<option value="3"  <?php if($card_expiration_month==3) { ?> selected <?php } ?>>3</option>
						<option value="4"  <?php if($card_expiration_month==4) { ?> selected <?php } ?>>4</option>
						<option value="5"  <?php if($card_expiration_month==5) { ?> selected <?php } ?>>5</option>
						<option value="6"  <?php if($card_expiration_month==6) { ?> selected <?php } ?>>6</option>
						<option value="7"  <?php if($card_expiration_month==7) { ?> selected <?php } ?>>7</option>
						<option value="8"  <?php if($card_expiration_month==8) { ?> selected <?php } ?>>8</option>
						<option value="9"  <?php if($card_expiration_month==9) { ?> selected <?php } ?>>9</option>
						<option value="10"  <?php if($card_expiration_month==10) { ?> selected <?php } ?>>10</option>
						<option value="11"  <?php if($card_expiration_month==11) { ?> selected <?php } ?>>11</option>
						<option value="12"  <?php if($card_expiration_month==12) { ?> selected <?php } ?>>12</option>
                    </select>
                    
                    <select name="card_expiration_year" id="card_expiration_year" class="btn_input" style="padding:0px; width:60px;">
						<?php for($i=date('Y');$i<=date('Y')+7;$i++) 
						{ ?>
                                              
                        <option value="<?php echo $i;?>" <?php if($card_expiration_year==$i) { ?> selected <?php } ?>><?php echo $i;?></option>
						<?php } ?>
                    </select>
                    
                    
                </div>
                
                
            </fieldset><br />
            <fieldset>
                <div>
                    <label class="normal_label"><?php echo CREDIT_CARD_FIRST_NAME; ?></label>
                    <input type="text" class="btn_input" size="32" name="card_first_name" id="card_first_name" value="<?php echo $card_first_name; ?>" ></input>
                </div>
                <div>
                    <label class="normal_label"><?php echo CREDIT_CARD_LAST_NAME; ?></label>
                    <input type="text" class="btn_input" size="31" name="card_last_name" id="card_last_name" value="<?php echo $card_last_name; ?>" ></input>
                </div>
            </fieldset><br />
            <fieldset>
                <div>
                    <label class="normal_label"><?php echo CREDIT_CARD_ADDRESS; ?></label>
                    <input type="text" class="btn_input" size="38" name="card_address" id="card_address" value="<?php echo $card_address; ?>" ></input>
                </div>
                <div>
                    <label class="normal_label"><?php echo CREDIT_CARD_CITY ;?></label>
                    <input type="text" class="btn_input" size="25" name="card_city" id="card_city" value="<?php echo $card_city; ?>" ></input>
                </div>
            </fieldset><br />
            <fieldset>
                <div>
                    <label class="normal_label"><?php echo CREDIT_CARD_STATE ;?></label>
                    <input type="text" class="btn_input" size="15" name="card_state" id="card_state" value="<?php echo $card_state; ?>" ></input>
                </div>
                <div>
                    <label class="normal_label"><?php echo CREDIT_CARD_ZIPCODE ;?></label>
                    <input type="text" class="btn_input" size="17" name="card_zipcode" id="card_zipcode" value="<?php echo $card_zipcode; ?>" ></input>
                </div>
               
            </fieldset>
            <fieldset>
            <div style="margin-left:40px">
             <label>&nbsp;</label>
             <?php if($card_verify_status==0 || $card_verify_status=='') { ?>
            <input type="submit" value="<?php echo CREDIT_CARD_VERIFY_BTN; ?>" class="submit">
            <?php } ?>
            </div></fieldset>

	  
      
      
        <div class="clear"></div>		
		</form>
        
        
        
       <!--noop-->
     </div>
		</div>
        <div class="clear"></div>		
				
				
					</div>
	<!-- left end ------>
		
       </div>