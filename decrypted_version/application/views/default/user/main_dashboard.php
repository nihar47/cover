<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url();?>js/colorbox/colorbox.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/colorbox/jquery.colorbox.js"> </script>

<script type="text/javascript">
$(document).ready(function(){
				
				$("#profile_detail_popup").colorbox({iframe:true, width:"660px", height:"660px"});
			});
		
</script>

<script type="text/javascript">
$(document).ready(function(){
	$(".category_round").mouseover(function(){

			});	
			});
		
</script>

<section>
	<div class="usersectiion">
   
		<div id="page_we">
        <?php 
		
		if(!empty($ending_pro)){ 
		foreach($ending_pro as $end){
	//	print_r($end);
			?>
		 <div class="alert-user" style="color:red"> <?php echo "Your time on project '".$end->project_title."' is about to expire and you have not met your goal.  Click here to extend you time for 30 days.";?>
         <a href="<?php echo site_url('user/extend_project/'.$end->project_id); ?>"><span class="text">Accept</span> </a> |  <a onclick="$('.alert-user').css('display','none')"><span class="text">Cancel</span> </a>
         </div>
		 
		 <?php 
	}	} 
			if(is_file('upload/profile_image/'.$user_detail['image']))
						{
							$img = $user_detail['image'];
						}else{
							$img = NO_MAN;
						}
			
		 ?>
		<div class="imagediv">
			<?php 	
					if(is_file('upload/profile_image/'.$user_detail['image'])){
						?> <img src="<?php echo base_url().'upload/profile_image/'.$img; ?>" alt=""class="uimgimg"/><?php
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
			<!--<a href="<?php if(get_authenticateUserID()==$user_detail['user_id']){ echo site_url('home/profile_detail'); }else{ echo site_url('home');} ?>"><?php echo EDIT_YOUR_PROFILE; ?></a>-->
            
           
			</div>
			<h2><?php echo $user_detail['user_name']." ".$user_detail['last_name']; ?></h2>
			<?php $total_pd=$this->user_model->get_my_donations_count(); ?>
			<p class="loc"><?php echo BACKED; ?> <?php echo $total_pd; ?> projects - <?php if($user_detail['city']!="" && !is_numeric($user_detail['city'])){ echo $user_detail['city'].",".$user_detail['state'].",".$user_detail['country']; }else { echo "N/A";} ?> - <?php //echo date($user_detail['date_added'],strtotime('f,m')); ?><?php echo date('F Y',strtotime($user_detail['date_added']))?></p>
			<p class="udesc"><?php echo $user_detail['user_about'];?></p>
			<!--<p>web developer</p><?php echo anchor('user/full_bio_data/'.$user_detail['user_id'],SEE_FULL_BIO,'id="profile_detail_popup1" class="userfb"');?>-->
			<?php echo anchor('user/full_bio_data/'.$user_detail['user_id'],SEE_FULL_BIO_LINKS,'id="profile_detail_popup" class="fullbio"');?>
              <div class="clr"></div>
              
              
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
		//print_r($graph_cat);
			if($graph_cat){
				
		$cnt = count($graph_cat);
			
			$cat_graph ='[';
			foreach($graph_cat as $cat)
			{
				$cat_graph .= '2,';
				
				$project_user_id = $cid; 
				
			}
				//print_r($cat_graph);
			$cat_graph =substr($cat_graph,0,strlen($cat_graph)-1);
			$cat_graph .=']';
			}
			//print_r($cat_graph);
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
			$cat_name.=']';
			//print_r($cat_name);
			}
			
		?>
        
        <?php 
			if($graph_cat){
				//echo "<pre>"; print_r($graph_cat); die;
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
	
	function get_categorywise_backed(project_category_id, user_id)
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
					
					document.getElementById('project_list').innerHTML = xmlhttp.responseText;

				getcatname(project_category_id,user_id);
				}
			}
			
			var url = '<?php echo site_url('home/get_project_categorywise'); ?>/'+project_category_id+'/'+user_id;
			
			xmlhttp.open("GET",url,true);
			xmlhttp.send(null);
	}	
	
	function getcatname(catid,userid)
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
					$('li.selected .count').hide();
					$('#cat_name').text(" - In "+xmlhttp.responseText);
				}
			}
			
			var url = '<?php echo site_url('home/get_categoryname'); ?>/'+catid+'/'+userid;
			
			xmlhttp.open("GET",url,true);
			xmlhttp.send(null);
	}
    </script>
    
		</div>
		
	</div><div class="clr"></div>
	<div id="page_we">
	<div class="user_detail">
	<ul id="project_nav">
					<li class="selected">
					<?php if(get_authenticateUserID()!="" && get_authenticateUserID()==$user_detail['user_id']){ $gt='home/dashboard'; }else{ $gt='member';} ?>
					<a href="<?php echo site_url($gt.'/'.$user_detail['user_id']) ?>" id="list_title"><span class="text-inner"><?php echo BACKED; ?></span>
					<span class="count"><span class="parentheses"></span><?php if($num_backers!=""){ echo $num_backers;}else{ echo '0';} ?><span class="parentheses"></span></span></a><span class="text" id="cat_name" style="display:none;"></span></li>
					<li>
					<a href="<?php echo site_url('user/my_project/'.$user_detail['user_id']) ?>"><span class="text-inner"><?php echo CREATED; ?></span>
					<span class="count">
					<span class="parentheses">(</span><?php if($numprj!=""){ echo $numprj;}else{ echo '0';} ?><span class="parentheses">)</span>					</span>					</a></li>
			
					<li>
					<a href="<?php echo site_url('user/my_comment/'.$user_detail['user_id']) ?>"><span class="text-inner"><?php echo COMMENTS; ?></span>
					<span class="count">
					<span class="parentheses">(</span><?php if($num_my_comments!=""){ echo $num_my_comments;}else{ echo '0';} ?><span class="parentheses">)</span>					</span>					</a></li>
                    			</ul>
