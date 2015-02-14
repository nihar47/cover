
         <div id="headerbar">
	<div class="wrap930">
	
	<!-- dd menu -->	
<div class="login_navl">
	   
			
			
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr><td align="left" >	
	<div class="project_title_hd" style="padding-top:15px;" >
	
	
	<span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo $this->session->userdata('project_title'); ?></span>
	
	</div>
	</td>
	<td align="right" >	
	
	<div class="project_title_hd" style="padding-top:15px; "  >
	<span id="sddm" style="float:right;">
		
		<?php if($this->session->userdata['project_id']!='' && $this->session->userdata['project_id']!=0) {  ?>
		
	 <?php echo anchor('user/my_project/',CHANGE_PROJECT,' style="text-transform:capitalize;color:#2B5F94;font-size:17px;text-decoration:none;" '); ?>
		
		<?php } ?>
		
	</span>
	</div>

</td></tr></table>

		  </div> 
		      
		<div class="clear"></div>
	</div>
</div>	
<div id="container">
<div class="wrap930" style="padding:15px 0px 20px 0px;">	

<!--side bar user panel-->

<?php echo $this->load->view('default/dashboard_sidebar'); ?>

<!--side bar user panel-->


<div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">
           			
              
<style type="text/css">

#tab_all a{ color:#000000; text-decoration:none; }

#sts:hover{ font-weight:bold; }
</style>				
			

<?php
	$data['tab_sel'] = WIDGETS;
	$this->load->view('default/overview_tabs',$data);

?>

<script type="text/javascript">
		
		function show_reply(id)
		{
			if(id!='')
			{
				document.getElementById(id).style.display='block';						
			}		
		}
</script>
	 
	 
	
	  
	  
		   <div class="inner_content" style=" margin-top:11px;padding:12px; ">
		         
				
			<h3 id="dropmenu2"><?php echo GET_YOUR_DONATION_WIDGET; ?> </h3>
             
				  
				  
			 <div class="clear"></div>
      	
            
			  <div class="inner_content" style="border:none;">
              <div id="post-comment">
                <div id="registration-box">
                  
                    <form>
					<div align="center">
                      
                    
					  <input type="hidden" name="color" id="color" value="red" />
					  <input type="hidden" name="size" id="size" value="s" />
					  <div class="clear"></div>
				
						
						
						
						
                      </div>
                    </form>
                  </div>

                <div id="registration-box">
				
				
				
                  <div id="box" style="padding-left:0px; width:225px; float:left;">
                   
                    <div align="center" id="bk" >
						<iframe align="middle" id="bh_frame" scrolling="no" width="225" height="380" frameBorder="0" src="<?php echo site_url('project/widgets_page/s/red/'.$pid); ?>" style="border:1px solid #cccccc;"></iframe>
					</div>
                  </div>  
				  
				  
				
						<div class="s_right" style="float:left; width:352px; margin-top:1px;">
						<label><b><?php echo EMBED_CODE; ?> :</b></label><br />

                          <span>
                          <textarea name="area1" rows="4" cols="60" id="area1" style="padding: 10px 10px 10px 10px;-moz-border-radius: 8px;-webkit-border-radius: 8px;background: #FAFAFA;border: 1px solid lightGrey;"  readonly="readonly"><div id='widgets'></div><script src='<?php echo site_url('project/widgets_code/s/red/'.$pid); ?>' type='text/javascript'></script></textarea>
                          </span>
						  
						  </div>
				  
				  
                </div>
              </div>
			
             
			  <div class="clear"></div>
            </div>
	
	
	
	</div>
		
		
		
		
		</div>
			
			
			
				
				
				<div class="clear"></div>		
				
				
					</div>
	<!-- left end ------>
		
       </div>
   
	