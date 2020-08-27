@extends('layouts.app', ['activePage' => 'kesehatan_rekapitulasi_penyandang_masalah', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div id="chart2">
                </div>
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

                    <div class="col-12 text-right">
                                <a href="{{url('/tambah_jumlah_kasus_penyakit')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>                          
                        <h4 class="card-title" align="center">Jumlah Kasus Penyakit Terbanyak di Kabupaten Toba Samosir</h4>

                            
                        <div class="card-body table-full-width table-responsive">
                        <a href="/kesehatan_jumlah_kasus_penyakit/exportpdf28" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <table class="table table-hover table-striped">
                            
                                <thead>
                                    <td align="center"><b>No</td>
                                    <td align="center"><b>Jenis Penyakit</td>
                                    <td align="center"><b>Jumlah Kunjungan</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Status</td>
                                    <td align="center"><b>Aksi</td>
                                </thead>
                                <tbody>
                                @foreach($tbl28 as $tabel28)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel28->jenis_penyakit}}</td>
                                    <td align="center">{{number_format($tabel28->jumlah_kunjungan, 0, ".", ".")}}</td>
                                    <td align="center">{{$tabel28->tahun}}</td>
                                    <td align="center">{{$tabel28->status}}</td>
                                    <td></td>
                                   
                                    <td>
                                    <a href="{{ url('/edit28/'.$tabel28->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp

                            <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/kesehatan_jumlah_kasus_penyakit/hapus28/{{ $tabel28->id }}">Hapus</a>      
                    </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $tbl28->links() }}
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
        </div>
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
            <a class="page-link" href="/kesehatan_jumlah_fasilitas_kesehatan" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_rekapitulasi_penyandang_masalah')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_dokter')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_tenaga_kesehatan')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_fasilitas_kesehatan')}}">4</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_kasus_penyakit')}}">5</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_akseptor_aktif')}}">6</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_bayi_lahir')}}">7</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_daftar_lokasi_panti')}}">8</a></li>
            
            
            <li class="page-item">
            <a class="page-link" href="{{url('/kesehatan_jumlah_akseptor_aktif')}}">Next</a>
            </li>
        </ul>
        </nav>
   
@endsection
@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Kasus Penyakit Terbanyak di Kabupaten Toba Samosir'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories28)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Pasien'
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
        name: 'Jumlah Kunjungan',
        data: {!!json_encode($data28)!!}
    }]
});
    </script>
@stop