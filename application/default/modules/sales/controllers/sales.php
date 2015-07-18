<?php
/**
 * Description of sales *
 * @author generator
 */

class sales extends app_crud_controller {

	function add($id = null){

		$this->load->helper('format');
		
	}

	function add_sale($id = null){
		$this->load->helper('format');
        $model = $this->_model();

        $user = $this->auth->get_user();
        $sales_items = array();
        $total_sales = '';
        if ($_POST) {
        	xlog($_POST);
            if ($this->_validate()) {
                $this->db->trans_start();
                try {
                    $new_id = $model->save($_POST, $id);
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
                $total_sales = 0;
                $sales_items = $this->db->query('SELECT * FROM sales_item WHERE sales_id = ? AND status != 0',$id)->result_array();
                foreach ($sales_items as $item){
                	$total_sales += $item['total'];
                }
            }
        }
        $this->_data['id'] = $id;
        $this->_data['sales_items'] = $sales_items;
        $this->_data['total_sales'] = $total_sales;
	}

	function order($id = null){
		if($_POST){
			if ($this->_validate()) {
                $this->db->trans_start();
                try {

                    $data_booking = $this->_model('booking_room')->get($_POST['booking_room_id']);
                    // update data booking
                    $data_booking_room = array(
                    	'end_date' => date('Y-m-d h:m:s'),
                    	'booking_status' => 1,
                    );
                    $this->db->where('id', $_POST['booking_room_id']);
            		$this->db->update('booking_room', $data_booking_room);

                    // update data room
                    $data_room = array(
                    	'room_status' => 0,
                    );
                    $this->db->where('room_id', $data_booking['room_id']);
            		$this->db->update('room_status', $data_room);

                    // update data employee 
                    $data_theraphis = array(
                    	'status' => 1,
                    );
                    $this->db->where('employee_id', $data_booking['employee_id']);
            		$this->db->update('therapis_status', $data_theraphis);

                    $format = date('dmY') . '%03d';
                    $key = 3;
                    $seq = sprintf($format, $this->_model('sequence')->get_sequence($key));

            		$data_sales = array(
            			'employee_id' => $data_booking['employee_id'],
            			'customer_id' => $data_booking['customer_id'],
            			'booking_room_id' => $data_booking['id'],
            			'invoice'	=> $seq,
            		);

                    $new_id = $this->_model()->save($data_sales, $id);
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
                        redirect(site_url('sales/add_sale/'.$new_id));
                        exit;
                    }
                } catch (Exception $e) {
                    $this->_data['errors'] = '<p>' . $e->getMessage() . '</p>';
                }
            }
		}
	}

	function add_item($id){
		$fa = $this->_model()->get($id);
		$id = $this->uri->segment(3);
		if ($_POST) {
            if ($this->_validate()) {
                $this->db->trans_start();
                try {
                	$sales = $this->_model()->get($id);
                	$cus = $this->_model('customer')->get($sales['customer_id']);
                	if($cus['customer_type'] == 1){
                		$discount = $_POST['discount_member'];
                	} else {
                		$discount = $_POST['discount'];
                	}
                	$sum_total = $_POST['qty'] * $_POST['unit_price'];
                	$discount = ($sum_total * $discount) / 100;
                	$net_total = $sum_total - $discount;
                    $data = array(
                        'sales_id' => $id,
                        'item_id' => $_POST['item_id'],
                        'qty' => $_POST['qty'],
                        'cost_price' => $_POST['cost_price'],
                        'unit_price' => $_POST['unit_price'],
                        'commission' => $_POST['commission'],
                        'discount' => $discount,
                        'total' => $net_total,
                    );
                    $this->_model()->add_item($data);
                    $this->db->trans_complete();
                    if ($this->input->is_ajax_request()) {
                        echo true;
                        exit;
                    } else {
                        redirect('sales/add_sale/' . $id);
                        exit;
                    }
                } catch (Exception $e) {
                    $this->_data['errors'] = '<p>' . $e->getMessage() . '</p>';
                }
            }
        }
        $this->_data['id'] = $id;
	}

