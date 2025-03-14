<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Reviews - Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
  @include('header')
  <div class="container mt-5">
    <h1 class="text-center">Website Reviews</h1>
    @if($reviews->isEmpty())
      <p class="text-center">No reviews yet.</p>
    @else
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Rating</th>
            <th>Comment</th>
            <th>Submitted At</th>
          </tr>
        </thead>
        <tbody>
          @foreach($reviews as $review)
            <tr>
            <td>
  @for ($i = 1; $i <= 5; $i++)
    @if($review->rating >= $i)
      <i class="fa-solid fa-star" style="color: #FFD700;"></i>
    @else
      <i class="fa-regular fa-star" style="color: #FFD700;"></i>
    @endif
  @endfor
</td>
              <td>{{ $review->comment }}</td>
              <td>{{ $review->created_at->format('Y-m-d H:i') }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>