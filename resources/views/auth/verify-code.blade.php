<form method="POST" action="{{ route('password.code.verify') }}">
    @csrf
    <input type="email" name="email" value="{{ session('email') }}" readonly>
    <input type="text" name="code" placeholder="Code reçu par mail" required>
    <button type="submit">Vérifier le code</button>
</form>
