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
                                <a href="#" class="btn btn-primary btn-block" onclick="goToPage('admin/reseptor/add')"><b>Tambah
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
    loadPage("admin/reseptor/view/" + id, "#datareseptor");
    loadPage("admin/reseptor/donor-potential/" + id, "#donorpotential");
}
</script>