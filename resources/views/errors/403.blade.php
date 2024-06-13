
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Error 403">
    <meta name="author" content="Rayhan Yulanda">
    <!-- Favicon -->
    <link href="{{ $config['DEVELOPER_FAVICON'] }}" rel="icon" type="image/png">

    <title>403 Error</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome/css/all.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body class="bg-white">
<div id="layoutError">
    <div id="layoutError_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center mt-4">
                            <img class="img-fluid p-4" src="{{asset('img/errors/403.svg')}}" alt />
                            <p class="lead">Your client does not have permission to get this page from the server.</p>
                            <a class="text-arrow-icon" href="{{route('admin.home')}}">
                                <i class="fa fa-arrow-left fa-fw"></i>
                                Return to Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="mt-3">
        <footer class="footer mt-auto footer-light">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-center">
                    <div class="small">{{$config['DEVELOPER_COMPANY_NAME']}}</div>
                </div>
            </div>
        </footer>
    </div>
</div>
</body>
</html>
