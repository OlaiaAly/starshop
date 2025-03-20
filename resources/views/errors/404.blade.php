{{-- resources/views/errors/404.blade.php --}}
@extends('layouts.app')

@section('title', 'Página Não Encontrada')

@section('content')
    <div class="container">
        <h1>Página não encontrada</h1>
        <p>Desculpe, mas não conseguimos encontrar a página que você está procurando.</p>
        <a href="{{ url('/') }}">Voltar para a página inicial</a>
    </div>
@endsection
