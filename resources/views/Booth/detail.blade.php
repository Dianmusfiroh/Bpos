<table class="invoice-table" id="fee-table">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Jumlah Bayar</th>
        </tr>
    </thead>
    <tbody>
        <tr class="row-data">
            @foreach ($data as $item )
            <th>@if ($item->bulan == '01')Januari
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
                @endif -{{$item->tahun}}</th>
            <th>@if ($item->status == 'belum')
                <div class="badge rounded-pill alert-danger">{{ $item->status}}</div>
                @else ($item->status == 'lunas')
                <div class="badge rounded-pill alert-success">{{ $item->status}}</div>

                @endif
            <th>@currency($item->jumlah_bayar)</th>
        </tr>
        @endforeach
    </tbody>
</table>
