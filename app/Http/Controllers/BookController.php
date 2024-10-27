<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    /**
     * Display a listing of data books.
     */
    public function index()
    {
        $books = Book::paginate(10);
        return response()->json($books);
    }

    /**
     * Created new book.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'max:255', 'string'],
            'description' => ['required', 'string'],
            'author' => ['required', 'max:255', 'string'],
            'publication_date' => ['required', 'date'],
        ]);

        $book = Book::create($data);

        return new BookResource($book);
    }

    /**
     * Display the specified book.
     */
    public function show($id)
    {
        return Book::findOrFail($id);
    }

    /**
     * Update the specified book in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => ['required', 'max:255', 'string'],
            'description' => ['required', 'string'],
            'author' => ['required', 'max:255', 'string'],
            'publication_date' => ['required', 'date'],
        ]);

        $book = Book::findOrFail($id);
        $book->update($data);

        return new BookResource($book);
    }

    /**
     * Remove the specified book from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return response()->json(null, 204);
    }
}
