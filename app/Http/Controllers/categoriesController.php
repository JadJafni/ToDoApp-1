<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class categoriesController extends Controller
{
    public function create(Request $request){
        $category = new Category();
        $category->category_title = $request->input('category_title');
        $category->userID = Auth::id();
        $category->save();
        return redirect('/dashboard')->with('success', 'New Data Insert');
    }

    public function index()
    {
    $categories = Category::all();
    return view('dashboard', ['categories' => $categories]);
    }
    
}
