<div class="sidebar col-md-2">
  <!-- Racing Sports Section -->
  <div
    class="sidebar-title"
    data-toggle="collapse"
    data-target="#racingSports"
    aria-expanded="true"
  >
    <h5 class="m-b-0">Racing Sports</h5>
  </div>
  <nav id="racingSports" class="collapse show">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="#" class="nav-link">Horse Racing</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">Greyhound Racing</a>
      </li>
    </ul>
  </nav>

  <!-- Others Section -->
  <div
    class="sidebar-title"
    data-toggle="collapse"
    data-target="#others"
    aria-expanded="true"
  >
    <h5 class="m-b-0">Others</h5>
  </div>
  <nav id="others" class="collapse show">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="tembo-list" class="nav-link">Tembo Casino</a>
      </li>
      <li class="nav-item">
        <a href="live-casino" class="nav-link">Live Casino</a>
      </li>
      <li class="nav-item">
        <a href="slotgame" class="nav-link">Slot Game</a>
      </li>
      <li class="nav-item">
        <a href="fantasy-game" class="nav-link">Fantasy Game</a>
      </li>
    </ul>
  </nav>

  <!-- All Sports Section -->
  <div class="sidebar-title">
    <h5
      class="m-b-0"
      data-toggle="collapse"
      data-target="#allSports"
      aria-expanded="true"
    >
      All Sports
    </h5>
  </div>
  <nav id="allSports" class="collapse show">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a
          href="#PoliticsNested"
          class="nav-link toggle-nested"
          data-toggle="collapse"
          role="button"
          aria-expanded="false"
          aria-controls="PoliticsNested"
        >
          <span class="toggle-icon">
            <i class="far fa-plus-square me-1"></i>
          </span>
          Politics
        </a>
        <ul id="PoliticsNested" class="collapse flex-column nested-nav">
          <li class="nav-item">
            <a href="#PoliticsNested2" class="nav-link toggle-nested" data-toggle="collapse"
              role="button"
              aria-expanded="false"
              aria-controls="PoliticsNested2">
              <span class="toggle-icon"><i class="far fa-plus-square me-1"></i></span>
              Assembly Election 2025
            </a>
            <ul id="PoliticsNested2" class="collapse flex-column nested-nav">
              <li class="nav-item">
                <a href="#" class="nav-link">Assembly Election 2025</a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a
          href="#cricketNested"
          class="nav-link toggle-nested"
          data-toggle="collapse"
          role="button"
          aria-expanded="false"
          aria-controls="cricketNested"
        >
          <span class="toggle-icon">
            <i class="far fa-plus-square me-1"></i>
          </span>
          Cricket
        </a>
        <ul id="cricketNested" class="collapse flex-column nested-nav">
          <li class="nav-item">
            <a href="#cricketNested2" class="nav-link toggle-nested" data-toggle="collapse"
              role="button"
              aria-expanded="false"
              aria-controls="cricketNested2"><span class="toggle-icon">
              <i class="far fa-plus-square me-1"></i>
              </span>T10 XI
            </a>
            <ul id="cricketNested2" class="collapse flex-column nested-nav">
              <li class="nav-item">
                <a href="#" class="nav-link">Chennai Super Kings XI  v Rajasthan Royals XI </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">T20 League</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Virtual Cricket League</a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">Football</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">Tennis</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">Badminton</a>
      </li>
    </ul>
  </nav>
</div>

<!-- Script -->
<script>
  document.querySelectorAll(".toggle-nested").forEach((item) => {
    item.addEventListener("click", function () {
      const icon = this.querySelector(".toggle-icon i");
      const isExpanded = this.getAttribute("aria-expanded") === "true";

      if (isExpanded) {
        icon.classList.remove("fa-minus-square");
        icon.classList.add("fa-plus-square");
      } else {
        icon.classList.remove("fa-plus-square");
        icon.classList.add("fa-minus-square");
      }
    });
  });
</script>

<!-- Styles -->
<style>
  .sidebar-title {
    cursor: pointer;
    padding: 10px 15px;
    /* margin-bottom: 5px; */
  }

  .sidebar-title h5 {
    margin: 0;
    font-size: 1rem;
  }

  .nav-link {
    display: flex;
    align-items: center;
    padding: 5px 15px;
    color: #000;
  }

  /* .nested-nav {
    padding-left: 15px;
  } */

  .nested-nav .nav-item .nav-link {
    padding-left:25px;
  }
  .nested-nav .nested-nav .nav-item .nav-link {
    padding-left:55px;
  }

  .toggle-icon {
    /* margin-right: 5px; */
  }

  .ml-3 {
    margin-left: 1rem !important;
  }
</style>
