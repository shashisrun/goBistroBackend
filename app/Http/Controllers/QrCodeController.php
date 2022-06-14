<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use QrCode;


class QrCodeController extends Controller
{
    public function generatepdf(Request $request){
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setIsHtml5ParserEnabled(true);
        $dompdf->setOptions($options);
        // $dompdf->loadHtml(QrCode::size(300)->backgroundColor(255,255,255)->generate($request->url));
        $qr = base64_encode(QrCode::format('svg')->size(300)->backgroundColor(255,255,255)->errorCorrection('H')->generate($request->url));
        $dompdf->loadHtml(view('qrview', compact('qr')));

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A5', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}
