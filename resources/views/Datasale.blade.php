@extends('layouts.app')

@section('title', 'Data Sales')


@section('contents')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Main content -->
    <section class="content">

      <form id="excel-csv-import-form" method="POST"  action="{{ url('Datasale/import/') }}" accept-charset="utf-8" enctype="multipart/form-data">
                
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

                <form action="Datasale/import" method="POST">
                    @csrf
                    <a type="button" href="Datasale/export/" style="margin-left:6px;color:white;" class="btn btn-warning">Export</a>
                    <button type="submit" class="btn btn-primary" >Import</button>
                    <div class="progress" style="text-align: center;height:20px;">
                        <div class="bar" style="text-align: center;height:20px;"></div >
                        <div class="percent" style="text-align: center; height:20px; padding-top:10px;margin:none;">0%</div >
                    </div>
                  </form>

            @livewire('datasale.index')

      </section>
      <!-- /.content -->
    
@endsection