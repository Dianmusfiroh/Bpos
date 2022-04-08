<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        line-height: 24px;
        font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
        color: #555;
      }

      .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
      }

      .invoice-box table td {
        padding: 5px;
        vertical-align: top;
      }

      .invoice-box table tr td:nth-child(n + 2) {
        text-align: left;
      }

      .invoice-box table tr.top table td {
        padding-bottom: 20px;
      }

      .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
      }

      .invoice-box table tr.information table td {
        padding-bottom: 40px;
      }

      .invoice-box table tr.heading td {
        background: rgb(146, 144, 144);
        border-bottom: 1px solid hsl(0, 0%, 87%);
        font-weight: bold;
      }

      .invoice-box table tr.details td {
        padding-bottom: 20px;
      }

      .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
      }

      .invoice-box table tr.item.last td {
        border-bottom: none;
      }

      .invoice-box table tr.item input {
        padding-left: 5px;
      }

      .invoice-box table tr.item td:first-child input {
        margin-left: -5px;
        width: 100%;
      }

      .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
      }

      .invoice-box input[type="number"] {
        width: 60px;
      }

      @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
          width: 100%;
          display: block;
          text-align: center;
        }

        .invoice-box table tr.information table td {
          width: 30%;
          display: block;
          text-align: center;
        }
      }

      /** RTL **/
      .rtl {
        direction: rtl;
        font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial,
          sans-serif;
      }

      .rtl table {
        text-align: right;
      }

      .rtl table tr td:nth-child(2) {
        text-align: left;
      }


</style>

       <div class="invoice-box">
        <div class="modal-header">

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="4">

                        <table>

                            <tr>
                        @foreach ( $detail as  $item )

                                <td class="title">
                                    <img src="{{ asset('assets/imgs/brands/LOGO BPOS.png')}}"
                                        style="width:100%; max-width:150px;">
                                </td>

                                <td>
                                    @if ($item->status == 'belum') Status : Belum Bayar
                                    @elseif ($item->status == 'lunas') Status : Lunas
                                    @endif
                                    <br>  {{ \Carbon\Carbon::now()->format('d/M/y') }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr >
                    <td colspan="1">Nama Toko</td>
                    <td>: {{$item->nama_toko}}</td>
                </tr>
                <tr>
                    <td>Nama Owner</td>
                    <td>: {{$item->nama_lengkap}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{$item->alamat }}</td>
                </tr>
                <tr class="heading">
                    <td colspan="3">Tanggal</td>
                    <td> Total Bayar</td>
                </tr>
                <tr class="details">
                    <td colspan="3">
                        @if ($item->bulan == '01')Januari
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
                        @endif -{{$item->tahun}}
                    </td>
                    <td> @currency($item->jumlah)</td>
                </tr>

                <tr class="total">
                    <td colspan="3"></td>
                    {{--  <td>Total: ${{ total | currency }}</td> --}}
@endforeach

                </tr>

            </table>
            <div class="modal-footer">
                {{--  <button type="submit" class="btn btn-primary">Save</button>  --}}
                </div>
        </div>



