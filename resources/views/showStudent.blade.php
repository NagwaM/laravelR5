<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compitable" content="ie=edge">
    <title>Show {{ $student->studenttName }}</title>
</head>
<body>
    <h1><strong>Student: </strong>{{ $student->studenttName}}</h1>
    <hr>
    <h2><strong>Age: </strong>{{ $student->age}}</h1>
    <hr>
</body>
</html>