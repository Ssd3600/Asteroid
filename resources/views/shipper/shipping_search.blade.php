@extends('/pages/layout')
@section('content')
<section id="form">
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-sm-offset-1">
                <div class="login-form"><!--tracking form-->
                    <h2>Tra cứu vận chuyển</h2>
                    <form action="{{url('/track-shipment')}}" method="post">
                        @csrf
                        <input type="text" name="tracking_number" placeholder="Nhập mã vận chuyển" />
                        <button type="submit" class="btn btn-default">Tra cứu</button>
                    </form>
                </div><!--/tracking form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection