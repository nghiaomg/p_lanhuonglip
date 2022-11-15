<!-- third party css -->
<link rel="stylesheet" type="text/css" href="assets/cpanel/customs/logo.css">
<link href="assets/cpanel/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
<!-- sweetalert css -->
<link href="assets/cpanel/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<!-- Jquery Toast css -->
<link href="assets/cpanel/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
<script src="assets/cpanel/libs/ckeditor/ckeditor.js"></script>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Quản trị</a></li>
                    <li class="breadcrumb-item active"><?= $title ?></li>
                </ol>
            </div>
            <h4 class="page-title"><?= $title ?></h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <!-- List tabs -->
            <ul class="nav nav-tabs" id="myTab">
                <li class="nav-item">
                    <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link active">
                        <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                        <span class="d-none d-sm-block">Danh sách</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#config" data-toggle="tab" aria-expanded="true" class="nav-link">
                        <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
                        <span class="d-none d-sm-block">Cấu hình </span>
                    </a>
                </li>
            </ul>
            <!-- End - List tab -->
            <div class="tab-content">
                <!-- centent tab danh sach -->
                <div class="tab-pane active" id="home">
                    <div class="col-lg-12">
                        <div class="card-box2 clearfix">
                            <div class="form-group">
                                <a href="<?= CPANEL . $control . '/add' ?>" class="btn btn-info"><i class="icon-plus"></i>Thêm mới</a>
                                <a href="javascript:void(0)" onclick="deleteAll('<?= $control ?>')" class="btn btn-danger"><i class="far fa-trash-alt"></i> Xóa tất cả</a>
                                <a href="<?= CPANEL . $control . "/index" ?>" class="btn btn-info"><i class="icon-refresh"></i></a>
                            </div>
                            <!-- box thông báo -->
                            <div class="notify-alert">
                                <?php if (session()->getFlashdata('success')) { ?>
                                    <p class="alert alert-success"><i class="icon-check"></i> <?= session()->getFlashdata('success') ?></p>
                                <?php } ?>
                                <?php if (session()->getFlashdata('error')) { ?>
                                    <p class="alert alert-danger"><i class="icon-close"></i> <?= session()->getFlashdata('error') ?></p>
                                <?php } ?>
                            </div>
                            <!-- box thông báo END -->

                        </div>
                    </div> <!-- end col -->

                    <table id="datatable" class="table table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center nosort"><input type="checkbox" onClick="toggle(this)"></th>
                                <th>Tiêu đề</th>
                                <th>Hình ảnh</th>
                                <th class="text-center">Sắp xếp</th>
                                <th class="text-center nosort">Hiển thị</th>
                                <th class="text-center">Ngày tạo</th>
                                <th class="text-center nosort">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($datas) && $datas != null) { ?>
                                <?php foreach ($datas as $key => $val) { ?>
                                    <tr class="tr<?= $val['id'] ?>">
                                        <td class="text-center"><input type="checkbox" name="foo" class="checkbox" value="<?= $val['id'] ?>"></td>
                                        <td><?= $val['name'] ?></td>
                                        <td><img src="<?= file_exists($path_dir_thumb . $val['thumb']) ? $path_dir_thumb . $val['thumb'] : 'assets/images/no_img.png' ?>" width="100" alt=""></td>
                                        <td class="text-center">
                                            <input type="text" onkeyup="changeSort(this,<?= $val['id'] ?>)" value="<?= $val['sort'] ?>" class="text-center form-control publish" id="sort<?= $val['id'] ?>" class="" data-control="<?= $control ?>">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" onclick="changeglobal(<?= $val['id'] ?>,'publish')" <?= $val['publish'] == 1 ? 'checked' : '' ?> id="publish<?= $val['id'] ?>" class="" data-control="<?= $control ?>">
                                        </td>
                                        <td class="text-center"><?= date('d/m/Y', strtotime($val['created_at'])) ?></td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" onclick="del(<?= $val['id'] ?>)" class="btn btn-danger btn-sm" id="delete<?= $val['id'] ?>" data-control="<?= $control ?>"><i class="icon-trash"></i></a>
                                            <a href="<?= base_url(CPANEL . $control . '/edit') . '/' . $val['id'] ?>" class="btn btn-info btn-sm"><i class="icon-note"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <!-- Tab config -->
                <div class="tab-pane show" id="config">
                    <form action="<?= CPANEL . $control . '/config' ?>" method="post" class="parsley-examples" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Tiêu đề</label>
                                    <input type="text" value="<?= $config ? trim($config['title']) : '' ?>" class="form-control" placeholder="Nhập tiêu đề..." name="data_post[title]">
                                </div>
                                <div class="form-group">
                                    <label for="">Mô tả</label>
                                    <textarea class="form-control" placeholder="Nhập mô tả..." name="data_post[description]"><?= $config ? trim($config['description']) : '' ?></textarea>
                                    <script>
                                        CKEDITOR.replace('data_post[description]', {
                                            toolbar: [{
                                                    name: 'styles',
                                                    items: ['Styles', 'Format', 'Font', 'FontSize', 'Bold', 'Italic', 'Underline']
                                                },
                                                {
                                                    name: 'colors',
                                                    items: ['TextColor', 'BGColor']
                                                }
                                            ]
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="logo_image">
                                    <div class="image_box">
                                        <a href="javascript:void(0)" class="btn btn-danger" onclick="del_image('<?= $type ?>','<?= $control ?>')">Xóa ảnh</a>
                                        <img id="preview" src="<?= $config['thumb'] ? base_url() . '/' . $path_dir_thumb . $config['thumb'] : 'assets/images/no_img.png' ?>" alt="Ảnh đại diện" title='' />
                                    </div>
                                    <div>
                                        <label for="image">Chọn logo</label>
                                        <input type="file" name="image" id="image" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                    <i class="icon-cloud-upload font-15"></i> Lưu
                                </button>
                                <a href="<?= CPANEL . $control ?>" class="btn btn-info">Hủy</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/cpanel/libs/ckeditor/ckeditor.js"></script>
<script language="JavaScript">
    function toggle(source) {
        checkboxes = document.getElementsByName('foo');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    // Basic
    $("#image").change(function(event) {
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#image").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
                $('#preview').hide();
                $('#preview').fadeIn(500);
                // $('.custom-file-label').text(filename);             
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            $('#preview').attr('src', "assets/images/no_img.png");
        }

    }
</script>