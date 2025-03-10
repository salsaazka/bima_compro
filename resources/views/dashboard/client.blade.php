@extends('admin/index')

@section('title')
    Client
@endsection

@section('content')

    @if (Session::get('success'))
        <div class="alert alert-success w-100">
            {{ Session::get('success') }}
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
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Client</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('store.client') }}" enctype="multipart/form-data"
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
                                <h3>Client</h3>
                                <label for="exampleFormControlInput1" class="form-label ">Name</label>
                                <input type="text" name="name" class="form-control mb-3" id="exampleFormControlInput1"
                                    placeholder="Input Name">
                                    <label for="exampleFormControlInput1" class="form-label ">Image</label>
                                <input type="file" name="image" class="dropify mb-3" id="inputGroupFile02"
                                    data-default-file="" required />
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
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($clients as $key => $client)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $client['name'] }}</td>
                            <td>

                                <div class="ml-auto">
                                    <a class="btn btn-outline-danger deleteee"
                                        href="{{ route('delete.client', ['id' => $client['id']]) }}">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
                        window.location = "dashboard/client/delete/"
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
