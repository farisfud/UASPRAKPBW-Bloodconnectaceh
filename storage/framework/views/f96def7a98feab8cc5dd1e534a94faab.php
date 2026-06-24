<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BloodConnect Aceh — Platform Donor Darah Sukarela</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar" id="navbar">
  <div class="navbar-inner">
    <a href="<?php echo e(route('home')); ?>" class="navbar-brand">
      <div class="brand-icon">🩸</div>
      <div class="brand-text">Blood<span>Connect</span> Aceh</div>
    </a>
    <ul class="navbar-menu">
      <li><a href="<?php echo e(route('home')); ?>" class="active">Beranda</a></li>
      <li><a href="<?php echo e(route('cari-donor')); ?>">Cari Donor</a></li>
      <li><a href="<?php echo e(route('permintaan-darurat')); ?>">Permintaan Darurat</a></li>
      <li><a href="<?php echo e(route('edukasi')); ?>">Edukasi</a></li>
    </ul>
    <div class="navbar-actions">
      <?php if(auth()->guard()->check()): ?>
        <span style="font-size:0.875rem;font-weight:600;color:var(--text-strong)">👤 <?php echo e(explode(' ', auth()->user()->name)[0]); ?></span>
        <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-ghost btn-sm">Dashboard</a>
        <button class="btn btn-primary btn-sm" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</button>
      <?php else: ?>
        <a href="<?php echo e(route('login')); ?>" class="btn btn-ghost btn-sm">Masuk</a>
        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary btn-sm">Daftar</a>
      <?php endif; ?>
      <button class="hamburger" id="hamburger" aria-label="Buka Menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</nav>

<div class="mobile-menu" id="mobileMenu">
  <a href="<?php echo e(route('home')); ?>">Beranda</a>
  <a href="<?php echo e(route('cari-donor')); ?>">Cari Donor</a>
  <a href="<?php echo e(route('permintaan-darurat')); ?>">Permintaan Darurat</a>
  <a href="<?php echo e(route('edukasi')); ?>">Edukasi</a>
  <div style="margin-top:8px;padding-top:8px;border-top:1px solid var(--border);display:flex;gap:8px">
    <?php if(auth()->guard()->check()): ?>
      <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-ghost btn-sm" style="flex:1">Dashboard</a>
    <?php else: ?>
      <a href="<?php echo e(route('login')); ?>" class="btn btn-ghost btn-sm" style="flex:1">Masuk</a>
      <a href="<?php echo e(route('login')); ?>" class="btn btn-primary btn-sm" style="flex:1">Daftar</a>
    <?php endif; ?>
  </div>
</div>

<!-- ============= HERO ============= -->
<section class="hero">
  <div class="hero-bg"></div>
  <div class="hero-orb hero-orb-1"></div>
  <div class="hero-orb hero-orb-2"></div>
  <div class="hero-orb hero-orb-3"></div>

  <div class="hero-inner" style="grid-template-columns:1fr;text-align:center;gap:0">
    <div class="hero-content" style="max-width:680px;margin:0 auto">
      <div class="hero-eyebrow" style="margin:0 auto 22px">
        <div class="hero-eyebrow-dot">🩸</div>
        Platform Donor Darah Sukarela Aceh
      </div>
      <h1 class="hero-title">
        <span class="line-accent">BloodConnect</span><br>
        <span class="line-underline">Aceh</span>
      </h1>
      <p class="hero-subtitle" style="margin:0 auto 32px">
        Menghubungkan pendonor darah sukarela dengan masyarakat yang membutuhkan darah secara cepat dan terorganisir.
      </p>
      <div class="hero-cta" style="justify-content:center">
        <a href="<?php echo e(route('cari-donor')); ?>" class="btn btn-primary btn-lg">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          Cari Donor
        </a>
        <a href="<?php echo e(route('login')); ?>" class="btn btn-ghost btn-lg">
          Daftar Jadi Pendonor →
        </a>
      </div>
      <div class="hero-stats" style="justify-content:center">
        <div>
          <div class="hero-stat-num"><span data-counter="2847">0</span><span>+</span></div>
          <div class="hero-stat-label">Pengguna Aktif</div>
        </div>
        <div class="hero-divider"></div>
        <div>
          <div class="hero-stat-num"><span data-counter="1203">0</span><span>+</span></div>
          <div class="hero-stat-label">Pendonor Terdaftar</div>
        </div>
        <div class="hero-divider"></div>
        <div>
          <div class="hero-stat-num"><span data-counter="956">0</span><span>+</span></div>
          <div class="hero-stat-label">Donasi Berhasil</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============= HOW IT WORKS ============= -->
