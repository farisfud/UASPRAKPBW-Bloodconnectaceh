<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Donor - BloodConnect Aceh</title>
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
      <a href="{{ route('riwayat-donor') }}" class="active"><span class="nav-icon">📊</span> Riwayat Donor</a>
      <div class="nav-section-label">Profil</div>
      <a href="{{ route('profil-donor') }}"><span class="nav-icon">👤</span> Profil Donor</a>
      <a href="{{ route('edukasi') }}"><span class="nav-icon">📚</span> Edukasi</a>
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
        <h1 class="page-title">Riwayat Donor</h1>
      </div>
      <a href="{{ route('profil-donor') }}" class="btn btn-ghost btn-sm">👤 Profil Donor</a>
    </div>

    <div class="page-content">

      <!-- Donor Reminder Cards -->
      <div class="grid-3 mb-24">
        <div class="stat-card">
          <div class="stat-icon red">🩸</div>
          <div class="stat-value">{{ count($histories) }}</div>
          <div class="stat-label">Total Donasi</div>
          <div class="stat-change up">Semua berhasil</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon yellow">📅</div>
          <div class="stat-value" style="font-size:1.1rem">
            @if(count($histories) > 0)
              {{ \Carbon\Carbon::parse($histories[0]['date'])->format('d M Y') }}
            @else
              Belum Pernah
            @endif
          </div>
          <div class="stat-label">Terakhir Donor</div>
          <div class="stat-change" style="color:var(--text-secondary)">
            @if(count($histories) > 0)
              {{ $histories[0]['location'] }}
            @else
              -
            @endif
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon green">✅</div>
          <div class="stat-value" style="font-size:1.1rem">
            @if(count($histories) > 0)
              {{ \Carbon\Carbon::parse($histories[0]['date'])->addMonths(3)->format('d M Y') }}
            @else
              Bisa Kapan Saja
            @endif
          </div>
          <div class="stat-label">Bisa Donor Kembali</div>
          <div class="stat-change up">Siap untuk donor</div>
        </div>
      </div>

      <!-- Donor Eligibility Card -->
      <div class="card mb-24">
        <div class="card-body">
          <div style="display:flex;align-items:center;gap:20px;flex-wrap:wrap">
            <div style="flex:1;min-width:200px">
              <h5 style="margin-bottom:6px">📊 Status Kelayakan Donor Saat Ini</h5>
              <p class="text-sm text-light">Berdasarkan tanggal donor terakhir dan kondisi umum</p>
            </div>
            <div style="display:flex;gap:16px;flex-wrap:wrap">
              <div style="text-align:center">
                <div style="font-size:1.8rem;font-weight:800;color:var(--success)">✅</div>
                <div style="font-size:0.75rem;color:var(--text-secondary)">Layak Donor</div>
              </div>
              <div style="text-align:center">
                <div style="font-size:1.8rem;font-weight:800;color:var(--text-strong)">{{ auth()->user()->berat_badan ?? '-' }} kg</div>
                <div style="font-size:0.75rem;color:var(--text-secondary)">Berat Badan</div>
              </div>
              <div style="text-align:center">
                <div style="font-size:1.8rem;font-weight:800;color:var(--primary)">{{ auth()->user()->gol_darah ?? '-' }}{{ auth()->user()->rhesus ?? '' }}</div>
                <div style="font-size:0.75rem;color:var(--text-secondary)">Golongan Darah</div>
              </div>
              <div style="text-align:center">
                <div style="font-size:1.8rem;font-weight:800;color:var(--info)">{{ auth()->user()->usia ?? '-' }}</div>
                <div style="font-size:0.75rem;color:var(--text-secondary)">Usia (tahun)</div>
              </div>
            </div>
          </div>
          <div class="alert alert-success mt-16" style="margin-bottom:0">
            <span class="alert-icon">✅</span>
            <div class="alert-content">
              <div class="alert-desc">
                @if(count($histories) > 0)
                  @php
                    $lastDate = \Carbon\Carbon::parse($histories[0]['date']);
                    $nextDate = $lastDate->copy()->addMonths(3);
                    $daysLeft = \Carbon\Carbon::now()->diffInDays($nextDate, false);
                  @endphp
                  @if($daysLeft > 0)
                    Anda telah melakukan donor pada {{ $lastDate->format('d M Y') }}. Anda dapat mendonorkan darah kembali mulai <strong>{{ $nextDate->format('d M Y') }}</strong> ({{ $daysLeft }} hari lagi).
                  @else
                    Minimal 3 bulan telah berlalu sejak donor terakhir ({{ $lastDate->format('d M Y') }}). Anda **layak dan siap** untuk melakukan donor darah kembali!
                  @endif
                @else
                  Anda belum mencatat riwayat donor sebelumnya. Anda **layak dan siap** untuk melakukan donor darah!
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Donor History Table -->
      <div class="card">
        <div class="card-header">
          <span class="card-title">📊 Riwayat Donor Saya</span>
          <span class="badge badge-green">{{ count($histories) }} donasi berhasil</span>
        </div>
        <div class="card-body" style="padding:0">
          <div id="donorHistoryContainer">
            <!-- Rendered by JS -->
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

  window.myDonorHistory = @json($histories);
</script>
<script src="assets/js/script.js"></script>
<script>
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
