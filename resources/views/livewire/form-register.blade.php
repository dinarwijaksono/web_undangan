<section>
    @if (session('registerFailed'))
        <div class="alert alert-danger" role="alert"><?= session('registerFailed') ?></div>
    @endif

    <div class="form-group">
        <label>Username</label>
        <input class="form-control" wire:model="username" type="text" placeholder="Username"
            value="{{ old('username') }}" />
        @error('username')
            <p class="help-block" style="color: red;"><?= $message ?></p>
        @enderror
    </div>

    <div class="form-group">
        <label>Email</label>
        <input class="form-control" wire:model="email" type="text" placeholder="Email" value="{{ old('email') }}" />
        @error('email')
            <p class="help-block" style="color: red;"><?= $message ?></p>
        @enderror
    </div>

    <div class="form-group">
        <label>Password</label>
        <input class="form-control" wire:model="password" type="password" placeholder="password" />
        @error('password')
            <p class="help-block" style="color: red;"><?= $message ?></p>
        @enderror
    </div>

    <div class="form-group">
        <label>Konfirmasi password</label>
        <input class="form-control" wire:model="password_confirmation" type="password"
            placeholder="konfirmasi password" />
        @error('password_confirmation')
            <p class="help-block" style="color: red;"><?= $message ?></p>
        @enderror
    </div>

    <button type="button" wire:click="doRegister" class="btn btn-info btn-block">Daftar</button>

</section>
