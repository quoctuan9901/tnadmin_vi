@php
$config_site = DB::table('config')->first();
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noodp,noindex,nofollow" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="{{ asset('public/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('public/favicon.ico') }}" type="image/x-icon">
	<title>@yield('title', 'Admin')</title>

	<!-- Global stylesheets -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/assets/css/icons/icomoon/styles.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/assets/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/assets/css/core.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/assets/css/components.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/assets/css/colors.min.css') }}" />
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript">
		var publicPath = '{{ Request::root() . "/public" }}';
		var domainPath = '{{ env('APP_URL') }}';
	</script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/loaders/pace.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/core/libraries/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/core/libraries/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/ui/nicescroll.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/ui/drilldown.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/editors/ckeditor/ckeditor.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/editors/ckfinder/ckfinder_v1.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/core/layout.js') }}"></script>
	<!-- /theme JS files -->
</head>

<body>

	<!-- Main navbar -->
	@include ('backend.blocks.navbar')
	<!-- /main navbar -->


	<!-- Second navbar -->
	@include ('backend.blocks.second_navbar')
	<!-- /second navbar -->


	<!-- Page header -->
	@include ('backend.blocks.page-header')
	<!-- /page header -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<div class="row">

					@yield ('content')

				</div>
				
				@include ('backend.blocks.fab')

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->
		
		<!-- Disabled backdrop -->
		<div id="modal_backdrop" class="modal fade" data-backdrop="false">
			<div class="modal-dialog">
				<div class="modal-content"></div>
			</div>
		</div>
		<!-- /disabled backdrop -->

	</div>
	<!-- /page container -->
	
	<!-- Footer -->
	@include ('backend.blocks.footer')
	<!-- /footer -->
	
	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/tags/tagsinput.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/inputs/maxlength.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/styling/switch.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/inputs/passy.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/jquery-number-master/jquery.number.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/ui/fab.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/datatables/extensions/buttons.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/notifications/bootbox.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/core/myscripts.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/backend/assets/js/core/ajax.js') }}"></script>
	<!-- /theme JS files -->

</body>
</html>
