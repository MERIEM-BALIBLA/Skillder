@extends('layout.navigation')
@section('content')
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

<main class="profile-page">
  <section class="relative block h-500-px">
    <div class=" w-full h-full bg-center bg-cover" style="
            background-image: url({{ asset('assets/images/home.jpg') }});
          ">
      <span id="blackOverlay" class="w-full h-full  opacity-50 bg-black"></span>
    </div>
    <div class=" bottom-0 left-0 right-0 w-full  pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
      <svg class=" bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
        <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
      </svg>
    </div>
  </section>
  <section class="relative py-16 bg-blueGray-200">
    <div class="container mx-auto px-4">
      <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
        <div class="px-6">
          <div class="flex flex-wrap justify-center">

      
            
            <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
              <div class="py-6 px-3 mt-32 sm:mt-0">
                <a href="/">
                  <button class="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                    Let's see what's new 
                  </button>
                </a>
              </div>
            </div>

            <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                <div class="py-6 px-3 mt-32 sm:mt-0">
                    <a href="{{ route('profile.edit', ['profile' => Auth::user()->id]) }}">
                        <button class="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                          <i class='fas fa-pen' style='font-size:24px'></i>
                        </button>
                    </a>
                </div>
            </div>
            
            <div class="w-full lg:w-4/12 px-4 lg:order-1">
              <div class="flex justify-center py-4 lg:pt-4 pt-8">
                <div class="mr-4 p-3 text-center">
                  <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">22</span><span class="text-sm text-blueGray-400">Skills</span>
                </div>
                <div class="mr-4 p-3 text-center">
                  <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">10</span><span class="text-sm text-blueGray-400">Post</span>
                </div>
                <div class="lg:mr-4 p-3 text-center">
                  <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">89</span><span class="text-sm text-blueGray-400">Followers</span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="flex">
            <div class="w-50 text-center mt-12">
              <div>
                <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                  {{ Auth::user()->name }} 
                </h3>
                {{-- <a href=""></a> --}}
              </div>
              
              <div class="mt-4 text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                {{-- <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i> --}}
                <h4>{{ Auth::user()->email }} </h4>
              </div>

              <div class="mt-2">
                <h3>Here's your skills</h3>
                
              </div>
              <div class="mt-2">
                @foreach ($yourSkills as $skill)
                <span class="text-sm font-medium bg-gray-100 py-1 px-2 rounded align-middle">
                    {{ $skill->skill }}
                    
                </span>
                @endforeach
              </div>
            </div>
            
        
        
    
        
            <div class="p-4 w-50 mt-10 py-10 border-l border-blueGray-200 text-center">
              <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-9/12 px-4">
                  <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                    An artist of considerable range, Jenna the name taken by
                    Melbourne-raised, Brooklyn-based Nick Murphy writes,
                    performs and records all of his own music, giving it a
                    warm, intimate feel with a solid groove structure. An
                    artist of considerable range.
                  </p>
                  <a href="#pablo" class="font-normal text-pink-500">Show more</a>
                </div>
              </div>
             <form class="text-center" action="{{route('profile.store')}}" method="POST">
                  @csrf
                  <div class="relative z-0 w-full mb-5 group">
                    <select name="skill[]" multiple="multiple"
                    class="js-example-basic-multiple bg-blue-50 border border-blue-500 text-blue-900 placeholder-blue-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-blue-100 dark:border-blue-400 ">
                      @foreach ($skills as $skill)
                          <option value="{{ $skill->id }}">{{ $skill->skill }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mx-auto">
                      <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow">
                          <div class=" inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                          <span class="relative text-black group-hover:text-white">Add</span>
                      </button>
                  </div>
              </form>
            </div>
          </div>


      </div>
    </div>
    <footer class="relative bg-blueGray-200 pt-8 pb-6 mt-8">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap items-center md:justify-between justify-center">
      <div class="w-full md:w-6/12 px-4 mx-auto text-center">
        <div class="text-sm text-blueGray-500 font-semibold py-1">
          Made with <a class="text-blueGray-500 hover:text-gray-800" target="_blank">Notus JS</a> by <a target="_blank"> Job dating</a>.
        </div>
      </div>
    </div>
  </div>
</footer>
  </section>
</main>


<script>
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });
</script>
@endsection
