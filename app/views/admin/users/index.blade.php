@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="widget stacked widget-table action-table">

		<div class="widget-header">
			<i class="icon-th-list"></i>
			<h3>Table</h3>
		</div> <!-- /widget-header -->

		<div class="widget-content">

			<table class="table table-striped table-bordered">
				<thead>
				<tr>
					<th>Username</th>
					<th>Email</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th class="td-actions"></th>
					<th class="td-actions"></th>
				</tr>
				</thead>
				<tbody>
				@foreach ($users as $user)
				<tr>
					<td>{{$user->username}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->first_name}}</td>
					<td>{{$user->last_name}}</td>
					<td class="td-actions">
						<a href="/admin/users/{{$user->id}}/edit" class="btn btn-xs btn-primary">
							<i class="btn-icon-only icon-edit"></i>
						</a>
					</td>
					<td class="td-actions">
						{{ Form::open(array('url' => 'admin/users/' . $user->id, 'method' => 'delete','class' => 'form-confirm-delete', 'id' => 'delete-user')) }}
								<button type="submit" class="btn btn-xs btn-danger"><i class="btn-icon-only icon-remove"></i></button>
						{{ Form::close() }}
					</td>
				</tr>
				@endforeach

				</tbody>
			</table>

		</div> <!-- /widget-content -->
	</div>
</div>
@stop