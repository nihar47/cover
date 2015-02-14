<script type="text/javascript">

function getstate(countryid)
{
	if(countryid=='')
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
				document.getElementById('state_div').innerHTML= xmlhttp.responseText;
				getallcity();
			}
		}
		
		var url = '<?php echo site_url('home/getstate'); ?>/'+countryid;
		
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
	
}
function getcity(stateid)
{
	
	if(stateid=='')
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
				document.getElementById('city_div').innerHTML= xmlhttp.responseText;
			}
		}
		
		var url = '<?php echo site_url('home/getcity'); ?>/'+stateid;
		
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
	
}

function getallcity()
{
	
	
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
				document.getElementById('city_div').innerHTML= xmlhttp.responseText;
			}
		}
		
		var url = '<?php echo site_url('home/getallcity'); ?>';
		
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
	
}
function filename(name)
{
//	alert(name);
	document.getElementById('file_name').value=name.replace("C:\\fakepath\\","");

}
</script>

<div id="headerbar">
  <div class="wrap930">
    <div class="login_navl">
      <div style="margin:15px 0px 0px 0px; float:left;"> <span style="text-transform:capitalize;color:#2B5F94;font-size:17px; font-weight:bold;"> <?php echo MANAGE_YOUR_ACCOUNT_BELOW; ?> : </span> <?php echo YOUR_NAME_DISPLAYED_TO_PEOPLE_YOU_SHARE_YOUR_FUND; ?> </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<?php if($this->session->userdata('user_id')!='') {
 
	} ?>
<div class="clear"></div>
<div id="container">
  <div class="wrap930" style="text-align:center;padding:15px 0px 20px 0px;">
    <!--side bar user panel-->
    <?php echo $this->load->view('default/dashboard_sidebar'); ?>
    <!--side bar user panel-->
    <div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">
      <style type="text/css">
	.s_lleft
	{	
		width:198px !important;
	}
	.s_right {		
		width: 355px !important;		
	}
	
	</style>
      <style type="text/css">

#tab_all a{ color:#000000; text-decoration:none; }

</style>
      <?php
	$data['tab_sel'] = ACCOUNT;
	$this->load->view('default/dashboard_tabs',$data);

