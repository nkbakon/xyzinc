<form class="mt-8 space-y-6" wire:submit.prevent="store" method="POST">
    @csrf
    <div class="-space-y-px rounded-md shadow-sm">
    <div>
        <label for="name" class="sr-only">Full Name</label>
        <input id="name" name="name" type="text" required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="full name" wire:model="name">
    </div>
    @error('name') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <div>
        <label for="email" class="sr-only">Email Address</label>
        <input id="email" name="email" type="text" required class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="email address" wire:model="email">
    </div>
    @error('email') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <div>
        <label for="password" class="sr-only">Password</label>
        <input id="addpassword" name="password" type="password" required class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="password" wire:model="password">
    </div>
    @error('password') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <div>
        <label for="cmpassword" class="sr-only">Confirm Password</label>
        <input id="cmpassword" name="cmpassword" type="password" required class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="confirm password">
        <span id='passwordcheck'></span>
    </div>
    </div>
    <div>
    <button wire:target="store" wire:loading.attr="disabled" type="submit" class="passwordvalid disabled:opacity-25 group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">          
        Register
    </button>
    </div>
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