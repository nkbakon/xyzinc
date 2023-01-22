@extends('layouts.guest')
@section('bodycontent')
<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="w-full max-w-md space-y-8">
    <div>
        <a href="{{ route('site.index') }}">
            <h1 class="text-center items-center justify-between w-full text-xl font-medium text-violet-600 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-violet-800 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">XYZ Inc.</h1>
        </a>
      <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Register Now</h2>
      <p class="mt-2 text-center text-sm text-gray-600">
        Or
        <a href="{{ route('sitelogin.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500">login to your account</a>
      </p>
    </div>
    <form class="mt-8 space-y-6" action="#" method="POST">
      <div class="-space-y-px rounded-md shadow-sm">
        <div>
          <label for="name" class="sr-only">Full Name</label>
          <input id="name" name="name" type="text" required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="full name">
        </div>
        <div>
          <label for="email" class="sr-only">Email Address</label>
          <input id="email" name="email" type="text" required class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="email address">
        </div>
        <div>
          <label for="password" class="sr-only">Password</label>
          <input id="addpassword" name="password" type="password" required class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="password">
        </div>
        <div>
          <label for="cmpassword" class="sr-only">Confirm Password</label>
          <input id="cmpassword" name="cmpassword" type="password" required class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="password">
          <span id='passwordcheck'></span>
        </div>
      </div>
      <div>
        <button type="submit" class="passwordvalid disabled:opacity-25 group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">          
          Register
        </button>
      </div>
    </form>
  </div>
</div>
@endsection

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