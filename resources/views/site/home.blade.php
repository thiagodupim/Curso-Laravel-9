@extends('site.layout')

@section('title', 'Essa é a página HOME')

@section('conteudo')
    @include('includes.mensagem', ['titulo' =>'Mensagem de sucesso!'])
    
    @component('components.sidebar')
        @slot('paragrafo') {{-- Para criar um conteúdo dinâmico para o sidebar --}}
            Texto qualquer vindo do slot
        @endslot  
    @endcomponent
@endsection