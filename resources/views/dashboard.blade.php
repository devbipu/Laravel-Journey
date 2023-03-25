<x-app-layout>
<x-slot name="header">
<div class="flex justify-between">
    <div>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
        </h2>
    </div>
    <div>
        <div class="group inline-block relative">
            <button class="outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center relative">
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">{{ count(auth()->user()->notifications) }}</div>
                <span>
                    <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                        transition duration-150 ease-in-out"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                </span>
            </button>
            <ul class="bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute
                transition duration-150 ease-in-out origin-top w-60 right-0">
                @foreach (auth()->user()->notifications as $notification)
                    <li class="rounded-sm px-3 py-2 hover:bg-gray-100 flex justify-between 
                    @if(!is_null($notification->read_at)) bg-gray-100 text-slate-400 @endif">
                        <span>
                            {{ $notification->data['message'] }} at {{ $notification->created_at }}
                        </span>
                        <a href="{{ route('markAsRead', $notification->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @role('editor')
                    {{ __("You're logged in as editor!") }}
                    @endrole
                    @role('author')
                    {{ __("You're logged in as author!") }}
                    @endrole
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>