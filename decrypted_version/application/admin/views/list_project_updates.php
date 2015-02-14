<style>
#con-tabs ul li a{
	background:none!important;
	color:#364852!important;
	padding:0!important;
}
</style>
<script type="text/javascript">



function showaddbox()

{

	document.getElementById('add_update').style.display='block';

		

}



function show_reply(id)

{

	if(id!='')

	{

		document.getElementById('up'+id).style.display='block';						

	}		

}

		

</script>

<style type="text/css">

.inner_content {

    background: none repeat scroll 0 0 #E3F0FD;

    border: 1px solid #9FC8DA;

    margin-bottom: 20px;

    padding: 15px 0 15px 15px;

}

</style>

    

	 

   <!-- jQuery and jQuery UI -->

	<script src="<?php echo upload_url(); ?>editor/js/jquery-1.4.4.min.js" type="text/javascript" charset="utf-8"></script>

    <script src="<?php echo upload_url(); ?>editor/js/jquery-ui-1.8.7.custom.min.js" type="text/javascript" charset="utf-8"></script>

    <link rel="stylesheet" href="<?php echo upload_url(); ?>editor/css/smoothness/jquery-ui-1.8.7.custom.css" type="text/css" media="screen" charset="utf-8">



 <script type="text/javascript" src="<?php echo upload_url(); ?>tiny_mce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		 mode : "exact",
  		elements : "updates",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",	
		

		// Theme options
			theme_advanced_buttons1 : "styleselect,formatselect,fontselect,fontsizeselect,|,forecolor,backcolor,styleprops,|,emotions,iespell,media,",
		theme_advanced_buttons2 : "bold,italic,underline,|,bullist,numlist,|,cut,copy,paste,pastetext,pasteword,|,search,replace,|,link,unlink,anchor,|,code,image",
		theme_advanced_buttons3 : "",
		theme_advanced_buttons4 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,

		

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],
		
		height : '400',
		width : '600',
		
	});
</script>
   
 

    

     <?php $CI =& get_instance();

				$base_url = $CI->config->slash_item('base_url_site'); ?>

<div id="con-tabs"> 





 <ul>

            <li><span style="cursor:pointer;"><?php echo anchor('project_category/updates/'.$project_id,'Updates','id="sp_2" style="color:#364852;background:#ececec;"'); ?></span></li>

          </ul>

        



<div id="text">   

<?php if($msg!='') { 

			if($msg == "insert") {?> <div align="center" class="msgdisp">New Record has been added Successfully.</div>

            

			<?php }

			if($msg == "update") {?> <div align="center" class="msgdisp">Record has been updated Successfully.</div>

            

			<?php }

			if($msg == "delete") {?> <div align="center" class="msgdisp">Record has been deleted Successfully.</div>

            

			<?php }

			} ?>  

     

     <div class="inner_content" style=" width:98%;margin-top:11px;padding:12px; display:inline-block;">

		         

				<div style="float:left;"><h3 id="dropmenu2">&nbsp;</h3></div>

				

				<div style="float:right;"><h3 class="add_text_buton"  style="cursor:pointer;">

                

                <a href="javascript://" style="float:left;" onclick="showaddbox();"><img src="<?php echo base_url();?>images/add.png" border="0" style="margin-right:5px;"/><span style="display:inline-block;">Add Now</span></a></div>

             <div style="clear:both;"></div>

			 

			 <div class="sidebar" id="add_update" style="width:100%;display:none;">

			<ul>

				<li style="border:none;">	

					<h3 class="title">Write Updates</h3>			

				  <div id="recent-donate-detail">

				

            		<div id="post-update">

				<span>	<?php

						$attributes = array('name'=>'frm_update');

						echo form_open_multipart('project_category/add_update',$attributes);

				    ?>

					</span>

				<span id="err_msg" style="color:#FF0000;"></span>

					

                    	<div style="width:600px; padding:2px;" id="postupd">

                          

                             <textarea id="updates" name="updates"  class="updates"></textarea>

                        </div>

                                            

					<input type="hidden" name="project_id" id="project_id" value="<?php echo $project_id; ?>"  />

			

            

            

                    

                    

					

