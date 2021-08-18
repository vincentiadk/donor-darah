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
            <th>Kecamatan</th>
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
            <td>@if($val->whatsapp != "") <a href='https://api.whatsapp.com/send?phone={{ $val->whatsapp }}&text=Halo%2C%20saya%20membutuhkan%20donor%20darah%20{{ $val->jenis_donor() }}%20saat%20ini.%20Saya%20menemukan%20kontak%20Anda%20lewat%20https%3A%2F%2Fdarah.id.%0ABisakah%20Anda%20membantu%20saya%3F'>WA</a> @endif</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif