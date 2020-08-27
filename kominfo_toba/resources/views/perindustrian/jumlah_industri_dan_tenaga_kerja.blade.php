@extends('layouts.app', ['activePage' => 'jumlah_industri_dan_tenaga_kerja', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

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
                            <div id="charts"></div> 
                            </div>

                            <div class="carousel-item">
                            <div id="charts1"></div>   
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







                        <!-- <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="no-icon">{{ __('Lainnya') }}</span>
                    </a> -->


                    <!-- <div class="col-12 text-right">
                                <a href="{{url('/tambah_jumlah_industri_dan_tenaga_kerja')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div> -->


                    <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> 
                   
                    <a class="dropdown-item" href="{{url('/daftar_industri_kecil_dan_menengah')}}">Daftar Industri Kecil dan Menengah Kab. Toba Samosir</a>
                    <a class="dropdown-item" href="{{url('/jumlah_industri_dan_tenaga_kerja')}}">Jumlah Industri dan Tenaga Kerja Industri Kecil dan Menengah Menurut Kecamatan</a>
            -->
                        <!-- <div class="divider"></div>s
                        <a class="dropdown-item" href="#">{{ __('Separated link') }}</a> -->
                    <!-- </div>
</div>
                -->


                      
                        <h4 class="card-title" align="center">Jumlah Industri dan Tenaga Kerja Industri Kecil dan Menengah menurut Kecamatan</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        <!-- </div> -->
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/perindustrian/exportpdf14" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead>
                                    <td><b>No</td>
                                    <td><b>Kecamatan</td>
                                    <td align="center"><b>Industri Kecil dan Menengah</td>
                                    <td align="center"><b>Tenaga Kerja</td>
                                    <td align="center"><b>Tahun</td>
                                    <!-- <td align="center"><b>Status</td>
                                    <td><b>Aksi</td> -->
                                </thead>
                              

                                <tbody>
                                @foreach($tbl14 as $tabel14)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{$tabel14->kecamatan}}</td>
                                    <td align="center">{{number_format($tabel14->industri_kecil_dan_menengah,0,",",".")}}</td>
                                    <td align="center">{{number_format($tabel14->tenaga_kerja,0,",",".")}}</td>    
                                    <td align="center">{{$tabel14->tahun}}</td>
                                    <!-- <td align="center">{{$tabel14->status}}</td>
                                    <td>
                                <a href="{{ url('/edit14/'.$tabel14->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                            <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-danger" href="/jumlah_industri_dan_tenaga_kerja/hapus14/{{ $tabel14->id }}">Hapus</a>
                        
                    </td>
                                    </tr> -->
                                    @endforeach
                           
                                    <tr>
                                    <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                    <td align="center"><b><b>   {{number_format($jumlah67,0,",",".")}}</td><b><b>
                                    <td align="center"><b><b>   {{number_format($jumlah68,0,",",".")}}</td><b><b>
                                   
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
      <a class="page-link" href="{{url('/daftar_industri_kecil_dan_menengah1')}}" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    
    <li class="page-item"><a class="page-link" href="{{url('/daftar_industri_kecil_dan_menengah1')}}">1</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/jumlah_industri_dan_tenaga_kerja1')}}">2</a></li>
    <li class="page-item disabled">
      <a class="page-link" href="">Next</a>
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
        text: 'Jumlah Industri Kecil dan Menengah Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories14)!!},
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
        name: 'Industri Kecil dan Menengah',
        data: {!!json_encode($data14)!!}

    
    }]
    
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
        text: 'Jumlah Tenaga Kerja Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories14)!!},
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
        name: 'Tenaga Kerja',
        data: {!!json_encode($data14a)!!}

    
    }]
    
});
    </script>
@stop