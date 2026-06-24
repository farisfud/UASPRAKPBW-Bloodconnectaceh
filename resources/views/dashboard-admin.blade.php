<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - BloodConnect Aceh</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    .admin-stat-card {
      background: white;
      border-radius: var(--r-xl);
      padding: 20px;
      box-shadow: var(--shadow);
      border: 1px solid var(--border);
      transition: var(--transition);
      display: flex;
      align-items: center;
      gap: 16px;
    }
    .admin-stat-card:hover { transform: translateY(-2px); box-shadow: var(--shadow-md); }
    .admin-stat-icon { width: 52px; height: 52px; border-radius: var(--r-sm); display: flex; align-items: center; justify-content: center; font-size: 1.4rem; flex-shrink: 0; }
    .admin-stat-num { font-size: 1.8rem; font-weight: 800; color: var(--text-strong); line-height: 1; }
    .admin-stat-label { font-size: 0.78rem; color: var(--text-secondary); margin-top: 2px; }
  </style>
</head>
<body>
<div class="layout-wrapper">

  <!-- ADMIN SIDEBAR -->
  <aside class="sidebar admin-sidebar" id="sidebar">
    <div class="sidebar-brand">
      <div class="brand-icon">🩸</div>
      <div class="sidebar-brand-text">Blood<span>Connect</span><br>
        <span style="font-size:0.65rem;font-weight:700;background:linear-gradient(135deg,var(--primary),var(--red-700));color:white;padding:1px 6px;border-radius:4px;letter-spacing:0.05em">ADMIN</span>
      </div>
    </div>
    <nav class="sidebar-nav">
      <div class="nav-section-label">Manajemen</div>
      <a href="{{ route('admin.dashboard') }}" class="active"><span class="nav-icon">🏠</span> Dashboard</a>
      <a href="#" onclick="showSection('requests'); return false;"><span class="nav-icon">📋</span> Permintaan Donor</a>
      <a href="#" onclick="showSection('users'); return false;"><span class="nav-icon">👥</span> Pengguna & Pendonor</a>
      <a href="#" onclick="showSection('reports'); return false;"><span class="nav-icon">📊</span> Laporan <span class="nav-badge">3</span></a>
      <div class="nav-section-label">Lainnya</div>
      <a href="{{ route('admin.edukasi') }}"><span class="nav-icon">📚</span> Edukasi</a>
      <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color:var(--danger)"><span class="nav-icon">🚪</span> Keluar</a>
    </nav>
    <div class="sidebar-footer">
      <div class="sidebar-user">
        <div class="avatar" style="background:linear-gradient(135deg,#553C9A,#805AD5)">AD</div>
        <div class="sidebar-user-info">
          <div class="sidebar-user-name">Admin</div>
          <div class="sidebar-user-role">Super Admin</div>
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
          <h1 class="page-title">Dashboard Admin</h1>
        </div>
      </div>
      <div style="display:flex;gap:10px;align-items:center">
        <span class="badge badge-purple" style="font-size:0.8rem;padding:6px 12px">👑 Super Admin</span>
        <span class="text-sm text-light">15 Jun 2025</span>
      </div>
    </div>

    <div class="page-content">

      <!-- Admin Welcome -->
      <div class="welcome-card mb-24" style="background:linear-gradient(135deg,#553C9A,#6B46C1)">
        <div class="welcome-title">Selamat Datang, Admin 👋</div>
        <p class="welcome-subtitle">Panel pengawas sistem BloodConnect Aceh. Pantau semua aktivitas, permintaan, dan laporan dari sini. Admin berperan sebagai pengawas, bukan penyetuju permintaan.</p>
      </div>

      <!-- Stats -->
      <div class="grid-4 mb-24">
        <div class="admin-stat-card">
          <div class="admin-stat-icon" style="background:#EBF8FF;color:var(--info)">👥</div>
          <div>
            <div class="admin-stat-num" data-counter="2847">0</div>
            <div class="admin-stat-label">Total Pengguna</div>
          </div>
        </div>
        <div class="admin-stat-card">
          <div class="admin-stat-icon" style="background:var(--red-50);color:var(--primary)">🩸</div>
          <div>
            <div class="admin-stat-num" data-counter="1203">0</div>
            <div class="admin-stat-label">Pendonor Aktif</div>
          </div>
        </div>
        <div class="admin-stat-card">
          <div class="admin-stat-icon" style="background:var(--warning-light);color:var(--warning)">⏳</div>
          <div>
            <div class="admin-stat-num">4</div>
            <div class="admin-stat-label">Permintaan Aktif</div>
          </div>
        </div>
        <div class="admin-stat-card">
          <div class="admin-stat-icon" style="background:var(--success-light);color:var(--success)">✅</div>
          <div>
            <div class="admin-stat-num" data-counter="956">0</div>
            <div class="admin-stat-label">Permintaan Selesai</div>
          </div>
        </div>
      </div>

      <!-- Second row stats -->
      <div class="grid-4 mb-24">
        <div class="admin-stat-card">
          <div class="admin-stat-icon" style="background:var(--danger-light);color:var(--danger)">🚨</div>
          <div>
            <div class="admin-stat-num">3</div>
            <div class="admin-stat-label">Laporan Masuk</div>
          </div>
        </div>
        <div class="admin-stat-card">
          <div class="admin-stat-icon" style="background:#FAF5FF;color:#805AD5">🩸</div>
          <div>
            <div class="admin-stat-num">2</div>
            <div class="admin-stat-label">Permintaan Darurat</div>
          </div>
        </div>
        <div class="admin-stat-card">
          <div class="admin-stat-icon" style="background:#FFFFF0;color:var(--warning)">📅</div>
          <div>
            <div class="admin-stat-num" data-counter="8">0</div>
            <div class="admin-stat-label">Pendonor Baru Bulan Ini</div>
          </div>
        </div>
        <div class="admin-stat-card">
          <div class="admin-stat-icon" style="background:#F0FFF4;color:var(--success)">📈</div>
          <div>
            <div class="admin-stat-num">95%</div>
            <div class="admin-stat-label">Tingkat Keberhasilan</div>
          </div>
        </div>
      </div>

      <!-- SECTION: REQUESTS TABLE -->
      <div id="sectionRequests">
        <div class="card mb-24">
          <div class="card-header">
            <span class="card-title">📋 Daftar Permintaan Donor</span>
            <div style="display:flex;gap:8px;align-items:center;flex-wrap:wrap">
              <select class="filter-select" id="filterReqStatus" onchange="filterAdminRequests()">
                <option value="">Semua Status</option>
                <option>Menunggu Donor</option>
                <option>Dihubungi</option>
                <option>Ada Pendonor</option>
                <option>Selesai</option>
                <option>Dibatalkan</option>
              </select>
              <select class="filter-select" id="filterReqUrgency" onchange="filterAdminRequests()">
                <option value="">Semua Urgensi</option>
                <option>Darurat</option>
                <option>Sedang</option>
                <option>Rendah</option>
              </select>
              <div class="search-box" style="width:180px">
                <span class="search-icon">🔍</span>
                <input type="text" class="form-control" id="searchReq" placeholder="Cari pasien / RS..." style="font-size:0.8rem" oninput="filterAdminRequests()">
              </div>
              <span id="reqCountLabel" class="text-sm text-light" style="white-space:nowrap"></span>
            </div>
          </div>
          <div class="table-wrapper" style="border:none;border-radius:0">
            <table>
              <thead>
                <tr>
                  <th>Nama Pasien</th>
                  <th>Darah</th>
                  <th>Rumah Sakit</th>
                  <th>Lokasi</th>
                  <th>Urgensi</th>
                  <th>Status</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="adminRequestsTbody">
                <!-- Rendered by JS -->
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- SECTION: USERS TABLE -->
      <div id="sectionUsers">
        <div class="card mb-24">
          <div class="card-header">
            <span class="card-title">👥 Daftar Pengguna & Pendonor</span>
            <div style="display:flex;gap:8px;align-items:center;flex-wrap:wrap">
              <select class="filter-select" id="filterUserRole" onchange="filterAdminUsers()">
                <option value="">Semua Peran</option>
                <option value="donor">Pendonor</option>
                <option value="umum">Pengguna Umum</option>
              </select>
              <select class="filter-select" id="filterUserDonorStatus" onchange="filterAdminUsers()">
                <option value="">Semua Status Donor</option>
                <option>Tersedia</option>
                <option>Tidak Tersedia</option>
              </select>
              <div class="search-box" style="width:180px">
                <span class="search-icon">🔍</span>
                <input type="text" class="form-control" id="adminUserSearch" placeholder="Cari pengguna..." style="font-size:0.8rem" oninput="filterAdminUsers()">
              </div>
              <span id="userCountLabel" class="text-sm text-light" style="white-space:nowrap"></span>
            </div>
          </div>
          <div class="table-wrapper" style="border:none;border-radius:0">
            <table>
              <thead>
                <tr>
                  <th>Nama User</th>
                  <th>Email</th>
                  <th>Lokasi</th>
                  <th>Peran</th>
                  <th>Golongan Darah</th>
                  <th>Status Donor</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="adminUsersTbody">
                <!-- Rendered by JS -->
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- SECTION: REPORTS -->
      <div id="sectionReports">
        <div class="card">
          <div class="card-header">
            <span class="card-title">🚨 Laporan Pengguna</span>
            <div style="display:flex;gap:8px;align-items:center;flex-wrap:wrap">
              <select class="filter-select" id="filterReportStatus" onchange="filterAdminReports()">
                <option value="">Semua Status</option>
                <option>Perlu Ditinjau</option>
                <option>Ditangani</option>
              </select>
              <select class="filter-select" id="filterReportType" onchange="filterAdminReports()">
                <option value="">Semua Jenis</option>
                <option>Kontak Tidak Valid</option>
                <option>Permintaan Palsu</option>
                <option>Pendonor Tidak Responsif</option>
              </select>
              <span id="reportCountLabel" class="text-sm text-light" style="white-space:nowrap"></span>
            </div>
          </div>
          <div id="adminReportsContainer" style="padding:16px">
            <!-- Rendered by JS -->
          </div>
        </div>
      </div>

    </div>
  </main>
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

