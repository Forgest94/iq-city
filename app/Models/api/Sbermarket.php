<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Model;

class Sbermarket extends Model
{
    protected $url = 'https://sbermarket.ru/';

    public function inCities($city)
    {
        $list = $this->getList();
        if(in_array($city, $list)) {
            return ["success" => true];
        } else {
            return ["success" => false];
        }
    }

    private function getList()
    {
        $ch = curl_init( $this->url );
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: text/html; charset=utf-8', 'Accept-Encoding: gzip,deflate']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)');
        curl_setopt($ch, CURLOPT_ENCODING ,"");
        $result = curl_exec($ch);
        curl_close($ch);
        
        $result = explode('&quot;cities&quot;', $result)[1];
        $matches = [];        
        preg_match_all("/&quot;id&quot;:([0-9]+),&quot;name&quot;:&quot;([А-я .]+)&quot;/u", $result, $matches);
        
        if(!empty($matches[2])) {
            $cities = [];
            foreach ($matches[2] as $name) {
                $cities[] = $name;
            }
            return $cities;
        }

        return [];
    }
}
