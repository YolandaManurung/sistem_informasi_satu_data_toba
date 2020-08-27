@extends('layouts.app', ['activePage' => 'peternakan_populasi_ternak_besar', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                             <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                      
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <div id="charts"></div> 
                            </div>

                            <div class="carousel-item">
                            <div id="charts1"></div>   
                            </div>

                            <div class="carousel-item">
                            <div id="charts2"></div>   
                            </div>

                            <div class="carousel-item">
                            <div id="charts3"></div>   
                            </div>

                            <div class="carousel-item">
                            <div id="charts4"></div>   
                            </div>

                            <div class="carousel-item">
                            <div id="charts5"></div>   
                            </div>

                            <div class="carousel-item">
                            <div id="charts6"></div>   
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


                      

                      
                     <h4 class="card-title" align="center">Populasi Ternak Besar Menurut Kecamatan dan Jenis Ternak (Ekor)</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        <!-- </div> -->
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">

                            <a href="/peternakan_populasi_ternak_besar/exportpdf1" class="btn btn-sm btn-warning"   >CETAK PDF</a>

                                <thead>
                                <tr>
                                    <td><b>No</td>
                                    <td><b>Kecamatan</td>
                                    <td><b>Sapi Perah</td>
                                    <td><b>Sapi Potong</td>
                                    <td><b>Kerbau</td>
                                    <td><b>Kuda</td>
                                    <td><b>Kambing</td>
                                    <td><b>Domba</td>
                                    <td><b>Babi</td>
                                    <td><b>Tahun</td>
                                    <td><b>Status</td>
                                    <td></td>
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tbl1 as $tabel1)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{$tabel1->kecamatan}}</td>
                                    <td>{{number_format($tabel1->sapi_perah,0,",",".")}}</td>
                                    <td>{{number_format($tabel1->sapi_potong,0,",",".")}}</td>
                                    <td>{{number_format($tabel1->kerbau,0,",",".")}}</td>
                                    <td>{{number_format($tabel1->kuda,0,",",".")}}</td>
                                    <td>{{number_format($tabel1->kambing,0,",",".")}}</td>
                                    <td>{{number_format($tabel1->domba,0,",",".")}}</td>
                                    <td>{{number_format($tabel1->babi,0,",",".")}}</td>    
                                    <td>{{$tabel1->tahun}}</td>
                                    <td>{{$tabel1->status}}</td>
                                   <td align="center"> <a href="{{ url('/edit_status1/'.$tabel1->id) }}" class="btn btn-sm btn-primary">View Detail</a>
                                    </td>
                                    <td></td>
                                  
                                 
                                 
                                    </tr>
                                    @endforeach 
                                    
                                    <tr>
                                    <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                    <td><b><b>{{number_format($jumlah1,0,",",".")}}</td><b><b>
                                    <td><b><b>{{number_format($jumlah2,0,",",".")}}</td><b><b>
                                    <td><b><b>{{number_format($jumlah3,0,",",".")}}</td><b><b>
                                    <td><b><b>{{number_format($jumlah4,0,",",".")}}</td><b><b>
                                    <td><b><b>{{number_format($jumlah5,0,",",".")}}</td><b><b>
                                    <td><b><b>{{number_format($jumlah6,0,",",".")}}</td><b><b>
                                    <td><b><b>{{number_format($jumlah7,0,",",".")}}</td><b><b>
                                    <td></td>    
                                    <td>
                                   </td>
                                    <td>
                                   
                                    </td>
                                    <td>
                                   
                                   </td>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
  
            </div>
        </div>

        <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="{{url('/admin/peternakan_populasi_ternak_besar')}}" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    
    <li class="page-item"><a class="page-link" href="{{url('/admin/peternakan_populasi_ternak_besar')}}">1</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/admin/peternakan_populasi_ternak_unggas_dan_jenis_ternak')}}">2</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/admin/peternakan_jumlah_ternak_dipotong')}}">3</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/admin/peternakan_jumlah_ternak_unggas_dipotong')}}">4</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/admin/peternakan_jumlah_produksi_ternak_unggas')}}">5</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/admin/peternakan_jumlah_populasi_ternak_unggas')}}">6</a></li>


    <li class="page-item">
      <a class="page-link" href="{{url('/admin/peternakan_populasi_ternak_unggas_dan_jenis_ternak')}}">Next</a>
    </li>
  </ul>
</nav>


    </div>
@endsection


@section('charts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('charts', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Populasi Ternak Sapi Perah Menurut Kecamatan (Ekor)'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories1a)!!},
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
        name: 'Sapi Perah',
        data: {!!json_encode($data1a1)!!}

    }
    
    ]
});
    
    </script>
@stop


@section('charts1')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('charts1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Populasi Ternak Sapi Potong Menurut Kecamatan (Ekor)'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories1a)!!},
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
        name: 'Sapi Potong',
        data: {!!json_encode($data1a2)!!}
    
    }
    
    ]
});
    
    </script>
@stop

@section('charts2')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('charts2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Populasi Ternak Kerbau Menurut Kecamatan (Ekor)'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories1a)!!},
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
        name: 'Kerbau',
        data: {!!json_encode($data1a3)!!}
    
    }
    
    ]
});
    
    </script>
@stop


@section('charts3')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('charts3', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Populasi Ternak Kuda Menurut Kecamatan (Ekor)'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories1a)!!},
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
        name: 'Kuda',
        data: {!!json_encode($data1a4)!!}
    
    }
    
    ]
});
    
    </script>
@stop



@section('charts4')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('charts4', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Populasi Ternak Kambing Menurut Kecamatan (Ekor)'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories1a)!!},
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
        name: 'Kambing',
        data: {!!json_encode($data1a5)!!}
    
    }
    
    ]
});
    
    </script>
@stop



@section('charts5')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('charts5', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Populasi Ternak Domba Menurut Kecamatan (Ekor)'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories1a)!!},
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
        name: 'Domba',
        data: {!!json_encode($data1a6)!!}
    
    }
    
    ]
});
    
    </script>
@stop


@section('charts6')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('charts6', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Populasi Ternak Babi Menurut Kecamatan (Ekor)'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories1a)!!},
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
        name: 'Babi',
        data: {!!json_encode($data1a7)!!}
    
    }
    
    ]
});
    
    </script>
@stop







