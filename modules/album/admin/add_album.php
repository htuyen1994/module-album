<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2020 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Sat, 31 Oct 2020 02:20:33 GMT
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    die('Stop!!!');
}

$page_title = $lang_module['add_album'];

$post = $err = [];

$post['id'] = $nv_Request->get_int('id', "post,get", 0);
if ($nv_Request->isset_request("submit", "post")) {
    $post['name'] = $nv_Request->get_title('name', "post", '');
    $post['description'] = $nv_Request->get_textarea('description', '', NV_ALLOWED_HTML_TAGS, 1);
    if (isset($_FILES, $_FILES['uploadfile'], $_FILES['uploadfile']['tmp_name']) and is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
        // Khởi tạo Class upload
        $upload = new NukeViet\Files\Upload($admin_info['allow_files_type'], $global_config['forbid_extensions'], $global_config['forbid_mimes'], NV_UPLOAD_MAX_FILESIZE, NV_MAX_WIDTH, NV_MAX_HEIGHT);

        // Thiết lập ngôn ngữ, nếu không có dòng này thì ngôn ngữ trả về toàn tiếng Anh
        $upload->setLanguage($lang_global);

        // Tải file lên server
        $upload_info = $upload->save_file($_FILES['uploadfile'], NV_UPLOADS_REAL_DIR . '/' . $module_name, false, $global_config['nv_auto_resize']);
    } else {
        $err[] = "Chưa chọn ảnh";
    }

    if ($post['name'] == '') {
        $err[] = "Chưa nhập tên album";
    } else {
        $name = test_input($post["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $err[] = 'Tên album chỉ bao gồm ký tự và khoảng trắng';
        }
    }

    if (empty($err)) {
        try {
            if ($post['id'] > 0) {
                // update
                $sql = "UPDATE nv4_album SET name=:name, image=:image, description=:description,
                    updatetime=:updatetime WHERE id= " . $post['id'];
                $stmt = $db->prepare($sql);
                $stmt->bindValue("updatetime", 0);
            } else {
                // insert
                $sql = "INSERT INTO nv4_album(name, image, description, active, weight, addtime)
                    VALUES (:name, :image, :description, :active, :weight, :addtime)";
                $stmt = $db->prepare($sql);
                $stmt->bindValue("active", 1);

                $_sql= "SELECT COUNT(*) FROM nv4_album";
                $weight = $db->query($_sql)->fetchColumn();
                $stmt->bindValue("weight", ($weight + 1));
                $stmt->bindValue("addtime", NV_CURRENTTIME);
            }
            $stmt->bindParam("name", $post['name']);
            $stmt->bindParam("image", $upload_info['basename']);
            $stmt->bindParam("description", $post['description']);
            $exe = $stmt->execute();
            if ($exe) {
                if ($post['id'] > 0) {
                    $err[] = 'Cập nhật album thành công';
                } else {
                    $err[] = 'Thêm album thành công';
                }
            } else {
                $err[] = 'Lỗi không thực hiện được';
            }
        } catch (PDOException $e) {
            print_r($e);die;
        }
    }
} else if ($post['id'] > 0) {
    // tồn tại id thì thực hiện lấy dữ liệu của id đó
    $sql = "SELECT * FROM nv4_album WHERE id = " . $post['id'];
    $post = $db->query($sql)->fetch();
} else {
    $post['name'] = '';
    $post['description'] = '';
}

$xtpl = new XTemplate('add_album.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$xtpl->assign('POST', $post);
if (!empty($err)) {
    $xtpl->assign('ERR', implode("<br/>", $err));
    $xtpl->parse('main.err');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
