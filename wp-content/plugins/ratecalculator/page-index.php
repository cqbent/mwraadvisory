<style>
.ui-slider .ui-slider-handle {
    width: 2.2em!important;
    height: 1.8em!important;
}
.ui-widget.ui-widget-content {
    overflow-x: inherit!important;
    overflow-y: inherit!important;
}
#dataTable td:nth-child(2), #dataTable td:nth-child(3) {
    text-align: left!important;
    width:31%;
}
button.btn-wide, #mapControl button {
    width: auto!important;
    margin-top: 5px;
}
button.btn-TorCo-orange, #mapControl button {
    background-color: #C4C4C4;
    color: black;
}

button.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
   /* border: none;*/
    text-align: left;
    outline: none;
    /*font-size: 15px;*/
    transition: 0.4s;
	margin-bottom:8px;
}

button.accordion.active, button.accordion:hover {
    background-color: #ddd; 
}

div.panel {
    padding: 0 18px;
    display: none;
    background-color: white;
}

div.panel.show {
    display: block !important;
}
.accordion{    
    width: 18px;
    margin-left: 4px;
    margin-right: 5px;
    margin-bottom: 6px;
    margin-top: 2px;}
	.retighclose{background-color: #ffcc66 !important;}
.modalopen{overflow-x: hidden !important;
    overflow-y: auto !important;}
.counter_wrapper {
    display: table;
    width: 100%;
    max-width: 300px;
    margin: 0 auto;
}   

.frequency-box{
    display: table;
    width: 100%;
    max-width: 180px; 

}
.counter {
    width: 180px;
    max-width: 180px;
    text-align: center;
    margin: 0 auto;
    max-height: 180px;
    height: 180px;
    vertical-align: middle;
    font-size: 70px;
    border: 5px solid #2593d4;
    border-radius: 50%;
    display: table-cell;
    color: #2593d4;
}
.range-slider input[type="range"] {
    width: 100%;
    display: inline-block;
}
.range-slider output {
    display: inline-block;
}
.range-slider div#cubic {
    width: 50%;
    float: right;
    text-align: right;
}
.range-slider {
    width: 100% !important;
}

#range-slider-1 .ui-slider-handle {
    z-index: 1 !important;
}
#cubic_feet{
     color: #2eaaef !important;
}

div#cubic {
    padding-top: 10px;
    padding-bottom: 10px;
    float: right;
    width: 49%;
    margin-top: 43px;
    text-align: right;
}
div#cubic span {
    /*border: 1px solid #ddd;*/
    padding: 6px 12px;
    color: #fff;
}
div#kgal span {
    /*border: 1px solid #ddd;*/
    padding: 6px 12px;
    color: #2eaaef;
}
div#kgal {
    padding-top: 10px;
    padding-bottom: 10px;
    float: left;
    width: 49%;
    margin-top: 45px;
}
table.kgal {
    margin-top: 18px;
    float: left;
}
table.kgal label {
    color: #222;
    font-weight: 200;
    padding-right: 15px;
    margin-bottom: 20px;
    width: 60px;
}
/*div#water_rates {
    float: left;
}*/
div#water_rates table input {
    margin-left: 0px;
    margin-right:10px;
}
div#sewer_rates table input {
    margin-left: 0px;
    margin-right:10px;
}
.service_type_selector {
    margin-bottom: 10px;
}
.counter_wrapper h4 {
    padding-top: 19px;
    font-weight: 600;
    padding-bottom: 0;
}
.frequency_based_calculation_result, .montly_calculation_result, .calculation_result {
    font-size: 40px;
    float: left;
    width: 65%;
    text-align: left;
}
.counter_wrapper select {
    padding: 4px 0px;
    font-size: 16px;
    width: 100%;
    margin-bottom: 20px;
    margin-top: 14px;
}
.submit_t {
    padding: 4px 5px!important;
    font-size: 17px!important;
    position: relative;
    top: -9px;
}

/*
#modal-overlay {
    position: fixed;
    z-index: 10;
    background: black;
    display: block;
    opacity: .75;
    filter: alpha(opacity=75);
    width: 100%;
    height: 100%;
}*/


#modal-overlay {
    position: fixed;
    display: none;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(f,f,f,0.5);
    z-index: 2;
    cursor: pointer;
}
   
 #text{
    position: absolute;
    top: 50%;
    left: 50%;
    font-size: 50px;
    
    transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
}  
  
.dollar span {
    font-size: 8px;
    clear: both;
    display: block;
    margin-top: -14px;
    line-height: 10px;
    margin-bottom: 20px;
}  

select#state-box {
    padding: 9px 10px;
    margin-bottom: 10px;
    border-radius: 0px;
    color: #717171;
    width: 100%;
    border: 1px solid #ccc;
}
.rate_calculator_main_container{
    width: 100%; 
    /* height: 510px; */  /* padding: 250px; */
    padding-top: 90px;
    max-width: 1100px;
    margin: 0 auto;
}

</style>

 
<?php $img = plugin_dir_url(__FILE__).'img/que.png';

$img2 = plugin_dir_url(__FILE__).'img/cross.png';

// rampant_deer.jpg

$rampant_deer= plugin_dir_url(__FILE__).'img/rampant_deer.jpg';
$rampant_deer_good = plugin_dir_url(__FILE__).'img/rampant_deer_good.jpg';

