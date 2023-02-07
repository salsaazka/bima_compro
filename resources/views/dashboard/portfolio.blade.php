@extends('admin/index')

@section('content')

    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah
        </button>
        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Portfolio</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('store.portfolio') }}" enctype="multipart/form-data"
                            class="card py-4 px-4">
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
                                <h3>Portfolio</h3>
                                <label for="exampleFormControlInput1" class="form-label">Description</label>
                                <input type="text" name="desc" class="form-control mb-3" id="exampleFormControlInput1"
                                    placeholder="Input Address">
                                <input type="file" name="image" class="form-control mb-3" id="inputGroupFile02">
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
                        <th style="width: 5%">No</th>
                        <th style="width: 10%">Description</th>
                        <th style="width: 10%">Image</th>
                        <th style="width: 10%">Action</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($portfolio as $key => $i)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $i['desc'] }}</td>
                            <td>{{ $i['image'] }}</td>
                            <td>
                                <div class="ml-auto">
                                    <button type="button" class="btn btn-primary show-edit-modal" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" data-id="{{ $i->id }}"
                                            data-desc="{{ $i->desc }}" data-image="{{ $i->image }}">Edit</button>
                                
                                            redirec\
                                        </div>

                                <div class="ml-auto">
                                    x
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        {{-- Modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{!! url('dashboard/portfolio/update') !!}" method="post">
                            <input type="hidden" id="portfolio-id" name="id">
                            @csrf
                            <label for="misi">Desc</label>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Desc" id="descEdit" style="height: 100px"
                                    name="desc"></textarea>
                            </div>
                            <label for="visi">Image</label>
                            <div class="form-floating mb-3">
                                 <input type="file" name="image" class="form-control mb-3" id="imageEdit">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Modal --}}
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

        $('.show-edit-modal').each(function() {
            $(this).click(function() {
                $('#descEdit').val($(this).data('desc'));
                $('#imageEdit').val($(this).data('image'));
                $('#portfolio-id').val($(this).data('id'));
            });
        });
    </script>
@endsection
