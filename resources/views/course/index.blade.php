@extends('layout.index')

@section('content')
<div class="flex flex-col space-y-6 items-start">
    <span class="text-center text-3xl font-bold text-gray-800 w-full pb-12">DAFTAR MATERI TRAINING</span>
    <div class="flex flex-row items-center pb-6">
        <span class="pr-10">Topik</span>
        <span class="pr-2">:</span>
        <select name="topik-select" id="topik-select"
            class="block px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm sm:text-sm">
            <option value="semua">Semua Topik</option>
            @foreach($topik as $data)
            <option value="{{ $data->id }}">{{ $data->title }}</option>
            @endforeach
        </select>
    </div>
    <button class="px-6 py-2 text-white bg-gray-800 font-medium rounded-md shadow-md hover:bg-gray-500"
        id="btnAddMateri">
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
                        Topik</th>
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
            <tbody id="table-body" class="bg-white">
                <!-- Data from AJAX -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Add Materi -->
<div id="addMateri" tabindex="-1" aria-hidden="true"
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
            <div class="p-4 md:p-5 space-y-4 mx-10">
                <div class="flex items-center mb-4">
                    <label for="coverCourse" class="w-1/3 text-gray-700">Cover</label>
                    <input type="file" id="coverCourse" name="coverCourse"
                        class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                </div>
                <div class="flex items-center mb-4">
                    <label for="titleCourse" class="w-1/3 text-gray-700">Judul Materi</label>
                    <input type="text" id="titleCourse" name="titleCourse"
                        class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary"
                        placeholder="Judul materi">
                </div>
                <div class="flex items-center mb-4">
                    <label for="descriptionCourse" class="w-1/3 text-gray-700">Deskripsi</label>
                    <textarea id="descriptionCourse" name="descriptionCourse"
                        class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary"
                        rows="4" placeholder="Deskripsi materi"></textarea>
                </div>
                <div class="flex items-center mb-4">
                    <label for="mentor" class="w-1/3 text-gray-700">Pengajar</label>
                    <input type="text" id="mentor" name="mentor"
                        class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary"
                        placeholder="Nama pengajar">
                </div>
                <div class="flex items-center mb-4">
                    <label for="student" class="w-1/3 text-gray-700">Jumlah Peserta</label>
                    <input type="number" id="student" name="student"
                        class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary"
                        placeholder="Jumlah peserta">
                </div>
                <div class="flex items-center mb-4">
                    <label for="divisi" class="w-1/3 text-gray-700">Topik</label>
                    <select id="topik" name="topik"
                        class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                        @foreach($topik as $data)
                        <option value="{{ $data->id }}">{{ $data->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div
                class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 gap-4">
                <button type="button"
                    class="text-white bg-gray-800 hover:bg-gray-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                    id="btnSubmitCourse">
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
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    function loadCourse(topik = 'semua') {
        $.ajax({
            url: '/course/getCourse',
            type: 'GET',
            data: {
                topik: topik
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
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-700 border-b border-gray-300">${item.topik}</td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-700 border-b border-gray-300 text-center">${item.description}</td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-700 border-b border-gray-300 text-center">${item.mentor}</td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-700 border-b border-gray-300 text-center">${item.student}</td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-700 border-b border-gray-300 text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <form action="/course/deleteCourse/${item.id}" method="POST" class="formDeleteCourse">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btnDeleteCourse px-6 py-2 text-white bg-gray-700 font-medium rounded-md shadow-md hover:bg-gray-500">Hapus</button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                        `);
                    });
                } else {
                    $('#table-body').append(`
                        <tr>
                            <td colspan="8" class="px-6 py-2 text-center text-gray-700">Tidak ada data.</td>
                        </tr>
                    `);
                }
            },
            error: function(xhr, status, error) {
                console.log('Terjadi kesalahan:', error);
            }
        });
    }

    loadCourse();

    $('#topik-select').on('change', function() {
        var topik = $(this).val();
        loadCourse(topik);
    });

    $('#btnAddMateri').on('click', function() {
        $('#addMateri').removeClass('hidden');
    });
    $('#btnDeteleTraining').on('click', function() {
        $('#deleteTraining').removeClass('hidden');
    });

    $('.closeModal').on('click', function() {
        $('#addMateri').addClass('hidden');
        $('#deleteTraining').addClass('hidden');
        $('#confirmationModalCourse').addClass('hidden');
    });

    $('#btnSubmitCourse').on('click', function() {
        var formData = new FormData();

        formData.append('_token', '{{ csrf_token() }}');
        formData.append('title', $('#titleCourse').val());
        formData.append('description', $('#descriptionCourse').val());
        formData.append('mentor', $('#mentor').val());
        formData.append('student', $('#student').val());
        formData.append('topik', $('#topik').val());

        var imagefile = $('#coverCourse')[0].files[0];
        formData.append('cover', imagefile);

        $.ajax({
            url: '/course/storeCourse',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: 'Course berhasil ditambahkan',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#addMateri').addClass('hidden');
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
});
</script>
@endpush