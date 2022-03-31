@extends('layouts.app')

@section('content')
<section class=" p-4">
    <div class="relative h-20">
        <div class="absolute top-0 right-0 ">
        
    <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <button class="btn btn-primary">
            <input type="file" name="file" class="custom-file-input" id="">
            <a class="hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500  rounded" >Import data</a>
        </button>

            <a class="hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500  rounded" href="{{ route('file-export') }}">Export data</a>
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
                    userName
                </th>
                <th scope="col" class="w-1/5 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    Title
                </th>
                <th scope="col" class="w-3/5 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    Description
                </th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody class="bg-white ">
            @foreach($post as $posts)
                <tr>
                    <td class="px-6 py-4  w-1/5">
                        <span>{{ $post->firstItem() + $loop->index }}</span>
                    </td>
                    <td class="px-6 py-4  w-1/5">
                    {{ $posts->user->name }}
                    </td>
                    <td class="px-6 py-4  w-1/5">
                        <span>{{ $posts->title }}</span>
                    </td>
                    <td class="px-6 py-4  w-3/5">
                        <span>{{ $posts->description }}</span>
                    </td>
                </tr>
            @endforeach

            <!-- More people... -->
        </tbody>
    </table>
    <div class="flex justify-end">
                {!! $post->links() !!}
    </div>
    
</section>

@endsection