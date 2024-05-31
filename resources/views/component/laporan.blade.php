<section class="report-content">

    <div class="detail-report-1">
        <div class="detail-report-card-1">
            <div class="detail-report-card-items">
                <h5>Total Pelanggan</h5>
                <div class="detail-report-card-items-icon">
                    <span class="material-symbols-outlined" style="font-size: 4rem;">group</span>
                    <div class="detail-report-card-items-value">
                        <p>{{ $totalCustomerRepot }} Orang</p>
                        <span>
                            @if ($persentaseCust > 0)
                                <i data-feather="arrow-up"></i>
                            @elseif ($persentaseCust < 0)
                                <i data-feather="arrow-down"></i>
                            @endif
                            {{ abs($persentaseCust) }}%
                        </span>
                    </div>
                </div>
            </div>
            <div class="detail-report-card-items">

                <h5>Total Pendapatan</h5>
                <div class="detail-report-card-items-icon">
                    <span class="material-symbols-outlined" style="font-size: 4rem;">payments</span>
                    <div class="detail-report-card-items-value">
                        <p>Rp. {{ $formattedTotalAmount }}</p>
                        <span>
                            @if ($persentaseTotal > 0)
                                <i data-feather="arrow-up"></i>
                            @elseif ($persentaseTotal < 0)
                                <i data-feather="arrow-down"></i>
                            @endif
                            {{ abs($persentaseTotal) }}%
                        </span>
                    </div>
                </div>

            </div>
            <div class="detail-report-card-items">
                <h5>Total Quantity</h5>
                <div class="detail-report-card-items-icon">
                    <span class="material-symbols-outlined" style="font-size: 4rem;">receipt_long</span>
                    <div class="detail-report-card-items-value">
                        <p>{{ $totalQuantityCustomer }} Kilogram</p>
                        <span>
                            @if ($persentaseKg > 0)
                                <i data-feather="arrow-up"></i>
                            @elseif ($persentaseKg < 0)
                                <i data-feather="arrow-down"></i>
                            @endif
                            {{ abs($persentaseKg) }}%
                        </span>
                    </div>
                </div>
            </div>
            <div class="detail-report-card-items">
                <h5>Total Pengeluaran</h5>
                <div class="detail-report-card-items-icon">
                    <span class="material-symbols-outlined" style="font-size: 4rem;">money_off</span>
                    <div class="detail-report-card-items-value">
                        <p>Rp. {{ $formattedTotalexpense }}</p>
                        <span>
                            @if ($persentaseExpense > 0)
                                <i data-feather="arrow-up"></i>
                            @elseif ($persentaseExpense < 0)
                                <i data-feather="arrow-down"></i>
                            @endif
                            {{ abs($persentaseExpense) }}%
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Laporan Pengeluaran Dan Detail Kas --}}

        <div class="detail-report-display">

            {{-- Laporan Pengeluaran --}}

            <div class="detail-report-expense-cash">
                <div class="detail-report-expense">
                    <div class="add-expanse">
                        <h5>Pengeluaran</h5>
                        <div class="detail-report-cash-header">
                            <a href="{{ route('detail-report') }}">Lihat Detail</a>
                            <a href="#popup">Tambahkan</a>
                        </div>
                    </div>

                    <div class="detail-report-expense-table" style="overflow-y: auto">
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Pcs</th>
                                    <th>Total</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengeluaran as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->items_name }}</td>
                                        <td>{{ $item->items_quantity }}</td>
                                        <td>{{ $item->items_total }}</td>
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $item->items_info }}</td>
                                        <td>
                                            <a href="{{ route('pengeluaran.edit', ['id' => $item->id]) }}"><i
                                                    data-feather="edit" style="width: 16px; height: 16px;"></i></a>
                                            <form id="delete-form-{{ $item->id }}"
                                                action="{{ route('pengeluaran.destroy', $item->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="#"
                                                onclick="event.preventDefault(); if(confirm('Apakah anda yakin untuk menghapusnya?')) { document.getElementById('delete-form-{{ $item->id }}').submit(); }"
                                                style="cursor: pointer; text-decoration: none;">
                                                <i style="width: 1rem; height: 1rem;  color:white" data-feather="trash"
                                                    class="fas fa-trash text-decoration-none">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- Laporan Uang Kas --}}

                {{-- <div class="detail-report-cash">
                    <div class="detail-report-cash-header">
                        <a href="{{ route('detail-report') }}">Lihat Detail</a>
                    </div>
                    <div class="detail-report-cash-content">
                        <form action="">
                            <table>
                                <tr>
                                    <td> <label for="daily-income">Pendapatan Harian</label></td>
                                    <td><input readonly type="number]" value="{{ $totalTransaksiValue }}"
                                            name="daily-income" id="daily-income"></td>
                                </tr>
                                <tr>
                                    <td> <label for="daily-expense">Pengeluaran Harian</label></td>
                                    <td><input type="number" name="daily-expense" value="{{ $totalExpenseValue }}"
                                            id="daily-expense"></td>
                                </tr>
                                <tr>
                                    <td> <label for="first-balance">Saldo Awal</label></td>
                                    <td><input type="number" name="first-balance" value="{{ $valueCashYesterday }}"
                                            id="first-balance"></td>
                                </tr>
                            </table>
                        </form>

                        <h6>Total Saldo Akhir</h6>
                        <span>Rp. {{ $valueCashFormat }}</span>
                    </div>
                </div> --}}
            </div>
        </div>

        <div class="popup">
            @include('Popup.popup-expense')
        </div>
    </div>

</section>
