@extends('layouts.app', ['activePage' => 'lindup_izin_lingkungan_berdasarkan_perusahaan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                                         
                   
                        <h4 class="card-title" align = "center">Jumlah Produksi Sampah Menurut Kecamatan</h4>
                            <!-- <p class="card-category">Here is a subtitle for this table</p> --> 
                        </div>
                        <div class="col-12 text-left">
               
                <a href="/lindup_jumlah_produksi_sampah/exportpdf59" class="btn btn-sm btn-warning">CETAK PDF</a>          
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <thead>
                                    <tr>
                                    <td><b>No</b></td>
                                    <td><b>Kecamatan</b></td>
                                    <td><b>Bulan</b></td>
                                    <td><b>Produksi (M3)</b></td>
                                    <td><b>Terangkat (M3) </b></td>
                                    <td><b>Tahun </b></td>     
                                
                                    </tr>

                                    
                                </thead>
                                <tbody>
                                @foreach($tbl59 as $tabel59)
                                
                                    <tr>
                                    <td >{{$loop->iteration}}</td>
                                    <td >{{$tabel59->kecamatan}}</td>
                                    <td >{{$tabel59->bulan}}</td>
                                    <td >{{$tabel59->produksi_m3}}</td>
                                    <td >{{$tabel59->terangkat}}</td>
                                    <td >{{$tabel59->tahun}}</td>
                
                                    <td>
                                   
                                    </td>
                                    
                                    </tr>
                                    @endforeach
                                                               
                                </tbody>
                            </table>
                            {{ $tbl59->links() }}
                        </div>
                    </div>
                </div>
                </html>
                
                
            </div>
        </div>
        <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="{{url('/lindup_izin_lingkungan_berdasarkan_perusahaan1')}}" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    
    <li class="page-item"><a class="page-link" href="{{url('/lindup_izin_lingkungan_berdasarkan_perusahaan1')}}">1</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/lindup_jumlah_produksi_sampah1')}}">2</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/lindup_jenis_daur_ulang_sampah1')}}">3</a></li>
    
    <li class="page-item">
      <a class="page-link" href="{{url('/lindup_jenis_daur_ulang_sampah1')}}">Next</a>
    </li>
  </ul>
</nav>
    </div>
@endsection



