<div class="nbox nopad marT25">

    <h3 id="detail-bg1" style="margin:0px; border-radius: 8px 8px 0px 0px;"><?php echo PROFILE_INFORMATION;?></h3>
    <hr>
    
    <div class="padTB10 marL10">
        <ul class="accr">
            <li><?php //echo anchor('user/'.getUserProfileName(),'See Profile'); ?></li>
        </ul>                                   
    </div>
    
</div>

<div class="nbox nopad marT25">

    <h3 id="detail-bg1" style=	"margin:0px; border-radius: 8px 8px 0px 0px;">Your Account</h3>
    <hr>

    <div class="padTB10 marL10">
        <ul class="accr">
            <li><?php echo anchor('home/myaccount',ACCOUNT);?></li>
            <li><?php echo anchor('wallet/my_wallet',MY_WALLET);?></li>
            <li><?php echo anchor('home/change_password',CHANGE_PASSWORD);?></li>
            <li><?php echo anchor('user/email_setting','Notifications');?></li>
            <li><?php echo anchor('user/my_donation','My Donation');?></li>
            <li><?php echo anchor('user/my_comment','My Comment');?></li>
			<li><?php echo anchor('project/incoming_fund','Incoming Fund');?></li>
            
        </ul>                                   
     </div>
     
</div>

