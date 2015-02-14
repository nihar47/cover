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
height:320px !important; 
width:400px !important;
overflow:hidden;
}

p {
	padding:0px;
}
</style>

<div class="fancy_main">  


<div id="email_friend">
     <div align="center" class="inner_content" >                       
          <h3 class="stitle"><?php echo INVITES_FRIENDS;?></h3>
          
          
          
    
     <div class="clear"></div>
    
    <script type="text/javascript">
	function inviteemail()
	{
		var recipient_name=$("#recepition_name").val();
		var recipient_email=$("#recepition_email").val();
		var recipient_message=trim(removeHTMLTags($("#recipient_message").val()));
		
		
		if(recipient_email=='') { return false; }
			
			 var res = $.ajax({						
				type: 'POST',
				url: '<?php echo site_url('invites/sendinvitation');?>',
				data:  {rname:recipient_name,remail:recipient_email,rmessage:recipient_message},
				dataType: 'json', 
				cache: false,
				async: false                     
			}).responseText;		
			
			
			var sendrpl = jQuery.parseJSON(res);
	
			if(sendrpl.status=='success')
			{
				
				$("#sendmsg").show();
				setTimeout(closeme,3000);
			}
			else
			{
				$("#sendmsg").show();
				$("#sendmsg").addClass('error1');
				$("#sendmsg").removeClass('success1');
				$("#sendmsg").text('<?php echo SORRY_AN_ERROR_OCCURES_PLEASE_TRY_AGAIN;?>');
				return false;
				
			}
			
			
			
				
	}
	
	function closeme()
	{
		$.fancybox.close();
	}
	</script>
    
    <!-- set content height here-->
   <div class="centerpart">   
     
     
 
        <!-- put your content here-->
			<form name="">
                 <input type="hidden" name="recepition_email" id="recepition_email" value="<?php echo $email; ?>" /> 
                  <input type="hidden" name="recepition_name" id="recepition_name" value="<?php echo $name; ?>" />
               <div class="emailform">
                 
                 <table border="0" cellpadding="3" cellspacing="5" width="100%">
                 <tr>
                 <td align="left" valign="top" style="text-align:left; font-weight:bold; text-transform:capitalize;"><?php echo $name; ?></td>
                 </tr>
                 
                 <tr>
                 <td align="left" valign="top" style=" clear:both; text-align:left;"><?php echo $email; ?></td>
                 </tr>
                 
                 <tr>
                 <td align="left" valign="top"><textarea  placeholder="Message Optional" name="recipient_message"  id="recipient_message" style="max-width:250px; max-height:130px; width:250px; height:130px; overflow:hidden; " ></textarea><br />
<span class="success1" id="sendmsg" style="display:none; float:left;"><?php echo SUCCESS;?>!</span>
<div class="clear"></div>

</td></tr>
                   
                 </table>
       
                <div class="repbtnsub clear" id="sharebtn"><input class="submit" type="button" name="sendmeinvite" id="sendmeinvite" onclick="inviteemail()" value="<?php echo INVITE;?>" style="float:none;"  /></div>
               </div>
               
               
               
            </form>
         <!-- put your content here-->
         </div>
   
     <!-- set content height here-->
     
     
     
   	</div>
   </div>
   
   
   
   
</div>
