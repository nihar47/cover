       <script>
	   	function closebox(){parent.$.fn.colorbox.close();}
       </script>

        <div class="embed_popup">
  	   <div class="embedtop">
       <h2>Delete Project</h2>
       </div>
       <div class="clear"></div>
       <div class="embedcont">
       <div class="embedconttop">
       <div class="block_code">
         Are you sure you want to delete this project? 
       </div>  
       <?php //echo $block_user_id;?>     	
       <div class="martop10">
             <?php echo anchor('start/delete_project/'.$id,'I am sure','style="float:right;"');?>
             <a href="javascript://" id="cboxcancelbtn" onclick="return closebox();">No Way</a>
       </div>
      </div>
</div>
		</div>
		


    
 


