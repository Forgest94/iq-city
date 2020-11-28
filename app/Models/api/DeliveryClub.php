<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use XMLReader;

class DeliveryClub extends Model
{
    protected $urlMealParse = 'https://www.delivery-club.ru/sitemaps/sitemap-cuisines.xml';

    public function parseMeal($city)
    {
        $arCities = array();
        $reader = new XMLReader();
        $reader->open($this->urlMealParse);
        while ($reader->read()) {
            if ($reader->name == "loc" && $reader->nodeType == XMLReader::ELEMENT) {
                while ($reader->read()) {
                    if ($reader->nodeType == XMLReader::TEXT
                        || $reader->nodeType == XMLReader::CDATA
                        || $reader->nodeType == XMLReader::WHITESPACE
                        || $reader->nodeType == XMLReader::SIGNIFICANT_WHITESPACE) {
                        $parseUrl = explode('/', $reader->value);
                        $arCities[strtolower($parseUrl[3])] = $reader->value;
                    } else if ($reader->nodeType == XMLReader::END_ELEMENT && $reader->name == "loc") {
                        break;
                    }
                }
            }
        }
        $reader->close();
        if (!empty($arCities[strtolower(Str::slug($city, '-'))])) {
            return ["success" => true];
        } else {
            return ["success" => false];
        }
    }
}
