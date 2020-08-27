@extends('layouts.app', ['activePage' => 'jumlah_desa_blank_spot', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
               
            <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            


                        <!-- <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="no-icon">{{ __('Lainnya') }}</span>
                    </a> -->
                    <!-- <div class="col-12 text-right">
                                <a href="{{url('/tambah_jumlah_desa_blank_spot')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div> -->
                    <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                    <a class="dropdown-item" href="{{url('/jumlah_menara')}}">Jumlah Menara menurut Kecamatan</a>
                    <a class="dropdown-item" href="{{url('/rekapitulasi_data_menara')}}">Rekapitulasi Data Menara, Pengguna, Tinggi Menara Kabupaten Toba Samosir</a>
                    <a class="dropdown-item" href="{{url('/daftar_internet_dan_game_monitoring')}}">Daftar Internet/Game Net yang Dimonitoring</a>
                    <a class="dropdown-item" href="{{url('/jumlah_desa_blank_spot')}}">Jumlah Desa Blank Spot</a>
                     -->
           
                        <!-- <div class="divider"></div>
                        <a class="dropdown-item" href="#">{{ __('Separated link') }}</a> -->
                    <!-- </div>
</div>
                -->


                      
                        <h4 class="card-title" align="center">Jumlah Desa Blank Spot</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        <!-- </div> -->
                        <div class="card-body table-full-width table-responsive">
                        <a href="/jumlah_desa_blank_spot/exportpdf18" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <td><b>No</td>
                                    <td><b>Kecamatan</td>
                                    <td align="center"><b>Data Blank Spot</td>                                  
                                    <td align="center"><b>Tahun</td>
                                    <!-- <td align="center"><b>Status</td>
                                    <td><b>Aksi</td> -->
                                </thead>
                                <tbody>
                                @foreach($tbl18 as $tabel18)
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel18->kecamatan}}</td>
                                        <td align="center">{{$tabel18->data_blank_spot}}</td>                                 
                                        <td align="center">{{$tabel18->tahun}}</td>
                                        <!-- <td align="center">{{$tabel18->status}}</td>
                                        <td>
                                        <a href="{{ url('/edit18/'.$tabel18->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                            <a href="/jumlah_desa_blank_spot/hapus18/{{ $tabel18->id }}" class="btn btn-sm btn-danger">Hapus</a>    
                    </td> -->
                                    </tr>
                                    @endforeach

                                    <tr>
                                    <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                    <td align="center"><b><b>{{$jumlah70}}</td><b><b>
                                   
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
    </div>


    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item ">
      <a class="page-link" href="{{url('/daftar_internet_dan_game_monitoring1')}}" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    
    <li class="page-item"><a class="page-link" href="{{url('/jumlah_menara1')}}">1</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/rekapitulasi_data_menara1')}}">2</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/daftar_internet_dan_game_monitoring1')}}">3</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/jumlah_desa_blank_spot1')}}">4</a></li>
    <li class="page-item disabled">
      <a class="page-link" href="{{url('/rekapitulasi_data_menara1')}}">Next</a>
    </li>
  </ul>
</nav>







@endsection

@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart18', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Desa Blank Spot'
    },
    subtitle: {
        text: 'Kabupaten Toba Samosir'
    },
    xAxis: {
        categories: {!!json_encode($categories18)!!},
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
        name: 'Data Blank Spot',
        data: {!!json_encode($data18)!!}

    }
    
    
    ]
});
    
    </script>
@stop