@extends('adminlte::page')
@section('plugins.Jquery', true)
@section('plugins.SweetAlert2', true)

@section('title', 'Dashboard')

@section('content_header')
    <h1>Data Guru</h1>
@stop

@section('content')
    <p>Halaman Guru</p>
    <a href="{{ route('guru.create') }}" class="btn btn-primary btn-sm">Tambah data</a>
    @if (session()->has('success'))
        <div id="pesan-success" data-status="success" data-message="{{ session()->get('success') }}"></div>
    @endif
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama Guru</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guru as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="{{ route('guru.edit', $item->id) }}">Edit</a>
                        <form action="{{ route('guru.destroy', $item->id) }}" class="d-inline" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm tombol_hapus" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('adminlte_js')
    <script>
        $(document).ready(function() {
            if (document.getElementById('pesan-success')) {
                Swal.fire(
                    'Data Guru',
                    `${$('#pesan-success').data('message')}`,
                    'success'
                )
            }
        })

        $('.tombol_hapus').click(function(event) {
            event.preventDefault()
            event.stopPropagation()

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $(this).parent().submit()
                }
            })
        })
    </script>
@stop
