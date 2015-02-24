@extends('layouts.base')

@section('content')
	<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

	<style>
		.container {
			text-align: center;
			display: table-cell;
			vertical-align: middle;
			font-family: 'Lato';
		}

		.content {
			text-align: center;
			display: inline-block;
		}

		.title {
			font-size: 96px;
			margin-bottom: 40px;
		}

		.quote {
			font-size: 24px;
		}
	</style>

	<div class="container">
		<div class="content">
			<div class="title">Laravel 5</div>
			<div class="quote">{{ Inspiring::quote() }}</div>
		</div>
	</div>

@stop