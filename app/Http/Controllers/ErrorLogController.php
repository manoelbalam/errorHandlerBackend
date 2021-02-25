<?php

namespace App\Http\Controllers;
use Carbon\Carbon; 
use App\Models\Error;
use App\Models\Country;
use App\Models\ErrorLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator,Log;
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
        $data = collect();
        // echo json_encode($errorLog);
        $data->put('data', $errorLog);
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json("create", 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        $request->validate([
                'lead_id' => 'required|numeric|unique:error_logs',
              'country_id' => 'required|numeric',
              'error_id' => 'required|numeric'
          ]);

        //   ErrorLog::updateOrCreate(['id' => $request->id], [
        //     'lead_id' => $request->lead_id,
        //     'country_id' => $request->country_id,
        //     'error_id' => $request->error_id
        //   ]);

        $errorLog = new ErrorLog();
        $errorLog->lead_id = $request->lead_id;
        $errorLog->country_id = $request->country_id;
        $errorLog->error_id = $request->error_id;
        $errorLog->user_id = Auth::id();
        $errorLog->save();
        return response()->json('success', 200);
        // $input = $request->all();
        // if ($request->ajax()) {

        //     return response()->json("ajax", 200);

        // }
        // echo json_decode($request);
        // echo json_encode($request->lead_id);
        // return 

        
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
