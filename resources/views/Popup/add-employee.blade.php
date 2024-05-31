<div class="add-employee" id="popup-add-employee">
    <div class="add-employee-list">
        <form action="{{ route('register.store') }}" method="POST" autocomplete="off">
            @csrf

            <a href="#" class="popup-close text-light">&times;</a>
            <div class="text-center text-light">
                <h4>Masukan Data</h4>
            </div>
            <div class="mb-4">
                <label for="dummy-username" style="display:none;">Username</label>
                <input type="text" id="dummy-username" name="dummy-username" style="display:none;">

                <label class="text-light" for="actual-username">Nama Pengguna:</label>
                <input class="border rounded px-2" type="text" id="actual-username" name="actual_username"
                    value="{{ old('actual_username') }}" required autocomplete="new-username">
            </div>
            <div class="mb-4">
                <label for="dummy-email" style="display:none;">Email</label>
                <input type="email" id="dummy-email" name="dummy-email" style="display:none;">

                <label class="text-light" for="actual-email">Email:</label>
                <input class="border rounded px-2" type="email" id="actual-email" name="actual_email"
                    value="{{ old('actual_email') }}" required autocomplete="new-email">
            </div>
            <div class="mb-4">
                <label for="dummy-password" style="display:none;">Password</label>
                <input type="password" id="dummy-password" name="dummy-password" style="display:none;">

                <label class="text-light" for="actual-password">Password:</label>
                <input class="border rounded px-2" type="password" id="actual-password" name="actual_password" required
                    autocomplete="new-password">
            </div>

            <div class="mb-4">
                <label class="text-light" for="roles_id" style="margin-right: 2em">Roles</label>
                <select class="rounded" id="roles_id" name="roles_id" style="width: 10em">
                    <option value="1">Admin</option>
                    <option value="2">Cashier</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="text-light" for="starting_date" style="margin-right: 0.8em">Tanggal</label>
                <input class="rounded" type="date" id="starting_date" name="starting_date" style="width: 10em">
            </div>


            <button class="border rounded px-2" type="submit">Register</button>
        </form>
    </div>
</div>
