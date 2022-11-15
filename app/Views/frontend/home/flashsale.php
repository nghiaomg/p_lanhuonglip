<div class="flashsale">
	<div class="container">
		<h2><?= isset($flash_js['title'])?$flash_js['title']:'' ?></h2>
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="left">
					<h3><?= isset($flash_js['name'])?$flash_js['name']:'' ?></h3>
					<div class="box_price">
						<span>Giá chỉ</span>
						<div class="price"><?= isset($flash_js['price_sale']) && $flash_js['price_sale'] > 0?number_format($flash_js['price_sale']):number_format($flash_js['price']); ?> VNĐ</div>
						<div class="price sale"><?= isset($flash_js['price_sale']) && $flash_js['price_sale'] > 0?number_format($flash_js['price']):number_format($flash_js['price_sale']); ?> VNĐ</div>
					</div>
					<a href="<?= isset($flash_js['link'])?$flash_js['link']:'' ?>" class="btn_order"><?= isset($flash_js['text_btn'])?$flash_js['text_btn']:'' ?></a>
					<p class="text-center">Thời gian khuyến mãi còn lại:</p>
					<div class="box_count_down" data-countdate="<?= isset($flash_js['datetime'])?date('Y-m-d H:i:s',strtotime($flash_js['datetime'])):''  ?>">
						<div class="item">
							<div class="value" id="ch_day">0</div>
							<p>Ngày</p>
						</div>
						<div class="item">
							<div class="value" id="ch_hour">6</div>
							<p>Giờ</p>
						</div>
						<div class="item">
							<div class="value" id="ch_minute">40</div>
							<p>Phút</p>
						</div>
						<div class="item">
							<div class="value" id="ch_second">50</div>
							<p>Giây</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 align-self-center">
				<div class="right">
					<img src="<?= isset($flash_js['thumb']) && file_exists('uploads/images/flashsale/'.$flash_js['thumb'])?'uploads/images/flashsale/'.$flash_js['thumb']:'https://www.nhahangquangon.com/wp-content/uploads/2015/12/vit-bac-kinh-1.png' ?>" alt="" >
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	countDate();
function countDate()
{

  	let getDate = $(".box_count_down").attr("data-countdate");
	// let countDownDate = new Date(getDate).getTime();
	let datetimeArr = getDate.split(" ");
	let dateArr = datetimeArr[0].split("-");
	let timeArr = datetimeArr[1].split(":");
	let yearEnd = dateArr[0];
	let monthEnd = dateArr[1] - 1;
	let dayEnd = dateArr[2];
	let hEnd = timeArr[0];
	let mEnd = timeArr[1];
	let sEnd = timeArr[2];
	let countDownDate = new Date(yearEnd, monthEnd, dayEnd, hEnd, mEnd, sEnd).getTime();
	// let countDownDate = new Date(2021, 10, 31, 23, 55, 10).getTime();
	
	// Update the count down every 1 second
	let x = setInterval(function() {
		// Get today's date and time
		// let now = new Date().getTime();
		let now = Date.now();
		// Find the distance between now and the count down date
		let distance = countDownDate - now;
		// Time calculations for days, hours, minutes and seconds
		let days = Math.floor(distance / (1000 * 60 * 60 * 24));
		let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		let seconds = Math.floor((distance % (1000 * 60)) / 1000);
		// console.log(days);
		// Output the result in an element with id="demo"
		$("#ch_day").text(days);    
		$("#ch_hour").text(hours) ;
		$("#ch_minute").text(minutes) ;
		$("#ch_second").text(seconds) ;
		// If the count down is over, write some text 
		if (distance < 0) {
		clearInterval(x);
		}
	}, 1000);

	
	}
</script>