<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('name', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.categories.index', compact('categories'));

    }//end of index

    public function create()
    {
        return view('dashboard.categories.create');
    }


    public function store(Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('category_translations', 'name')]];

        }//end of for each

        $request->validate($rules);

//     $request->validate([
////         'name'=> 'required:unique,categories,name',
//     'ar.*' => 'required|unique:category_translations,name',
//     ]);

     Category::create($request->all());
     session()->flash('success',__('site.added_successfully'));
     return redirect()->route('dashboard.categories.index');
    }



    public function edit(Category $category)
    {
     return view('dashboard.categories.edit',compact('category'));
    }


    public function update(Request $request, Category $category)
    {

//$request->validate([
//    'name'=> 'required|unique:categories,name,'.$category->id,
//]);
//        $request->validate([
//
////         'name'=> 'required:unique,categories,name',
//            'ar.*' => 'required|unique:category_translations,name',
//        ]);

        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('category_translations', 'name')->ignore($category->id, 'category_id')]];

        }//end of for each

        $request->validate($rules);

        $category->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.categories.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.categories.index');
    }



}
