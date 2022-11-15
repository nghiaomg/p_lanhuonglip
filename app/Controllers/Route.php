<?php

namespace App\Controllers;

use App\Models\AliasModels;
use App\Models\CI_function;
use App\Models\MenuModels;
use App\Models\CategoryModels;
use App\Models\UserModels;
use App\Models\AdminModels;
use App\Models\NewsModels;
use App\Models\NewscategoryModels;
use App\Models\BranchModels; 
use App\Models\SubMenuModels; 
use App\Models\BrandModels; 
use App\Models\ProductModels; 
use App\Models\PriceModels; 
use App\Models\StatusProductModels; 
use App\Models\PhotoProductModels;
use App\Models\ProductcolorModels;  
use App\Models\ProductvideoModels;
use App\Models\CommunityModels;
use App\Models\ProductinfoModels;
use App\Models\ProductingreModels;
use App\Models\ProductSloganModel;
use App\Models\QuangcaoModels;
use App\Models\ContentsModels;
class Route extends BaseController
{
    public $path_dir_admin = 'uploads/images/admin/';
    public const CONST_PER = 6;
    public function __construct()
    {
        $this->AliasModels         = new AliasModels();
        $this->CI_function         = new CI_function();
        $this->CategoryModels      = new CategoryModels();
        $this->MenuModels          = new MenuModels();
        $this->UserModels          = new UserModels();
        $this->AdminModels         = new AdminModels();
        $this->NewsModels          = new NewsModels();
        $this->SubMenuModels       = new SubMenuModels();
        $this->BrandModels         = new BrandModels();
        $this->ProductModels       = new ProductModels();
        $this->PriceModels         = new PriceModels();
        $this->StatusProductModels = new StatusProductModels();
        $this->PhotoProductModels  = new PhotoProductModels();
        $this->ProductcolorModels  = new ProductcolorModels();
        $this->ProductvideoModels  = new ProductvideoModels();
        $this->CommunityModels     = new CommunityModels();
        $this->ProductinfoModels   = new ProductinfoModels();
        $this->ProductingreModels  = new ProductingreModels();
        $this->ContentsModels      = new ContentsModels();
        $this->ProductSloganModel  = new ProductSloganModel();
        $this->QuangcaoModels      = new QuangcaoModels();
        $this->NewscategoryModels  = new NewscategoryModels();
        $this->db                  = \Config\Database::connect('default');
    }

    public function index($alias)
    {
        
        $checkScreen = $this->checkIsMobileScreen();
        $data = $this->AliasModels->select_row('*', array('alias' => $alias));
        if ($data != NULL) {
            //Check for show news page
            if ($data['type'] == 1) {
                $result = $this->cate_news($data['alias']);
                $result['template'] = 'frontend/news/index';
            }
            if ($data['type'] == 4) {
                $result = $this->news($data['alias']);
                $result['template'] = 'frontend/news/detail';
            }
            if ($data['type'] == 3) {
                $result = $this->cate_product($data['alias']);
                $result['template'] = 'frontend/product/index';
            } 
            if ($data['type'] == 5) {
                $result = $this->product($data['alias']);
                $result['template'] = 'frontend/product/detail';
            } 
        } else {
            return redirect()->to(base_url('page-404.html'));
        }
        return view('frontend/default', isset($result) ? $result : []);
    }

