<div class="list-detail-employee">
    <div class="list-header-detail-employee">
        <div class="add-data" style="margin-top: auto">
            <a href="#popup-add-employee" id="button-add-employee" class="button-add-employee">Tambahkan
                Data</a>
        </div>
        <div class="detail-search-employee">
            <form id="searchForm" action="{{ route('karyawan') }}" method="GET">
                <button type="submit"> Search</button>
                <input type="search" name="search" placeholder="Pencarian ">
                <a id="closeSearch" href="{{ route('karyawan') }}"
                    class="text-decoration-none text-light fs-6">&times;</a>
            </form>
        </div>
    </div>

    <div class="list-employee">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>TTL</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Tanggal Masuk</th>
                    <th>Masa Kerja</th>
                    <th>Posisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->gender ?? '-' }}</td>
                        <td>{{ $item->birthplace ?? '-' }}, {{ $item->date_of_birth ?? '-' }}</td>
                        <td>{{ $item->address ?? '-' }}</td>
                        <td>{{ $item->phone_number ?? '-' }}</td>
                        <td>{{ $item->starting_date ?? '-' }}</td>
                        <td>{{ $item->interval_days }} hari</td>
                        <td>{{ $item->roles()->first()->name ?? '-' }}</td>
                        <td>
                            <a href="{{ route('users.edit', ['id' => $item->id]) }}"><i data-feather="edit"
                                    style="width: 16px; height: 16px; color:white;"></i></a>
                            <form id="delete-form-{{ $item->id }}"
                                action="{{ route('users.destroy', $item->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                            </form>

                            <a href="#"
                                onclick="event.preventDefault(); if(confirm('Apakah anda yakin untuk menghapusnya?')) { document.getElementById('delete-form-{{ $item->id }}').submit(); }"
                                style="cursor: pointer; text-decoration: none;">
                                <i style="width: 1em; height: 1em;  color:white" data-feather="trash"
                                    class="fas fa-trash text-decoration-none">delete</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div>
    @include('Popup.add-employee')
</div>
