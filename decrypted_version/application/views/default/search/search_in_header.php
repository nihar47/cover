
<div class="search_project" id="search_project">
	<img width="29" height="18" class="triangle" src="<?php echo base_url();?>images/triangle.png">
	<div class="cancel" id="closesearch"><a href="javascript:void(0)" ></a></div>
	<div id="page_we">
    	<div class="section_contain">
     	<h3 class="project_cont_t"><!--Projects in Virginia Beach, VA--></h3>  
		   
		   <div class="project_cont">
           
            <ul id="search_project_list" class="jcarousel-skin-tango">
            <?php
				$cnt=1;
				if($result)
				{	
					
					foreach($result as $rs)
					{?>
                    <li style="margin:5px 0 5px 0;padding:0 0 10px 0;">
						<?php 
						$data['site_setting'] = site_setting(); 
						$data['rs'] = $rs;
						$this->load->view('default/common_card',$data);
						$cnt++;?>
						 </li>
			
					<?php }
					    
				}
			?> 
           </ul> 
            
            
            
        </div>
       </div>    
    </div>
	</div>
	<div class="opacitypopup" id="opacitydiv_search" style="display:block"></div>
	