    // Show news page in user page
   // Danh mục bài viết
	public function cate_news($alias){
        $data['data_index'] = $this->get_index();
        $menuInfo = $this->db->table('tbl_category')->select('id, name, alias, title, meta_keywords, meta_descriptions, des, content')->where(array('alias'=>$alias))->get()->getRowArray();
        $arrayCateID = $this->CI_function->getListMenuId($menuInfo['id']);
        // var_dump($arrayCateID);die;
        // lấy danh mục con
        $cateChilds = $this->CategoryModels->select_array('id, name, alias, title',['publish' => 1,'parentid' => $menuInfo['id']],'sort asc');
        // get news new list
        if(count($arrayCateID) > 1){
            $newsNews = $this->NewsModels->selectArray('id, name, alias, des, title, image, thumb',['publish' => 1],'id desc', 0, 5, NULL, 'cateid', $arrayCateID);
        }else{
            $newsNews = $this->NewsModels->selectArray('id, name, alias, des, title, image, thumb',['publish' => 1, 'cateid' => $menuInfo['id']],'id desc', 0, 5);
        }

        if($cateChilds == NULL){ 
            $getNewsID = $this->NewscategoryModels->selectArray('newsID',['cateID' => $menuInfo['id']]);
            $newsIDArr = $this->formatArrNewsID($getNewsID);

            $options = array('tbl_news.publish' => 1);
            
            //config paging
            if(count($newsIDArr) > 1){
                $totalRow = $this->NewsModels->selectCount($options, NULL, 'id', $newsIDArr);
            }else{
                $options = array_merge($options, ['tbl_news.cateid' => $menuInfo['id']]);
                $totalRow = $this->NewsModels->selectCount($options);
            }
            
            $page = 1;
            if($_GET['page']){
                $page = $_GET['page'];
            }
            $limit = 12;
            $start = ($page * $limit) - $limit;
            $numPage = ceil($totalRow / $limit);

            $builder = $this->db->table('tbl_news');
            $builder->select(
                'tbl_news.*'
            );
            $builder->where($options);
            if(count($newsIDArr) > 1){
                $builder->whereIn('tbl_news.id', $newsIDArr);
            }
            $builder->limit($limit, $start);
            $builder->orderBy('id desc');
            $query = $builder->get();
            //echo $this->db->getLastQuery();
            $datas = $query->getResult('array');
        }else{
            foreach ($cateChilds as $key_cateChild => $val_cateChild) {
                $getNewsID = $this->NewscategoryModels->selectArray('newsID',['cateID' => $val_cateChild['id']]);
                $newsIDArr = $this->formatArrNewsID($getNewsID);
                if(count($newsIDArr) > 0){
                    $cateChilds[$key_cateChild]['news'] = $this->NewsModels->selectArray('id, name, alias, title, thumb, created_at',['publish' => 1],'', 0, 8, NULL, 'id', $newsIDArr);
                }else{
                    $cateChilds[$key_cateChild]['news'] = $this->NewsModels->selectArray('id, name, alias, title, thumb, created_at',['publish' => 1, 'cateid'   => $val_cateChild['id']],'', 0, 8);
                }
            }
        }
		
        
		$data['datas']   	 = $datas;
		$data['path_dir'] 	 = 'uploads/images/news/';
		$data['alias']		 = $alias;
        $data['content'] 	 = $menuInfo['content'];
        $data['cate_name']   = $menuInfo['name'];
        $data['cate_des']   = $menuInfo['des'];
        $data['cateID']   = $menuInfo['id'];
        $data['title'] 		 = $menuInfo['title']==''?$menuInfo['name']:$menuInfo['title'];
        $data['keyword'] 	 = $menuInfo['meta_keywords'];
        $data['description'] = $menuInfo['meta_descriptions'];
        $data['image'] 		 = $data['data_index']['imageShare'];
		$data['thumb']    	 = $menuInfo['thumb'];
		$data['og_image']    = 'uploads/images/menuNews/'.$menuInfo['thumb']; 
        $data['CI_function'] = $this->CI_function;
        $data['cateChilds']  = $cateChilds;
        //
        $data['newsNews']  = $newsNews;
        // 
        $data['totalRow']  = $totalRow;
        $data['numPage']  = $numPage;
        $data['limit']  = $limit;
        return $data;
    }



