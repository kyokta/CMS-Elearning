@extends('layout.index')

@section('content')
<div class="flex flex-col space-y-6 items-start">
    <span class="text-center text-3xl font-bold text-gray-800 w-full pb-12">DAFTAR TOPIK TRAINING</span>
    <div class="flex flex-row items-center">
        <span class="pr-10">Divisi</span>
        <span class="pr-2">:</span>
        <select name="divisi" id="divisi-select"
            class="block px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
            <option value="semua">Semua Divisi</option>
            <option value="marketing">Marketing</option>
            <option value="it">IT</option>
            <option value="human_capital">Human Capital</option>
            <option value="product">Product</option>
            <option value="redaksi">Redaksi</option>
        </select>
    </div>
    <button
        class="px-6 py-2 text-white bg-gray-800 font-medium rounded-md shadow-md hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-50"
        id="btnAddTraining">
        Tambah Topik
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
                        Nama Topik</th>
                    <th
                        class="py-3 font-semibold text-center text-xs uppercase tracking-wider border-b border-gray-300">
                        Divisi</th>
                    <th
                        class="py-3 font-semibold text-center text-xs uppercase tracking-wider border-b border-gray-300">
                        Jumlah Materi</th>
                    <th
                        class="w-[20%] py-3 font-semibold text-center text-xs uppercase tracking-wider border-b border-gray-300">
                        Action</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($topik as $key => $data)
                <tr>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900 border-b border-gray-300">
                        {{ $key + 1}}
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900 border-b border-gray-300">
                        <div class="flex justify-center items-center h-full">
                            <img src="{{ $data->cover }}" width="100" height="100">
                        </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-700 border-b border-gray-300">
                        {{ $data->title }}
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-700 border-b border-gray-300 text-center">
                        {{ $data->divisi->name }}
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-700 border-b border-gray-300 text-center">
                        {{ $data->courses_count }}
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-700 border-b border-gray-300 text-center">
                        <a href="{{ route('training.topik', $data->id) }}"
                            class="mr-4 px-6 py-2 hover:text-white bg-gray-300 text-gray-800 font-medium rounded-md shadow-md hover:bg-gray-500 no-underline">
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
                <h3 class="text-xl font-semibold text-gray-900">Tambah Training</h3>
                <button type="button"
                    class="closeModal text-gray-400 bg-transparent hover:bg-gray-900 hover:text-gray-200 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4 mx-10">
                <div class="flex items-center mb-4">
                    <label for="coverTraining" class="w-1/3 text-gray-700">Cover</label>
                    <input type="file" id="coverTraining" name="coverTraining"
                        class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                </div>
                <div class="flex items-center mb-4">
                    <label for="titleTraining" class="w-1/3 text-gray-700">Judul</label>
                    <input type="text" id="titleTraining" name="titleTraining"
                        class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                </div>
                <div class="flex items-center mb-4">
                    <label for="divisi" class="w-1/3 text-gray-700">Divisi</label>
                    <select id="divisi" name="divisi"
                        class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                        <option value=""></option>
                        @foreach($divisi as $div)
                        <option value="{{ $div->id }}">{{ $div->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div
                class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 gap-4">
                <button type="button"
                    class="text-white bg-gray-800 hover:bg-gray-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                    id="btnSubmitTraining">
                    Simpan
                </button>
                <button type="button"
                    class="closeModal text-gray-800 bg-gray-400 hover:bg-gray-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
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

    $('#btnSubmitTraining').on('click', function() {
        var formData = new FormData();

        formData.append('_token', '{{ csrf_token() }}');
        formData.append('title', $('#titleTraining').val());
        formData.append('divisi', $('#divisi').val());

        var imagefile = $('#coverTraining')[0].files[0];
        formData.append('image', imagefile);

        $.ajax({
            url: '/training/storeTopik',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                var response = JSON.parse(xhr.responseText);
                console.log(response.message)
            }
        });
    });

});
</script>
@endpush