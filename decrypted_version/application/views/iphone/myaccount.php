
<script type="text/javascript">

function getstate(str)
{
	if(str=='')
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
			}
		}
		
		var url = '<?php echo site_url('home/getstates'); ?>/'+str;
		
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
	
}
function filename(name)
{
//	alert(name);
	document.getElementById('file_name').value=name.replace("C:\\fakepath\\","");

}
</script>

<div data-role="header" data-position="inline">
	<h1><?php echo ACCOUNT;?></h1>
	<?php echo anchor('home','Home','class="ui-btn-right"'); ?>
</div>

<div class="pad15">

	<?php if($error!=''){ ?>
        <div id="error">
            <ul>
            <?php  echo $error; ?>
            </ul>
        </div>
    <?php  }  ?>
	
	 <?php
		$attributes = array('name'=>'frm_account');
		echo form_open_multipart('home/myaccount',$attributes);
	 ?>
	 
	 <?php  $chk_paypal=$this->home_model->check_project_user_paypal_add();

		if($chk_paypal==1) {  echo anchor('home/verify_paypal/',CHANGE_PAYPAL_EMAIL_ADDRESS,'style="font-weight:bold; font-size:13px; float:right; padding:0px 0px 7px 0px;"'); }   ?>
		
		<div id="s1postJ"><?php echo ACCOUNT;?>  : <?php echo $result['user_name']." ".$result['last_name']; ?></div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo FIRST_NAME; ?> : <span style="color:#f00;">*</span></label>
            <input type="text" name="user_name" id="user_name" value="<?php echo $result['user_name']; ?>"  class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" />
        </div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo LAST_NAME; ?> : <span style="color:#f00;">*</span></label>
             <input type="text" name="last_name" id="last_name" value="<?php echo $result['last_name']; ?>"  class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"/>
        </div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo YOUR_EMAIL; ?> : <span style="color:#f00;">*</span></label>
             <input type="text" name="email" id="email" value="<?php echo $result['email']; ?>"  class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"/>
        </div>
		
		<input type="hidden" name="password" id="password" value="<?php echo $result['password']; ?>"  class="btn_input"/> 
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
    		<label class="ui-input-text" for="name"><?php echo UPLOAD_PHOTO; ?> : &nbsp;&nbsp;</label>
  		 </div>
		  <div class="file_upload" style="float:left; margin-left: 300px;" >
			<input type="file" name="file1" id="file1" onchange="return filename(this.value);"/>
		  </div>
		  <div>
			<input type="text" name="file_name" id="file_name"readonly="readonly" style=" border:0px; background:none; box-shadow: 0 0px 0px rgba(0, 0, 0, 0);"/>
		  </div>
   <input type="hidden" name="prev_image" id="prev_image" value="<?php echo $result['image']; ?>" />
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo ADDRESS; ?> : <span style="color:#f00;">*</span></label>
             <input type="text" name="address" id="address" value="<?php echo $result['address']; ?>" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"/>
        </div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo CITY; ?> : <span style="color:#f00;">*</span></label>
              <input type="text" name="city" id="city" value="<?php echo $result['city']; ?>" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"/>
        </div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo COUNTRY; ?> : <span style="color:#f00;">*</span></label>
             <select tabindex="5" name="country" id="country" class="select" onchange="getstate(this.value)" style="text-transform:capitalize;">
						<option value=""> -- <?php echo SELECT_COUNTRY; ?> -- </option>
					<?php
						foreach($countrylist as $row){
						
							if($result['country']==$row->country_name)
							{
							echo "<option value='".$row->country_name."' selected='selected'>".$row->country_name."</option>";
							}
							else
							{
							echo "<option value='".$row->country_name."'>".$row->country_name."</option>";
							}
						}
					?>
                    </select>
        </div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo STATE; ?> : <span style="color:#f00;">*</span></label>
             <select tabindex="5" name="state" id="state" class="select" onchange="getstate(this.value)" style="text-transform:capitalize;">
						<option value=""> -- <?php echo SELECT_STATE; ?> -- </option>
					<?php
						
						if($result['state']=='No State'){
							echo "<option value='".$result['state']."'  selected='selected'>No States</option>";
						}
						else{
							foreach($statelist as $st){
							
							
							if($result['state']==$st->state_name)
							{
								echo "<option value='".$st->state_name."'  selected='selected'>".$st->state_name."</option>";
								}
	
								else
								{
								echo "<option value='".$st->state_name."'  >".$st->state_name."</option>";
								}
								
								
							}
						}
					?>
                    </select>
        </div>
		
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo ZIP; ?> : <span style="color:#f00;">*</span></label>
              <input type="text" name="zip_code" id="zip_code" value="<?php echo $result['zip_code']; ?>" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"/>
        </div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo ABOUT_YOURSELF; ?> : <span style="color:#f00;">*</span></label>
               <textarea name="user_about" style=" width:350px; height:170px;" id="user_about" ><?php echo $result['user_about']; ?></textarea>
        </div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo OCCUPATION; ?> : <span style="color:#f00;">*</span></label>
              <input type="text" name="user_occupation" id="user_occupation" value="<?php echo $result['user_occupation']; ?>"  class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"/>
        </div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo INTEREST; ?> : <span style="color:#f00;">*</span></label>
               <textarea name="user_interest" style=" width:350px; height:100px;" id="user_interest" ><?php echo $result['user_interest']; ?></textarea>
        </div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo SKILLS; ?> : <span style="color:#f00;">*</span></label>
               <textarea name="user_skill" style=" width:350px; height:100px;" id="user_skill" ><?php echo $result['user_interest']; ?></textarea>
        </div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo WEBSITE; ?> : <span style="color:#f00;">*</span></label>
              <input type="text" name="user_website" id="user_website" value="<?php echo $result['user_website']; ?>"    class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"/>
        </div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo FACEBOOK_PROFILE_URL; ?> : <span style="color:#f00;">*</span></label>
              <input type="text" name="facebook_url" id="facebook_url" value="<?php echo $result['facebook_url']; ?>" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"/>
        </div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo TWITTER_PROFILE_URL; ?> : <span style="color:#f00;">*</span></label>
              <input type="text" name="twitter_url" id="twitter_url" value="<?php echo $result['twitter_url']; ?>"  class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"/>
        </div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo LINKEDIN_PROFILE_URL; ?> : <span style="color:#f00;">*</span></label>
              <input type="text" name="linkedln_url" id="linkedln_url" value="<?php echo $result['linkedln_url']; ?>" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"/>
        </div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo GOOGLE_PLUS_PROFILE_URL; ?> : <span style="color:#f00;">*</span></label>
               <input type="text" name="googleplus_url" id="googleplus_url" value="<?php echo $result['googleplus_url']; ?>"  class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"/>   
        </div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo BANDCAMP_PROFILE_URL; ?> : <span style="color:#f00;">*</span></label>
            <input type="text" name="bandcamp_url" id="bandcamp_url" value="<?php echo $result['bandcamp_url']; ?>" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"/>   
        </div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo YOUTUBE_PROFILE_URL; ?> : <span style="color:#f00;">*</span></label>
            <input type="text" name="youtube_url" id="youtube_url" value="<?php echo $result['youtube_url']; ?>" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"/>    
        </div>
		
		<div class="ui-field-contain ui-body ui-br" data-role="fieldcontain">
            <label class="ui-input-text" for="name"><?php echo MYSPACE_PROFILE_URL; ?> : <span style="color:#f00;">*</span></label>
            <input type="text" name="myspace_url" id="myspace_url" value="<?php echo $result['myspace_url']; ?>" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"/>   
        </div>
		
		  <input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id']; ?>" />
		  
		  <input type="submit" class="submbg2" style="font-weight:bold;" name="login" id="login" value="<?php echo SAVE_CHANGES; ?>"  />
		  
		  <input type="button" onClick="location.href='<?php echo site_url('home/account');?>'" class="submbg2" style="font-weight:bold; margin-left:8px;" name="login" id="login" value="<?php echo CANCEL; ?>"   />
		
	 </form>
	
	
	
	
	
	
</div>