    // Show detail a news
    function news($alias)
    {
        $data['data_index'] = $this->get_index();
        $options = array('tbl_news.publish' => 1, 'tbl_news.alias' => $alias);
		$builder = $this->db->table('tbl_news');
		$builder->select(
			'tbl_news.*'
		);
		$builder->where($options);
		$query = $builder->get();
		// echo $this->db->getLastQuery();
		$dataRow = $query->getRowArray();

        //prev post
        $prevPost = $this->NewsModels->findOne('id, alias',['id <' => $dataRow['id'], 'publish' => 1],'id desc');
        //next post
        $nextPost = $this->NewsModels->findOne('id, alias',['id >' => $dataRow['id'], 'publish' => 1],'id asc');

        // relates
        $getCateID = $this->NewscategoryModels->selectArray('cateID',['newsID' => $dataRow['id']]);
        $cateIDArr = $this->formatArrCateID($getCateID);
        $relates = $this->NewsModels->selectArray('id, name, alias, title, thumb, created_at',['publish' => 1],'', 0, 12, NULL, 'cateid', $cateIDArr);
        // get cate list
        $cates = NULL;
        if($cateIDArr != NULL){
            foreach ($cateIDArr as $key_cateID => $val_cateIDArr) {
                $cateRow = $this->CategoryModels->findOne('id, name, alias',['id' => $val_cateIDArr],'id desc');
                if($cateRow != NULL){
                    $cates[] = array(
                        'name'  => $cateRow['name'],
                        'alias' => $cateRow['alias'],
                    );
                }
            }
        }

        //================
        $data['path_dir'] = 'uploads/images/news/';
        $data['dataRow'] = $dataRow;
        $data['alias'] = $alias;
        $data['title'] = $dataRow['title'];
        $data['keyword'] = $dataRow['meta_keywords'];
        $data['description'] = $dataRow['meta_descriptions'];
        $data['image'] = $data['data_index']['imageShare'];
        $data['thumb'] = $dataRow['thumb'];
        $data['og_image'] = 'uploads/images/news/' . $dataRow['thumb'];
        //
        $data['prevPost'] = $prevPost;
        $data['nextPost'] = $nextPost;
        //
        $data['cates'] = $cates;
        $data['relates'] = $relates;
        return $data;
    }
    // Sản phẩm 
    public function cate_product($alias)
    {
        $data['data_index'] = $this->get_index();
        $menuInfo = $this->db->table('tbl_category')->select('id, name, alias, title, meta_keywords, meta_descriptions, content, parentid')->where(array('alias'=>$alias))->get()->getRowArray();
        $arrayCateID = $this->CI_function->getListMenuId($menuInfo['id']);
        // var_dump($arrayCateID);die;

        $options = array('tbl_product.publish' => 1);
        if($arrayCateID != NULL && count($arrayCateID) == 1){
            $options = array_merge($options, ['cateid' => $menuInfo['id']]); 
        }
		//config paging
        if($arrayCateID != NULL && count($arrayCateID) > 1){
            $totalRow = $this->ProductModels->selectCount($options, NULL, 'cateid', $arrayCateID);
        }else{
		    $totalRow = $this->ProductModels->selectCount($options);
        }
		$page = 1;
		if($_GET['page']){
			$page = $_GET['page'];
		}
		$limit = 8;
		$start = ($page * $limit) - $limit;
		$numPage = ceil($totalRow / $limit);

		$builder = $this->db->table('tbl_product');
		$builder->select(
			'tbl_product.*'
		);
		$builder->where($options);
        if($arrayCateID != NULL && count($arrayCateID) > 1){
            $builder->whereIn('cateid', $arrayCateID);
        }
		$builder->limit($limit, $start);
		$builder->orderBy('id desc');
		$query = $builder->get();
		//echo $this->db->getLastQuery();
		$datas = $query->getResult('array');
        // var_dump($datas);die;

        //
        $breadcrumbs = $this->createBreadcrumbProduct($menuInfo['parentid'], NULL);
        if($breadcrumbs != NULL){
            $breadcrumbs = array_reverse($breadcrumbs);
        }


        
        //=============
        $data['catecontent']    = $menuInfo['content'];
        $data['menuInfo']    = $menuInfo;
        $data['path_dir']    = 'uploads/images/product/'; 
        $data['product']     = $product;
        $data['alias']       = $alias; 
        $data['name']        = $menuInfo['name']; 
        $data['title']       = $menuInfo['title'] != "" ? $menuInfo['title'] : $menuInfo['name'] ;
        $data['keyword']     = $menuInfo['meta_keywords'] != "" ? $menuInfo['meta_keywords'] : $menuInfo['name'] ;
        $data['description'] = $menuInfo['meta_descriptions'] != "" ? $menuInfo['meta_descriptions'] : $menuInfo['name'] ;
        $data['datas']       = $datas;
        $data['breadcrumbs'] = $breadcrumbs;
        // paging
        $data['numPage']     = $numPage;
        return $data;
    }

