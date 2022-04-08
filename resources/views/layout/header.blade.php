<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale())}}" >
    <head>
        <meta charset="utf-8" />
        <title>{{config('app.name')}}</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
        <!-- Favicon -->

        <link rel="stylesheet" type="text/css" href="DataTables/datatables.css"/>
        {{--  <link rel="stylesheet" type="text/css" href="DataTables/dataTables.bootstrap4.min.css"/>  --}}
        <!-- <link rel="shortcut icon" type="image/x-icon" href="resource/assets/imgs/theme/favicon.svg" /> -->
        {{-- <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.svg" /> --}}
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('./assets/imgs/theme/IconBpos.png') }}" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Template CSS -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('assets/css/main.css?v=1.0')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/invoice.scss?v=1.0')}}" rel="stylesheet" type="text/scss" />
        {{--  <link href="{{ asset('assets/css/vendors/bootstrap.css') }}" rel="stylesheet" type="text/css" />  --}}
        {{--  <script src="cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script src="cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"></script>
        <script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
        <script type="text/javascript" src="~/Scripts/jquery.js"></script>
        <script type="text/javascript" src="~/Scripts/data-table/jquery.dataTables.js"></script>  --}}

    </head>
    <header class="main-header navbar">
        <div class="col-search">
        </div>
        <div class="col-nav">
            <ul class="nav">
                <li>
                    {{ Auth::user()->name }}
                </li>
                <li class="dropdown nav-item">

                    <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="{{ asset('assets/imgs/people/avatar-2.png')}}" alt="User" /></a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                         <i class="material-icons md-exit_to_app">
                            {{ __('Logout') }}
                                        </i></a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    {{--  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="material-icons md-exit_to_app"></i>Logout</a>
                    </div>  --}}
                </li>
            </ul>
        </div>
    </header>
    <body>
    {{--  @section('content')  --}}

    {{--  <main class="main-wrap">
    </main>  --}}
    {{--  @endsection  --}}
    <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendors/select2.min.js"></script>
    <script src="assets/js/vendors/perfect-scrollbar.js"></script>
    <script src="assets/js/vendors/jquery.fullscreen.min.js"></script>
    <script src="assets/js/vendors/chart.js"></script>
    <!-- Main Script -->
    <script src="assets/js/main.js?v=1.0" type="text/javascript"></script>
    <script src="assets/js/custom-chart.js" type="text/javascript"></script>
