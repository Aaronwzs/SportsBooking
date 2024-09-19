<!-- resources/views/booking.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Booking List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .sidebar {
            width: 10%;
            background-color: #333;
            color: #fff;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .sidebar h2 {
            color: #fff;
            margin-top: 0;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 20px 0;
        }
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            display: block;
            padding: 10px;
            border-radius: 4px;
        }
        .sidebar ul li a:hover {
            background-color: #575757;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
            overflow-x: auto; /* Enable horizontal scrolling */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
            text-align: left;
            margin-left:-1%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #45b6fe; /* Example color for table header */
            color: #fff;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f4f4f4;
        }
        tr:hover {
            background-color: #e0e0e0;
        }
        caption {
            caption-side: top;
            font-weight: bold;
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .action-buttons {
            display: flex;
        }
        .btn-approve {
            background-color: #28a745; /* Green color for approve */
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-reject {
            background-color: #dc3545; /* Red color for reject */
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-approve:hover, .btn-reject:hover {
            opacity: 0.8; /* Slight opacity on hover */
        }

        /* Fixed column widths */
        th:nth-child(1), td:nth-child(1) { width: 2%; }
        th:nth-child(2), td:nth-child(2) { width: 10%; }
        th:nth-child(3), td:nth-child(3) { width: 5%; }
        th:nth-child(4), td:nth-child(4) { width: 5%; }
        th:nth-child(5), td:nth-child(5) { width: 10%; }
        th:nth-child(6), td:nth-child(6) { width: 10%; }
        th:nth-child(7), td:nth-child(7) { width: 10%; }
        th:nth-child(8), td:nth-child(8) { width: 10%; }
        th:nth-child(9), td:nth-child(9) { width: 15%; }
        th:nth-child(10), td:nth-child(10) { width: 15%; }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2> Admin Panel</h2>
        <ul>
            <li><a href="{{ route('admin.booking') }}">Bookings</a></li>
        </ul>
    </div>

    <div class="content">
        <table>
            <caption><h1>Booking List</h1></caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ref Code</th>
                    <th>User ID</th>
                    <th>Facility ID</th>
                    <th>Booking Date</th>
                    <th>Time From</th>
                    <th>Time To</th>
                    <th>Status</th>
                    <th>Date Created</th>
                    <th>Date Updated</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr>
                        <td>{{ $row->id ?? 'N/A' }}</td>
                        <td>{{ $row->ref_code ?? 'N/A' }}</td>
                        <td>{{ $row->user_id ?? 'N/A' }}</td>
                        <td>{{ $row->facility_id ?? 'N/A' }}</td>
                        <td>{{ $row->booking_date ?? 'N/A' }}</td>
                        <td>{{ $row->time_from ?? 'N/A' }}</td>
                        <td>{{ $row->time_to ?? 'N/A' }}</td>
                        <td>
                            @if ($row->status == 0)
                                Pending
                            @elseif ($row->status == 1)
                                Approved
                            @else
                                Rejected
                            @endif
                        </td>
                        <td>{{ $row->date_created ?? 'N/A' }}</td>
                        <td>{{ $row->date_updated ?? 'N/A' }}</td>
                        <td>
                            @if ($row->status == 0)
                                <form action="{{ route('approve.booking', $row->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-approve">Approve</button>
                                </form>
                                <form action="{{ route('reject.booking', $row->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-reject">Reject</button>
                                </form>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <div class="record-count">
                Total Records: {{ $totalRecords }}
        </div>
    </div>

</body>
</html>
