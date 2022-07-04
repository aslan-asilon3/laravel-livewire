<div>
    <div class="col-md-12">
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
            {{-- @if($updateDatasale)
                @include('livewire.datasale.update')
            @else
                @include('livewire.datasale.create')
            @endif --}}
        
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Member</th>
                                <th>Batch</th>
                                <th>No HP</th>
                                <th>Tanggal</th>
                                <th>Source</th>
                                <th>Recipient</th>
                                <th>Status member</th>
                                <th>Status cek is member</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;">
                            @if (count($datasales) > 0)
                                @foreach ($datasales as $datasale)
                                    <tr>
                                        <td>
                                            {{$datasale->id_member}}
                                        </td>
                                        <td>
                                            {{$datasale->batch}}
                                        </td>
                                        <td>
                                            {{$datasale->no_hp}}
                                        </td>
                                        <td>
                                            {{$datasale->tanggal}}
                                        </td>
                                        <td>
                                            {{$datasale->source}}
                                        </td>
                                        <td>
                                            {{$datasale->recipient}}
                                        </td>
                                        <td>
                                            @if($datasale->status_member == 1)
                                            <span class="badge text-bg-primary">Aktif</span>
                                            @else
                                            <span class="badge text-bg-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{$datasale->status_cek_is_member}}
                                        </td>
                                        <td>
                                            <button wire:click="edit({{$datasale->id}})" class="btn btn-primary btn-sm">Edit</button>
                                            <button onclick="deleteCategory({{$datasale->id}})" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" align="center">
                                        No datasale Found.
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