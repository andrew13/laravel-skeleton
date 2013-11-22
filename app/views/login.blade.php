@extends('layouts.admin')

@section('css')
@parent
<link href="/assets/admin/css/pages/signin.css" rel="stylesheet">
@stop

@section('body')
<nav class="navbar navbar-inverse" role="navigation">

	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.html">Hyfn CMS 1.0</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="">
					<a href="#">
						Reset My Password
					</a>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div> <!-- /.container -->
</nav>



<div class="account-container stacked">
	@if ( Session::get('error') )
		<div class="alert alert-danger alert-dismissable">
			{{ $errors->first('login_error') }}
		</div>
	@endif
	<div class="content clearfix">

		<form action="#" method="post">

			<h1>Sign In</h1>

			<div class="login-fields">
				<p>Sign in using your registered account:</p>

				<div class="field">
					<label for="username">Username:</label>
					{{ Form::text('username', '', array('class' => 'form-control input-lg username-field', 'id' => 'username', 'name' => 'username', 'placeholder' => 'Username')) }}
					<span class="text-danger">{{ $errors->first('username') }}</span>
				</div> <!-- /field -->

				<div class="field">
					<label for="password">Password:</label>
					{{ Form::password('password', array('class' => 'form-control input-lg password-field', 'id' => 'password', 'name' => 'password', 'placeholder' => 'Password')) }}
					<span class="text-danger">{{ $errors->first('password') }}</span>
				</div> <!-- /password -->

			</div> <!-- /login-fields -->

			<div class="login-actions">

				<span class="login-checkbox">
					<input type="hidden" name="remember" value="0">
					<input id="remember" name="remember" type="checkbox" class="field login-checkbox" value="1" tabindex="4" />
					<label for="remember" class="choice">Keep me signed in</label>
				</span>

				<button class="login-action btn btn-primary">Sign In</button>

			</div> <!-- .actions -->
		</form>

	</div> <!-- /content -->

</div> <!-- /account-container -->


<!-- Text Under Box -->
<div class="login-extra">
	Remind <a href="#">Password</a>
</div> <!-- /login-extra -->
@overwrite