<?php

namespace App\Services;



use App\Author;
use App\Rubric;
use App\Services\iEntity;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class BookService implements iEntity
{
    public function buildInfo(Request $request) {

        $book_info = [
            'name' => $request->name,
        ];
         
        return $book_info;
        
    }

    public function updateRelatedEntities(Request $request, Model $book) {
        
        
        if(!empty($request->author_ids)) {

            $authors = Author::whereIn('id', (array)$request->author_ids)->get();
            $book->authors()->sync($authors);

        }

        if(!empty($request->rubric_ids)) {
            
            $rubrics = Rubric::whereIn('id', (array)$request->rubric_ids)->get();
            $book->rubrics()->sync($rubrics);

        }

    }

}