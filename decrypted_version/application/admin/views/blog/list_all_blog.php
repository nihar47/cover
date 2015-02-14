<script type="text/javascript" language="javascript">

	function delete_rec(id,offset)

	{

		var ans = confirm("Are you sure you want to delete this Post?");

		if(ans)

		{

			location.href = "<?php echo site_url('blog/delete_blog/'); ?>"+"/"+id+"/"+offset;

		}else{

			return false;

		}

	}

	

	function getlimit(limit)

	{

		//alert();

		if(limit=='0')

		{

		return false;

		}

		else

		{

			window.location.href='<?php echo site_url('blog/list_blog/');?>'+'/'+limit;

		}

	

	}

	

	function getsearchlimit(limit)

	{

		if(limit=='0')

		{

		return false;

		}

		else

		{

			
			window.location.href='<?php echo site_url('blog/search_blog_list');?>'+'/'+limit+'/'+'<?php echo $option.'/'.$keyword; ?>';


		}

	

	}

	

	

		function chk_valid()

		{

			

			var keyword = document.getElementById('keyword').value;

			

			if(keyword=='')

			{

				alert('Please enter search keyword');	

				return false;

				

			}

			

			else

			{

				return true;			

			}

			

			

			

		}

	



</script>

<script type="text/javascript">
function setchecked(elemName,status){
	elem = document.getElementsByName(elemName);
	for(i=0;i<elem.length;i++){
		elem[i].checked=status;
	}
}

function setaction(elename, actionval, actionmsg, formname) {
	vchkcnt=0;
	elem = document.getElementsByName(elename);
	
	for(i=0;i<elem.length;i++){
		if(elem[i].checked) vchkcnt++;	
	}
	if(vchkcnt==0) {
		alert('Please select a record')
	} else {
		
		if(confirm(actionmsg))
		{
			document.getElementById('action').value=actionval;	
			document.getElementById(formname).submit();
		}		
		
	}
}	
</script>

<script type="text/javascript">

	function gomain(x)

	{

		

		if(x == 'all')

		{

			window.location.href= '<?php echo site_url('blog/list_blog');?>';
			
		}

	}

</script>

