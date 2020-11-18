<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Hash;
use DB;

class ItemDescriptionController extends Controller
{
    // Danh mục
    public function indexCategory(){
        $categories = DB::table('categories')->get();
        return view('admin.item_description.indexCategory', compact('categories'));
    }
    public function storeCategory(Request $request){
    	try {
            DB::beginTransaction();
            DB::table('categories')->insert([
                'name'              =>  $request->name,
                'slug'              => static::to_slug($request->name),
                "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
                "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            ]);
            Session::flash('success', 'Thêm thành công');
            DB::commit();
            return redirect()->route('item_description.indexCategory');
        } catch (\Exception $exception) {
            // dd($exception);
            Session::flash('error', 'Đã có lỗi sảy ra, hãy thêm lại hình ảnh');
            return redirect()->route('item_description.indexCategory');
            DB::rollBack();
        }
    }
    public function deleteCategory($id){
        try {
            DB::beginTransaction();

            DB::table('categories')
                ->where('categories.id', '=', $id)
                ->delete();

            Session::flash('success', 'Xóa Thành Công');
            DB::commit();
            return redirect()->route('item_description.indexCategory');
        } catch (\Exception $exception) {
            dd($exception);
            Session::flash('error', 'heroku chỉ lưu ảnh trong thời gian ngắn nên chút nữa nó sẽ mất đó nhé :>');
            return redirect()->route('item_description.indexCategory');
            DB::rollBack();
        }
    }


    // Chất liệu
    public function indexComposition(){
        $compositions = DB::table('compositions')->get();
        return view('admin.item_description.indexComposition', compact('compositions'));
    }
    public function storeComposition(Request $request){
        try {
            DB::beginTransaction();
            DB::table('compositions')->insert([
                'name'              =>  $request->name,
                "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
                "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            ]);
            Session::flash('success', 'Thêm thành công');
            DB::commit();
            return redirect()->route('item_description.indexComposition');
        } catch (\Exception $exception) {
            // dd($exception);
            Session::flash('error', 'Đã có lỗi sảy ra, hãy thêm lại hình ảnh');
            return redirect()->route('item_description.indexComposition');
            DB::rollBack();
        }
    }
    public function deleteComposition($id){
        try {
            DB::beginTransaction();

            DB::table('compositions')
                ->where('compositions.id', '=', $id)
                ->delete();

            Session::flash('success', 'Xóa Thành Công');
            DB::commit();
            return redirect()->route('item_description.indexComposition');
        } catch (\Exception $exception) {
            dd($exception);
            Session::flash('error', 'heroku chỉ lưu ảnh trong thời gian ngắn nên chút nữa nó sẽ mất đó nhé :>');
            return redirect()->route('item_description.indexComposition');
            DB::rollBack();
        }
    }

    // Phong cách
    public function indexStyle(){
        $styles = DB::table('styles')->get();
        return view('admin.item_description.indexStyle', compact('styles'));
    }
    public function storeStyle(Request $request){
        try {
            DB::beginTransaction();
            DB::table('styles')->insert([
                'name'              =>  $request->name,
                "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
                "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            ]);
            Session::flash('success', 'Thêm thành công');
            DB::commit();
            return redirect()->route('item_description.indexStyle');
        } catch (\Exception $exception) {
            // dd($exception);
            Session::flash('error', 'Đã có lỗi sảy ra, hãy thêm lại hình ảnh');
            return redirect()->route('item_description.indexStyle');
            DB::rollBack();
        }
    }
    public function deleteStyle($id){
        try {
            DB::beginTransaction();

            DB::table('styles')
                ->where('styles.id', '=', $id)
                ->delete();

            Session::flash('success', 'Xóa Thành Công');
            DB::commit();
            return redirect()->route('item_description.indexStyle');
        } catch (\Exception $exception) {
            dd($exception);
            Session::flash('error', 'heroku chỉ lưu ảnh trong thời gian ngắn nên chút nữa nó sẽ mất đó nhé :>');
            return redirect()->route('item_description.indexStyle');
            DB::rollBack();
        }
    }

    // Thuộc tính
    public function indexProperty(){
        $properties = DB::table('properties')->get();
        return view('admin.item_description.indexProperty', compact('properties'));
    }
    public function storeProperty(Request $request){
        try {
            DB::beginTransaction();
            DB::table('properties')->insert([
                'name'              =>  $request->name,
                "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
                "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            ]);
            Session::flash('success', 'Thêm thành công');
            DB::commit();
            return redirect()->route('item_description.indexProperty');
        } catch (\Exception $exception) {
            // dd($exception);
            Session::flash('error', 'Đã có lỗi sảy ra, hãy thêm lại hình ảnh');
            return redirect()->route('item_description.indexProperty');
            DB::rollBack();
        }
    }
    public function deleteProperty($id){
        try {
            DB::beginTransaction();

            DB::table('properties')
                ->where('properties.id', '=', $id)
                ->delete();

            Session::flash('success', 'Xóa Thành Công');
            DB::commit();
            return redirect()->route('item_description.indexProperty');
        } catch (\Exception $exception) {
            dd($exception);
            Session::flash('error', 'heroku chỉ lưu ảnh trong thời gian ngắn nên chút nữa nó sẽ mất đó nhé :>');
            return redirect()->route('item_description.indexProperty');
            DB::rollBack();
        }
    }

    // Kích thước
    public function indexSize(){
        $sizes = DB::table('sizes')->get();
        return view('admin.item_description.indexSize', compact('sizes'));
    }
    public function storeSize(Request $request){
        try {
            DB::beginTransaction();
            DB::table('sizes')->insert([
                'name'              =>  $request->name,
                "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
                "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            ]);
            Session::flash('success', 'Thêm thành công');
            DB::commit();
            return redirect()->route('item_description.indexSize');
        } catch (\Exception $exception) {
            // dd($exception);
            Session::flash('error', 'Đã có lỗi sảy ra, hãy thêm lại hình ảnh');
            return redirect()->route('item_description.indexSize');
            DB::rollBack();
        }
    }
    public function deleteSize($id){
        try {
            DB::beginTransaction();

            DB::table('sizes')
                ->where('sizes.id', '=', $id)
                ->delete();

            Session::flash('success', 'Xóa Thành Công');
            DB::commit();
            return redirect()->route('item_description.indexSize');
        } catch (\Exception $exception) {
            dd($exception);
            Session::flash('error', 'heroku chỉ lưu ảnh trong thời gian ngắn nên chút nữa nó sẽ mất đó nhé :>');
            return redirect()->route('item_description.indexSize');
            DB::rollBack();
        }
    }

    // Màu
    public function indexColor(){
        $colors = DB::table('colors')->get();
        return view('admin.item_description.indexColor', compact('colors'));
    }
    public function storeColor(Request $request){
        try {
            DB::beginTransaction();
            DB::table('colors')->insert([
                'name'              =>  $request->name,
                'hex'              =>  $request->hex,
                "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
                "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            ]);
            Session::flash('success', 'Thêm thành công');
            DB::commit();
            return redirect()->route('item_description.indexColor');
        } catch (\Exception $exception) {
            // dd($exception);
            Session::flash('error', 'Đã có lỗi sảy ra, hãy thêm lại hình ảnh');
            return redirect()->route('item_description.indexColor');
            DB::rollBack();
        }
    }
    public function deleteColor($id){
        try {
            DB::beginTransaction();

            DB::table('colors')
                ->where('colors.id', '=', $id)
                ->delete();

            Session::flash('success', 'Xóa Thành Công');
            DB::commit();
            return redirect()->route('item_description.indexColor');
        } catch (\Exception $exception) {
            dd($exception);
            Session::flash('error', 'heroku chỉ lưu ảnh trong thời gian ngắn nên chút nữa nó sẽ mất đó nhé :>');
            return redirect()->route('item_description.indexColor');
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
