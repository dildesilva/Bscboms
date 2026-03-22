
@extends('layouts.dashbord')
@section('content')
<style>
    .createnew {
        background-color: rgb(160, 159, 159);
        color: white;
    }
    .createnew:hover{
        color: rgb(0, 0, 0);
    }
</style>

<livewire:admin-add-acount />

@endsection
