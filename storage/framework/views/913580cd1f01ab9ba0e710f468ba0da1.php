<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengaturan - BloodConnect Aceh</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>
<body>
<div class="layout-wrapper">

  <!-- SIDEBAR -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
      <div class="brand-icon">🩸</div>
      <div class="sidebar-brand-text">Blood<span>Connect</span><br><small style="font-weight:400;font-size:0.7rem;color:var(--text-secondary)">Aceh</small></div>
    </div>
    <nav class="sidebar-nav">
      <div class="nav-section-label">Utama</div>
      <a href="<?php echo e(route('dashboard')); ?>"><span class="nav-icon">🏠</span> Dashboard</a>
      <a href="<?php echo e(route('cari-donor')); ?>"><span class="nav-icon">🔍</span> Cari Donor</a>
      <a href="<?php echo e(route('permintaan-darurat')); ?>"><span class="nav-icon">🚨</span> Permintaan Darurat</a>
      <div class="nav-section-label">Riwayat</div>
      <a href="<?php echo e(route('riwayat-permintaan')); ?>"><span class="nav-icon">📋</span> Riwayat Permintaan</a>
      <a href="<?php echo e(route('permintaan-cocok')); ?>"><span class="nav-icon">🩸</span> Permintaan Cocok</a>
      <a href="<?php echo e(route('riwayat-donor')); ?>"><span class="nav-icon">📊</span> Riwayat Donor</a>
      <div class="nav-section-label">Profil</div>
      <a href="<?php echo e(route('profil-donor')); ?>"><span class="nav-icon">👤</span> Profil Donor</a>
      <a href="<?php echo e(route('edukasi')); ?>"><span class="nav-icon">📚</span> Edukasi</a>
      <a href="<?php echo e(route('notifikasi')); ?>"><span class="nav-icon">🔔</span> Notifikasi</a>
      <a href="<?php echo e(route('pengaturan')); ?>" class="active"><span class="nav-icon">⚙️</span> Pengaturan</a>
      <div class="nav-section-label">Lainnya</div>
      <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color:var(--danger)"><span class="nav-icon">🚪</span> Keluar</a>
    </nav>
    <div class="sidebar-footer">
      <div class="sidebar-user" onclick="window.location='<?php echo e(route('profil-donor')); ?>'" style="cursor:pointer">
        <div class="avatar"><?php echo e(substr(auth()->user()->name, 0, 2)); ?></div>
        <div class="sidebar-user-info">
          <div class="sidebar-user-name"><?php echo e(auth()->user()->name); ?></div>
          <div class="sidebar-user-role">Pendonor Aktif · <?php echo e(auth()->user()->gol_darah ?? '-'); ?><?php echo e(auth()->user()->rhesus ?? ''); ?></div>
        </div>
      </div>
    </div>
  </aside>
  <div class="sidebar-overlay" id="sidebarOverlay"></div>

  <!-- MAIN CONTENT -->
  <main class="main-content">
    <div class="page-header">
      <div style="display:flex;align-items:center;gap:12px">
        <button class="sidebar-toggle" id="sidebarToggle">☰</button>
        <h1 class="page-title">Pengaturan</h1>
      </div>
    </div>

    <div class="page-content">
      <!-- Success/Error Messages -->
      <?php if(session('success')): ?>
        <div class="alert alert-success mb-24">
          <span class="alert-icon">✅</span>
          <div class="alert-content">
            <div class="alert-desc"><?php echo e(session('success')); ?></div>
          </div>
        </div>
      <?php endif; ?>

      <?php if($errors->any()): ?>
        <div class="alert alert-danger mb-24" style="color: red; border-color: red;">
          <span class="alert-icon">❌</span>
          <div class="alert-content">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="alert-desc"><?php echo e($error); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      <?php endif; ?>

      <div class="grid-2" style="align-items:start;gap:24px">

        <!-- Account Settings -->
        <div style="display:flex;flex-direction:column;gap:20px">

          <div class="card">
            <div class="card-header">
              <span class="card-title">👤 Informasi Akun</span>
            </div>
            <div class="card-body">
              <!-- Avatar -->
              <div style="display:flex;align-items:center;gap:16px;margin-bottom:24px;padding-bottom:20px;border-bottom:1px solid var(--border)">
                <div class="profile-avatar"><?php echo e(substr(auth()->user()->name, 0, 2)); ?></div>
                <div>
                  <div style="font-weight:700;color:var(--text-strong);margin-bottom:4px"><?php echo e(auth()->user()->name); ?></div>
                  <div class="text-sm text-light mb-12"><?php echo e(auth()->user()->email); ?></div>
                  <button class="btn btn-ghost btn-sm" onclick="showToast('Fitur ganti foto akan segera tersedia', 'info')">📷 Ganti Foto</button>
                </div>
              </div>
              <form id="settingsForm" method="POST" action="<?php echo e(route('pengaturan.update')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                  <label class="form-label">Nama Lengkap</label>
                  <input type="text" name="name" class="form-control" value="<?php echo e(auth()->user()->name); ?>" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" value="<?php echo e(auth()->user()->email); ?>" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Nomor Kontak</label>
                  <input type="tel" name="phone" class="form-control" value="<?php echo e(auth()->user()->no_telepon); ?>" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Lokasi</label>
                  <select name="location" class="form-control" required>
                    <option value="Banda Aceh" <?php echo e(auth()->user()->lokasi == 'Banda Aceh' ? 'selected' : ''); ?>>Banda Aceh</option>
                    <option value="Aceh Besar" <?php echo e(auth()->user()->lokasi == 'Aceh Besar' ? 'selected' : ''); ?>>Aceh Besar</option>
                    <option value="Lhokseumawe" <?php echo e(auth()->user()->lokasi == 'Lhokseumawe' ? 'selected' : ''); ?>>Lhokseumawe</option>
                    <option value="Langsa" <?php echo e(auth()->user()->lokasi == 'Langsa' ? 'selected' : ''); ?>>Langsa</option>
                    <option value="Meulaboh" <?php echo e(auth()->user()->lokasi == 'Meulaboh' ? 'selected' : ''); ?>>Meulaboh</option>
                    <option value="Sigli" <?php echo e(auth()->user()->lokasi == 'Sigli' ? 'selected' : ''); ?>>Sigli</option>
                    <option value="Sabang" <?php echo e(auth()->user()->lokasi == 'Sabang' ? 'selected' : ''); ?>>Sabang</option>
                    <option value="Lainnya" <?php echo e(auth()->user()->lokasi == 'Lainnya' ? 'selected' : ''); ?>>Lainnya</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary btn-full">💾 Simpan Perubahan</button>
              </form>
            </div>
          </div>

          <!-- Change Password -->
          <div class="card">
            <div class="card-header">
              <span class="card-title">🔒 Ubah Password</span>
            </div>
            <div class="card-body">
              <form method="POST" action="<?php echo e(route('pengaturan.changePassword')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                  <label class="form-label">Password Saat Ini</label>
                  <input type="password" name="current_password" class="form-control" placeholder="Masukkan password saat ini" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Password Baru</label>
                  <input type="password" name="password" class="form-control" placeholder="Min. 8 karakter" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Konfirmasi Password Baru</label>
                  <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password baru" required>
                </div>
                <button type="submit" class="btn btn-ghost btn-full">🔑 Ubah Password</button>
              </form>
            </div>
          </div>
        </div>

        <!-- Notification & Other Settings -->
        <div style="display:flex;flex-direction:column;gap:20px">

          <!-- Notification Settings -->
          <div class="card">
            <div class="card-header">
              <span class="card-title">🔔 Pengaturan Notifikasi</span>
            </div>
            <div class="card-body">
              <p class="text-sm text-light mb-20">Kelola notifikasi yang ingin Anda terima dari BloodConnect Aceh.</p>
              <div style="display:flex;flex-direction:column;gap:16px">
                <div style="display:flex;align-items:center;justify-content:space-between;padding:12px;background:var(--surface-2);border-radius:var(--r-sm)">
                  <div>
                    <div style="font-weight:600;font-size:0.875rem;color:var(--text-strong)">🩸 Permintaan Donor Cocok</div>
                    <div class="text-xs text-light mt-4">Notifikasi saat ada permintaan yang cocok dengan profil donor Anda</div>
                  </div>
                  <label class="toggle">
                    <input type="checkbox" checked onchange="showToast(this.checked ? 'Notifikasi diaktifkan' : 'Notifikasi dinonaktifkan', 'success')">
                    <span class="toggle-slider"></span>
                  </label>
                </div>
                <div style="display:flex;align-items:center;justify-content:space-between;padding:12px;background:var(--surface-2);border-radius:var(--r-sm)">
                  <div>
                    <div style="font-weight:600;font-size:0.875rem;color:var(--text-strong)">📋 Status Permintaan</div>
                    <div class="text-xs text-light mt-4">Update status permintaan donor yang Anda buat</div>
                  </div>
                  <label class="toggle">
                    <input type="checkbox" checked onchange="showToast(this.checked ? 'Notifikasi diaktifkan' : 'Notifikasi dinonaktifkan', 'success')">
                    <span class="toggle-slider"></span>
                  </label>
                </div>
              </div>
            </div>
          </div>

          <!-- Privacy Settings -->
          <div class="card">
            <div class="card-header">
              <span class="card-title">🔐 Privasi & Keamanan</span>
            </div>
            <div class="card-body">
              <div style="display:flex;flex-direction:column;gap:12px">
                <div style="display:flex;align-items:center;justify-content:space-between;padding:12px;background:var(--surface-2);border-radius:var(--r-sm)">
                  <div>
                    <div style="font-weight:600;font-size:0.875rem;color:var(--text-strong)">Tampilkan Profil di Pencarian</div>
                    <div class="text-xs text-light mt-4">Izinkan pengguna lain menemukan profil donor Anda</div>
                  </div>
                  <label class="toggle">
                    <input type="checkbox" checked onchange="showToast('Pengaturan privasi disimpan', 'success')">
                    <span class="toggle-slider"></span>
                  </label>
                </div>
              </div>
            </div>
          </div>

          <!-- Danger Zone -->
          <div class="card" style="border-color:var(--primary-light)">
            <div class="card-header">
              <span class="card-title" style="color:var(--danger)">⚠️ Zona Berbahaya</span>
            </div>
            <div class="card-body">
              <p class="text-sm text-light mb-16">Tindakan di bawah ini bersifat permanen dan tidak dapat dibatalkan.</p>
              <div style="display:flex;flex-direction:column;gap:10px">
                <button class="btn btn-ghost btn-full" style="justify-content:flex-start;color:var(--warning);border-color:var(--warning)" onclick="showToast('Fitur nonaktif akun akan segera tersedia', 'warning')">⏸️ Nonaktifkan Akun Sementara</button>
                <button class="btn btn-ghost btn-full" style="justify-content:flex-start;color:var(--danger);border-color:var(--danger)" onclick="showToast('Untuk hapus akun, hubungi admin', 'error')">🗑️ Hapus Akun Secara Permanen</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>
