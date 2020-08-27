@extends('layouts.app', ['activePage' => 'lindup_izin_lingkungan_berdasarkan_perusahaan', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">                  
                   
                        <div class="col-12 text-right">
                                <a href="{{url('/tambah-lindup_jenis_daur_ulang_sampah')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                        <h4 class="card-title" align = "center">Jenis Daur Ulang Sampah</h4>
                            <!-- <p class="card-category">Here is a subtitle for this table</p> --> 
                        </div>
                        <div class="col-12 text-left">
               
                <a href="/lindup_jenis_daur_ulang_sampah/exportpdf60" class="btn btn-sm btn-warning">CETAK PDF</a>          
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <thead>
                                    <tr>
                                    <td align="center"><b>No</b></td>
                                    <td align="center"><b>Kecamatan</b></td>
                                    <td align="center"><b>Daur Ulang</b></td>
                                    <td align="center"><b>Ton</b></td>
                                    <td align="center"><b>Produksi</b></td>
                                    <td align="center"><b>Tahun </b></td>     
                                    <td align="center" ><b>Status </b></td> 
                                    <td><b>Aksi </b></td> 
                                   
                                    </tr>

                                    
                                </thead>
                                <tbody>
                                @foreach($tbl60 as $tabel60)
                                
                                    <tr>
                                    <td align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$tabel60->kecamatan}}</td>
                                    <td align="center">{{$tabel60->daur_ulang}}</td>
                                    <td align="center">{{$tabel60->ton}}</td>
                                    <td align="center">{{$tabel60->produksi}}</td>
                                    <td align="center">{{$tabel60->tahun}}</td>
                                    <td align="center">{{$tabel60->status}}</td>

                                    <td>
                                    <a href="{{ url('/edit60/'.$tabel60->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        &nbsp
                                    <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/lindup_jenis_daur_ulang/hapus/{{ $tabel60->id }}">Hapus</a>
                                    </td>
                                    
                                    </tr>
                                    @endforeach
                                                            
                                </tbody>
                            </table>
                            {{ $tbl60->links() }}
                        </div>
                    </div>
                </div>
                </html>
                
                
            </div>
        </div>
        <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="{{url('/lindup_jumlah_produksi_sampah')}}" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    
    <li class="page-item"><a class="page-link" href="{{url('/lindup_izin_lingkungan_berdasarkan_perusahaan')}}">1</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/lindup_jumlah_produksi_sampah')}}">2</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/lindup_jenis_daur_ulang_sampah')}}">3</a></li>
    <li class="page-item disabled">
      <a class="page-link" href="">Next</a>
    </li>
  </ul>
</nav>
    </div>
@endsection


