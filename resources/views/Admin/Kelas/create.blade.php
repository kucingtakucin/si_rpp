@extends('adminlte::page')
@section('plugins.Select2', true)

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tambah Kelas</h1>
@stop

@section('content')
    <p>Tambah kelas</p>

    {{-- With label, invalid feedback disabled and form group class --}}
    {{-- /kelas/store --}}
    <form action="{{ route('kelas.store') }}" method="post">
        @csrf
        @method('post')
        <div class="row">
            <x-adminlte-input name="nama" label="Nama" placeholder="Nama Kelas" fgroup-class="col-md-6" />
            {{-- With prepend slot, label and data-placeholder config --}}
            <x-adminlte-select2 name="id_guru" label="Guru" label-class="text-lightblue" fgroup-class="col-md-6"
                igroup-size="lg" data-placeholder="Select an option...">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-car-side"></i>
                    </div>
                </x-slot>
                <option />
                @foreach ($guru as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </x-adminlte-select2>
        </div>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
        <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save" />
    </form>
@stop
