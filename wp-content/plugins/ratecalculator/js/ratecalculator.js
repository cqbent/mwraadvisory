jQuery(document).ready(function () {
    /************************ range slider start *********************/

    jQuery(function () {
        jQuery("#range-slider-1").slider({
            range: "max",
            min: 0,
            max: 15000,
            value: 1,
            slide: function (event, ui) {
                jQuery("#kgl").text(ui.value);

                jQuery("#cubic_feet").text(Math.round(ui.value / 0.748));
                jQuery("input[name=kgl_water_usages]").val(ui.value);
                jQuery("input[name=hcf_water_usages]").val(Math.round(ui.value / 0.748));

                calculate_rate();

            }
        });


        jQuery("#range-slider-2").slider({
            range: "max",
            min: 0,
            max: 100,
            value: 1,
            slide: function (event, ui) {
                jQuery("input[name=watrt_raising_rates]").val(ui.value);

                if (jQuery('input[name=kgl_water_usages]').val() == "" || jQuery('input[name=kgl_water_usages]').val() == 0) {
                    reset_hidden_field_box();

                }

                var service_type = jQuery("input:radio[name=service_type]:checked").val();

                if (service_type == 'Water Bill') {

                    var increament = ui.value;


                    var rate = parseFloat(jQuery('input[name=water_rate_calculation]').val());
                    var final_rate = rate + (rate * increament / 100);
                    jQuery('.calculation_result').text(delimitNumbers(final_rate.toFixed(2)));
                    jQuery('input[name=water_rate_calculation_increased]').val(final_rate);


                    var water_rate_monthly = parseFloat(jQuery('input[name=water_rate_calculation_monthly]').val());

                    var final_rate_monthly = water_rate_monthly + (water_rate_monthly * increament / 100);
                    jQuery('.montly_calculation_result').text(delimitNumbers(final_rate_monthly.toFixed(2)));
                    jQuery('input[name=water_rate_calculation_monthly_increased]').val(final_rate_monthly);


                    var water_rate_annual = parseFloat(jQuery('input[name=water_rate_calculation_annual]').val());
                    var final_rate_annual = water_rate_monthly + (water_rate_annual * increament / 100);
                    jQuery('.frequency_based_calculation_result').text(delimitNumbers(final_rate_annual.toFixed(2)));
                    jQuery('input[name=water_rate_calculation_monthly_increased]').val(final_rate_annual);


                } else {

                    var increament = ui.value;
                    var water_rate = parseFloat(jQuery('input[name=water_rate_calculation]').val());
                    var water_rate_calculation_monthly = parseFloat(jQuery('input[name=water_rate_calculation_monthly]').val());
                    var water_rate_calculation_annual = parseFloat(jQuery('input[name=water_rate_calculation_annual]').val());


                    var sewer_rate_calculation_increased = jQuery('input[name=sewer_rate_calculation_increased]').val();
                    var sewer_rate_calculation_monthly_increased = jQuery('input[name=sewer_rate_calculation_monthly_increased]').val();
                    var water_rate_calculation_annual_increased = jQuery('input[name=water_rate_calculation_annual_increased]').val();

                    var sewer_rate_calculation = jQuery('input[name=sewer_rate_calculation]').val();
                    var sewer_rate_calculation_monthly = jQuery('input[name=sewer_rate_calculation_monthly]').val();
                    var sewer_rate_calculation_annual = jQuery('input[name=sewer_rate_calculation_annual]').val();


                    if (sewer_rate_calculation_increased != '') {
                        var final_rate = parseFloat(sewer_rate_calculation_increased) + water_rate + (water_rate * increament / 100);
                    } else {
                        var final_rate = parseFloat(sewer_rate_calculation) + water_rate + (water_rate * increament / 100);
                    }


                    if (sewer_rate_calculation_monthly_increased != '') {
                        var final_rate_monthly = parseFloat(sewer_rate_calculation_monthly_increased) + water_rate_calculation_monthly + (water_rate_calculation_monthly * increament / 100);
                    } else {
                        var final_rate_monthly = parseFloat(sewer_rate_calculation_monthly) + water_rate_calculation_monthly + (water_rate_calculation_monthly * increament / 100);
                    }


                    if (water_rate_calculation_annual_increased != '') {
                        var final_rate_annualy = parseFloat(water_rate_calculation_annual_increased) + water_rate + (water_rate * increament / 100);
                    } else {
                        var final_rate_annualy = parseFloat(sewer_rate_calculation_annual) + water_rate + (water_rate * increament / 100);
                    }


                    jQuery('input[name=water_rate_calculation_increased]').val(water_rate + (water_rate * increament / 100));

                    jQuery('.montly_calculation_result').text(delimitNumbers(final_rate_monthly.toFixed(2)));
                    jQuery('.frequency_based_calculation_result').text(delimitNumbers(final_rate_annualy.toFixed(2)));

                }


                jQuery('.calculation_result').text(delimitNumbers(final_rate.toFixed(2)));


            }
        });

        jQuery("#range-slider-3").slider({
            range: "max",
            min: 0,
            max: 100,
            value: 1,
            slide: function (event, ui) {
                jQuery("input[name=sewer_raising_rates]").val(ui.value);

                if (jQuery('input[name=kgl_water_usages]').val() == "" || jQuery('input[name=kgl_water_usages]').val() == 0) {

                    reset_hidden_field_box();
                }

                if (jQuery('input[name=kgl_water_usages]').val() != "") {

                    var service_type = jQuery("input:radio[name=service_type]:checked").val();

                    if (service_type == 'Sewer Bill') {

                        var increament = ui.value;

                        var rate = parseFloat(jQuery('input[name=sewer_rate_calculation]').val());
                        var final_rate = rate + (rate * increament / 100);
                        jQuery('.calculation_result').text(delimitNumbers(final_rate.toFixed(2)));
                        jQuery('input[name=sewer_rate_calculation_increased]').val(final_rate);


                        var sewer_rate_monthly = parseFloat(jQuery('input[name=sewer_rate_calculation_monthly]').val());

                        var final_rate_monthly = sewer_rate_monthly + (sewer_rate_monthly * increament / 100);
                        jQuery('.montly_calculation_result').text(delimitNumbers(final_rate_monthly.toFixed(2)));
                        jQuery('input[name=sewer_rate_calculation_monthly_increased]').val(final_rate_monthly);


                        var sewer_rate_annual = parseFloat(jQuery('input[name=sewer_rate_calculation_annual]').val());
                        var final_sewer_rate_annual = sewer_rate_annual + (sewer_rate_annual * increament / 100);
                        jQuery('.frequency_based_calculation_result').text(delimitNumbers(final_sewer_rate_annual.toFixed(2)));
                        jQuery('input[name=water_rate_calculation_monthly_increased]').val(final_sewer_rate_annual);


                    } else {

                        var increament = ui.value;
                        var sewer_rate = parseInt(jQuery('input[name=sewer_rate_calculation]').val());
                        var sewer_rate_monthly = parseInt(jQuery('input[name=sewer_rate_calculation_monthly]').val());
                        var sewer_rate_annual = parseInt(jQuery('input[name=sewer_rate_calculation_annual]').val());
                        var water_rate_calculation = jQuery('input[name=water_rate_calculation]').val();

                        var water_rate_calculation_increased = jQuery('input[name=water_rate_calculation_increased]').val();
                        var water_rate_calculation_monthly_increased = jQuery('input[name=water_rate_calculation_monthly_increased]').val();
                        var water_rate_calculation_annual_increased = jQuery('input[name=water_rate_calculation_annual_increased]').val();


                        if (water_rate_calculation_increased != '') {
                            var final_rate = parseInt(water_rate_calculation_increased) + sewer_rate + (sewer_rate * increament / 100);
                        } else {
                            var final_rate = parseInt(water_rate_calculation) + sewer_rate + (sewer_rate * increament / 100);
                        }

                        if (water_rate_calculation_monthly_increased != '') {
                            var final_rate_monthly = parseInt(water_rate_calculation_monthly_increased) + sewer_rate_monthly + (sewer_rate_monthly * increament / 100);
                        } else {
                            var final_rate_monthly = parseInt(water_rate_calculation) + sewer_rate_monthly + (sewer_rate_monthly * increament / 100);
                        }

                        if (water_rate_calculation_annual_increased != '') {
                            var final_rate_annual = parseInt(water_rate_calculation_annual_increased) + sewer_rate_annual + (sewer_rate_annual * increament / 100);
                        } else {
                            var final_rate_annual = parseInt(water_rate_calculation) + sewer_rate_annual + (sewer_rate_annual * increament / 100);
                        }


                        jQuery('input[name=sewer_rate_calculation_increased]').val(sewer_rate + (sewer_rate * increament / 100));


                        jQuery('.montly_calculation_result').text(delimitNumbers(final_rate_monthly.toFixed(2)));
                        jQuery('.frequency_based_calculation_result').text(delimitNumbers(final_rate_annual.toFixed(2)));
                    }


                    jQuery('.calculation_result').text(delimitNumbers(final_rate.toFixed(2)));


                }
            }

        });


    });

    /************************ range slider end *********************/
    jQuery('.counter').each(function () {
        var jQuerythis = jQuery(this),
            countTo = jQuerythis.attr('data-count');

        jQuery({countNum: jQuerythis.text()}).animate({
                countNum: countTo
            },

            {

                duration: 4000,
                easing: 'linear',
                step: function () {
                    jQuerythis.text(Math.floor(this.countNum));
                },
                complete: function () {
                    jQuerythis.text(this.countNum);

                }

            });
    });
});


