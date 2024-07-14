@extends('/pages/layout')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đổi mật khẩu</h2>
						<form action="{{url('/recover-password')}}" method="post">
                            @csrf
                            <input type="text" name="email_password" placeholder="Nhập mật khẩu cũ" />
                            <input type="text" name="email_password" placeholder="Nhập mật khẩu mới" />
							<input type="text" name="email_password" placeholder="xác nhận mật khẩu mới" />
							<button type="submit" class="btn btn-default">Đổi mật khẩu</button>
						</form>
					</div><!--/login form-->
				</div>
				
			</div>
		</div>
	</section><!--/form-->

@endsection