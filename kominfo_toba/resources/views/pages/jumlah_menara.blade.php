@extends('layouts.app', ['activePage' => 'jumlah_menara', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div id="chart15">
                </div>
            </div>
            <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                   
                        
                    <div class="col-12 text-right">
                                <a href="{{url('/tambah_jumlah_menara')}}" class="btn btn-sm btn-default">Tambahkan Data</a>
                            </div>

                      
                        <h4 class="card-title" align="center">Jumlah Menara Menurut Kecamatan</h4>


                            
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/jumlah_menara/exportpdf15" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead>
                                    <td><b>No</td>
                                    <td><b>Kecamatan</td>
                                    <td align="center"><b>Jumlah Menara</td>                                   
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Status</td>
                                    <td><b>Aksi</td>
                                </thead>
                                <tbody>
                                @foreach($tbl15 as $tabel15)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{$tabel15->kecamatan}}</td>
                                    <td align="center">{{$tabel15->jumlah_menara}}</td>                
                                    <td align="center">{{$tabel15->tahun}}</td>
                                    <td align="center"  >{{$tabel15->status}}</td>
                                    <td>
                                    <a href="{{ url('/edit15/'.$tabel15->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                            <a href="/jumlah_menara/hapus15/{{ $tabel15->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                                    </tr>
                                    @endforeach

                                    <tr>
                                    <td></td>
                                    <td scope="row"><b><b>Jumlah</td><b><b>
                                    <td align="center"><b><b>{{$jumlah69}}</td><b><b>
                                   
                                    <td></td>    
                                    <td></td>
                                    <td></td>


                                </tbody>
                            </table>
                            {{ $tbl15->links() }}
                        </div>
                    </div>
                </div>
  
            </div>
        </div>



    </div>


    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="{{url('/jumlah_menara')}}" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    
    <li class="page-item"><a class="page-link" href="{{url('/jumlah_menara')}}">1</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/rekapitulasi_data_menara')}}">2</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/daftar_internet_dan_game_monitoring')}}">3</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/jumlah_desa_blank_spot')}}">4</a></li>
  


    <li class="page-item">
      <a class="page-link" href="{{url('/rekapitulasi_data_menara')}}">Next</a>
    </li>
  </ul>
</nav>







@endsection

@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart15', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Menara Menurut Kecamatan'
    },
    subtitle: {
        text: 'Kabupaten Toba Samosir'
    },
    xAxis: {
        categories: {!!json_encode($categories15)!!},
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
        name: 'Jumlah Menara',
        data: {!!json_encode($data15)!!}

    }
    
    
    ]
});
    
    </script>
@stop