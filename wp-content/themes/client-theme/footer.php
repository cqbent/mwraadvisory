<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Knoxweb
 */

?>

<?php if ( is_home() || is_single() || is_archive() || is_category() || is_search() || is_404() ) { ?>
  </div>
<?php } ?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
  <div class="container">
    <div class="foot-left"><?php dynamic_sidebar( 'footer-menu' ); ?></div>
    <!-- .foot-left -->
    <div
      class="foot-right"><?php dynamic_sidebar( 'footer-copyright' ); ?></div>
    <!-- .foot-right -->
  </div><!-- .container -->

</footer><!-- #colophon -->


</div><!-- #page -->

<?php wp_footer(); ?>


<script type="text/javascript"
        src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.bxslider.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
<?php

$page = get_post();

//echo '<pre>';
//print_r($page);
//echo '</pre>';

if ( $page->post_title == 'Home' ) {
	?>

  <script type="text/javascript">


    jQuery(document).ready(function () {

      jQuery(document).on('load', "body", function () {

        if (jQuery('#field_62_52').attr('style') == 'display: none;') {
          alert(jQuery('#field_62_52').attr('style'));

          jQuery('#field_62_53').css('width', '100%');
        } else {

        }

      });

      jQuery('.fancybox').fancybox();

//$('a.fancybox').fancybox({

      //jQuery('.fancybox .fancybox.ajax').fancybox({
      //   type:"ajax"
      // });


      jQuery(".various").fancybox({type: 'ajax'});
      jQuery(".various_com").fancybox({type: 'iframe'});

      //rel="prettyPhoto[iframes]

    });

  </script>


<?php } ?>


<script type="text/javascript">


  jQuery(document).bind('gform_post_render', function () {

    var href = jQuery('a.resume_form_link').attr('href');
    var onclick_url = "location.href='" + href + "'";

    jQuery('.form_saved_message_emailform #gform_38').append('<input id="gform_cancle_button_38_1"  value="Cancel" onclick="' + onclick_url + '"  type="button">');

    jQuery('.form_saved_message_emailform #gform_38 input[type="submit"], .form_saved_message_emailform #gform_38 input[type="button"]').wrapAll('<div style="width:100%;text-align:center">');

    jQuery('.form_saved_message_emailform #gform_38 input[type="submit"]').attr('style', 'display:inline-block; margin-right:15px;');
    jQuery('.form_saved_message_emailform #gform_38 input[type="button"]').attr('style', 'margin: 12px auto 0;');


//jQuery('#gform_cancle_button_38_1').attr('onclick',onclick_url);


  });


  //jQuery(document).bind('gform_page_loaded', function(event, form_id, current_page){


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

  jQuery(document).ready(function () {

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


    // jQuery(document).on('click', '.delete_list_item', function () {

    //  jQuery(this).parent().parent().prev().children().last().children().first().attr('onclick','gformAddListItem(this, 0)');

    // });


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


    jQuery('.library-most-popular-list-slider').bxSlider({
      slideWidth: 200,
      minSlides: 2,
      maxSlides: 4,
      moveSlides: 1,
      pager: false,
      slideMargin: 15,
      infiniteLoop: false,
      controls: true

    });


    jQuery('.library-list-slider ').bxSlider({
      slideWidth: 200,
      minSlides: 2,
      maxSlides: 4,
      moveSlides: 1,
      pager: false,
      slideMargin: 15,
      infiniteLoop: false,
      controls: true

    });


  });


</script>


<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>-->

