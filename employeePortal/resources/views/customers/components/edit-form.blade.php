<form method="POST" wire:submit.prevent="update">
    @method('PUT')
    @csrf
    <div>
        <label for="name">Full Name</label><br>
        <input type="text" name="name" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="full name" wire:model="customer.name" required>
    </div>
    @error('customer.name') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <br>
    <div>
        <label for="email">Email</label><br>
        <input type="text" name="email" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="email" wire:model="customer.email" required>
    </div>
    @error('customer.email') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <br>
    <div>
        <label for="status">Account Status</label><br>
        <select name="status" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" wire:model="customer.status" required>
            <option value="" disabled selected>Select a account stauts from here</option>
            <option value="Active">Active</option>
            <option value="Deactivate">Deactivate</option>
        </select> 
    </div>
    @error('customer.status') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <br>
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Update</button>                        
</form>