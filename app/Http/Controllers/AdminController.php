<?php

// app/Http/Controllers/AdminController.php

// app/Http/Middleware/AdminMiddleware.php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // dd('oke');
        return view('admin.dashboard');
    }
}



