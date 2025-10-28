<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $books = Book::where('title', 'like', '%' . $request->search . '%')->paginate(10);
        }else{
            $books = Book::paginate(10);
        }
        return view('books.index') -> with("books", $books);
    }

    public function show($book_id){
        $book = Book::find($book_id);
        return view('books.show') -> with('book', $book);
    }

    public function create() {
        return view('books.create');
    }

    public function store(Request $request) {
        $request-> validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books|digits:13',
            'stock' => 'required|numeric|integer',
            'price' => 'required|numeric'
        ]);

        $book = new Book;
        $book->title = $request['title'];
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->stock = $request['stock'];
        $book->price = $request->price;
        $book->save();

        return redirect()->route('books.show', $book->id);

    }

    public function edit($book_id) {
        $book = Book::find($book_id);

        return view('books.edit')
                    -> with('book', $book);
    }

    public function update(Request $request){
        $request-> validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|digits:13',
            'stock' => 'required|numeric|integer',
            'price' => 'required|numeric'
        ]);

        $book = Book::find($request->id);
        $book->title = $request['title'];
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->stock = $request['stock'];
        $book->price = $request->price;
        $book->save();

        return redirect()->route('books.index');
    }

    public function destroy(Request $request) {
        $book = Book::find($request->id);
        $book->delete();
        
        return redirect()->route('books.index');
    }

    public function welcome()
    {
        return view('welcome');
    }
}
