<script>
	$(document).ready(function(){
		$('.stepname').mouseover(function(){
			
			$('.stepname h2').addClass('h2hover');
		});
		$('.stepname').mouseout(function(){
			$('.stepname h2').removeClass('h2hover');
			$('.stepname h2').addClass('h2normal');
		});
	});
</script>
<ul class="stepul">
      <li>
            	<a href="#">
                	<div class="stepname">
				<table align="center"><tr><td align="center">
                    	<h1>Guidelines</h1></td></tr>
                        <tr><td>
                        <h2 class="h2normal">1</h2></td></tr></table>
                    </div>
                </a>
            </li>  
      <li> <a href="#">
        <div class="incompletestep">
          <table align="center">
            <tr>
              <td align="center"><h1>Basics</h1></td>
            </tr>
            <tr>
              <td><h2>2</h2></td>
            </tr>
          </table>
        </div>
        </a> </li>
      <li> <a href="#">
        <div class="incompletestep">
          <table align="center">
            <tr>
              <td align="center"><h1>Perks</h1></td>
            </tr>
            <tr>
              <td><h2>3</h2></td>
            </tr>
          </table>
        </div>
        </a> </li>
      <li> <a href="#">
        <div class="incompletestep">
          <table align="center">
            <tr>
              <td align="center"><h1>Project Details</h1></td>
            </tr>
            <tr>
              <td><h2>4</h2></td>
            </tr>
          </table>
        </div>
        </a> </li>
      <li> <a href="#">
        <div class="incompletestep">
          <table align="center">
            <tr>
              <td align="center"><h1>Project Team</h1></td>
            </tr>
            <tr>
              <td><h2>5</h2></td>
            </tr>
          </table>
        </div>
        </a> </li>
      <li> <a href="#">
        <div class="incompletestep">
          <table align="center">
            <tr>
              <td align="center"><h1>Account Details</h1></td>
            </tr>
            <tr>
              <td><h2>6</h2></td>
            </tr>
          </table>
        </div>
        </a> </li>
      <li> <a href="#">
        <div class="incompletestep">
          <table align="center">
            <tr>
              <td align="center"><h1>Review</h1></td>
            </tr>
            <tr>
              <td><h2>7</h2></td>
            </tr>
          </table>
        </div>
        </a> </li>
      <li style="margin-right:0;"> <a href="#">
        <div class="incompletestep">
          <table align="center">
            <tr>
              <td align="center" style="padding: 0 0 5px;margin-top: 10px;"><img src="images/eye.png" alt="" class="aimg" style="margin-top: 10px;" /></td>
            </tr>
            <tr>
              <td><h2>8</h2></td>
            </tr>
          </table>
        </div>
        </a> </li>
    </ul>