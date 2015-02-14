<script type="text/javascript">
function check_comment_len(){

	var comment = document.getElementById('comments1').value;
	
	var rep = trim(comment);
//var rep = $("#text").val().replace('  ',' ');

	var len = rep.length;
	if(len<15){
		document.getElementById('len_err1').style.display='block';
		return false;
	}
		document.getElementById('len_err1').style.display='none';
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
height:180px !important; 
width:530px !important;
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
						echo form_open_multipart('message/send_mail_project_detail/');
						?>
			 <br /> <table border="0" cellpadding="0" cellspacing="0"  align="center" >
						<tr>
                    		<td align="left"><span style="color:#ffffff; font-size:14px;"><?php echo MSG;?></span></td>
                   		 </tr>
                        <tr>
						<td align="left" valign="top">
                       <p style="color:#f00; text-align:left; display:none" id="len_err1"><?php echo YOU_CANNOT_ADD_LESS_THAN_FIFTEEN_CHAR_MESSAGE; ?><br /></p>
						<textarea name="comments" id="comments1" class="comment_textarea" style="width:480px;" ></textarea></td>
						</tr>
						
                      <tr>						
					<td align="left" valign="top" >
					<input type="hidden" name="project_id" id="project_id" value="<?php echo $project['project_id']; ?>"  />
                    <input type="submit" class="submit" value="<?php echo PROJECT_SEND_MESSAGE; ?>" name="submit" id="submit" onclick="return check_comment_len();"/>
					</td></tr>
                        
					
						</table>		
                        
                      	</form>  
	</div>
</div>
                
    