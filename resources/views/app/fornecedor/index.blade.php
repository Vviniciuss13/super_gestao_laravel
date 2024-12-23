<h3>Fornecedor</h3>

@php 
    /*
    if(isset<$variavel>){} //retorna true se a variável estiver definida
    */
@endphp

@isset($fornecedores)
    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    <br>
    @isset($fornecedores[0]['cnpj'])
    CNPJ: {{ $fornecedores[0]['cnpj'] }}
    <br>
    @endisset
@endisset