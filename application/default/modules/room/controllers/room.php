<?php
/**
 * Description of room *
 * @author generator
 */

class room extends app_crud_controller {
    
    function _save($id = null) {
        $this->_view = $this->_name . '/' . 'show';
        $model = $this->_model();

        $user = $this->auth->get_user();
        if ($_POST) {
            if ($this->_validate()) {
                $this->db->trans_start();
                try {
                    $new_id = $model->save($_POST, $id);
                    $cs = $this->db->query('SELECT COUNT(*) count FROM room_status WHERE room_id = ?',$new_id)->row()->count;
                    if($cs == 0){
                    	$data_status = array(
                    		'room_id' => $new_id,
                    	);
                    	$this->_model('room_status')->save($data_status);
                    }
                    $this->db->trans_complete();
                    if ($this->input->is_ajax_request()) {
                        echo true;
                        exit;
                    } else {
                        redirect($this->_get_uri('listing'));
                        exit;
                    }
                } catch (Exception $e) {
                    $this->_data['errors'] = '<p>' . $e->getMessage() . '</p>';
                }
            }
        } else {
            if (!empty($id)) {
                $id = $this->uri->segment(3);
                $this->_data['id'] = $id;
                $_POST = $model->get($id);
            }
        }
        $this->_data['id'] = $id;
    }

    function order($id = null){
        if ($_POST) {
            if ($this->_validate()) {
                $this->db->trans_start();
                try {
                    if($_POST['customer_type'] == 1){
                        $n = 1;
                    } else {
                        $n = 2;
                    }
                    $format = $n . date('dmY') . '%03d';
                    $key = 2;
                    $seq = sprintf($format, $this->_model('sequence')->get_sequence($key));
                    $_POST['start_date'] = date('Y-m-d h:m:s');
                    $_POST['booking_no'] = $seq;
                    if($_POST['customer_type'] == 2){
                        $cus_data = array(
                            'name' => $_POST['name'],
                            'phone' => $_POST['phone'],
                            'email' => $_POST['email'],
                            'gender' => $_POST['gender'],
                            'customer_type' => 2,

                        );
                        $cid = $this->_model('customer')->save($cus_data);
                        $_POST['customer_id'] = $cid;
                    }
                    $new_id = $this->_model('booking_room')->save($_POST, $id);
                    $droom_status = array(
                        'room_status' => 2,
                    );
                    $this->db->where('room_id',$_POST['room_id']);
                    $this->db->update('room_status',$droom_status);
                    $t_status = array(
                        'status' => 2,
                    );
                    $this->db->where('employee_id',$_POST['employee_id']);
                    $this->db->update('therapis_status',$t_status);
                    $this->db->trans_complete();

                    //add function print
                        // $tmpdir = sys_get_temp_dir();   # ambil direktori temporary untuk simpan file.
                        // $file =  tempnam($tmpdir, 'ctk');  # nama file temporary yang akan dicetak
                        // $handle = fopen($file, 'w');
                        // $condensed = Chr(27) . Chr(33) . Chr(4);
                        // $bold1 = Chr(27) . Chr(69);
                        // $bold0 = Chr(27) . Chr(70);
                        // $initialized = chr(27).chr(64);
                        // $condensed1 = chr(15);
                        // $condensed0 = chr(18);
                        // $Data  = $initialized;
                        // $Data .= $condensed1;
                        // $Data .= "==========================\n";
                        // $Data .= "|     ".$bold1."&nbsp;&nbsp;TITIANG   ".$bold0."      |\n";
                        // $Data .= "--------------------------\n";
                        // $Data .= "| Tradisional Natural SPA |\n";
                        // $Data .= "==========================\n";
                        // $Data .= "Ofidz Majezty is here\n";
                        // $Data .= "We Love PHP Indonesia\n";
                        // $Data .= "We Love PHP Indonesia\n";
                        // $Data .= "We Love PHP Indonesia\n";
                        // $Data .= "We Love PHP Indonesia\n";
                        // $Data .= "We Love PHP Indonesia\n";
                        // $Data .= "--------------------------\n";
                    // xlog($tmpdir);
                    // xlog($file);
                    // xlog($Data);
                    // exit;
                        // fwrite($handle, $Data);
                        // fclose($handle);
                        // copy($file, "//172.16.0.103/myepson");  # Lakukan cetak
                        // unlink($file);
                    if ($this->input->is_ajax_request()) {
                        echo true;
                        exit;
                    } else {
                        redirect(site_url());
                        exit;
                    }
                } catch (Exception $e) {
                    $this->_data['errors'] = '<p>' . $e->getMessage() . '</p>';
                }
            }
        } else {
            if (!empty($id)) {
                $id = $this->uri->segment(3);
                $this->_data['id'] = $id;
                $_POST = $model->get($id);
            }
        }
        $this->_data['id'] = $id;
    }
}
