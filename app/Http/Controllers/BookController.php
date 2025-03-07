<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $data = Book::all();
        return view('book.index', compact('data'));
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_category' => 'required',
            'title' => 'required',
            'value' => 'required',
            'date' => 'required',
            'status' => 'required',
        ]);
        try {
            Book::create($request->all());
            return redirect()->route('book.index')->with('success', 'Data Buku berhasil disimpan');
        } catch (\Throwable $th) {
            return redirect()->route('book.create')->with('error', 'Data Buku gagal disimpan' . $th->getMessage());
        }
    }

    public function edit($id)
    {
        $data = Book::findOrFail($id);
        return view('book.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_category' => 'required',
            'title' => 'required',
            'value' => 'required',
            'date' => 'required',
            'status' => 'required',
        ]);
        try {
            Book::findOrFail($id)->update($request->all());
            return redirect()->route('book.index')->with('success', 'Data Buku berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->route('book.edit', $id)->with('error', 'Data Buku gagal diubah' . $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Book::findOrFail($id)->delete();
            return response()->json(['success' => 'Buku berhasil dihapus']);
        } catch (\Throwable $th) {

            return response()->json(['error' => 'Buku gagal dihapus' . $th->getMessage()]);
        }
    }
}
