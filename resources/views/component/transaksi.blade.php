
<div class="transaction d-flex flex-wrap">
    <div class="form-transaction">
        <h4 class="text-light" style="margin: 3rem 7rem 2rem ">Detail Transaksi</h4>
        <form action="">
            <table style="width: 30em; margin-left:7rem;">
                <tr>
                    <td><label for="customer_name">Nama Pelanggan</label></td>
                    <td><input type="text" id="customer_name" name="customer_name"></td>
                </tr>
                <tr>
                    <td><label for="admin_name">Nama Admin</label></td>
                    <td><select type="text" id="customer_name">
                        <option value="admin1">Karin</option>
                        <option value="admin2">tukija</option>
                        </select>
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
                    <td><label for="service-method">Jenis Pelayanan</label></td>
                    <td>
                        <select name="service-method" id="service-method">
                            <option value="Express">Express</option>
                            <option value="oneday">One Day</option>
                            <option value="regular">Regular</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="price">Harga</label></td>
                   <td><input type="text" id="price" name="price"></td>
                </tr>
                <tr>
                    <td><label for="quantity">Quantity</label></td>
                   <td><input type="text" id="quantity" name="quantity"></td>
                </tr>
                <tr>
                    <td><label for="total">Total</label></td>
                   <td><input type="number" id="total" name="total"></td>
                </tr> 
                <tr>
                    <td><label for="payment-method">Jenis Pembayaran</label></td>
                    <td>
                        <select name="payment-method" id="payment-method">
                            <option value="done">Lunas</option>
                            <option value="later">Take and Pay </option>
                            <option value="Dp">Down Payment (DP)</option>
                        </select>
                    </td>
                </tr>         
                <tr>
                    <td><label for="money">Total Uang</label></td>
                   <td><input type="number" id="money" name="money"></td>
                </tr> 
            </table>
        </form>
    </div>
    {{-- Detail Struk --}}
    <div class="detail-struk" style="margin: 3rem 5rem 2rem;">
        {{-- Heading struck --}}
        <div class="text-center text-light">
            <h5> aLaundry</h5>
            <p style="font-size: 10px">Dsn. Pasir Kopeah, Rt.05 Rw.04, Dusun. Ciasem, <br> Kecamatan. Pasir Nangka, Kabupaten. Cibeureum, Indonesia, 01243</p>
        </div>
        {{-- Detail Items Struck --}}
        <div class="detail-items-struck text-light">
            <table>
                <tr>
                    <td>Nama Pelanggan</td>
                    <td>: Andini</td>
                </tr>
                <tr>
                    <td>Nama Admin</td>
                    <td>: Karin</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>: 12 September 2023</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: Cibango</td>
                </tr>
                <tr>
                    <td>Nomor Handphone</td>
                    <td>: 085777915465</td>
                </tr>
                <tr>
                    <td>Jenis Pelayanan</td>
                    <td>: Express</td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>: 5000</td>
                </tr>
                <tr>
                    <td>Quantity</td>
                    <td>: 5Kg</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>: 25000</td>
                </tr>
                <tr>
                    <td>Jenis Pembayaran</td>
                    <td>: Lunas</td>
                </tr>
                <tr>
                    <td>Total Uang</td>
                    <td>: 50000</td>
                </tr>
                <tr>
                    <td>Total Kembalian</td>
                    <td>: 25000</td>
                </tr>
            </table>
        </div> 
    </div>
</div>
<div class="payment "> <a href="submit" class="text-light text-decoration-none"> Lanjutkan Pembayaran </a></div>