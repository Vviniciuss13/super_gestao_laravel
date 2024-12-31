<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//fornecedors
//fornecedores

class Fornecedor extends Model
{
    // precisa adicionar o use para utilizar o softDelete aqui e no migration
    use SoftDeletes;

    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];

    //create -> registra o obj no banco
    // all -> retona uma coleção de objetos do banco
    // toArray -> transforma em array
    // find -> procura por id
    // where -> procura por meio de condições
    // whereIn -> procura um valor que contem o array
    // whereBetween -> Procura valores entre um valor e outro
    // whereNull -> procura o que está vazio
    // whereDate -> procura pela data
    // whereDay -> procura pelo dia
    // whereMonth -> procura pelo mês
    // whereYear -> procura pelo ano
    // whereTime -> procura pelo horario
    // whereColumn -> compara colunas
    // where(function($query){});
    // orderBy()
    // first(), last(), toJson()
    // save -> salva as alterações no banco de dados
    // fill -> preenche os dados de um objeto (lembrar de configurar pela variavel)
    // delete | destroy -> delete registro
    // softDelete
}
