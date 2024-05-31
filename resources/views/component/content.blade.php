    {{-- Transaksi --}}
    <div class="d-flex" style="justify-content:center; gap: 10px">
        <div class="content mt-5 mb-4">
            <div class="first-side ">
                <div class="firstSide-content-first border border-light d-flex" style="padding-left: 1rem">
                    <span class="material-symbols-outlined" style="font-size: 4rem; margin-top: 2rem;">
                        group
                    </span>
                    <div style="margin: 2.7rem 0 0 .7rem">
                        <h6 class="m-0">Pelanggan</h6>
                        <p class="m-0">{{ $totalPelanggan->total_pelanggan }} Orang</p>
                    </div>
                </div>
                <div class="firstSide-content-second border border-light d-flex" style="padding-left: 1rem">
                    <span class="material-symbols-outlined" style="font-size: 4rem; margin-top: 2rem;">
                        payments
                    </span>
                    <div style="margin: 2.7rem 0 0 .7rem">
                        <h6 class="m-0">Pendapatan</h6>
                        <p class="m-0">Rp.
                            {{ number_format($totalTransaksi->total_transaksi, 0, ',', '.') ?? '0' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="content  mt-5">
            <div class="first-side">
                <div class="firstSide-content-first border border-light d-flex" style="padding-left: 1rem">
                    <span class="material-symbols-outlined" style="font-size: 4rem; margin-top: 2rem;">
                        receipt_long
                    </span>
                    <div style="margin: 2.7rem 0 0 .7rem">
                        <h6 class="m-0">Quantity</h6>
                        <p class="m-0">{{ $totalQuantity->total_quantity }} Kg</p>
                    </div>
                </div>
                <div class="firstSide-content-second border border-light d-flex" id="grafik_slider"
                    style="padding-left: 1rem">
                    <span class="material-symbols-outlined" style="font-size: 4rem; margin-top: 2rem;">
                        monitoring
                    </span>
                    <div style="margin: 2.7rem 0 0 .7rem">
                        @php
                            $totalKemarinValue = isset($totalKemarin->total_transaksi_kemarin)
                                ? $totalKemarin->total_transaksi_kemarin
                                : 0;
                            $totalTransaksiValue = isset($totalTransaksi->total_transaksi)
                                ? $totalTransaksi->total_transaksi
                                : 0;

                            $kenaikanPersentase = 0;
                            if ($totalKemarinValue > 0) {
                                $kenaikanPersentase = round(
                                    (($totalTransaksiValue - $totalKemarinValue) / $totalKemarinValue) * 100,
                                );
                            } elseif ($totalTransaksiValue > 0) {
                                $kenaikanPersentase = 100;
                            }
                        @endphp
                        <h6 class="m-0">Peningkatan</h6>
                        <p class="m-0">{{ $kenaikanPersentase }}%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="review-cust">
        <table class="table-review-cust">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Pelayanan</th>
                    <th>Quantity</th>
                    <th>Harga</th>
                    <th>Pembayaran</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->services }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price, 0, '.', '.') }}</td>
                        <td>{{ $item->pay_method }}</td>
                        <td>{{ number_format($item->total, 0, '.', '.') }}</td>
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
