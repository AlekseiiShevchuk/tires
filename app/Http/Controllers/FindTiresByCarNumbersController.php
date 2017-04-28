<?php

namespace App\Http\Controllers;

use App\CarBrand;
use App\CarModel;
use App\CarNumber;
use App\Tire;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Goutte\Client;
use Illuminate\Support\Facades\Gate;

class FindTiresByCarNumbersController extends Controller
{
    public function index()
    {
        if (!Gate::allows('find_tires_by_car_number_access')) {
            return abort(401);
        }
        return view('find_tires_by_car_numbers.index');
    }

    public function find(Request $request)
    {
        if (!Gate::allows('find_tires_by_car_number_access')) {
            return abort(401);
        }

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
        return view('find_tires_by_car_numbers.index')->with(['number' => $car_number, 'error' => $error]);
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
