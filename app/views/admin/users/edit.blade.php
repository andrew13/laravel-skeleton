@extends('layouts.admin')
@section('content')
	<div class="row">

		<div class="col-md-8">

			<div class="widget stacked ">

				<div class="widget-header">
					<i class="icon-user"></i>
					<h3>Create New Account</h3>
				</div> <!-- /widget-header -->

				<div class="widget-content">
					<!-- use form.blade.php -->
					{{ Form::open(array('url' => 'admin/users/' . $user->id, 'method' => 'put', 'id' => 'edit-user', 'class' => 'form-horizontal col-md-8')) }}
						@yield('form')
							@include('admin/users/form')
						@stop
					{{ Form::close() }}
				</div> <!-- /widget-content -->

			</div> <!-- /widget -->

		</div> <!-- /span8 -->

	</div> <!-- /row -->
@stop