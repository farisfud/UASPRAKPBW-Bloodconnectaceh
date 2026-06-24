<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cari Donor - BloodConnect Aceh</title>
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
      <a href="<?php echo e(route('cari-donor')); ?>" class="active"><span class="nav-icon">🔍</span> Cari Donor</a>
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
        <div>
          <h1 class="page-title">Cari Donor</h1>
        </div>
      </div>
      <a href="<?php echo e(route('permintaan-darurat')); ?>" class="btn btn-primary btn-sm">+ Ajukan Permintaan</a>
    </div>

    <div class="page-content">

      <!-- Page Description -->
      <div class="alert alert-info mb-20">
        <span class="alert-icon">ℹ️</span>
        <div class="alert-content">
          <div class="alert-title">Pencarian Pendonor</div>
          <div class="alert-desc">Cari pendonor berdasarkan golongan darah, rhesus, dan lokasi. Hubungi pendonor langsung untuk koordinasi lebih lanjut. Status selesai hanya dapat ditandai setelah kebutuhan darah terpenuhi.</div>
        </div>
      </div>

      <!-- FILTERS -->
      <div class="filters-bar">
        <div class="filter-group">
          <span class="filter-label">🩸 Golongan</span>
          <select class="filter-select" id="filterBlood">
            <option>Semua</option>
            <option>A</option>
            <option>B</option>
            <option>AB</option>
            <option>O</option>
          </select>
        </div>
        <div class="filter-group">
          <span class="filter-label">Rhesus</span>
          <select class="filter-select" id="filterRhesus">
            <option>Semua</option>
            <option value="+">Positif (+)</option>
            <option value="-">Negatif (-)</option>
          </select>
        </div>
        <div class="filter-group">
          <span class="filter-label">📍 Lokasi</span>
          <select class="filter-select" id="filterLocation">
            <option>Semua Lokasi</option>
            <option>Banda Aceh</option>
            <option>Aceh Besar</option>
            <option>Lhokseumawe</option>
            <option>Langsa</option>
            <option>Meulaboh</option>
            <option>Sigli</option>
          </select>
        </div>
        <div class="filter-group">
          <span class="filter-label">Status</span>
          <select class="filter-select" id="filterStatus">
            <option>Semua Status</option>
            <option>Tersedia</option>
            <option>Tidak Tersedia</option>
          </select>
        </div>
        <div class="search-box" style="flex:1;min-width:200px">
          <span class="search-icon">🔍</span>
          <input type="text" class="form-control" id="searchDonor" placeholder="Cari nama atau lokasi pendonor...">
        </div>
        <div id="donorCount" style="font-size:0.8rem;color:var(--text-secondary);white-space:nowrap;font-weight:600">0 pendonor ditemukan</div>
      </div>

      <!-- DONOR GRID -->
      <div class="grid-auto" id="donorGrid">
        <!-- Rendered by JS with skeleton loader -->
      </div>

    </div>
  </main>
</div>

<!-- MODAL: CONTACT DONOR -->
<div class="modal-overlay" id="modalContact">
  <div class="modal">
    <div class="modal-header">
      <h3 class="modal-title">Hubungi Pendonor</h3>
      <button class="modal-close">✕</button>
    </div>
    <div class="modal-body">
      <div style="display:flex;align-items:center;gap:14px;margin-bottom:20px;padding:16px;background:var(--surface-2);border-radius:var(--r-md)">
        <div class="blood-badge" id="modalDonorBlood" style="font-size:0.85rem">A+</div>
        <div>
          <div style="font-weight:700;font-size:1rem;color:var(--text-strong)" id="modalDonorName">-</div>
          <div style="font-size:0.8rem;color:var(--text-secondary)" id="modalDonorMeta">-</div>
        </div>
        <div id="modalDonorStatus" style="margin-left:auto"></div>
      </div>
      <div class="grid-2" style="gap:12px;margin-bottom:16px">
        <div class="request-detail">
          <div class="request-detail-label">Lokasi</div>
          <div class="request-detail-value" id="modalDonorLoc">-</div>
        </div>
        <div class="request-detail">
          <div class="request-detail-label">Nomor Kontak</div>
          <div class="request-detail-value" id="modalDonorPhone">-</div>
        </div>
        <div class="request-detail">
          <div class="request-detail-label">Terakhir Donor</div>
          <div class="request-detail-value" id="modalDonorLastDonor">-</div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <a href="#" id="btnWhatsApp" target="_blank" class="btn btn-success">Buka WhatsApp</a>
      <button class="btn btn-primary" id="btnConfirmContact">✓ Konfirmasi Dihubungi</button>
    </div>
  </div>
</div>

<!-- MODAL: DONOR DETAIL -->
<div class="modal-overlay" id="modalDonorDetail">
  <div class="modal">
    <div class="modal-header">
      <h3 class="modal-title">👤 Detail Pendonor</h3>
      <button class="modal-close">✕</button>
    </div>
    <div class="modal-body" id="modalDonorDetailContent"></div>
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

  window.dummyDonors = <?php echo json_encode($donors, 15, 512) ?>;
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
<?php /**PATH C:\Users\User\Desktop\informatika\UASLabPBOB_7-main\webportofolio\projectprakpbw-BloodConnect-Aceh-main (1)\backend-laravel\resources\views/cari-donor.blade.php ENDPATH**/ ?>