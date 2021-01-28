<?php

namespace App\Http\Controllers;

use App\Models\ErrorLog;
use Illuminate\Http\Request;

class ErrorLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // >>> use App\Models\ErrorLog;
        // >>> $e = ErrorLog::find(4);
        // >>> $e->error->name;
        // $errorLog = ErrorLog::all();
        // echo json_encode($item->get('id'));
        $errorLog = ErrorLog::where('user_id',4)->get('id')->map(function ($item, $key) {
            // return $item * 2;
            $e = ErrorLog::find($item->id);
            // echo json_encode($e);
            
            // echo json_encode('---------------------');
            $newErrorLog = collect();
            $newErrorLog->put('id', $e->id);
            $newErrorLog->put('lead_id', $e->lead_id);

            $newErrorLog->put('error', $e->error()->get('name'));
            // $newErrorLog->put('country', $e->country->name);
            // $newErrorLog->put('created_at', $e->error->created_at);



            return $newErrorLog;
        });
        // echo var_dump($errorLog);
        // echo json_encode($errorLog);die;
        return response()->json($errorLog);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ErrorLog  $errorLog
     * @return \Illuminate\Http\Response
     */
    public function show(ErrorLog $errorLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ErrorLog  $errorLog
     * @return \Illuminate\Http\Response
     */
    public function edit(ErrorLog $errorLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ErrorLog  $errorLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ErrorLog $errorLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ErrorLog  $errorLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(ErrorLog $errorLog)
    {
        //
    }
}
