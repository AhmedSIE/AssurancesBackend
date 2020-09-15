<?php

namespace App\Http\Controllers;

use App\Models\Marque as ModelsMarque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    public function index(){
        $marques=ModelsMarque::all();
        return response()->json($marques);
    }
}
