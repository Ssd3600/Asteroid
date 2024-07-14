<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

session_start();

class ShipperController extends Controller
{
    public function index(){
        return view('shipper/shipper_login');
    }
    public function shipper_dashboard(){
        // Hiển thị trang quản lý đơn hàng
        return view('shipper/shipper_dashboard');
    }
    public function take_order(Request $request){

        $shipper_email = $request->shipper_email;
        $shipper_password = md5($request->shipper_password);
    
        $result = DB::table('tbl_shipper')->where('shipper_email',$shipper_email)->where('shipper_password',$shipper_password)->first();
        if ($result){
            Session::put('shipper_name', $result->shipper_name);
            Session::put('shipper_id', $result->shipper_id);
            return Redirect::to('/shipper-dashboard');
        } else{
            Session::put('message', 'Mật khẩu hoặc địa chỉ email sai');
            return  Redirect::to('/shipper-login');
        }
    }

    public function logout(){
        Session::put('shipper_name', null);
        Session::put('shipper_id', null);
        return  Redirect::to('/shipper-login');
    }

    public function shipper_manager_order(){
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->select('tbl_order.*','tbl_customers.customer_name','tbl_shipping.*')
        ->orderBy('tbl_order.order_id','desc')->get();
        $shipper_manager_order = view('shipper.shipper_manager_order')->with('all_order', $all_order);
       return view('shipper_layout')->with('shipper.shipper_manager_order', $shipper_manager_order);
       
    }
    public function update_order_status(Request $request, $order_id){
    $order = Order::find($order_id);
    $order->order_status = $request->status;
    $order->save();

    Session::put('message', 'Cập nhật trạng thái đơn hàng thành công');
    return redirect()->back();
    }


    public function shipping_search(){

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
 
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderBy('brand_id','desc')->limit(6)->get();
        return view('shipper.shipping_search')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);;
    }
    
}

