@extends('layouts.admin')

@section('css')
@parent
<link href="/css/pages/signin.css" rel="stylesheet">
@stop

@section('body')

<div class="row">

	<div class="col-md-12">

		<div class="error-container">
			<h1>Oops!</h1>

			<h2>404 Not Found</h2>

			<div class="error-details">
				Sorry, an error has occured, Requested page not found!

			</div> <!-- /error-details -->

			<div class="error-actions">
				<a href="/" class="btn btn-primary btn-lg">
					<i class="icon-chevron-left"></i>
					&nbsp;
					Back to Home
				</a>

			</div> <!-- /error-actions -->

		</div> <!-- /error-container -->

	</div> <!-- /span12 -->

</div> <!-- /row -->
@overwrite