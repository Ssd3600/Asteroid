<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;
use Coupon;
use Customer;
use Catepost;
use PharIo\Manifest\Email;
use Product;
use App\Models\CategoryProductModel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
session_start();

class MailController extends Controller
{
    public function forget_password(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();


        $all_product = DB::table('tbl_product')->where('product_status','0')->orderBy('brand_id','desc')->limit(6)->get();

        return view('pages.checkout.forget_password')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }


    public function change_password(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderBy('brand_id','desc')->get();
 

        $all_product = DB::table('tbl_product')->where('product_status','0')->orderBy('brand_id','desc')->limit(6)->get();

        return view('pages.checkout.change_password')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }

    public function recover_password(Request $request){
        
    }

}