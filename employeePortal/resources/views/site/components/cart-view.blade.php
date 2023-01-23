<div class="border-t border-gray-200">
@if($carts)
    @foreach($carts as $cart)
    <dl>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Product Name</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $cart->product->name }}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Quantity</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $cart->stock }}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">Price</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">${{ $cart->price }}</dd>
        </div>
    </dl>
    @endforeach
</div>

<div class="text-end">
    <p class="inline-flex text-lg font-medium leading-6 text-gray-900">Total: ${{ $total }}</p>&nbsp;&nbsp;&nbsp;
    <a href="{{ route('cart.create') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150" >checkout</a>
</div>
@else
    <p>No items in the cart.</p>
@endif