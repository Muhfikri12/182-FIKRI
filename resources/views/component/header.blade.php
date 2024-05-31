{{-- Header --}}

<div class="detail-sidebar d-flex mt-3 pb-2 border-bottom border-primary"
    style=";justify-content: space-between; box-shadow:5px rgba(0,0,0,0.5)">
    <div class="item-sidebar mx-3 text-light">
        <span>
            <h3>{{ $header }}</h3>
        </span>
    </div>
    <div class="search d-flex mx-3 align-items-center">
        <div class="d-block mx-3 text-center " style="font-size: 13px">
            <div class="text-light" id="today-date"></div>
            <div class="text-light" id="clock"></div>
        </div>
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false"> <i data-feather="user"></i>
                @if (Auth::check())
                    {{ auth()->user()->name }}
                @endif
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item"
                        href="{{ Auth::check() ? route('users.edit', auth()->user()->id) : '#' }}">Edit</a>
                </li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
    </div>
</div>
