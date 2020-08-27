@extends('layouts.app', ['activePage' => 'infrastruktur_pembangunan_bersumber_dana_desa', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            


                       
                    <div class="col-12 text-right">
                                <a href="{{url('/tambah-pembangunanbersumberdanadesa')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div>
                   
                            
                        <h4 class="card-title" align="center">Pembangunan Yang Bersumber Dari Dana Desa</h4>
 
                        <div class="col-12 text-left">
                
                        <a href="/infrastruktur_pembangunan_bersumber_dana_desa/exportpdf5" class="btn btn-sm btn-warning">CETAK PDF</a>          
                        
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <thead>
                                    <tr>
                                    <td align="center" >No</td>
                                    <td align="center" >Kecamatan</td>
                                    <td align="center" >Desa</td>
                                    <td align="center" >Irigasi</td>
                                    <td align="center" >Jalan Desa</td>
                                    <td align="center" >Jumlah (Km/m)</td>
                                    <td align="center" >Keterangan</td>
                                    <td align="center" >Tahun </td>
                                    <td align="center" >Status </td>
                                    <td>Aksi</td>  
                                    </tr>

                                   
                                    
                                    </thead>

                                    <tbody>
                                @foreach($tbl49 as $tabel49)
                                <?php $i++; ?>
                                    <tr>
                                    <td align="center">{{$i}}</td>
                                    <td align="center">{{$tabel49->kecamatan}}</td>
                                    <td align="center">{{$tabel49->desa}}</td>
                                    <td align="center">{{$tabel49->irigasi}}</td>
                                    <td align="center">{{$tabel49->jalan_desa}}</td>
                                    <td align="center">{{$tabel49->jumlah}}</td>
                                    <td align="center">{{$tabel49->keterangan}}</td>
                                    <td align="center">{{$tabel49->tahun}}</td>
                                    <td align="center">{{$tabel49->status}}</td>
                                    
                                    <td align="center">
                                    <a href="{{ url('/edit49/'.$tabel49->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        &nbsp
                                    <a onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="/pembangunanbersumberdanadesa/hapus/{{ $tabel49->id }}">Hapus</a>
                                  
                                    </td>

                                    </tr>
                                @endforeach
                                    
                                </tbody>


                                    
                              
                                <tbody>
                                    
                                </tbody>
                            </table>
                            {{ $tbl49->links() }}
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
            <li class="page-item"><a class="page-link" href="{{url('/infrastruktur_pembangunan_bersumber_dana_desa')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{url('/infrastruktur_pembagian_penetapan_bagi_hasil_pajak')}}">2</a></li>
                       
            <li class="page-item">
            <a class="page-link" href="infrastruktur_pembagian_penetapan_bagi_hasil_pajak">Next</a>
            </li>
        </ul>
    </nav>
    </div>
@endsection