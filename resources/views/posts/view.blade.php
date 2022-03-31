@extends('layouts.app')
@section('content')
<section class=" p-4">
    <div class="relative h-20">
        <div class="absolute top-0 right-0 ">
            <button class=" hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 rounded" type="submit">
                <a href="/post">Add Post</a></button>
                <button class=" hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500  rounded" type="submit">
                <a href="/dashboard">Back</a></button>
        </div>
    </div>
    <table>
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="w-1/5 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase ">
                    Sr.No
                </th>
                <th scope="col" class="w-1/5 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    title
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
