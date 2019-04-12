var $ = jQuery.noConflict();

//Calculation of Price Quotes config And display total price
function price_quotes(id){
	var quantity = $('#quantity_'+id).val();
	var net_price = $('#net_price_'+id).val();
	// var isNumber = quantity.match(/^[0-9]+$/);
	var project_name = $('#project_name').val();
	if(project_name == ''){
		alert('Please enter your project name.');
		return false;
	}

	if(net_price == "0.00"){
		var a =document.getElementById('totals_'+id).innerHTML = '$0.00';
		$('#master_totals_'+id).val('0.00');
		$('#string_totals_'+id).val('0.00');
	}else{
		document.getElementById('totals_'+id).innerHTML = '$'+(quantity * net_price).toFixed(2);
		var total_val = (quantity * net_price).toFixed(2);
		$('#master_totals_'+id).val(total_val);
		$('#string_totals_'+id).val(total_val);
	}
	var grand_m_price = 0;
	$('.m_totals').each(function(){
		var single_m_price = $(this).html().split('$');
		if(single_m_price != ''){
			var single_m =single_m_price[1].replace(",", ""); 
			grand_m_price += parseFloat(single_m);
		}

	});
	var grand_s_price = 0;
	$('.s_totals').each(function(){
		var single_s_price = $(this).html().split('$');
		if(single_s_price[1] != '' || single_s_price[1] != '0.00'){
			var single_s = single_s_price[1].replace(',','');
			grand_s_price += parseFloat(single_s);
		}
	});
	document.getElementById('m_grand_total').innerHTML = '$'+grand_m_price.toFixed(2);
	document.getElementById('s_grand_total').innerHTML = '$'+grand_s_price.toFixed(2);

	$('#grand_master_total').val(grand_m_price.toFixed(2));
	$('#grand_string_total').val(grand_s_price.toFixed(2));


	document.getElementById('net-kit-price').innerHTML = '$'+(grand_m_price+grand_s_price).toFixed(2);
	var accesories_pg = $('#accessories_pg').html().split('$')[1].replace(',','');
	var total_net_price = parseFloat(accesories_pg[1])+grand_m_price+grand_s_price;
	document.getElementById('total_net_price').innerHTML = '$'+total_net_price.toFixed(2);

	$('#accessories_total_main').val(parseFloat(accesories_pg).toFixed(2));
	$('#net_kit_total_main').val((grand_m_price+grand_s_price).toFixed(2));
	$('#m_s_acess_total_main').val(total_net_price.toFixed(2));

	var net_installation_total = $('#net_installation_total').html().split('$')[1].replace(',','');

	var percentage = $('#markup_percentage').val().split('%');
	var total_install_price = parseFloat(net_installation_total)+total_net_price;
	var freight = $('#Freight').val().split('$')[1].replace(',','');
	var option_laptop_router = $('#option_laptop_router').val().split('$')[1].replace(',','');
	// var bmcs_with_laptop = $('#bmcs_with_laptop').html().split('$');
	//Show total installation price
	document.getElementById('total_install_price').innerHTML = '$'+total_install_price.toFixed(2);
	//Create markup percentge price
	var markup_price = (total_install_price*percentage[0])/ 100;

	//Show Of markup percentge price
	document.getElementById('markup_price').innerHTML = '$'+markup_price.toFixed(2);

	//Calculation Of BMCS System Total
	var bmcs_system_grand_total = parseFloat(total_install_price)+parseFloat(markup_price)+parseFloat(freight);

	//Show BMCS System Total
	document.getElementById('bmcs_system_total').innerHTML = '$'+bmcs_system_grand_total.toFixed(2);
	$('#bmcs_system_total_price').val(bmcs_system_grand_total.toFixed(2));
	//Calculation for BMCS with Laptop & Router Total
	var bmcs_with_laptop_router_total = bmcs_system_grand_total+parseFloat(option_laptop_router);

	//Show BMCS with Laptop & Router Total
	document.getElementById('bmcs_with_laptop').innerHTML = '$'+bmcs_with_laptop_router_total.toFixed(2); 
	$('#bmcs_with_laptop_price').val(bmcs_with_laptop_router_total.toFixed(2));

}


//Calculation of Accessories summary And display total price
function access_quotes(id){
	var quantity = $('#quantity_'+id).val();
	var net_price = $('#net_price_'+id).val().replace(',','');
	var project_name = $('#project_name').val();
	if(project_name == ''){
		alert('Please enter your project name.');
		return false;
	}
	if(net_price == "0.00"){
		document.getElementById('totals_'+id).innerHTML = '$0.00';
		$('#acessories_single_total_price_'+id).val('0.00');
	}else{
		document.getElementById('totals_'+id).innerHTML = '$'+(quantity * net_price).toFixed(2);
		var total_price = (quantity * net_price).toFixed(2);
		$('#acessories_single_total_price_'+id).val(total_price);
	}

	var grand_access_price = 0;
	$('.total_accessories_price').each(function(){
		var single_access_price = $(this).html().split('$');
		if(single_access_price != ''){
			var single_access = single_access_price[1].replace(',','');
			grand_access_price += parseFloat(single_access);
		}
		
	});
	document.getElementById('acces_total').innerHTML = '$'+grand_access_price.toFixed(2);
	var accesories_pg = $('#acces_total').html().split('$');
	document.getElementById('accessories_pg').innerHTML = '$'+parseFloat(accesories_pg[1]).toFixed(2);
	$('#grand_total_access').val(grand_access_price.toFixed(2));

    $('#accessories_total_main').val(parseFloat(accesories_pg[1]).toFixed(2));
	var accesories_pg = $('#accessories_pg').html().split('$');
	var total_accessories_price = accesories_pg[1].replace(',','');
	var net_kit_price = $('#net-kit-price').html().split('$');
	var total_net_kit_price = net_kit_price[1].replace(',','');
	var total_net_price = parseFloat(total_accessories_price)+parseFloat(total_net_kit_price);
	document.getElementById('total_net_price').innerHTML = '$'+total_net_price.toFixed(2);

	var net_installation_total = $('#net_installation_total').html().split('$')[1].replace(',','');
	var percentage = $('#markup_percentage').val().split('%');
	var total_install_price = parseFloat(net_installation_total)+total_net_price;
	var freight = $('#Freight').val().split('$')[1].replace(',','');
	var option_laptop_router = $('#option_laptop_router').val().split('$')[1].replace(',','');
	// var bmcs_with_laptop = $('#bmcs_with_laptop').html().split('$');
	//Show total installation price
	document.getElementById('total_install_price').innerHTML = '$'+total_install_price.toFixed(2);
	//Create markup percentge price
	var markup_price = (total_install_price*percentage[0])/ 100;

	//Show Of markup percentge price
	document.getElementById('markup_price').innerHTML = '$'+markup_price.toFixed(2);

	//Calculation Of BMCS System Total
	var bmcs_system_grand_total = parseFloat(total_install_price)+parseFloat(markup_price)+parseFloat(freight);

	//Show BMCS System Total
	document.getElementById('bmcs_system_total').innerHTML = '$'+bmcs_system_grand_total.toFixed(2);
	$('#bmcs_system_total_price').val(bmcs_system_grand_total.toFixed(2));
	//Calculation for BMCS with Laptop & Router Total
	var bmcs_with_laptop_router_total = bmcs_system_grand_total+parseFloat(option_laptop_router);

	//Show BMCS with Laptop & Router Total
	document.getElementById('bmcs_with_laptop').innerHTML = '$'+bmcs_with_laptop_router_total.toFixed(2);
	$('#bmcs_with_laptop_price').val(bmcs_with_laptop_router_total.toFixed(2)); 
}

