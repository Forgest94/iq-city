<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\api\Pickpoint;
use App\Models\api\Yandex;
use App\Models\api\DeliveryClub;
use App\Models\api\Sbermarket;

class UploadController extends Controller
{
    public function get(Request $request, $city)
    {
        if (!empty($city)) {
            echo $city . '<br/>';
            /*$pickpoint = new Pickpoint();
            $countPickPoint = $pickpoint->getPostmatList($city);
            echo 'Количество постматов Pickpoint: ' . $countPickPoint;*/
            $yandexMeal = new Yandex();
            $countYandexMeal = $yandexMeal->parseMeal($city);
            $deliveryClubMeal = new DeliveryClub();
            $countDeliveryClubMeal = $deliveryClubMeal->parseMeal($city);
            if($countYandexMeal["success"] || $countDeliveryClubMeal["success"]){
                echo 'Службы доставки еды: Y';
            }else{
                echo 'Службы доставки еды: N';
            }

            echo '<br>';

            $sbermarket = new Sbermarket();
            $cityInSbermaket = $sbermarket->inCities($city);
            if($cityInSbermaket["success"]){
                echo 'Службы доставки продуктов питания: Y';
            }else{
                echo 'Службы доставки продуктов питания: N';
            }

        } else {
            return false;
        }
    }
}
