<!--<h3 class="left">Live Feed...</h3>-->

<!--<a href="<?php echo base_url();?>home/signup/" class="signup right" style="color: #84C200; font-weight:normal; text-transform:capitalize;margin: 4px 25px 0 0;float: right;font-size: 13px;text-decoration: none;">Sign Up here</a>-->

<!--<div class="clear"></div>-->			

<!--====================left==============-->  

<ul>

<?php

					if($donation)

					{

						$i=1;

						foreach($donation as $dn)

						{

							$temp_time = explode(" ",$dn->transaction_date_time);

							

							

							if($dn->user_id=='' || $dn->user_id=='0' || $dn->user_id==0)

							{

							?>

							

							

							

						<li>	<div id="recent_data_<?php echo $i; ?>" class="live_feed sort">

								<div class="num"><?php echo set_currency($dn->amount); ?></div>

								<div class="graybox"> <?php echo anchor('projects/'.$dn->url_project_title.'/'.$dn->project_id,$this->home_model->text_echo('to').'&nbsp;<strong>'.$dn->project_title.'</strong>'); ?>

								</div>

								<div class="clear"></div>

							</div>	

							</li>

							

							

							

							<?php

							}

			

							else

							{

							

							$user_detail=get_user_detail($dn->user_id);

							

						?>

							<li>

								<div id="recent_data_<?php echo $i; ?>" class="live_feed sort">

									<div class="num"><?php echo set_currency($dn->amount); ?></div>

									<div class="graybox"> <?php echo anchor('projects/'.$dn->url_project_title.'/'.$dn->project_id, $this->home_model->text_echo('From').'&nbsp;<span>'.$user_detail['user_name'].'&nbsp;</span>'. $this->home_model->text_echo('to').'&nbsp;<strong>'.$dn->project_title.'</strong>'); ?></div>

									<div class="clear"></div>

								</div>

							</li>	

				<?php   }

				

						

							$i++;

						}

					}

				?></ul>