<?php
namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the search page with books.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexSearch(Request $request)
    {
        $searchQuery = $request->input('search', '');  // Mengambil query pencarian dari parameter GET

        // Ambil data buku berdasarkan query pencarian
        $books = Book::query()
            ->where('title', 'like', "%{$searchQuery}%")
            ->orWhere('author', 'like', "%{$searchQuery}%")
            ->get();

        $data = [
            'searchQuery' => $searchQuery,
            'books' => $books,
        ];

        return view('books.search', $data);  // Mengarahkan ke view books/search.blade.php
    }
}
