<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Reviews - Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <style>
      body {
          background-color: #ded4c0;
          font-family: 'Arial', sans-serif;
      }
      .container {
          background: white;
          padding: 30px;
          border-radius: 12px;
          box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
          margin-top: 50px;
          max-width: 800px;
      }
      h1 {
          color: #5a4e3a;
          font-weight: bold;
          text-align: center;
          margin-bottom: 20px;
      }
      .table th {
          background-color:rgb(0, 0, 0);
          color: white;
          text-align: center;
      }
      .table td {
          vertical-align: middle;
          text-align: center;
      }
      #star-rating {
    display: flex;
    gap: 5px;
    margin-top: 8px;
}


.star {
    font-size: 24px;
    color: #ccc;
    cursor: pointer;
    transition: color 0.2s ease-in-out;
}
.black-button {
            background-color: black;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            
        }
        .black-button:hover {
            background-color: #333;
        }



  </style>
</head>
<body>
  @include('header')

  <div class="container">
    <div class="text-center mb-4">
    <h1>Website Reviews</h1>
        <h3>Average Rating</h3>
        <p>
            <strong>{{ number_format($averageWebsiteRating, 1) }}</strong> / 5
            <br>
            @for ($i = 1; $i <= 5; $i++)
                @if($averageWebsiteRating >= $i)
                    <i class="fas fa-star" style="color: #FFD700;"></i>
                @elseif($averageWebsiteRating >= $i - 0.5)
                    <i class="fas fa-star-half-alt" style="color: #FFD700;"></i>
                @else
                    <i class="far fa-star" style="color: #FFD700;"></i>
                @endif
            @endfor
        </p>
    </div>
   
    @if($reviews->isEmpty())
      <p class="text-center">No reviews yet.</p>
    @else
      <table class="table table-bordered table-striped">
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
              <td class="star-rating">
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
    <div class="mt-4 text-center">
        <a href="{{ route('admin.dashboard') }}" class="black-button btn btn-secondary">Back to Dashboard</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
@include('footer')
</html>
