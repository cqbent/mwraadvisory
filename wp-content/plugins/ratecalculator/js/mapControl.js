(function($) {
	
$("#fencelen").keypress(function (event) {if(event.which == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 9) return true;
 else if((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57) )event.preventDefault(); });
 
 $("#postcost").keypress(function (event) {if(event.which == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 9) return true;
 else if((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57))event.preventDefault(); });
 
  $("#minuteinstall").keypress(function (event) {if(event.which == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 9) return true;
 else if((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57))event.preventDefault(); });
 
   $("#labourcost").keypress(function (event) {if(event.which == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 9) return true;
 else if((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57))event.preventDefault(); });
 
    $("#costfenceper").keypress(function (event) {if(event.which == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 9) return true;
 else if((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57))event.preventDefault(); });
 
 
     $("#retihtening").keypress(function (event) {if(event.which == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 9) return true;
 else if((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57))event.preventDefault(); });
 
 
 $("#pricehightens").keypress(function (event) {if(event.which == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 9) return true;
 else if((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57))event.preventDefault(); });
 
	
	
			
$("#TorCo-btn-materialList").on('click',function() {
		
		if($("#retihtening").val()=='' || $("#retihtening").val()==0){ $("#TorCo-modal-materialList2").modal('show');}
	  else{$("#TorCo-modal-materialList").modal('show');}
		
		  var fencelen = $("#fencelen").val();
		   var postcostval = $("#postcost").val();
		  
		  var minuteinstall = $("#minuteinstall").val();
		  var labourcost = $("#labourcost").val();
		  var costfenceper = $("#costfenceper").val();
		  var retihtening = $("#retihtening").val();
		  
		  // For Installation cost
		  //(length of fence/3)*(minutes to install post/60)*labour cost per hour
            var instalcost =   (fencelen/3)*(minuteinstall/60)*labourcost;
		   $("#lcsminuteinstall").val(instalcost.toFixed(2));
		   
		   var instalcosthigh =   (fencelen/6)*(minuteinstall/60)*labourcost;
		   $("#htminuteinstall").val(instalcosthigh.toFixed(2));
		  
		  //console.log(len);
		  //$('.fencechoice').text(len);
		  
		  // ReLightening Fence
		  
		  //for low carbon steel re-tightening hours per year*25*labour cost per hour
		  
		    var relighting = (retihtening)*25*(labourcost);
			 $("#lowretihtening").val(relighting.toFixed(2));
			 
			 
			 	// For Post
			
			var lowpost =  Math.round(Math.ceil((fencelen/3))*postcostval);
			  $("#lcspost").val(lowpost.toFixed(2));
			  
			  var highpost =  Math.ceil((fencelen/6)*postcostval);
			 $("#highpost").val(highpost.toFixed(2));
			 
			 // Totoal lifetimeprice per year
			 // cost of fence per metre+SUM(installation + Posts + re-tightening)/length of fence
			 
			  
			  var installationCost =  $("#lcsminuteinstall").val();
			  var Post =  $("#lcspost").val();
			  var Retightening =  $("#lowretihtening").val();
			   
			   var data1 = parseFloat(installationCost)+parseFloat(Post)+parseFloat(Retightening);
			   
			    var data1 = parseFloat(data1)/fencelen;
				var data1 = parseFloat(data1).toPrecision(2);
			    var lowretihtening2 = parseFloat(costfenceper)+parseFloat(data1);
				
				  if(isNaN(lowretihtening2)){$("#lowretihtening2").val('0.00');}
				else{$("#lowretihtening2").val(lowretihtening2.toFixed(2));}
				
		   });
			
			
			// for no rel
			
			
			$("#TorCo-btn-materialList3").on('click',function() {
				
					 $("#TorCo-modal-materialList").modal('show');
                                           $('#TorCo-modal-materialList').addClass('modalopen');
				
				});
			
			// 
			
			
			$("#TorCo-btn-clear").on('click',function() {
				
				    $("#fencelen").val("");
		            $("#postcost").val("");
		           $("#minuteinstall").val("");
		          $("#labourcost").val("");
		          $("#costfenceper").val("");
		         $("#retihtening").val("");
				  $("#pricehightens").val("");
				   $("#highlifetime").val("0.00");
				 
				
			});
			
		
			$('#TorCo-btn-htf').click(function() {
				 var fencelen = $("#fencelen").val();
				var installationCost2 =  $("#htminuteinstall").val();
			   var Post2 =  $("#highpost").val();
			   var pricehightens =  $("#pricehightens").val();
			   
			   
			   var data2 = parseFloat(installationCost2)+parseFloat(Post2);
			    var data2 = parseFloat((data2)/fencelen);
				var data2 = parseFloat(data2).toPrecision(2);
			    var lowretihtening3 = parseFloat(pricehightens)+parseFloat(data2);
				 
				 /* Calcuation */
				
				
				  
				  /* End Calcuation */
				
				
				 if(isNaN(lowretihtening3)){$("#highlifetime").val('0.00');}
				else{$("#highlifetime").val(lowretihtening3.toFixed(2));
				
				  var lifetimecostsaving =  ($("#lowretihtening2").val()-$("#highlifetime").val())*fencelen;
				 /* console.log(lifetimecostsaving.toFixed(2)); */
				  $('#lifetimecostsaving').val(lifetimecostsaving.toFixed(2));
				}
				});	
		   
			
			$('#pricehightens').keyup(function() {
				$("#highlifetime").val('');
			});
		
               

/*
* Data Table
* */

$(document).on('click','#schliessen_calculation_close',function(){
var lifetimecostsaving = $("#lifetimecostsaving").val();
if(lifetimecostsaving){
$("#calculation_amount_goodfence").html(lifetimecostsaving);
$("#TorCo-modal-materialList").modal('hide');
$("#TorCo-modal-materialList3").modal('show')
 $('#TorCo-modal-materialList3').addClass('modalopen');
}
})



$('#TorCo_data_closedFence').change(function() {
    closedFence = $('#TorCo_data_closedFence').prop('checked');
    if(closedFence) {
        $('#TorCo_data_closedFence_text').html( "Closed fence" );
    } else {
        $('#TorCo_data_closedFence_text').html( "Open fence" );
    }

   
});

})( jQuery );