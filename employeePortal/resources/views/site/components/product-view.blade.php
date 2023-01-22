<h1 class="text-gray-700 text-xl text-center">{{ $product->name }}</h1><br><br>
<ul>
    <li>Category: {{ $product->category }}</li>
    <li>Color: {{ $product->color }}</li>
    <li>Description: {{ $product->description }}</li>
</ul>
<div class="h-96 w-96 overflow-hidden rounded-lg">
    <img src="{{ asset($product->img) }}" class="h-96 w-96 object-cover object-center">
</div>
<h3 class="mt-4 text-sm text-gray-700">Available Stock : {{ $product->stock }}</h3>
<p class="mt-1 text-lg font-medium text-gray-900">${{ $product->price }}</p><br>
<div>
    <form wire:submit.prevent="store" method="POST">
        @csrf
        @error('quantity') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
        <input type="hidden" name="productid" value="{{ $product->id }}" wire:model="productid">
        <input type="hidden" name="stock" value="{{ $product->stock }}" wire:model="stock">
        <input type="hidden" name="price" value="{{ $product->price }}" wire:model="price">
        <input type="text" name="quantity" value="1" maxlength="2" class="inline-flex w-12 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" wire:model="quantity" required>&nbsp;&nbsp;
        @if($product->stock != 0)
        <button wire:target="store" wire:loading.attr="disabled" type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150" >Add To Cart&nbsp;<i class="fa-solid fa-cart-shopping"></i></button>
        @else
        <a href="" class="opacity-50 pointer-events-none inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150" >Out of stock</a>
        @endif
    </form>
</div>