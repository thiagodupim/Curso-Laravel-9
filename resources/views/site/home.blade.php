@extends('site.layout')

@section('title', 'Essa é a página HOME')

@section('conteudo')
    <div class="row container">
        @foreach ($produtos as $produto)
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{ $produto->imagem }}">
                        <a href="{{ route('site.details', $produto->slug) }}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
                    </div>
                    <div class="card-content">
                        <span class="card-title">{{ $produto->nome }}</span>
                        <p>{{ Str::limit($produto->descricao, 20) }}</p> {{-- Limitando a descrição para 20 caracteres --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row center">
        {{ $produtos->links('custom.pagination') }}
    </div>
@endsection