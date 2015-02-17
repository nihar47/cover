<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1 class="inner_title dashboard">Dashboard</h1>
<div class="left_section">
	 <!-- Show Overview  -->
    <h1>Overview</h1>
   <div class="nav_listing">
    	
    	<ul>
        	<li><a href='<?php echo Yii::app()->request->baseUrl; ?>/admin?r=page/default/admin'>Pages <span><?php echo Page::model()->count(); ?></span></a></li>
            <li><a href='<?php echo Yii::app()->request->baseUrl; ?>/admin?r=locations/default/admin'>Locations <span><?php echo Locations::model()->count(); ?></span></a></li>
            <li><a href='<?php echo Yii::app()->request->baseUrl; ?>/admin?r=category/default/admin'>Categories<span><?php echo Category::model()->count(); ?></span></a></li>
            <li><a href='<?php echo Yii::app()->request->baseUrl; ?>/admin?r=business/default/admin'>Business Users <span><?php echo Business::model()->count(); ?></span></a></li>
            <li><a href='<?php echo Yii::app()->request->baseUrl; ?>/admin?r=adminUser/default/admin'>Admin Users <span><?php echo AdminUser::model()->count(); ?></span></a></li>
            <li><a href='<?php echo Yii::app()->request->baseUrl; ?>/admin?r=emailFormat/default/admin'>Email Formats <span><?php echo EmailFormat::model()->count(); ?></span></a></li>
         
            
            
        </ul>
    
    </div>
     <!-- Show Overview  -->
</div>

<div class="right_section">
<div class="statstic">
	<h1>Statistics</h1>
    <div class="inner_container">
    	<span>No Statistics right now!</span>
    
    </div>
</div>



</div>


<div class="clear">&nbsp;</div>
<div class="latest_business">
<?php

$sql='SELECT * FROM `trl_business` ORDER BY `trl_business`.`date_added` DESC LIMIT 5 ';
$model=Business::model()->findAllBySql($sql);
	if(count($model) > 0) { ?>
    
     <!-- Show Latest 5 Business  -->
<h1>Latest 5 Business</h1>
<table class="items">
<thead>
<tr>
<th >Owner Name</th><th >Business Name</th><th >E-mail</th><th>Phone</th><th >Registration Date</th><th>Status</th><th>Action</th></tr>
</thead>
<tbody>
		<?php
	     $i=0;		
		 foreach($model as $Business){
			$row =	($i % 2);
			if($row==0)
			 $class = 'odd';
			else
			 $class = 'even';
			 
		  ?>
			<tr class="<?php echo $class;?>">
				<td><?php echo $Business->owner_name ;?></td><td><?php echo $Business->business_name; ?></td><td><?php echo $Business->email; ?></td><td><?php echo $Business->phone; ?></td><td><?php echo Yii::app()->dateFormatter->format("d MMM y",strtotime($Business->date_added)); ?></td><td><?php echo $Business->status; ?></td>
                <td>[ <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin?r=business/default/view&id=<?php echo $Business->business_id ; ?>">View</a> ]</td>
			</tr>
				
	<?php $i++;	} ?>
</tbody>
</table>
  <!-- Show Latest 5 Business  -->        
        
	<?php }
?>
</div>




