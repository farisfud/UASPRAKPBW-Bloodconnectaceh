<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Permintaan - BloodConnect Aceh</title>
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
      <a href="<?php echo e(route('riwayat-permintaan')); ?>" class="active"><span class="nav-icon">📋</span> Riwayat Permintaan</a>
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
        <h1 class="page-title">Riwayat Permintaan Donor</h1>
      </div>
      <a href="<?php echo e(route('permintaan-darurat')); ?>" class="btn btn-primary btn-sm">+ Permintaan Baru</a>
    </div>

    <div class="page-content">

      <!-- Stats -->
      <div class="grid-4 mb-24">
        <div class="stat-card">
          <div class="stat-icon yellow">⏳</div>
          <div class="stat-value" id="activeRequestCount">0</div>
          <div class="stat-label">Menunggu Donor</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon blue">📞</div>
          <div class="stat-value" id="contactedRequestCount">0</div>
          <div class="stat-label">Dihubungi</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon green">✅</div>
          <div class="stat-value" id="completedRequestCount">0</div>
          <div class="stat-label">Selesai</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon red">❌</div>
          <div class="stat-value" id="cancelledRequestCount">0</div>
          <div class="stat-label">Dibatalkan</div>
        </div>
      </div>

      <!-- Requests Table -->
      <div id="myRequestsContainer">
        <!-- Rendered by JS -->
      </div>

    </div>
  </main>
</div>

<!-- MODAL: CONFIRM ACTION -->
<div class="modal-overlay" id="modalConfirmAction">
  <div class="modal" style="max-width:420px">
    <div class="modal-header">
      <h3 class="modal-title">⚠️ Konfirmasi Tindakan</h3>
      <button class="modal-close">✕</button>
    </div>
    <div class="modal-body">
      <p id="confirmActionMsg" style="color:var(--text);line-height:1.6"></p>
    </div>
    <div class="modal-footer">
      <button class="modal-close btn btn-ghost">Batal</button>
      <button class="btn btn-danger" id="btnConfirmAction">Ya, Lanjutkan</button>
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

  window.myRequests = <?php echo json_encode($requests, 15, 512) ?>;
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

  // Update statistics on page load based on myRequests array
  function customUpdateMyRequestStats() {
    const active = myRequests.filter(r => r.status === 'Menunggu Donor').length;
    const contacted = myRequests.filter(r => r.status === 'Dihubungi').length;
    const completed = myRequests.filter(r => r.status === 'Selesai').length;
    const cancelled = myRequests.filter(r => r.status === 'Dibatalkan').length;
    
    if (document.getElementById('activeRequestCount')) document.getElementById('activeRequestCount').textContent = active;
    if (document.getElementById('contactedRequestCount')) document.getElementById('contactedRequestCount').textContent = contacted;
    if (document.getElementById('completedRequestCount')) document.getElementById('completedRequestCount').textContent = completed;
    if (document.getElementById('cancelledRequestCount')) document.getElementById('cancelledRequestCount').textContent = cancelled;
  }
  
  // Call it initially
  customUpdateMyRequestStats();

  // Override the executeAction function from script.js to communicate with Laravel database
  function executeAction() {
    if (pendingActionId === null) return;
    
    const newStatus = pendingAction === 'selesai' ? 'Selesai' : 'Dibatalkan';
    
    fetch(`/riwayat-permintaan/${pendingActionId}/status`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: JSON.stringify({ status: newStatus })
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Update local client array
        const req = myRequests.find(r => r.id === pendingActionId);
        if (req) req.status = newStatus;
        
        hideModal('modalConfirmAction');
        renderMyRequests();
        customUpdateMyRequestStats();
        showToast(pendingAction === 'selesai' ? 'Permintaan ditandai selesai!' : 'Permintaan dibatalkan.', pendingAction === 'selesai' ? 'success' : 'info');
      } else {
        showToast('Gagal memperbarui status.', 'error');
      }
      pendingActionId = null;
      pendingAction = null;
    })
    .catch(err => {
      showToast('Terjadi kesalahan koneksi.', 'error');
      pendingActionId = null;
      pendingAction = null;
    });
  }
</script>
</body>
</html>
<?php /**PATH C:\Users\User\Desktop\informatika\UASLabPBOB_7-main\webportofolio\projectprakpbw-BloodConnect-Aceh-main (1)\backend-laravel\resources\views/riwayat-permintaan.blade.php ENDPATH**/ ?>