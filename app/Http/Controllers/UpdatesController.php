<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Update;

class UpdatesController extends Controller
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
    public function create($task_id)
    {
        return view('pages.newTaskUpdate')->with('task_id',$task_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'task_id' => 'required|numeric',
        'completed' => 'required',
        'uncompleted' => 'required',
        'updater' => 'required|numeric',
      ]);

      // Save new update instance
      $update = new Update();
      $update->task_id = $request->input('task_id');
      $update->updater = $request->input('updater');
      $update->completed = $request->input('completed');
      $update->uncompleted = $request->input('uncompleted');
      $update->save();

      // Redirect with success
      return redirect('/task/'.$update->task_id)->with('success', 'Task Update recorded!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
