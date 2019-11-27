jQuery(document).ready(function(){

    if ($('.gform_wrapper').length > 0) {
        if ($('#gform_38').length > 0) {
            var href = jQuery('a.resume_form_link').attr('href');
            var onclick_url = "location.href='" + href + "'";

            jQuery('.form_saved_message_emailform #gform_38').append('<input id="gform_cancle_button_38_1"  value="Cancel" onclick="' + onclick_url + '"  type="button">');

            jQuery('.form_saved_message_emailform #gform_38 input[type="submit"], .form_saved_message_emailform #gform_38 input[type="button"]').wrapAll('<div style="width:100%;text-align:center">');

            jQuery('.form_saved_message_emailform #gform_38 input[type="submit"]').attr('style', 'display:inline-block; margin-right:15px;');
            jQuery('.form_saved_message_emailform #gform_38 input[type="button"]').attr('style', 'margin: 12px auto 0;');

        }

        jQuery(document).bind('gform_page_loaded', function (event, form_id, current_page) {

            if (form_id == '38' && current_page == '3') {

                if ((jQuery('#input_38_32').val() == '') || (jQuery('#input_38_33').val() == '') || (jQuery('#input_38_41').val() == '') || (jQuery('#input_38_42').val() == '') || (jQuery('#input_38_50').val() == '') || (jQuery('#input_38_51').val() == '')) {

                    var confirmMsg = '';

                    if (jQuery('#input_38_32').val() == '') {

                        confirmMsg += 'Fund Type (Select One) Water is empty.\n';
                    }
                    if (jQuery('#input_38_33').val() == '') {

                        confirmMsg += 'Fund Type (Select One) Sewer is empty.\n';
                    }
                    if (jQuery('#input_38_41').val() == '') {

                        confirmMsg += 'Date Last Adjusted (Year) Water is empty.\n';
                    }
                    if (jQuery('#input_38_42').val() == '') {

                        confirmMsg += 'Date Last Adjusted (Year) Sewer is empty.\n';
                    }
                    if (jQuery('#input_38_50').val() == '') {

                        confirmMsg += 'Billing Frequency (Water) is empty.\n';
                    }
                    if (jQuery('#input_38_50').val() == '') {

                        confirmMsg += 'Billing Frequency (Sewer) is empty.\n';
                    }
                    var field1 = jQuery('#input_38_51').attr('name');

                    var confirmMsg1 = confirm(confirmMsg + 'Do you want to continue with the survey ?');
                    if (confirmMsg1) {
                        return true;
                    } else {

                        go_to_back(2);
                        return false;
                    }
                }

            }


            if (form_id == '62' && current_page == '3') {

                if ((jQuery('#input_62_32').val() == '') || (jQuery('#input_62_33').val() == '') || (jQuery('#input_62_41').val() == '') || (jQuery('#input_62_42').val() == '') || (jQuery('#input_62_50').val() == '') || (jQuery('#input_62_51').val() == '')) {

                    var confirmMsg = '';

                    if (jQuery('#input_62_32').val() == '') {

                        confirmMsg += 'Fund Type (Select One) Water is empty.\n';
                    }
                    if (jQuery('#input_62_33').val() == '') {

                        confirmMsg += 'Fund Type (Select One) Sewer is empty.\n';
                    }
                    if (jQuery('#input_62_41').val() == '') {

                        confirmMsg += 'Date Last Adjusted (Year) Water is empty.\n';
                    }
                    if (jQuery('#input_62_42').val() == '') {

                        confirmMsg += 'Date Last Adjusted (Year) Sewer is empty.\n';
                    }
                    if (jQuery('#input_62_50').val() == '') {

                        confirmMsg += 'Billing Frequency (Water) is empty.\n';
                    }
                    if (jQuery('#input_62_50').val() == '') {

                        confirmMsg += 'Billing Frequency (Sewer) is empty.\n';
                    }
                    var field1 = jQuery('#input_62_51').attr('name');

                    var confirmMsg1 = confirm(confirmMsg + 'Do you want to continue with the survey ?');
                    if (confirmMsg1) {
                        return true;
                    } else {

                        go_to_back_62(2);
                        return false;
                    }
                }

            }


            if (form_id == '38' && current_page == '4') {

                if ((jQuery('#input_38_58').val() == '') || (jQuery('#input_38_59').val() == '')) {

                    var confirmMsg = '';

                    if (jQuery('#input_38_58').val() == '') {

                        confirmMsg += 'Please Select (Water) is empty.\n';
                    }
                    if (jQuery('#input_38_59').val() == '') {

                        confirmMsg += 'Please Select (Sewer) is empty.\n';
                    }
                    var field1 = jQuery('#input_38_51').attr('name');

                    var confirmMsg1 = confirm(confirmMsg + 'Do you want to continue with the survey ?');
                    if (confirmMsg1) {
                        return true;
                    } else {

                        go_to_back(3);
                        return false;
                    }


                }

            }


            if (form_id == '62' && current_page == '4') {


                if (jQuery('#choice_62_165_1').prop('checked')) {


                    gform.addAction('gform_post_conditional_logic_field_action', function (formId, action, targetId, defaultValues, isInit) {

                        if ((targetId == '#field_62_54' && action == 'hide') || (targetId == '#field_62_183' && action == 'hide')) {

                            var select_minimum_type_water = jQuery('#input_62_171').val();

                            if (select_minimum_type_water != '') {

                                jQuery('.gfield_list_54_cell3 select[title="Unit"] option').each(function () {

                                    if (jQuery(this).val() == select_minimum_type_water) {

                                        jQuery(this).attr('selected', 'selected');
                                        jQuery(this).attr('readonly', 'readonly');
                                    }
                                });
                                jQuery('.gfield_list_54_cell3 select[title="Unit"]').attr('readonly', 'readonly');
                                jQuery('.gfield_list_54_cell3 select[title="Unit"]').addClass('not-active');


                                jQuery('.gfield_list_183_cell3 select[title="Unit"] option').each(function () {

                                    if (jQuery(this).val() == select_minimum_type_water) {
                                        jQuery(this).attr('selected', 'selected');
                                    }
                                });
                                jQuery('.gfield_list_183_cell3 select[title="Unit"]').attr('readonly', 'readonly');


                                jQuery('.gfield_list_186_cell3 select[title="Unit"] option').each(function () {

                                    if (jQuery(this).val() == select_minimum_type_water) {
                                        jQuery(this).attr('selected', 'selected');
                                    }
                                });

                                jQuery('.gfield_list_186_cell3 select[title="Unit"]').attr('readonly', 'readonly');
                                jQuery('.gfield_list_186_cell3 select[title="Unit"]').addClass('not-active');


                            }


                            var minimum_fee_include_water = jQuery('#input_62_173').val();

                            if (minimum_fee_include_water != '') {

                                //jQuery('.gfield_list_54_cell2 input').each(function(i, el){
                                // jQuery(this).attr('onblur','compare_minimum_amount_qnt(this,"'+minimum_fee_include_water+'")');

                                // if ( i === 0) {
                                // Will be done to first element.
                                //  jQuery(this).val(minimum_fee_include_water);
                                //     jQuery(this).attr('disabled','true');
                                //}


                                // });


                                var fee_water_amount = jQuery('#input_62_60').val();


                                jQuery('.gfield_list_54_cell1 input:first').val(0);
                                jQuery('.gfield_list_54_cell1 input:first').attr('readonly', 'readonly');
                                jQuery('.gfield_list_54_cell2 input:first').val(minimum_fee_include_water);
                                jQuery('.gfield_list_54_cell2 input:first').attr('readonly', 'readonly');

                                jQuery('.gfield_list_54_cell4 input:first').val(fee_water_amount);
                                jQuery('.gfield_list_54_cell4 input:first').attr('readonly', 'readonly');


                                jQuery('.gfield_list_183_cell1 input:first').val(0);
                                jQuery('.gfield_list_183_cell1 input:first').attr('readonly', 'readonly');
                                jQuery('.gfield_list_183_cell2 input:first').val(minimum_fee_include_water);
                                jQuery('.gfield_list_183_cell2 input:first').attr('readonly', 'readonly');

                                jQuery('.gfield_list_183_cell4 input:first').val(fee_water_amount);
                                jQuery('.gfield_list_183_cell4 input:first').attr('readonly', 'readonly');


                                jQuery('.gfield_list_186_cell1 input:first').val(0);
                                jQuery('.gfield_list_186_cell1 input:first').attr('readonly', 'readonly');
                                jQuery('.gfield_list_186_cell2 input:first').val(minimum_fee_include_water);
                                jQuery('.gfield_list_186_cell2 input:first').attr('readonly', 'readonly');

                                jQuery('.gfield_list_186_cell4 input:first').val(fee_water_amount);
                                jQuery('.gfield_list_186_cell4 input:first').attr('readonly', 'readonly');


                                //   jQuery('.gfield_list_183_cell2 input').each(function(){
                                //             jQuery(this).attr('onblur','compare_minimum_amount_qnt(this,"'+minimum_fee_include_water+'")');
                                //   });


                                //   jQuery('.gfield_list_186_cell2 input').each(function(){
                                //             jQuery(this).attr('onblur','compare_minimum_amount_qnt(this,"'+minimum_fee_include_water+'")');
                                //   });


                            }

                        }

                    });


                } else {
                    // auto fill unit type water
                    var select_minimum_type_water = jQuery('#input_62_274').val();


                    //var select_minimum_type_water  = jQuery('#input_62_171').val();

                    if (select_minimum_type_water != '') {

                        jQuery('.gfield_list_54_cell3 select[title="Unit"] option').each(function () {

                            if (jQuery(this).val() == select_minimum_type_water) {

                                jQuery(this).attr('selected', 'selected');
                                jQuery(this).attr('readonly', 'readonly');
                            }
                        });
                        jQuery('.gfield_list_54_cell3 select[title="Unit"]').attr('readonly', 'readonly');
                        jQuery('.gfield_list_54_cell3 select[title="Unit"]').addClass('not-active');


                        jQuery('.gfield_list_183_cell3 select[title="Unit"] option').each(function () {

                            if (jQuery(this).val() == select_minimum_type_water) {
                                jQuery(this).attr('selected', 'selected');
                            }
                        });
                        jQuery('.gfield_list_183_cell3 select[title="Unit"]').attr('readonly', 'readonly');


                        jQuery('.gfield_list_186_cell3 select[title="Unit"] option').each(function () {

                            if (jQuery(this).val() == select_minimum_type_water) {
                                jQuery(this).attr('selected', 'selected');
                            }
                        });

                        jQuery('.gfield_list_186_cell3 select[title="Unit"]').attr('readonly', 'readonly');
                        jQuery('.gfield_list_186_cell3 select[title="Unit"]').addClass('not-active');


                    }


                }


                gform.addAction('gform_post_conditional_logic_field_action', function (formId, action, targetId, defaultValues, isInit) {

                    if (jQuery('#choice_62_168_1').prop('checked')) {

                        if ((targetId == '#field_62_55' && action == 'hide') || (targetId == '#field_62_184' && action == 'hide')) {

                            var select_minimum_type_sewer = jQuery('#input_62_172').val();

                            if (select_minimum_type_sewer != '') {


                                if (targetId == '#field_62_184' && action == 'hide') {

                                    jQuery('.gfield_list_55_cell3 select[title="Unit"] option').each(function () {

                                        if (jQuery(this).val() == select_minimum_type_sewer) {
                                            jQuery(this).attr('selected', 'selected');
                                        }

                                    });

                                    jQuery('.gfield_list_55_cell3 select[title="Unit"]').attr('readonly', 'readonly');
                                    jQuery('.gfield_list_55_cell3 select[title="Unit"]').addClass('not-active');

                                } else {


                                    jQuery('.gfield_list_184_cell3 select[title="Unit"] option').each(function () {

                                        if (jQuery(this).val() == select_minimum_type_sewer) {

                                            jQuery(this).attr('selected', 'selected');
                                        }
                                    });

                                    jQuery('.gfield_list_184_cell3 select[title="Unit"]').attr('readonly', 'readonly');
                                    jQuery('.gfield_list_184_cell3 select[title="Unit"]').addClass('not-active');


                                    jQuery('.gfield_list_187_cell3 select[title="Unit"] option').each(function () {

                                        if (jQuery(this).val() == select_minimum_type_sewer) {
                                            jQuery(this).attr('selected', 'selected');
                                        }
                                    });

                                    jQuery('.gfield_list_187_cell3 select[title="Unit"]').attr('readonly', 'readonly');
                                    jQuery('.gfield_list_187_cell3 select[title="Unit"]').addClass('not-active');

                                }
                            }

                            var minimum_fee_include_sewer = jQuery('#input_62_174').val();
                            var fee_water_amount = jQuery('#input_62_61').val();

                            if (minimum_fee_include_sewer != '') {

                                //   jQuery('.gfield_list_55_cell2 input').each(function(){
                                //             jQuery(this).attr('onblur','compare_minimum_amount_qnt(this,"'+minimum_fee_include_sewer+'")');
                                //   });

                                jQuery('.gfield_list_55_cell1 input:first').val(0);
                                jQuery('.gfield_list_55_cell1 input:first').attr('readonly', 'readonly');
                                jQuery('.gfield_list_55_cell2 input:first').val(minimum_fee_include_sewer);
                                jQuery('.gfield_list_55_cell2 input:first').attr('readonly', 'readonly');


                                jQuery('.gfield_list_55_cell4 input:first').val(fee_water_amount);
                                jQuery('.gfield_list_55_cell4 input:first').attr('readonly', 'readonly');


                                //     jQuery('.gfield_list_184_cell2 input').each(function(){
                                //             jQuery(this).attr('onblur','compare_minimum_amount_qnt(this,"'+minimum_fee_include_sewer+'")');
                                //   });


                                jQuery('.gfield_list_184_cell1 input:first').val(0);
                                jQuery('.gfield_list_184_cell1 input:first').attr('readonly', 'readonly');
                                jQuery('.gfield_list_184_cell2 input:first').val(minimum_fee_include_sewer);
                                jQuery('.gfield_list_184_cell2 input:first').attr('readonly', 'readonly');

                                jQuery('.gfield_list_184_cell4 input:first').val(fee_water_amount);
                                jQuery('.gfield_list_184_cell4 input:first').attr('readonly', 'readonly');

                                //   jQuery('.gfield_list_187_cell2 input').each(function(){
                                //             jQuery(this).attr('onblur','compare_minimum_amount_qnt(this,"'+minimum_fee_include_sewer+'")');
                                //   });


                                jQuery('.gfield_list_187_cell1 input:first').val(0);
                                jQuery('.gfield_list_187_cell1 input:first').attr('readonly', 'readonly');
                                jQuery('.gfield_list_187_cell2 input:first').val(minimum_fee_include_sewer);
                                jQuery('.gfield_list_187_cell2 input:first').attr('readonly', 'readonly');

                                jQuery('.gfield_list_187_cell4 input:first').val(fee_water_amount);
                                jQuery('.gfield_list_187_cell4 input:first').attr('readonly', 'readonly');

                            }
                        }

                    } else {
                        // auto fill unit type sewer


                        var select_minimum_type_sewer = jQuery('#input_62_275').val();


                        if (select_minimum_type_sewer != '') {


                            if (targetId == '#field_62_184' && action == 'hide') {

                                jQuery('.gfield_list_55_cell3 select[title="Unit"] option').each(function () {

                                    if (jQuery(this).val() == select_minimum_type_sewer) {
                                        jQuery(this).attr('selected', 'selected');
                                    }

                                });

                                jQuery('.gfield_list_55_cell3 select[title="Unit"]').attr('readonly', 'readonly');
                                jQuery('.gfield_list_55_cell3 select[title="Unit"]').addClass('not-active');

                            } else {


                                jQuery('.gfield_list_184_cell3 select[title="Unit"] option').each(function () {

                                    if (jQuery(this).val() == select_minimum_type_sewer) {

                                        jQuery(this).attr('selected', 'selected');
                                    }
                                });

                                jQuery('.gfield_list_184_cell3 select[title="Unit"]').attr('readonly', 'readonly');
                                jQuery('.gfield_list_184_cell3 select[title="Unit"]').addClass('not-active');


                                jQuery('.gfield_list_187_cell3 select[title="Unit"] option').each(function () {

                                    if (jQuery(this).val() == select_minimum_type_sewer) {
                                        jQuery(this).attr('selected', 'selected');
                                    }
                                });

                                jQuery('.gfield_list_187_cell3 select[title="Unit"]').attr('readonly', 'readonly');
                                jQuery('.gfield_list_187_cell3 select[title="Unit"]').addClass('not-active');

                            }
                        }


                    }
                });


            }


            if (form_id == '62' && current_page == '7') {


                if (jQuery('#choice_62_212_1').prop('checked')) {


                    gform.addAction('gform_post_conditional_logic_field_action', function (formId, action, targetId, defaultValues, isInit) {

                        if ((targetId == '#field_62_242' && action == 'hide') || (targetId == '#field_62_245' && action == 'hide')) {

                            var select_minimum_type_water = jQuery('#input_62_215').val();


                            if (select_minimum_type_water != '') {


                                if (targetId == '#field_62_245' && action == 'hide') {

                                    jQuery('.gfield_list_242_cell3 select[title="Unit"] option').each(function () {

                                        if (jQuery(this).val() == select_minimum_type_water) {
                                            jQuery(this).attr('selected', 'selected');
                                        }
                                    });
                                    jQuery('.gfield_list_242_cell3 select[title="Unit"]').attr('readonly', 'readonly');
                                    jQuery('.gfield_list_242_cell3 select[title="Unit"]').addClass('not-active');

                                } else {

                                    jQuery('.gfield_list_245_cell3 select[title="Unit"] option').each(function () {

                                        if (jQuery(this).val() == select_minimum_type_water) {
                                            jQuery(this).attr('selected', 'selected');
                                        }
                                    });
                                    jQuery('.gfield_list_245_cell3 select[title="Unit"]').attr('readonly', 'readonly');
                                    jQuery('.gfield_list_245_cell3 select[title="Unit"]').addClass('not-active');


                                    jQuery('.gfield_list_248_cell3 select[title="Unit"] option').each(function () {

                                        if (jQuery(this).val() == select_minimum_type_water) {
                                            jQuery(this).attr('selected', 'selected');
                                        }
                                    });
                                    jQuery('.gfield_list_248_cell3 select[title="Unit"]').attr('readonly', 'readonly');
                                    jQuery('.gfield_list_248_cell3 select[title="Unit"]').attr('readonly', 'readonly');
                                }
                            }


                            var minimum_fee_include_water = jQuery('#input_62_214').val();

                            if (minimum_fee_include_water != '') {


                                var fee_water_amount = jQuery('#input_62_213').val();

                                jQuery('.gfield_list_242_cell1 input:first').val(0);
                                jQuery('.gfield_list_242_cell1 input:first').attr('readonly', 'readonly');
                                jQuery('.gfield_list_242_cell2 input:first').val(minimum_fee_include_water);
                                jQuery('.gfield_list_242_cell2 input:first').attr('readonly', 'readonly');

                                jQuery('.gfield_list_242_cell4 input:first').val(fee_water_amount);
                                jQuery('.gfield_list_242_cell4 input:first').attr('readonly', 'readonly');


                                jQuery('.gfield_list_245_cell1 input:first').val(0);
                                jQuery('.gfield_list_245_cell1 input:first').attr('readonly', 'readonly');
                                jQuery('.gfield_list_245_cell2 input:first').val(minimum_fee_include_water);
                                jQuery('.gfield_list_245_cell2 input:first').attr('readonly', 'readonly');

                                jQuery('.gfield_list_245_cell4 input:first').val(fee_water_amount);
                                jQuery('.gfield_list_245_cell4 input:first').attr('readonly', 'readonly');


                                jQuery('.gfield_list_248_cell1 input:first').val(0);
                                jQuery('.gfield_list_248_cell1 input:first').attr('readonly', 'readonly');
                                jQuery('.gfield_list_248_cell2 input:first').val(minimum_fee_include_water);
                                jQuery('.gfield_list_248_cell2 input:first').attr('readonly', 'readonly');

                                jQuery('.gfield_list_248_cell4 input:first').val(fee_water_amount);
                                jQuery('.gfield_list_248_cell4 input:first').attr('readonly', 'readonly');


                                //   jQuery('.gfield_list_242_cell2 input').each(function(){
                                //             jQuery(this).attr('onblur','compare_minimum_amount_qnt(this,"'+minimum_fee_include_water+'")');
                                //   });

                                //   jQuery('.gfield_list_245_cell2 input').each(function(){
                                //             jQuery(this).attr('onblur','compare_minimum_amount_qnt(this,"'+minimum_fee_include_water+'")');
                                //   });


                                //   jQuery('.gfield_list_248_cell2 input').each(function(){
                                //             jQuery(this).attr('onblur','compare_minimum_amount_qnt(this,"'+minimum_fee_include_water+'")');
                                //   });
                            }

                        }

                    });


                }


                gform.addAction('gform_post_conditional_logic_field_action', function (formId, action, targetId, defaultValues, isInit) {

                    if (jQuery('#choice_62_222_1').prop('checked')) {

                        if ((targetId == '#field_62_257' && action == 'hide') || (targetId == '#field_62_260' && action == 'hide')) {

                            var select_minimum_type_sewer = jQuery('#input_62_225').val();

                            if (select_minimum_type_sewer != '') {


                                if (targetId == '#field_62_260' && action == 'hide') {

                                    jQuery('.gfield_list_257_cell3 select[title="Unit"] option').each(function () {

                                        if (jQuery(this).val() == select_minimum_type_sewer) {
                                            jQuery(this).attr('selected', 'selected');
                                        }

                                    });

                                    jQuery('.gfield_list_257_cell3 select[title="Unit"]').attr('readonly', 'readonly');
                                    jQuery('.gfield_list_257_cell3 select[title="Unit"]').addClass('not-active');

                                } else {


                                    jQuery('.gfield_list_260_cell3 select[title="Unit"] option').each(function () {

                                        if (jQuery(this).val() == select_minimum_type_sewer) {

                                            jQuery(this).attr('selected', 'selected');
                                        }
                                    });

                                    jQuery('.gfield_list_260_cell3 select[title="Unit"]').attr('readonly', 'readonly');
                                    jQuery('.gfield_list_260_cell3 select[title="Unit"]').addClass('not-active');


                                    jQuery('.gfield_list_263_cell3 select[title="Unit"] option').each(function () {

                                        if (jQuery(this).val() == select_minimum_type_sewer) {
                                            jQuery(this).attr('selected', 'selected');
                                        }
                                    });

                                    jQuery('.gfield_list_263_cell3 select[title="Unit"]').attr('readonly', 'readonly');
                                    jQuery('.gfield_list_263_cell3 select[title="Unit"]').addClass('not-active');

                                }
                            }

                            var minimum_fee_include_sewer = jQuery('#input_62_224').val();

                            if (minimum_fee_include_sewer != '') {


                                var fee_water_amount = jQuery('#input_62_223').val();

                                jQuery('.gfield_list_257_cell1 input:first').val(0);
                                jQuery('.gfield_list_257_cell1 input:first').attr('readonly', 'readonly');
                                jQuery('.gfield_list_257_cell2 input:first').val(minimum_fee_include_sewer);
                                jQuery('.gfield_list_257_cell2 input:first').attr('readonly', 'readonly');

                                jQuery('.gfield_list_257_cell4 input:first').val(fee_water_amount);
                                jQuery('.gfield_list_257_cell4 input:first').attr('readonly', 'readonly');


                                jQuery('.gfield_list_260_cell1 input:first').val(0);
                                jQuery('.gfield_list_260_cell1 input:first').attr('readonly', 'readonly');
                                jQuery('.gfield_list_260_cell2 input:first').val(minimum_fee_include_sewer);
                                jQuery('.gfield_list_260_cell2 input:first').attr('readonly', 'readonly');

                                jQuery('.gfield_list_260_cell4 input:first').val(fee_water_amount);
                                jQuery('.gfield_list_260_cell4 input:first').attr('readonly', 'readonly');


                                jQuery('.gfield_list_263_cell1 input:first').val(0);
                                jQuery('.gfield_list_263_cell1 input:first').attr('readonly', 'readonly');
                                jQuery('.gfield_list_263_cell2 input:first').val(minimum_fee_include_sewer);
                                jQuery('.gfield_list_263_cell2 input:first').attr('readonly', 'readonly');

                                jQuery('.gfield_list_263_cell4 input:first').val(fee_water_amount);
                                jQuery('.gfield_list_263_cell4 input:first').attr('readonly', 'readonly');


                                //   jQuery('.gfield_list_257_cell2 input').each(function(){
                                //             jQuery(this).attr('onblur','compare_minimum_amount_qnt(this,"'+minimum_fee_include_sewer+'")');
                                //   });


                                //     jQuery('.gfield_list_260_cell2 input').each(function(){
                                //             jQuery(this).attr('onblur','compare_minimum_amount_qnt(this,"'+minimum_fee_include_sewer+'")');
                                //   });


                                //   jQuery('.gfield_list_263_cell2 input').each(function(){
                                //             jQuery(this).attr('onblur','compare_minimum_amount_qnt(this,"'+minimum_fee_include_sewer+'")');
                                //   });

                            }
                        }

                    }
                });


            }


        });

        gform.addFilter('gform_list_item_pre_add', function (clone, group) {

            var select_minimum_type_water = group.find('select[title="Unit"] option:selected').val();

            clone.find('select[title="Unit"] option:selected').removeAttr('selected');
            clone.find('select[title="Unit"] option').each(function () {


                if (jQuery(this).val() == select_minimum_type_water) {

                    var clone_item = jQuery(this).clone();
                    jQuery(this).remove();
                    clone.find('select[title="Unit"]').prepend(clone_item);

                } else {
                    clone.find('input[type="text"]').removeAttr('readonly');

                    if (jQuery.trim(group.find('input[type="text"]:eq(1)').val()) != "") {
                        var endtirevalue = parseInt(group.find('input[type="text"]:eq(1)').val());
                        clone.find('input[type="text"]:first').val(endtirevalue + 1);
                        clone.find('input[type="text"]:first').attr("readonly", "readonly");
                    }

                }

            });


            clone.find('.add_list_item').removeAttr('onclick');
            group.find('.add_list_item').removeAttr('onclick');
            //gformDeleteListItem(this, 0)

            clone.find('.delete_list_item').attr('onclick', 'resume_add_capbality(this);gformDeleteListItem(this, 0);');
            group.find('.delete_list_item').attr('onclick', 'resume_add_capbality(this);gformDeleteListItem(this, 0);');

            clone.find('select[title="Unit"] option[value="' + select_minimum_type_water + '"]').attr("selected", "selected");
            return clone;
        });

        function resume_add_capbality(addcampability) {

            jQuery(addcampability).parent().parent().prev().children().last().children().first().attr('onclick', 'gformAddListItem(this, 0)');


        }

        function compare_minimum_amount_qnt(thiselement, maxnumber) {


            var entered_value = parseInt(thiselement.value);
            var minimim_fee_include = parseInt(maxnumber);

            if (minimim_fee_include >= entered_value) {
                alert('You can not enter value less than Minimum Fee Include');
                thiselement.value = '';
                thiselement.focus();
            }
        }


        function go_to_back(step) {
            //  jQuery('#gform_38').addClass('back_bt_press');
            jQuery("#gform_target_page_number_38").val(step);
            jQuery("#gform_38").trigger("submit", [true]);

        }

        function go_to_back_62(step) {
            //  jQuery('#gform_38').addClass('back_bt_press');
            jQuery("#gform_target_page_number_62").val(step);
            jQuery("#gform_62").trigger("submit", [true]);

        }

        jQuery(document).on('blur', '.gfield_list_54_cell2 >input,.gfield_list_183_cell2 >input , .gfield_list_186_cell2 >input , .gfield_list_55_cell2 >input , .gfield_list_184_cell2 >input , .gfield_list_187_cell2 >input , .gfield_list_242_cell2 >input , .gfield_list_245_cell2 >input , .gfield_list_248_cell2 >input, .gfield_list_257_cell2 >input, .gfield_list_260_cell2 >input, .gfield_list_263_cell2 >input', function () {

            var tireendvalue = parseInt(jQuery(this).val());
            var tirestartvalue = parseInt(jQuery(this).parent().parent().children().first().children().val());


            if (tireendvalue != "" && !(tireendvalue <= tirestartvalue)) {


                jQuery(this).parent().parent().children().last().children().first().attr('onclick', 'gformAddListItem(this, 0)');
            } else {

                // alert('Please enter value more that Start Tier');

                //jQuery(this).val('');
                //jQuery(this).parent().parent().children().last().children().first().attr('onclick','');
            }


        });

        jQuery(document).on('click', '.add_list_item', function () {

            var tirestartvalue = parseInt(jQuery(this).parent().parent().children().eq(0).children().val());
            var tireendvalue = jQuery(this).parent().parent().children().eq(1).children().val();

            if (tireendvalue == "") {
                alert('Please enter value in Tier End');
            } else {
                //alert(tireendvalue);
                //alert(typeof tireendvalue);
                tireendvalue = parseInt(tireendvalue);

                if (tireendvalue <= tirestartvalue) {
                    alert('Please enter value more that Start Tier');

                }
            }


        });

        jQuery(document).on('change', "#input_46_169", function () {

            var select_month = parseInt(jQuery(this).val());
            jQuery('#season_1').html(select_month);
            jQuery('#season_2').html(12 - select_month);

        });


        jQuery(document).on('change', "#input_62_182", function () {

            var select_month = parseInt(jQuery(this).val());
            jQuery('#season_1').html(select_month);
            jQuery('#season_2').html(12 - select_month);

        });
        jQuery(document).on('change', "#input_62_193", function () {

            var select_month = parseInt(jQuery(this).val());
            jQuery('#season_3').html(select_month);
            jQuery('#season_4').html(12 - select_month);

        });


        jQuery(document).on('change', "#input_62_244", function () {

            var select_month = parseInt(jQuery(this).val());
            jQuery('#commercial_season_1').html(select_month);
            jQuery('#commercial_season_2').html(12 - select_month);

        });
        jQuery(document).on('change', "#input_62_259", function () {

            var select_month = parseInt(jQuery(this).val());
            jQuery('#commercial_season_3').html(select_month);
            jQuery('#commercial_season_4').html(12 - select_month);

        });


        jQuery(document).on('load', "#gform_ajax_frame_62", function () {

            alert(jQuery('#field_62_52').attr('style'));

            if (jQuery('#field_62_52').attr('style') == "display:none") {

                jQuery('#field_62_52').attr('style', 'width:100% !important');
            }

        });


        jQuery(document).on('change', "#input_62_274", function () {

            var select_water_rates = jQuery(this).val();
            jQuery('#input_62_171').val(select_water_rates);


            jQuery('#gform_page_62_6').attr('style', 'display:block');

            jQuery('#choice_62_212_1').prop('checked', 'true');
            jQuery('#input_62_215').val(select_water_rates);
            jQuery('#gform_page_62_6').attr('style', 'display:none');

        });

        jQuery(document).on('change', "#input_62_275", function () {

            var select_sewer_rates = jQuery(this).val();
            jQuery('#input_62_172').val(select_sewer_rates);

            jQuery('#gform_page_62_6').attr('style', 'display:block');

            jQuery('#choice_62_222_1').prop('checked', 'true');
            jQuery('#input_62_225').val(select_sewer_rates);
            jQuery('#gform_page_62_6').attr('style', 'display:none');


        });

        // custom update to gf form
        jQuery("#input_46_169").change(function(){
            var select_month = parseInt(jQuery(this).val());
            jQuery('#season_1').html(select_month);
            jQuery('#season_2').html(12-select_month);
        });

    }






});