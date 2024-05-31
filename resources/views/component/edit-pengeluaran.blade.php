@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="pengeluaran-edit" id="edit-pengeluaran">
    <form action="{{ url('pengeluaran/' . $pengeluaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td><label for="items_name">Nama Item</label></td>
                <td><input type="text" name="items_name" id="items_name" value="{{ $pengeluaran->items_name }}" required>
                </td>
            </tr>

            <tr>
                <td><label for="items_price">Harga Item</label></td>
                <td><input type="number" name="items_price" id="items_price" value="{{ $pengeluaran->items_price }}"
                        required></td>
            </tr>

            <tr>
                <td><label for="items_quantity">Jumlah Item</label></td>
                <td><input type="number" name="items_quantity" id="items_quantity"
                        value="{{ $pengeluaran->items_quantity }}" required></td>
            </tr>

            <tr>
                <td><label for="items_info">Info Item</label></td>
                <td>
                    <textarea name="items_info" id="items_info">{{ $pengeluaran->items_info }}</textarea>
                </td>
            </tr>

            <tr>
                <td><label for="items_total">Total</label></td>
                <td><input type="number" name="items_total" id="items_total" value="{{ $pengeluaran->items_total }}"
                        required></td>
            </tr>

            <td><button type="submit" class="btn btn-primary">Update</button></td>
        </table>
    </form>
</div>
