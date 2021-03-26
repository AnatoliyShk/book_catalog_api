<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Services\BookService;

class BookController extends Controller
{
    public function get($id)
    {

        $book = Book::find($id);

        if(!empty($book)) {

            echo $book->id." ".$book->name."\n";

        } else {

            echo 'Нет данных';

        }


    }

    public function getAll()
    {   
        $books = Book::all();

        if(!empty($book)) {

            foreach($books as $book) {

                echo $book->id." ".$book->name."\n";

            }

        } else {

            echo 'Нет данных';

        }
    }

    public function getBookAuthors($id)
    {
        
        $book = Book::find($id);

        if(!empty($book)) {

            foreach($book->authors as $author) {
           
                echo $author->id." ".$author->name." ".$author->surname."\n";

            }

        } else {

            echo 'Нет данных';

        }


    }

    public function getBookRubrics($id)
    {
        
        $book = Book::find($id);

        if(!empty($book)) {
            
            foreach($book->rubrics as $rubric) {
           
                echo $rubric->id." ".$rubric->name."\n";

            }

        } else {

            echo 'Нет данных';

        }


    }

    public function create(Request $request, BookService $service)
    {


        $book_info = $service->buildInfo($request);

        $book = Book::create($book_info);
        
        if(!empty($book)) {

            $service->updateRelatedEntities($request, $book);

        } else {

            echo 'Нет данных';

        }

    }

    public function edit(Request $request, BookService $service, $id)
    {

        $book_info = $service->buildInfo($request);

        $book = Book::find($id);

        if(!empty($book)) {

            $book->update($book_info);
            $service->updateRelatedEntities($request, $book);

        } else {

            echo 'Нет данных';

        }

    }

    public function delete($id) 
    {

        Book::find($id)->delete();
        
    }
}
