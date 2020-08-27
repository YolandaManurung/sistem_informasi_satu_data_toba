@extends('layouts.app', ['activePage' => 'peternakan_jumlah_ternak_dipotong', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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


                        


                      
                        <h4 class="card-title" align="center">Jumlah Ternak yang Dipotong Menurut Kecamatan dan Jenis Ternak</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                       
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                               
                            <a href="/peternakan_jumlah_ternak_dipotong/exportpdf3" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead>
                                    <td><b>No</td>
                                    <td><b>Kecamatan</td>
                                    <td align="center"><b>Sapi Perah</td>
                                    <td align="center"><b>Sapi Potong</td>
                                    <td align="center"><b>Kerbau</td>
                                    <td align="center"><b>Kuda</td>
                                    <td align="center"><b>Kambing</td>
                                    <td align="center"><b>Domba</td>
                                    <td align="center"><b>Babi</td>
                                    <td align="center"><b>Tahun</td>
                                  <td align="center"><b>Status</td>
                                    <!-- <td><b>Aksi</td> -->
                                </thead>
                                <tbody>
                                @foreach($tbl3 as $tabel3)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{$tabel3->kecamatan}}</td>
                                    <td align="center">{{number_format($tabel3->sapi_perah,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel3->sapi_potong,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel3->kerbau,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel3->kuda,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel3->kambing,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel3->domba,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel3->babi,0,",",".")}}</td>    
                                    <td align="center">{{$tabel3->tahun}}</td>
                                    <td align="center">{{$tabel3->status}}</td>
                                    <td align="center">
                                    <td align="center"> <a href="{{ url('/edit_status3/'.$tabel3->id) }}" class="btn btn-sm btn-primary">View Detail</a>
                    </td>
                                    </tr>
                                    @endforeach

                                    <tr>
                                    <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                    <td align="center"><b><b>{{number_format($jumlah12,0,",",".")}}</td><b><b>
                                    <td align="center"><b><b>{{number_format($jumlah13,0,",",".")}}</td><b><b>
                                    <td align="center"><b><b>{{number_format($jumlah14,0,",",".")}}</td><b><b>
                                    <td align="center"><b><b>{{number_format($jumlah15,0,",",".")}}</td><b><b>
                                    <td align="center"><b><b>{{number_format($jumlah16,0,",",".")}}</td><b><b>
                                    <td align="center"><b><b>{{number_format($jumlah17,0,",",".")}}</td><b><b>
                                    <td align="center"><b><b>{{number_format($jumlah18,0,",",".")}}</td><b><b>
                                  
                                  
                                    <td></td>    
                                    <td></td>
                                    <td></td>
                                    <td></td>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
  
            </div>



            
        </div>

                    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="{{url('/admin/peternakan_populasi_ternak_unggas_dan_jenis_ternak')}}" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    
    <li class="page-item"><a class="page-link" href="{{url('/admin/peternakan_populasi_ternak_besar')}}">1</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/admin/peternakan_populasi_ternak_unggas_dan_jenis_ternak')}}">2</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/admin/peternakan_jumlah_ternak_dipotong')}}">3</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/admin/peternakan_jumlah_ternak_unggas_dipotong')}}">4</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/admin/peternakan_jumlah_produksi_ternak_unggas')}}">5</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/admin/peternakan_jumlah_populasi_ternak_unggas')}}">6</a></li>


    <li class="page-item">
      <a class="page-link" href="{{url('/admin/peternakan_jumlah_ternak_unggas_dipotong')}}">Next</a>
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
        text: 'Jumlah Ternak Sapi Perah yang Dipotong Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories3)!!},
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
        data: {!!json_encode($data3)!!}

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
        text: 'Jumlah Ternak Sapi Potong yang Dipotong Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories3)!!},
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
        data: {!!json_encode($data3a)!!}

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
        text: 'Jumlah Ternak Kerbau yang Dipotong Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories3)!!},
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
        data: {!!json_encode($data3b)!!}

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
        text: 'Jumlah Ternak Kuda yang Dipotong Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories3)!!},
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
        data: {!!json_encode($data3c)!!}

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
        text: 'Jumlah Ternak Kambing yang Dipotong Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories3)!!},
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
        data: {!!json_encode($data3d)!!}
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
        text: 'Jumlah Ternak Domba yang Dipotong Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories3)!!},
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
        data: {!!json_encode($data3e)!!}
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
        text: 'Jumlah Ternak Babi yang Dipotong Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories3)!!},
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
        data: {!!json_encode($data3f)!!}
    }
    
    ]
});
    
    </script>
@stop






