// JavaScript Document
$(document).ready(function(){
		$('#step-navigation ul li a').click(function(){
			$('#step-navigation ul li').each(function(){
													  $(this).attr('class','');
													  });
			$('.div').each(function(){
													  $(this).attr('style','display:none');
													  });
			var numb = $(this).attr('class');
			$(this).parent().attr('class','selected');
			if(numb == 1)
			{
				$('#step1').fadeIn('slow');	
				$('#cur_tab').html('1. Project Details');
			}
			if(numb == 2)
			{
				$('#step2').fadeIn('slow');	
				$('#cur_tab').html('2. Campaign Details');
						
			}
			if(numb == 3)
			{
				$('#step3').fadeIn('slow');
				$('#cur_tab').html('3. Project Description');
			}
			if(numb == 4)
			{
				$('#step4').fadeIn('slow');	
				$('#cur_tab').html('4. Additional Media');
				
				var myVerticalSlide2 = new Fx.Slide('add_more2');
				myVerticalSlide2.slideIn();
				
			}
			if(numb == 5)
			{
				$('#step5').fadeIn('slow');
				$('#cur_tab').html('5. Perk Addition');
					
				image_valid();
				
				var myVerticalSlide = new Fx.Slide('add_more');
				myVerticalSlide.slideIn();
			}
			
		});
		$('.next_tab').click(function(){
				$('#step-navigation ul li').each(function(){
													  $(this).attr('class','');
													  });
			$('.div').each(function(){
													  $(this).attr('style','display:none');
													  });
			
			var numb = $(this).parent().parent().attr('id');
			$(this).parent().parent().next().fadeIn('slow');
			$(this).parent().parent().fadeOut('slow');
			
			if(numb == "step1")
			{
				$('#step-navigation ul #1').attr('class','');	
				$('#step-navigation ul #2').attr('class','selected');	
				
				$('#cur_tab').html('2. Campaign Details');
				
				
				
			}
			if(numb == "step2")
			{
				$('#step-navigation ul #2').attr('class','');
				$('#step-navigation ul #3').attr('class','selected');	
				$('#cur_tab').html('3. Project Description');
			}
			if(numb == "step3")
			{
				$('#step-navigation ul #3').attr('class','');
				$('#step-navigation ul #4').attr('class','selected');
				$('#cur_tab').html('4. Additional Media');
				
				var myVerticalSlide2 = new Fx.Slide('add_more2');
				myVerticalSlide2.slideIn();
				
			}
			if(numb == "step4")
			{
				$('#step-navigation ul #4').attr('class','');	
				$('#step-navigation ul #5').attr('class','selected');
				$('#cur_tab').html('5. Perk Addition');
				
				image_valid();
				
				var myVerticalSlide = new Fx.Slide('add_more');
				myVerticalSlide.slideIn();
			}
			if(numb == "step5")
			{
				$('#step-navigation ul #5').attr('class','');	
				$('#cur_tab').html('5. Perk Addition');
				
				
				
			}
			
									  });
		
		$('.back_tab').click(function(){
				$('#step-navigation ul li').each(function(){
													  $(this).attr('class','');
													  });
			$('.div').each(function(){
													  $(this).attr('style','display:none');
													  });
			
			var numb = $(this).parent().parent().attr('id');
			$(this).parent().parent().prev().fadeIn('slow');
			$(this).parent().parent().fadeOut('slow');
			
			if(numb == "step2")
			{
				$('#step-navigation ul #2').attr('class','');
				$('#step-navigation ul #1').attr('class','selected');
				$('#cur_tab').html('1. Project Details');
				
				
			}
			if(numb == "step3")
			{
				$('#step-navigation ul #3').attr('class','');
				$('#step-navigation ul #2').attr('class','selected');	
				$('#cur_tab').html('2. Campaign Details');
				
				
			}
			if(numb == "step4")
			{
				$('#step-navigation ul #4').attr('class','');	
				$('#step-navigation ul #3').attr('class','selected');
				$('#cur_tab').html('3. Project Description');
			}
			if(numb == "step5")
			{
				$('#step-navigation ul #5').attr('class','');
				$('#step-navigation ul #4').attr('class','selected');
				$('#cur_tab').html('4. Additional Media');
			}
			
									  });
		
	


});


