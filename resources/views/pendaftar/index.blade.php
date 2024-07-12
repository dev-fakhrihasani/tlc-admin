@extends('layouts.main')
@section('content')

@if(session('success'))
<div id="flash-success" data-message="{{ session('success') }}"></div>
@endif

@if(session('error'))
<div id="flash-error" data-message="{{ session('error') }}"></div>
@endif

<h1>Pendaftar</h1>
<a href="{{ route('pendaftar.create') }}" class="btn btn-primary mt-3">Tambah data</a>
<div class="table-responsive my-5">
    <table class="table table-striped table-hover tabel-pendaftar">
        <thead>
            <tr>
                <th scope="col" style='width: 50px;'>No</th>
                <th scope="col" style='width: 200px;'>Action</th>
                <th scope="col" style='width: 200px;'>Nama</th>
                <th scope="col" style='width: 300px;'>Email</th>
                <th scope="col" style='width: 160px;'>Tempat Lahir</th>
                <th scope="col" style='width: 160px;'>Tgl Lahir</th>
                <th scope="col" style='width: 160px;'>No HP</th>
                <th scope="col" style='width: 200px;'>Jenjang Pendidikan</th>
                <th scope="col" style='width: 160px;'>Asal Sekolah</th>
                <th scope="col" style='width: 100px;'>Kelas</th>
                <th scope="col" style='width: 140px;'>Peminatan</th>
                <th scope="col" style='width: 200px;'>Alasan Join</th>
                <th scope="col" style='width: 200px;'>SS 1</th>
                <th scope="col" style='width: 200px;'>SS 2</th>
                <th scope="col" style='width: 200px;'>SS 3</th>
                <th scope="col" style='width: 200px;'>SS 4</th>

            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($pendaftars as $pendaftar)
            <tr>
                <th scope="row"> {{ $loop->iteration }} </th>
                <td>
                    <a href="{{ route('pendaftar.show', $pendaftar->id) }}" class="btn btn-info btn-sm">Show</a>
                    <a href="{{ route('pendaftar.edit', $pendaftar->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form id="delete-form-{{ $pendaftar->id }}" action="{{ route('pendaftar.destroy', $pendaftar->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button data-id="{{ $pendaftar->id }}" type="submit" class="btn btn-danger btn-sm btn-delete">Delete</button>
                    </form>
                </td>
                <td>{{ $pendaftar->nama }}</td>
                <td>{{ $pendaftar->email }}</td>
                <td>{{ $pendaftar->tempat_lahir }}</td>
                <td>{{ $pendaftar->tanggal_lahir }}</td>
                <td>{{ $pendaftar->no_hp }}</td>
                <td>{{ $pendaftar->jenjang_pendidikan }}</td>
                <td>{{ $pendaftar->asal_sekolah }}</td>
                <td>{{ $pendaftar->kelas }}</td>
                <td>{{ $pendaftar->peminatan }}</td>
                <td>{{ $pendaftar->alasan_join }}</td>
                <td> <img width="100px" src="{{ $pendaftar->ss1 }}" alt=""> </td>
                <td> <img width="100px" src="{{ $pendaftar->ss2 }}" alt=""> </td>
                <td> <img width="100px" src="{{ $pendaftar->ss3 }}" alt=""> </td>
                <td> <img width="100px" src="{{ $pendaftar->ss4 }}" alt=""> </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });

        const successElement = document.getElementById('flash-success');
        const errorElement = document.getElementById('flash-error');

        if (successElement) {
            Toast.fire({
                icon: 'success',
                title: successElement.getAttribute('data-message')
            });
        }

        if (errorElement) {
            Toast.fire({
                icon: 'error',
                title: errorElement.getAttribute('data-message')
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-delete');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const id = this.getAttribute('data-id');
                const form = document.getElementById(`delete-form-${id}`);

                if (form) {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                } else {
                    console.error('Form not found for id:', id);
                }
            });
        });
    });
</script>

@endsection