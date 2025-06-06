@extends('layouts.app')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{-- {{ __('Dashboard') }} --}}
    </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                        <a href="{{ route('contracts.index') }}" class="btn btn-success mb-3">Liste des contrats</a>

                </div>
            </div>
        </div>
    </div>
@endsection
