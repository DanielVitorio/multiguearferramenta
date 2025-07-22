<div>
<header class="fi-simple-header py-8">
    <h1 class="fi-header-heading text-3xl font-bold tracking-tight text-gray-500 dark:texte-gray-400">Editar Meu Perfil</h1>
    <br>
    <div class="main" style="display: flex; flex-direction: row; align-items: center;">
        <div class="avatar" style="width: 100px; height: 100px; background-color: #000; border: gray solid 2px; border-radius: 50%; margin-right: 30px;">
            <img style="width: 100%; border-radius: 50%;" src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&color=FFFFFF&background=#000" alt="Avatar">
        </div>
        <div class="title">
            <h1 class="fi-header-heading text-2xl font-bold tracking-tight text-gray-500 dark:text-white">
            {{ auth()->user()->name }}
            </h1>
            <p class="text-gray-500">
            {{ auth()->user()->username}}
            </p>
        </div>
    </div>
</header>

    <x-filament-panels::form id="form" wire:submit="save">
        {{ $this->form }}

        <x-filament-panels::form.actions
            :actions="$this->getCachedFormActions()"
            :full-width="$this->hasFullWidthFormActions()"
            alignment="right"
        />
    </x-filament-panels::form>
</div>

