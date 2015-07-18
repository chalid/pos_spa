<?php
/**
 * Description of item *
 * @author generator
 */

class item extends app_crud_controller {

    function __construct() {
        parent::__construct();

        $this->_validation = array(
            'add' => array(
                // 'isbn' => array('required', l('ISBN/Item No')),
                'name' => array('required', l('Item Name')),
                'item_category_id' => array('required', l('Item Category')),
                'cost_price' => array('required', l('Cost Price')),
                'unit_price' => array('required', l('Unit Price')),
                // 'commission' => array('required', l('Commission')),
                'item_type' => array('required', l('Item Type')),
                'name' => array('required', l('Item Name')),
            ),

            'edit' => array(
                // 'isbn' => array('required', l('ISBN/Item No')),
                'name' => array('required', l('Item Name')),
                'item_category_id' => array('required', l('Item Category')),
                'cost_price' => array('required', l('Cost Price')),
                'unit_price' => array('required', l('Unit Price')),
                // 'commission' => array('required', l('Commission')),
                'item_type' => array('required', l('Item Type')),
                'name' => array('required', l('Item Name')),
            ),
        );
    }

	function _save($id = null) {
        $this->_view = $this->_name . '/' . 'show';
        $model = $this->_model();

        $user = $this->auth->get_user();
        if ($_POST) {
            if ($this->_validate()) {
                $this->db->trans_start();
                if(empty($_POST['isbn'])){
                    if(@$_POST['no_type'] == 1){
                        $_POST['isbn'] = $_POST['isbn'];
                    } else {
                        $format = '%05d';
                        $key = 1;
                        $seq = sprintf($format, $this->_model('sequence')->get_sequence($key));
                        $_POST['isbn'] = $seq;
                    }
                }
                try {
                    $new_id = $model->save($_POST, $id);
                    if($_POST['item_type'] == 1){
                        $datas = array();
                        foreach ($_POST['item_id'] as $key => $item) {
                            $datas[$key]['item_id'] = $item;
                        }

                        foreach ($_POST['qty1'] as $key => $item) {
                            $datas[$key]['qty1'] = $item;
                        }
                        foreach ($datas as $item) {
                            $data['parent_id'] = $new_id;
                            $data['item_id'] = $item['item_id'];
                            $data['qty'] = $item['qty1'];
                            $this->_model('item_pack')->save($data);
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

                $items = $this->db->query('SELECT * FROM item_pack WHERE parent_id = ? AND status != 0',$id)->result_array();
                $this->_data['items'] = $items;
            }
        }
        $this->_data['id'] = $id;

        $items = $this->db->query("SELECT * FROM item WHERE status !=0 ORDER BY name ASC")->result_array();
        $this->_data['item_options'] = array(
            '' => '(Please select)',
        );
        foreach ($items as $item) {
            $this->_data['item_options'][$item['id']] = $item['name'];
        }
    }

    function _config_grid() {
        $config = parent::_config_grid();
        $config['fields'] = array('isbn','name', 'description','item_category_id','item_type','cost_price','unit_price','commission');
        $config['names'] = array('ISBN','Nama Barang', 'Deskripsi','Kategori','Tipe','Harga Dasar','Harga Jual','Komisi %');
        $config['formats'] = array('row_detail','','','model_param','param_short','');
        $config['filters'] = array('start_date','end_date');
        $config ['actions'] = array(
            'edit' => $this->_get_uri('edit'),
            'trash' => $this->_get_uri('trash'),
            'print' => $this->_get_uri('print_xls'),
        );
        return $config;
    }

    function detail($id){
        $this->load->helper('format');
        $item = $this->_model()->get($id);
        $this->_data['item'] = $item;
    }

}