<style>
.backul{
	list-style:none;
	margin:0;
	padding:0;
}
.backul li{
	margin:0;
	padding:0;
	float:left;

}
</style>
<script>

	function show_desc(id){
		//alert('projectdesc'+id);
		document.getElementById('projectdesc'+id).style.display="block";
	}
	function hide_desc(id){
		//alert('projectdesc'+id);
		document.getElementById('projectdesc'+id).style.display="none";
	}
</script>
	<div id="project_list">			
	<?php 
	
		if($backers!=""){
				$cnt=1;?>
				
				<ul class="backul">
				<?php
				
				foreach($backers as $bp){
				?>
					<script>
					/*$(document).ready(function(){
						$("#pd"+<?php echo $bp->project_id; ?>).mouseover(function(){
							$("#projectdesc"+<?php echo $bp->project_id; ?>).fadeIn();
						})
						
						$("#pd"+<?php echo $bp->project_id; ?>).mouseout(function(){
							$("#projectdesc"+<?php echo $bp->project_id; ?>).hide();
						})
					});*/
					</script>
				
				
					<li>
                    <a href="<?php echo site_url('projects/'.$bp->url_project_title.'/'.$bp->project_id); ?>" onmouseover="show_desc(<?php echo $bp->project_id; ?>)" onmouseout="hide_desc(<?php echo $bp->project_id; ?>)" id="pd<?php echo $bp->project_id; ?>">
                    <div class="prjinfo">
                    <?php //echo $bp->image;?>
					<?php if($bp->image!="" && is_file("upload/thumb/".$bp->image)){
						$pimg=$bp->image;
					}else{
						$pimg="no_img.jpg";
					} ?>
					<?php if(is_file("upload/thumb/".$bp->image)){ ?>
							<img class="prjimg" alt="" src="<?php echo base_url() ?>upload/thumb/<?php echo $pimg; ?>">
					<?php }else{ ?>
								<img class="prjimg" alt="" src="<?php echo base_url() ?>upload/thumb/<?php echo $pimg; ?>">
			<?php } ?>
			<span><?php if($bp->end_date != '0000-00-00 00:00:00'){ echo getDuration($bp->transaction_date_time); }else{ }  ?></span>
			<div class="projectdesc" id="projectdesc<?php echo $bp->project_id; ?>">
				<p><?php echo substr($bp->project_summary,0,50); ?></p>
			</div>
            
            <?php
			if(strlen($bp->project_title)>28)
			{?>
			<h2><?php echo substr($bp->project_title,0,28); ?>...</h2>
			<?php }else{?>
			<h2><?php echo $bp->project_title; ?></h2>
			<?php } ?>
            
            
		<!--	<h2><?php echo substr($bp->project_title,0,20); ?>...</h2>-->
		</div></a>
        </li>
					
					<?php // }
				} ?>
			</ul>
            <div class="clr"></div>
            <div style="margin-top:20px;" class="mess_cont_top_right">
				<?php echo $page_link; ?>
			</div>
	
		<?php }else{?>
					<li><h2><?php echo NO_PROJECT_BACKED; ?></h2></li>
				<?php } ?>
	 
	<!--</div>-->
</div>

 <div class="start_project"> <?php echo anchor('start/guideline','Start a new project','class="oresubmit"')?><br />
        <!--  <a class="school-link" href="<?php echo base_url().'help/school/defining-your-project'?>">How to make an awesome <?php echo $site_setting['site_name'];?> project</a>--> </div>
</section>