<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

interface iEntity
{
    public function buildInfo(Request $request);

    public function updateRelatedEntities(Request $request, Model $model);
}