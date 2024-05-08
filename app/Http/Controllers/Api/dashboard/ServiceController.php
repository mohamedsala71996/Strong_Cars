<?php

namespace App\Http\Controllers\Api\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serv=Service::all();


        if($serv->count() >0 ){


            return response()->json([
                'status'=> 200,
                'data'=>$serv,
            ]);

        }else{

            return response()->json([
                'status'=> 404,
                'data'=>'No Services Found',
            ]);
        }
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator =Validator::make($request->all(),[

            'title_ar' => 'string',
            'title_en' => 'string',
            'description_ar' => 'string',
            'description_en' => 'string',
        ]);


        if ($validator->fails())
        {
            return response()->json([
                'status'=> 422,
                'data'=>$validator->messages(),
            ]);
        }else{

            $service=Service::create([
                'title_ar'=>$request->title_ar,
                'title_en'=>$request->title_en,
                'description_ar'=>$request->description_ar,
                'description_en'=>$request->description_en,
            ]);

            if($service){

                return response()->json([
                    'status'=> 200,
                    'data'=>'Service Created Successfully',
                ]);

            }else{

                return response()->json([
                    'status'=> 500,
                    'data'=>'Something Went Wrong!',
                ]);

            }
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator =Validator::make($request->all(),[

            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
        ]);


        if ($validator->fails())
        {
            return response()->json([
                'status'=> 422,
                'data'=>$validator->messages(),
            ]);
        }else{

            $service=Service::find($id);
           
            if($service){

                $service->update([
                    'title_ar'=>$request->title_ar,
                    'title_en'=>$request->title_en,
                    'description_ar'=>$request->description_ar,
                    'description_en'=>$request->description_en,
                ]);

                return response()->json([
                    'status'=> 200,
                    'data'=>'Data Updated Successfully',
                ]);

            }else{

                return response()->json([
                    'status'=> 500,
                    'data'=>'Something Went Wrong!',
                ]);

            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service=Service::find($id);
        if($service){

            $service->delete();
            return response()->json([
                'status'=> 200,
                'data'=>'Service Deleted Successfully',
            ]);

        }else{

            return response()->json([
                'status'=> 404,
                'data'=>'No Services Found',
            ]);
        }
    }

}
