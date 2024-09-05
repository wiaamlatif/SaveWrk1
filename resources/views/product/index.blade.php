@extends('base')

@section('title','Products')

@section('content')


    <div class="d-flex justify-content-between align-items-center">
        <h1>Product List</h1>
        <a href="{{route('products.create')}}" class="btn btn-primary">Create</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Description</th>
              <th>Category</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Image</th>
              <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)

                <tr>
                    <td>{{ $product ->id }}</td>
                    <td>{{ $product ->name }}</td>
                    <td>{{ $product ->description }}</td>
                    <td align="center">
                        @if ($product ->category)
                            <a href="{{route('categories.show',$product->category_id)}}" class="btn btn-link">
                                <span class="badge bg-primary">{{$product ->category->name}}</span>
                            </a>
                        @endif
                    </td>
                    <td>{{ $product ->quantity }}</td>
                    <td>{{ $product ->price }} <strong>MAD</strong> </td>
                    <td> <img width="50px"src="{{asset('storage/'.$product->image)}}" alt=""> </td>
                    <td>
                        <div class="btn-group gap-1">
                            <a href="{{route('products.edit',$product)}}" class="btn btn-primary">Update</a>
                            <form  method="post"  action="{{route('products.destroy',$product)}}">
                              @csrf
                              @method('DELETE')
                              <input type="submit" class="btn btn-danger" value="Delete"/>
                            </form>
                        </div>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="7" align="center"><h4>No products</h4> </td>
                </tr>

            @endforelse

         </tbody>

    </table>


@endsection


