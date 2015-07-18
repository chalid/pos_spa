<?php
/**
 * Description of sales_model
 *
 * @author generator
 */

class sales_model extends app_base_model {

	function add_item($data, $id = null) {
		// xlog($data);
		// exit;
        $this->db->trans_start();
        if (empty($id)) {
            $this->before_save($data);
            $this->_db()->insert('sales_item', $data);
        } else {
            $this->before_save($data, $id);
            $this->_db()->where('id', $id)->update('sales_item', $data);
        }
        $this->db->trans_complete();
    }

    function edit_item($id, $data) {
        parent::before_save($data);
        $this->_db()->update('sales_item', $data);
    }

    function delete_item($id, $item_id) {
        $data = array('status' => 0);
        $this->before_save($data, $item_id);
        $this->_db()->where('sales_id', $id)->where('id', $item_id)->update('sales_item', $data);
    }
    
}
