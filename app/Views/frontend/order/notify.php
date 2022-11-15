<div class="order_notify">
	<div class="container">
		<div class="content text-center">
			<img src="assets/images/success.png" alt="Đặt hàng thành công" width="120">
			<h1>Đặt hàng thành công</h1>
			<p>Cảm ơn Anh/Chị đã đặt hàng tại <strong><?= $data_index['systems']['contact']['company'] ?></strong>. Nhân viên của chúng tôi sẽ liên hệ với Anh/Chị trong 24h tới. Xin cảm ơn!</p>
		</div>
	</div>
</div>
<style type="text/css">
	.order_notify .content{
		width: 100%;
		height: 60vh;
		display: inline-flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
	}
	.order_notify .content h1{
		font-size: 2rem;
	}
</style>