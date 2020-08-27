<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use FarhanWazir\GoogleMaps\GMaps;
class MapController extends Controller
{

    public function map()
    {
        $config['center'] = 'Sydney Airport,Sydney';
        $config['zoom'] = '14';
        $config['map_height'] = '400px';

        $gmap = new GMaps();
        $gmap->initialize($config);
     
        $marker['position'] = 'Sydney Airport,Sydney';
        $marker['infowindow_content'] = 'Sydney Airport,Sydney';

        $gmap->add_marker($marker);
        $map = $gmap->create_map();
        return view('welcome',compact('map'));
    }

}
