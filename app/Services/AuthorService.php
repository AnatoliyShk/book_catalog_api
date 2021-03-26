<?php

namespace App\Services;



use App\Book;
use App\Services\iEntity;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class AuthorService implements iEntity
{
    public function buildInfo(Request $request) {

        $author_info = [
            'name' => $request->name,
            'surname' => $request->surname
        ];
         
        return $author_info;
        
    }

    public function updateRelatedEntities(Request $request, Model $author) {

        if(!empty($request->book_ids)) {

            $books = Book::whereIn('id', (array)$request->book_ids)->get();
            $author->books()->sync($books);

        }

    }

}