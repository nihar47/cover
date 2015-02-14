<div id="content-wrap">

  <div id="page_we" >
      <h1 class="start-h1">Start Your Own Project</h1>
    <div id="main">

      <div id="the-pitch">
        <p><?php echo WE_HELP_PEOPLE; ?> <span class="like-you">(<?php echo LIKE_YOU; ?>!) </span><?php echo FUND_CREATIVE_PROJECTS; ?>.</p>
        <p><strong><?php echo $site_setting['site_name'].' '. START_PROJECT_MESSAGE; ?><span class="category-2"><?php echo FILM; ?></span></p>
      </div>
      <div id="sidebar">
        <div>
          <iframe style="width:400px!important; height:230px!important"  src="http://www.youtube.com/embed/pGz9LjDsjRk" frameborder="0" allowfullscreen></iframe>
        </div>
        <p> <?php echo sprintf(EACH_AND_EVERY_KICKSTARTERCLONE_PROJECT_IS_THE_INDEPENDENT_CREATION_OF_SOMEONE_LIKE_YOU,$site_setting['site_name']); ?>! </p>
      </div>
      <div class="clr"></div>
      
      <!-- #sidebar -->
      
      <div id="the-action"> 
        <script type="text/javascript">

function showactivitybox(id)

{   

	$('#box'+id).mouseover(function(){

		$("#boxhover"+id).show();

		$('#box'+id+' img').css('opacity',0.4);

		$('#box'+id+' img').css('cursor','pointer');

	});

	$('#box'+id).mouseout(function(){

		$("#boxhover"+id).hide();

		$('#box'+id+' img').css('opacity',1.0);

	});

}

</script>

        <h1> <?php echo LOOKS_LIKE_YOUVE_ALREADY_STARTED_THE_PROJECTS_BELOW; ?>: </h1>
        <ul id="started_projects">
          <?php if($draft_project){
			$i=1;
			$state = TRUE;
		   foreach($draft_project as $dp){
			  ?>
     <li  class="<?php if ($i % 4 == 0) {echo "project last";  }else{ echo "project"; } ?>" id="box<?php echo $dp->project_id;?>"  onmouseover="showactivitybox('<?php echo $dp->project_id;?>')" >
            <div class="thumb">
              <?php if($dp->image !='' && is_file('upload/thumb/'.$dp->image)){?>
              <img src="<?php echo base_url();?>upload/thumb/<?php echo $dp->image; ?>" border="0"  class="projectphoto-full" alt="Photo-full"/>
              <?php  }else{ ?>
              <img src="<?php echo base_url();?>upload/thumb/no_img.jpg" border="0" class="projectphoto-full" alt="Photo-full"/>
              <?php } ?>
            </div>
            <div id="boxhover<?php echo $dp->project_id;?>" style="display:none;"><?php echo anchor('start/create_step1/'.$dp->project_id,'Edit','class="edit_hover" id="editproj"'.$dp->project_id.'""');?></div>
            <div class="meta"> <a class="name" href="<?php echo site_url('start/create_step1/'.$dp->project_id);?>"> <?php echo substr(ucfirst($dp->project_title),0,20)?></a> <span class="created_at"> Created on <?php echo date($site_setting['date_format'],strtotime($dp->date_added)); ?></span> </div>
          </li>
          <?php  $i++;}}?>
          
          <!--<li class="project"></li>-->
          
        </ul>
        <div class="start_project"> <?php echo anchor('start/guideline','Start a new project','class="oresubmit"')?><br />
        <!--  <a class="school-link" href="<?php echo base_url().'help/school/defining-your-project'?>">How to make an awesome <?php echo $site_setting['site_name'];?> project</a>--> </div>
      </div>
    </div>
    
    <!-- #main --> 
    
  </div>
  
  <!-- #content --> 
  
</div>
