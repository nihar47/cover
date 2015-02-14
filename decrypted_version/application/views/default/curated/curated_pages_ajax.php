	
            <?php if($result){
			$cnt=1;
			foreach($result as $res)
			{?>
             	
				<div class="project_card" style="width:150px; height:180px;">
				<?php  $curated_image_url=base_url().'upload/no_img.jpg';
				if($res->curated_image!='') {
					
					if(file_exists(base_path().'upload/curated_thumb/'.$res->curated_image)) {
						$curated_image_url=base_url().'upload/curated_thumb/'.$res->curated_image;
					} else {
					
						if(file_exists(base_path().'upload/curated/'.$res->curated_image)) {
							$curated_image_url=base_url().'upload/curated/'.$res->curated_image;
						}
					}
				}
			 echo anchor('pages/'.$res->url_curated_title,'<img class="p_img" src="'.$curated_image_url.'" alt="" width="150" height="150" title="'.ucwords($res->curated_title).'" />'); 
			 
			 echo anchor('',$res->curated_title,'class="category_name"');
			 
			 
			 // echo anchor('pages/'.$res->url_curated_title,'<img class="p_img" src="'.$curated_image_url.'" alt="" width="150" height="150" title="'.ucwords($res->curated_title).'" />'); 
			 
			 
			 ?></div>
			 <?php	$cnt++;
			 		$offset++;
			 }?>
			   <input type="hidden" id="offset" name="offset" value="<?php echo $offset; ?>"/>
			<?php }?>