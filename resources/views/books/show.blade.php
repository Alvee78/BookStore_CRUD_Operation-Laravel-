@extends('layout')

@section('page_content')
    <h1>Welcome to Book Store</h1>
    <table class="table table-striped">

            <tr><th>Id</th><td>{{$book->id}}</td></tr>
           <tr><th>Title</th><td>{{$book->title}}</td></tr> 
            <tr><th>Author</th><td> {{$book->author}} </td></tr>
            <tr> <th>ISBN</th> <td> {{$book->isbn}} </td> </tr>
            <tr><th>Price</th><td> {{$book->price}} </td></tr>
            <tr> <th>Quantity</th> <td> {{$book->stock}} </td> </tr>
            <tr><th>Action</th> <td>delete</td> </tr>

    </table>
    <a href="{{ route("books.index") }}" class="btn btn-danger"> <i class="bi bi-chevron-left"></i> Go Back</a>
    <a href="{{ route("books.edit", $book->id) }}" class="btn btn-warning"> <i class="bi bi-pencil-square"></i> Edit</a>
@endsection