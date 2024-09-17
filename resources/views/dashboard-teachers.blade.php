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
                    <!-- <a href="#" class="list-group-item list-group-item-action">Search Courses</a> -->
                    <a href="#" class="list-group-item list-group-item-action">Create Course</a>
                    <!-- <a href="#" class="list-group-item list-group-item-action">Join Video Conference</a> -->
                </div>
            </nav>
            @if (session('success'))
                <script>
                    window.alert("{{ session('success') }}");
                </script>
            @endif

            @if (session('error'))
                <script>
                    window.alert("{{ session('error') }}");
                </script>
            @endif


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

                <div class="card mb-4">
                    <div class="card-header">
                        Create Course
                    </div>
                    <div class="card-body">
                        <form action="{{ route('courses.create') }}" method="POST" enctype="multipart/form-data">
                            @csrf <!-- This is required for security to prevent CSRF attacks -->

                            <!-- Title Field -->
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description Field -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Standard Field -->
                            <div class="form-group">
                                <label for="standard">Standard</label>
                                <input type="text" class="form-control @error('standard') is-invalid @enderror" id="standard" name="standard" value="{{ old('standard') }}">
                                @error('standard')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Subject Field -->
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}">
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Price Field -->
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Intro Video Field -->
                            <div class="form-group">
                                <label for="intro_video">Intro Video</label>
                                <input type="file" class="form-control-file @error('intro_video') is-invalid @enderror" id="intro_video" name="intro_video">
                                @error('intro_video')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Course Video Field -->
                            <div class="form-group">
                                <label for="course_video">Course Video</label>
                                <input type="file" class="form-control-file @error('course_video') is-invalid @enderror" id="course_video" name="course_video">
                                @error('course_video')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="thumbnail">Thumbnail Image</label>
                                <input type="file" class="form-control-file @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail">
                                @error('thumbnail')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Create Course</button>
                        </form>
                    </div>
                </div>


                <!-- Chat -->

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
