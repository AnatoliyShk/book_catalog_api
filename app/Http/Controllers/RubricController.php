<?php

namespace App\Http\Controllers;

use App\Rubric;
use Illuminate\Http\Request;
use App\Services\RubricService;

class RubricController extends Controller
{
    
    public function get($id)
    {

        $rubric = Rubric::find($id);

        if(!empty($rubric)) {

            echo $rubric->id." ".$rubric->name."\n";

        } else {

            echo 'Нет данный'

        }

    }

    public function getAll()
    {   
        $rubrics = Rubric::all();

        if(!empty($rubric)) {

            foreach($rubrics as $rubric) {

                echo $rubric->id." ".$rubric->name."\n";

            }

        }

    }

    public function getRubricBooks($id)
    {
        
        $rubric = Rubric::find($id);

        if(!empty($rubric)) {

            foreach($rubric->books as $book) {

                echo $book->id." ".$book->name."\n";

            }

        }

    }

    public function create(Request $request, RubricService $service)
    {

        $rubric_info = $service->buildInfo($request);
         
        $rubric = Rubric::create($rubric_info);

        if(!empty($rubric)) {

            $service->updateRelatedEntities($request, $rubric);

        }

    }

    public function edit(Request $request, RubricService $service, $id)
    {

        $rubric_info = $service->buildInfo($request);

        $rubric = Rubric::find($id);

        if(!empty($rubric)) {
        
            $rubric->update($rubric_info);
            $service->updateRelatedEntities($request, $rubric);

        }

    }

    public function delete($id) 
    {

        Rubric::find($id)->delete();
        
    }

}
