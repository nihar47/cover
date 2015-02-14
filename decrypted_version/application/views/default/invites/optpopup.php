 <script>
	   	function closebox(){parent.$.fn.colorbox.close();}
       </script>

        <div class="embed_popup">
  	   <div class="embedtop">
       <h2><?php echo OPT_OUT_OF_FOLLOW_FEATURE; ?></h2>
       </div>
       <div class="clear"></div>
       <div class="embedcont">
       <div class="embedconttop">
       <div class="block_code">
         <?php echo YOU_WONT_BE_ABLE_TO_FOLLOW_ANYONE_NO_ONE_CAN_FOLLOW_YOU_YOUR_ACCOUNT_WILL_BE_DISCONNECTED_FROM_ANY_CURRENT_FRIENDS; ?>.<br/>
       </div>  
       <?php //echo $block_user_id;?>     	
       <div class="martop10">
             <?php echo anchor('friends/user_optout/'.$id,I_AM_SURE,'style="float:right;"');?>
             <a href="javascript://" id="cboxcancelbtn" onclick="return closebox();"><?php echo NO_WAY; ?></a>
       </div>
      </div>
</div>
		</div>