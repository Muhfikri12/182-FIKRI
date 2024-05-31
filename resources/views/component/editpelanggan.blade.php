<div class="edit_pelanggan">

    <form action="{{ url('transactions/' . $pelanggan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td><label for="customer_name">Customer Name</label></td>
                <td><input type="text" name="customer_name" id="customer_name" class="form-control"
                        value="{{ $pelanggan->name }}" required></td>
            </tr>
            <tr>
                <td><label for="id_cashier">Cashier ID</label></td>
                <td><input type="text" name="id_cashier" id="id_cashier" class="form-control"
                        value="{{ $pelanggan->id_cashier }}" required></td>
            </tr>

            <tr>
                <td><label for="address">Address</label></td>
                <td><input type="text" name="address" id="address" class="form-control"
                        value="{{ $pelanggan->address }}" required> </td>
            </tr>

            <tr>
                <td><label for="phone_number">Phone Number</label></td>
                <td><input type="text" name="phone_number" id="phone_number" class="form-control"
                        value="{{ $pelanggan->phone_number }}" required></td>
            </tr>

            <tr>
                <td><label for="services">Services</label></td>
                <td>
                    <select name="services" id="services">
                        <option value="express">Express</option>
                        <option value="oneday">One Day</option>
                        <option value="regular">Regular</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="price">Price</label></td>
                <td><input type="text" name="price" id="price" class="form-control"
                        value="{{ $pelanggan->price }}" required></td>
            </tr>

            <tr>
                <td><label for="quantity">Quantity</label></td>
                <td><input type="text" name="quantity" id="quantity" class="form-control"
                        value="{{ $pelanggan->quantity }}" required></td>
            </tr>

            <tr>
                <td><label for="total">Total</label></td>
                <td><input type="text" name="total" id="total" class="form-control"
                        value="{{ $pelanggan->total }}" required></td>
            </tr>

            <tr>
                <td><label for="pay_method">Payment Method</label></td>
                <td><input type="text" name="pay_method" id="pay_method" class="form-control"
                        value="{{ $pelanggan->pay_method }}" required></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" class="btn btn-primary">Update</button></td>
            </tr>
        </table>
    </form>
</div>
