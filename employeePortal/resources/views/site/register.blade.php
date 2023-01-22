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
    <livewire:customers.forms.create-form />
  </div>
</div>
@endsection
