<?php

namespace Luinuxscl\WordpressBasicAuth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WordpressController extends Controller
{
    /**
     * Muestra el formulario de creación de WordPress.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('wordpress-basic-auth::wordpress.create');
    }
}
