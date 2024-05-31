<div class="d-flex" style="justify-content: space-between; align-items:end; margin:2em 2em 1em ; font-size: 13px">
    <div class="alert_done text-light d-flex" style="align-items: center">
        @if (session('status'))
            <div style="margin-left: 1em" class="alert_success" id="flash-message">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="fitur-search">
        <form id="searchForm" action="{{ route('pelanggan-search') }}" method="GET">
            <a id="closeSearch" href="{{ route('pelanggan-search') }}"
                class="text-decoration-none text-light fs-6">&times;</a>
            <input type="search" name="search" placeholder="Pencarian ">
            <button type="submit"> Search</button>
        </form>
    </div>
</div>


<div class="transaction-users" style="overflow-x: auto;">
    <table class="transaction-users-detail">
        <thead>
            <tr>
                <th>No</th>
                <th>Id</th>
                <th>Nama Pelanggan</th>
                <th>Nama Kasir</th>
                <th>Alamat</th>
                <th>Nomor HP</th>
                <th>Jenis Pelayanan</th>
                <th>Harga</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Jenis Pembayaran</th>
                <th>Tanggal</th>
                <th>Action</th>
                <th>Updated at</th>
            </tr>
        </thead>
        <tbody>
            {{-- @if (isset($customerName) && count($customerName) > 0) --}}
            @foreach ($pelanggan as $cust)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cust->id }}</td>
                    <td>{{ $cust->name }}</td>
                    <td>{{ optional($cust->cashier)->name ?? 'N/A' }}</td>
                    <td>{{ $cust->address }}</td>
                    <td>{{ $cust->phone_number }}</td>
                    <td>{{ $cust->services }}</td>
                    <td>{{ $cust->price }}</td>
                    <td>{{ $cust->quantity }}</td>
                    <td>{{ $cust->total }}</td>
                    <td>{{ $cust->pay_method }}</td>
                    <td>{{ $cust->created_at->format('d-m-y') }}</td>
                    <td><a class="bnt btn-primary"
                            href="{{ route('transactions.edit', ['id' => $cust->id]) }}
                            "><i
                                data-feather="edit" class="text-light text-decoration-none"
                                style="width:1rem; height:1rem;"></i></a>
                        <form id="delete-form-{{ $cust->id }}"
                            action="{{ route('pelanggan.destroy', $cust->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a href="#"
                            onclick="event.preventDefault(); if(confirm('Apakah anda yakin untuk menghapusnya?')) { document.getElementById('delete-form-{{ $cust->id }}').submit(); }"
                            style="cursor: pointer; text-decoration: none;">
                            <i style="width: 1rem; height: 1rem;  color:white" data-feather="trash"
                                class="fas fa-trash text-decoration-none">delete</i>
                        </a>
                    </td>
                    <td>{{ $cust->updated_at }}</td>
                </tr>
            @endforeach
            {{-- @endif --}}
        </tbody>
    </table>
</div>
