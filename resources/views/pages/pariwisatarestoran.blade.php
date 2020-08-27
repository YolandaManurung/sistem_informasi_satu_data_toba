@extends('layouts.app', ['activePage' => 'pariwisata', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                    <div id="chart2">
                </div>
            </div>
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            
                            <div class="col-12 text-right">
                                <a href="{{url('formulir-pariwisata-restoran')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                        <h4 class="card-title" align="center">Jumlah Restoran/Rumah Makan</h4>


                            
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/pariwisatarestoran/exportpdf38" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead>
                                    <td align="center"><b>No</td>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Jumlah Restoran</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Status</td>
                                    <td><b>Aksi</td>
                                </thead>
                                <tbody>
                                    @foreach($tbl38 as $tabel38) 
                                    <tr>
                                    <td scope="row" align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel38 -> kecamatan}}</td>
                                    <td align="center">{{number_format($tabel38->jumlah, 0, ",", ",")}}</td>
                                    <td align="center">{{$tabel38 -> tahun}}</td>
                                    <td align="center">{{$tabel38 -> status}}</td>
                                    <td>
                                <a href="{{ url('/edit38/'.$tabel38->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/pariwisata/hapus38/{{ $tabel38->id }}" >Hapus</a>
                    </td>
                    </tr>
                                    @endforeach
                                    <tr>
                                    <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{number_format($jumlahrestoran,0,",",".")}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            {{ $tbl38->links() }}
                        </div>
                        </div>
                    </div>
                    </html>
                </div>
        </div>
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">

            <a class="page-link" href="{{url('/pariwisatakunjungan')}}" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
           <li class="page-item"><a class="page-link" href="{{url('/pariwisata')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatahotel')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatakapal')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisataobjek')}}">4</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatakunjungan')}}">5</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatarestoran')}}">6</a></li>
            
            <li class="page-item disabled">
            <a class="page-link" href="">Next</a>
            </li>
        </ul>
        </nav>
    </div>
@endsection


@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Restoran/Rumah Makan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories38)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah Restoran',
        data: {!!json_encode($data38)!!}

    }]
});
    </script>
@stop