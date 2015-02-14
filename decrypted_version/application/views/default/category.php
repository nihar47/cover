<div class="rightcol">	





<ul id="posts" class="quicklinks">
	 
		 <h2><?php echo BROWSE_BY; ?></h2>
	  
	   <li class="sidelinks">
		  <?php echo anchor('search/popular/',POPULARS,'style="text-decoration:none;"');?>			   
		  </li>

			<li class="sidelinks">
		  <?php echo anchor('search/ending_soon/',ENDING_SOON,'style="text-decoration:none;"');?>			   
		  </li>
		  
		  <li class="sidelinks">
		  <?php echo anchor('search/small_projects/',SMALL_PROJECTS,'style="text-decoration:none;"');?>			   
		  </li>
		  
		  <li class="sidelinks">
		  <?php echo anchor('search/successful/',SUCCESSFUL,'style="text-decoration:none;"');?>			   
		  </li>
		  
		  
		  
		 
		  
		  
		
</ul>
<br />



	<ul id="posts" class="quicklinks">
	 
		 <h2><?php echo anchor('search/',BROWSE_RESULTS,'style="color:#ffffff;"'); ?></h2>
	  
 <?php			if($category)
				{
					foreach($category as $cat)
					{
						
			?>
			<li class="sidelinks">
		  <?php echo anchor('search/category/'.$cat->project_category_id,'<span>'.$cat->project_category_name.'</span>','style="text-decoration:none;"');?>			   
		  </li>
		<?php		}
				}
			?>
</ul>
<br />

<ul class="quicklinks">
	<h2><?php echo FUND_RAISING_IDEAS; ?></h2>
	
	<?php if($idea) {
	 
	 
	 
	 foreach($idea as $ideas) { ?>
	 
	<li id="idea_li" style="background:none;padding-left:20px;">	  
		  <?php if(is_file('upload/idea_thumb/'.$ideas->idea_image)) { ?>
		  <img src="<?php echo base_url(); ?>upload/idea_thumb/<?php echo $ideas->idea_image; ?>" alt="" width="58" height="56" />
		  <?php } ?>
        
        <div class="right-fundraising-ideas">
          <p class="idea_title"><?php echo $ideas->idea_name; ?>  </p>
          <p class="idea_desc"><?php echo $ideas->idea_description; ?></p>
        </div>
		
       </li>
      
	  <?php } 
	  
	 			  } ?>
</ul>
</div> 