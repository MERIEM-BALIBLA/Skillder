@extends('layout.navigation')
@section('content')

<div class="min-h-screen bg-white text-black flex flex-col items-center pt-16 sm:justify-center sm:pt-0">
        <div class="text-foreground font-semibold text-2xl tracking-tighter mx-auto flex items-center gap-2">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672Zm-7.518-.267A8.25 8.25 0 1 1 20.25 10.5M8.288 14.212A5.25 5.25 0 1 1 17.25 10.5" />
                </svg>
            </div>
            Ardiansyah Putra
        </div>
  
    <div class="relative mt-12 w-full max-w-lg sm:mt-10">
        <div class="relative -mb-px h-px w-full bg-gradient-to-r from-transparent via-sky-300 to-transparent"
            bis_skin_checked="1"></div>
        <div
            class="mx-5 border dark:border-b-white/50 dark:border-t-white/50 border-b-white/20 sm:border-t-white/20 shadow-[20px_0_20px_20px] shadow-slate-500/10 dark:shadow-white/20 rounded-lg border-white/20 border-l-white/20 border-r-white/20 sm:shadow-sm lg:rounded-xl lg:shadow-none">
            <div class="flex flex-col p-6">
                <h3 class="text-xl font-semibold leading-6 tracking-tighter">Login</h3>
                <p class="mt-1.5 text-sm font-medium">Welcome back, enter your credentials to continue.
                </p>
            </div>
            <div class="p-6 pt-0">
                <form action="{{ route('form.form') }}" method="GET">
                    <input type="hidden" name="annoucement_id" value="{{ $annoucement->id }}">
                
                            <button class="border-2 border-black font-semibold inline-flex items-center justify-center rounded-md text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white text-black h-10 px-4 py-2 w-60 p-4 text-lg rounded-full transition duration-300 hover:bg-gradient-to-r from-blue-600 to-green-600 hover:text-white hover:ring">Apply here</button>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
