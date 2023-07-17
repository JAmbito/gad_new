<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
	<link href="http://fonts.cdnfonts.com/css/circular-std" rel="stylesheet">
    <link href="{{asset('/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="{{ asset('/gad/Super_Admin/CSS_SUBMENU/ADD_REMOVE_CLASS.css') }}">
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('/gad/Super_Admin/CSS_SUBMENU/ADD_REMOVE_INV_91.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/gad/Super_Admin/CSS_SUBMENU/ADD_REMOVE_CLASS_RELEASE_WAREHOUSE_0.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/gad/Super_Admin/CSS_SUBMENU/ADD_REMOVE_CLASS_RELEASE_CONTRACTOR_91.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/gad/Super_Admin/CSS/DTM.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/gad/Super_Admin/CSS/z_purchase_order_drop_none.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/gad/Super_Admin/CSS_SUBMENU/project_no_drop_sub.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/gad/Super_Admin/CSS_SUBMENU/bom_no_drop_sub.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/gad/Super_Admin/CSS_SUBMENU/project_bom_no_drop_sub.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/gad/Super_Admin/CSS_SUBMENU/ntp_no_drop_sub.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/gad/Super_Admin/CSS/z_warehouse_no_drop.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/gad/Super_Admin/CSS_SUBMENU/ADD_REMOVE_CLASS_RELEASE_WAREHOUSE_91.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/gad/Super_Admin/CSS/DTM_supplier_sub_create.css') }}">
    @yield('links')
	@yield('styles')

	<title>GAD</title>
</head>
<body>

	<style type="text/css">

		.select2-dropdown{
			z-index: 999999999!important;
			font-size: 14px!important;
		}
		.select2-container{
			width: 100%!important;
			margin-bottom: 23px!important;
		}
		.select2-selection {
			height: 45px!important;
			padding: 8px!important;
			border: 1px solid #E3E3E3!important;
			font-size: 14px!important;
			color: #34495F!important;
			text-transform: uppercase!important;
		}
		.select2-container--default .select2-search--dropdown .select2-search__field{
			padding: 12px;
		}

		.hover_main:hover{
			box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
		}


	</style>

    @include('backend.partial.sidebar')
	@yield('content')

	<script type="text/javascript" src="{{ asset('gad/Super_Admin/JS/script.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}" ></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<!-- TABLE -->

	@yield('scripts')
</body>
</html>
