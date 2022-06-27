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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

            //redirect back
//            return redirect('post/create')
//                ->withErrors($validator)
//                ->withInput();
        }

        Field::create($validation->safe());

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
