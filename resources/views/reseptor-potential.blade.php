@if($data['donor']->count() < 1) 
    Belum ada donor potensial ditemukan
@else
<table class="table table-responsive table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>JK</th>
            <th>Usia</th>
            <th>Prov</th>
            <th>Kota/Kab</th>
            <th>WA</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1 @endphp
        @foreach($data['donor'] as $val)
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $val->nama_ktp }}</td>
            <td>{{ $val->jenis_kelamin() }}</td>
            <td>{{ $val->age }}</td>
            <td>{{ $val->provinsi ? $val->provinsi->name : "" }}</td>
            <td>{{ $val->kabupaten ? $val->kabupaten->name : "" }}</td>
            <td>{{ $val->kecamatan ? $val->kecamatan->name : "" }}</td>
            <td>{{ $val->wa != "" ? "<a href='https://api.whatsapp.com/send?phone=".$val->whatsapp."text=Halo%2C%20saya%20bisa%20membantu%20mendonorkan%20darah.>WA</a>'": "" }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif