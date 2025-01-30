<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('verification.send') }}" method="post">
        @csrf
        <button type="submit">send link</button>
    </form>
</body>
</html>