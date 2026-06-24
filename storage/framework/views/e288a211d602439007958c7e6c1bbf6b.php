<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Permintaan Donor Darurat - BloodConnect Aceh</title>
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
      <a href="<?php echo e(route('permintaan-darurat')); ?>" class="active"><span class="nav-icon">🚨</span> Permintaan Darurat</a>
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
        <h1 class="page-title">Permintaan Donor Darurat</h1>
      </div>
      <a href="<?php echo e(route('riwayat-permintaan')); ?>" class="btn btn-ghost btn-sm">📋 Riwayat Permintaan</a>
    </div>

    <div class="page-content">

      <div class="grid-2" style="align-items:start;gap:28px">

        <!-- FORM -->
        <div class="card">
          <div class="card-header">
            <span class="card-title">📝 Form Permintaan Darah</span>
          </div>
          <div class="card-body">
            <form id="requestForm" method="POST" action="<?php echo e(route('blood-request.store')); ?>">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <label class="form-label">Nama Pasien *</label>
                <input type="text" name="patient_name" class="form-control" id="reqPatient" placeholder="Nama lengkap pasien" required>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label class="form-label">Golongan Darah *</label>
                  <select name="blood_type" class="form-control" id="reqBlood" required>
                    <option value="">-- Pilih --</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-label">Rhesus *</label>
                  <select name="rhesus_type" class="form-control" id="reqRhesus" required>
                    <option value="">-- Pilih --</option>
                    <option value="+">Positif (+)</option>
                    <option value="-">Negatif (-)</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label class="form-label">Jumlah Kantong *</label>
                  <input type="number" name="bag_quantity" class="form-control" id="reqBags" placeholder="Contoh: 2" min="1" max="20" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Tingkat Urgensi *</label>
                  <select name="urgency_level" class="form-control" id="reqUrgency" required>
                    <option value="">-- Pilih --</option>
                    <option value="Rendah">Rendah</option>
                    <option value="Sedang">Sedang</option>
                    <option value="Darurat">Darurat 🚨</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="form-label">Nama Rumah Sakit *</label>
                <input type="text" name="hospital_name" class="form-control" id="reqHospital" placeholder="Nama rumah sakit / klinik / PMI" required>
              </div>

              <div class="form-group">
                <label class="form-label">Lokasi (Kota/Kabupaten) *</label>
                <select name="location" class="form-control" id="reqLocation" required>
                  <option value="">-- Pilih Lokasi --</option>
                  <option value="Banda Aceh">Banda Aceh</option>
                  <option value="Aceh Besar">Aceh Besar</option>
                  <option value="Lhokseumawe">Lhokseumawe</option>
                  <option value="Langsa">Langsa</option>
                  <option value="Meulaboh">Meulaboh</option>
                  <option value="Sigli">Sigli</option>
                  <option value="Sabang">Sabang</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>

              <div class="divider"></div>

              <div class="form-row">
                <div class="form-group">
                  <label class="form-label">Nama Penanggung Jawab *</label>
                  <input type="text" name="contact_name" class="form-control" id="reqContact" placeholder="Nama PJ / keluarga" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Nomor Kontak *</label>
                  <input type="tel" name="contact_phone" class="form-control" id="reqPhone" placeholder="08xxxxxxxxxx" required>
                </div>
              </div>

              <div class="form-group">
                <label class="form-label">Catatan Tambahan</label>
                <textarea name="notes" class="form-control" id="reqNotes" rows="3" placeholder="Informasi tambahan yang perlu diketahui pendonor..."></textarea>
              </div>

              <button type="submit" class="btn btn-primary btn-full btn-lg" style="margin-top:8px">
                🚨 Ajukan Permintaan Donor
              </button>
            </form>
          </div>
        </div>

        <!-- INFO SIDEBAR -->
        <div style="display:flex;flex-direction:column;gap:20px">

          <!-- How it works -->
          <div class="card" style="border:1px solid var(--red-200);background:var(--red-50)">
            <div class="card-body">
              <h5 style="margin-bottom:12px;color:var(--primary)">⚡ Proses Otomatis</h5>
              <div class="alert alert-success" style="margin-bottom:0">
                <span class="alert-icon">✅</span>
                <div class="alert-content">
                  <div class="alert-desc">Permintaan akan langsung ditampilkan kepada pendonor yang cocok berdasarkan golongan darah, rhesus, lokasi, dan status ketersediaan. <strong>Admin tidak perlu menyetujui permintaan satu per satu.</strong></div>
                </div>
              </div>
            </div>
          </div>

          <!-- Tips -->
          <div class="card">
            <div class="card-header">
              <span class="card-title">💡 Tips Permintaan Efektif</span>
            </div>
            <div class="card-body">
              <div style="display:flex;flex-direction:column;gap:12px">
                <div style="display:flex;gap:10px">
                  <span style="color:var(--primary)">1.</span>
                  <p class="text-sm">Pastikan golongan darah dan rhesus yang dibutuhkan sudah dikonfirmasi dari dokter atau lab.</p>
                </div>
                <div style="display:flex;gap:10px">
                  <span style="color:var(--primary)">2.</span>
                  <p class="text-sm">Sertakan nomor kontak yang aktif dan mudah dihubungi, terutama untuk kasus darurat.</p>
                </div>
                <div style="display:flex;gap:10px">
                  <span style="color:var(--primary)">3.</span>
                  <p class="text-sm">Pilih tingkat urgensi dengan tepat. "Darurat" hanya untuk kondisi yang benar-benar mendesak.</p>
                </div>
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
<?php /**PATH C:\Users\User\Desktop\informatika\UASLabPBOB_7-main\webportofolio\projectprakpbw-BloodConnect-Aceh-main (1)\backend-laravel\resources\views/permintaan-darurat.blade.php ENDPATH**/ ?>