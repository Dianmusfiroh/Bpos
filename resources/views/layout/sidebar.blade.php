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
        <!-- <link rel="shortcut icon" type="image/x-icon" href="resource/assets/imgs/theme/favicon.svg" /> -->
        {{-- <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.svg" /> --}}
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/theme/ICON BPOS.png') }}" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Template CSS -->
        <link href="{{ asset('assets/css/main.css?v=1.0')}}" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div class="screen-overlay"></div>
        <aside class="navbar-aside" id="offcanvas_aside">
            <div class="aside-top">
                <a href="<?=url('/')?>" class="brand-wrap">
                    <img src="{{ asset('assets/imgs/brands/LOGO BPOS.png')}}" class="logo" alt="Bpos" />
                </a>
                <div>
                    <button class="btn btn-icon btn-aside-minimize"><i class="text-muted material-icons md-menu_open"></i></button>
                </div>
            </div>
            <nav>
                <ul class="menu-aside">
                    <li class="menu-item active">
                        <a class="menu-link" href="<?=url('/')?>">
                            <i class="icon material-icons md-home"></i>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a class="menu-link" href="<?=url('booth')?>">
                            <i class="icon material-icons md-format_list_bulleted"></i>
                            <span class="text">List Booth</span>
                        </a>

                    <li class="menu-item ">
                        <a class="menu-link" href="<?=url('order')?>">
                            <i class="icon material-icons md-settings "></i>

                            <span class="text">Pengaturan Fee</span>
                        </a>

                    </li>
                    <li class="menu-item ">
                        <a class="menu-link" href="<?=url('biodata') ?>">
                            <i class="icon material-icons md-store"></i>
                            <span class="text">Form Registrasi</span>
                        </a>
                    </li>





                </ul>

                </ul>
                <br />
                <br />
            </nav>
        </aside>
            {{-- <main class="main-wrap">
                <header class="main-header navbar">
                        <div class="col-search">
                            <form class="searchform">
                                <div class="input-group">
                                    <input list="search_terms" type="text" class="form-control" placeholder="Search term" />
                                    <button class="btn btn-light bg" type="button"><i class="material-icons md-search"></i></button>
                                </div>
                                <datalist id="search_terms">
                                    <option value="Products"></option>
                                    <option value="New orders"></option>
                                    <option value="Apple iphone"></option>
                                    <option value="Ahmed Hassan"></option>
                                </datalist>
                            </form>
                        </div>
                        <div class="col-nav">
                            <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"><i class="material-icons md-apps"></i></button>
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link btn-icon" href="#">
                                        <i class="material-icons md-notifications animation-shake"></i>
                                        <span class="badge rounded-pill">3</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn-icon darkmode" href="#"> <i class="material-icons md-nights_stay"></i> </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="requestfullscreen nav-link btn-icon"><i class="material-icons md-cast"></i></a>
                                </li>
                                <!-- <li class="dropdown nav-item">
                                    <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownLanguage" aria-expanded="false"><i class="material-icons md-public"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">
                                        <a class="dropdown-item text-brand" href="#"><img src="/resources/assets/imgs/theme/flag-us.png" alt="English" />English</a>
                                        <a class="dropdown-item" href="#"><img src="/resources/assets/imgs/theme/flag-fr.png" alt="Français" />Français</a>
                                        <a class="dropdown-item" href="#"><img src="/resources/assets/imgs/theme/flag-jp.png" alt="Français" />日本語</a>
                                        <a class="dropdown-item" href="#"><img src="/resources/assets/imgs/theme/flag-cn.png" alt="Français" />中国人</a>
                                    </div>
                                </li> -->
                                <li class="dropdown nav-item">
                                    <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="assets/imgs/people/avatar-2.png" alt="User" /></a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                                        <a class="dropdown-item" href="#"><i class="material-icons md-perm_identity"></i>Edit Profile</a>
                                        <a class="dropdown-item" href="#"><i class="material-icons md-settings"></i>Account Settings</a>
                                        <a class="dropdown-item" href="#"><i class="material-icons md-account_balance_wallet"></i>Wallet</a>
                                        <a class="dropdown-item" href="#"><i class="material-icons md-receipt"></i>Billing</a>
                                        <a class="dropdown-item" href="#"><i class="material-icons md-help_outline"></i>Help center</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#"><i class="material-icons md-exit_to_app"></i>Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </header>
 --}}

        <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
        <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
        <script src="assets/js/vendors/select2.min.js"></script>
        <script src="assets/js/vendors/perfect-scrollbar.js"></script>
        <script src="assets/js/vendors/jquery.fullscreen.min.js"></script>
        <script src="assets/js/vendors/chart.js"></script>
        <!-- Main Script -->
        <script src="assets/js/main.js?v=1.0" type="text/javascript"></script>
        <script src="assets/js/custom-chart.js" type="text/javascript"></script>
