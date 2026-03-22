@extends('layouts.dashbord')

@section('content')

<style>
    .UserManagement {
        background-color: rgb(160, 159, 159);
        color: white;
    }
    .UserManagement:hover{
        color: rgb(0, 0, 0);
    }

</style>
<div class=" animate-fadeIn overflow-x-auto">
    <livewire:admin-user-managment />
</div>


@endsection

