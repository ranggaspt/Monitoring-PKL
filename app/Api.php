<?php

namespace App;

class API
{
    function CallAPI($method, $url, $data = false, $header = false)
    {
        $curl = curl_init();

        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
                    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen(json_encode($data))
                    ));
                } else {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, "");
                    if ($header) {
                        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
                    }
                }
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($this->$data));
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);


        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }
}
