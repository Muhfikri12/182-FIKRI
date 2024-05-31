<form action="{{ route('transaksi.store') }}" method="POST" id="transaction-form">
    @csrf
    <div class="transaction d-flex flex-wrap">
        <div class="form-transaction">
            <h4 class="text-light" style="margin: 3rem 7rem 2rem">Form Transaksi Items</h4>
            <table class="table-transaction" style="width: 30em; margin-left:7rem;">

                <tr>
                    <td><label for="customer_name">Nama Pelanggan</label></td>
                    <td><input type="text" id="customer_name" name="customer_name"></td>
                </tr>
                <tr>
                    <td><label for="id_cashier">Nama Kasir</label></td>
                    <td>
                        <select id="id_cashier" name="id_cashier">
                            @foreach ($kasir as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" id="cashier_name" name="cashier_name">
                    </td>
                </tr>
                <tr>
                    <td><label for="address">Alamat</label></td>
                    <td><input type="text" id="address" name="address"></td>
                </tr>
                <tr>
                    <td><label for="phone_number">Nomor Handphone</label></td>
                    <td><input type="number" id="phone_number" name="phone_number"></td>
                </tr>
                <tr>
                    <td><label for="services">Pelayanan</label></td>
                    <td>
                        <select name="services" id="services">
                            <option value="express">Express</option>
                            <option value="oneday">One Day</option>
                            <option value="regular">Regular</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="price">Harga</label></td>
                    <td><input readonly type="text" id="price" name="price"></td>
                </tr>
                <tr>
                    <td><label for="quantity">Quantity</label></td>
                    <td><input type="number" id="quantity" name="quantity"> Kg</td>
                </tr>
                <tr>
                    <td><label for="total">Total</label></td>
                    <td><input readonly type="number" id="total" name="total"></td>
                </tr>
                <tr>
                    <td><label for="pay_method">Pembayaran</label></td>
                    <td>
                        <select name="pay_method" id="pay_method">
                            <option value="lunas">Lunas</option>
                            <option value="take and pay">Take and Pay</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="money">Total Uang</label></td>
                    <td><input type="number" id="money" name="money"></td>
                </tr>
                <tr>
                    <td><button class="submit-button rounded" type="button" id="submit-btn">Input!</button></td>
                </tr>
            </table>
        </div>

        <div class="detail-struck" id="detail-struck"">
            <div class="text-center text-light">
                <h5>aLaundry</h5>
                <p style="font-size: 10px">Dsn. Pasir Kopeah, Rt.05 Rw.04, Dusun. Ciasem, <br> Kecamatan. Pasir Nangka,
                    Kabupaten. Cibeureum, Indonesia, 01243</p>
            </div>

            <div class="detail-items-struck text-light" id="detail-items-struck">
                <!-- Data dari form akan muncul di sini -->
                <table class="detail-items-struck-table" id="detail-table">
                    <tr>
                        <td>Nama Pelanggan</td>
                        <td id="detail-customer_name">: </td>
                    </tr>
                    <tr>
                        <td>Nama Admin</td>
                        <td id="detail-id_cashier">: </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td id="detail-address">: </td>
                    </tr>
                    <tr>
                        <td>Nomor Handphone</td>
                        <td id="detail-phone_number">: </td>
                    </tr>
                    <tr>
                        <td>Jenis Pelayanan</td>
                        <td id="detail-services">: </td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td id="detail-price">: </td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td id="detail-quantity">: </td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td id="detail-total">: </td>
                    </tr>
                    <tr>
                        <td>Jenis Pembayaran</td>
                        <td id="detail-pay_method">: </td>
                    </tr>
                    <tr>
                        <td>Total Uang</td>
                        <td id="detail-money">: </td>
                    </tr>
                    <tr>
                        <td>Total Kembalian</td>
                        <td id="total-refund">: </td>
                    </tr>
                    <tr>
                        <td>Sisa Pembayaran</td>
                        <td id="outstanding-payment">: </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <button class="submit-button rounded" type="submit" id="submit-btn">Input!</button>
</form>
