@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Ubah Kelas</h1>
@stop

@section('content')
<p>Ubah kelas</p>

{{-- With label, invalid feedback disabled and form group class --}}
<form action="{{ route('kelas.update', $kelas->id) }}" method="post">
    @csrf
    @method('put')
    <div class="row">
        <x-adminlte-input name="nama" label="Nama" placeholder="Nama Kelas" fgroup-class="col-md-6" value="{{ $kelas->nama }}" />
        {{-- With prepend slot, label and data-placeholder config --}}
        <x-adminlte-select2 name="id_guru" label="Guru" label-class="text-lightblue" igroup-size="lg" data-placeholder="Select an option...">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="fas fa-user"></i>
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
@endsection