<div id="testimonials_outer" >
  <?php foreach($list_faq as $list_faq_detail){?>
  <div class="list_outer" >
    <div class="desc">Question ? <?php echo $list_faq_detail->question?></div>
    <span class="answer">Answer : <?php echo $list_faq_detail->answer?></span> </div>
  <?php }?>
  <div class="faq_from">
    <h1>Ask a Question</h1>
  <?php //print_r($_POST);?>
     <form name="frmFaq" <?php echo $_SERVER["REQUEST_URI"]?> method="post" >
     
       <?php 
				 
					if($error != ""){?><div id="msg" align="center" class="error"><ul><?php echo $error; ?></ul></div><?php }
					if($success!=""){?><div id="msg" align="center" class="error"><ul><?php echo $success; ?></ul></div><?php //echo anchor('home/login/');
					}
					
					if($temp_msg == 'success') {?>
					 <script type="text/javascript">
               $(document).ready(function(){			 
				 $.colorbox({
					 width:"50%", 
					 inline:true, 
					 href:"#title_form2",
					 onCleanup:function()
					 {					 
					  window.location.href = "<?php echo base_url(); ?>home/index";
					  }
					 });			 
			});
		
</script>
     				<?php }?>
     
     
      <div style='display:none'>
              <div id='title_form2' style='padding:10px; background:#fff;'>
                <p style="color:#84C200; text-align:center; font-size:14px; font-weight:bold;"><?php echo "Thank you. We will have an answer for you soon."; ?></strong></p>                
              </div>
            </div> 
     
     
     
     
     <label>Select Category</label>
      <SELECT id="Category" name="Category">
		  <OPTION value="">---Select Category---</OPTION>
          <?php
				foreach($list_faq_catergory as $p)
				{
					if($p->parent_id == '0')
					{
		?>
        <optgroup label="---<?php echo $p->faq_category_name; ?>---"></optgroup>
			<?php		
				}else{
			?>
            
            <option value="<?php echo $p->faq_category_id; ?>" <?php if($p->faq_category_id == $faq_category_id){ echo "selected"; } ?>><?php echo $p->faq_category_name; ?></option>
				<?php		
					}
				}
				?>
						 </select>
                         
          
   

  
    <label>Email ID</label>
    <input type="text"  placeholder="Your email address..." id="emailid" name="emailid" value="<?php echo $email; ?>">
    <label>Your Question</label>
    <textarea placeholder="Question" id="question" name="question"></textarea>
    <input type="submit"  value="Submit"  class="oresubmit1">
  </div>
  
  <!--<div class="mess_cont_top_right"><?php echo $links;  ?></div>--> 
</div>
<!--#testimonials_outer --> 

