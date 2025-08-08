    @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="email" value="{{ $email }}">
    <input type="hidden" name="code" value="{{ $code }}">
    <input type="password" name="password" placeholder="Nouveau mot de passe" required>
    <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
    <button type="submit">Réinitialiser</button>
</form>
