<?php

use App\Models\BikeStatus;
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

Route::get('/', [App\Http\Controllers\MapController::class, 'index']);

// Route::get('/', function () {

//     return view('welcome');
// });

Route::get('lyft-station', function () {

    //Lyft bike status
    $url = 'https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/station_information.json';

    $source = Http::get($url); // Laravel HTTP client response
    $lz = lazyJson($source);
    //$first = $lz->first();
    //$bikes = $first;
    dd($lz->first());

    foreach ($bikes['bikes'] as $key => $bike) {

        echo '<pre>';
        var_dump($key, $bike['lat'], $bike['lon']);
        echo '</pre>';

        $newbike = new BikeStatus();
        $newbike->bike_id = $bike['bike_id'];
        $newbike->lat = $bike['lat'];
        $newbike->lng = $bike['lon'];
        $newbike->vendor = 'Lyft';
        $newbike->save();
        // $cpref->qatype = $save_catp; // need to put the array value here
        // $cpref->type = 1;
        //$cpref->save();

    }
    dd('DONE');

});

Route::get('lime', function () {
    //LazyCollection::fromJson($source);
    //Lyft station_information
    //$url = 'https://s3.amazonaws.com/lyft-lastmile-production-iad/lbs/chi/station_information.json';

    //Lyft bike status
    $url = 'https://data.lime.bike/api/partners/v1/gbfs/chicago/free_bike_status';

    $source = Http::get($url); // Laravel HTTP client response

    // $src = json_decode($source);
    //$lz = lazyJson($src);
    // dd($lz);

    $srcjson = $source->json();

    $bikes = $srcjson['data']['bikes'];

    foreach ($bikes as $key => $bike) {

        echo '<pre>';
        var_dump($key, $bike['lat'], $bike['lon']);
        echo '</pre>';

        $newbike = new BikeStatus();
        $newbike->bike_id = $bike['bike_id'];
        $newbike->lat = $bike['lat'];
        $newbike->lng = $bike['lon'];
        $newbike->bike_type = $bike['vehicle_type'];
        $newbike->vendor = 'Lime';
        $newbike->save();

    }
    dd('DONE');

});

//  https://data.lime.bike/api/partners/v1/gbfs/chicago/free_bike_status

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
