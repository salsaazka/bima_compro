@extends('admin/index')

@section('title')
    Service
@endsection

@section('content')

    @if (Session::get('success'))
        <div class="alert alert-success w-100">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::get('successUp'))
        <div class="alert alert-primary w-100">
            {{ Session::get('successUp') }}
        </div>
    @endif

    @if (Session::get('delete'))
        <div class="alert alert-danger w-100">
            {{ Session::get('delete') }}
        </div>
    @endif

    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah
        </button>
        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Service</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('store.services') }}" enctype="multipart/form-data"
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
                                <h3>Service</h3>
                                <label for="exampleFormControlInput1" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control mb-3" id="exampleFormControlInput1"
                                    placeholder="Input Title">
                                <label for="exampleFormControlInput1" class="form-label">Description</label>
                                <textarea class="form-control" placeholder="Description" name="desc" id="floatingTextarea"></textarea>
                                <label for="exampleFormControlInput1" class="form-label">Image</label>
                                <input type="file" name="image" class="dropify mb-3" id="image" data-default-file=""
                                    required />
                            </div>
                            <button type="submit" class="btn btn-primary"></i> Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="wrapperTable table-responsive">
            <table id="userTable" class="tables" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 10%">Title</th>
                        <th style="width: 10%">Description</th>
                        <th style="width: 10%">Image</th>
                        <th style="width: 10%">Action</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($service as $key => $i)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $i['title'] }}</td>
                            <td>{{ $i['desc'] }}</td>
                            <td>{{ $i['image'] }}</td>
                            <td>
                                <div class="ml-auto">
                                    <button type="button" class="btn btn-outline-primary show-edit-modal"
                                        data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $i->id }}"
                                        data-title="{{ $i->title }}" data-desc="{{ $i->desc }}" data-image="{{ $i->image }}">Edit</button>

                                    <a class="btn btn-outline-danger deleteee"
                                        href="{{ route('delete.services', ['id' => $i['id']]) }}">Hapus</a>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        {{-- Modal --}}
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{!! url('dashboard/service/update') !!}" method="post">
                            <input type="hidden" id="service-id" name="id">
                            @csrf
                            <label for="misi">Title</label>
                            <div class="form-floating mb-3">
                                <input type="text" name="title" placeholder="Input Title">
                            </div>
                            <label for="misi">Description</label>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Desc" id="descEdit" style="height: 100px" name="desc"></textarea>
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

        <!-- Modal Edit -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit News</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="edit">

                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Edit -->

    </div>

@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('.dropify').dropify();

        $(document).ready(function() {
            $('#userTable').DataTable({
                "info": false,
                "bSort": false,
            });
        });

        $('.show-edit-modal').each(function() {
            $(this).click(function() {
                $('#titleEdit').val($(this).data('title'));
                $('#descEdit').val($(this).data('desc'));
                $('#imageEdit').val($(this).data('image'));
                $('#service-id').val($(this).data('id'));
            });
        });

        $('#editModal').on('shown.bs.modal', function(e) {
            $user_id = $(e.relatedTarget).data('user_id');
            var html = `

                <form  method="post" action="/dashboard/service/update/${$(e.relatedTarget).data('id')}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    aria-describedby="emailHelp" placeholder="..." value="${$(e.relatedTarget).data('title')}">
                    </div>
                    <div class="mb-3">
                                <label for="desc" class="form-label">Description</label>
                                <input type="text" class="form-control" id="desc" name="desc"
                                    aria-describedby="emailHelp" placeholder="..." value="${$(e.relatedTarget).data('desc')}">
                    </div>
                    <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" class="dropify" id="image" data-default-file="/public/assets/img/data/${$(e.relatedTarget).data('image')}" />
                                <input type="hidden" name="old_image" value="/public/assets/img/data/${$(e.relatedTarget).data('image')}">
                                <p class="text-danger mt-1" style="font-size: 14px">(Max Size 2MB)</p>
                    </div>
                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-primary" type="submit" value="Validate!">
                            Save
                        </button>
                    </div>

                </form>
                `;


            $('#edit').html(html);
            $('.dropify').dropify();
        });

        $('.deleteee').click(function() {
            swal({
                    title: "Yakin?",
                    text: "Tekan ok untuk hapus, cancel untuk batal!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "dashboard/service/delete/"
                        swal("Data Berhasil Dihapus", {
                            icon: "success",
                        });
                    } else {
                        swal("Data Batal Dihapus");
                    }
                });
        })
    </script>
@endsection