	function edit_item($id,$iid){
		$this->load->helper('format');
		$fa = $this->_model()->get($id);
		$id = $this->uri->segment(3);
		$iid = $this->uri->segment(4);
		if ($_POST) {
            if ($this->_validate()) {
                $this->db->trans_start();
                try {
                	$sales = $this->_model()->get($id);
                	$cus = $this->_model('customer')->get($sales['customer_id']);
                	if($cus['customer_type'] == 1){
                		$discount = $_POST['discount_member'];
                	} else {
                		$discount = $_POST['discount'];
                	}
                	$sum_total = $_POST['qty'] * $_POST['unit_price'];
                	$discount = ($sum_total * $discount) / 100;
                	$net_total = $sum_total - $discount;
                    $data = array(
                        'sales_id' => $id,
                        'item_id' => $_POST['item_id'],
                        'qty' => $_POST['qty'],
                        'cost_price' => $_POST['cost_price'],
                        'unit_price' => $_POST['unit_price'],
                        'commission' => $_POST['commission'],
                        'discount' => $discount,
                        'total' => $net_total,
                    );
                    $this->_model()->add_item($data,$iid);
                    $this->db->trans_complete();
                    if ($this->input->is_ajax_request()) {
                        echo true;
                        exit;
                    } else {
                        redirect('sales/add_sale/' . $id);
                        exit;
                    }
                } catch (Exception $e) {
                    $this->_data['errors'] = '<p>' . $e->getMessage() . '</p>';
                }
            }
        }
        $this->_data['id'] = $id;
	}

	function delete_item($id,$iid){
		$id = $this->uri->segment(3);
		$iid = $this->uri->segment(4);
		$this->_model()->delete_item($id, $iid);

        redirect('sales/add_sale/' . $id);
        exit;
	}

    function edit_pkk_item($id, $pkk_item_id) {
        $pkk = $this->_model()->get($id);
        $ag = $pkk['activity_global'];
        $this->load->helper('format');

        $user = $this->auth->get_user();
        $org_id = $user['organization'][0]['org_id'];
        $div_id = $user['division_id'];
        $this->_data['pkk'] = $pkk;
        $id = $this->uri->segment(3);
        $pkk_item_id = $this->uri->segment(4);
        $page = $this->uri->segment(5);

        if ($_POST) {
            if ($this->_validate()) {
                $this->db->trans_start();
                try {
                    if ($ag == 2) {
                        $data = array(
                            'pkk_id' => $id,
                            'vessel_id' => $pkk['vessel_id'],
                            'jetty_id' => $_POST['jetty_id'],
                            'activity_area' => $_POST['activity_area'],
                            'goods_type' => $_POST['goods_type'],
                            'goods_unit' => $_POST['goods_unit'],
                            'name' => $_POST['name'],
                            'qty' => $_POST['qty'],
                            'hazard' => $_POST['hazard'],
                            'date_mooring' => $_POST['date_mooring'],
                            'time_mooring' => $_POST['hour'] . ':' . $_POST['menit'] . ':00',
                            'activity' => $_POST['activity'],
                            'goods_category_id' => $_POST['goods_category_id'],
                            'pbm_id' => $_POST['pbm_id'],
                            'work_no' => $_POST['work_no'],
                            'tally_id' => $_POST['tally_id'],
                            'emkl_id' => $_POST['emkl_id'],
                        );
                    } else {
                        $data = array(
                            'jetty_id' => $_POST['jetty_id'],
                            'date_mooring' => $_POST['date_mooring'],
                            'time_mooring' => $_POST['hour'] . ':' . $_POST['menit'] . ':00',
                        );
                    }
                    $this->_model()->add_pkk_item($data, $pkk_item_id);
                    $this->db->trans_complete();
                    if ($this->input->is_ajax_request()) {
                        echo true;
                        exit;
                    } else {
                        if ($page == 'edit') {
                            redirect('pkk/edit/' . $id);
                        } else {
                            redirect('pkk/detail/' . $id);
                        }
                        exit;
                    }
                } catch (Exception $e) {
                    $this->_data['errors'] = '<p>' . $e->getMessage() . '</p>';
                }
            }
        } else {
            if (!empty($id)) {
                $this->_data['id'] = $id;
                $_POST = $this->db->query('SELECT * FROM pkk_item WHERE id = ?', array($pkk_item_id))->row_array();
            }
        }
        
    }
    
}
