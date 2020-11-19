<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Hash;
use DB;

class FrontController extends Controller
{
    /**
     * Show the user index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Carousel
        $carousel = DB::table('carousel')
            ->leftjoin('image', 'carousel.image_id', '=', 'image.id')
            ->select('image.image_url as image_url', 'carousel.*')
            ->orderBy('carousel.created_at', 'desc')
            ->get();

    	// Sản phẩm mới
        $items = DB::table('items')
            ->leftjoin('image', 'items.image_id', '=', 'image.id')
            ->select('image.image_url as image_url', 'items.*')
            ->orderBy('items.created_at', 'desc')
            ->take(10)
            ->get();

        // sản phẩm nhiều view nhất
        $best_items = DB::table('items')
            ->leftjoin('image', 'items.image_id', '=', 'image.id')
            ->select('image.image_url as image_url', 'items.*')
            ->orderBy('items.view', 'desc')
            ->take(5)
            ->get();

        // danh mục sản phẩm
        $categories = DB::table('categories')->get();

        // sản phẩm nổi bật
        $special_items = DB::table('items')
            ->leftjoin('image', 'items.image_id', '=', 'image.id')
            ->select('image.image_url as image_url', 'items.*')
            ->orderBy('items.view', 'desc')
            ->take(3)
            ->get();
       	foreach ($special_items as $key => $value) {
       		$value->style = DB::table('item_style')
           						->leftjoin('styles', 'item_style.style_id', '=', 'styles.id')
           						->where('item_id', $value->id)
           						->get();
       		$value->property = DB::table('item_property')
           						->leftjoin('properties', 'item_property.property_id', '=', 'properties.id')
           						->where('item_id', $value->id)
           						->get();
       		$value->composition = DB::table('item_composition')
           						->leftjoin('compositions', 'item_composition.composition_id', '=', 'compositions.id')
           						->where('item_id', $value->id)
           						->get();
       		$value->size = DB::table('item_size')
           						->leftjoin('sizes', 'item_size.size_id', '=', 'sizes.id')
           						->where('item_id', $value->id)
           						->get();
       		$value->color = DB::table('item_color')
           						->leftjoin('colors', 'item_color.color_id', '=', 'colors.id')
           						->where('item_id', $value->id)
           						->get();
       	}

        return view('user.index', compact('items', 'best_items', 'special_items', 'carousel', 'categories'));
    }

    /**
     * Function get data and Show the user product-detail..
     *
     * @return view product-detail
     */
    public function product_detail($slug){

        // danh mục sản phẩm
        $categories = DB::table('categories')->get();

        // Sản phẩm mới
        $items = DB::table('items')
            ->leftjoin('image', 'items.image_id', '=', 'image.id')
            ->select('image.image_url as image_url', 'items.*')
            ->orderBy('items.created_at', 'desc')
            ->take(10)
            ->get();

        // Sản phẩm được chọn
        $item = DB::table('items')
            ->leftjoin('image', 'items.image_id', '=', 'image.id')
            ->select('image.image_url as image_url', 'items.*')
            ->where('items.slug', '=', $slug)
            ->first();

        $item->style = DB::table('item_style')
                            ->leftjoin('styles', 'item_style.style_id', '=', 'styles.id')
                            ->where('item_id', $item->id)
                            ->get();
        $item->property = DB::table('item_property')
                            ->leftjoin('properties', 'item_property.property_id', '=', 'properties.id')
                            ->where('item_id', $item->id)
                            ->get();
        $item->composition = DB::table('item_composition')
                            ->leftjoin('compositions', 'item_composition.composition_id', '=', 'compositions.id')
                            ->where('item_id', $item->id)
                            ->get();
        $item->size = DB::table('item_size')
                            ->leftjoin('sizes', 'item_size.size_id', '=', 'sizes.id')
                            ->where('item_id', $item->id)
                            ->get();
        $item->color = DB::table('item_color')
                            ->leftjoin('colors', 'item_color.color_id', '=', 'colors.id')
                            ->where('item_id', $item->id)
                            ->get();
        $item->image = DB::table('item_image')
                            ->leftjoin('image', 'item_image.image_id', '=', 'image.id')
                            ->where('item_id', $item->id)
                            ->get();
        // dd($item->image[0]);
        // dd($item);

        return view('user.product-details', compact('items', 'item', 'categories'));
    }

    public function shop_list($slug){
        // danh mục sản phẩm
        $categories = DB::table('categories')->get();

        if ($slug == "nam") {
            // Tên danh mục
            $category_title = "Thời trang nam";
            // Sản phẩm
            $items = DB::table('items')
                ->leftjoin('image', 'items.image_id', '=', 'image.id')
                ->select('image.image_url as image_url', 'items.*')
                ->where('sex', '=', '1')
                ->get();
        }
        else if ($slug == "nu") {
            // Tên danh mục
            $category_title = "Thời trang nữ";
            // Sản phẩm
            $items = DB::table('items')
                ->leftjoin('image', 'items.image_id', '=', 'image.id')
                ->select('image.image_url as image_url', 'items.*')
                ->where('sex', '=', '2')
                ->get();
        }else if ($slug == "tat-ca-san-pham") {
            // Tên danh mục
            $category_title = "Tất cả sản phẩm";
            // Sản phẩm
            $items = DB::table('items')
                ->leftjoin('image', 'items.image_id', '=', 'image.id')
                ->select('image.image_url as image_url', 'items.*')
                ->get();
        }else{
            // Tên danh mục
            $category_title = DB::table('categories')
                ->where('slug', '=', $slug)
                ->first()->name;
            // Sản phẩm
            $items = DB::table('items')
                ->leftjoin('image', 'items.image_id', '=', 'image.id')
                ->select('image.image_url as image_url', 'items.*')
                ->leftjoin('categories', 'items.category_id', '=', 'categories.id')
                ->where('categories.slug', '=', $slug)
                ->get();
        }

        return view('user.shop-list', compact('categories', 'category_title', 'items'));
    }

    /**
     * Function get data and Show the user purchase..
     *
     * @return view purchase
     */
    public function purchase(){
        // danh mục sản phẩm
        $categories = DB::table('categories')->get();

        return view('user.purchase', compact('categories'));
    }

    /**
     * Function get data and Show the user login..
     *
     * @return view login
     */
    public function login(){
        return view('user.login');
    }
    /**
     * Function get data and Show the user register..
     *
     * @return view register
     */
    public function register(){
        return view('user.register');
    }
    /**
     * Function AJAX update view on click item.
     *
     * @return 
     */
    public function view(Request $request){
        $view =  DB::table('items')->where('id', $request->id)->first()->view;
        $view = $view + 1;
        DB::table('items')->where('id', $request->id)->update([
            'view' => $view,
            "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        return $view;
    }

}
