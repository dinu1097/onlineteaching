@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'Akira Expanded';
            src: url('{{ asset('fonts/fonnts.com-Domus_Titling.otf') }}') format('opentype');
            font-weight: normal;
            font-style: normal;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Akira Expanded', sans-serif;
        }

        header {
            position: relative;
            border-radius: 20px;
            height: 80vh;
            background-image: url('{{ asset('images/hero.jpg') }}');
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

        .card {
            background-color: white;
            border-radius: 20px;
            border: none;
        }

        .card-header {
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, 0);
            border-bottom: 1px solid rgba(0, 0, 0, .125);
        }

        .card-img-top {
            border-radius: 20px;
        }

        footer {
            border-radius: 20px;
        }

        .text-content {
            position: relative;
            z-index: 2; /* Ensure the text appears above the overlay */
        }

        .input-group-container {
            position: relative;
            z-index: 2; /* Ensure the input group appears above the overlay */
            width: 100%;
            max-width: 600px; /* Adjust the max-width as needed */
        }

        .btn-outline-secondary {
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
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
            <form class="d-flex align-items-center" action="{{ route('courses.find') }}" method="GET">
                <input type="text" class="form-control me-2" placeholder="Standard" name="standard">
                <input type="text" class="form-control me-2" placeholder="Subject" name="subject">
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </header>


    <!-- Main Content -->
    <main class="container my-5">
        <!-- Search Bar -->
        <!-- <div class="row mb-4">
            <div class="col-md-8 offset-md-2">
                <form class="d-flex align-items-center" action="{{ route('courses.find') }}" method="GET">
                    <input type="text" class="form-control me-2" placeholder="Standard" name="standard">
                    <input type="text" class="form-control me-2" placeholder="Subject" name="subject">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div> -->

        <section>
            <h2 class="text-center mb-4">Featured Courses</h2>
            <div class="row">
                @if ($courses->isEmpty())
                    <p class="text-center w-100">No courses available.</p>
                @else
                    <!-- Iterate over courses with pagination -->
                    @foreach ($courses as $course)
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm">
                                <img src="{{ asset('storage/' . $course->thumbnail) }}" class="card-img-top" alt="Course Image">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $course->title }}</h5>
                                    <p class="card-text">{{ $course->description }}</p>
                                    <a href="{{ route('courses.show', ['id' => $course->course_id]) }}" class="btn" style="background-color: black; color: white; border-radius: 20px;">View Course</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Pagination Links -->
            <div class="mx-auto mt-5">
                {{ $courses->links() }}
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p>&copy; 2024 Our Learning Platform. All rights reserved.</p>
            <p>Contact us at: info@learningplatform.com</p>
        </div>
    </footer>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>

</html>
