@extends('layouts.app')

@section('title', 'Data Akumulasi Poin')
    

@section('contents')

    <!-- Main content -->
    <section class="content">


      <div class="btn btn-group " style="width:5px;">
        <button type="button" class="btn btn-primary">Import</button>
        {{-- <button wire:click="export" type="button" style="margin-left:6px;color:white;" class="btn btn-warning">Export</button> --}}
        <a href=""  type="button" style="margin-left:6px;color:white;" class="btn btn-warning">Export</a>
    </div>
    
    <div class="col-md-8">
        <div class="card">



            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('error') }}
                </div>
            @endif
            {{-- @if($updateDataakumulasipoin)
                @include('livewire.dataakumulasipoin.update')
            @else
                @include('livewire.dataakumulasipoin.create')
            @endif --}}

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Member</th>
                                <th>No HP</th>
                                <th>Batch</th>
                                <th>Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($dataakumulasipoins) > 0)
                                @foreach ($dataakumulasipoins as $dataakumulasipoin)
                                    <tr>
                                        <td>
                                            {{$dataakumulasipoin->id_akumulasipoin}}
                                        </td>
                                        <td>
                                            {{$dataakumulasipoin->no_hp}}
                                        </td>
                                        <td>
                                            {{$dataakumulasipoin->batch}}
                                        </td>
                                        <td>
                                            {{$dataakumulasipoin->poin}}
                                        </td>
                                        <td>
                                            <button wire:click="edit({{$dataakumulasipoin->id}})" class="btn btn-primary btn-sm">Edit</button>
                                            <button onclick="deleteCategory({{$dataakumulasipoin->id}})" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" align="center">
                                        No dataakumulasipoin Found.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteDataakumulasipoin(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deleteDataakumulasipoin',id);
        }
    </script>


      </section>
      <!-- /.content -->
    
@endsection