<section class="section section-bg-white">
  <div class="section-inner">
    <div class="section-header">
      <div class="section-eyebrow">⚡ Cara Kerja</div>
      <h2 class="section-title">Sederhana, Cepat, Transparan</h2>
      <p class="section-subtitle">Proses yang dirancang untuk menghubungkan pendonor dan penerima dengan efisien tanpa birokrasi yang mempersulit.</p>
    </div>
    <div class="steps-grid">
      <div class="step-card">
        <div class="step-num">01</div>
        <div class="step-icon-wrap">📝</div>
        <h4 class="step-title">Ajukan Permintaan</h4>
        <p class="step-desc">Isi form permintaan donor darah dengan informasi pasien, golongan darah, and lokasi rumah sakit. Cepat dan mudah.</p>
      </div>
      <div class="step-card">
        <div class="step-num">02</div>
        <div class="step-icon-wrap">🤖</div>
        <h4 class="step-title">Pencocokan Otomatis</h4>
        <p class="step-desc">Sistem mencocokkan permintaan secara otomatis berdasarkan golongan darah, rhesus, lokasi, dan ketersediaan pendonor.</p>
      </div>
      <div class="step-card">
        <div class="step-num">03</div>
        <div class="step-icon-wrap">📞</div>
        <h4 class="step-title">Hubungi Pendonor</h4>
        <p class="step-desc">Pendonor yang cocok mendapat notifikasi dan Anda dapat langsung menghubungi via kontak yang tersedia.</p>
      </div>
      <div class="step-card">
        <div class="step-num">04</div>
        <div class="step-icon-wrap">✅</div>
        <h4 class="step-title">Konfirmasi Selesai</h4>
        <p class="step-desc">Setelah kebutuhan darah terpenuhi, tandai permintaan selesai untuk memperbarui riwayat dan statistik sistem.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============= FEATURES ============= -->
<section class="section section-bg-soft">
  <div class="section-inner">
    <div class="section-header">
      <div class="section-eyebrow">🌟 Fitur Utama</div>
      <h2 class="section-title">Semua yang Anda Butuhkan</h2>
      <p class="section-subtitle">Platform lengkap yang memudahkan proses donor darah dari pencarian pendonor hingga pencatatan riwayat donasi.</p>
    </div>
    <div class="features-grid">
      <div class="feature-card">
        <div class="feature-icon-wrap">🔍</div>
        <h5 class="feature-title">Cari Donor</h5>
        <p class="feature-desc">Temukan pendonor yang cocok berdasarkan golongan darah, rhesus, dan lokasi terdekat dengan filter canggih.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon-wrap">🚨</div>
        <h5 class="feature-title">Permintaan Darurat</h5>
        <p class="feature-desc">Ajukan permintaan darah darurat yang langsung terlihat oleh pendonor yang sesuai tanpa persetujuan admin.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon-wrap">👤</div>
        <h5 class="feature-title">Profil Pendonor</h5>
        <p class="feature-desc">Lengkapi profil donor dengan informasi kesehatan dan status ketersediaan untuk muncul di pencarian.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon-wrap">📋</div>
        <h5 class="feature-title">Riwayat Permintaan</h5>
        <p class="feature-desc">Pantau semua permintaan donor darah yang pernah Anda buat beserta status terkini dari setiap permintaan.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon-wrap">📊</div>
        <h5 class="feature-title">Riwayat Donor</h5>
        <p class="feature-desc">Lacak semua riwayat donasi Anda, termasuk tanggal, penerima, dan jadwal donor berikutnya secara otomatis.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon-wrap">📚</div>
        <h5 class="feature-title">Edukasi Donor Darah</h5>
        <p class="feature-desc">Pelajari syarat, manfaat, dan persiapan sebelum donor darah melalui artikel edukatif yang lengkap dan terpercaya.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============= STATS DARK ============= -->
<section class="stats-section">
  <div class="section-inner">
    <div class="stats-grid">
      <div class="pub-stat-item">
        <div class="pub-stat-value"><span data-counter="2847">0</span><span class="pub-stat-value-accent">+</span></div>
        <div class="pub-stat-label">Total Pengguna</div>
      </div>
      <div class="pub-stat-item">
        <div class="pub-stat-value"><span data-counter="1203">0</span><span class="pub-stat-value-accent">+</span></div>
        <div class="pub-stat-label">Total Pendonor</div>
      </div>
      <div class="pub-stat-item">
        <div class="pub-stat-value"><span data-counter="87">0</span></div>
        <div class="pub-stat-label">Permintaan Aktif</div>
      </div>
      <div class="pub-stat-item">
        <div class="pub-stat-value"><span data-counter="956">0</span><span class="pub-stat-value-accent">+</span></div>
        <div class="pub-stat-label">Donasi Berhasil</div>
      </div>
    </div>
  </div>
</section>

