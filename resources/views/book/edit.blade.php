@extends('layouts.master')

@section('main')
    <form action="{{ route('book.update', $data->id) }}" method="POST">
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
                                <input type="text" class="form-control" id="id_category" name="id_category"
                                    value="{{ $data->id_category }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="{{ $data->date }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $data->title }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="value" class="form-label">Isi</label>
                                <textarea class="form-control" id="value" name="value" rows="3" required>{{ $data->value }}</textarea>
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
        @endsection
