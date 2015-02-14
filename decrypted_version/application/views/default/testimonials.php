<div id="testimonials_outer" >
<?php foreach($list_testimonials as $list_tst){?>
   <div class="list_outer" >
    <!-- <div class="title">
         <span class="title_name"><?php echo $list_tst->title; ?></span>
        
     </div>-->
   <div class="desc">&quot;<?php echo $list_tst->description; ?>&quot;</div>
    <span class="author">- <?php echo $list_tst->author; ?></span>
   </div>
<?php }?>

<div class="mess_cont_top_right"><?php echo $links;  ?></div>
</div><!--#testimonials_outer -->

