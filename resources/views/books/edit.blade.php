@extends('layout')
@section('page_content')
    <h3 class="my-3">Edit Book</h3>
    <form method="POST" action="{{route('books.update')}}" >
        @csrf
        <input type="hidden" name="id" value="{{$book->id}}">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title', $book->title)}}">
        </div>
        <div class="text-danger mb-3"> {{$errors->first('title')}} </div>
        
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{old('author', $book-> author)}}">
        </div>
        <div class="text-danger mb-3"> {{$errors->first('author')}} </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="{{old('isbn', $book->isbn)}}">
        </div>
        <div class="text-danger mb-3"> {{$errors->first('isbn')}} </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" min="1" class="form-control" id="stock" name="stock" value="{{old('stock', $book->stock)}}">
        </div>
        <div class="text-danger mb-3"> {{$errors->first('stock')}} </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" min="0.01" step="0.01" class="form-control" id="price" name="price" value="{{old('price', $book->price)}}">
        </div>
        <div class="text-danger mb-3"> {{$errors->first('price')}} </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('books.index')}}" class="btn btn-danger">Cancel</a>
    </form>
@endsection