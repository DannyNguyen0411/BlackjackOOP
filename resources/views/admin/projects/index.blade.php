@extends('layouts.layoutadmins')

@section('topmenu')
    <nav class="card">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="sm:block sm:ml-6">
                    <div class="flex space-x-4">

                        <a href="{{ route('projects.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Projects</a>
                        <a href="" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Projects Toevoegen</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <div class="card mt-6">
        {{--        header--}}
        <div class="card-header flex flex-row justify-between">
            <h1 class="h6">Projects Admin</h1>
        </div>
        {{--        end header--}}
        @if(session('status'))
            <div class="card-body">
                <div class="bg-green-400 text-green-800 rounded-lg shadow-md p-6 pr-10 mb-8" style="">{{ session('status') }}</div>
            </div>
        @endif
        @if(session('status-wrong'))
            <div class="card-body">
                <div class="bg-red-400 text-red-800 rounded-lg shadow-md p-6 pr-10 mb-8" style="">{{ session('status-wrong') }}</div>
            </div>
        @endif
        {{--    body--}}
        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                        <th class="px-4 py-3">id</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Details</th>
                        <th class="px-4 py-3">Edit</th>
                        <th class="px-4 py-3">Delete</th>
                        <<th class="px-4 py-3">Description</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach($projects as $project)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">{{ $project->id }}</td>
                            <td class="px-4 py-3 text-sm">{{ $project->name }}</td>
                            <td class="px-4 py-3 text-sm"><a href="">Details</a></td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href=""><button class="flex items-center
                                justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none
                                focus:shadow-outline-gray" aria-label="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z"/></svg></button></a>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="">
                                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600
                                rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                            <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                 width="24" height="24" viewBox="0 0 408.483 408.483">
                                                <g>
                                                    <g>
                                                        <path d="M87.748,388.784c0.461,11.01,9.521,19.699,20.539,19.699h191.911c11.018,0,20.078-8.689,20.539-19.699l13.705-289.316
                                                    H74.043L87.748,388.784z M247.655,171.329c0-4.61,3.738-8.349,8.35-8.349h13.355c4.609,0,8.35,3.738,8.35,8.349v165.293
                                                    c0,4.611-3.738,8.349-8.35,8.349h-13.355c-4.61,0-8.35-3.736-8.35-8.349V171.329z M189.216,171.329
                                                    c0-4.61,3.738-8.349,8.349-8.349h13.355c4.609,0,8.349,3.738,8.349,8.349v165.293c0,4.611-3.737,8.349-8.349,8.349h-13.355
                                                    c-4.61,0-8.349-3.736-8.349-8.349V171.329L189.216,171.329z M130.775,171.329c0-4.61,3.738-8.349,8.349-8.349h13.356
                                                    c4.61,0,8.349,3.738,8.349,8.349v165.293c0,4.611-3.738,8.349-8.349,8.349h-13.356c-4.61,0-8.349-3.736-8.349-8.349V171.329z"/>
                                                        <path d="M343.567,21.043h-88.535V4.305c0-2.377-1.927-4.305-4.305-4.305h-92.971c-2.377,0-4.304,1.928-4.304,4.305v16.737H64.916
                                                    c-7.125,0-12.9,5.776-12.9,12.901V74.47h304.451V33.944C356.467,26.819,350.692,21.043,343.567,21.043z"/>
                                                    </g>
                                                </g>
                                            </svg></button></a>
                                    <td class="px-4 py-3 text-sm">{{ $project->description }}</td>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{--    end body--}}
        </div>



@endsection
