@extends('layout.app')

@section('title', 'Crea nuovo formato')

@section('content')

<div class="container">
    <form action="{{route('pastas.store')}}" method="POST">

        @csrf

        <div class="mb-3">
            <label for="src" class="form-label">Src Immagine</label>
            <input type="text" class="form-control" id="src" name="src" />
        </div>

        <div class="mb-3">
            <label for="titolo" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="titolo" name="titolo" />
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" id="tipo" class="form-select">
                <option value="lunga">Lunga</option>
                <option value="corta">Corta</option>
                <option value="cortissima">Cortissima</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="cottura" class="form-label">Cottura</label>
            <input type="text" class="form-control" id="cottura" name="cottura" />
        </div>

        <div class="mb-3">
            <label for="peso" class="form-label">Peso</label>
            <input type="text" class="form-control" id="peso" name="peso" />
        </div>

        <div class="mb-3">
            <label for="descrizione" class="form-label">Descrizione</label>
            <textarea id="descrizione" name="descrizione" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salva formato</button>

    </form>
</div>



@endsection






