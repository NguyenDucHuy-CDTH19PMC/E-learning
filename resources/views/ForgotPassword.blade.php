<!DOCTYPE html>
<html lang="en">
<head>
	<title>ForgotPassword</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }} "/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }} ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }} ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }} ">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }} ">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-02.jpg');">
			<div class="wrap-login100">	
				<form action="{{ route('xl-mat-khau') }}" method="POST"  class="login100-form validate-form" button type = 'submit'>	
				@csrf
				<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->			 
				<span class="login100-form-title p-b-34 p-t-27">
						Check Email
					</span>
					@error('email')
						<span class="alert alert-danger">>{{ $message }}</span>
					@enderror
					@if (!empty($title))
						<div class="alert alert-danger">
						<ul>
						<li>{{$title }}</li>
						</ul>
						</div>
					@endif
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Email
						</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Enter email">
                        <input class="input100 @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>	
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Xác Nhận
						</button>
					</div>
					<div class="container-login100-form-btn m-t-17">
						<a href="{{ route('xl-dang-nhap') }}" >
							Back to Login
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/main.js') }}"></script>
    
</html>

<!--  Bạch thêm cả thư mục fonts(~E-learning\public\fonts) 
 và vendor(~E-learning\public\vendor) nhưng ghi chú hết thì trầm cảm lắm -->