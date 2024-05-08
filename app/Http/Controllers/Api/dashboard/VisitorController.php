<?php

namespace App\Http\Controllers\Api\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VisitorController extends Controller
{
    
    public function addVisitor(Request $request){
        $validator =Validator::make($request->all(),[

            'email' => 'email|required',
        ]);
        if ($validator->fails())
        {
            return response()->json([
                'status'=> 422,
                'data'=>$validator->messages(),
            ]);
        }else{
            $service=Visitor::create([
                'email'=>$request->email,
            ]);
            if($service){
                return response()->json([
                    'status'=> 200,
                    'data'=>'Visitor Added Successfully',
                ]);

            }else{

                return response()->json([
                    'status'=> 500,
                    'data'=>'Something Went Wrong!',
                ]);

            }
        }

    }
}
