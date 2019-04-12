<html>
<head>
	<title>Range slider</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
<p class="padl-45">
<label for="year">Year Built:
<input type="text" id="year" name="year_built"  style="border:0; color:#f6931f; font-weight:bold;margin-top: 10px;"></label>
</p>
<div id="year-range" class="three-fourth column"></div> 

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function(){
$( function() {
jQuery( "#year-range" ).slider({
      range: "max",
      min: 0,
      max: 15000,
      value: 1,
      slide: function( event, ui ) {
        $( "#year" ).val(ui.value);
      }
    });
jQuery( "#year" ).val($( "#year-range" ).slider( "value" ) );

   } );

$("#year").change(function () {
	var n = $.trim($(this).val());
	console.log(n);
    //jQuery( "#year-range" ).slider("value", parseInt(n));
     $("#year-range").slider('values',1,n);
});


	
});
</script>

</body>
</html>