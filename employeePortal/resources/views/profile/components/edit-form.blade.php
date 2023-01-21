<form method="POST" wire:submit.prevent="update">
    @method('patch')
    @csrf
    <div>
        <label for="name">Full Name</label><br>
        <input type="text" name="name" value="{{ $user->name }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="full name" wire:model="user.name" required>
    </div>
    @error('user.name') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <br>
    <div>
        <label for="email">Email</label><br>
        <input type="text" name="email" value="{{ $user->email }}" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="email" wire:model="user.email" required>
    </div>
    @error('user.email') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <br>                     
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Update Profile</button>                        
</form><br>