<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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
            'title' => 'required',
            'description' => 'required',
            'reminder' => 'required',
        ]);
      
        Reminder::create($request->all());
       
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function show(reminder $reminder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data = Reminder::where('id',$id)->first();

        return view('edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reminder $reminder)
    {
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'reminder' => 'required',
        ]);
      
        Reminder::where('id',$request->id)->update(['title'=>$request->title, 'description'=>$request->description, 'reminder'=>$request->reminder,]);
      
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function destroy(reminder $reminder, $id)
    {
        Reminder::where('id',$id)->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
