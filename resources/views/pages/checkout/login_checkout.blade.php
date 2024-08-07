@extends('/pages/layout')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập</h2>
						<form action="{{URL::to('/login-customer')}}" method="post">
                            {{ csrf_field() }}
							<input type="text" name="email_account" placeholder="Tài khoản" />
							<input type="password" name="password_account" placeholder="Mật khẩu" />
							<span>
								<a href="{{URL::to('/forget-password')}}">Quên mật khẩu</a>
							</span>	
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng kí tài khoản</h2>
						<form action="{{URL::to('add-customer')}}" method="post">
                            {{ csrf_field() }}
							<input type="text" name="customer_name" placeholder="Họ tên khách hàng"/>
							<input type="email" name="customer_email" placeholder="Email"/>
							<input type="password" name="customer_password" placeholder="Mật khẩu"/>
							<input type="text" name="customer_phone" placeholder="Số điện thoại"/>
							<button type="submit" class="btn btn-default">Đăng kí</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection