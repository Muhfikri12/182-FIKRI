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
            <div>
                <a href="#">Ubah Identitas</a>
                <a href="#">Ubah Password</a>
            </div>
            <div>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="edit-content-users">
            <form action="{{ url('users/' . $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <table>
                    <tr>
                        <td> <label for="name">Email</label></td>
                        <td> <input type="Email" value="{{ $user->email }}" id="email" name="email"></td>
                    </tr>
                    <tr>
                        <td> <label for="Password">Password</label></td>
                        <td> <input type="password" id="password" name="password">
                        </td>
                    </tr>
                    <tr>
                        <td> <label for="Password">Ulangi Password</label></td>
                        <td> <input type="password" id="password" name="password">
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
