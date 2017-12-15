<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddTaskRequest;
use App\Task;
use Session;
use App;

class TaskResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {   
        $task = Task::orderBy('created_at', 'asc')->get();

        return view('tasks')
            ->with([
                'tasks' => $task,
                'title' => trans('navbar.title'),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddTaskRequest $request) {
        $task = new Task;
        $task->name = $request->input('name');
        if ($task->save()) {
            Session::flash('message', trans('navbar.create_task_success'));

            return redirect('/task');
        } else {
            Session::flash('message', trans('navbar.create_task_fail'));

            return back()
                 ->withInput(['name' => $request->name]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task) {
        if ($task->delete()) {
            Session::flash('message', trans('navbar.delete_task_success'));

            return redirect('/task');
        } else {  
            Session::flash('message', trans('navbar.delete_task_fail'));
            
            return back();
        }
    }
}
