<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            height: 100vh; /* Full height */
            display: flex; /* Use flexbox */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            margin: 0; /* Remove default margin */
        }
        .container {
            width: 60%;
            max-width: 800px; /* Optional: Set a maximum width */
            position: relative; /* For absolute positioning of the icon */
        }
        .book-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px; /* Size of the icon */
            cursor: pointer; /* Pointer cursor on hover */
            color: #007bff; /* Icon color */
        }
        .form-section {
            margin-bottom: 40px;
        }
        .form-section h3 {
            margin-bottom: 10px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .stepper {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .stepper div {
            width: 30%;
            text-align: center;
            padding: 15px;
            border-radius: 5px;
            background-color: #f0f0f0;
            color: #000;
        }
        .active {
            background-color: #007bff;
            color: white;
        }
        h1{
            padding-bottom:10%;
        }
    </style>
</head>
<body>
    <div class="container">
        <br>
        <!-- Back Button -->
        <a href="{{ route('home') }}" class="btn btn-secondary mb-3">
            <i class="fas fa-arrow-left"></i> Back
        </a>
        <a href="{{ route('booking.mybooking') }}" class="book-icon" title="View My Bookings">
            <i class="fas fa-calendar-alt"></i>
        </a>
        <h1>Booking Details</h1>
        
        <!-- Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Success</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ session('success') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stepper -->
        <div class="stepper">
            <div class="active">1. Select a date</div>
            <div>2. Select start & end time</div>
            <div>3. Select preferred venue & court</div>
        </div>

        <!-- Form Section -->
        <form action="{{ route('book.submit') }}" method="POST">
            @csrf
            <!-- Step 1: Select a Date -->
            <div class="form-section">
                <h4>Select a Date</h4>
                <input type="date" name="booking_date" class="form-control" required>
            </div>

            <!-- Step 2: Select Time and Duration -->
            <div class="form-section">
                <h4>Select a Start Time</h4>
                <select name="start_time" class="form-control" required>
                    <option value="" disabled selected>Select time</option>
                    <option value="08:00">08:00 AM</option>
                    <option value="08:30">08:30 AM</option>
                    <option value="09:00">09:00 AM</option>
                    <option value="09:30">09:30 AM</option>
                    <option value="10:00">10:00 AM</option>
                    <option value="10:30">10:30 AM</option>
                    <option value="11:00">11:00 AM</option>
                    <option value="11:30">11:30 AM</option>
                    <option value="12:00">12:00 PM</option>
                    <option value="12:30">12:30 PM</option>
                    <option value="13:00">13:00 PM</option>
                    <option value="13:30">13:30 PM</option>
                    <option value="14:00">14:00 PM</option>
                    <option value="14:30">14:30 PM</option>
                    <option value="15:00">15:00 PM</option>
                    <option value="15:30">15:30 PM</option>
                    <option value="16:00">16:00 PM</option>
                    <option value="16:30">16:30 PM</option>
                    <option value="17:00">17:00 PM</option>
                    <option value="17:30">17:30 PM</option>
                    <option value="18:00">18:00 PM</option>
                    <option value="18:30">18:30 PM</option>
                    <option value="19:00">19:00 PM</option>
                    <option value="19:30">19:30 PM</option>
                    <option value="20:00">20:00 PM</option>
                    <option value="20:30">20:30 PM</option>
                    <option value="21:00">21:00 PM</option>
                    <option value="21:30">21:30 PM</option>
                    <option value="22:00">22:00 PM</option>
                </select>
                <br>
                <h4>Select an End Time</h4>
                <select name="end_time" class="form-control" required>
                    <option value="" disabled selected>Select time</option>
                    <option value="08:00">08:00 AM</option>
                    <option value="08:30">08:30 AM</option>
                    <option value="09:00">09:00 AM</option>
                    <option value="09:30">09:30 AM</option>
                    <option value="10:00">10:00 AM</option>
                    <option value="10:30">10:30 AM</option>
                    <option value="11:00">11:00 AM</option>
                    <option value="11:30">11:30 AM</option>
                    <option value="12:00">12:00 PM</option>
                    <option value="12:30">12:30 PM</option>
                    <option value="13:00">13:00 PM</option>
                    <option value="13:30">13:30 PM</option>
                    <option value="14:00">14:00 PM</option>
                    <option value="14:30">14:30 PM</option>
                    <option value="15:00">15:00 PM</option>
                    <option value="15:30">15:30 PM</option>
                    <option value="16:00">16:00 PM</option>
                    <option value="16:30">16:30 PM</option>
                    <option value="17:00">17:00 PM</option>
                    <option value="17:30">17:30 PM</option>
                    <option value="18:00">18:00 PM</option>
                    <option value="18:30">18:30 PM</option>
                    <option value="19:00">19:00 PM</option>
                    <option value="19:30">19:30 PM</option>
                    <option value="20:00">20:00 PM</option>
                    <option value="20:30">20:30 PM</option>
                    <option value="21:00">21:00 PM</option>
                    <option value="21:30">21:30 PM</option>
                    <option value="22:00">22:00 PM</option>
                </select>
            </div>

            <!-- Step 3: Select Venue(s) -->
            <div class="form-section">
                <h4>Select Preferred Venue and Court</h4>
                <select name="venue" id="venue" class="form-control" required>
                    <option value="" disabled selected>Select venue</option>
                    @foreach($facilities as $facility)
                        @if($facility->status == 1) <!-- Only include facilities with status 1 -->
                            <option value="{{ $facility->facility_id }}">
                                Venue: {{ $facility->facility_name }} (Court: {{ $facility->facility_id }})
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-primary">Book</button>
        </form>
    </div>

    <script>
    $(document).ready(function() {
        @if(session('success'))
            $('#successModal').modal('show');
        @endif
    });
    </script>

</body>
</html>
