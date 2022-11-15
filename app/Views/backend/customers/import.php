<div id="import" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5>Import dữ liệu từ file Excel</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="" class="text text-secondary">Bước 1</label>
                    <p>Tải file mẫu về và nhập dữ liệu theo mẫu. <a href="uploads/files/khachhang.xlsx" class="text-danger">Tại đây</a></p>
                </div>
                <div class="form-group">
                    <label for="" class="text text-secondary">Bước 2</label>
                    <p>Chọn file Upload và nhấn <b>Import</b></p>
                </div>
                <hr>
                <form action="<?= CPANEL.$control.'/importExcell' ?>" method="post" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <button type="submit" class="btn btn-primary">Import</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Đóng</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->