@extends('layouts.layoutpublic')

@section('content')

{{--    title--}}
    <h1 class="text-center text-xl md:text-4xl px-6 py-12 bg-white">Choose a Paddo</h1>
{{--    /title--}}

{{--    grid--}}
    <div class="w-full px-6 py-12 bg-gray-100 border-t">
        <div class="container max:w-4xl mx-auto pb-10 flex flex-wrap">

            @foreach($projects as $project)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-3 mb-4">
                    <a href="#">
                        <img src="https://pyxis.nymag.com/v1/imgs/987/088/7667c8518be9d86a3703854f34bcfa18ae-toad-.jpg" class="w-full h-auto rounded-lg" />
                    </a>

                    <h2 class="text-xl py-4">
                        <a href="#" class="text-black no-underline">{{ $project->name }}</a>
                    </h2>

                    <p class="text-xs leading-normal">{{ $project->description }}</p>
                </div>
            @endforeach

        </div>
        <div class="container max-w-4xl mx-auto pb-10 flex justify-between items-center px-3">
            <div class="text-xs">
                {{ $projects->links() }}
            </div>
        </div>
    </div>
{{--   /grid--}}
@endsection
