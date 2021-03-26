<?php

namespace App\Http\Controllers;


use App\Author;
use Illuminate\Http\Request;
use App\Services\AuthorService;

class AuthorController extends Controller
{
    
    public function get($id)
    {

        $author = Author::find($id);

        if(!empty($author)) {

            echo $author->id." ".$author->name." ".$author->surname."\n";

        } else {

            echo 'Нет данных';

        }

    }

    public function getAll()
    {   
        $autors = Author::all();

        if(!empty($author)) {

            foreach($autors as $author) {

                echo $author->id." ".$author->name." ".$author->surname."\n";

            }

        } else {

            echo 'Нет данных';

        }
    }

    public function getAutorBooks($id)
    {
        
        $author = Author::find($id);

        if(!empty($author)) {

            foreach($author->books as $book) {

                echo $book->id." ".$book->name."\n";

            }

        } else {

            echo 'Нет данных';

        }

    }

    public function create(Request $request, AuthorService $service)
    {

        $author_info = $service->buildInfo($request);

        $author = Author::create($author_info);

        if(!empty($author)) {

            $service->updateRelatedEntities($request, $author);

        } else {

            echo 'Нет данных';

        }

    }

    public function edit(Request $request, AuthorService $service, $id)
    {

        $author_info = $service->buildInfo($request);

        $author = Author::find($id);

        if(!empty($author)) {

            $author->update($author_info);
            $service->updateRelatedEntities($request, $author);

        } else {

            echo 'Нет данных';

        }

    }

    public function delete($id) 
    {

        Author::find($id)->delete();

    }
}
