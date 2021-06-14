@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Siswa</h1>
@stop

@section('content')
<p>Tambah Siswa</p>

{{-- With label, invalid feedback disabled and form group class --}}
<form action="{{ route('siswa.store') }}" method="post">
    @csrf
    @method('post')
    <div class="row">
        <x-adminlte-input name="nis" label="NIS" placeholder="Nomor Induk Siswa" fgroup-class="col-md-6" />
        <x-adminlte-input name="nama" label="Nama" placeholder="Nama Siswa" fgroup-class="col-md-6" />
        <x-adminlte-select2 name="id_kelas" label="Kelas" label-class="text-lightblue" igroup-size="lg" data-placeholder="Select an option...">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="fas fa-tag"></i>
                </div>
            </x-slot>
            <option />
            @foreach ($kelas as $item)
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </x-adminlte-select2>
    </div>
    <a href="{{ route('siswa.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save" />
</form>
@stop