@extends('site.layout')

@section('title', 'Essa é a página HOME')

@section('conteudo')
    {{-- Isso é um comentário --}}

    {{-- Operador ternário --}}
    {{-- isset($nome) ? 'existe' : 'não existe' --}}

    {{-- Definindo valor padrão para uma variável --}}
    {{ $teste ?? 'padrão'}}
@endsection