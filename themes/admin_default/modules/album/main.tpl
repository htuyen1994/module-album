<!-- BEGIN: main -->
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th class="text-nowrap">Số thứ tự</th>
                <th class="text-nowrap">Tên album</th>
                <th class="text-nowrap">Ảnh</th>
                <th class="text-nowrap">Mô tả</th>
                <th class="text-nowrap">ID người đăng</th>
                <th class="text-nowrap">Thời gian đăng</th>              
                <th class="text-nowrap">Kích hoạt</th>
                <th class="text-center text-nowrap">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <!-- BEGIN: loop -->
            <tr>
                <td class="text-center">
                     <select name="weight" class="form-control weight_{ROW.id}"  onchange="nv_change_weight({ROW.id})">
                     <!-- BEGIN: weight -->
                        <option value="{J}" {J_SELECT}>{J}</option>
                        <!-- END: weight -->
                     </select>
                </td>
                <td>{ROW.name}</td>
                <td>
                	<img src="{ROW.image}" width="100px" height="100px">
                </td>
                <td>{ROW.description}</td>
                <td>{ROW.user}</td>
                <td>{ROW.time}</td>
                <td class="text-center">
                    <input type="checkbox" name="active" {ROW.active} onchange="nv_change_active({ROW.id})">
                </td>
                <td class="text-center text-nowrap">
                <a href="{ROW.url_edit}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i> Sửa</a>
                <a href="{ROW.url_delete}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash-o"></i> Xóa</a></td>
            </tr>
            <!-- END: loop -->
        </tbody>
    </table>
    <div class="text-center">{GENERATE_PAGE}</div>
</div>
<script>
function nv_change_weight(id) {
    var new_weight = $('.weight_'+ id).val();
    $.ajax({
        url : script_name + '?' + nv_name_variable + '=' + nv_module_name
                + '&' + nv_fc_variable
                + '=main&change_weight=1&id=' + id + '&new_weight='+new_weight,
        success : function(result) {
            if (result != 'ERR') {
                location.reload();
            }
        }
    });
}
function nv_change_active(id) {
    $.ajax({
        url : script_name + '?' + nv_name_variable + '=' + nv_module_name
                + '&' + nv_fc_variable
                + '=main&change_active=1&id=' + id,
        success : function(result) {
            if (result == 'ERR') {
                alert('Lỗi không xác định');
                location.reload();
            }
        }
    });
}
$(document).ready(function (){
    $('.delete').click(function () {
        if (confirm("Bạn có muốn xóa!")) {
            return true;
        } else {
            return false;
        }
    });
});
</script>

<!-- END: main -->
