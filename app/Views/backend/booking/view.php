<div class="row">
    <div class="col-6">
        <div class="form-group">
            <p class="m-0">
                <span class="text-danger">Tên khách hàng:</span>
                <span><?= $datas['name'] ?></span>
            </p>
        </div>
        <div class="form-group">
            <p class="m-0">
                <span class="text-danger">Email:</span>
                <span><?= $datas['email'] ?></span>
            </p>
        </div>
        <div class="form-group">
            <p class="m-0">
                <span class="text-danger">Địa chỉ:</span>
                <span><?= $datas['address'] ?></span>
            </p>
        </div>
        <div class="form-group">
            <p class="m-0">
                <span class="text-danger">Ngày sinh:</span>
                <span><?= date('d/m/Y',strtotime($datas['birthDay'])) ?></span>
            </p>
        </div>
        
        <div class="form-group">
            <p class="m-0">
                <span class="text-danger">Đi một mình / đi với nhóm:</span>
                <span><?= $datas['goWith'] == 1?'Một mình':'Nhóm' ?></span>
            </p>
        </div>
        <div class="form-group">
            <p class="m-0">
                <span class="text-danger">Bạn đến từ câu lạc bộ nào?:</span>
                <span><?= $datas['club']!=''?$datas['club']:'Không có' ?></span>
            </p>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <p class="m-0">
                <span class="text-danger">Số điện thoại:</span>
                <span><?= $datas['phone'] ?></span>
            </p>
        </div>
        <div class="form-group">
            <p class="m-0">
                <span class="text-danger">Giới tính:</span>
                <span><?= $datas['gender']==1?'Nam':'Nữ' ?></span>
            </p>
        </div>
        <div class="form-group">
            <p class="m-0">
                <span class="text-danger">Quốc tịch:</span>
                <span><?= $datas['nationaly'] ?></span>
            </p>
        </div>
        <div class="form-group">
            <p class="m-0">
                <span class="text-danger">Lịch trình bay:</span>
                <span><?= $datas['dateGo'] ?></span>
            </p>
        </div>
        <div class="form-group">
            <p class="m-0">
                <span class="text-danger">Ngày booking:</span>
                <span><?= date('d/m/Y',strtotime($datas['created_at'])) ?></span>
            </p>
        </div>
    </div>
</div>