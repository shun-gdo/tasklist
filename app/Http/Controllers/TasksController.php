<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;


class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tasks = Task::where('user_id', '=' ,\Auth::id())->get();
        
        return view('tasks.index' , [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $task = new Task;
        
        return view('tasks.create',[
            'tasks' => $task,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'content'=>'required',
            'status'=>'required|max:10',
        ]);
        
        $task = new Task;
        $task->content = $request->content;
        $task->status = $request->status;
        $task->user_id = \Auth::id();
        $task->save();
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $task = Task::findOrFail($id);
        
        if($task->user_id === \Auth::id()){
            return view('tasks.show',[
                'task' => $task,
            ]);
        }else{
            return redirect('/')->withErrors(['error'=>'you have no rights to access this task']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $task = Task::findOrFail($id);
        if($task->user_id === \Auth::id()){
            
            return view('tasks.edit',[
                'task' => $task,
            ]);
        }else{
            return redirect('/')->withErrors(['error'=>'you have no rights to access this task']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $task = Task::findOrFail($id);
        
        if($task->user_id === \Auth::id()){
            
            $request->validate([
                'content'=>'required',
                'status'=>'required|max:10',
            ]);
        
            $task->content = $request->content;
            $task->status = $request->status;
            $task->save();
            return redirect('/');
        }else{
            return redirect('/')->withErrors(['error'=>'you have no rights to access this task']);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $task = Task::findOrFail($id);
        
        if($task->user_id === \Auth::id()){
            $task->delete();
            return redirect('/');
        }else{
            return redirect('/')->withErrors(['error'=>'you have no rights to access this task']);
        }
        
    }
}