<div id="con-tabs">

          <ul>

            <li><span style="cursor:pointer;"><?php echo anchor('blog/list_blog','Blogs','id="sp_1" style="color:#364852;background:#ececec;"'); ?></span></li>

          </ul>

          					 <?php 				

		   						$CI =& get_instance();	

		   						$base_url = $CI->config->slash_item('base_url_site');

								$base_path = $CI->config->slash_item('base_path');

							 ?>

       
          <div id="text">

            <div id="1">

			
            <?php if($msg!='') { 

            

			if($msg=='delete') { ?><div align="center" class="msgdisp">Record has been deleted Successfully.</div> 

            

            <?php } if($msg=='insert') { ?><div align="center" class="msgdisp">New Record has been added Successfully.</div> 

            

            <?php } if($msg=='update') { ?><div align="center" class="msgdisp">Record has been updated Successfully.</div> 
            
            
            
         <?php } if($msg=='feature') { ?> <div align="center" class="msgdisp">Record(s) has been featured Successfully.</div> 
            
            <?php } if($msg=='not_feature') { ?> <div align="center" class="msgdisp">Record(s) has been remove from featured Successfully.</div>
            

          <?php }}?>


			<table border="0" cellpadding="0" cellspacing="0" width="100%"  height="25" >

			

			<tr> 

            

            <td align="left" valign="top">

            

            <div style="float:left;">

            <table>

            <tr>

            <td align="left" valign="middle"><b>Per Page : </b></td>

            <td align="left" valign="top">

            

            <?php if($search_type=='normal') { ?>

            <select name="limit" id="limit" onChange="getlimit(this.value)" style="width:80px;">

            <?php } if($search_type=='search') { ?>

              <select name="limit" id="limit" onchange="getsearchlimit(this.value)" style="width:80px;">

            <?php } ?>

            <option value="0">Per Page</option>

            <option value="5">5</option>

            <option value="10">10</option>

            <option value="15">15</option>

            <option value="25">25</option>

            <option value="50">50</option>

            <option value="75">75</option>

            <option value="100">100</option>

            

            

            </select>

            </td>

            

             <td align="left" valign="middle">&nbsp;</td>

            

             <td align="left" valign="middle"><b>Search by : </b></td>

            <td align="left" valign="middle">

            

             
				 <?php
					$attributes = array('name'=>'frm_search','id' => 'frm_search','onSubmit'=>'return chk_valid();');
					echo form_open('blog/search_blog_list/'.$limit,$attributes);
				  ?>
     

                <select name="option" id="option" style="width:100px;" onChange="gomain(this.value)">

                <option value="all">All</option>   

               		<option value="blog_title" <?php if($option=='blog_title'){?> selected="selected"<?php }?>>Blog Title</option>                    

                    <option value="user" <?php if($option=='user'){?> selected="selected"<?php }?>>User</option> 

					<option value="blog_category" <?php if($option=='blog_category'){?> selected="selected"<?php }?>>Blog Category</option> 

				
				</select>

                

                

                <input type="text" name="keyword" id="keyword" value="<?php echo $keyword;?>" />                

                <input type="submit" name="submit" id="submit" value="GO" />

                
 

                </form> 

            

            

            </td>

            

          

            

            </tr>

            </table>

            </div>

            

            </td>

             
         <form name="frm_blog" id="frm_blog" action="<?php echo base_url();?>blog/action_blog/<?php echo $limit; ?>" method="post">    
     <td align="right" valign="top">

          <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>" />

           <input type="hidden" name="action" id="action" />

          

            <div style="float:right;"> 

            <table>

            <tr>

            

            

            <td align="right" valign="top">

             <img src="<?php echo base_url();?>images/add.png" border="0" />&nbsp;&nbsp;

            </td>

            <td align="right" valign="middle">

        <?php echo anchor('blog/add_blog','Add Blog','style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;"'); ?>			

        </td>

         

         <!--<td width="5px;"></td>-->
        
        <!--  <td align="right" valign="top">
          <img src="<?php //echo base_url();?>images/featured.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','feature', 'Are you sure, you want to Featured selected Blog(s)?', 'frm_blog')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" >Featured</a>
        </td>
        
        <td width="5px;"></td>
        
          <td align="right" valign="top">
           <img src="<?php //echo base_url();?>images/not_featured.png" border="0" />&nbsp;&nbsp;
            </td>
            <td align="right" valign="middle">
        <a href="javascript:void(0)"  onclick="setaction('chk[]','not_feature', 'Are you sure, you want to Remove Featured selected blog(s)?', 'frm_blog')" style="text-decoration:none;color:#000000;font-size:13px; font-weight:bold;" >Not Featured</a>
        </td>-->

        </tr>
        
        
        
        </table>

        

        </div>

        

        <div style="clear:both;"></div>

        

        </td>

     </form>       

            </tr>

				</table>

						

			</div>
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

                    <td valign="top"><table width="100%" border="0" bgcolor="#FFFFFF">

                        <?php

							if($msg != "")

							{

								if($msg == "delete")

								{

									$msg = "blog deleted successfully";

								}

						?>

						<tr>

							<td style="color:#FF0000;"><?php //echo $msg; ?></td>

						</tr>

						<?php	

							}

						?>


                         <tr>
                   
                    <td align="left" valign="top">
                    
                    
                    <table align="left" width="100%" border="0" bgcolor="#FFFFFF">
						<tr>
							<td align="left" valign="top">   
                            
                            
                      <div style="float:left;"> 
                  <a href="javascript:void(0)" onclick="javascript:setchecked('chk[]',1)" style="color:#000;"><?php echo "Check All"; ?></a>&nbsp; |&nbsp; 
           <a href="javascript:void(0)" onclick="javascript:setchecked('chk[]',0)" style="color:#000;"><?php echo "Clear All"; ?></a>
                     
            </div>
            
            
            
            
            <div style="float:left; padding:0px 0px 0px 15px;">
            
            
        
          
            
            </div>
             <div style="float:right; padding:0px 15px 0px 0px; color:#f00;">
            
            
       
          
            
            </div>
            
           <div style="clear:both;"></div> </td>    
           
						</tr>
						<tr>

                          <td valign="top"><div class="deals" style="display:block;" id="dig_it6">

                              <div id="last_login4">

                                <table width="100%" cellpadding="0" cellspacing="1" bgcolor="#888591">

                                  <tr class="alter">

                                  
                                       <th>&nbsp;</th>
									<th><strong>Blog Title</strong></th>

                                    <!--<th><strong>Blog Discription</strong></th>-->

                                    <th><strong>Blog Category</strong></th>

			                         <th><strong>User Name</strong></th>

									<th><strong>Publish</strong></th>

                                   <th><strong>Comments Off</strong></th>

                                   <!-- <th><strong>Anon Comments </strong></th>  
                                    <th><strong>Featured No</strong></th>
                                     <th><strong>Slider Order</strong></th> -->
                                    <th><strong>Status</strong></th> 
                                    <th><strong>Date Added</strong></th>  
                                    <th><strong>Action</strong></th>  

                                   
                                  </tr>

                                  <?php

								  	if($result)

									{

										$i=0;

										foreach($result as $row)

										{

											if($i%2=="0")

											{

												$fc = "toggle";

												$cl = "alter";

											}else{

												$fc = "toggle1";

												$cl = "alter1";

											}

								  ?>

								  <tr onClick="<?php echo $fc; ?>(this);" class="<?php echo $cl; ?>">

                             
 <td align="center" valign="middle"><input type="checkbox" name="chk[]" id="chk" value="<?php echo $row->blog_id;?>" /></td>
                                    <td><div class="pad-left" style="font-weight:bold;"><?php echo $row->blog_title ; ?> </div></td>
 
                                    <!--<td><div class="pad-left">
                                        <?php 
										//$d=substr($row->blog_discription,'0',85);
										//echo $d ;
										//echo $row->blog_discription;
										 ?> </div>
                                    </td>-->

                                    <td><div class="pad-left" style="text-align:center;"><?php $cname=$this->blog_model->get_blog_category_name($row->blog_category);
									echo $cname  ; ?></div></td>                            

                                    <td><div class="pad-left" style="text-align:center;">
									<?php $user=$this->blog_model->blog_user($row->user_id ); 
									   if($user){?>
                                       <a style="font-weight:bold; color: blue;" href="<?php echo $base_url.'member/'.$user->user_id;?>" target="_blank"><?php echo $user->user_name;echo "  ";echo $user->last_name; 
                             ?></a></div><?php }else {?>
                                        Admin Blog	
                                       <?php }?>
                                       </td>

                                    <td><div class="pad-left" style="text-align:center;"><?php if($row->publish==1){echo 'Yes';}else {echo 'No';} ?></div></td>

                                              

							 

                                    

                                    

                                     <td><div class="pad-left" style="text-align:center;"><?php if($row->no_one_comment ==1){echo 'Yes';}else {echo 'No';} ?></div></td> 

                                      

                                  <?php /*?>  <td><div class="pad-left" style="text-align:center;"><?php if($row->allow_anonymous ==1){echo 'Yes';}else {echo 'No';} ?></div></td>                           
<?php */?>
                                 <!--  <td align="center"><div align="center">
									
									
									<?php //if($row->is_featured==1){ ?>
                                    
                                     <img src="<?php //echo base_url();?>images/featured.png" border="0" />
                                    
                                    <?php //}	?></div></td>		-->
                                    
                                    
                                    <?php /*?> <td><div class="pad-left"><?php echo $row->feature_num ; ?> </div></td>
                                      <td><div class="pad-left"><?php echo $row->slider_feature_num; ?> </div></td><?php */?>
                                      
                                    <td><div class="pad-left" style="text-align:center;"><?php if($row->status ==1){echo 'active';}else {echo 'Not Active';} ?></div></td>
                                    <td><div class="pad-left" style="text-align:center;"><?php echo date('d M,Y H:i:s',strtotime($row->date_added )); ?></div></td>
<td><div class="pad-left"><?php echo anchor('blog/edit_blog/'.$row->blog_id.'/'.$offset,'Edit'); ?> <?php /*if($row_prj['total_prj']>0) { } else {*/ ?>/ <a href="#" onClick="delete_rec('<?php echo $row->blog_id; ?>','<?php echo $offset; ?>')">Delete</a><?php //} ?></div></td>
                                    

								  </tr>

								  <?php

								  			$i++;

										}

									}

								  ?>                                                                   

                                  <tr class="inner-tablebg">

                                    <td colspan="17" valign="top"><table width="100%" border="0" align="left">

                                        <tr class="inner-table">

                                          <td width="50" align="center">&nbsp;</td>

                                          <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" width="2" /></td>

                                          <?php echo $page_link; ?>

										  <td width="1" align="center"><img src="<?php echo base_url(); ?>images/devider1.png" alt="" /></td>

                                          <td width="100">&nbsp;</td>

										  <td width="650" align="center" valign="middle">&nbsp;</td>

										  <td align="left" width="100">&nbsp;</td>

                                        </tr>

                                      </table></td>

                                  </tr>

                                </table>

                              </div>

                              <div id="chart4" style="display:none;">

                                <table cellpadding="0" cellspacing="0" border="0">

                                  <tr>

                                    <td align="center"><img src="<?php echo base_url(); ?>images/chart.jpg" alt="" /></td>

                                  </tr>

                                </table>

                              </div>

                            </div></td>

                        </tr>

                      </table>
                      </td>

                    <td background="<?php echo base_url(); ?>images/c2-r.jpg"></td>

                  </tr>

                  <tr>

                    <td><img src="<?php echo base_url(); ?>images/c2-b-l.jpg" alt="" height="4" width="7" /></td>

                    <td background="<?php echo base_url(); ?>images/c2-b.jpg"></td>

                    <td><img src="<?php echo base_url(); ?>images/c2-b-r.jpg" alt="" height="4" width="7" /></td>

                  </tr>

                </table>
</td></tr></table>
              </div>

            </div>

          </div>

        