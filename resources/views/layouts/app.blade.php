<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADAP</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/adap_black_50x50.png') }}" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse d-sm-inline-flex flex-sm-row-reverse">
                    {{-- <partial name="_LoginPartial" />  --}}
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            @guest
                                {{-- <li class="nav-item">
                                    <a class="nav-link text-dark" href="{{ route('login') }}">Login</a>
                                </li> --}}
                            @endguest
                            @auth
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="userDropdown">
                                    {{-- If Assisting --}}
                                    {{-- <a class="dropdown-item" asp-controller="Applicant" asp-action="EndAssist">End Assisting</a> --}}
                                    <a class="dropdown-item" href="{{ route('users.edit', Auth::user()->id) }}" title="Profile">Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                </div>
                            @endauth
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <main role="main" class="pb-3">
            @include('partials.alerts')
            @yield('content')
            <a id="back-to-top" href="#" class="btn btn-secondary btn-lg back-to-top btn-floating" role="button" @*title="Click to return on the top page" data-toggle="tooltip" data-placement="left"*@><i class="fa fa-chevron-up"></i></a>
        </main>
    </div>

    <footer class="border-top footer text-muted">
        <div class="container">
            &copy; {{ date('Y') }} - ADAP 
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c0d93b5d63.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/inputmask.js" integrity="sha512-mZdA4RMHmZy00bvtVQLDLjQegPrTWuVuCnmUPryP0ggmpK4xafI9CUOcQlRIitN4K088ETPfTTlI12aaS1hhVg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/bindings/inputmask.binding.js" integrity="sha512-J6WEJE0No+5Qqm9/T93q88yRQjvoAioXG4gzJ+eqZtLi+ZBgimZDkTiLWiljwrwnoQw+xwECQm282RJ6CrJnlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>    
    <script src="{{ asset('js/site.js') }}"></script>
    {{-- <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-P74QME0XHQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-P74QME0XHQ');
    </script> --}}
    @yield('scripts')
</body>
</html>
