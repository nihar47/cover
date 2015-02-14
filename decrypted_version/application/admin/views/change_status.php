


<div align="center">
 <?php
 
 if($msg=='update') {
 
 echo "<script>window.opener.location.reload()</script>";
		echo "<script>window.close()</script>";

}
	$attributes = array('name'=>'frm_changestatus');
	echo form_open('project_category/apply_status',$attributes);
	
	$get_status=mysql_fetch_array(mysql_query("select * from project where project_id='".$id."'"));
	
  ?>
  <br/><br/>
  <input type="hidden" name="project_id" id="project_id" value="<?php echo $id; ?>" />
<select name="status" id="status" >

<?php 


if($status)
{

foreach($status as $st)
{

?>

<option value="<?php echo $st['project_status_id']; ?>" <?php if($get_status['status']==$st['project_status_id']) { ?> selected="selected" <?php } ?> ><?php echo $st['project_status_name'];?></option>
<?php

}

}


?>

</select>
<br/><br/>
<input type="submit" name="Change" value="Change Status" />
</form>

</div>