<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container">
        <br><br><br>
        <!-- Back Button -->
        <a href="{{ route('booking.book') }}" class="btn btn-secondary mb-3">
            <i class="fas fa-arrow-left"></i> Back
        </a>

        <h1>My Bookings</h1>
        <br>
        @if($bookings->isEmpty())
            <p>No bookings found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Booking Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $booking->booking_date }}</td>
                            <td>{{ $booking->time_from }}</td>
                            <td>{{ $booking->time_to }}</td>
                            <td>{{ $booking->facility_id }}</td>
                            <td>
                            @if ($booking->status == 0)
                                Pending
                            @elseif ($booking->status == 1)
                                Approved
                            @elseif ($booking->status == 2)
                                Rejected
                            @else
                                Cancelled
                            @endif
                            </td>
                            <td>
                                @if($booking->status == 0) <!-- Only show cancel button if active -->
                                    <form action="{{ route('booking.cancel', $booking->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE') <!-- Use DELETE method for cancellation -->
                                        <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                    </form>
                                @else
                                    <span></span>
                                @endif
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
