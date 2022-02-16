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
                    <h2 class="content-title">Booth list</h2>
                    {{-- <div>
                        <a href="#" class="btn btn-primary"><i class="material-icons md-plus"></i> Create new</a>
                    </div> --}}
                </div>
                <div class="card mb-4">
                    <header class="card-header">
                        <div class="row gx-3">
                            <div class="col-lg-4 col-md-6 me-auto">
                                <input type="text" placeholder="Search..." class="form-control" />
                            </div>
                            <div class="col-lg-2 col-md-3 col-6">
                                <select class="form-select">
                                    <option>Status</option>
                                    <option>Active</option>
                                    <option>Disabled</option>
                                    <option>Show all</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-3 col-6">
                                <select class="form-select">
                                    <option>Show 20</option>
                                    <option>Show 30</option>
                                    <option>Show 40</option>
                                </select>
                            </div>
                        </div>
                    </header>
                    <!-- card-header end// -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Toko</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>No Hp</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @dump($booths) --}}
                                @foreach ($data as $item)

                                    <tr>
                                        <td width="40%">
                                            <a data-bs-toggle="modal" data-bs-target="#myModal" class="itemside">
                                                <div class="left">
                                                    <img src="assets/imgs/people/avatar-1.png" class="img-sm img-avatar" alt="Userpic" />
                                                </div>

                                                <div class="info pl-3">


                                                    <h6 class="mb-0 title">{{$item->nama}}</h6>

                                                    <small class="text-muted">{{ $item->jenis_usaha}}</small>

                                                    {{-- <small class="text-muted">{{ $item->jenisUsaha ? $item->jenisUsaha->id_jenis_usaha : ''}}</small> --}}
                                                    {{-- @dump($item->jenisUsaha) --}}
                                                    {{-- dd($item->jenisUsaha) --}}
                                                </div>
                                            </a>
                                        </td>
                                        <td>{{$item->alamat}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->no_hp}}</td>
                                        <td class="text-end">
                                            <a href="{{ route($modul.'.show', $item->id) }}" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                        </td>
                                    </tr>
                                            @endforeach



                                </tbody>
                            </table>

                                </div>
                            <!-- table-responsive.// -->
                        </div>
                    </div>
                    <!-- card-body end// -->
                </div>
                <div class="modal" id="myModal">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">info status pembayaran</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <!-- Modal body -->

                        <div class="modal-body">

                            @foreach ($statusFee as $item )
                            {{$item->nama_toko}} <br>
                            @if ($item->bulan == '01')
                            Januari
                            @elseif ($item->bulan == '02')
                            Februari
                            @elseif ($item->bulan == '03')
                            Maret
                            @elseif ($item->bulan == '04')
                            April
                            @elseif ($item->bulan == '05')Mei
                            @elseif ($item->bulan == '06')Juni
                            @elseif ($item->bulan == '07')Juli
                            @elseif ($item->bulan == '08')Agustus
                            @elseif ($item->bulan == '09')September
                            @elseif ($item->bulan == '10')Oktober
                            @elseif ($item->bulan == '11')November
                            @elseif ($item->bulan == '12')Desember

                            @endif
                            {{$item->tahun}}

                            @if ($item->status == 'belum')
                            <div class="btn btn-danger">{{ $item->status}}</div>
                            @else ($item->status == 'lunas')
                            <div class="btn btn-primary">{{ $item->status}}</div>

                            @endif

                            {{$item->jumlah_bayar}}

                            {{--  @dump($item->bulan);  --}}

                            {{--  {{ \Carbon\Carbon::now($item->bulan)->format('d M y') }}  --}}
                            {{--  @dump($item->bulan)  --}}
                                {{--  {{$item->bulan}}  --}}
                            @endforeach
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>

                        </div>
                    </div>
                <!-- card end// -->
                {{--  <div class="pagination-area mt-15 mb-50">
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
                </div>  --}}
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>


