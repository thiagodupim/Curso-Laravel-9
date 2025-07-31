<h1> Empresa </h1>

Meu nome é {{ $nome }} e minha idade é {{ $idade }} <br>

{{-- 
    Para forçar o laravel renderizar um html vindo do controller na view temos que utilizar {!! !!}
    Caso contrário o laravel trata o html de forma literal por questões de segurança
--}}
{!! $html !!}