@extends('layouts.master')

@section('main')
    <form action="{{ route('book.store') }}" method="POST">
        @csrf
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between">
                        <h4>Add Book</h4>
                        <a href="{{ route('book.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="id_category" class="form-label">id Kategori</label>
                                <input type="text" class="form-control" id="id_category" name="id_category" required>
                                @error('id_category')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                                @error('date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="value" class="form-label">Isi</label>
                                <textarea class="form-control" id="value" name="value" rows="3" required></textarea>
                                @error('value')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option selected disabled value="">Pilih Status</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
