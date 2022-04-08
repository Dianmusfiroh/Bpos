@extends('layout.sidebar')
@include('layout.header')
<div class="screen-overlay"></div>

<main class="main-wrap">

    <section class="content-main">
        <div class="content-header">
            <a href="javascript:history.back()"><i class="material-icons md-arrow_back"></i> Go back </a>
        </div>
        <div class="card mb-4">
            <div class="card-header bg-brand-2" style="height: 150px"></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl col-lg flex-grow-0" style="flex-basis: 230px">
                        <div class="img-thumbnail shadow w-100 bg-white position-relative text-center"
                            style="height: 190px; width: 200px; margin-top: -120px">
                            <img src="{{ asset('') }}"
                                class="center-xy img-fluid" alt="Logo Brand" />
                        </div>
                    </div>
                    <!--  col.// -->

                    @foreach($detail as $item)


                        <div class="col-xl col-lg">
                            <h3>{{ $item->nama_toko }}<b>({{ $item->nama_lengkap }})</b></h3>
                            <p>{{ $item->jenis_usaha }}</p>
                        </div>
                        <div class="col-xl-4 text-md-end">
                            
                            @if ($item->status_toko == '0')
                            <div class="btn alert-danger col-xl-7">Nonaktif</div>
                            @else ($item->status_toko == '1')
                            <div class="btn alert-success col-xl-7">Aktif</div>
                            @endif
                        </div>
                </div>
                @endforeach

                <!-- card-body.// -->
                <hr class="my-4" />
                <div class="row g-4">
                    <div class="col-md-12 col-lg-4 col-xl-2">
                        <article class="box">
                            <p class="mb-0 text-muted">Fee Bulan:</p>
                            <h5 class="text"> @if ($item->bulan == '01')Januari
                                @elseif ($item->bulan =='02')Februari
                                @elseif ($item->bulan == '03')Maret
                                @elseif ($item->bulan == '04')April
                                @elseif ($item->bulan == '05')Mei
                                @elseif ($item->bulan == '06')Juni
                                @elseif ($item->bulan == '07')Juli
                                @elseif ($item->bulan == '08')Agustus
                                @elseif ($item->bulan == '09')September
                                @elseif ($item->bulan == '10')Oktober
                                @elseif ($item->bulan == '11')November
                                @elseif ($item->bulan == '12')Desember
                                @endif -{{$item->tahun}}</h5>
                            <p class="mb-0 text-muted">Total:</p>
                            <h5 class="text mb-0"> @if ($item->status == 'belum')
                                <div class="badge rounded-pill alert-danger"> @currency($item->jumlah_bayar)</div>
                                @else ($item->status == 'lunas')
                                <div class="badge rounded-pill alert-success">@currency ($item->jumlah_bayar)</div>
                                @endif </h5>
                        </article>
                    </div>

                    <div class="col-md-12 col-lg-4 col-xl-2">
                        <article class="box">
                            <p class="mb-0 text-muted">Transaksi:</p>
                            @foreach ($transaksi as $item )
                            <h5 class="text ">{{$item->jumlah}} </h5>
                            <p class="mb-0 text-muted">Total:</p>
                            <h5 class="text mb-0"> {{$item->total}} </h5>
                            @endforeach

                        </article>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-2">
                        <article class="box " style="background-color: #ff5c5c">
                            <p class="mb-12 " style="color: #fff;">Jumlah Produk:</p>
                            <h1 class="text text-center " style="color: #fff;" >{{$produk->count()}}</h1>
                        </article>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-2">
                        <article class="box" style="background-color: #ff5c5c">
                            <p class="mb-12" style="color: #fff;">Jumlah Pelanggan:</p>
                            <h1 class="text text-center " style="color: #fff;">{{$pelanggan->count() }} </h1>
                        </article>
                    </div>
                    <!--  col.// -->
                    @foreach($detail as $item)

                    <div class="col-sm-6 col-lg-4 col-xl-3 text-md-left">
                        <h6>Contacts</h6>
                        <p>
                            No. Telp: {{ $item->no_hp }} <br />
                            {{ $item->email }} <br />
                        </p>
                        <h6>Address</h6>
                        <p>
                            {{ $item->alamat }}
                        </p>
                    </div>
                    </div>
                    @endforeach

                </div>
                <!--  row.// -->
            </div>
            <!--  card-body.// -->

        </div>

    </section>

</main>
<script src="{{ asset('/assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/assets/js/vendors/select2.min.js') }}"></script>
<script src="{{ asset('/assets/js/vendors/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('/assets/js/vendors/jquery.fullscreen.min.js') }}"></script>
<!-- Main Script -->
<script src="{{ asset('\/assets/js/main.js?v=1.0') }}" type="text/javascript"></script>
</body>

</html>
