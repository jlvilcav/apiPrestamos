<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SwaggerUIController extends Controller
{
    /**
     * Display the Swagger UI page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('swagger.index');
    }
}
