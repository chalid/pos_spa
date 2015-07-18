<?php
/**
 * Description of customer *
 * @author generator
 */

class customer extends app_crud_controller {
    
    function _save($id = null) {
        $this->_view = $this->_name . '/' . 'show';
        $model = $this->_model();

        $user = $this->auth->get_user();
        if ($_POST) {
            if ($this->_validate()) {
                $this->db->trans_start();
                if($_POST['customer_type'] == 1){
                	if(empty($_POST['member_no'])){
                		$year = date('Y');
	                	$format = $year . '%05d';
	                    $key = 11;
	                    $seq = sprintf($format, $this->_model('sequence')->get_sequence($key));
	                    $_POST['member_no'] = $seq;
                	}
                }
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
            }
        }
        $this->_data['id'] = $id;
    }

    function _config_grid() {
        $config = parent::_config_grid();
        $config['fields'] = array('name', 'address','phone','email','gender','customer_type','member_no');
        $config['names'] = array('Name', 'Alamat','Phone','Email','Gender','Customer type');
        $config['formats'] = array('row_detail','','','','param_short','param_short');
        $config['filters'] = array('name','member_no');
        $config ['actions'] = array(
            'edit' => $this->_get_uri('edit'),
            'trash' => $this->_get_uri('trash'),
        );
        return $config;
    }
}