//Add and display intallation price
function installationPrice(id){
	var project_name = $('#project_name').val();
	if(project_name == ''){
		alert('Please enter your project name.');
		return false;
	}
	var quantity = $('#quantity_'+id).val();
	var single_install_price = $('#single_install_price_'+id).val().replace(',','');
	if(single_install_price == "0.00"){
		document.getElementById('single_total_install_price_'+id).innerHTML = '$0.00';
		$('#single_input_install_price_'+id).val('0.00');
	}else{
		document.getElementById('single_total_install_price_'+id).innerHTML = '$'+(quantity * single_install_price).toFixed(2);
		var total_single_installation = (quantity * single_install_price).toFixed(2);
		$('#single_input_install_price_'+id).val(total_single_installation);
	}

	var grand_installation_price = 0;
	$('.single_total_install_price').each(function(){
		var single_installation_price = $(this).html().split('$');
		if(single_installation_price != ''){
			var single_installation = single_installation_price[1].replace(',','');
			grand_installation_price += parseFloat(single_installation);
		}
		
	});

	//Show Net Total Installation price
	document.getElementById('net_installation_total').innerHTML = '$'+grand_installation_price.toFixed(2);


	var total_net_price = $('#total_net_price').html().split('$')[1].replace(',','');
	var percentage = $('#markup_percentage').val().split('%');
	var total_install_price = parseFloat(total_net_price)+grand_installation_price;
	var freight = $('#Freight').val().split('$')[1].replace(',','');
	var option_laptop_router = $('#option_laptop_router').val().split('$')[1].replace(',','');
	//Show total Total Cost /installation price
	document.getElementById('total_install_price').innerHTML = '$'+total_install_price.toFixed(2);
	//Create markup percentge price
	var markup_price = (total_install_price*percentage[0])/ 100;

	//Show Of markup percentge price
	document.getElementById('markup_price').innerHTML = '$'+markup_price.toFixed(2);

	//Calculation Of BMCS System Total
	var bmcs_system_grand_total = parseFloat(total_install_price)+parseFloat(markup_price)+parseFloat(freight);

	//Show BMCS System Total
	document.getElementById('bmcs_system_total').innerHTML = '$'+bmcs_system_grand_total.toFixed(2);
	$('#bmcs_system_total_price').val(bmcs_system_grand_total.toFixed(2));
	//Calculation for BMCS with Laptop & Router Total
	var bmcs_with_laptop_router_total = bmcs_system_grand_total+parseFloat(option_laptop_router);

	//Show BMCS with Laptop & Router Total
	document.getElementById('bmcs_with_laptop').innerHTML = '$'+bmcs_with_laptop_router_total.toFixed(2);
	$('#bmcs_with_laptop_price').val(bmcs_with_laptop_router_total.toFixed(2)); 
}

