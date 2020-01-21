<style>
    .ui-slider .ui-slider-handle {
        width: 2.2em !important;
        height: 1.8em !important;
    }

    .ui-widget.ui-widget-content {
        overflow-x: inherit !important;
        overflow-y: inherit !important;
    }

    #dataTable td:nth-child(2), #dataTable td:nth-child(3) {
        text-align: left !important;
        width: 31%;
    }

    button.btn-wide, #mapControl button {
        width: auto !important;
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
        margin-bottom: 8px;
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

    .accordion {
        width: 18px;
        margin-left: 4px;
        margin-right: 5px;
        margin-bottom: 6px;
        margin-top: 2px;
    }

    .retighclose {
        background-color: #ffcc66 !important;
    }

    .modalopen {
        overflow-x: hidden !important;
        overflow-y: auto !important;
    }

    .counter_wrapper {
        display: table;
        width: 100%;
        max-width: 300px;
        margin: 0 auto;
    }

    .frequency-box {
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

    #cubic_feet {
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
        margin-right: 10px;
    }

    div#sewer_rates table input {
        margin-left: 0px;
        margin-right: 10px;
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
        padding: 4px 5px !important;
        font-size: 17px !important;
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
        background-color: rgba(f, f, f, 0.5);
        z-index: 2;
        cursor: pointer;
    }

    #text {
        position: absolute;
        top: 50%;
        left: 50%;
        font-size: 50px;

        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
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

    .rate_calculator_main_container {
        width: 100%;
        /* height: 510px; */ /* padding: 250px; */
        padding-top: 90px;
        max-width: 1100px;
        margin: 0 auto;
    }

</style>


<?php $img = plugin_dir_url(__FILE__) . 'img/que.png';

$img2 = plugin_dir_url(__FILE__) . 'img/cross.png';

// rampant_deer.jpg

$rampant_deer = plugin_dir_url(__FILE__) . 'img/rampant_deer.jpg';
$rampant_deer_good = plugin_dir_url(__FILE__) . 'img/rampant_deer_good.jpg';

