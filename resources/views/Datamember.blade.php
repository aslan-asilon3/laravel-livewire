@extends('layouts.app')

@section('title', 'Data Member')
    

@section('contents')

    <!-- Main content -->
    <section class="content">


      <div class="btn btn-group " style="width:5px;">
        {{-- <button wire:click="export" type="button" style="margin-left:6px;color:white;" class="btn btn-warning">Export</button> --}}
        <button type="button" href="Datamember/export"  type="button" style="margin-left:6px;color:white;" class="btn btn-warning">Export</button>
      </div>
    
            @livewire('datamember.index')

      </section>
      <!-- /.content -->
    
@endsection