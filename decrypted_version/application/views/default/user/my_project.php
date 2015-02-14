<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url();?>js/colorbox/colorbox.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/colorbox/jquery.colorbox.js"> </script>

<script type="text/javascript">
$(document).ready(function(){
				
				$("#profile_detail_popup").colorbox({iframe:true, width:"660px", height:"660px"});
				
			});
		
</script>


<section>
	<div class="usersectiion">
		<div id="page_we">
		<?php $user_detail=get_user_detail($cid);
		
			if(is_file('upload/thumb/'.$user_detail['image']))
						{
							$img = $user_detail['image'];
						}else{
							$img = NO_MAN;
						}
			
		 ?>
		<div class="imagediv">
			<?php 	
					if(is_file('upload/thumb/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt=""class="uimgimg"/><?php
					}elseif($user_detail['tw_screen_name']!='' && $user_detail['tw_id']>0) { ?>
	
	<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user_detail['tw_screen_name']; ?>&size=bigger" class="uimgimg" />
	
	
	<?php } elseif($user_detail['fb_uid']!='' && $user_detail['fb_uid']>0) { ?>
			    <img src="http://graph.facebook.com/<?php echo $user_detail['fb_uid']; ?>/picture?type=large" alt="" class="uimgimg"/>
				<?php } else { ?>
               				<img src="<?php echo base_url().'upload/thumb/'.$img; ?>" alt="" class="uimgimg" />
				<?php } ?>
			
			
			
			
		</div>
		<div class="userdetail">
			<div class="share">
			<?php
            $facbookurl='http://www.facebook.com/sharer.php?u='.site_url('user/'.$user_detail['user_name']);
            
            $twitterurl = 'http://twitter.com/home?status='.site_url('user/'.$user_detail['user_name']);
			?>
            
			<a href="javascript:void(0)" onClick="javascript:window.open('<?php echo $facbookurl; ?>','Share on Facebook','height=350,width=650')"><img class="simg" src="<?php echo base_url() ?>images/fshare.png"></a>
			<a onClick="javascript:window.open('<?php echo $twitterurl; ?>','Share on Twitter','height=350,width=650')" class="share-twitter" href="javascript:void(0)"><img class="simg" src="<?php echo base_url() ?>images/twittershare.png"></a>
			<h2><?php echo SHARE_YOUR_PROFILE; ?></h2>
	<!--		<a href="<?php if(get_authenticateUserID()==$user_detail['user_id']){ echo site_url('home/profile_detail'); }else{ echo site_url('home');} ?>"><?php echo EDIT_YOUR_PROFILE; ?></a>-->			</div>
			<h2><?php echo $user_detail['user_name']." ".$user_detail['last_name']; ?></h2>
			<?php $total_pd=$this->user_model->get_my_donations_count(); ?>
			<p class="loc">Backed <?php echo $total_pd; ?> projects - <?php if($user_detail['city']!="" && !is_numeric($user_detail['city'])){ echo $user_detail['city'].",".$user_detail['state'].",".$user_detail['country']; }else { echo "N/A";} ?> - <?php //echo date($user_detail['date_added'],strtotime('f,m')); ?><?php echo date('F Y',strtotime($user_detail['date_added']))?></p>
			<p class="udesc"><?php echo $user_detail['user_about'];?></p>
			<!--<p>web developer</p>-->
			<?php echo anchor('user/full_bio_data/'.$user_detail['user_id'],SEE_FULL_BIO_LINKS,'id="profile_detail_popup" class="fullbio"');?><div class="clr"></div>
			<?php
				if($project_of_the_day){?>
                
            	<div class="successp">
                 <?php  if($project_of_the_day->video_image !=""){ 
               echo anchor('projects/'.$project_of_the_day->url_project_title.'/'.$project_of_the_day->project_id,'<img class="spimg" src="'.$project_of_the_day->video_image.'" alt="" title="'.ucfirst($project_of_the_day->project_title).'" />'); 		  
          }
                else { 
                if(is_file("upload/orig/".$project_of_the_day->image)){ 
          
           echo anchor('projects/'.$project_of_the_day->url_project_title.'/'.$project_of_the_day->project_id,'<img class="spimg" src="'.base_url().'upload/orig/'.$project_of_the_day->image.'" alt=""  title="'.ucfirst($project_of_the_day->project_title).'" />'); 		  
          
         
          } else{ 
                echo anchor('projects/'.$project_of_the_day->url_project_title.'/'.$project_of_the_day->project_id,'<img class="spimg" src="'.base_url().'images/no_img.jpg" title="'.ucfirst($project_of_the_day->project_title).'" />');
                }
                } ?>
             	<div class="successp_r">
					<h2><?php echo substr(ucfirst($project_of_the_day->project_title),0,20);?></h2>
                    
					<p><?php echo BY.' '.getUserNamebyid($project_of_the_day->user_id);?></p>
					<p><?php echo date($site_setting['date_format'],strtotime($project_of_the_day->date_added));?></p>
				</div>		
			</div>
            <?php }?>
		</div>
		<?php 
			if($graph_cat){
			$cnt = count($graph_cat);
			
			$cat_graph ='[';
			foreach($graph_cat as $cat)
			{
				$cat_graph .= '2,';
				
				$project_user_id = $cid; 
				
			}
			$cat_graph =substr($cat_graph,0,strlen($cat_graph)-1);
			$cat_graph .=']';
			}
			
		?>
        
        <?php 
			if($graph_cat){
			$cat_name ='[';
			foreach($graph_cat as $cat)
			{
				$cnt= '('.count_project_user_categorywise($cat->project_category_id,$cid).')';
				$cat_name .= "'".$cat->project_category_name.$cnt."'".',';
				
			}
			$cat_name =substr($cat_name,0,strlen($cat_name)-1);
			$cat_name .=']';
			}
			
		?>
        
        <?php 
			if($graph_cat){
			$cat_color ='[';
			foreach($graph_cat as $cat)
			{
				$pcnt=count_project_user_categorywise($cat->project_category_id,$cid);
				if($pcnt)
				{
					$cat_color .= "'#".$cat->category_color_code."'".',';
				
				}else{
				$cat_color .= "'#fcfcfc'".',';
				}
				
			}
			$cat_color =substr($cat_color,0,strlen($cat_color)-1);
			$cat_color .=']';
			}
			
			
		?>

 <script src="<?php echo base_url() ?>chart/libraries/RGraph.common.core.js" ></script>
    <script src="<?php echo base_url() ?>chart/libraries/RGraph.common.dynamic.js" ></script>
    <script src="<?php echo base_url() ?>chart/libraries/RGraph.common.tooltips.js" ></script>
    <script src="<?php echo base_url() ?>chart/libraries/RGraph.pie.js" ></script>
    <!--[if lt IE 9]><script src="<?php echo base_url() ?>chart/excanvas/excanvas.js"></script><![endif]-->
  
	 <canvas id="cvs" width="350" height="250" class="category_round">[<?php echo NO_CANVAS_SUPPORT; ?>]</canvas>
    
    <script>
	
		
        window.onload = function ()
        {
            var pie = new RGraph.Pie('cvs', <?php echo $cat_graph;?>);
            pie.Set('chart.tooltips', <?php echo $cat_name;?>);
			pie.Set('chart.colors',<?php echo $cat_color;?>);
            pie.Set('chart.title', <?php echo $project_user_id;?>);
		    pie.Draw();
			
			pie.canvas.onclick_rgraph = function myFunc (e)
			{
				
				  var obj = RGraph.ObjectRegistry.getObjectByXY(e);
				  var shape = obj.getShape(e);
    
                    if (shape) {                      
					   var colorcode = obj.properties['chart.colors'][shape['index']];
					  /*we pass user id in title for get project of this user*/
					   var user = obj.properties['chart.title'];
					   var n=colorcode.substring(1,colorcode.length); 
					   getcategoryid_fromcolorcode(n,user);
                    }
				
				
			}
			
        }
		
	function getcategoryid_fromcolorcode(colorcode,user)
	{
		
		if(colorcode=='')
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
					
					var str = xmlhttp.responseText;
					var res = str.split('#');
					var project_category_id = res[0];
					var user_id = res[1];
					get_categorywise_backed(project_category_id,user_id);
				}
			}
			
			var url = '<?php echo site_url('home/get_projectcategory_fromcolorcode'); ?>/'+colorcode+'/'+user;
			
			xmlhttp.open("GET",url,true);
			xmlhttp.send(null);
	}
	
	function get_categorywise_backed(project_category_id,user_id)
	{
		if(project_category_id=='')
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
					document.getElementById('ajaxdiv').innerHTML = xmlhttp.responseText;
					getcatname(project_category_id);
				}
			}
			
			var url = '<?php echo site_url('home/get_project_categorywise_created'); ?>/'+project_category_id+'/'+user_id;
			
			xmlhttp.open("GET",url,true);
			xmlhttp.send(null);
	}	
	function getcatname(catid)
	{
		if(catid=='')
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
					$('#cat_name').show();
					$('#cat_name').text(xmlhttp.responseText);
				}
			}
			
			var url = '<?php echo site_url('home/get_categoryname'); ?>/'+catid;
			
			xmlhttp.open("GET",url,true);
			xmlhttp.send(null);
	}
    </script>
		</div>
		
	</div><div class="clr"></div>
	<div id="page_we">
	
    	<div style="" class="user_detail" >
			<ul id="project_nav">
				<?php if(get_authenticateUserID()!="" && get_authenticateUserID()==$user_detail['user_id']){ $gt='home/dashboard'; }else{ $gt='member';} ?>
					<li>
					<a href="<?php echo site_url($gt.'/'.$user_detail['user_id']) ?>"><span class="text-inner"><?php echo BACKED; ?></span>
					<span class="count">
					<span class="parentheses">(</span><?php if($num_backers!=""){ echo $num_backers;}else{ echo '0';} ?><span class="parentheses">)</span></span></a>	<span class="text" id="cat_name" style="display:none;"></span></li>
					<li class="selected">
					<a id="list_title" href="<?php echo site_url('user/my_project/'.$user_detail['user_id']) ?>"><span class="text-inner"><?php echo CREATED; ?></span>
					<span class="count">
					<span class="parentheses"></span><?php if($numprj!=""){ echo $numprj;}else{ echo '0';} ?><span class="parentheses"></span></span></a></li>
			
					<li>
					<a href="<?php echo site_url('user/my_comment/'.$user_detail['user_id']) ?>"><span class="text-inner"><?php echo COMMENTS; ?></span>
					<span class="count">
					<span class="parentheses">(</span><?php if($num_my_comments!=""){ echo $num_my_comments;}else{ echo '0';} ?><span class="parentheses">)</span></span>	</a></li>
			</ul>
