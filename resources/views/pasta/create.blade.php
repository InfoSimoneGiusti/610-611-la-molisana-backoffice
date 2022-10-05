@extends('layout.app')

@section('title', 'Crea nuovo formato')

@section('content')

<div class="container">
    <form action="{{route('pastas.store')}}" method="POST">

        @csrf

        <div class="mb-3">
            <label for="src" class="form-label">Src Immagine</label>
            <input type="text" class="form-control @error('src') is-invalid @enderror " id="src" name="src" value="{{old('src')}}"/>

            @error('src')
                <div class='invalid-feedback'>
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="titolo" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('titolo') is-invalid @enderror " id="titolo" name="titolo" value="{{old('titolo')}}"/>

            @error('titolo')
                <div class='invalid-feedback'>
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" id="tipo" class="form-select @error('tipo') is-invalid @enderror ">
                <option {{(old('tipo')=='lunga')?'selected':''}}  value="lunga">Lunga</option>
                <option {{(old('tipo')=='corta')?'selected':''}} value="corta">Corta</option>
                <option {{(old('tipo')=='cortissima')?'selected':''}} value="cortissima">Cortissima</option>
            </select>
            @error('tipo')
                <div class='invalid-feedback'>
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cottura" class="form-label">Cottura</label>
            <input type="text" class="form-control @error('cottura') is-invalid @enderror " id="cottura" name="cottura" value="{{old('cottura')}}"/>
            @error('cottura')
                <div class='invalid-feedback'>
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="peso" class="form-label">Peso</label>
            <input type="text" class="form-control @error('peso') is-invalid @enderror " id="peso" name="peso" value="{{old('peso')}}"/>
            @error('peso')
                <div class='invalid-feedback'>
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="descrizione" class="form-label">Descrizione</label>
            <textarea id="descrizione" name="descrizione" class="form-control @error('descrizione') is-invalid @enderror ">{{old('descrizione')}}</textarea>
            @error('descrizione')
                <div class='invalid-feedback'>
                    {{$message}}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salva formato</button>

    </form>
</div>



@endsection






