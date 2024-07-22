<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BookController extends Controller
{
    // Existing methods...

    public function search(Request $request)
    {
        $searchQuery = $request->query('query', '');  // Mengambil parameter pencarian dari query string, default ke string kosong

        // Ambil data buku berdasarkan query pencarian
        $books = Book::with('kategori')
            ->where('judul', 'like', "%{$searchQuery}%")
            ->orWhere('penulis', 'like', "%{$searchQuery}%")
            ->orWhereHas('kategori', function ($query) use ($searchQuery) {
                $query->where('name', 'like', "%{$searchQuery}%"); // Pencarian berdasarkan nama kategori
            })
            ->paginate(10);  // Menambahkan paginasi dengan 10 hasil per halaman

        if ($request->ajax()) {
            return response()->json([
                'results' => view('partials.search_results', ['books' => $books])->render(),
                'pagination' => (string) $books->links(),
            ]);
        }

        return view('books.search', [
            'books' => $books,
            'searchQuery' => $searchQuery,
        ]);
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }
}
