<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <input type="text" name="name" id="name" value="{{ old('name') }}" />
        @error('name')
        <div>{{ $message }}</div>
        @enderror
        <input type="email" name="email" id="email" value="{{ old('email') }}" />
        @error('email')
        <div>{{ $message }}</div>
        @enderror
        <input type="password" name="password" id="password" />
        @error('password')
        <div>{{ $message }}</div>
        @enderror
        <input type="password" name="password_confirmation" id="password_confirmation" />
        @error('password_confirmation')
        <div>{{ $message }}</div>
        @enderror
        <button type="submit">Register</button>
    </form>
</body>

</html>