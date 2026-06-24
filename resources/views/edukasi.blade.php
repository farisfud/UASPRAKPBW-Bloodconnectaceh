<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edukasi Donor Darah - BloodConnect Aceh</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
      <a href="{{ route('dashboard') }}"><span class="nav-icon">🏠</span> Dashboard</a>
      <a href="{{ route('cari-donor') }}"><span class="nav-icon">🔍</span> Cari Donor</a>
      <a href="{{ route('permintaan-darurat') }}"><span class="nav-icon">🚨</span> Permintaan Darurat</a>
      <div class="nav-section-label">Riwayat</div>
      <a href="{{ route('riwayat-permintaan') }}"><span class="nav-icon">📋</span> Riwayat Permintaan</a>
      <a href="{{ route('permintaan-cocok') }}"><span class="nav-icon">🩸</span> Permintaan Cocok</a>
      <a href="{{ route('riwayat-donor') }}"><span class="nav-icon">📊</span> Riwayat Donor</a>
      <div class="nav-section-label">Profil</div>
      <a href="{{ route('profil-donor') }}"><span class="nav-icon">👤</span> Profil Donor</a>
      <a href="{{ route('edukasi') }}" class="active"><span class="nav-icon">📚</span> Edukasi</a>
      <a href="{{ route('notifikasi') }}"><span class="nav-icon">🔔</span> Notifikasi</a>
      <a href="{{ route('pengaturan') }}"><span class="nav-icon">⚙️</span> Pengaturan</a>
      <div class="nav-section-label">Lainnya</div>
      <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color:var(--danger)"><span class="nav-icon">🚪</span> Keluar</a>
    </nav>
    <div class="sidebar-footer">
      <div class="sidebar-user" onclick="window.location='{{ route('profil-donor') }}'" style="cursor:pointer">
        <div class="avatar">{{ substr(auth()->user()->name, 0, 2) }}</div>
        <div class="sidebar-user-info">
          <div class="sidebar-user-name">{{ auth()->user()->name }}</div>
          <div class="sidebar-user-role">Pendonor Aktif · {{ auth()->user()->gol_darah ?? '-' }}{{ auth()->user()->rhesus ?? '' }}</div>
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
        <h1 class="page-title">Edukasi Donor Darah</h1>
      </div>
    </div>

    <div class="page-content">

      <!-- Header -->
      <div class="welcome-card mb-24">
        <div class="welcome-title">📚 Edukasi Donor Darah</div>
        <p class="welcome-subtitle">Temukan informasi penting seputar syarat, manfaat, dan persiapan sebelum donor darah. Jadilah pendonor yang cerdas dan bertanggung jawab.</p>
        <div class="welcome-actions">
          <div class="search-box" style="flex:1;max-width:400px;background:rgba(255,255,255,0.15);border-radius:8px">
            <span class="search-icon" style="color:rgba(255,255,255,0.8)">🔍</span>
            <input type="text" id="searchArticle" placeholder="Cari artikel edukasi..." style="background:transparent;border:1px solid rgba(255,255,255,0.3);color:white;padding-left:38px;border-radius:8px" onplaceholder="">
          </div>
        </div>
      </div>

      <!-- Quick Facts -->
      <div class="grid-4 mb-24">
        <div style="background:white;border-radius:var(--r-xl);padding:20px;box-shadow:var(--shadow);border:1px solid var(--border);text-align:center">
          <div style="font-size:2rem;margin-bottom:8px">🩸</div>
          <div style="font-weight:800;color:var(--primary);font-size:1.3rem">250 ml</div>
          <div class="text-xs text-light mt-4">Volume darah sekali donor</div>
        </div>
        <div style="background:white;border-radius:var(--r-xl);padding:20px;box-shadow:var(--shadow);border:1px solid var(--border);text-align:center">
          <div style="font-size:2rem;margin-bottom:8px">📅</div>
          <div style="font-weight:800;color:var(--text-strong);font-size:1.3rem">3 Bulan</div>
          <div class="text-xs text-light mt-4">Interval minimal antar donor</div>
        </div>
        <div style="background:white;border-radius:var(--r-xl);padding:20px;box-shadow:var(--shadow);border:1px solid var(--border);text-align:center">
          <div style="font-size:2rem;margin-bottom:8px">🩸</div>
          <div style="font-weight:800;color:var(--success);font-size:1.3rem">3 Jiwa</div>
          <div class="text-xs text-light mt-4">Nyawa yang bisa diselamatkan</div>
        </div>
        <div style="background:white;border-radius:var(--r-xl);padding:20px;box-shadow:var(--shadow);border:1px solid var(--border);text-align:center">
          <div style="font-size:2rem;margin-bottom:8px">🩸</div>
          <div style="font-weight:800;color:var(--info);font-size:1.3rem">21 Hari</div>
          <div class="text-xs text-light mt-4">Waktu pemulihan sel darah merah</div>
        </div>
      </div>

      <!-- Search Bar (mobile) -->
      <div class="search-box mb-20">
        <span class="search-icon">🔍</span>
        <input type="text" id="searchArticleMobile" class="form-control" placeholder="Cari artikel edukasi..." style="display:none">
      </div>

      <!-- Articles Grid -->
      <div>
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;flex-wrap:wrap;gap:10px">
          <h4 style="font-size:1rem;font-weight:700;color:var(--text-strong)">Artikel Edukasi</h4>
          <span id="articleCount" class="text-sm text-light">6 artikel tersedia</span>
        </div>
        <div class="grid-3" id="articlesGrid">
          <!-- Rendered by JS -->
        </div>
      </div>

      <!-- FAQ Section -->
      <div class="card mt-24">
        <div class="card-header">
          <span class="card-title">❓ Pertanyaan Umum</span>
        </div>
        <div class="card-body">
          <div style="display:flex;flex-direction:column;gap:16px">
            <div class="faq-item" style="border:1px solid var(--border);border-radius:var(--r-md);overflow:hidden">
              <div class="faq-question" style="padding:16px;cursor:pointer;display:flex;justify-content:space-between;align-items:center;font-weight:600;color:var(--text-strong)" onclick="toggleFaq(this)">
                Apakah donor darah menyakitkan?
                <span style="color:var(--primary);transition:var(--transition)">?</span>
              </div>
              <div class="faq-answer" style="padding:0 16px;max-height:0;overflow:hidden;transition:max-height 0.3s ease,padding 0.3s ease;color:var(--text-secondary);font-size:0.875rem;line-height:1.7">
                Proses donor darah biasanya tidak menyakitkan. Anda mungkin merasakan sedikit sensasi saat jarum dimasukkan, namun ini berlangsung sangat singkat. Sebagian besar pendonor merasa nyaman selama proses berlangsung.
              </div>
            </div>
            <div class="faq-item" style="border:1px solid var(--border);border-radius:var(--r-md);overflow:hidden">
              <div class="faq-question" style="padding:16px;cursor:pointer;display:flex;justify-content:space-between;align-items:center;font-weight:600;color:var(--text-strong)" onclick="toggleFaq(this)">
                Berapa lama proses donor darah?
                <span style="color:var(--primary);transition:var(--transition)">?</span>
              </div>
              <div class="faq-answer" style="padding:0 16px;max-height:0;overflow:hidden;transition:max-height 0.3s ease,padding 0.3s ease;color:var(--text-secondary);font-size:0.875rem;line-height:1.7">
                Proses donor darah biasanya memakan waktu sekitar 30-60 menit, termasuk pendaftaran, pemeriksaan kesehatan, proses donor (10-15 menit), dan istirahat setelah donor.
              </div>
            </div>
            <div class="faq-item" style="border:1px solid var(--border);border-radius:var(--r-md);overflow:hidden">
              <div class="faq-question" style="padding:16px;cursor:pointer;display:flex;justify-content:space-between;align-items:center;font-weight:600;color:var(--text-strong)" onclick="toggleFaq(this)">
                Siapa saja yang boleh donor darah?
                <span style="color:var(--primary);transition:var(--transition)">?</span>
              </div>
              <div class="faq-answer" style="padding:0 16px;max-height:0;overflow:hidden;transition:max-height 0.3s ease,padding 0.3s ease;color:var(--text-secondary);font-size:0.875rem;line-height:1.7">
                Umumnya seseorang boleh donor darah jika berusia 17-65 tahun, berat badan minimal 45 kg, tekanan darah normal, tidak sedang mengonsumsi antibiotik atau obat tertentu, dan dalam kondisi sehat.
              </div>
            </div>
            <div class="faq-item" style="border:1px solid var(--border);border-radius:var(--r-md);overflow:hidden">
              <div class="faq-question" style="padding:16px;cursor:pointer;display:flex;justify-content:space-between;align-items:center;font-weight:600;color:var(--text-strong)" onclick="toggleFaq(this)">
                Apakah donor darah aman?
                <span style="color:var(--primary);transition:var(--transition)">?</span>
              </div>
              <div class="faq-answer" style="padding:0 16px;max-height:0;overflow:hidden;transition:max-height 0.3s ease,padding 0.3s ease;color:var(--text-secondary);font-size:0.875rem;line-height:1.7">
                Ya, donor darah sangat aman. Semua peralatan yang digunakan adalah steril dan sekali pakai, sehingga tidak ada risiko penularan penyakit dari proses donor.
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<div class="toast-container"></div>
<script>
  window.currentUser = {
    id: {{ auth()->id() }},
    name: "{{ auth()->user()->name }}",
    email: "{{ auth()->user()->email }}",
    phone: "{{ auth()->user()->no_telepon }}",
    location: "{{ auth()->user()->lokasi }}",
    avatar: "{{ substr(auth()->user()->name, 0, 2) }}",
    isDonorActive: {{ auth()->user()->is_donor ? 'true' : 'false' }},
    bloodType: "{{ auth()->user()->gol_darah }}",
    rhesus: "{{ auth()->user()->rhesus ?? '+' }}",
    weight: {{ auth()->user()->berat_badan ?? 70 }},
    lastDonorDate: "{{ auth()->user()->donationHistories()->latest()->first()?->tanggal_donor ?? '' }}",
    healthNotes: "{{ auth()->user()->catatan_kesehatan ?? '' }}",
    donorStatus: "{{ auth()->user()->status_donor ?? 'Tersedia' }}"
  };
</script>
<script src="assets/js/script.js"></script>
<script>
  function toggleFaq(el) {
    const answer = el.nextElementSibling;
    const arrow = el.querySelector('span:last-child');
    const isOpen = answer.style.maxHeight && answer.style.maxHeight !== '0px';
    answer.style.maxHeight = isOpen ? '0px' : '200px';
    answer.style.paddingBottom = isOpen ? '0' : '16px';
    arrow.style.transform = isOpen ? 'rotate(0deg)' : 'rotate(-180deg)';
  }

  // Sync both search bars
  document.getElementById('searchArticle')?.addEventListener('input', function() {
    document.dispatchEvent(new CustomEvent('articleSearch', { detail: this.value }));
  });
  document.getElementById('searchArticleMobile')?.addEventListener('input', function() {
    document.dispatchEvent(new CustomEvent('articleSearch', { detail: this.value }));
  });

  @auth
    localStorage.setItem('bc_logged_in', '1');
    localStorage.setItem('bc_user', JSON.stringify(window.currentUser));
  @else
    localStorage.removeItem('bc_logged_in');
    localStorage.removeItem('bc_user');
  @endauth
</script>
</body>
</html>
