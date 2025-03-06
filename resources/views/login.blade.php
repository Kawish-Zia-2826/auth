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
    <form method="POST" action="{{ route('loginMatch') }}">
        @csrf
       

        <label>Email:</label>
        <input type="email" name="email"  required>
        <br>

        <label>Password:</label>
        <input type="password" name="password" required>
        <br>

        
        <button type="submit">login</button>
    </form>
    <a class="btn btn-dark" href="/">back</a>
  
</body>
</html>
