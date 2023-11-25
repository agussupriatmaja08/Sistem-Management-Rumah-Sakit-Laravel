<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/tabel.css">
    <link rel="stylesheet" href="css/detail.css">
    <link rel="stylesheet" href="css/addAndSearch.css">
</head>

<body>
    @if (!session()->has('key'))
        <script> window.location.href = '/'</script>
    @endif
    <div class="all">
        <div class="menu">
            @include('content.navVertikal')
            
        
        </div>
        <div class="content">
            @yield('content')
            <div class="footer">
                @include('content.footer')
        
            </div>
        </div>

    </div>
 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>
