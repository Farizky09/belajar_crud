@extends('layouts.master')

@section('main')
    <form action="{{ route('book.update', $data->id) }}" method="POST" onsubmit="return validateForm()">
        @csrf
        @method('PUT')
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between">
                        <h4>Edit Book</h4>
                        <a href="{{ route('book.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="id_category" class="form-label">id Kategori</label>
                                <input type="number" class="form-control" id="id_category" name="id_category"
                                    value="{{ $data->id_category }}">
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="{{ $data->date }}">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $data->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="value" class="form-label">Isi</label>
                                <textarea class="form-control" id="value" name="value" rows="3">{{ $data->value }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option selected>Pilih Status</option>
                                    <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $data->status == 2 ? 'selected' : '' }}>2</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

            @push('js')
                <script>
                    function validateForm() {
                        const idCategory = document.getElementById('id_category').value;
                        const date = document.getElementById('date').value;
                        const title = document.getElementById('title').value;
                        const value = document.getElementById('value').value;
                        const status = document.getElementById('status').value;
                        if (!idCategory || !date || !title || !value || !status) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Semua field harus diisi!'
                            });
                            return false;
                        }
                        return true;
                    }
                </script>
            @endpush
        @endsection
