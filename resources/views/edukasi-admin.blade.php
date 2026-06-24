<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Edukasi - BloodConnect Aceh Admin</title>
  <link rel="stylesheet" href="assets/css/style.css">
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
      <a href="{{ route('admin.dashboard') }}"><span class="nav-icon">🏠</span> Dashboard</a>
      <a href="{{ route('admin.dashboard') }}"><span class="nav-icon">📋</span> Permintaan Donor</a>
      <a href="{{ route('admin.dashboard') }}"><span class="nav-icon">👥</span> Pengguna & Pendonor</a>
      <a href="{{ route('admin.dashboard') }}"><span class="nav-icon">📊</span> Laporan</a>
      <div class="nav-section-label">Lainnya</div>
      <a href="{{ route('admin.edukasi') }}" class="active"><span class="nav-icon">📚</span> Edukasi</a>
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
        <h1 class="page-title">Kelola Artikel Edukasi</h1>
      </div>
      <button class="btn btn-primary btn-sm" onclick="openArticleModal()">+ Tambah Artikel</button>
    </div>

    <div class="page-content">

      <!-- Stats bar -->
      <div class="grid-4 mb-24">
        <div class="stat-card">
          <div class="stat-icon blue">📚</div>
          <div class="stat-value" id="totalArticleCount">6</div>
          <div class="stat-label">Total Artikel</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon green">✅</div>
          <div class="stat-value" id="publishedCount">6</div>
          <div class="stat-label">Dipublikasikan</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon yellow">📝</div>
          <div class="stat-value" id="draftCount">0</div>
          <div class="stat-label">Draft</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon red">📂</div>
          <div class="stat-value">6</div>
          <div class="stat-label">Kategori</div>
        </div>
      </div>

      <!-- Filter & Search -->
      <div class="filters-bar mb-20">
        <div class="filter-group">
          <span class="filter-label">Kategori</span>
          <select class="filter-select" id="filterCategory" onchange="filterArticles()">
            <option value="">Semua Kategori</option>
            <option>Syarat Donor</option>
            <option>Manfaat Donor</option>
            <option>Persiapan</option>
            <option>Pasca Donor</option>
            <option>Edukasi</option>
            <option>Pengetahuan Dasar</option>
          </select>
        </div>
        <div class="filter-group">
          <span class="filter-label">Status</span>
          <select class="filter-select" id="filterStatus" onchange="filterArticles()">
            <option value="">Semua Status</option>
            <option value="published">Dipublikasikan</option>
            <option value="draft">Draft</option>
          </select>
        </div>
        <div class="search-box" style="flex:1;min-width:220px">
          <span class="search-icon">🔍</span>
          <input type="text" class="form-control" id="searchArticleAdmin" placeholder="Cari judul atau kategori..." oninput="filterArticles()">
        </div>
      </div>

      <!-- Articles Table -->
      <div class="card">
        <div class="card-header">
          <span class="card-title">📋 Daftar Artikel</span>
          <span id="articleCountLabel" class="text-sm text-light">6 artikel</span>
        </div>
        <div class="table-wrapper" style="border:none;border-radius:0">
          <table>
            <thead>
              <tr>
                <th>Judul Artikel</th>
                <th>Kategori</th>
                <th>Waktu Baca</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody id="articlesAdminTbody">
              <!-- Rendered by JS -->
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </main>
</div>

