<?php

namespace App\Http\Controllers;

use App\Pasta;
use Illuminate\Http\Request;

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
    public function show($id)
    {
        $formato = Pasta::findOrFail($id);
        return view('pasta.show', compact('formato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasta $pasta)
    {
        if ($pasta) {
            return view('pasta.edit', ['formato' => $pasta]);
        } else {
            abort(404);
        }
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

        if ($pasta) {

            $data = $request->all();
            $pasta->update($data);
            $pasta->save();

            return redirect()->route('pastas.edit', ['pasta' => $pasta])->with('status', 'Pasta aggiornata con successo');

        } else {
            abort(404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasta $pasta)
    {

        if ($pasta) {
            $pasta->delete();
            return redirect()->route('pastas.index');
        } else {
            abort(404);
        }

    }
}
