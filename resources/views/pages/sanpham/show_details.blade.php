@extends('/pages/layout')
@section('content')
@foreach ($product_details as $key => $value)

<div class="product-details">
    <!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{URL::to('/uploads/product/'.$value->product_image)}}" alt="" />
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            

            <!-- Controls -->
            <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information">
            <!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{$value->product_name}}</h2>
            <p>ID sản phẩm: {{$value->product_id}}</p>
            <img src="images/product-details/rating.png" alt="" />

            <form action="{{URL::to('/save-cart')}}" method="post">
                {{ csrf_field() }}
                <span>
                    <span>{{number_format($value->product_price).' VNĐ'}}</span>
                    <label>Số lượng:</label>
                    <input name="qty" type="number" min="1" value="1" />
                    <input name="productid_hidden" type="hidden" value="{{$value->product_id}}" />
                    <button type="submit" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Thêm giỏ hàng
                    </button>
                </span>
            </form>
            <p><b>Tình trạng:</b> Còn hàng</p>
            <p><b>Điều kiện:</b> Mới 100%</p>
            <p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
            <p><b>Danh mục:</b> {{$value->category_name}}</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
        </div>
        <!--/product-information-->
    </div>
</div>
<!--/product-details-->
<div class="category-tab shop-details-tab">
    <!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#details" data-toggle="tab">Mô tả sản phẩm</a></li>
            <li><a href="#companyprofile" data-toggle="tab">Thông số kỹ thuật</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details">
            <p>{!!$value->product_desc!!}</p>
        </div>
        <div class="tab-pane fade" id="companyprofile">
            <p>{!!$value->product_content!!}</p>
        </div>
        
    </div>
</div>
<!--/category-tab-->
@endforeach
<div class="recommended_items">
    <!--recommended_items-->
    <h2 class="title text-center">Sản phẩm liên quan</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                @foreach ($relate as $key => $lienquan)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to('uploads/product/'.$lienquan->product_image)}}" alt="" />
                                <h2>{{number_format($lienquan->product_price).' VNĐ'}}</h2>
                                <p>{{$lienquan->product_name}}</p>
                                <a href="#" class="btn btn-default add-to-cart">
                                    <i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>
<!--/recommended_items-->
@endsection