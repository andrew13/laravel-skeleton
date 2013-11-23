@extends('layouts.admin')

@section('css')
@parent
<link href="/assets/admin/css/pages/signin.css" rel="stylesheet">
@stop

@section('body')

<div class="row">

	<div class="col-md-12">

		<div class="error-container">
			<img src="/assets/admin/img/down.png" />
			<h2>Apologies For The Inconvenience</h2>

			<div class="error-details">
				The Site Is Down For Scheduled Maintenance, Please Come Back Soon.
			</div> <!-- /error-details -->

		</div> <!-- /error-container -->

	</div> <!-- /span12 -->

</div> <!-- /row -->
@overwrite