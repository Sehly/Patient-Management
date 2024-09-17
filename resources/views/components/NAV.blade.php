<nav class="navbar navbar-expand-lg px-5 navbar-dark bg-dark">
  <div class="container-fluid">

    <a class="navbar-brand me-auto" href="#">
      <i class="bi bi-person-circle"></i> Doctors
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link navbar-brand me-auto mx-3" href="{{ route('revenue.index') }}">View Revenue Report</a>
        </li>
      </ul>

      <form action="{{ route('Patient.search') }}" method="GET" class="d-flex align-items-center me-3">
        <div class="input-group" style="max-width: 300px;">
          <input type="text" name="search" class="form-control rounded-start" placeholder="Search by Name or Phone" value="{{ request('search') }}" style="border-radius: 20px 0 0 20px; box-shadow: none; padding: 0.5rem 0.75rem; font-size: 0.875rem;">
          <button type="submit" class="btn btn-outline-light" style="border-radius: 0 20px 20px 0; padding: 0.5rem 1rem; font-size: 0.875rem;">Search</button>
        </div>
        <a href="{{ route('Patient.index') }}" class="btn btn-outline-light ms-2" style="border-radius: 20px; padding: 0.5rem 1rem; font-size: 0.875rem; white-space: nowrap;">All Patients</a>
      </form>
    </div>
  </div>
</nav>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
