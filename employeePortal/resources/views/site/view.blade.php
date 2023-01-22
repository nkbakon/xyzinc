@extends('layouts.sitelayout')
@section('bodycontent')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <livewire:products.product-view :product=$product />             
        </div>        
    </div>
</div>
@endsection