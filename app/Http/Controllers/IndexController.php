<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubindexCity;
use App\City;
use App\Sube;
use App\IndexCity;
use App\Inde;

class IndexController extends Controller
{
    public function show(Request $request){
        $selectCity = 1;
        $year = 2019;
        $cities = City::orderBy('name', 'asc')->get();
        $subIndexes = SubindexCity::where('id_city', $selectCity)->where('year', $year)->get();
        $subIndexesAll = SubindexCity::orderBy('id_city', 'desc')->get();
        return view('index', [
            "subIndexes" => $subIndexes,
            "cities" => $cities,
            "subIndexesAll" => $subIndexesAll
        ]);
    }
    public function subIndex(Request $request, $slug){
        $selectCity = 1;
        $year = 2019;
        $subIndexesCity = [];
        $indexes = [];
        $isSubIndex = Sube::where('slug', $slug)->first();
        if(!empty($isSubIndex)){
            $subIndexesCity = SubindexCity::where('id_city', $selectCity)->where('year', $year)->where('id_subindex', $isSubIndex->id)->first();
            $indexesDB = Inde::where('id_sub', $isSubIndex->id)->get();
            foreach ($indexesDB as $indexDB){
                $indexes[$indexDB->id] = ["name"=> $indexDB->name, "mark"=>IndexCity::where('id_city', $selectCity)->where('id_index', $indexDB->id)->where('year', $year)->first()];
            }
        }
        $cities = City::orderBy('name', 'asc')->get();
        $subIndexesAll = SubindexCity::orderBy('id_city', 'desc')->get();
        return view('subindex', [
            "subIndex" => $isSubIndex,
            "subIndexesCity" => $subIndexesCity,
            "cities" => $cities,
            "indexes" => $indexes,
            "subIndexesAll" => $subIndexesAll
        ]);
    }
}
