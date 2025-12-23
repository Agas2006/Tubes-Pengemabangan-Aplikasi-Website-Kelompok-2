<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>BAG Travel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }
        .hero {
            background: linear-gradient(rgba(0,0,0,.4), rgba(0,0,0,.4)),
            url('/images/bus.jpg') center/cover no-repeat;
            padding: 80px 0;
            color: #fff;
        }
        .search-box {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            color: #000;
        }
        .section-blue {
            background: #1e3a6d;
            color: #fff;
            padding: 50px 0;
        }
        .armada img {
            width: 100%;
            height: auto;
        }
        footer {
            background: #1e3a6d;
            color: #fff;
            padding: 30px 0;
        }
    </style>
</head>
<body>

@include('partials.navbar')

@yield('content')

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
