<div id="content-wrap">

  <div id="page_we" >

    <div id="main">

      <div id="sidebar">

        <div style="height: 230px; width: 400px;">

          <iframe style="width:400px!important; height:230px!important"  src="http://www.youtube.com/embed/pGz9LjDsjRk" frameborder="0" allowfullscreen></iframe>

        </div>

        <p> <?php echo sprintf(EACH_AND_EVERY_KICKSTARTERCLONE_PROJECT_IS_THE_INDEPENDENT_CREATION_OF_SOMEONE_LIKE_YOU,$site_setting['site_name']); ?>! </p>

      </div>

      <!-- #sidebar -->

      <div id="the-pitch">

        <h1><?php echo WE_HELP_PEOPLE; ?> <span class="like-you">(<?php echo LIKE_YOU; ?>!) </span><?php echo FUND_CREATIVE_PROJECTS; ?>.</h1>

        <p><strong><?php echo $site_setting['site_name'].' '. KICKSTARTERCLONE_IS_THE_WORLDS_LARGEST_FUNDING_PLATFORM_FOR_CREATIVE_PROJECTS_EVERY_WEEK_TENS_OF_THOUSANDS_OF_AMAZING_PEOPLE_PLEDGE_MILLIONS_OF_DOLLARS_TO_PROJECTS_FROM_THE_WORLDS_OF; ?><span class="category-1"><?php echo MUSIC; ?></span>, <span class="category-2"><?php echo FILM; ?></span>, <span class="category-3"><?php echo ART; ?></span>, <span class="category-4"><?php echo TECHNOLOGY; ?></span>, <span class="category-5"><?php echo DESIGN ?></span>, <span class="category-6"><?php echo FOOD; ?></span>, <span class="category-7"><?php echo PUBLISHING; ?></span> <?php echo AND_OTHER_CREATIVE_FIELDS; ?></p>

      </div>

      <div id="the-action">

        <p> <?php echo LOOKS_LIKE_YOUVE_ALREADY_STARTED_THE_PROJECTS_BELOW; ?>: </p>

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







       <ul id="started_projects">

          <?php if($draft_project){

		   foreach($draft_project as $dp){?>

          <li class="project" id="box<?php echo $dp->project_id;?>"  onmouseover="showactivitybox('<?php echo $dp->project_id;?>')" >        <div class="thumb" style="width:220px; height:165px;"> 

            <?php if($dp->image !='' && is_file('upload/thumb/'.$dp->image)){?>

 <img src="<?php echo base_url();?>upload/thumb/<?php echo $dp->image; ?>" border="0" width="220" height="165" class="projectphoto-full" alt="Photo-full"/> 

  <?php  }else{ ?>

  	<img src="<?php echo base_url();?>upload/thumb/no_img.jpg" border="0" width="220" height="165" class="projectphoto-full" alt="Photo-full"/> 

  <?php } ?>

           </div>

          <div id="boxhover<?php echo $dp->project_id;?>" style="display:none;"><?php echo anchor('start/create_step1/'.$dp->project_id,'Edit','class="edit_hover" id="editproj"'.$dp->project_id.'""');?></div>

          <div class="meta"> <a class="name" href="<?php echo site_url('start/create_step1/'.$dp->project_id);?>">

			<?php echo substr(ucfirst($dp->project_title),0,20)?></a> <span class="created_at"> Created on <?php echo date($site_setting['date_format'],strtotime($dp->date_added)); ?></span> </div>

            </li>

          <?php }}?>

		  

          <li class="project"><div class="start_project"> <?php echo anchor('start/guideline','Start a new project','class="oresubmit"')?> <a class="school-link" href="<?php echo base_url().'help/school/defining-your-project'?>">How to make an awesome <?php echo $site_setting['site_name'];?> project</a> </div></li>

        </ul>

      </div>

    </div>

    <!-- #main -->

  </div>

  <!-- #content -->

 </div>

