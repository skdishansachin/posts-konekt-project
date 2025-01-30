<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <input type="email" name="email" id="email" value="{{ old('email') }}" />
        @error('email')
        <div>{{ $message }}</div>
        @enderror
        <input type="password" name="password" id="password" />
        <input type="checkbox" name="remember" id="remember" />
        <button type="submit">Login</button>
    </form>
</body>

</html>