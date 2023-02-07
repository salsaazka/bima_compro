@extends('admin/index')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah
                </button>
                <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Vision & Mission</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('store.client') }}" enctype="multipart/form-data" class="card py-4 px-4">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="mb-3">
                                        <h3>Vission & Mission</h3>
                                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                                        <input type="text" name="tile" class="form-control mb-3" id="exampleFormControlInput1" placeholder="Input Title">
                                        <label for="exampleFormControlInput1" class="form-label">Description</label>
                                        <input type="text" name="desc" class="form-control mb-3" id="exampleFormControlInput1" placeholder="Input Description">
                                    </div>
                                    <button type="submit" class="btn btn-primary"></i> Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div class="wrapperTable table-responsive">
                    <table id="userTable" class="tables" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 10%">No</th>
                                <th style="width: 30%">Tile</th>
                                <th style="width: 30%">Description</th>
                                <th style="width: 30%">Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($visionMission as $key => $vismis)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $vismis['title'] }}</td>
                                <td>{{ $vismis['description'] }}</td>
                                <td>
                                    <div class="ml-auto">
                                        <form action="{{ route('update.VisMiss', $vismis->id) }}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <button type="submit" class="fa-sharp fa-solid fa-arrow-rotate-left" style="border: none; background:none;"></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
                "info": false,
                "bSort": false,
            });
        });
    </script>
@endsection
