<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <label for="current_password">Current Password</label>
    <input type="password" name="current_password" required>

    <label for="new_password">New Password</label>
    <input type="password" name="new_password" required>

    <label for="new_password_confirmation">Confirm New Password</label>
    <input type="password" name="new_password_confirmation" required>

    <button type="submit">Change Password</button>
</form>
