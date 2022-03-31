@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-6/12 p-4 rounded-lg bg-white">
        <h1>Admin Dashboard!</h1>
    </div>
</div>
<!-- <div class="flex justify-center">
    <button type="submit"  class="bg-indigo-100 text-indigo-800 text-xs font-semibold mr-20 px-5 py-5 p-2 rounded dark:bg-indigo-200 dark:text-indigo-900"><a  href="{{route('subscripbe')}}">subscription</a></button>
</div> -->

@empty(auth()->user()->subscripton_id)
<div class="flex justify-center">
    <button type="submit"  class="bg-indigo-100 text-indigo-800 text-xs font-semibold mr-20 px-5 py-5 p-2 rounded dark:bg-indigo-200 dark:text-indigo-900"><a  href="subscripbe">subscription</a></button>
</div>
@endempty
@if(auth()->user()->subscription_id)

@else
@endif

@if(session()->has('success'))
<div x-data="{show:true}" x-init="setTimeout(() => show = false , 4000)" x-show="show" class="fixed bg-blue-500 text-white py-2 px-4 rounded top-20 right-2 text-sm">
    <p>{{ session('success') }}</p>
</div>

@endif
@endsection