    // Chi tiết sản phẩm 
    public function product($alias)
    {
        $data['data_index'] = $this->get_index();
        $options = array('tbl_product.publish' => 1, 'tbl_product.alias' => $alias);
		$builder = $this->db->table('tbl_product');
		$builder->select(
			'tbl_product.*'
		);
		$builder->where($options);
		$query = $builder->get();
		// echo $this->db->getLastQuery();
		$dataRow = $query->getRowArray();

        //
        $infoorthers = json_decode($dataRow['info_orther'],true);
        $productInfos = NULL;
        if($infoorthers != NULL){
            foreach ($infoorthers as $key_infoorther => $val_infoorther) {
                $productInfoRow = $this->ProductinfoModels->findOne('name, thumb', ['id' => $val_infoorther]);
                if($productInfoRow != NULL){
                    $productInfos[] = array(
                        'name' => $productInfoRow['name'],
                        'thumb'  => $productInfoRow['thumb']
                    );
                }
            }
        }

        // get photos
        $photoProducts = $this->PhotoProductModels->select_array('id, thumb',['ProductID' => $dataRow['id']],'id asc');
        // get colors
        $colorProducts = $this->ProductcolorModels->select_array('*',['productID' => $dataRow['id'], 'publish' => 1],'sort asc, id asc');
        // get video
        $videoTopProducts = $this->ProductvideoModels->select_array('*',['productID' => $dataRow['id'], 'top' => 1, 'publish' => 1],'sort asc, id asc');
        $videoBottomProducts = $this->ProductvideoModels->select_array('*',['productID' => $dataRow['id'], 'publish' => 1, 'bottom' => 1],'sort asc, id asc');
        $ingreProducts = $this->ProductingreModels->select_array('*',['productID' => $dataRow['id'], 'publish' => 1],'sort asc, id asc');
        $communities = $this->CommunityModels->select_array('*',['productID' => $dataRow['id'], 'publish' => 1],'sort asc, id asc');

        $ingredientContentJson = $this->ContentsModels->findOne('id, content', ['key' => 'ingredient_content']);
		if($ingredientContentJson != NULL){
			$ingredientContent = json_decode($ingredientContentJson['content'], true);
		}


        $arrayCateID = $this->CI_function->getListMenuId($dataRow['cateid']);
        $optionRelates = array('tbl_product.publish' => 1, 'tbl_product.id !=' => $dataRow['id']);
        if($arrayCateID != NULL && count($arrayCateID) == 1){
            $optionRelates = array_merge($optionRelates, ['tbl_product.cateid' => $dataRow['cateid']]); 
        }
		//config paging
        if($arrayCateID != NULL && count($arrayCateID) > 1){
            $totalRow = $this->ProductModels->selectCount($optionRelates, NULL, 'cateid', $arrayCateID);
        }else{
		    $totalRow = $this->ProductModels->selectCount($optionRelates);
        }
		$page = 1;
		if($_GET['page']){
			$page = $_GET['page'];
		}
		$limit = 16;
		$start = ($page * $limit) - $limit;
		$numPage = ceil($totalRow / $limit);

		$builderRelate = $this->db->table('tbl_product');
		$builderRelate->select(
			'tbl_product.*'
		);
		$builderRelate->where($optionRelates);
        if($arrayCateID != NULL && count($arrayCateID) > 1){
            $builderRelate->whereIn('cateid', $arrayCateID);
        }
		$builderRelate->limit($limit, $start);
		$builderRelate->orderBy('id desc');
		$queryRelate = $builderRelate->get();
		// echo $this->db->getLastQuery();
		$dataRelates = $queryRelate->getResult('array');
        // var_dump($dataRelates);die;

        $cateInfo = $this->CategoryModels->findOne('id, name, alias', ['id' => $dataRow['cateid']]);

        //
        if($dataRow['cateid'] > 0){
            $breadcrumbs = $this->createBreadcrumbProduct($dataRow['cateid'], NULL);
            if($breadcrumbs != NULL){
                $breadcrumbs = array_reverse($breadcrumbs);
            }
        }
        
        //===========/ data ================
        $data['productSames']   = $productSame;
        $data['CI_function']    = $this->CI_function;
        $data['cateInfo']       = $cateInfo;
        $data['alias']          = $dataRow['alias'];
        $data['title']          = $dataRow['title'];
        $data['keyword']        = $dataRow['meta_keywords'];
        $data['description']    = $dataRow['meta_descriptions'];
        $data['thumb']    		= 'uploads/images/product/' . $productInfo['thumb'];
        $data['og_image']    	= 'uploads/images/product/' . $productInfo['thumb'];
        $data['dataRow']        = $dataRow;
        $data['photoProducts']  = $photoProducts;
        $data['colorProducts']  = $colorProducts;
        $data['videoTopProducts']  = $videoTopProducts;
        $data['videoBottomProducts']  = $videoBottomProducts;
        $data['ingredientContent']  = $ingredientContent;
        $data['ingreProducts']  = $ingreProducts;
        $data['communities']    = $communities;
        $data['dataRelates']    = $dataRelates;
        $data['productInfos']   = $productInfos;
        $data['breadcrumbs']    = $breadcrumbs;
        // paging
        $data['numPage']     = $numPage;
        //
        $data['path_dir_color'] = 'uploads/images/productcolor/';
        $data['path_dir_product'] = 'uploads/images/product/';
        return $data;
    }

