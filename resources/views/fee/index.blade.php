
@include('layout.header')
@include('layout.sidebar')
@include('layouts.app')

<div class="screen-overlay"></div>
<div class="body">
<main class="main-wrap">

    <section class="content-main">
        <div class="container mt-8">
            <div class="row">
                <div class="col-sm-6 ">

                    <div class="card ">

                        @csrf
                        <div class="card-body ">
                            <h5 class="card-title">Fee Booth</h5>
                            <table>
                            <div class="row mb-4 ptb-45">
                                <div class="col-lg-9">
                                    @foreach($fees as $item)
                                    <input type="text" name="fee" id="fee" class="form-control"
                                        placeholder="{{ $item->fee }}%" readonly />
                                </div>
                                <a href="{{ route($model . '.edit', $item->id_fee) }}" title="{{ $item->fee }}" class="btn btn-primary col-lg-3 btn-modal"> Edit</a>
                                @endforeach
                            </div>
                        </table>
                        </div>
                    </div>
                </div>
{{--  Modal  --}}

            <div class="col-sm-6">
                <div class="card ptb-0">
                    <div class="card-body">
                        <table>
                            <tr>
                                <th rowspan="2"><h5 class="card-title "> Rekening</h5>
                                </th>
                                <th>
                                <a href="{{ route($model . '.create') }}" id="btnBank"  class="material-icons md-add"> </a>
                                </th>
                            </tr>
                    </table>
                    {{--  <div class="table">  --}}
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">

                        <table class="table" >


                            <tablehead>
                                @foreach ( $adminBank as $item )

                                <tr>

                                    <th >
                                        <div class="icontext">
                                        <span class="text text-muted">{{$item->nama_bank}}</span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="icontext">
                                        <span class="text text-muted">{{$item->no_rekening}}</span>
                                        </div>
                                    </th>
                                    <th>

                                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$item->id_admin_bank}})"
                                            data-target="#DeleteModal" class="material-icons md-delete_outline">
                                            </a>
                                    </th>

                                    @endforeach

                                </tr>

                            </tablehead>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header">
            {{-- <a href="#" class="btn btn-red font-sm">
                <i class="ext-muted material-icons md-post_add"></i>Apply</a> --}}
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                {{-- <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" />
                                                </div> --}}
                                            </th>
                                            <th>Nama Booth</th>
                                            <th>Nama Owner</th>
                                            <th>Fee</th>
                                            <th>Tanggal</th>
                                            <th>Total Bayar </th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php $strBulan ?>
                                            @foreach($detail  as $key => $item)

                                            <td class="text-center">
                                               {{$no++}}
                                            </td>
                                            <td>{{ $item->nama_toko }}</td>
                                            <td><b>{{ $item->nama_lengkap }}</b></td>
                                            <td>{{ $item->fee }}%</td>
                                            <td>
                                                @if  (  $item->bulan == '01')
                                                @php $strBulan = "Januari"; @endphp

                                                @elseif ($item->bulan =='02')
                                                @php $strBulan = "Februari"; @endphp
                                                Februari
                                                @elseif ($item->bulan == '03')
                                                <?php $strBulan = "Maret"; ?>
                                                Maret
                                                @elseif ($strBulan = $item->bulan == '04')April
                                                @php $strBulan = "April"; @endphp
                                                @elseif ($item->bulan == '05')Mei
                                                @php $strBulan = "Mei"; @endphp
                                                @elseif ($item->bulan == '06')Juni
                                                @php $strBulan = "Juni"; @endphp
                                                @elseif ($item->bulan == '07')Juli
                                                @php $strBulan = "Juli"; @endphp
                                                @elseif ($item->bulan == '08')Agustus
                                                @php $strBulan = "Agustus"; @endphp
                                                @elseif ($item->bulan == '09')September
                                                @php $strBulan = "September"; @endphp
                                                @elseif ($item->bulan == '10')Oktober
                                                @php $strBulan = "Oktober"; @endphp
                                                @elseif ($item->bulan == '11')November
                                                @php $strBulan = "November"; @endphp
                                                @elseif ($item->bulan == '12')Desember
                                                @php $strBulan = "Desember"; @endphp
                                                @endif
                                                -{{$item->tahun}}
                                            </td>
                                            <td>
                                                @if ($item->status == 'belum')

                                                <div class="badge rounded-pill alert-danger">Rp. {{$item->jumlah_bayar}}</div>

                                                @else ($item->status == 'lunas')
                                                <div class="badge rounded-pill alert-success">Rp. {{$item->jumlah_bayar}}</div>
                                                @endif
                                            </td>
                                            <td class="text-center">

                                                <a href="{{ route( $model.'.show', $item->id_biodata) }} " id="btnDetail"
                                                        class="btn btn-sm btn-blue "> Detail </a>
                                                    {{--  <a href="http://api.whatsapp.com/send?phone=62{{ $item->no_hp }}&text=Hallo {{ $item->nama_toko }}%20Owner%20Dari%20Booth%20{{ $item->nama_lengkap }}%20Berikut%20Tagihan%20pembayaran%20BPOS%20Anda%20Untuk%20Bulan%20{{$strBulan}}-{{$item->tahun}}%20Sebesar%20Rp.%20{{$item->jumlah_bayar}}%0A%0ASilahkan%20Lakukan%20Pembayaran%20Ke%20Rekening%20Berikut:%0A@foreach($adminBank as $admin){{$admin->nama_bank}}%20{{$admin->no_rekening}}%0A @endforeach%0A%0A%0Aa.n%20klikdigital%20indonesia%0A%0AUntuk%20Bukti%20Transaksi%20Bisa%20Dilihat%20Di%20Link%20Berikut%0A{{ route( $model.'.downloadPdf', $item->id_biodata) }}"
                                                    target="_blank"  class="btn btn-sm btn-md">Send  --}}

                                                    <a href="http://api.whatsapp.com/send?phone=62{{ $item->no_hp }}&text=Hallo {{ $item->nama_lengkap }}%20Owner%20Dari%20Booth%20{{ $item->nama_toko }}%20Berikut%20Tagihan%20pembayaran%20BPOS%20Anda%20Untuk%20Bulan%20{{$strBulan}}-{{$item->tahun}}%20Sebesar%20Rp.%20{{$item->jumlah_bayar}}%0A%0ASilahkan%20Lakukan%20Pembayaran%20Ke%20Rekening%20Berikut:%0A @foreach($adminBank as $admin){{$admin->nama_bank}}%20{{$admin->no_rekening}}%0A @endforeach%0Aa.n%20klikdigital%20indonesia%0A%0AUntuk%20Bukti%20Transaksi%20Bisa%20Dilihat%20Di%20Link%20Berikut%0A{{ route( $model.'.downloadPdf', $item->id_biodata) }}"
                                                        target="_blank"  class="btn btn-sm btn-md">Send
                                                        </a>


                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- .row // -->

                </div>

                <!-- card body .// -->
            </div>
        </div>

    </section>
    {{--  modalFee  --}}
    <div class="modal fade" id="modalFee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Ubah Fee Booth Dari &nbsp; </h5>
            <h5 class="modal-title" id="modal-title"></h5><h5>% Ke :</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-body">

            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        </div>
    </div>
