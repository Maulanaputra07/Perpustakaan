<!doctype html>
<html lang="en">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

	</head>
	<body class="img js-fullheight" style="background-image: url('{{ asset('assets/image/buku.jpg') }}');">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Create new account</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Register Here</h3>
		      	<form action="/register" class="signin-form" method="POST">
                    @csrf
		      		<div class="form-group">
		      			<input type="text" name="name" class="form-control" placeholder="Nama" required value="{{old('nama')}}">
		      		</div>
                    @error('nama')
                        <small>{{ $message }}</small>
                    @enderror
		      		{{-- <div class= "form-group">
		      			<input type="text" name="username" class="form-control" placeholder="Username" required value="{{old('username')}}">
		      		</div>
                    @error('username')
                        <small>{{ $message }}</small>
                    @enderror --}}
		      		<div class="form-group">
		      			<input type="text" name="email" class="form-control" placeholder="Email" required value="{{old('email')}}">
		      		</div>
                    @error('email')
                        <small>{{ $message }}</small>
                    @enderror
	            <div class="form-group">
	              <input id="password-field" name="password" type="password" class="form-control" placeholder="Password" required value="{{old('password')}}">
	              {{-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> --}}
	            </div>
                @error('password')
                        <small>{{ $message }}</small> 
                @enderror
	            {{-- <div class="form-group">
	              <input name="nomor_telepon" type="text" class="form-control" placeholder="Nomor Telepon" required value="{{old('nomor_telepon')}}">
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
                @error('password')
                        <small>{{ $message }}</small> 
                @enderror --}}
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Register</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
								</div>
								{{-- <div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div> --}}
	            </div>
	          </form>
	          {{-- <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div> --}}
		      </div>
				</div>
			</div>
		</div>
	</section>
{{-- 
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script> --}}

	</body>
</html>

