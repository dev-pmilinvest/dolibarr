<?php

namespace Pmilinvest\Dolibarr;

class Dolibarr
{
    public $token = null;

    public function __construct(){
        $this->login( config('dolibarr_api_user'),  config('dolibarr_api_password')); // set the token
    }

    public function CallAPI($method, $url, $data = false)
    {

        $curl = curl_init();
        $httpheader = ['DOLAPIKEY: ' .$this->token];
        $url = config('app.dolibarr.dolibarr_server')."/api/index.php/" . $url;

        switch ($method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                $httpheader[] = "Content-Type:application/json";

                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

                break;
            case "PUT":

                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                $httpheader[] = "Content-Type:application/json";

                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        // Optional Authentication:
        //    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        //    curl_setopt($curl, CURLOPT_USERPWD, config('dolibar.dolibar_api_user') .":" . config('dolibar.dolibar_api_password'));
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $httpheader);

        $result = curl_exec($curl);

        curl_close($curl);

        return json_decode($result, true);
    }

    public function getAllUsers(){
        // Récupérer la liste des produits
        $listProduits = [];
        $produitParam = ["limit" => 10000, "sortfield" => "rowid" ];

        $listProduitsResult = $this->CallAPI("GET",  "users", $produitParam);
        if (isset($listProduitsResult["error"]) && $listProduitsResult["error"]["code"] >= "300") {
            dump($listProduitsResult);
        } else {
            foreach ($listProduitsResult as $produit) {
                $listProduits[intval($produit["id"])] = html_entity_decode($produit["ref"], ENT_QUOTES);
            }
        }
        return $listProduits;
    }

    public function login($login, $password, $reset = 0){

        $token = null;
        $loginParam = ["login" => $login, "password" =>  $password, "reset" => $reset];
        $curl = curl_init();
        $httpheader = [];
        $url = config('app.dolibarr.dolibarr_server')."/api/index.php/login";
        curl_setopt($curl, CURLOPT_POSTFIELDS, $loginParam);
        // Optional Authentication:
        //    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        //    curl_setopt($curl, CURLOPT_USERPWD, config('dolibar.dolibar_api_user') .":" . config('dolibar.dolibar_api_password'));


        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $httpheader);

        $tokenResult = json_decode(curl_exec($curl), true);
        curl_close($curl);


        if (isset($tokenResult["success"]) && $tokenResult["success"]["code"] == "200") {
            $token = $tokenResult["success"]["token"];
        }

        $this->token = $token;
    }

    public function getTiers($societe ,$limit = 100){
        $result = ($this->CallAPI("GET", "thirdparties", array(
                "sortfield" => "t.rowid",
                "sortorder" => "ASC",
                "limit" => "$limit",
                "mode" => "1",
                "sqlfilters" => "(t.nom:like:'%".$societe."%')"
            )
        ));

        if (isset($result["error"]) ) {
            return [];
        }
        return $result;
    }

    public function getContacts($socname, $limit = 10000){
        $result = ($this->CallAPI("GET", "contacts", array(
                "sortfield" => "t.rowid",
                "sortorder" => "ASC",
                "limit" => "$limit",
                "mode" => "1",
                "sqlfilters" => "(t.socname:=:'". $socname."')"
            )
        ));

        if (isset($result["error"]) ) {
            return [];
        }
        return $result;
    }
}
