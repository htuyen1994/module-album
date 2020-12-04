<!-- BEGIN: main -->
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
    <caption>Danh sách ảnh</caption>
        <thead>
            <tr class="text-center">
                <th class="text-nowrap">Tên ảnh</th>
                <th class="text-nowrap">Ảnh</th>
                <th class="text-nowrap">Mô tả</th>
            </tr>
        </thead>
        <tbody>
        	<!-- BEGIN: loop -->
            <tr>
                <td>{DATA.name}</td>
                <td>
                	<img src="{DATA.image}" width="100px" height="100px">
                </td>
                <td>{DATA.description}</td>
            </tr>
        </tbody>
        	<!-- END: loop -->
    </table>
</div>
<!-- END: main -->
