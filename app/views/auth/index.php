<form role="form" action="<?= BASE_URL ?>login/handleLogin" method="POST" class="text-start">
        <div class="input-group input-group-outline my-3">
        <label class="form-label">Username / Kode anggota</label>
        <input type="text" name="username" class="form-control">
    </div>
    <div class="input-group input-group-outline mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="text-center">
        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
    </div>
</form>