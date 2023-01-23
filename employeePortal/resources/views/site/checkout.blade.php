@extends('layouts.sitelayout')
@section('bodycontent')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Checkout</h3>
                </div>
                <div class="border-t border-gray-200">
                <br><br>                
                <div>
                    <label for="name">Receiver's Name</label><br>
                    <input type="text" name="name" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="name"  required> 
                </div><br>
                <div>
                    <label for="name">Contact Number</label><br>
                    <input type="text" name="contact" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="contact number" required> 
                </div><br>
                <div>
                    <label for="name">Address</label><br>
                    <input type="text" name="address1" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="address line 1" required><br>
                    <input type="text" name="address2" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="address line 2" > 
                </div><br>
                <div class="text-end">
                    <p class="inline-flex text-lg font-medium leading-6 text-gray-900">Total: $</p>&nbsp;&nbsp;&nbsp;
                    <a href="" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150" >Pay Now</a>
                </div>
            </div>             
        </div>        
    </div>
</div>

@endsection