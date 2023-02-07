@extends('admin.index')

@section('title')
    Contact Us
@endsection

@section('content')

    {{-- <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah
        </button>
        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Contact</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('store.contact') }}" enctype="multipart/form-data"
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
                                <h3>Contact Us</h3>
                                <label for="exampleFormControlInput1" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control mb-3" id="exampleFormControlInput1"
                                    placeholder="Input Address">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control mb-3" id="exampleFormControlInput1"
                                    placeholder="Input Email">
                                <label for="exampleFormControlInput1" class="form-label">No Telphone</label>
                                <input type="text" name="no_telp" class="form-control mb-3" id="exampleFormControlInput1"
                                    placeholder="Input No Telphone">
                                <label for="exampleFormControlInput1" class="form-label">Web</label>
                                <input type="text" name="web" class="form-control mb-3" id="exampleFormControlInput1"
                                    placeholder="Input Email">

                            </div>
                            <button type="submit" class="btn btn-primary"></i> Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="">
        <div class="wrapperTable table-responsive">
            <table id="userTable" class="tables" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 10%">Address</th>
                        <th style="width: 10%">Email</th>
                        <th style="width: 10%">No Telphone</th>
                        <th style="width: 10%">Web</th>
                        <th style="width: 10%">Action</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($contactUs as $key => $contact)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $contact['address'] }}</td>
                            <td>{{ $contact['email'] }}</td>
                            <td>{{ $contact['no_telp'] }}</td>
                            <td>{{ $contact['web'] }}</td>
                            <td>
                                <div class="ml-auto">
                                        <button type="button" class="btn btn-primary show-edit-modal" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" data-id="{{ $contact->id }}"
                                        data-email="{{ $contact->email }}"
                                        data-no_telp="{{ $contact->no_telp }}"
                                        data-address="{{ $contact->address }}" 
                                        data-web="{{ $contact->web }}">Edit</button>
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
                    <form action="{!! url('dashboard/contact/update') !!}" method="post">
                        <input type="hidden" id="contact-id" name="id">
                        @csrf
                        <label for="email">Email</label>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" placeholder="" id="emailEdit" name="email">
                        </div>
                        <label for="no telp">No Telp</label>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="No Telp" id="telpEdit" style="height: 100px"
                                name="no_telp">
                        </div>
                        <label for="address">Address</label>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Address" id="addressEdit" style="height: 100px"
                                name="address"></textarea>
                        </div>
                        <label for="web">Website</label>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Website" id="webEdit" style="height: 100px"
                                name="web">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
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

        $('.show-edit-modal').each(function() {
            $(this).click(function() {
                $('#emailEdit').val($(this).data('email'));
                $('#addressEdit').val($(this).data('address'));
                $('#webEdit').val($(this).data('web'));
                $('#telpEdit').val($(this).data('no_telp'));
                $('#contact-id').val($(this).data('id'));
            });
        });
    </script>
@endsection
