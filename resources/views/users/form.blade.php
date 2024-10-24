<div class="mb-3">
     <label for="name">Nama</label>
     <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="form-control" required>
</div>
<div class="mb-3">
     <label for="email">Email</label>
     <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="form-control" aria-describedby="emailHelp" required>
</div>
<div class="mb-3">
     <label for="password">Password</label>
     <input type="password" name="password" class="form-control" {{ isset($user) ? '' : 'required' }}>
     @if(isset($user))
          <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah password.</small>
     @endif
</div>
<div class="mb-3">
     <label for="password_confirmation">Konfirmasi Password</label>
     <input type="password" name="password_confirmation" class="form-control" {{ isset($user) ? '' : 'required' }}>
</div>
<div class="mb-3">
     <label for="role">Role</label>
     <select name="role" class="form-control" required>
          <option value="" disabled {{ !isset($user) ? 'selected' : '' }}>Pilih role....</option>
          @foreach($roles as $role)
               <option value="{{ $role->name }}" {{ (old('role', isset($user) ? $user->getRoleNames()->first() : '') === $role->name) ? 'selected' : '' }}>
                    {{ $role->name }}
               </option>
          @endforeach
     </select>
</div>
<div class="">
     <button type="submit" class="btn btn-primary">Simpan</button>
     <a href="/users" class="btn btn-danger">Kembali</a>
</div>