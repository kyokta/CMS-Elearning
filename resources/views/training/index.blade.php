@extends('layout.index')

@section('content')
<div class="flex flex-col space-y-6 items-start">
    <span class="text-center text-3xl font-bold text-gray-800 w-full pb-12">DAFTAR TOPIK TRAINING</span>
    <div class="flex flex-row items-center">
        <span class="pr-10">Divisi</span>
        <span class="pr-2">:</span>
        <select name="divisi" id="divisi-select"
            class="block px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
            <option value="semua" selected>Semua Divisi</option>
            <option value="1">Marketing</option>
            <option value="2">IT</option>
            <option value="3">Human Capital</option>
            <option value="4">Product</option>
            <option value="5">Redaksi</option>
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
            <tbody id="table-body" class="bg-white">
                <!-- Data from AJAX -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Add Training -->
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
                    class="closeModal text-gray-800 bg-gray-400 hover:bg-gray-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                    id="btnDeteleTraining">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete Training -->
<div id="deleteTraining" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="closeModal absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete
                    this product?</h3>
                <button data-modal-hide="popup-modal" type="button"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Yes, I'm sure
                </button>
                <button
                    class="closeModal py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                    cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi -->
<div id="confirmationModal" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 overflow-y-auto overflow-x-hidden flex justify-center items-center w-full h-full bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-sm">
        <div class="relative bg-white rounded-lg shadow dark:bg-white">
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900">Konfirmasi Hapus</h3>
                <button type="button"
                    class="closeModal text-gray-400 bg-transparent hover:bg-gray-900 hover:text-gray-200 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <div class="p-4">
                <p class="text-gray-700">Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat
                    dibatalkan.</p>
            </div>
            <div
                class="flex items-center justify-end p-4 border-t border-gray-200 rounded-b dark:border-gray-600 gap-4">
                <button id="confirmDeleteTraining"
                    class="text-white bg-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Hapus
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
    function loadTopik(divisi = 'semua') {
        $.ajax({
            url: '/training/getTopik',
            type: 'GET',
            data: {
                divisi: divisi
            },
            success: function(response) {
                $('#table-body').empty();

                if (response.data.length > 0) {
                    $.each(response.data, function(index, item) {
                        $('#table-body').append(`
                            <tr>
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900 border-b border-gray-300">${index + 1}</td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900 border-b border-gray-300">
                                    <div class="flex justify-center items-center h-full">
                                        <img src="${item.cover}" width="100" height="100" alt="Cover Image">
                                    </div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-700 border-b border-gray-300">${item.title}</td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-700 border-b border-gray-300 text-center">${item.divisi_name}</td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-700 border-b border-gray-300 text-center">${item.courses_count}</td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-700 border-b border-gray-300 text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <a href="/training/${item.id}" class="px-6 py-2 hover:text-white bg-gray-300 text-gray-800 font-medium rounded-md shadow-md hover:bg-gray-500 no-underline">Detail</a>
                                        <form action="/training/deleteTopik/${item.id}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" id="btnDeleteTraining" class="px-6 py-2 text-white bg-gray-700 font-medium rounded-md shadow-md hover:bg-gray-500">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        `);
                    });
                } else {
                    $('#table-body').append(`
                        <tr>
                            <td colspan="6" class="px-6 py-2 text-center text-gray-700">Tidak ada data.</td>
                        </tr>
                    `);
                }
            },
            error: function(xhr, status, error) {
                console.log('Terjadi kesalahan:', error);
            }
        });
    }

    loadTopik();

    $('#divisi-select').on('change', function() {
        var divisi = $(this).val();
        loadTopik(divisi);
    });

    $('#btnAddTraining').on('click', function() {
        $('#addTraining').removeClass('hidden');
    });
    $('#btnDeteleTraining').on('click', function() {
        $('#deleteTraining').removeClass('hidden');
    });

    $('.closeModal').on('click', function() {
        $('#addTraining').addClass('hidden');
        $('#deleteTraining').addClass('hidden');
        $('#confirmationModal').addClass('hidden');
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
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: 'Topik Training berhasil ditambahkan',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#addTraining').addClass('hidden');
                        location.reload();
                    }
                });
            },
            error: function(xhr, status, error) {
                var response = JSON.parse(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: response.message
                });
            }
        });
    });

    let formToSubmit = null;
    $('#btnDeleteTraining').on('click', function(e) {
        e.preventDefault();
        formToSubmit = $(this).closest('form');
        $('#confirmationModal').removeClass('hidden');
    });

    $('#confirmDeleteTraining').on('click', function() {
        if (formToSubmit) {
            formToSubmit.unbind('submit').submit();
        }
    });
});
</script>
@endpush