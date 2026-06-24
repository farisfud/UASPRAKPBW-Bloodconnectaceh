<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk / Daftar — BloodConnect Aceh</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="auth-page">
  <div class="auth-container">
    <div style="text-align:center;margin-bottom:20px">
      <a href="{{ route('home') }}" style="display:inline-flex;align-items:center;gap:6px;font-size:0.8125rem;color:var(--text-secondary);transition:var(--transition-fast)" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--text-secondary)'">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
        Kembali ke Beranda
      </a>
    </div>

    <div class="auth-card">
      <div class="auth-header">
        <div class="auth-logo">🩸</div>
        <h2 class="auth-title">BloodConnect Aceh</h2>
        <p class="auth-subtitle">Platform Donor Darah Sukarela Aceh</p>
      </div>

      <div class="auth-tabs">
        <button class="auth-tab active" data-target="formLogin">Masuk</button>
        <button class="auth-tab" data-target="formRegister">Daftar Akun</button>
      </div>

      <!-- LOGIN -->
      <div class="auth-form active" id="formLogin">
        @if(session('success'))
          <div class="alert alert-success" style="margin-bottom:18px; color: green; background-color: #e6fffa; border: 1px solid #38b2ac; padding: 12px; border-radius: 8px;">
            {{ session('success') }}
          </div>
        @endif
        <form id="loginForm" method="POST" action="{{ route('login') }}">
          @csrf
          @if($errors->any())
            <div class="alert alert-danger" style="margin-bottom:18px; color: red;">
              @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
              @endforeach
            </div>
          @endif
          <div class="form-group">
            <label class="form-label">Alamat Email</label>
            <input type="email" name="email" class="form-control" placeholder="nama@email.com" value="{{ old('email') }}" required>
          </div>
          <div class="form-group">
            <label class="form-label" style="display:flex;justify-content:space-between;align-items:center">
              <span>Password</span>
              <a href="#" style="font-size:0.72rem;color:var(--primary);font-weight:500">Lupa password?</a>
            </label>
            <div style="position:relative">
              <input type="password" name="password" class="form-control" id="loginPassword" placeholder="Password Anda" required>
              <button type="button" onclick="togglePwd('loginPassword',this)" style="position:absolute;right:11px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:var(--text-secondary);padding:2px;font-size:0.875rem;transition:var(--transition-fast)" title="Tampilkan password">👁</button>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-full" style="margin-top:4px;padding:11px">
            Masuk ke Akun
          </button>
        </form>

        <div class="auth-divider"><span>atau lanjutkan dengan</span></div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px">
          <button class="btn btn-ghost btn-sm" onclick="showToast('Segera tersedia','info')" style="border-color:var(--border)">
            <svg width="14" height="14" viewBox="0 0 24 24"><path fill="#4285f4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34a853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#fbbc05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#ea4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
            Google
          </button>
          <button class="btn btn-ghost btn-sm" onclick="showToast('Segera tersedia','info')" style="border-color:var(--border)">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="#1877f2"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
            Facebook
          </button>
        </div>
        <p style="text-align:center;margin-top:18px;font-size:0.8rem;color:var(--text-secondary)">
          Belum punya akun? 
          <button style="color:var(--primary);font-weight:600;background:none;border:none;cursor:pointer;font-size:0.8rem" onclick="switchTab('formRegister')">Daftar sekarang</button>
        </p>
      </div>

      <!-- REGISTER -->
      <div class="auth-form" id="formRegister">
        <div class="alert alert-info" style="margin-bottom:18px">
          <span class="alert-icon">💡</span>
          <div class="alert-content">
            <div class="alert-title">Satu Akun, Dua Peran</div>
            <div class="alert-desc">Anda bisa mencari donor sekaligus menjadi pendonor dengan satu akun. Profil donor dapat dilengkapi kapan saja.</div>
          </div>
        </div>
        <form id="registerForm" method="POST" action="{{ route('register') }}">
          @csrf
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Nama Lengkap</label>
              <input type="text" name="name" class="form-control" placeholder="Nama lengkap" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
              <label class="form-label">Nomor Kontak</label>
              <input type="tel" name="no_telepon" class="form-control" placeholder="08xxxxxxxxxx" value="{{ old('no_telepon') }}" required>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="nama@email.com" value="{{ old('email') }}" required>
          </div>
          <div class="form-group">
            <label class="form-label">Lokasi</label>
            <select name="lokasi" class="form-control" required>
              <option value="">— Pilih Kota/Kabupaten —</option>
              <option value="Banda Aceh">Banda Aceh</option><option value="Aceh Besar">Aceh Besar</option>
              <option value="Lhokseumawe">Lhokseumawe</option><option value="Langsa">Langsa</option>
              <option value="Meulaboh">Meulaboh</option><option value="Sigli">Sigli</option>
              <option value="Sabang">Sabang</option><option value="Lainnya">Lainnya</option>
            </select>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Password</label>
              <div style="position:relative">
                <input type="password" name="password" class="form-control" id="regPassword" placeholder="Min. 8 karakter" required>
                <button type="button" onclick="togglePwd('regPassword',this)" style="position:absolute;right:11px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:var(--text-secondary);font-size:0.875rem">👁</button>
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Konfirmasi Password</label>
              <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
            </div>
          </div>
          <div style="display:flex;gap:9px;align-items:flex-start;margin-bottom:18px">
            <input type="checkbox" id="agree" style="margin-top:3px;flex-shrink:0;accent-color:var(--primary)" required>
            <label for="agree" style="font-size:0.78125rem;color:var(--text);line-height:1.55">Saya menyetujui <a href="#" style="color:var(--primary)">Syarat & Ketentuan</a> serta <a href="#" style="color:var(--primary)">Kebijakan Privasi</a> BloodConnect Aceh.</label>
          </div>
          <button type="submit" class="btn btn-primary btn-full" style="padding:11px">Buat Akun</button>
        </form>
        <p style="text-align:center;margin-top:18px;font-size:0.8rem;color:var(--text-secondary)">
          Sudah punya akun? <button style="color:var(--primary);font-weight:600;background:none;border:none;cursor:pointer;font-size:0.8rem" onclick="switchTab('formLogin')">Masuk</button>
        </p>
      </div>
    </div>
  </div>
</div>

<div class="toast-container"></div>
<script src="assets/js/script.js"></script>
<script>
  function togglePwd(id, btn) {
    const el = document.getElementById(id);
    el.type = el.type === 'password' ? 'text' : 'password';
    btn.textContent = el.type === 'password' ? '👁' : '🙈';
  }
  function switchTab(target) {
    document.querySelectorAll('.auth-tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.auth-form').forEach(f => f.classList.remove('active'));
    document.querySelector(`[data-target="${target}"]`)?.classList.add('active');
    document.getElementById(target)?.classList.add('active');
  }
</script>
</body>
</html>
