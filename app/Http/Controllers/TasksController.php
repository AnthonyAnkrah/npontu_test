<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allTasks = Task::orderBy('created_at')->paginate(50);
        return view('pages.allTasks')->with('allTasks',$allTasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.newTask');
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
        'title' => 'required',
        'status' => 'required',
        'description' => 'required|min:55',
        'created_by' => 'required|numeric',
      ]);

      // Save new instance of task
      $task = new Task();
      $task->title = $request->input('title');
      $task->description = $request->input('description');
      $task->status = $request->input('status');
      $task->created_by = $request->input('created_by');
      $task->save();

      // redirect with success
      return redirect('/tasks')->with('success', 'User record inserted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if (\Auth::guard('web')->check()) {
        $task = Task::findorFail($id);
        return view('pages.taskCard')->with('task',$task);
      }else{
        return view('errors.noPermission');
      }
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
