

@include('layout.header')
@include('layout.sidebar')
@include('layouts.app')

<link href="{{ asset('assets/css/invoice.css') }}" rel="stylesheet" type="text/css" />


<main class="main-wrap">
    <section class="content-main">

        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Booth List</h2>
            </div>

        </div>
        <div class="card mb-4">
            <!-- card-header end// -->
            <div class="card-body">
                <div class="table-responsive">

                    <table id="myTable" class=" table table-hover">
                        <thead>
                            <tr>
                                <th>Nama Toko</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>No Hp</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach ($data as $item)
                                <tr>
                                    <td width="40%">
                                        <a href="{{ route($model . '.edit', $item->id_biodata) }}" title="{{ $item->nama_toko }}" alamat="{{$item->alamat}}" id="btnDetail" class="itemside">
                                            <div class="left">
                                                <img src="assets/imgs/people/avatar-1.png" class="img-sm img-avatar"
                                                    alt="Userpic" />
                                            </div>
                                            <div class="info pl-3">
                                                <h6 class="mb-0 title">{{ $item->nama_toko }}</h6>
                                                <small class="text-muted">{{ $item->jenis_usaha }}</small>
                                            </div>
                                        </a>
                                    </td>
                                    <td style="text-align: center">
                                        {{ $item->alamat }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->no_hp }}</td>
                                    <td class= "text-end">
                                        <div class="row align-items-start">
                                            <div class="col ">
                                            <a href="{{ route($model . '.show', $item->id_biodata) }}" class="material-icons md-remove_red_eye "></a>
                                            </div>
                                            <div class="col">
                                            <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$item->id_biodata}})"data-target="#DeleteModal" class="material-icons md-delete_outline"></a>
                                            </div>
                                            <div class="col">
                                            <div class="  form-check form-switch">
                                                <input data-ids="{{$item->id_biodata}}" class="form-check-input" type="checkbox" data-onstyle="success" {{ $item->status_toko ? 'checked' : '' }}>
                                            </div> </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- table-responsive.// -->
        {{--  {{$data->links()}}  --}}

            </div>
        </div>
        <!-- card-body end// -->
        </div>

        <div class="modal" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="invoice-card">
                    <div class="invoice-title">
                        <div id="main-title">
                            <h4 class="col-sm-7" >INVOICE</h4>
                        <h5 class="text-right text-bold " id="modal-title"></h5>
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
    </section>


</main>
{{--  <script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>  --}}
{{--  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@section('plugins.Datatables', true)
@include('sweetalert::alert')
@include('layouts.script.delete')
<script>
    $(function() {
      $('.form-check-input').change(function() {
          var status_toko = $(this).prop('checked') == true ? 1 : 0;
          var id_biodata = $(this).data('ids');

           console.log(status_toko)
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '{{ route('updateStatus') }}',
              data: {'status_toko': status_toko, 'id_biodata': id_biodata},
              success: function(data){
                console.log(url)
              }
          });
      })
    })
  </script>
<script>
    $('body').on('click', '#btnDetail', function (event) {
        event.preventDefault();
        var me = $(this),
            title = me.attr('title');
            alamat = me.attr('alamat');
            url = me.attr('href');
        $('#modal-title').text(title);
        $('#alamat').text(alamat);

        $.ajax({
            url: url,
            dataType: 'html',
            success: function (response) {
                $('#detail_user').html(response);
            }
        });
        $('#myModal').modal('show');
    });

</script>

<script>
    $("#myTable").DataTable({
                    "autoWidth": false,
                    "responsive": true
                });
</script>
{{--  @livewireScripts  --}}
</body>

</html>