<!-- MODAL: TAMBAH / EDIT ARTIKEL -->
<div class="modal-overlay" id="modalArticle">
  <div class="modal modal-lg">
    <div class="modal-header">
      <h3 class="modal-title" id="modalArticleTitle">➕ Tambah Artikel</h3>
      <button class="modal-close">✕</button>
    </div>
    <div class="modal-body">
      <form id="articleForm">
        <input type="hidden" id="articleId" value="">
        <div class="form-group">
          <label class="form-label">Judul Artikel *</label>
          <input type="text" class="form-control" id="articleTitle" placeholder="Judul artikel edukasi" required>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Kategori *</label>
            <select class="form-control" id="articleCategory" required>
              <option value="">-- Pilih Kategori --</option>
              <option>Syarat Donor</option>
              <option>Manfaat Donor</option>
              <option>Persiapan</option>
              <option>Pasca Donor</option>
              <option>Edukasi</option>
              <option>Pengetahuan Dasar</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Waktu Baca (menit) *</label>
            <input type="number" class="form-control" id="articleReadTime" placeholder="Contoh: 5" min="1" max="60" required>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">Ikon / Emoji</label>
          <input type="text" class="form-control" id="articleIcon" placeholder="Contoh: 📋" maxlength="4">
          <div class="form-hint">Emoji yang muncul sebagai ikon artikel</div>
        </div>
        <div class="form-group">
          <label class="form-label">Ringkasan Artikel *</label>
          <textarea class="form-control" id="articleExcerpt" rows="3" placeholder="Tuliskan ringkasan singkat isi artikel..." required></textarea>
          <div class="form-hint">Ringkasan ini yang tampil di halaman daftar artikel pengguna</div>
        </div>
        <div class="form-group">
          <label class="form-label">Isi Artikel *</label>
          <textarea class="form-control" id="articleContent" rows="8" placeholder="Tuliskan isi lengkap artikel di sini..." required></textarea>
        </div>
        <div class="form-group">
          <label class="form-label">Tags</label>
          <input type="text" class="form-control" id="articleTags" placeholder="Pisahkan dengan koma. Contoh: donor, kesehatan, tips">
          <div class="form-hint">Tags membantu pengguna menemukan artikel melalui pencarian</div>
        </div>
        <div style="display:flex;align-items:center;justify-content:space-between;padding:12px;background:var(--surface-2);border-radius:var(--r-md)">
          <div>
            <div style="font-weight:600;font-size:0.875rem;color:var(--text-strong)">Status Publikasi</div>
            <div class="text-xs text-light mt-4">Aktifkan untuk langsung tampil di halaman edukasi pengguna</div>
          </div>
          <label class="toggle">
            <input type="checkbox" id="articlePublished" checked>
            <span class="toggle-slider"></span>
          </label>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button class="modal-close btn btn-ghost">Batal</button>
      <button class="btn btn-primary" id="btnSaveArticle" onclick="saveArticle()">💾 Simpan Artikel</button>
    </div>
  </div>
</div>

<!-- MODAL: KONFIRMASI HAPUS -->
<div class="modal-overlay" id="modalDeleteArticle">
  <div class="modal" style="max-width:400px">
    <div class="modal-header">
      <h3 class="modal-title">🗑️ Hapus Artikel</h3>
      <button class="modal-close">✕</button>
    </div>
    <div class="modal-body">
      <p style="color:var(--text);line-height:1.6">Apakah Anda yakin ingin menghapus artikel <strong id="deleteArticleTitle"></strong>? Tindakan ini tidak dapat dibatalkan.</p>
    </div>
    <div class="modal-footer">
      <button class="modal-close btn btn-ghost">Batal</button>
      <button class="btn btn-danger" id="btnConfirmDelete" onclick="confirmDeleteArticle()">🗑️ Ya, Hapus</button>
    </div>
  </div>
</div>

<!-- MODAL: PREVIEW ARTIKEL -->
<div class="modal-overlay" id="modalPreviewArticle">
  <div class="modal modal-lg">
    <div class="modal-header">
      <h3 class="modal-title">👁 Preview Artikel</h3>
      <button class="modal-close">✕</button>
    </div>
    <div class="modal-body" id="previewArticleContent"></div>
    <div class="modal-footer">
      <button class="modal-close btn btn-ghost">Tutup</button>
    </div>
  </div>
</div>

