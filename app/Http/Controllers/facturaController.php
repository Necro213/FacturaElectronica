<?php

namespace App\Http\Controllers;


use Anouar\Fpdf\Fpdf;
use Illuminate\Http\Request;

use App\Http\Requests;

class facturaController extends Controller
{
    function generatePDF(Request $request){
        $co = [
            'nombre'=>'Alexis Adrian Bogarin Santana',
            'calle' => 'Amapa #9',
            'colonia'=> 'San cayetano',
            'pais' => 'Tepic, Nayarit, Mexico',
            'rfc' => 'BOSA140294',
            'cp' => '63511',
            'tel' => '3112545497',
            'exp' => 'Tepic, Nayarit, Mexico'
        ];

        $f = [
          'foliofic' => 'numerofoliofis',
            'folio' => 'numerofolio',
            'fechacer' => 'Fecha y hora',
            'fechaexp' => 'Fecha',
            'moneda' => 'moneda',
            'fpago' => 'forma de pago',
            'mpago' => 'metodo de pago',
            'cpago' => 'condicio',
            'usocfdi' => 'uso de cfdi',
            'regfis' => 'regimen fiscal'
        ];

        $c = [
            'nombre' => 'Nombre del cliente',
            'calle' => 'Nombre calle',
            'numero' => '8',
            'colonia' => 'nombre colonia',
            'pais' => 'ciudad, estado, pais',
            'cp' => '63000',
            'rfc' => 'AST170113A63'
        ];

        $p = [
            'procer' => '114514',
            'cantidad' => '2',
            'unidad' => 'PIEZA',
            'cod' => '0H',
            'desc' => 'LADRILLO COLOR ROJO TAMAÑO NORMAL',
            'descuento' => '--',
            'pre' => '2',
            'ipo' => '2'
        ];

        $fpdf = new Fpdf();
        $fpdf->AddPage();
        $fpdf->Image(asset('/img/plantillas/plantilla.jpg'),0,0,210);
        $fpdf->Image(asset('/img/logos/logo2.jpg'),10,10,50);
        $fpdf->SetFont('Arial','B',16);
        $fpdf->Text(65,12,$co['nombre']);
        $fpdf->SetFont('Arial','',10);
        $fpdf->Text(65,20,$co['calle']);
        $fpdf->Text(65,25,$co['colonia']);
        $fpdf->Text(65,30,$co['pais']);
        $fpdf->Text(65,35,$co['rfc']);
        $fpdf->Text(120,35,'C.P. '.$co['cp']);
        $fpdf->Text(65,40,'Tel '.$co['tel']);
        $fpdf->SetFont('Arial','B',10);
        $fpdf->Text(65,45,'Expedida en:');
        $fpdf->SetFont('Arial','',10);
        $fpdf->Text(65,50,$co['exp']);
        $fpdf->SetFont('Arial','',9);
        $fpdf->Text(148,29,$f['foliofic']);
        $fpdf->Text(148,36,$f['folio']);
        $fpdf->Text(148,44,$f['fechacer']);
        $fpdf->Text(148,51,$f['fechaexp']);
        $fpdf->Text(194,51,$f['moneda']);
        $fpdf->Text(148,59,$f['fpago']);
        $fpdf->Text(148,67,$f['mpago']);
        $fpdf->Text(183,67,$f['cpago']);
        $fpdf->Text(148,74,$f['usocfdi']);
        $fpdf->Text(148,82,$f['regfis']);
        $fpdf->SetFont('Arial','B',16);
        $fpdf->Text(12,65,$c['nombre']);
        $fpdf->SetFont('Arial','',10);
        $fpdf->Text(12,70,$c['calle']);
        $fpdf->Text(12,75,$c['numero']);
        $fpdf->Text(12,80,$c['colonia']);
        $fpdf->Text(124,80,'C.P. '.$c['cp']);
        $fpdf->Text(12,85,$c['pais']);
        $fpdf->Text(117,85,$c['rfc']);
        //tabla utilizar for
        $fpdf->SetFont('Arial','',10);
        $pos = 107;
        for($i=0; $i<16; $i++) {
            $fpdf->Text(8, $pos, $p['procer']);
            $fpdf->Text(27, $pos, $p['cantidad']);
            $fpdf->Text(32, $pos, $p['unidad']);
            $fpdf->Text(50, $pos,utf8_decode($p['desc']));
            $fpdf->Text(163, $pos, '$' . $p['pre']);
            $fpdf->Text(186, $pos, '$' . $p['ipo']);
            $pos += 4;
        }
        $fpdf->Output();
        exit;
        }
}
