<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        $data =[
            'comics' => $comics
        ];
        return view('comics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:65535',
            'thumb' => 'required|url|max:255',
            'price' => 'required|numeric|max:999999.99|min:1',
            'series' => 'required|max:30',
            'sale_date' => 'required',
            'type' => 'required|max:30',
        ],[
            'required' => 'Il campo :attribute è obbligatorio.',
            'max' => 'Il campo :attribute non deve superare i :max caratteri',
            'price.max' => 'Il campo :attribute non può essere maggiore di 999999.99',
            'price.min' => 'Il campo :attribute non può essere minore di 1.00',
            'url' => 'Il campo :attribute deve contenere un URL valido',
            'numeric' => 'Il campo :attribute deve essere un numero',
        ],[
            'title' => 'Titolo',
            'description' => 'Descrizione',
            'thumb' => 'URL',
            'price' => 'Prezzo',
            'series' => 'Serie',
            'sale_date' => 'Prezzo di vendita',
            'type' => 'Tipologia',
        ]
        );

        $form_data = $request->all();

        $newComic = new Comic();
        $newComic->fill($form_data);
        $newComic->save();

        return redirect()->route('comics.show', ['comic' => $newComic->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        // $comic = Comic::findOrFail($id); 
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        // $comic = Comic::findOrFail($id);
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:65535',
            'thumb' => 'required|url|max:255',
            'price' => 'required|numeric|max:999999.99|min:1',
            'series' => 'required|max:30',
            'sale_date' => 'required',
            'type' => 'required|max:30',
        ],[
            'required' => 'Il campo :attribute è obbligatorio.',
            'max' => 'Il campo :attribute non deve superare i :max caratteri',
            'price.max' => 'Il campo :attribute non può essere maggiore di 999999.99',
            'price.min' => 'Il campo :attribute non può essere minore di 1.00',
            'url' => 'Il campo :attribute deve contenere un URL valido',
            'numeric' => 'Il campo :attribute deve essere un numero',
        ],[
            'title' => 'Titolo',
            'description' => 'Descrizione',
            'thumb' => 'URL',
            'price' => 'Prezzo',
            'series' => 'Serie',
            'sale_date' => 'Prezzo di vendita',
            'type' => 'Tipologia',
        ]
        );

        // $comic = Comic::findOrFail($id);
        $form_data = $request->all();

        $comic->update($form_data);

        return redirect()->route('comics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        // $comic = Comic::findOrFail($id);
        $comic->delete();
        return redirect()->route('comics.index');
    }
}