<br />



				

					<input type="submit" class="submit" style="cursor:pointer;" name="update_btn" id="updates_btn" value="Post Update" />

										

					

					</form>

				</div>    

			

				 

				<div style="clear:both; height:25px;"></div>

				

				</div>

				</li>

			</ul>

			</div>

			 

			   <div class="clear"></div>

			 

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

						<li <?php echo $str; ?> style=" background: none repeat scroll 0 0 #FAFAFA; border: 1px solid #D3D3D3;  color: #000000;  font-size: 12px;    margin-bottom: 10px;  padding: 10px;">

						  <div class="right-content" style=" display: block; float: left; width: 1050px;">

				

						  

						  

						  						  

							<em><?php echo date($site_setting['date_format'],strtotime($up['date_added'])); ?> <!--by--> <?php //echo $up['username']; ?></em>

						<br/>

							<p style="text-align:left; padding:0; margin:0; letter-spacing:0;"><?php echo $up['updates']; ?></p>

							</div>

						  <div class="delete-content"  style="display: block;float: right; padding: 0;"><?php echo anchor('project_category/delete_update/'.$up['update_id'], '<img src="'.base_url().'images/delete2.png" alt="" style="background:none;border:none;" title="Delete Update" />', 'style="background:none;padding:0px;"'); ?></div>

						  <div class="clear"></div>

						    <div class="delete-content" style="display: block;float: right; padding: 0;">							

							

							 <a href="javascript:void(0)" style="display:inline-block;background:none;border:1px solid #b4d7f9;padding:0px 3px;margin-right:10px;color:#114a75;text-decoration:none;" id="sts" onclick="show_reply(<?php echo $up['update_id']; ?>)">Edit</a>

							 

							 </div>

							 

							 

							 

							 	

					<div class="clear" style="clear:both;"></div>

					

				<div id="up<?php echo $up['update_id']; ?>" style="border:none; float:left; display:none;">

						<?php

				$attributes = array('name'=>'frmupupdate2');

				echo form_open_multipart('project_category/edit_updates/'.$up['update_id'],$attributes);

			

			?>  
	<script type="text/javascript">
	tinyMCE.init({
		// General options
		 mode : "exact",
  		elements : "updates<?php echo $up['update_id']; ?>",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",	
		

		// Theme options
			theme_advanced_buttons1 : "styleselect,formatselect,fontselect,fontsizeselect,|,forecolor,backcolor,styleprops,|,emotions,iespell,media,",
		theme_advanced_buttons2 : "bold,italic,underline,|,bullist,numlist,|,cut,copy,paste,pastetext,pasteword,|,search,replace,|,link,unlink,anchor,|,code,image",
		theme_advanced_buttons3 : "",
		theme_advanced_buttons4 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,

		

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],
		
		height : '400',
		width : '600',
		
	});
</script>	  
							

					<table border="0" cellpadding="0" cellspacing="0" align="left" width="100%">	

					<tr><td align="left" valign="top" style="color:#FF0000;"><span id="err_msg2"></span></td></tr>

			<tr><td height="10" ></td></tr>

			

			     

			

				

				  

				 

				<tr>

				<td align="left" valign="top">

                   	<div style="width:600px; padding:2px; background:#fff;">

                                          

                                        <textarea id="updates<?php echo $up['update_id'];?>" name="<?php echo 'upupdates'.$up['update_id'];?>" cols="50" rows="4" class="updates"><?php echo $up['updates']; ?></textarea></div>

                      

                        

                        



				</td>

				</tr>

				

				

				 <tr><td height="10" ></td></tr>

				

              <tr><td align="left" valign="top" >

		<input type="hidden" name="update_id" id="update_id" value="<?php echo $up['update_id']; ?>"  />	  

		<input type="hidden" name="project_id" id="project_id" value="<?php echo $project_id; ?>"  />

		

			 

          <input type="submit" class="submit" value="Edit Update" name="postreply" id="postreply"   style="cursor:pointer;"  />

			  

			  </td></tr>

			  

			  <tr><td height="10" ></td></tr>

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

				

				</div>

				

			<?php } else { ?>

			

			

			<div class="clear"></div>

			

			<h2 style="text-align:center; display:inline-block; width:98%;">No Updates</h2>

			

			<div class="clear"></div>

			

			<?php } ?>	

				

		</div>

        

        <?php if($updates)

	  {?>  

        <div align="center" style="clear:both; float:left; margin-left:450px;background:url(<?php echo base_url(); ?>images/table-f-bg.jpg) top left repeat-x; -moz-border-radius:8px;

	-webkit-border-radius:8px;width:200px; border:1px solid #002B2B; height:30px;"> 

		

        <table align="center">	<tr><td align="center" valign="top"><?php echo $page_link; ?></td></tr></table>

        

        </div>

        <?php }?>

     

        





</div></div>        