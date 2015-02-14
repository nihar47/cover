<script type="text/javascript">
function check_comment_len(){

	var comment1 = document.getElementById('comments1').value;
	var subject = document.getElementById('subject').value;
	
	var rep1 = comment1;
	var sub1 = subject;
//var rep = $("#text").val().replace('  ',' ');
	var len1 = rep1.length;
	var len2 = sub1.length;

	
	if(len2 == 0 && len1<15)
	{
		document.getElementById('len_err2').style.display='block';
		document.getElementById('len_err1').style.display='block';
		return false;
	}
	if(len2 != 0 && len1<15)
	{
		document.getElementById('len_err2').style.display='none';
		document.getElementById('len_err1').style.display='block';
		return false;
	}
	if(len2 == 0)
	{
		document.getElementById('len_err2').style.display='block';
		document.getElementById('len_err1').style.display='none';
		return false;
	}
	if(len2 == 0 && len1>15)
	{
		document.getElementById('len_err1').style.display='none';
		return false;
	}
	if(len1<15){
		document.getElementById('len_err1').style.display='block';
		return false;
	}
	
		document.getElementById('len_err1').style.display='none';
		document.getElementById('len_err2').style.display='none';
		return true;

}
</script>	
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

.inner_content{
margin-bottom:0px; padding:0px;
height:300px !important; 
width:485px !important;
overflow:hidden;
}

p {
	padding:0px;
}
</style>	
<div class="fancy_main"> 
	 <div align="center" class="inner_content" > 
      <br />                      
          <h3 class="stitle" style="text-align:left; line-height:0px; padding:0px;"> <?php echo SEND_MESSAGE; ?></h3>
    			<?php	$attributes = array('name'=>'frm_comment');
						echo form_open_multipart('message/send_mail_project_profile/');
						?>
			 <br /> <table border="0" cellpadding="0" cellspacing="0"  align="center" >
            
            		<tr>
                    	<td align="left"><span style="color:#000; font-size:14px;"><?php echo SUBJECT;?></span></td>
                    </tr>
                    <tr>
						<td align="left" valign="top">
                        
                         <p style="color:#f00; text-align:left; display:none" id="len_err2"><?php echo YOU_CANNOT_ENTER_SUBJECT_BLANK; ?><br /></p>
                     	<input type="text" name="subject" id="subject" value="" style="width:200px;"/></td>
						</tr>
                        <tr>
                    		<td align="left"><span style="color:#000; font-size:14px;"><?php echo MSG;?></span></td>
                   		 </tr>
            			<tr>
						<td align="left" valign="top">
                       <p style="color:#f00; text-align:left; display:none" id="len_err1"><?php echo YOU_CANNOT_ADD_LESS_THAN_FIFTEEN_CHAR_MESSAGE; ?><br /></p>
						<textarea name="comments" id="comments1" class="comment_textarea" style="width:480px;" ></textarea></td>
						</tr>
						
                      <tr>						
					<td align="left" valign="top" >
					<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>"  />
					<input type="hidden" name="pid" id="pid" value="<?php echo $pid; ?>"  />
                      <input type="submit" class="submit" value="<?php echo PROJECT_SEND_MESSAGE; ?>" name="submit" id="submit" onclick="return check_comment_len();"/>
					</td></tr>
                        
					
						</table>		
                        
                      	</form>  
	</div>
</div>
                
    