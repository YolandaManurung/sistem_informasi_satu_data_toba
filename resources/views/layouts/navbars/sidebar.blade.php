<div class="sidebar" data-color="blue" data-image="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
          
            <a href="http://www.creative-tim.com" class="simple-text">
              
                  
                      <img src="{{ ('toba.png') }}" height="60px" width="60px"> <b>
                {{ __("Satu Data Toba") }} </b>
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>
           
            <li class="nav-item">
                
                <div class="collapse @if($activeButton =='laravel') show @endif" id="laravelExamples">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'user') active @endif">
                            <a class="nav-link" href="{{route('profile.edit')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("Profile User") }}</p>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li>
            @if(Auth::user()->role == '0')
            @if (Route::has('register'))
            <li class="nav-item">
                
                <div class="collapse @if($activeButton =='laravel') show @endif" id="laravelExamples">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'user') active @endif">
                            <a class="nav-link" href="{{url('/form_register_dinas')}}">
                                <i class="fa fa-registered"></i>
                                <p>{{ __("Buat Akun Dinas") }}</p>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li>          
            @endif
            <li class="nav-item">
                
                <div class="collapse @if($activeButton =='laravel') show @endif" id="laravelExamples">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'user') active @endif">
                            <a class="nav-link" href="{{url('/daftar_user')}}">
                                <i class="fa fa-list"></i>
                                <p>{{ __("Daftar User") }}</p>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li>      
            @endif

            <!-- <li class="nav-item @if($activePage == 'table') active @endif">
                <a class="nav-link" href="{{url('#', 'table')}}">
                     <i class="nc-icon nc-notes"></i> 
                    <p>{{ __("Table List") }}</p>
                </a>
            </li> -->
            <!-- <li class="nav-item @if($activePage == 'typography') active @endif">
                <a class="nav-link" href="{{url('#', 'typography')}}">
                     <i class="nc-icon nc-paper-2"></i> 
                    <p>{{ __("Typography") }}</p>
                </a>
            </li> 
            <li class="nav-item @if($activePage == 'icons') active @endif">
                <a class="nav-link" href="{{url('#', 'icons')}}">
                 <i class="nc-icon nc-atom"></i> 
                    <p>{{ __("Icons") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'maps') active @endif">
                <a class="nav-link" href="{{url('#', 'maps')}}">
                    <i class="nc-icon nc-pin-3"></i> 
                    <p>{{ __("Maps") }}</p>
                </a>
            </li> -->
            
            <!--<li class="nav-item @if($activePage == 'notifications') active @endif">-->
            <!--    <a class="nav-link" href="{{url('/notifikasi', 'notifications')}}">-->
            <!--         <i class="nc-icon nc-bell-55"></i> -->
            <!--        <p>{{ __("Notifikasi") }}</p>-->
            <!--    </a>-->
            <!--</li>-->
           
            <li class="nav-item @if($activePage == 'pemerintahan_jlh_desa_kel') active @endif">
            @if(Auth::user()->role == '1')
                <a class="nav-link" href="{{url('/pemerintahan_jlh_desa_kel')}}">
            @elseif(Auth::user()->role == '0')
                <a class="nav-link" href="{{url('/admin/pemerintahan_jlh_desa_kel')}}">
            @else
            <a class="nav-link" href="{{url('/pemerintahan_jlh_desa_kel1')}}">
            @endif
                    <!-- <i class="nc-icon nc-bell-55"></i> -->
                    <p>Pemerintahan</p> 
                    </a>
                    </a>
                    </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#laravel" @if($activeButton =='laravel') aria-expanded="true" @endif>
                     <i class="glyphicon glyphicon-chevron-right"></i>    
                    <p>
                        Kependudukan dan Tenaga Kerja
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='laravel') show @endif" id="laravel">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'user') active @endif">
                        @if(Auth::user()->role == '0')
                        <a class="nav-link" href="/admin/kependudukan_jumlah_penduduk">
                        @elseif(Auth::user()->role == '2')
                            <a class="nav-link" href="/kependudukan_jumlah_penduduk">
                        @else
                        <a class="nav-link" href="/kependudukan_jumlah_penduduk1">
                              
                        @endif
                                <p>Kependudukan</p>
                            </a>
                            </a>
                            </a>
        
                        </li>
                        <li class="nav-item @if($activePage == 'user-management') active @endif">
                        @if(Auth::user()->role == '0')
                        <a class="nav-link" href="/admin/kependudukan_tenaga_kerja">
                        @elseif(Auth::user()->role == '2')
                            <a class="nav-link" href="/kependudukan_tenaga_kerja">
                        @else
                            <a class="nav-link" href="/kependudukan_tenaga_kerja1">
                        @endif
                                <!-- <i class="nc-icon nc-circle-09"></i> -->
                                <p>Tenaga Kerja</p>
                            </a>
                            </a>
                            </a>
                            
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item @if($activePage == 'user') active @endif">
            @if(Auth::user()->role == '0')
            <a class="nav-link" href="{{url('/admin/kesehatan_rekapitulasi_penyandang_masalah')}}">
            @elseif(Auth::user()->role == '3')
                <a class="nav-link" href="{{url('/kesehatan_rekapitulasi_penyandang_masalah')}}">
            @else
            <a class="nav-link" href="{{url('/kesehatan_rekapitulasi_penyandang_masalah1')}}">
            @endif

                    <!-- <i class="nc-icon nc-bell-55"></i> -->
                    <p>Kesehatan</p>
                </a>
                </a>
                </a>
            </li>

            <li class="nav-item @if($activePage == 'pariwisata') active @endif">
            @if(Auth::user()->role == '0')
            <a class="nav-link" href="{{url('/admin/pariwisata')}}">
            @elseif(Auth::user()->role == '4')
                <a class="nav-link" href="{{url('/pariwisata')}}">
            @else
                <a class="nav-link" href="{{url('/pariwisata1')}}">
            @endif
                    <!-- <i class="nc-icon nc-bell-55"></i> -->
                    <p>Pariwisata</p>
                </a>
                </a>
            </li>

            <li class="nav-item @if($activePage == 'pendidikanpaud') active @endif">
            @if(Auth::user()->role == '0')
                <a class="nav-link" href="{{url('/admin/pendidikanpaud')}}">
            @elseif(Auth::user()->role == '5')
                <a class="nav-link" href="{{url('/pendidikanpaud')}}">
            @else
                <a class="nav-link" href="{{url('/pendidikanpaud1')}}">
            @endif
                    <p>Pendidikan</p>
                </a>
                </a>
            </li>
          
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#laravel1" @if($activeButton =='laravel1') aria-expanded="true" @endif>
                <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
                 <i class="glyphicon glyphicon-chevron-right"></i>    
                <p>
                        Peternakan, Perikanan, Perkebunan, dan Kehutanan
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='laravel1') show @endif" id="laravel1">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'user') active @endif">
                        @if(Auth::user()->role == '0')
                        <a class="nav-link" href="{{url('/admin/peternakan_populasi_ternak_besar')}}">
                        @elseif(Auth::user()->role == '6')
                        <a class="nav-link" href="{{url('/peternakan_populasi_ternak_besar')}}">
                        @else
                        <a class="nav-link" href="{{url('/peternakan_populasi_ternak_besar1')}}">
                        @endif
                  
                                <p>Peternakan</p>
                            </a>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'user-management') active @endif">
                        @if(Auth::user()->role == '0')
                        <a class="nav-link" href="{{url('/admin/jumlah_penerima_bantuan_ternak')}}">
                        @elseif(Auth::user()->role == '6')
                            <a class="nav-link" href="{{url('/jumlah_penerima_bantuan_ternak')}}">
                        @else
                            <a class="nav-link" href="{{url('/jumlah_penerima_bantuan_ternak1')}}">
                        @endif
                                <p>Penerima Bantuan Ternak</p>
                            </a>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'user-management') active @endif">
                        @if(Auth::user()->role == '0')
                        <a class="nav-link" href="{{url('/admin/luas_dan_produksi_kopi_dan_kakao')}}">
                        @elseif(Auth::user()->role == '6')
                            <a class="nav-link" href="{{url('/luas_dan_produksi_kopi_dan_kakao')}}">
                        @else
                            <a class="nav-link" href="{{url('/luas_dan_produksi_kopi_dan_kakao1')}}">
                        @endif
                 
                                <p>Perkebunan</p>
                            </a>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#laravel2" @if($activeButton =='laravel2') aria-expanded="true" @endif>
                <!-- <i class="nc-icon nc-stre-right"></i> -->
                 <!-- <i class="nc-icon nc-bell-55" width="10px"></i>     -->
                <p>
                        Perindustrian dan 
                        <br>Teknologi
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='laravel2') show @endif" id="laravel2">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'user') active @endif">
                        @if(Auth::user()->role == '0')
                        <a class="nav-link" href="{{url('/admin/daftar_industri_kecil_dan_menengah')}}">
                        @elseif(Auth::user()->role == '7')
                            <a class="nav-link" href="{{url('/daftar_industri_kecil_dan_menengah')}}">
                        @else
                        <a class="nav-link" href="{{url('/daftar_industri_kecil_dan_menengah1')}}">
                        @endif
                                <p>Perindustrian</p>
                            </a>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'user-management') active @endif">
                        @if(Auth::user()->role == '0')
                        <a class="nav-link" href="{{url('/admin/jumlah_menara')}}">
                        @elseif(Auth::user()->role == '7')
                            <a class="nav-link" href="{{url('/jumlah_menara')}}">
                        @else
                            <a class="nav-link" href="{{url('/jumlah_menara1')}}">
                        @endif
                                <p>Teknologi</p>
                            </a>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li>

           

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#laravel3" @if($activeButton =='laravel3') aria-expanded="true" @endif>
                <!-- <i class="nc-icon nc-stre-right"></i> -->
                 <!-- <i class="nc-icon nc-bell-55" width="10px"></i>     -->
                <p>   Infrastruktur 
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='laravel3') show @endif" id="laravel3">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'user') active @endif">
                        @if(Auth::user()->role == '8')
                        <a class="nav-link"  href="{{url('/infrastruktur_aplikasi_opd_toba')}}">
                        @elseif(Auth::user()->role == '0')
                            <a class="nav-link"  href="{{url('/admin/infrastruktur_aplikasi_opd_toba')}}">
                        @else
                            <a class="nav-link"  href="{{url('/infrastruktur_aplikasi_opd_toba1')}}">
                        @endif
                                <p>Infrastruktur</p>
                            </a>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'user-management') active @endif">
                        @if(Auth::user()->role == '0')
                            <a class="nav-link" href="{{url('/admin/infrastruktur_pembangunan_bersumber_dana_desa')}}">
                        @elseif(Auth::user()->role == '8')
                            <a class="nav-link" href="{{url('/infrastruktur_pembangunan_bersumber_dana_desa')}}">
                        @else
                            <a class="nav-link" href="{{url('/infrastruktur_pembangunan_bersumber_dana_desa1')}}">
                        @endif
                                <p>Pembangunan</p>
                            </a>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'user-management') active @endif">
                        @if(Auth::user()->role == '0')
                            <a class="nav-link" href="{{url('/admin/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa')}}">
                        @elseif(Auth::user()->role == '8')
                            <a class="nav-link" href="{{url('/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa')}}">
                        @else 
                            <a class="nav-link" href="{{url('/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa1')}}">
                        @endif
                                <p>Besaran Alokasi Dana</p>
                            </a>
                            </a>
                        </li>
                        
                    </ul>
                    </div>
                    </li>
                    <li class="nav-item @if($activePage == 'user-management') active @endif">
                        @if(Auth::user()->role == '0')
                        <a class="nav-link" href="{{url('/admin/pegawai_menurut_jenis_kelamin')}}">
                        @elseif(Auth::user()->role == '9')
                        <a class="nav-link" href="{{url('/pegawai_menurut_jenis_kelamin')}}">
                        @else 
                        <a class="nav-link" href="{{url('/pegawai_menurut_jenis_kelamin1')}}">
                        @endif
                        <p>Pegawai (BKD)</p>
                                </a>
                            </a>
                    </li>
                    
                    <li class="nav-item @if($activePage == 'pdam_jumlah_pemakaian_air_bersih') active @endif">
                            @if(Auth::user()->role == '0')
                            <a class="nav-link" href="{{url('/admin/pdam_jumlah_pemakaian_air_bersih')}}">
                            @elseif(Auth::user()->role == '10')
                                <a class="nav-link" href="{{url('/pdam_jumlah_pemakaian_air_bersih')}}">
                            @else
                                <a class="nav-link" href="{{url('/pdam_jumlah_pemakaian_air_bersih1')}}">
                            @endif
                                    <!-- <i class="nc-icon nc-bell-55"></i> -->
                                    <p>PDAM</p>
                                </a>
                                </a>
                    </li>
                        <li class="nav-item @if($activePage == 'pariwisata') active @endif">
                            @if(Auth::user()->role == '0')
                            <a class="nav-link" href="{{url('/admin/lindup_izin_lingkungan_berdasarkan_perusahaan')}}">
                            @elseif(Auth::user()->role == '11')
                                <a class="nav-link" href="{{url('/lindup_izin_lingkungan_berdasarkan_perusahaan')}}">
                            @else
                                <a class="nav-link" href="{{url('/lindup_izin_lingkungan_berdasarkan_perusahaan1')}}">
                            @endif
                                    <!-- <i class="nc-icon nc-bell-55"></i> -->
                                    <p>Lingkungan Hidup</p>
                                </a>
                                </a>
                        </li>

                        <li class="nav-item @if($activePage == 'rawat_inap_kelas') active @endif">
                            @if(Auth::user()->role == '0')
                            <a class="nav-link" href="{{url('/admin/rawat_inap_kelas')}}">
                            @elseif(Auth::user()->role == '12')
                                <a class="nav-link" href="{{url('/rawat_inap_kelas')}}">
                            @else
                                <a class="nav-link" href="{{url('/rawat_inap_kelas1')}}">
                            @endif
                                    <!-- <i class="nc-icon nc-bell-55"></i> -->
                                    <p>RSUD</p>
                                </a>
                                </a>
                        </li>
                        <li class="nav-item @if($activePage == 'bantuan_pemerintah_kecamatan') active @endif">
                            @if(Auth::user()->role == '0')
                            <a class="nav-link" href="{{url('/admin/bantuan_pemerintah_kecamatan')}}">
                            @elseif(Auth::user()->role == '13')
                                <a class="nav-link" href="{{url('/bantuan_pemerintah_kecamatan')}}">
                            @else
                                <a class="nav-link" href="{{url('/bantuan_pemerintah_kecamatan1')}}">
                            @endif
                                    <!-- <i class="nc-icon nc-bell-55"></i> -->
                                    <p>Ketahanan Pangan</p>
                                </a>
                                </a>
                        </li>

                        

                    </li>
                        
                    
 
        </ul>
    </div>
</div>
