<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Hash;
use DB;

class GalleryController extends Controller
{
    public function index(){
        $gallery = DB::table('image')
            ->orderBy('image.created_at', 'desc')->get();
        return view('admin.gallery.index', compact('gallery'));
    }
    public function create(){
        return view('admin.gallery.add');
    }
    public function store(Request $request){
    	// dd($request);
    	try {
            DB::beginTransaction();

	        $image = $request->image;
        // dd($image);
	        foreach ($image as $key => $value) {
	            $imageitem = time() . $value->getClientOriginalName();
	        	// dd($imageitem);
	            $value->move(public_path('images'), $imageitem);
	            DB::table('image')->insert([
	                'image_url'               => 'images/'.$imageitem,
	                'image_name'              =>  $value->getClientOriginalName(),
	                "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	                "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	            ]);
	        }

            Session::flash('success', 'Thêm thành công');
            DB::commit();
            return redirect()->route('gallery.index');
        } catch (\Exception $exception) {
            // dd($exception);
            Session::flash('error', 'Đã có lỗi sảy ra, hãy thêm lại hình ảnh');
            return redirect()->route('gallery.index');
            DB::rollBack();
        }
    }

    public function getLibrary()
    {
        $gallery = DB::table('image')->orderBy('image.created_at', 'desc')->get();
        return $gallery;
    }
}
