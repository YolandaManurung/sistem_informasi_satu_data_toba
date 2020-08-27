<div class="sidebar" data-image="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                {{ __("Creative Tim") }}
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
                <a class="nav-link" data-toggle="collapse" href="#laravelExamples" @if($activeButton =='laravel') aria-expanded="true" @endif>
                    <i>
                        <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px">
                    </i>
                    <p>
                        {{ __('Laravel example') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='laravel') show @endif" id="laravelExamples">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'user') active @endif">
                            <a class="nav-link" href="{{route('profile.edit')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("User Profile") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'user-management') active @endif">
                            <a class="nav-link" href="{{route('user.index')}}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __("User Management") }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item @if($activePage == 'table') active @endif">
                <a class="nav-link" href="{{url('#', 'table')}}">
                    <!-- <i class="nc-icon nc-notes"></i> -->
                    <p>{{ __("Table List") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'typography') active @endif">
                <a class="nav-link" href="{{url('#', 'typography')}}">
                    <!-- <i class="nc-icon nc-paper-2"></i> -->
                    <p>{{ __("Typography") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'icons') active @endif">
                <a class="nav-link" href="{{url('#', 'icons')}}">
                    <!-- <i class="nc-icon nc-atom"></i> -->
                    <p>{{ __("Icons") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'maps') active @endif">
                <a class="nav-link" href="{{url('#', 'maps')}}">
                    <!-- <i class="nc-icon nc-pin-3"></i> -->
                    <p>{{ __("Maps") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'notifications') active @endif">
                <a class="nav-link" href="{{url('#', 'notifications')}}">
                    <!-- <i class="nc-icon nc-bell-55"></i> -->
                    <p>{{ __("Notifications") }}</p>
                </a>
            </li>
           
            <li class="nav-item @if($activePage == 'pemerintahan_jlh_desa_kel') active @endif">
                <a class="nav-link" href="{{url('/pemerintahan_jlh_desa_kel')}}">
                    <!-- <i class="nc-icon nc-bell-55"></i> -->
                    <p>Pemerintahan</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#laravel" @if($activeButton =='laravel') aria-expanded="true" @endif>
                   
                    <p>
                        Kependudukan dan Tenaga Kerja
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='laravel') show @endif" id="laravel">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'user') active @endif">
                            <a class="nav-link" href="kependudukan_jumlah_penduduk">
                                <!-- <i class="nc-icon nc-single-02"></i> -->
                                <p>Kependudukan</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'user-management') active @endif">
                            <a class="nav-link" href="kependudukan_tenaga_kerja">
                                <!-- <i class="nc-icon nc-circle-09"></i> -->
                                <p>Tenaga Kerja</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item @if($activePage == 'user') active @endif">
                <a class="nav-link" href="{{url('#')}}">
                    <!-- <i class="nc-icon nc-bell-55"></i> -->
                    <p>Kesehatan</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'pariwisata') active @endif">
                <a class="nav-link" href="{{url('#')}}">
                    <!-- <i class="nc-icon nc-bell-55"></i> -->
                    <p>Pariwisata</p>
                </a>
            </li>

            <li class="nav-item @if($activePage == 'pendidikanpaud') active @endif">
                <a class="nav-link" href="{{url('#')}}">
                    <!-- <i class="nc-icon nc-bell-55"></i> -->
                    <p>Pendidikan</p>
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
                        <a class="nav-link" href="{{url('#')}}">
                  
                                <p>Peternakan</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'user-management') active @endif">
                            <a class="nav-link" href="{{url('/jumlah_penerima_bantuan_ternak')}}">
                         
                                <p>Penerima Bantuan Ternak</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'user-management') active @endif">
                            <a class="nav-link" href="{{url('/luas_dan_produksi_kopi_dan_kakao')}}">
                 
                                <p>Perkebunan</p>
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
                            <a class="nav-link" href="{{url('#')}}">
                  
                                <p>Perindustrian</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'user-management') active @endif">
                            <a class="nav-link" href="{{url('#')}}">

                         
                                <p>Teknologi</p>
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
                            <a class="nav-link"  href="{{url('/infrastruktur_aplikasi_opd1')}}">
                  
                                <p>Infrastruktur</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'user-management') active @endif">
                            <a class="nav-link" href="{{url('/infrastruktur_pembangunan_bersumber_dana_desa')}}">
                         
                                <p>Pembangunan</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'user-management') active @endif">
                            <a class="nav-link" href="{{url('/infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa')}}">
                         
                                <p>Besaran Alokasi Dana</p>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li>

            
        </ul>
    </div>
</div>
