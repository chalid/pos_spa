<?php

//

/**
 * app_helper.php
 *
 * @package     arch-php
 * @author      jafar <jafar@xinix.co.id>
 * @copyright   Copyright(c) 2011 PT Sagara Xinix Solusitama.  All Rights Reserved.
 *
 * Created on 2011/11/21 00:00:00
 *
 * This software is the proprietary information of PT Sagara Xinix Solusitama.
 *
 * History
 * =======
 * (dd/mm/yyyy hh:mm:ss) (author)
 * 2011/11/21 00:00:00   jafar <jafar@xinix.co.id>
 *
 *
 */
if (!function_exists('format_money')) {

    function format_money($value) {
        return number_format($value, 2);
    }

}

function format_full_date_id($mysql_date) {
    $MONTHS = array(
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember',
    );
    $d = strtotime($mysql_date);
    return date('d', $d) . ' ' . ($MONTHS[intval(date('m', $d)) - 1]) . ' ' . date('Y', $d);
}

$vessels = array();

function format_vessel_name($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['name'];
}

function format_vessel_owner($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['owner'];
}

function format_vessel_year($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['year'];
}

function format_vessel_gt($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['grt'];
}

function format_vessel_imo($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['imo'];
}

function format_vessel_dwt($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['dwt'];
}

function format_vessel_loa($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['loa'];
}

function format_vessel_sign($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['call_sign'];
}

function format_vessel_port($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['port_register'];
}

function format_vessel_type($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['vessel_type_id'];
}

function format_vessel_flag($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['flag'];
}

function format_vessel_hp($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['hp'];
}

function format_vessel_shipping($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['shipping_area'];
}

function format_vessel_register_no($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['registration_no'];
}

function format_vessel_country($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['country_id'];
}

function format_vessel_port_register($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['port_register'];
}

function format_vessel_draft($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['draft'];
}

function format_vessel_nt($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['nt'];
}

function format_vessel_dnl($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['dnl'];
}

function format_vessel_voyage($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['voyage'];
}

function format_vessel_captain($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['captain'];
}

function format_vessel_lenght($value) {
    $CI = &get_instance();

    global $vessels;

    $vessel = @$vessels[$value];

    if (empty($vessel)) {
        $vessel = $CI->db->where('id', $value)->get('vessel')->row_array();
        $vessels[$value] = $vessel;
    }

    return @$vessel['lenght'];
}

// added by adoel
// return array data of employee
function format_employee($id = null) {
    $CI = &get_instance();
    $CI->db->select('name,rank,code');

    if($id){
        $data = $CI->db->where('id', $id)->get('employee')->row_array();
    }else{
        $data = $CI->db->get('employee')->result_array();   
    }

    return $data;
}

function ac_vessel() {
    $CI = & get_instance();

    $data = array(
        'uniqid' => uniqid('ac_vessel_'),
        'vessel' => array(),
    );

    if (!empty($_POST['vessel_id'])) {
        $sql = '
            SELECT 
                vessel.*, 
                country.name `country_name`, 
                vt.short_name `vessel_type`, 
                s.svalue `vessel_traject`, 
                sy.svalue `vessel_status`
            FROM vessel
            JOIN country ON vessel.country_id = country.id
            JOIN vessel_type vt ON vt.id = vessel.vessel_type_id
            JOIN sysparam s ON s.skey = vessel.traject
            JOIN sysparam sy ON sy.skey = vessel.vessel_status
            WHERE s.sgroup = "traject"
            AND sy.sgroup = "vessel_status"
            AND vessel.id = ?
        ';
        $data['vessel'] = $CI->db->query($sql, array($_POST['vessel_id']))->row_array();
    }

    return $CI->load->view('helpers/ac_vessel', $data, 1);
}

function rp_satuan($angka, $debug) {
    $a_str['1'] = "satu";
    $a_str['2'] = "dua";
    $a_str['3'] = "tiga";
    $a_str['4'] = "empat";
    $a_str['5'] = "lima";
    $a_str['6'] = "enam";
    $a_str['7'] = "tujuh";
    $a_str['8'] = "delapan";
    $a_str['9'] = "sembilan";


    $terbilang = '';
    $panjang = strlen($angka);
    for ($b = 0; $b < $panjang; $b++) {
        $a_bil[$b] = substr($angka, $panjang - $b - 1, 1);
    }

    if ($panjang > 2) {
        if ($a_bil[2] == "1") {
            $terbilang = " seratus";
        } else if ($a_bil[2] != "0") {
            $terbilang = " " . $a_str[$a_bil[2]] . " ratus";
        }
    }

    if ($panjang > 1) {
        if ($a_bil[1] == "1") {
            if ($a_bil[0] == "0") {
                $terbilang .=" sepuluh";
            } else if ($a_bil[0] == "1") {
                $terbilang .=" sebelas";
            } else {
                $terbilang .=" " . $a_str[$a_bil[0]] . " belas";
            }
            return $terbilang;
        } else if ($a_bil[1] != "0") {
            $terbilang .=" " . $a_str[$a_bil[1]] . " puluh";
        }
    }

    if ($a_bil[0] != "0") {
        $terbilang .=" " . $a_str[$a_bil[0]];
    }
    return $terbilang;
}

