<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $ctegoryVists=new Category();
        
        $data['getRecord'] = Category::getRecordCategory();
        return view('dashboard.category.index', $data);
    }

    public function add()
    {
        return view('dashboard.category.add');
    }

    public function insert(Request $request)
    {
        //dd($request->all());
        //validation
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'status' => 'in:active,inactive'
        ]);
        Category::create($request->all());

        return redirect()->route('dashboard.category.index')->with('success', 'Category created successfully...!');
    }

    public function edit($id)
    {
        //dd($id);
        $data['getRecord'] = Category::getSingle($id);
        return view('dashboard.category.edit', $data);
    }

    public function update(Request $request, $id)
    {
        //dd($id);
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'status' => 'in:active,inactive'
        ]);

        $category = Category::getSingle($id);

        $category->update($request->all());

        return redirect()->route('dashboard.category.index')->with('success', 'Category updated successfully...!');
    }

    public function delete($id)
    {
        $category = Category::getSingle($id);
        $category->delete();

        //another approach for soft delete
        // $category->isdelete =1;
        // $category->save();

        return redirect()->route('dashboard.category.index')->with('success', 'Category deleted successfully...!');
    }
}
