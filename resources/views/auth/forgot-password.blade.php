    @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

<form method="POST" action="{{ route('password.code.send') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Envoyer le code</button>
</form>