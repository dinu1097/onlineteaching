<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
@include('navbar')

<form method="POST" action="{{ route('register') }}">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')<div>{{ $message }}</div>@enderror
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')<div>{{ $message }}</div>@enderror
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        @error('password')<div>{{ $message }}</div>@enderror
    </div>
    <div>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
    </div>
    <div>
        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
            <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
        </select>
        @error('role')<div>{{ $message }}</div>@enderror
    </div>
    <button type="submit">Register</button>
</form>

</body>
</html>
