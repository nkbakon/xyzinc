@extends('layouts.sitelayout')
@section('bodycontent')
<h1 class="text-gray-500 text-center">Welcome To XYZ Inc</h1>
@if(Auth::guard('customers')->check())
  <p> Welcome, {{ Auth::guard('customers')->user()->name }} </p>
@endif
<div class="bg-white">
  <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
    <h2 class="sr-only">Products</h2>
    <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
      @foreach($products as $product)
      <a href="{{ route('site.show', $product) }}" class="group">
        <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
          <img src="{{ asset($product->img) }}" class="h-full w-full object-cover object-center group-hover:opacity-75">
        </div>
        <h3 class="mt-4 text-sm text-gray-700">{{ $product->name }}</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">${{ $product->price }}</p>
      </a>
      @endforeach
    </div>
  </div>
</div>
@endsection