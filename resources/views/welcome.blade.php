
    @extends('layout.navigation')
    @section('content')
    <style>
        .companies{
            display:flex;
            justify-content:center;
        }
    </style>

    @if(!auth()->check())

    <div class="bg-cover" style="background-image: url('{{ asset('assets/images/background.jpg') }}');
    background-size: cover;
    background-position:center;
    height: 40%;">
        <div class="">
            <div class="bg-black opacity-60  p-4">
                <div class="text-center ">
                    <h1 class="text-white mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white"> <span>Find your</span> next tech job.</h1>
                    <p class="mb-6 text-lg font-normal text-white lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">The Leading Job Fair Connecting Employers and Job Seekers with Disabilities</p>
                    <p class="mb-6 text-lg font-normal text-white lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Face-to-Face Video / Text / Captioning / Sign Language</p>
                </div>
                <div class="flex justify-center">
                    <a href="{{ route('register') }}">
                        <button class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 mr-2 mb-2 w-30">
                            <img src="https://icons8.com/icon/9542/user-groupsthfgv" alt="">
                            <p>Employer Sign up</p></button>
                    </a>
                    <a href="{{ route('login') }}">
                        <button class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 mr-2 mb-2 w-30">Job Seeker Enter Here</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

        @else
        <div class="bg-cover" style="background-image: url('{{ asset('assets/images/home.jpg') }}');
    background-size: cover;
    background-position:center;
    height: 50%;">
        <div class="">
            <div class="bg-black opacity-40 p-4">
                <div class="text-center ">
                    <h1 class="text-white mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Hey {{ Auth::user()->name }} <span>Find your</span> next tech job.</h1>
                    <p class="mb-6 text-lg font-normal text-white lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">The Leading Job Fair Connecting Employers and Job Seekers with Disabilities</p>
                    <p class="mb-6 text-lg font-normal text-white lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Face-to-Face Video / Text / Captioning / Sign Language</p>
                </div>
                
            </div>
        </div>
    </div>

    @endif

    <div class="companies p-4 mx-auto ">
        <!-- Votre contenu ici -->
    
        
        <div class="w-68 bg-gray-50 px-4 mx-auto ">
            
            <div class="flex flex-wrap justify-center">
            @foreach($companies as $company)
                <div class="max-w-xl m-4">
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-green-600 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
                    <div class="relative px-7 py-6 bg-white ring-1 ring-gray-900/5 rounded-lg leading-none flex items-top justify-start space-x-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 6.75C6.75 5.64543 7.64543 4.75 8.75 4.75H15.25C16.3546 4.75 17.25 5.64543 17.25 6.75V19.25L12 14.75L6.75 19.25V6.75Z"></path>
                    </svg>
                    <div class="space-y-2">
                        <p class="text-slate-800">{{$company['company_name']}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$company['company_role']}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$company['address']}}</p>
                        <a href="https://braydoncoyer.dev/blog/tailwind-gradients-how-to-make-a-glowing-gradient-background" class="block text-indigo-400 group-hover:text-slate-800 transition duration-200" target="_blank">Read Article →</a>
                    </div>
                    </div>
                </div>
                </div>
            {{-- </div> --}}
            @endforeach
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="p-4">
            @if(auth()->check())
                <div class="text-center bg-blue-500 p-4 text-white">
                    <h3>{{ Auth::user()->name }} About the new companies</h3>
                </div>
            @else
                <div class="text-center p-4 text-black">
                    <h3 class="text-3xl" style="font-family: 'Roboto Mono', monospace;">Let's Found Your Dream Job With JobDating</h3>
                </div>
            @endif
        </div>
    </div>
    <div class="flex flex-wrap justify-center p-4 bg-grey-400">
        @foreach($annoucements as $annoucement)
        <div class="mr-4 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="rounded-t-lg" src="{{URL::asset('assets/images/annoucement.jpg')}}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$annoucement['title']}}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$annoucement['content']}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$annoucement['company_name']}}</p>
                @foreach($annoucement->skills as $skill)
                <div class="inline-flex items-center bg-blue-500 text-white rounded-full mr-2 mb-2">
                    <p class="px-2 py-1">{{ $skill->skill }}</p>
                </div>
                @endforeach
                <a href="{{ route('form', ['annoucment' => $annoucement->id]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Apply now
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</body>
    @endsection


