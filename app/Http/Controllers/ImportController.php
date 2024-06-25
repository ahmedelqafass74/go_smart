<?php

namespace App\Http\Controllers;

use App\Imports\CityImport;
use App\Imports\DivingImport;
use App\Imports\HistoricalCityImport;
use App\Imports\HotelImport;
use App\Imports\LandmarkImport;
use App\Imports\RelaxationImport;
use App\Imports\RestaurantImport;
use App\Imports\SafariImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
        public function ImportCity()
        {
                return Excel::import(new CityImport, request()->file('excelFile'), null, \Maatwebsite\Excel\Excel::XLSX);
        }
        public function ImportHotel()
        {
                // dd($request->all());
                return Excel::import(new HotelImport, request()->file('excelFile'), null, \Maatwebsite\Excel\Excel::XLSX);
        }
        public function ImportLandmark()
        {
                return Excel::import(new LandmarkImport, request()->file('excelFile'), null, \Maatwebsite\Excel\Excel::XLSX);
        }
        public function ImportResturant()
        {
                return Excel::import(new RestaurantImport, request()->file('excelFile'), null, \Maatwebsite\Excel\Excel::XLSX);
        }
        public function ImportHistorical()
        {
                return Excel::import(new HistoricalCityImport, request()->file('excelFile'), null, \Maatwebsite\Excel\Excel::XLSX);
        }
        public function ImportDiving()
        {
                return Excel::import(new DivingImport, request()->file('excelFile'), null, \Maatwebsite\Excel\Excel::XLSX);
        }
        public function ImportRelaxation()
        {
                return Excel::import(new RelaxationImport, request()->file('excelFile'), null, \Maatwebsite\Excel\Excel::XLSX);
        }
        public function ImportSafari()
        {
                return Excel::import(new SafariImport, request()->file('excelFile'), null, \Maatwebsite\Excel\Excel::XLSX);
        }
}
