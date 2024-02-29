

@extends('layout.nav')
@section('content')
    <div class="p-4">
    <section class="py-1 bg-blueGray-50">
        <div class="w-full xl:w-8/10 mb-12 xl:mb-0 px-4 mx-auto">
          <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
              <div class="flex flex-wrap items-center">
        
                <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                    <form action="{{ route('annoucements.deleteAll') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" id="deleteAllAnnoucements" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Delete all</button>
                    </form>
                </div>

              </div>
            </div>
        
    <div class="block w-full overflow-x-auto">
        {{-- <table class="items-center bg-transparent w-full border-collapse"> --}}
            {{-- <thead>
                <tr> 
                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Annoucment</th >
                    
                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">User name</th>
                  
                </tr>
            </thead> --}}
            {{-- <tbody> --}}
            
            
            {{-- </tbody> --}}
        {{-- </table> --}}
    </div>   
    <div class="block w-full overflow-x-auto">
        <table class="items-center bg-transparent w-full border-collapse">
            <thead>
                <tr> <!-- Corrected from <th> to <tr> -->
                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Title of the annoucment</th >
                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Content</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($announcements as $annoucement)
                <tr> 
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">{{ $annoucement->title }}</td>
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                        @foreach($annoucement->users as $user)
                            <p>{{ $user->name }}</p>
                        @endforeach
                    </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>
    </div>   
    
@endsection
