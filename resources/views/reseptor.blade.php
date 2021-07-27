<link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<div class="content-wrapper">
    <form action="/admin/preference/store" method="post" enctype="multipart/form-data" id="form_data">
        {{ csrf_field() }}
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row parent">
                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <h3>Reseptor</h3>
                                <ul class="list-group list-group-unbordered mb-3">
                                    @foreach($data['reseptors'] as $r)
                                    <li class="list-group-item">
                                        <a href="" onclick="getDetailReseptor('{{ $r->detail->id }}')"><b> {{ $r->detail->nama_ktp }}</b> </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <a href="{{ url('admin/reseptor/add') }}" class="btn btn-primary btn-block"><b>Tambah
                                        Reseptor</b></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#datareseptor"
                                            data-toggle="tab">Data Reseptor</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#donorpotential"
                                            data-toggle="tab">Donor Potensial</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="datareseptor">
                                    </div>
                                    <div class="tab-pane" id="donorpotential">
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>
<script>
function getDetailReseptor(id) {
    event.preventDefault();
    $("#datareseptor").load("{{url('admin/reseptor/view')}}" + "/" + id);
    $("#donorpotential").load("{{url('admin/reseptor/donor-potential')}}" + "/" + id)
}
function simpan() {
    event.preventDefault();
    var formData = new FormData($('#form_data')[0]);
    $.ajax({
        url: '{{ url("admin/reseptor/store") }}',
        type: 'POST',
        dataType: 'JSON',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function() {
            loadingOpen('.content');
            $('#validasi_element').hide();
            $('#validasi_content').html('');
        },
        success: function(response) {
            loadingClose('.content');
            if (response.status == 200) {
                Toast.fire({
                    icon: 'success',
                    title: response.message
                });
            } else if (response.status == 422) {
                $('#validasi_element').show();
                Toast.fire({
                    icon: 'info',
                    title: 'Validasi'
                });

                $.each(response.error, function(i, val) {
                    $('#validasi_content').append('<li>' + val + '</li>');
                })
            } else {
                Toast.fire({
                    icon: 'warning',
                    title: response.message
                });
            }

        },
        error: function() {
            loadingClose('.content');
            Toast.fire({
                icon: 'error',
                title: 'Server Error!'
            });
        }

    });
}
</script>