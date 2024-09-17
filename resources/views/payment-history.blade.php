@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Payment History Page</title>
  <style>
    .card {
      border-radius: 20px;
      background-color: #E7E8D8;
      border: none; /* Remove card border */
    }
    
    .table {
      border-collapse: separate; /* Allows custom spacing between rows */
      border-spacing: 0 1px; /* Add spacing between rows */
    }

    .table thead th {
      background-color: #E7E8D8; /* Match header background color with card */
      border-bottom: 1px solid #dee2e6; /* Optional: border for header */
    }
    
    .table tbody tr {
      background-color: #E7E8D8; /* Set row background color */
      border-bottom: 1px solid #dee2e6; /* Add border between rows */
    }

    .table tbody tr:last-child {
      border-bottom: none; /* Remove border from the last row */
    }

    .table td, .table th {
      border: none; /* Remove cell borders */
    }
    .btn-outline-secondary
    {
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
    }
  </style>
</head>
<body>
@include('navbar')

<div class="container mt-5">
    <h1 class="mb-4">Payment History</h1>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Payment ID</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment->payment_id }}</td>
                            <td>{{ $payment->amount }}</td>
                            <td>{{ $payment->payment_method }}</td>
                            <td>{{ $payment->payment_status }}</td>
                            <td>{{ $payment->transaction_id }}</td>
                            <td>{{ $payment->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
