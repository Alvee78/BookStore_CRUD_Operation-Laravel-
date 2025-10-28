@extends('layout')

@section('page_content')
    <div class="row">
        <div class="col">
            <h3 class="my-3">Welcome to Book Store</h1>
        </div>
        <form method="GET" action="{{route('books.index')}}" class="col d-flex justify-content-end my-3" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" name="search" value="{{request('search')}}" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <div class="col-3 d-flex justify-content-end">
            <a href=" {{route('books.create')}} " class="btn btn-success my-3"> <i class="bi bi-patch-plus"></i> Add Book</a>
        </div>
    </div>

    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Price</th>
            <th>Stock</th>
            <th colspan="3" class="text-center">Action</th>
        </tr>

        @foreach ($books as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->title}}</td>
                <td> {{$book->author}} </td>
                <td> {{$book->isbn}} </td>
                <td> {{$book->price}} </td>
                <td> {{$book->stock}} </td>
                <td><a href="{{route('books.show', $book->id)}}" class="btn btn-primary">view</a></td>
                <td><a href="{{route('books.edit', $book->id)}}" class="btn btn-warning">edit</a></td>
                <td>
                    <form method="POST" action="{{route('books.delete')}}" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        <input type="hidden" name="id" value="{{$book->id}}">
                        <input type="submit" class="btn btn-danger" value="Delete" >
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{$books->links()}}
@endsection