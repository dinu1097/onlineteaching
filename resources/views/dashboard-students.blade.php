@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @font-face {
        font-family: 'Akira Expanded';
        src: url('../Fonts/fonnts.com-Domus_Titling.otf') format('opentype');
        font-weight: normal;
        font-style: normal;
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: 'Akira Expanded', sans-serif;
    }

    .list-group
    {
        border-radius: 20px;
    }

    header {
      position: relative;
      border-radius: 20px;
      height: 80vh;
      background-image: url('../Images/hero.jpg');
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    header::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.6); /* Adjust the opacity to control the darkness */
      border-radius: 20px;
      z-index: 1;
    }

    .input-group {
      position: relative;
      z-index: 2; /* Ensure the input group appears above the overlay */
    }

    .form-control {
    border-radius: 20px;
    }

    input
    {
        background-color: #E7E8D8;
    }
    .card
    {
        background-color: #E7E8D8;
        border-radius: 20px;
    }
    .card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0, 0, 0, 0);
    border-bottom: 1px solid rgba(0, 0, 0, .125);
    }
    footer
    {
        border-radius: 20px;
    }

    header {
      position: relative;
      border-radius: 20px;
      height: 80vh;
      background-image: url('../Images/hero.jpg');
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    header::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.6); /* Adjust the opacity to control the darkness */
      border-radius: 20px;
      z-index: 1;
    }

    .text-content {
      position: relative;
      z-index: 2; /* Ensure the text appears above the overlay */
    }

    .input-group {
      position: relative;
      z-index: 2; /* Ensure the input group appears above the overlay */
    }
    .input-group-container {
      position: relative;
      z-index: 2; /* Ensure the input group appears above the overlay */
      width: 100%;
      max-width: 600px; /* Adjust the max-width as needed */
    }
    .btn-outline-secondary
    {
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
        color: white;
        background-color: black;
    }
  </style>
</head>

<body class="p-5">
@include('navbar')
    <!-- Header -->
    <header class="text-white text-center d-flex flex-column align-items-center justify-content-center">
        <div class="text-content my-3">
          <h1>Nurturing Minds, Shaping Future</h1>
        </div>
        <div class="input-group-container">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="button">Button</button>
            </div>
          </div>
        </div>
      </header>


    <!-- Main Content -->
    <main class="container my-5">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">My Courses</a>
                    <a href="#" class="list-group-item list-group-item-action">Search Courses</a>
                    <a href="#" class="list-group-item list-group-item-action">Chat</a>
                    <a href="#" class="list-group-item list-group-item-action">Join Video Conference</a>
                </div>
            </nav>

            <!-- Dashboard Content -->
            <div class="col-md-9">
                <!-- My Courses -->
                <div class="card mb-4">
                    <div class="card-header">
                        My Courses
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($courses as $course)
                                <li class="list-group-item">
                                    <a href="{{ route('courses.show', $course->course_id) }}">{{ $course->title }}</a>
                                </li>
                            @empty
                                <li class="list-group-item">No courses found</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <!-- Search Form -->
                <div class="card mb-4">
                    <div class="card-header">
                        Search Courses
                    </div>
                    <div class="card-body">
                    <form action="{{ route('courses.find') }}" method="GET">
                        <div class="form-group">
                            <label for="standard">Standard</label>
                            <input type="text" class="form-control" id="standard" name="standard" placeholder="Enter standard" value="{{ request()->input('standard') }}">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject" value="{{ request()->input('subject') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>

                    </div>
                </div>

                <!-- Chat -->
                <div class="card mb-4">
                    <div class="card-header">
                        Chat with Teachers
                    </div>
                    <div class="card-body">
                        <p>Chat functionality will be implemented here.</p>
                    </div>
                </div>

                <!-- Join Video Conference -->
                <div class="card mb-4">
                    <div class="card-header">
                        Join Video Conference
                    </div>
                    <div class="card-body">
                        <p>Video conference functionality will be implemented here.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p>&copy; 2024 Our Learning Platform. All rights reserved.</p>
            <p>Contact us at: info@learningplatform.com</p>
        </div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
