@extends('layouts.dashbord')
@section('content')
<style>
    .Expenses {
        background-color: rgb(160, 159, 159);
        color: white;
    }
    .Expenses:hover{
        color: rgb(0, 0, 0);
    }
</style>
<livewire:admin-expenses>
@endsection
