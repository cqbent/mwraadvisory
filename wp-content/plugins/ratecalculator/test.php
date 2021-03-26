<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require( '//Users/charlesbent/Google Drive/Websites/mwraadvisory/project/wp-blog-header.php' );

function get_survey_entries($form_id, $community, $year) {

    $search_criteria = array(
        //'is_approved' =>	'1',
        'status' => 'active',
        'field_filters' => array(
            array(
                'key' => '136',
                'value' => $community
            ),
            array(
                'key' => '152',
                'value' => $year
            )

        )
    );


    $result = GFAPI::get_entries($form_id, $search_criteria);

    $result[0][54] = unserialize($result[0][54]);
    $result[0][55] = unserialize($result[0][55]);
    $result[0][161] = unserialize($result[0][161]);
    $result[0][162] = unserialize($result[0][162]);

    $result[0][183] = unserialize($result[0][183]);
    $result[0][184] = unserialize($result[0][184]);
    $result[0][186] = unserialize($result[0][186]);
    $result[0][187] = unserialize($result[0][187]);

    return $result;
}
//$data = 'this';
$data = get_survey_entries('62', 'Town of Arlington', '2019');

header('Content-Type: application/json');
echo json_encode($data);

//var_dump($data);

/*
 * get important data points from survey results
 * 1) water_frequency (50) - "quarterly, annually, etc." convert into 4, 1, etc.
 * 2) water_usages - based on HCF
 */