</div>
{{--  modal Bank  --}}
<div class="modal fade" id="modalFee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5>Ubah Fee Booth Dari &nbsp; </h5>
        <h5 class="modal-title" id="modal-title"></h5><h5>% Ke :</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modal-body">
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
    </div>
</div>
</div>

<div class="modal fade" id="modalBank" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5>Input Data Bank; </h5>
        <h5 class="modal-title" id="modal-title">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="bodyBank">

        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
    </div>
</div>
</div>

    <div class="modal fade bd-example-modal-lg" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div  id="bodyDetail">
        </div>
    </div>
    </div>
    </div>

<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="invoice-card">
            <div class="invoice-title">
                <div id="main-title">
                    <h4>INVOICE</h4>
                <h5 class="text-right text-bold" id="modal-title"></h5>
            </div>
            <span> {{ \Carbon\Carbon::now()->format('d/m/y') }}</span>
            <div>
            <h6 class="text-right text-bold" id="alamat"></h6>
        </div>
            </div>
            <div class="invoice-details" id="detail_user">
            </div>
            <div class="invoice-footer">
            </div>
        </div>
    </div>
</div>

    <footer class="main-footer font-xs">
        <div class="row pb-30 pt-15">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear());
                </script>
                {{--  ©, Nest - HTML Ecommerce Template .  --}}
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end">All rights reserved</div>
            </div>
        </div>
    </footer>
</main>
@include('sweetalert::alert')
@include('layouts.script.delete')


<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<script>
    $("#myTable").DataTable({
                    "autoWidth": false,
                    "responsive": true
                });
</script>
<script>
    $('body').on('click', '#btnBank', function (event) {
        event.preventDefault();
        var me = $(this),
            url = me.attr('href');
        $.ajax({
            url: url,
            dataType: 'html',
            success: function (response) {
                $('#bodyBank').html(response);
            }
        });
        $('#modalBank').modal('show');
    });

</script>
<script>
    $('body').on('click', '#btnDetail', function (event) {
        event.preventDefault();
        var me = $(this),
            url = me.attr('href');
        $.ajax({
            url: url,
            dataType: 'html',
            success: function (response) {
                $('#bodyDetail').html(response);
            }
        });
        $('#modalDetail').modal('show');
    });

</script>

<script>
    $('body').on('click', '.btn-modal', function (event) {
        event.preventDefault();
        var me = $(this),
            url = me.attr('href'),
            title = me.attr('title');
        $('#modal-title').text(title);
        $.ajax({
            url: url,
            dataType: 'html',
            success: function (response) {
                $('#modal-body').html(response);
            }
        });
        $('#modalFee').modal('show');
    });

</script>
<script>

    $(document).ready(function () {
        $("#saveFee").click(function () {
            var fee = $('#fee').val();
            save(fee);
        });
    });

    function save(fee) {
        $.ajax({
            method: "POST",
            data: {
                fee: fee
            },
            success: function (data) {
                console.log(data); {

                }

            }
        });
    }

</script>

@section('plugins.Datatables', true)
@section('js')



@endsection

</body>

</html>
