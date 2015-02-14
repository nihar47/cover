<script type="text/javascript">

function showaddbox()
{
	$('#add_update').css('display','block');
		
}

function show_reply(id)
{
	if(id!='')
	{
		document.getElementById(id).style.display='block';						
	}		
}
		
</script>

<div data-role="header">
  <h1>UPDATES</h1>
 <?php echo anchor('home','Home','class="ui-btn-left"'); ?> 
   <?php echo anchor('user/my_project/',CHANGE_PROJECT,'class="ui-btn-right"'); ?>
 </div>
<div class="pad15">
  <h2> <span id="s1postJ"> <?php echo REVIEW_UPDATE_TO_YOUR_FUNDS_BELOW; ?></span></h2>
  <br>
  <div style="float:right;">
    <h3 class="add_text_buton" onclick="showaddbox();" style="cursor:pointer;"><?php echo ADD_NOW; ?></h3>
  </div>
  <div data-role="content">
    <div class="content-primary">
      <div class="sidebar" id="add_update" style="display:none;  width:100%;">
        <ul data-role="listview">
          <li>
            <h3 class="title"><?php echo WRITE_YOUR_UPDATES ;?></h3>
          </li>
          <div id="post-update"> <span>
            <?php
				  		$attributes = array('name'=>'frm_update');
						echo form_open_multipart('project/add_update',$attributes);
				    ?>
            </span> <span id="err_msg" style="color:#FF0000;"></span> <span>
            <?php
										$vals = array(
											'name' => 'updates',
											'id' => 'updates',
											'width' => '98%',
											'height' => '350px',
											'value' => '',
										);
										echo form_fckeditor($vals)."";
									  ?>
            </span>
            <input type="hidden" name="project_id" id="project_id" value="<?php echo $this->session->userdata('project_id'); ?>"  />
            <br />
            <input type="button" class="submit" onclick="document.frm_update.submit();"  style="cursor:pointer;"  name="update_btn" id="updates_btn" value="Post Update" />
            </form>
          </div>
        </ul>
      </div>
    </div>
  </div>
  <?php if($updates) { ?>
  <div id="recent-donate-detail">
    <div id="donor-update">
      <ul>
        <?php
						$i = 0;
						if($updates)
						{
							foreach($updates as $up)
							{
								if($i%2 == '0')
								{
									$str = "class=''";
								}else{
									$str = "class='back'";
								}
					?>
        <li <?php echo $str; ?>>
          <div class="right-content"> <em><?php echo date($site_setting['date_format'],strtotime($up['date_added'])); ?>
            <!--by-->
            <?php //echo $up['username']; ?>
            </em><br />
            <p style="text-align:left;">
              <?php 
							
								$up_content = $up['updates'];
					$up_content=str_replace('KSYDOU','"',$up_content);
				$up_content=str_replace('KSYSING',"'",$up_content); 
					
					echo $up_content;
							
							 ?>
            </p>
          </div><br />

          <div class="delete-content"><?php echo anchor('project/delete_update/'.$up['update_id'], '<img src="'.base_url().'images/delete.png" alt="" style="background:none;border:none;" title="'.DELETE .'" />', 'style="background:none;padding:0px;"'); ?> &nbsp;&nbsp; <a href="javascript:" style="display:inline-block;background:none;border:1px solid #b4d7f9;padding:0px 3px;margin-right:10px;color:#114a75;text-decoration:none;" id="sts" onclick="show_reply(<?php echo $up['update_id']; ?>)"><?php echo EDIT;?></a> </div><br />
<br />

          <div class="clear"></div>
          <div id="<?php echo $up['update_id']; ?>" style="width:600px;display:none;border:none;">
            <table border="0" cellpadding="0" cellspacing="0" align="left" width="100%">
              <tr>
                <td align="left" valign="top" style="color:#FF0000;"><span id="err_msg2"></span></td>
              </tr>
              <tr>
                <td height="10" ></td>
              </tr>
              <?php
				$attributes = array('name'=>'frmupupdate2','id'=>'up'.$up['update_id']);
				echo form_open_multipart('project/edit_updates/'.$up['update_id'],$attributes);
				
			?>
              <tr>
                <td align="left" valign="top"><?php
						 		$edit_up_content = $up['updates'];
								$edit_up_content=str_replace('KSYDOU','"',$edit_up_content);
								$edit_up_content=str_replace('KSYSING',"'",$edit_up_content); 
					
										$vals = array(
											'name' => 'upupdates'.$up['update_id'],
											'id' => 'upupdates'.$up['update_id'],
											'width' => '100%',
											'height' => '350px',
											'value' => $edit_up_content,
										);
										echo form_fckeditor($vals)."";
									  ?>
                </td>
              </tr>
              <tr>
                <td height="10" ></td>
              </tr>
              <tr>
                <td align="left" valign="top" ><input type="hidden" name="update_id" id="update_id" value="<?php echo $up['update_id']; ?>"  />
                  <input type="hidden" name="project_id" id="project_id" value="<?php echo $this->session->userdata('project_id'); ?>"  />
                  <input type="hidden" name="username" id="username"  value="<?php echo $this->session->userdata('user_name'); ?>"/>
                  <input type="hidden" name="email" id="email"  value="<?php echo $this->session->userdata('email'); ?>"/>
                  <input type="submit" class="submit" value="<?php echo POST_UPDATE; ?>" name="postreply" id="postreply"   style="cursor:pointer;"  onclick="document.getElementById('<?php echo 'up'.$up['update_id'];?>').submit();" />
                </td>
              </tr>
              <tr>
                <td height="10" ></td>
              </tr>
            </table>
            </form>
          </div>
          <div class="clear"></div>
        </li>
        <?php
								$i++;
							}
						}
					?>
      </ul>
    </div>
    <div style="clear:both;"></div>
    <div  align="left" style="line-height:20px; font-size:11px;"><?php echo $page_link; ?></div>
  </div>
  <?php } else { ?>
  <div class="clear"></div>
  <div align="center"><?php echo NO_UPDATES; ?>.</div>
  <div class="clear"></div>
  <?php } ?>
</div>
