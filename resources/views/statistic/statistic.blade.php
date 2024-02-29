@extends('layout.nav')
@section('content')
   
<section class="">
    <div class="flex flex-wrap justify-center">
        <div class="max-w-xl m-4">
            <div class="relative group">
                <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-green-600 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
                <div class="relative px-7 py-6 bg-white ring-1 ring-gray-900/5 rounded-lg leading-none flex items-top justify-start space-x-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 6.75C6.75 5.64543 7.64543 4.75 8.75 4.75H15.25C16.3546 4.75 17.25 5.64543 17.25 6.75V19.25L12 14.75L6.75 19.25V6.75Z"></path>
                    </svg>
                    <div class="space-y-2">
                        <p class="text-slate-800">Nombre total de sociétés : {{ $totalUsers }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-xl m-4">
            <div class="relative group">
                <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-green-600 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
                <div class="relative px-7 py-6 bg-white ring-1 ring-gray-900/5 rounded-lg leading-none flex items-top justify-start space-x-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 6.75C6.75 5.64543 7.64543 4.75 8.75 4.75H15.25C16.3546 4.75 17.25 5.64543 17.25 6.75V19.25L12 14.75L6.75 19.25V6.75Z"></path>
                    </svg>
                    <div class="space-y-2">
                        <p class="text-slate-800">Nombre total de sociétés : {{ $totalCompanies }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-xl m-4">
            <div class="relative group">
                <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-green-600 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
                <div class="relative px-7 py-6 bg-white ring-1 ring-gray-900/5 rounded-lg leading-none flex items-top justify-start space-x-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 6.75C6.75 5.64543 7.64543 4.75 8.75 4.75H15.25C16.3546 4.75 17.25 5.64543 17.25 6.75V19.25L12 14.75L6.75 19.25V6.75Z"></path>
                    </svg>
                    <div class="space-y-2">
                        <p class="text-slate-800">Nombre total des annonces : {{ $totalAnnouncements }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-xl m-4">
            <div class="relative group">
                <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-green-600 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
                <div class="relative px-7 py-6 bg-white ring-1 ring-gray-900/5 rounded-lg leading-none flex items-top justify-start space-x-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 6.75C6.75 5.64543 7.64543 4.75 8.75 4.75H15.25C16.3546 4.75 17.25 5.64543 17.25 6.75V19.25L12 14.75L6.75 19.25V6.75Z"></path>
                    </svg>
                    <div class="space-y-2">
                        <p class="text-slate-800">Nombre : {{ $announcmentApplly }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
          <div class="flex py-2 inline-block min-w-full sm:px-6 lg:px-8">

            <div class="relative w-50 shadow-md sm:rounded-lg mr-4">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">

                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                User name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Skills Total
                            </th>
                            
                        </tr>

                    </thead>
                    <tbody>
                        @foreach($usersWithMaxSkills as $user)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->num_skills }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="relative w-50 shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">

                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                User name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Skills Total
                            </th>
                            
                        </tr>

                    </thead>
                    <tbody>
                        @foreach($usersWithMaxAnnouncements as $user)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->num_announcements }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

          </div>
        </div>
      </div>

      @foreach ($companiesMaxAnnouncements as $company)
      <div>
          <h1>Nom de l'entreprise: {{ $company->company_name }}</h1>
          <h2>Nombre d'annonces: {{ $company->announcements_num }}</h2>
          {{-- <ul>
              @foreach ($company->announcements as $announcement)
                  <li>{{ $announcement->annoucment_title }}</li>
              @endforeach
          </ul> --}}
      </div>
  @endforeach
  
  
  



    </section>

@endsection
