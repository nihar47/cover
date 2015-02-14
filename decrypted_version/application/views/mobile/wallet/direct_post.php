

 <style>

        fieldset {

            overflow: auto;

            border: 0;

            margin: 0;

            padding: 0; }



        fieldset div {

            float: left;

			margin-left:15px; }



        fieldset.centered div {

            text-align: center; }

		h4{

		font-family:Tahoma, Geneva, sans-serif;

		color:#F00;

		

		}

        label {

            color: #183b55;

            display: block;

            margin-bottom: 5px; }



        label img {

            display: block;

            margin-bottom: 5px; }



        input.text {

            border: 1px solid #bfbab4;

            margin: 0 4px 8px 0;

            padding: 6px;

            color: #1e1e1e;

            -webkit-border-radius: 5px;

            -moz-border-radius: 5px;

            border-radius: 5px;

            -webkit-box-shadow: inset 0px 5px 5px #eee;

            -moz-box-shadow: inset 0px 5px 5px #eee;

            box-shadow: inset 0px 5px 5px #eee; }

       

        </style>

   <div id="headerbar">

	<div class="wrap930">

	

	<!-- dd menu -->	

<div class="login_navl">

					

			

		<table border="0" cellpadding="0" cellspacing="0" width="100%">

		<tr><td align="left" >	

	<div class="project_title_hd" style="padding-top:15px;" >

	

	

	<span style="text-transform:capitalize;color:#2B5F94;font-size:17px;"><?php echo MANAGE_WALLET_BELOW; ?></span>

    

	

	</div>

	</td>

	<td align="right" >	

	

	<div class="project_title_hd" style="padding-top:15px; "  >

	<span id="sddm" style="float:right;"></span>

	</div>



</td></tr></table>



		  </div> 

		      

		<div class="clear"></div>

	</div>

</div>	

<div id="container">

<div class="wrap930" style="padding:15px 0px 20px 0px;">	



<!--side bar user panel-->



<?php echo $this->load->view('dashboard_sidebar'); ?>



<!--side bar user panel-->





<div class="con_left2" style="min-height:0px; width:690px; margin-right:0px;">

			

			

			

		

		

		

		<style type="text/css">



#tab_all a{ color:#000000; text-decoration:none; }



</style>				



<?php

	$data['tab_sel'] = WALLET;

	$this->load->view('dashboard_tabs',$data);



?>



<div class="inner_content" style=" margin-top:11px;padding:12px; ">

		<h3 id="dropmenu2">

		

		<span style="float:left;"><?php echo PLEASE_FILL_YOUR_DETAILS; ?></span>

		

		

		 <span style="float:right; height:35px;  font-size:12px;">

			  <table border="0" cellpadding="0" cellspacing="0">

			  <tr>

			 

			 <td align="right" valign="top"><?php echo anchor('wallet/my_wallet',MY_WALLET.'('.set_currency($total_wallet_amount).')','style="font-weight:bold; color:#009900;font-size:13px !important;"');?></td>

			   <td width="10">&nbsp;|&nbsp;</td>

			 <td align="right" valign="top"><?php echo anchor('wallet/my_withdraw',MY_WITHDRAWAL,'style="font-weight:bold; color:#009900;font-size:13px !important;"');?></td>

			 

			 <?php if($total_wallet_amount>$wallet_setting->wallet_minimum_amount) { ?>

			  <td width="10">&nbsp;|&nbsp;</td>

			 <td align="right" valign="top"><?php echo anchor('wallet/withdraw_wallet',WITHDRAW_AMOUNT,'style="font-size:13px !important; color:#009900;"');?></td>

			 <?php } ?>

			 

			 </tr>

			 </table>

			 

			 </span>

			 

		</h3>

		

		

		







			<?php if($error!='') { ?> <div style="clear:both; margin-top:20px;"></div><div align="center" class="error" style="text-align:center;"> <?php echo $error; ?></div><?php } ?>

			

			

        <div style="width:520px;margin:50px auto;">

         

        <?php

				  		$attributes = array('name'=>'frm_directpost');

						echo form_open_multipart('wallet/auth_net_aim/'.$pid.'/'.$amount,$attributes);

					

				  	?>

               

            <fieldset>

                <div>

                    <label class="normal_label"><?php echo CREDIT_CARD_NUMBER; ?></label>

                    <input type="text" class="btn_input" size="25" name="x_card_num" id="x_card_num"></input>

                </div>

                <div>

                    <label class="normal_label"><?php echo EXPIRE_DATE; ?></label>

                    <input type="text" class="btn_input" size="15" name="x_exp_date" ></input>

                </div>

                <div>

                    <label class="normal_label"><?php echo CCV; ?></label>

                    <input type="text" class="btn_input" size="15" name="x_card_code" ></input>

                </div>

            </fieldset><br />

            <fieldset>

                <div>

                    <label class="normal_label"><?php echo FIRST_NAME; ?></label>

                    <input type="text" class="btn_input" size="32" name="x_first_name" ></input>

                </div>

                <div>

                    <label class="normal_label"><?php echo LAST_NAME; ?></label>

                    <input type="text" class="btn_input" size="31" name="x_last_name" ></input>

                </div>

            </fieldset><br />

            <fieldset>

                <div>

                    <label class="normal_label"><?php echo ADDRESS; ?></label>

                    <input type="text" class="btn_input" size="38" name="x_address" ></input>

                </div>

                <div>

                    <label class="normal_label"><?php echo CITY ;?></label>

                    <input type="text" class="btn_input" size="25" name="x_city" ></input>

                </div>

            </fieldset><br />

            <fieldset>

                <div>

                    <label class="normal_label"><?php echo STATE ;?></label>

                    <input type="text" class="btn_input" size="15" name="x_state" ></input>

                </div>

                <div>

                    <label class="normal_label"><?php echo ZIP_CODE ;?></label>

                    <input type="text" class="btn_input" size="17" name="x_zip" ></input>

                </div>

                <div>

                    <label class="normal_label"><?php echo COUNTRY ;?></label>

                    <input type="text" class="btn_input" size="23" name="x_country" ></input>

                </div>

            </fieldset>

            <fieldset>

            <div style="margin-left:40px">

             <label>&nbsp;</label>

             

            <input type="submit" value="<?php echo PAY; ?>" class="submit">

            </div></fieldset>

        </form>

		

		

		</div>



 

				 

				  <div style="clear:both;"></div>

				 

				

</div>





	</div>

			

			

				

				<div class="clear"></div>		



			

	</div>

	<!-- left end ------>

		

       </div>

</div>

</div>       			

				

		