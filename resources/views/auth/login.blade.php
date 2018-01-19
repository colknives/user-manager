@extends('partials.layout')

@section('title', 'Login')

@section('style')
    <link href="{{url('css/auth/login.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    
	<section class="login-section">

		<div class="login-container">
			<div class="login-header-container">
				<h1><span class="logo-user">USER</span> <span class="logo-manager">MANAGER</span></h1>
			</div>
			<div class="login-form-container">
				<form method="POST" [formGroup]="loginForm">
					<div class="login-form-header">
						<h3>Sign-in</h3>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
				            <input formControlName="username" type="text" class="form-control" name="username" placeholder="Username">
				        </div>
				    </div>
				    <div class="form-group row">
						<div class="col-md-12">
				            <input formControlName="password" type="password" class="form-control" name="password" placeholder="Password">
				        </div>
				    </div>
				    <div class="form-actions">
				        <div class="form-group row">
				            <div class="col-md-12 login-submit-container">
				                <button type="button" class="btn btn-primary" type="button">Login</button>
				            </div>
				        </div>
				    </div>
				</form>
			</div>
		</div>



	</section>

@endsection