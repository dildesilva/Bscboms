@extends('layouts.dashbord')
@section('content')
<style>
    .tripAdmin {
        background-color: rgb(160, 159, 159);
        color: white;
    }
    .tripAdmin:hover{
        color: rgb(0, 0, 0);
    }
</style>


<livewire:admin-create-trip-live />

@endsection
