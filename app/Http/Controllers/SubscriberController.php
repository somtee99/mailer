<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $subscribers = Subscriber::with('fields')->latest()->get();

        return response()->json([
            "status" => "success",
            "message" => "Subscribers Retrieved",
            "data" => $subscribers
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
            'email' => 'required|email|unique:subscribers',
            'name' => 'required',
            'state' => 'required'
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

        Subscriber::create($validation->safe());

        return response()->json([
            "status" => "success",
            "message" => "Subscriber Added"
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
        $subscriber = Subscriber::with('fields')
            ->where('id', $id)->first();

        return response()->json([
            "status" => "success",
            "message" => "Subscriber Retrieved",
            "data" => $subscriber
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
