<!-- Start Nav bar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">LaravelR5</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown {{ request()->is('clients*') || request()->routeIs('clients') || request()->routeIs('addClient') || request()->routeIs('trashClient') ? 'active' : '' }}">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Clients <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li class="{{ request()->routeIs('clients') ? 'active' : '' }}"><a href="{{ route('clients') }}">Clients Data</a></li>
          <li class="{{ request()->routeIs('addClient') ? 'active' : '' }}"><a href="{{ route('addClient') }}">Add Client</a></li>
          <li class="{{ request()->routeIs('trashClient') ? 'active' : '' }}"><a href="{{ route('trashClient') }}">Trashed clients</a></li>
        </ul>
      </li>
      <li class="dropdown {{ request()->is('students*') || request()->routeIs('students') || request()->routeIs('addStudent') ? 'active' : '' }}">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Students <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li class="{{ request()->routeIs('students') ? 'active' : '' }}"><a href="{{ route('students') }}">Students Data</a></li>
          <li class="{{ request()->routeIs('addStudent') ? 'active' : '' }}"><a href="{{ route('addStudent') }}">Add Student</a></li>
          <li><a href="page6.html">Page 2-3</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
<!-- End Nav bar -->
