<?php

namespace App\Http\Helpers;

use Illuminate\Contracts\Routing\ResponseFactory;

Class Helpers {
    
    public function response($status, $data,$message = '') 
    {
        return response()->json(['status' => $status, 'message' => $message, 'data' => $data]);
    }
}