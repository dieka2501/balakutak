<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Http\Helpers\Helpers;

class UnitController extends Controller
{
    protected $unit;
    protected $helpers;

    public function __construct(Unit $unit, Helpers $helpers) 
    {
        $this->unit = $unit;
        $this->helpers = $helpers;
    }

    public function create(Request $request) 
    {
        $results = $this->unit->create($request->all());
        return $this->helpers->response(true,$results);
    }

    public function get(Request $request)
    {
        $results = $this->unit->paginate(10);
        return $this->helpers->response(true,$results->items());
    }

    public function edit(Request $request,$id) 
    {
        $results = $this->unit->find($id);
        
        if(is_null($results)) {
            return $this->helpers->response(false,'','Not found');
        }

        foreach($request->all() as $key => $data) {
            $results->$key = $data;
        }
        
        $results->save();

        return $this->helpers->response('true',$results);
    }

    public function delete(Request $request, $id) 
    {
        $results = $this->unit->find($id);
        if(is_null($results)) {
            return $this->helpers->response(false,'','Not found');
        }

        $results->delete();

        return $this->helpers->response('true',$results);

    }

    public function show($id) 
    {
        $results = $this->unit->find($id);
        return $this->helpers->response('true',$results);
    }
}