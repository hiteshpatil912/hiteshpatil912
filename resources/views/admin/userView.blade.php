@extends('layouts.app')

@section('content')
<section class=" p-4">
    <div class="relative h-20">
        <div class="absolute top-0 right-0 ">
        <form action="{{ route('file_import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <button class="btn btn-primary">
            <input type="file" name="user_file" class="custom-file-input" id="">
            <a class="hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500  rounded" >Import data</a>
        </button>
            <a class="hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500  rounded" href="{{ route('file_export') }}">Export data</a>
                <button class=" hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500  rounded" type="submit">
                <a href="/dashboard">Back</a></button>
            </form>
        </div>
    </div>
    <table>
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="w-1/5 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase ">
                    Sr.No
                </th>
                <th scope="col" class="w-1/5 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    First Name
                </th>
                <th scope="col" class="w-1/5 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    Last Name
                </th>
                <th scope="col" class="w-3/5 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    Contact No
                </th>
                <th scope="col" class="w-3/5 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    Email
                </th>
                <th scope="col" class="w-3/5 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    Brithday
                </th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody class="bg-white ">
        @foreach($user as $users)
                <tr>
                    <td class="px-6 py-4  w-1/5">
                        <span>{{ $user->firstItem() + $loop->index }}</span>
                    </td>
                    <td class="px-6 py-4  w-1/5">
                    {{ $users->firstName }}
                    </td>
                    <td class="px-6 py-4  w-1/5">
                    {{ $users->lastName }}
                    </td>
                    <td class="px-6 py-4  w-1/5">
                    {{ $users->phone }}
                    </td>
                    <td class="px-6 py-4  w-1/5">
                    {{ $users->email }}
                    </td>
                    <td class="px-6 py-4  w-1/5">
                        <span>{{ $users->brithDate }}</span>
                    </td>
                </tr>
            @endforeach
            <!-- More people... -->
        </tbody>
    </table>
    <div class="flex justify-end">
                {!! $user->links() !!}
    </div>
    
</section>

@endsection