@extends('layouts.app', ['activePage' => 'bantuanpemerintahkecamatan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div id="chart">
                </div>
                <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                        
                    <div class="col-12 text-right">
                                <a href="{{url('formulir-bantuan-pemerintah-kecamatan')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                
                        <h4 class="card-title" align="center">Jenis Bantuan Pemerintah ke Masyarakat perkecamatan Tahun 2019</h4>
                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/bantuan_pemerintah_kecamatan1/exportpdf65" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                             <thead class="table">
                                <thead class="thead-dark">
                                    <td align="center"><b>No</td> 
                                    <td align="center"><b>Jenis Bantuan</td> 
                                    <td align="center"><b>Kecamatan</td>
                                    <td align="center"><b>Desa</td>
                                    <td align="center"><b>Jumlah</td>
                                    <td align="center"><b>Tahun</td>
                                    <td align="center"><b>Keterangan</td>
                                    <td align="center"><b>Status</td>
                                    <td><b>Aksi</td>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($tbl65 ?? '' as $tabel65) 
                                    <tr>
                                    <td scope="row" align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel65 -> jenis_bantuan}}</td>
                                    <td align="center">{{$tabel65 -> kecamatan}}</td>
                                    <td align="center">{{$tabel65 -> desa}}</td>
                                    <td align="center">{{number_format($tabel65->jumlah,0,",",".")}}</td>
                                    <td align="center">{{$tabel65 -> tahun}}</td>
                                    <td align="center">{{$tabel65 -> keterangan}}</td>
                                    <td align="center">{{$tabel65 -> status}}</td>
                                    <td>
                                <a href="{{ url('/edit65/'.$tabel65->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                            <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/bantuan_pemerintah_kecamatan/hapus65/{{ $tabel65->id }}" >Hapus</a>
                    </td>
                    </tr>
                                    @endforeach

                                    <tr>
                                    <td></td>
                                    <td scope="row" align="center"><b><b>Jumlah</td>
                                    <td></td>
                                    <td></td>
                                    <td align="center"><b><b>{{number_format($ketapang ,0,",",".")}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td> 
                                    <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            {{ $tbl65 ?? '' ?? ''->links() }}
                        </div>
                        </div>
                    </div>
                    </html>
                </div>
        </div>  
        </div>
@endsection

@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jenis Bantuan Pemerintah ke Masyarakat perkecamatan Tahun 2019'
    },
    subtitle: {
        text: 'Kabupaten Toba'
    },
    xAxis: {
        categories: {!!json_encode($categories65)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Bantuan'
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
        name: 'Jenis Bantuan',
        data: {!!json_encode($data65)!!}

    }] 
});
    </script>
@stop
