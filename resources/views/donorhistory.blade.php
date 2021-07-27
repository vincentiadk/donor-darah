<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row parent">
                    <div class="card col-md-12">
                    
                        <div class="card-header">
                            <h3 class="card-title"> {{ $data['title'] }} </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                                <button onclick="goToPage('admin/donor-history/add')" class="btn btn-success float-right"> Tambah Riwayat</button>
                            </div>
                            
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered nowrap" id="datatable_serverside" style="width:100%">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Instansi</th>
                                        <th>Jenis Donor</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
</div>
<script>
$('#datatable_serverside').DataTable({
    processing: true,
    serverSide: true,
    destroy: true,
    scrollX: true,
    order: [
        [0, 'desc']
    ],
    iDisplayInLength: 10,
    ajax: {
        url: '{{ url("admin/donor-history/datatable") }}',
        data: {},
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        type: 'POST',
    },
    columns: [
        {
            searchable: false,
            orderable: false,
            className: 'align-middle text-center'
        },
        {
            searchable: false,
            orderable: false,
            className: 'align-middle text-center'
        },
        {
            searchable: false,
            orderable: false,
            className: 'align-middle text-center'
        },
        {
            searchable: false,
            orderable: false,
            className: 'align-middle text-center'
        },
        {
            searchable: false,
            orderable: false,
            className: 'align-middle text-center'
        },
    ]
});
</script>