<!-- ============= CTA ============= -->
<section class="section section-bg-white">
  <div class="section-inner">
    <div style="background:linear-gradient(135deg,var(--red-50) 0%,white 60%,var(--red-50) 100%);border:1px solid var(--red-100);border-radius:var(--r-3xl);padding:64px 48px;text-align:center;position:relative;overflow:hidden">
      <!-- Grid bg -->
      <div style="position:absolute;inset:0;background-image:linear-gradient(rgba(0,0,0,0.025) 1px,transparent 1px),linear-gradient(90deg,rgba(0,0,0,0.025) 1px,transparent 1px);background-size:32px 32px;border-radius:inherit"></div>
      <div style="position:relative;z-index:1">
        <div class="section-eyebrow" style="margin:0 auto 16px">🩸 Satu Akun, Dua Peran</div>
        <h2 class="section-title" style="margin-bottom:12px">Daftar Sekali,<br>Bantu Lebih Banyak</h2>
        <p style="color:var(--text);max-width:460px;margin:0 auto 32px;line-height:1.75;font-size:1rem">Satu akun untuk mencari donor <em>sekaligus</em> menjadi pendonor. Tidak ada batasan peran — Anda bebas melakukan keduanya.</p>
        <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap">
          <a href="<?php echo e(route('login')); ?>" class="btn btn-primary btn-lg">Daftar Sekarang</a>
          <a href="<?php echo e(route('cari-donor')); ?>" class="btn btn-ghost btn-lg">Lihat Pendonor →</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============= FOOTER ============= -->
<footer class="footer">
  <div class="footer-inner">
    <div class="footer-grid">
      <div>
        <div style="display:flex;align-items:center;gap:9px;margin-bottom:4px">
          <div class="brand-icon" style="width:32px;height:32px;font-size:0.875rem">🩸</div>
          <span style="font-size:0.9375rem;font-weight:800;color:white;letter-spacing:-0.02em">BloodConnect Aceh</span>
        </div>
        <p class="footer-brand-desc">Platform donor darah sukarela yang menghubungkan pendonor dengan masyarakat yang membutuhkan secara cepat dan terorganisir.</p>
        <div class="footer-social">
          <a href="#" class="footer-social-btn" title="Facebook">f</a>
          <a href="#" class="footer-social-btn" title="Instagram">📸</a>
          <a href="#" class="footer-social-btn" title="Twitter">𝕏</a>
          <a href="#" class="footer-social-btn" title="WhatsApp">💬</a>
        </div>
      </div>
      <div>
        <div class="footer-col-title">Platform</div>
        <div class="footer-links">
          <a href="<?php echo e(route('home')); ?>">Beranda</a>
          <a href="<?php echo e(route('cari-donor')); ?>">Cari Donor</a>
          <a href="<?php echo e(route('permintaan-darurat')); ?>">Permintaan Darurat</a>
          <a href="<?php echo e(route('edukasi')); ?>">Edukasi Donor</a>
        </div>
      </div>
      <div>
        <div class="footer-col-title">Akun</div>
        <div class="footer-links">
          <?php if(auth()->guard()->check()): ?>
            <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
            <a href="<?php echo e(route('profil-donor')); ?>">Profil Donor</a>
          <?php else: ?>
            <a href="<?php echo e(route('login')); ?>">Masuk</a>
            <a href="<?php echo e(route('login')); ?>">Daftar Akun</a>
          <?php endif; ?>
        </div>
      </div>
      <div>
        <div class="footer-col-title">Kontak</div>
        <div class="footer-links">
          <a href="#">info@bloodconnect-aceh.id</a>
          <a href="#">(0651) 123-4567</a>
          <a href="#">Banda Aceh, Aceh</a>
          <a href="#">Hubungi via WhatsApp</a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p class="footer-copy">© 2025 BloodConnect Aceh. Hak cipta dilindungi.</p>
      <div class="footer-bottom-links">
        <a href="#">Kebijakan Privasi</a>
        <a href="#">Syarat & Ketentuan</a>
        <a href="#">Bantuan</a>
      </div>
    </div>
  </div>
</footer>

<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
</form>

<div class="toast-container"></div>
<script src="assets/js/script.js"></script>

<script>
  <?php if(auth()->guard()->check()): ?>
    localStorage.setItem('bc_logged_in', '1');
    localStorage.setItem('bc_user', JSON.stringify({
      id: <?php echo e(auth()->id()); ?>,
      name: "<?php echo e(auth()->user()->name); ?>",
      email: "<?php echo e(auth()->user()->email); ?>",
      phone: "<?php echo e(auth()->user()->no_telepon); ?>",
      location: "<?php echo e(auth()->user()->lokasi); ?>",
      bloodType: "<?php echo e(auth()->user()->gol_darah); ?>",
      rhesus: "<?php echo e(auth()->user()->rhesus ?? '+'); ?>",
      isDonorActive: <?php echo e(auth()->user()->is_donor ? 'true' : 'false'); ?>,
      donorStatus: "<?php echo e(auth()->user()->status_donor ?? 'Tersedia'); ?>"
    }));
  <?php else: ?>
    localStorage.removeItem('bc_logged_in');
    localStorage.removeItem('bc_user');
  <?php endif; ?>
</script>
</body>
</html>
<?php /**PATH C:\Users\User\Desktop\informatika\UASLabPBOB_7-main\webportofolio\projectprakpbw-BloodConnect-Aceh-main (1)\backend-laravel\resources\views/index.blade.php ENDPATH**/ ?>