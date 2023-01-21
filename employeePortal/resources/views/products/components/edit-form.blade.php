<form wire:submit.prevent="update" method="POST">
    @method('PUT')
    @csrf    
    <div>
        <label for="name">Product Name</label><br>
        <input type="text" name="name" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="product name" wire:model="product.name" required> 
    </div>
    @error('product.name') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <br>
    <div>
        <label for="category">Select Product Category</label><br>
        <select name="category" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" wire:model="product.category" required>
            <option value="" disabled selected>Select a product category from here</option>
            <option value="Tents">Tents</option>
            <option value="Bottles">Bottles</option>            
            <option value="Backpacks">Backpacks</option>
            <option value="Grills">Grills</option>
        </select> 
    </div>
    @error('product.category') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <br>
    <div>
        <label for="color">Product Colors</label><br>
        <input type="text" name="color" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="color" wire:model="product.color" required> 
    </div>
    @error('product.color') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <br>
    <div>
        <label for="img">Product Image</label><br>
        <input type="file" name="img" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="image" wire:model="product.img" required>
    </div>
    @error('product.img') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <br>
    <div>
        <label for="stock">Product Stock</label><br>
        <input type="text" name="stock" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="starting product stock" wire:model="product.stock" required>
    </div>
    @error('product.stock') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <br>
    <div>
        <label for="price">Product Selling Price ($)</label><br>
        <input type="text" name="price" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="product selling price" wire:model="product.price" required>
    </div>
    @error('product.price') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <br>
    <div>
        <label for="description">Product Description</label><br>
        <input type="text" name="description" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="product description" wire:model="product.description">
    </div>
    @error('product.description') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <br>
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Update</button>                        
</form>