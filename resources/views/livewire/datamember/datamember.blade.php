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
            {{-- @if($updateDatamember)
                @include('livewire.datamember.update')
            @else
                @include('livewire.datamember.create')
            @endif --}}

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Member</th>
                                <th>No HP</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($datamembers) > 0)
                                @foreach ($datamembers as $datamember)
                                    <tr>
                                        <td>
                                            {{$datamember->id_member}}
                                        </td>
                                        <td>
                                            {{$datamember->no_hp}}
                                        </td>
                                        <td>
                                            <button wire:click="edit({{$datamember->id}})" class="btn btn-primary btn-sm">Edit</button>
                                            <button onclick="deleteCategory({{$datamember->id}})" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" align="center">
                                        No datamember Found.
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