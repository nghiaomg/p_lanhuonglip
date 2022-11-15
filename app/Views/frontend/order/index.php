<link rel="stylesheet" type="text/css" href="assets/css/order.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.2.1/dist/sweetalert2.min.css">
<div class="order_page">
	<h1 class="title">
        ĐẶT HÀNG
    </h1>
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<?php if(isset($product) && $product != NULL){?>
				<div class="list_product">
					<?php foreach($product as $key => $val){?>
						<div class="item">
							<div class="left">
								<div class="box_img" style="background-image: url('uploads/images/product/<?= $val['thumb'] ?>');"></div>
								<div class="info">
									<h3><?= $val['name'] ?></h3>
									<div class="price"><?= number_format($val['price']) ?> / <?= $val['dvt_name']?></div>
									<div class="des"><?= $val['des'] ?></div>
								</div>
							</div>
							<div class="right align-self-center">
								<a href="javascript:void(0)" onclick="addTocart(this)" data ="<?= str_replace(['+','/','='],['-','_',''],base64_encode($val['id'].'.'.$val['alias'])) ?>"><i class="fas fa-shopping-cart"></i></a>
							</div>
						</div>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
			<div class="col-lg-4">
				<div class="order_right">
					<div class="sum_item">
						0 phần
					</div>
					<div id="loadOrder">
						
					</div>
					<ul>
						<li>Cộng <strong><span class="total">0</span> đ</strong></li>
						<li>Giảm giá <strong>0% (0đ)</strong></li>
						<li>Thành tiền <strong><span class="total_all">0</span> đ</strong></li>
					</ul>
					<a href="javascript:void(0)" class="btn_order" data-toggle="modal"  onclick="order()" id="modal_form">Đặt trước</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->include('frontend/order/formorder') ?>
  <!-- sample modal content -->

<script src="assets/js/vendor.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.2.1/dist/sweetalert2.min.js"></script>
<script>
	let array = [];
	function addTocart(__this){
		let id = $(__this).attr('data');
		var html = '';
	
		let total_All = 0 ;
		$.ajax({
			url:"order/addTocart",
			method:"post",
			data:{id:id},
			dataType:'json',
			success:function(response){
				if (response !== undefined) {
					if (array.length > 0) {
						Object.entries(array).forEach(function([key,value]){
							if (array[key].id === response.id) {
								array[key].qty++;
							}
							else{
								let index = array.findIndex(p => p.id == response.id);
								if (index === -1) {
									array.push(response);
								}
							}
						});
					}
					else{
						array.push(response);
					}
					let total = 0 ;
					if (array.length > 0) {
						Object.entries(array).forEach(function([key,value]){
							html += `<div class="order_info" id="id${value.id}">`;
								html += `<div class="sum position-relative">`;
									html += `<div class="item_product m-0"><div class="product_name">${value.name}</div><div class="qty_box"><span onclick="minus(this)" data-id ="${value.id}">-</span> ${value.qty} <span onclick="plus(this)" data-id ="${value.id}">+</span></div>  <span class="text-danger btn_delete" onclick="delete_items(${value.id})"><i class="fas fa-trash-alt"></i></span></div>`;
										html += `<div class="price_choose d-flex">`;
											html += `<select name="" id="" onchange="change_status(this,${value.id})" class="choose_type">`;
												html += `<option value="0"  ${value.status === 0?'selected':''}>Chặt sẵn</option>`;
												html += `<option value="1"  ${value.status === 1?'selected':''}>Để nguyên con</option>`;
											html +=`</select>`;
											html += `<p class="price">${ new Intl.NumberFormat().format(value.price * value.qty)}</p>`
										html += `</div>`;
								html += `</div>`;
							html += `</div>`;
							total += (value.price * value.qty);
							$('#loadOrder').html(html);
						});
						total_All  = total;
						$('span.total').html(new Intl.NumberFormat().format(total))
						$('span.total_all').html(new Intl.NumberFormat().format(total_All))
						$('.sum_item').html(array.length +' Phần');
					}
				}
			}
		});
	}
	// trừ số items
	function minus(__this){
		let id = $(__this).attr('data-id');
		let total_All = 0 ;
		let total = 0 ;
		Object.entries(array).forEach(function([key,value]){
			if (array[key].id == id) {
				array[key].qty--;
			}
		});
		let html = '';
		// render lại HTML
		if (array.length > 0) {
			Object.entries(array).forEach(function([key,value]){
				html += `<div class="order_info" id="id${value.id}">`;
					html += `<div class="sum position-relative">`;
						html += `<div class="item_product m-0"><div class="product_name">${value.name}</div><div class="qty_box"><span onclick="minus(this)" data-id ="${value.id}">-</span> ${value.qty} <span onclick="plus(this)" data-id ="${value.id}">+</span></div>  <span class="text-danger btn_delete" onclick="delete_items(${value.id})"><i class="fas fa-trash-alt"></i></span></div>`;
							html += `<div class="price_choose d-flex">`;
								html += `<select name="" id="" onchange="change_status(this,${value.id})" class="choose_type">`;
									html += `<option value="0"  ${value.status === 0?'selected':''}>Chặt sẵn</option>`;
									html += `<option value="1"  ${value.status === 1?'selected':''}>Để nguyên con</option>`;
								html +=`</select>`;
								html += `<p class="price">${ new Intl.NumberFormat().format(value.price * value.qty)}</p>`
							html += `</div>`;
					html += `</div>`;
				html += `</div>`;
				total += (value.price * value.qty);
				$('#loadOrder').html(html);
				if (array[key].qty <= 0) {
					document.querySelector('#id'+value.id).remove();
					array.splice(array.findIndex(v => v.id == array[key].id),1)
				}
			});
			total_All  = total;
			$('span.total').html(new Intl.NumberFormat().format(total))
			$('span.total_all').html(new Intl.NumberFormat().format(total_All))
			$('.sum_item').html(array.length +' Phần');
		}
	}
	// + items
	function plus(__this){
		let id = $(__this).attr('data-id');
		let total_All = 0 ;
		let total = 0 ;
		Object.entries(array).forEach(function([key,value]){
			if (array[key].id == id) {
				array[key].qty++;
			}
		});
		// render lại cho HTML
		let html = '';
		if (array.length > 0) {
			Object.entries(array).forEach(function([key,value]){
				html += `<div class="order_info" id="id${value.id}">`;
					html += `<div class="sum position-relative">`;
						html += `<div class="item_product m-0"><div class="product_name">${value.name}</div><div class="qty_box"><span onclick="minus(this)" data-id ="${value.id}">-</span> ${value.qty} <span onclick="plus(this)" data-id ="${value.id}">+</span></div>  <span class="text-danger btn_delete" onclick="delete_items(${value.id})"><i class="fas fa-trash-alt"></i></span></div>`;
							html += `<div class="price_choose d-flex">`;
								html += `<select name="" onchange="change_status(this,${value.id})" id="" class="choose_type">`;
									html += `<option value="0" ${value.status === 0?'selected':''}>Chặt sẵn</option>`;
									html += `<option value="1"  ${value.status === 1?'selected':''}>Để nguyên con</option>`;
								html +=`</select>`;
								html += `<p class="price">${ new Intl.NumberFormat().format(value.price * value.qty)}</p>`
							html += `</div>`;
					html += `</div>`;
				html += `</div>`;
				$('#loadOrder').html(html);
				total += (value.price * value.qty);
			});
			total_All  = total;
			$('span.total').html(new Intl.NumberFormat().format(total))
			$('span.total_all').html(new Intl.NumberFormat().format(total_All))
			$('.sum_item').html(array.length +' Phần');
		}
	}
	// xóa items
	function delete_items(id){
		let html = '';
		let total_All = 0 ;
		let total = 0 ;
		
		if (array.length > 0) {
			document.querySelector('#id'+id).remove();
			array.splice(array.findIndex(v => v.id == id),1);
			Object.entries(array).forEach(function([key,value]){
				html += `<div class="order_info" id="id${value.id}">`;
					html += `<div class="sum position-relative">`;
						html += `<div class="item_product m-0"><div class="product_name">${value.name}</div><div class="qty_box"><span onclick="minus(this)" data-id ="${value.id}">-</span> ${value.qty} <span onclick="plus(this)" data-id ="${value.id}">+</span></div>  <span class="text-danger btn_delete" onclick="delete_items(${value.id})"><i class="fas fa-trash-alt"></i></span></div>`;
							html += `<div class="price_choose d-flex">`;
								html += `<select name="" id="" class="choose_type">`;
										html += `<option value="0" onchange="change_status(this,${value.id})" ${value.status === 0?'selected':''}>Chặt sẵn</option>`;
										html += `<option value="1" onchange="change_status(this,${value.id})" ${value.status === 1?'selected':''}>Để nguyên con</option>`;
								html +=`</select>`;
								html += `<p class="price">${ new Intl.NumberFormat().format(value.price * value.qty)}</p>`
							html += `</div>`;
					html += `</div>`;
				html += `</div>`;
				$('#loadOrder').html(html);
				total += (value.price * value.qty);
			});
			total_All  = total;
			$('span.total').html(new Intl.NumberFormat().format(total))
			$('span.total_all').html(new Intl.NumberFormat().format(total_All))
			$('.sum_item').html(array.length +' Phần');
		}
	}
	function change_status(__this,id){
		Object.entries(array).forEach(function([key,value]){
			if (array[key].id == id) {
				array[key].status = parseInt(__this.value);
			}
		});
	}
	$('button#send_form').click(function(e){
            e.preventDefault();
            let checked = true;
            let formArray = $(this).parent().parent().parent().parent().serializeArray();
            let regexPhone = /^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/;
            for (let index = 0; index < formArray.length; index++) {
                if (formArray[index].value ==="") {
                    checked = false;
                    $('input[name='+formArray[index].name+']').closest('.form-group').find('small').html('Vui lòng nhập');
                    $('input[name='+formArray[index].name+']').closest('.form-group').find('small').css('color','red');
                    $('select[name='+formArray[index].name+']').closest('.form-group').find('small').html('Vui lòng nhập');
                    $('select[name='+formArray[index].name+']').closest('.form-group').find('small').css('color','red');
                    //$('small#g-recaptcha-response').html('Vui lòng xác nhận');
                    //$('small#g-recaptcha-response').css('color','red');
                }
                else{
                    $('input[name='+formArray[index].name+']').closest('.form-group').find('small').html('');
                    $('select[name='+formArray[index].name+']').closest('.form-group').find('small').html('');
                    $('small#g-recaptcha-response').html('');
                    if (formArray[index].name === "phone") {
                        if (regexPhone.test(formArray[index].value) === false) {
                            checked = false;
                            $('input[name='+formArray[index].name+']').closest('.form-group').find('small').text('Sai định dạng số điện thoại')
                            $('input[name='+formArray[index].name+']').closest('.form-group').find('small').css('color','red')
                        }
                    }
                }
            }
            if (checked === true) {
            	let name = $('#name').val();
				let address = $('#address').val();
				let hours = $('#hours').val();
				let phone = $('#phone').val();
				let date_give = $('#date_give').val();
				
                $.ajax({
					url:"order/addcartdb",
					method:"post",
					data:{name:name,address:address,phone:phone,hours:hours,date_give:date_give,datas:array},
					success:function(){
						//alert('Đặt hàng thành công');
						for (let index = 0; index < formArray.length; index++) {
							if (formArray[index].name !='date_start' && formArray[index].name !='date_end') {
								$('input[name='+formArray[index].name+']').val("");
								$('textarea[name='+formArray[index].name+']').val("");
							}
						}
						array = [];
						$('#loadOrder').html('');
						$('span.total').html('')
						$('span.total_all').html('')
						$('.sum_item').html(array.length +' Phần');
						window.location.href = "dat-hang-thanh-cong";
					}
				});
      //           $.ajax({
      //               url:'order/checkrecaptcha',
      //               method:"post",
      //               data:$(this).parent().parent().parent().parent().serialize(),
      //               dataType:'json',
      //               beforeSend:function(){
      //               },
      //               success:function(response){
						// let name = $('#name').val();
						// let address = $('#address').val();
						// let hours = $('#hours').val();
						// let phone = $('#phone').val();
						// let date_give = $('#date_give').val();
						
      //                   if (response.result ==="success") {
      //                       $.ajax({
						// 		url:"order/addcartdb",
						// 		method:"post",
						// 		data:{name:name,address:address,phone:phone,hours:hours,date_give:date_give,datas:array},
						// 		success:function(){
						// 			//alert('Đặt hàng thành công');
						// 			for (let index = 0; index < formArray.length; index++) {
						// 				if (formArray[index].name !='date_start' && formArray[index].name !='date_end') {
						// 					$('input[name='+formArray[index].name+']').val("");
						// 					$('textarea[name='+formArray[index].name+']').val("");
						// 				}
						// 			}
						// 			array = [];
						// 			$('#loadOrder').html('');
						// 			$('span.total').html('')
						// 			$('span.total_all').html('')
						// 			$('.sum_item').html(array.length +' Phần');
						// 			grecaptcha.reset();
						// 			window.location.href = "dat-hang-thanh-cong";
						// 		}
						// 	});
      //                   }
						// if (response.result ==="error") {
						// 	grecaptcha.reset();
						// }
      //               }
      //           })
            }
        });
		function order(){
			if (array.length > 0) {
				$('#myModal').modal({
					showClose: true
				});
			}
			else{
				Swal.fire({
					icon: "error",
					title: "Vui lòng chọn món ăn !",
					type: "error",
                });
			}
		}
</script>