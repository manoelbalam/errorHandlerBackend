<?php

namespace App\Http\Controllers;
use Carbon\Carbon; 
use App\Models\Error;
use App\Models\Country;
use App\Models\ErrorLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ErrorLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $errorLog = ErrorLog::whereUserId(Auth::id())->whereDate('created_at', Carbon::today())->get()->map(function ($item, $key) {
        // $errorLog = ErrorLog::whereUserId(Auth::id())->get()->map(function ($item, $key) {
            $newErrorLog = collect();
            $newErrorLog->put('lead_id', $item->lead_id);
            $newErrorLog->put('error', Error::whereId($item->error_id)->pluck('name')[0]);
            $newErrorLog->put('country', Country::whereId($item->country_id)->pluck('name')[0]);
            $newErrorLog->put('created_at', $item->created_at->toTimeString());
            return $newErrorLog;
        });
        return response()->json($errorLog, 200);
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
