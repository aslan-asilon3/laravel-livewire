@extends('layouts.app')

@section('title', 'Data Member Raw')

@section('contents')

    <!-- Main content -->
    <section class="content">

            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            {{-- <input type="file" name="file" class="form-control"> <br>
            {{-- <a type="button" href="Datamemberraw/import/" class="btn btn-primary">Import</a> --}}
            
            <form id="excel-csv-import-form" method="POST"  action="{{ url('Datamemberraw/import/') }}" accept-charset="utf-8" enctype="multipart/form-data">
                
                @csrf
                
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="file" name="file" placeholder="Choose file">
                        </div>
                        @error('file')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>              
                    
                    <div class="col-md-12" >

                    <form action="Datamemberraw/import" method="POST" enctype="multipart/form-data">
                        @csrf
                        <a type="button" href="Datamemberraw/export/" style="margin-left:6px;color:white;" class="btn btn-warning">Export</a>
                        <button type="submit" class="btn btn-primary" id="submit">Import</button>
                        
            </form>



      </section>
      <!-- /.content -->
    
@endsection