<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DefineCategories;

class CategoriesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function create(){
        return view('admin.definecategories');
    }

    public function store(Request $request){

        // var_dump($request);
        // exit();
        // $data = $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //     'group' => 'required',
        //  ]);

        $user = auth()->user();

        // Create a new post for the authenticated user
        $user->definecategories()->create([
            'title'=>$request['title'],
            'description'=>$request['description'],
            'group'=>$request['group'],
            'user_id'=> $user['id'],
        ]);

        return redirect('/definecategories');
    }
    public function deleteCategory($id)
    {
        // Find the category by ID and delete it
        $category = DefineCategories::findOrFail($id);
        $category->delete();

        return redirect()->route('mycategories')->with('success', 'Category deleted successfully');
    }

    public function editCategory($id)
    {
    $category = DefineCategories::findOrFail($id);

    return view('admin.editcategory', ['category' => $category]);
    }


    public function updateCategory(Request $request, $id)
    {
        $category = DefineCategories::findOrFail($id);

        $category->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'group' => $request->input('group'),
        ]);

        return redirect()->route('mycategories')->with('success', 'Category updated successfully');
    }

    public function showData(Request $request)
    {
        // Retrieve the selectedData from the query parameters
        $selectedData = json_decode($request->query('selectedData'), true);

        // Return the view with the received data
        return view('admin.previewpage', ['selectedData' => $selectedData]);
    }

}
