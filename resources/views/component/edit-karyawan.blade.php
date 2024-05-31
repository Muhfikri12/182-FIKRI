<div class="edit-employee d-flex">
    <div class="edit-bio-employee">
        <img src="" alt="" class="border border-secondary rounded-circle bg-light"
            style="width: 6rem; height:6rem; text-align:center;">
        <h5 class="mt-3">{{ $user->name }}</h5>
        <p>{{ $user->roles->name }}</p>

        <h6>Username</h6>
        <p>{{ $user->name }}</p>

        <h6>Tanggal Lahir</h6>
        <p>{{ $user->date_of_birth ?? '-' }}</p>

        <h6>Masa Kerja</h6>
        <p>{{ $user->intervalDays }} Hari</p>

        <h6>Terakhir Diperbarui</h6>
        <p>{{ $user && $user->updated_at ? $user->updated_at->format('d-m-Y') : '-' }}</p>
    </div>
    <div class="edit-data-users">
        <div class="header-edit-users d-flex gap-3">
            <a href="#" class="text-light text-decoration-none">Ubah Identitas</a>
            {{-- <a href="{{ route('users.edit.password', ['id' => $user->id]) }}">Ubah Password</a> --}}
        </div>
        <div class="edit-content-users">
            <form action="{{ url('users/' . $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <table>
                    <tr>
                        <td> <label for="name">Username</label></td>
                        <td> <input type="text" value="{{ $user->name }}" id="username" name="name"></td>
                    </tr>
                    <tr>
                        <td> <label for="address">Alamat</label></td>
                        <td> <input type="text" value="{{ $user->address ?? '-' }}" id="address" name="address">
                        </td>
                    </tr>
                    <tr>
                        <td> <label for="birthplace">Tempat Lahir</label></td>
                        <td> <input type="text" value="{{ $user->birthplace ?? '-' }}" id="birthplace"
                                name="birthplace">
                        </td>
                    </tr>
                    <tr>
                        <td> <label for="date_of_birth">Tanggal Lahir</label></td>
                        <td> <input type="date" value="{{ $user->date_of_birth ?? '-' }}" id="date_of_birth"
                                name="date_of_birth">
                        </td>
                    </tr>
                    <tr>
                        <td> <label for="phone_number">No Telepon</label></td>
                        <td> <input type="text" value="{{ $user->phone_number ?? '-' }}" id="phone_number"
                                name="phone_number"></td>
                    </tr>
                    <tr>
                        <td> <label for="gender">Jenis Kelamnin</label></td>
                        <td> <select name="gender" id="gender">
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </td>
                    </tr>
                    @if (auth()->user()->roles_id == 1)
                        <tr>
                            <td> <label for="roles_id">Jabatan</label></td>
                            <td> <select name="roles_id" id="roles_id" required>
                                    <option value="">- Pilih -</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Cashier</option>
                                </select>
                            </td>
                        </tr>
                    @endif
                    <tr id="baris-tanggal">
                        <td>
                            <label for="starting_date">Tanggal masuk</label>
                        </td>
                        <td>
                            <input type="date" id="starting_date" name="starting_date"
                                @if ($startingDate) value="{{ $startingDate }}" disabled @endif>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> <button class="btn btn-primary" type="submit">Simpan</button></td>
                    </tr>

                </table>
            </form>
        </div>
    </div>
</div>
