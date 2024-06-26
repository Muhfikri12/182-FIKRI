{{-- Sidebar --}}
<div class="sidebar rounded">
    <div class="container px-0 mx-0 vh-100 p-4 px-2 text-white " style= "width: 13rem; box-sizing:border-box;">
        <div class="container">
            <div class="mb-4 pb-4 fs-4 text-center " style="font-style: none"> <a href="/"
                    class="link-light text-decoration-none"> aLaundry </a> </div>
            <div class="text-start mx-1">
                <ul class="list-group" style="list-style: none; gap:2.5rem">

                    <li class="link"><a href="/main" class="link-light text-decoration-none icon-link-hover"><i
                                data-feather="home" class="mx-2" aria-hidden="true"
                                style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"></i><span
                                class="align-middle">Dashboard</span></a>
                    <li class="link"><a href="/main/transaksi"
                            class="link-light text-decoration-none icon-link-hover"><i data-feather="shopping-bag"
                                class="mx-2" aria-hidden="true"
                                style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"></i><span
                                class="align-middle">Transaksi</span></a>
                    <li class="link"><a href="/main/laporan"
                            class="link-light text-decoration-none icon-link-hover"><i data-feather="book-open"
                                class="mx-2 " aria-hidden="true"
                                style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"></i><span
                                class="align-middle">Laporan</span></a>
                    <li class="link"><a href="/main/pelanggan"
                            class="link-light text-decoration-none icon-link-hover"><i data-feather="users"
                                class="mx-2 " aria-hidden="true"
                                style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"></i><span
                                class="align-middle">Pelanggan</span></a>
                        @if (auth()->user()->roles_id == 1)
                    <li class="link"><a href="/main/karyawan"
                            class="link-light text-decoration-none icon-link-hover"><i data-feather="user"
                                class="mx-2 " aria-hidden="true"
                                style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"></i><span
                                class="align-middle">Karyawan</span></a>
                        @endif
                </ul>
            </div>
            <div class=" position-absolute bottom-0 left-0 height-auto border-top my-2 " style="width: 10em">
                <div class="d-flex p-3 ">
                    <div class="border border-primary rounded-circle bg-light" style="width: 2.4rem; height:2.5rem">
                        <img src="" alt="">
                    </div>
                    <div class="text-start mx-2">
                        @if (Auth::check())
                            <p class="m-0">{{ auth()->user()->name }}</p>
                            <p class="m-0" style="font-size: 0.8rem">{{ auth()->user()->roles->name }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