//Create single price calculation
function single_price(id){
	var quantity = $('#quantity_'+id).val();
	var net_price = $('#net_price_'+id).val().replace(',','');
	var project_name = $('#project_name').val();
	if(project_name == ''){
		alert('Please enter your project name.');
		return false;
	}

	if(net_price == "0.00"){
		var a =document.getElementById('totals_'+id).innerHTML = '$0.00';
		$('#master_totals_'+id).val('0.00');
		$('#string_totals_'+id).val('0.00');
		$('#acessories_single_total_price_'+id).val('0.00');
	}else{
		document.getElementById('totals_'+id).innerHTML = '$'+(quantity * net_price).toFixed(2);
		var total_val = (quantity * net_price).toFixed(2);
		$('#master_totals_'+id).val(total_val);
		$('#string_totals_'+id).val(total_val);
		$('#acessories_single_total_price_'+id).val(total_val);
	}
	var grand_m_price = 0;
	$('.m_totals').each(function(){
		var single_m_price = $(this).html().split('$');
		if(single_m_price != ''){
			var single_m =single_m_price[1].replace(",", ""); 
			grand_m_price += parseFloat(single_m);
		}

	});
	var grand_s_price = 0;
	$('.s_totals').each(function(){
		var single_s_price = $(this).html().split('$');
		if(single_s_price[1] != '' || single_s_price[1] != '0.00'){
			var single_s = single_s_price[1].replace(',','');
			grand_s_price += parseFloat(single_s);
		}
	});
	document.getElementById('m_grand_total').innerHTML = '$'+grand_m_price.toFixed(2);
	document.getElementById('s_grand_total').innerHTML = '$'+grand_s_price.toFixed(2);

	$('#grand_master_total').val(grand_m_price.toFixed(2));
	$('#grand_string_total').val(grand_s_price.toFixed(2));


	document.getElementById('net-kit-price').innerHTML = '$'+(grand_m_price+grand_s_price).toFixed(2);
	var accesories_pg = $('#accessories_pg').html().split('$')[1].replace(',','');
	var total_net_price = parseFloat(accesories_pg[1])+grand_m_price+grand_s_price;
	document.getElementById('total_net_price').innerHTML = '$'+total_net_price.toFixed(2);

	$('#accessories_total_main').val(parseFloat(accesories_pg).toFixed(2));
	$('#net_kit_total_main').val((grand_m_price+grand_s_price).toFixed(2));
	$('#m_s_acess_total_main').val(total_net_price.toFixed(2));

	var net_installation_total = $('#net_installation_total').html().split('$')[1].replace(',','');
	var percentage = $('#markup_percentage').val().split('%');
	var total_install_price = parseFloat(net_installation_total)+total_net_price;
	var freight = $('#Freight').val().split('$')[1].replace(',','');
	var option_laptop_router = $('#option_laptop_router').val().split('$')[1].replace(',','');
	// var bmcs_with_laptop = $('#bmcs_with_laptop').html().split('$');
	//Show total installation price
	document.getElementById('total_install_price').innerHTML = '$'+total_install_price.toFixed(2);
	//Create markup percentge price
	var markup_price = (total_install_price*percentage[0])/ 100;

	//Show Of markup percentge price
	document.getElementById('markup_price').innerHTML = '$'+markup_price.toFixed(2);

	//Calculation Of BMCS System Total
	var bmcs_system_grand_total = parseFloat(total_install_price)+parseFloat(markup_price)+parseFloat(freight);

	//Show BMCS System Total
	document.getElementById('bmcs_system_total').innerHTML = '$'+bmcs_system_grand_total.toFixed(2);
	$('#bmcs_system_total_price').val(bmcs_system_grand_total.toFixed(2));
	//Calculation for BMCS with Laptop & Router Total
	var bmcs_with_laptop_router_total = bmcs_system_grand_total+parseFloat(option_laptop_router);

	//Show BMCS with Laptop & Router Total
	document.getElementById('bmcs_with_laptop').innerHTML = '$'+bmcs_with_laptop_router_total.toFixed(2); 
	$('#bmcs_with_laptop_price').val(bmcs_with_laptop_router_total.toFixed(2));

	//onchange value of accessoriress total price
	var grand_access_price = 0;
	$('.total_accessories_price').each(function(){
		var single_access_price = $(this).html().split('$');
		if(single_access_price != ''){
			var single_access = single_access_price[1].replace(',','');
			grand_access_price += parseFloat(single_access);
		}
		
	});
	document.getElementById('acces_total').innerHTML = '$'+grand_access_price.toFixed(2);

	var accesories_pg = $('#acces_total').html().split('$');
	document.getElementById('accessories_pg').innerHTML = '$'+parseFloat(accesories_pg[1]).toFixed(2);
	$('#grand_total_access').val(grand_access_price.toFixed(2));

	var accesories_pg = $('#accessories_pg').html().split('$');
	var total_accessories_price = accesories_pg[1].replace(',','');
	var net_kit_price = $('#net-kit-price').html().split('$');
	var total_net_kit_price = net_kit_price[1].replace(',','');
	var total_net_price = parseFloat(total_accessories_price)+parseFloat(total_net_kit_price);
	document.getElementById('total_net_price').innerHTML = '$'+total_net_price.toFixed(2);

	var net_installation_total = $('#net_installation_total').html().split('$')[1].replace(',','');
	var percentage = $('#markup_percentage').val().split('%');
	var total_install_price = parseFloat(net_installation_total)+total_net_price;
	var freight = $('#Freight').val().split('$')[1].replace(',','');
	var option_laptop_router = $('#option_laptop_router').val().split('$')[1].replace(',','');
	// var bmcs_with_laptop = $('#bmcs_with_laptop').html().split('$');
	//Show total installation price
	document.getElementById('total_install_price').innerHTML = '$'+total_install_price.toFixed(2);
	//Create markup percentge price
	var markup_price = (total_install_price*percentage[0])/ 100;

	//Show Of markup percentge price
	document.getElementById('markup_price').innerHTML = '$'+markup_price.toFixed(2);

	//Calculation Of BMCS System Total
	var bmcs_system_grand_total = parseFloat(total_install_price)+parseFloat(markup_price)+parseFloat(freight);

	//Show BMCS System Total
	document.getElementById('bmcs_system_total').innerHTML = '$'+bmcs_system_grand_total.toFixed(2);
	$('#bmcs_system_total_price').val(bmcs_system_grand_total.toFixed(2));

	//Calculation for BMCS with Laptop & Router Total
	var bmcs_with_laptop_router_total = bmcs_system_grand_total+parseFloat(option_laptop_router);

	//Show BMCS with Laptop & Router Total
	document.getElementById('bmcs_with_laptop').innerHTML = '$'+bmcs_with_laptop_router_total.toFixed(2); 
	$('#bmcs_with_laptop_price').val(bmcs_with_laptop_router_total.toFixed(2)); 
}

//Create Create single installation price calculation
function single_installation_price(id){
	var project_name = $('#project_name').val();
	if(project_name == ''){
		alert('Please enter your project name.');
		return false;
	}
	var quantity = $('#quantity_'+id).val();
	var single_install_price = $('#single_install_price_'+id).val().replace(',','');
	if(single_install_price == "0.00"){
		document.getElementById('single_total_install_price_'+id).innerHTML = '$0.00';
		$('#single_input_install_price_'+id).val('0.00');
	}else{
		document.getElementById('single_total_install_price_'+id).innerHTML = '$'+(quantity * single_install_price).toFixed(2);
		var total_single_installation = (quantity * single_install_price).toFixed(2);
		$('#single_input_install_price_'+id).val(total_single_installation);
	}

	var grand_installation_price = 0;
	$('.single_total_install_price').each(function(){
		var single_installation_price = $(this).html().split('$');
		if(single_installation_price != ''){
			var single_installation = single_installation_price[1].replace(',','');
			grand_installation_price += parseFloat(single_installation);
		}
		
	});

	//Show Net Total Installation price
	document.getElementById('net_installation_total').innerHTML = '$'+grand_installation_price.toFixed(2);


	var total_net_price = $('#total_net_price').html().split('$')[1].replace(',','');
	var percentage = $('#markup_percentage').val().split('%');
	var total_install_price = parseFloat(total_net_price)+grand_installation_price;
	var freight = $('#Freight').val().split('$')[1].replace(',','');
	var option_laptop_router = $('#option_laptop_router').val().split('$')[1].replace(',','');
	//Show total Total Cost /installation price
	document.getElementById('total_install_price').innerHTML = '$'+total_install_price.toFixed(2);
	//Create markup percentge price
	var markup_price = (total_install_price*percentage[0])/ 100;

	//Show Of markup percentge price
	document.getElementById('markup_price').innerHTML = '$'+markup_price.toFixed(2);

	//Calculation Of BMCS System Total
	var bmcs_system_grand_total = parseFloat(total_install_price)+parseFloat(markup_price)+parseFloat(freight);

	//Show BMCS System Total
	document.getElementById('bmcs_system_total').innerHTML = '$'+bmcs_system_grand_total.toFixed(2);
	$('#bmcs_system_total_price').val(bmcs_system_grand_total.toFixed(2));
	//Calculation for BMCS with Laptop & Router Total
	var bmcs_with_laptop_router_total = bmcs_system_grand_total+parseFloat(option_laptop_router);

	//Show BMCS with Laptop & Router Total
	document.getElementById('bmcs_with_laptop').innerHTML = '$'+bmcs_with_laptop_router_total.toFixed(2);
	$('#bmcs_with_laptop_price').val(bmcs_with_laptop_router_total.toFixed(2));
}

