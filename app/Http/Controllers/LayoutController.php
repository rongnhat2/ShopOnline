<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Hash;
use DB;

class LayoutController extends Controller
{
    public function indexCarousel(){
    	$carousel = DB::table('carousel')
	    	->leftjoin('image', 'carousel.image_id', '=', 'image.id')
            ->select('carousel.*', 'image.image_url')
	    	->get();
        return view('admin.layout.carousel', compact('carousel'));
    }
    public function storeCarousel(Request $request){

    	try {
            DB::beginTransaction();

            DB::table('carousel')->insert([
                'image_id'         	=> $request->image_id,
                'title'             => $request->title,
                'detail'        	=> $request->detail,
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

    public function deleteCarousel($id){
    	try {
            DB::beginTransaction();

	        DB::table('carousel')
		    	->where('carousel.id', '=', $id)
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
}
