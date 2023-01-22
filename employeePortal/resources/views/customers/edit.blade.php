@extends('layouts.app')
@section('bodycontent')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h5 class="font-bold text-center text-black">Edit Customers</h5><br>
                <livewire:customers.forms.edit-form :customer=$customer />                
            </div>
        </div>
    </div>
</div>
@endsection