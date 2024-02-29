<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Borrar Cuenta') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Esta accion no se puede deshacer y no podrás recupertar tus datos') }}
        </p>
    </header>
    <div class="mt-3">
        @if(auth()->user()->id == 1)
            Al ser el administrador Super Usuario, no puedes eliminar tu cuenta
        @else
        <x-danger-button class="ms-3"   x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
            {{ __('Borrar Cuenta') }}
        </x-danger-button>
        @endif
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Estas seguro que deseas eliminar tu cuenta?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Una vez que se elimine tu cuenta, no podras recuperar tu información, y tus datos serás borrados de nuestro servidor') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Borrar Cuenta') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
