@extends('admin/index')

@section('title')
    Publication
@endsection

@section('css')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Publication</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('store.publik') }}" enctype="multipart/form-data"
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
                                <label for="exampleFormControlInput1" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control mb-3" id="exampleFormControlInput1"
                                    placeholder="Input Title">
                                <label for="exampleFormControlInput1" class="form-label">Description</label>
                                <textarea class="form-control" name="desc" placeholder="Masukan Konten" id="editor"></textarea>
                                <label for="exampleFormControlInput1" class="form-label">Image</label>
                                <input type="file" name="img" class="dropify mb-3" id="image"
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
                        <th style="width: 5%">No</th>
                        <th style="width: 10%">Title</th>
                        <th style="width: 10%">Description</th>
                        <th style="width: 10%">Image</th>
                        <th style="width: 10%">Action</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach (DB::table('publication')->get() as $key => $i)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $i->title }}</td>
                            <td>{!! $i->desc !!}</td>
                            <td>{{ $i->img }}</td>
                            <td>
                                <div class="ml-auto">
                                    <button type="button" class="btn btn-outline-primary show-edit-modal"
                                        data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $i->id }}"
                                        data-title="{{ $i->title }}" data-desc="{{ $i->desc }}"
                                        data-img="{{ url('assets/img/data/' . $i->img) }}">Edit</button>

                                    <a class="btn btn-outline-danger deleteee"
                                        href="{{ route('delete.publik', ['id' => $i->id]) }}">Hapus</a>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

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
    <script src="https://cdn.tiny.cloud/1/6hd2kze068a05w2ztyahu8bez8qfx1m8tnxdkv7lx6k8s0p9/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        var editor_config = {
            path_absolute: "/",
            selector: '#editor',
            relative_urls: false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback: function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };

        tinymce.init(editor_config);
    </script>

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
                $('#descEdit').val($(this).data('desc'));
                $('#imageEdit').val($(this).data('img'));
                $('#portfolio-id').val($(this).data('id'));
            });
        });

        $('#editModal').on('shown.bs.modal', function(e) {
            var html = `

                <form  method="post" action="/dashboard/publik/update/${$(e.relatedTarget).data('id')}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    aria-describedby="emailHelp" placeholder="..." value="${$(e.relatedTarget).data('title')}">
                            </div>
                    <div class="mb-3">
                                <label for="desc" class="form-label">desc</label>
                                <textarea id="editor" class="form-control" name="desc" rows="3">${$(e.relatedTarget).data('desc')}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="img" class="dropify" id="image" data-default-file="${$(e.relatedTarget).data('img')}" />
                                <input type="hidden" name="old_image" value="${$(e.relatedTarget).data('img')}">
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
            tinymce.remove('textarea');
            var test = tinymce.init(editor_config);
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
                        window.location = "dashboard/portfolio/delete/"
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
