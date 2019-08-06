<?php

namespace App\Http\ViewComposer;

use App\Document;
use Illuminate\Contracts\View\View;

class DocumentsViewComposer
{

    public function compose(View $view)
    {
        $documents = Document::all();
        $view->with('documents', $documents);
    }
}
