@extends('base')

@section('title','Products')

@section('content')


    <div class="d-flex justify-content-between align-items-center">
        <h1>Last Products</h1>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">

        @foreach ($products as $product)
            <div class="col">
                <div class="card h-100">
                    <div class="card h-100">
                        <img src="{{asset('storage/'.$product->image)}}" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">{{$product->description}}</p>
                            <div class="d-flex justify-content-between">
                                <span>Quantity:
                                    <span class="badge bg-success">{{$product->quantity}}</span>
                                </span>
                                <span>Price:
                                    <span class="badge bg-primary">{{$product->price}}</span>
                                </span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between my-2">
                                <span>Category:
                                    <span class="badge bg-success">{{$product->quantity}}</span>
                                </span>
                            </div>

                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{$product->created_at}}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>





@endsection


