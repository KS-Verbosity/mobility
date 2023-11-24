<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('pull', function () {
    //LazyCollection::fromJson($source);
    //Lyft station_information
    //$url = 'https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/station_information.json';

    //Lyft bike status
    $url = 'https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/free_bike_status.json';

    $source = Http::get($url); // Laravel HTTP client response
    $lz = lazyJson($source);
    $first = $lz->first();
    $bikes = $first;
    //dd($lz->first());

    foreach ($bikes['bikes'] as $key => $bike) {

        echo '<pre>';
        var_dump($key, $bike['lat'], $bike['lon']);
        echo '</pre>';

        //$cpref= new Cpref();
        // $cpref->user_id = $user_id;
        // $cpref->qatype = $save_catp; // need to put the array value here
        // $cpref->type = 1;
        //$cpref->save();

    }
    dd($bikes);
    //dd($lz->first()->data->bikes);
    //dd($lz);
    // foreach ($bikes as $bike) {
    //     var_dump($bike[0]);
    // }
});

// LYFT
// name	"gbfs"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/gbfs.json"
// 1
// name	"system_information"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/system_information.json"
// 2
// name	"station_information"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/station_information.json"
// 3
// name	"station_status"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/station_status.json"
// 4
// name	"free_bike_status"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/free_bike_status.json"
// 5
// name	"system_hours"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/system_hours.json"
// 6
// name	"system_calendar"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/system_calendar.json"
// 7
// name	"system_regions"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/system_regions.json"
// 8
// name	"system_pricing_plans"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/system_pricing_plans.json"
// 9
// name	"system_alerts"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/system_alerts.json"
// es
// feeds
// 0
// name	"gbfs"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/gbfs.json"
// 1
// name	"system_information"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/system_information.json"
// 2
// name	"station_information"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/station_information.json"
// 3
// name	"station_status"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/station_status.json"
// 4
// name	"free_bike_status"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/free_bike_status.json"
// 5
// name	"system_hours"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/system_hours.json"
// 6
// name	"system_calendar"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/system_calendar.json"
// 7
// name	"system_regions"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/system_regions.json"
// 8
// name	"system_pricing_plans"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/system_pricing_plans.json"
// 9
// name	"system_alerts"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/system_alerts.json"
// fr
// feeds
// 0
// name	"gbfs"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/gbfs.json"
// 1
// name	"system_information"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/system_information.json"
// 2
// name	"station_information"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/station_information.json"
// 3
// name	"station_status"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/station_status.json"
// 4
// name	"free_bike_status"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/free_bike_status.json"
// 5
// name	"system_hours"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/system_hours.json"
// 6
// name	"system_calendar"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/system_calendar.json"
// 7
// name	"system_regions"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/system_regions.json"
// 8
// name	"system_pricing_plans"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/system_pricing_plans.json"
// 9
// name	"system_alerts"
// url	"https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/system_alerts.json"
// last_updated	1692287862
// ttl	5