//Add total cost and net price installation
function addMarkup(){
	var project_name = $('#project_name').val();
	if(project_name == ''){
		alert('Please enter your project name.');
		return false;
	}
	var percentage = $('#markup_percentage').val().split('%');
	var total_install_price = $('#total_install_price').html().split('$');
	var total_installation_price = total_install_price[1].replace(',','');
	var freight = $('#Freight').val().split('$')[1].replace(',','');
	var bmcs_system_total = $('#bmcs_system_total').html().split('$');
	var option_laptop_router = $('#option_laptop_router').val().split('$')[1].replace(',','');
	var bmcs_with_laptop = $('#bmcs_with_laptop').html().split('$');
	//Create markup percentge price
	var markup_price = (total_installation_price*percentage[0])/ 100;
	$('#markup_percentage_price').val(markup_price);

	//Calculation Of BMCS System Total
	var bmcs_system_grand_total = parseFloat(total_installation_price)+parseFloat(markup_price)+parseFloat(freight);

	//Calculation for BMCS with Laptop & Router Total
	var bmcs_with_laptop_router_total = bmcs_system_grand_total+parseFloat(option_laptop_router);
	//Display markup percentage price
	document.getElementById('markup_price').innerHTML = '$'+markup_price.toFixed(2);

	//Show BMCS System Total
	document.getElementById('bmcs_system_total').innerHTML = '$'+bmcs_system_grand_total.toFixed(2);
	$('#bmcs_system_total_price').val(bmcs_system_grand_total.toFixed(2));
	//Show BMCS with Laptop & Router Total
	document.getElementById('bmcs_with_laptop').innerHTML = '$'+bmcs_with_laptop_router_total.toFixed(2);
	$('#bmcs_with_laptop_price').val(bmcs_with_laptop_router_total.toFixed(2));
}


function freight_price(){
	var project_name = $('#project_name').val();
	if(project_name == ''){
		alert('Please enter your project name.');
		return false;
	}
	var Freight_quoets = $('#Freight').val().split('$')[1].replace(',','');
	var total_install_price = $('#total_install_price').html().split('$')[1].replace(',','');
	var markup_price_quotes = $('#markup_price').html().split('$')[1].replace(',','');
	document.getElementById('bmcs_system_total').innerHTML = '$'+(parseFloat(Freight_quoets)+parseFloat(total_install_price)+parseFloat(markup_price_quotes)).toFixed(2);
	$('#bmcs_system_total_price').val((parseFloat(Freight_quoets)+parseFloat(total_install_price)+parseFloat(markup_price_quotes)).toFixed(2));

	var bmcs_system_total = (parseFloat(Freight_quoets)+parseFloat(total_install_price)+parseFloat(markup_price_quotes)).toFixed(2);
	var option_laptop_router = $('#option_laptop_router').val().split('$')[1].replace(',','');
	document.getElementById('bmcs_with_laptop').innerHTML = '$'+(parseFloat(option_laptop_router)+parseFloat(bmcs_system_total)).toFixed(2);

	var bmcs_with_laptop_price = (parseFloat(option_laptop_router)+parseFloat(bmcs_system_total)).toFixed(2);
	$('#bmcs_with_laptop_price').val(bmcs_with_laptop_price);
}

//Calculation of Optional: Laptop & Router (includes mark-up) Price
function option_laptop_router_price(){
	var project_name = $('#project_name').val();
	if(project_name == ''){
		alert('Please enter your project name.');
		return false;
	}
	var option_laptop_router = $('#option_laptop_router').val().split('$')[1].replace(',','');
	var bmcs_system_total = $('#bmcs_system_total').html().split('$')[1].replace(',','');

	document.getElementById('bmcs_with_laptop').innerHTML = '$'+(parseFloat(option_laptop_router)+parseFloat(bmcs_system_total)).toFixed(2);

	var bmcs_with_laptop_price = (parseFloat(option_laptop_router)+parseFloat(bmcs_system_total)).toFixed(2);
	$('#bmcs_with_laptop_price').val(bmcs_with_laptop_price);
}

