@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Profile Page</title>
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

    footer {
      border-radius: 20px;
    }
    .btn-outline-secondary
    {
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
    }
  </style>
</head>
<body class="p-5">
@include('navbar')


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

  <div class="container mt-5">
    <h1 class="mb-4">Profile</h1>
    <div class="card p-5 mt-5">
        <div class="card-body">
            <h5 class="card-title my-3">User Information</h5>
            <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p><strong>Role:</strong> {{ auth()->user()->role }}</p>
            <p><strong>Created At:</strong> {{ auth()->user()->created_at->format('F j, Y, g:i a') }}</p>
            <!-- <p><strong>Updated At:</strong> {{ auth()->user()->updated_at->format('F j, Y, g:i a') }}</p> -->
            <button class="btn" style="background-color: black;color: white;border-radius: 20px;" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
        </div>
    </div>
</div>

  <!-- Edit Profile Modal -->
  <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" value="John Doe">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" value="john.doe@example.com">
            </div>
            <button type="button" class="btn" style="background-color: black;color: white;border-radius: 20px;">Save changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