?>
<form action='' method='post' id='ewd-feup-edit-profile-form' class='pure-form pure-form-aligned'
      enctype='multipart/form-data'>
    <div id="dataTable" class="table-responsive">
        <div style="/*padding-bottom:150px;*/">
            <div class="rate_calculator_main_container ratecalc">

                <div class="content-area community-select-area">

                    <input type="hidden" id="form_id" name="form_id" value="<?php if (isset($_GET['form_id'])) {
                        echo $_GET['form_id'];
                    } else {
                        echo '62';
                    } ?>"/>

                    <?php
                    $args = array(
                        'post_type' => 'cpt-community',
                        'posts_per_page' => 5,
                        'orderby' => 'title',
                        'order' => 'asc'
                    );


                    global $wpdb;
                    $query = 'SELECT *  FROM wp_posts WHERE post_type = "cpt-community" AND post_status = "publish" ORDER BY post_title asc';


                    $loop = $wpdb->get_results($query);

                    $state_array = array();
                    foreach ($loop as $ck => $cv) {
                        $state_array[] = get_post_meta($cv->ID, 'state', true);
                    }

                    $state_array = array_unique($state_array);

                    $community_array = "";


                    ?>
                    <div style="width: 49%;float: left;">
                        <span style="font-size:14px; font-weight:bold;">State :</span>
                        <select id="state-box" name="state">
                            <option value="">--Select State --</option>
                            <?php
                            foreach ($state_array as $temp) {

                                if (!empty($temp)) {
                                    ?>
                                    <option value="<?php echo $temp; ?>"><?php echo $temp; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>


                        <span style="font-size:14px; font-weight:bold;">Community :</span>
                        <select selected="selected" id="community-box" name="community">

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

                                <div>
                                    <div class="frequency-box">
                                        <select id="frequency">

                                            <option value="1" selected="selected">Annually</option>
                                            <option value="2">Semi-anually</option>
                                            <option value="3">Triannully</option>
                                            <option value="4">Quarterly</option>
                                            <option value="6">Bi-Monthly</option>
                                            <option value="12">Monthly</option>
                                            <option value="365">Daily</option>

                                        </select>

                                    </div>
                                </div>


                                <div class="sub-tab1">
                                    <h3>Select residential bill and monthly consumption amount</h3>
                                    <div class="service_type_selector">
                                        <label>
                                            <input name="service_type" value="Water Bill" checked="checked"
                                                   type="radio">Water Bill
                                        </label>
                                        <label>
                                            <input name="service_type" value="Sewer Bill" type="radio">Sewer Bill
                                        </label>
                                        <label>
                                            <input name="service_type" value="Water+Sewer Bill" type="radio">Water +
                                            Sewer Bill
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
                                            <div id="cubic"><span id="cubic_feet" style="margin-right:25px">0</span>HCF
                                                <a href="javaScript:void()" class="tooltip">
                                                    <image src="http://mwraadvisoryboard.com/wp-content/uploads/2017/05/1494348262_Info_Circle_Symbol_Information_Letter.png"/>
                                                    <span class="tooltiptext">KGAL = 1 Thousand Gallons </br> 1 Houndred Cubic Feet = 748 Gallons</span></a>
                                            </div>

                                            <table width="100%" class="kgal">
                                                <tr>
                                                    <td style="width: 50%;"><label>KGAL</label><input type="text"
                                                                                                      name="kgl_water_usages"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 14%;"><label>HCF</label><input type="text"
                                                                                                     name="hcf_water_usages"/>
                                                    </td>
                                                    <td>
                                                        <!--<input type="button" class="submit_t" name="submit" value="Submit" style="margin-top:1px" />--></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div>
                                        <div style="margin-top: 15px;" id="water_rates">
                                            <table width="100%">
                                                <tr>
                                                    <td colspan="2" style="width: 14%;"></td>
                                                </tr>
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
                                                <tr>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 70%;padding-top: 18px;"><p>Effects of raising
                                                            water rates by:</p><input type="text"
                                                                                      name="watrt_raising_rates"/>%
                                                    </td>
                                                    <td style="vertical-align:top"><p
                                                                style="float:left; width:100%; clear:both;">&nbsp;</p>
                                                        <!--<input type="button" style="margin-top: 46px; position:relative; display:block;"class="submit_t" name="submit" value="Submit"  />-->
                                                    </td>
                                                </tr>
                                            </table>

                                        </div>

                                        <div style="margin-top: 15px;" id="sewer_rates">
                                            <table width="100%">
                                                <tr>
                                                    <td colspan="2" style="width: 14%;"></td>
                                                </tr>
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
                                                <tr>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr></tr>
                                                <td style="width: 70%;padding-top: 18px;"><p>Effects of raising Sewer
                                                        rates by:</p><input type="text" name="sewer_raising_rates"/>%
                                                </td>
                                                <td style="vertical-align:top"><p
                                                            style="float:left; width:100%; clear:both;">&nbsp;</p>
                                                    <!--<input type="submit" style="margin-top: 46px; position:relative; display:block;" class="submit_t" name="submit" value="Submit"  />-->
                                                </td>
                                                </tr>
                                            </table>

                                        </div>

                                        <div style="margin-top: 15px;" id="sewer_rates">
                                            <table width="100%">
                                                <tr>
                                                    <td colspan="2" style="width: 14%;"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="">
                                                            <!--<input type="button" name="calculat_rate" value="Calculate Rate" class="Calculate Rate"style="width:150px;height:50px;font-size: 17px !important;color:#000;font-weigth:bold" />-->


                                                            <input id="converted_water_usages" type="hidden"
                                                                   name="converted_water_usages" value=""/>
                                                            <input id="rate_calculation_way_water" type="hidden"
                                                                   name="rate_calculation_way_water" value=""/>
                                                            <input id="rate_calculation_way_sewer" type="hidden"
                                                                   name="rate_calculation_way_sewer" value=""/>

                                                            <input id="water_frequency" type="hidden"
                                                                   name="water_frequency" value=""/>


                                                            <input id="water_rate_table" type="hidden"
                                                                   name="water_rate_table" value=""/>
                                                            <input id="sewer_rate_table" type="hidden"
                                                                   name="sewer_rate_table" value=""/>


                                                            <input id="water_rate_table_part1" type="hidden"
                                                                   name="water_rate_table_part1" value=""/>
                                                            <input id="water_rate_table_part2" type="hidden"
                                                                   name="water_rate_table_part2" value=""/>

                                                            <input id="sewer_rate_table_part1" type="hidden"
                                                                   name="sewer_rate_table_part1" value=""/>
                                                            <input id="sewer_rate_table_part2" type="hidden"
                                                                   name="sewer_rate_table_part2" value=""/>

                                                            <input id="cumulative" type="hidden" name="cumulative"
                                                                   value=""/>

                                                            <input id="sewer_frequency" type="hidden"
                                                                   name="sewer_frequency" value=""/>
                                                            <input id="community_uses_whole_water_as_sewer"
                                                                   type="hidden"
                                                                   name="community_uses_whole_water_as_sewer" value=""/>
                                                            <input id="community_have_water" type="hidden"
                                                                   name="community_have_water" value=""/>
                                                            <input id="community_have_sewer" type="hidden"
                                                                   name="community_have_sewer" value=""/>


                                                            <input id="water_additional_fee_table" type="hidden"
                                                                   name="water_additional_fee_table" value=""/>
                                                            <input id="sewer_additional_fee_table" type="hidden"
                                                                   name="sewer_additional_fee_table" value=""/>

                                                            <input id="water_base_administrator_meter_fee" type="hidden"
                                                                   name="water_base_administrator_meter_fee" value=""/>
                                                            <input id="sewer_base_administrator_meter_fee" type="hidden"
                                                                   name="sewer_base_administrator_meter_fee" value=""/>

                                                            <input id="water_minimum_fee_include" type="hidden"
                                                                   name="water_minimum_fee_include" value=""/>
                                                            <input id="sewer_minimum_fee_include" type="hidden"
                                                                   name="sewer_minimum_fee_include" value=""/>


                                                            <input id="has_minimum_charage_bill_water_active"
                                                                   type="hidden"
                                                                   name="has_minimum_charage_bill_water_active"
                                                                   value=""/>
                                                            <input id="has_minimum_charage_bill_sewer_active"
                                                                   type="hidden"
                                                                   name="has_minimum_charage_bill_sewer_active"
                                                                   value=""/>


                                                            <input id="water_minimum_fee_includes_uses" type="hidden"
                                                                   name="water_minimum_fee_includes_uses" value=""/>
                                                            <input id="sewer_minimum_fee_includes_uses" type="hidden"
                                                                   name="sewer_minimum_fee_includes_uses" value=""/>


                                                            <input id="unit_type_water" type="hidden"
                                                                   name="unit_type_water" value=""/>
                                                            <input id="unit_type_sewer" type="hidden"
                                                                   name="unit_type_sewer" value=""/>


                                                            <input id="water_minimum_fee_include_amount" type="hidden"
                                                                   name="water_minimum_fee_include_amount" value=""/>
                                                            <input id="sewer_minimum_fee_include_amount" type="hidden"
                                                                   name="sewer_minimum_fee_include_amount" value=""/>

                                                            <input id="community_water_use_same_rate_year" type="hidden"
                                                                   name="community_water_use_same_rate_year" value=""/>
                                                            <input id="community_sewer_use_same_rate_year" type="hidden"
                                                                   name="community_sewer_use_same_rate_year" value=""/>


                                                            <input id="billing_month_when_same_rate_year" type="hidden"
                                                                   name="billing_month_when_same_rate_year" value=""/>

                                                            <input id="reaming_billing_month" type="hidden"
                                                                   name="reaming_billing_month" value=""/>


                                                            <input id="sewer_base_fee" type="hidden"
                                                                   name="sewer_base_fee" value="0.00"/>
                                                            <input id="water_base_fee" type="hidden"
                                                                   name="water_base_fee" value="0.00"/>


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
                                            <div class="dollar">Bill $ <span> Selected Frequency Based</span></div>
                                            <div class="frequency_based_calculation_result">0</div>


                                            <div id="hidden-field-box">

                                                <input type="hidden" name="water_rate_calculation" value=""/>
                                                <input type="hidden" name="water_rate_calculation_increased" value=""/>
                                                <input type="hidden" name="sewer_rate_calculation" value=""/>
                                                <input type="hidden" name="sewer_rate_calculation_increased" value=""/>


                                                <input type="hidden" name="water_rate_calculation_annual" value=""/>

                                                <input type="hidden" name="water_rate_calculation_annual_increased"
                                                       value=""/>

                                                <input type="hidden" name="sewer_rate_calculation_annual" value=""/>
                                                <input type="hidden" name="sewer_rate_calculation_annual_increased"
                                                       value=""/>

                                                <input type="hidden" name="water_rate_calculation_monthly" value=""/>
                                                <input type="hidden" name="water_rate_calculation_monthly_increased"
                                                       value=""/>
                                                <input type="hidden" name="sewer_rate_calculation_monthly" value=""/>
                                                <input type="hidden" name="sewer_rate_calculation_monthly_increased"
                                                       value=""/>

                                                <input type="hidden" name="sewerage_based_on_water_uses" value=""/>

                                                <input type="hidden" name="sewerage_based_on_water_uses" value=""/>
                                                <input type="hidden" name="sewerage_based_on_water_uses" value=""/>
                                                <input type="hidden" name="sewerage_based_on_water_uses" value=""/>


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
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod
                                ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales
                                scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis,
                                ornare id lectus. Proin consectetur nibh quis urna gravida mollis.
                                <br>
                                <br>
                                <p></p>
                            </div>
                            <div>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod
                                ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales
                                scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis,
                                ornare id lectus. Proin consectetur nibh quis urna gravida mollis.
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

                    //calculate_rate();

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
</script>

<script src="http://mwraadvisoryboard.com/wp-content/plugins/ratecalculator/js/easyResponsiveTabs.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function () {
        //Horizontal Tab
        jQuery('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function (event) { // Callback function if tab is switched
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
            activate: function (event) { // Callback function if tab is switched
                var $tab = jQuery(this);
                var $info = jQuery('#nested-tabInfo2');
                var $name = jQuery('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>

<script type="text/javascript">


    jQuery(document).ready(function ($) {

        jQuery('#community-box,#year-box').change(function () {

            jQuery("#modal-overlay").show();
            var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
            var community = jQuery('#community-box').val();
            var year = jQuery('#year-box').val();
            var form_id = jQuery('#form_id').val();


            if (form_id == '62') {

                jQuery.ajax({
                    type: "POST",
                    url: "/wp-admin/admin-ajax.php",
                    data: {action: "calculation_data", community: community, year: year, form_id: form_id},
                    success: function (data) {
                        if (year == '') {
                            alert('Please Select Year');
                            jQuery("#modal-overlay").hide();
                            return false;
                        } else {
                            jQuery("#modal-overlay").hide();
                        }
                        if (jQuery('#community-box').val() != '' && jQuery('#year-box').val() != '') {
                            if ($('input[name="kgl_water_usages"]').val() == '' || $('input[name="hcf_water_usages"]').val() == '') {
                                alert("Please enter value in KGAL or HCF");
                                $("#modal-overlay").hide();
                            }
                        }
                        var json = JSON.parse(data);

                        // water rate

                        var water_frequency = json[50];
                        var cumulative;

                        var rate_calculation_way_sewer = json[153.1];
                        var rate_calculaton_way_water = json[269.1];


                        var sewerage_based_on_water_uses = json[132];
                        var community_uses_whole_water_as_sewer = json[156.1];
                        var community_have_water = json[157.1];
                        var community_have_sewer = json[157.2];


                        var feestype_water = json['58'];
                        var feestype_sewer = json['59'];

                        var water_additional_fee_table = json['161'];
                        var sewer_additional_fee_table = json['162'];


                        var water_base_administrator_meter_fee = json['166'];
                        var sewer_base_administrator_meter_fee = json['170'];

                        var feestype_water = json['165'];

                        var has_minimum_charge_bill_water = json['168'];
                        var has_minimum_charge_bill_sewer = json['169'];

                        //if community has minimum charge flat fee

                        var has_minimum_charage_bill_water_active = json['165.1'];
                        var has_minimum_charage_bill_sewer_active = json['168.1'];
                        has_minimum_charage_bill_water_active = '2';
                        has_minimum_charage_bill_sewer_active = '2';


                        var unit_type_water = json['274'];
                        var unit_type_sewer = json['275'];

                        //alert(unit_type_water);
                        //alert(unit_type_sewer);


                        var water_minimum_fee_includes_uses = json['173'];
                        var sewer_minimum_fee_includes_uses = json['174'];


                        var water_minimum_fee_include_amount = json['60'];
                        var sewer_minimum_fee_include_amount = json['61'];


                        var community_water_use_same_rate_year = json['179'];
                        var community_sewer_use_same_rate_year = json['189'];


                        var regex = /\S+/;
                        if (json[141] == 'false' || json[146.1] == "")
                            cumulative = 0;
                        else
                            cumulative = json[146.1];

                        // alert(water_frequency);

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
                                water_frequency = 136;
                                break;
                        }


                        //alert(water_frequency);

                        var water_base_fee = json[166];

                        if (water_base_fee == "") {
                            water_base_fee = 0;
                        }

                        if (community_water_use_same_rate_year == '0') {

                            water_rate_table_part1 = json[183];
                            water_rate_table_part2 = json[186];
                            jQuery('#water_rate_table_part1').val(water_rate_table_part1);
                            jQuery('#water_rate_table_part2').val(water_rate_table_part2);

                            var billing_month_when_same_rate_year = json['182'];
                            var reaming_billing_month = 12 - parseFloat(billing_month_when_same_rate_year);

                            jQuery('#billing_month_when_same_rate_year').val(billing_month_when_same_rate_year);
                            jQuery('#reaming_billing_month').val(reaming_billing_month);


                            jQuery('#water_additional_fee_table').val(water_additional_fee_table);

                        } else {
                            var water_rate_table = json[54];
                            jQuery('#water_rate_table').val(water_rate_table);
                        }


                        if (community_sewer_use_same_rate_year == '0') {

                            water_rate_table_part1 = json[183];
                            water_rate_table_part2 = json[186];
                            jQuery('#sewer_rate_table_part1').val(sewer_rate_table_part1);
                            jQuery('#sewer_rate_table_part2').val(sewer_rate_table_part2);

                            var billing_month_when_same_rate_year = json['182'];
                            var reaming_billing_month = 12 - parseFloat(billing_month_when_same_rate_year);

                            jQuery('#billing_month_when_same_rate_year').val(billing_month_when_same_rate_year);
                            jQuery('#reaming_billing_month').val(reaming_billing_month);


                            jQuery('#sewer_additional_fee_table').val(sewer_additional_fee_table);

                        } else {
                            var sewer_rate_table = json[54];
                            jQuery('#sewer_rate_table').val(sewer_rate_table);
                        }


                        if (community_sewer_use_same_rate_year == '0') {
                            sewer_rate_table_part1 = json[184];
                            sewer_rate_table_part2 = json[187];

                            jQuery('#sewer_rate_table_part1').val(sewer_rate_table_part1);
                            jQuery('#sewer_rate_table_part2').val(sewer_rate_table_part2);

                        } else {
                            var sewer_rate_table = json[55];
                            jQuery('#sewer_rate_table').val(sewer_rate_table);
                        }


                        if (community == "BOSTON") {
                            water_frequency = 365;
                        }


                        jQuery('#sewerage_based_on_water_uses').val(sewerage_based_on_water_uses);
                        jQuery('#rate_calculation_way_water').val(rate_calculaton_way_water);
                        jQuery('#rate_calculation_way_sewer').val(rate_calculation_way_sewer);


                        jQuery('#water_frequency').val(water_frequency);
                        jQuery('#water_base_fee').val(water_base_fee);
                        //jQuery('#water_rate_table').val(water_rate_table);


                        jQuery('#cumulative').val(cumulative);

                        jQuery('#community_have_water').val(community_have_water);
                        jQuery('#community_have_sewer').val(community_have_sewer);
                        jQuery('#community_uses_whole_water_as_sewer').val(community_uses_whole_water_as_sewer);

                        jQuery('#water_additional_fee_table').val(water_additional_fee_table);
                        jQuery('#water_minimum_fee_include_amount').val(water_minimum_fee_include_amount);


                        jQuery('#unit_type_water').val(unit_type_water);

                        jQuery('#water_minimum_fee_includes_uses').val(water_minimum_fee_includes_uses);


                        jQuery('#community_water_use_same_rate_year').val(community_water_use_same_rate_year);
                        jQuery('#community_sewer_use_same_rate_year').val(community_sewer_use_same_rate_year);


                        jQuery('#has_minimum_charage_bill_water_active').val(has_minimum_charage_bill_water_active);
                        jQuery('#has_minimum_charage_bill_sewer_active').val(has_minimum_charage_bill_sewer_active);


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

                        if (community == "BOSTON") {
                            sewer_frequency = 365;
                        }


                        var sewer_base_fee = json[170];

                        if (sewer_base_fee == '') {
                            sewer_base_fee = 0;
                        }


                        if (jQuery('#community-box').val() != "" && (water_rate_table == "false" && sewer_rate_table == "false")) {
                            alert("Data not found for this Community, You can not calculate Rate for this Community and Year.");
                            jQuery("#modal-overlay").hide();
                            return false;
                        }


                        jQuery('#sewer_frequency').val(sewer_frequency);
                        jQuery('#sewer_base_fee').val(sewer_base_fee);

                        jQuery('#sewer_additional_fee_table').val(sewer_additional_fee_table);
                        jQuery('#sewer_minimum_fee_include').val(sewer_minimum_fee_include);
                        jQuery('#unit_type_sewer').val(unit_type_sewer);

                        jQuery('#sewer_minimum_fee_includes_uses').val(sewer_minimum_fee_includes_uses);
                        jQuery('#sewer_minimum_fee_include_amount').val(sewer_minimum_fee_include_amount);

                        //calculate_rate();

                        jQuery("#modal-overlay").hide();
                    },
                    error: function (data) {
                        alert("Something went wrong, please try again later.");
                        return false;
                    }
                });

            }

        });


    });


    var service_type = jQuery("input:radio[name=service_type]:checked").val();

    jQuery('#bill_type').text(service_type);


    function calculate_rate() {

        console.log('calculate rate');

        var selected_community = jQuery('#community-box').val();
        var selected_year = jQuery('#year-box').val();

        if (selected_community == '' && selected_year == '') {
            alert('Please Select Community and Year');
            return false;
        }

        if (selected_community == '') {
            alert('Please Select Community');
            return false;
        }

        if (selected_year == '') {
            alert('Please Select Year');
            return false;
        }


        if (jQuery('input[name=kgl_water_usages]').val() == "" || jQuery('input[name=kgl_water_usages]').val() == 0) {

            jQuery('.calculation_result').text('0.00');
            jQuery('.montly_calculation_result').text('0.00');
            jQuery('.frequency_based_calculation_result').text('0.00');

            return false;

        }


        var range_array = get_water_range();
        var range_value_array = get_water_range_value();
        var billing_frequency = parseInt(jQuery('#water_frequency').val());

        //alert(range_array);
        //alert(range_value_array);
        //alert(billing_frequency);

        if (range_array == "" || range_value_array == "" || isNaN(billing_frequency)) {

            jQuery('.calculation_result').text('0.00');
            jQuery('.montly_calculation_result').text('0.00');
            jQuery('.frequency_based_calculation_result').text('0.00');

            return false;
        }

        ///alert('checking13');

        converted_water_usages();


        if (jQuery('#community-box').val() == "CAMBRIDGE") {
            billing_frequency = 1;

        }

        var water_usages = jQuery('#converted_water_usages').val();

        var water_usages = get_total_water_usages(selected_frequency, billing_frequency, water_usages);

        var bill_type = jQuery('#community-box').val();
        var service_type = jQuery("input:radio[name=service_type]:checked").val();


        jQuery('#bill_type').text(service_type);

        if (service_type == 'Water+Sewer Bill') {

            var water_bill_result = calculate_water_bill(billing_frequency, water_usages);

            jQuery('input[name=water_rate_calculation]').val(water_bill_result);
            var sewer_bill_result = calculate_sewer_bill(billing_frequency, water_usages);
            jQuery('input[name=sewer_rate_calculation]').val(sewer_bill_result);
            var water_bill_result_monthly = water_bill_result / 12;
            var selected_frequency = parseInt(jQuery('#frequency').val());
            var water_bill_result_frequency_based = water_bill_result / selected_frequency;
            var sewer_bill_result_monthly = sewer_bill_result / 12;
            var selected_frequency = parseInt(jQuery('#frequency').val());
            var sewer_bill_result_frequency_based = sewer_bill_result / selected_frequency;


        } else if (service_type == 'Water Bill') {


            var water_bill_result = calculate_water_bill(billing_frequency, water_usages);
            jQuery('input[name=water_rate_calculation]').val(water_bill_result);
            var water_bill_result_monthly = water_bill_result / 12;
            jQuery('input[name=water_rate_calculation_monthly]').val(water_bill_result_monthly);
            var selected_frequency = parseInt(jQuery('#frequency').val());
            var water_bill_result_frequency_based = water_bill_result / selected_frequency;
            jQuery('input[name=water_rate_calculation_monthly]').val(water_bill_result_monthly);
            jQuery('input[name=water_rate_calculation_annual]').val(water_bill_result_frequency_based);


        } else {

            var sewer_bill_result = calculate_sewer_bill(billing_frequency, water_usages);
            //alert(sewer_bill_result);
            jQuery('input[name=sewer_rate_calculation]').val(sewer_bill_result);
            var sewer_bill_result_monthly = sewer_bill_result / 12;
            var selected_frequency = parseInt(jQuery('#frequency').val());
            var sewer_bill_result_frequency_based = sewer_bill_result / selected_frequency;
            jQuery('input[name=sewer_rate_calculation_monthly]').val(sewer_bill_result_monthly);
            jQuery('input[name=sewer_rate_calculation_annual]').val(sewer_bill_result_frequency_based);

        }

        var bill_type = jQuery("input:radio[name=service_type]:checked").val();


        if (bill_type == 'Water+Sewer Bill') {

            result = (parseFloat(water_bill_result) + parseFloat(sewer_bill_result)).toFixed(2);

            jQuery('.frequency_based_calculation_result').text(delimitNumbers((parseFloat(water_bill_result_frequency_based) + parseFloat(sewer_bill_result_frequency_based)).toFixed(2)));
            jQuery('.montly_calculation_result').text(delimitNumbers((parseFloat(water_bill_result_monthly) + parseFloat(sewer_bill_result_monthly)).toFixed(2)));
            jQuery('input[name=water_rate_calculation]').val(water_bill_result);
            jQuery('input[name=sewer_rate_calculation]').val(sewer_bill_result);
            jQuery('input[name=water_rate_calculation_annual]').val(water_bill_result_frequency_based);
            jQuery('input[name=sewer_rate_calculation_annual]').val(sewer_bill_result_frequency_based);
            jQuery('input[name=water_rate_calculation_monthly]').val(water_bill_result_monthly);
            jQuery('input[name=sewer_rate_calculation_monthly]').val(sewer_bill_result_monthly);


        } else if (bill_type == 'Water Bill') {
            result = water_bill_result;


            jQuery('.montly_calculation_result').text(delimitNumbers(water_bill_result_monthly.toFixed(2)));
            jQuery('.frequency_based_calculation_result').text(delimitNumbers(water_bill_result_frequency_based.toFixed(2)));

        } else {
            result = sewer_bill_result;

            jQuery('.montly_calculation_result').text(delimitNumbers(sewer_bill_result_monthly.toFixed(2)));
            jQuery('.frequency_based_calculation_result').text(delimitNumbers(sewer_bill_result_frequency_based.toFixed(2)));

        }


        if (result != "") {
            jQuery('.calculation_result').text(delimitNumbers(result));

        } else {
            jQuery('.calculation_result').text('0.00');
        }


        reset_increments();
    }


    jQuery('#year-box').append(jQuery('<option />').val('').html('--Select Year --'));

    for (i = new Date().getFullYear(); i > 1900; i--) {
        jQuery('#year-box').append(jQuery('<option />').val(i).html(i));
    }


    jQuery('input[name=service_type]').click(function () {

        var bill_type = jQuery(this).val();
        jQuery('#bill_type').text(bill_type);

        if (bill_type == 'Water+Sewer Bill') {

            jQuery('#water_rates').show();
            jQuery('#sewer_rates').show();
        } else if (bill_type == 'Water Bill') {

            jQuery('#water_rates').show();
            jQuery('#sewer_rates').hide();

        } else {
            jQuery('#water_rates').hide();
            jQuery('#sewer_rates').show();
        }

        //calculate_rate();
    });


    var bill_type = jQuery('input[name=service_type]').val();

    if (bill_type == 'Water+Sewer Bill') {
        jQuery('#water_rates').show();
        jQuery('#sewer_rates').show();

    } else if (bill_type == 'Water Bill') {

        jQuery('#water_rates').show();
        jQuery('#sewer_rates').hide();

    } else {
        jQuery('#water_rates').hide();
        jQuery('#sewer_rates').show();
    }

    //calculate_rate();


    function cal_water_increased_percentage() {

        if (jQuery('input[name=kgl_water_usages]').val() == "" || jQuery('input[name=kgl_water_usages]').val() == 0) {

            reset_hidden_field_box();

        }

        var service_type = jQuery("input:radio[name=service_type]:checked").val();

        if (service_type == 'Water Bill') {

            var increament = jQuery("input[name=watrt_raising_rates]").val();
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

            var increament = jQuery("input[name=watrt_raising_rates]").val();
            var rate = parseFloat(jQuery('input[name=water_rate_calculation]').val());
            var sewer_rate_calculation_increased = jQuery('input[name=sewer_rate_calculation_increased]').val();
            var sewer_rate_calculation = jQuery('input[name=sewer_rate_calculation]').val();

            if (sewer_rate_calculation_increased != '') {
                var final_rate = parseFloat(sewer_rate_calculation_increased) + rate + (rate * increament / 100);
            } else {
                var final_rate = parseFloat(sewer_rate_calculation) + rate + (rate * increament / 100);
            }


            jQuery('input[name=water_rate_calculation_increased]').val(rate + (rate * increament / 100));

        }


        jQuery('.calculation_result').text(delimitNumbers(final_rate.toFixed(2)));
    }


    function cal_sew_increased_percentage() {

        if (jQuery('input[name=kgl_water_usages]').val() == "" || jQuery('input[name=kgl_water_usages]').val() == 0) {
            reset_hidden_field_box();

        }

        var service_type = jQuery("input:radio[name=service_type]:checked").val();
        if (service_type == 'Sewer Bill') {

            var increament = jQuery("input[name=sewer_raising_rates]").val();
            var rate = parseInt(jQuery('input[name=sewer_rate_calculation]').val());
            var final_rate = rate + (rate * increament / 100);
            jQuery('.calculation_result').text(delimitNumbers(final_rate.toFixed(2)));
            jQuery('input[name=sewer_rate_calculation_increased]').val(final_rate);

            var sewer_rate_monthly = parseFloat(jQuery('input[name=sewer_rate_calculation_monthly]').val());

            var final_rate_monthly = sewer_rate_monthly + (sewer_rate_monthly * increament / 100);
            jQuery('.montly_calculation_result').text(delimitNumbers(final_rate_monthly.toFixed(2)));
            jQuery('input[name=sewer_rate_calculation_monthly_increased]').val(final_rate_monthly);

            var sewer_rate_annual = parseFloat(jQuery('input[name=sewer_rate_calculation_annual]').val());

            var final_rate_annual = sewer_rate_monthly + (sewer_rate_annual * increament / 100);
            jQuery('.frequency_based_calculation_result').text(delimitNumbers(final_rate_annual.toFixed(2)));
            jQuery('input[name=sewer_rate_calculation_monthly_increased]').val(final_rate_annual);


        } else {

            var increament = jQuery("input[name=sewer_raising_rates]").val();
            var rate = parseInt(jQuery('input[name=sewer_rate_calculation]').val());

            var sewer_rate_monthly = parseInt(jQuery('input[name=sewer_rate_calculation_monthly]').val());
            var sewer_rate_annual = parseInt(jQuery('input[name=sewer_rate_calculation_annual]').val());

            var water_rate_calculation = jQuery('input[name=water_rate_calculation]').val();
            var water_rate_calculation_monthly = jQuery('input[name=water_rate_calculation_monthly]').val();
            var water_rate_calculation_annual = jQuery('input[name=water_rate_calculation_annual]').val();

            var water_rate_calculation_increased = jQuery('input[name=water_rate_calculation_increased]').val();
            var water_rate_calculation_monthly_increased = jQuery('input[name=water_rate_calculation_monthly_increased]').val();
            var water_rate_calculation_annual_increased = jQuery('input[name=water_rate_calculation_annual_increased]').val();


            if (water_rate_calculation_increased != '') {
                var final_rate = parseInt(water_rate_calculation_increased) + rate + (rate * increament / 100);
            } else {
                var final_rate = parseInt(water_rate_calculation) + rate + (rate * increament / 100);
            }


            if (water_rate_calculation_monthly_increased != '') {


                var water_final_rate_monthly = parseInt(water_rate_calculation_monthly_increased) + sewer_rate_monthly + (sewer_rate_monthly * increament / 100);

            } else {

                var water_final_rate_monthly = parseInt(water_rate_calculation_monthly) + sewer_rate_monthly + (rate * increament / 100);
            }

            if (water_rate_calculation_annual_increased != '') {
                var water_final_rate_annual = parseInt(water_rate_calculation_annual_increased) + sewer_rate_annual + (sewer_rate_annual * increament / 100);

            } else {
                var water_final_rate_annual = parseInt(water_rate_calculation_annual) + sewer_rate_annual + (sewer_rate_annual * increament / 100);

            }


            jQuery('input[name=sewer_rate_calculation_monthly_increased]').val(rate + (rate * increament / 100));
            jQuery('input[name=sewer_rate_calculation_annual_increased]').val(rate + (rate * increament / 100));
            jQuery('input[name=sewer_rate_calculation_increased]').val(rate + (rate * increament / 100));

            jQuery('.frequency_based_calculation_result').text(delimitNumbers(water_final_rate_annual.toFixed(2)));
            jQuery('.montly_calculation_result').text(delimitNumbers(water_final_rate_monthly.toFixed(2)));
        }

        jQuery('.calculation_result').text(delimitNumbers(final_rate.toFixed(2)));

    }


    function get_extra_fee_range(additional_fee_table) {

        var water_additional_fee_table = '(' + additional_fee_table + ')';
        var water_jsonArray = eval(water_additional_fee_table);
        var water_extra_fee_range_array = Array();

        for (i in water_jsonArray) {
            water_extra_fee_range_array[i] = water_jsonArray[i]["Tier Start"] + '-' + water_jsonArray[i]["Tier End"];
        }
        return water_extra_fee_range_array;
    }


    function get_extra_fee_range_type(additional_fee_table) {

        var water_additional_fee_table = '(' + additional_fee_table + ')';
        var water_jsonArray = eval(water_additional_fee_table);
        var water_extra_fee_range_type_array = Array();

        for (i in water_jsonArray) {
            water_extra_fee_range_type_array[i] = water_jsonArray[i]["Please Select"];
        }
        return water_extra_fee_range_type_array;

    }


    function get_extra_fee_range_value(additional_fee_table) {

        var water_additional_fee_table = '(' + additional_fee_table + ')';
        var water_jsonArray = eval(water_additional_fee_table);
        var water_extra_fee_range_value_array = Array();

        for (i in water_jsonArray) {
            if (water_jsonArray[i]["$ Per / (Selection)"] == '')
                water_extra_fee_range_value_array[i] = 0;
            else
                water_extra_fee_range_value_array[i] = water_jsonArray[i]["$ Per / (Selection)"];
        }
        return water_extra_fee_range_value_array;
    }


    function get_water_range() {

        var community_water_use_same_rate_year = jQuery('#community_water_use_same_rate_year').val();
        var community_sewer_use_same_rate_year = jQuery('#community_sewer_use_same_rate_year').val();

        if (community_water_use_same_rate_year == '0') {

            var water_rate_table_part1 = jQuery('#water_rate_table_part1').val();
            var water_rate_table_part2 = jQuery('#water_rate_table_part2').val();

            var water_rate_table_part1_data = '(' + water_rate_table_part1 + ')';
            var water_part1_jsonArray = eval(water_rate_table_part1);

            var water_rate_table_part2_data = '(' + water_rate_table_part2 + ')';
            var water_part2_jsonArray = eval(water_rate_table_part2);

            var water_range_array = Array();
            var water_range_array_part1 = Array();

            for (i in water_part1_jsonArray) {
                water_range_array_part1[i] = water_part1_jsonArray[i]["Tier Start"] + '-' + water_part1_jsonArray[i]["Tier End"];
            }

            var water_range_array_part2 = Array();

            for (i in water_part2_jsonArray) {
                water_range_array_part2[i] = water_part2_jsonArray[i]["Tier Start"] + '-' + water_part2_jsonArray[i]["Tier End"];
            }

            water_range_array['0'] = water_range_array_part1;
            water_range_array['1'] = water_range_array_part2;


            return water_range_array;

        } else {

            var water_rate_table = '(' + jQuery('#water_rate_table').val() + ')';
            var water_jsonArray = eval(water_rate_table);
            var water_range_array = Array();

            for (i in water_jsonArray) {
                water_range_array[i] = water_jsonArray[i]["Tier Start"] + '-' + water_jsonArray[i]["Tier End"];
            }
            return water_range_array;

        }


    }


    function get_water_range_value() {


        var community_water_use_same_rate_year = jQuery('#community_water_use_same_rate_year').val();

        //alert(community_water_use_same_rate_year);

        if (community_water_use_same_rate_year == '0') {

            var water_rate_table_part1 = jQuery('#water_rate_table_part1').val();
            var water_rate_table_part2 = jQuery('#water_rate_table_part2').val();


            var water_rate_table_part1_data = '(' + water_rate_table_part1 + ')';
            var water_part1_jsonArray = eval(water_rate_table_part1);


            var water_rate_table_part2_data = '(' + water_rate_table_part2 + ')';
            var water_part2_jsonArray = eval(water_rate_table_part2);


            var water_range_value_array = Array();
            var water_range_value_array_part1 = Array();

            for (i in water_part1_jsonArray) {
                water_range_value_array_part1[i] = water_part1_jsonArray[i]["Rate"];
            }

            var water_range_value_array_part2 = Array();

            for (i in water_part2_jsonArray) {
                water_range_value_array_part2[i] = water_part2_jsonArray[i]["Rate"];

            }

            water_range_value_array['0'] = water_range_value_array_part1;
            water_range_value_array['1'] = water_range_value_array_part2;


            return water_range_value_array;

        } else {

            var water_rate_table = '(' + jQuery('#water_rate_table').val() + ')';
            var water_jsonArray = eval(water_rate_table);

            var water_range_value_array = Array();

            for (i in water_jsonArray) {
                water_range_value_array[i] = water_jsonArray[i]["Rate"];
            }

            return water_range_value_array;

        }


    }


    // function get sewer ranger array

    function get_sewer_range() {


        if (community_sewer_use_same_rate_year == '0') {

            var sewer_rate_table_part1 = jQuery('#sewer_rate_table_part1').val();
            var sewer_rate_table_part2 = jQuery('#sewer_rate_table_part2').val();

            var sewer_rate_table_part1_data = '(' + sewer_rate_table_part1 + ')';
            var sewer_part1_jsonArray = eval(sewer_rate_table_part1_data);

            var sewer_rate_table_part2_data = '(' + sewer_rate_table_part2 + ')';
            var sewer_part2_jsonArray = eval(sewer_rate_table_part2_data);

            var sewer_range_array = Array();
            var sewer_range_array_part1 = Array();

            for (i in sewer_part1_jsonArray) {
                sewer_range_array_part1[i] = sewer_part1_jsonArray[i]["Tier Start"] + '-' + sewer_part1_jsonArray[i]["Tier End"];
            }

            var sewer_range_array_part2 = Array();

            for (i in sewer_part2_jsonArray) {
                sewer_range_array_part2[i] = sewer_part2_jsonArray[i]["Tier Start"] + '-' + sewer_part2_jsonArray[i]["Tier End"];
            }

            sewer_range_array['0'] = sewer_range_array_part1;
            sewer_range_array['1'] = sewer_range_array_part2;

        } else {
            var sewer_rate_table = jQuery('#sewer_rate_table').val();
            var sewer_rate_table = '(' + jQuery('#sewer_rate_table').val() + ')';
            var sewer_jsonArray = eval(sewer_rate_table);
            var sewer_range_array = Array();

            for (i in sewer_jsonArray) {
                sewer_range_array[i] = sewer_jsonArray[i]["Tier Start"] + '-' + sewer_jsonArray[i]["Tier End"];
            }

        }
        return sewer_range_array;
    }

    // function to get sewer rate table array for values

    function get_sewer_range_value() {

        var community_sewer_use_same_rate_year = jQuery('#community_sewer_use_same_rate_year').val();

        if (community_sewer_use_same_rate_year == '0') {

            var sewer_rate_table_part1 = jQuery('#sewer_rate_table_part1').val();
            var sewer_rate_table_part2 = jQuery('#sewer_rate_table_part2').val();

            var sewer_rate_table_part1_data = '(' + sewer_rate_table_part1 + ')';
            var sewer_part1_jsonArray = eval(sewer_rate_table_part1_data);

            var sewer_rate_table_part2_data = '(' + sewer_rate_table_part2 + ')';
            var sewer_part2_jsonArray = eval(sewer_rate_table_part2_data);

            var sewer_range_value_array = Array();
            var sewer_range_value_array_part1 = Array();

            for (i in sewer_part1_jsonArray) {
                sewer_range_value_array_part1[i] = sewer_part1_jsonArray[i]["Rate"];
            }

            var water_range_value_array_part2 = Array();

            for (i in sewer_part2_jsonArray) {
                water_range_value_array_part2[i] = sewer_part2_jsonArray[i]["Rate"];
            }

            sewer_range_value_array['0'] = sewer_range_value_array_part1;
            sewer_range_value_array['1'] = water_range_value_array_part2;

        } else {
            var sewer_rate_table = '(' + jQuery('#sewer_rate_table').val() + ')';
            var sewer_jsonArray = eval(sewer_rate_table);
            var sewer_range_value_array = Array();
            for (i in sewer_jsonArray) {
                sewer_range_value_array[i] = sewer_jsonArray[i]["Rate"];
            }

        }
        return sewer_range_value_array;
    }


    // function to calculate water bill

    function calculate_water_bill(billing_frequency, water_usages) {

        var community_water_use_same_rate_year = jQuery('#community_water_use_same_rate_year').val();


        if (community_water_use_same_rate_year == '0') {
            var water_rate_table_part1 = jQuery('#water_rate_table_part1').val();
            var water_rate_table_part2 = jQuery('#water_rate_table_part2').val();
        } else {
            var water_rate_table = jQuery('#water_rate_table').val();
        }


        var base_fee = parseFloat(jQuery('#water_base_fee').val());


        if (parseInt(jQuery('#cumulative').val()) == 1) {
            var max_range = (parseInt(water_usages) / billing_frequency).toFixed(14);
        } else {
            var max_range = (parseInt(water_usages) / billing_frequency).toFixed(14);
        }


        var range_array = get_water_range();


        var range_value_array = get_water_range_value();


        var water_additional_fee_table = jQuery('#water_additional_fee_table').val();


        if (community_water_use_same_rate_year == '0') {


            if (jQuery('#community-box').val() == "ST. PAUL111") {
                var max_range = ((water_usages / billing_frequency) / 2).toFixed(14);
                var water_main_surcharge = max_range * 2 * 0.2;
                var recovery_fee = 4.5;
            }


            var billing_month_when_same_rate_year = parseInt(jQuery('#billing_month_when_same_rate_year').val());
            var reaming_billing_month = 12 - billing_month_when_same_rate_year;


            var billing_frequency_part1 = billing_month_when_same_rate_year;
            var billing_frequency_part2 = reaming_billing_month;


            // var water_usage_part1 = ((water_usages/12)*billing_frequency_part1)/billing_frequency;
            // var water_usages_part2 = ((water_usages/12)*billing_frequency_part2)/billing_frequency;

            // alert('billing_frequency before passing ='+billing_frequency);

            var water_usage_part1 = (water_usages / 12) * (12 / billing_frequency);
            var water_usages_part2 = (water_usages / 12) * (12 / billing_frequency);

            if (jQuery('#community-box').val() == "Saint Paul") {
                water_usage_part1 = water_usage_part1 / 2;
                water_usages_part2 = water_usages_part2 / 2;
            }


            var max_range_part1 = water_usage_part1;
            var max_range_part2 = water_usages_part2

            var water_rate_type = jQuery('#rate_calculation_way_water').val();
            var sewer_rate_type = jQuery('#rate_calculation_way_water').val();

            var has_community_minimum_fee_water = jQuery('#has_minimum_charage_bill_water_active').val();
            var water_minimum_fee_include_amount = jQuery('#water_minimum_fee_include_amount').val();
            var water_minimum_fee_includes_uses = jQuery('#water_minimum_fee_includes_uses').val();

            var water_bill_result_part1 = calculate_rate_func(range_array[0], range_value_array[0], max_range_part1, billing_frequency_part1, base_fee, water_usage_part1, water_additional_fee_table, water_rate_type, has_community_minimum_fee_water, water_minimum_fee_include_amount, water_minimum_fee_includes_uses);
            var water_bill_result_part2 = calculate_rate_func(range_array[1], range_value_array[1], max_range_part2, billing_frequency_part2, base_fee, water_usages_part2, water_additional_fee_table, sewer_rate_type, has_community_minimum_fee_water, water_minimum_fee_include_amount, water_minimum_fee_includes_uses);

            //alert(jQuery('#community-box').val());

            if (jQuery('#community-box').val() == "Saint Paul") {

                water_bill_result_part1 = billing_frequency * parseFloat(water_bill_result_part1);
                water_bill_result_part2 = billing_frequency * parseFloat(water_bill_result_part2);
                water_bill_result = ((water_bill_result_part1 + water_bill_result_part2) - (billing_frequency * base_fee)).toFixed(2);


            } else {
                water_bill_result_part1 = (billing_frequency_part1 * base_fee) + (billing_frequency_part1 * parseFloat(water_bill_result_part1));
                water_bill_result_part2 = (billing_frequency_part2 * base_fee) + (billing_frequency_part2 * parseFloat(water_bill_result_part2));
                water_bill_result = (water_bill_result_part1 + water_bill_result_part2).toFixed(2);
            }

        } else {
            var water_rate_type = jQuery('#rate_calculation_way_water').val();
            var has_community_minimum_fee_water = jQuery('#has_minimum_charage_bill_water_active').val();
            var water_minimum_fee_include_amount = jQuery('#water_minimum_fee_include_amount').val();
            var water_minimum_fee_includes_uses = jQuery('#water_minimum_fee_includes_uses').val();

            var water_bill_result = calculate_rate_func(range_array, range_value_array, max_range, billing_frequency, base_fee, water_usages, water_additional_fee_table, water_rate_type, has_community_minimum_fee_water, water_minimum_fee_include_amount, water_minimum_fee_includes_uses);

            console.log('water_bill_result=' + water_bill_result);
            console.log('base_fee=' + base_fee);

            water_bill_result = billing_frequency * water_bill_result;
        }

        var addition_fee_calcualtion_water = get_additional_water_fee_calculated(billing_frequency, max_range);

        if (isNaN(addition_fee_calcualtion_water))
            water_bill_result = parseFloat(water_bill_result).toFixed(2);
        else
            water_bill_result = (parseFloat(water_bill_result) + addition_fee_calcualtion_water).toFixed(2);

        return water_bill_result;

    }


    // Function to calculate Sewer Bill

    function calculate_sewer_bill(billing_frequency, water_usages) {

        var community_use_whole_water_as_sewer = jQuery('#community_uses_whole_water_as_sewer').val();

        if (community_use_whole_water_as_sewer == '1') {
            var used_water_as_sewer_percentage = parseInt(jQuery('#sewerage_based_on_water_uses').val());
        }

        var community_sewer_use_same_rate_year = jQuery('#community_sewer_use_same_rate_year').val();

        if (community_sewer_use_same_rate_year == '0') {
            var sewer_rate_table_part1 = jQuery('#sewer_rate_table_part1').val();
            var sewer_rate_table_part2 = jQuery('#sewer_rate_table_part2').val();
        } else {
            var sewer_rate_table = jQuery('#sewer_rate_table').val();
        }


        if (jQuery('#community-box').val() == "WALPOLE") {
            water_usages = water_usages * .8;
        }


        if (jQuery('#community-box').val() == "NORWOOD") {
            water_usages = water_usages * .6;
        }

        if (jQuery('#community-box').val() == "Los Angeles") {
            water_usages = water_usages * .98;
        }
        //alert(jQuery('#community-box').val());
        if (jQuery('#community-box').val() == "WORCESTER") {
            water_usages = water_usages * .8;
        }
        //alert(water_usages);


        var base_fee = parseFloat(jQuery('#sewer_base_fee').val()); //doller plus


        if (parseInt(jQuery('#cumulative').val()) == 1) {
            var max_range = (water_usages).toFixed(14);
        } else {
            var max_range = (water_usages / billing_frequency).toFixed(14);
        }

        var range_array = get_sewer_range();
        var range_value_array = get_sewer_range_value();

        var sewer_additional_fee_table = jQuery('#sewer_additional_fee_table').val();

        if (community_sewer_use_same_rate_year == '0') {

            var billing_month_when_same_rate_year = jQuery('#billing_month_when_same_rate_year').val();
            var reaming_billing_month = jQuery('#billing_month_when_same_rate_year').val();

            var billing_frequency_part1 = billing_month_when_same_rate_year;
            var billing_frequency_part2 = reaming_billing_month;

            var sewer_rate_type = jQuery('#rate_calculation_way_sewer').val();

            var has_community_minimum_fee_sewer = jQuery('#has_minimum_charage_bill_sewer_active').val();
            var sewer_minimum_fee_include_amount = jQuery('#sewer_minimum_fee_include_amount').val();
            var sewer_minimum_fee_includes_uses = jQuery('#water_minimum_fee_includes_uses').val();


            var sewer_bill_result_part1 = calculate_rate_func(range_array[0], range_value_array[0], max_range, billing_frequency_part1, base_fee, water_usages, sewer_additional_fee_table, sewer_rate_type, has_community_minimum_fee_sewer, sewer_minimum_fee_include_amount, sewer_minimum_fee_includes_uses);
            var sewer_bill_result_part2 = calculate_rate_func(range_array[1], range_value_array[1], max_range, billing_frequency_part2, base_fee, water_usages, sewer_additional_fee_table, sewer_rate_type, has_community_minimum_fee_sewer, sewer_minimum_fee_include_amount, sewer_minimum_fee_includes_uses);


            var sewer_bill_result = (parseFloat(water_bill_result_part1) + parseFloat(water_bill_result_part2)).toFixed(2);

            var addition_fee_calcualtion_sewer = get_additional_sewer_fee_calculated(billing_frequency, max_range);
            sewer_bill_result = (parseFloat(sewer_bill_result) + addition_fee_calcualtion_sewer).toFixed(2);


        } else {

            console.log('range_array=' + range_array);
            console.log('range_value_array=' + range_value_array);
            console.log('max_range=' + max_range);
            console.log('billing_frequency=' + billing_frequency);
            console.log('base_fee=' + base_fee);
            console.log('water_usages=' + water_usages);
            console.log('sewer_additional_fee_table=' + sewer_additional_fee_table);

            var sewer_rate_type = jQuery('#rate_calculation_way_sewer').val();

            var has_community_minimum_fee_sewer = jQuery('#has_minimum_charage_bill_sewer_active').val();
            var sewer_minimum_fee_include_amount = jQuery('#sewer_minimum_fee_include_amount').val();
            var sewer_minimum_fee_includes_uses = jQuery('#water_minimum_fee_includes_uses').val();

            var sewer_bill_result = calculate_rate_func(range_array, range_value_array, max_range, billing_frequency, base_fee, water_usages, sewer_additional_fee_table, sewer_rate_type, has_community_minimum_fee_sewer, sewer_minimum_fee_include_amount, sewer_minimum_fee_includes_uses);

            sewer_bill_result = (billing_frequency * sewer_bill_result).toFixed(2);


            //sewer_bill_result = (billing_frequency* (base_fee+( parseFloat(sewer_bill_result)  ) ) ).toFixed(2);

        }


        return sewer_bill_result;
    }

    /*
      Newly Added 3 Parameter
      1.water_rate_type- has flat fee or not
      2.has_community_minimum_fee-if community has minimum fee
      3.
    */

    function calculate_rate_funczz(range_array, range_value_array, max_range, billing_frequency, base_fee, water_usages, additional_fee_table, sewer_water_rate_type, has_community_minimum_fee, minimum_fee_amount, minimum_fee_includes_uses) {
        var rLen = range_array.length;
        var total_difference = 0;
        var actual_fee = 0;

        for (var i = 0; i < rLen; i++) {
            console.log('numb = ' + i);
            var temp_array = range_array[i].split('-');
            var max_value = parseFloat(temp_array[1]);
            var min_value = parseFloat(temp_array[0]);
            if (i === 0) {
                var diff_value = max_value - min_value;

                console.log('max_value=' + max_value);
                console.log('min_value=' + min_value);
                console.log('diff_value=' + diff_value);

            } else {

                var first_row_array = range_array[0].split('-');
                var first_row_range_end = parseFloat(first_row_array[1]);
                var second_row_array = range_array[1].split('-');
                var second_row_range_start = parseFloat(second_row_array[0]);
                var all_start_end_difference = second_row_range_start - first_row_range_end;
                var diff_value = max_value - min_value;
                diff_value = diff_value + all_start_end_difference;
            }
        }
        var water_bill_result = base_fee + actual_fee;
        return '219.60';
    }

    function calculate_rate_func(range_array, range_value_array, max_range, billing_frequency, base_fee, water_usages, additional_fee_table, sewer_water_rate_type, has_community_minimum_fee, minimum_fee_amount, minimum_fee_includes_uses) {

        var rLen = range_array.length;
        var total_difference = 0;
        var actual_fee = 0;

        for (var i = 0; i < rLen; i++) {
            console.log('numb = ' + i);

            if (sewer_water_rate_type === "1") {


                var temp_array = range_array[i].split('-');
                console.log('range_array_value=' + range_array[i]);
                var max_value = parseFloat(temp_array[1]);
                var min_value = parseFloat(temp_array[0]);

                if (i === 0) {
                    var diff_value = max_value - min_value;
                } else {

                    var first_row_array = range_array[0].split('-');
                    var first_row_range_end = parseFloat(first_row_array[1]);
                    var second_row_array = range_array[1].split('-');
                    var second_row_range_start = parseFloat(second_row_array[0]);
                    var all_start_end_difference = second_row_range_start - first_row_range_end;
                    var diff_value = max_value - min_value;
                    diff_value = diff_value + all_start_end_difference;

                }

                var remaining_difference = max_range - diff_value;

                if (max_value <= max_range && rLen != i + 1) {
                    total_difference = total_difference + diff_value;
                    var count = diff_value;
                } else {
                    var count = max_range - total_difference;
                }


                if (max_value <= max_range) {

                    if (i === 0) {

                        if (minimum_fee_includes_uses != '0') {

                            actual_fee = actual_fee + 1 * range_value_array[i];
                            //actual_fee  = actual_fee + count*range_value_array[i];

                        } else {
                            //actual_fee  = actual_fee + 1*range_value_array[i];
                            actual_fee = actual_fee + 1 * parseFloat(minimum_fee_amount);
                        }

                        // alert(actual_fee+"first round");

                    } else {
                        actual_fee = actual_fee + count * range_value_array[i];
                        //alert(actual_fee+"second round");

                    }


                } else {
                    if (i === 0) {

                        //actual_fee  = actual_fee + 1*range_value_array[i];
                        if (minimum_fee_includes_uses != '0') {

                            actual_fee = actual_fee + 1 * range_value_array[i];
                            //actual_fee  = actual_fee + count*range_value_array[i];

                        } else {
                            //actual_fee  = actual_fee + 1*range_value_array[i];
                            actual_fee = actual_fee + 1 * parseFloat(minimum_fee_amount);
                        }


                    } else {
                        actual_fee = actual_fee + count * range_value_array[i];


                    }
                    break;
                }


            } else {


                var temp_array = range_array[i].split('-');
                var max_value = parseFloat(temp_array[1]);
                var min_value = parseFloat(temp_array[0]);
                console.log(range_array);
                console.log(temp_array);
                console.log(max_range);

                if (i === 0) {
                    var diff_value = max_value - min_value;

                    console.log('max_value=' + max_value);
                    console.log('min_value=' + min_value);
                    console.log('diff_value=' + diff_value);

                } else {

                    var first_row_array = range_array[0].split('-');
                    var first_row_range_end = parseFloat(first_row_array[1]);
                    var second_row_array = range_array[1].split('-');
                    var second_row_range_start = parseFloat(second_row_array[0]);
                    var all_start_end_difference = second_row_range_start - first_row_range_end;
                    var diff_value = max_value - min_value;
                    diff_value = diff_value + all_start_end_difference;
                }

                var remaining_difference = max_range - diff_value;


                if (max_value <= max_range && rLen !== i + 1) {

                    total_difference = total_difference + diff_value;
                    var count = diff_value;
                    console.log('if=' + count);
                } else {
                    var count = max_range - total_difference;
                    console.log(max_range + '-' + total_difference + '=' + count);
                }


                if (sewer_water_rate_type == "1" && i === 0 && minimum_fee_includes_uses == '0') {
                    count = 1;

                }

                console.log(sewer_water_rate_type);
                console.log(minimum_fee_includes_uses);
                console.log(count);

                console.log('max_value=' + max_value);
                console.log('max_range=' + max_range);
                console.log('actual_fee before loop=' + actual_fee);

                if (max_value <= max_range && max_value !== "") {

                    actual_fee = actual_fee + count * range_value_array[i];

                } else {

                    actual_fee = actual_fee + count * range_value_array[i];
                    break;
                }


            }

            console.log(count + '*' + range_value_array[i] + '=' + count * range_value_array[i]);

            console.log('sewer_water_rate_type=' + sewer_water_rate_type);
            console.log('actual_fee=' + actual_fee);

        }

        console.log('has_community_minimum_fee=' + has_community_minimum_fee);
        console.log('minimum_fee_amount=' + minimum_fee_amount);
        //alert(actual_fee < parseFloat(minimum_fee_amount));

        // if(has_community_minimum_fee == '2' ){
        if (has_community_minimum_fee === '2' && actual_fee < parseFloat(minimum_fee_amount)) {

            actual_fee = minimum_fee_amount;
            //actual_fee = actual_fee + parseFloat(minimum_fee_amount);

        }

        console.log('actual_fee_final=' + actual_fee);

        if (base_fee === "") {
            base_fee = 0;
        }

        var unit_type_water = jQuery('#unit_type_sewer').val(unit_type_water);
        var unit_type_sewer = jQuery('#unit_type_sewer').val(unit_type_sewer);

        // jQuery('#rate_calculation_way').val() == "1"

        console.log('actual base_fee=' + base_fee);

        if (jQuery('#community-box').val() === "Saint Paul") {

            //var water_bill_result =  (billing_frequency*((base_fee+recovery_fee)+water_main_surcharge+actual_fee)).toFixed(2);
            //var water_bill_result = actual_fee;

            var water_bill_result = base_fee + actual_fee;

        } else if (unit_type_water === "2" || unit_type_sewer === "2") {

            var water_bill_result = base_fee + actual_fee;

        } else {
            var water_bill_result = base_fee + actual_fee;
        }
        console.log('after adding base fee=' + water_bill_result);

        return water_bill_result;
    }


    function get_additional_water_fee_calculated(billing_frequency, max_range) {

        var water_additional_fee_table = jQuery('#water_additional_fee_table').val();

        if (water_additional_fee_table != false) {

            //var  extra_fee_range = get_extra_fee_range(water_additional_fee_table);
            var extra_fee_range_type = get_extra_fee_range_type(water_additional_fee_table);
            var extra_fee_range_value = get_extra_fee_range_value(water_additional_fee_table);

            var rLen = extra_fee_range_type.length;
            var additional_fee_calculated = 0;

            for (i = 0; i < rLen; i++) {

                if (extra_fee_range_type[i] == 'Per Bill') {
                    // additional_fee_calculated = additional_fee_calculated + billing_frequency*parseFloat(extra_fee_range_value[i]);
                    additional_fee_calculated = additional_fee_calculated + parseFloat(extra_fee_range_value[i]);


                } else if (extra_fee_range_type[i] == 'Per Unit') {
                    additional_fee_calculated = additional_fee_calculated + max_range * parseFloat(extra_fee_range_value[i]);

                } else {

                    additional_fee_calculated = additional_fee_calculated + parseFloat(extra_fee_range_value[i]) / billing_frequency;
                }

            }

        }

        var additional_fee_calculated = additional_fee_calculated * billing_frequency;
        return additional_fee_calculated;
    }


    function get_additional_sewer_fee_calculated(billing_frequency, max_range) {

        var sewer_additional_fee_table = jQuery('#sewer_additional_fee_table').val();

        //var  extra_fee_range = get_extra_fee_range(sewer_additional_fee_table);
        var extra_fee_range_type = get_extra_fee_range_type(sewer_additional_fee_table);
        var extra_fee_range_value = get_extra_fee_range_value(sewer_additional_fee_table);

        var rLen = extra_fee_range_type.length;
        var additional_fee_calculated = 0;

        for (i = 0; i < rLen; i++) {

            if (extra_fee_range_type[i] == 'Per Bill') {

                additional_fee_calculated = additional_fee_calculated + billing_frequency * parseFloat(extra_fee_range_value[i]);

            } else if (extra_fee_range_type[i] == 'Per Unit') {

                additional_fee_calculated = additional_fee_calculated + max_range * parseFloat(extra_fee_range_value[i]);

            } else {

            }
        }
        return additional_fee_calculated;
    }


</script>


<div id="modal-overlay">
    <img id="text" src="<?php echo site_url(); ?>/wp-content/uploads/2017/05/spiffygif_32x32.gif"/>
</div>
