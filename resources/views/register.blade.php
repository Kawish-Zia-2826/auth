<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    {{-- Super Global Errors --}}
    @if ($errors->any())
        <div style="color: red;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    {{-- Registration Form --}}
    <form method="POST" action="{{ route('registerSave') }}">
        @csrf
        <label>Name:</label>
        <input type="text" name="name"  >
        <br>

        <label>Email:</label>
        <input type="email" name="email"  >
        <br>

        <label>Password:</label>
        <input type="password" name="password" >
        <br>

        <label>Confirm Password:</label>
        <input type="password" name="password_confirmation" >
        <br>

        <button type="submit">Register</button>
    </form>
    <a class="btn btn-dark" href="/">back</a>
  
</body>
</html>
