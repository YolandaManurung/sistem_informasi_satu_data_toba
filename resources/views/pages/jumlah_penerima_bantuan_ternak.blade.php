@extends('layouts.app', ['activePage' => 'jumlah_penerima_bantuan_ternak', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            
                        <div class="col-12 text-right">
                                <a href="{{url('/tambah_jumlah_penerima_bantuan_ternak')}}" class="btn btn-sm btn-default">Tambahkan Data</a>

                        <h4 class="card-title" align="center">Jumlah Penerima Kelompok Bantuan Ternak</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        </div>

                      
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">

                            <a href="/jumlah_penerima_bantuan_ternak/exportpdf7" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead>
                                    <td><b>No</td>
                                    <td><b>Lokasi Penerima Bantuan/Kecamatan</th>
                                    <td><b>Desa/Kelurahan</td>
                                    <td><b>Jumlah Kelompok</td>
                                    <td><b>Jumlah Ternak</td>
                                    <td><b>Tahun</td>
                                    <td><b>Status</td>
                                    <td><b>Aksi</td>
                                </thead>
                                <tbody>
                               
                             <tr>
                                   <td scope="row"></td>
                                        <td><b><b>PENERIMA TERNAK BABI</td></b></b>
                                        <td></td>
                                        

                                        <td><b><b>{{$jumlahpenerima_kelompok_babi}} Kelompok</td><b><b>
                                        <td><b><b>{{number_format($jumlahpenerima_ternak_babi,0,",",".")}} Ekor</td><b><b>
                                        <td></td>
                                        <td></td>
                                      
                                        
                                        <td>
                                   </tr>
                                   
                                   @foreach($tbl7 as $tabel7)
                                    <tr>
                                    
                                        <td scope="row">{{$loop->iteration}}</td>
                                     
                                        <td>{{$tabel7->kecamatan}}</td>
                                        <td>{{$tabel7->desa_kelurahan}}</td>
                                        <td>{{$tabel7->jumlah_kelompok}} Kelompok</td>
                                        <td>{{number_format($tabel7->jumlah_ternak,0,",",".")}} Ekor</td>
                                      
                                        <td>{{$tabel7->tahun}}</td>
                                        <td>{{$tabel7->status}}</td>
                                        <td>
                                        <a href="{{ url('/edit7/'.$tabel7->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                            <a href="/jumlah_penerima_bantuan_ternak/hapus7/{{ $tabel7->id }}" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                                    </tr>
                                    @endforeach
                                    


                                <!-- PENERIMA TERNAK KERBAU -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>PENERIMA TERNAK KERBAU</td></b></b>
                                       
                                        <td></td>

                                        <td><b><b>{{$jumlahpenerima_kelompok_kerbau}} Kelompok</td><b><b>
                                        <td><b><b>{{number_format($jumlahpenerima_ternak_kerbau,0,",",".")}} Ekor</td><b><b>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>
                                   
                                   @foreach($tbl7a as $tabel7)
                                    <tr>
                                    
                                        <td scope="row">{{$loop->iteration}}</td>
                                     
                                        <td>{{$tabel7->kecamatan}}</td>
                                        <td>{{$tabel7->desa_kelurahan}}</td>
                                        <td>{{$tabel7->jumlah_kelompok}} Kelompok</td>
                                        <td>{{number_format($tabel7->jumlah_ternak,0,",",".")}} Ekor</td>
                                      
                                        <td>{{$tabel7->tahun}}</td>
                                        <td>{{$tabel7->status}}</td>
                                        <td>
                                <a href="{{ url('/edit7/'.$tabel7->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/jumlah_penerima_bantuan_ternak/hapus7/{{ $tabel7->id }}" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                                    </tr>
                                    @endforeach



                                    <!-- PENERIMA TERNAK SAPI -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>PENERIMA TERNAK SAPI</td></b></b>
                                       
                                        <td></td>

                                        <td><b><b>{{$jumlahpenerima_kelompok_sapi}} Kelompok</td><b><b>
                                        <td><b><b>{{number_format($jumlahpenerima_ternak_sapi,0,",",".")}} Ekor</td><b><b>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>
                                   
                                   @foreach($tbl7b as $tabel7)
                                    <tr>
                                    
                                        <td scope="row">{{$loop->iteration}}</td>
                                     
                                        <td>{{$tabel7->kecamatan}}</td>
                                        <td>{{$tabel7->desa_kelurahan}}</td>
                                        <td>{{$tabel7->jumlah_kelompok}} Kelompok</td>
                                        <td>{{number_format($tabel7->jumlah_ternak,0,",",".")}} Ekor</td>
                                      
                                        <td>{{$tabel7->tahun}}</td>
                                        <td>{{$tabel7->status}}</td>
                                        <td>
                                <a href="{{ url('/edit7/'.$tabel7->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/jumlah_penerima_bantuan_ternak/hapus7/{{ $tabel7->id }}" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                                    </tr>
                                    @endforeach


                                     <!-- PENERIMA TERNAK AYAM -->
                                     <tr>
                                   <td scope="row"></td>
                                        <td><b><b>PENERIMA TERNAK AYAM</td></b></b>
                                       
                                        <td></td>

                                        <td><b><b>{{$jumlahpenerima_kelompok_ayam}} Kelompok</td><b><b>
                                        <td><b><b>{{number_format($jumlahpenerima_ternak_ayam,0,",",".")}} Ekor</td><b><b>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>
                                   
                                   @foreach($tbl7c as $tabel7)
                                    <tr>
                                    
                                        <td scope="row">{{$loop->iteration}}</td>
                                     
                                        <td>{{$tabel7->kecamatan}}</td>
                                        <td>{{$tabel7->desa_kelurahan}}</td>
                                        <td>{{$tabel7->jumlah_kelompok}} Kelompok</td>
                                        <td>{{number_format($tabel7->jumlah_ternak,0,",",".")}} Ekor</td>
                                      
                                        <td>{{$tabel7->tahun}}</td>
                                        <td>{{$tabel7->status}}</td>
                                        <td>
                                <a href="{{ url('/edit7/'.$tabel7->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/jumlah_penerima_bantuan_ternak/hapus7/{{ $tabel7->id }}" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                                    </tr>
                                    @endforeach


                                    <!-- PENERIMA TERNAK ITIK -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>PENERIMA TERNAK ITIK</td></b></b>
                                       
                                        <td></td>

                                        <td><b><b>{{$jumlahpenerima_kelompok_itik}} Kelompok</td><b><b>
                                        <td><b><b>{{number_format($jumlahpenerima_ternak_itik,0,",",".")}} Ekor</td><b><b>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>
                                   
                                   @foreach($tbl7d as $tabel7)
                                    <tr>
                                    
                                        <td scope="row">{{$loop->iteration}}</td>
                                     
                                        <td>{{$tabel7->kecamatan}}</td>
                                        <td>{{$tabel7->desa_kelurahan}}</td>
                                        <td>{{$tabel7->jumlah_kelompok}} Kelompok</td>
                                        <td>{{number_format($tabel7->jumlah_ternak,0,",",".")}} Ekor</td>
                                      
                                        <td>{{$tabel7->tahun}}</td>
                                        <td>{{$tabel7->status}}</td>
                                        <td>
                                <a href="{{ url('/edit7/'.$tabel7->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/jumlah_penerima_bantuan_ternak/hapus7/{{ $tabel7->id }}" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                                    </tr>
                                    @endforeach

                                    <!-- PENERIMA TERNAK KAMBING -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>PENERIMA TERNAK KAMBING</td></b></b>
                                       
                                        <td></td>

                                        <td><b><b>{{$jumlahpenerima_kelompok_kambing}} Kelompok</td><b><b>
                                        <td><b><b>{{number_format($jumlahpenerima_ternak_kambing,0,",",".")}} Ekor</td><b><b>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>
                                   
                                   @foreach($tbl7e as $tabel7)
                                    <tr>
                                    
                                        <td scope="row">{{$loop->iteration}}</td>
                                     
                                        <td>{{$tabel7->kecamatan}}</td>
                                        <td>{{$tabel7->desa_kelurahan}}</td>
                                        <td>{{$tabel7->jumlah_kelompok}} Kelompok</td>
                                        <td>{{number_format($tabel7->jumlah_ternak,0,",",".")}} Ekor</td>
                                      
                                        <td>{{$tabel7->tahun}}</td>
                                        <td>{{$tabel7->status}}</td>
                                        <td>
                                        <a href="{{ url('/edit7/'.$tabel7->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                                <a href="/jumlah_penerima_bantuan_ternak/hapus7/{{ $tabel7->id }}" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{ $tbl7->links() }}
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
    </div>
@endsection