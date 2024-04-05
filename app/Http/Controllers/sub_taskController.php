<?php

namespace App\Http\Controllers;
use App\Models\task;
use App\Models\sub_task;
use Illuminate\Http\Request;

class sub_taskController extends Controller
{
    public function index($id){
        $task = Task::where('id', $id)->get();
        $sub_task = sub_task::all();
        return view('category.sub_task', ['task' => $task,'sub_task' => $sub_task]);
    }
    public function create(Request $request,$id){
        $sub_task = new sub_task();
        $sub_task->title = $request->title;
        $sub_task->statusID = 1;
        $sub_task->taskID = $request->id;
        $sub_task->save();
        return back();
    }
    public function edit($id){
        $sub_task = sub_task::where('id',$id)->first();
        return view ('category.edit_subTask',['sub_task' => $sub_task]);
    }
    public function update(Request $request,$id){
        $sub_task = sub_task::where('id',$id)->first();
        $sub_task ->update($request->all());
        return redirect('/dashboard/' . $sub_task->taskID . '/subtask');
    }
    public function delete(Request $request,$id){
        $sub_task = sub_task::where('id',$id)->first();
        $sub_task -> delete($sub_task);
        return back();
    }
}
