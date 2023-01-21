<form wire:submit.prevent="store" method="POST">
    @csrf
    <div>
        <label for="name">Full Name</label><br>
        <input type="text" name="name" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="full name" wire:model="name" required>
    </div>
    @error('name') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <br>
    <div>
        <label for="email">Email</label><br>
        <input type="text" name="email" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="email" wire:model="email" required>
    </div>
    @error('email') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <br>
    <div>
        <label for="type">User Type</label><br>
        <select name="type" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" wire:model="type" required>
            <option value="" disabled selected>Select a employee type from here</option>
            <option value="Admin">Admin</option>
            <option value="Employee">Employee</option>
        </select> 
    </div>
    @error('type') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <br>
    <div>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="addpassword" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="password" wire:model="password" required>
    </div>
    @error('password') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <br>
    <div>
        <label for="cmpassword">Confirm Password</label><br>
        <input type="password" name="cmpassword" id="cmpassword" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="confirm password" required>
        <span id='passwordcheck'></span>
    </div>
    <br>
    <button wire:target="store" wire:loading.attr="disabled" type="submit" class="passwordvalid inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-25">Save</button>                        
</form>

@push('passwordvalidate')
    <script>
        $('#addpassword, #cmpassword').on('keyup', function () { 

        if ($('#addpassword').val() == $('#cmpassword').val()) {
            $('#passwordcheck').html('');
            $(".passwordvalid").attr('disabled', false);
        }
        else if($('#cmpassword').val() == ''){
            $('#passwordcheck').html('');
        }
        else { 
            $('#passwordcheck').html('Passwords Not Matching').css('color', 'red');
            $(".passwordvalid").attr('disabled', true);
        }
        if ($('#addpassword').val() == '' && $('#cmpassword').val() == '') {
            $('#passwordcheck').html('');
        }  
        });
    </script>
@endpush