<div data-role="header" data-position="inline">
	<h1>Projects</h1>
	<?php echo anchor('home','Home','class="ui-btn-right"'); ?>
</div>
<div class="pad15">
    <!--<ul data-divider-theme="d" data-theme="d" data-inset="true" data-role="listview" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
    
         
		 <li data-theme="d" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-corner-bottom ui-btn-up-d <?php //if($msg != 'new') { echo 'ui-btn-active '; } ?>"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><?php echo anchor('task/tasks','Top Tasks','class="ui-link-inherit"');?></div><span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div></li>	
         
         <li data-theme="d" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-corner-bottom ui-btn-up-d <?php //if($msg == 'new') { echo 'ui-btn-active '; } ?>"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><?php echo anchor('task/tasks/new','Newest','class="ui-link-inherit"');?></div><span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div></li>

    </ul>-->	

	<div data-role="content">
		<div class="content-primary">	
            <ul data-role="listview">
            
            <?php 
                if($result){
                foreach($result as $rs){ 					
                    
                    $strlen_name = strlen($rs->project_title);
                    if($strlen_name > 50) { $project_name = substr($rs->project_title,0,50).' ...';}
                    else { $project_name = $rs->project_title;} 					
                    
                                            
                    $project_description= $rs->project_summary;
                    $project_description=str_replace('KSYDOU','"',$project_description);
                    $project_description=str_replace('KSYSING',"'",$project_description);
        
                    $strlen = strlen($project_description);
                    if($strlen > 70) { $description = substr($project_description,0,70).' ...';}
                    else { $description = $project_description; } 								      
            ?>
                <li><?php 
				$str_name = substr(ucfirst($rs->project_title),0,20);
				echo anchor('projects/'.$rs->url_project_title.'/'.$rs->project_id,'<h3>'.ucfirst($project_name).'</h3><p>'.$description.'</p>');?></li>
            <?php } } ?>
            
            </ul>
		</div>  
	</div>
	
	<div id="" class="column">
    <div class="clear"></div>
    <?php if($total_rows>10) { ?>
        <div class="gonext">
        <?php echo $page_link; ?>
        </div>
    <?php } ?>
    

</div>

		
