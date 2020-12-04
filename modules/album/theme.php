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

/**
 * nv_theme_samples_main()
 *
 * @param mixed $array_data
 * @return
 */
function nv_theme_samples_main($array_data, $page, $perpage, $generate_page)
{
    global $module_info, $lang_module, $lang_global, $op, $module_name;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
    $xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
    $xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
    $xtpl->assign('MODULE_NAME', $module_name);
    $xtpl->assign('OP', $op);

    if (!empty($array_data)) {
        $i = ($page - 1) * $perpage;
        foreach ($array_data as $row) {
            $row['stt'] = $i + 1;
            if(!empty('image')){
                $row['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_name . '/' . $row['image'];
            }
            $xtpl->assign('ROW', $row);
            $xtpl->parse('main.loop');
            $i++;
        }
    }

    if ($generate_page) {
        $xtpl->assign('GENERATE_PAGE', $generate_page);
    }

    $xtpl->parse('main');
    return $xtpl->text('main');
}


/**
 * nv_theme_samples_detail()
 *
 * @param mixed $array_data
 * @return
 */
function nv_theme_samples_detail($row)
{
    global $module_info, $lang_module, $lang_global, $op;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
    $xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
    $xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
    $xtpl->assign('MODULE_NAME', $module_name);
    $xtpl->assign('OP', $op);

    if (!empty($row)) {
        foreach ($row as $row) {
            if(!empty('image')){
                $row['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_name . '/' . $row['image'];
            }
            $xtpl->assign('DATA', $row);
            $xtpl->parse('main.loop');
        }
    }

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_samples_search()
 *
 * @param mixed $array_data
 * @return
 */
function nv_theme_samples_search($array_data)
{
    global $module_info, $lang_module, $lang_global, $op;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

    //------------------
    // Viết code vào đây
    //------------------

    $xtpl->parse('main');
    return $xtpl->text('main');
}
