<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - BloodConnect Aceh</title>
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
      <a href="<?php echo e(route('dashboard')); ?>" class="active"><span class="nav-icon">🏠</span> Dashboard</a>
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
      <a href="<?php echo e(route('pengaturan')); ?>"><span class="nav-icon">⚙️</span> Pengaturan</a>

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
        <h1 class="page-title">Dashboard</h1>
      </div>
      <div style="display:flex;align-items:center;gap:10px">
        <a href="<?php echo e(route('notifikasi')); ?>" class="btn btn-ghost btn-sm" style="position:relative">
          🔔
          <span style="position:absolute;top:-4px;right:-4px;width:16px;height:16px;background:var(--primary);color:white;border-radius:50%;font-size:0.6rem;font-weight:700;display:flex;align-items:center;justify-content:center">3</span>
        </a>
        <a href="<?php echo e(route('permintaan-darurat')); ?>" class="btn btn-primary btn-sm">+ Permintaan Baru</a>
      </div>
    </div>

    <div class="page-content">

      <!-- Welcome Card -->
      <div class="welcome-card">
        <div class="welcome-title">Selamat Datang di BloodConnect Aceh 🩸</div>
        <p class="welcome-subtitle">Platform donor darah sukarela untuk masyarakat Aceh. Masuk atau daftar akun untuk mulai mencari donor, mengajukan permintaan, dan mencatat riwayat donasi Anda.</p>
        <div class="welcome-actions">
          <a href="<?php echo e(route('cari-donor')); ?>" class="btn btn-white btn-sm">🔍 Lihat Donor</a>
        </div>
      </div>

      <!-- Stats Cards — Platform Stats (public) -->
      <div class="grid-4 mb-24">
        <div class="stat-card">
          <div class="stat-icon red">👥</div>
          <div class="stat-value"><?php echo e($stats['total_users']); ?></div>
          <div class="stat-label">Total Pengguna</div>
          <div class="stat-change up">↑ Bergabung terus bertambah</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon green">🩸</div>
          <div class="stat-value"><?php echo e($stats['total_donors']); ?></div>
          <div class="stat-label">Pendonor Terdaftar</div>
          <div class="stat-change up" style="color:var(--success)">● Aktif siap membantu</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon blue">📋</div>
          <div class="stat-value"><?php echo e($stats['active_requests']); ?></div>
          <div class="stat-label">Permintaan Aktif</div>
          <div class="stat-change up">↑ Butuh bantuan sekarang</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon yellow"></div>
          <div class="stat-value"><?php echo e($stats['successful_donations']); ?></div>
          <div class="stat-label">Donasi Berhasil</div>
          <div class="stat-change up" style="color:var(--success)">↑ Nyawa terselamatkan</div>
        </div>
      </div>

      <div class="grid-2">
        <!-- Permintaan Darurat Terbaru (publik) -->
        <div>
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
            <h4 style="font-size:1rem;font-weight:700;color:var(--text-strong)">🚨 Permintaan Darurat Terbaru</h4>
            <a href="<?php echo e(route('permintaan-darurat')); ?>" class="text-sm text-primary font-semibold">Lihat Semua →</a>
          </div>
          <div style="display:flex;flex-direction:column;gap:12px" id="emergencyRequestsContainer">
            <?php $__empty_1 = true; $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <div class="request-card urgency-<?php echo e(strtolower($r['urgency']) == 'darurat' ? 'darurat' : 'sedang'); ?>">
                <div class="request-header">
                  <div class="blood-badge" style="width:40px;height:40px;font-size:0.8rem"><?php echo e($r['bloodType']); ?><?php echo e($r['rhesus']); ?></div>
                  <div class="request-info">
                    <div class="request-patient"><?php echo e($r['patient']); ?></div>
                    <div class="request-hospital"><?php echo e($r['hospital']); ?> · <?php echo e($r['location']); ?></div>
                  </div>
                  <span class="badge badge-<?php echo e(strtolower($r['urgency']) == 'darurat' ? 'red' : 'yellow'); ?>"><span class="badge-dot"></span><?php echo e($r['urgency']); ?></span>
                </div>
                <p style="font-size:0.78rem;color:var(--text-secondary);margin-bottom:8px"><?php echo e($r['notes'] ?? 'Dibutuhkan segera donor darah.'); ?></p>
                <div style="font-size: 0.75rem; color: var(--text-secondary)">Hubungi: <strong><?php echo e($r['contact']); ?> (<?php echo e($r['phone']); ?>)</strong></div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <p class="text-sm text-light">Tidak ada permintaan aktif saat ini.</p>
            <?php endif; ?>
          </div>
        </div>

        <!-- Mulai Bergabung (CTA untuk tamu) -->
        <div>
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
            <h4 style="font-size:1rem;font-weight:700;color:var(--text-strong)">🌟 Mulai Bergabung</h4>
          </div>
          <div style="display:flex;flex-direction:column;gap:10px">
            <div class="notif-item" style="background:var(--red-50);border:1px solid var(--red-100);border-radius:var(--r-md);padding:12px">
              <div class="notif-icon" style="background:white">📝</div>
              <div class="notif-content">
                <div class="notif-title" style="color:var(--text-strong)">Daftar Akun Gratis</div>
                <div class="notif-time">Buat akun dalam 1 menit, tanpa biaya</div>
              </div>
              <a href="<?php echo e(route('profil-donor')); ?>" class="btn btn-primary btn-sm" style="flex-shrink:0">Profil</a>
            </div>
            <div class="notif-item" style="background:var(--gray-50);border:1px solid var(--border);border-radius:var(--r-md);padding:12px">
              <div class="notif-icon" style="background:white">🔍</div>
              <div class="notif-content">
                <div class="notif-title" style="color:var(--text-strong)">Cari Donor</div>
                <div class="notif-time">Lihat daftar pendonor tersedia di sekitar Anda</div>
              </div>
              <a href="<?php echo e(route('cari-donor')); ?>" class="btn btn-ghost btn-sm" style="flex-shrink:0">Cari</a>
            </div>
            <div class="notif-item" style="background:var(--gray-50);border:1px solid var(--border);border-radius:var(--r-md);padding:12px">
              <div class="notif-icon" style="background:white">📚</div>
              <div class="notif-content">
                <div class="notif-title" style="color:var(--text-strong)">Pelajari Donor Darah</div>
                <div class="notif-time">Syarat, manfaat, dan persiapan sebelum donor</div>
              </div>
              <a href="<?php echo e(route('edukasi')); ?>" class="btn btn-ghost btn-sm" style="flex-shrink:0">Baca</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Platform Info Card -->
      <div class="card mt-24">
        <div class="card-body" style="display:flex;gap:20px;flex-wrap:wrap;align-items:center">
          <div style="flex:1;min-width:200px">
            <h5 style="margin-bottom:8px">🩸 Tentang BloodConnect Aceh</h5>
            <p class="text-sm text-light">Platform donor darah sukarela yang menghubungkan pendonor dengan masyarakat yang membutuhkan secara cepat dan terorganisir di seluruh Aceh.</p>
          </div>
          <div style="display:flex;gap:16px;flex-wrap:wrap">
            <div class="donor-status-card" style="flex:1;min-width:150px">
              <div class="donor-status-icon" style="background:var(--red-50)">🔍</div>
              <div class="donor-status-content">
                <div class="donor-status-label">Pencarian Donor</div>
                <div class="donor-status-value" style="font-size:0.9rem">Berdasarkan gol. darah & lokasi</div>
              </div>
            </div>
            <div class="donor-status-card" style="flex:1;min-width:150px">
              <div class="donor-status-icon" style="background:#F0FFF4">🤝</div>
              <div class="donor-status-content">
                <div class="donor-status-label">Satu Akun</div>
                <div class="donor-status-value" style="font-size:0.9rem">Pendonor & peminta darah</div>
              </div>
            </div>
            <div class="donor-status-card" style="flex:1;min-width:150px">
              <div class="donor-status-icon" style="background:#EBF8FF">🔔</div>
              <div class="donor-status-content">
                <div class="donor-status-label">Notifikasi</div>
                <div class="donor-status-value" style="font-size:0.9rem">Cocok otomatis & real-time</div>
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
    donorStatus: "<?php echo e(auth()->user()->status_donor ?? 'Tersedia'); ?>",
    nextDonorDate: "<?php echo e($nextDonorDateStr); ?>"
  };

  window.dummyRequests = <?php echo json_encode($requests, 15, 512) ?>;
  window.myActiveRequestsCount = <?php echo e($myActiveRequestsCount); ?>;
  window.myContactedDonorsCount = <?php echo e($myContactedDonorsCount); ?>;
  window.nextDonorDateStr = "<?php echo e($nextDonorDateStr); ?>";
  window.daysLeftStr = "<?php echo e($daysLeftStr); ?>";
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
<?php /**PATH C:\Users\User\Desktop\informatika\UASLabPBOB_7-main\webportofolio\projectprakpbw-BloodConnect-Aceh-main (1)\backend-laravel\resources\views/dashboard.blade.php ENDPATH**/ ?>