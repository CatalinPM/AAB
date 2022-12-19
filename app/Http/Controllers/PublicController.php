<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Mail\RequestRoleMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function home()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();
        return view('layouts.home', compact('articles'));
    }

    public function workWithUs()
    {
        return view('pages.workWithUs');
    }

    public function sendRoleRequest(Request $request)
    {
        $user = Auth::user();
        $role = $request->input('role');
        $email = $request->input('email');
        $presentation = $request->input('presentation');
        $requestMail = new RequestRoleMail(compact('role','email', 'presentation'));
        Mail::to('deepymatrix@gmail.com')->send($requestMail);
        switch($role){
            case 'admin':
                $user->is_admin = NULL;
                break;
            case 'revisor':
                $user->is_revisor = NULL;
                break;
            case 'writer':
                $user->is_writer = NULL;
                break;
        }
        $user->update();
        return redirect()->route('home')->with('message', 'Grazie per averci contattato');

    }
}
