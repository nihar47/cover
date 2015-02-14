<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Chain Responsive Bootstrap3 Admin</title>

        <link href="css/style.default.css" rel="stylesheet">
        <link href="css/morris.css" rel="stylesheet">
        <link href="css/select2.css" rel="stylesheet" />
        <link href="css/style.calendar.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        
		<?PHP include("includes/header.php"); ?>
                
        <section>
            <div class="mainwrapper">
                <?PHP include("includes/left_section.php"); ?>
                
                <div class="mainpanel">
                    <div class="contentpanel">
                    <div class="row">
                            <div class="col-md-12">
                                <!-- Nav tabs -->
                                <!--<ul class="nav nav-tabs">
                                    <li class="active"><a href="#quote" data-toggle="tab"><strong>Quotes</strong></a></li>
                                    <li><a href="#company" data-toggle="tab"><strong>Companies</strong></a></li>
                                    <li><a href="#contact" data-toggle="tab"><strong>Contacts</strong></a></li>
                                    <li><a href="#site" data-toggle="tab"><strong>Sites</strong></a></li>
                                    <li><a href="#building" data-toggle="tab"><strong>Buildings</strong></a></li>
                                    <li><a href="#listitem" data-toggle="tab"><strong>ListItems</strong></a></li>
                                </ul>-->
                                
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="quote_summary.php"><strong>Quotes</strong></a></li>
                                    <li><a href="company_quotes.php"><strong>Companies</strong></a></li>
                                    <li><a href="quote_contact.php"><strong>Contacts</strong></a></li>
                                    <li><a href="quote_sites.php"><strong>Sites</strong></a></li>
                                    <li><a href="quote_buildings.php"><strong>Buildings</strong></a></li>
                                    <li><a href="quote_listItem.php"><strong>ListItems</strong></a></li>
                                </ul>
        
                                <!-- Tab panes -->
                                <div class="tab-content mb30">
                                    <div class="tab-pane active" id="home">
                                        <div class="mb20"></div>
                                        
                                        <div class="row">
                            <div class="col-md-12">
                                <div id="calendar"></div>
                            </div><!-- col-md-9 -->
                        </div>
                                         
                            <div class="clearfix"></div>                                     
                                    </div><!-- tab-pane -->
                                    
                                </div><!-- tab-content -->
                                
                            </div>
                            
                        </div>
                    </div><!-- contentpanel -->
                    
                </div><!-- mainpanel -->
            </div><!-- mainwrapper -->
        </section>


        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/retina.min.js"></script>
        <script src="js/jquery.cookies.js"></script>
        
        <script src="js/jquery-ui-1.10.3.min.js"></script>
        <script src="js/moment.min.js"></script>
        <script src="js/fullcalendar.min.js"></script>
        <script src="js/jquery.ui.touch-punch.min.js"></script>

        <script src="js/custom.js"></script>
        <script>
            jQuery(document).ready(function() {
                    
                /* initialize the external events */  
                jQuery('#external-events div.external-event').each(function() {
                          
                    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    };
                                  
                    // store the Event Object in the DOM element so we can get to it later
                    jQuery(this).data('eventObject', eventObject);
                                  
                    // make the event draggable using jQuery UI
                    jQuery(this).draggable({
                        zIndex: 999,
                        revert: true,      // will cause the event to go back to its
                        revertDuration: 0  //  original position after the drag
                    });
                });
                  
                  
                /* initialize the calendar */  
                jQuery('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    editable: true,
                    droppable: true, // this allows things to be dropped onto the calendar !!!
                    drop: function(date, allDay) { // this function is called when something is dropped
                                  
                        // retrieve the dropped element's stored Event Object
                        var originalEventObject = jQuery(this).data('eventObject');
                                          
                        // we need to copy it, so that multiple events don't have a reference to the same object
                        var copiedEventObject = $.extend({}, originalEventObject);
                                          
                        // assign it the date that was reported
                        copiedEventObject.start = date;
                        copiedEventObject.allDay = allDay;
                                          
                        // render the event on the calendar
                        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                        jQuery('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
                                          
                        // is the "remove after drop" checkbox checked?
                        if (jQuery('#drop-remove').is(':checked')) {
                            // if so, remove the element from the "Draggable Events" list
                            jQuery(this).remove();
                        }  
                    }
                });    
            });
          
          </script>
    </body>
</html>
