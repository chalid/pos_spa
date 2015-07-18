<?php

class site extends app_crud_controller{
	
	function index(){
		$user = $this->auth->get_user();
        $this->_data['user'] = $this->auth->get_user();
        $this->load->helper('format');

        $rooms = $this->db->query('SELECT floor FROM room WHERE status !=0 GROUP BY floor ORDER BY floor ASC')->result_array();
        foreach ($rooms as $key =>$item) {
        	$rooms[$key]['room'] = array();
        	$room = $this->db->query('SELECT room.*, rs.room_status FROM room 
        								LEFT JOIN room_status rs ON room.id = rs.room_id
        								WHERE room.floor = ? AND room.status != 0 ORDER BY room.name ASC',$item['floor'])->result_array();
        	$rooms[$key]['room'] = $room;
        }

        $therapis = $this->db->query('SELECT e.*,ts.status ts_status FROM employee e
        								LEFT JOIN therapis_status ts ON ts.employee_id = e.id 
        								WHERE e.status !=0 AND e.employee_position_id = 3 ORDER BY e.name ASC')->result_array();

        // $arooms = $this->_model('room')->find(null, array('name' => 'asc'));
        $arooms = $this->db->query('SELECT room.*, rs.room_status FROM room 
        								LEFT JOIN room_status rs ON room.id = rs.room_id
        								WHERE room.status != 0 AND rs.room_status = 0 ORDER BY room.name ASC',$item['floor'])->result_array();
        $this->_data['aroom_items'] = array('' => l('(Please select)'));
        foreach ($arooms as $org) {
            $this->_data['aroom_items'][$org['id']] = $org['name'];
        }

        $aemps = $this->db->query('SELECT e.*,ts.status ts_status FROM employee e
        							LEFT JOIN therapis_status ts ON ts.employee_id = e.id 
        							WHERE e.status !=0 AND e.employee_position_id = 3 AND ts.status = 1 ORDER BY e.name ASC',$item['floor'])->result_array();
        $this->_data['aemp_items'] = array('' => l('(Please select)'));
        foreach ($aemps as $org) {
            $this->_data['aemp_items'][$org['id']] = $org['name'];
        }

        $date = date('d-m-Y');
        $this->_data['rooms'] = $rooms;
        $this->_data['date'] = $date;
        $this->_data['therapis'] = $therapis;
	}	

}















