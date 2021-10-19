<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/covid', function () {
    $httpClient = new \GuzzleHttp\Client();
    $response = $httpClient->get('https://news.google.com/covid19/map?hl=en-PH&mid=%2Fm%2F05v8c&gl=PH&ceid=PH%3Aen');
    $htmlString = (string) $response->getBody();
    libxml_use_internal_errors(true);
    $doc = new DOMDocument();
    $doc->loadHTML($htmlString);
    $xpath = new DOMXPath($doc);
    $totalCasesArray = $xpath->evaluate('//div[@class="UvMayb"]'); // total cases
    $chartsImageArray = $xpath->evaluate('//div[@class="OeMT1d"]//img');
    $description1Array = $xpath->evaluate('//div[@class="RbBDcc"]');
    $description2Array = $xpath->evaluate('//div[@class="DlOivf"]');
    $reportedYesterdayArray = $xpath->evaluate('//div[@class="tIUMlb"]//strong');
    $intArray = $xpath->evaluate('//td[@class="l3HOY"]');

    //array
    $totalCases = [];
    $chartsImage = [];
    $descriptions1 = [];
    $descriptions2 = [];
    $reportedYesterday = [];


    foreach ($totalCasesArray as $tc) {
        $totalCases[] = $tc->textContent.PHP_EOL;
    }

    foreach ($chartsImageArray as $ca) {
        $chartsImage[] = $ca->getAttribute('src');
    }

    foreach ($description1Array as $d1a) {
        $descriptions1[] = $d1a->textContent.PHP_EOL;
    }

    foreach ($description2Array as $d2a) {
        $descriptions2[] = $d2a->textContent.PHP_EOL;
    }

    foreach ($reportedYesterdayArray as $ry) {
        $reportedYesterday[] = $ry->textContent.PHP_EOL;
    }


    $result = [
        'local'=>[
            'cases' =>[
                'total'=> $totalCases[0],
                'reported_yesterday'=>$reportedYesterday[0]
            ],
            'chart' => [
                'image'=>$chartsImage[0],
                'description_1'=>$descriptions1[1],
                'description_2'=>$descriptions2[0],
            ],
            'deaths'=>[
                'total'=>$totalCases[1],
                'reported_yesterday'=>$reportedYesterday[1] ?? 'no data'
            ],
        ],
        'intern'=>[
            'total_cases'=>$intArray[0]->textContent,
            'total_deaths'=>$intArray[4]->textContent
        ]
    ];

    return response(
        $result,
        200
    );

});
