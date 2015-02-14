<script src="<?php echo base_url(); ?>js/mootools-core-1.3-full.js" type="text/javascript"></script> 

<script src="<?php echo base_url(); ?>js/mootools-more-1.3-full.js" type="text/javascript"></script> 

<script src="<?php echo base_url(); ?>js/mootools-art-0.87.js" type="text/javascript"></script>	






<input type="hidden" value="" id="secondary_cat">

			

<div class="lt">

            <div class="wholebox">

             <div class="browsebox">
<div class="catleft">
           <div class="head_porject">

           <!--  <img src="<?php echo base_url();?>images/favourite.png" style="padding-top:10px; padding-left:10px; background-repeat:no-repeat; width:20px; height:20px; float:left;" />-->

           <h2><?php echo FEATURED;?></h2>

           </div> <div class="clr"></div>

           

           <?php 

		$sel_staff_picks='';

		$sel_popular='';

		$sel_launched='';

		$sel_ending_soon='';

		$sel_small_project='';

		$sel_most_funded='';

		$sel_curated='';

		

		

		if($select=='staff_picks') { $sel_staff_picks ='id="active"'; }

		if($select=='sel_popular') { $sel_popular='id="active"'; }

		if($select=='sel_launched') { $sel_launched='id="active"'; }

		if($select=='sel_ending_soon') { $sel_ending_soon='id="active"'; }

		if($select=='sel_small_project') { $sel_small_project='id="active"'; }

		if($select=='sel_most_funded') { $sel_most_funded='id="active"'; }

		if($select=='sel_curated') { $sel_curated='id="active"'; }

		

		

	 ?>

           

           <div class="brwseverticalmenu">

             <ul>

              <!-- <li> <?php echo anchor('discover/recommended/',STAFF_PICKS,'style="text-decoration:none;" '.$sel_staff_picks.'');?></li>-->
  				<li><?php echo anchor('discover/recentlylaunched/',RECENTLY_LAUNCHED,'style="text-decoration:none;" '.$sel_launched.'');?></li>
           	   
            	<li> <?php echo anchor('discover/popular/',POPULARS,'style="text-decoration:none;" '.$sel_popular.'');?></li>
       			
                <li> <?php echo anchor('discover/recommended/',TREND,'style="text-decoration:none;" '.$sel_trend.'');?></li>
                
                <li><?php echo anchor('discover/mostfunded/',MOST_FUNDED,'style="text-decoration:none;"'.$sel_most_funded.'');?><!--ih this successfule displwy change--></li>
                <li><?php echo anchor('discover/endingsoon/',ENDING_SOON,'style="text-decoration:none;"'.$sel_ending_soon.'');?></li>

 <!-- <li><?php echo anchor('discover/smallprojects/',SMALL_PROJECTS,'style="text-decoration:none;"'.$sel_small_project.'');?></li>
               <li><?php echo anchor('curated',CURATED_PAGES,'style="text-decoration:none;"'.$sel_curated.'');?></li>
