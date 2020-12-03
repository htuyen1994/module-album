<!-- BEGIN: main -->

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
    <caption>Danh sách album</caption>
        <thead>
            <tr class="text-center">
                <th class="text-nowrap">Số thứ tự</th>
                <th class="text-nowrap">Tên album</th>
                <th class="text-nowrap">Ảnh</th>
                <th class="text-nowrap">Mô tả</th>
            </tr>
        </thead>
        <tbody>
            <!-- BEGIN: loop -->
            <tr>
                <td class="text-center">{ROW.stt}</td>
                <td><a href="{ROW.url_view}" title="{ROW.name}">{ROW.name}</a></td>
                <td>
                	<img src="{ROW.image}" width="100px" height="100px">
                </td>
                <td>{ROW.description}</td>
            </tr>
            <!-- END: loop -->
        </tbody>
    </table>
    <div class="text-center">{GENERATE_PAGE}</div>
</div>

<!-- END: main -->
