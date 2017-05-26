<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TireProduct;
use Goutte\Client;
use App\CarBrand;
use App\CarModel;
use App\CarNumber;
use App\Tire;
use App\TireSize;
use Illuminate\Database\Eloquent\Collection;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tires = TireProduct::query();
        
        $tires = $tires->paginate(16);

        return view('index')
            ->with(['tires' => $tires, 'error' => null])
        ;
    }

    public function find(Request $request)
    {
        $numberInput = str_replace(' ', '', $request->get('number'));

        $car_number = CarNumber::firstOrCreate(['number' => $numberInput]);
        if ($car_number->car_model == null) {
            $this->parseDataByCarNumber($car_number);
        }
        //get fresh model from db
        $car_number = CarNumber::find($car_number->id);
        $error = null;
        if ($car_number->car_model == null) {
            $car_number->forceDelete();
            $error = 'Can not find results for car number <strong>' . $numberInput . ' </strong> !';
        }

        $tires = $car_number->car_model->tires;

        $sizes = [];

        foreach ($tires as $key => $tire) {
            $arr = explode(' ', $tire->description);
            $sizes[] = $arr[0] . ' ' . $arr[1];
        }

        $sizes = $users = TireSize::whereIn('size', $sizes)->get();

        $sizes_id = [];

        foreach ($sizes as $size) {
            $sizes_id[] = $size->id;
        }

        $tire_products = TireProduct::whereIn('size_id', $sizes_id);
        
        $tire_products = $tire_products->paginate(16);
        
        return view('index')
            ->with(['tires' => [], 'tires' => $tire_products, 'error' => $error])
        ;
    }

    private function parseDataByCarNumber($car_number)
    {
        $client = new Client();
        $crawler = $client->request(
            'GET',
                 'http://www.daekonline.dk/cgi-bin/VnpSearch2.pl?search_tool=vnpsearch&dsco=123&cart_id=65915718.123.18173&VPKX=53616c7465645f5f86a625ed81cb47b20e0bcb297efd9868a96b04ae437d06077ceb2c8ccf9beb9c&VnpSearch2-NumberPlate=' . $car_number->number . '&suchen=Vis+tilbud'
        );

        if ($crawler->filter('.search > p > b')->count() == 3) {
            $car_brand = CarBrand::firstOrCreate(['name' => $crawler->filter('.search > p > b')->getNode(0)->textContent]);
            $car_model = CarModel::firstOrCreate([
                'description' => $crawler->filter('.search > p > b')->getNode(1)->textContent,
                'motor' => $crawler->filter('.search > p > b')->getNode(2)->textContent,
                'car_brand_id' => $car_brand->id
            ]);
            $car_number->car_model_id = $car_model->id;
            $car_number->save();
            $raw_tires_array = explode(' (for/bag) Sommerdæk Helårsdæk VinterdækFind hjul', $crawler->filter('.search > table')->getNode(0)->textContent);
            array_pop($raw_tires_array);
            if (count($raw_tires_array) > 0) {

                $tires_collection = new Collection();
                foreach ($raw_tires_array as $raw_tire) {
                    $tires_collection->add(Tire::firstOrCreate(['description' => $raw_tire]));
                }
                $car_model->tires()->syncWithoutDetaching($tires_collection);
            }
        }
    }
}
