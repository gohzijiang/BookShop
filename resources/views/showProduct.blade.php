@extends('layouts.app')
@section('content')

@guest
@if (Route::has('login'))
<script>
    window.location.href='{{ route('login') }}'
</script>

@endif

@elseif (Auth::user()->is_admin == 0)

@elseif (Auth::user()->is_admin == 1)

@if(Session::has('success'))           
        <div class="alert alert-success" role="alert">
            {{ Session::get('success')}}
        </div>       
@endif 

<link rel="stylesheet" href="css/showProductStyle.css" />
<link rel="preconnect" href="https://fonts.gstatic.com">  
<link href="https://fonts.googleapis.com/css2?family=Teko:wght@500&family=Catamaran:wght@500&display=swap" rel="stylesheet">


<h1>Products</h1>

<div class="container">
    <div class="row">
        <table class="table">
            <thead id="table-head">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Language ID</th>
                    <th>Category ID</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td><img src="{{ asset('images/') }}/{{$product->image}}" alt="" width="50"></td>
                    <td style="max-width:300px">
                        <h6>{{$product->bookName}}</h6>
                        <p class="text-muted">{{$product->description}}</p>
                    </td>   
                    <td>{{$product->author}}</td>
                    <td>{{$product->categoryID}}</td>
                    <td>{{$product->languageID}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->approve}}</td>
                    <td>
                        <a href="{{route('editProduct',['id' => $product->id])}}" class="btn btn-warning">Edit</i></a> 
                        <a href="{{route('deleteProduct',['id' => $product->id])}}" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</a>   
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="text-center">
			<a href="{{ route('pdfReport') }}" class="btn btn-info">Download Product List</a>
        </div>

       

    </div>
    <div class="text-center">
			{{ $products->links('pagination::bootstrap-4')}}
    </div>


</div>

@endguest
@endsection