function rp_terbilang($angka, $debug) {
    $terbilang = '';
    $angka = str_replace(".", ",", $angka);


    @list ($angka, $desimal) = explode(",", $angka);
    $panjang = strlen($angka);
    for ($b = 0; $b < $panjang; $b++) {
        $myindex = $panjang - $b - 1;
        $a_bil[$b] = substr($angka, $myindex, 1);
    }
    if ($panjang > 9) {
        $bil = $a_bil[9];
        if ($panjang > 10) {
            $bil = $a_bil[10] . $bil;
        }

        if ($panjang > 11) {
            $bil = $a_bil[11] . $bil;
        }
        if ($bil != "" && $bil != "000") {
            $terbilang .= rp_satuan($bil, $debug) . " milyar";
        }
    }

    if ($panjang > 6) {
        $bil = $a_bil[6];
        if ($panjang > 7) {
            $bil = $a_bil[7] . $bil;
        }

        if ($panjang > 8) {
            $bil = $a_bil[8] . $bil;
        }
        if ($bil != "" && $bil != "000") {
            $terbilang .= rp_satuan($bil, $debug) . " juta";
        }
    }

    if ($panjang > 3) {
        $bil = $a_bil[3];
        if ($panjang > 4) {
            $bil = $a_bil[4] . $bil;
        }

        if ($panjang > 5) {
            $bil = $a_bil[5] . $bil;
        }
        if ($bil != "" && $bil != "000") {
            $terbilang .= rp_satuan($bil, $debug) . " ribu";
        }
    }

    $bil = $a_bil[0];
    if ($panjang > 1) {
        $bil = $a_bil[1] . $bil;
    }

    if ($panjang > 2) {
        $bil = $a_bil[2] . $bil;
    }
    //die($bil);
    if ($bil != "" && $bil != "000") {
        $terbilang .= rp_satuan($bil, $debug);
    }
    return trim($terbilang);
}

function convertNumber($num) {
    @list($num, $dec) = explode(".", $num);
    $output = "";
//    list($num, $dec) = str_replace(".",",", $num);

    if ($num{0} == "-") {
        $output = "negative ";
        $num = ltrim($num, "-");
    } else if ($num{0} == "+") {
        $output = "positive ";
        $num = ltrim($num, "+");
    }

    if ($num{0} == "0") {
        $output .= "zero";
    } else {
        $num = str_pad($num, 36, "0", STR_PAD_LEFT);
        $group = rtrim(chunk_split($num, 3, " "), " ");
        $groups = explode(" ", $group);

        $groups2 = array();
        foreach ($groups as $g)
            $groups2[] = convertThreeDigit($g{0}, $g{1}, $g{2});

        for ($z = 0; $z < count($groups2); $z++) {
            if ($groups2[$z] != "") {
                $output .= $groups2[$z] . convertGroup(11 - $z) . ($z < 11 && !array_search('', array_slice($groups2, $z + 1, -1))
                        && $groups2[11] != '' && $groups[11]{0} == '0' ? " and " : ", ");
            }
        }

        $output = rtrim($output, ", ");
    }

    if ($dec > 0) {
        $output .= " point";
        for ($i = 0; $i < strlen($dec); $i++)
            $output .= " " . convertDigit($dec{$i});
    }

    return $output;
}

function convertGroup($index) {
    switch ($index) {
        case 11: return " decillion";
        case 10: return " nonillion";
        case 9: return " octillion";
        case 8: return " septillion";
        case 7: return " sextillion";
        case 6: return " quintrillion";
        case 5: return " quadrillion";
        case 4: return " trillion";
        case 3: return " billion";
        case 2: return " million";
        case 1: return " thousand";
        case 0: return "";
    }
}

function convertThreeDigit($dig1, $dig2, $dig3) {
    $output = "";

    if ($dig1 == "0" && $dig2 == "0" && $dig3 == "0")
        return "";

    if ($dig1 != "0") {
        $output .= convertDigit($dig1) . " hundred";
        if ($dig2 != "0" || $dig3 != "0")
            $output .= " and ";
    }

    if ($dig2 != "0")
        $output .= convertTwoDigit($dig2, $dig3);
    else if ($dig3 != "0")
        $output .= convertDigit($dig3);

    return $output;
}

function convertTwoDigit($dig1, $dig2) {
    if ($dig2 == "0") {
        switch ($dig1) {
            case "1": return "ten";
            case "2": return "twenty";
            case "3": return "thirty";
            case "4": return "forty";
            case "5": return "fifty";
            case "6": return "sixty";
            case "7": return "seventy";
            case "8": return "eighty";
            case "9": return "ninety";
        }
    } else if ($dig1 == "1") {
        switch ($dig2) {
            case "1": return "eleven";
            case "2": return "twelve";
            case "3": return "thirteen";
            case "4": return "fourteen";
            case "5": return "fifteen";
            case "6": return "sixteen";
            case "7": return "seventeen";
            case "8": return "eighteen";
            case "9": return "nineteen";
        }
    } else {
        $temp = convertDigit($dig2);
        switch ($dig1) {
            case "2": return "twenty-$temp";
            case "3": return "thirty-$temp";
            case "4": return "forty-$temp";
            case "5": return "fifty-$temp";
            case "6": return "sixty-$temp";
            case "7": return "seventy-$temp";
            case "8": return "eighty-$temp";
            case "9": return "ninety-$temp";
        }
    }
}

function convertDigit($digit) {
    switch ($digit) {
        case "0": return "zero";
        case "1": return "one";
        case "2": return "two";
        case "3": return "three";
        case "4": return "four";
        case "5": return "five";
        case "6": return "six";
        case "7": return "seven";
        case "8": return "eight";
        case "9": return "nine";
    }
}

function calc_age($birthdate) {
    list($year,$month,$day) = explode("-",$birthdate);
    $year_diff  = date("Y") - $year;
    $month_diff = date("m") - $month;
    $day_diff   = date("d") - $day;
    if ($month_diff < 0) $year_diff--;
        elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;
    return $year_diff;
}
