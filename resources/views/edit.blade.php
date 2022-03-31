@extends('layouts.app')
@section('content')
<section class=" p-4">
<form action="{{ route('update', auth()->user()->id) }}" method="POST">
    @csrf 
            <div class="mt-4">
                <div class="mt-4">
                    <label class="block" for="firstName">First Name<label>
                            <input id="firstName" type="text" placeholder="firstName" name="firstName" value="{{old('firstName')}}"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div class="mt-4">
                    <label class="block">Last Name<label>
                            <input id="lastName" type="lastName" placeholder="lastName" name="lastName" value="{{old('lastName')}}"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div class="mt-4">
                    <label class="block">Contact No<label>
                            <input id="phone" type="phone" placeholder="phone" name="phone" value="{{old('phone')}}"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div class="mt-4">
                    <label class="block">Brith Date<label>
                    <input type="date" class="form-control" name="brithDate" id="brithDate" required>
                </div>
                
                <div class="flex justify-end">
                    <button class="hover:bg-blue-200 text-blue-10 font-bold hover:text-white py-2 px-4 border border-blue-900  rounded" type="submit">
                        Update
                    </button>
                </div>
            </div>
        </form>
        </section>
@endsection