@extends('layouts.dashbord')

@section('content')
<style>
    .Report {
        background-color: rgb(160, 159, 159);
        color: white;
    }
    .Report:hover{
        color: rgb(0, 0, 0);
    }
</style>
<livewire:admin-report>
@endsection
