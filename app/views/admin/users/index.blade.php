@extends('layouts.admin')
@section('content')
<div class="widget stacked widget-table action-table">

	<div class="widget-header">
		<i class="icon-th-list"></i>
		<h3>Table</h3>
	</div> <!-- /widget-header -->

	<div class="widget-content">

		<table class="table table-striped table-bordered">
			<thead>
			<tr>
				<th>Email</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th class="td-actions"></th>
			</tr>
			</thead>
			<tbody>
			@foreach ($users as $user)
			<tr>
				<td>{{$user->email}}</td>
				<td>{{$user->first_name}}</td>
				<td>{{$user->last_name}}</td>
				<td class="td-actions">
					<a href="javascript:;" class="btn btn-xs btn-primary">
						<i class="btn-icon-only icon-ok"></i>
					</a>
				</td>
			</tr>
			@endforeach

			</tbody>
		</table>

	</div> <!-- /widget-content -->

	@stop