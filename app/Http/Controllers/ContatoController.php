<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        
        $motivo_contatos = MotivoContato::all();
        
        return view('site.contato', ['titulo' => 'contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){
        
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos', // nomes com no mínimo 3 caracters e no máximo 40
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            
            'email.email' => 'O email informado não é válido',
            
            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',
            
            'required' => 'O campo :attribute deve ser preenchido'
        ];
        
        //realizar a validação dos dados do formulário
        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
