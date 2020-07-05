<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use IP2LocationLaravel;
//use Ip2location\IP2LocationLaravel\Facade\IP2LocationLaravel;


class langController extends Controller
{
    public function fa()
    {
        session(['locale' => 'fa']);//exit('i am in lang controller and fa fucntion and session is '.session('locale'));
       //App::setLocale('fa');
        return redirect()->back();
    }
    public function en()
    {
        session(['locale' => 'en']);//exit('i am in lang controller and en fucntion and session is '.session('locale'));
       // App::setLocale('en');
        return redirect()->back();
    }
    public function lang2()
    {
       // App::setLocale('en');
        $lang = App::getLocale();
        return "language is : " .$lang;
    }
    public function country_iptolocation(){
        //Try query the geolocation information of 8.8.8.8 IP address
        $ip = $this->showIPAddress();
        $ip = '178.173.194.215';
       // dd($ip);
      //  echo "ip is :" .$ip;exit();
        $records = IP2LocationLaravel::get($ip);

        echo 'IP Number             : ' . $records['ipNumber'] . "<br>";
        echo 'IP Version            : ' . $records['ipVersion'] . "<br>";
        echo 'IP Address            : ' . $records['ipAddress'] . "<br>";
        echo 'Country Code          : ' . $records['countryCode'] . "<br>";
        echo 'Country Name          : ' . $records['countryName'] . "<br>";
        echo 'Region Name           : ' . $records['regionName'] . "<br>";
        echo 'City Name             : ' . $records['cityName'] . "<br>";
        echo 'Latitude              : ' . $records['latitude'] . "<br>";
        echo 'Longitude             : ' . $records['longitude'] . "<br>";
        echo 'Area Code             : ' . $records['areaCode'] . "<br>";
        echo 'IDD Code              : ' . $records['iddCode'] . "<br>";
        echo 'Weather Station Code  : ' . $records['weatherStationCode'] . "<br>";
        echo 'Weather Station Name  : ' . $records['weatherStationName'] . "<br>";
        echo 'MCC                   : ' . $records['mcc'] . "<br>";
        echo 'MNC                   : ' . $records['mnc'] . "<br>";
        echo 'Mobile Carrier        : ' . $records['mobileCarrierName'] . "<br>";
        echo 'Usage Type            : ' . $records['usageType'] . "<br>";
        echo 'Elevation             : ' . $records['elevation'] . "<br>";
        echo 'Net Speed             : ' . $records['netSpeed'] . "<br>";
        echo 'Time Zone             : ' . $records['timeZone'] . "<br>";
        echo 'ZIP Code              : ' . $records['zipCode'] . "<br>";
        echo 'Domain Name           : ' . $records['domainName'] . "<br>";
        echo 'ISP Name              : ' . $records['isp'] . "<br>";
        return $records['countryName'];
    }
    function showIPAddress() {
        $variableIndex = array("HTTP_CLIENT_IP","HTTP_X_FORWARDED_FOR","HTTP_X_FORWARDED","HTTP_FORWARDED_FOR","HTTP_FORWARDED","REMOTE_ADDR");
        for($i=0;$i<count($variableIndex);$i++){
            if(!isset($ipAddress)) {
                if(array_key_exists($variableIndex[$i], $_SERVER)) {
                    $ipAddress = $_SERVER[$variableIndex[$i]];
                    return $ipAddress;
                    break;
                }
            }
        }
    }
    public function country()
    {
        $ip = $this->showIPAddress();
        $two_letter_country_code = $this->iptocountry($ip);
        return $two_letter_country_code ;
    }
    public function iptocountry($ip) {
        $numbers = preg_split( "/\./", $ip);
        include("ip_files/".$numbers[0].".php");
        $code=($numbers[0] * 16777216) + ($numbers[1] * 65536) + ($numbers[2] * 256) + ($numbers[3]);
        foreach($ranges as $key => $value){
            if($key<=$code){
                if($ranges[$key][0]>=$code){$two_letter_country_code=$ranges[$key][1];break;}
            }
        }
        if ($two_letter_country_code==""){$two_letter_country_code="unkown";}
        return $two_letter_country_code;
    }

}
