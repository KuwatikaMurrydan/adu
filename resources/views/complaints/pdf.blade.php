<!DOCTYPE html>
<html>
<head>
    <title>Complaints Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Complaints Report</h2>
        <p>Generated on: {{ date('F d, Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            @foreach($complaints as $complaint)
                <tr>
                    <td>{{ $complaint->created_at->format('Y-m-d') }}</td>
                    <td>{{ $complaint->title }}</td>
                    <td>{{ $complaint->category->name }}</td>
                    <td>{{ ucfirst($complaint->status) }}</td>
                    <td>{{ $complaint->location }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Public Complaint System - {{ date('Y') }}</p>
    </div>
</body>
</html>