    function trip_tags($string, $character_limiter = 100)
	{
		// ----- remove HTML TAGs -----
		$string = preg_replace('/<[^>]*>/', ' ', $string);
		// ----- remove control characters -----
		$string = str_replace("\r", '', $string);    // --- replace with empty space
		$string = str_replace("\n", ' ', $string);   // --- replace with space
		$string = str_replace("\t", ' ', $string);   // --- replace with space
		// ----- remove multiple spaces -----
		$string = trim(preg_replace('/ {2,}/', ' ', $string));
		$string = character_limiter($string, $character_limiter);
		return $string;
	}
    // Tìm kiếm
	public function search()
	{
		$data['data_index'] = $this->get_index();
		$sort = "id DESC";
		if(isset($_POST['alias']) && $_POST['alias'] != "")
		{
			$alias = $_POST['alias'];
		}
		$keyword = "";
		if(isset($_GET['keyword']) && $_GET['keyword'] != "")
		{
			$keyword = $_GET['keyword'];
		}
		if($_POST['keyword'] != "")
		{
			$keyword = $_POST['keyword'];
		}
		if($_POST['sort'] == "az" )
		{
			$sort = "name ASC, id DESC";
		}
		if($_POST['sort'] == "za" )
		{
			$sort = "name DESC, id DESC";
		}
		if($_POST['sort'] == "asc" )
		{
			$sort = "price ASC, id DESC";
		}
		if($_POST['sort'] == "desc" )
		{
			$sort = "price DESC, id DESC";
		}
		$menuInfo = $this->CategoryModels->full_query(["get_row_array"  => "row","select"  => "*","where"	=> ['alias' => $alias]]);
		$arrayCateID = $this->CI_function->getListMenuId($menuInfo['id']);
		//========================
		$param_product  = [
			"select"    => "tbl_product.*,tbl_statusproduct.name as status_name, tbl_statusproduct.color as  status_color ",
			"where"	    => ['tbl_product.publish' => 1],
			"like"      => [                
							  ["column" => "tbl_product.name", "value"=> $keyword]
						   ],
			"join"      => [
							  ["join_table" => 'tbl_statusproduct',"query_join"=> 'tbl_product.status = tbl_statusproduct.id',"type" => 'LEFT']
						   ],
			"orderby"   => $sort			   
			];
		if ($arrayCateID != NULL) { 
			$rs_query      = $this->ProductModels->full_query($param_product);
			$total_rows    = count($rs_query); 
            $num_perpage   = 12;
            $total_page    = ceil($total_rows/$num_perpage);
            $number_button = 5;
            $page          = isset($_POST['page']) ? (int)$_POST['page'] : 1;
            $page_click    = $page;
            $page     =($page > $total_page)?$total_page:$page;
            $page     = ($page < 1)?1:$page;
            $page     = $page - 1;
            $start    = $page * $num_perpage;
            $limit    = $num_perpage;
            $button_pagination = $this->CI_function->button_pagination($number_button, $total_rows, $num_perpage, $page_click);
            if ($total_rows > 0) {
				$param_product["limit"] = ["start" => $start, "limit" => $limit];
				$product = $this->ProductModels->full_query($param_product);
			}
        }
        else{
            $product = NULL;
        }

        // danh mục trái
		$cateLefts = $this->CategoryModels->select_array('id,name,alias', ['publish' => 1, 'left' => 1, 'type' => 3], 'sort asc,id desc');
        if($cateLefts != NULL){
            foreach ($cateLefts as $key_cateLefts => $val_cateLefts) {
                $childs = $this->CategoryModels->select_array('id,name,alias', ['publish' => 1, 'parentid' => $val_cateLefts['id']], 'sort asc,id desc');
                $cateLefts[$key_cateLefts]['childs'] = $childs;
            }
        }
        $data['cateLefts'] = $cateLefts;

        // banner quảng cáo
		$data['banners'] = $this->QuangcaoModels->select_array('id,name,thumb,link', NULL, 'sort asc,id desc', 0, 2);
		// ============
		$data['button_pagination'] = $button_pagination;
		$data['countProduct']      = $total_rows;
		$data['cateDesc']    = $menuInfo['des'];
		$data['menuInfo']    = $menuInfo;
		$data['path_dir']    = 'uploads/images/product/'; 
		$data['product']     = $product;
		$data['alias']       = $alias;
		$data['colSame']     = "col-sm-3 col-lg-2";
		$data['template']    = 'frontend/product/search';
		$data['title']       = 'Kết quả tìm kiếm' ;
        $data['keyword']     = 'Kết quả tìm kiếm' ;
        $data['description'] = 'Kết quả tìm kiếm' ;
		if (isset($_POST['loadAjax'])) {
			return view('frontend/product/samedata', isset($data)?$data : []);
		}
		return view('frontend/default', isset($data)?$data : []);
	} 
    private function formatArrCateID($arrayData)
	{
		$results = NULL;
		if($arrayData != NULL){
			foreach ($arrayData as $key => $val) {
				$results[] = $val['cateID'];
			}
		}
		return $results;
	}

