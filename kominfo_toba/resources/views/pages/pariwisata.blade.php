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
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <div id="chart1"></div>
                            </div>
                            <div class="carousel-item">
                            <div id="chart2"></div>   
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
                    
                    <div class="col-12 text-right">
                                <a href="{{url('formulir-pariwisata-jumlah-wisata')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                
                        <h4 class="card-title" align="center">Jumlah Wisata yang Berkunjung per Bulan</h4>
                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>

                        <div class="col-12 text-left">

                        
                            <a href="/pariwisata/exportpdf33" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <td align="center"><b>No</td> 
                                    <td align="center"><b>Bulan</td> 
                                    <td align="center"><b>Wisata Asing</td>
                                    <td align="center"><b>Wisata Nusantara</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Status</td>
                                    <td><b>Aksi</td>
                                </thead>
                                <tbody>
                                    @foreach($tbl33 ?? '' as $tabel33) 
                                    <tr>
                                    <td scope="row" align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel33 -> bulan}}</td>
                                    <td align="center">{{number_format($tabel33->wisata_asing,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel33->wisata_nusantara,0,",",".")}}</td>
                                    <td align="center">{{$tabel33 -> tahun}}</td>
                                    <td align="center">{{$tabel33 -> status}}</td>
                                    <td>
                                     <a href="{{ url('/edit33/'.$tabel33->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/pariwisata/hapus33/{{ $tabel33->id }}">Hapus</a>
                    </td>
                
                                  
                    </tr>
                                    @endforeach

                                    <tr>
                                    <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td>
                                    <td align="center"><b><b>{{number_format($jumlahpariwisata ,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahnusantara,0,",",".")}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td> 
                                    </tr>
                                </tbody>
                            </table>
                            {{ $tbl33 ?? '' ?? ''->links() }}
                        </div>
                        </div>
                    </div>
                    </html>
                </div>
        </div>
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">

            <a class="page-link" href="" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
          <li class="page-item"><a class="page-link" href="{{url('/pariwisata')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatahotel')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatakapal')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisataobjek')}}">4</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatakunjungan')}}">5</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pariwisatarestoran')}}">6</a></li>
            
            <li class="page-item">
            <a class="page-link" href="{{url('/pariwisatahotel')}}">Next</a>
            </li>
        </ul>
        </nav>
    </div>
@endsection


@section('chart')
<script src="https:code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Wisata Asing yang Berkunjung per Bulan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories33)!!},
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
        name: 'Jumlah Wisata Asing',
        data: {!!json_encode($data33)!!}

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
        text: 'Jumlah Wisata Nusantara yang Berkunjung per Bulan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories33)!!},
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
        name: 'Jumlah Wisata Nusantara',
        data: {!!json_encode($data33a)!!}

    }]
});
    </script>
@stop