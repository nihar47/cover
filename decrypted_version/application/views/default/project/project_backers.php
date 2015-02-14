

<section>

	<div id="page_we">

        	<div class="project_head"><?php echo anchor('projects/'.$one_project['url_project_title'].'/'.$one_project['project_id'],$one_project['project_title'],'class="project_title"');?>

  <p class="project_own">By&nbsp;<?php echo anchor('user/full_bio_data/'.$one_project['user_id'].'/'.$one_project['project_id'],$user_name.' '.substr($last_name,0,1),'id="profile_detail_popup"');?></p>

  <div class="clr"></div>

            <ul class="project_tabs">

            	<li><?php echo anchor('projects/'.$one_project['url_project_title'].'/'.$one_project['project_id'],PROJECT_HOME); ?></li>

                <li><?php echo anchor('project/updates/'.$one_project['project_id'],UPDATES.' | '.$total_updates); ?></li>

             <!--   <li><a href="#">Gallery | 1</a></li>-->

                <li><?php echo anchor('project/donations/'.$one_project['project_id'],BACKERS.' | '.$project_backers,'id="tabsel"'); ?></li>

                <li><?php echo anchor('project/comments/'.$one_project['project_id'],COMMENTS.' | '.$total_comments); ?></li>

            </ul>

        </div>

        <div class="projectdetail_cont">

        <!---------------Left--------------------->	

        <div class="project_left">

		<ul class="comment_listul">

		 <li class="comment" style="padding-bottom:15px;">

		 	<p class="up"><?php echo BACKERS_TEXT; ?> </p>

		 </li>		

				<?php

					if($donations){

					foreach($donations as $upc){

					

					$ud=get_user_detail($upc['user_id']);

					

					

				?>

				

				  <li class="comment">

				  

				  

									  <?php if($ud['image']!='' && is_file('upload/thumb/'.$ud['image']) ) { ?>

				

									 <a href="<?php echo site_url('member/'.$ud['user_id']); ?>"><img src="<?php echo base_url();?>upload/thumb/<?php echo $ud['image']; ?>"  class="cuserimg" align="left"  /></a>

									

									<?php }elseif($ud['tw_screen_name']!='' && $ud['tw_id']>0) { ?>

										

										<img src="http://api.twitter.com/1/users/profile_image?screen_name=<?php echo $ud['tw_screen_name']; ?>&size=bigger" class="cuserimg" align="left"  />

										

										

										<?php }

									elseif($ud['fb_uid']!='' && $ud['fb_uid']>0) { ?>

									 <a href="<?php echo site_url('member/'.$ud['user_id']); ?>">

									<img src="http://graph.facebook.com/<?php echo $ud['fb_uid']; ?>/picture?type=large" class="cuserimg" align="left"  /></a>

									

									<?php } else {

									 ?> 

									

									<a href="<?php echo site_url('member/'.$ud['user_id']); ?>"><img src="<?php echo base_url();?>upload/thumb/no_man.gif" class="cuserimg"  align="left" /></a>

									

									<?php }  ?>			  

								  

				  

				 

					 

					  <div class="update_cont">

						<h3><?php 
			   		if($bk->trans_anonymous=='3'){
					
						echo ANONYMOUS_BACKER;
					}
					else{?>
					 <?php echo anchor('member/'.$ud['user_id'],$ud['user_name']." ".$ud['last_name'],'class="author"') ?>  </h3>
					 <?php } ?>

						<p class="up"><img src="<?php echo base_url() ?>images/locationicon.png" alt="" style="float:left; margin-right:9px;"/><?php echo get_city_name($ud['city']).",".get_state_name($ud['state']).",".get_country_name($ud['country']); ?></p>

							<?php $tot_bac_prj=user_project_donation_count($upc['user_id']);

							if($tot_bac_prj>1){

							 ?><p class="up"><img src="<?php echo base_url() ?>images/pdhover.png" alt="" style="float:left; margin-right:5px;"/><?php echo BACKED." ".($tot_bac_prj-1)." ".OTHER_PROJECTS; ?></p><?php } ?>

						  <!--<span style="display:none;" class="loading icon-loading-small"></span>--> </div>

				   

				  </li>

				  <?php }?>


		<?php 		 }	else{ echo NO_BACKERS_AVAILABLE;}

				  ?>

				  

				

				  

			 

				  

				

				  

				  </ul>

		      <div class="clr"></div>
          <div class="mess_cont_top_right"> <?php echo $page_link ;?> </div>

		</div>

        <!---------------Left--------------------->	