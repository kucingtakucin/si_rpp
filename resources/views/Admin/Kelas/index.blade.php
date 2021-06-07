@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Kelas</h1>
@stop

@section('content')
    <p>Halaman kelas</p>

    <a href="{{ route('kelas.create') }}" class="btn btn-primary btn-sm">Tambah data</a>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Wali Kelas</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->guru->nama }}</td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="{{ route('kelas.edit', $item->id) }}">Edit</a>
                        <a class="btn btn-danger btn-sm" href="{{ route('kelas.destroy', $item->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop