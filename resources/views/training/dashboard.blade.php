@extends('layout.index')

@section('content')
<div class="flex flex-col gap-10">
    <div class="flex flex-col bg-gray-800 text-gray-300 text-center py-10 gap-6 rounded-lg">
        <span class="font-bold text-4xl">90</span>
        <span class="font-bold text-lg">Total Topik Training</span>
    </div>
    <div class="grid grid-cols-3 gap-10">
        <div class="flex flex-col bg-gray-300 text-gray-800 text-center py-8 px-10 gap-4 rounded-lg">
            <span class="font-bold text-3xl">15</span>
            <span class="font-bold text-lg">Marketing</span>
        </div>
        <div class="flex flex-col bg-gray-300 text-gray-800 text-center py-8 px-10 gap-4 rounded-lg">
            <span class="font-bold text-3xl">20</span>
            <span class="font-bold text-lg">IT</span>
        </div>
        <div class="flex flex-col bg-gray-300 text-gray-800 text-center py-8 px-10 gap-4 rounded-lg">
            <span class="font-bold text-3xl">15</span>
            <span class="font-bold text-lg">Human Capital</span>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-10">
        <div class="flex flex-col bg-gray-300 text-gray-800 text-center py-8 px-10 gap-4 rounded-lg">
            <span class="font-bold text-3xl">20</span>
            <span class="font-bold text-lg">Product</span>
        </div>
        <div class="flex flex-col bg-gray-300 text-gray-800 text-center py-8 px-10 gap-4 rounded-lg">
            <span class="font-bold text-3xl">20</span>
            <span class="font-bold text-lg">Redaksi</span>
        </div>
    </div>
</div>
@endsection