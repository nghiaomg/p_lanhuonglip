  <!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Họ tên</label>
                                <input type="text" class="form-control" name="name" id="name">
                                <small></small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" id="phone">
                                <small></small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" id="address">
                                <small></small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date_give">Ngày giao</label>
                                <input type="date" class="form-control" name="date_give" id="date_give">
                                <small></small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="hours">Giờ</label>
                                <select name="hours" class="form-control" id="hours">
                                    <option value="">Chọn giờ giao</option>
                                    <?php for ($i=1; $i <= 23; $i++) { ?>
                                        <option value="<?= $i ?>"><?= $i ?> giờ</option>
                                    <?php } ?>
                                </select>
                                <small></small>
                            </div>
                        </div>
                        <?php /*<div class="col-6">
                            <div class="box_recaptcha">
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey ="<?= CLIENT_KEY_CAPTCHA ?>"></div>
                                    <small id="g-recaptcha-response"></small>
                                </div>
                            </div>
                        </div>*/?>
                        <div class="col-12">
                            <div class="form-group text-center">
                                <button class="btn btn-primary" id="send_form">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php /*
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<script src="https://www.google.com/recaptcha/api.js"></script>*/?>