<script>	
	

$(document).ready(function(){


	
	
	$('#inbox_button').click(function(){
		$('#user_menu_div').hide();
		$('#open_select_activity').hide();
		$('#open_select_menu').slideDown();
		$('#inbox_button').removeClass('msg');
		$('#inbox_button').addClass('msgact');
	});
	
	$('#open_user_menu').click(function(){
	$('#open_select_activity').hide();
		$('#open_select_menu').hide();
	$('#user_menu_div').slideDown();
	$('#open_user_menu').removeClass('useranc');
	$('#open_user_menu').addClass('userancadd');
	}); 
	
	$('#activityanc').click(function(){
	$('#open_select_menu').hide();
	$('#user_menu_div').hide();
	$('#open_select_activity').slideDown();
	$('#activityanc').removeClass('activityanc');
	$('#activityanc').addClass('activityact');
	}); 
	
	var mouse_is_inside=false;

	$('#open_select_menu').hover(function(){
	
	mouse_is_inside=true;
	
	}, function(){
	
	mouse_is_inside=false;
	
	});
	
	$("body").mouseup(function(){
	
	if(! mouse_is_inside) 
	$('#open_select_menu').hide();
	$('#inbox_button').removeClass('msgact');
	$('#inbox_button').addClass('msg');
	
	
	});
	
	
	var mouse_is_inside1=false;

	$('#user_menu_div').hover(function(){
	
	mouse_is_inside=true;
	
	}, function(){
	
	mouse_is_inside1=false;
	
	});
	
	$("body").mouseup(function(){
	
	if(! mouse_is_inside1) 
	$('#user_menu_div').hide();
	$('#open_user_menu').removeClass('userancadd');
	$('#open_user_menu').addClass('useranc');
	
	});
	
	var mouse_is_inside3=false;
	
	$('#open_select_activity').hover(function(){
	
	mouse_is_inside3=true;
	
	}, function(){
	
	mouse_is_inside3=false;
	
	});
	
	$("body").mouseup(function(){
	
	if(! mouse_is_inside3) 
	$('#open_select_activity').hide();
	$('#activityanc').removeClass('activityact');
	$('#activityanc').addClass('activityanc');
	
	
	});


});
</script>
<header id="header">
	<div id="page_we">
    	<img src="<?php echo base_url(); ?>images/logo.png" class="logo">
        <ul id="headernav">
        	<li><a href="#">Discover</a><p>great projects</p></li>
            <li style="border-left:none;"><a href="#">Start</a><p>your projects</p></li>
        </ul>
        <div class="headersearch">
        	<input type="text">
            <input type="submit" value="">
        </div>
        <ul class="loginul1" style="margin-left:0;">
        	<li><a href="#">blog</a></li>
            <li style="border-right:none; margin-right:0;"><a href="#">help</a></li>
            
        </ul>
		<div class="inbox">
           <a href="#" class="msg" id="inbox_button"></a>
          <span>1</span>
		</div>
		<div class="activity">
			<a href="#" class="activityanc" id="activityanc"></a>
			<span>1</span>
		</div>
		<div class="prof">
          <a href="#" class="useranc" id="open_user_menu"><img src="<?php echo base_url(); ?>images/prf_user.png" class="luserimg"> Me</a>
		  <div class="user_menu_div" id="user_menu_div" style="display: none;">
		  	<div class="user_menu_div_left">
				<h2>My Account</h2>
				<ul>
					<li><?php echo anchor('home/account','My Profile'); ?></li>
					<li><a href="#">My Backer History</a></li>
					<li><a href="#">Edit Settings</a></li>
					<li><?php echo anchor('settings/paypal','Verify Paypal'); ?></li>
					<li><a href="#">Find Friends</a></li>
					<li><a href="#">Transaction History</a></li>
				</ul>
			</div>
			<div class="user_menu_div_right">
				<h2>My Created Projects</h2>
				<ul>
					<li><a href="#">UntitledUntitledUntitled</a></li>
					<li><a href="#">UntitledUntitled</a></li>
					<li><a href="#">UntitledUntitledUntitledUntitled</a></li>
					<li><a href="#">UntitledUntitled</a></li>
					<li><a href="#">Untitled</a></li>
					
				</ul>
			</div>
		  </div>
        
        </div>
        
        
        
        
    </div>
	<div class="poup_inbox" id="open_select_menu" style="display:none;">
          <h2>Inbox</h2><div class="clr"></div>
          
          <div class="inbox_mail">
          
          
          <div class="main_mail">
          <div class="lt">
                <a class="imglink"><img src="images/mail.png"></a>
                </div>
          <div class="fullpin_msg">
                  <div class="fl marleft10">
                    <a class="txtCap">user name</a><div class="clr"></div>
                  
                    <p style="margin-top:5px;">You have not received any messages yet. You  have not received any messages yet.....</p>
                  </div>
                
                </div>
           </div>     <div class="clr"></div>
           
           
           
           <div class="main_mail">
          <div class="lt">
                <a class="imglink"><img src="images/mail.png"></a>
                </div>
          <div class="fullpin_msg">
                  <div class="fl marleft10">
                    <a class="txtCap">user name</a><div class="clr"></div>
                  
                    <p style="margin-top:5px;">You have not received any messages yet. You  have not received any messages yet.....</p>
                  </div>
                
                </div>
           </div>   <div class="clr"></div>
           
            <div class="main_mail">
          <div class="lt">
                <a class="imglink"><img src="images/mail.png"></a>
                </div>
          <div class="fullpin_msg">
                  <div class="fl marleft10">
                    <a class="txtCap">user name</a><div class="clr"></div>
                  
                    <p style="margin-top:5px;">You have not received any messages yet. You  have not received any messages yet.....</p>
                  </div>
                
                </div>
           </div>   <div class="clr"></div>
           
            <div class="main_mail">
          <div class="lt">
                <a class="imglink"><img src="images/mail.png"></a>
                </div>
          <div class="fullpin_msg">
                  <div class="fl marleft10">
                    <a class="txtCap">user name</a><div class="clr"></div>
                  
                    <p style="margin-top:5px;">You have not received any messages yet. You  have not received any messages yet.....</p>
                  </div>
                
                </div>
           </div>   <div class="clr"></div>
          </div>
		  <a href="#" class="viewamsg">view all message</a>
        </div>
		<div class="activity_box" id="open_select_activity" style="display:none;">
          <h2>Recent Activity</h2><div class="clr"></div>
          
          <div class="inbox_mail">
          
          
          <div class="main_mail">
          
          <div class="activity_msg">                  
                    <p style="margin:5px 0 0 15px;">You have not received any messages yet. You  have not received any messages yet.....</p>
                  </div>
                
                </div>
           </div>     <div class="clr"></div>
		    <a href="#" class="activityall">view all activity</a>
           
      </div>
		 
      
</header>