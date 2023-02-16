<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function generate(Request $request)
    {
        // $qrcode = QrCode::size(300)->generate($request);
    }
}