<!--<script type="text/javascript" src="wp-content/themes/client-theme/js/jquery.min.js"></script>
<script type="text/javascript">
	jQuery(function() {
    jQuery('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = jquery(this.hash);
        target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          jQuery('html, body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  });
</script>
-->


<script type="text/javascript" charset="utf-8">
  jQuery(document).ready(function () {
    //jQuery("a[rel^='prettyPhoto']").prettyPhoto({autoplay_slideshow: false});
    jQuery("#menu-primary-menu  li  a.shiftnav-target").click(function () {
      //alert("Hello");
      $("#shiftnav-toggle-main").trigger("click");
    });


    jQuery(".lib-accordion").click(function () {

      if (jQuery(this).next("div").is(":visible")) {
        jQuery(this).next("div").slideUp("slow");
        jQuery(this).removeClass('active');
      } else {
        //jQuery(".accordion").removeClass('active');
        jQuery(".lib-accordion").removeClass('active');

        jQuery(this).addClass('active');
        jQuery(".tag-list-panel").slideUp("slow");
        jQuery(this).next("div").slideToggle("slow");

      }
    });
    /* Open Collapse  Start Here             */

    jQuery(".expand_all").click(function () {


      jQuery(".lib-accordion").each(function () {

        if (!jQuery(this).hasClass("active")) {
          jQuery(this).addClass('active');
          jQuery(this).next("div").slideDown("slow");
        }

      });

      jQuery(".expand_all").hide();
      jQuery(".collapse_all").show();

      /*
	  jQuery(".lib-accordion").addClass('active');
	  jQuery(".tag-list-panel").slideToggle("slow");
	  jQuery(".expand_all").hide();jQuery(".collapse_all").show();
	  */
    });

    jQuery(".collapse_all").click(function () {

      jQuery(".lib-accordion").removeClass('active');
      jQuery(".tag-list-panel").slideUp("slow");
      jQuery(".collapse_all").hide();
      jQuery(".expand_all").show();
    });

    /*   Open Collapse Ends Here                 */


    /* Show Hide tag list Start Here */


    jQuery(".show_taglist").click(function () {

      $("#categories-panel-part").hide();

      $(".tag-link-list-panel").show();
      $('.libraries-cat-list').hide();
      $(".show_taglist").hide();
      $(".hide_taglist").show();
    });

    jQuery(".hide_taglist").click(function () {

      $("#categories-panel-part").show();
      $(".tag-link-list-panel").hide();
      $('.libraries-cat-list').show();
      $(".hide_taglist").hide();
      $(".show_taglist").show();
    });


    /* Show Hide tag list End Here */

    /*
	jQuery(function($){
  $('.et_pb_toggle_title').click(function(){

	var $toggle = $(this).closest('.et_pb_toggle');

	if (!$toggle.hasClass('et_pb_accordion_toggling')) {

	  var $accordion = $toggle.closest('.et_pb_accordion');
	  // If Toggle open
	 if ($toggle.hasClass('et_pb_toggle_open')) {

	  $toggle.removeClass('et_pb_toggle_open').addClass('et_pb_toggle_close');



	  }
	  else {
		  $hide = $(".et_pb_module").closest('.et_pb_toggle');
		 $hide.removeClass('et_pb_toggle_open').addClass('et_pb_toggle_close');


		 // $toggle.removeClass('et_pb_toggle_close').addClass('et_pb_toggle_open');
	  }


	}

  });


});
*/

    /*
	jQuery(function($){
		$('.et_pb_accordion .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');
		$('.et_pb_accordion_1 .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');

		$('.et_pb_accordion .et_pb_toggle').click(function() {
		 $this = $(this);

		  setTimeout(function(){
			$this.closest('.et_pb_accordion').removeClass('et_pb_accordion_toggling');
		  },700);
		});
	});


	$("body").on("click", "input.open_all", function(){


		var temp = $(this).prop('checked');

		var section_no = $(this).attr('data');
		var tempid = $(this).prop('id');

		var button_no_array = tempid.split('-');
		//console.log(button_no_array);
		var button_no = button_no_array[1];
	   //alert('#accordian_custom_'+section_no+' .et_pb_toggle_close');
		//console.log(button_no);

		if(temp){
		$('#accordion_custom_'+section_no+' .et_pb_toggle_close').addClass('et_pb_toggle_open').removeClass('et_pb_toggle_close');
		$('#accordion_custom_'+section_no+' .et_pb_toggle_content').css( "display", "block" );
		}else{
		$('#accordion_custom_'+section_no+' .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');
		$('#accordion_custom_'+section_no+' .et_pb_toggle_content').css( "display", "none" );
		}
	});


	$("body").on("click", "input.open_all_newer", function(){
		var temp = $(this).prop('checked');
		if(temp){
		$('.et_pb_accordion_newer .et_pb_toggle_close').addClass('et_pb_toggle_open').removeClass('et_pb_toggle_close');
		$('.et_pb_accordion_newer .et_pb_toggle_content').css( "display", "block" );
		}else{
		$('.et_pb_accordion_newer .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');
		$('.et_pb_accordion_newer .et_pb_toggle_content').css( "display", "none" );
		}
	});



	});


	jQuery( document ).ready(function() {
	/*add more space for show title*/
    jQuery("#homebanner-whoweare").click(function () {
      jQuery("#whoweare").addClass("addpadding-whoweare");
    });
    jQuery(".menu-item-197 a").click(function () {
      jQuery("#whoweare").removeClass("addpadding-whoweare");
    });
    /*

$( ".ab_policy_accordion_page .et_pb_accordion" ).css( "display", "none" );
 $( ".ab_policy_accordion_page .et_pb_accordion_0" ).css( "display", "none" );
  $( ".ab_policy_accordion_page .et_pb_accordion_newer" ).css( "display", "none" );
$( ".ab_policy_accordion_page .all_collapse_expand" ).css( "display", "none" );
$( ".ab_policy_accordion_page .all_collapse_expand_newer" ).css( "display", "none" );
});
$(".sub").click(function () {
var section_no = $(this).attr('data');


$(".collapse_all").hide();$(".expand_all").show();
$( ".ab_policy_accordion_page .et_pb_accordion_custom_"+section_no).slideToggle("slow");
$( ".ab_policy_accordion_page .all_custom_collapse_expand_"+section_no ).slideToggle("slow");


});

$("#new_post_block").click(function () {

$( ".ab_policy_accordion_page .et_pb_accordion_newer" ).slideToggle("slow");
$( ".ab_policy_accordion_page .all_collapse_expand_newer" ).slideToggle("slow");
*/

    var divs = jQuery("li.my_table");
    for (var i = 0; i < divs.length; i += 3) {
      divs.slice(i, i + 3).wrapAll("<div class='new'></div>");
    }

  });


  // ]]></script>


<script type="text/javascript">
  jQuery(function ($) {


    $('.et_pb_toggle_title').click(function () {

      var $this_heading = $(this),
        $module = $this_heading.closest('.et_pb_toggle'),
        $section = $module.parents('.et_pb_section'),
        $content = $module.find('.et_pb_toggle_content'),
        $accordion = $module.closest('.et_pb_accordion'),
        is_accordion = $accordion.length,
        is_accordion_toggling = $accordion.hasClass('et_pb_accordion_toggling'),
        $accordion_active_toggle;

      if (is_accordion) {
        if ($module.hasClass('et_pb_toggle_open') || is_accordion_toggling) {
          return false;
        }

        $accordion.addClass('et_pb_accordion_toggling');
        $accordion_active_toggle = $module.siblings('.et_pb_toggle_open');
      }

      if ($content.is(':animated')) {
        return;
      }

      $content.slideToggle(700, function () {
        if ($module.hasClass('et_pb_toggle_close')) {
          $module.removeClass('et_pb_toggle_close').addClass('et_pb_toggle_open');
        } else {
          $module.removeClass('et_pb_toggle_open').addClass('et_pb_toggle_close');
        }

        if ($section.hasClass('et_pb_section_parallax') && !$section.children().hasClass('et_pb_parallax_css')) {
          $.proxy(et_parallax_set_height, $section)();
        }
      });


      if (is_accordion) {
        $accordion_active_toggle.find('.et_pb_toggle_content').slideToggle(700, function () {
          $accordion_active_toggle.removeClass('et_pb_toggle_open').addClass('et_pb_toggle_close');
          $accordion.removeClass('et_pb_accordion_toggling');
        });
      }

    });


  });
</script>

<script>

  jQuery(function ($) {


    $('.et_pb_accordion .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');

    $('.et_pb_accordion .et_pb_toggle').click(function () {
      $this = $(this);
      setTimeout(function () {
        $this.closest('.et_pb_accordion').removeClass('et_pb_accordion_toggling');
      }, 700);
    });

    $('#cat_order_dc_clone').change(function () {

      var cat_order = $('#cat_order_dc_clone').val();

      window.location = "<?php echo site_url(); ?>/document-library-clone/<?php echo get_query_var( 'term' ); ?>/" + "?cat_order=" + cat_order;
    });


    $('#cat_order').change(function () {
      var order_by_value = $('#order_by').val();
      var order = $('#order').val();
      var cat_order = $('#cat_order').val();

      window.location = "<?php echo site_url(); ?>/document-library-tag/<?php echo get_query_var( 'term' ); ?>/" + "?order_by=" + order_by_value + "&order=" + order + "&cat_order=" + cat_order;
    });


    $('#document_cat_order').change(function () {
      var order_by_value = $('#order_by').val();
      var order = $('#order').val();
      var cat_order = $('#document_cat_order').val();

      window.location = "<?php echo site_url(); ?>/document-library/<?php echo get_query_var( 'term' ); ?>/" + "?cat_order=" + cat_order;
    });

    if ($('#term').val() != "" && $('#term_id').val() != "") {
      var term = $('#term').val();
      var term_id = $('#term_id').val();
      var param = "term=" + term + "&term_id=" + term_id;
    } else {

      var param = "";
    }


    $('#order_by').change(function () {
      var order_by_value = $('#order_by').val();
      var order = $('#order').val();
      var cat_order = $('#cat_order').val();
      var page_limit = $('#page_limit').val();

      window.location = "<?php echo site_url(); ?>/document-library-tag/<?php echo get_query_var( 'term' ); ?>/" + "?" + param + "&order_by=" + order_by_value + "&order=" + order + "&cat_order=" + cat_order + '&page_limit=' + page_limit;
    });


    function getUrlVars() {
      var vars = [], hash;
      var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
      for (var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
      }
      return vars;
    }


    $('#search_page_limit').change(function () {

      var order_by_value = $('#search_order_by').val();
      var order = $('#search_order').val();
      var cat_order = $('#search_cat_order').val();
      var page_limit = $('#search_page_limit').val();
      var parameter = "";

      var existing_param = getUrlVars();

      var s = existing_param['s'];
      var post_type = existing_param['post_type'];
      var tagname = existing_param['tagname'];


      if (s != '') {

        parameter += "s=" + s;
      }


      if (post_type != "") {

        parameter += "&post_type=" + post_type;
      }


      if (tagname != "") {
        parameter += "&tagname=" + tagname;
      }

      if (page_limit != "" && page_limit != 'undefined') {
        parameter += "&posts_per_page=" + page_limit;

      }


      window.location = "<?php echo site_url(); ?>/" + "?" + parameter + "&order_by=" + order_by_value + "&order=" + order + "&cat_order=" + cat_order + '&posts_per_page=' + page_limit;
    });


    $('#page_limit').change(function () {
      var order_by_value = $('#order_by').val();
      var order = $('#order').val();
      var cat_order = $('#cat_order').val();
      var page_limit = $('#page_limit').val();

      alert('<?php echo get_query_var( 'term' ); ?>');

      window.location = "<?php echo site_url(); ?>/document-library-tag/<?php echo get_query_var( 'term' ); ?>/" + "?" + param + "&order_by=" + order_by_value + "&order=" + order + "&cat_order=" + cat_order + '&page_limit=' + page_limit;
    });


    $('#order').change(function () {
      var order_by_value = $('#order_by').val();
      var order = $('#order').val();
      var cat_order = $('#cat_order').val();
      var page_limit = $('#page_limit').val();
      window.location = "<?php echo site_url(); ?>/document-library-tag/<?php echo get_query_var( 'term' ); ?>/" + "?" + param + "&order_by=" + order_by_value + "&order=" + order + "&cat_order=" + cat_order + '&page_limit=' + page_limit;
    });


    jQuery('#search_cat_order').change(function () {
      var order_by_value = $('#search_order_by').val();
      var order = jQuery('#search_order').val();
      var cat_order = jQuery('#search_cat_order').val();
      var page_limit = jQuery('#search_page_limit').val();

      var parameter = "";

      var existing_param = getUrlVars();

      var s = existing_param['s'];
      var post_type = existing_param['post_type'];
      var tagname = existing_param['tagname'];


      if (s != '') {

        parameter += "s=" + s;
      }


      if (post_type != "") {

        parameter += "&post_type=" + post_type;
      }


      if (tagname != "") {
        parameter += "&tagname=" + tagname;
      }


      window.location = "<?php echo site_url(); ?>/" + "?" + parameter + "&order_by=" + order_by_value + "&order=" + order + "&cat_order=" + cat_order + '&posts_per_page=' + page_limit;
    });


    jQuery('#search_order_by').change(function () {

      var order_by_value = $('#search_order_by').val();
      var order = jQuery('#search_order').val();
      var cat_order = jQuery('#search_cat_order').val();
      var page_limit = jQuery('#search_page_limit').val();
      var parameter = "";

      var existing_param = getUrlVars();

      var s = existing_param['s'];
      var post_type = existing_param['post_type'];
      var tagname = existing_param['tagname'];


      if (s != '' && tagname != 'undefined') {

        parameter += "s=" + s;
      }


      if (post_type != "" && tagname != 'undefined') {

        parameter += "&post_type=" + post_type;
      }


      if (tagname != "" && tagname != 'undefined') {
        parameter += "&tagname=" + tagname;
      }

      if (page_limit != "" && page_limit != 'undefined') {
        parameter += "&posts_per_page=" + page_limit;

      }


      window.location = "<?php echo site_url(); ?>/" + "?" + parameter + "&order_by=" + order_by_value + "&order=" + order + "&cat_order=" + cat_order;
    });


    jQuery('#search_order').change(function () {
      var order_by_value = $('#search_order_by').val();
      var order = jQuery('#search_order').val();
      var cat_order = jQuery('#search_cat_order').val();
      var page_limit = jQuery('#search_page_limit').val();
      var parameter = "";
      var existing_param = getUrlVars();

      var s = existing_param['s'];
      var post_type = existing_param['post_type'];
      var tagname = existing_param['tagname'];


      if (s != '' && tagname != 'undefined') {

        parameter += "s=" + s;
      }


      if (post_type != "" && tagname != 'undefined') {

        parameter += "&post_type=" + post_type;
      }


      if (tagname != "" && tagname != 'undefined') {
        parameter += "&tagname=" + tagname;
      }

      if (page_limit != "" && page_limit != 'undefined') {
        parameter += "&posts_per_page=" + page_limit;

      }

      window.location = "<?php echo site_url(); ?>/?" + parameter + "&order_by=" + order_by_value + "&order=" + order + "&cat_order=" + cat_order;
    });


    jQuery('#cat_menu').change(function () {
      var menu_flag = jQuery(this).val();

      jQuery('html, body').animate({
        scrollTop: jQuery('.lib-accordion:contains(' + menu_flag + ')').offset().top - 100
      }, 1000);


    });


  });
</script>


<script type="text/javascript">
  var pixelRatio = window.devicePixelRatio || 1;
  if (window.innerWidth / pixelRatio < 241) {
    easy_fancybox_handler = null;
  }
  ;


  jQuery(".pagination a").each(function () {
    var url = jQuery(this).attr('href');


    if (url.includes("&?")) {
      jQuery(this).attr('href', url.replace("&?", "&"));

    }


    var a = ['?', '&'];
    var i = 0;

    url = url.replace(/\?/g, function () {
      return a[i++]
    });

    jQuery(this).attr('href', url);

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

  /*

   jQuery(document).on('click', "#gform_next_button_45_236", function () {
	   setTimeout(function(){
	   var select_water_rates = jQuery('#input_62_274').val();
	   jQuery('#input_62_215').val(select_water_rates);

		var select_sewer_rates = jQuery('#input_62_275').val();
		jQuery('#input_62_225').val(select_water_rates);
	   }, 100);

  });

  */

</script>


</body>
</html>