<?php

			$connection = Yii::app()->db; 
/*
All Business Tyeps
*/
			$categories = "SELECT name FROM {{category}}";
			$BusinessTypesResult  = $connection->createCommand($categories)->queryAll();
			$BusinessTypesHeader = array();			
			if(isset($BusinessTypesResult) && count($BusinessTypesResult) > 0 ) { 
				for($i=0;$i<count($BusinessTypesResult);$i++) {
					$BusinessTypesHeader[] = $BusinessTypesResult[$i]['name'];
				 }
			}	 
			$BusinessTypesHeader = json_encode($BusinessTypesHeader);

/*
All Business Locations
*/			
			$locations = "SELECT * FROM {{locations}}";
			$BusinessLocationsResult  = $connection->createCommand($locations)->queryAll();
			$BusinessLocationsHeader = array();
			if(isset($BusinessLocationsResult) && count($BusinessLocationsResult) > 0 ) { 
				for($i=0;$i<count($BusinessLocationsResult);$i++) {
				$BusinessLocationsHeader[] = $BusinessLocationsResult[$i]['city'].", ".$BusinessLocationsResult[$i]['state_cc']." ".$BusinessLocationsResult[$i]['zip']; 
				  } 
			}
			$BusinessLocationsHeader = json_encode($BusinessLocationsHeader);
?>

<script>	

/*****************************
Onclick button page redirect
******************************/

	
function redirectToListYourBusiness(Redirect_URL) {
window.location = Redirect_URL;
}

/*****************************
Header business search pop up
******************************/


$(document).ready(function(){
	$(".inner_search_form").hide();
	$(".search_form a").show();
	
	$('.search_form a').click(function(){
	$(".inner_search_form").slideToggle();
	});
	
	$('.search_form a').on('mouseenter', function() {
	        $(this).addClass('active');
	    });
	
});



/*****************************
var BusinessTypsHeader is array
of all business categories
******************************/

				// All Business Types
				var BusinessTypsHeader = '<?php echo $BusinessTypesHeader; ?>';
				BusinessTypsHeader = JSON.parse(BusinessTypsHeader);
				
						 
/*****************************
var LocationsHeader is array
of USA Locations with format
e.g . city, state_cc, zip
******************************/
				 
				// All Business Location
				var LocationsHeader = '<?php echo $BusinessLocationsHeader; ?>';
				LocationsHeader = JSON.parse(LocationsHeader);
		

/*****************************
Apply Categories and locations 
to with resp. to textbox
******************************/
					 
$(document).ready(function(){
				 
				$( "#BusinessTypsHeader" ).autocomplete({
				source: function(request, response) {
						var results = $.ui.autocomplete.filter(BusinessTypsHeader, request.term);
						response(results.slice(0, 10));
						}
				});


			

				$( "#BusinessLocationHeader" ).autocomplete({
				source: function(request, response) {
						var resultsLoc = $.ui.autocomplete.filter(LocationsHeader, request.term);
						response(resultsLoc.slice(0, 10));
						}
				});
				
				
				$( "#BusinessTypes" ).autocomplete({
				source: function(request, response) {
						var results = $.ui.autocomplete.filter(BusinessTypsHeader, request.term);
						response(results.slice(0, 10));
						}
				});


				$( "#BusinessLocation" ).autocomplete({
				source: function(request, response) {
						var resultsLoc = $.ui.autocomplete.filter(LocationsHeader, request.term);
						response(resultsLoc.slice(0, 10));
						}
				});



});


function findWord(word) {
    return -1 < BusinessTypsHeader.map(function(item) { return item.toLowerCase(); }).indexOf(word.toLowerCase());
}
  


/*****************************
form submit on header section
business search form
******************************/

function SearchBusinessHeader() {
var BusinessTypeValue = $('#BusinessTypsHeader').val();
var BusinessLocation = $('#BusinessLocationHeader').val();
var BusinessTypeBool = findWord(BusinessTypeValue);
		
		if(! BusinessTypeBool || LocationsHeader.indexOf(BusinessLocation)==-1) {
			alert("TYPE SLOWLY, TO GET LIST OF BUSINESS TYPES & LOCATIONS, SELECT ONLY AUTO SUGGESTED VALUE");
			return false;
		} else {
			document.forms["BusinessSearchFrmHeader"].submit();
		}
}
 
/*****************************
form submit on home middle section
business search form
******************************/

 
function SearchBusiness() {
var BusinessTypeValue = $('#BusinessTypes').val();
var BusinessLocation = $('#BusinessLocation').val();
var BusinessTypeValueBool = findWord(BusinessTypeValue);
		
		if(! BusinessTypeValueBool || LocationsHeader.indexOf(BusinessLocation)==-1 ) {
			alert("TYPE SLOWLY, TO GET LIST OF BUSINESS TYPES & LOCATIONS, SELECT ONLY AUTO SUGGESTED VALUE");
			return false;
		} else {
			document.forms["BusinessSearchFrm"].submit();
		}
} 
 
 
 
function handleEnter(inField, e) {
var charCode;
//Get key code (support for all browsers)
if(e && e.which){
    charCode = e.which;
}else if(window.event){
    e = window.event;
    charCode = e.keyCode;
}


   
   
if(charCode == 13) {
alert('ets');
   //Call your submit function
}
}
 
</script>
