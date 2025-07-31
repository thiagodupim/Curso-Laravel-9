@extends('site.layout')

@section('title', 'Essa é a página HOME')

@section('conteudo')

    {{-- Estruturas de repetição --}}
    @for ($i = 0; $i <= 10; $i++)
        O valor atual é {{ $i }} <br>
    @endfor

    <br>

    @php $j = 0; @endphp

    @while ($j <= 15)
        O valor atual com o while é {{ $j }} <br>
        @php $j++ @endphp
    @endwhile

    <br>

    @foreach ($frutas as $fruta)
        {{ $fruta }} <br>
    @endforeach

    {{-- Caso o array esteja vázio e vamos trabalhar com um valor padrão usamos forelse --}}
    @forelse($frutas as $fruta)
        {{ $fruta }} <br>
    @empty
        array está vázio
    @endforelse
@endsection