<?php
namespace App\Http\Controllers;

class ArticlesController extends Controller
{
    public function index()
    {
        return view('articles.index');
    }

    public function welcome()
    {
        return view('home');
    }
}