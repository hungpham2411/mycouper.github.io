<?php

class GoogleRecaptcha {
    /* Google recaptcha API url */

    private $__google_url = "https://www.google.com/recaptcha/api/siteverify";
    private $__secret = '6Le0jgYTAAAAAPrGCs8niWi5S394h4CnmiUVFLFE';

    public function VerifyCaptcha($response) {
        $url = $this->__google_url . "?secret=" . $this->__secret . "&response=" . $response;
        $urlData = file_get_contents($url);

//        $curl = curl_init();
//        curl_setopt($curl, CURLOPT_URL, $url);
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
//        curl_setopt($curl, CURLOPT_TIMEOUT, 15);
//        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
//        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
//        $curlData = curl_exec($curl);
//
//        curl_close($curl);
        $res = json_decode($urlData, TRUE);
        if ($res["success"] == true) {
            return true;
        } else {
            return false;
        }
    }

}
