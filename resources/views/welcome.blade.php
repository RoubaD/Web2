<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa; /* Light background color */
        }

        .big-button {
            padding: 20px 40px;
            font-size: 24px;
            color: white;
            background-color: #007bff; /* Bootstrap primary color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .big-button:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
    </style>
</head>
<body>
    <a href="{{ route('students.index') }}" class="big-button">LAB1 HERE</a>
</body>
</html>
