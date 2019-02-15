<?php

class Apiongkir extends CI_Controller{

function testapi()
{
   

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_PORT => "8080",
        CURLOPT_URL => "http://localhost:8080/ASMSAppBus/rest/Customerofficeservice/selectCustomerOffice?IntCustOfficeID=1",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "\n{ \n\t\t\t\"CustOfficeLongCode\":\"002\",                                 \n\t\t\t\"CustOfficeName\":\"KCP Bank Miun\",                                     \n\t\t\t\"IntCustOfficeParentID\":\"001\", \n\t\t\t\"IntCustGroupID\":\"001\", \n\t\t\t\"CustOfficeLevel\":\"2\", \n\t\t\t\"CustOfficeAddress01\":\"Jl.Kaliurang KM 25\",                                \n\t\t\t\"CustOfficeAddress02\":\"Cangkringan,Pakem\",                                \n\t\t\t\"IntKabupatenID\":\"50\", \n\t\t\t\"PostalCode\":\"55523\", \n\t\t\t\"CustOfficePhone01\":\"(0274)-888888\",              \n\t\t\t\"CustOfficePhone02\":\"(0274)-888889\",              \n\t\t\t\"CustOfficeFax\":\"(0274)-888810\",                  \n\t\t\t\"ContactPersonName\":\"Budi Santoso\",                                  \n\t\t\t\"ContactPersonMobile\":\"08888888\",            \n\t\t\t\"ContactPersonPhone\":\"(0274)-888811\",             \n\t\t\t\"ContactPersonEmail\":\"budi.santoso@bankmiun.co.id\",                                                                                   \n\t\t\t\"FgCustOfficeStatus\":\"1\"\n}\n",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/json",
            "postman-token: 60353817-c129-7eaa-11a9-f733ec6857d1"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
}

    function province()
    {
        $key = "512b2dc7f9284cd37871013297d39f72";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    function city()
    {
        $key = "512b2dc7f9284cd37871013297d39f72";

        $province_id = isset($_POST['id']) ? $_POST['id'] : '';

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$province_id",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
        "key: $key"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
    }

    function cost()
    {
                
        $key = "512b2dc7f9284cd37871013297d39f72";

        $origin = isset($_POST['city_origin']) ? $_POST['city_origin'] : '';
        $destination = isset($_POST['city_destination']) ? $_POST['city_destination'] : '';
        $weight = isset($_POST['weight']) ? $_POST['weight'] : '';
        $courier = isset($_POST['courier']) ? $_POST['courier'] : '';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: $key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
}
?>