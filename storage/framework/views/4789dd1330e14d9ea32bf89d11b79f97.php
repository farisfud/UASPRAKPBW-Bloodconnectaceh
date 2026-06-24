<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Permintaan Cocok - BloodConnect Aceh</title>
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
      <a href="<?php echo e(route('permintaan-cocok')); ?>" class="active"><span class="nav-icon">🩸</span> Permintaan Cocok</a>
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
        <h1 class="page-title">Permintaan Donor yang Cocok</h1>
      </div>
      <div style="display:flex;gap:10px;align-items:center">
        <span class="badge badge-red" style="font-size:0.8rem;padding:6px 12px;font-weight:800"><?php echo e(auth()->user()->gol_darah ?? '-'); ?><?php echo e(auth()->user()->rhesus ?? ''); ?></span>
        <?php if(auth()->user()->is_donor): ?>
          <span class="badge badge-green"><span class="badge-dot"></span>Tersedia</span>
        <?php else: ?>
          <span class="badge badge-gray">Nonaktif</span>
        <?php endif; ?>
      </div>
    </div>

    <div class="page-content">

      <!-- Donor Profile Status -->
      <div class="alert alert-success mb-20">
        <span class="alert-icon">✅</span>
        <div class="alert-content">
          <div class="alert-title">Profil Donor Aktif</div>
          <div class="alert-desc">Anda terdaftar sebagai pendonor aktif dengan golongan darah <strong><?php echo e(auth()->user()->gol_darah ?? '-'); ?><?php echo e(auth()->user()->rhesus ?? ''); ?></strong> di <strong><?php echo e(auth()->user()->lokasi ?? 'Banda Aceh'); ?></strong>. Permintaan di bawah cocok dengan profil donor Anda.</div>
        </div>
      </div>

      <!-- Info -->
      <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;flex-wrap:wrap;gap:12px">
        <div>
          <h4 style="font-size:1rem;font-weight:700;color:var(--text-strong)">Permintaan yang Cocok dengan Profil Anda</h4>
          <p class="text-sm text-light">Cocok berdasarkan: Golongan Darah <?php echo e(auth()->user()->gol_darah ?? '-'); ?>, Rhesus <?php echo e(auth()->user()->rhesus ?? ''); ?>, Lokasi <?php echo e(auth()->user()->lokasi ?? '-'); ?></p>
        </div>
        <a href="<?php echo e(route('profil-donor')); ?>" class="btn btn-ghost btn-sm">👤 Ubah Profil Donor</a>
      </div>

      <!-- Matched Requests Grid -->
      <div class="grid-auto" id="matchedRequestsGrid">
        <!-- Rendered by JS -->
      </div>

    </div>
  </main>
</div>

<!-- MODAL: WILLING TO DONATE -->
<div class="modal-overlay" id="modalWilling">
  <div class="modal" style="max-width:420px">
    <div class="modal-header">
      <h3 class="modal-title">🩸 Konfirmasi Bersedia Donor</h3>
      <button class="modal-close">✕</button>
    </div>
    <div class="modal-body">
      <div style="text-align:center;padding:8px 0 16px">
        <div style="font-size:2.5rem;margin-bottom:12px">🩸</div>
        <p style="color:var(--text);line-height:1.7">Anda akan menyatakan <strong>bersedia membantu donor darah</strong> untuk permintaan ini. Penanggung jawab akan dapat menghubungi Anda untuk koordinasi lebih lanjut.</p>
      </div>
      <div class="alert alert-warning">
        <span class="alert-icon">ℹ️</span>
        <div class="alert-content">
          <div class="alert-desc">Pastikan Anda benar-benar <strong>dalam kondisi sehat</strong> dan memenuhi syarat donor sebelum menyatakan bersedia.</div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="modal-close btn btn-ghost">Batal</button>
      <button class="btn btn-primary" id="btnConfirmWilling">🩸 Ya, Saya Bersedia</button>
    </div>
  </div>
</div>

<!-- MODAL: REQUEST DETAIL -->
<div class="modal-overlay" id="modalRequestDetail">
  <div class="modal modal-lg">
    <div class="modal-header">
      <h3 class="modal-title">📋 Detail Permintaan</h3>
      <button class="modal-close">✕</button>
    </div>
    <div class="modal-body" id="modalRequestDetailContent"></div>
    <div class="modal-footer">
      <button class="modal-close btn btn-ghost">Tutup</button>
    </div>
  </div>
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

  window.dummyRequests = <?php echo json_encode($requests, 15, 512) ?>;
  window.committedIds  = <?php echo json_encode($committedIds, 15, 512) ?>;
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
<?php /**PATH C:\Users\User\Desktop\informatika\UASLabPBOB_7-main\webportofolio\projectprakpbw-BloodConnect-Aceh-main (1)\backend-laravel\resources\views/permintaan-cocok.blade.php ENDPATH**/ ?>