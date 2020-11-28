<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Model;

class Pickpoint extends Model
{
    protected $url = 'https://e-solution.pickpoint.ru/api';
    protected $login;
    protected $pass;

    public function __construct()
    {
        $this->login = config('app.login_pickpoint');
        $this->pass = config('app.pass_pickpoint');
    }

    private function getPointsPP(&$json){
        $ch = curl_init( $this->url.'/postamatlist' );//получается список по всем городам сразу (если по отдельному городу, то там только первые 10)
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch);
        curl_close($ch);
        $json = $result;
        $this->jsonToMassive($json);
    }
    private function jsonToMassive(&$json) {
        $json = json_decode($json);
        $byCity = array();
        foreach ($json as $key => $value) {
            $value = (array)$value;
            $byCity[$value['CitiName']][] = $value;
        }
        $json = json_encode($byCity);
        file_put_contents( $_SERVER['DOCUMENT_ROOT'].'/logs/pp-point.json', $json);
    }

    public function getPostmatList($city){
        if(file_exists($_SERVER['DOCUMENT_ROOT'].'/logs/pp-point.json') && (time() - filemtime($_SERVER['DOCUMENT_ROOT'].'/logs/pp-point.json') < 36000) ) {//актуальность файла с пунктами - не более 10 часов
            $json = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/logs/pp-point.json');
            if($json =='') {
                $this->getPointsPP($json);
            }
        }	else {
            $this->getPointsPP($json);
        }

        $json = (array)json_decode($json);

        $points = [];
        if(isset($json[$city])) {
            foreach ($json[$city] as $key => $value) {
                $value = (array)$value;
                $payCard = (string)$value['Card'];
                $worktime_weekdays = $worktime_weekends = '';
                $timeArray = explode(',', $value['WorkTime']);
                if($timeArray[0]=='NODAY') {
                    $timeArray[0] = 'Выходной';
                }
                if($timeArray[5]=='NODAY') {
                    $timeArray[5] = 'Выходной';
                }
                if($timeArray[6]=='NODAY') {
                    $timeArray[6] = 'Выходной';
                }
                if($timeArray[0]) {
                    $worktime_weekdays = $timeArray[0];
                }
                if($timeArray[6]==$timeArray[5]) {
                    $worktime_weekends = $timeArray[5];
                } else {
                    $worktime_weekends = 'Сб: '.$timeArray[5].', Вс: '.$timeArray[6];
                }

                $points[] = array(
                    'mark'=> 'pickpoint',
                    'address'=> (string)$value['Address'],
                    'amount-to'=> (string)$value['AmountTo'],
                    'card'=> $payCard&&$payCard!='2' ?true:false,
                    'cash'=> ((string)$value['Cash'])?true:false,
                    'id'=> (string)$value['Id'] ,
                    'latitude'=> (string)$value['Latitude'],
                    'longitude'=> (string)$value['Longitude'],
                    'metro'=> ((string)$value['Metro']),
                    'distance' => ((string)$value['InDescription']),
                    'name'=> (string)$value['Name'],
                    'number'=> (string)$value['Number'],
                    'phone'=> null,
                    'type'=> "pickpoint",
                    'npp'=> ($payCard&&$payCard!='2' || ((string)$value['Cash']) )?true:false,
                    'worktime_weekdays'=> $worktime_weekdays==''?null:$worktime_weekdays,
                    'worktime_weekends'=> $worktime_weekends==''?null:$worktime_weekends,
                    'typePoint' => $value['TypeTitle']=='ПВЗ'?'shop':($value['TypeTitle']=='АПТ'?'terminal':false)
                );
            }
        }
        return count($points);
    }
}