?>
  <form action='' method='post' id='ewd-feup-edit-profile-form' class='pure-form pure-form-aligned' enctype='multipart/form-data'><div id="dataTable" class="table-responsive">
     <div style="/*padding-bottom:150px;*/">
     <div class="rate_calculator_main_container ratecalc">
     
      <div class="content-area community-select-area">
          
        <input type="hidden" id="form_id" name="form_id" value = "<?php if(isset($_GET['form_id'])){ echo $_GET['form_id']; }else{ echo '45'; } ?>" />
        
			<?php
				$args = array(
				 'post_type' => 'cpt-community',
				 'posts_per_page' => 5, 
				 'orderby'=>'title',
				 'order'=>'asc'
				 );
                               

				 global $wpdb;
	       $query = 'SELECT *  FROM wp_posts WHERE post_type = "cpt-community" AND post_status = "publish" ORDER BY post_title asc';
	       
	 
				 $loop = $wpdb->get_results($query);	
				 
				 $state_array = array();
				 foreach($loop as $ck => $cv){ 
				   $state_array[] = get_post_meta($cv->ID,'state',true); 
				 }
				 
				$state_array = array_unique($state_array);
				 
				$community_array = "";
			

			?>
			<div style="width: 49%;float: left;">
			 <span style="font-size:14px; font-weight:bold;">State :</span>    
			 <select id="state-box" name="state" >
			  <option value="">--Select State --</option>    
			<?php
				 foreach($state_array as  $temp){ 
			     
				
			
				 if(!empty($temp)){
			?>
				   <option value="<?php echo $temp; ?>"><?php echo $temp;  ?></option>
            <?php  
				 } }
			?>
		 </select> 
			    
			    
			    <span style="font-size:14px; font-weight:bold;">Community :</span>  
			<select id="community-box" name="community" >
			<?php
				 foreach($loop as $ck => $cv){ 
				 if(!empty($cv->post_title)){
			?>
				 
				   <option value="<?php echo $cv->post_title; ?>"><?php echo $cv->post_title;  ?></option>
				   
            <?php  
                 
				 }
				 
				 }
			?>
				
		 </select>
		 </div>
		    <span style="font-size:14px; font-weight:bold; margin-left:20px;">Year :</span>
		 	<div style="width: 49%;float: right;">
			<select id="year-box" name="year-box"></select>
		 </div>
	<!--Horizontal Tab-->
        <div id="parentHorizontalTab">
            <ul class="resp-tabs-list hor_1">
                <li>Rate calculator</li>
                <li>Rate comparison</li>
                <!--<li>Links</li>-->
            </ul>
            <div class="resp-tabs-container hor_1">
                <div class="main_tab">
                  
                 <div >
            <div class="frequency-box">
                <select id="frequency">
                    
                    <option value="1" selected="selected" >Annually</option>
                    <option value="2">Semi-anually</option>
                    <option value="3">Triannully</option>
                    <option value="4" >Quarterly</option>
                    <option value="6" >Bi-Monthly</option>
                    <option value="12">Monthly</option>
                    <option value="365">Daily</option>
                  
                </select>
                
            </div>
        </div> 
                    
                    
                    
                    
      <div class="sub-tab1">                
      <h3>Select residential bill and monthly consumption amount</h3>
      <div class="service_type_selector">
                <label>
                  <input name="service_type" value="Water Bill" checked="checked" type="radio">Water Bill
                </label>
                <label>
                  <input name="service_type" value="Sewer Bill" type="radio">Sewer Bill
                </label>
                <label>
                  <input name="service_type" value="Water+Sewer Bill" type="radio">Water + Sewer Bill
                </label>
      </div>
    
    <div class="range-slider1">
    <div>
        <!--<input type="range" min="0" max="15000" step="0.1" value="0" stick="10 0.1" data-rangeSlider1 class="r_s" name="water_usage_slider" />-->
        <!--<div id="" class="" style="width:100%;height:25px;border-left:1px solid #eee;border-right:1px solid #eee;">
            <span style="width:25%;height:25px;border-left:1px solid #eee;border-right:1px solid #eee;float:left;"></span>
             <span style="width:25%;height:25px;border-left:1px solid #eee;border-right:1px solid #eee;float:left;"></span>
             <span style="width:25%;height:25px;border-left:1px solid #eee;border-right:1px solid #eee;float:left;"></span>
             <span style="width:25%;height:25px;border-left:1px solid #eee;border-right:1px solid #eee;float:left;"></span>
        </div>-->
        <!--<div class="lines t_li line_t"><span>50</span><span>100</span><span>150</span><span>200</span><span>250</span><span>300</span><span>350</span><span>400</span><span>450</span><span>500</span></div>-->
        <div id="range-slider-1" class="range-slider r_ss"></div> 
        <!--<div class="lines line_b">
            <span>50</span>
            <span>100</span>
            <span>150</span>
            <span>200</span>
            <span>250</span>
            <span>300</span>
            <span>350</span>
            <span>400</span>
            <span>450</span>
            <span>500</span>
        </div>-->
        
        
        <!--<div id="" class="" style="width:100%;height:25px;border-left:1px solid #eee;border-right:1px solid #eee;">
            <span style="width:25%;height:25px;border-left:1px solid #eee;border-right:1px solid #eee;float:left;"><span style="float:left;">0</span><span style="float:right;">3000</span></span>
             <span style="width:25%;height:25px;border-left:1px solid #eee;border-right:1px solid #eee;float:left;"></span>
             <span style="width:25%;height:25px;border-left:1px solid #eee;border-right:1px solid #eee;float:left;"></span>
             <span style="width:25%;height:25px;border-left:1px solid #eee;border-right:1px solid #eee;float:left;"></span>
        </div>-->
        
        <div id="kgal"><span style="margin-right:25px" id="kgl">0</span>KGAL</div>
        <div id="cubic"><span id="cubic_feet" style="margin-right:25px">0</span>HCF <a href="javaScript:void()" class="tooltip"><image src="http://mwraadvisoryboard.com/wp-content/uploads/2017/05/1494348262_Info_Circle_Symbol_Information_Letter.png"/><span class="tooltiptext">KGAL = 1 Thousand Gallons </br> 1 Houndred Cubic Feet = 748 Gallons</span></a></div>
         
    <table width="100%" class="kgal">
            <tr >
                <td style="width: 50%;"><label>KGAL</label><input type="text" name="kgl_water_usages" /></td>
            </tr>
             <tr>
                <td style="width: 14%;"><label>HCF</label><input type="text" name="hcf_water_usages" /></td><td><!--<input type="button" class="submit_t" name="submit" value="Submit" style="margin-top:1px" />--></td>
            </tr>
        </table>
    </div>
    </div>
    
       <div>
           <div style="margin-top: 15px;" id="water_rates">
               <table width="100%">
                    <tr><td colspan="2" style="width: 14%;"></td></tr>
                    <tr>
                        <td colspan="2">
                            <div class="range-slider1" id="slider_r">
                            <!--<input type="range" min="0" max="100" step="0.1" value="0" stick="10 0.1" data-rangeSlider class="r_s" name="rate_slider" />-->
                             <div id="range-slider-2" class="range-slider"></div>
                            <output></output>
                            </div>
                            <!--<div class="rslider"><p>%</p></div>-->
                        </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                        <td style="width: 70%;padding-top: 18px;"><p>Effects of raising water rates by:</p><input type="text" name="watrt_raising_rates"/>%</td><td style="vertical-align:top"><p style="float:left; width:100%; clear:both;">&nbsp;</p><!--<input type="button" style="margin-top: 46px; position:relative; display:block;"class="submit_t" name="submit" value="Submit"  />--></td></tr>
               </table>
               
           </div>
           
           <div style="margin-top: 15px;" id="sewer_rates">
               <table width="100%">
                    <tr><td colspan="2" style="width: 14%;"></td></tr>
                    <tr>
                        <td colspan="2">
                            <div class="range-slider1" id="slider_r">
                            <!--<input type="range" min="0" max="100" step="0.1" value="0" stick="10 0.1" data-rangeSlider class="r_s" name="rate_slider" />-->
                               <div id="range-slider-3" class="range-slider"></div>
                            <output></output>
                            </div>
                            <!--<div class="rslider"><p>%</p></div>-->
                        </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr></tr><td style="width: 70%;padding-top: 18px;"><p>Effects of raising Sewer rates by:</p><input type="text" name="sewer_raising_rates"/>%</td><td style="vertical-align:top"><p style="float:left; width:100%; clear:both;">&nbsp;</p><!--<input type="submit" style="margin-top: 46px; position:relative; display:block;" class="submit_t" name="submit" value="Submit"  />--></td></tr>
               </table>
               
           </div>
           
           <div style="margin-top: 15px;" id="sewer_rates">
               <table width="100%">
                    <tr><td colspan="2" style="width: 14%;"></td></tr>
                    <tr>
                        <td colspan="2">
                            <div class="">
                           <!--<input type="button" name="calculat_rate" value="Calculate Rate" class="Calculate Rate"style="width:150px;height:50px;font-size: 17px !important;color:#000;font-weigth:bold" />-->
                           
                           
                            <input id="converted_water_usages" type="hidden" name="converted_water_usages" value="" />
                           <input id="water_frequency" type="hidden" name="water_frequency" value="" />
                           <input id="water_base_fee" type="hidden" name="water_base_fee" value="" />
                           <input id="water_rate_table" type="hidden" name="water_rate_table" value="" />
                           <input id="cumulative" type="hidden" name="cumulative" value="" />
                           
                            <input id="sewer_frequency" type="hidden" name="sewer_frequency" value="" />
                            <input id="community_uses_whole_water_as_sewer" type="hidden" name="community_uses_whole_water_as_sewer" value="" />
                            <input id="community_have_water" type="hidden" name="community_have_water" value="" />
                            <input id="community_have_sewer" type="hidden" name="community_have_sewer" value="" />
                            
                            
                            
                            
                            <output></output>
                            </div>
                        </td>
                    </tr>
                   
               </table>
               
           </div>
           
           
           
          
       </div>
       
    </div>
    <div class="sub-tab2">
        <div class="counter_wrapper">
            <div style="text-align: center;">
                <h4 id="bill_type">Water rate </h4>
                <div class="dollar">Annually $</div>
                <div class="calculation_result">0</div>
                <div class="dollar">Monthly $</div>
                 <div class="montly_calculation_result">0</div>
                 <div class="dollar">Bill  $ <span > Selected Frequency Based</span></div>
                  <div class="frequency_based_calculation_result">0</div>
                
                
                <div id="hidden-field-box">
                    
                <input type="hidden" name="water_rate_calculation" value="" />
                <input type="hidden" name="water_rate_calculation_increased" value="" />
                <input type="hidden" name="sewer_rate_calculation" value="" />
                <input type="hidden" name="sewer_rate_calculation_increased" value="" />
                 
                 
                 <input type="hidden" name="water_rate_calculation_annual" value="" />
                 
                <input type="hidden" name="water_rate_calculation_annual_increased" value="" />
                
                 <input type="hidden" name="sewer_rate_calculation_annual" value="" />
                 <input type="hidden" name="sewer_rate_calculation_annual_increased" value="" />
                 
                  <input type="hidden" name="water_rate_calculation_monthly" value="" />
                <input type="hidden" name="water_rate_calculation_monthly_increased" value="" />
                 <input type="hidden" name="sewer_rate_calculation_monthly" value="" />
                 <input type="hidden" name="sewer_rate_calculation_monthly_increased" value="" />
                 
                 <input type="hidden" name="sewerage_based_on_water_uses" value="" />
                 
                <input type="hidden" name="sewerage_based_on_water_uses" value="" />
                <input type="hidden" name="sewerage_based_on_water_uses" value="" />
                <input type="hidden" name="sewerage_based_on_water_uses" value="" />
                 
                 
                 
                 
                 </div>
                 
                </div>
        </div>
        
         <!--<div class="counter_wrapper">
            <div >
                <select id="frequency">
                    
                    <option value="1"> Annual</option>
                     <option value="2">Semi-Annualy</option>
                    <option value="12"> Monthly</option>
                    <option value="3"> Quartly Bill</option>
                </select>
                
            </div>
        </div>-->
        
         <!--<div class="counter_wrapper">
       Disclaimer text goes here.
        </div>-->
        
    </div>    
                </div>
                <div>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.
                    <br>
                    <br>
                    <p></p>
                </div>
                <div>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.
                    <br>
                    <br>
                    <p>Tab 3 Container</p>
                </div>
            </div>
        </div>	 
		 
          
       
</div><!-- #primary -->
         
     </div>
     
     </div>   
    </div>
</form>
    

</div>