-->
             </ul>

           </div> 
           </div><div class="clr"></div>

           <div class="catleft">

           <div class="head_porject linedb">

            <!-- <img src="<?php echo base_url();?>images/catrgory.png" style="padding-top:10px; padding-left:10px; background-repeat:no-repeat; width:20px; height:20px; float:left;" />-->

           <h2><?php echo CATEGORIES; ?></h2>

           </div> <div class="clr"></div>

           

           <div class="brwseverticalmenu">

             <ul>

             <?php if($category){foreach($category as $cat){?>
				  <li> <?php 
			   		if($select == $cat->project_category_id){
		   		echo anchor('discover/category/'.$cat->project_category_id,$cat->project_category_name,'id=active');
					}else
					{
					echo anchor('discover/category/'.$cat->project_category_id,$cat->project_category_name);
					}
			
				 if($id > 0)
					{
					 	$catidparent_id = get_catid_parent_id($select);
					}
					else
					{
						$catidparent_id='';
					}
				if($catidparent_id > 0)
					{
						$parentid = get_parent_id($catidparent_id);
					}
					else
					{
						$parentid='';
					}

				if($select == $cat->parent_project_category_id || $catidparent_id == $cat->project_category_id || $parentid == $cat->project_category_id ||($id == $parentid)) 
					{	
						if($select == $catidparent_id && $catidparent_id >0 ){
							$res = get_sub_category($cat->project_category_id);
								if(!empty($res))
								{ ?>
                  
 						<div class="con">
                         	<ul>
                            	<li>
								<?php foreach($res as $rs)
									{
										//echo $rs->parent_project_category_id;

										//if($parentid == $rs->parent_project_category_id){

										if($rs->parent_project_category_id >0 && $select == $rs->project_category_id){

										echo anchor('discover/category/'.$rs->project_category_id.'?parent_id='.$rs->parent_project_category_id,$rs->project_category_name,'id=active class=secondary_menu name='.$rs->project_category_id);

										}else{
										echo anchor('discover/category/'.$rs->project_category_id.'?parent_id='.$rs->parent_project_category_id,$rs->project_category_name,'class=secondary_menu name='.$rs->project_category_id);				}

										//}
								/*	$sub = get_sub_category($rs->project_category_id);
									if(!empty($sub)){
											echo "<ul>";
											foreach($sub as $s){
												//echo "&nbsp; &nbsp; &nbsp;   <li>".anchor('discover/category/'.$s->project_category_id,$s->project_category_name); 
												
												if($s->parent_project_category_id >0 && $select == $s->project_category_id){

										echo anchor('discover/category/'.$s->project_category_id,$s->project_category_name,'id=active');

										}else

										{

										echo anchor('discover/category/'.$s->project_category_id,$s->project_category_name);

										}
												}
												echo "</ul>";
											}*/

									} ?>
									</li>

                            </ul>

                       
					</div>
							<?php	}

							

							?>

					<?php }

					?>

                    

               </li>

			  <?php }}

			  }?>

             </ul>

           </div> 
           </div><div class="clr"></div>

       

          <!-- <div class="head_porject linedb">

             <img src="<?php echo base_url();?>images/city.png" style="padding-top:10px; padding-left:10px; background-repeat:no-repeat; width:20px; height:20px; float:left;" />

           <h2><?php echo CITIES; ?></h2>

           </div> <div class="clr"></div>

           

           <div class="brwseverticalmenu">

                <ul>

                <?php if($city){foreach($city as $ct){

					//$ctnm=explode(",",$ct->project_address);

					

					if($ct->project_city!='' && $ct->project_city!='null' ) {

						if(!is_numeric($ct->project_city)) {

					?>

                <?php if($id==$ct->project_city){ 	?>				

                <li><?php echo anchor('discover/city/'.$ct->project_city,$ct->project_city,'id=active');?></li>

                <?php }else{ ?>

                <li><?php echo anchor('discover/city/'.$ct->project_city,$ct->project_city);?></li>

                <?php } ?>

				

				<?php } }  }}?>

                

                </ul>

			</div>-->

		<div class="clr"></div>

           

           <div>

           <div class="input_srch">

		   <script>

		   	function gotocity(){

				var city_id=document.getElementById('cat_id').value;	

				

				window.location.href="<?php echo site_url('discover/city') ?>/"+city_id+'/'+0;

				

			}

		   </script>

           <?php

				$attributes = array('name'=>'ajaxcity', 'onsubmit'=>'return form_validate()','autocomplete'=>'off');

				echo form_open('',$attributes);

			?>

          	<input type="button" class="search" value=""  onclick="gotocity()"/>

					<input type="text" name="searchprj" id="searchprj" class="input_srch_txt" placeholder="<?php echo SEARCH_FOR_CITY; ?>" onkeyup="autotext();" />

					<!--<input type="text" name="searchprj" id="searchprj" class="input_srch_txt" placeholder="<?php // echo SEARCH_FOR_CITY; ?>" onfocus="remove_text();" onblur="set_text()" onkeyup="autotext();" />-->

					<input type="hidden" name="cat_id" value="" id="cat_id" />

					<input type="hidden" name="searchval" id="searchval" value="<?php echo SEARCH_FOR_CITY; ?>" />

					

					 </form>

					

           </div>

		    

           </div>

	    

            </div><div class="clr"></div>

			<div id="autoc" ></div>

			<div class="clr"></div>

			

            </div>

          </div>

		  

<script type="text/javascript">

	function autotext(){

		var xmlHttp;

		try{

			xmlHttp=new XMLHttpRequest();// Firefox, Opera 8.0+, Safari

		}

		catch (e){

			try{

				xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer

			}

			catch (e){

				try{

					xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");

				}

				catch (e){

					alert("<?php echo NO_AJAX;?>");

					return false;

				}

			}

		}

		xmlHttp.onreadystatechange=function(){

			if(xmlHttp.readyState==4){

				document.getElementById('autoc').innerHTML=xmlHttp.responseText;

				

				if(document.getElementById('srhdiv'))

				{

					var hht = document.getElementById('srhdiv').offsetHeight + 'px';

					document.getElementById('autoc').set('tween', {

						duration: 1000,

						transition: Fx.Transitions.Bounce.easeOut // This could have been also 'bounce:out'

					}).tween('height', hht);

				}else{

					var hht = '0px';

					//document.getElementById('autoc').style.height = '0px';

				}

			}

		}

		var text = document.getElementById('searchprj').value;

		

		xmlHttp.open("GET","<?php echo site_url('discover/ajax_search_city');?>/"+text,true);

		xmlHttp.send(null);

	}

	

	function selecttext(el)

	{

		document.getElementById('searchprj').value = el.innerHTML;

		document.getElementById('cat_id').value =el.id;

		document.getElementById('autoc').set('tween', {}).tween('height', '0px');

		setTimeout(function(){

			el.parentNode.innerHTML = '';

		},500);

		//document.frmsearch.submit();

	}

	

	/*window.addEvent('domready', function(){

		document.getElementById('autoc').set('tween', {}).tween('height', '0px');

	});*/

</script>

	





    <script type="text/javascript" language="javascript">

				function remove_text()

				{

					if(document.getElementById('searchprj').value == "<?php echo SEARCH;?>" || document.getElementById('searchprj').value == "<?php echo PLEASE_ENTER_SEARCH_KEYWORD;?>")

					{

						document.getElementById('searchprj').value = "";

					}

				}

				function set_text()

				{

					if(document.getElementById('searchprj').value == "")

					{

						document.getElementById('searchprj').value = document.getElementById('searchval').value;

					}

				}

				function form_validate()

				{

					if(document.getElementById('searchprj').value == "" || document.getElementById('searchprj').value == "<?php echo SEARCH;?>" || document.getElementById('searchprj').value == "<?php echo PLEASE_ENTER_SEARCH_KEYWORD; ?>")

					{

						document.getElementById('searchprj').value = "<?php echo PLEASE_ENTER_SEARCH_KEYWORD; ?>";

						document.getElementById('searchval').value = "<?php echo PLEASE_ENTER_SEARCH_KEYWORD; ?>";

						return false;

					}else{

						//document.frmsearch.submit();

					}

				}

			</script>
