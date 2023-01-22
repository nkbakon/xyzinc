@extends('layouts.guest')
@section('bodycontent')
<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="w-full max-w-md space-y-8">
    <div>
      <a href="{{ route('site.index') }}">
        <h1 class="text-center items-center justify-between w-full text-xl font-medium text-violet-600 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-violet-800 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">XYZ Inc.</h1>
      </a>
      <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Log in to your account</h2>
      <p class="mt-2 text-center text-sm text-gray-600">
        Or
        <a href="{{ route('register.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500">register</a>
      </p>
    </div>
    @if (session('status'))
      <div class="text-black m-2 p-4 bg-green-200">
        {{ session('status') }}
      </div>
    @endif
    @if (session('delete'))
      <div class="text-black m-2 p-4 bg-red-200">
        {{ session('delete') }}
      </div>
    @endif
    <form class="mt-8 space-y-6" action="{{ route('sitelogin.login') }}" method="POST">
      @csrf
      <div class="-space-y-px rounded-md shadow-sm">
        <div>
          <label for="email" class="sr-only">Email address</label>
          <input id="email" name="email" type="text" required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Email address">
        </div>
        <div>
          <label for="password" class="sr-only">Password</label>
          <input id="password" name="password" type="password" required class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Password">
        </div>
      </div>
      <div>
        <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">          
          Log in
        </button>
      </div>
    </form>
  </div>
</div>
@endsection