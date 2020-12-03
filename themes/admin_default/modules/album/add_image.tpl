<!-- BEGIN: main -->
<!-- BEGIN: err -->
<div class="alert alert-warning" role="alert">
  {ERR}
</div>
<!-- END: err -->
<form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="{POST.id}">
    <div class="form-group row">
        <div class="col-md-4">
            <label><strong>Tên ảnh</strong></label>
        </div>
        <div class="col-md-20">
            <input class="form-control" type="text" name="name" value="{POST.name}" />
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label><strong>Album</strong></label>
        </div>    
        <div class="col-md-20">
        	<select name="album" class="form-control">
         		<option value="0">-- Chọn album --</option>
          		<!-- BEGIN: album -->
          		<option value="{ALBUM.key}" {ALBUM.selected}>{ALBUM.name}</option>
            	<!-- END: album -->
       		</select>
       	</div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label><strong>Ảnh</strong></label>
        </div>
        <div class="col-md-20">
            <input class="form-control" type="file" name="uploadfile"/>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label><strong>Mô tả</strong></label>
        </div>
        <div class="col-md-20">
        	<textarea class="form-control" name="description" rows="4" value="{POST.description}"></textarea>
        </div>
    </div>
    <div class="text-center">
        <input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" />
    </div>
</form>
<!-- END: main -->