</div>

<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
</form>

<div class="toast-container"></div>
<script>
  window.currentUser = {
    id: <?php echo e(auth()->id()); ?>,
    name: "<?php echo e(auth()->user()->name); ?>",
    email: "<?php echo e(auth()->user()->email); ?>",
    phone: "<?php echo e(auth()->user()->no_telepon); ?>",
    location: "<?php echo e(auth()->user()->lokasi); ?>",
    avatar: "<?php echo e(substr(auth()->user()->name, 0, 2)); ?>",
    isDonorActive: <?php echo e(auth()->user()->is_donor ? 'true' : 'false'); ?>,
    bloodType: "<?php echo e(auth()->user()->gol_darah); ?>",
    rhesus: "<?php echo e(auth()->user()->rhesus ?? '+'); ?>",
    weight: <?php echo e(auth()->user()->berat_badan ?? 70); ?>,
    lastDonorDate: "<?php echo e(auth()->user()->donationHistories()->latest()->first()?->tanggal_donor ?? ''); ?>",
    healthNotes: "<?php echo e(auth()->user()->catatan_kesehatan ?? ''); ?>",
    donorStatus: "<?php echo e(auth()->user()->status_donor ?? 'Tersedia'); ?>"
  };
</script>
<script src="assets/js/script.js"></script>
<script>
  <?php if(auth()->guard()->check()): ?>
    localStorage.setItem('bc_logged_in', '1');
    localStorage.setItem('bc_user', JSON.stringify(window.currentUser));
  <?php else: ?>
    localStorage.removeItem('bc_logged_in');
    localStorage.removeItem('bc_user');
  <?php endif; ?>
</script>
</body>
</html>
<?php /**PATH C:\Users\User\Desktop\informatika\UASLabPBOB_7-main\webportofolio\projectprakpbw-BloodConnect-Aceh-main (1)\backend-laravel\resources\views/pengaturan.blade.php ENDPATH**/ ?>