<div class="toast-container"></div>
<script src="assets/js/script.js"></script>
<script>
  // ── Section scroll ─────────────────────────────────
  function showSection(section) {
    document.getElementById(`section${section.charAt(0).toUpperCase() + section.slice(1)}`)
      ?.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }

  // ── All requests data (combined) ───────────────────
  function getAllRequests() {
    return [...dummyRequests, ...myRequests];
  }

  // ── FILTER: Permintaan Donor ───────────────────────
  function filterAdminRequests() {
    const status  = document.getElementById('filterReqStatus')?.value || '';
    const urgency = document.getElementById('filterReqUrgency')?.value || '';
    const q       = (document.getElementById('searchReq')?.value || '').toLowerCase();

    const all = getAllRequests();
    const filtered = all.filter(r => {
      const matchStatus  = !status  || r.status === status;
      const matchUrgency = !urgency || r.urgency === urgency;
      const matchQ       = !q || r.patient.toLowerCase().includes(q)
                              || r.hospital.toLowerCase().includes(q)
                              || r.location.toLowerCase().includes(q);
      return matchStatus && matchUrgency && matchQ;
    });

    const label = document.getElementById('reqCountLabel');
    if (label) label.textContent = `${filtered.length} dari ${all.length} permintaan`;

    renderAdminRequestsFiltered(filtered);
  }

  function renderAdminRequestsFiltered(list) {
    const tbody = document.getElementById('adminRequestsTbody');
    if (!tbody) return;

    if (list.length === 0) {
      tbody.innerHTML = `<tr><td colspan="8" style="text-align:center;padding:28px;color:var(--text-secondary)">Tidak ada data yang sesuai filter.</td></tr>`;
      return;
    }

    tbody.innerHTML = list.map(r => `
      <tr>
        <td><strong>${r.patient}</strong></td>
        <td><span class="badge badge-red" style="font-weight:800">${r.bloodType}${r.rhesus}</span></td>
        <td>${r.hospital}</td>
        <td>${r.location}</td>
        <td>${getUrgencyBadge(r.urgency)}</td>
        <td>${getStatusBadge(r.status)}</td>
        <td>${r.date}</td>
        <td>
          <div style="display:flex;gap:6px">
            <button class="btn btn-ghost btn-sm" onclick="adminDetailRequest(${r.id})">Detail</button>
            <button class="btn btn-warning btn-sm" onclick="showToast('Permintaan ditandai mencurigakan','warning')">⚠️</button>
            <button class="btn btn-danger btn-sm" onclick="showToast('Fitur hapus hanya tersedia di backend','error')">🗑️</button>
          </div>
        </td>
      </tr>
    `).join('');
  }

  // ── FILTER: Pengguna & Pendonor ────────────────────
  function filterAdminUsers() {
    const role        = document.getElementById('filterUserRole')?.value || '';
    const donorStatus = document.getElementById('filterUserDonorStatus')?.value || '';
    const q           = (document.getElementById('adminUserSearch')?.value || '').toLowerCase();

    const filtered = adminUsers.filter(u => {
      const matchRole   = !role || (role === 'donor' ? u.isDonor : !u.isDonor);
      const matchStatus = !donorStatus || u.donorStatus === donorStatus;
      const matchQ      = !q || u.name.toLowerCase().includes(q)
                             || u.email.toLowerCase().includes(q)
                             || u.location.toLowerCase().includes(q);
      return matchRole && matchStatus && matchQ;
    });

    const label = document.getElementById('userCountLabel');
    if (label) label.textContent = `${filtered.length} dari ${adminUsers.length} pengguna`;

    renderAdminUsersFiltered(filtered);
  }

  function renderAdminUsersFiltered(list) {
    const tbody = document.getElementById('adminUsersTbody');
    if (!tbody) return;

    if (list.length === 0) {
      tbody.innerHTML = `<tr><td colspan="7" style="text-align:center;padding:28px;color:var(--text-secondary)">Tidak ada pengguna yang sesuai filter.</td></tr>`;
      return;
    }

    tbody.innerHTML = list.map(u => `
      <tr>
        <td>
          <div style="display:flex;gap:8px;align-items:center">
            <div class="avatar" style="width:30px;height:30px;font-size:0.75rem">${u.name.split(' ').map(w=>w[0]).join('').substring(0,2)}</div>
            <strong>${u.name}</strong>
          </div>
        </td>
        <td>${u.email}</td>
        <td>📍 ${u.location}</td>
        <td>${u.isDonor ? '<span class="badge badge-green">Pendonor</span>' : '<span class="badge badge-gray">Umum</span>'}</td>
        <td>${u.isDonor ? `<span class="badge badge-red" style="font-weight:800">${u.bloodType}</span>` : '-'}</td>
        <td>${u.isDonor ? getStatusBadge(u.donorStatus) : '-'}</td>
        <td>
          <button class="btn btn-ghost btn-sm" onclick="showToast('Detail user: ${u.name}','info')">Detail</button>
        </td>
      </tr>
    `).join('');
  }

  // ── FILTER: Laporan ────────────────────────────────
  function filterAdminReports() {
    const status = document.getElementById('filterReportStatus')?.value || '';
    const type   = document.getElementById('filterReportType')?.value || '';

    const filtered = adminReports.filter(r => {
      const matchStatus = !status || r.status === status;
      const matchType   = !type   || r.type === type;
      return matchStatus && matchType;
    });

    const label = document.getElementById('reportCountLabel');
    if (label) label.textContent = `${filtered.length} dari ${adminReports.length} laporan`;

    renderAdminReportsFiltered(filtered);
  }

  function renderAdminReportsFiltered(list) {
    const container = document.getElementById('adminReportsContainer');
    if (!container) return;

    if (list.length === 0) {
      container.innerHTML = `<div style="text-align:center;padding:28px;color:var(--text-secondary)">Tidak ada laporan yang sesuai filter.</div>`;
      return;
    }

    container.innerHTML = `
      <div class="table-wrapper">
        <table>
          <thead>
            <tr>
              <th>Jenis Laporan</th>
              <th>Pelapor</th>
              <th>Target</th>
              <th>Tanggal</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            ${list.map(r => `
              <tr>
                <td><strong>${r.type}</strong></td>
                <td>${r.reporter}</td>
                <td>${r.target}</td>
                <td>${r.date}</td>
                <td>${getStatusBadge(r.status)}</td>
                <td>
                  <button class="btn btn-primary btn-sm"
                    onclick="handleReport(${r.id})">
                    ${r.status === 'Ditangani' ? '✅ Selesai' : 'Tangani'}
                  </button>
                </td>
              </tr>
            `).join('')}
          </tbody>
        </table>
      </div>`;
  }

  function handleReport(id) {
    const report = adminReports.find(r => r.id === id);
    if (!report) return;
    report.status = 'Ditangani';
    filterAdminReports();
    showToast('Laporan ditandai sudah ditangani.', 'success');
  }

  function adminDetailRequest(id) {
    openRequestDetail(id);
  }

  // ── Init on load ───────────────────────────────────
  document.addEventListener('DOMContentLoaded', function() {
    // Initial render with no filter applied
    filterAdminRequests();
    filterAdminUsers();
    filterAdminReports();
  });
</script>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</body>
</html>