//Print functionality
function pricePrint() {
	var description_div = $('#description-summary').css('display');
	var config_div = $('#config-summary').css('display');
	var access_div = $('#access-summary').css('display');
	
	var print_div_id = '';
	if(description_div == 'block'){
		print_div_id = 'description-summary';
	}else if(config_div == 'block'){
		print_div_id = 'config-summary';
	}else{
		print_div_id = 'access-summary';
	}
  	
  	var divToPrint=document.getElementById(print_div_id);

  	var newWin=window.open('','Print-Window');

  	// newWin.document.open();
  	
  	if(print_div_id == 'description-summary'){
  		print_title = 'Price Quotes Description';
  	}else if(print_div_id == 'config-summary'){
  		print_title = 'Price Quotes Configuration';
  	}else{
  		print_title = 'Accessories';
  	}
  	newWin.document.title = print_title;
  	
  	newWin.document.write('<html><head><title>'+print_title+'</title></head><style>#btn{display:none}.table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th{border: 1px solid #000; text-align: center;}</style><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  	newWin.document.close();

  	setTimeout(function(){newWin.close();},10);

}


//Price Quotes Calculation From OnChange Event
$(document).ready(function(){
	//Onchange price calculation Master Kit,String Kit,Accessories 
	$('.quantity_class').on('change',function(){
		var id= $(this).attr('id').split('quantity_')[1].replace(',','');
		var quantity = $('#quantity_'+id).val();
		var net_price = $('#net_price_'+id).val().replace(',','');
		var project_name = $('#project_name').val();
		if(project_name == ''){
			alert('Please enter your project name.');
			return false;
		}

		if(net_price == "0.00"){
			var a =document.getElementById('totals_'+id).innerHTML = '$0.00';
			$('#master_totals_'+id).val('0.00');
			$('#string_totals_'+id).val('0.00');
			$('#acessories_single_total_price_'+id).val('0.00');
		}else{
			document.getElementById('totals_'+id).innerHTML = '$'+(quantity * net_price).toFixed(2);
			var total_val = (quantity * net_price).toFixed(2);
			$('#master_totals_'+id).val(total_val);
			$('#string_totals_'+id).val(total_val);
			$('#acessories_single_total_price_'+id).val(total_val);
		}
		var grand_m_price = 0;
		$('.m_totals').each(function(){
			var single_m_price = $(this).html().split('$');
			if(single_m_price != ''){
				var single_m =single_m_price[1].replace(",", ""); 
				grand_m_price += parseFloat(single_m);
			}

		});
		var grand_s_price = 0;
		$('.s_totals').each(function(){
			var single_s_price = $(this).html().split('$');
			if(single_s_price[1] != '' || single_s_price[1] != '0.00'){
				var single_s = single_s_price[1].replace(',','');
				grand_s_price += parseFloat(single_s);
			}
		});
		document.getElementById('m_grand_total').innerHTML = '$'+grand_m_price.toFixed(2);
		document.getElementById('s_grand_total').innerHTML = '$'+grand_s_price.toFixed(2);

		$('#grand_master_total').val(grand_m_price.toFixed(2));
		$('#grand_string_total').val(grand_s_price.toFixed(2));


		document.getElementById('net-kit-price').innerHTML = '$'+(grand_m_price+grand_s_price).toFixed(2);
		var accesories_pg = $('#accessories_pg').html().split('$')[1].replace(',','');
		var total_net_price = parseFloat(accesories_pg[1])+grand_m_price+grand_s_price;
		document.getElementById('total_net_price').innerHTML = '$'+total_net_price.toFixed(2);

		$('#accessories_total_main').val(parseFloat(accesories_pg).toFixed(2));
		$('#net_kit_total_main').val((grand_m_price+grand_s_price).toFixed(2));
		$('#m_s_acess_total_main').val(total_net_price.toFixed(2));

		var net_installation_total = $('#net_installation_total').html().split('$')[1].replace(',','');
		var percentage = $('#markup_percentage').val().split('%');
		var total_install_price = parseFloat(net_installation_total)+total_net_price;
		var freight = $('#Freight').val().split('$')[1].replace(',','');
		var option_laptop_router = $('#option_laptop_router').val().split('$')[1].replace(',','');
		// var bmcs_with_laptop = $('#bmcs_with_laptop').html().split('$');
		//Show total installation price
		document.getElementById('total_install_price').innerHTML = '$'+total_install_price.toFixed(2);
		//Create markup percentge price
		var markup_price = (total_install_price*percentage[0])/ 100;

		//Show Of markup percentge price
		document.getElementById('markup_price').innerHTML = '$'+markup_price.toFixed(2);

		//Calculation Of BMCS System Total
		var bmcs_system_grand_total = parseFloat(total_install_price)+parseFloat(markup_price)+parseFloat(freight);

		//Show BMCS System Total
		document.getElementById('bmcs_system_total').innerHTML = '$'+bmcs_system_grand_total.toFixed(2);
		$('#bmcs_system_total_price').val(bmcs_system_grand_total.toFixed(2));
		//Calculation for BMCS with Laptop & Router Total
		var bmcs_with_laptop_router_total = bmcs_system_grand_total+parseFloat(option_laptop_router);

		//Show BMCS with Laptop & Router Total
		document.getElementById('bmcs_with_laptop').innerHTML = '$'+bmcs_with_laptop_router_total.toFixed(2); 
		$('#bmcs_with_laptop_price').val(bmcs_with_laptop_router_total.toFixed(2));

		//onchange value of accessoriress total price
		var grand_access_price = 0;
		$('.total_accessories_price').each(function(){
			var single_access_price = $(this).html().split('$');
			if(single_access_price != ''){
				var single_access = single_access_price[1].replace(',','');
				grand_access_price += parseFloat(single_access);
			}
			
		});
		document.getElementById('acces_total').innerHTML = '$'+grand_access_price.toFixed(2);

		var accesories_pg = $('#acces_total').html().split('$');
		document.getElementById('accessories_pg').innerHTML = '$'+parseFloat(accesories_pg[1]).toFixed(2);
		$('#grand_total_access').val(grand_access_price.toFixed(2));

		var accesories_pg = $('#accessories_pg').html().split('$');
		var total_accessories_price = accesories_pg[1].replace(',','');
		var net_kit_price = $('#net-kit-price').html().split('$');
		var total_net_kit_price = net_kit_price[1].replace(',','');
		var total_net_price = parseFloat(total_accessories_price)+parseFloat(total_net_kit_price);
		document.getElementById('total_net_price').innerHTML = '$'+total_net_price.toFixed(2);

		var net_installation_total = $('#net_installation_total').html().split('$')[1].replace(',','');
		var percentage = $('#markup_percentage').val().split('%');
		var total_install_price = parseFloat(net_installation_total)+total_net_price;
		var freight = $('#Freight').val().split('$')[1].replace(',','');
		var option_laptop_router = $('#option_laptop_router').val().split('$')[1].replace(',','');
		// var bmcs_with_laptop = $('#bmcs_with_laptop').html().split('$');
		//Show total installation price
		document.getElementById('total_install_price').innerHTML = '$'+total_install_price.toFixed(2);
		//Create markup percentge price
		var markup_price = (total_install_price*percentage[0])/ 100;

		//Show Of markup percentge price
		document.getElementById('markup_price').innerHTML = '$'+markup_price.toFixed(2);

		//Calculation Of BMCS System Total
		var bmcs_system_grand_total = parseFloat(total_install_price)+parseFloat(markup_price)+parseFloat(freight);

		//Show BMCS System Total
		document.getElementById('bmcs_system_total').innerHTML = '$'+bmcs_system_grand_total.toFixed(2);
		$('#bmcs_system_total_price').val(bmcs_system_grand_total.toFixed(2));

		//Calculation for BMCS with Laptop & Router Total
		var bmcs_with_laptop_router_total = bmcs_system_grand_total+parseFloat(option_laptop_router);

		//Show BMCS with Laptop & Router Total
		document.getElementById('bmcs_with_laptop').innerHTML = '$'+bmcs_with_laptop_router_total.toFixed(2); 
		$('#bmcs_with_laptop_price').val(bmcs_with_laptop_router_total.toFixed(2));
	});

	//Create single price calculation on change event
	$('.net_price_class').on('change',function(){
		var id = $(this).attr('id').split('net_price_')[1].replace(',','');
		var quantity = $('#quantity_'+id).val();
		var net_price = $('#net_price_'+id).val().replace(',','');
		var project_name = $('#project_name').val();
		if(project_name == ''){
			alert('Please enter your project name.');
			return false;
		}

		if(net_price == "0.00"){
			var a =document.getElementById('totals_'+id).innerHTML = '$0.00';
			$('#master_totals_'+id).val('0.00');
			$('#string_totals_'+id).val('0.00');
			$('#acessories_single_total_price_'+id).val('0.00');
		}else{
			document.getElementById('totals_'+id).innerHTML = '$'+(quantity * net_price).toFixed(2);
			var total_val = (quantity * net_price).toFixed(2);
			$('#master_totals_'+id).val(total_val);
			$('#string_totals_'+id).val(total_val);
			$('#acessories_single_total_price_'+id).val(total_val);
		}
		var grand_m_price = 0;
		$('.m_totals').each(function(){
			var single_m_price = $(this).html().split('$');
			if(single_m_price != ''){
				var single_m =single_m_price[1].replace(",", ""); 
				grand_m_price += parseFloat(single_m);
			}

		});
		var grand_s_price = 0;
		$('.s_totals').each(function(){
			var single_s_price = $(this).html().split('$');
			if(single_s_price[1] != '' || single_s_price[1] != '0.00'){
				var single_s = single_s_price[1].replace(',','');
				grand_s_price += parseFloat(single_s);
			}
		});
		document.getElementById('m_grand_total').innerHTML = '$'+grand_m_price.toFixed(2);
		document.getElementById('s_grand_total').innerHTML = '$'+grand_s_price.toFixed(2);

		$('#grand_master_total').val(grand_m_price.toFixed(2));
		$('#grand_string_total').val(grand_s_price.toFixed(2));


		document.getElementById('net-kit-price').innerHTML = '$'+(grand_m_price+grand_s_price).toFixed(2);
		var accesories_pg = $('#accessories_pg').html().split('$')[1].replace(',','');
		var total_net_price = parseFloat(accesories_pg[1])+grand_m_price+grand_s_price;
		document.getElementById('total_net_price').innerHTML = '$'+total_net_price.toFixed(2);

		$('#accessories_total_main').val(parseFloat(accesories_pg).toFixed(2));
		$('#net_kit_total_main').val((grand_m_price+grand_s_price).toFixed(2));
		$('#m_s_acess_total_main').val(total_net_price.toFixed(2));

		var net_installation_total = $('#net_installation_total').html().split('$')[1].replace(',','');
		var percentage = $('#markup_percentage').val().split('%');
		var total_install_price = parseFloat(net_installation_total)+total_net_price;
		var freight = $('#Freight').val().split('$')[1].replace(',','');
		var option_laptop_router = $('#option_laptop_router').val().split('$')[1].replace(',','');
		// var bmcs_with_laptop = $('#bmcs_with_laptop').html().split('$');
		//Show total installation price
		document.getElementById('total_install_price').innerHTML = '$'+total_install_price.toFixed(2);
		//Create markup percentge price
		var markup_price = (total_install_price*percentage[0])/ 100;

		//Show Of markup percentge price
		document.getElementById('markup_price').innerHTML = '$'+markup_price.toFixed(2);

		//Calculation Of BMCS System Total
		var bmcs_system_grand_total = parseFloat(total_install_price)+parseFloat(markup_price)+parseFloat(freight);

		//Show BMCS System Total
		document.getElementById('bmcs_system_total').innerHTML = '$'+bmcs_system_grand_total.toFixed(2);
		$('#bmcs_system_total_price').val(bmcs_system_grand_total.toFixed(2));
		//Calculation for BMCS with Laptop & Router Total
		var bmcs_with_laptop_router_total = bmcs_system_grand_total+parseFloat(option_laptop_router);

		//Show BMCS with Laptop & Router Total
		document.getElementById('bmcs_with_laptop').innerHTML = '$'+bmcs_with_laptop_router_total.toFixed(2); 
		$('#bmcs_with_laptop_price').val(bmcs_with_laptop_router_total.toFixed(2));

		//onchange value of accessoriress total price
		var grand_access_price = 0;
		$('.total_accessories_price').each(function(){
			var single_access_price = $(this).html().split('$');
			if(single_access_price != ''){
				var single_access = single_access_price[1].replace(',','');
				grand_access_price += parseFloat(single_access);
			}
			
		});
		document.getElementById('acces_total').innerHTML = '$'+grand_access_price.toFixed(2);

		var accesories_pg = $('#acces_total').html().split('$');
		document.getElementById('accessories_pg').innerHTML = '$'+parseFloat(accesories_pg[1]).toFixed(2);
		$('#grand_total_access').val(grand_access_price.toFixed(2));

		var accesories_pg = $('#accessories_pg').html().split('$');
		var total_accessories_price = accesories_pg[1].replace(',','');
		var net_kit_price = $('#net-kit-price').html().split('$');
		var total_net_kit_price = net_kit_price[1].replace(',','');
		var total_net_price = parseFloat(total_accessories_price)+parseFloat(total_net_kit_price);
		document.getElementById('total_net_price').innerHTML = '$'+total_net_price.toFixed(2);

		var net_installation_total = $('#net_installation_total').html().split('$')[1].replace(',','');
		var percentage = $('#markup_percentage').val().split('%');
		var total_install_price = parseFloat(net_installation_total)+total_net_price;
		var freight = $('#Freight').val().split('$')[1].replace(',','');
		var option_laptop_router = $('#option_laptop_router').val().split('$')[1].replace(',','');
		// var bmcs_with_laptop = $('#bmcs_with_laptop').html().split('$');
		//Show total installation price
		document.getElementById('total_install_price').innerHTML = '$'+total_install_price.toFixed(2);
		//Create markup percentge price
		var markup_price = (total_install_price*percentage[0])/ 100;

		//Show Of markup percentge price
		document.getElementById('markup_price').innerHTML = '$'+markup_price.toFixed(2);

		//Calculation Of BMCS System Total
		var bmcs_system_grand_total = parseFloat(total_install_price)+parseFloat(markup_price)+parseFloat(freight);

		//Show BMCS System Total
		document.getElementById('bmcs_system_total').innerHTML = '$'+bmcs_system_grand_total.toFixed(2);
		$('#bmcs_system_total_price').val(bmcs_system_grand_total.toFixed(2));

		//Calculation for BMCS with Laptop & Router Total
		var bmcs_with_laptop_router_total = bmcs_system_grand_total+parseFloat(option_laptop_router);

		//Show BMCS with Laptop & Router Total
		document.getElementById('bmcs_with_laptop').innerHTML = '$'+bmcs_with_laptop_router_total.toFixed(2); 
		$('#bmcs_with_laptop_price').val(bmcs_with_laptop_router_total.toFixed(2)); 
	});
	//Create single installation calculation price on change event
	$('body').on('change','.price_installation_class',function(){
		var id = $(this).attr('id').split('single_install_price_')[1].replace(',','');
		var project_name = $('#project_name').val();
		if(project_name == ''){
			alert('Please enter your project name.');
			return false;
		}
		var quantity = $('#quantity_'+id).val();
		var single_install_price = $('#single_install_price_'+id).val().replace(',','');
		if(single_install_price == "0.00"){
			document.getElementById('single_total_install_price_'+id).innerHTML = '$0.00';
			$('#single_input_install_price_'+id).val('0.00');
		}else{
			document.getElementById('single_total_install_price_'+id).innerHTML = '$'+(quantity * single_install_price).toFixed(2);
			var total_single_installation = (quantity * single_install_price).toFixed(2);
			$('#single_input_install_price_'+id).val(total_single_installation);
		}

		var grand_installation_price = 0;
		$('.single_total_install_price').each(function(){
			var single_installation_price = $(this).html().split('$');
			if(single_installation_price != ''){
				var single_installation = single_installation_price[1].replace(',','');
				grand_installation_price += parseFloat(single_installation);
			}
			
		});

		//Show Net Total Installation price
		document.getElementById('net_installation_total').innerHTML = '$'+grand_installation_price.toFixed(2);


		var total_net_price = $('#total_net_price').html().split('$')[1].replace(',','');
		var percentage = $('#markup_percentage').val().split('%');
		var total_install_price = parseFloat(total_net_price)+grand_installation_price;
		var freight = $('#Freight').val().split('$')[1].replace(',','');
		var option_laptop_router = $('#option_laptop_router').val().split('$')[1].replace(',','');
		//Show total Total Cost /installation price
		document.getElementById('total_install_price').innerHTML = '$'+total_install_price.toFixed(2);
		//Create markup percentge price
		var markup_price = (total_install_price*percentage[0])/ 100;

		//Show Of markup percentge price
		document.getElementById('markup_price').innerHTML = '$'+markup_price.toFixed(2);

		//Calculation Of BMCS System Total
		var bmcs_system_grand_total = parseFloat(total_install_price)+parseFloat(markup_price)+parseFloat(freight);

		//Show BMCS System Total
		document.getElementById('bmcs_system_total').innerHTML = '$'+bmcs_system_grand_total.toFixed(2);
		$('#bmcs_system_total_price').val(bmcs_system_grand_total.toFixed(2));
		//Calculation for BMCS with Laptop & Router Total
		var bmcs_with_laptop_router_total = bmcs_system_grand_total+parseFloat(option_laptop_router);

		//Show BMCS with Laptop & Router Total
		document.getElementById('bmcs_with_laptop').innerHTML = '$'+bmcs_with_laptop_router_total.toFixed(2);
		$('#bmcs_with_laptop_price').val(bmcs_with_laptop_router_total.toFixed(2));
	});


	/**
		Create Installation Price Calculation
	**/

	$('.quantity_installation_class').on('change',function(){
		var id = $(this).attr('id').split('quantity_')[1].replace(',','');
		var quantity = $('#quantity_'+id).val().split();
		var single_install_price = $('#single_install_price_'+id).val().replace(',','');
		var project_name = $('#project_name').val();
		if(project_name == ''){
			alert('Please enter your project name.');
			return false;
		}
		if(single_install_price == "0.00"){
			document.getElementById('single_total_install_price_'+id).innerHTML = '$0.00';
			$('#single_input_install_price_'+id).val('0.00');
		}else{
			document.getElementById('single_total_install_price_'+id).innerHTML = '$'+(quantity * single_install_price).toFixed(2);
			var single_input_install_pricess = (quantity * single_install_price).toFixed(2);
			$('#single_input_install_price_'+id).val(single_input_install_pricess);
		}

		var grand_installation_price = 0;
		$('.single_total_install_price').each(function(){
			var single_installation_price = $(this).html().split('$');
			if(single_installation_price != ''){
				var single_installation = single_installation_price[1].replace(',','');
				grand_installation_price += parseFloat(single_installation);
			}
			
		});

		//Show Net Total Installation price
		document.getElementById('net_installation_total').innerHTML = '$'+grand_installation_price.toFixed(2);


		var total_net_price = $('#total_net_price').html().split('$')[1].replace(',','');
		var percentage = $('#markup_percentage').val().split('%');
		var total_install_price = parseFloat(total_net_price)+grand_installation_price;
		var freight = $('#Freight').val().split('$')[1].replace(',','');

		var option_laptop_router = $('#option_laptop_router').val().split('$')[1].replace(',','');
		//Show total Total Cost /installation price
		document.getElementById('total_install_price').innerHTML = '$'+total_install_price.toFixed(2);
		//Create markup percentge price
		var markup_price = (total_install_price*percentage[0])/ 100;

		//Show Of markup percentge price
		document.getElementById('markup_price').innerHTML = '$'+markup_price.toFixed(2);

		//Calculation Of BMCS System Total
		var bmcs_system_grand_total = parseFloat(total_install_price)+parseFloat(markup_price)+parseFloat(freight);

		//Show BMCS System Total
		document.getElementById('bmcs_system_total').innerHTML = '$'+bmcs_system_grand_total.toFixed(2);
		$('#bmcs_system_total_price').val(bmcs_system_grand_total.toFixed(2));

		//Calculation for BMCS with Laptop & Router Total
		var bmcs_with_laptop_router_total = bmcs_system_grand_total+parseFloat(option_laptop_router);

		//Show BMCS with Laptop & Router Total
		document.getElementById('bmcs_with_laptop').innerHTML = '$'+bmcs_with_laptop_router_total.toFixed(2);
		$('#bmcs_with_laptop_price').val(bmcs_with_laptop_router_total.toFixed(2)); 

	});
	
	

	// Only allow for price quantity numeric value
	$(".quantity_class").keydown(function (e) {

        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

	// Only allow  price installation class numeric value
	$(".price_installation_class").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

	// Only allow  single price numeric value
	$(".net_price_class").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });


    // Only Allow Freight price numeric value
	$("#Freight").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    // Only Allow Markup percentage numeric value
	$("#markup_percentage").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    // Only Allow Optional: Laptop & Router (includes mark-up) price numeric value
	$("#option_laptop_router").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });


//Show/hide next prev and tab menu
	$('#price-config-tab').click(function(){
		$('#access-summary').hide();
		$('#config-summary').show();
		// // $('#price-config-div').show();
		// $('#accessories-div').hide();
		$('#accessories-tab').show();
		$('#price-config-tab').hide();
		$('#price-submit').hide();
		$('#description-summary').hide();
		$('#description-prev-button').show();
		$('#price-description-tab-button').show();
		$('#accessories-tab-button').show();
		$('#description-tab-button').hide();
		$('#price-config-tab-button').hide();
		$('.button-quotes').removeClass('select'); 
        $('#price-config-div').addClass('select');
	});
	$('#accessories-tab').click(function(){
		var project_name = $('#project_name').val();
		if(project_name == ''){
			alert('Please enter your project name.');
			return false;
		}
		$('#access-summary').show();
		$('#config-summary').hide();
		// $('#price-config-div').hide();
		// $('#accessories-div').show();
		$('#accessories-tab').hide();
		$('#price-config-tab').show();
		$('#price-submit').show();
		$('#description-summary').hide();
		$('#description-prev-button').hide();
		$('.button-quotes').removeClass('select'); 
        $('#accessories-div').addClass('select');
	});
	$('#price-config-div').click(function(){
		$('#config-summary').show();
		$('#access-summary').hide();
		$('#accessories-tab').show();
		$('#accessories-tab-button').show();
		$('#description-tab-button').hide();
		$('#price-config-tab').hide();
		$('#price-submit').hide();
		$('#description-summary').hide();
		$('#price-description-tab-button').show();
		$('#price-config-tab-button').hide();
		$('#description-next-button').hide();
		$('#description-prev-button').show();
		$(this).addClass('select');
		$('.button-quotes').removeClass('select'); 
        $(this).addClass('select');
	});
	$('#accessories-div').click(function(){
		$('#access-summary').show();
		$('#config-summary').hide();
		$('#accessories-tab').hide();
		$('#price-config-tab').show();
		$('#price-submit').show();
		$('#description-summary').hide();
		$('#price-description-tab-button').hide();
		$('#description-tab-button').hide();
		$('#price-config-tab-button').show();
		$('#accessories-tab-button').hide();
		$('#description-prev-button').hide();
		$('#description-next-button').hide();
		$('.button-quotes').removeClass('select'); 
        $(this).addClass('select');
	});
	$('#price-config-tab-button').click(function(){
		$('#access-summary').hide();
		$('#config-summary').show();
		// // $('#price-config-div').show();
		// $('#accessories-div').hide();
		$('#accessories-tab-button').show();
		$('#price-config-tab-button').hide();
		$('#accessories-tab').show();
		$('#price-config-tab').hide();
		$('#price-submit').hide();
		$('#description-summary').hide();
		$('#price-description-tab-button').show();
		$('.button-quotes').removeClass('select'); 
        $('#price-config-div').addClass('select');
        $('#description-prev-button').show();
	});
	$('#accessories-tab-button').click(function(){
		$('#access-summary').show();
		$('#config-summary').hide();
		// $('#price-config-div').hide();
		// $('#accessories-div').show();
		$('#accessories-tab-button').hide();
		$('#price-config-tab-button').show();
		$('#price-submit').show();
		$('#accessories-tab').hide();
		$('#price-config-tab').show();
		$('#description-summary').hide();
		$('#description-prev-button').hide();
		$('#price-description-tab-button').hide();
		$('.button-quotes').removeClass('select'); 
        $('#accessories-div').addClass('select');
	});
	$('#price-quotes-description').click(function(){
		$('#description-summary').show();
		$('#config-summary').hide();
		$('#access-summary').hide();
		$('#price-description-tab-button').hide();
		$('#description-prev-button').hide();
		$('#price-config-tab').hide();
		$('#description-next-button').show();
		$('#accessories-tab').hide();
		$('.button-quotes').removeClass('select'); 
        $('#price-quotes-description').addClass('select');
        $('#price-description-tab-button').hide();
        $('#description-tab-button').show();
        $('#accessories-tab-button').hide();
        $('#price-submit').hide();
        $('#price-config-tab-button').hide();
	});
	$('#description-tab-button').click(function(){
		$('#description-summary').hide();
		$('#config-summary').show();
		$('#access-summary').hide();
		$('#description-tab-button').hide();
		$('#accessories-tab-button').show();
		$('#price-description-tab-button').show();
		$('.button-quotes').removeClass('select'); 
        $('#price-config-div').addClass('select');
        $('#description-prev-button').show();
        $('#accessories-tab').show();
        $('#description-next-button').hide();
	});
	$('#price-description-tab-button').click(function(){
		$('#description-summary').show();
		$('#config-summary').hide();
		$('#access-summary').hide();
		$('#price-config-tab-button').hide();
		$('#description-tab-button').show();
		$('#accessories-tab-button').hide();
		$('#price-description-tab-button').hide();
		$('.button-quotes').removeClass('select'); 
        $('#price-quotes-description').addClass('select');
	});
	$('#description-next-button').click(function(){
		$('#description-summary').hide();
		$('#config-summary').show();
		$('#access-summary').hide();
		$('#description-prev-button').show();
		$('#description-tab-button').hide();
		$('#accessories-tab-button').show();
		$('#accessories-tab').show();
		$('#description-next-button').hide();
		$('#price-description-tab-button').show();
		$('.button-quotes').removeClass('select'); 
        $('#price-config-div').addClass('select');
	});
	$('#description-prev-button').click(function(){
		$('#description-summary').show();
		$('#config-summary').hide();
		$('#access-summary').hide();
		$('#price-config-tab-button').hide();
		$('#description-tab-button').show();
		$('#accessories-tab-button').hide();
		$('#description-prev-button').hide();
		$('#description-next-button').show();
		$('#accessories-tab').hide();
		$('#price-description-tab-button').hide();
		$('.button-quotes').removeClass('select'); 
        $('#price-quotes-description').addClass('select');
	});
	$('#price-description-tab-button').click(function(){
		$('#description-prev-button').hide();
		$('#description-next-button').show();
		$('#accessories-tab').hide()
	});
	$('#print-button').click(function(){
		$('.button-quotes').removeClass('select'); 
        $('#btn').addClass('select');
	});
	$('#pdf-button').click(function(){
		$('.button-quotes').removeClass('select'); 
        $('#pdf-button').addClass('select');
	});
});