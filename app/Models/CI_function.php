<?php

namespace App\Models;

use App\Controllers\BaseController;
use CodeIgniter\Model;
use \DateTime;

class CI_function extends Model
{
	function __construct()
	{
		$this->db  = \Config\Database::connect('default');
	}

	function time_elapsed_string($datetime, $full = false)
	{
		$result        = "";
		$now    = new DateTime;
		$ago    = new DateTime($datetime);
		$diff   = $now->diff($ago);
		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;
		$string = array(
			'y' => 'năm',
			'm' => 'tháng',
			'w' => 'tuần',
			'd' => 'ngày',
			'h' => 'giờ',
			'i' => 'phút',
			's' => 'giây',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
			} else {
				unset($string[$k]);
			}
		}
		if (!$full) {
			$string = array_slice($string, 0, 1);
		}
		$result = $string  ? ["in" => 1, "time" => implode(', ', $string) . ' trước']  : 'bây giờ';
		if ($diff->m >= 1)  // == nếu đã là 1 tháng
		{
			$result = ["in" => 0, "time" => date("d/m/Y, h:i:s", strtotime($datetime))];
		}
		return $result;
	}

	// button phân trang
	function button_pagination($number_button = 3, $total_rows, $per_page, $page, $base_url = NULL, $alias = NULL, $key_word = NULL)
	{
		// number_button :(số button phân trang muốn hiển thị vd : 4 ( hiển thị chỉ có 1 2 3 4 trong dãy (1 2 3 4 5 6 7 8) )
		// total_rows    : tổng số hàng trả về
		// page          : active button đang click
		// per_page      : số lượng dữ liệu mỗi trang
		// base_url, alias, key_word : dùng khi muốn thay đổi url khi click chuyển trang
		$total_page_display = ceil($total_rows / $per_page);

		$prev = $page > 1 ? $page - 1 : 1;
		$next = $page + 1;
		$starSlice = 0;
		//mảng chứa tất các phân trang
		$arr_page = [];
		if ($total_page_display > 1) {
			// tổng tất cả trang , lặp tạo ra mảng 
			for ($i = 0; $i < $total_page_display; $i++) {
				$numbPage = $i + 1;
				$arr_page[$i] = $numbPage;
			}
			$starSlice = $page - 1;  // bắt đầu lấy từ ...
			//cắt mảng
			// var_dump($sliceArray);
			$sliceArray = array_slice($arr_page, $starSlice, $number_button); // cắt ra từ mảng

			//nếu trong mảng tồn tại số cuối cùng và số page tồn tại trong mảng đó 
			if (in_array($page, $sliceArray) && in_array($arr_page[count($arr_page) - 1], $sliceArray)) {
				// nếu tổng tất cả các trang hiện tại > số trang muốn hiển thị hoặc tổng số các trang = số phân trang muốn hiển thị
				// ví dụ: tổng trang hiện tại = 6 , số phân trang cần hiển thị = 6 ...=> 6 = 6
				if (count($arr_page) > $number_button || count($arr_page) <= $number_button) {
					// lấy mảng mặc định hiện tại
					// nếu số phân trang hiện tại < số lượng phân trang hiển thị
					// thì $starSlice = $arr_page[count($arr_page)-1] -$number_button = số âm (-1,-2 ..v..v)
					$starSlice  = $arr_page[count($arr_page) - 1] - $number_button;
					//$starSlice = 0 nếu $starSlice < 0
					$starSlice  = $starSlice < 0 ? 0 : $starSlice;
					//cắt mảng
					$sliceArray = array_slice($arr_page, $starSlice, $number_button);
				}
			}

			$item_li  = '';
			$item_li .= '<ul class="pagination ul_pagination ml-auto">';
			if ($page > 1 && count($arr_page) > $number_button) {
				$firstPage = 1;
				$item_li  .= '<li class="paginate_button page-item previous forClick "  id="datatable_previous">
										<a href="' . $base_url . $alias . '/page' . '/' . $prev . '" class="page-link" data-ci-pagination-page="' . $prev . '" rel="prev">
											<i class="fa fa-angle-left" aria-hidden="true"></i>
										</a>
									</li>';
			}

			foreach ($sliceArray as $key => $value) {
				$active  = $value == $page ? 'active' : '';
				$href    = $value == $page ? 'javascript:void(0)' : $base_url . $alias . '/page' . '/' . $value . '' . $key_word . '';
				$item_li .= '<li class="' . $active . ' page-item forClick">
								<a href="' . $href . '" data-ci-pagination-page="' . $value . '" class="page-link">' . $value . '</a>
								</li>';
			}

			// nếu phần tử cuối cùng của mảng vừa cắt < phần tử cuối cùng của tổng phân trang hiện tại 
			// thi in ">" (next)
			if ($sliceArray[count($sliceArray) - 1] < $arr_page[count($arr_page) - 1]) {
				$endPage  = $arr_page[count($arr_page) - 1];

				$item_li .= '<span class="sp_dots" style="display:inline-block;transform: translateY(12px);margin-right: 4px;margin-left: 4px;font-size: 20px;">...</span>
										<li class="paginate_button page-item next forClick">
											<a href="' . $base_url . $alias . '/page' . '/' . $endPage . '' . $key_word . '"   class="page-link" data-ci-pagination-page="' . $endPage . '" rel="next">'
					. $endPage .
					'</a>
										</li>';
				$item_li .= '<li class="paginate_button page-item next forClick">
										<a href="' . $base_url . $alias . '/page' . '/' . $next . '' . $key_word . '"  class="page-link" data-ci-pagination-page="' . $next . '" rel="next">
											<i class="fa fa-angle-right" aria-hidden="true"></i>
										</a>
									</li>';
			}

			$item_li .= '</ul>';
			return $item_li;
		} else {
			return NULL;
		}
	}

	function createdAlias($alias = '', $type, $alias_old = '')
	{
		$random = rand(0, 999);
		$check = $this->db->table('tbl_alias')->select('*')->where(array('alias' => $alias_old, 'type' => $type))->get()->getRowArray();
		if ($check != NULL) {
			if ($alias == $alias_old) {
				$alias = $alias_old;
			} else {
				$data = $this->db->table('tbl_alias')->select('*')->where(array('alias' => $alias))->get()->getRowArray();
				if ($data != NULL) {
					$alias = $alias . '-' . $random;
				}
			}
			$data_edit = array(
				'alias' 	=> 	$alias,
			);
			$result = $this->db->table('tbl_alias')->update($data_edit, array('id' => $check['id']));
		} else {
			$data = $this->db->table('tbl_alias')->select('*')->where(array('alias' => $alias))->get()->getRowArray();
			if ($data != NULL) {
				$alias = $alias . '-' . $random;
			}
			$data_add = array(
				'alias' 	=> 	$alias,
				'type' 		=> 	$type,
				'created_at'	=>	gmdate('Y-m-d H:i:s', time() + 7 * 3600)
			);
			$result = $this->db->table('tbl_alias')->insert($data_add);
		}
		return $alias;
	}

	function getSelectCategory($parentid, $option = '|-', $typeid = 0, $type = 0)
	{
		if ($type && $type > 0) {
			$menu = $this->db->table('tbl_category')->select('id,name,parentid')->where(array('parentid' => $parentid, 'type' => $type))->get()->getResult('array');
		} else {
			$menu = $this->db->table('tbl_category')->select('id,name,parentid')->where(array('parentid' => $parentid))->get()->getResult('array');
		}

		$data  = '';
		if ($menu != NULL) {
			if ($parentid > 0) {
				$option = $option . '-';
			}
			foreach ($menu as $key => $val) {
				$data .= '<option value="' . $val['id'] . '"';
				if ($typeid == $val['id']) {
					$data .= 'selected';
				}
				$data .= '>' . $option . $val['name'] . '</option>';
				$data .= $this->getSelectCategory($val['id'], $option, $typeid);
			}
		}
		return $data;
	}
	function getSelectCategory2($parentid, $option = '|-', $cateIDAr = NULL, $type = 0)
	{
		if ($type && $type > 0) {
			$menu = $this->db->table('tbl_category')->select('id,name,parentid')->where(array('parentid' => $parentid, 'type' => $type))->get()->getResult('array');
		} else {
			$menu = $this->db->table('tbl_category')->select('id,name,parentid')->where(array('parentid' => $parentid))->get()->getResult('array');
		}

		$data  = '';
		if ($menu != NULL) {
			if ($parentid > 0) {
				$option = $option . '-';
			}
			foreach ($menu as $key => $val) {
				$data .= '<option value="' . $val['id'] . '"';
				if ($cateIDAr != NULL && in_array($val['id'], $cateIDAr)) {
					$data .= 'selected';
				}
				$data .= '>' . $option . $val['name'] . '</option>';
				$data .= $this->getSelectCategory2($val['id'], $option, $cateIDAr);
			}
		}
		return $data;
	}

	function showMenuNews($parentid, $option = '|')
	{
		$data = "";
		$menu = $this->db->table('tbl_category')->select('*')->where(array('parentid' => $parentid, 'type' => 1))->orderBy('sort desc')->get()->getResult('array');
		if ($menu != NULL) {
			if ($parentid > 0) {
				$option = $option . '----';
			}
			$data  = '';
			foreach ($menu as $key => $val) {
				$name_parent = $this->db->table('tbl_category')->select('name')->where(array('id' => $val['parentid']));
				$data .= '<tr class="tr' . $val['id'] . '">
				<td class="text-center"><input type="checkbox" name="foo" class="checkbox" value="' . $val['id'] . '"></td>
				<td>
					<a class="text-dark" href="' . ADMIN_MENUNEWS_URL . 'edit/' . $val['id'] . '">';
				if ($parentid > 0) {
					$data .= $option;
				}
				$data .= $val['name'] . '</a>
				</td>
				<td class="text-center">' . date('d/m/Y', strtotime($val['created_at'])) . '</td>
				<td width="100" class="text-center">
					<input onkeyup="changeSort(this,' . $val['id'] . ');" type="text" class="form-control text-center" id="sort' . $val['id'] . '"  value="' . $val['sort'] . '" data-control="menuNews">
				</td>
				<td class="text-center">
					<div class="checkbox checkbox-info">
						<input onchange="changeglobal(' . $val['id'] . ',\'publish\');"';
				if ($val['publish'] == 1) {
					$data .= 'checked ';
				}
				$data .= 'type="checkbox" name="publish" class="publish' . $val['id'] . '" id="publish' . $val['id'] . '" value="1" data-control="menuNews">
						<label for="publish' . $val['id'] . '"></label>
					</div>
				</td>
				<td class="text-center">
					<div class="checkbox checkbox-info box-check-left">
						<input onchange="changeglobal(' . $val['id'] . ',\'home\');"';
				if ($val['home'] == 1) {
					$data .= 'checked ';
				}
				$data .= 'type="checkbox" name="home" id="home' . $val['id'] . '" class="home' . $val['id'] . '" value="1" data-control="menuNews">
						<label for="home' . $val['id'] . '">Home</label>
					</div>
					<div class="checkbox checkbox-info box-check-left">
						<input id="right' . $val['id'] . '" onchange="changeglobal(' . $val['id'] . ',\'right\');"';
				if ($val['right'] == 1) {
					$data .= 'checked ';
				}
				$data .= 'type="checkbox" name="right" class="right' . $val['id'] . '" value="1" data-control="menuNews">
						<label for="right' . $val['id'] . '">Right</label>
					</div>
				</td>
				<td class="text-center">
					<a href="' . ADMIN_MENUNEWS_URL . 'edit/' . $val['id'] . '" class="btn btn-info btn-sm"> <i class="icon-note"></i> </a>
					<a href="javascript:void(0)" onclick="del(' . $val['id'] . ')" class="btn btn-danger btn-sm" id="delete' . $val['id'] . '" data-control = "menuNews"><i class="icon-trash"></i></a>
				</td>
				</tr>';
				$data .= $this->showMenuNews($val['id'], $option);
			}
		}
		return $data;
	}
	// =================
	function showMenuProduct($parentid, $option = '|')
	{
		$menu = $this->db->table('tbl_category')->select('*')->where(array('parentid' => $parentid, 'type' => 3))->orderBy('sort desc')->get()->getResult('array');
		if ($menu != NULL) {
			if ($parentid > 0) {
				$option = $option . '----';
			}
			$data  = '';
			foreach ($menu as $key => $val) {
				$name_parent = $this->db->table('tbl_category')->select('name')->where(array('id' => $val['parentid']));
				$data .= '<tr class="tr'.$val['id'].' parent'.$parentid.'"  data-parent = "'.$val['parentid'].'">
				<td class="text-center"><input type="checkbox" name="foo" class="checkbox" value="' .$val['id'].'"></td>
				<td>
					<a class="text-info" href="' . $val['alias'] . '">';
				if ($parentid > 0) {
					$data .= $option;
				}
				$data .= $val['name'] . '</a>
				</td>
				<td class="text-center">' . date('d/m/Y', strtotime($val['created_at'])) . '</td>
				<td width="100" class="text-center">
					<input onkeyup="changeSort(this,' . $val['id'] . ');" type="text" class="form-control text-center" id="sort' . $val['id'] . '"  value="' . $val['sort'] . '" data-control="menuProduct">
				</td>
				<td class="text-center">
					<div class="checkbox checkbox-info">
						<input onchange="changeglobal(' . $val['id'] . ',\'publish\');"';
				if ($val['publish'] == 1) {
					$data .= 'checked ';
				}
				$data .= 'type="checkbox" name="publish" class="publish' . $val['id'] . '" id="publish' . $val['id'] . '" value="1" data-control="menuProduct">
						<label for="publish' . $val['id'] . '"></label>
					</div>
				</td>
				<td>
					<div class="checkbox checkbox-info box-check-left">
						<input onchange="changeglobal(' . $val['id'] . ',\'home\');"';
				if ($val['home'] == 1) {
					$data .= 'checked ';
				}
				$data .= 'type="checkbox" name="home" id="home' . $val['id'] . '" class="home' . $val['id'] . '" value="1" data-control="menuProduct">
						<label for="home' . $val['id'] . '">Trang chủ</label>
					</div>';
				// $data .= '<div class="checkbox checkbox-info box-check-left">
				// 		<input onchange="changeglobal(' . $val['id'] . ',\'left\');"';
				// if ($val['left'] == 1) {
				// 	$data .= 'checked ';
				// }
				// $data .= 'type="checkbox" name="left" id="left' . $val['id'] . '" class="left' . $val['id'] . '" value="1" data-control="menuProduct">
				// 		<label for="left' . $val['id'] . '">Left</label>
				// 	</div>';
				// $data .= '<div class="checkbox checkbox-info box-check-left">
				// 		<input id="right' . $val['id'] . '" onchange="changeglobal(' . $val['id'] . ',\'right\');"';
				// if ($val['right'] == 1) {
				// 	$data .= 'checked ';
				// }
				// $data .= 'type="checkbox" name="right" class="right' . $val['id'] . '" value="1" data-control="menuProduct">
				// 		<label for="right' . $val['id'] . '">Nổi bật</label>
				// 	</div>';
				$data .= '</td><td class="text-center">
					<a href="' . ADMIN_MENUPRODUCT_URL . 'edit/' . $val['id'] . '" class="btn btn-info btn-sm"> <i class="icon-note"></i> </a>
					<a href="javascript:void(0)" onclick="del2('. $val['id']. ')" class="btn btn-danger btn-sm" id="delete'. $val['id'] .'" data-control = "menuProduct"><i class="icon-trash"></i></a>
				</td>
				</tr>';
				$data .= $this->showMenuProduct($val['id'], $option);
			}
		}
		return $data;
	}
	function showMenuNewsLand($parentid, $option = '|')
	{
		$menu = $this->db->table('tbl_category')->select('*')->where(array('parentid' => $parentid, 'type' => 2))->orderBy('sort desc')->get()->getResult('array');

		if ($menu != NULL) {
			if ($parentid > 0) {
				$option = $option . '----';
			}
			$data  = '';
			foreach ($menu as $key => $val) {
				$name_parent = $this->db->table('tbl_category')->select('name')->where(array('id' => $val['parentid']));
				$data .= '<tr class="tr' . $val['id'] . '">
				<td class="text-center"><input type="checkbox" name="foo" class="checkbox" value="' . $val['id'] . '"></td>
				<td>
					<a class="text-dark" href="' . ADMIN_MENUNEWSLAND_URL . 'edit/' . $val['id'] . '">';
				if ($parentid > 0) {
					$data .= $option;
				}
				$data .= $val['name'] . '</a>
				</td>
				<td class="text-center">' . date('d/m/Y', strtotime($val['created_at'])) . '</td>
				<td width="100" class="text-center">
					<input onkeyup="changeSort(this,' . $val['id'] . ');" type="text" class="form-control text-center" id="sort' . $val['id'] . '"  value="' . $val['sort'] . '" data-control="menuNewsLand">
				</td>
				<td class="text-center">
					<div class="checkbox checkbox-info">
						<input onchange="changeglobal(' . $val['id'] . ',\'publish\');"';
				if ($val['publish'] == 1) {
					$data .= 'checked ';
				}
				$data .= 'type="checkbox" name="publish" class="publish' . $val['id'] . '" id="publish' . $val['id'] . '" value="1" data-control="menuNewsLand">
						<label for="publish' . $val['id'] . '"></label>
					</div>
				</td>
			    
				<td class="text-center">
					<a href="' . ADMIN_MENUNEWSLAND_URL . 'edit/' . $val['id'] . '" class="btn btn-info btn-sm"> <i class="icon-note"></i> </a>
					<a href="javascript:void(0)" onclick="del(' . $val['id'] . ')" class="btn btn-danger btn-sm" id="delete' . $val['id'] . '" data-control = "menuNewsLand"><i class="icon-trash"></i></a>
				</td>
				</tr>';
				$data .= $this->showMenuNewsLand($val['id'], $option);
			}
		}
		return $data;
	}

	function getSelectMenu($parentid, $option = '|----', $typeid = 0, $type = 0)
	{
		// echo $typeid;die;
		if ($type && $type > 0) {
			$menu = $this->db->table('tbl_menu')->select('id,name,parentid')->where(array('parentid' => $parentid, 'type' => $type))->orderBy('id desc')->get()->getResultArray();
		} else {
			$menu = $this->db->table('tbl_menu')->select('id,name,parentid')->where(array('parentid' => $parentid))->orderBy('id desc')->get()->getResultArray();
		}
		if ($menu != NULL) {
			if ($parentid > 0) {
				$option = $option . '----- ';
			}
			$data = '';

			foreach ($menu as $key => $val) {
				$data .= '<option value="' . $val['id'] . '"';
				if ($typeid == $val['id']) {
					$data .= 'selected';
				}
				$data .= '>' . $option . $val['name'] . '</option>';
				$data .= $this->getSelectCategory($val['id'], $option, $typeid);
			}
		}
		return $data;
	}
	function getSelectMenu2($parentid, $option = '|----', $typeid = 0)
	{
		$menu = $this->db->table('tbl_menu')->select('id,name,parentid')->where(array('parentid' => $parentid))->orderBy('id desc')->get()->getResultArray();
		if ($menu != NULL) {
			if ($parentid > 0) {
				$option = $option . '----- ';
			}
			$data = '';

			foreach ($menu as $key => $val) {
				$data .= '<option value="' . $val['id'] . '"';
				if ($typeid == $val['id']) {
					$data .= 'selected';
				}
				$data .= '>' . $option . $val['name'] . '</option>';
				$data .= $this->getSelectMenu2($val['id'], $option, $typeid);
			}
		}
		return $data;
	}

	function showMenuTable($parentid, $option = '|-------')
	{
		$menu = $this->db->table('tbl_menu')->select('*')->where(array('parentid' => $parentid))->orderBy('sort desc,id desc')->get()->getResult('array');
		$data  = '';
		if ($menu != NULL) {
			if ($parentid > 0) {
				$option = $option . '----';
			}
			foreach ($menu as $key => $val) {
				$parent_text = 'parent';
				$name_parent = $this->db->table('tbl_menu')->select('name')->where(array('id' => $val['parentid']))->get()->getResultArray();
				if ($parentid > 0) {
					$parent_text .= $val['parentid'];
				}
				$data .= '<tr data-parentid="' . $val['parentid'] . '" class="tr' . $val['id'] . ' ' . $parent_text . '">
				<td class="text-center"><input type="checkbox" name="foo" class="checkbox" value="' . $val['id'] . '"></td>
				<td>
					<a class="text-dark" href="' . ADMIN_MENU . 'edit/' . $val['id'] . '">';
				if ($parentid > 0) {
					$data .= $option;
				}
				$data .= $val['name'] . '</a>
				</td>
				<td class="text-center">' . date('d/m/Y', strtotime($val['created_at'])) . '</td>
				<td width="100" class="text-center">
					<input onkeyup="changeSort(this,' . $val['id'] . ');" type="text" class="form-control text-center" id="sort' . $val['id'] . '"  value="' . $val['sort'] . '" data-control="menu">
				</td>
				<td class="text-center">
					<div class="checkbox checkbox-info">
						<input onchange="changeglobal(' . $val['id'] . ',\'publish\');"';
				if ($val['publish'] == 1) {
					$data .= 'checked ';
				}
				$data .= 'type="checkbox" name="publish" class="publish' . $val['id'] . '" id="publish' . $val['id'] . '" value="1" data-control="menu">
						<label for="publish' . $val['id'] . '"></label>
					</div>
				</td>
				<td class="text-center">
					<div class="checkbox checkbox-info d-flex ">
						<input onchange="changeglobal(' . $val['id'] . ',\'footer\');"';
				if ($val['footer'] == 1) {
					$data .= 'checked ';
				}
				$data .= 'type="checkbox" name="footer" id="footer' . $val['id'] . '" class="footer' . $val['id'] . '" value="1" data-control="menu">
						<label for="footer' . $val['id'] . '">Footer</label>
					</div>
					<div class="checkbox checkbox-info d-flex ">
						<input onchange="changeglobal(' . $val['id'] . ',\'main\');"';
				if ($val['main'] == 1) {
					$data .= 'checked ';
				}
				$data .= 'type="checkbox" name="main" id="main' . $val['id'] . '" class="main' . $val['id'] . '" value="1" data-control="menu">
						<label for="main' . $val['id'] . '">Main</label>
					</div>
					<div class="checkbox checkbox-info  d-flex ">
						<input onchange="changeglobal(' . $val['id'] . ',\'hot\');"';
				if ($val['hot'] == 1) {
					$data .= 'checked ';
				}
				$data .= 'type="checkbox" name="hot" id="hot' . $val['id'] . '" class="left' . $val['id'] . '" value="1" data-control="menu">
						<label for="hot' . $val['id'] . '">Nổi bật</label>
					</div>
					<div class="checkbox checkbox-info d-flex">
						<input id="top' . $val['id'] . '" onchange="changeglobal(' . $val['id'] . ',\'top\');"';
				if ($val['top'] == 1) {
					$data .= 'checked ';
				}
				$data .= 'type="checkbox" name="right" class="top' . $val['id'] . '" value="1" data-control="menu">
						<label for="top' . $val['id'] . '">Top</label>
					</div>
					<div class="checkbox checkbox-info d-flex">
							<input id="bottom' . $val['id'] . '" onchange="changeglobal(' . $val['id'] . ',\'bottom\');"';
				if ($val['bottom'] == 1) {
					$data .= 'checked ';
				}
				$data .= 'type="checkbox" name="bottom" class="bottom' . $val['id'] . '" value="1" data-control="menu">
								<label for="main' . $val['id'] . '">Trái</label>
					</div>
				</td>
				<td class="text-center">
					<a href="' . ADMIN_MENU . 'edit/' . $val['id'] . '" class="btn btn-info btn-sm"> <i class="icon-note"></i> </a>
					<a href="javascript:void(0)" onclick="del2(' . $val['id'] . ')" class="btn btn-danger btn-sm" id="delete' . $val['id'] . '" data-control = "menu"><i class="icon-trash"></i></a>
				</td>
				</tr>';
				$data .= $this->showMenuTable($val['id'], $option);
			}
		}
		return $data;
	}

	function get_link($parentid = '', $link = '', $type = 0)
	{
		// $menu = $this->db->table('tbl_page_link')->select('id,name,link')->where(array('publish' => 1))->get()->getResultArray();
		// if ($menu != null) {
		// 	$data .= '<option value="">Chọn link</option>';
		// 	foreach ($menu as $key => $value) {
		// 		$data .= '<option value="' . $value['link'] . '"';
		// 		if ($link == $value['link']) {
		// 			$data .= 'selected';
		// 		}
		// 		$data .= '>' . $value['name'] . '</option>';
		// 	}
		// }
		// return $data;
	}

	function getListMenuId($parentid)
	{
		$result[] = (int)$parentid;
		$menu_child = $this->db->table('tbl_category')->select('id')->where(array('publish' => 1, 'parentid' => $parentid))->get()->getResultArray();
		if ($menu_child != NULL) {
			foreach ($menu_child as $key => $val) {
				$result[] = (int) $val['id'];
				$menu_child_2 = $this->db->table('tbl_category')->select('id')->where(array('publish' => 1, 'parentid' => $val['id']))->get()->getResultArray();
				if ($menu_child_2 != NULL) {
					foreach ($menu_child_2 as $key2 => $val2) {
						$result[] = (int)$val2['id'];
					}
				}
			}
		}
		return $result;
	}

	function create_alias($bien)
	{
		if ($bien != '') {
			$marTViet = array(
				"à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă",
				"ằ", "ắ", "ặ", "ẳ", "ẵ", "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ", "ể", "ễ",
				"ì", "í", "ị", "ỉ", "ĩ",
				"ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ", "ờ", "ớ", "ợ", "ở", "ỡ",
				"ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ",
				"ỳ", "ý", "ỵ", "ỷ", "ỹ",
				"đ",
				"À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă", "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ",
				"È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ",
				"Ì", "Í", "Ị", "Ỉ", "Ĩ",
				"Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ", "Ờ", "Ớ", "Ợ", "Ở", "Ỡ",
				"Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ",
				"Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ",
				"Đ",
				"!", "@", "#", "$", "%", "^", "&", "*", "(", ")"
			);

			$marKoDau = array(
				"a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a",
				"e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e",
				"i", "i", "i", "i", "i",
				"o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o",
				"u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u",
				"y", "y", "y", "y", "y",
				"d",
				"A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A",
				"E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E",
				"I", "I", "I", "I", "I",
				"O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O",
				"U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U",
				"Y", "Y", "Y", "Y", "Y",
				"D",
				"", "", "", "", "", "", "", "", "", ""
			);
			$bien = trim($bien);
			$bien = str_replace("/", "", $bien);
			$bien = str_replace(":", "", $bien);
			$bien = str_replace("!", "", $bien);
			$bien = str_replace("(", "", $bien);
			$bien = str_replace(")", "", $bien);
			$bien = str_replace($marTViet, $marKoDau, $bien);
			$bien = str_replace("-", "", $bien);
			$bien = str_replace("  ", " ", $bien);
			$bien = str_replace(" ", "-", $bien);
			$bien = str_replace("%", "-", $bien);
			$bien = str_replace("+", "-", $bien);
			$bien = str_replace("'", "", $bien);
			$bien = str_replace("“", "", $bien);
			$bien = str_replace("”", "", $bien);
			$bien = str_replace(",", "", $bien);
			$bien = str_replace("’", "", $bien);
			$bien = str_replace(".", "", $bien);
			$bien = str_replace('"', "", $bien);
			$bien = str_replace('\\', '', $bien);
			$bien = str_replace('//', '', $bien);
			$bien = str_replace('?', '', $bien);
			$bien = str_replace('&', '', $bien);
			$bien = strtolower($bien);
			return $bien;
		}
	}

	function jam_read_num_forvietnamese($num = false)
	{
		$str = '';
		$num = trim($num);
		$arr = str_split($num);
		$count = count($arr);
		$f = number_format($num);

		if ($count < 4) {
			$str = $num;
		} else {
			$r = explode(',', $f);

			switch (count($r)) {
				case 4:
					$str = $r[0];
					if ((int) $r[1]) {
						if (substr($r[1], 2) == '0') {
							$Billion = substr($r[1], 0, -1);
						}
						if (substr($Billion, 1) == '0') {
							$Billion = substr($Billion, 0, -1);
						}
						$str .= ',' . $Billion;
					}

					$str .= ' tỷ';

					break;
				case 3:
					$str = $r[0];
					if ((int) $r[1]) {
						if (substr($r[1], 2) == '0') {
							$newMillion = substr($r[1], 0, -1);
						}
						if (substr($newMillion, 1) == '0') {
							$newMillion = substr($newMillion, 0, -1);
						}
						$str .= ',' . $newMillion;
					}
					$str .= ' triệu';
					break;
				case 2:
					$str = $r[0];
					if ((int) $r[1]) {
						if (substr($r[1], 2) == '0') {
							$newThousand = substr($r[1], 0, -1);
						}
						if (substr($newThousand, 1) == '0') {
							$newThousand = substr($newThousand, 0, -1);
						}
						$str .= ',' . $newThousand;
					}
					$str .= ' ngàn';
					break;
			}
		}
		return ($str);
	}

	function jam_read_num_forvietnamese_secure($num = false) // Tiến
	{
		$str = '';
		$num = trim($num);
		$arr = str_split($num);
		$count = count($arr);
		$f = number_format($num);

		if ($count < 4) {
			$str = $num;
		} else {
			$r = explode(',', $f);
			switch (count($r)) {
				case 4:
					$str = $r[0];
					$Billion = '';
					if ($r[1] != "000") {
						$calc = "," . $r[1];
						$Billion .= rtrim($calc, "0");
					}
					$str .= $Billion . ' tỷ';
					break;
				case 3:
					$str = $r[0];
					$Billion = '';
					if ($r[1] != "000") {
						$calc = "," . $r[1];
						$Billion .= rtrim($calc, "0");
					}
					$str .=  $Billion . ' triệu';
					break;
				case 2:
					$str = $r[0];
					$Billion = '';
					if ($r[1] != "000") {
						$calc = "," . $r[1];
						$Billion .= rtrim($calc, "0");
					}
					$str .=  $Billion . ' ngàn';
					break;
			}
		}
		return ($str);
	}

	function check_unit_price($unit)
	{
		$text = '';
		switch ($unit) {
			case $unit == 2:
				$text = '/ Tháng';
				break;
			case $unit == 3:
				$text = '/ m<sup>2</sup>';
				break;
			default:
				break;
		}
		return $text;
	}

	# Construction categories
	function showConstructionCate($parentid, $option = '|')
	{
		$data = '';
		$menu = $this->db->table('tbl_category')->select('*')->where(array('parentid' => $parentid, 'type' => 5))->orderBy('sort desc')->get()->getResult('array');
		if ($menu != NULL) {
			if ($parentid > 0) {
				$option = $option . '----';
			}
			$data  = '';
			foreach ($menu as $key => $val) {
				$name_parent = $this->db->table('tbl_category')->select('name')->where(array('id' => $val['parentid']));
				$data .= '<tr class="tr' . $val['id'] . '">
				<td class="text-center"><input type="checkbox" name="foo" class="checkbox" value="' . $val['id'] . '"></td>
				<td>
					<a class="text-dark" href="' . ADMIN_CONSCATE_URL . 'edit/' . $val['id'] . '">';
				if ($parentid > 0) {
					$data .= $option;
				}
				$data .= $val['name'] . '</a>
				</td>
				<td class="text-center">' . date('d/m/Y', strtotime($val['created_at'])) . '</td>
				<td width="100" class="text-center">
					<input onkeyup="changeSort(this,' . $val['id'] . ');" type="text" class="form-control text-center" id="sort' . $val['id'] . '"  value="' . $val['sort'] . '" data-control="constructionCategories">
				</td>
				<td class="text-center">
					<div class="checkbox checkbox-info">
						<input onchange="changeglobal(' . $val['id'] . ',\'publish\');"';
				if ($val['publish'] == 1) {
					$data .= 'checked ';
				}
				$data .= 'type="checkbox" name="publish" class="publish' . $val['id'] . '" id="publish' . $val['id'] . '" value="1" data-control="constructionCategories">
						<label for="publish' . $val['id'] . '"></label>
					</div>
				</td>
				<td class="text-center">
					<div class="checkbox checkbox-info box-check-left">
						<input onchange="changeglobal(' . $val['id'] . ',\'home\');"';
				if ($val['home'] == 1) {
					$data .= 'checked ';
				}
				$data .= 'type="checkbox" name="home" id="home' . $val['id'] . '" class="home' . $val['id'] . '" value="1" data-control="constructionCategories">
						<label for="home' . $val['id'] . '">Home</label>
					</div>
					<div class="checkbox checkbox-info box-check-left">
						<input onchange="changeglobal(' . $val['id'] . ',\'left\');"';
				if ($val['left'] == 1) {
					$data .= 'checked ';
				}
				$data .= 'type="checkbox" name="left" id="left' . $val['id'] . '" class="left' . $val['id'] . '" value="1" data-control="constructionCategories">
						<label for="left' . $val['id'] . '">&nbsp;&nbsp; Left</label>
					</div>
					<div class="checkbox checkbox-info box-check-left">
						<input id="right' . $val['id'] . '" onchange="changeglobal(' . $val['id'] . ',\'right\');"';
				if ($val['right'] == 1) {
					$data .= 'checked ';
				}
				$data .= 'type="checkbox" name="right" class="right' . $val['id'] . '" value="1" data-control="constructionCategories">
						<label for="right' . $val['id'] . '">Right</label>
					</div>
					<div class="checkbox checkbox-info box-check-left">
					<input id="hot' . $val['id'] . '" onchange="changeglobal(' . $val['id'] . ',\'hot\');"';
				if ($val['hot'] == 1) {
					$data .= 'checked ';
				}
				$data .= 'type="checkbox" name="hot" class="right' . $val['id'] . '" value="1" data-control="constructionCategories">
						<label for="hot' . $val['id'] . '">&nbsp;&nbsp; Hot</label>
					</div>
				</td>
				<td class="text-center">
					<a href="' . ADMIN_CONSCATE_URL . 'edit/' . $val['id'] . '" class="btn btn-info btn-sm"> <i class="icon-note"></i> </a>
					<a href="javascript:void(0)" onclick="del(' . $val['id'] . ')" class="btn btn-danger btn-sm" id="delete' . $val['id'] . '" data-control = "constructionCategories"><i class="icon-trash"></i></a>
				</td>
				</tr>';
				$data .= $this->showConstructionCate($val['id'], $option);
			}
		}
		return $data;
	}
	function change_format_date($date = NULL){
        $array = explode('/',$date);
        return $array[2].'-'.$array[1].'-'.$array[0];
    }

	function pagination($page,$total_rows){
        $page_link = '';
        $prev_link ='';
        $next_link ='';
        if ($total_rows > 0) {
            if ($total_rows > 5) 
                {
                    if ($page < 3) 
                    {
                        for ($i=1; $i <= 3 ; $i++) { 
                            $page_array[] = $i;
                        }
                        $page_array[] = '...';
                        $page_array[] = $total_rows;
                    }
                    else
                    {
                        $end_limit = $total_rows - 3;
                        if ($page > $end_limit) 
                        {
                            $page_array[] = 1;
                            $page_array[] = '...';
                            for ($i= $end_limit; $i <= $total_rows; $i++) 
                            { 
                                $page_array[] = $i;
                            }
                        }
                        else
                        {
                        $page_array[] = 1;
                        $page_array[] = '...';
                            for ($i = $page; $i <= $page + 1 ; $i++) { 
                                $page_array[] = $i;
                            }
                            $page_array[] = '...';
                            $page_array[] = $total_rows;
                        }
                    }
                }
                else
                {
                    for ($i= 1; $i <= $total_rows; $i++) { 
                        $page_array[] = $i;
                    }
                }

                for ($i=0; $i < count($page_array); $i++) { 
                    if ($page == $page_array[$i]) {
                        $page_link .= '<li class="paginate_button page-item active">
                            <a href="javascript:void(0)" class="page-link active disabled" num-page ="'.$page_array[$i].'">'.$page_array[$i].'</a>
                        </li>';
                        $prev_id = $page_array[$i] - 1;
                        if ($prev_id <= 0) {
                            $prev_link .= '<li class="paginate_button page-item disabled">
                                <a href="javascript:void(0)" class="page-link disabled">Previous</a>
                            </li>';
                        }
                        else{
                            $prev_link .= '<li class="paginate_button page-item">
                                <a href="javascript:void(0)" class="page-link" num-page="'.$prev_id.'">Previous</a>
                            </li>';
                        }
                        $next_id = $page_array[$i] + 1;
                        if ($next_id > $total_rows) {
                            $next_link .= '<li class="paginate_button page-item disabled">
                                <a href="javascript:void(0)" class="page-link disabled">Next</a>
                            </li>';
                        }
                        else{
                            $next_link .= '<li class="paginate_button page-item">
                                <a href="javascript:void(0)" class="page-link" num-page="'.$next_id.'">Next</a>
                            </li>';
                        }
                    }
                    else{
                        if ($page_array[$i] == '...') {
                            $page_link .= '<li class="paginate_button page-item disabled">
                                <a href="javascript:void(0)" class="page-link  disabled">...</a>
                            </li>';
                        }
                        else
                        {
                            $page_link .= '<li class="paginate_button page-item">
                                <a href="javascript:void(0)" class="page-link" num-page ="'.$page_array[$i].'">'.$page_array[$i].'</a>
                            </li>';
                        }
                    }
                }
        }
        return $prev_link.$page_link.$next_link;
    }
	function generateRandomString($length = 5){
		$string = '0123456789';
		$strlen = strlen($string);
		$string_rand = '';
		for ($i= 0; $i < $length; $i++) { 
			$string_rand .= $string[rand(0,$strlen - 1)];
		}
		return $string_rand;
	}
	function checkFormat($myString){
       
        if (DateTime::createFromFormat('d/m/Y', $myString) !== false) {
            return [
				'status'	=> 1,
				'string'	=> $myString
			];
        }
		else{
			return [
				'status'	=> 2,
				'string'	=> 'Ngày tháng năm sinh nhập sai định dạng. Ví dụ: 21/05/1990'
			];
		}
    }
	//xóa html trong nội dung
	function rip_tags($string, $character_limiter = 100) {
	    // ----- remove HTML TAGs -----
	    $string = preg_replace ('/<[^>]*>/', ' ', $string);
	   
	    // ----- remove control characters -----
	    $string = str_replace("\r", '', $string);    // --- replace with empty space
	    $string = str_replace("\n", ' ', $string);   // --- replace with space
	    $string = str_replace("\t", ' ', $string);   // --- replace with space
	   
	    // ----- remove multiple spaces -----
	    $string = trim(preg_replace('/ {2,}/', ' ', $string));
	    $string = character_limiter($string, $character_limiter);
	    return $string;
	}
}
