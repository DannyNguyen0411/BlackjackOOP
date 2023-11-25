@extends('layouts.layoutpublic')

@section('content')

{{--    title--}}
    <h1 class="text-center text-xl md:text-4xl px-6 py-12 bg-white">Error</h1>
{{--    /title--}}
    <div class="w-full px-6 py-12 bg-gray-100 border-blue-100 border-1">
        <div class="container max-w-4xl mx-auto flex justify-center flex-wrap md:flex-no-wrap">
            <div class="w-full md:w-1-3">
{{--                body--}}
                <div class="card body">
                    <div class="bg-red-400 text-red-800 rounded-lg shadow-md p-6 pr-10 mb-8" style="">{{ $exception->getMessage() }}</div>
                </div>
            </div>
        </div>
    </div>
{{--    end body--}}

@endsection
