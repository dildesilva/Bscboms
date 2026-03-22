@extends('layouts.dashbord')
@section('content')
<style>
    .registerboat {

        color: rgba(221, 11, 11, 0.836);
    }
    .registerboat:hover{
        color: rgb(223, 120, 120);
    }
</style>

<div class="max-w mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold text-gray-700 mb-6">Boat Registration</h2>



        <livewire:registerboat/>




</div>
@endsection
