<div style="display:flex; justify-content:center">
    <div class="detail-laporan" style="max-height: 500px; overflow-y: auto; width: 70rem; margin: 2em 1em; width:67em">
        <table class="detail-laporan-table text-center ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total Pelanggan</th>
                    <th>Total Quantity</th>
                    <th>Total Pemasukan</th>
                    <th>Total Pengeluaran</th>
                    <th>Saldo</th>
                    <th>Total Kas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($combined as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item['date'] }}</td>
                        <td>{{ $item['total_sum_cust'] }} Pelanggan</td>
                        <td>{{ $item['total_sum_qty'] }} Kg</td>
                        <td>Rp. {{ number_format($item['total_sum'], 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($item['expenseTotal'], 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($item['combined_total'], 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($item['cumulative_total'], 0, ',', '.') }}</td>
                        {{-- <td>{{ $item->getDailyTotalsExpenses }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
