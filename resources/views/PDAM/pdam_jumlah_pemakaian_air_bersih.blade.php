@extends('layouts.app', ['activePage' => 'pdam_jumlah_pemakaian_air_bersih', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])


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
                            

                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <div id="chart1"></div> 
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
                        
 
                        <h4 class="card-title" align="center">Jumlah Pemakaian Air Bersih Per Rumah</h4>
                    
                    <a href="/pdam_jumlah_pemakaian_air_bersih/exportpdf57" class="btn btn-sm btn-warning">CETAK PDF</a>          
                   
                    
                        <div class="card-body table-full-width table-responsive" >
                            <table class="table table-hover table-striped" id="datatables">
                                <thead>
                                    <tr>
                                    <td align="center"><b><b>No</b></td>
                                    <td align="center"><b>Pemakaian Air Bersih/Jamban</b></td>
                                    <td align="center"><b>Jumlah</b></td>
                                    <td align="center"><b>Tahun </b></td> 
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tbl57 as $tabel57)
                              
                                    <tr>
                                    <td align="center" >{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel57->pemakaian_air_bersih}}</td>
                                    <td align="center">{{$tabel57->jumlah}}</td>
                                    <td align="center">{{$tabel57->tahun}}</td>
                                    <td align="center">
                                   
                                    </td>
                                    </tr>
                                @endforeach
                                
                                </tbody>
                            </table>
                            {{ $tbl57->links() }}
                        </div>
                        
                        
                    </div>
                </div>
              
            </div>
        </div>
        
    </div>
@endsection

@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Pemakaian Air Bersih/Jamban'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories57)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Nilai'
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
        name: 'Pemakaian Air Bersih',
        data: {!!json_encode($data57)!!}

    }]
});
   
    // });
    </script>
@stop