<script>
jQuery(document).ready(function() {
   /************************ range slider start *********************/

   jQuery( function() {
    jQuery( "#range-slider-1" ).slider({
          range: "max",
          min: 0,
          max: 15000,
          value: 1,
          slide: function( event, ui ) {
             jQuery("#kgl").text(ui.value);
             
             jQuery("#cubic_feet").text(Math.round(ui.value/0.748)); 
            jQuery( "input[name=kgl_water_usages]" ).val(ui.value);
            jQuery( "input[name=hcf_water_usages]" ).val(Math.round(ui.value/0.748));
            
            calculate_rate();
             
          }
        });
        //jQuery( "#year" ).val($( "#year-range" ).slider( "value" ) );
        
        
         jQuery( "#range-slider-2" ).slider({
          range: "max",
          min: 0,
          max: 100,
          value: 1,
          slide: function( event, ui ) {
            jQuery( "input[name=watrt_raising_rates]" ).val(ui.value);
            
           if(jQuery('input[name=kgl_water_usages]').val()=="" || jQuery('input[name=kgl_water_usages]').val()== 0 ){
            reset_hidden_field_box();
      
        }
            
            var service_type = jQuery("input:radio[name=service_type]:checked").val();
            
            if(service_type == 'Water Bill'){
            
            var increament = ui.value;
         
            
             var rate = parseFloat(jQuery('input[name=water_rate_calculation]').val());
            var final_rate = rate +(rate*increament/100);
            jQuery('.calculation_result').text(delimitNumbers(final_rate.toFixed(2)));
            jQuery('input[name=water_rate_calculation_increased]').val(final_rate);
            
           
            var water_rate_monthly = parseFloat(jQuery('input[name=water_rate_calculation_monthly]').val());
          
            var final_rate_monthly = water_rate_monthly +(water_rate_monthly*increament/100);
            jQuery('.montly_calculation_result').text(delimitNumbers(final_rate_monthly.toFixed(2)));
            jQuery('input[name=water_rate_calculation_monthly_increased]').val(final_rate_monthly);
            
           
            var water_rate_annual = parseFloat(jQuery('input[name=water_rate_calculation_annual]').val());
            var final_rate_annual = water_rate_monthly +(water_rate_annual*increament/100);
            jQuery('.frequency_based_calculation_result').text(delimitNumbers(final_rate_annual.toFixed(2)));
            jQuery('input[name=water_rate_calculation_monthly_increased]').val(final_rate_annual);
            
            
            
            
            
            }else{
                
                 var increament = ui.value;
                 var water_rate = parseFloat(jQuery('input[name=water_rate_calculation]').val());
                 var water_rate_calculation_monthly = parseFloat(jQuery('input[name=water_rate_calculation_monthly]').val());
                 var water_rate_calculation_annual = parseFloat(jQuery('input[name=water_rate_calculation_annual]').val());
            
              
            
             var sewer_rate_calculation_increased = jQuery('input[name=sewer_rate_calculation_increased]').val();
             var sewer_rate_calculation_monthly_increased = jQuery('input[name=sewer_rate_calculation_monthly_increased]').val();
             var water_rate_calculation_annual_increased = jQuery('input[name=water_rate_calculation_annual_increased]').val();
             
             var sewer_rate_calculation =  jQuery('input[name=sewer_rate_calculation]').val();
             var sewer_rate_calculation_monthly =  jQuery('input[name=sewer_rate_calculation_monthly]').val();
             var sewer_rate_calculation_annual =  jQuery('input[name=sewer_rate_calculation_annual]').val();
           
           
             if(sewer_rate_calculation_increased != ''){
             var final_rate = parseFloat(sewer_rate_calculation_increased) + water_rate +(water_rate*increament/100);
             }else{
                 var final_rate =   parseFloat(sewer_rate_calculation) + water_rate +(water_rate*increament/100);
             }
             
             
             if(sewer_rate_calculation_monthly_increased != ''){
             var final_rate_monthly = parseFloat(sewer_rate_calculation_monthly_increased) + water_rate_calculation_monthly +(water_rate_calculation_monthly*increament/100);
             }else{
                 var final_rate_monthly =   parseFloat(sewer_rate_calculation_monthly) + water_rate_calculation_monthly +(water_rate_calculation_monthly*increament/100);
             }
             
             
             if(water_rate_calculation_annual_increased != ''){
             var final_rate_annualy = parseFloat(water_rate_calculation_annual_increased) + water_rate +(water_rate*increament/100);
             }else{
                 var final_rate_annualy =   parseFloat(sewer_rate_calculation_annual) + water_rate +(water_rate*increament/100);
             }
             
             
             
             
           
            jQuery('input[name=water_rate_calculation_increased]').val(water_rate +(water_rate*increament/100));
            
             jQuery('.montly_calculation_result').text(delimitNumbers(final_rate_monthly.toFixed(2)));
             jQuery('.frequency_based_calculation_result').text(delimitNumbers(final_rate_annualy.toFixed(2)));
           
            }
            
            
             
             jQuery('.calculation_result').text(delimitNumbers(final_rate.toFixed(2)));
            
            
          }
        });
        
         jQuery( "#range-slider-3" ).slider({
          range: "max",
          min: 0,
          max: 100,
          value: 1,
          slide: function( event, ui ) {
            jQuery( "input[name=sewer_raising_rates]" ).val(ui.value);
            
            if(jQuery('input[name=kgl_water_usages]').val()=="" || jQuery('input[name=kgl_water_usages]').val()== 0 ){
                
              reset_hidden_field_box();
            }
            
            if(jQuery('input[name=kgl_water_usages]').val()!=""){
            
            var service_type = jQuery("input:radio[name=service_type]:checked").val();
            
            if(service_type == 'Sewer Bill'){
            
            var increament = ui.value;
          
            var rate = parseFloat(jQuery('input[name=sewer_rate_calculation]').val());
            var final_rate = rate +(rate*increament/100);
            jQuery('.calculation_result').text(delimitNumbers(final_rate.toFixed(2)));
            jQuery('input[name=sewer_rate_calculation_increased]').val(final_rate);
            
           
            var sewer_rate_monthly = parseFloat(jQuery('input[name=sewer_rate_calculation_monthly]').val());
          
            var final_rate_monthly = sewer_rate_monthly +(sewer_rate_monthly*increament/100);
            jQuery('.montly_calculation_result').text(delimitNumbers(final_rate_monthly.toFixed(2)));
            jQuery('input[name=sewer_rate_calculation_monthly_increased]').val(final_rate_monthly);
            
             
            var sewer_rate_annual = parseFloat(jQuery('input[name=sewer_rate_calculation_annual]').val());
            var final_sewer_rate_annual = sewer_rate_annual +(sewer_rate_annual*increament/100);
            jQuery('.frequency_based_calculation_result').text(delimitNumbers(final_sewer_rate_annual.toFixed(2)));
            jQuery('input[name=water_rate_calculation_monthly_increased]').val(final_sewer_rate_annual);
            
            
            }else{
                
               var increament = ui.value;
               var sewer_rate = parseInt(jQuery('input[name=sewer_rate_calculation]').val());
                var sewer_rate_monthly = parseInt(jQuery('input[name=sewer_rate_calculation_monthly]').val());
                 var sewer_rate_annual = parseInt(jQuery('input[name=sewer_rate_calculation_annual]').val());
               var water_rate_calculation =  jQuery('input[name=water_rate_calculation]').val();
               
               var water_rate_calculation_increased = jQuery('input[name=water_rate_calculation_increased]').val();
               var water_rate_calculation_monthly_increased = jQuery('input[name=water_rate_calculation_monthly_increased]').val();
               var water_rate_calculation_annual_increased = jQuery('input[name=water_rate_calculation_annual_increased]').val();
               
              
               
                if(water_rate_calculation_increased != ''){
                   var final_rate = parseInt(water_rate_calculation_increased)+ sewer_rate +(sewer_rate*increament/100); 
                }else{
                   var final_rate = parseInt(water_rate_calculation) + sewer_rate +(sewer_rate*increament/100);   
                }
                
                if(water_rate_calculation_monthly_increased != ''){
                   var final_rate_monthly = parseInt(water_rate_calculation_monthly_increased)+ sewer_rate_monthly +(sewer_rate_monthly*increament/100); 
                }else{
                   var final_rate_monthly = parseInt(water_rate_calculation) + sewer_rate_monthly +(sewer_rate_monthly*increament/100);   
                }
                
                if(water_rate_calculation_annual_increased != ''){
                   var final_rate_annual = parseInt(water_rate_calculation_annual_increased)+ sewer_rate_annual +(sewer_rate_annual*increament/100); 
                }else{
                   var final_rate_annual = parseInt(water_rate_calculation) + sewer_rate_annual +(sewer_rate_annual*increament/100);   
                }
                
                
                
               jQuery('input[name=sewer_rate_calculation_increased]').val(sewer_rate +(sewer_rate*increament/100));
               
               
              
              
               jQuery('.montly_calculation_result').text(delimitNumbers(final_rate_monthly.toFixed(2)));
             jQuery('.frequency_based_calculation_result').text(delimitNumbers(final_rate_annual.toFixed(2)));
            }
            
             
            jQuery('.calculation_result').text(delimitNumbers(final_rate.toFixed(2)));
            
            
            
          }
          }
          
        });
        

    });

   /************************ range slider end *********************/
    jQuery('.counter').each(function() {
      var jQuerythis = jQuery(this),
          countTo = jQuerythis.attr('data-count');
      
      jQuery({ countNum: jQuerythis.text()}).animate({
        countNum: countTo
      },
    
      {
    
        duration: 4000,
        easing:'linear',
        step: function() {
          jQuerythis.text(Math.floor(this.countNum));
        },
        complete: function() {
          jQuerythis.text(this.countNum);
          
        }
    
      });  
    });
});
</script>

