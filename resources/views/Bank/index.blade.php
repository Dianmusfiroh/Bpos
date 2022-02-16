{{-- @extends('layout.page-transactions-1') --}}
@extends('layout.sidebar')
{{-- @extends('layout.header') --}}

        <div class="screen-overlay"></div>
   
        <main class="main-wrap">
            <header class="main-header navbar">
{{-- @extends('layout.header') --}}
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
            {{-- </header> --}}
            <section class="content-main">
                <div class="content-header">
                    <h2 class="content-title">Bank</h2>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div>
                                <header class="border-bottom mb-4 pb-4">
                                    <div class="row">
                                        <div class="col-lg-5 col-6 me-auto">
                                            <input type="text" placeholder="Search..." class="form-control" />
                                        </div>
                                        <div class="col-lg-2 col-6">
                                            <select class="form-select">
                                                <option>Method</option>
                                                <option>Master card</option>
                                                <option>Visa card</option>
                                                <option>Paypal</option>
                                            </select>
                                        </div>
                                    </div>
                                </header>
                                <!-- card-header end// -->
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                  <th>nama Pemilik</th>
                                                <th>Bank</th>
                                                <th>Nomor Rekening</th>
                                             
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                     @foreach ($banks as $key => $bank)
                                         
                                   
                                            <tr>
                                                <td><b>{{ ($key+1) }}</b></td>
                                                <td>{{$bank->pemilik}}</td>
                                                <td>
                                                    <div class="icontext">
                                                        {{-- <img class="icon border" src="assets/imgs/card-brands/1.png" alt="Payment" /> --}}
                                                        <span class="text text-muted">{{$bank->bank}}</span>
                                                    </div>
                                                </td>
                                                <td>{{$bank->rekening}}</td>
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-light font-sm rounded">Details</a>
                                                </td>
                                         
                                       @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- table-responsive.// -->
                            </div>
                            <!-- col end// -->
                            {{-- <aside class="col-lg-3">
                                <div class="box bg-light" style="min-height: 80%">
                                    <p class="text-center text-muted my-5">
                                        Please select transaction <br />
                                        to see details
                                    </p>
                                </div>
                            </aside> --}}
                            <!-- col end// -->
                        </div>
                        <!-- row end// -->
                    </div>
                    <!-- card-body // -->
                </div>
                <!-- card end// -->
                <div class="pagination-area mt-30 mb-50">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            <li class="page-item active"><a class="page-link" href="#">01</a></li>
                            <li class="page-item"><a class="page-link" href="#">02</a></li>
                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                            <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">16</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </section> 
           <footer class="main-footer font-xs">
                <div class="row pb-30 pt-15">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        ©, Nest - HTML Ecommerce Template .
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end">All rights reserved</div>
                    </div>
                </div>
            </footer>
        </main>
        <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
        <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
        <script src="assets/js/vendors/select2.min.js"></script>
        <script src="assets/js/vendors/perfect-scrollbar.js"></script>
        <script src="assets/js/vendors/jquery.fullscreen.min.js"></script>
        <!-- Main Script -->
        <script src="assets/js/main.js?v=1.0" type="text/javascript"></script>
    </body>
</html>


