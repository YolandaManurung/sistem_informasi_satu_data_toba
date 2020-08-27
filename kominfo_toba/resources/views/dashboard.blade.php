@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Sistem Informasi Pusat Statistik', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('content')
    
 <style>
 img {
 
  border: 3px solid transparent;
  border-radius: 4px;
  padding: 5px;
 
}


 }
</style> 

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Email Statistics') }}</h4>
                            <p class="card-category">{{ __('Last Campaign Performance') }}</p>
                        </div>
                        <div class="card-body ">
                            <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('Open') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('Bounce') }}
                                <i class="fa fa-circle text-warning"></i> {{ __('Unsubscribe') }}
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> {{ __('Campaign sent 2 days ago') }}
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-md-12">
                <div class="cards ">
                <!-- <div class="backgroud_gambar"></div> -->
                    <img src="{{ ('peta.jpg') }}" height="500px" width="1325px"> 
                  
                </div>
                </div>
            </div>
            <div></div>
            <div class="row">
                <div class="col-md-6">
                    <div class="cards ">
                        
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        </ol>
                        
                       
                        
                        
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                             <img src="{{ ('bupati.jpg') }}" height="924px" width="700px" align="center"> 
                            </div>
                            <div class="carousel-item">
                            <img src="{{ ('dprd.jpg') }}" height="924px" width="700px" align="center">  
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                        <!--<div class="card-header ">-->
                        <!--    <h4 class="card-title">{{ __('Kabu') }}</h4>-->
                        <!--    <p class="card-category">{{ __('All products including Taxes') }}</p>-->
                        <!--</div>-->
                        <!--<div class="cards ">-->
                        <!--     <img src="{{ ('bupati.jpg') }}" height="920px" width="675px" align="center"> -->
                        <!--</div>-->
                       
                    </div>
                </div>
               
                  <div class="col-md-6">
                    <div class="card  card-tasks">
                        <div class="card-header ">
                            <h4 class="card-title" align="center">{{ __('Kecamatan Toba') }}</h4>
                        </div>
                           <div class="card-body table-responsive"> 
                            <table class="table table-hover table-striped">
                                <thead>
                                    <td align="center" ><b>Nama Kecamatan</td>
                                    <td align="center" ><b>Lintang Utara</td>
                                    <td  ><b>Bujur Timur</td>
                                </thead>
                                    <tbody>
                                        <tr>
                                            <td align="center">{{ __('Balige') }}</td>
                                            <td align="center">{{ __(' 2°15 ‘ – 2°21’ ') }}</td>
                                            <td align="center">{{ __('  99°00 – 99°11’ ') }}</td>
                                            </td>
                                        </tr>
                                          <tr>
                                           
                                            <td align="center">{{ __('Tampahan') }}</td>
                                            <td align="center">{{ __(' 2°15 ‘ – 2°20’ ') }}</td>
                                            <td align="center">{{ __('  98°57 – 99°04’ ') }}</td>
                                            </td>
                                        </tr>
                                          <tr>
                                            
                                            <td align="center">{{ __('Laguboti') }}</td>
                                            <td align="center">{{ __(' 2°13 ‘ – 2°23’ ') }}</td>
                                            <td align="center">{{ __('  98°08 – 99°15’ ') }}</td>
                                            </td>
                                        </tr>
                                          <tr>
                                           
                                            <td align="center">{{ __('Siantar Narumonda') }}</td>
                                            <td align="center">{{ __(' 2°24 ‘ – 2°37’ ') }}</td>
                                            <td align="center">{{ __('  99°03 – 99°16’ ') }}</td>
                                            </td>
                                        </tr>
                                          <tr>
                                            
                                            <td align="center">{{ __('Sigumpar') }}</td>
                                            <td align="center">{{ __(' 2°20 ‘ – 2°24’ ') }}</td>
                                            <td align="center">{{ __('  99°08 – 99°11’ ') }}</td>
                                            </td>
                                        </tr>
                                          <tr>
                                            
                                            <td align="center">{{ __('Porsea') }}</td>
                                            <td align="center">{{ __(' 2°04 ‘ – 2°48’ ') }}</td>
                                            <td align="center">{{ __('  99°04 – 99°16’ ') }}</td>
                                            </td>
                                        </tr>
                                          <tr>
                                           
                                            <td align="center">{{ __('Bonatua Lunasi') }}</td>
                                            <td align="center">{{ __(' 2°29 ‘ – 2°39’ ') }}</td>
                                            <td align="center">{{ __('  99°02 – 99°15’ ') }}</td>
                                            </td>
                                        </tr>
                                          <tr>
                                           
                                            <td align="center">{{ __('Lumban Julu') }}</td>
                                            <td align="center">{{ __(' 2°29 ‘ – 2°39’ ') }}</td>
                                            <td align="center">{{ __('  99°02 – 99°15’ ') }}</td>
                                            </td>
                                        </tr>
                                          <tr>
                                           
                                            <td align="center">{{ __('Parmaksian') }}</td>
                                            <td align="center">{{ __(' 2°24 ‘ – 2°37’ ') }}</td>
                                            <td align="center">{{ __('  99°03 – 99°16’ ') }}</td>
                                            </td>
                                        </tr>
                                          <tr>
                                            
                                            <td align="center">{{ __('Uluan') }}</td>
                                            <td align="center">{{ __(' 2°23 ‘ – 2°30’ ') }}</td>
                                            <td align="center">{{ __('  99°04 – 99°09’ ') }}</td>
                                            </td>
                                        </tr>
                                          <tr>
                                           
                                            <td align="center">{{ __('Pintu Pohan Meranti') }}</td>
                                            <td align="center">{{ __(' 2°49 ‘ – 2°58’ ') }}</td>
                                            <td align="center">{{ __('  99°20 – 99°44’ ') }}</td>
                                            </td>
                                        </tr>
                                          <tr>
                                           
                                            <td align="center">{{ __('Silaen') }}</td>
                                            <td align="center">{{ __(' 2°18 ‘ – 2°27’ ') }}</td>
                                            <td align="center">{{ __('  99°11 – 99°15’ ') }}</td>
                                            </td>
                                        </tr>
                                          <tr>
                                           
                                            <td align="center">{{ __('Habinsaran') }}</td>
                                            <td align="center">{{ __(' 2°06 ‘ – 2°22’ ') }}</td>
                                            <td align="center">{{ __('  98°35 – 99°10’ ') }}</td>
                                            </td>
                                        </tr>
                                          <tr>
                                           
                                            <td align="center">{{ __('Nassau') }}</td>
                                            <td align="center">{{ __(' 2°13 ‘ – 2°28’ ') }}</td>
                                            <td align="center">{{ __('  99°15 – 99°40’ ') }}</td>
                                            </td>
                                        </tr>
                                          <tr>
                                            
                                            <td align="center">{{ __('Borbor') }}</td>
                                            <td align="center">{{ __(' 2°03 ‘ – 2°18’ ') }}</td>
                                            <td align="center">{{ __('  99°13 – 99°31’ ') }}</td>
                                            </td>
                                        </tr>
                                          <tr>
                                            
                                            <td align="center">{{ __('Ajibata') }}</td>
                                            <td align="center">{{ __(' 2°23 ‘ – 2°40’ ') }}</td>
                                            <td align="center">{{ __('  98°56 – 99°04’ ') }}</td>
                                            
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                       
                    </div>
                        
                         </div>
                         </div>
                         </div>
                    
                    
  
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            // demo.showNotification();

        });
    </script>
@endpush