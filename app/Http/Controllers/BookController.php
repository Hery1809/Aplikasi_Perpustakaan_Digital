<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BookController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Book::query()->with('kategori');

            if ($search = $request->get('search')['value']) {
                $data->where('judul', 'like', '%' . $search . '%');
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('kategori', function ($row) {
                    return $row->kategori ? $row->kategori->name : '-';  // Menampilkan nama kategori atau tanda '-' jika tidak ada
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('books.edit', $row->id);
                    $deleteUrl = route('books.destroy', $row->id);

                    $btn = '<a href="' . $editUrl . '" class="edit btn btn-primary btn-sm">Edit</a> ';
                    $btn .= '<form action="' . $deleteUrl . '" method="POST" style="display:inline;">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" class="btn btn-danger btn-sm delete-btn" data-title="Hapus Buku" data-text="Apakah Anda yakin ingin menghapus buku ini?">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('books.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'kategori' => 'required|exists:categories,id',
            'status' => 'required|string|max:255',
            'uraian' => 'nullable|string',
            'gambar' => 'required|image|max:2048',
            'pdf' => 'required|mimes:pdf|max:10000',
        ], [
            'judul.required' => 'Judul buku wajib diisi.',
            'judul.string' => 'Judul buku harus berupa teks.',
            'judul.max' => 'Judul buku tidak boleh lebih dari 255 karakter.',
            'penulis.required' => 'Penulis buku wajib diisi.',
            'penulis.string' => 'Penulis buku harus berupa teks.',
            'penulis.max' => 'Penulis buku tidak boleh lebih dari 255 karakter.',
            'penerbit.required' => 'Penerbit buku wajib diisi.',
            'penerbit.string' => 'Penerbit buku harus berupa teks.',
            'penerbit.max' => 'Penerbit buku tidak boleh lebih dari 255 karakter.',
            'tahun_terbit.required' => 'Tahun terbit buku wajib diisi.',
            'tahun_terbit.integer' => 'Tahun terbit buku harus berupa angka.',
            'tahun_terbit.min' => 'Tahun terbit buku tidak boleh kurang dari 1900.',
            'tahun_terbit.max' => 'Tahun terbit buku tidak boleh lebih dari tahun sekarang.',
            'kategori.required' => 'Kategori buku wajib dipilih.',
            'kategori.exists' => 'Kategori yang dipilih tidak valid.',
            'status.required' => 'Status buku wajib dipilih.',
            'status.string' => 'Status buku harus berupa teks.',
            'status.max' => 'Status buku tidak boleh lebih dari 255 karakter.',
            'uraian.string' => 'Uraian buku harus berupa teks.',
            'gambar.required' => 'File gambar tidak boleh kosong.',
            'gambar.image' => 'File gambar harus berupa gambar.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2048 KB.',
            'pdf.required' => 'File PDF tidak boleh kosong.',
            'pdf.mimes' => 'File PDF harus berformat .pdf.',
            'pdf.max' => 'Ukuran PDF tidak boleh lebih dari 10000 KB.',
        ]);

        $gambarPath = $request->file('gambar')->store('uploads/images', 'public');
        $pdfPath = $request->file('pdf')->store('uploads/pdf', 'public');

        Book::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'kategori_id' => $request->kategori,
            'status' => $request->status,
            'gambar' => $gambarPath,
            'pdf' => $pdfPath,
            'uraian' => $request->uraian,
        ]);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Data Berhasil Disimpan'], 200);
        }

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'kategori' => 'required|exists:categories,id',
            'status' => 'required|string|max:255',
            'uraian' => 'nullable|string',
            'gambar' => 'image|max:2048',
            'pdf' => 'mimes:pdf|max:10000',
        ], [
            'judul.required' => 'Judul buku wajib diisi.',
            'judul.string' => 'Judul buku harus berupa teks.',
            'judul.max' => 'Judul buku tidak boleh lebih dari 255 karakter.',
            'penulis.required' => 'Penulis buku wajib diisi.',
            'penulis.string' => 'Penulis buku harus berupa teks.',
            'penulis.max' => 'Penulis buku tidak boleh lebih dari 255 karakter.',
            'penerbit.required' => 'Penerbit buku wajib diisi.',
            'penerbit.string' => 'Penerbit buku harus berupa teks.',
            'penerbit.max' => 'Penerbit buku tidak boleh lebih dari 255 karakter.',
            'tahun_terbit.required' => 'Tahun terbit buku wajib diisi.',
            'tahun_terbit.integer' => 'Tahun terbit buku harus berupa angka.',
            'tahun_terbit.min' => 'Tahun terbit buku tidak boleh kurang dari 1900.',
            'tahun_terbit.max' => 'Tahun terbit buku tidak boleh lebih dari tahun sekarang.',
            'kategori.required' => 'Kategori buku wajib dipilih.',
            'kategori.exists' => 'Kategori yang dipilih tidak valid.',
            'status.required' => 'Status buku wajib dipilih.',
            'status.string' => 'Status buku harus berupa teks.',
            'status.max' => 'Status buku tidak boleh lebih dari 255 karakter.',
            'uraian.string' => 'Uraian buku harus berupa teks.',
            'gambar.image' => 'File gambar harus berupa gambar.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2048 KB.',
            'pdf.mimes' => 'File PDF harus berformat .pdf.',
            'pdf.max' => 'Ukuran PDF tidak boleh lebih dari 10000 KB.',
        ]);

        try {
            $gambarPath = $book->gambar;
            $pdfPath = $book->pdf;

            if ($request->hasFile('gambar')) {
                if ($gambarPath) {
                    Storage::disk('public')->delete($gambarPath);
                }
                $gambarPath = $request->file('gambar')->store('uploads/images', 'public');
            }

            if ($request->hasFile('pdf')) {
                if ($pdfPath) {
                    Storage::disk('public')->delete($pdfPath);
                }
                $pdfPath = $request->file('pdf')->store('uploads/pdf', 'public');
            }

            $book->update([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit,
                'kategori_id' => $request->kategori,
                'status' => $request->status,
                'gambar' => $gambarPath,
                'pdf' => $pdfPath,
                'uraian' => $request->uraian,
            ]);

            if ($request->wantsJson()) {
                return response()->json(['message' => 'Data Berhasil Diupdate'], 200);
            }

            return redirect()->route('books.index')
                ->with('success', 'Book updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('books.index')
                ->with('error', 'Book failed to update');
        }
    }

    public function destroy(Book $book)
    {
        if ($book->gambar) {
            Storage::disk('public')->delete($book->gambar);
        }

        if ($book->pdf) {
            Storage::disk('public')->delete($book->pdf);
        }

        $book->delete();

        if (request()->wantsJson()) {
            return response()->json(['message' => 'Data Berhasil Dihapus'], 200);
        }

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully');
    }

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
}
