@extends('layout.app')

@section('title', 'Crea nuovo formato')

@section('content')

<div class="container">
    <form action="{{route('pastas.update', ['pasta' => $formato->id])}}" method="POST">

        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="src" class="form-label">Src Immagine</label>
            <input type="text" class="form-control" id="src" name="src" value="{{$formato->src}}"/>
        </div>

        <div class="mb-3">
            <label for="titolo" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="titolo" name="titolo" value="{{$formato->titolo}}"/>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" id="tipo" class="form-select">
                <option {{($formato->tipo=="lunga")?'selected':''}} value="lunga">Lunga</option>
                <option {{($formato->tipo=="corta")?'selected':''}} value="corta">Corta</option>
                <option {{($formato->tipo=="cortissima")?'selected':''}} value="cortissima">Cortissima</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="cottura" class="form-label">Cottura</label>
            <input type="text" class="form-control" id="cottura" name="cottura" value="{{$formato->cottura}}"/>
        </div>

        <div class="mb-3">
            <label for="peso" class="form-label">Peso</label>
            <input type="text" class="form-control" id="peso" name="peso" value="{{$formato->peso}}"/>
        </div>

        <div class="mb-3">
            <label for="descrizione" class="form-label">Descrizione</label>
            <textarea id="descrizione" name="descrizione" class="form-control">{{$formato->descrizione}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>

    </form>
</div>



@endsection






