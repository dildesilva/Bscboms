
@extends('layouts.dashbord')
 @section('content')
<style>
    .admindashbord {
        background-color: rgb(160, 159, 159);
        color: white;
    }
    .admindashbord:hover{
        color: rgb(0, 0, 0);
    }
</style>


<livewire:admin-livedashbordcomponet />

@endsection