jQuery('#frequency').change(function () {

    calculate_rate();
});


jQuery('input[name=kgl_water_usages]').change(function () {

    var input_value = parseInt(jQuery(this).val());

    if (jQuery(this).val() == '') {


        jQuery('input[name=kgl_water_usages]').val('');
        jQuery("#kgl").text('0');
        jQuery("#cubic_feet").text('0');
        jQuery(".calculation_result").text('0');
        jQuery('#range-slider-1').children('.ui-slider-range-max').attr('style', 'width:100%');
        jQuery('#range-slider-1').children('.ui-slider-handle').attr('style', 'left:0%');
        return false;

    }

    if (input_value <= 15000) {

        // var element_lenght = input_value * 1000;
        var element_lenght = input_value;
        var width = element_lenght / 15000;
        var width_percentage = 100 - (width * 100);
        var width_left = width * 100;

        jQuery('#range-slider-1').children('.ui-slider-range-max').attr('style', 'width:' + width_percentage + '%');
        jQuery('#range-slider-1').children('.ui-slider-handle').attr('style', 'left:' + width_left + '%');

    } else {

        jQuery('#range-slider-1').children('.ui-slider-range-max').attr('style', 'width:0%');
        jQuery('#range-slider-1').children('.ui-slider-handle').attr('style', 'left:100%');
    }
    jQuery('input[name=hcf_water_usages]').val(Math.round(input_value / 0.748));

    jQuery("#cubic_feet").text(Math.round(input_value / 0.748));
    jQuery("#kgl").text(input_value);
    calculate_rate();
});


