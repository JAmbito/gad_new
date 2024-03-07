<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('gad/CSS/styles.css') }}">
	<title>Bataan Peninsula State University - Gender and Development</title>
</head>
<body>

	<style type="text/css">
		  input:-webkit-autofill,
		  input:-webkit-autofill:focus {
		    transition: background-color 600000s 0s, color 600000s 0s!important;
		  }
	</style>

    @yield('content')


	<script type="text/javascript">

			$(".show-pass").click(function(e){
                const showPass = $(e.target);
                showPass.parent().find('.password-input').prop('type', 'text');
                showPass.parent().find('.hide-pass').show();
                showPass.hide();
			});

	</script>

	<script type="text/javascript">

        $(".hide-pass").click(function(e){
            const hidePass = $(e.target);
            hidePass.parent().find('.password-input').prop('type', 'password');
            hidePass.parent().find('.show-pass').show();
            hidePass.hide();
        });

	</script>

</body>
</html>
