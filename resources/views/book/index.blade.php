@extends('layouts.master')

@section('main')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h4>Book List</h4>
                    <a href="{{ route('book.create') }}" class="btn btn-primary">Add Book</a>
                </div>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>id Kategori</th>
                            <th>Tanggal</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->id_category }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->date)->format('Y-m-d') }}</td>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->value }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <a href="{{ route('book.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <button onclick="btnDelete({{ $data->id }}, '{{ $data->title }}')"
                                        class="btn btn-sm btn-danger">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            function btnDelete(_id, title) {
                let url = '{{ route('book.destroy', ':id') }}'.replace(':id', _id);
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data Buku \"" + title + "\" akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Berhasil!',
                                    'Data Buku "' + title + '" berhasil dihapus.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            },
                            error: function(response) {
                                Swal.fire(
                                    'Gagal!',
                                    'Data Buku "' + title + '" gagal dihapus.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            }
        </script>
    @endpush
@endsection