<div class="toast-container"></div>
<script src="assets/js/script.js"></script>
<script>
  // Local copy of articles for admin management
  let adminArticles = dummyArticles.map((a, i) => ({
    ...a,
    published: true,
    content: `Ini adalah isi lengkap artikel "${a.title}". Konten lengkap akan dikelola melalui backend Laravel.`
  }));

  let deleteTargetId = null;

  // ── Render table ───────────────────────────────────
  function renderAdminArticles(list) {
    const tbody = document.getElementById('articlesAdminTbody');
    const countLabel = document.getElementById('articleCountLabel');
    if (!tbody) return;

    if (!list) list = adminArticles;
    countLabel.textContent = `${list.length} artikel`;

    if (list.length === 0) {
      tbody.innerHTML = `<tr><td colspan="5" style="text-align:center;padding:32px;color:var(--text-secondary)">Belum ada artikel.</td></tr>`;
      return;
    }

    tbody.innerHTML = list.map(a => `
      <tr>
        <td>
          <div style="display:flex;align-items:center;gap:10px">
            <div style="width:36px;height:36px;background:var(--red-50);border-radius:var(--r-sm);display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0">${a.icon}</div>
            <div>
              <div style="font-weight:600;color:var(--text-strong)">${a.title}</div>
              <div class="text-xs text-light">${(a.tags || []).join(', ')}</div>
            </div>
          </div>
        </td>
        <td><span class="badge badge-blue">${a.category}</span></td>
        <td><span class="text-sm">⏱ ${a.readTime}</span></td>
        <td>${a.published
          ? '<span class="badge badge-green"><span class="badge-dot"></span>Dipublikasikan</span>'
          : '<span class="badge badge-gray">Draft</span>'}</td>
        <td>
          <div style="display:flex;gap:6px;flex-wrap:wrap">
            <button class="btn btn-ghost btn-sm" onclick="previewArticle(${a.id})">👁 Preview</button>
            <button class="btn btn-primary btn-sm" onclick="openArticleModal(${a.id})">✏️ Edit</button>
            <button class="btn btn-danger btn-sm" onclick="openDeleteModal(${a.id})">🗑️ Hapus</button>
          </div>
        </td>
      </tr>
    `).join('');
  }

  // ── Filter ─────────────────────────────────────────
  function filterArticles() {
    const cat = document.getElementById('filterCategory').value;
    const status = document.getElementById('filterStatus').value;
    const q = document.getElementById('searchArticleAdmin').value.toLowerCase();

    const filtered = adminArticles.filter(a => {
      const matchCat = !cat || a.category === cat;
      const matchStatus = !status || (status === 'published' ? a.published : !a.published);
      const matchQ = !q || a.title.toLowerCase().includes(q) || a.category.toLowerCase().includes(q);
      return matchCat && matchStatus && matchQ;
    });
    renderAdminArticles(filtered);
  }

  // ── Open modal (add or edit) ───────────────────────
  function openArticleModal(id) {
    const form = document.getElementById('articleForm');
    form.reset();

    if (id) {
      const article = adminArticles.find(a => a.id === id);
      if (!article) return;
      document.getElementById('modalArticleTitle').textContent = '✏️ Edit Artikel';
      document.getElementById('articleId').value = article.id;
      document.getElementById('articleTitle').value = article.title;
      document.getElementById('articleCategory').value = article.category;
      document.getElementById('articleReadTime').value = parseInt(article.readTime);
      document.getElementById('articleIcon').value = article.icon;
      document.getElementById('articleExcerpt').value = article.excerpt;
      document.getElementById('articleContent').value = article.content || '';
      document.getElementById('articleTags').value = (article.tags || []).join(', ');
      document.getElementById('articlePublished').checked = article.published;
    } else {
      document.getElementById('modalArticleTitle').textContent = '➕ Tambah Artikel';
      document.getElementById('articleId').value = '';
      document.getElementById('articlePublished').checked = true;
    }
    showModal('modalArticle');
  }

  // ── Save (add / update) ────────────────────────────
  function saveArticle() {
    const id = document.getElementById('articleId').value;
    const title = document.getElementById('articleTitle').value.trim();
    const category = document.getElementById('articleCategory').value;
    const readTime = document.getElementById('articleReadTime').value;
    const icon = document.getElementById('articleIcon').value.trim() || '📄';
    const excerpt = document.getElementById('articleExcerpt').value.trim();
    const content = document.getElementById('articleContent').value.trim();
    const tags = document.getElementById('articleTags').value.split(',').map(t => t.trim()).filter(Boolean);
    const published = document.getElementById('articlePublished').checked;

    if (!title || !category || !readTime || !excerpt || !content) {
      showToast('Mohon lengkapi semua field yang wajib diisi.', 'error');
      return;
    }

    if (id) {
      // Update existing
      const idx = adminArticles.findIndex(a => a.id == id);
      if (idx !== -1) {
        adminArticles[idx] = { ...adminArticles[idx], title, category, readTime: `${readTime} menit`, icon, excerpt, content, tags, published };
        // TODO: Replace with Laravel API PUT /api/admin/articles/{id}
        showToast('Artikel berhasil diperbarui!', 'success');
      }
    } else {
      // Add new
      const newId = Math.max(...adminArticles.map(a => a.id)) + 1;
      adminArticles.push({ id: newId, title, category, readTime: `${readTime} menit`, icon, excerpt, content, tags, published });
      // TODO: Replace with Laravel API POST /api/admin/articles
      showToast('Artikel baru berhasil ditambahkan!', 'success');
    }

    hideModal('modalArticle');
    renderAdminArticles();
    updateArticleStats();
  }

  // ── Delete ─────────────────────────────────────────
  function openDeleteModal(id) {
    deleteTargetId = id;
    const article = adminArticles.find(a => a.id === id);
    if (!article) return;
    document.getElementById('deleteArticleTitle').textContent = `"${article.title}"`;
    showModal('modalDeleteArticle');
  }

  function confirmDeleteArticle() {
    if (deleteTargetId === null) return;
    // TODO: Replace with Laravel API DELETE /api/admin/articles/{id}
    adminArticles = adminArticles.filter(a => a.id !== deleteTargetId);
    deleteTargetId = null;
    hideModal('modalDeleteArticle');
    renderAdminArticles();
    updateArticleStats();
    showToast('Artikel berhasil dihapus.', 'success');
  }

  // ── Preview ────────────────────────────────────────
  function previewArticle(id) {
    const article = adminArticles.find(a => a.id === id);
    if (!article) return;
    document.getElementById('previewArticleContent').innerHTML = `
      <div style="text-align:center;margin-bottom:20px">
        <div style="font-size:3rem;margin-bottom:8px">${article.icon}</div>
        <span class="badge badge-blue">${article.category}</span>
        <h3 style="margin-top:12px;margin-bottom:4px">${article.title}</h3>
        <p class="text-sm text-light">⏱ ${article.readTime} &nbsp;·&nbsp; ${article.published ? '<span style="color:var(--success)">✅ Dipublikasikan</span>' : '<span style="color:var(--text-secondary)">📝 Draft</span>'}</p>
      </div>
      <div style="background:var(--surface-2);border-radius:var(--r-md);padding:16px;margin-bottom:16px">
        <p style="font-style:italic;color:var(--text)">${article.excerpt}</p>
      </div>
      <div style="line-height:1.8;color:var(--text)">${article.content}</div>
      ${article.tags?.length ? `<div style="margin-top:16px;display:flex;gap:6px;flex-wrap:wrap">${article.tags.map(t => `<span class="badge badge-gray">#${t}</span>`).join('')}</div>` : ''}
    `;
    showModal('modalPreviewArticle');
  }

  // ── Update stats ───────────────────────────────────
  function updateArticleStats() {
    document.getElementById('totalArticleCount').textContent = adminArticles.length;
    document.getElementById('publishedCount').textContent = adminArticles.filter(a => a.published).length;
    document.getElementById('draftCount').textContent = adminArticles.filter(a => !a.published).length;
  }

  // ── Init ───────────────────────────────────────────
  document.addEventListener('DOMContentLoaded', function() {
    renderAdminArticles();
  });
</script>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</body>
</html>
