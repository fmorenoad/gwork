<?php

namespace App\Http\Controllers;
use App\Refwork;
use App\User;

use Illuminate\Http\Request;



class AdminController extends Controller
{
    public function index()
    {
        $archivo = fopen("refwork.csv", "r");

        while(!feof($archivo)) 
        {
            $linea = fgets($archivo);
            $celdas = explode(";", $linea);

            $refwork = new Refwork();

            $refwork->item = $celdas['1'];
            $refwork->work = $celdas['2'];
            $refwork->unit_of_work = $celdas['3'];

            AdminController::registrar($refwork);

                    
        }
        fclose($archivo);
    }

    public function registrar(Refwork $refwork)
    {
        if($refwork->save())
            {
                echo 'Elemento creado';
            }
            else {
                echo 'Hubo un problema';
            }
    }

}
