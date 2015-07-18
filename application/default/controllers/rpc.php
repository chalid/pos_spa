<?php

/**
 * rpc.php
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

/**
 * Description of rpc
 *
 * @author jafar
 */
class rpc extends base_controller {

	function get_category_by_code($id) {
        $this->db->select('id, name')->where('mail_code_id', $id)->order_by('name');
        $result = $this->db->get('mc_category')->result_array();
        echo json_encode($result);
        exit;
    }

    function get_div_by_org($id) {
        $this->db->select('id, name')->where('organization_id', $id)->order_by('name');
        $result = $this->db->get('division')->result_array();
        echo json_encode($result);
        exit;
    }

    function get_dept_by_div($id) {
        $this->db->select('id, name')->where('parent_id', $id)->order_by('name');
        $result = $this->db->get('division')->result_array();
        echo json_encode($result);
        exit;
    }

    function code_options(){
        $CI = &get_instance();
        $user = $CI->auth->get_user();
        $org_id = $user['organization'][0]['org_id'];

        $q = (!empty($_GET['q'])) ? $_GET['q'] : $q;
        $rows = $this->db->query('
                SELECT * FROM mail_code WHERE status != 2 AND organization_id = ? AND name LIKE ?
            ', array($org_id, '%' . $q . '%'))->result_array();
        xlog($rows);
        exit;
        foreach ($rows as &$row) {
            $row['key'] = $row['name'];
            $row['value'] = sprintf("%s", $row['name']);
        }
        echo json_encode($rows);
        exit;
    }

    function item_options(){
        $CI = &get_instance();
        $q = (!empty($_GET['q'])) ? $_GET['q'] : $q;
        $rows = $this->db->query('SELECT * FROM item WHERE status != 0 AND name LIKE ?', array('%' . $q . '%'))->result_array();
        foreach ($rows as &$row) {
            $row['key'] = $row['id'];
            $row['value'] = sprintf("%s - %s", $row['name'],$row['unit_price']);
        }
        echo json_encode($rows);
        exit;
    }

    function emp_options(){
        $CI = &get_instance();
        $q = (!empty($_GET['q'])) ? $_GET['q'] : $q;
        $rows = $this->db->query('SELECT * FROM employee WHERE status != 0 AND name LIKE ? AND employee_position = 3', array('%' . $q . '%'))->result_array();
        foreach ($rows as &$row) {
            $row['key'] = $row['id'];
            $row['value'] = sprintf("%s", $row['name']);
        }
        echo json_encode($rows);
        exit;
    }

    function customer_options(){
        $CI = &get_instance();
        $this->load->helper('format');
        $q = (!empty($_GET['q'])) ? $_GET['q'] : $q;
        $rows = $this->db->query('SELECT * FROM customer WHERE status != 0 AND name LIKE ? AND customer_type = 1', array('%' . $q . '%'))->result_array();
        foreach ($rows as &$row) {
            $row['key'] = $row['id'];
            $row['value'] = sprintf("%s", $row['name']);
        }
        echo json_encode($rows);
        exit;
    }

    function booking_options(){
        $CI = &get_instance();
        $this->load->helper('format');
        $q = (!empty($_GET['q'])) ? $_GET['q'] : $q;
        $rows = $this->db->query('SELECT * FROM booking_room WHERE booking_status = 0 AND booking_no LIKE ?', array('%' . $q . '%'))->result_array();
        foreach ($rows as &$row) {
            $row['key'] = $row['id'];
            $row['employee'] = format_model_param($row['employee_id'], 'employee');
            $row['customer'] = format_model_param($row['customer_id'], 'customer');
            $row['value'] = sprintf("%s - %s - %s", $row['booking_no'],$row['employee'],$row['customer']);
        }
        echo json_encode($rows);
        exit;
    }
}