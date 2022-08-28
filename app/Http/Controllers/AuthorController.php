<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function save(){
        $author= new Author;
        $author->username="Test";
        $author->password="testing";
        $author->save();
    }
}
