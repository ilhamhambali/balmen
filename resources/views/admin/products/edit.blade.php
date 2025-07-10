@extends('layouts.admin')

@section('title', 'Edit Produk: ' . $product->name)

@section('content')
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.products._form')
    </form>
@endsection
