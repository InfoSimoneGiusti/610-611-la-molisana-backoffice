@extends('layout.app')


@section('title', 'Formato specifico')


@section('content')

    <div class="container">

        <h1>Dettagli per il formato: {{$formato->titolo}}</h1>

        <img src="{{$formato->src}}" alt="{{$formato->titolo}}" />

        <div><strong>Tipo:</strong> {{$formato->tipo}}</div>
        <div><strong>Cottura:</strong> {{$formato->cottura}}</div>
        <div><strong>Peso:</strong> {{$formato->peso}}</div>
        <div><strong>Descrizione:</strong> {{$formato->descrizione}}</div>



        <a class="btn btn-primary" href="{{route('pastas.index')}}">Torna alla lista</a>
    </div>

@endsection
