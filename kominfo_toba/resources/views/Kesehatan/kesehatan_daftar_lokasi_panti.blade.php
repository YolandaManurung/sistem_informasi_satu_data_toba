@extends('layouts.app', ['activePage' => 'kesehatan_daftar_lokasi_panti', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div id="chart1"></div> 
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">

                               
                            
                   
                        <h4 class="card-title" align="center">Daftar Lokasi Panti Asuhan yang Berada di Wilayah Kabupaten Toba Samosir</h4>
                        
                        <div class="card-body table-full-width table-responsive">
                        <a href="/kesehatan_daftar_panti_asuhan/exportpdf31" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                            <table class="table table-hover table-striped">
                            <th scope="col">No</th>
                                    <td align="center"><b>Nama Panti</td>
                                    <td align="center"><b>Alamat</td>
                                    <td align="center"><b>Pimpinan</td>
                                    <td align="center"><b>Status</td>
                                    <td align="center"><b>Jumlah Penghuni</td>
                                    <td align="center"><b>Tahun</td>
                                </thead>
                                <tbody>
                                @foreach($tbl31 as $tabel31)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel31->nama_panti}}</td>
                                    <td align="center">{{$tabel31->alamat}}</td>
                                    <td align="center">{{$tabel31->pimpinan}}</td>
                                    <td align="center">{{$tabel31->terdaftar}}</td>
                                    <td align="center">{{$tabel31->jumlah_penghuni}}</td>
                                    <td align="center">{{$tabel31->tahun}}</td>
                                  
                                    </tr>
                                @endforeach
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
            <li class="page-item">
            <a class="page-link" href="/kesehatan_jumlah_bayi_lahir1" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_rekapitulasi_penyandang_masalah1')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_dokter1')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_tenaga_kesehatan1')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_fasilitas_kesehatan1')}}">4</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_kasus_penyakit1')}}">5</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_akseptor_aktif1')}}">6</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_jumlah_bayi_lahir1')}}">7</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/kesehatan_daftar_lokasi_panti1')}}">8</a></li>
            
            
            <li class="page-item disabled">
            <a class="page-link" href="">Next</a>
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
        text: 'Daftar Lokasi Panti Asuhan yang Berada di Wilayah Kabupaten Toba Samosir'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories31)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Penghuni'
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
        name: 'Jumlah Penghuni',
        data: {!!json_encode($data31)!!}

    }]
});
    </script>
@stop
