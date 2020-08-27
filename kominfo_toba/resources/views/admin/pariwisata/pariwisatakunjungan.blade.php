@extends('layouts.app', ['activePage' => 'pariwisata', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <div id="chart1"></div>
                            </div>
                            <div class="carousel-item">
                            <div id="chart2"></div>   
                            </div>
                            <div class="carousel-item">
                            <div id="chart3"></div>   
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                           
                        <h4 class="card-title" align="center">Jumlah Kunjungan Kapal Penumpang Beserta Barang dan Angkutan</h4>


                            
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/pariwisatakunjungan/exportpdf37" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead>
                                    <td align="center"><b>No</td>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Jumlah Kapal</td>
                                    <td align="center"><b>Jumlah Penumpang</td>
                                    <td align="center"><b>Jumlah Barang</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Status</td>
                                </thead>
                                <tbody>
                                    @foreach($tbl37 as $tabel37) 
                                    <tr>
                                    <td scope="row" align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel37 -> kecamatan}}</td>
                                    <td align="center">{{number_format($tabel37->jumlah_kapal, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel37->jumlah_penumpang, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel37->jumlah_barang, 0, ",", ",")}}</td>
                                    <td align="center">{{$tabel37 -> tahun}}</td>
                                    <td align="center">{{$tabel37 -> status}}</td>
                                    <td align="center">
                                    <a href="{{ url('/edit_status37/'.$tabel37->id) }}" class="btn btn-sm btn-primary">View Detail</a>
                                    </td>
                                    @endforeach
                                    <tr>
                                    <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{number_format($jumlahkunjungan,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahkunjungan1,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahkunjungan2,0,",",".")}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tbody>
                            </table>
                            {{ $tbl37->links() }}
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
         <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">

            <a class="page-link" href="{{url('/admin/pariwisataobjek')}}" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
          <li class="page-item"><a class="page-link" href="{{url('/admin/pariwisata')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/pariwisatahotel')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/pariwisatakapal')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/pariwisataobjek')}}">4</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/pariwisatakunjungan')}}">5</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/admin/pariwisatarestoran')}}">6</a></li>
            
            <li class="page-item">
            <a class="page-link" href="{{url('/admin/pariwisatarestoran')}}">Next</a>
            </li>
        </ul>
        </nav>
    
@endsection 


@section('chart')
<script src="https:code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Kunjungan Kapal'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories34)!!},
        crosshair: true,
            
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
      name: 'Jumlah Kapal (Unit)',
        data: {!!json_encode($data34)!!}

    }]
});
    </script>
@stop


@section('charts')
<script src="https:code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Penumpang'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories34)!!},
        crosshair: true,
            
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
      name: 'Jumlah Penumpang (Orang)',
        data: {!!json_encode($data34a)!!}

    }]
});
    </script>
@stop


@section('charts1')
<script src="https:code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart3', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Barang'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories34)!!},
        crosshair: true,
            
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
     name: 'Jumlah Barang (Ton)',
        data: {!!json_encode($data34b)!!}

    }]
});
    </script>
@stop