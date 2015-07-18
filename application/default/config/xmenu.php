<?php

/**
 * xmenu.php
 *
 * @package     arch-php
 * @author      jafar <jafar@xinix.co.id>
 * @copyright   Copyright(c) 2012 PT Sagara Xinix Solusitama.  All Rights Reserved.
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

$config = array();

$config['xmenu_source'] = 'inline';

$config['xmenu_items'][0]['title'] = 'Beranda';
$config['xmenu_items'][0]['uri'] = '/';
$config['xmenu_items'][0]['icon'] = 'icon-home';

$config['xmenu_items'][1]['title'] = 'Sistem';
$config['xmenu_items'][1]['icon'] = 'icon-cogs';
$config['xmenu_items'][1]['children'][0]['title'] = 'Daftar Pengguna';
$config['xmenu_items'][1]['children'][0]['uri'] = 'user/listing';
$config['xmenu_items'][1]['children'][1]['title'] = 'Hak Akses';
$config['xmenu_items'][1]['children'][1]['uri'] = 'role/listing';
$config['xmenu_items'][1]['children'][2]['title'] = 'Parameter';
$config['xmenu_items'][1]['children'][2]['uri']   = 'sysparam/listing';
$config['xmenu_items'][1]['children'][3]['title'] = 'Module';
$config['xmenu_items'][1]['children'][3]['uri']   = 'module/listing';

$config['xmenu_items'][2]['title'] = 'Items';
$config['xmenu_items'][2]['icon'] = 'icon-tag';
$config['xmenu_items'][2]['children'][0]['title'] = 'Items';
$config['xmenu_items'][2]['children'][0]['uri'] = 'item/listing';
$config['xmenu_items'][2]['children'][1]['title'] = 'Item Stock';
$config['xmenu_items'][2]['children'][1]['uri'] = 'item_quantity/listing';
$config['xmenu_items'][2]['children'][2]['title'] = 'Item Suppliers';
$config['xmenu_items'][2]['children'][2]['uri'] = 'item_supplier/listing';
$config['xmenu_items'][2]['children'][3]['title'] = 'Item Tax';
$config['xmenu_items'][2]['children'][3]['uri'] = 'item_tax/listing';
$config['xmenu_items'][2]['children'][4]['title'] = 'Item Category';
$config['xmenu_items'][2]['children'][4]['uri'] = 'item_category/listing';

$config['xmenu_items'][3]['title'] = 'Sales';
$config['xmenu_items'][3]['icon'] = 'icon-money';
$config['xmenu_items'][3]['children'][0]['title'] = 'Sales';
$config['xmenu_items'][3]['children'][0]['uri'] = 'sales/listing';

$config['xmenu_items'][4]['title'] = 'Customer';
$config['xmenu_items'][4]['icon'] = 'icon-user-secret';
$config['xmenu_items'][4]['children'][0]['title'] = 'Customer';
$config['xmenu_items'][4]['children'][0]['uri'] = 'customer/listing';

$config['xmenu_items'][5]['title'] = 'Supplier';
$config['xmenu_items'][5]['icon'] = 'icon-briefcase';
$config['xmenu_items'][5]['children'][0]['title'] = 'Supplier';
$config['xmenu_items'][5]['children'][0]['uri'] = 'supplier/listing';

$config['xmenu_items'][6]['title'] = 'Report';
$config['xmenu_items'][6]['icon'] = 'icon-pie-chart';
$config['xmenu_items'][6]['children'][0]['title'] = 'Supplier';
$config['xmenu_items'][6]['children'][0]['uri'] = 'supplier/listing';

$config['xmenu_items'][7]['title'] = 'Employee';
$config['xmenu_items'][7]['icon'] = 'icon-user-secret';
$config['xmenu_items'][7]['children'][0]['title'] = 'Employee';
$config['xmenu_items'][7]['children'][0]['uri'] = 'employee/listing';
$config['xmenu_items'][7]['children'][1]['title'] = 'Employee Position';
$config['xmenu_items'][7]['children'][1]['uri'] = 'employee_position/listing';

$config['xmenu_items'][8]['title'] = 'Room';
$config['xmenu_items'][8]['icon'] = 'icon-bed';
$config['xmenu_items'][8]['children'][0]['title'] = 'Room';
$config['xmenu_items'][8]['children'][0]['uri'] = 'room/listing';

// $config['xmenu_items'][9]['title'] = 'KSOP Banten';
// $config['xmenu_items'][9]['uri'] = 'organization/organization_structure';











