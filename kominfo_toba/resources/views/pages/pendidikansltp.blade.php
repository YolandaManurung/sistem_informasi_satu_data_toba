@extends('layouts.app', ['activePage' => 'pendidikansltp', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">

                        <div class="col-12 text-right">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
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
                            <div class="carousel-item">
                            <div id="chart4"></div>   
                            </div>
                            <div class="carousel-item">
                            <div id="chart5"></div>   
                            </div>
                            <div class="carousel-item">
                            <div id="chart6"></div>   
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
                                <a href="{{url('formulir-pendidikan-sltp')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>

                        <h4 class="card-title" align="center">Jumlah SLTP, Murid, Guru, serta Lembaga Kabupaten Toba</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                
                        
                </div>
                     <div class="col-12 text-left">
                            <a href="/pendidikansltp/exportpdf41" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <thead>
                                    <td align="center"><b>No</td>
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Jumlah SLTP</td>
                                    <td align="center"><b>Jumlah Guru</td>
                                    <td align="center"><b>Jumlah Murid</td>
                                    <td align="center"><b>Negeri</td>
                                    <td align="center"><b>Swasta</td>
                                    <td align="center"><b>MI/MTs</td>
                                    <td align="center"><b>Status</td>
                                    <td><b>Aksi</td>
                                </thead>
                                <tbody>
                                    @foreach($tbl41 as $tabel41)
                                    <tr>
                                    <td scope="row" align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel41 -> kecamatan}}</td>
                                    <td align="center">{{$tabel41 -> tahun}}</td>
                                    <td align="center">{{number_format($tabel41->jumlah_sltp, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel41->jumlah_guru, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel41->jumlah_murid, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel41->negeri, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel41->swasta, 0, ",", ",")}}</td>
                                    <td align="center">{{number_format($tabel41->Madrasah_Ibtidaiyah_Tsanawiyah, 0, ",", ",")}}</td>
                                    <td align="center">{{$tabel41 -> status}}</td>
                                    <td>
                                <a href="{{ url('/edit41/'.$tabel41->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                            <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/pariwisata/hapus41/{{ $tabel41->id }}" >Hapus</a>
                    </td>
                    </tr>
                                    @endforeach
                                    <tr>
                                    <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td>
                                    <td></td>
                                    <td align="center"><b><b>{{number_format($jumlahsltp,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahsltp1,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahsltp2,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahsltp3,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahsltp4,0,",",".")}}</td>
                                    <td align="center"><b><b>{{number_format($jumlahsltp5,0,",",".")}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            {{ $tbl41->links() }}
                        </div>
                        </div>
                    </div>
                    </html>

            </div>
        </div>
        </div>
        </div>
         <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
            <a class="page-link" href="{{url('/pendidikansd')}}" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
            <li class="page-item"><a class="page-link" href="{{url('/pendidikanpaud')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pendidikansd')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/pendidikansltp')}}">3</a></li>
            
           <li class="page-item disabled">
            <a class="page-link" href="">Next</a>
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
        text: 'Jumlah SLTP Kabupaten Toba'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories41)!!},
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
        name: 'Jumlah SLTP',
        data: {!!json_encode($data41)!!}

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
        text: 'Jumlah Murid Kabupaten Toba'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories41)!!},
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
        name: 'Jumlah Murid',
        data: {!!json_encode($data41b)!!}

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
        text: 'Jumlah Guru Kabupaten Toba'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories41)!!},
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
        name: 'Jumlah Guru',
        data: {!!json_encode($data41b)!!}

    }]
});
    </script>
@stop

@section('charts2')
<script src="https:code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart4', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Lembaga Negeri Kabupaten Toba'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories41)!!},
        crosshair: true,
            
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Lembaga Negeri'
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
        name: 'Jumlah Lembaga Negeri',
        data: {!!json_encode($data41c)!!}

    }]
});
    </script>
@stop

@section('charts3')
<script src="https:code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart5', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Lembaga Swasta Kabupaten Toba'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories41)!!},
        crosshair: true,
            
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Lembaga Swasta'
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
        name: 'Jumlah Lembaga Swasta',
        data: {!!json_encode($data41d)!!}

    }]
});
    </script>
@stop
@section('charts4')
<script src="https:code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart6', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Lembaga MI/MTs Kabupaten Toba'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories41)!!},
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
        name: 'Jumlah Lembaga MI/MTs',
        data: {!!json_encode($data41e)!!}

    }]
});
    </script>
@stop
