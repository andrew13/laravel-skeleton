@extends('layouts.admin')

@section('css')
@parent
<link href="/css/pages/signin.css" rel="stylesheet">
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

	<div class="content clearfix">

		<form action="#" method="post">

			<h1>Sign In</h1>

			<div class="login-fields">

				<p>Sign in using your registered account:</p>

				<div class="field">
					<label for="username">Username:</label>
					<input type="text" id="username" name="username" value="" placeholder="Username" class="form-control input-lg username-field" />
				</div> <!-- /field -->

				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="form-control input-lg password-field"/>
				</div> <!-- /password -->

			</div> <!-- /login-fields -->

			<div class="login-actions">

				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Keep me signed in</label>
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