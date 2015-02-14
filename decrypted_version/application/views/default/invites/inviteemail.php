  
  
  	<div id="headerbar">
	<div class="wrap930">
	
	<!-- dd menu -->	
<div class="login_navl">
		
			
			
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr><td align="left" >	
	<div class="project_title_hd" style="padding-top:15px;" >
	
	
	<span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo INVITE_EMAIL; ?></span>
	
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
			


<?php
	$data['select']=$select;

	$this->load->view('default/invites/sidebar',$data);

?>


     
      
 <div class="inner_content" style=" margin-top:11px;padding:12px; ">
		         
				
			<h3 id="dropmenu2"><?php echo INVITES_YOUR_FRIENDS;?> <?php echo ucfirst($site_setting['site_name']);?> </h3>
            
            
              <div class="clear"></div> 
  <!--noop-->
  
  
      
	  <script type="text/javascript">
	  
jQuery(function($){	  

var email_reg_exp= /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;  

$('#sendinvite').click(function(){
	
	

	var recipient_message=trim(removeHTMLTags($("#recipient_message").val()));
	
	$('.btn_input2').each(function(){
	
		
		var recipient_email=$(this).val();
		var recipient_id=$(this).attr('id');
		var siblin=$("#sp"+recipient_id);
			
		if(recipient_email!='')
		{	
			if(!email_reg_exp.test(recipient_email)){			
				
				
				siblin.show();   
				siblin.text('<?php echo RECIPIENT_EMAIL_IS_INVALID;?>');
				siblin.removeClass('success1');	
				siblin.addClass('error1');
				return false;	
			}
			else
			{
				///
				siblin.hide();
				
				 var res = $.ajax({						
						type: 'POST',
						url: '<?php echo site_url('invites/sendemailinvitation');?>',
						data: {remail:recipient_email,rmessage:recipient_message},
						dataType: 'json', 
						cache: false,
						async: false                     
					 }).responseText;
				
					var inv_rpl = jQuery.parseJSON(res);
					
					if(inv_rpl.status=='success')
					{
						$(this).val('');
						siblin.show();   	
					}
					else
					{
						siblin.show();   
						siblin.text('<?php echo INVITATION_IS_FAILED;?>');
						siblin.removeClass('success1');	
						siblin.addClass('error1');
						return false;	
					}
				
				///
			}
		}	
		else
		{
			siblin.hide();
		}
			
		 
	});
	  
}); 

});  
	  
	  
	  </script>
      
    
      
       
        <div class="clear"></div>
        <div class="inviteform">
            <input type="text" class="btn_input2" name="email1" id="email1" placeholder="Email Address1" /><span id="spemail1" class="success1" style="margin:25px 0px 0px 5px; display:none;"><?php echo INVITE_SENT;?></span>
            <div class="clear"></div>
            <input type="text"  class="btn_input2" name="email2" id="email2" placeholder="Email Address2" /> <span id="spemail2" class="success1" style="margin:25px 0px 0px 5px; display:none;"><?php echo INVITE_SENT;?></span>             <div class="clear"></div>
             <input type="text" class="btn_input2" name="email3" id="email3" placeholder="Email Address3" /><span id="spemail3" class="success1" style="margin:25px 0px 0px 5px; display:none;"><?php echo INVITE_SENT;?></span>
               <div class="clear"></div>
            <input type="text" class="btn_input2" name="email4" id="email4"  placeholder="Email Address4"/><span id="spemail4" class="success1" style="margin:25px 0px 0px 5px; display:none;"><?php echo INVITE_SENT;?></span>
              <div class="clear"></div>
           
            <div class="invitetextarea">
            <textarea name="recipient_message" id="recipient_message" style=" width:350px; height:170px;"></textarea>
            </div>
              <div class="clear"></div>
              
            <input type="button" name="sendinvite" id="sendinvite" class="submit" value="<?php echo SEND_INVITES;?>"/>
            
        </div>  
     
        <div class="clear"></div>		
     
    
    
      <!--noop-->
     </div>
		</div>
        <div class="clear"></div>		
				
				
					</div>
	<!-- left end ------>
		
       </div>
   
	