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

    function test_print(){
        //$lipsum = file_get_contents('ment.txt');
        //xlog($lipsum);
        //exit;
    
        /* open a connection to the printer */
        //$printer = printer_open("Epson LX-310");
        
        /* write the text to the print job */
       // printer_write($printer, $lipsum);
        
        /* close the connection */
       // printer_close($printer);
        $data = array();
        $data['employee'] = 'Vani';
        $data['room'] = '204';
        $data['order_no'] = '123456789';
        $data['customer'] = 'Nanda';
        $data['start_date'] = '19-07-2015 10:10:00';

        $tmpdir = sys_get_temp_dir();   # ambil direktori temporary untuk simpan file.
        $file =  tempnam($tmpdir, 'ctk');  # nama file temporary yang akan dicetak
        $handle = fopen($file, 'w');
        $condensed = Chr(27) . Chr(33) . Chr(4);
        $bold1 = Chr(27) . Chr(69);
        $bold0 = Chr(27) . Chr(70);
        $initialized = chr(60).chr(64);
        $condensed1 = chr(15);
        $condensed0 = chr(18);
        $Data  = $initialized;
        $Data .= $condensed1;
        //HEADER
        $Data .= "==============================================\n";
        $Data .= " Order No     : ".$data['order_no']."\n";
        $Data .= " Booking Date : " . $data['start_date'] . "\n";
        $Data .= " Customer     : " . $data['customer'] . "\n";
        $Data .= " Therapis     : " . $data['employee'] . "\n";
        $Data .= " =============================================\n";
        $Data .= " Order Items                             Qty  \n";
        $Data .= "\n";
        $Data .= "  1. ..................................  .....\n";
        $Data .= "\n";
        $Data .= "  2. ..................................  .....\n";
        $Data .= "\n";
        $Data .= "  3. ..................................  .....\n";
        $Data .= "\n";
        $Data .= "  4. ..................................  .....\n";
        $Data .= "\n";
        $Data .= "  5. ..................................  .....\n";
        $Data .= "\n";
        $Data .= " =============================================\n";
        $Data .= "\n";
        $Data .= "\n";
        $Data .= "\n";
        $Data .= "\n";
        $Data .= "      (" . $data['customer'] . ")      \n";                 
        //TOTAL
        $Data .= "---------------------------------------------\n";
        $Data .= "\n";
        $Data .= "\n";
        $Data .= "\n";
        $Data .= "\n";
        $Data .= "\n";
        $Data .= "\n";
        $Data .= "\n";
        $Data .= "\n";
        $Data .= " ==============================================\n";   //46
        $Data .= " *                   TITIANG                  *\n";
        $Data .= " *        TRADITIONAL MASSAGE & REFLEXY       *\n";
        $Data .= " *   RUKO CILEGON CITY SQUARE, BLOK D NO. 1   *\n";
        $Data .= " *     HP: 0877707017, PIN. BB: 2B2F99FZ      *\n";
        $Data .= " *                                            *\n";
        //FOOTER
        fwrite($handle, $Data);
        fclose($handle);
        copy($file, "\\\\localhost\\EPSON LX-310");  # Lakukan cetak
        unlink($file);
    }

}















