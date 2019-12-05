
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

