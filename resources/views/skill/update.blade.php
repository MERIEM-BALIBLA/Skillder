
@extends('layout.nav')
@section('content')
    <a href="/annoucement">
        <button class="w-8">
            <img src="{{ URL::asset('assets/images/fleche.svg') }}" alt="">
        </button>
    </a>
    {{-- @if ($errors->any())
        <div class="alert alert-danger bg-red-200 text-red-800 p-4 mb-4">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif --}}
    <form class="text-center px-4" action="{{ route('skill.update', [ $skill->id]) }}" method="POST">
        <div><h1 class="ml-2 text-center p-4">Update the announcement here</h1></div>

        @csrf
        @method('PUT')
        <div class="relative z-0 w-full mb-5 group">
            <input class="px-4 py-2 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" type="text" name="skill" placeholder="skill" value="{{$skill['skill']}}">
        </div>

        <div class="mx-auto">
            <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow">
                <div class="absolute inset-0 w-3 bg-blue-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                <span class="relative text-black group-hover:text-white">Save changes</span>
            </button>
        </div>
        
    </form>
@endsection