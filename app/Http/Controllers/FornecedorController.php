<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = [
            0 => ['nome' => 'Fornecedor 1', 'status' => 'N', 'cnpj' => '0', 'ddd' => '11', 'telefone' => '0000-0000'], //São Paulo (SP)
            1 => ['nome' => 'Fornecedor 2', 'status' => 'S', 'cnpj' => null, 'ddd' => '85', 'telefone' => '0000-0000'], // Fortaleza (CE)
            2 => ['nome' => 'Fornecedor 3', 'status' => 'S', 'cnpj' => null, 'ddd' => '32', 'telefone' => '0000-0000'],  //Juiz de Fora (MG)      
        ];

        $fornecedores = [];

        $msg = isset($fornecedores[0]['cnpj']) ? 'CNPJ informado' : 'CNPJ não informado';
        echo $msg;

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}

