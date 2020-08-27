@extends('layouts.app', ['activePage' => 'infrastruktur_aplikasi_opd_toba', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                        
                    
                    <div class="col-12 text-right">
                                <a href="{{url('/tambah-aplikasi-opd-toba')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                   
               


                      
                        <h4 class="card-title" align="center">Aplikasi yang ada di OPD Kabupaten Toba</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>
                        <div class="col-12 text-left">
                
                        <a href="/infrastruktur_aplikasi_opd_toba/exportpdf3" class="btn btn-sm btn-warning">CETAK PDF</a>          
                        
                        
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <thead>
                                    <tr>
                                    <td align="center" >No</td>
                                    <td align="center" >Nama OPD</td>
                                    <td align="center" >Aplikasi</td>
                                    <td align="center" >Tahun </td>
                                   
                                   
                                    <td align="center" >Status </td>
                                    <td>Aksi</td>  
                                     
                                    </tr>

                                    
                                </thead>
                                
                                <tbody>
                                @foreach($tbl45 as $tabel45)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel45->Nama_OPD}}</td>
                                    <td align="center">{{$tabel45->aplikasi}}</td>
                                    
                                    <td align="center">{{$tabel45->tahun}}</td>
                                 
                                    <td align="center">{{$tabel45->status}}</td>
                                    <td align="center">
                                    <a href="{{ url('/edit45/'.$tabel45->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    &nbsp
                                    <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/jlh-aplikasi-opd-toba/hapus/{{ $tabel45->id }}">Hapus</a>
                                    
                                    </td>
                                   
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $tbl45->links() }}
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
            <a class="page-link" href="" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="{{url('/infrastruktur_aplikasi_opd_toba')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/infrastruktur_panjang_jalan')}}">2</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/infrastruktur_jembatan')}}">3</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/infrastruktur_panjang_jalan_kabupaten')}}">4</a></li>
            
            <li class="page-item">
            <a class="page-link" href="{{url('/infrastruktur_panjang_jalan')}}">Next</a>
            </li>
        </ul>
        </nav>
    </div>
@endsection