<style>
.cp_ul{
	list-style:none;
	margin:0;
	padding:0;
}
.cp_ul li{
	margin:0;
	padding:0;
}
</style>			
		
			<div class="created_cont" id="ajaxdiv">
			<ul class="cp_ul">
				<?php 
				if($result){
					foreach($result as $rs){
					
					 ?>
			
			
					<li><div class="created_p_detail">
				<?php 
				   
				  
                if(is_file("upload/orig/".$rs['image'])){ 
          
           echo anchor('projects/'.$rs['url_project_title'].'/'.$rs['project_id'],'<img class="pi" src="'.base_url().'upload/thumb/'.$rs['image'].'" alt=""  title="'.ucfirst($rs['project_title']).'" />'); 		  
          
         
          }else {
				   
					$get_gallery=$this->project_model->get_all_project_gallery($rs['project_id']);
								
								$grcnt=1;
								
								if($get_gallery)
								{
									foreach($get_gallery as $glr)
									{
									
										if($glr->project_image!='' && is_file('upload/thumb/'.$glr->project_image) && $grcnt==1 )
										{
																		
										echo anchor('projects/'.$rs['url_project_title'].'/'.$rs['project_id'],'<img class="pi" src="'.base_url().'upload/thumb/'.$glr->project_image.'" alt=""  title="'.ucfirst($rs['project_title']).'" />'); 	
										
											$grcnt=2;
										}
									
									}
								}
								elseif($grcnt==1)
								{							
									   echo anchor('projects/'.$rs['url_project_title'].'/'.$rs['project_id'],'<img class="pi" src="'.base_url().'upload/thumb/no_img.jpg" alt=""  title="'.ucfirst($rs['project_title']).'" />'); 	
								}
								else
								{
								  echo anchor('projects/'.$rs['url_project_title'].'/'.$rs['project_id'],'<img class="pi" src="'.base_url().'upload/thumb/no_img.jpg" alt=""  title="'.ucfirst($rs['project_title']).'" />'); 	
								}
				   
				}
				  $sql=mysql_fetch_array(mysql_query("select * from user where user_id='".$rs['user_id']."'"));
					 ?>
					
					<?php if($rs['amount_get'] > $rs['amount']){?>
                    <h2 class="funded"><?php echo FUNDED; ?>!</h2>
                    <?php }?>
                    
					<div class="prdcont">
						<h2><?php echo $rs['project_title']; ?></h2>
						<p class="prop"><?php echo BY; ?></p>
						<a href="javascript://" class="prjown1"><?php echo $sql['user_name']; ?></a>
						
						<p class="prop"><?php if($rs['project_summary']!='') { ?>
			
			 <?php //echo wordwrap(substr(strip_tags($rs['project_summary']),0,95),26, "\n",true);
			 
						$str_name=$rs['project_summary'];
						if(strlen($str_name)<70)$lenght=strlen($str_name);
						else $lenght=70;
						//echo "<br>".$lenght;
						
						$pos = strpos($str_name, ' ', $lenght);
						if ($pos !== false) {
							$str_name= substr($str_name, 0, $pos);
						}
						echo $str_name;
			 
			  }else{ echo "N/A";} ?></p><div class="clr"></div>
					<!--<a class="pda" href="javascript://"><img alt="" src="<?php echo base_url(); ?>images/product_designicn.png"><?php echo PRODUCT_DESIGN; ?></a>-->
						<a class="pda" href="javascript://"><img alt="" src="<?php echo base_url(); ?>images/locationicon.png"><?php if($rs['project_country']!="" &&!is_numeric($rs['project_country'])){ echo $rs['project_city'].",".$rs['project_state'].",".$rs['project_country'];}else{ echo 'N/A';} ?></a><div class="clr"></div>
						<ul class="project_daydetail2">
                        	<li style="padding:8px 0; width:337px;">
									<div class="progressbar3">
									<?php 
										$rs['amount'] = str_replace($site_setting['currency_symbol'], "", $rs['amount']);
								if($rs['amount'] == '0' or $rs['amount'] == '')
								{
									
									
									$w = 0;
									
								}else{
									
									if($rs['amount_get']>=$rs['amount'])
									{
										$w=100;
									}
									else
									{
									$w = ($rs['amount_get']/$rs['amount'])*100;
									
									if($w>0 && $w<1)
										{
											$w=1;
										}
											
									
									
									}
								} 
									
									 ?>
									
										<div class="procalculat3" style="width:<?php echo $w; ?>%;"></div>	  </div>
						  
									<p style="color:#a9acac; font-size:12px; float:left; margin:10px 0 0 30px;"><?php echo $w; ?>%&nbsp;&nbsp;&nbsp;<?php echo FUNDED; ?></p>
									<p style="color:#a9acac; font-size:12px;float:right; margin:10px 44px 0 0;"><?php if($rs['amount_get'] != 0){echo $site_setting['currency_symbol']."".$rs['amount_get'];}else{echo $site_setting['currency_symbol']."".'0';}?>&nbsp;&nbsp;&nbsp;<?php echo PLEDGED;?></p>
                            </li>
                            <li>
                            	<?php $backers=$this->project_model->get_total_donations_count($rs['project_id']);?>
									<h1><?php echo $backers;?></h1>
									<p style="color:#a9acac;"><?php echo BACKERS; ?></p>
                            </li>
                            <li style="border-right:none;">
									<h1><?php echo FUNDED;?></h1>
									<p style="color:#a9acac;"><?php echo date($site_setting['date_format'],strtotime($rs['date_added']))?></p>
                            </li>
                        </ul>
						
					</div>
				</div>	</li>
				
					<?php } }
					else{?>
				<?php if(get_authenticateUserID()!="" && get_authenticateUserID()==$user_detail['user_id']){ ?>
						<li><h2 style="text-align:center"><?php echo YOU_HAVE_NOT_CREATED_ANY_PROJECT_YET; ?>. <a href="<?php echo Site_url('start'); ?>"><?php echo ADD_NOW; ?></a></h2></li>
					<?php }else{ ?>
						<li><h2 style="text-align:center"><?php echo NO_PROJECT_CREATED; ?>.</h2></li>
					<?php }?>
				<?php }?>
			</ul>
            <div style="clear:both"></div>
            <div class="mess_cont_top_right">
				<?php echo $page_link; ?>
			</div>	
             
			</div>
				
        </div>
    		
    </div>
</section>