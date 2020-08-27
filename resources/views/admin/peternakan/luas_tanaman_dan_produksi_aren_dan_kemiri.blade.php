@extends('layouts.app', ['activePage' => 'luas_tanaman_dan_produksi_aren_dan_kemiri', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                

                <div class="col-md-12"> 
                    <div class="card strpied-tabled-witd align="center"-hover">
                        <div class="card-header ">
                            
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
   <h4 class="card-title" align="center">Luas Tanaman dan Produksi Aren dan Kemiri Tanaman Perkebunan Rakyat Menurut Kecamatan</h4>


                        
                        <div class="card-body table-full-widtd align="center" table-responsive" >
                            <table class="table table-hover table-striped">
                            <a href="/luas_tanaman_dan_produksi_aren_dan_kemiri/exportpdf10" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead>
                                <tr>
                                    <td rowspan="2"><b>No</td>
                                    <td rowspan="2"><b>Kecamatan</td>
                                    <td align="center" colspan="3"><b>Aren</td>
                                    <td align="center" colspan="3"><b>Kemiri</td>
                                    <td align="center" rowspan="2"><b>Tahun</td>
                                   <td align="center" rowspan="2"><b>Status</td>
                                   <td></td>
                                   <td></td>
                                    <!-- <td align="center" rowspan="2"><b>Aksi</td> --> 
                                    </tr>

                                <tr>
                                    <td align="center" ><b>Luas Areal</td>
                                    <td align="center"><b>Produksi (Ton)</td>
                                    <td align="center"><b>Produktivitas (Kg/Ha)</td>
                      
                                    <td align="center" ><b>Luas Areal</td>
                                    <td align="center"><b>Produksi (Ton)</td>
                                    <td align="center"><b>Produktivitas (Kg/Ha)</td>

                                </tr>
                                </thead>
                                   
                               
                                <tbody>
                                @foreach($tbl10 as $tabel10)
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>                                    
                                        <td>{{$tabel10->kecamatan}}</td>
                                        <td align="center">{{number_format($tabel10->luas_areal_aren,3,",",".")}}</td>
                                        <td align="center">{{number_format($tabel10->produksi_aren,3,",",".")}}</td>
                                        <td align="center">{{number_format($tabel10->produktivitas_aren,3,",",".")}}</td>
                                        <td align="center">{{number_format($tabel10->luas_areal_kemiri,3,",",".")}}</td>
                                        <td align="center">{{number_format($tabel10->produksi_kemiri,3,",",".")}}</td>
                                        <td align="center">{{number_format($tabel10->produktivitas_kemiri,3,",",".")}}</td>
                                        <td align="center">{{$tabel10->tahun}}</td>
                                       <td align="center">{{$tabel10->status}}</td>
                                        <td>
                                        <td align="center"> <a href="{{ url('/edit_status10/'.$tabel10->id) }}" class="btn btn-sm btn-primary">View Detail</a>
                    </td>


                 
                                    </tr>
                                    @endforeach
                                    
                                     
                                    <tr>
                                    <td></td>
                                    <td scope="row">Jumlah</td>
                                    <td align="center">{{number_format($jumlah37,3,",",".")}}</td>
                                    <td align="center">{{number_format($jumlah38,3,",",".")}}</td>
                                    <td align="center">{{number_format($jumlah39,3,",",".")}}</td>
                                    <td align="center">{{number_format($jumlah40,3,",",".")}}</td>
                                    <td align="center">{{number_format($jumlah41,3,",",".")}}</td>
                                    <td align="center">{{number_format($jumlah42,3,",",".")}}</td>
                                  
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
      <a class="page-link" href="{{url('/admin/luas_tanaman_dan_produksi_karet_dan_kelapa_sawit')}}" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="{{url('/admin/luas_dan_produksi_kopi_dan_kakao')}}">1</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/admin/luas_tanaman_dan_produksi_karet_dan_kelapa_sawit')}}">2</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/admin/luas_tanaman_dan_produksi_aren_dan_kemiri')}}">3</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/admin/luas_tanaman_dan_produksi_kelapa_dan_pinang')}}">4</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/admin/luas_tanaman_dan_produksi_andaliman_dan_nilam')}}">5</a></li>



    <li class="page-item">
      <a class="page-link" href="{{url('/admin/luas_tanaman_dan_produksi_kelapa_dan_pinang')}}">Next</a>
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
        text: 'Luas Areal Aren Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories10)!!},
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
        name: 'Luas Areal Aren',
        data: {!!json_encode($data10)!!}

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
        text: 'Produksi Aren Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories10)!!},
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
        name: 'Produksi Aren',
        data: {!!json_encode($data10a)!!}

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
        text: 'Produktivitas Aren Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories10)!!},
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
        name: 'Produktivitas Aren',
        data: {!!json_encode($data10b)!!}
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
        text: 'Luas Areal Kemiri Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories10)!!},
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
        name: 'Luas Areal Kemiri',
        data: {!!json_encode($data10c)!!}
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
        text: 'Produksi Kemiri Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories10)!!},
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
        name: 'Produksi Kemiri',
        data: {!!json_encode($data10d)!!}

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
        text: 'Produktivitas Kemiri Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories10)!!},
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
        name: 'Produktivitas Kemiri',
        data: {!!json_encode($data10e)!!}
    }
    
    ]
});
    
    </script>
@stop