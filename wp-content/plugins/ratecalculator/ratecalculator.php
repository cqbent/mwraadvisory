<?php

/*
 *
 *	Plugin Name: Rate Calculator
    Description: This plugin is for caculating rate of Water and Siver
    Author: Automattic
 */


class Ratecalculator
{


    public static function load_header()
    {
        wp_enqueue_style('bootstrap', plugin_dir_url(__FILE__) . 'css/bootstrap.min.css');
        wp_enqueue_style('font-awesome', plugin_dir_url(__FILE__) . 'css/font-awesome.min.css');
        wp_enqueue_style('TorCo-style', plugin_dir_url(__FILE__) . 'css/style.css');
        wp_enqueue_style('tooltip-css', plugin_dir_url(__FILE__) . 'css/tooltip.css');
        wp_enqueue_style('jQueryui-css', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
        wp_enqueue_style('select-css', plugin_dir_url(__FILE__) . 'css/select2.css');


        wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-1.12.4.js');
        wp_enqueue_script('jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js');
        wp_enqueue_script('angular', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js');
        wp_enqueue_script('bootstrapJS', plugin_dir_url(__FILE__) . 'js/bootstrap.min.js');
        wp_enqueue_script('Vallidate', plugin_dir_url(__FILE__) . 'js/jquery.validate.js');
        wp_enqueue_script('touch-punch', plugin_dir_url(__FILE__) . 'js/jquery.ui.touch-punch.min.js');


        wp_enqueue_script('TorCo-mapControl', plugin_dir_url(__FILE__) . 'js/mapControl.js');
        wp_enqueue_script('Tooltip', plugin_dir_url(__FILE__) . 'js/tooltip.js');
        wp_enqueue_script('select', plugin_dir_url(__FILE__) . 'js/select2.min.js');
        wp_enqueue_script('rate-calculator', plugin_dir_url(__FILE__) . 'js/ratecalculator.js');


    }

    public static function addToHeader2()
    {
        echo '<script> var userID = ' . get_current_user_id() . ';</script>';
    }

    public static function rate_caldashboard($atts)
    {
        self::load_header();
        ob_start();


        require_once(plugin_dir_path(__FILE__) . 'page-index.php');
        return ob_get_clean();

    }


}

//add_shortcode( 'survey_data', array('Ratecalculator', 'get_surver_entries') );

add_shortcode('ratecalculator', array('Ratecalculator', 'rate_caldashboard'));
add_action('wp_head', array('Ratecalculator', 'addToHeader2'));


add_action('wp_ajax_calculation_data', 'calculation_data');
add_action('wp_ajax_nopriv_calculation_data', 'calculation_data');


add_action('wp_ajax_get_community', 'get_community');
add_action('wp_ajax_nopriv_get_community', 'get_community');


function calculation_data()
{
    $community = $_POST['community'];
    $year = $_POST['year'];
    $form_id = $_POST['form_id'];


    $result = get_surver_entries($form_id, $community, $year);

    //$result = get_surver_entries('45',$community,$year);


    $result[0][54] = json_encode(unserialize($result[0][54]));
    $result[0][55] = json_encode(unserialize($result[0][55]));
    $result[0][161] = json_encode(unserialize($result[0][161]));
    $result[0][162] = json_encode(unserialize($result[0][162]));

    $result[0][183] = json_encode(unserialize($result[0][183]));
    $result[0][184] = json_encode(unserialize($result[0][184]));
    $result[0][186] = json_encode(unserialize($result[0][186]));
    $result[0][187] = json_encode(unserialize($result[0][187]));
    // echo '<pre>';
    // print_r($result[0][54]);
    //echo $result[0][54];

    echo json_encode($result[0]);
    die;
}

function get_surver_entries($form_id, $community, $year)
{

    $search_criteria = array(
        //'is_approved' =>	'1',
        'status' => 'active',
        'field_filters' => array(
            //'mode' => 'any',
            array(
                'key' => '136',
                'value' => $community
            ),
            array(
                'key' => '152',
                'value' => $year
            ),
            array(
                'key' => 'is_approved',
                'value' => 1
            )

        )
    );

    $entries = GFAPI::get_entries($form_id, $search_criteria);

    return $entries;
}

function get_community()
{
    $post_type = 'cpt-community';
    $args = array(
        'numberposts' => -1,
        'post_type' => $post_type,
        'orderby' => 'post_title',
        'order' => 'ASC',
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => 'state',
                'value' => $_POST['state'],
                'compare' => '=',
            )
        )
    );

    $postdata = get_posts($args);

    //print_r($postdata);

    $option_string = '<option value="">--Select Community--</option>';
    #exit;
    foreach ($postdata as $post) {

        $option_string .= '<option value="' . $post->post_title . '">' . $post->post_title . '</option>';
    }
    echo $option_string;

    exit();
}
