<?php

namespace App\Http\Controllers;

use App\Models\SongBook;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{

    public function categoriesList(): View
    {
        $categories = Category::all()->toArray();
        return view('Pages.category.category_list', compact('categories'));
    }

    public function categoryView(int $cat_id): View
    {
        $category = Category::where('cat_id', '=', $cat_id)->first();
        //        dd($category);
        return view('Pages.category.view_category', compact('category'));
    }

    public function saveCategory(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'category_name' => 'required|min:5|max:60',
            'category_status' => 'required',
            'category_desc' => 'min:2|max:1000|nullable',
        ]);
        $current_date = date('Y-m-d H:i:s');

        $category = new Category();
        $category->cat_name = $request->category_name;
        $category->cat_status = $request->category_status;
        $category->cat_desc = $request->category_desc;
        $category->created_at = $current_date;
        $category->save();

        if ($category->cat_id) {
            return back()->with('success', 'Category added successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function editCategory(int $cat_id): View
    {
        $edit_category_data = Category::where('cat_id', '=', $cat_id)->first();
//                dd($edit_category_data);
        return view('Pages.category.add_category', compact('edit_category_data'));
    }


    public function updateCategory(Request $request, int $cat_id): RedirectResponse
    {
//        dd($request->all());
        $this->validate($request, [
            'category_name' => 'required|min:5|max:60',
            'category_status' => 'required',
            'category_desc' => 'min:2|max:1000|nullable',
        ]);

        $exist_category = Category::where('cat_id', '=', $cat_id)->first();
        $current_date = date('Y-m-d H:i:s');
        $type = $message = '';
        if (!empty($exist_category)) {
            $exist_category->cat_name = $request->input('category_name');
            $exist_category->cat_status = $request->input('category_status');
            $exist_category->cat_desc = $request->input('category_desc');
            $exist_category->updated_at = $current_date;
            $exist_category->save();
            if ($exist_category->cat_id) {
                $type = 'success';
                $message = 'Category updated successfully';
            }
        } else {
            $type = 'error';
            $message = 'Something went wrong!';
        }
        return back()->with($type, $message);
    }


    public function deleteCategory(int $cat_id): RedirectResponse
    {
        $exist_category = Category::where('cat_id', '=', $cat_id)->first();
        if ($exist_category) {
            $associated_lyrics = SongBook::where('lyrics_cat_id', '=', $cat_id)->first();
            if (!empty($associated_lyrics)) {
                return back()->with('error', 'Lyrics are exist for this category');
            } else {
                $exist_category->delete();
                return back()->with('success', 'Category has been deleted');
            }
        } else {
            return back()->with('error', 'Category not found');
        }
    }
}
