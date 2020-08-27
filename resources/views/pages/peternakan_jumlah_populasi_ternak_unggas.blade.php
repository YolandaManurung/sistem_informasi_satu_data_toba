@extends('layouts.app', ['activePage' => 'peternakan_jumlah_populasi_ternak_unggas', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div id="chart6">
                </div>
                </div>

                <div class="col-md-12"> 
                    <div class="card strpied-tabled-witd-hover">
                        <div class="card-header ">
                            


                        
                    <div class="col-12 text-right">
                                <a href="{{url('/tambah_jumlah_populasi_ternak_unggas')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                    


                      
                        <h4 class="card-title" align="center">Jumlah Populasi Ternak Unggas</h4>


                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                               
                            <a href="/peternakan_jumlah_populasi_ternak_unggas/exportpdf6" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead>
                                    <td><b>No</td>
                                    <td><b>Kecamatan</td>
                                    <td><b>Ayam Buras</td>
                                    <td><b>Itik</td>
                                    <td><b>Tahun</td>
                                    <td><b>Status</td>
                                    <td><b>Aksi</td>
                                </thead>
                                <tbody>
                                @foreach($tbl6 as $tabel6)
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$tabel6->kecamatan}}</td>
                                        <td>{{number_format($tabel6->ayam_buras,0,",",".")}}</td>
                                        <td>{{number_format($tabel6->itik,0,",",".")}}</td>
                                        <td>{{$tabel6->tahun}}</td>
                                        <td>{{$tabel6->status}}</td>
                                        <td>
                                        <a href="{{ url('/edit6/'.$tabel6->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                            <a href="/peternakan_jumlah_populasi_ternak_unggas/hapus6/{{ $tabel6->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
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
                            {{ $tbl6->links() }}
                        </div>
                    </div>
                </div>
  
            </div>
        </div>

        <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="{{url('/peternakan_jumlah_produksi_ternak_unggas')}}" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    
    <li class="page-item"><a class="page-link" href="{{url('/peternakan_populasi_ternak_besar')}}">1</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/peternakan_populasi_ternak_unggas_dan_jenis_ternak')}}">2</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/peternakan_jumlah_ternak_dipotong')}}">3</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/peternakan_jumlah_ternak_unggas_dipotong')}}">4</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/peternakan_jumlah_produksi_ternak_unggas')}}">5</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/peternakan_jumlah_populasi_ternak_unggas')}}">6</a></li>


    <li class="page-item disabled">
      <a class="page-link" href="">Next</a>
    </li>
  </ul>
</nav>



    </div>
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

