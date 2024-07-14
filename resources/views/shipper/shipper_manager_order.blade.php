@extends('shipper_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê đơn hàng
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
            </div>
        </div>
        <div class="table-responsive">
            <?php
                $message = Session::get('message');
                if ($message){
                    echo '<span class="text-alert">',$message,'</span>';
                    Session::put('message',null);
                }
            ?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên người nhận hàng</th>
                        <th>Tổng giá tiền</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Trạng thái</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_order as $key => $order) 
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                            <td>{{$order->shipping_name}}</td>
                            <td>{{$order->order_total}}</td>
                            <td>{{$order->shipping_address}}</td>
                            <td>{{$order->shipping_phone}}</td>
                            
                            <td>
                            <form action="{{ URL::to('/update-order-status/'.$order->order_id) }}" method="POST">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()">
                                        <option value="Đang xử lý" {{$order->order_status == 'Đang xử lý' ? 'selected' : ''}}>Đang xử lý</option>
                                        <option value="Đang gửi hàng" {{$order->order_status == 'Đang gửi hàng' ? 'selected' : ''}}>Đang gửi hàng</option>
                                        <option value="Đã gửi hàng thành công" {{$order->order_status == 'Đã gửi hàng thành công' ? 'selected' : ''}}>Đã gửi hàng thành công</option>
                                    </select>
                                </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>

@endsection