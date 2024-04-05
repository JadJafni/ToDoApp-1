<?php

namespace App\Http\Controllers;
use App\Models\task;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function create(Request $request){
        $task = new Task();
        $task->task_title = $request->input('task_title');
        $task->due_date = $request->input('due_date');
        $task->time = $request->input('time');
        $task->categoryID = $request->input('category_id');
        $task->statusID = 1;
        $task->userID = Auth::id();
        $task->tag = $request->input('tag');
        $task->notes = $request->input('notes');
        $task->reminderID = null; // Assuming reminder is a nullable field
        $task->save();

        // Redirect back to the dashboard or wherever you want
        return redirect()->route('dashboard')->with('success', 'Task added successfully');
    }
    
    public function index(Request $request){
        $selectedCategory = $request->input('category');
        $task = Task::all();
        $categories = Category::all();
        $tasks = Task::where('categoryID', $selectedCategory)->get();
        return view('dashboard', ['task' => $task,'categories' => $categories,'selectedCategory' => $selectedCategory]);
    }

    public function edit($id){
        $tasks = Task::where('id',$id)->first();
        return view ('category.edit_task',['tasks' => $tasks]);
    }
    public function update(Request $request,$id){
        $tasks = Task::where('id',$id)->first();
        $tasks ->update($request->all());
        return redirect('/dashboard')->with('success', 'New Data Update');
    }
    public function delete(Request $request,$id){
        $tasks = Task::where('id',$id)->first();
        $tasks -> delete($tasks);
        return redirect('/dashboard')->with('success', 'New Data Update');
    }
}
