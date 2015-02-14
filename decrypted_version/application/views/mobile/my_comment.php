<script type="text/javascript" language="javascript">
	function toggle(x){
		if(x.className == 'light1'){
			x.className = 'lightact1';
		}
		else {
			x.className = 'light1';
		}	
	}
	function toggle1(x){
		if(x.className == 'light'){
			x.className = 'lightact';
		}
		else {
			x.className = 'light';
		}	
	}
</script>

<div data-role="header" data-position="inline">
  <h1><?php echo REVIEW_MY_COMMENTS_BELOW;?></h1>
  <?php echo anchor('home','Home','class="ui-btn-right"'); ?> </div>
<div class="pad15">
  <?php if($my_comments){ ?>
  <?php if($my_comments) { 
		foreach($my_comments as $cmt) {?>
  <div data-role="content">
    <div class="content-primary">
      <ul data-role="listview">
        <li>
          <?php 
				echo date($site_setting['date_format'],strtotime($cmt->date_added))." ".AT." ".date("H:i a",strtotime($cmt->date_added))."<br />"; 
				echo ucfirst($cmt->comments)."<br />"; 
				echo ON." ".anchor('projects/'.$cmt->url_project_title.'/'.$cmt->project_id,'<h3>'.$cmt->project_title.'</h3>');
				?>
        </li>
        <BR />
      </ul>
    </div>
  </div>
  <?php }} else { ?>
  <?php echo NO_COMMENT_POST_BY_THIS_MEMBER;?>
  <?php } }?>
</div>
