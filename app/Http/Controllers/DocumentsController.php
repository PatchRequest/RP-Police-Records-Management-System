<?php

namespace App\Http\Controllers;

use App\Document;

class DocumentsController extends Controller
{
    public function create(){
        return view('documents.create');
    }


    public function store(){

        $validated = request()->validate([
            'name' => ['required','unique:documents,name'],
            'url' => ['required','unique:documents,url','url']
        ]);

        Document::create($validated);
        return redirect('/');
    }

    public function destroy(Document $document){

        $document->delete();

        return redirect('/');
    }

}