jQuery('input[name=hcf_water_usages]').change(function () {

    var input_value = parseInt(jQuery(this).val());

    if (jQuery(this).val() == '') {

        jQuery('input[name=kgl_water_usages]').val('');
        jQuery("#kgl").text('0');
        jQuery("#cubic_feet").text('0');
        jQuery(".calculation_result").text('0');
        jQuery('.montly_calculation_result').text(0);
        jQuery('.frequency_based_calculation_result').text(0);

        jQuery('#range-slider-1').children('.ui-slider-range-max').attr('style', 'width:100%');
        jQuery('#range-slider-1').children('.ui-slider-handle').attr('style', 'left:0%');
        return false;
    }


    if (input_value <= 20053) {
        element_lenght = input_value;

        var width = element_lenght / 15000;
        var width_percentage = 100 - (width * 100);
        var width_left = width * 100;
        jQuery('#range-slider-1').children('.ui-slider-range-max').attr('style', 'width:' + width_percentage + '%');
        jQuery('#range-slider-1').children('.ui-slider-handle').attr('style', 'left:' + width_left + '%');

    } else {

        jQuery('#range-slider-1').children('.ui-slider-range-max').attr('style', 'width:0%');
        jQuery('#range-slider-1').children('.ui-slider-handle').attr('style', 'left:100%');
    }
    if (!isNaN(input_value)) {
        jQuery('input[name=kgl_water_usages]').val(input_value * 0.748);

        jQuery("#kgl").text(input_value * 0.748);
        jQuery("#cubic_feet").text(input_value);
    } else {

        jQuery('input[name=kgl_water_usages]').val('');

        jQuery("#kgl").text('');
        jQuery("#cubic_feet").text('');
    }

    calculate_rate();

});


jQuery('input[name=watrt_raising_rates]').change(function () {

    var element_lenght = parseFloat(jQuery(this).val());
    jQuery('input[name=rate_slider]').val(element_lenght);
    var width_percentage = 100 - element_lenght;
    var width_left = element_lenght;

    if (element_lenght <= 100) {

        jQuery('#range-slider-2').children('.ui-slider-range-max').attr('style', 'width:' + width_percentage + '%');
        jQuery('#range-slider-2').children('.ui-slider-handle').attr('style', 'left:' + width_left + '%');

    } else {
        jQuery('#range-slider-2').children('.ui-slider-range-max').attr('style', 'width:0%');
        jQuery('#range-slider-2').children('.ui-slider-handle').attr('style', 'left:100%');
    }

    cal_water_increased_percentage();
});


jQuery('input[name=sewer_raising_rates]').change(function () {

    var element_lenght = parseFloat(jQuery(this).val());

    jQuery('input[name=rate_slider]').val(element_lenght);
    var width_percentage = 100 - element_lenght;
    var width_left = element_lenght;
    if (element_lenght <= 100) {

        jQuery('#range-slider-3').children('.ui-slider-range-max').attr('style', 'width:' + width_percentage + '%');
        jQuery('#range-slider-3').children('.ui-slider-handle').attr('style', 'left:' + width_left + '%');

    } else {

        jQuery('#range-slider-3').children('.ui-slider-range-max').attr('style', 'width:0%');
        jQuery('#range-slider-3').children('.ui-slider-handle').attr('style', 'left:100%');
    }

    cal_sew_increased_percentage();
});


