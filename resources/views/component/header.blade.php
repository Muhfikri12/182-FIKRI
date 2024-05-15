{{-- Header --}}

    <div class="detail-sidebar d-flex mt-3 pb-2 border-bottom border-primary" style="justify-content: space-between; box-shadow:5px rgba(0,0,0,0.5)">
      <div class="item-sidebar mx-3 text-light">
        <span><h3>{{ $header }}</h3></span>
      </div>
      <div class="search d-flex mx-3 align-items-center"> 
        <div class="text-light" id="clock" ></div>
        <div class="mx-3 text-light" id="today-date"></div>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success text-light" type="submit">Search</button>
        </form>
      </div>
    </div>
