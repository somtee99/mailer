<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $fields = Field::all();

        return response()->json([
            "status" => "success",
            "message" => "Fields Retrieved",
            "data" => $fields
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //validate request
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'type' => 'required'
        ]);

        if($validation->fails()){
            //get error messages
            $errors = $validation->errors();
            $error_message = "";
            foreach ($errors->all() as $message) {
                $error_message = $error_message. $message ." ";
            }

            //return error messages
            return response()->json([
                "status" => "failed",
                "message"=> $error_message
            ], 400);
        }

        Field::create($validation->safe()->only(['title', 'type']));

        return response()->json([
            "status" => "success",
            "message" => "Field Added"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $field = Field::find($id);

        return response()->json([
            "status" => "success",
            "message" => "Field Retrieved",
            "data" => $field
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        //validate request
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'type' => 'required'
        ]);

        if($validation->fails()){
            return response()->json([
                "status" => "failed",
                "message"=> "Validation Failed"
            ], 400);
        }

        $data = $validation->safe()->only(['title', 'type']);
        Field::find($id)->update($data);

        return response()->json([
            "status" => "success",
            "message"=> "Field Updated",
            "data" => Field::find($id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Field::find($id)->delete();

        return response()->json([
            "status" => "success",
            "message" => "Field Deleted"
        ]);
    }
}
