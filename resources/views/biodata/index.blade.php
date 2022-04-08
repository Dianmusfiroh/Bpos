{{-- @extends('layout.page-transactions-1') --}}
@extends('layout.sidebar')
@include('layout.header')

        <div class="screen-overlay"></div>

        <main class="main-wrap">
            <section class="content-main">
                <div class="content-header">
                    <h2 class="content-title">Registrasi</h2>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div>
                                <header class="border-bottom mb-4 pb-4">
                                    <div class="row">
                                        <div class="col-lg-5 col-6 me-auto">
                                            <a href="#" class="btn btn-primary"><i class="material-icons md-plus"></i> Create new</a>

                                            {{-- <input type="text" placeholder="Search..." class="form-control" /> --}}
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
                                                <th>nama Toko</th>
                                                <th>Jenis Usaha</th>
                                                <th>Alamat</th>

                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    {{-- @foreach ($banks as $key => $bank) --}}


                                            <tr>
                                                <td><b></b></td>
                                                {{-- <td><b>{{ ($key+1) }}</b></td> --}}
                                                <td></td>
                                                <td>
                                                    <div class="icontext">
                                                        {{-- <img class="icon border" src="assets/imgs/card-brands/1.png" alt="Payment" /> --}}
                                                        <span class="text text-muted"></span>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-light font-sm rounded">Details</a>
                                                </td>

                                    {{-- @endforeach --}}
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


