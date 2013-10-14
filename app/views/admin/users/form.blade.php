@section('form')
	<fieldset>

		<div class="form-group">
			<label for="username" class="col-md-4">Username</label>
			<div class="col-md-8">
				<input type="text" class="form-control" id="username" value="">
			</div> <!-- /controls -->
		</div> <!-- /control-group -->


		<div class="form-group">
			<label for="firstname" class="col-md-4">First Name</label>
			<div class="col-md-8">
				<input type="text" class="form-control" id="firstname" value="">
			</div> <!-- /controls -->
		</div> <!-- /control-group -->


		<div class="form-group">
			<label class="col-md-4" for="lastname">Last Name</label>
			<div class="col-md-8">
				<input type="text" class="form-control" id="lastname" value="">
			</div> <!-- /controls -->
		</div> <!-- /control-group -->


		<div class="form-group">
			<label class="col-md-4" for="email">Email Address</label>
			<div class="col-md-8">
				<input type="text" class="form-control" id="email" value="">
			</div> <!-- /controls -->
		</div> <!-- /control-group -->


		<hr /><br />

		<div class="form-group">
			<label class="col-md-4" for="password1">Password</label>
			<div class="col-md-8">
				<input type="password" class="form-control" id="password1" value="">
			</div> <!-- /controls -->
		</div> <!-- /control-group -->


		<div class="form-group">
			<label class="col-md-4" for="password2">Confirm</label>
			<div class="col-md-8">
				<input type="password" class="form-control" id="password2" value="">
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