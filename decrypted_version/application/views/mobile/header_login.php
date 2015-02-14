<?php   
   
$langs=get_supported_lang();

 //echo get_current_language();
//echo  $lang = $_SESSION['lang_code'];
$lang_switch_uri= get_switch_uri();

if($langs)
{
	foreach($langs as $lang_prefix => $lang_name)
	{
		?>
        <!--<a href="<?php //echo $lang_switch_uri.$lang_prefix; ?>"><?php //echo strtoupper($lang_name); ?></a>-->
        <?php
	}
	
}



 echo $this->lang->line('user.first_name'); ?>
<?php
	if($this->session->userdata('user_id')=='')
	{
		redirect('home');
	}
	
	$total_transaction = $this->db->count_all('transaction');
	
	$this->db->select_sum('amount');
	$query = $this->db->get('transaction');
	$transaction = $query->row_array();	
	$total_earning = $transaction['amount'];
?>
					<?php
	
	
	$data = array(
		'facebook'		=> $this->fb_connect->fb,
		'fbSession'		=> $this->fb_connect->fbSession,
		'user'			=> $this->fb_connect->user,
		'uid'			=> $this->fb_connect->user_id,
		'fbLogoutURL'	=> $this->fb_connect->fbLogoutURL,
		'fbLoginURL'	=> $this->fb_connect->fbLoginURL,	
		'base_url'		=> site_url('home/facebook'),
		'appkey'		=> $this->fb_connect->appkey,
	);
?>			
		
        
        
        	 <div  id="fb-root"></div>
		<?php
if(!stristr($_SERVER['REQUEST_URI'],"share"))
{
?>
        	 <script type="text/javascript">
			window.fbAsyncInit = function() {
	        	FB.init({appId: '<?php echo $data['appkey']; ?>', status: true, cookie: true, xfbml: true});
	 
	            /* All the events registered */
	            FB.Event.subscribe('auth.login', function(response) {
	    			// do something with response
	             //   login();
	        	});
	
	            FB.Event.subscribe('auth.logout', function(response) {
	            // do something with response
	               // logout();
	          	});
	   		};
	
	        (function() {
		        var e = document.createElement('script');
	            e.type = 'text/javascript';
	            e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
		        e.async = true;
	            document.getElementById('fb-root').appendChild(e);
	   	 	}());
	 
	        function login(){
	        	//document.location.href = "<?php // echo $data['base_url']; ?>";
	     	}
	
	        function logout(){
	        	//document.location.href = "<?php //echo $data['base_url']; ?>";
	 		}
		</script>
		<!-- END OF FB CODE -->	
<?php  } ?>

         <style type="text/css">
#header h1 a,#header h1 a:visited{
	text-indent: -9999px;
	display:block;
	width: 291px;
	height: 49px;
	/*background: url(<?php //echo base_url();?>upload/orig/74881logo.png) no-repeat;*/
	background: url(<?php echo base_url();?>upload/orig/<?php echo $site_setting['site_logo'];?>) no-repeat;
	margin: 20px 0 0 0;
}
#header h1 a:hover{
	/*background: url(<?php //echo base_url();?>upload/orig/87888logo_hover.png) no-repeat;*/
	background: url(<?php echo base_url();?>upload/orig/<?php echo $site_setting['site_logo_hover'];?>) no-repeat;
}
#header h1 a,#header h1 a:visited{
	cursor:pointer;
}
#header a{
	color: #555;
}
</style>
       


<div id="header">
	<div class="wrap930" id="header">
		<h1 class="left"><a href="<?php echo base_url(); ?>"><?php echo FUNDRAISING_SCRIPT;?></a></h1>
		
		
		 <?php if($this->session->userdata('user_id')!='') { 

 	$chk_paypal=$this->home_model->check_project_user_paypal_add();

		if($chk_paypal==0) {  ?>

<div class="paypal_warning" style="float:right; margin:22px 0px 0px 0px; "><?php echo anchor('home/verify_paypal/',PLEASE_SETUP_PAYPAL_EMAIL_ADDRESS,'style="color:#FF0000;"');?></div>

<?php } 


$chk_amazon=$this->home_model->check_project_user_amazon_add();

if($chk_amazon==0) {  ?>
              
        <div class="paypal_warning" style="float:right; margin:22px 0px 0px 0px; "><?php echo anchor('home/amazon_account_verify/',PLEASE_SETUP_OR_VERIFY_AMAZON_ACCOUNT,'style="color:#FF0000;"'); ?> </div>
			   
			   
	<?php }   } ?>
              
              
 <script type="text/javascript">
$(document).ready(function() {

$("#contact_fancy_head").fancybox({
				'width'				: 555,
				'height'			: 523,
				'border-width'      : '0%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});


$("#contact_fancy_foot").fancybox({
				'width'				: 555,
				'height'			: 523,
				'border-width'      : '0%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
});		
	
	</script>			
		<div class="clear"></div>
    
    <div class="navigation">
			   	<div class="nav" style="width:865px;">
		


	<div style="margin:0px 0 0 20px;">
			<ul id="sddm">
			
				<li><?php echo anchor("home/",HOME); ?> </li>
				<li style="background-image:none;margin:14px 3px;">|</li>
				<li><?php echo anchor("home/dashboard",DASHBOARD); ?> </li>
				<li style="background-image:none;margin:14px 3px;">|</li>
				
				
				
				<li><?php echo anchor('user/create', CREATE); ?></li>	
				<li style="background-image:none;margin:14px 3px;">|</li>
				
				
				<?php if($this->session->userdata['project_id']!='' && $this->session->userdata['project_id']!=0) {  ?>
				
				<li><?php echo anchor('user/my_project', MY_PAGES); ?></li>
				<li style="background-image:none;margin:14px 3px;">|</li>
				
				<?php } ?>
			
			<!--<li><?php //  echo anchor('help',HELP); ?></li>
			<li style="background-image:none;margin:14px 3px;">|</li>-->
			<li><?php  echo anchor('home/contact_us',CONTACT_US,'id="contact_fancy_head"'); ?></li>
			<li style="background-image:none;margin:14px 3px;">|</li>
			<li>			
			<?php if($this->session->userdata('facebook_id')!='')	{;?>
			<a href="<?php echo $data['fbLogoutURL']; ?>"><?php echo SIGN_OUT; ?></a>			
			<?php }else {  ?>
			 <?php echo anchor("home/logout",SIGN_OUT); ?>
			<?php } ?>
			
			</li>
			
			</ul>	
	</div>
 	
	
	
	
	
	
    </div>
</div>	
	
	

     <div class="clear"></div>
	 
  </div>
  



  
</div>

<script type="text/javascript">
<!--
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose; 
// -->
</script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>default.css" />


<!--/////////////////////////////////banner//////////////////////-->

<!--/////////////////////////////////banner end//////////////////////-->

<!--
<div id="rec-donation"> Total Transaction
        <h6><?php //echo $total_transaction; ?></h6>
        Total Earnings
        <h6>$ <?php //echo $total_earning; ?></h6>
      </div>-->	  