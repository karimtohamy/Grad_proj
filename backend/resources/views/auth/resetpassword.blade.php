<div class="bg-green-500">
    <form action="{{ route('reset.password') }}" method="post">
        @csrf
        <input type="password" name="password">
        <input type="password" name="password_confirmation">
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="token" value="{{ $token }}">

        <button type="submit">reset password</button>
    </form>
</div>