jQuery(document).ready(function ($) {

    jQuery('#state-box').change(function () {
        var state = jQuery(this).val();

        jQuery("#modal-overlay").show();
        jQuery.ajax({
            type: "POST",
            url: "/wp-admin/admin-ajax.php",

            data: {action: "get_community", state: state},
            success: function (reponse) {
                jQuery('#community-box').html(reponse);
                jQuery("#modal-overlay").hide();
            }
        });
    });


    jQuery('input[name=calculat_rate]').click(function () {

        calculate_rate();
    });


});


// fucntion to reset all increement

function reset_increments() {

    jQuery("input[name=sewer_raising_rates]").val("");
    jQuery("input[name=watrt_raising_rates]").val("");

    jQuery('#range-slider-2').children('.ui-slider-range-max').attr('style', 'width:100%');
    jQuery('#range-slider-2').children('.ui-slider-handle').attr('style', 'left:0%');

    jQuery('#range-slider-3').children('.ui-slider-range-max').attr('style', 'width:100%');
    jQuery('#range-slider-3').children('.ui-slider-handle').attr('style', 'left:0%');
}


// function to set delemeter in number

function delimitNumbers(str) {
    return (str + "").replace(/\b(\d+)((\.\d+)*)\b/g, function (a, b, c) {
        return (b.charAt(0) > 0 && !(c || ".").lastIndexOf(".") ? b.replace(/(\d)(?=(\d{3})+$)/g, "$1,") : b) + c;
    });
}


// function to get used water quanity to calculate bill

function get_total_water_usages(selected_frequency, billing_frequency, water_usages) {

    switch (selected_frequency) {
        case 1:
            water_usages = water_usages * 1;
            break;
        case 2:
            water_usages = water_usages * 2;
            break;
        case 3:
            water_usages = water_usages * 3;
            break;
        case 4:

            water_usages = water_usages * 4;
            break;
        case 6:

            water_usages = water_usages * 6;
            break;
        case 12:

            water_usages = water_usages * 12;
            break;
    }

    return water_usages;
}


// function to get used sewer quantity to calculate bill

function get_total_sewer_usages(billing_frequency, water_usages) {


    switch (billing_frequency) {
        case 1:
            water_usages = water_usages * 1;
            break;
        case 2:
            water_usages = water_usages * 2;
            break;
        case 3:
            water_usages = water_usages * 3;
            break;
        case 4:
            water_usages = water_usages * 4;
            break;
        case 6:
            water_usages = water_usages * 6;
            break;
        case 12:
            water_usages = water_usages * 12;
            break;
    }


    return water_usages;
}


// function to reset all hidden field
function reset_hidden_field_box() {

    jQuery('#hidden-field-box input[type="hidden"]').each(function () {
        jQuery(this).val(0);
    });

}


// function to get water uses converted

function converted_water_usages() {

    var billing_frequency = parseInt(jQuery('#water_frequency').val());
    var rate_calculation_way = jQuery('#rate_calculation_way_water').val();

    var service_type = jQuery("input:radio[name=service_type]:checked").val();

    var unit_type_water = jQuery('#unit_type_water').val();
    var unit_type_sewer = jQuery('#unit_type_sewer').val();


    //alert('rate_calculation_way='+rate_calculation_way);

    //if(rate_calculation_way == "1")
    if ((unit_type_water == "2") || (unit_type_sewer == "2")) {
        var water_usages = parseFloat(jQuery('input[name=kgl_water_usages]').val()); // KGL
    } else {
        var water_usages = parseFloat(jQuery('input[name=hcf_water_usages]').val()); // HCF

    }

    //alert(water_usages);


    var selected_frequency = parseInt(jQuery('#frequency').val());


    switch (selected_frequency) {
        case 1:
            water_usages = 1 * water_usages;
            break;
        case 2:
            water_usages = 2 * water_usages;
            break;
        case  3:
            water_usages = 12 * water_usages;
            break;
        case 4:
            water_usages = 4 * water_usages;
            break;
        case 12:
            water_usages = 12 * water_usages;
    }

    jQuery('#converted_water_usages').val(water_usages);


}


// Script for searchable drop down
jQuery("#state-box").change(function () {
    jQuery('#community-box').html('<option value="">&nbsp;</option>');
    //  jQuery('#community-box').val("").trigger("change");
});


jQuery(document).ready(function () {
    jQuery("#community-box").select2({
        placeholder: "Select a Community",
        allowClear: true

    });
});


jQuery(document).ready(function () {
    jQuery("#year-box").select2({
        placeholder: "Select a Community",
        allowClear: true
    });
});