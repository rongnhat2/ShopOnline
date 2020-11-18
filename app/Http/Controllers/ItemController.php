<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Hash;
use DB;

class ItemController extends Controller
{
    public function index(){
    	$items = DB::table('items')->get();
            // ->leftjoin('image', 'carousel.image_id', '=', 'image.id')
        return view('admin.item.index', compact('items', 'categories'));
    }
    public function create(){
    	$categories = DB::table('categories')->get();
        return view('admin.item.add', compact('categories'));
    }
    public function store(Request $request){
    	$category = ($request->category == null) ? '0' : $request->category;
    	$sex = ($request->sex == null) ? '3' : $request->sex;
    	$discount = ($request->discount == null) ? '0' : $request->discount;
        try {
            DB::beginTransaction();

	        $id = DB::table('items')->insertGetId ([
                'category_id' 		=> $category,
                'image_id' 			=> $request->image_id,
                'name' 				=> $request->name,
                'price' 			=> $request->price,
                'discount' 			=> $discount,
                'detail' 			=> $request->detail,
                'description' 		=> $request->description,
                'sex' 				=> $sex,
                'view' 				=> '0',
                'slug'              => static::to_slug($request->name),
                "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
                "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            ]);

            Session::flash('success', 'Tạo Thành Công : ' . $request->name);
            DB::commit();
            return redirect()->route('item.index');
        } catch (\Exception $exception) {
            dd($exception);
            Session::flash('error', 'Lỗi tạo mới');
            return redirect()->route('item.index');
            DB::rollBack();
        }
    }
    public function edit($id){
    	$item = DB::table('items')
            ->leftjoin('image', 'items.image_id', '=', 'image.id')
            ->where('items.id', '=', $id)
            ->select('image.image_url as image_url', 'items.*')->first();
    	$categories = DB::table('categories')->get();
	    // dd($blog);
        return view('admin.item.edit', compact('item', 'categories'));
    }
    public function update(Request $request, $id){
    	// dd($c_id);
    	$category = ($request->category == null) ? '0' : $request->category;
    	$sex = ($request->sex == null) ? '3' : $request->sex;
    	$discount = ($request->discount == null) ? '0' : $request->discount;
        try {
            DB::beginTransaction();

	        DB::table('items')->where('id', '=', $id)->update ([
                'category_id' 		=> $category,
                'image_id' 			=> $request->image_id,
                'name' 				=> $request->name,
                'price' 			=> $request->price,
                'discount' 			=> $discount,
                'detail' 			=> $request->detail,
                'description' 		=> $request->description,
                'sex' 				=> $sex,
                'slug'              => static::to_slug($request->name),
                "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
                "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            ]);

            Session::flash('success', 'Cập Nhật Thành Công : ' . $request->name);
            DB::commit();
            return redirect()->back();
        } catch (\Exception $exception) {
            dd($exception);
            Session::flash('error', 'heroku chỉ lưu ảnh trong thời gian ngắn nên chút nữa nó sẽ mất đó nhé :>');
            return redirect()->back();
            DB::rollBack();
        }
    }
    public function delete($id){
    	try {
            DB::beginTransaction();

	        DB::table('item_image')->where('item_image.item_id', '=', $id)->delete();

	        DB::table('item_style')->where('item_id', $id)->delete();
	        DB::table('item_property')->where('item_id', $id)->delete();
	        DB::table('item_composition')->where('item_id', $id)->delete();
	        DB::table('item_size')->where('item_id', $id)->delete();
	        DB::table('item_color')->where('item_id', $id)->delete();

	        DB::table('items')->where('items.id', '=', $id)->delete();

            Session::flash('success', 'Xóa Thành Công');
            DB::commit();
            return redirect()->route('item.index');
        } catch (\Exception $exception) {
            dd($exception);
            Session::flash('error', 'heroku chỉ lưu ảnh trong thời gian ngắn nên chút nữa nó sẽ mất đó nhé :>');
            return redirect()->route('item.index');
            DB::rollBack();
        }
    }

    public function createCopy($id){
    	$styles = DB::table('styles')->get();
    	$properties = DB::table('properties')->get();
    	$compositions = DB::table('compositions')->get();
    	$sizes = DB::table('sizes')->get();
    	$colors = DB::table('colors')->get();

        $getAllStyleOf = DB::table('item_style')->where('item_id', $id)->pluck('style_id');
        $getAllPropertyOf = DB::table('item_property')->where('item_id', $id)->pluck('property_id');
        $getAllCompositionOf = DB::table('item_composition')->where('item_id', $id)->pluck('composition_id');
        $getAllSizeOf = DB::table('item_size')->where('item_id', $id)->pluck('size_id');
        $getAllColorOf = DB::table('item_color')->where('item_id', $id)->pluck('color_id');

        // dd($getAllCompositionOf);
        return view('admin.item.list', compact('id', 'styles', 'properties', 'compositions', 'sizes', 'colors', 'getAllStyleOf', 'getAllPropertyOf', 'getAllCompositionOf', 'getAllSizeOf', 'getAllColorOf'));
    }
    public function storeCopy(Request $request, $id){
    	// dd($request);
    	try {
	    	DB::table('item_style')->where('item_style.item_id', '=', $id)->delete();
	    	DB::table('item_property')->where('item_property.item_id', '=', $id)->delete();
	    	DB::table('item_size')->where('item_size.item_id', '=', $id)->delete();
	    	DB::table('item_color')->where('item_color.item_id', '=', $id)->delete();
	    	DB::table('item_composition')->where('item_composition.item_id', '=', $id)->delete();

	    	if ($request->style != null) {
		    	foreach ($request->style as $key => $value) {
		            DB::table('item_style')->insert([
		                'item_id'              =>  $id,
		                'style_id'              =>  $value,
		                "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
		                "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
		            ]);
		    	} 
	    	}
	    	if ($request->property != null) {
		    	foreach ($request->property as $key => $value) {
		            DB::table('item_property')->insert([
		                'item_id'              =>  $id,
		                'property_id'              =>  $value,
		                "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
		                "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
		            ]);
		    	} 
	    	}
	    	if ($request->composition != null) {
		    	foreach ($request->composition as $key => $value) {
		            DB::table('item_composition')->insert([
		                'item_id'              =>  $id,
		                'composition_id'              =>  $value,
		                "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
		                "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
		            ]);
		    	} 
	    	}
	    	if ($request->size != null) {
		    	foreach ($request->size as $key => $value) {
		            DB::table('item_size')->insert([
		                'item_id'              =>  $id,
		                'size_id'              =>  $value,
		                "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
		                "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
		            ]);
		    	} 
	    	}
	    	if ($request->color != null) {
		    	foreach ($request->color as $key => $value) {
		            DB::table('item_color')->insert([
		                'item_id'              =>  $id,
		                'color_id'              =>  $value,
		                "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
		                "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
		            ]);
		    	} 
	    	}

            return redirect()->route('item.list', compact('id'));
    	} catch (\Exception $exception) {
            // dd($exception);
            Session::flash('error', 'Lỗi cập nhật');
            return redirect()->route('item.list', compact('id'));
            DB::rollBack();
        }
    }

    public function createImage($id){
    	$images = DB::table('item_image')
	    	->leftjoin('image', 'item_image.image_id', '=', 'image.id')
	    	->where('item_id', $id)
            ->select('item_image.*', 'image.image_url')
	    	->get();
        return view('admin.item.image', compact('id', 'images'));
    }
    public function storeImage(Request $request, $id){

    	try {
            DB::beginTransaction();

            DB::table('item_image')->insert([
                'item_id'               => $id,
                'image_id'               => $request->image_id,
                "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
                "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            ]);

            Session::flash('success', 'Thêm Thành Công');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $exception) {
            dd($exception);
            Session::flash('error', 'heroku chỉ lưu ảnh trong thời gian ngắn nên chút nữa nó sẽ mất đó nhé :>');
            return redirect()->back();
            DB::rollBack();
        }

    }

    public function storeImageDelete($id, $c_id){
    	try {
            DB::beginTransaction();

	        DB::table('item_image')
		    	->where('item_image.item_id', '=', $id)
		    	->where('item_image.image_id', '=', $c_id)
		    	->delete();

            Session::flash('success', 'Xóa Thành Công');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $exception) {
            dd($exception);
            Session::flash('error', 'heroku chỉ lưu ảnh trong thời gian ngắn nên chút nữa nó sẽ mất đó nhé :>');
            return redirect()->back();
            DB::rollBack();
        }
    }

    public function to_slug($string){

        $str = trim(mb_strtolower($string));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);

        return $str;
    }
}
