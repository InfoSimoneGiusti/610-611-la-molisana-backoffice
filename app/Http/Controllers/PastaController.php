<?php

namespace App\Http\Controllers;

use App\Pasta;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pastas = Pasta::orderBy('id', 'desc')->get();

        return view('pasta.index', compact('pastas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'src' => 'required|max:255|url',
                'titolo' => 'required|max:50|min:4',
                'tipo' => ['required', Rule::in(['corta', 'cortissima', 'lunga'])],
                'cottura' => 'required|max:10|min:5',
                'peso' => 'required|max:10|min:4',
                'descrizione' => 'nullable|max:65535'
            ]
        );

        $data = $request->all();

        $newPasta = new Pasta();

        /*$newPasta->src = $data['src'];
        $newPasta->titolo = $data['titolo'];
        $newPasta->tipo = $data['tipo'];
        $newPasta->cottura = $data['cottura'];
        $newPasta->peso = $data['peso'];
        $newPasta->descrizione = $data['descrizione'];*/

        $newPasta->fill($data); // affinchè funzioni dovete compilare $fillable nel model
        $newPasta->save();

        return redirect()->route('pastas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pasta $pasta)
    {
        return view('pasta.show', ['formato' => $pasta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasta $pasta)
    {
        return view('pasta.edit', ['formato' => $pasta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasta $pasta)
    {

        $request->validate(
            [
                'src' => 'required|max:255|url',
                'titolo' => 'required|max:50|min:4',
                'tipo' => ['required', Rule::in(['corta', 'cortissima', 'lunga'])],
                'cottura' => 'required|max:10|min:5',
                'peso' => 'required|max:10|min:4',
                'descrizione' => 'nullable|max:65535'
            ],
            [
                'src.url' => 'Il campo src deve contenere un url valido!',
                'src.required' => 'Il campo src deve necessariamente essere compilato!'
            ]
        );

        $data = $request->all();
        $pasta->update($data);
        $pasta->save();

        return redirect()->route('pastas.edit', ['pasta' => $pasta])->with('status', 'Pasta aggiornata con successo');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasta $pasta)
    {

        $pasta->delete();
        return redirect()->route('pastas.index');

    }
}
