@extends('layouts.app')
@section('content')
    <section class=" p-4">
        <style>
            :root {
                --main-color: #4a76a8;
            }

            .bg-main-color {
                background-color: var(--main-color);
            }

            .text-main-color {
                color: var(--main-color);
            }

            .border-main-color {
                border-color: var(--main-color);
            }
        </style>

    <!-- <div class="container mx-auto my-5 p-5"> -->
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p- border-sm border-green-400">
                    <div class="image overflow-hidden">
                    @if(Auth::user()->image)
                        <img class="rounded-full" src="{{asset(auth()->user()->image)}}" width="150px">
                    @endif
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ auth()->user()->name }}</h1>
                    
                   
                </div>
                <!-- End of profile card -->
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">About</span>
                        
                    </div>
                    
                    <div class="text-gray-700">
                        <form action="{{ route('update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">First Name</div>
                                    <input type="text" name="firstName" class="form-control" placeholder="Enter First_Name" value="{{ auth()->user()->firstName }}">
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Last Name</div>
                                    <input type="text" name="lastName" class="form-control" placeholder="Enter last_Name" value="{{ auth()->user()->lastName }}">
                                </div>
                               
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Contact No.</div>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter phone number" value="{{ auth()->user()->phone }}">
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Email.</div>
                                    <div class="">
                                        <a class="text-blue-800">{{ auth()->user()->email }}</a>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">UserID</div>
                                    <div class="px-4 py-2">{{ auth()->user()->id }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Birthday</div>
                                    <input type="date" class="form-control" name="brithDate" id="brithDate" required value="{{ auth()->user()->brithDate }}">
                                    <!-- <div class="px-4 py-2">{{ auth()->user()->brithDate }}</div> -->
                                </div>
                            </div>
                            <div class="block grid grid-cols-2">
                                <input type="file" id="image" name="image" accept="image/png,image/jpeg">
                            </div>    
                            <div class="flex justify-end">
                                <button class="hover:bg-blue-200 text-blue-10 font-bold hover:text-white py-2 px-4 border border-blue-900  rounded" type="submit">
                                Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End of about section -->
                </div>
                <!-- End of profile tab -->
            </div>
        </div>
    </section>
@endsection