?>
      <?php
						$attributes = array('name'=>'frm_account');
						echo form_open_multipart('home/account',$attributes);
						
				  ?>
      <div class="inner_content" style="margin-top:11px;padding:12px; ">
        <div class="clear"></div>
        <?php  $chk_paypal=$this->home_model->check_project_user_paypal_add();

		if($chk_paypal==1) {  echo anchor('home/verify_paypal/',CHANGE_PAYPAL_EMAIL_ADDRESS,'style="font-weight:bold; font-size:13px; float:right; padding:0px 0px 7px 0px;"'); }   ?>
        <div class="clear"></div>
        <div id="msg" align="center"><span><?php echo $error; ?></span></div>
        <div class="s_lleft">
          <label><?php echo FIRST_NAME; ?> : <span style="color:#f00;">*</span></label>
        </div>
        <div class="s_right"><span>
          <input type="text" name="user_name" id="user_name" value="<?php echo $result['user_name']; ?>"  class="btn_input" />
          </span></div>
        <div class="clear"></div>
        <div class="s_lleft">
          <label><?php echo LAST_NAME; ?> : <span style="color:#f00;">*</span></label>
        </div>
        <div class="s_right"><span >
          <input type="text" name="last_name" id="last_name" value="<?php echo $result['last_name']; ?>"  class="btn_input"/>
          </span> </div>
        <div class="clear"></div>
        <div class="s_lleft">
          <label><?php echo YOUR_EMAIL; ?> : <span style="color:#f00;">*</span></label>
        </div>
        <div class="s_right"><span >
          <input type="text" name="email" id="email" value="<?php echo $result['email']; ?>"  class="btn_input"/>
          </span></div>
        <div class="clear"></div>
        <!-- <div class="s_lleft">
                      <label><?php //echo PASSWORD; ?> : *</label></div>
                      <div class="s_right"><span >
                      <input type="password" name="password" id="password" value="<?php //echo $result['password']; ?>"  class="btn_input"/>
                      </span> </div>
					<div class="clear"></div>
				   -->
        <input type="hidden" name="password" id="password" value="<?php echo $result['password']; ?>"  class="btn_input"/>
        <div class="s_lleft">
          <label><?php echo UPLOAD_PHOTO; ?> :&nbsp;&nbsp;&nbsp;</label>
        </div>
        <div class="s_right"><span >
          <div class="file_upload" style="float:left;">
            <input type="file" name="file1" id="file1" onchange="return filename(this.value);"/>
          </div>
          <div>
            <input type="text" name="file_name" id="file_name"readonly="readonly" style="border:none; background-color:#E3F0FD;"/>
          </div>
          <div class="clear"></div>
          <input type="hidden" name="prev_image" id="prev_image" value="<?php echo $result['image']; ?>" />
          </span> </div>
        <div class="clear"></div>
        <div class="s_lleft">
          <label><?php echo ADDRESS; ?> :&nbsp;&nbsp;&nbsp;</label>
        </div>
        <div class="s_right"><span >
          <input type="text" name="address" id="address" value="<?php echo $result['address']; ?>"  class="btn_input"/>
          </span> </div>
        <div class="clear"></div>
        
        <div class="s_lleft">
          <label><?php echo COUNTRY; ?> : <span style="color:#f00;">*</span></label>
        </div>
        <div class="s_right"><span>
          <select tabindex="5" name="country" id="country" class="btn_input" onblur="getstate(this.value)" style="text-transform:capitalize;">
            <option value=""> -- <?php echo SELECT_COUNTRY; ?> -- </option>
            <?php
						foreach($countrylist as $row){
						
							if($result['country']==$row->country_id)
							{
							echo "<option value='".$row->country_id."' selected='selected'>".$row->country_name."</option>";
							}
							else
							{
							echo "<option value='".$row->country_id."'>".$row->country_name."</option>";
							}
						}
					?>
          </select>
          </span></div>
        <div class="clear"></div>
        <div class="s_lleft">
          <label><?php echo STATE; ?> : <span style="color:#f00;">*</span></label>
        </div>
        <div class="s_right"><span>
          <div id="state_div">
            <select tabindex="5" name="state" id="state" class="btn_input" style="text-transform:capitalize;" onblur="getcity(this.value)">
              <option value="" > -- <?php echo SELECT_STATE; ?> -- </option>
              <?php
						
						if($result['state']=='No State'){
							echo "<option value=''  selected='selected'>".NO_STATES."</option>";
						}
						else{
							foreach($statelist as $st){
							
							
							if($result['state']==$st->state_id)
							{
								echo "<option value='".$st->state_id."'  selected='selected'>".$st->state_name."</option>";
								}
	
								else
								{
								echo "<option value='".$st->state_id."'  >".$st->state_name."</option>";
								}
								
								
							}
						}
					?>
            </select>
          </div>
          </span></div>
        <div class="clear"></div>
        
        <div class="s_lleft">
          <label><?php echo CITY; ?> : <span style="color:#f00;">*</span></label>
        </div>
        <!--<div class="s_right"><span >
          <input type="text" name="city" id="city" value="<?php //echo $result['city']; ?>" class="btn_input"/>
          </span> </div>-->
          <div id="city_div" class="s_right"><span>
          <select tabindex="5" name="city" id="city" class="btn_input" style="text-transform:capitalize;">
            <option value=""> -- <?php echo SELECT_CITY; ?> -- </option>
            <?php
						if($result['city']=='No City'){
							echo "<option value=''  selected='selected'>".NO_CITY."</option>";
						}
						else{
							foreach($citylist as $ct){
							
							
							if($result['city']==$ct->city_id)
							{
								echo "<option value='".$ct->city_id."'  selected='selected'>".$ct->city_name."</option>";
								}
	
								else
								{
								echo "<option value='".$ct->city_id."'  >".$ct->city_name."</option>";
								}
								
								
							}
						}
					?>
          </select>
          </span></div>
        <div class="clear"></div>
        
        <div class="s_lleft">
          <label><?php echo ZIP; ?> : <span style="color:#f00;">*</span></label>
        </div>
        <div class="s_right"><span >
          <input type="text" name="zip_code" id="zip_code" value="<?php echo $result['zip_code']; ?>"  class="btn_input"/>
          </span> </div>
        <div class="clear"></div>
        <div class="s_lleft">
          <label><?php echo ABOUT_YOURSELF; ?> :&nbsp;&nbsp;&nbsp;</label>
        </div>
        <div class="s_right"><span>
          <textarea name="user_about" style=" width:350px; height:170px;" id="user_about" ><?php echo $result['user_about']; ?></textarea>
          </span> </div>
        <div class="clear"></div>
        <div class="s_lleft">
          <label><?php echo OCCUPATION; ?> :&nbsp;&nbsp;&nbsp;</label>
        </div>
        <div class="s_right"><span>
          <input type="text" name="user_occupation" id="user_occupation" value="<?php echo $result['user_occupation']; ?>"  class="btn_input2"/>
          </span></div>
        <div class="clear"></div>
        <div class="s_lleft">
          <label><?php echo INTEREST; ?> :&nbsp;&nbsp;&nbsp;</label>
        </div>
        <div class="s_right"><span>
          <textarea name="user_interest" id="user_interest" style=" width:250px; height:100px;" class="btn_txta" ><?php echo $result['user_interest']; ?></textarea>
          </span></div>
        <div class="clear"></div>
        <div class="s_lleft">
          <label><?php echo SKILLS; ?> :&nbsp;&nbsp;&nbsp;</label>
        </div>
        <div class="s_right"><span>
          <textarea name="user_skill" id="user_skill" style=" width:250px; height:100px;" class="btn_txta"><?php echo $result['user_skill']; ?></textarea>
          </span></div>
        <div class="clear"></div>
      
        <input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id']; ?>" />
        <div class="s_lleft"> &nbsp;</div>
        <div class="s_right">
          <input type="submit" class="submit" style="font-weight:bold;" name="login" id="login" value="<?php echo SAVE_CHANGES; ?>"  />
          <input type="button" onClick="location.href='<?php echo site_url('home/dashboard');?>'" class="submit" style="font-weight:bold; margin-left:8px;" name="login" id="login" value="<?php echo CANCEL; ?>"   />
        </div>
        <div class="clear"></div>
        <div align="right" style="font-size:10px; padding-right:15px;">
          <p class="required"><?php echo REQUIRED_FIELD; ?></p>
        </div>
        <div class="clear"></div>
        </form>
      </div>
    </div>
    <!--con left2-->
  </div>
</div>