    private function formatArrNewsID($arrayData)
	{
		$results = NULL;
		if($arrayData != NULL){
			foreach ($arrayData as $key => $val) {
				$results[] = $val['newsID'];
			}
		}
		return $results;
	}

    public function loadNews(){
        $numPage = 0;
        $page = $_POST['page'];
        $cateID = $_POST['cateID'];
        $limit = $_POST['limit'];
        $getNewsID = $this->NewscategoryModels->selectArray('newsID',['cateID' => $cateID]);
        $newsIDArr = $this->formatArrNewsID($getNewsID);
        $numPage = $page + 1;
        $start = ($numPage * $limit) - $limit;
        // var_dump($arrayCateID);die;
        // get news new list
        if(count($newsIDArr) > 1){
            $datas = $this->NewsModels->selectArray('id, name, alias, des, title, image, thumb',['publish' => 1],'id desc', $start, $limit, NULL, 'id', $newsIDArr);
        }else{
            $datas = $this->NewsModels->selectArray('id, name, alias, des, title, image, thumb',['publish' => 1, 'cateID' => $cateID],'id desc', $start, $limit);
        }
        
        // var_dump($datas);die;
		$data['datas'] = $datas;
        // 
        $data['numPage']  = $numPage;
        return view('frontend/news/loadNews', isset($data) ? $data : NULL);
    }
    public function createBreadcrumbProduct($cateID, $res = NULL){
        $dataRow = $this->CategoryModels->findOne('id, name, alias, parentid',['id' => $cateID, 'type' => 3]);
        if($dataRow != NULL){
            $res[] = array(
                'name'  => $dataRow['name'],
                'alias'  => $dataRow['alias'],
            );
            // die($dataRow['parentid']);
            if($dataRow['parentid'] != 0){
                return $this->createBreadcrumbProduct($dataRow['parentid'], $res);
            }
        }
        
        return $res;
    }
}
