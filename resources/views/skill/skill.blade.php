

@extends('layout.nav')
@section('content')
    <div class="p-4">
        <div class="text-center"><h1 class="mb-2">Add a new annoucment</h1></div>
     
        <form class="text-center" action="{{route('skill.store')}}" method="POST">
            @csrf
            <div class="relative z-0 w-full mb-5 group">
            <input class="px-4 py-2 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" type="text" name="skill" placeholder="Put your skill here"></div>

            <div class="mx-auto">
                <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow">
                    <div class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                    <span class="relative text-black group-hover:text-white">Add</span>
                </button>
            </div>
        </form>
    </div>

    <section class="py-1 bg-blueGray-50">
        <div class="w-full xl:w-8/10 mb-12 xl:mb-0 px-4 mx-auto">
          <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
              <div class="flex flex-wrap items-center">
        
                <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                    <form action="{{ route('skill.delete') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" id="deleteAllAnnoucements" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Delete all</button>
                    </form>
                </div>

              </div>
            </div>
        
    <div class="block w-full overflow-x-auto">
        <table class="items-center bg-transparent w-full border-collapse">
            <thead>
                <tr> <!-- Corrected from <th> to <tr> -->
                    {{-- <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">User name</th > --}}
                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Skills</th>
                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">date de creaction</th>
                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach($skills as $skill)
                <tr> 
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">{{$skill['skill']}}</td>
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">{{$skill['created_at']}}</td>
                    <td class="flex border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">

                        <a href="{{ route('skill.edit', ['skill' => $skill->id]) }}">
                            <button class="mr-4 group relative h-8 w-32 overflow-hidden rounded-lg text-white text-sm shadow">
                                <div class="absolute inset-0 w-2 bg-green-700 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                                <span class="relative text-black group-hover:text-white">Update</span>
                        </a>

                        <form method="POST" action="{{ route('skill.destroy', ['skill' => $skill->id])}}">
                            @csrf
                            @method('DELETE')
                            <button class="mr-4 group relative h-8 w-32 overflow-hidden rounded-lg text-white text-sm shadow">
                                <div class="absolute inset-0 w-2 bg-red-700 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                                <span class="relative text-black group-hover:text-white">Delete</span>
                        </form>     

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>   
@endsection
