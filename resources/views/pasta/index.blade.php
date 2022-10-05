@extends('layout.app')

@section('title', 'Lista dei formati')

@section('content')

<div class="container">

    <a href="{{route('pastas.create')}}" class="btn btn-primary">Crea nuovo formato</a>

    <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">titolo</th>
              <th scope="col">tipo</th>
              <th scope="col">cottura</th>
              <th scope="col">peso</th>
              <th scope="col">azioni</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($pastas as $formato)
             <tr>
                <th scope="row">{{$formato->id}}</th>
                <td>{{$formato->titolo}}</td>
                <td>{{$formato->tipo}}</td>
                <td>{{$formato->cottura}}</td>
                <td>{{$formato->peso}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('pastas.show', ['pasta' => $formato])}}">Vedi</a>
                    <a class="btn btn-warning" href="{{route('pastas.edit', ['pasta' => $formato])}}">Modifica</a>

                    <form action="{{route('pastas.destroy', ['pasta' => $formato])}}" method="POST" onsubmit="return confirm('Vuoi cancellare il formato di pasta selezionato?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>

                </td>
              </tr>
            @endforeach

          </tbody>
    </table>
</div>

@endsection
