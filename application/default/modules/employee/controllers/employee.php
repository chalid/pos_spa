<?php
/**
 * Description of employee *
 * @author generator
 */

class employee extends app_crud_controller {

	function _config_grid() {
        $config = parent::_config_grid();
        $config['fields'] = array('name', 'phone','gender','employee_position_id');
        $config['names'] = array('Nama Barang', 'No Telp','Jenis Kelamin','Jabatan');
        $config['formats'] = array('row_detail','','param_short','model_param');
        $config['filters'] = array('name');
        $config ['actions'] = array(
            'edit' => $this->_get_uri('edit'),
            'trash' => $this->_get_uri('trash'),
        );
        return $config;
    }

    function detail($id){
        $this->load->helper('format');
        $employee = $this->_model()->get($id);
        $this->_data['employee'] = $employee;
    }

    function _save($id = null) {
        $this->_view = $this->_name . '/' . 'show';
        $model = $this->_model();

        $user = $this->auth->get_user();
        if ($_POST) {
            if ($this->_validate()) {
                $this->db->trans_start();
                try {
                    $new_id = $model->save($_POST, $id);
                    if($_POST['employee_position_id'] == 3){
                        $cs = $this->db->query('SELECT COUNT(*) count FROM therapis_status WHERE employee_id = ?',$new_id)->row()->count;
                        if($cs == 0){
                            $data_status = array(
                                'employee_id' => $new_id,
                            );
                            $this->_model('therapis_status')->save($data_status);
                        }
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
    
}
