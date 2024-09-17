@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Detail</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
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
    .btn-outline-secondary
    {
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
        color: white;
        background-color: black;
    }
    .input-group-container {
      position: relative;
      z-index: 2; /* Ensure the input group appears above the overlay */
      width: 100%;
      max-width: 600px; /* Adjust the max-width as needed */
    }
    .form-control {
    border-radius: 20px;
    }
  </style>
<body class="p-5">
@include('navbar')
      <!-- Bootstrap JS -->
      

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
<!-- Main Content -->
    <main class="my-5">
        <div class="row" style="padding: 0px 0px;">
            <div class="col-md-8" style="padding: 0px 80px;">
                <!-- Course Details -->
                <div class="card my-5">
                <div class="card-header p-4">
                    <h5 class="card-title">Standard: {{ $course->standard }}</h5>
                    <h5 class="card-title">Subject: {{ $course->subject }}</h5>
                </div>
                <div class="card-body p-4">
                    <!-- Course Overview -->
                    <h6 class="card-subtitle mb-3 text-muted">Course Overview</h6>
                    <p class="card-text">{{ $course->description }}</p>
                    
                    <!-- Intro Video -->
                    <h6 class="card-subtitle mb-3 text-muted">Intro Video</h6>
                    <video width="100%" controls>
                        <source src="{{ asset('storage/' . $course->intro_video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>

                    <!-- Course Video -->
                    @php
                        $isEnrolled = \App\Models\Enrollment::where('student_id', auth()->id())
                                        ->where('course_id', $course->course_id)
                                        ->where('payment_status', 'completed')
                                        ->exists();
                    @endphp
                    
                    @if($isEnrolled)
                        <h6 class="card-subtitle my-3 text-muted">Course Video</h6>
                        <video width="100%" controls>
                            <source src="{{ asset('storage/' . $course->course_video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @else
                        <p class="text-danger mt-3">You must enroll in this course to access the full content.</p>
                    @endif
                </div>
            </div>

                <!-- Teacher Details -->
                <!-- <div class="card my-5">
                    <div class="card-header p-4">
                        <h5 class="card-title">{{ $course->teacher->name }}</h5>
                    </div>
                    <div class="card-body p-4">
                        <p class="card-text">{{ $course->teacher->bio }}</p>
                    </div>
                </div> -->

                <div class="card my-5">
                    <div class="card-header p-4">
                        <h5 class="card-title">Reviews</h5>
                    </div>
                    <div class="card-body p-4">
                    @if($reviews->isEmpty())
                        <p>There are no reviews.</p>
                    @else
                        @foreach($reviews as $review)
                            <div class="media mb-3">
                                <!-- Displaying the username -->
                                <div class="media-body">
                                    <h5 class="mt-0">{{ $review->username }}</h5> <!-- Displaying the username -->
                                    <p>{{ $review->review }}</p>
                                    <p>Rating: {{ $review->rating }}/5</p>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    </div>
                </div>

                <!-- Reviews -->


                @if(Auth::check())
                    <div class="card my-5">
                        <div class="card-header p-4">
                            <h5>Leave a Review</h5>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('reviews.store', $course->course_id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="review">Your Review</label>
                                    <textarea class="form-control" id="review" name="review" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="rating">Rating</label>
                                    <select class="form-control" id="rating" name="rating" required>
                                        <option value="1">1 - Poor</option>
                                        <option value="2">2 - Fair</option>
                                        <option value="3">3 - Good</option>
                                        <option value="4">4 - Very Good</option>
                                        <option value="5">5 - Excellent</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit Review</button>
                            </form>
                        </div>
                    </div>
                @endif


            </div>

            <div class="col-md-4">
                <!-- Purchase Section -->
                <div class="card my-5" style="background-color: white;">
                    <div class="card-header p-4">
                        <h5 class="card-title">Purchase Course</h5>
                        <h6 class="card-title">Price: ${{ $course->price }}</h6>
                    </div>
                    <div class="card-body p-4">
                        <button type="button" class="btn btn-dark btn-block" style="border-radius: 20px;">Buy Now</button>
                    </div>
                </div>

                <!-- Contact Teacher -->
                <div class="card my-5" style="background-color: white;">
                    <div class="card-header p-4">
                        <h5>Contact Teacher</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('chat.select') }}" method="POST">
                            @csrf
                            <input type="hidden" name="selected_user" value="{{ $teacherId }}">
                            <button type="submit" class="btn btn-block" style="background-color:black;color:white;border: 2px solid black;border-radius: 20px;">
                                Chat
                            </button>
                        </form>
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
