@extends('layouts.app', ['activePage' => 'kependudukan_jumlah_penduduk', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div id="chart2">
                </div>
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                
                     
                        <h4 class="card-title" align="center">Jumlah Penduduk Menurut Kecamatan dan Jenis Kelamin Kabupaten Toba Samosir</h4>

                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/kependudukan_jumlah_penduduk/exportpdf21" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <td align="center"><b>No</td>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Laki-laki</td>
                                    <td align="center"><b>Perempuan</td>
                                    <td align="center"><b>Total</td>
                                    <td align="center"><b>Tahun</td>
                                </tr>

                                </thead>
                                <tbody>
                                @foreach($tbl21 as $tabel21)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel21->kecamatan}}</td>
                                    <td align="center">{{number_format($tabel21->laki_laki,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel21->perempuan,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel21->laki_laki+$tabel21->perempuan,0,",",".")}}</td>
                                    <td align="center">{{$tabel21->tahun}}</td>
                                    <td></td>
                                    </tr>
                                @endforeach
                                <tr>
                                <td></td>
                                    <td align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{number_format($jumlah_laki_laki, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_perempuan, 0, ".", ".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlah_laki_laki+$jumlah_perempuan, 0, ".", ".")}}</td>
                                    <td></td>
                                    <td></td>
                                </tbody>
                            </table>
                            {{ $tbl21->links() }}
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
            <a class="page-link" href="" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
            <li class="page-item"><a class="page-link" href="{{url('/kependudukan_jumlah_penduduk')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kependudukan_jumlah_akta1')}}">2</a></li>
            
            <li class="page-item">
            <a class="page-link" href="{{url('/kependudukan_jumlah_akta1')}}">Next</a>
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
        text: 'Jumlah Penduduk Menurut Kecamatan dan Jenis Kelamin Kabupaten Toba Samosir'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories21)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jiwa'
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
        name: 'Laki-laki',
        data: {!!json_encode($data21)!!}

    }, {
        name: 'Perempuan',
        data: {!!json_encode($data21a)!!}

    }]
});
    </script>
@stop