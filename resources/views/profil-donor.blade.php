<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Donor - BloodConnect Aceh</title>
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
      <a href="{{ route('profil-donor') }}" class="active"><span class="nav-icon">👤</span> Profil Donor</a>
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
        <h1 class="page-title">Profil Donor</h1>
      </div>
      <div style="display:flex;gap:10px">
        @if(auth()->user()->is_donor)
          <span class="badge badge-green" style="font-size:0.8rem;padding:6px 12px"><span class="badge-dot"></span>Pendonor Aktif</span>
        @else
          <span class="badge badge-gray" style="font-size:0.8rem;padding:6px 12px"><span class="badge-dot"></span>Belum Aktif</span>
        @endif
      </div>
    </div>

    <div class="page-content">

      <!-- Success message -->
      @if(session('success'))
        <div class="alert alert-success mb-24">
          <span class="alert-icon">✅</span>
          <div class="alert-content">
            <div class="alert-desc">{{ session('success') }}</div>
          </div>
        </div>
      @endif

      <!-- Info Alert -->
      <div class="alert alert-info mb-24">
        <span class="alert-icon">ℹ️</span>
        <div class="alert-content">
          <div class="alert-title">Informasi Penting</div>
          <div class="alert-desc">Anda tetap bisa mencari donor dan mengajukan permintaan darah meskipun belum aktif sebagai pendonor. Profil donor hanya diperlukan jika Anda ingin membantu orang lain sebagai pendonor.</div>
        </div>
      </div>

      <div class="grid-2" style="align-items:start">

        <!-- LEFT: Profile Info + Donor Toggle -->
        <div style="display:flex;flex-direction:column;gap:20px">

          <!-- User Profile Card -->
          <div class="card">
            <div class="card-header">
              <span class="card-title">👤 Informasi Akun</span>
              <a href="{{ route('pengaturan') }}" class="btn btn-ghost btn-sm">Edit</a>
            </div>
            <div class="card-body">
              <div style="display:flex;align-items:center;gap:16px;margin-bottom:20px">
                <div class="profile-avatar">{{ substr(auth()->user()->name, 0, 2) }}</div>
                <div>
                  <div class="profile-name">{{ auth()->user()->name }}</div>
                  <div class="profile-email">{{ auth()->user()->email }}</div>
                  <div class="profile-badges">
                    <span class="badge badge-red" style="font-weight:800">{{ auth()->user()->gol_darah ?? '-' }}{{ auth()->user()->rhesus ?? '' }}</span>
                    @if(auth()->user()->is_donor)
                      <span class="badge badge-green"><span class="badge-dot"></span>{{ auth()->user()->status_donor ?? 'Tersedia' }}</span>
                    @else
                      <span class="badge badge-gray">Nonaktif</span>
                    @endif
                    <span class="badge badge-purple">{{ count($histories) }}x Donor</span>
                  </div>
                </div>
              </div>
              <div class="grid-2" style="gap:12px">
                <div class="request-detail">
                  <div class="request-detail-label">Nama Lengkap</div>
                  <div class="request-detail-value">{{ auth()->user()->name }}</div>
                </div>
                <div class="request-detail">
                  <div class="request-detail-label">Nomor Kontak</div>
                  <div class="request-detail-value">{{ auth()->user()->no_telepon }}</div>
                </div>
                <div class="request-detail">
                  <div class="request-detail-label">Email</div>
                  <div class="request-detail-value">{{ auth()->user()->email }}</div>
                </div>
                <div class="request-detail">
                  <div class="request-detail-label">Lokasi</div>
                  <div class="request-detail-value">📍 {{ auth()->user()->lokasi }}</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Donor Toggle Card -->
          <div class="card">
            <div class="card-body">
              <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px">
                <div>
                  <h5 style="margin-bottom:4px">Status Pendonor</h5>
                  <p id="donorToggleStatus" class="text-sm" style="color:{{ auth()->user()->is_donor ? 'var(--success)' : 'var(--text-secondary)' }};font-weight:600">
                    {{ auth()->user()->is_donor ? 'Aktif sebagai Pendonor' : 'Nonaktif sebagai Pendonor' }}
                  </p>
                </div>
                <label class="toggle">
                  <input type="checkbox" id="donorActiveToggle" {{ auth()->user()->is_donor ? 'checked' : '' }}>
                  <span class="toggle-slider"></span>
                </label>
              </div>
              <p class="text-sm text-light">Jika toggle aktif, Anda akan muncul dalam daftar pencarian donor dan menerima notifikasi permintaan yang cocok.</p>
              <div class="divider"></div>
              <div style="display:flex;align-items:center;justify-content:space-between">
                <div>
                  <div class="text-sm font-semibold" style="color:var(--text-strong)">Ketersediaan Donor</div>
                  <div class="text-xs text-light mt-4">Status saat ini: <span id="donorStatusLabel" style="font-weight:600;color:{{ (auth()->user()->status_donor == 'Tersedia') ? 'var(--success)' : 'var(--text-secondary)' }}">{{ auth()->user()->status_donor ?? 'Tersedia' }}</span></div>
                </div>
                <label class="toggle">
                  <input type="checkbox" id="donorStatusToggle" {{ (auth()->user()->status_donor == 'Tersedia') ? 'checked' : '' }}>
                  <span class="toggle-slider"></span>
                </label>
              </div>
            </div>
          </div>

          <!-- Donor Summary -->
          <div class="card">
            <div class="card-header">
              <span class="card-title">📊 Ringkasan Donor</span>
            </div>
            <div class="card-body">
              <div class="grid-2" style="gap:12px">
                <div class="stat-card" style="padding:16px">
                  <div style="font-size:1.5rem;font-weight:800;color:var(--text-strong)">{{ count($histories) }}</div>
                  <div style="font-size:0.75rem;color:var(--text-secondary)">Total Donasi</div>
                </div>
                <div class="stat-card" style="padding:16px">
                  <div style="font-size:1.5rem;font-weight:800;color:var(--success)">{{ count($histories) * 100 }}</div>
                  <div style="font-size:0.75rem;color:var(--text-secondary)">Poin Donor</div>
                </div>
              </div>
              <div class="request-detail mt-12">
                <div class="request-detail-label">Terakhir Donor</div>
                <div class="request-detail-value">
                  @if(count($histories) > 0)
                    {{ \Carbon\Carbon::parse($histories[0]['date'])->format('d M Y') }}
                  @else
                    Belum Pernah
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- RIGHT: Donor Profile Form -->
        <div class="card">
          <div class="card-header">
            <span class="card-title">🩸 Profil Donor Saya</span>
            @if(auth()->user()->is_donor)
              <span class="badge badge-green text-xs"><span class="badge-dot"></span>Aktif</span>
            @else
              <span class="badge badge-gray text-xs">Belum Aktif</span>
            @endif
          </div>
          <div class="card-body">
            <form id="donorProfileForm" method="POST" action="{{ route('profil-donor.update') }}">
              @csrf
              <div class="form-row">
                <div class="form-group">
                  <label class="form-label">Golongan Darah</label>
                  <select name="blood_type" class="form-control" required>
                    <option value="A" {{ auth()->user()->gol_darah == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ auth()->user()->gol_darah == 'B' ? 'selected' : '' }}>B</option>
                    <option value="AB" {{ auth()->user()->gol_darah == 'AB' ? 'selected' : '' }}>AB</option>
                    <option value="O" {{ auth()->user()->gol_darah == 'O' ? 'selected' : '' }}>O</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-label">Rhesus</label>
                  <select name="rhesus" class="form-control" required>
                    <option value="+" {{ auth()->user()->rhesus == '+' ? 'selected' : '' }}>Positif (+)</option>
                    <option value="-" {{ auth()->user()->rhesus == '-' ? 'selected' : '' }}>Negatif (-)</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label class="form-label">Berat Badan (kg)</label>
                  <input type="number" name="weight" class="form-control" value="{{ auth()->user()->berat_badan ?? '70' }}" min="45" max="200" required>
                  <div class="form-hint">Minimal 45 kg untuk donor</div>
                </div>
                <div class="form-group">
                  <label class="form-label">Usia</label>
                  <input type="number" name="age" class="form-control" value="{{ auth()->user()->usia ?? '25' }}" min="17" max="65" required>
                  <div class="form-hint">17-65 tahun</div>
                </div>
              </div>

              <div class="form-group">
                <label class="form-label">Tanggal Donor Terakhir</label>
                <input type="date" name="last_donor_date" class="form-control" value="{{ auth()->user()->donationHistories()->latest()->first()?->tanggal_donor ?? '' }}">
                <div class="form-hint">Kosongkan jika belum pernah donor</div>
              </div>

              <div class="form-group">
                <label class="form-label">Lokasi Donor (Kota/Kabupaten)</label>
                <select name="location" class="form-control" required>
                  <option value="Banda Aceh" {{ auth()->user()->lokasi == 'Banda Aceh' ? 'selected' : '' }}>Banda Aceh</option>
                  <option value="Aceh Besar" {{ auth()->user()->lokasi == 'Aceh Besar' ? 'selected' : '' }}>Aceh Besar</option>
                  <option value="Lhokseumawe" {{ auth()->user()->lokasi == 'Lhokseumawe' ? 'selected' : '' }}>Lhokseumawe</option>
                  <option value="Langsa" {{ auth()->user()->lokasi == 'Langsa' ? 'selected' : '' }}>Langsa</option>
                  <option value="Meulaboh" {{ auth()->user()->lokasi == 'Meulaboh' ? 'selected' : '' }}>Meulaboh</option>
                  <option value="Sigli" {{ auth()->user()->lokasi == 'Sigli' ? 'selected' : '' }}>Sigli</option>
                  <option value="Sabang" {{ auth()->user()->lokasi == 'Sabang' ? 'selected' : '' }}>Sabang</option>
                  <option value="Lainnya" {{ auth()->user()->lokasi == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
              </div>

              <div class="form-group">
                <label class="form-label">Riwayat Penyakit / Catatan Kesehatan</label>
                <textarea name="health_notes" class="form-control" rows="3" placeholder="Contoh: Tidak ada riwayat penyakit serius. Tekanan darah normal.">{{ auth()->user()->catatan_kesehatan }}</textarea>
                <div class="form-hint">Informasi ini membantu memastikan keamanan donor darah</div>
              </div>

              <button type="submit" class="btn btn-primary btn-full">
                💾 Simpan Profil Donor
              </button>
            </form>
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

  // Handle active status toggle via AJAX
  document.getElementById('donorActiveToggle').addEventListener('change', function() {
      fetch('{{ route("profil-donor.toggleActive") }}', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify({ is_donor: this.checked })
      })
      .then(res => res.json())
      .then(data => {
          showToast(data.is_donor ? 'Status pendonor diaktifkan!' : 'Status pendonor dinonaktifkan.', 'success');
          document.getElementById('donorToggleStatus').textContent = data.is_donor ? 'Aktif sebagai Pendonor' : 'Nonaktif sebagai Pendonor';
          document.getElementById('donorToggleStatus').style.color = data.is_donor ? 'var(--success)' : 'var(--text-secondary)';
          // update local currentUser state
          window.currentUser.isDonorActive = data.is_donor;
          localStorage.setItem('bc_user', JSON.stringify(window.currentUser));
      });
  });

  // Handle availability status toggle via AJAX
  document.getElementById('donorStatusToggle').addEventListener('change', function() {
      const newStatus = this.checked ? 'Tersedia' : 'Tidak Tersedia';
      fetch('{{ route("profil-donor.toggleStatus") }}', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify({ status_donor: newStatus })
      })
      .then(res => res.json())
      .then(data => {
          showToast('Status ketersediaan disimpan: ' + data.status_donor, 'success');
          document.getElementById('donorStatusLabel').textContent = data.status_donor;
          document.getElementById('donorStatusLabel').style.color = data.status_donor === 'Tersedia' ? 'var(--success)' : 'var(--text-secondary)';
          // update local currentUser state
          window.currentUser.donorStatus = data.status_donor;
          localStorage.setItem('bc_user', JSON.stringify(window.currentUser));
      });
  });
</script>
</body>
</html>
