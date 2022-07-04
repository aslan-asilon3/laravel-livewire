<div>
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
            {{-- @if($updateDatamemberraw)
                @include('livewire.datamemberraw.update')
            @else
                @include('livewire.datamemberraw.create')
            @endif --}}
        
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Member</th>
                                <th>No HP</th>
                                <th>Status Cek Data</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($datamemberraws) > 0)
                                @foreach ($datamemberraws as $datamemberraw)
                                    <tr>
                                        <td>
                                            {{$datamemberraw->id_member}}
                                        </td>
                                        <td>
                                            {{$datamemberraw->no_hp}}
                                        </td>
                                        <td>
                                            {{$datamemberraw->status_cek_data}}
                                        </td>
                                        <td>
                                            <button wire:click="edit({{$datamemberraw->id}})" class="btn btn-primary btn-sm">Edit</button>
                                            <button onclick="deleteCategory({{$datamemberraw->id}})" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" align="center">
                                        No datamemberraw Found.
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
        function deleteDatamember(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deleteDatamember',id);
        }
    </script>
</div>