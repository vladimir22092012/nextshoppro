<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title inertia>{{env('APP_NAME')}}</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,200,0,0" />
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.6/dist/vue-multiselect.min.css">
    <link rel="stylesheet"
          id="electro-fonts-css"
          href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&amp;display=swap"
          type="text/css" media="all">
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
    <script>
        window.Laravel = {
            csrfToken: "{{ csrf_token() }}"
        }
    </script>
    @routes
    @vite([
        'resources/js/app.js',
        "resources/js/Pages/{$page['component']}.vue",
        'resources/css/app.css',
        /*'resources/js/template/vendor/jquery-3.3.1/jquery.min.js',
        'resources/js/template/vendor/bootstrap-4.2.1/js/bootstrap.bundle.min.js',
        'resources/js/template/vendor/owl-carousel-2.3.4/owl.carousel.min.js',
        'resources/js/template/vendor/nouislider-12.1.0/nouislider.min.js',
        'resources/js/template/js/number.js',
        'resources/js/template/js/main.js',*/
    ])
    @inertiaHead
</head>
<body class="page-top">
    @inertia

    <script  src="https://code.jquery.com/jquery-3.5.1.min.js"  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="  crossorigin="anonymous"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/owl-carousel-2.3.4/owl.carousel.min.js"></script>
    <script src="/vendor/nouislider-12.1.0/nouislider.min.js"></script>
    <script src="/js/number.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>
