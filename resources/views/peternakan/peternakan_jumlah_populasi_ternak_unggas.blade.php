@extends('layouts.app', ['activePage' => 'peternakan_jumlah_populasi_ternak_unggas', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            

                <div class="col-md-12"> 
                    <div class="card strpied-tabled-witd-hover">
                        <div class="card-header ">
                            


                        <!-- <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="no-icon">{{ __('Lainnya') }}</span>
                    </a> -->
                    <!-- <div class="col-12 text-right">
                                <a href="{{url('/tambah_jumlah_populasi_ternak_unggas')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div> -->
                    <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                    <a class="dropdown-item" href="{{url('/peternakan_populasi_ternak_besar')}}">Populasi Ternak Besar Menurut Kecamatan dan Jenis Ternak (Ekor)</a>
                    <a class="dropdown-item" href="{{url('/peternakan_populasi_ternak_unggas_dan_jenis_ternak')}}">Populasi Ternak Unggas dan Jenis Ternak (Ekor) Kecamatan</a>
                    <a class="dropdown-item" href="{{url('/peternakan_jumlah_ternak_dipotong')}}">Jumlah Ternak yang Dipotong Menurut Kecamatan dan Jenis Ternak (Ekor)</a>
                    <a class="dropdown-item" href="{{url('/peternakan_jumlah_ternak_unggas_dipotong')}}">Jumlah Ternak Unggas yang Dipotong Menurut Kecamatan dan Jenis Ternak (Ekor)</a>
                    <a class="dropdown-item" href="{{url('/peternakan_jumlah_produksi_ternak_unggas')}}">Jumlah Produksi Ternak Unggas</a>
                    <a class="dropdown-item" href="{{url('/peternakan_jumlah_populasi_ternak_unggas')}}">Jumlah Populasi Ternak Unggas</a>
                     -->
           
                        <!-- <div class="divider"></div>
                        <a class="dropdown-item" href="#">{{ __('Separated link') }}</a> -->
                    <!-- </div>
</div>
                -->


                      
                        <h4 class="card-title" align="center">Jumlah Populasi Ternak Unggas</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                               
                            <a href="/peternakan_jumlah_populasi_ternak_unggas/exportpdf6" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead>
                                    <td><b>No</td>
                                    <td><b>Kecamatan</td>
                                    <td><b>Ayam Buras</td>
                                    <td><b>Itik</td>
                                    <td><b>Tahun</td>
                                    <!-- <td><b>Status</td>
                                    <td><b>Aksi</td> -->
                                </thead>
                                <tbody>
                                @foreach($tbl6 as $tabel6)
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel6->kecamatan}}</td>
                                        <td>{{number_format($tabel6->ayam_buras,0,",",".")}}</td>
                                        <td>{{number_format($tabel6->itik,0,",",".")}}</td>
                                        <td>{{$tabel6->tahun}}</td>
                                        <!-- <td>{{$tabel6->status}}</td> -->
                                        
                                    </tr>
                                    @endforeach
                                    
                                    <tr>
                                    <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                    <td><b><b>{{number_format($jumlah23,0,",",".")}}</td><b><b>
                                    <td><b><b>{{number_format($jumlah24,0,",",".")}}</td><b><b>
                                   
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
      <a class="page-link" href="{{url('/peternakan_jumlah_produksi_ternak_unggas1')}}" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    
    <li class="page-item"><a class="page-link" href="{{url('/peternakan_populasi_ternak_besar1')}}">1</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/peternakan_populasi_ternak_unggas_dan_jenis_ternak1')}}">2</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/peternakan_jumlah_ternak_dipotong1')}}">3</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/peternakan_jumlah_ternak_unggas_dipotong1')}}">4</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/peternakan_jumlah_produksi_ternak_unggas1')}}">5</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/peternakan_jumlah_populasi_ternak_unggas1')}}">6</a></li>


    <li class="page-item disabled">
      <a class="page-link" href="">Next</a>
    </li>
  </ul>
</nav>



   
@endsection

@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart6', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Populasi Ternak Unggas'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories6)!!},
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
        name: 'Ayam Buras',
        data: {!!json_encode($data6)!!}

    },
     
    {
        name: 'Itik',
        data: {!!json_encode($data6a)!!}

    }
  
    
    ]
});
    
    </script>
@stop

