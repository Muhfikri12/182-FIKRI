    {{-- Pop Up Content Pengeluaran --}}

    <div class="popup_expense" id="popup">

        <div class="form-popup-expense">
            <form action="{{ route('pengeluaran') }}" method="POST">
                @csrf
                {{-- Form --}}
                <div class="d-flex" style="justify-content: space-between">
                    <h5>Form Pengeluaran</h5>
                    <a href="#" class="popup-close text-light">&times;</a>

                </div>
                <table>
                    <tr>
                        <td><label for="items_name">Nama Barang</label></td>
                        <td><input type="text" id="items_name" name="items_name"></td>
                    </tr>
                    <tr>
                        <td><label for="items_price">Harga Barang</label></td>
                        <td><input type="number" id="items_price" name="items_price"></td>
                    </tr>
                    <tr>
                        <td><label for="items_quantity">Quantity</label></td>
                        <td><input type="number" id="items_quantity" name="items_quantity"></td>
                    </tr>
                    <tr>
                        <td><label for="items_info">Keterangan</label></td>
                        <td>
                            <textarea name="items_info" id="items_info" cols="15" rows="3"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="items_total">Total</label></td>
                        <td><input readonly type="number" id="items_total" name="items_total"></td>
                    </tr>
                </table>
                <button type="submit" class="popup-btn">Enter</button>
            </form>
        </div>
    </div>
