<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    //
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return redirect()->route('tareas.index');
    }
}
