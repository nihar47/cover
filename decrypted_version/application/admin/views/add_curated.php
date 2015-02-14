<div id="con-tabs">   
       <ul>    
          <li><span style="cursor:pointer;">
		  <?php echo anchor('curated/list_curated','Curated','id="sp_1" style="color:#364852;background:#ececec;"'); ?>
          </span>
          </li>    
        </ul>     
          <div id="text"> 
              <div id="1"> 
                   <div class="fleft" style="width:100%;"> 
                        <div style="height:10px;"></div>	
                         <table width="100%" border="0" cellpadding="0" cellspacing="0">     
                           <tr>   
                        <td><img src="<?php echo base_url(); ?>images/c2-t-l.jpg" alt="" height="4" width="7" /></td>
                       <td background="<?php echo base_url(); ?>images/c2-t.jpg" width="99%"></td>    
                        <td><img src="<?php echo base_url(); ?>images/c2-t-r.jpg" alt="" height="4" width="7" /></td> 
                                 </tr>  
              <tr>                  
               <td background="<?php echo base_url(); ?>images/c2-l.jpg"></td> 
                <td valign="top" bgcolor="#FFFFFF"><div id="deal-tabs">	
                <div id="deal-con">					
                	<div id="2" style="">	
                    	  <div align="center">		
                          	 <div id="add-deal">	
                              <?php	$attributes = array('name'=>'frm_project_category');
							  	echo form_open_multipart('curated/add_curated',$attributes);
								 ?>
                                 <fieldset class="step">
                                 <?php		if($error != ""){		
								 echo "<label style='width:700px;text-align:center;'><span>".$error."</span></label>";
								echo "<div class='vertical-line'></div>";	
							}						
			$active_user_list=$this->curated_model->active_user_list();		?>	
              <!--<div class="fleft">	
              		 <label>projects<span>&nbsp;</span></label>	
                      <select name="c_project_id[]" id="c_project_id" multiple="multiple" style="height:150px;">	
                      	<option value="">------select Project------</option>                  
                          <?php	if($projects) {		
						  	foreach($projects as $project) {	?>
                            <option value="<?php echo $project->project_id;?>" <?php if(in_array($project->project_id,$c_project_id)){  echo 'selected="selected"';} ?>  > <?php echo ucwords($project->project_title);?></option>    
                            <?php	}	}	?>
                       </select>	
              </div>-->	
              <div style="clear:both;"></div>   
            <div class="fleft">	
            	 <label>Curated Name<span>&nbsp;</span></label>	
                   <span onMouseOver="show_bg('curated_title')" onMouseOut="hide_bg('curated_title')">	
                <input type="text" name="curated_title" id="curated_title" value="<?php echo $curated_title; ?>" onFocus="show_bg('curated_title')" onBlur="hide_bg('curated_title')"/>			
                 </span>
            </div>	
             <div style="clear:both;"></div>   
            <div class="fleft">	
            	 <label>Curated Link<span>&nbsp;</span></label>	
                   <span onMouseOver="show_bg('curated_link')" onMouseOut="hide_bg('curated_link')">	
                <input type="text" name="curated_link" id="curated_link" value="<?php echo $curated_link; ?>" onFocus="show_bg('curated_link')" onBlur="hide_bg('curated_link')"/>			
                 </span>
            </div>	
            <div style="clear:both;"></div>	
            <div class="fleft">	
            	<label>Curated Image<span>&nbsp;</span></label>	
                	<span onmouseover="show_bg('photo')" onmouseout="hide_bg('photo')">	
                   <input type="file" name="photo" id="photo"  onfocus="show_bg('photo')" onblur="hide_bg('photo')"/>	
                   <input type="hidden" name="prev_image" id="prev_image" value="<?php echo $curated_image; ?>" />										  				  </span>		
                </div>	
              <div style="clear:both;"></div>	
             <div class="fleft">
             	<label>Status<span>&nbsp;</span></label>	
                 <select name="curated_active" id="curated_active">	
                 	<option value="0" <?php if($curated_active=='0'){ echo "selected"; } ?>>Inactive</option>	
                    <option value="1" <?php if($curated_active=='1'){ echo "selected"; } ?>>Active</option>	
                 </select>		
              </div>	
              
              <div style="clear:both;"></div>	
            <?php /*?><div class="fleft">		
            	<label>Curated Description<span>&nbsp;</span></label>	
                  <!-- jQuery and jQuery UI -->	
                  	<script src="<?php echo upload_url(); ?>editor/js/jquery-1.4.4.min.js" type="text/javascript" charset="utf-8"></script>       
                    <script src="<?php echo upload_url(); ?>editor/js/jquery-ui-1.8.7.custom.min.js" type="text/javascript" charset="utf-8"></script>   
                   <link rel="stylesheet" href="<?php echo upload_url(); ?>editor/css/smoothness/jquery-ui-1.8.7.custom.css" type="text/css" media="screen" charset="utf-8">
                     <!-- elRTE --> 
                    <script src="<?php echo upload_url(); ?>editor/js/elrte.min.js" type="text/javascript" charset="utf-8"></script>   
                  <link rel="stylesheet" href="<?php echo upload_url(); ?>editor/css/elrte.min.css" type="text/css" media="screen" charset="utf-8"> 
                     <!-- elFinder -->  
                   <link rel="stylesheet" href="<?php echo upload_url(); ?>editor/css/elfinder.css" type="text/css" media="screen" charset="utf-8" />    
                  <script src="<?php echo upload_url(); ?>editor/js/elfinder.full.js" type="text/javascript" charset="utf-8"></script>
                                                                                                                                        <script type="text/javascript" charset="utf-8"> 
					    jQuery().ready(function() {																							elRTE.prototype.options.panels.web2pyPanel = ['save','copy', 'cut', 'paste', 'pastetext', 'pasteformattext', 'removeformat','undo', 'redo','strikethrough','bold', 'italic', 'underline', 'subscript', 'superscript','link', 'unlink', 'anchor','insertorderedlist', 'insertunorderedlist', 'justifyleft', 'justifyright','justifycenter', 'justifyfull', 'forecolor','hilitecolor', 'outdent', 'indent','horizontalrule', 'blockquote', 'div', 'stopfloat', 'css', 'nbsp', 'smiley', 'pagebreak','ltr', 'rtl','table', 'tableprops', 'tablerm',  'tbrowbefore', 'tbrowafter', 'tbrowrm', 'tbcolbefore', 'tbcolafter', 'tbcolrm', 'tbcellprops', 'tbcellsmerge', 'tbcellsplit','formatblock','fontsize', 'fontname','image', 'flash','elfinder','fullscreen']; elRTE.prototype.options.toolbars.web2pyToolbar = ['web2pyPanel'];                     
				 var opts1 = {   cssClass : 'el-rte', 
				                 lang     : 'en',  // Set your language
								 allowSource : 1,  // Allow user to view source  
								 height   : 450,   // Height of text area   
								 toolbar  : 'web2pyToolbar',   // Your options here are 'tiny', 'compact', 'normal', 'complete', 'maxi', or 'custom' 
								 cssfiles : ['<?php echo upload_url(); ?>editor/css/elrte-inner.css'],// elFinder
								 fmAllow  : 1,  
								
								fmOpen : function(callback) {
								 $('<div id="myelfinder" />').elfinder({                            url : '<?php echo upload_url(); ?>editor/connectors/php/connector.php', //You must configure this file. Look for 'URL'.  
								lang : 'en', dialog : { width : 900, modal : true, title : 'Files' }, // Open in dialog window                       
								closeOnEditorCallback : true, // Close after file select
								editorCallback : callback     // Pass callback to file manager
								 })             
							  }                                                    //End of elFinder
					 }     
					 $('#curated_description').elrte(opts1);
					  })  
				 </script>                                                                                                                        		  <textarea name="curated_description" id="curated_description" onFocus="show_bg('curated_description')" onBlur="hide_bg('curated_description')"><?php echo $curated_description; ?></textarea>	
            	</div><?php */?>			
         <div style="clear:both;"></div>	
      	<div class="fleft">	
    		  <label>&nbsp;<span>&nbsp;</span></label>	
   			<span onMouseOver="show_bg('curated_id')" onMouseOut="hide_bg('curated_id')">	
             <input type="hidden" name="curated_id" id="curated_id" value="<?php echo $curated_id; ?>" />	
             <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />
          	</span>
        </div>	
        <div style="clear:both;"></div>	
        <div class="fleft">	
        	<label>&nbsp;<span>&nbsp;</span></label>
              <?php	if($curated_id=="")	{	?>	
              	  <div class="submit">	
                  <input type="submit" name="submit" value="Submit" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onClick=""/>	
                   </div>	
                <?php	}else{	?>	
               <div class="submit">	
               	<input type="submit" name="submit" value="Update" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer; " onClick=""/>	
                </div>
                	<?php }	?>	
                 <div class="submit">	
                 <input type="button" name="cancel" value="Cancel" style="background:none; border:none; width:150px; color:#FFFFFF; font-size:14px; padding-top:7px; cursor:pointer;" onClick="location.href='<?php echo site_url('curated/list_curated'); ?>'"/>		
                  </div>
                 </div>	
                </fieldset>	
                </form>	
               </div>	
                </div>	
             </div>	
           </div>	
          </div>
          </td>  
           <td background="<?php echo base_url(); ?>images/c2-r.jpg"></td>  
        </tr>   
       <tr> 
         <td><img src="<?php echo base_url(); ?>images/c2-b-l.jpg" alt="" height="4" width="7" /></td>
          <td background="<?php echo base_url(); ?>images/c2-b.jpg"></td>   
          <td><img src="<?php echo base_url(); ?>images/c2-b-r.jpg" alt="" height="4" width="7" /></td>
        </tr> 
        </table> 
        </div> 
       </div> 
      </div>  
</div>