<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2020 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Sat, 31 Oct 2020 02:20:33 GMT
 */
if (!defined('NV_IS_MOD_SAMPLES')) {
    die('Stop!!!');
}

$page_title = $module_info['site_title'];
$key_words = $module_info['keywords'];

$array_data = [];

$perpage = 5;
$page = $nv_Request->get_int('page', "get", 1);

$db->sqlreset()
->select('COUNT(*)')
->from('nv4_album');
$sql = $db->sql();
$total = $db->query($sql)->fetchColumn();

$db->select('*')
->order("weight ASC")
->limit($perpage)
->offset(($page - 1) * $perpage);

$sql = $db->sql();
$result = $db->query($sql);
while ($row = $result->fetch()) {
    $row['url_view'] = nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA
        . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=detail&id=' . $row['id']);
    $array_data[$row['id']] = $row;
}

$page_title = $lang_module['main'];

$contents = nv_theme_samples_main($array_data);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
