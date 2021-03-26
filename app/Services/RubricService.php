<?php

namespace App\Services;



use App\Book;
use App\Services\iEntity;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class RubricService implements iEntity
{
    public function buildInfo(Request $request) {

        $rubric_info = [
            'name' => $request->name,
        ];
         
        return $rubric_info;
        
    }

    public function updateRelatedEntities(Request $request, Model $rubric) {

        if(!empty($request->book_ids)) {

            $books = Book::whereIn('id', (array)$request->book_ids)->get();
            $rubric->books()->sync($books);
        }

    }

}