@extends('layouts.app')

@section('title', 'Data Member')
    

@section('contents')

    <!-- Main content -->
    <section class="content">


      <div class="btn btn-group " style="width:5px;">
        <button type="button" class="btn btn-primary">Import</button>
        {{-- <button wire:click="export" type="button" style="margin-left:6px;color:white;" class="btn btn-warning">Export</button> --}}
        <a href="Datamember/export"  type="button" style="margin-left:6px;color:white;" class="btn btn-warning">Export</a>
    </div>
    
            @livewire('datamember.datamember')

      </section>
      <!-- /.content -->
    
@endsection