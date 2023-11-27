@extends('layouts.layoutadmins')

@section('topmenu')
    <div class="card">
        <div class="nav-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('projects.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Categorie</a>
                            <a href="{{ route('projects.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounder-md text-sm font-medium">Categorie Toevoegen</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card mt-6">
        {{--        header--}}
        <div class="card-header flex flex-row justify-between">
            <h1 class="h6">Projects Admin</h1>
        </div>
        {{--        end header--}}

        {{--        content--}}
        <div class="py-4 px-6">
            <h2 class="text-lg font-semibold text-gray-600">Projects Details</h2>
            <p class="py-2 text-lg text-gray-700"><b>ID of the user:</b> {{ $project->id}}</p>
            <p class="py-2 text-lg text-gray-700"><b>Name:</b> {{ $project->name}}</p>
            <p class="py-2 text-lg text-gray-700"><b>Description:</b> {{ $project->description}}</p>
            <p class="py-2 text-lg text-gray-700"><b>Date Created:</b> {{ $project->created_at}}</p>
        </div>
        {{--        end content--}}
        @endsection

    </div>
