
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Dashboard :: Base Admin</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">

	@section('css')
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

		<link href="/assets/admin/css/bootstrap.min.css" rel="stylesheet">
		<link href="/assets/admin/css/bootstrap-responsive.min.css" rel="stylesheet">

		<link href="/assets/admin/css/font-awesome.min.css" rel="stylesheet">

		<link href="/assets/admin/css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet">

		<link href="/assets/admin/css/base-admin-3.css" rel="stylesheet">
		<link href="/assets/admin/css/base-admin-3-responsive.css" rel="stylesheet">

		<link href="/assets/admin/css/pages/dashboard.css" rel="stylesheet">
		<link href="/assets/admin/js/plugins/msgbox/jquery.msgbox.css" rel="stylesheet">

		<link href="/assets/admin/css/custom.css" rel="stylesheet">

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>

		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	@show
</head>

<body>
@section('body')

<nav class="navbar navbar-inverse" role="navigation">

	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<i class="icon-cog"></i>
			</button>
			<a class="navbar-brand" href="/admin">Hyfn CMS 1.0</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">

					@if( !empty($logged_in_user))
						<a href="javscript:;" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i>
							{{$logged_in_user->username}}
							<b class="caret"></b>
						</a>


						<ul class="dropdown-menu">
							<li><a href="/admin/users/{{$logged_in_user->id}}/edit">Account Settings</a></li>
							<li class="divider"></li>
							<li><a href="/admin/logout">Logout</a></li>
						</ul>
					@endif
				</li>
			</ul>

			<form class="navbar-form navbar-right" role="search">
				<div class="form-group">
					<input type="text" class="form-control input-sm search-query" placeholder="Search">
				</div>
			</form>
		</div><!-- /.navbar-collapse -->
	</div> <!-- /.container -->
</nav>



@if( !empty($logged_in_user))

<div class="subnavbar">

	<div class="subnavbar-inner">

		<div class="container">

			<a href="javascript:;" class="subnav-toggle" data-toggle="collapse" data-target=".subnav-collapse">
				<span class="sr-only">Toggle navigation</span>
				<i class="icon-reorder"></i>

			</a>

			<div class="collapse subnav-collapse">
				<ul class="mainnav">

					<li class="active">
						<a href="/admin">
							<i class="icon-home"></i>
							<span>Home</span>
						</a>
					</li>

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i>
							<span>Users</span>
							<b class="caret"></b>
						</a>

						<ul class="dropdown-menu">
							<li><a href="/admin/users">All Users</a></li>
							<li><a href="/admin/users/{{$logged_in_user->id}}/edit">My Account</a></li> <!-- TODO : Should this point to same as above link? -->
							<li><a href="/admin/users/create">Create New Account</a></li>
						</ul>
					</li>
				</ul>
			</div> <!-- /.subnav-collapse -->

		</div> <!-- /container -->

	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
@endif

<div class="main">

	<div class="container">

	@if(!empty($success_message) || Session::get('success_message'))
	<div class="row">
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<strong>@yield($success_message,Session::get('success_message'))</strong>
		</div>
	</div>
	@endif

		@section('content')
		<div class="row">
			<div class="widget stacked">

				<div class="widget-header">
					<i class="icon-file"></i>
					<h3>Welcome</h3>
				</div> <!-- /widget-header -->

				<div class="widget-content">
					<strong>Welcome to the Hyfn CMS</strong>
					<p>This is a work in progress starter site for Laravel Projects, It includes basic routing for an admin CMS (as you can see by seeing this page). It will include basic CRUD functionality for Users. API endpoint grouping/migrations/resources.</p>
					<p>Also, it comes packaged with this nifty CMS theme, you can see all of the components that this theme has to offer by un-zipping the admin-cms.tar.gz file, Here you can copy-pasta all of the pretty little features that your pasta hungry heart desires.</p>
				</div> <!-- /widget-content -->

			</div> <!-- /widget -->

		</div> <!-- /row -->
		@show

	</div> <!-- /container -->

</div> <!-- /main -->

@show

<div class="footer">

	<div class="container">

		<div class="row">

			<div id="footer-copyright" class="col-md-6">
				&copy; 2013 Hyfn.
			</div> <!-- /span6 -->

			<div id="footer-terms" class="col-md-6">
				CMS By <a href="http://hyfn.com" target="_blank">HYfn</a>
			</div> <!-- /.span6 -->

		</div> <!-- /row -->

	</div> <!-- /container -->

</div> <!-- /footer -->


@section('js')
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/assets/admin/js/libs/jquery-1.9.1.min.js"></script>
<script src="/assets/admin/js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="/assets/admin/js/libs/bootstrap.min.js"></script>

<script src="/assets/admin/js/plugins/lightbox/jquery.lightbox.min.js"></script>
<script src="/assets/admin/js/plugins/msgbox/jquery.msgbox.min.js"></script>

<script src="/assets/admin/js/Application.js"></script>
@show


</body>
</html>
