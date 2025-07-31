@extends('site.layout')

@section('title', 'Essa é a página HOME')

@section('conteudo')
    {{-- Isso é um comentário --}}

    {{-- Operador ternário --}}
    {{-- isset($nome) ? 'existe' : 'não existe' --}}

    {{-- Definindo valor padrão para uma variável --}}
    {{ $teste ?? 'padrão'}}

    {{-- Estruturas de controle --}}

    @if ($nome == 'Thiago')
        true
    @else 
        false
    @endif

    {{-- Inverso do if --}}
    @unless ($nome == 'Thiago')
        true
    @else
        false
    @endunless

    @switch($idade)
        @case(25)
            idade está ok
            @break
        @case(28)
            idade está errada
            @break
        @default
            default
    @endswitch

    @isset($nome)
        existe
    @endisset

    @empty($nome)
        está vazia
    @endempty

    @auth 
        está autenticado
    @endauth

    {{-- Inverso do auth --}}
    @guest
        Não está autenticado
    @endguest
@endsection