<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js" > </script>
<div class="requests text-center container">
	
    You Have <span class="blue"><?php echo count($not_view_customers); ?> Rating Requests</span>
   
     <?php echo $msg; ?>
  <input type="button" class="btn btn_skyblue pull-right" value="request rating" data-toggle="modal" data-target="#myModal">
</div>
<section class="table_wrapper">
  <div class="container">
    <div class="table-responsive">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
        <thead>
          <tr>
            <th>Date Requested</th>
            <th>Full Name</th>
            <th>Email Address</th>
            <th>Allow Access</th>
            <th>Reminder</th>
            <th>Delete</th>
          </tr>
        </thead>
       	
        <?php if(count($customers) > 0) {
		
		foreach($customers as $key => $requests){
		?>
       
        <tr id="user_id_<?php echo $requests->user_id; ?>">
          <td><?php echo  Yii::app()->dateFormatter->format("M-d-y",strtotime($requests->date_requested));?></td>
          <td><?php echo $requests->full_name; ?></td>
          <td class="text-normal"><?php echo $requests->email_address; ?></td>
          <td id="access_<?php echo $requests->user_id; ?>">
          <?php if($requests->allow_access){ ?>
          	    <span>Access Granted On</span>
            <p><?php echo $requests->access_granted; ?> <?php if($requests->date_posted=='0000-00-00'){ ?> Pending rating <?php } ?></p>
          <?php }else{ ?>
          <input id="<?php echo $requests->user_id; ?>"  type="button" value="grant access" class="btn btn_skyblue" />
          <?php } ?>
          
          </td>
          <td >
          <input type="button" onclick="sendreminderfun(<?php echo $requests->user_id; ?>)" id="" value="send reminder" class="btn btn_blue" />
		  	
		  <div id="sendreminder_<?php echo $requests->user_id; ?>">
          <?php if($requests->last_send_reminder!='0000-00-00'){ ?>
          <em>Last send <?php echo Yii::app()->dateFormatter->format("M-d-y",strtotime($requests->last_send_reminder)); ?></em>
          <?php } ?>
		  </div>
          
          
          </td>
          <td><input id="<?php echo $requests->user_id; ?>" type="button" value="delete" class="btn btn_black" /></td>
        </tr>
        
      
        
        
       <?php } }else{ ?>
       
        <tr>
          <td colspan="6" align="left">No Result</td>
          
        </tr>
       <?php } ?>
      </table>
    </div>
  </div>
</section>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Send A Rating Request To :</h4>
      </div>
      <div class="modal-body">
      
        <form role="form"  class="request_form" method="post" id="request_form" action="<?php echo $this->curpage.'&code='.$this->code; ?>" onsubmit="return rating_request() " >
        	<input type="hidden" name="user" value="yes"/>
          <div class="form-group ">
       		   <div class="row error">
          			 <input  type="text" class="form-control" name="username" id="username" placeholder="Name">
                     <div id="request_form_username" ></div>
         	  </div> 
          </div>
          <div class="form-group ">
          	  <div class="row error">
          		  <input type="text" class="form-control"  name="useremail" id="useremail" placeholder="Email">
                  <div id="request_form_useremail"></div>
          	  </div>
          </div>
          <div class="form-group text-center">
            <input type="submit" id="reating_request" class="btn btn_skyblue" value="Send Request" >
          </div>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/ecmascript">
function sendreminderfun(id) {
 var contentPanelId = id;
  if (confirm("Are you sure you want to send reminder this request?")) {
					// your reminder code
					  $.ajax(
					{
						url : '<?php echo Yii::app()->createAbsoluteUrl("BusinessUser").'/'.Yii::app()->getController()->getAction()->controller->id.'/sendreminder&code='.$this->code; ?>',
						type: "POST",
						data : "id="+contentPanelId,
						success:function(data, textStatus, jqXHR)
						{	
							$( "#sendreminder_"+contentPanelId).html(data);
							
							
						},
						error: function(jqXHR, textStatus, errorThrown)
						{
							alert('error')
						}
					});
					
					
				}
				return false;
 
		
}


	$(document).ready(function(){
	
		
		
		$("#request_form").validate({
			rules : {
			"username":{
			required:true
			},
			"useremail":{
			required:true,
			email:true	
			}
			}
		});
	
	
	
		$(".btn_black").click(function(){
 				var contentPanelId = jQuery(this).attr("id");
   				 
				 if (confirm("Are you sure you want to delete this request?")) {
					// your deletion code
					  $.ajax(
					{
						url : '<?php echo Yii::app()->createAbsoluteUrl("BusinessUser").'/'.Yii::app()->getController()->getAction()->controller->id.'/delrequest&code='.$this->code; ?>',
						type: "POST",
						data : "id="+contentPanelId,
						success:function(data, textStatus, jqXHR)
						{
							$( "#user_id_"+contentPanelId ).remove();
						},
						error: function(jqXHR, textStatus, errorThrown)
						{}
					});
					
					
				}
				return false;
		});
		
		$(".btn_skyblue").click(function(){
				var contentPanelId = jQuery(this).attr("id");
				  $.ajax(
					{
						url : '<?php echo Yii::app()->createAbsoluteUrl("BusinessUser").'/'.Yii::app()->getController()->getAction()->controller->id.'/access&code='.$this->code; ?>',
						type: "POST",
						data : "id="+contentPanelId,
						success:function(data, textStatus, jqXHR)
						{	
							
							$( "#access_"+contentPanelId ).html(data);
						},
						error: function(jqXHR, textStatus, errorThrown)
						{
							
						}
					});
			
		});
		
		
			
		
		
		
		
	
		
	
	});
	
	
	
	
	
</script>
