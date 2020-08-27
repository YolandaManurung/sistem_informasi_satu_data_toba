@extends('layouts.app', ['activePage' => 'rekapitulasi_data_menara', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            

<!-- 
                        <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="no-icon">{{ __('Lainnya') }}</span>
                    </a> -->
                    <!-- <div class="col-12 text-right">
                                <a href="{{url('/tambah_rekapitulasi_data_menara')}}" class="btn btn-sm btn-primary">Tambahkan Data</a>
                            </div> -->
                    <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   
                    <a class="dropdown-item" href="{{url('/jumlah_menara')}}">Jumlah Menara menurut Kecamatan</a>
                    <a class="dropdown-item" href="{{url('/rekapitulasi_data_menara')}}">Rekapitulasi Data Menara, Pengguna, Tinggi Menara Kabupaten Toba Samosir</a>
                    <a class="dropdown-item" href="{{url('/daftar_internet_dan_game_monitoring')}}">Daftar Internet/Game Net yang Dimonitoring</a>
                    <a class="dropdown-item" href="{{url('/jumlah_desa_blank_spot')}}">Jumlah Desa Blank Spot</a>
 -->

                        <!-- <div class="divider"></div>
                        <a class="dropdown-item" href="#">{{ __('Separated link') }}</a> -->
                    <!-- </div>
</div> -->
               


                      
                        <h4 class="card-title" align="center">Rekapitulasi Data Menara, Pengguna, Tinggi Menara Kabupaten Toba Samosir</h4>


                            <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                        <!-- </div> -->
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                            <a href="/rekapitulasi_data_menara/exportpdf16" class="btn btn-sm btn-warning"   >CETAK PDF</a>
                                <thead>
                                    <td><b>No</td>
                                   
                                    <td><b>Kecamatan/Alamat Site</td>
                                    <td align="center"><b>IMB</td>      
                                    <td align="center"><b>Tinggi Menara</td>         
                                    <td align="center"><b>Pemilik</td>      
                                    <td align="center"><b>Pengguna</td>                         
                                    <td align="center"><b>Tahun</td>
                                    <!-- <td align="center"><b>Status</td>
                                    <td><b>Aksi</td> -->
                                    <td></td>
                                </thead>
                                <tbody>
                                <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Tampahan</td></b></b>
                                       
                                        <td></td>

                                        <td><b><b></td><b><b>
                                        <td><b><b></td><b><b>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>
                                @foreach($tbl16 as $tabel16)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    
                                    <td>{{$tabel16->kecamatan}}</td>
                                    <td align="center">{{$tabel16->imb}}</td>    
                                    <td align="center">{{$tabel16->tinggi_menara}}</td>
                                    <td align="center">{{$tabel16->pemilik}}</td>
                                    <td align="center">{{$tabel16->pengguna}}</td>               
                                    <td align="center">{{$tabel16->tahun}}</td>
                                    <!-- <td align="center">{{$tabel16->status}}</td>
                                    <td>
                                <a href="{{ url('/edit16/'.$tabel16->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                            <a href="/rekapitulasi_data_menara/hapus16/{{ $tabel16->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td> -->
                    <td></td>   


                                    </tr>
                                    @endforeach

                                    
                                    <!-- KEC BALIGE -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Balige</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl16a as $tabel16)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{$tabel16->kecamatan}}</td>
                                    <td align="center">{{$tabel16->imb}}</td>    
                                    <td align="center">{{$tabel16->tinggi_menara}}</td>
                                    <td align="center">{{$tabel16->pemilik}}</td>
                                    <td align="center">{{$tabel16->pengguna}}</td>               
                                    <td align="center">{{$tabel16->tahun}}</td>
                                    <!-- <td align="center">{{$tabel16->status}}</td>
                                    <td>
                                <a href="{{ url('/edit16/'.$tabel16->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                              <a href="/rekapitulasi_data_menara/hapus16/{{ $tabel16->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td> -->
                    <td></td>   
                                    </tr>
                                    @endforeach


                                    <!-- KEC LAGUBOTI -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Laguboti</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl16b as $tabel16)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                   
                                    <td>{{$tabel16->kecamatan}}</td>
                                    <td align="center">{{$tabel16->imb}}</td>    
                                    <td align="center">{{$tabel16->tinggi_menara}}</td>
                                    <td align="center">{{$tabel16->pemilik}}</td>
                                    <td align="center">{{$tabel16->pengguna}}</td>               
                                    <td align="center">{{$tabel16->tahun}}</td>
                                    <!-- <td align="center">{{$tabel16->status}}</td>
                                    <td>
                                    <a href="{{ url('/edit16/'.$tabel16->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                              <a href="/rekapitulasi_data_menara/hapus16/{{ $tabel16->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td> -->
                    <td></td>   
                                    </tr>
                                    @endforeach

                                    <!-- KEC SIGUMPAR -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Sigumpar</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl16c as $tabel16)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                  
                                    <td>{{$tabel16->kecamatan}}</td>
                                    <td align="center">{{$tabel16->imb}}</td>    
                                    <td align="center">{{$tabel16->tinggi_menara}}</td>
                                    <td align="center">{{$tabel16->pemilik}}</td>
                                    <td align="center">{{$tabel16->pengguna}}</td>               
                                    <td align="center">{{$tabel16->tahun}}</td>
                                    <!-- <td align="center">{{$tabel16->status}}</td>
                                    <td>
                                <a href="{{ url('/edit16/'.$tabel16->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                              <a href="/rekapitulasi_data_menara/hapus16/{{ $tabel16->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td> -->
                    <td></td>   
                                    </tr>
                                    @endforeach

                                    <!-- KEC SILAEN -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Silaen</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl16d as $tabel16)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                  
                                    <td>{{$tabel16->kecamatan}}</td>
                                    <td align="center">{{$tabel16->imb}}</td>    
                                    <td align="center">{{$tabel16->tinggi_menara}}</td>
                                    <td align="center">{{$tabel16->pemilik}}</td>
                                    <td align="center">{{$tabel16->pengguna}}</td>               
                                    <td align="center">{{$tabel16->tahun}}</td>
                                    <!-- <td align="center">{{$tabel16->status}}</td>
                                    <td>
                                <a href="{{ url('/edit16/'.$tabel16->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                              <a href="/rekapitulasi_data_menara/hapus16/{{ $tabel16->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td> -->
                    <td></td>   
                                    </tr>
                                    @endforeach

                                    <!-- KEC HABINSARAN -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Habinsaran</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl16e as $tabel16)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                
                                    <td>{{$tabel16->kecamatan}}</td>
                                    <td align="center">{{$tabel16->imb}}</td>    
                                    <td align="center">{{$tabel16->tinggi_menara}}</td>
                                    <td align="center">{{$tabel16->pemilik}}</td>
                                    <td align="center">{{$tabel16->pengguna}}</td>               
                                    <td align="center">{{$tabel16->tahun}}</td>
                                    <!-- <td align="center">{{$tabel16->status}}</td>
                                    <td>
                                <a href="{{ url('/edit16/'.$tabel16->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                              <a href="/rekapitulasi_data_menara/hapus16/{{ $tabel16->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td> -->
                    <td></td>   
                                    </tr>
                                    @endforeach

                                    <!-- KEC BORBOR -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Borbor</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl16f as $tabel16)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                 
                                    <td>{{$tabel16->kecamatan}}</td>
                                    <td align="center">{{$tabel16->imb}}</td>    
                                    <td align="center">{{$tabel16->tinggi_menara}}</td>
                                    <td align="center">{{$tabel16->pemilik}}</td>
                                    <td align="center">{{$tabel16->pengguna}}</td>               
                                    <td align="center">{{$tabel16->tahun}}</td>
                                    <!-- <td align="center">{{$tabel16->status}}</td>
                                    <td>
                                <a href="{{ url('/edit16/'.$tabel16->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                              <a href="/rekapitulasi_data_menara/hapus16/{{ $tabel16->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td> -->
                    <td></td>   
                                    </tr>
                                    @endforeach

                                    <!-- KEC NASSAU -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Nassau</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl16g as $tabel16)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                   
                                    <td>{{$tabel16->kecamatan}}</td>
                                    <td align="center">{{$tabel16->imb}}</td>    
                                    <td align="center">{{$tabel16->tinggi_menara}}</td>
                                    <td align="center">{{$tabel16->pemilik}}</td>
                                    <td align="center">{{$tabel16->pengguna}}</td>               
                                    <td align="center">{{$tabel16->tahun}}</td>
                                    <!-- <td align="center">{{$tabel16->status}}</td>
                                    <td>
                                <a href="{{ url('/edit16/'.$tabel16->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                              <a href="/rekapitulasi_data_menara/hapus16/{{ $tabel16->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td> -->
                    <td></td>   
                                    </tr>
                                    @endforeach

                                    <!-- KEC SIANTAR NARUMONDA -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Siantar Narumonda</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl16h as $tabel16)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                   
                                    <td>{{$tabel16->kecamatan}}</td>
                                    <td align="center">{{$tabel16->imb}}</td>    
                                    <td align="center">{{$tabel16->tinggi_menara}}</td>
                                    <td align="center">{{$tabel16->pemilik}}</td>
                                    <td align="center">{{$tabel16->pengguna}}</td>               
                                    <td align="center">{{$tabel16->tahun}}</td>
                                    <!-- <td align="center">{{$tabel16->status}}</td>
                                    <td>
                                <a href="{{ url('/edit16/'.$tabel16->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                              <a href="/rekapitulasi_data_menara/hapus16/{{ $tabel16->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td> -->
                    <td></td>   
                                    </tr>
                                    @endforeach

                                    <!-- KEC PORSEA -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Porsea</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl16i as $tabel16)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                   
                                    <td>{{$tabel16->kecamatan}}</td>
                                    <td align="center">{{$tabel16->imb}}</td>    
                                    <td align="center">{{$tabel16->tinggi_menara}}</td>
                                    <td align="center">{{$tabel16->pemilik}}</td>
                                    <td align="center">{{$tabel16->pengguna}}</td>               
                                    <td align="center">{{$tabel16->tahun}}</td>
                                    <!-- <td align="center">{{$tabel16->status}}</td>
                                    <td>
                                <a href="{{ url('/edit16/'.$tabel16->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                              <a href="/rekapitulasi_data_menara/hapus16/{{ $tabel16->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td> -->
                    <td></td>   
                                    </tr>
                                    @endforeach

                                    <!-- KEC PARMAKSIAN -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Parmaksian</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl16j as $tabel16)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                  
                                    <td>{{$tabel16->kecamatan}}</td>
                                    <td align="center">{{$tabel16->imb}}</td>    
                                    <td align="center">{{$tabel16->tinggi_menara}}</td>
                                    <td align="center">{{$tabel16->pemilik}}</td>
                                    <td align="center">{{$tabel16->pengguna}}</td>               
                                    <td align="center">{{$tabel16->tahun}}</td>
                                    <!-- <td align="center">{{$tabel16->status}}</td>
                                    <td>
                                <a href="{{ url('/edit16/'.$tabel16->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                              <a href="/rekapitulasi_data_menara/hapus16/{{ $tabel16->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td> -->
                    <td></td>   
                                    </tr>
                                    @endforeach


                                    <!-- KEC PINTU POHAN MERANTI -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Pintu Pohan Meranti</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl16k as $tabel16)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                
                                    <td>{{$tabel16->kecamatan}}</td>
                                    <td align="center">{{$tabel16->imb}}</td>    
                                    <td align="center">{{$tabel16->tinggi_menara}}</td>
                                    <td align="center">{{$tabel16->pemilik}}</td>
                                    <td align="center">{{$tabel16->pengguna}}</td>               
                                    <td align="center">{{$tabel16->tahun}}</td>
                                    <!-- <td align="center">{{$tabel16->status}}</td>
                                    <td>
                                <a href="{{ url('/edit16/'.$tabel16->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                              <a href="/rekapitulasi_data_menara/hapus16/{{ $tabel16->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td> -->
                    <td></td>   
                                    </tr>
                                    @endforeach

                                    <!-- KEC ULUAN -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Uluan</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl16l as $tabel16)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                  
                                    <td>{{$tabel16->kecamatan}}</td>
                                    <td align="center">{{$tabel16->imb}}</td>    
                                    <td align="center">{{$tabel16->tinggi_menara}}</td>
                                    <td align="center">{{$tabel16->pemilik}}</td>
                                    <td align="center">{{$tabel16->pengguna}}</td>               
                                    <td align="center">{{$tabel16->tahun}}</td>
                                    <!-- <td align="center">{{$tabel16->status}}</td>
                                    <td>
                                <a href="{{ url('/edit16/'.$tabel16->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                              <a href="/rekapitulasi_data_menara/hapus16/{{ $tabel16->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td> -->
                    <td></td>   
                                    </tr>
                                    @endforeach



                                    <!-- KEC LUMBAN JULU -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Lumban Julu</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl16m as $tabel16)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                   
                                    <td>{{$tabel16->kecamatan}}</td>
                                    <td align="center">{{$tabel16->imb}}</td>    
                                    <td align="center">{{$tabel16->tinggi_menara}}</td>
                                    <td align="center">{{$tabel16->pemilik}}</td>
                                    <td align="center">{{$tabel16->pengguna}}</td>               
                                    <td align="center">{{$tabel16->tahun}}</td>
                                    <!-- <td align="center">{{$tabel16->status}}</td>
                                    <td>
                                <a href="{{ url('/edit16/'.$tabel16->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                              <a href="/rekapitulasi_data_menara/hapus16/{{ $tabel16->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td> -->
                    <td></td>   
                                    </tr>
                                    @endforeach

                                    <!-- KEC BONATUA LUNASI -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Bonatua Lunasi</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl16n as $tabel16)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                   
                                    <td>{{$tabel16->kecamatan}}</td>
                                    <td align="center">{{$tabel16->imb}}</td>    
                                    <td align="center">{{$tabel16->tinggi_menara}}</td>
                                    <td align="center">{{$tabel16->pemilik}}</td>
                                    <td align="center">{{$tabel16->pengguna}}</td>               
                                    <td align="center">{{$tabel16->tahun}}</td>
                                    <!-- <td align="center">{{$tabel16->status}}</td>
                                    <td>
                                <a href="{{ url('/edit16/'.$tabel16->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                              <a href="/rekapitulasi_data_menara/hapus16/{{ $tabel16->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td> -->
                    <td></td>   
                                    </tr>
                                    @endforeach

                                    <!-- KEC AJIBATA -->
                                    <tr>
                                   <td scope="row"></td>
                                        <td><b><b>Kec. Ajibata</td></b></b>
                                       
                                        <td></td>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      

                                        <td>
                                   </tr>


                                   @foreach($tbl16o as $tabel16)
                                    <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                   
                                    <td>{{$tabel16->kecamatan}}</td>
                                    <td align="center">{{$tabel16->imb}}</td>    
                                    <td align="center">{{$tabel16->tinggi_menara}}</td>
                                    <td align="center">{{$tabel16->pemilik}}</td>
                                    <td align="center">{{$tabel16->pengguna}}</td>               
                                    <td align="center">{{$tabel16->tahun}}</td>
                                    <!-- <td align="center">{{$tabel16->status}}</td>
                                    <td>
                                <a href="{{ url('/edit16/'.$tabel16->id) }}" class="btn btn-sm btn-success">Edit</a>
                            &nbsp
                                   
                              <a href="/rekapitulasi_data_menara/hapus16/{{ $tabel16->id }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td> -->
                    <td></td> 

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
  
            </div>
        </div>


        <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="{{url('/jumlah_menara1')}}" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    
    <li class="page-item"><a class="page-link" href="{{url('/jumlah_menara1')}}">1</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/rekapitulasi_data_menara1')}}">2</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/daftar_internet_dan_game_monitoring1')}}">3</a></li>
    <li class="page-item"><a class="page-link" href="{{url('/jumlah_desa_blank_spot1')}}">4</a></li>


    <li class="page-item">
      <a class="page-link" href="{{url('/daftar_internet_dan_game_monitoring1')}}">Next</a>
    </li>
  </ul>
</nav>


    </div>
@endsection