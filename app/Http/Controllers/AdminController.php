<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class AdminController extends Controller
{

    public function dashboard()
    {
        $adminRequests = User::where('is_admin', '=','0')->get();
        $revisorRequests = User::where('is_revisor', '=', '0')->get();
        $writerRequests = User::where('is_writer', '=', '0')->get();
        $tags = Tag::all();
        $categories = Category::all();
        //dd($adminRequests, $revisorRequests, $writerRequests);
        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests', 'tags', 'categories'));
    }

    public function makeUserAdmin(User $user)
    {
        $user->is_admin = true;
        $user->save();
        return redirect()->route('admin.dashboard');
    }

    public function makeUserRevisor(User $user)
    {
        $user->is_revisor = true;
        $user->save();
        return redirect()->route('admin.dashboard');
    }

    public function makeUserWriter(User $user)
    {
        $user->is_writer = true;
        $user->save();
        return redirect()->route('admin.dashboard');
    }

    public function editTag(Request $request, Tag $tag)
    {
        $tag->update(
            [
                'name' => $request->input('name')
            ]
        );
        return redirect()->route('admin.dashboard');
    }

    public function storeTag(Request $request)
    {
        Tag::create(['name' =>$request->input('name')]);
        return redirect()->route('admin.dashboard');
    }

    public function deleteTag(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.dashboard');
    }

    public function editCategory(Request $request, Category $category)
    {
        $category->update(
            [
                'name' => $request->input('name')
            ]
        );
        return redirect()->route('admin.dashboard');
    }

    public function storeCategory(Request $request)
    {
        Category::create(['name'=> $request->input('name')]);
        return redirect()->route('admin.dashboard');
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.dashboard');
    }
}
