@section('form')

	<fieldset>
		<div class="form-group">
			<label for="username" class="col-md-4">Username</label>
			<div class="col-md-8">
				{{ Form::text('username', $user->username, array('class' => 'form-control', 'id' => 'username')) }}
				<span class="text-danger">{{ $errors->first('username') }}</span>
			</div> <!-- /controls -->
		</div> <!-- /control-group -->


		<div class="form-group">
			<label for="first_name" class="col-md-4">First Name</label>
			<div class="col-md-8">
				{{ Form::text('first_name', $user->first_name, array('class' => 'form-control', 'id' => 'first_name')) }}
				<span class="text-danger">{{ $errors->first('first_name') }}</span>
			</div> <!-- /controls -->
		</div> <!-- /control-group -->


		<div class="form-group">
			<label class="col-md-4" for="last_name">Last Name</label>
			<div class="col-md-8">
				{{ Form::text('last_name', $user->last_name, array('class' => 'form-control', 'id' => 'last_name')) }}
				<span class="text-danger">{{ $errors->first('last_name') }}</span>
			</div>
		</div> <!-- /control-group -->


		<div class="form-group">
			<label class="col-md-4" for="email">Email Address</label>
			<div class="col-md-8">
				{{ Form::text('email', $user->email, array('class' => 'form-control', 'id' => 'email')) }}
				<span class="text-danger">{{ $errors->first('email') }}</span>
			</div> <!-- /controls -->
		</div> <!-- /control-group -->


		<hr /><br />

		<div class="form-group">
			<label class="col-md-4" for="password">Password</label>
			<div class="col-md-8">
				{{ Form::password('password', array('class' => 'form-control', 'id' => 'password')) }}
				<span class="text-danger">{{ $errors->first('password') }}</span>
			</div> <!-- /controls -->
		</div> <!-- /control-group -->


		<div class="form-group">
			<label class="col-md-4" for="password_confirmation">Confirm</label>
			<div class="col-md-8">
				{{ Form::password('password_confirmation', array('class' => 'form-control', 'id' => 'password_confirmation')) }}
				<span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
			</div> <!-- /controls -->
		</div> <!-- /control-group -->



			<br />


		<div class="form-group">

			<div class="col-md-offset-4 col-md-8">
				<button type="submit" class="btn btn-primary">Save</button>
				<button class="btn btn-default">Cancel</button>
			</div>
		</div> <!-- /form-actions -->
	</fieldset>
@show