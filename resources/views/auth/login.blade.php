<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @if(session('mensagem'))
        <div class="bg-green-100 border-t border-b border-gray-200 px-4 py-3" role="alert">
            <br>
            <p class="text-xl">{{session('mensagem')}}</p>
            <br>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="usuario" :value="__('Usuário')" />
            <x-text-input id="usuario" class="block mt-1 w-full" type="text" name="usuario" :value="old('usuario')" required autofocus autocomplete="username" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            @if(Session::has('errors'))
                <div role="alert">
                    <div class="text-white font-bold rounded-t px-4 py-2">
                        Senha incorreta.
                    </div>
                </div>
                <script>
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 1000*10);
                </script>
            @endif
        </div>



        <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-red-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                    {{ __('Não é inscrito? cadastre-se') }}
                </a>

            <x-primary-button class="ml-3 bg-red-500">
                {{ __('Entrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
