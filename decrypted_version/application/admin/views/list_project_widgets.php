 
 
     
     <?php $CI =& get_instance();	$base_url = $CI->config->slash_item('base_url_site');   ?>
	
    
    <div id="con-tabs"> 
    
    
     <ul>
            <li><span style="cursor:pointer;"><?php echo anchor('project_category/widgets/'.$pid,'Widgets','id="sp_2" style="color:#364852;background:#ececec;"'); ?></span></li>
          </ul>
    
    
    <div id="text">  
 
 
 
 <div align="center" style="float:left; margin-left:350px;">
 
 <textarea name="area1"   style=" height:80px; width:500px;padding: 20px;-moz-border-radius: 8px;-webkit-border-radius: 8px;background: #FAFAFA;border: 1px solid lightGrey;"  readonly="readonly"><div id='widgets'></div><script src='<?php echo $base_url; ?>project/widgets_code/s/red/<?php echo $pid; ?>' type='text/javascript'></script></textarea>
 
 </div>
 
 
 
 
 
 </div></div>