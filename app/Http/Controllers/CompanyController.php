<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RentCompany;
use App\Http\Helpers\Helpers;

class CompanyController extends Controller
{
    protected $company;
    protected $helpers;

    public function __construct(RentCompany $company, Helpers $helpers) 
    {
        $this->company = $company;
        $this->helpers = $helpers;
    }

    public function create(Request $request) 
    {
        $results = $this->company->create($request->all());
        return $this->helpers->response(true,$results);
    }

    public function get(Request $request)
    {
        $results = $this->company->paginate(10);
        return $this->helpers->response(true,$results->items());
    }

    public function edit(Request $request,$id) 
    {
        $results = $this->company->find($id);
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
        $results = $this->company->find($id);
        if(is_null($results)) {
            return $this->helpers->response(false,'','Not found');
        }
        $results->delete();

        return $this->helpers->response('true',$results);

    }

    public function show($id) 
    {
        $results = $this->company->find($id);
        return $this->helpers->response('true',$results);
    }
}