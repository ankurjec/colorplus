<form method="post" action="{{ route('profile.updatesiteuser') }}" class="mt-6 space-y-6">
    @csrf
    @method('patch')

    <div>
        <label>Name</label>

        <input class="form-control" type="text" name="name" value="{{ $accountData['name'] }}" required autofocus
            autocomplete="name" />
    </div>

    <div>
        <x-input-label for="email" :value="__('Email')" />

        <input class="form-control" type="text" name="email" value="{{ $accountData['email'] }}" readonly autofocus
            autocomplete="email" />
        <div class="flex items-center gap-4">
            <br>

            <button type="submt" class="btn btn-primary">SAVE</button>
            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
</form>