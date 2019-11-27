jQuery(document).ready(function($) {
    // add sticky class to site header when scrolling
    var sticky = jQuery('.site-header, .shiftnav-toggle');
    $(window).scroll(function() {
        var scroll = jQuery(window).scrollTop();
        if (scroll >= 20) {
            sticky.addClass('sticky');
        }
        else {
            sticky.removeClass('sticky');
        }
    });


    // add classes to misc. elements
    jQuery('.wsp-pages-list').find('li').addClass('my_table');
    jQuery('.budget ul li a').css('color','#3598dc');

    // wrap "new" div to my_table elements (?)
    var divs = jQuery("li.my_table");
    /*
    for(var i = 0; i < divs.length; i+=34) {
        divs.slice(i, i+34).wrapAll("<div class='new'></div>");
    }
    */
    for (var i = 0; i < divs.length; i += 3) {
        divs.slice(i, i + 3).wrapAll("<div class='new'></div>");
    }

    jQuery('.documents-by-category .category').click(function() {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        }
        else {
            $(this).addClass('active');
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

    jQuery("#menu-primary-menu  li  a.shiftnav-target").click(function () {
        $("#shiftnav-toggle-main").trigger("click");
    });


    jQuery(".lib-accordion").click(function () {

        if (jQuery(this).next("div").is(":visible")) {
            jQuery(this).next("div").slideUp("slow");
            jQuery(this).removeClass('active');
        } else {
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

    jQuery("#homebanner-whoweare").click(function () {
        jQuery("#whoweare").addClass("addpadding-whoweare");
    });
    jQuery(".menu-item-197 a").click(function () {
        jQuery("#whoweare").removeClass("addpadding-whoweare");
    });


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

        $('.et_pb_accordion .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');

        $('.et_pb_accordion .et_pb_toggle').click(function () {
            $this = $(this);
            setTimeout(function () {
                $this.closest('.et_pb_accordion').removeClass('et_pb_accordion_toggling');
            }, 700);
        });

        $('#cat_order_dc_clone').change(function () {

            var cat_order = $('#cat_order_dc_clone').val();

            window.location = "<?php echo site_url(); ?>/document-library-clone/<?php echo get_query_var('term'); ?>/" + "?cat_order=" + cat_order;
        });


        $('#cat_order').change(function () {
            var order_by_value = $('#order_by').val();
            var order = $('#order').val();
            var cat_order = $('#cat_order').val();

            window.location = "<?php echo site_url(); ?>/document-library-tag/<?php echo get_query_var('term'); ?>/" + "?order_by=" + order_by_value + "&order=" + order + "&cat_order=" + cat_order;
        });


        $('#document_cat_order').change(function () {
            var order_by_value = $('#order_by').val();
            var order = $('#order').val();
            var cat_order = $('#document_cat_order').val();

            window.location = "<?php echo site_url(); ?>/document-library/<?php echo get_query_var('term'); ?>/" + "?cat_order=" + cat_order;
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

            window.location = "<?php echo site_url(); ?>/document-library-tag/<?php echo get_query_var('term'); ?>/" + "?" + param + "&order_by=" + order_by_value + "&order=" + order + "&cat_order=" + cat_order + '&page_limit=' + page_limit;
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

            window.location = "<?php echo site_url(); ?>/document-library-tag/<?php echo get_query_var('term'); ?>/" + "?" + param + "&order_by=" + order_by_value + "&order=" + order + "&cat_order=" + cat_order + '&page_limit=' + page_limit;
        });


        $('#order').change(function () {
            var order_by_value = $('#order_by').val();
            var order = $('#order').val();
            var cat_order = $('#cat_order').val();
            var page_limit = $('#page_limit').val();
            window.location = "<?php echo site_url(); ?>/document-library-tag/<?php echo get_query_var('term'); ?>/" + "?" + param + "&order_by=" + order_by_value + "&order=" + order + "&cat_order=" + cat_order + '&page_limit=' + page_limit;
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

    var pixelRatio = window.devicePixelRatio || 1;
    if (window.innerWidth / pixelRatio < 241) {
        easy_fancybox_handler = null;
    }

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


});