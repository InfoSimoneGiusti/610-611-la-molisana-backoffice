@extends('layout.app')

@section('title', 'Lista dei formati')

@section('content')

<div class="container">

    <a href="{{route('pastas.create')}}" class="btn btn-primary">Crea nuovo formato</a>

    <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">src</th>
              <th scope="col">titolo</th>
              <th scope="col">tipo</th>
              <th scope="col">cottura</th>
              <th scope="col">peso</th>
              <th scope="col">descrizione</th>
              <th scope="col">azioni</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($pastas as $formato)
             <tr>
                <th scope="row">{{$formato->id}}</th>
                <td>{{$formato->src}}</td>
                <td>{{$formato->titolo}}</td>
                <td>{{$formato->tipo}}</td>
                <td>{{$formato->cottura}}</td>
                <td>{{$formato->peso}}</td>
                <td>{!!$formato->descrizione!!}</td>
                <td><a class="btn btn-primary" href="{{route('pastas.show', ['pasta' => $formato->id])}}">Vedi</a></td>
              </tr>
            @endforeach

          </tbody>
    </table>
</div>

@endsection
