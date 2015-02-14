<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url();?>js/colorbox/colorbox.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/colorbox/jquery.colorbox.js"> </script>
<script src="<?php echo base_url();?>js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/jquery.flipCounter.1.2.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){
				
				$("#iframe").colorbox({iframe:true, width:"490px", height:"269px"});
			});
		
</script>
<!--******************Section********************-->
     <script type="text/javascript">
	 function followuser(id)
	 {
			
			if(id=='') { return false; }
			var strURL='<?php echo site_url('follow/follow_user/');?>/'+id;
			var xmlhttp;
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			
			}
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
			}
			xmlhttp.onreadystatechange=function()
				{
				
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					
					if(xmlhttp.responseText=='follow')
					{
						document.getElementById("follow_unfollow").innerHTML='<a id="followme" href="javascript:void(0)" onclick="unfollowuser('+id+')" class="unfollow_btn" onmouseover="set_followingtext(0);" onmouseout="set_followingtext(1);"><?php echo FOLLOWING;?></a>';

					}
				}
			}
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
		
	 }
	 function unfollowuser(id)
	 {
	 	
	 	
			
			if(id=='') { return false; }
			var strURL='<?php echo site_url('follow/unfollow_user/');?>/'+id;
			var xmlhttp;
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			
			}
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
			}
			xmlhttp.onreadystatechange=function()
				{
				
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				
					if(xmlhttp.responseText=='unfollow')
					{
						document.getElementById("follow_unfollow").innerHTML='<a id="followme" href="javascript:void(0)" onclick="followuser('+id+')" class="follow_btn"><?php echo FOLLOW_ME;?></a>';
				
					}
					
				}
			}
			xmlhttp.open("GET",strURL,true);
			xmlhttp.send();
		
	 
	 }
	 function set_followingtext(set){
	 	if(set==0){
			document.getElementById("followme").innerHTML='<?php echo "".UNFOLLOW_PROJECT.""; ?>';
			
		}
		else{
			document.getElementById("followme").innerHTML='<?php echo "".FOLLOWING.""; ?>';
		}
		
	 }

     </script>

  <script type="text/javascript">
        /*   function newInvite(){
                 var receiverUserIds = FB.ui({ 
                     
                         method: 'send',
						  name: 'Check this websote',
						  link: 'http://clonesites.com/pinterest/',
						  picture:'http://clonesites.com/pinterest/default/images/logo.png',
						  display: 'popup'
                 });
           
            }
            */
            
            
    function Inviteme(fb_id) 
	{
      	
		 var response= FB.ui({
           
          method: 'send',
          name: "Join me on <?php echo ucfirst($site_setting['site_name']);?>!",
          link: '<?php echo site_url('invited/'.$user_info['unique_code']);?>/facebook',
          picture:'<?php echo $login_user_profileimage; ?>',
		  description: "<?php echo ucfirst($user_info['user_name']).' '.ucfirst($user_info['last_name']);?> is on <?php echo ucfirst($site_setting['site_name']);?>, a place to discover, donate and post campaign. Join <?php echo ucfirst($site_setting['site_name']);?> to see <?php echo ucfirst($user_info['user_name']);?>&acute;s campaigns.",
		  to: fb_id,
		   max_recipients:1,
  		  display: 'popup'
          },function(response){
                if (!response)
                    return;
                var request_id = response.request + "_" + response.to[0];
            });
               console.log(response.request_ids);
   }
        
		
		
     $(function() {

        $.expr[":"].containsInCaseSensitive = function(el, i, m){
                var search = m[3];
                if (!search) return false;
                return eval("/" + search + "/i").test($(el).text());
        };  

        $('#query').focus().keyup(function(e){
                if(this.value.length > 0){
                        $('ul#abbreviations li').hide();
                        $('ul#abbreviations li:containsInCaseSensitive(' + this.value + ')').show();
                } else {
                        $('ul#abbreviations li').show();        
                }
                if(e.keyCode == 13) {
                        $(this).val('');
                        $('ul#abbreviations li').show();
                }
        });

});
  
       
       
        </script>
        
<script type="text/javascript">
var gmts=0;

	
		////===scrollin data fetch part
		
		jQuery(document).ready(function(){
	
		////===scrollin data fetch part
		
		function last_msg_funtion() 
		{ 		   
          var ID=$(".project_card:last").attr("id");	
		   var myArray = ID.split('_'); 
		   var str=$("#searchfor").val();	
		   gmts=1;
		
		   
		   $.post("<?php echo site_url('discover/ending_soon_ajax/');?>" + '/'+myArray[1]+'/'+str,			
				
				
				function(data){
					if (data != "") {
					
						if(gmts==1) { 
							$(".project_card:last").after(data);		
							
							gmts=0;
						}
					}
					else{
						$('#last_msg_loader').html('');
					}
					//$('div#last_msg_loader').empty();
				}
			);
		}; 
		
		jQuery(window).scroll(function(){
			var ID=$(".project_card:last").attr("id");	

			
		   	var myArray = ID.split('_'); 
			var limit = '<?php echo $total_rows; ?>';
			
			if(parseInt(myArray[1]) >= parseInt(limit)){	$('#last_msg_loader').html(''); }
			else{
				if($(window).scrollTop() == $(document).height() - $(window).height()){				 
					$('#last_msg_loader').html('<div class="clear"></div><h3 class="discover" style="text-align:center;"><img src="<?php echo base_url();?>images/indicator.gif"></h3>');			  
					
					if(parseInt(myArray[1]) > 0)
					{
					 	setTimeout(function() { last_msg_funtion(); }, 2000);
					}
	
					 
				}	
			}	
				
		}); 
			
	});


</script>        
        
<section>
	<div class="get_soc">
		<div id="page_we">
       	<label class="soclabel"><?php echo GET_SOCIAL; ?></label>
			<div class="get_soc_cont">
				<div class="get_soc_cont_left">
					<div class="wholecontwidth" id="ajaxdiv" style="width:650px; margin:5px;">
          	
				<?php if($result){
                $cnt=1;
                foreach($result as $rs)
                {
                    $data['site_setting'] = site_setting(); 
                    $data['rs'] = $rs;
                    $this->load->view('default/common_card',$data);
                    $cnt++;
                 }
                }else
                {
                    echo NO_RECORDS;
                }?>
          </div>
				</div>
				
                <?php $this->load->view('default/invites/friend_sidebar');?>
                <div class="clr"></div>
				
				
			</div>
		</div>
         <input type="hidden" id="searchfor" value="<?php echo $select?>"/>
	</div><div id="last_msg_loader"></div>
</section>

<!--******************Section********************-->
<!--******************Footer********************-->
<script type="text/javascript">
/* <![CDATA[ */
        jQuery(document).ready(function($) {
			$("#followcnt").flipCounter("setNumber",<?php echo $follow_cnt; ?>); // immediately sets the number to 42.
		
        });
/* ]]> */
</script>