<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function check($request)
    {
        $client='';
        $domain='';

        if($request=='kbtc'){
            $client="mysql2";
            $domain="id.kbtc.edu.mm";
        }
        elseif($request=='isr'){
            $client="mysql3";
            $domain="id.isr.edu.mm";
        }
        elseif($request=='test'){
            $client="mysql4";
            $domain="id.test.edu.mm";
        }

        return array('client'=>$client, 'domain'=>$domain);
    }
}
