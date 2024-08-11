@extends('layout.index')

@section('content')
<div class="flex flex-col space-y-6 items-start">
    <span class="text-center text-3xl font-bold text-gray-800 w-full pb-12">DAFTAR MATERI TRAINING</span>
    <div class="flex flex-col pb-4 gap-2">
        <div class="grid grid-cols-2 gap-6">
            <span>Topik Training</span>
            <span>: {{ $topik->title; }}</span>
        </div>
        <div class="grid grid-cols-2 gap-6">
            <span>Divisi</span>
            <span>: {{ $topik->divisi->name; }}</span>
        </div>
    </div>

    <button
        class="px-6 py-2 text-white bg-gray-800 font-medium rounded-md shadow-md hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-50"
        id="btnAddTraining">
        Tambah Materi
    </button>

    <div class="overflow-x-auto w-full">
        <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th
                        class="w-[5%] py-3 font-semibold text-center text-xs uppercase tracking-wider border-b border-gray-300">
                        No</th>
                    <th
                        class="py-3 font-semibold text-center text-xs uppercase tracking-wider border-b border-gray-300">
                        Cover</th>
                    <th
                        class="py-3 font-semibold text-center text-xs uppercase tracking-wider border-b border-gray-300">
                        Judul Materi</th>
                    <th
                        class="py-3 font-semibold text-center text-xs uppercase tracking-wider border-b border-gray-300">
                        Deskripsi</th>
                    <th
                        class="py-3 font-semibold text-center text-xs uppercase tracking-wider border-b border-gray-300">
                        Pengajar</th>
                    <th
                        class="py-3 font-semibold text-center text-xs uppercase tracking-wider border-b border-gray-300">
                        Jumlah Peserta</th>
                    <th
                        class="w-[20%] py-3 font-semibold text-center text-xs uppercase tracking-wider border-b border-gray-300">
                        Action</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($courses as $key => $data)
                <tr>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900 border-b border-gray-300">
                        {{ $key + 1}}
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900 border-b border-gray-300">
                        <div class="flex justify-center items-center h-full">
                            <img src="{{ $data->cover }}" width="100" height="100">
                        </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-700 border-b border-gray-300 text-center">
                        {{ $data->title }}
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-700 border-b border-gray-300 text-center">
                        {{ $data->description }}
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-700 border-b border-gray-300 text-center">
                        {{ $data->mentor }}
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-700 border-b border-gray-300 text-center">
                        {{ $data->student }}
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-700 border-b border-gray-300 text-center">
                        <a href="{{ route('training.topik', 1) }}" class="mr-4 px-6 py-2 hover:text-white bg-gray-300 text-gray-800 font-medium rounded-md
                        shadow-md hover:bg-gray-500 no-underline">
                            Detail
                        </a>
                        <button
                            class="px-6 py-2 text-white bg-gray-700 font-medium rounded-md shadow-md hover:bg-gray-500">
                            Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="addTraining" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 overflow-y-auto overflow-x-hidden flex justify-center items-center w-full h-full bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-2xl">
        <div class="relative bg-white rounded-lg shadow dark:bg-white">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900">Tambah Materi</h3>
                <button type="button"
                    class="closeModal text-gray-400 bg-transparent hover:bg-gray-900 hover:text-gray-200 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <!-- Isi Modal -->
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 gap-4">
                <button type="button"
                    class="text-white bg-gray-800 hover:bg-gray-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Simpan
                </button>
                <button type="button"
                    class="closeModal text-white bg-gray-400 hover:bg-gray-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#btnAddTraining').on('click', function() {
        $('#addTraining').removeClass('hidden');
    });

    $('.closeModal').on('click', function() {
        $('#addTraining').addClass('hidden');
    });
});
</script>
@endpush