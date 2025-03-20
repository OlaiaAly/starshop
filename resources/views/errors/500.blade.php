@extends('layouts.app')

@section('title', 'Erro Interno do Servidor')

@section('content')
    <div class="container">
        <h1>Erro Interno do Servidor</h1>
        <p>Ocorreu um erro inesperado no servidor. Tente novamente mais tarde.</p>
        <a href="{{ url('/') }}">Voltar para a página inicial</a>
    </div>
@endsection