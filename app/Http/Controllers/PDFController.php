<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function userinfo()
    {      
        $user = auth()->user();
        $pdf = Pdf::loadView('pdf.invoice', [
            'data' => $user,
        ]);

        return $pdf->stream($user->name.'.pdf');
    }
}
