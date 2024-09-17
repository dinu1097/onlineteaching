<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Navbar with Dropdown</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light p-3 mb-4" style="border-radius:30px;border:1px solid black;">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('courses.index') }}">Home/Courses <span class="sr-only">(current)</span></a>
      </li>

      @if(auth()->check())
      <li class="nav-item">
        <a class="nav-link" href="{{ route('chat.index') }}">Chat</a>
      </li>
      @endif
      @if(auth()->check()) <!-- Check if the user is authenticated -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dashboard
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @if(auth()->user()->role === 'teacher') <!-- Check if the user is a teacher -->
          <a class="dropdown-item" href="{{ route('dashboard') }}">Teacher Dashboard</a>
          @elseif(auth()->user()->role === 'student') <!-- Check if the user is a student -->
          <a class="dropdown-item" href="{{ route('dashboard.student') }}">Student Dashboard</a>
          @endif
        </div>
      </li>
      @endif
      @if(auth()->check())
      <li class="nav-item">
      @if(auth()->user()->role === 'teacher')
        <a class="nav-link">User:Teacher</a>
      @endif
      </li>
      <li class="nav-item">
      @if(auth()->user()->role === 'student')
        <a class="nav-link">User:student</a>
      @endif
      </li>
      @endif
      <!-- @if(auth()->check())
      <li class="nav-item">
        <a class="nav-link" href="{{ route('payment.history') }}">Payment History</a>
      </li>
      @endif -->
      @if(auth()->check())
      <li class="nav-item">
        <a class="nav-link" href="{{ route('profile') }}">Profile</a>
      </li>
      @endif
      @if(!auth()->check()) <!-- Check if the user is not authenticated -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Login</a>
      </li>
      @endif

      @if(auth()->check()) <!-- Show Logout link only if the user is authenticated -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('auth-logout') }}">Logout</a>
      </li>
      @endif
    </ul>
  </div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
