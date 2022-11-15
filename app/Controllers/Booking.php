<?php

namespace App\Controllers;

use App\Models\CI_function;
use App\Models\BookingModels;
use App\Models\CountryModels;
use App\Models\CustomersModels;
use App\Controllers\BaseController;
class Booking extends BaseController
{
	private $template 			  = 'frontend/booking/';

	public function __construct()
	{
		$this->CI_function  	= new CI_function();
		$this->security         = \Config\Services::security();
        $this->config_email     = new \Config\Email;
        $this->library_email    = \Config\Services::email();
		$this->BookingModels 	= new BookingModels();
		$this->CountryModels 	= new CountryModels();
		$this->CustomersModels 	= new CustomersModels();
	}

	public function index()
	{
		$data_index 	= $this->get_index();

		// quốc tịch
		$country = $this->CountryModels->select_array('*',['publish' => 1],'sort asc');
	
		$data = array(
			'data_index'			=> $data_index,
			'template'				=> $this->template . 'index',
			'title'					=> 'Liên hệ - '.$data_index['systems']['system']['title'],
			'keyword'				=> $data_index['systems']['system']['meta_keyword'],
			'description'			=> $data_index['systems']['system']['meta_description'],
			'image'					=> $data_index['imageShare'],
			'viewMoreConstLink'     => $this->viewMoreConstructionLink,
			'country'				=> $country,
		);

		return view('frontend/default', isset($data) ? $data : NULL);
	}
	public function notify()
	{
		$data_index 	= $this->get_index();
		$data = array(
			'data_index'			=> $data_index,
			'template'				=> $this->template . 'notify',
			'title'					=> 'Booking thành công',
			'keyword'				=> $data_index['systems']['system']['meta_keyword'],
			'description'			=> $data_index['systems']['system']['meta_description'],
			'image'					=> $data_index['imageShare'],
		);

		return view('frontend/default', isset($data) ? $data : NULL);
	}
	function order(){
	
		if ($this->request->getPost())
		{
			$data_post = $this->request->getPost('data_post');
			$data_post['name'] = $this->security->sanitizeFilename(trim($data_post['name']));
			$data_post['address'] = $this->security->sanitizeFilename(trim($data_post['address']));
			$data_post['club'] = $this->security->sanitizeFilename(trim($data_post['club']));
			$data_post['goWith'] = $this->security->sanitizeFilename(trim($data_post['goWith']));
			$data_post['numPerson'] = $this->security->sanitizeFilename(trim($data_post['numPerson']));
			$data_post['birthday'] = $this->CI_function->change_format_date($data_post['birthday']);
			// $data_post['arrivalDate'] = $this->CI_function->change_format_date($data_post['arrivalDate']);
			$data_post['dateGo'] = $data_post['dateGo'];
			$data_post['created_at'] = gmdate('Y-m-d H:i:s',time() + 7 * 3600);
			// kiếm tra số điện thoại
			$checkphone = $this->CustomersModels->select_array_two('*',['phone' => $data_post['phone']]);
			$countError = 0;
			if (count($checkphone) > 0) {
				$countError +=1;
			}
			// kiêm tra email
			$checkemail = $this->CustomersModels->select_array_two('*',['email' => $data_post['email']]);
			if (count($checkemail) > 0) {
				$countError +=1;
			}
			if ($countError == 0)
			{
				$array = [
					'name'			=> $this->security->sanitizeFilename(trim($data_post['name'])),
					'phone'			=> trim($data_post['phone']),
					'email'			=> trim($data_post['email']),
					'sex'			=> trim($data_post['gender']),
					'birthday'		=> $data_post['birthday'],
					'countryID'		=> $data_post['countryID'],
					'address'		=>  $this->security->sanitizeFilename(trim($data_post['address'])),
					'code'			=> $this->codeCustomers(),
					'created_at'    => gmdate('Y-m-d H:i:s',time() + 7 * 3600)
				];
				$this->CustomersModels->add($array);
			}
			$coutry = $this->CountryModels->select_row_two('*',['id' => $data_post['countryID']]);

			$result = $this->BookingModels->add($data_post);

			$subject = 'FLY NHA TRANG | SUCCESSFUL BOOKING CONFIRMATION - XÁC NHẬN BOOKING THÀNH CÔNG';
			$nickname_email =  $this->get_index()['systems']['contact']['website'];
			$CCmail = $this->get_index()['systems']['system']['email_take'];
			$message = '';
			$send_to_email = $data_post['email'];

			$gender = $this->get_index()['getkeys']['bookingFrom_labelMale'];
			if ($data_post['gender'] == 2)
			{
				$gender = $this->get_index()['getkeys']['bookingFrom_labelFemale'];
			}
			// if CLB empty
			if($data_post['club'] == ''){
				$data_post['club'] = '----------';
			}
			$message  = '
			<!DOCTYPE html>
			<html>
			<head>
				<meta charset="utf-8" />
				<title></title>
				<link rel="preconnect" href="https://fonts.googleapis.com">
				<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
				<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
			</head>
			<body>
				<div style="width: 1000px; margin: auto; font-family: tahoma;">
					<div style="text-align: center;">
						<img style="border-radius: 3%;" src="https://flynhatrang.optechdemo2.com/assets/images/banner_mail.png" width="500">
						<div style="text-align:center"><span style="color:#808080"><span style="font-size:14px"><span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">(English belows)</span></span></span><br>
						<span style="font-family:verdana,geneva,sans-serif"><span style="font-size:22px"><span style="color:#339999"><strong>Booking thành công</strong></span></span></span></div>
					</div>
					<table style="min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr>
								<td style="padding-top:9px" valign="top">
									<table style="max-width:100%;min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
										<tbody>
											<tr>
												<td style="padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px" valign="top">
													<span style="font-size:15px">
														<span style="color:#696969">
															<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif"><strong>Dear '.trim($data_post['name']).',</strong><br>
															Bạn đã booking thành công vào tại <strong><strong style="color: #F46E2E;">Fly Nha Trang</strong></strong> với thông tin như sau:</span>
														</span>
													</span>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table style="min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr>
								<td style="min-width:100%;padding:18px 18px 5px">
									<table style="min-width:100%;border-top:2px solid #cfcfcf" width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody>
											<tr>
												<td>
													<span></span>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table style="min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr>
								<td style="padding-top:9px" valign="top">
									<table style="max-width:300px" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
										<tbody>
											<tr>
												<td style="padding:0px 18px 9px;line-height:125%" valign="top">
													<div style="text-align:left">
														<div style="text-align:left">
															<span style="font-size:14px">
																<strong><span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">Họ & tên</span></strong><br>
																<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">
																	'.trim($data_post['name']).'
																</span>
															</span>
														</div>
														<hr>
														<div style="text-align:left">
															<span style="font-size:14px">
																<strong><span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">Số điện thoại</span></strong><br>
																<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">
																	'.trim($data_post['phone']).'
																</span>
															</span>
														</div>
														<hr>
														<div style="text-align:left">
															<span style="font-size:14px"><strong><span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">Email</span></strong><br>
															<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">'.trim($data_post['email']).'</span></span>
															<hr>
														</div>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
									<table style="max-width:300px" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
										<tbody>
											<tr>
												<td style="padding:0px 18px 9px;line-height:125%" valign="top">
													<div style="text-align:left">
														<div style="text-align:left">
															<span style="font-size:14px">
																<strong><span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">Giới tính</span></strong><br>
																<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">'.$gender.'</span>
															</span>
														</div>
														<hr>
														<div style="text-align:left">
															<span style="font-size:14px">
																<strong><span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">Ngày sinh</span></strong><br>
																<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">'.date('d/m/Y',strtotime($data_post['birthday'])).'</span>
															</span>
														</div>
														<hr>
														<div style="text-align:left">
															<span style="font-size:14px"><strong><span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">Quốc tịch</span></strong><br>
															<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">'.$coutry['name'].'</span></span>
															<hr>
														</div>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
									<table style="max-width:300px" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
										<tbody>
											<tr>
												<td style="padding:0px 18px 9px;line-height:125%" valign="top">
													<div style="text-align:left">
														<div style="text-align:left">
															<span style="font-size:14px">
																<strong><span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">Lịch trình bay</span></strong><br>
																<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">'.$data_post['dateGo'].'</span>
															</span>
														</div>
														<hr>
														<div style="text-align:left">
															<span style="font-size:14px">
																<strong><span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">Đến từ CLB</span></strong><br>
																<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">'.trim($data_post['club']).'</span>
															</span>
														</div>
														<hr>
														<div style="text-align:left">
															<span style="font-size:14px"><strong><span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">Địa chỉ liên hệ</span></strong><br>
															<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">'.trim($data_post['address']).'</span></span>
															<hr>
														</div>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table style="min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr>
								<td style="padding-top:9px" valign="top">
									<table style="max-width:100%;min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
										<tbody>
											<tr>
												<td style="padding:0px 18px 9px;line-height:125%" valign="top">
													<div style="text-align:center"><span style="font-size:14px">
														<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">
															Mọi thông tin cần hỗ trợ, vui lòng liên hệ<br>
															Email:&nbsp;<strong><a href="mailto:'.$this->get_index()['systems']['contact']['email'].'" target="_blank">'.$this->get_index()['systems']['contact']['email'].'</a></strong><br>
															Hotline:&nbsp;<strong>'.$this->get_index()['systems']['contact']['phone'].'</strong></span>
														</span>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
							
								</td>
							</tr>
						</tbody>
					</table>
					<table style="max-width:100%;min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
						<tbody>
							<tr>
								<td style="padding:0px 18px 9px;line-height:125%" valign="top">
									<div style="text-align:center"><font face="roboto, helvetica neue, helvetica, arial, sans-serif"><span style="font-size:14px"><strong>Trân trọng</strong></span></font></div>
								</td>
							</tr>
						</tbody>
					</table>
					<table style="min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr>
								<td style="min-width:100%;padding:18px">
									<table style="min-width:100%;border-top:5px solid #ea5b3a" width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
												<td>
													<span></span>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<div style="text-align: center;">
						<div style="text-align:center"><span style="color:#808080"><span style="font-size:14px"><span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">English</span></span></span><br>
						<span style="font-family:verdana,geneva,sans-serif"><span style="font-size:22px"><span style="color:#339999"><strong>Successful Booking</strong></span></span></span></div>
					</div>
					<table style="min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr>
								<td style="padding-top:9px" valign="top">
									<table style="max-width:100%;min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
										<tbody>
											<tr>
												<td style="padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px" valign="top">
													<span style="font-size:15px">
														<span style="color:#696969">
															<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif"><strong>Dear '.trim($data_post['name']).',</strong><br>
															You have successfully booked at <strong><strong style="color: #F46E2E;">Fly Nha Trang</strong></strong> with the following information:</span>
														</span>
													</span>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table style="min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr>
								<td style="min-width:100%;padding:18px 18px 5px">
									<table style="min-width:100%;border-top:2px solid #cfcfcf" width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody>
											<tr>
												<td>
													<span></span>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table style="min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr>
								<td style="padding-top:9px" valign="top">
									<table style="max-width:300px" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
										<tbody>
											<tr>
												<td style="padding:0px 18px 9px;line-height:125%" valign="top">
													<div style="text-align:left">
														<div style="text-align:left">
															<span style="font-size:14px">
																<strong><span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">Full name</span></strong><br>
																<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">
																'.trim($data_post['name']).'
																</span>
															</span>
														</div>
														<hr>
														<div style="text-align:left">
															<span style="font-size:14px">
																<strong><span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">Phone</span></strong><br>
																<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">
																'.trim($data_post['phone']).'
																</span>
															</span>
														</div>
														<hr>
														<div style="text-align:left">
															<span style="font-size:14px"><strong><span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">Email</span></strong><br>
															<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">'.trim($data_post['email']).'</span></span>
															<hr>
														</div>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
									<table style="max-width:300px" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
										<tbody>
											<tr>
												<td style="padding:0px 18px 9px;line-height:125%" valign="top">
													<div style="text-align:left">
														<div style="text-align:left">
															<span style="font-size:14px">
																<strong><span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">Gender</span></strong><br>
																<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">Nam</span>
															</span>
														</div>
														<hr>
														<div style="text-align:left">
															<span style="font-size:14px">
																<strong><span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">Birthday</span></strong><br>
																<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">'.date('d/m/Y',strtotime($data_post['birthday'])).'</span>
															</span>
														</div>
														<hr>
														<div style="text-align:left">
															<span style="font-size:14px"><strong><span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">Nationality</span></strong><br>
															<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">'.$coutry['name'].'</span></span>
															<hr>
														</div>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
									<table style="max-width:300px" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
										<tbody>
											<tr>
												<td style="padding:0px 18px 9px;line-height:125%" valign="top">
													<div style="text-align:left">
														<div style="text-align:left">
															<span style="font-size:14px">
																<strong><span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">Flight schedule</span></strong><br>
																<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">'.$data_post['dateGo'].'</span>
															</span>
														</div>
														<hr>
														<div style="text-align:left">
															<span style="font-size:14px">
																<strong><span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">From the club</span></strong><br>
																<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">'.trim($data_post['club']).'</span>
															</span>
														</div>
														<hr>
														<div style="text-align:left">
															<span style="font-size:14px"><strong><span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">Address</span></strong><br>
															<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">'.trim($data_post['address']).'</span></span>
															<hr>
														</div>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table style="min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr>
								<td style="padding-top:9px" valign="top">
									<table style="max-width:100%;min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
										<tbody>
											<tr>
												<td style="padding:0px 18px 9px;line-height:125%" valign="top">
													<div style="text-align:center"><span style="font-size:14px">
														<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">
															For further support, please contact to<br>
															Email:&nbsp;<strong><a href="mailto:'.$this->get_index()['systems']['contact']['email'].'" target="_blank">'.$this->get_index()['systems']['contact']['email'].'</a></strong><br>
															Hotline:&nbsp;<strong>'.$this->get_index()['systems']['contact']['phone'].'</strong></span>
														</span>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table style="min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr>
								<td style="padding-left:9px;padding-right:9px" align="center">
									<table style="min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody>
											<tr>
												<td style="padding-top:9px;padding-right:9px;padding-left:9px" valign="top" align="center">
													<table cellspacing="0" cellpadding="0" border="0" align="center">
														<tbody>
															<tr>
																<td valign="top" align="center">
																	<table style="display:inline" cellspacing="0" cellpadding="0" border="0" align="left">
																		<tbody>
																			<tr>
																				<td style="padding-right:10px;padding-bottom:9px" valign="top">
																					<table width="100%" cellspacing="0" cellpadding="0" border="0">
																						<tbody>
																							<tr>
																								<td style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px" valign="middle" align="left">
																									<table width="" cellspacing="0" cellpadding="0" border="0" align="left">
																										<tbody>
																											<tr>
																												<td width="24" valign="middle" align="center">
																													<a href="'.$this->get_index()['systems']['social']['facebook'].'" target="_blank" data-saferedirecturl="'.$this->get_index()['systems']['social']['facebook'].'"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-facebook-48.png" alt="Facebook" style="display:block" class="CToWUd" width="24" height="24"></a>
																												</td>
																											</tr>
																										</tbody>
																									</table>
																								</td>
																							</tr>
																						</tbody>
																					</table>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																	<table style="display:inline" cellspacing="0" cellpadding="0" border="0" align="left">
																		<tbody><tr>
																			<td style="padding-right:0;padding-bottom:9px" valign="top">
																				<table width="100%" cellspacing="0" cellpadding="0" border="0">
																					<tbody>
																						<tr>
																							<td style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px" valign="middle" align="left">
																								<table width="" cellspacing="0" cellpadding="0" border="0" align="left">
																									<tbody>
																										<tr>
																											<td width="24" valign="middle" align="center">
																												<a href="https://flynhatrang.com" target="_blank" data-saferedirecturl="https://flynhatrang.com"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-link-48.png" alt="Website" style="display:block" class="CToWUd" width="24" height="24"></a>
																											</td>
																										</tr>
																									</tbody>
																								</table>
																							</td>
																						</tr>
																					</tbody>
																				</table>
																			</td>
																		</tr>
																	</tbody>
																</table>
															
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody></table>
								</td>
							</tr>
						</tbody>
					</table>
				</div> 
			</body>
			</html>
			';
			
			if ($result['type'] == "successful")
			{
				$this->sendMail($subject, $message ,$send_to_email, $nickname_email,$CCmail);
				return redirect()->to(base_url('booking-thanh-cong'));	
			}
		}
	}
	function sendMail($subject ='',$message ='',$send_to_email,$nickname_email,$CCmail){
		$config_email   = $this->config_email;
        // lấy SMTPUser từ config
        $SMTPUser       =  $config_email->SMTPUser;
	    //send mail
        $this->library_email->setFrom($SMTPUser, $nickname_email);
		$this->library_email->setTo($send_to_email);
		$this->library_email->setCC($CCmail);
		$this->library_email->setSubject($subject);
		$this->library_email->setMessage($message);
		if ($this->library_email->send()) {
			return true;
		} else{
			return false;
		}
	}
	function codeCustomers(){
        $code      = 'KH'.$this->CI_function->generateRandomString(6);
        $checkCode = $this->CustomersModels->select_array_two('*',['code' => $code]);
        if (count($checkCode) > 0) {
            $code    = $this->codeCustomers();
        }
        return $code;
    }
}
