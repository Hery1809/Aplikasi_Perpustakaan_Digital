<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter search dari request
        $search = $request->input('search');

        // Query untuk mengambil data buku dengan relasi kategori
        $books = Book::query()->with('kategori');

        // Jika terdapat parameter search, filter berdasarkan judul buku
        if ($search) {
            $books->where('judul', 'like', '%' . $search . '%');
        }

        // Menggunakan paginate untuk membatasi jumlah data per halaman
        $books = $books->paginate(1); // 10 item per halaman

        // Load view books.index dan passing data books ke view
        return view('books.index', compact('books'));
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

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully');
    }
}