<script src="http://mwraadvisoryboard.com/wp-content/plugins/ratecalculator/js/easyResponsiveTabs.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        //Horizontal Tab
        jQuery('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = jQuery(this);
                var $info = jQuery('#nested-tabInfo');
                var $name = jQuery('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });

        // Child Tab
        jQuery('#ChildVerticalTab_1').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true,
            tabidentify: 'ver_1', // The tab groups identifier
            activetab_bg: '#fff', // background color for active tabs in this group
            inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
            active_border_color: '#c1c1c1', // border color for active tabs heads in this group
            active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
        });

        //Vertical Tab
        jQuery('#parentVerticalTab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = jQuery(this);
                var $info = jQuery('#nested-tabInfo2');
                var $name = jQuery('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>
<script>


jQuery('#frequency').change(function(){
    
 calculate_rate();
});


 jQuery('input[name=kgl_water_usages]').keyup(function(){
    
    var input_value = parseInt(jQuery(this).val());
    
    if(jQuery(this).val() ==''){
      
         
    jQuery('input[name=kgl_water_usages]').val('');
     jQuery("#kgl").text('0');
     jQuery("#cubic_feet").text('0'); 
     jQuery(".calculation_result").text('0'); 
     jQuery('#range-slider-1').children('.ui-slider-range-max').attr('style','width:100%');
     jQuery('#range-slider-1').children('.ui-slider-handle').attr('style','left:0%'); 
     return false;
        
    }
    
    if(input_value <= 15000){
        
   // var element_lenght = input_value * 1000;
    var element_lenght = input_value;
    var width = element_lenght/15000;
    var width_percentage = 100-(width *100);
    var width_left = width *100;
    
    jQuery('#range-slider-1').children('.ui-slider-range-max').attr('style','width:'+width_percentage+'%');
    jQuery('#range-slider-1').children('.ui-slider-handle').attr('style','left:'+width_left+'%');
    
    }else{
        
    jQuery('#range-slider-1').children('.ui-slider-range-max').attr('style','width:0%');
    jQuery('#range-slider-1').children('.ui-slider-handle').attr('style','left:100%');   
    }
    jQuery('input[name=hcf_water_usages]').val(Math.round(input_value/0.748));
    
    jQuery("#cubic_feet").text(Math.round(input_value/0.748));
     jQuery("#kgl").text(input_value);
    calculate_rate();
   });


    jQuery('input[name=hcf_water_usages]').keyup(function(){
    
     var input_value = parseInt(jQuery(this).val());
    
     if(jQuery(this).val() =='' ){
        
        jQuery('input[name=kgl_water_usages]').val('');
        jQuery("#kgl").text('0');
        jQuery("#cubic_feet").text('0'); 
        jQuery(".calculation_result").text('0'); 
        jQuery('.montly_calculation_result').text(0);
        jQuery('.frequency_based_calculation_result').text(0);
         
        jQuery('#range-slider-1').children('.ui-slider-range-max').attr('style','width:100%');
        jQuery('#range-slider-1').children('.ui-slider-handle').attr('style','left:0%');  
        return false;
    }
     
   
    
    if(input_value <= 20053){
        element_lenght = input_value;
       
    var width = element_lenght/15000;
    var width_percentage =100-(width *100);
    var width_left = width *100;
    jQuery('#range-slider-1').children('.ui-slider-range-max').attr('style','width:'+width_percentage+'%');
    jQuery('#range-slider-1').children('.ui-slider-handle').attr('style','left:'+width_left+'%');
    
    }else{
        
      jQuery('#range-slider-1').children('.ui-slider-range-max').attr('style','width:0%');
    jQuery('#range-slider-1').children('.ui-slider-handle').attr('style','left:100%');  
    }
    jQuery('input[name=kgl_water_usages]').val(input_value*0.748);
     jQuery("#kgl").text(input_value*0.748);
    jQuery("#cubic_feet").text(input_value);
    
    calculate_rate();
    
   });



 jQuery('input[name=watrt_raising_rates]').keyup(function(){
     
 var element_lenght = parseFloat(jQuery(this).val());
 jQuery('input[name=rate_slider]').val(element_lenght);
 var width_percentage = 100-element_lenght;
 var width_left = element_lenght;
 
  if(element_lenght <= 100){
      
    jQuery('#range-slider-2').children('.ui-slider-range-max').attr('style','width:'+width_percentage+'%');
    jQuery('#range-slider-2').children('.ui-slider-handle').attr('style','left:'+width_left+'%');
  
  }else{
      jQuery('#range-slider-2').children('.ui-slider-range-max').attr('style','width:0%');
    jQuery('#range-slider-2').children('.ui-slider-handle').attr('style','left:100%'); 
  }
  
  cal_water_increased_percentage();
   });
   
   
   
   
   jQuery('input[name=sewer_raising_rates]').keyup(function(){
       
    var element_lenght = parseFloat(jQuery(this).val());
  
 jQuery('input[name=rate_slider]').val(element_lenght);
     var width_percentage = 100-element_lenght;
     var width_left = element_lenght;
  if(element_lenght <= 100){
      
    jQuery('#range-slider-3').children('.ui-slider-range-max').attr('style','width:'+width_percentage+'%');
    jQuery('#range-slider-3').children('.ui-slider-handle').attr('style','left:'+width_left+'%');
    
  }else{
      
      jQuery('#range-slider-3').children('.ui-slider-range-max').attr('style','width:0%');
    jQuery('#range-slider-3').children('.ui-slider-handle').attr('style','left:100%'); 
  }
  
  cal_sew_increased_percentage();
   });
   
   
   
   
</script>
<script type="text/javascript">

jQuery(document).ready( function($){
    
    jQuery('#state-box').change(function(){    
    
    var state = jQuery(this).val();
    
    
 jQuery.ajax({
     type : "POST",
     url : "/wp-admin/admin-ajax.php",
     
     data : {action:"get_community",state:state },
     success : function(reponse){
     jQuery('#community-box').html(reponse);

}
});   
});

    
    
    
    

jQuery('#community-box,#year-box').change(function(){
       jQuery("#modal-overlay").show();
  var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
  var community = jQuery('#community-box').val();
  var year = jQuery('#year-box').val();
  var form_id = jQuery('#form_id').val();
  
  if(form_id == '45'){
  
 jQuery.ajax({
 type : "POST",
 url : "/wp-admin/admin-ajax.php",
 data : {action:"calculation_data",community:community,year:year,form_id:form_id },
 success : function(data){
  
  var json = JSON.parse(data);
  
  // water rate
  
  var water_frequency = json[50];
  var cumulative;
  
  var rate_calculation_way = json[153.1];
  var sewerage_based_on_water_uses = json[132];
  var community_uses_whole_water_as_sewer = json[156.1];
  var community_have_water = json[157.1];
  var community_have_sewer = json[157.2];

  
  var regex = /\S+/;
  if(json[141]=='false' || json[146.1]=="")
   cumulative = 0; 
  else
   cumulative = json[146.1];
   
   //alert(water_frequency);
  
  switch (water_frequency) {
    case "Annually":
        water_frequency = 1;
        break;
        
    case "Semi-Annualy":
        water_frequency = 2;
        break;
    case  "Triannully":
        water_frequency = 3;
        break;   
     case  "Bi-Monthly":
        water_frequency = 6;
        break;      
        
    case  "Monthly":
        water_frequency = 12;
        break;
        
    case "Quarterly":
      water_frequency = 4;
      
    case "Daily":
      water_frequency = 136;  
       break;
   }
  
  
  //alert(water_frequency);
  
  var water_base_fee = json[60];

  var water_rate_table = json[54];
  
  if(community == "BOSTON"  ){
      
      water_frequency = 365;
  }



   jQuery('#sewerage_based_on_water_uses').val(sewerage_based_on_water_uses);
   jQuery('#rate_calculation_way').val(rate_calculation_way);
   
  jQuery('#water_frequency').val(water_frequency);
  jQuery('#water_base_fee').val(water_base_fee);
  jQuery('#water_rate_table').val(water_rate_table);
  jQuery('#cumulative').val(cumulative);
  
  jQuery('#community_have_water').val(community_have_water);
  jQuery('#community_have_sewer').val(community_have_sewer);
  jQuery('#community_uses_whole_water_as_sewer').val(community_uses_whole_water_as_sewer);

// sewer rate
  var sewer_frequency = json[51];
  
  switch (sewer_frequency) {
    case "Annually":
        sewer_frequency = 1;
        break;
    case  "Semi-Annualy":
        sewer_frequency = 2;
        break;
    case "Monthly":
        sewer_frequency = 12;
        break;
     case "Bi-Monthly":
        sewer_frequency = 6;
        break;   
    case "Quarterly":
      sewer_frequency = 4;
      
     case "Daily":
      sewer_frequency = 365;       
    break;    
   }

if(community == "BOSTON"  ){
      
      sewer_frequency = 365;
    
  }

  
  var sewer_base_fee = json[61];
  
  var sewer_rate_table = json[55];
 
 if(jQuery('#community-box').val()!="" && (water_rate_table == "false" || sewer_rate_table == "false")){
     alert("Data not found for this Community, You can not calculate Rate for this Community and Year.");
      jQuery("#modal-overlay").hide();
     return false;
  }
 
 
 
  jQuery('#sewer_frequency').val(sewer_frequency);
  jQuery('#sewer_base_fee').val(sewer_base_fee);
  jQuery('#sewer_rate_table').val(sewer_rate_table);
  
 calculate_rate();
 jQuery("#modal-overlay").hide();
 },
 error : function(data)
 {
  alert("Something went wrong, please try again later.");
     return false;
 }
});
  
}else{
    
    /*****                     *********/
    
    jQuery.ajax({
 type : "POST",
 url : "/wp-admin/admin-ajax.php",
 data : {action:"calculation_data",community:community,year:year,form_id:form_id },
 success : function(data){
  
  var json = JSON.parse(data);
  
  // water rate
  
  var water_frequency = json[50];
  var cumulative;
  
  var rate_calculation_way = json[153.1];
  var sewerage_based_on_water_uses = json[132];
  var community_uses_whole_water_as_sewer = json[156.2];
  var community_have_no_water = json[157.1];
  var community_have_no_sewer = json[157.2];

//input_157.1,input_157.2//input_156.1

  
  var regex = /\S+/;
  if(json[141]=='false' || json[146.1]=="")
   cumulative = 0; 
  else
   cumulative = json[146.1];
   
   //alert(water_frequency);
  
  switch (water_frequency) {
    case "Annually":
        water_frequency = 1;
        break;
        
    case "Semi-Annualy":
        water_frequency = 2;
        break;
    case  "Triannully":
        water_frequency = 3;
        break;   
     case  "Bi-Monthly":
        water_frequency = 6;
        break;      
        
    case  "Monthly":
        water_frequency = 12;
        break;
        
    case "Quarterly":
      water_frequency = 4;
       break;
   case "Daily":
      water_frequency = 365;  
       break;
   }
  
  
  //alert(water_frequency);
  
  var water_base_fee = json[60];
  var water_rate_table = json[54];
  
  if(community == "BOSTON"  ){
      water_frequency = 365;
  }



   jQuery('#sewerage_based_on_water_uses').val(sewerage_based_on_water_uses);
   jQuery('#rate_calculation_way').val(rate_calculation_way);
   
  jQuery('#water_frequency').val(water_frequency);
  jQuery('#water_base_fee').val(water_base_fee);
  jQuery('#water_rate_table').val(water_rate_table);
  jQuery('#cumulative').val(cumulative);
  
  jQuery('#community_have_water').val(community_have_no_water);
  jQuery('#community_have_sewer').val(community_have_no_sewer);
  
   //alert(community_have_no_water);
   //alert(community_have_no_sewer);
   
    if(community_have_no_water == 'yes'){
        
   jQuery("input[value='Water Bill']").parent().hide();
        jQuery("input[value='Water+Sewer Bill']").parent().hide();
   }else{
       jQuery("input[value='Water Bill']").parent().show();
        jQuery("input[value='Water+Sewer Bill']").parent().show();
   }
   
   if(community_have_no_sewer == 'yes'){
       
       jQuery("input[value='Sewer Bill']").parent().hide();
        jQuery("input[value='Water+Sewer Bill']").parent().hide();
   }else{
       jQuery("input[value='Sewer Bill']").parent().show();
        jQuery("input[value='Water+Sewer Bill']").parent().show();
   }
  
  
  
  jQuery('#community_uses_whole_water_as_sewer').val(community_uses_whole_water_as_sewer);
  

// sewer rate
  var sewer_frequency = json[51];
  
  switch (sewer_frequency) {
    case "Annually":
        sewer_frequency = 1;
        break;
    case  "Semi-Annualy":
        sewer_frequency = 2;
        break;
    case "Quarterly":
      sewer_frequency = 4;
    case "Bi-Monthly":
        sewer_frequency = 6;
        break;   
    case "Monthly":
        sewer_frequency = 12;
        break;
   case "Daily":
      sewer_frequency = 365;       
    break;  
   }

if(community == "BOSTON"  ){
      sewer_frequency = 365;
    
  }

  
  var sewer_base_fee = json[61];
  var sewer_rate_table = json[55];
 
 if(jQuery('#community-box').val()!="" && (water_rate_table == "false" || sewer_rate_table == "false")){
     alert("Data not found for this Community, You can not calculate Rate for this Community and Year.");
      jQuery("#modal-overlay").hide();
     return false;
  }
 
 
 
  jQuery('#sewer_frequency').val(sewer_frequency);
  jQuery('#sewer_base_fee').val(sewer_base_fee);

  jQuery('#sewer_rate_table').val(sewer_rate_table);
  
 calculate_rate();
 jQuery("#modal-overlay").hide();
 },
 error : function(data)
 {
  alert("Something went wrong, please try again later.");
     return false;
 }
});
    

}
  
    });
    
    
  var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
  var community = jQuery('#community-box').val();
  var year = jQuery('#year-box').val();
  
  jQuery.ajax({
     type : "POST",
     url : "/wp-admin/admin-ajax.php",
     data : {action:"calculation_data",community:'MILTON',year:'2017' },
     success : function(data){
  
    var json = JSON.parse(data);
  
      // water rate
      var water_frequency = json[50];
      
      switch (water_frequency) {
        case "Annually":
            water_frequency = 1;
            break;
        case "Semi-Annualy":
            water_frequency = 2;
            break;
         case  "Bi-Monthly":
            water_frequency = 6;
            break;   
        case  "Monthly":
            water_frequency = 12;
            break;
        case "Quarterly":
          water_frequency = 4;
        case "Daily":
      sewer_frequency = 365;       
      break;  
       }
  
  var water_base_fee = json[60];
  var water_rate_table = json[54];
  
  jQuery('#water_frequency').val(water_frequency);
  jQuery('#water_base_fee').val(water_base_fee);
  jQuery('#water_rate_table').val(water_rate_table);


  // sewer rate
  var sewer_frequency = json[51];
  
  switch (sewer_frequency) {
    case "Annually":
        sewer_frequency = 1;
        break;
    case  "Semi-Annualy":
        sewer_frequency = 2;
        break;
    case "Monthly":
        sewer_frequency = 12;
        break;
    case  "Bi-Monthly":
        water_frequency = 6;
        break; 
    case "Quarterly":
      sewer_frequency = 4;
       case "Daily":
      sewer_frequency = 365;       
    break;  
   }

  
  var sewer_base_fee = json[61];
  var sewer_rate_table = json[55];
  
  jQuery('#sewer_frequency').val(sewer_frequency);
  jQuery('#sewer_base_fee').val(sewer_base_fee);
  jQuery('#sewer_rate_table').val(sewer_rate_table);
  
 calculate_rate();
 },
 error : function(data)
 {
  alert("Something went wrong, please try again later.");
     return false;
 }
});
   
 
  
});


jQuery('input[name=calculat_rate]').click(function(){

calculate_rate();	
});


var service_type = jQuery("input:radio[name=service_type]:checked").val();

jQuery('#bill_type').text(service_type);


function calculate_rate(){
    
   
    
    if(jQuery('input[name=kgl_water_usages]').val()=="" || jQuery('input[name=kgl_water_usages]').val()== 0 ){
        
    jQuery('.calculation_result').text(0);
    jQuery('.montly_calculation_result').text(0);
    jQuery('.frequency_based_calculation_result').text(0);
    
    return false;
        
    }
    
    converted_water_usages();
    
    
            var billing_frequency = parseInt(jQuery('#water_frequency').val());
            var water_usages = jQuery('#converted_water_usages').val();
            var water_usages = get_total_water_usages(selected_frequency,billing_frequency,water_usages); 
            var bill_type = jQuery('#community-box').val();
            var service_type = jQuery("input:radio[name=service_type]:checked").val();

jQuery('#bill_type').text(service_type);

    if(service_type == 'Water+Sewer Bill'){

            var water_bill_result = calculate_water_bill(billing_frequency,water_usages);
            jQuery('input[name=water_rate_calculation]').val(water_bill_result);
            var sewer_bill_result = calculate_sewer_bill(billing_frequency,water_usages);
            jQuery('input[name=sewer_rate_calculation]').val(sewer_bill_result);
            var water_bill_result_monthly = water_bill_result/12;
            var selected_frequency  =  parseInt(jQuery('#frequency').val());
            var water_bill_result_frequency_based = water_bill_result/selected_frequency;
            var sewer_bill_result_monthly = sewer_bill_result/12;
            var selected_frequency  =  parseInt(jQuery('#frequency').val());
            var sewer_bill_result_frequency_based = sewer_bill_result/selected_frequency;
          

    }else if(service_type == 'Water Bill'){
        
            var water_bill_result = calculate_water_bill(billing_frequency,water_usages);
            jQuery('input[name=water_rate_calculation]').val(water_bill_result); 
            var water_bill_result_monthly = water_bill_result/12;
            jQuery('input[name=water_rate_calculation_monthly]').val(water_bill_result_monthly); 
            var selected_frequency  =  parseInt(jQuery('#frequency').val());
            var water_bill_result_frequency_based = water_bill_result/selected_frequency;
           jQuery('input[name=water_rate_calculation_monthly]').val(water_bill_result_monthly);
           jQuery('input[name=water_rate_calculation_annual]').val(water_bill_result_frequency_based);
           
           
    }else{
          
           var sewer_bill_result = calculate_sewer_bill(billing_frequency,water_usages);
           jQuery('input[name=sewer_rate_calculation]').val(sewer_bill_result);  
           var sewer_bill_result_monthly = sewer_bill_result/12;
           var selected_frequency  =  parseInt(jQuery('#frequency').val());
           var sewer_bill_result_frequency_based = sewer_bill_result/selected_frequency;
           jQuery('input[name=sewer_rate_calculation_monthly]').val(sewer_bill_result_monthly);
           jQuery('input[name=sewer_rate_calculation_annual]').val(sewer_bill_result_frequency_based);
            
    }

var bill_type = jQuery("input:radio[name=service_type]:checked").val();


    if(bill_type == 'Water+Sewer Bill'){
        
    result = (parseFloat(water_bill_result) + parseFloat(sewer_bill_result)).toFixed(2);

    jQuery('.frequency_based_calculation_result').text(delimitNumbers((parseFloat(water_bill_result_frequency_based)+parseFloat(sewer_bill_result_frequency_based)).toFixed(2)));
    jQuery('.montly_calculation_result').text(delimitNumbers((parseFloat(water_bill_result_monthly)+parseFloat(sewer_bill_result_monthly)).toFixed(2))); 
    jQuery('input[name=water_rate_calculation]').val(water_bill_result);
    jQuery('input[name=sewer_rate_calculation]').val(sewer_bill_result);
    jQuery('input[name=water_rate_calculation_annual]').val(water_bill_result_frequency_based);
    jQuery('input[name=sewer_rate_calculation_annual]').val(sewer_bill_result_frequency_based);
    jQuery('input[name=water_rate_calculation_monthly]').val(water_bill_result_monthly);
    jQuery('input[name=sewer_rate_calculation_monthly]').val(sewer_bill_result_monthly);
    
    
        
    }else if(bill_type == 'Water Bill'){
        result = water_bill_result;
        
    
    jQuery('.montly_calculation_result').text(delimitNumbers(water_bill_result_monthly.toFixed(2))); 
      jQuery('.frequency_based_calculation_result').text(delimitNumbers(water_bill_result_frequency_based.toFixed(2))); 
     
    }else{
        result = sewer_bill_result;
   
    jQuery('.montly_calculation_result').text(delimitNumbers(sewer_bill_result_monthly.toFixed(2))); 
    jQuery('.frequency_based_calculation_result').text(delimitNumbers(sewer_bill_result_frequency_based.toFixed(2)));
    
    }
    
     jQuery('.calculation_result').text(delimitNumbers(result));
   
    
    
    reset_increments();
 }




for (i = new Date().getFullYear(); i > 1900; i--)
{
    jQuery('#year-box').append(jQuery('<option />').val(i).html(i));
}


jQuery('input[name=service_type]').click(function(){
   
  var bill_type = jQuery(this).val();
   jQuery('#bill_type').text(bill_type);

      if(bill_type == 'Water+Sewer Bill'){
       
        jQuery('#water_rates').show();
        jQuery('#sewer_rates').show();
      }else if(bill_type == 'Water Bill'){
          
        jQuery('#water_rates').show();
        jQuery('#sewer_rates').hide();
        
      }else{
        jQuery('#water_rates').hide();
        jQuery('#sewer_rates').show();
        }
        
      calculate_rate();  
});


 var bill_type = jQuery('input[name=service_type]').val();

      if(bill_type == 'Water+Sewer Bill'){
        jQuery('#water_rates').show();
        jQuery('#sewer_rates').show();
       
      }else if(bill_type == 'Water Bill'){
       
        jQuery('#water_rates').show();
        jQuery('#sewer_rates').hide();
        
      }else{
        jQuery('#water_rates').hide();
        jQuery('#sewer_rates').show();
        }

      calculate_rate();



   
  
function cal_water_increased_percentage(){
  
        if(jQuery('input[name=kgl_water_usages]').val()=="" || jQuery('input[name=kgl_water_usages]').val()== 0 ){
            
          reset_hidden_field_box();
       
        }
       
       var service_type = jQuery("input:radio[name=service_type]:checked").val();
     
            if(service_type == 'Water Bill'){
                
            var increament = jQuery("input[name=watrt_raising_rates]").val();
            var rate = parseFloat(jQuery('input[name=water_rate_calculation]').val());
            var final_rate = rate +(rate*increament/100);
            jQuery('.calculation_result').text(delimitNumbers(final_rate.toFixed(2)));
            jQuery('input[name=water_rate_calculation_increased]').val(final_rate);
            
           
            var water_rate_monthly = parseFloat(jQuery('input[name=water_rate_calculation_monthly]').val());
          
            var final_rate_monthly = water_rate_monthly +(water_rate_monthly*increament/100);
            jQuery('.montly_calculation_result').text(delimitNumbers(final_rate_monthly.toFixed(2)));
            jQuery('input[name=water_rate_calculation_monthly_increased]').val(final_rate_monthly);
            
             
            var water_rate_annual = parseFloat(jQuery('input[name=water_rate_calculation_annual]').val());
            var final_rate_annual = water_rate_monthly +(water_rate_annual*increament/100);
            jQuery('.frequency_based_calculation_result').text(delimitNumbers(final_rate_annual.toFixed(2)));
            jQuery('input[name=water_rate_calculation_monthly_increased]').val(final_rate_annual);
            
            
            
            }else{
                
                 var increament = jQuery("input[name=watrt_raising_rates]").val();
                 var rate = parseFloat(jQuery('input[name=water_rate_calculation]').val());
                 var sewer_rate_calculation_increased = jQuery('input[name=sewer_rate_calculation_increased]').val();
                 var sewer_rate_calculation =  jQuery('input[name=sewer_rate_calculation]').val();
             
                 if(sewer_rate_calculation_increased != ''){
                 var final_rate = parseFloat(sewer_rate_calculation_increased) + rate +(rate*increament/100);
                 }else{
                     var final_rate =   parseFloat(sewer_rate_calculation) + rate +(rate*increament/100);
                 }
                 
                
                jQuery('input[name=water_rate_calculation_increased]').val(rate +(rate*increament/100));
           
            }
            
            
        jQuery('.calculation_result').text(delimitNumbers(final_rate.toFixed(2)));
   }
   
   
   function cal_sew_increased_percentage(){
       
           if(jQuery('input[name=kgl_water_usages]').val()=="" || jQuery('input[name=kgl_water_usages]').val()== 0 ){
            reset_hidden_field_box();
       
            }
       
           var service_type = jQuery("input:radio[name=service_type]:checked").val();
            if(service_type == 'Sewer Bill'){
            
            var increament =  jQuery("input[name=sewer_raising_rates]").val();
            var rate = parseInt(jQuery('input[name=sewer_rate_calculation]').val());
            var final_rate = rate +(rate*increament/100);
             jQuery('.calculation_result').text(delimitNumbers(final_rate.toFixed(2)));
            jQuery('input[name=sewer_rate_calculation_increased]').val(final_rate);
            
            var sewer_rate_monthly = parseFloat(jQuery('input[name=sewer_rate_calculation_monthly]').val());
          
            var final_rate_monthly = sewer_rate_monthly +(sewer_rate_monthly*increament/100);
            jQuery('.montly_calculation_result').text(delimitNumbers(final_rate_monthly.toFixed(2)));
            jQuery('input[name=sewer_rate_calculation_monthly_increased]').val(final_rate_monthly);
            
            var sewer_rate_annual = parseFloat(jQuery('input[name=sewer_rate_calculation_annual]').val());
            
            var final_rate_annual = sewer_rate_monthly +(sewer_rate_annual*increament/100);
            jQuery('.frequency_based_calculation_result').text(delimitNumbers(final_rate_annual.toFixed(2)));
            jQuery('input[name=sewer_rate_calculation_monthly_increased]').val(final_rate_annual);
            
            
            }else{
                
               
                
               var increament = jQuery("input[name=sewer_raising_rates]").val();
               
               var rate = parseInt(jQuery('input[name=sewer_rate_calculation]').val());
               
               var sewer_rate_monthly = parseInt(jQuery('input[name=sewer_rate_calculation_monthly]').val());
               var sewer_rate_annual = parseInt(jQuery('input[name=sewer_rate_calculation_annual]').val());
               
               
               
               var water_rate_calculation =  jQuery('input[name=water_rate_calculation]').val();
               var water_rate_calculation_monthly =  jQuery('input[name=water_rate_calculation_monthly]').val();
               var water_rate_calculation_annual =  jQuery('input[name=water_rate_calculation_annual]').val();
               
               var water_rate_calculation_increased = jQuery('input[name=water_rate_calculation_increased]').val();
               var water_rate_calculation_monthly_increased = jQuery('input[name=water_rate_calculation_monthly_increased]').val();
               var water_rate_calculation_annual_increased = jQuery('input[name=water_rate_calculation_annual_increased]').val();
               
              
               
                if(water_rate_calculation_increased != ''){
                   var final_rate = parseInt(water_rate_calculation_increased)+ rate +(rate*increament/100); 
                }else{
                   var final_rate = parseInt(water_rate_calculation) + rate +(rate*increament/100);   
                }
               
                
                if(water_rate_calculation_monthly_increased != ''){
                    
               
                    var water_final_rate_monthly = parseInt(water_rate_calculation_monthly_increased)+ sewer_rate_monthly +(sewer_rate_monthly*increament/100);  
                    
                }else{
                    
                     var water_final_rate_monthly = parseInt(water_rate_calculation_monthly) + sewer_rate_monthly +(rate*increament/100);
                }
                
                 if(water_rate_calculation_annual_increased != ''){
                     var water_final_rate_annual = parseInt(water_rate_calculation_annual_increased)+ sewer_rate_annual +(sewer_rate_annual*increament/100);  
                    
                }else{
                    var water_final_rate_annual = parseInt(water_rate_calculation_annual) + sewer_rate_annual +(sewer_rate_annual*increament/100);
                    
                }
                
                
                jQuery('input[name=sewer_rate_calculation_monthly_increased]').val(rate +(rate*increament/100)); 
                jQuery('input[name=sewer_rate_calculation_annual_increased]').val(rate +(rate*increament/100)); 
                
               jQuery('input[name=sewer_rate_calculation_increased]').val(rate +(rate*increament/100));
               
                 jQuery('.frequency_based_calculation_result').text(delimitNumbers(water_final_rate_annual.toFixed(2)));   
                 jQuery('.montly_calculation_result').text(delimitNumbers(water_final_rate_monthly.toFixed(2)));
            }
            
          
            
           jQuery('.calculation_result').text(delimitNumbers(final_rate.toFixed(2)));
            
   }


function reset_increments(){
    jQuery("input[name=sewer_raising_rates]").val("");
    jQuery("input[name=watrt_raising_rates]").val("");
    
     jQuery('#range-slider-2').children('.ui-slider-range-max').attr('style','width:100%');
    jQuery('#range-slider-2').children('.ui-slider-handle').attr('style','left:0%'); 
    
     jQuery('#range-slider-3').children('.ui-slider-range-max').attr('style','width:100%');
    jQuery('#range-slider-3').children('.ui-slider-handle').attr('style','left:0%'); 
}


 

function get_water_range(){
   
      var water_rate_table = '(' +jQuery('#water_rate_table').val()+ ')';
      var water_jsonArray = eval( water_rate_table );
     
      
      var water_range_array = Array();
      
      
        for (i in water_jsonArray)
        {
             water_range_array[i] =  water_jsonArray[i]["Tier Start"]+'-'+water_jsonArray[i]["Tier End"];
            
        }
     return water_range_array;
}


function get_water_range_value(){
  var water_rate_table = jQuery('#water_rate_table').val(); 
 // alert(water_rate_table);
  var water_jsonArray = eval( water_rate_table );
  var water_range_value_array =  Array(); 
  
    for (i in water_jsonArray)
    {
        
        water_range_value_array[i] = water_jsonArray[i]["Rate"];
       
    }
    
   return water_range_value_array;
}

function get_sewer_range(){
  var sewer_rate_table = jQuery('#sewer_rate_table').val();  
  var sewer_rate_table = '(' +jQuery('#sewer_rate_table').val()+ ')';
  var sewer_jsonArray = eval( sewer_rate_table );
  var sewer_range_array = Array();
  
    for (i in sewer_jsonArray)
    {

    sewer_range_array[i] = sewer_jsonArray[i]["Tier Start"]+'-'+sewer_jsonArray[i]["Tier End"];
    }
  
  return sewer_range_array;
}


function get_sewer_range_value(){
    
     var sewer_rate_table = '(' +jQuery('#sewer_rate_table').val() + ')';
    var sewer_jsonArray = eval( sewer_rate_table);
     var sewer_range_value_array =  Array();
    for (i in sewer_jsonArray)
     {
        sewer_range_value_array[i] = sewer_jsonArray[i]["Rate"];
     }
   return sewer_range_value_array;
}

function delimitNumbers(str) {
  return (str + "").replace(/\b(\d+)((\.\d+)*)\b/g, function(a, b, c) {
    return (b.charAt(0) > 0 && !(c || ".").lastIndexOf(".") ? b.replace(/(\d)(?=(\d{3})+$)/g, "$1,") : b) + c;
  });
}






function calculate_water_bill(billing_frequency,water_usages){
    
var base_fee = parseFloat(jQuery('#water_base_fee').val());

console.log("base_fee ="+base_fee);
console.log("water usages ="+water_usages);
console.log("Billing Frequency ="+ billing_frequency);



if(parseInt(jQuery('#cumulative').val())==1)
  {
     var max_range = (water_usages / billing_frequency).toFixed(14); 
   }
else{
   var max_range = (water_usages / billing_frequency).toFixed(14); 
   }




if(jQuery('#community-box').val() == "St. Paul")
   {
       var max_range = ((water_usages / billing_frequency)/2).toFixed(14); 
      var water_main_surcharge = max_range*2*0.2;
      var recovery_fee = 4.5;
   }



console.log("Max_range="+max_range);

var range_array = get_water_range();
var range_value_array = get_water_range_value();


console.log("range_value_array="+range_value_array);
console.log("range_array="+range_array);

var rLen = range_array.length;
var total_difference = 0;
var actual_fee = 0;

 
 console.log("actual_fee1="+actual_fee);
 
            for (i = 0; i < rLen; i++) {
                
                
                if(jQuery('#community-box').val() == "St. Paul")
                {
                    
                    if(range_array[i] == 'All-Winter'){
                        	actual_fee  = actual_fee + max_range*range_value_array[0];
                         console.log("actual_fee2="+actual_fee);	
                        	
                    }
                    
                    if(range_array[i] == 'All-Summer'){
                        	actual_fee  = actual_fee + max_range*range_value_array[1];
                        	console.log("actual_fee3="+actual_fee);	
                    }
                    console.log("max_range="+max_range);
                   
                    
       
               } else if(jQuery('#rate_calculation_way').val() == "1"){
                    
              
                    var temp_array = range_array[i].split('-');
                	console.log('range_array_value='+range_array[i]);
                	var max_value = parseFloat(temp_array[1]);
                	var min_value = parseFloat(temp_array[0]);
            	
            	
            	  	if(i==0){
            	var diff_value = max_value -  min_value;
            	}else{
            	
            	    var first_row_array = range_array[0].split('-');
            	    var first_row_range_end =  parseFloat(first_row_array[1]);
            	     var second_row_array = range_array[1].split('-');
            	    var second_row_range_start = parseFloat(second_row_array[0]);
            	    
            	    var all_start_end_difference = second_row_range_start - first_row_range_end;
            	    
            	         var diff_value = max_value -  min_value;
            	         console.log('special_diff_before ='+diff_value);
            	    	diff_value = diff_value+all_start_end_difference;
            	    	
            	    	console.log('special_diff_part='+all_start_end_difference);
            	    	
            	    	console.log('special_diff='+diff_value);
            	}
            	
            	var remaining_difference = max_range - diff_value;
            	
            	if(max_value <= max_range && rLen != i+1){
            		total_difference = total_difference + diff_value;
            	    var count = diff_value;
            	//alert('coun if='+total_difference);
            	
            	}else{
            		var count = max_range - total_difference;
            			//alert('coun else='+total_difference);
            	}
            	
            
            	console.log("count="+count);	
                
                console.log(count+"*"+range_value_array[i]+"="+count*range_value_array[i]);
            	console.log(max_range+"="+max_value);
            	
            	
            	
            	if(max_value <= max_range){
            	    
            	    if(i==0){
            	actual_fee  = actual_fee + 1*range_value_array[i];
            	}else{
            	    
            	    actual_fee  = actual_fee + count*range_value_array[i];
            	}
            		
            	 
            	}else{
            		  if(i==0){
            	actual_fee  = actual_fee + 1*range_value_array[i];
            	}else{
            	    
            	    actual_fee  = actual_fee + count*range_value_array[i];
            	}
            		
            		break;
            	}
                    
               
                    
                }else{
                    
                var temp_array = range_array[i].split('-');
                
            	console.log('range_array_value='+range_array[i]);
            	var max_value = parseFloat(temp_array[1]);
            	var min_value = parseFloat(temp_array[0]);
            	
            	if(i==0){
            	var diff_value = max_value -  min_value;
            	}else{
            	    var first_row_array = range_array[0].split('-');
            	    var first_row_range_end =  parseFloat(first_row_array[1]);
            	     var second_row_array = range_array[1].split('-');
            	    var second_row_range_start = parseFloat(second_row_array[0]);
            	    
            	    var all_start_end_difference = second_row_range_start - first_row_range_end;
            	    
            	         var diff_value = max_value -  min_value;
            	         console.log('special_diff_before ='+diff_value);
            	    	diff_value = diff_value+all_start_end_difference;
            	    	
            	    	console.log('special_diff_part='+all_start_end_difference);
            	    	
            	    	console.log('special_diff='+diff_value);
            	}
            	
            	var remaining_difference = max_range - diff_value;
            	
            	if(max_value <= max_range && rLen != i+1){
            		total_difference = total_difference + diff_value;
            	var count = diff_value;
            	
            	
            	}else{
            		var count = max_range - total_difference;
            		
            
            	}
            	
            
            	console.log("count="+count);	
                
                console.log(count+"*"+range_value_array[i]+"="+count*range_value_array[i]);
            	console.log(max_range+"="+max_value);
            	
            	if(max_value <= max_range){
            		actual_fee  = actual_fee + count*range_value_array[i];
            	 
            	}else{
            		actual_fee  = actual_fee + count*range_value_array[i];
            		
            		break;
            	}
                    
               
                }
               
            }
       

 if(jQuery('#community-box').val() == "St. Paul")
                {
                  console.log("billing_frequency="+billing_frequency);
                     console.log("base_fee="+base_fee);
                        console.log("recovery_fee="+recovery_fee);
                           console.log("water_main_surcharge="+water_main_surcharge);
                              console.log("actual_fee="+actual_fee);
                  var water_bill_result =  (billing_frequency*((base_fee+recovery_fee)+water_main_surcharge+actual_fee)).toFixed(2);  
                    
                }else if(jQuery('#rate_calculation_way').val() == "1"){
                    
                     var water_bill_result = (billing_frequency*((base_fee)+actual_fee)).toFixed(2);   
                    
                }else{
                    
              var water_bill_result = (billing_frequency*((base_fee)+actual_fee)).toFixed(2);      
                    
                    
                }

return water_bill_result;
}


function calculate_sewer_bill (billing_frequency,water_usages){
  
   var community_use_whole_water_as_sewer = jQuery('#community_uses_whole_water_as_sewer').val();
   
   if(community_use_whole_water_as_sewer == '1'){
       
     var used_water_as_sewer_percentage =  parseInt(jQuery('#sewerage_based_on_water_uses').val());
       //water_usages = water_usages*used_water_as_sewer_percentage;  
   }
    
    if(jQuery('#community-box').val() == "WALPOLE"){
              water_usages = water_usages*.8;   
             }
             
             
             if(jQuery('#community-box').val() == "NORWOOD"){
              water_usages = water_usages*.6;   
             }
             
    
    console.log("Billing Frequency ="+ billing_frequency);
    var base_fee = parseFloat(jQuery('#sewer_base_fee').val()); //doller plus
    if(parseInt(jQuery('#cumulative').val())==1)
        {
          var max_range = (water_usages).toFixed(14);  
        }
        else{
           var max_range = (water_usages / billing_frequency).toFixed(14); 
        }

    console.log("Max_range="+max_range);
    var range_array = get_sewer_range();
   
    var range_value_array = get_sewer_range_value();
    var rLen = range_array.length;
    var total_difference = 0;
    var actual_fee = 0;

    for (i = 0; i < rLen; i++) {
       
       
        if(jQuery('#rate_calculation_way').val() == "1"){
                    
              
                    var temp_array = range_array[i].split('-');
                	console.log('range_array_value='+range_array[i]);
                	var max_value = parseFloat(temp_array[1]);
                	var min_value = parseFloat(temp_array[0]);
            	
            	
            	  	if(i==0){
            	var diff_value = max_value -  min_value;
            	}else{
            	
            	    var first_row_array = range_array[0].split('-');
            	    var first_row_range_end =  parseFloat(first_row_array[1]);
            	     var second_row_array = range_array[1].split('-');
            	    var second_row_range_start = parseFloat(second_row_array[0]);
            	    
            	    var all_start_end_difference = second_row_range_start - first_row_range_end;
            	    
            	         var diff_value = max_value -  min_value;
            	         console.log('special_diff_before ='+diff_value);
            	    	diff_value = diff_value+all_start_end_difference;
            	    	
            	    	console.log('special_diff_part='+all_start_end_difference);
            	    	
            	    	console.log('special_diff='+diff_value);
            	}
            	
            	var remaining_difference = max_range - diff_value;
            	
            	if(max_value <= max_range && rLen != i+1){
            		total_difference = total_difference + diff_value;
            	    var count = diff_value;
            	//alert('coun if='+total_difference);
            	
            	}else{
            		var count = max_range - total_difference;
            			//alert('coun else='+total_difference);
            	}
            	
            
            	console.log("count="+count);	
                
                console.log(count+"*"+range_value_array[i]+"="+count*range_value_array[i]);
            	console.log(max_range+"="+max_value);
            	
            	
            	
            	if(max_value <= max_range){
            	    
            	    if(i==0){
            	actual_fee  = actual_fee + 1*range_value_array[i];
            	}else{
            	    
            	    actual_fee  = actual_fee + count*range_value_array[i];
            	}
            		
            	 
            	}else{
            		  if(i==0){
            	actual_fee  = actual_fee + 1*range_value_array[i];
            	}else{
            	    
            	    actual_fee  = actual_fee + count*range_value_array[i];
            	}
            		
            		break;
            	}
                    
               
                    
                }else{
       
       
       
            	var temp_array = range_array[i].split('-');
            	var max_value = parseFloat(temp_array[1]);
            	var min_value = parseFloat(temp_array[0]);
            	var diff_value = max_value -  min_value;
    	
    	
    	
             if(i==0){
            	var diff_value = max_value -  min_value;
            	}else{
            	    var first_row_array = range_array[0].split('-');
            	    var first_row_range_end =  parseFloat(first_row_array[1]);
            	     var second_row_array = range_array[1].split('-');
            	    var second_row_range_start = parseFloat(second_row_array[0]);
            	    
            	    var all_start_end_difference = second_row_range_start - first_row_range_end;
            	    
            	         var diff_value = max_value -  min_value;
            	         console.log('special_diff_before ='+diff_value);
            	    	diff_value = diff_value+all_start_end_difference;
            	    	
            	    	console.log('special_diff_part='+all_start_end_difference);
            	    	console.log('special_diff='+diff_value);
            	}
            	
            	
    	if(max_value <= max_range && rLen != i+1){
    		total_difference = total_difference + diff_value;
    	var count = diff_value;
    	}else{
    		var count = max_range - total_difference;
    	}
    	
    	
    	console.log("count="+count);	
        console.log(count+"*"+range_value_array[i]+"="+count*range_value_array[i]);
	    console.log(max_value+"="+max_value);
    	
    	
    
    	if(max_value <= max_range){
    		actual_fee  = actual_fee + count*range_value_array[i];
    	}else{
    		actual_fee  = actual_fee + count*range_value_array[i];
    		break;
    	}
    	
    }
    
    } 

   var sewer_bill_result = (billing_frequency*((base_fee)+actual_fee)).toFixed(2); //
   return sewer_bill_result;
}


function get_total_water_usages(selected_frequency,billing_frequency,water_usages){
    
    switch (selected_frequency) {
    case 1:
        water_usages = water_usages*1;
        break;
    case 2:
        water_usages = water_usages*2;
        break;
    case 3:
        water_usages = water_usages*3;
        break;
    case 4:
        
     water_usages = water_usages*4;
     break;
   case 6:
        
     water_usages = water_usages*6;
     break;
  case 12:
       
     water_usages = water_usages*12;
     break;
   }
   
   return water_usages;
}


function get_total_sewer_usages(billing_frequency,water_usages){
    
   

    switch (billing_frequency) {
    case 1:
        water_usages = water_usages*1;
        break;
    case 2:
        water_usages = water_usages*2;
        break;
    case 3:
        water_usages = water_usages*3;
        break;
    case 4:
         water_usages = water_usages*4;
         break;
    case 6:
         water_usages = water_usages*6;
         break;    
    case 12:
         water_usages = water_usages*12;
         break;
   }
   
   
   return water_usages;
}


function reset_hidden_field_box(){

    jQuery('#hidden-field-box input[type="hidden"]').each( function(){
    
      jQuery(this).val(0);
    } ); 
    
}


function converted_water_usages(){
    
    var billing_frequency = parseInt(jQuery('#water_frequency').val());
    
    if(jQuery('#rate_calculation_way').val() == "1")
       {
        var water_usages = parseFloat(jQuery('input[name=kgl_water_usages]').val()); // KGL
       }else{
           var water_usages = parseFloat(jQuery('input[name=hcf_water_usages]').val()); // HCF
           
       }
    var selected_frequency  =  parseInt(jQuery('#frequency').val());
    
   
    
    switch (selected_frequency) {
    case 1:
        water_usages = 1*water_usages;
        break;
    case 2:
        water_usages = 2*water_usages;
        break;
    case  3:
        water_usages = 12*water_usages;
        break;
    case 4:
      water_usages = 4*water_usages;
      break;
    case 12:
      water_usages = 12*water_usages;
   }
    
    jQuery('#converted_water_usages').val(water_usages);
   
    
}

</script>


<script>

// Script for searchable drop down

jQuery("#state-box").change(function() {
    
               jQuery('#community-box').html('<option value="">&nbsp;</option>');
               jQuery('#community-box').val("").trigger("change");
            });


        jQuery(document).ready(function() { 
            jQuery("#community-box").select2({
                    placeholder: "Select a Community",
                    allowClear: true
                   
             }); 
        });
        
        
        jQuery(document).ready(function() { 
            jQuery("#year-box").select2({
                    placeholder: "Select a Community",
                    allowClear: true
             }); 
        });
        
</script>

<div id="modal-overlay">
    <img id="text" src="<?php echo site_url();  ?>/wp-content/uploads/2017/05/spiffygif_32x32.gif" />
</div>
