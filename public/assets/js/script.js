/* =============================================
   BloodConnect Aceh - Main JavaScript
   Frontend Only - Dummy Data
   ============================================= */

/* =============================================
   DUMMY DATA
   TODO: Replace dummy data with Laravel API fetch
   ============================================= */

// --- Current User (Logged In) ---
const currentUser = window.currentUser || {
  id: 1,
  name: "Ahmad Fauzi",
  email: "ahmad.fauzi@email.com",
  phone: "081234567890",
  location: "Banda Aceh",
  avatar: "AF",
  isDonorActive: true,
  bloodType: "A",
  rhesus: "+",
  weight: 72,
  lastDonorDate: "2024-12-15",
  healthNotes: "Tidak ada riwayat penyakit serius",
  donorStatus: "Tersedia",
  nextDonorDate: "2025-03-15"
};

// --- Donors Dummy Data ---
// TODO: Replace with Laravel API fetch /api/donors
const dummyDonors = window.dummyDonors || [
  { id: 1, name: "Ahmad Fauzi", bloodType: "A", rhesus: "+", location: "Banda Aceh", status: "Tersedia", lastDonor: "15 Des 2024", phone: "081234567890", age: 28, weight: 72, totalDonations: 8 },
  { id: 2, name: "Siti Rahma", bloodType: "O", rhesus: "+", location: "Banda Aceh", status: "Tersedia", lastDonor: "20 Nov 2024", phone: "082345678901", age: 25, weight: 58, totalDonations: 5 },
  { id: 3, name: "Muhammad Rizki", bloodType: "B", rhesus: "+", location: "Aceh Besar", status: "Tidak Tersedia", lastDonor: "05 Jan 2025", phone: "083456789012", age: 32, weight: 80, totalDonations: 12 },
  { id: 4, name: "Nurul Fadilah", bloodType: "AB", rhesus: "+", location: "Lhokseumawe", status: "Tersedia", lastDonor: "10 Des 2024", phone: "084567890123", age: 27, weight: 55, totalDonations: 3 },
  { id: 5, name: "Budi Santoso", bloodType: "O", rhesus: "-", location: "Langsa", status: "Tersedia", lastDonor: "28 Nov 2024", phone: "085678901234", age: 35, weight: 75, totalDonations: 15 },
  { id: 6, name: "Dina Marlina", bloodType: "A", rhesus: "-", location: "Meulaboh", status: "Tersedia", lastDonor: "08 Jan 2025", phone: "086789012345", age: 29, weight: 62, totalDonations: 6 },
  { id: 7, name: "Faisal Akbar", bloodType: "B", rhesus: "-", location: "Sigli", status: "Tidak Tersedia", lastDonor: "15 Nov 2024", phone: "087890123456", age: 31, weight: 78, totalDonations: 9 },
  { id: 8, name: "Rina Safitri", bloodType: "AB", rhesus: "-", location: "Banda Aceh", status: "Tersedia", lastDonor: "22 Des 2024", phone: "088901234567", age: 24, weight: 52, totalDonations: 2 },
  { id: 9, name: "Irfan Hamdani", bloodType: "O", rhesus: "+", location: "Banda Aceh", status: "Tersedia", lastDonor: "03 Jan 2025", phone: "089012345678", age: 33, weight: 83, totalDonations: 11 },
  { id: 10, name: "Yusra Amelia", bloodType: "A", rhesus: "+", location: "Aceh Besar", status: "Tidak Tersedia", lastDonor: "30 Des 2024", phone: "081123456789", age: 26, weight: 60, totalDonations: 4 },
  { id: 11, name: "Khalid Mursyid", bloodType: "B", rhesus: "+", location: "Lhokseumawe", status: "Tersedia", lastDonor: "12 Jan 2025", phone: "082234567890", age: 30, weight: 77, totalDonations: 7 },
  { id: 12, name: "Putri Handayani", bloodType: "O", rhesus: "+", location: "Langsa", status: "Tersedia", lastDonor: "18 Des 2024", phone: "083345678901", age: 22, weight: 50, totalDonations: 1 },
];

// --- Requests Dummy Data ---
// TODO: Replace with Laravel API fetch /api/blood-requests
let dummyRequests = window.dummyRequests || [
  { id: 1, patient: "Nurul Huda", bloodType: "O", rhesus: "+", bags: 3, hospital: "RSUD Meuraxa", location: "Banda Aceh", urgency: "Darurat", contact: "Hasan", phone: "082111222333", notes: "Pasien membutuhkan darah segera untuk operasi", status: "Menunggu Donor", date: "15 Jun 2025", matchedDonor: null },
  { id: 2, patient: "Rudi Hartono", bloodType: "A", rhesus: "+", bags: 2, hospital: "RS Zainoel Abidin", location: "Banda Aceh", urgency: "Sedang", contact: "Dewi Hartono", phone: "081333444555", notes: "Untuk operasi elektif minggu depan", status: "Ada Pendonor", date: "14 Jun 2025", matchedDonor: "Ahmad Fauzi" },
  { id: 3, patient: "Sari Dewi", bloodType: "B", rhesus: "-", bags: 1, hospital: "RSU Cut Mutia", location: "Lhokseumawe", urgency: "Rendah", contact: "Agus Dewi", phone: "084555666777", notes: "Persediaan cadangan untuk pasien thalassemia", status: "Selesai", date: "10 Jun 2025", matchedDonor: "Faisal Akbar" },
  { id: 4, patient: "Bayu Pratama", bloodType: "AB", rhesus: "+", bags: 4, hospital: "RS Bungong Jeumpa", location: "Aceh Besar", urgency: "Darurat", contact: "Lina Pratama", phone: "085777888999", notes: "Kecelakaan lalu lintas, kondisi kritis", status: "Dihubungi", date: "15 Jun 2025", matchedDonor: null },
  { id: 5, patient: "Mira Susanti", bloodType: "O", rhesus: "-", bags: 2, hospital: "RS Langsa", location: "Langsa", urgency: "Sedang", contact: "Doni Susanti", phone: "086888999000", notes: "Pasien anemia berat", status: "Menunggu Donor", date: "13 Jun 2025", matchedDonor: null },
  { id: 6, patient: "Andi Setiawan", bloodType: "A", rhesus: "-", bags: 3, hospital: "RSUD Meulaboh", location: "Meulaboh", urgency: "Darurat", contact: "Rina Setiawan", phone: "087999000111", notes: "Persalinan emergency", status: "Dibatalkan", date: "08 Jun 2025", matchedDonor: null },
];

// My own requests (from current user)
let myRequests = window.myRequests || [
  { id: 101, patient: "Kakak Ahmad", bloodType: "O", rhesus: "+", bags: 2, hospital: "RS Zainoel Abidin", location: "Banda Aceh", urgency: "Sedang", contact: "Ahmad Fauzi", phone: "081234567890", notes: "Untuk persiapan operasi", status: "Selesai", date: "12 Jun 2025", matchedDonor: "Irfan Hamdani" },
  { id: 102, patient: "Paman Rizal", bloodType: "A", rhesus: "+", bags: 1, hospital: "RSUD Meuraxa", location: "Banda Aceh", urgency: "Rendah", contact: "Ahmad Fauzi", phone: "081234567890", notes: "", status: "Menunggu Donor", date: "14 Jun 2025", matchedDonor: null },
];

// --- Donor History (Current User as Donor) ---
// TODO: Replace with Laravel API fetch /api/donor-history
let myDonorHistory = window.myDonorHistory || [
  { id: 1, date: "15 Des 2024", patient: "Bagas Nugroho", hospital: "RS Zainoel Abidin", location: "Banda Aceh", bloodType: "A+", status: "Selesai", notes: "Donor rutin ketiga" },
  { id: 2, date: "15 Sep 2024", patient: "Donor PMI Rutin", hospital: "PMI Banda Aceh", location: "Banda Aceh", bloodType: "A+", status: "Selesai", notes: "" },
  { id: 3, date: "15 Jun 2024", patient: "Aisyah Putri", hospital: "RSUD Meuraxa", location: "Banda Aceh", bloodType: "A+", status: "Selesai", notes: "" },
  { id: 4, date: "10 Jun 2025", patient: "Rudi Hartono", hospital: "RS Zainoel Abidin", location: "Banda Aceh", bloodType: "A+", status: "Menunggu Konfirmasi Selesai", notes: "Menunggu konfirmasi dari pasien" },
];

// --- Notifications Dummy ---
// TODO: Replace with Laravel API fetch /api/notifications
let notifications = window.notifications || [
  { id: 1, title: "Permintaan Darah Cocok!", desc: "Ada permintaan darah A+ dari pasien Rudi Hartono di RS Zainoel Abidin. Cocok dengan profil donor Anda.", time: "5 menit lalu", read: false, icon: "🩸", type: "match" },
  { id: 2, title: "Bersedia Donor Dikonfirmasi", desc: "Anda telah dikonfirmasi sebagai pendonor untuk pasien Rudi Hartono. Silakan hubungi penanggung jawab.", time: "2 jam lalu", read: false, icon: "✅", type: "confirm" },
  { id: 3, title: "Permintaan Selesai", desc: "Permintaan donor untuk pasien Kakak Ahmad telah selesai. Terima kasih telah membantu!", time: "3 hari lalu", read: true, icon: "🎉", type: "done" },
  { id: 4, title: "Jadwal Donor Berikutnya", desc: "Anda sudah bisa donor kembali pada 15 Maret 2025. Jaga kesehatan dan tetap semangat!", time: "1 minggu lalu", read: true, icon: "📅", type: "reminder" },
  { id: 5, title: "Permintaan Darurat O+", desc: "Permintaan darah O+ yang sangat mendesak! Pasien Nurul Huda di RSUD Meuraxa membutuhkan segera.", time: "1 jam lalu", read: false, icon: "🚨", type: "urgent" },
  { id: 6, title: "Pendonor Baru Bergabung", desc: "Pendonor baru bergabung di wilayah Banda Aceh. Database donor terus berkembang.", time: "5 jam lalu", read: true, icon: "👤", type: "info" },
];

// --- Articles Dummy ---
// TODO: Replace with Laravel API fetch /api/articles
const dummyArticles = window.dummyArticles || [
  { id: 1, title: "Syarat Menjadi Pendonor Darah", category: "Syarat Donor", excerpt: "Ketahui syarat lengkap sebelum menjadi pendonor darah. Mulai dari batas usia, berat badan, tekanan darah, hingga kondisi kesehatan yang diperlukan.", readTime: "4 menit", icon: "📋", tags: ["syarat", "pendonor", "kesehatan"] },
  { id: 2, title: "Manfaat Donor Darah Bagi Kesehatan", category: "Manfaat Donor", excerpt: "Donor darah bukan hanya membantu orang lain, tetapi juga memberikan manfaat besar bagi kesehatan pendonor sendiri. Simak manfaatnya secara ilmiah.", readTime: "5 menit", icon: "❤️", tags: ["manfaat", "kesehatan", "donor"] },
  { id: 3, title: "Persiapan Sebelum Donor Darah", category: "Persiapan", excerpt: "Persiapan yang tepat sebelum donor darah sangat penting untuk memastikan keamanan dan kenyamanan proses donor. Pelajari apa saja yang perlu dilakukan.", readTime: "3 menit", icon: "🍎", tags: ["persiapan", "sebelum", "donor"] },
  { id: 4, title: "Hal yang Harus Dihindari Setelah Donor", category: "Pasca Donor", excerpt: "Setelah donor darah, ada beberapa hal yang sebaiknya Anda hindari untuk mencegah efek samping dan mempercepat pemulihan tubuh.", readTime: "3 menit", icon: "⚠️", tags: ["setelah", "pasca", "hindari"] },
  { id: 5, title: "Mitos dan Fakta Donor Darah", category: "Edukasi", excerpt: "Masih banyak mitos seputar donor darah yang beredar di masyarakat. Mari kita luruskan fakta dan mitos tersebut berdasarkan bukti medis.", readTime: "6 menit", icon: "💡", tags: ["mitos", "fakta", "edukasi"] },
  { id: 6, title: "Golongan Darah dan Kompabilitasnya", category: "Pengetahuan Dasar", excerpt: "Memahami sistem golongan darah ABO dan Rhesus sangat penting dalam proses transfusi darah. Pelajari siapa bisa menerima darah dari siapa.", readTime: "7 menit", icon: "🔬", tags: ["golongan darah", "kompatibilitas", "ABO", "rhesus"] },
];

// --- Admin Data ---
// TODO: Replace with Laravel API fetch /api/admin/users
const adminUsers = window.adminUsers || [
  { id: 1, name: "Ahmad Fauzi", email: "ahmad.fauzi@email.com", location: "Banda Aceh", isDonor: true, bloodType: "A+", donorStatus: "Tersedia", phone: "081234567890" },
  { id: 2, name: "Siti Rahma", email: "siti.rahma@email.com", location: "Banda Aceh", isDonor: true, bloodType: "O+", donorStatus: "Tersedia", phone: "082345678901" },
  { id: 3, name: "Muhammad Rizki", email: "m.rizki@email.com", location: "Aceh Besar", isDonor: true, bloodType: "B+", donorStatus: "Tidak Tersedia", phone: "083456789012" },
  { id: 4, name: "Nurul Fadilah", email: "nurul.f@email.com", location: "Lhokseumawe", isDonor: true, bloodType: "AB+", donorStatus: "Tersedia", phone: "084567890123" },
  { id: 5, name: "Budi Santoso", email: "budi.s@email.com", location: "Langsa", isDonor: true, bloodType: "O-", donorStatus: "Tersedia", phone: "085678901234" },
  { id: 6, name: "Ira Wulandari", email: "ira.w@email.com", location: "Banda Aceh", isDonor: false, bloodType: "-", donorStatus: "-", phone: "086789012345" },
  { id: 7, name: "Dani Pratama", email: "dani.p@email.com", location: "Sigli", isDonor: false, bloodType: "-", donorStatus: "-", phone: "087890123456" },
];

// Admin Reports
const adminReports = window.adminReports || [
  { id: 1, type: "Kontak Tidak Valid", reporter: "Budi Santoso", target: "Pendonor: Muhammad Rizki", date: "14 Jun 2025", status: "Perlu Ditinjau" },
  { id: 2, type: "Permintaan Palsu", reporter: "Ira Wulandari", target: "Permintaan ID #5", date: "13 Jun 2025", status: "Ditangani" },
  { id: 3, type: "Pendonor Tidak Responsif", reporter: "Ahmad Fauzi", target: "Pendonor: Dina Marlina", date: "12 Jun 2025", status: "Perlu Ditinjau" },
];

/* =============================================
   UTILITY FUNCTIONS
   ============================================= */

// Get badge HTML for status
function getStatusBadge(status) {
  const statusMap = {
    "Tersedia": "badge-green",
    "Tidak Tersedia": "badge-gray",
    "Menunggu Donor": "badge-yellow",
    "Dihubungi": "badge-blue",
    "Ada Pendonor": "badge-purple",
    "Selesai": "badge-green",
    "Dibatalkan": "badge-gray",
    "Menunggu Konfirmasi Selesai": "badge-yellow",
    "Diproses": "badge-purple",
    "Perlu Ditinjau": "badge-orange",
    "Ditangani": "badge-green",
  };
  const cls = statusMap[status] || "badge-gray";
  const isDynamic = ["Menunggu Donor", "Dihubungi", "Ada Pendonor", "Tersedia", "Perlu Ditinjau"].includes(status);
  const dot = isDynamic ? `<span class="badge-dot"></span>` : "";
  return `<span class="badge ${cls}">${dot}${status}</span>`;
}

// Get urgency badge
function getUrgencyBadge(urgency) {
  const urgencyMap = {
    "Darurat": "badge-red",
    "Sedang": "badge-yellow",
    "Rendah": "badge-green",
  };
  const cls = urgencyMap[urgency] || "badge-gray";
  return `<span class="badge ${cls}">${urgency}</span>`;
}

// Show toast notification
function showToast(message, type = "success") {
  const container = document.querySelector('.toast-container') || createToastContainer();
  const toast = document.createElement('div');
  toast.className = `toast toast-${type}`;
  
  const icons = { success: "✅", error: "❌", info: "ℹ️", warning: "⚠️" };
  toast.innerHTML = `<span>${icons[type] || "ℹ️"}</span><span>${message}</span>`;
  
  container.appendChild(toast);
  
  setTimeout(() => {
    toast.classList.add('out');
    setTimeout(() => toast.remove(), 300);
  }, 3500);
}

function createToastContainer() {
  const container = document.createElement('div');
  container.className = 'toast-container';
  document.body.appendChild(container);
  return container;
}

// Show modal
function showModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.classList.add('open');
    document.body.style.overflow = 'hidden';
  }
}

// Hide modal
function hideModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.classList.remove('open');
    document.body.style.overflow = '';
  }
}

// Close modal on overlay click
document.addEventListener('click', function(e) {
  if (e.target.classList.contains('modal-overlay')) {
    e.target.classList.remove('open');
    document.body.style.overflow = '';
  }
  if (e.target.classList.contains('modal-close')) {
    const modal = e.target.closest('.modal-overlay');
    if (modal) {
      modal.classList.remove('open');
      document.body.style.overflow = '';
    }
  }
});

// Show loading skeleton
function showSkeleton(container, count = 3, type = 'card') {
  container.innerHTML = '';
  for (let i = 0; i < count; i++) {
    if (type === 'card') {
      container.innerHTML += `
        <div class="skeleton-card">
          <div style="display:flex;gap:12px;align-items:center;margin-bottom:14px">
            <div class="skeleton skeleton-avatar"></div>
            <div style="flex:1">
              <div class="skeleton skeleton-title mb-8"></div>
              <div class="skeleton skeleton-text w-3-4"></div>
            </div>
          </div>
          <div class="skeleton skeleton-text w-full mb-8"></div>
          <div class="skeleton skeleton-text w-1-2"></div>
        </div>`;
    } else if (type === 'row') {
      container.innerHTML += `
        <tr>
          <td><div class="skeleton skeleton-text w-3-4"></div></td>
          <td><div class="skeleton skeleton-text w-1-2"></div></td>
          <td><div class="skeleton skeleton-text w-full"></div></td>
          <td><div class="skeleton skeleton-text w-3-4"></div></td>
          <td><div class="skeleton skeleton-text w-1-2"></div></td>
        </tr>`;
    }
  }
}

/* =============================================
   NAVBAR SCROLL EFFECT
   ============================================= */
const navbar = document.querySelector('.navbar');
if (navbar) {
  window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 10);
  });
}

/* =============================================
   MOBILE NAV
   ============================================= */
const hamburger = document.getElementById('hamburger');
const mobileMenu = document.getElementById('mobileMenu');

if (hamburger && mobileMenu) {
  hamburger.addEventListener('click', () => {
    mobileMenu.classList.toggle('open');
  });

  document.addEventListener('click', (e) => {
    if (!hamburger.contains(e.target) && !mobileMenu.contains(e.target)) {
      mobileMenu.classList.remove('open');
    }
  });
}

/* =============================================
   SIDEBAR TOGGLE (Dashboard)
   ============================================= */
const sidebarToggle = document.getElementById('sidebarToggle');
const sidebar = document.querySelector('.sidebar');
const sidebarOverlay = document.querySelector('.sidebar-overlay');

if (sidebarToggle && sidebar) {
  sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('open');
    if (sidebarOverlay) sidebarOverlay.classList.toggle('open');
  });

  if (sidebarOverlay) {
    sidebarOverlay.addEventListener('click', () => {
      sidebar.classList.remove('open');
      sidebarOverlay.classList.remove('open');
    });
  }
}

/* =============================================
   DONOR SEARCH & FILTER
   ============================================= */
// TODO: Replace filter logic with Laravel API fetch /api/donors?blood_type=A&rhesus=+&location=Banda+Aceh&status=Tersedia
let contactedDonors = new Set();

function renderDonors(donors) {
  const container = document.getElementById('donorGrid');
  if (!container) return;

  if (donors.length === 0) {
    container.innerHTML = `
      <div class="empty-state" style="grid-column:1/-1">
        <div class="empty-state-icon">🔍</div>
        <div class="empty-state-title">Pendonor Tidak Ditemukan</div>
        <p class="empty-state-desc">Pendonor tidak ditemukan. Coba ubah filter pencarian.</p>
      </div>`;
    return;
  }

  container.innerHTML = donors.map(donor => `
    <div class="donor-card" data-id="${donor.id}">
      <div class="donor-card-header">
        <div class="blood-badge">${donor.bloodType}${donor.rhesus}</div>
        <div class="donor-info">
          <div class="donor-name">${donor.name}</div>
          <div class="donor-meta">📍 ${donor.location} · ${donor.totalDonations}x donor</div>
        </div>
        ${getStatusBadge(donor.status)}
      </div>
      <div class="donor-details">
        <div class="donor-detail-item">📅 Terakhir: ${donor.lastDonor}</div>
        <div class="donor-detail-item">⚖️ ${donor.weight} kg</div>
        <div class="donor-detail-item">🎂 ${donor.age} tahun</div>
      </div>
      <div class="donor-card-actions">
        <button class="btn btn-primary btn-sm" onclick="openContactModal(${donor.id})" ${contactedDonors.has(donor.id) ? 'disabled' : ''}>
          ${contactedDonors.has(donor.id) ? '✅ Sudah Dihubungi' : '📞 Hubungi'}
        </button>
        <button class="btn btn-ghost btn-sm" onclick="openDonorDetail(${donor.id})">👁 Detail</button>
      </div>
    </div>
  `).join('');
}

function filterDonors() {
  const bloodType = document.getElementById('filterBlood')?.value || 'Semua';
  const rhesus = document.getElementById('filterRhesus')?.value || 'Semua';
  const location = document.getElementById('filterLocation')?.value || 'Semua Lokasi';
  const status = document.getElementById('filterStatus')?.value || 'Semua Status';
  const search = document.getElementById('searchDonor')?.value?.toLowerCase() || '';

  // TODO: Replace with: fetch(`/api/donors?blood=${bloodType}&rhesus=${rhesus}&location=${location}&status=${status}&search=${search}`)
  let filtered = dummyDonors.filter(d => {
    const matchBlood = bloodType === 'Semua' || d.bloodType === bloodType;
    const matchRhesus = rhesus === 'Semua' || d.rhesus === rhesus;
    const matchLoc = location === 'Semua Lokasi' || d.location === location;
    const matchStatus = status === 'Semua Status' || d.status === status;
    const matchSearch = !search || d.name.toLowerCase().includes(search) || d.location.toLowerCase().includes(search);
    return matchBlood && matchRhesus && matchLoc && matchStatus && matchSearch;
  });

  updateDonorCount(filtered.length);
  renderDonors(filtered);
}

function updateDonorCount(count) {
  const el = document.getElementById('donorCount');
  if (el) el.textContent = `${count} pendonor ditemukan`;
}

// Contact modal
function openContactModal(donorId) {
  const donor = dummyDonors.find(d => d.id === donorId);
  if (!donor) return;

  document.getElementById('modalDonorName').textContent = donor.name;
  document.getElementById('modalDonorBlood').textContent = `${donor.bloodType}${donor.rhesus}`;
  document.getElementById('modalDonorLoc').textContent = donor.location;
  document.getElementById('modalDonorPhone').textContent = donor.phone;
  document.getElementById('modalDonorLastDonor').textContent = donor.lastDonor;
  document.getElementById('modalDonorStatus').innerHTML = getStatusBadge(donor.status);
  
  const waBtn = document.getElementById('btnWhatsApp');
  if (waBtn) waBtn.href = `https://wa.me/62${donor.phone.substring(1)}?text=Halo%20${encodeURIComponent(donor.name)}%2C%20saya%20membutuhkan%20bantuan%20donor%20darah%20${donor.bloodType}${donor.rhesus}.%20Apakah%20Anda%20bersedia%3F`;

  const confirmBtn = document.getElementById('btnConfirmContact');
  if (confirmBtn) {
    confirmBtn.onclick = () => {
      contactedDonors.add(donorId);
      hideModal('modalContact');
      showToast(`${donor.name} berhasil dihubungi. Status diperbarui.`, 'success');
      filterDonors();
    };
  }

  showModal('modalContact');
}

// Donor detail modal
function openDonorDetail(donorId) {
  const donor = dummyDonors.find(d => d.id === donorId);
  if (!donor) return;

  const content = document.getElementById('modalDonorDetailContent');
  if (content) {
    content.innerHTML = `
      <div style="text-align:center;margin-bottom:20px">
        <div class="blood-badge" style="width:64px;height:64px;font-size:1.3rem;margin:0 auto 12px">${donor.bloodType}${donor.rhesus}</div>
        <h4>${donor.name}</h4>
        <p class="text-light text-sm">📍 ${donor.location}</p>
      </div>
      <div class="grid-2" style="gap:12px;margin-bottom:16px">
        <div class="request-detail">
          <div class="request-detail-label">Golongan Darah</div>
          <div class="request-detail-value">${donor.bloodType} ${donor.rhesus}</div>
        </div>
        <div class="request-detail">
          <div class="request-detail-label">Status</div>
          <div class="request-detail-value">${getStatusBadge(donor.status)}</div>
        </div>
        <div class="request-detail">
          <div class="request-detail-label">Terakhir Donor</div>
          <div class="request-detail-value">${donor.lastDonor}</div>
        </div>
        <div class="request-detail">
          <div class="request-detail-label">Total Donasi</div>
          <div class="request-detail-value">${donor.totalDonations}x</div>
        </div>
        <div class="request-detail">
          <div class="request-detail-label">Berat Badan</div>
          <div class="request-detail-value">${donor.weight} kg</div>
        </div>
        <div class="request-detail">
          <div class="request-detail-label">Usia</div>
          <div class="request-detail-value">${donor.age} tahun</div>
        </div>
      </div>
      <div class="alert alert-info">
        <span class="alert-icon">ℹ️</span>
        <div class="alert-content">
          <div class="alert-desc">Status selesai hanya dapat ditandai setelah kebutuhan darah Anda terpenuhi oleh pendonor ini.</div>
        </div>
      </div>`;
  }
  showModal('modalDonorDetail');
}

// Init filter events
function initDonorFilters() {
  const filterIds = ['filterBlood', 'filterRhesus', 'filterLocation', 'filterStatus', 'searchDonor'];
  filterIds.forEach(id => {
    const el = document.getElementById(id);
    if (el) el.addEventListener(el.tagName === 'INPUT' ? 'input' : 'change', filterDonors);
  });
}

/* =============================================
   BLOOD REQUEST FORM
   ============================================= */
// TODO: Replace with Laravel API POST /api/blood-requests
function initRequestForm() {
  // Let form submit natively to Laravel backend
}

/* =============================================
   MY REQUESTS (Riwayat Permintaan)
   ============================================= */
// TODO: Replace with Laravel API fetch /api/my-requests
let pendingActionId = null;
let pendingAction = null;

function renderMyRequests(requests = myRequests) {
  const container = document.getElementById('myRequestsContainer');
  if (!container) return;

  if (requests.length === 0) {
    container.innerHTML = `
      <div class="empty-state">
        <div class="empty-state-icon">📋</div>
        <div class="empty-state-title">Belum Ada Permintaan</div>
        <p class="empty-state-desc">Anda belum pernah membuat permintaan donor darah.</p>
        <a href="/permintaan-darurat" class="btn btn-primary mt-16">Buat Permintaan</a>
      </div>`;
    return;
  }

  container.innerHTML = `
    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th>Nama Pasien</th>
            <th>Darah</th>
            <th>Rumah Sakit</th>
            <th>Lokasi</th>
            <th>Tanggal</th>
            <th>Urgensi</th>
            <th>Status</th>
            <th>Pendonor</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          ${requests.map(r => `
            <tr>
              <td><strong>${r.patient}</strong></td>
              <td><span class="badge badge-red" style="font-weight:800">${r.bloodType}${r.rhesus}</span></td>
              <td>${r.hospital}</td>
              <td>📍 ${r.location}</td>
              <td>${r.date}</td>
              <td>${getUrgencyBadge(r.urgency)}</td>
              <td>${getStatusBadge(r.status)}</td>
              <td>${r.matchedDonor ? `<span class="text-success font-semibold">${r.matchedDonor}</span>` : '<span class="text-light">-</span>'}</td>
              <td>
                <div style="display:flex;gap:6px;flex-wrap:wrap">
                  <button class="btn btn-ghost btn-sm" onclick="openRequestDetail(${r.id})">Detail</button>
                  ${r.status !== 'Selesai' && r.status !== 'Dibatalkan' ? `
                    <button class="btn btn-success btn-sm" onclick="confirmAction(${r.id}, 'selesai')">✅ Selesai</button>
                    <button class="btn btn-danger btn-sm" onclick="confirmAction(${r.id}, 'batal')">❌ Batalkan</button>
                  ` : ''}
                </div>
              </td>
            </tr>
          `).join('')}
        </tbody>
      </table>
    </div>`;
}

function confirmAction(id, action) {
  pendingActionId = id;
  pendingAction = action;
  const modal = document.getElementById('modalConfirmAction');
  if (modal) {
    const msg = document.getElementById('confirmActionMsg');
    if (msg) {
      msg.textContent = action === 'selesai'
        ? 'Apakah Anda yakin ingin menandai permintaan ini sebagai Selesai? Tindakan ini menandakan kebutuhan darah sudah terpenuhi.'
        : 'Apakah Anda yakin ingin membatalkan permintaan ini? Tindakan ini tidak dapat dibatalkan.';
    }
    showModal('modalConfirmAction');
  }
}

function executeAction() {
  if (pendingActionId === null) return;

  // TODO: Replace with Laravel API PUT /api/blood-requests/{id}/status
  const req = myRequests.find(r => r.id === pendingActionId);
  if (req) {
    req.status = pendingAction === 'selesai' ? 'Selesai' : 'Dibatalkan';
  }
  const globalReq = dummyRequests.find(r => r.id === pendingActionId);
  if (globalReq) {
    globalReq.status = pendingAction === 'selesai' ? 'Selesai' : 'Dibatalkan';
  }

  hideModal('modalConfirmAction');
  renderMyRequests();
  updateMyRequestStats();
  showToast(pendingAction === 'selesai' ? 'Permintaan ditandai selesai!' : 'Permintaan dibatalkan.', pendingAction === 'selesai' ? 'success' : 'info');

  pendingActionId = null;
  pendingAction = null;
}

function updateMyRequestStats() {
  const active = myRequests.filter(r => r.status === 'Menunggu Donor' || r.status === 'Dihubungi' || r.status === 'Ada Pendonor').length;
  const el = document.getElementById('activeRequestCount');
  if (el) el.textContent = active;
}

function openRequestDetail(id) {
  const r = myRequests.find(req => req.id === id) || dummyRequests.find(req => req.id === id);
  if (!r) return;

  const content = document.getElementById('modalRequestDetailContent');
  if (content) {
    content.innerHTML = `
      <div style="display:flex;gap:12px;align-items:center;margin-bottom:20px">
        <div class="blood-badge" style="width:56px;height:56px;font-size:1.1rem">${r.bloodType}${r.rhesus}</div>
        <div>
          <h4>${r.patient}</h4>
          <p class="text-light text-sm">${r.hospital} · ${r.location}</p>
        </div>
        ${getUrgencyBadge(r.urgency)}
      </div>
      <div class="grid-2" style="gap:10px;margin-bottom:16px">
        <div class="request-detail"><div class="request-detail-label">Golongan Darah</div><div class="request-detail-value">${r.bloodType} ${r.rhesus}</div></div>
        <div class="request-detail"><div class="request-detail-label">Jumlah Kantong</div><div class="request-detail-value">${r.bags} kantong</div></div>
        <div class="request-detail"><div class="request-detail-label">Tanggal Permintaan</div><div class="request-detail-value">${r.date}</div></div>
        <div class="request-detail"><div class="request-detail-label">Status</div><div class="request-detail-value">${getStatusBadge(r.status)}</div></div>
        <div class="request-detail"><div class="request-detail-label">Penanggung Jawab</div><div class="request-detail-value">${r.contact}</div></div>
        <div class="request-detail"><div class="request-detail-label">Kontak</div><div class="request-detail-value">${r.phone}</div></div>
        ${r.matchedDonor ? `<div class="request-detail" style="grid-column:1/-1"><div class="request-detail-label">Pendonor</div><div class="request-detail-value text-success">${r.matchedDonor}</div></div>` : ''}
      </div>
      ${r.notes ? `<div class="alert alert-info"><span class="alert-icon">📝</span><div class="alert-content"><div class="alert-title">Catatan</div><div class="alert-desc">${r.notes}</div></div></div>` : ''}`;
  }
  showModal('modalRequestDetail');
}

/* =============================================
   MATCHED REQUESTS (Permintaan Cocok untuk Pendonor)
   ============================================= */
// TODO: Replace with Laravel API fetch /api/matched-requests
let declinedRequests = new Set();
// committedIds diisi dari server via window.committedIds (Blade), bukan localStorage
let acceptedRequests = new Set(window.committedIds || []);

function getMatchedRequests() {
  if (!currentUser.isDonorActive) return [];
  return (window.dummyRequests || []).filter(r =>
    !declinedRequests.has(r.id)
  );
}

function renderMatchedRequests() {
  const container = document.getElementById('matchedRequestsGrid');
  if (!container) return;

  const matched = getMatchedRequests();

  if (!currentUser.isDonorActive) {
    container.innerHTML = `
      <div class="empty-state" style="grid-column:1/-1">
        <div class="empty-state-icon">🩸</div>
        <div class="empty-state-title">Profil Donor Belum Aktif</div>
        <p class="empty-state-desc">Lengkapi dan aktifkan profil donor terlebih dahulu untuk melihat permintaan yang cocok.</p>
        <a href="/profil-donor" class="btn btn-primary mt-16">Lengkapi Profil Donor</a>
      </div>`;
    return;
  }

  if (matched.length === 0) {
    container.innerHTML = `
      <div class="empty-state" style="grid-column:1/-1">
        <div class="empty-state-icon">✅</div>
        <div class="empty-state-title">Tidak Ada Permintaan Cocok</div>
        <p class="empty-state-desc">Belum ada permintaan darah yang cocok dengan profil donor Anda saat ini.</p>
      </div>`;
    return;
  }

  container.innerHTML = matched.map(r => `
    <div class="request-card urgency-${r.urgency.toLowerCase()}" id="reqCard_${r.id}">
      <div class="request-header">
        <div class="blood-badge">${r.bloodType}${r.rhesus}</div>
        <div class="request-info">
          <div class="request-patient">${r.patient}</div>
          <div class="request-hospital">🏥 ${r.hospital} · ${r.location}</div>
        </div>
        ${getUrgencyBadge(r.urgency)}
      </div>
      <div class="request-details">
        <div class="request-detail"><div class="request-detail-label">Kantong</div><div class="request-detail-value">${r.bags} kantong</div></div>
        <div class="request-detail"><div class="request-detail-label">Tanggal</div><div class="request-detail-value">${r.date}</div></div>
        <div class="request-detail"><div class="request-detail-label">Status</div><div class="request-detail-value">${getStatusBadge(r.status)}</div></div>
        <div class="request-detail"><div class="request-detail-label">Kontak PJ</div><div class="request-detail-value">${r.contact} · ${r.phone}</div></div>
      </div>
      ${r.notes ? `<p class="text-sm text-light mb-12">📝 ${r.notes}</p>` : ''}
      <div class="request-actions">
        ${acceptedRequests.has(r.id)
          ? `<button class="btn btn-success btn-sm" disabled>✅ Sudah Bersedia Donor</button>`
          : `<button class="btn btn-primary btn-sm" onclick="openWillingModal(${r.id})">🩸 Saya Bersedia Donor</button>`
        }
        <button class="btn btn-ghost btn-sm" onclick="declineRequest(${r.id})">❌ Tidak Bisa Donor</button>
        <button class="btn btn-ghost btn-sm" onclick="openRequestDetail(${r.id})">👁 Detail</button>
      </div>
    </div>
  `).join('');
}

let pendingWillingId = null;

function openWillingModal(id) {
  pendingWillingId = id;
  showModal('modalWilling');
}

function confirmWilling() {
  if (!pendingWillingId) return;

  const btn = document.getElementById('btnConfirmWilling');
  if (btn) { btn.disabled = true; btn.textContent = 'Menyimpan...'; }

  const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

  fetch('/donor-commitments', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': csrfToken,
      'Accept': 'application/json',
    },
    body: JSON.stringify({ blood_request_id: pendingWillingId }),
  })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        // Tandai sebagai sudah di-commit (persisten via server, sementara via Set)
        acceptedRequests.add(pendingWillingId);

        // Update status kartu di data lokal agar tampilan langsung berubah
        const req = (window.dummyRequests || []).find(r => r.id === pendingWillingId);
        if (req) req.status = 'Ada Pendonor';

        pendingWillingId = null;
        hideModal('modalWilling');
        renderMatchedRequests();
        showToast(data.message, 'success');
      } else {
        showToast(data.message || 'Gagal menyimpan kesediaan.', 'error');
      }
    })
    .catch(() => {
      showToast('Terjadi kesalahan jaringan. Coba lagi.', 'error');
    })
    .finally(() => {
      if (btn) { btn.disabled = false; btn.textContent = '🩸 Ya, Saya Bersedia'; }
    });
}

function declineRequest(id) {
  declinedRequests.add(id);
  renderMatchedRequests();
  showToast('Permintaan disembunyikan dari daftar Anda.', 'info');
}

/* =============================================
   DONOR HISTORY
   ============================================= */
// TODO: Replace with Laravel API fetch /api/my-donor-history
function renderDonorHistory() {
  const container = document.getElementById('donorHistoryContainer');
  if (!container) return;

  if (myDonorHistory.length === 0) {
    container.innerHTML = `
      <div class="empty-state">
        <div class="empty-state-icon">📊</div>
        <div class="empty-state-title">Belum Ada Riwayat Donor</div>
        <p class="empty-state-desc">Anda belum pernah melakukan donor darah. Aktifkan profil donor untuk mulai membantu.</p>
        <a href="/profil-donor" class="btn btn-primary mt-16">Aktifkan Profil Donor</a>
      </div>`;
    return;
  }

  container.innerHTML = `
    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Penerima / Tujuan</th>
            <th>Rumah Sakit</th>
            <th>Lokasi</th>
            <th>Golongan Darah</th>
            <th>Status</th>
            <th>Catatan</th>
          </tr>
        </thead>
        <tbody>
          ${myDonorHistory.map(h => `
            <tr>
              <td>${h.date}</td>
              <td><strong>${h.patient}</strong></td>
              <td>${h.hospital}</td>
              <td>📍 ${h.location}</td>
              <td><span class="badge badge-red" style="font-weight:800">${h.bloodType}</span></td>
              <td>${getStatusBadge(h.status)}</td>
              <td>${h.notes ? `<span class="text-light text-sm">${h.notes}</span>` : '-'}</td>
            </tr>
          `).join('')}
        </tbody>
      </table>
    </div>`;
}

/* =============================================
   NOTIFICATIONS
   ============================================= */
// TODO: Replace with Laravel API fetch /api/notifications
function renderNotifications() {
  const container = document.getElementById('notifList');
  if (!container) return;

  const unreadCount = notifications.filter(n => !n.read).length;
  const countEl = document.getElementById('unreadCount');
  if (countEl) countEl.textContent = unreadCount > 0 ? unreadCount : '';

  if (notifications.length === 0) {
    container.innerHTML = `
      <div class="empty-state">
        <div class="empty-state-icon">🔔</div>
        <div class="empty-state-title">Tidak Ada Notifikasi</div>
        <p class="empty-state-desc">Belum ada notifikasi untuk Anda.</p>
      </div>`;
    return;
  }

  container.innerHTML = notifications.map(n => `
    <div class="notif-item ${n.read ? '' : 'unread'}" onclick="markRead(${n.id})">
      <div class="notif-icon ${n.read ? '' : 'bg-red-50'}" style="${n.read ? 'background:var(--bg-2)' : 'background:#FFF5F5'}">${n.icon}</div>
      <div class="notif-content">
        <div class="notif-title">${n.title}</div>
        <div class="notif-desc">${n.desc}</div>
        <div class="notif-time">🕐 ${n.time}</div>
      </div>
      ${!n.read ? '<div class="notif-unread-dot"></div>' : ''}
    </div>
  `).join('');
}

function markRead(id) {
  // TODO: Replace with Laravel API PUT /api/notifications/{id}/read
  const notif = notifications.find(n => n.id === id);
  if (notif) notif.read = true;
  renderNotifications();
}

function markAllRead() {
  // TODO: Replace with Laravel API PUT /api/notifications/read-all
  notifications.forEach(n => n.read = true);
  renderNotifications();
  showToast('Semua notifikasi ditandai sudah dibaca.', 'success');
}

/* =============================================
   EDUCATION / ARTICLES
   ============================================= */
// TODO: Replace with Laravel API fetch /api/articles?search=keyword
function renderArticles(articles = dummyArticles) {
  const container = document.getElementById('articlesGrid');
  if (!container) return;

  if (articles.length === 0) {
    container.innerHTML = `
      <div class="empty-state" style="grid-column:1/-1">
        <div class="empty-state-icon">📚</div>
        <div class="empty-state-title">Artikel Tidak Ditemukan</div>
        <p class="empty-state-desc">Tidak ada artikel yang cocok dengan pencarian Anda.</p>
      </div>`;
    return;
  }

  container.innerHTML = articles.map(a => `
    <div class="article-card">
      <div class="article-thumb">${a.icon}</div>
      <div class="article-body">
        <div class="article-meta">
          <span class="badge badge-red">${a.category}</span>
          <span class="article-read-time">⏱ ${a.readTime}</span>
        </div>
        <h5 class="article-title">${a.title}</h5>
        <p class="article-excerpt">${a.excerpt}</p>
        <button class="btn btn-outline btn-sm btn-full" onclick="showToast('Fitur membaca artikel segera tersedia!', 'info')">Baca Selengkapnya</button>
      </div>
    </div>
  `).join('');
}

function searchArticles() {
  const query = document.getElementById('searchArticle')?.value?.toLowerCase() || '';
  // TODO: Replace with Laravel API fetch /api/articles?search=${query}
  const filtered = dummyArticles.filter(a =>
    a.title.toLowerCase().includes(query) ||
    a.category.toLowerCase().includes(query) ||
    a.tags.some(t => t.includes(query))
  );
  renderArticles(filtered);
}

/* =============================================
   DONOR PROFILE - TOGGLE
   ============================================= */
// TODO: Replace with Laravel API PUT /api/user/donor-profile
function initDonorToggle() {
  const toggle = document.getElementById('donorActiveToggle');
  if (!toggle) return;

  toggle.checked = currentUser.isDonorActive;
  updateDonorToggleUI(currentUser.isDonorActive);

  toggle.addEventListener('change', function() {
    currentUser.isDonorActive = this.checked;
    // TODO: Replace with Laravel API PUT /api/user/donor-status
    updateDonorToggleUI(this.checked);
    showToast(
      this.checked ? 'Anda sekarang aktif sebagai pendonor! 🩸' : 'Status donor dinonaktifkan.',
      this.checked ? 'success' : 'info'
    );
  });
}

function updateDonorToggleUI(active) {
  const statusText = document.getElementById('donorToggleStatus');
  if (statusText) {
    statusText.textContent = active ? 'Aktif sebagai Pendonor' : 'Tidak Aktif sebagai Pendonor';
    statusText.style.color = active ? 'var(--success)' : 'var(--text-light)';
  }
}

// Donor status toggle (Tersedia / Tidak Tersedia)
function initDonorStatusToggle() {
  const toggle = document.getElementById('donorStatusToggle');
  if (!toggle) return;

  toggle.checked = currentUser.donorStatus === 'Tersedia';

  toggle.addEventListener('change', function() {
    currentUser.donorStatus = this.checked ? 'Tersedia' : 'Tidak Tersedia';
    // TODO: Replace with Laravel API PUT /api/user/donor-availability
    const label = document.getElementById('donorStatusLabel');
    if (label) label.textContent = currentUser.donorStatus;
    showToast(`Status ketersediaan: ${currentUser.donorStatus}`, 'success');
  });
}

// Save donor profile form
function initDonorProfileForm() {
  const form = document.getElementById('donorProfileForm');
  if (!form) return;

  form.addEventListener('submit', function(e) {
    e.preventDefault();
    // TODO: Replace with Laravel API PUT /api/user/donor-profile
    showToast('Profil donor berhasil disimpan! ✅', 'success');
  });
}

/* =============================================
   SETTINGS PAGE
   ============================================= */
// TODO: Replace with Laravel API PUT /api/user/settings
function initSettingsForm() {
  const form = document.getElementById('settingsForm');
  if (!form) return;

  form.addEventListener('submit', function(e) {
    e.preventDefault();
    // TODO: Replace with Laravel API PUT /api/user/profile
    showToast('Pengaturan berhasil disimpan!', 'success');
  });
}

/* =============================================
   AUTH TABS
   ============================================= */
function initAuthTabs() {
  const tabs = document.querySelectorAll('.auth-tab');
  const forms = document.querySelectorAll('.auth-form');

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      tabs.forEach(t => t.classList.remove('active'));
      forms.forEach(f => f.classList.remove('active'));
      tab.classList.add('active');
      const target = document.getElementById(tab.dataset.target);
      if (target) target.classList.add('active');
    });
  });
}

function initLoginForm() {
  // Let forms submit natively to Laravel backend
}

function redirectToDashboard() {
  window.location.href = '/dashboard';
}

/* =============================================
   AUTH STATE (localStorage)
   ============================================= */
const AUTH_KEY = 'bc_logged_in';
const USER_KEY = 'bc_user';

function authLogin(userData) {
  localStorage.setItem(AUTH_KEY, '1');
  localStorage.setItem(USER_KEY, JSON.stringify(userData));
}

function authLogout() {
  localStorage.removeItem(AUTH_KEY);
  localStorage.removeItem(USER_KEY);
  window.location.href = '/';
}

function isLoggedIn() {
  return localStorage.getItem(AUTH_KEY) === '1';
}

function getLoggedUser() {
  try { return JSON.parse(localStorage.getItem(USER_KEY)) || null; }
  catch { return null; }
}

// Guard: redirect to login if not authenticated
// Call this at the top of protected pages
function requireAuth() {
  if (!isLoggedIn()) {
    window.location.href = '/login?redirect=' + encodeURIComponent(window.location.pathname);
    return false;
  }
  return true;
}

// Attach logout to all sidebar logout links
function initLogoutLinks() {
  document.querySelectorAll('a[href="/"]').forEach(link => {
    const icon = link.querySelector('.nav-icon');
    if (icon && icon.textContent.trim() === '🚪') {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        authLogout();
      });
    }
  });
}

/* =============================================
   AUTH UI — Update UI based on login state
   ============================================= */
function initAuthUI() {
  const user = getLoggedUser();
  const loggedIn = isLoggedIn() && user;

  // Skip auth UI injection on admin pages
  const isAdminPage = document.querySelector('.admin-sidebar') !== null;

  // ── 1. SIDEBAR footer: user info ─────────────────
  const sidebarUserEl = document.querySelector('.sidebar-user');
  if (sidebarUserEl && !isAdminPage) {
    if (loggedIn) {
      sidebarUserEl.setAttribute('onclick', "window.location='/profil-donor'");
      sidebarUserEl.innerHTML = `
        <div class="avatar">${user.avatar || user.name.substring(0,2).toUpperCase()}</div>
        <div class="sidebar-user-info">
          <div class="sidebar-user-name">${user.name}</div>
          <div class="sidebar-user-role">Pendonor Aktif · ${user.bloodType || '-'}</div>
        </div>`;
    } else {
      sidebarUserEl.setAttribute('onclick', "window.location='/login'");
      sidebarUserEl.innerHTML = `
        <div class="avatar" style="background:var(--gray-300);color:var(--gray-600)">?</div>
        <div class="sidebar-user-info">
          <div class="sidebar-user-name">Tamu</div>
          <div class="sidebar-user-role"><a href="/login" style="color:var(--primary);font-weight:600">Masuk / Daftar →</a></div>
        </div>`;
    }
  }

  // ── 2. DASHBOARD welcome card ─────────────────────
  const welcomeTitle = document.querySelector('.welcome-title');
  const welcomeSubtitle = document.querySelector('.welcome-subtitle');
  const welcomeActions = document.querySelector('.welcome-actions');
  if (welcomeTitle && welcomeSubtitle && welcomeActions) {
    if (loggedIn) {
      welcomeTitle.textContent = `Halo, ${user.name} 👋`;
      welcomeSubtitle.innerHTML = `Selamat datang kembali! Anda terdaftar sebagai pendonor aktif. Golongan darah: <strong>${user.bloodType || '-'}</strong> · Lokasi: ${user.location || '-'}`;
      welcomeActions.innerHTML = `
        <a href="/cari-donor" class="btn btn-white btn-sm">🔍 Cari Donor</a>
        <a href="/permintaan-darurat" class="btn btn-sm" style="background:rgba(255,255,255,0.2);color:white;border:1px solid rgba(255,255,255,0.4)">🚨 Ajukan Permintaan</a>
        <a href="/permintaan-cocok" class="btn btn-sm" style="background:rgba(255,255,255,0.2);color:white;border:1px solid rgba(255,255,255,0.4)">🩸 Permintaan Cocok</a>`;
    }
  }

  // ── 3. DASHBOARD: swap guest content → user content ──
  const loginBanner = document.querySelector('.alert.alert-warning.mb-24');
  const statsGrid = document.querySelector('.grid-4.mb-24');
  if (loggedIn && loginBanner && statsGrid) {
    // Hide login banner
    loginBanner.style.display = 'none';

    // Replace stats with personal stats
    statsGrid.innerHTML = `
      <div class="stat-card">
        <div class="stat-icon red">📋</div>
        <div class="stat-value">${window.myActiveRequestsCount ?? 0}</div>
        <div class="stat-label">Permintaan Aktif Saya</div>
        <div class="stat-change up">↑ Berubah real-time</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon blue">📞</div>
        <div class="stat-value">${window.myContactedDonorsCount ?? 0}</div>
        <div class="stat-label">Pendonor Dihubungi</div>
        <div class="stat-change up">↑ Total dihubungi</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon green">🩸</div>
        <div class="stat-value">${user.isDonorActive ? 'Aktif' : 'Nonaktif'}</div>
        <div class="stat-label">Status Donor Saya</div>
        <div class="stat-change up" style="color:var(--success)">● ${user.donorStatus || 'Tersedia'}</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon yellow">📅</div>
        <div class="stat-value" style="font-size:1.2rem">${window.nextDonorDateStr ?? 'Siap'}</div>
        <div class="stat-label">Donor Berikutnya</div>
        <div class="stat-change" style="color:var(--warning)">${window.daysLeftStr ?? 'Bisa donor sekarang'}</div>
      </div>`;

    // Replace grid-2 content with personal content
    const grid2 = document.querySelector('.grid-2');
    if (grid2) {
      grid2.innerHTML = `
        <div>
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
            <h4 style="font-size:1rem;font-weight:700;color:var(--text-strong)">🩸 Permintaan Cocok Terbaru</h4>
            <a href="/permintaan-cocok" class="text-sm text-primary font-semibold">Lihat Semua →</a>
          </div>
          <div style="display:flex;flex-direction:column;gap:12px">
            <div class="request-card urgency-darurat">
              <div class="request-header">
                <div class="blood-badge" style="width:40px;height:40px;font-size:0.8rem">A+</div>
                <div class="request-info">
                  <div class="request-patient">Rudi Hartono</div>
                  <div class="request-hospital">RS Zainoel Abidin · Banda Aceh</div>
                </div>
                <span class="badge badge-yellow"><span class="badge-dot"></span>Sedang</span>
              </div>
              <div style="display:flex;gap:8px;flex-wrap:wrap">
                <a href="/permintaan-cocok" class="btn btn-primary btn-sm">🩸 Bersedia Donor</a>
                <button class="btn btn-ghost btn-sm" onclick="showToast('Lihat detail di halaman Permintaan Cocok','info')">Detail</button>
              </div>
            </div>
            <div class="request-card" style="border-left:3px solid var(--primary)">
              <div class="request-header">
                <div class="blood-badge" style="width:40px;height:40px;font-size:0.8rem">A+</div>
                <div class="request-info">
                  <div class="request-patient">Paman Rizal (Permintaan Saya)</div>
                  <div class="request-hospital">RSUD Meuraxa · Banda Aceh</div>
                </div>
                <span class="badge badge-yellow"><span class="badge-dot"></span>Menunggu</span>
              </div>
              <div style="display:flex;gap:8px">
                <a href="/riwayat-permintaan" class="btn btn-ghost btn-sm">Lihat Riwayat</a>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
            <h4 style="font-size:1rem;font-weight:700;color:var(--text-strong)">📊 Aktivitas Terkini</h4>
            <a href="/riwayat-donor" class="text-sm text-primary font-semibold">Riwayat Donor →</a>
          </div>
          <div style="display:flex;flex-direction:column;gap:8px">
            <div class="notif-item">
              <div class="notif-icon" style="background:#FFF5F5">🩸</div>
              <div class="notif-content">
                <div class="notif-title">Bersedia donor untuk Rudi Hartono</div>
                <div class="notif-time">2 jam lalu · RS Zainoel Abidin</div>
              </div>
              <span class="badge badge-yellow">Menunggu</span>
            </div>
            <div class="notif-item">
              <div class="notif-icon" style="background:#F0FFF4">✅</div>
              <div class="notif-content">
                <div class="notif-title">Permintaan untuk Kakak Ahmad selesai</div>
                <div class="notif-time">3 hari lalu · RS Zainoel Abidin</div>
              </div>
              <span class="badge badge-green">Selesai</span>
            </div>
            <div class="notif-item">
              <div class="notif-icon" style="background:#EBF8FF">📞</div>
              <div class="notif-content">
                <div class="notif-title">Menghubungi pendonor Siti Rahma</div>
                <div class="notif-time">5 hari lalu · Permintaan #102</div>
              </div>
              <span class="badge badge-blue">Dihubungi</span>
            </div>
            <div class="notif-item">
              <div class="notif-icon" style="background:#FFFFF0">📅</div>
              <div class="notif-content">
                <div class="notif-title">Donor ke-8 berhasil dicatat</div>
                <div class="notif-time">15 Des 2024 · PMI Banda Aceh</div>
              </div>
              <span class="badge badge-green">Selesai</span>
            </div>
          </div>
        </div>`;
    }

    // Replace bottom card with donor stats
    const platformCard = document.querySelector('.card.mt-24');
    if (platformCard) {
      platformCard.querySelector('.card-body').innerHTML = `
        <div style="flex:1;min-width:200px">
          <h5 style="margin-bottom:8px">📊 Statistik Donor Anda</h5>
          <p class="text-sm text-light">Total donor berhasil: <strong style="color:var(--text-strong)">8 kali</strong> · Poin donor: <strong style="color:var(--primary)">800 poin</strong></p>
        </div>
        <div style="display:flex;gap:16px;flex-wrap:wrap">
          <div class="donor-status-card" style="flex:1;min-width:150px">
            <div class="donor-status-icon" style="background:var(--red-50)">🩸</div>
            <div class="donor-status-content">
              <div class="donor-status-label">Golongan Darah</div>
              <div class="donor-status-value">${user.bloodType || '-'}</div>
            </div>
          </div>
          <div class="donor-status-card" style="flex:1;min-width:150px">
            <div class="donor-status-icon" style="background:#F0FFF4">✅</div>
            <div class="donor-status-content">
              <div class="donor-status-label">Status</div>
              <div class="donor-status-value" style="font-size:1rem;color:var(--success)">Tersedia</div>
            </div>
          </div>
          <div class="donor-status-card" style="flex:1;min-width:150px">
            <div class="donor-status-icon" style="background:#FFFFF0">📅</div>
            <div class="donor-status-content">
              <div class="donor-status-label">Donor Berikutnya</div>
              <div class="donor-status-value" style="font-size:1rem">15 Mar 2025</div>
            </div>
          </div>
        </div>`;
    }
  }

  // ── 4. PAGE HEADER on dashboard: swap Masuk/Daftar → notif + permintaan baru ──
  const pageHeaderActions = document.querySelector('.page-header > div:last-child');
  if (pageHeaderActions && document.querySelector('.welcome-card') && !isAdminPage) {
    if (loggedIn) {
      pageHeaderActions.innerHTML = `
        <a href="/notifikasi" class="btn btn-ghost btn-sm" style="position:relative">
          🔔
          <span style="position:absolute;top:-4px;right:-4px;width:16px;height:16px;background:var(--primary);color:white;border-radius:50%;font-size:0.6rem;font-weight:700;display:flex;align-items:center;justify-content:center">3</span>
        </a>
        <a href="/permintaan-darurat" class="btn btn-primary btn-sm">+ Permintaan Baru</a>`;
    }
  }

  // ── 5. PUBLIC NAVBAR: swap Masuk/Daftar → nama user + logout ─────────────────
  const navbarActions = document.querySelector('.navbar-actions');
  if (navbarActions && loggedIn && !isAdminPage) {
    navbarActions.innerHTML = `
      <span style="font-size:0.875rem;font-weight:600;color:var(--text-strong)">👤 ${user.name.split(' ')[0]}</span>
      <a href="/dashboard" class="btn btn-ghost btn-sm">Dashboard</a>
      <button class="btn btn-primary btn-sm" onclick="authLogout()">Keluar</button>
      <button class="hamburger" id="hamburger" aria-label="Buka Menu">
        <span></span><span></span><span></span>
      </button>`;
  }
}

/* =============================================
   ADMIN FUNCTIONS
   ============================================= */
// TODO: Replace with Laravel API fetch /api/admin/requests
function renderAdminRequests() {
  const tbody = document.getElementById('adminRequestsTbody');
  if (!tbody) return;

  const allRequests = [...dummyRequests, ...myRequests];
  tbody.innerHTML = allRequests.map(r => `
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
          <button class="btn btn-warning btn-sm" onclick="showToast('Permintaan ditandai mencurigakan', 'warning')">⚠️</button>
          <button class="btn btn-danger btn-sm" onclick="showToast('Fitur hapus hanya tersedia di backend', 'error')">🗑️</button>
        </div>
      </td>
    </tr>
  `).join('');
}

function adminDetailRequest(id) {
  openRequestDetail(id);
}

// TODO: Replace with Laravel API fetch /api/admin/users
function renderAdminUsers() {
  const tbody = document.getElementById('adminUsersTbody');
  if (!tbody) return;

  tbody.innerHTML = adminUsers.map(u => `
    <tr>
      <td>
        <div style="display:flex;gap:8px;align-items:center">
          <div class="avatar" style="width:30px;height:30px;font-size:0.75rem">${u.name.split(' ').map(w => w[0]).join('').substring(0,2)}</div>
          <strong>${u.name}</strong>
        </div>
      </td>
      <td>${u.email}</td>
      <td>📍 ${u.location}</td>
      <td>${u.isDonor ? '<span class="badge badge-green">Pendonor</span>' : '<span class="badge badge-gray">Umum</span>'}</td>
      <td>${u.isDonor ? `<span class="badge badge-red" style="font-weight:800">${u.bloodType}</span>` : '-'}</td>
      <td>${u.isDonor ? getStatusBadge(u.donorStatus) : '-'}</td>
      <td>
        <div style="display:flex;gap:6px">
          <button class="btn btn-ghost btn-sm" onclick="showToast('Detail user: ${u.name}', 'info')">Detail</button>
        </div>
      </td>
    </tr>
  `).join('');
}

// TODO: Replace with Laravel API fetch /api/admin/reports
function renderAdminReports() {
  const container = document.getElementById('adminReportsContainer');
  if (!container) return;

  container.innerHTML = `
    <div class="table-wrapper">
      <table>
        <thead>
          <tr><th>Jenis Laporan</th><th>Pelapor</th><th>Target</th><th>Tanggal</th><th>Status</th><th>Aksi</th></tr>
        </thead>
        <tbody>
          ${adminReports.map(r => `
            <tr>
              <td><strong>${r.type}</strong></td>
              <td>${r.reporter}</td>
              <td>${r.target}</td>
              <td>${r.date}</td>
              <td>${getStatusBadge(r.status)}</td>
              <td><button class="btn btn-primary btn-sm" onclick="showToast('Laporan ditandai ditangani', 'success')">Tangani</button></td>
            </tr>
          `).join('')}
        </tbody>
      </table>
    </div>`;
}

/* =============================================
   COUNTER ANIMATION
   ============================================= */
function animateCounter(el, target, duration = 1800) {
  let start = 0;
  const step = (target / duration) * 16;
  const timer = setInterval(() => {
    start += step;
    if (start >= target) {
      el.textContent = target.toLocaleString('id-ID');
      clearInterval(timer);
    } else {
      el.textContent = Math.floor(start).toLocaleString('id-ID');
    }
  }, 16);
}

function initCounters() {
  const counters = document.querySelectorAll('[data-counter]');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const target = parseInt(el.dataset.counter);
        animateCounter(el, target);
        observer.unobserve(el);
      }
    });
  }, { threshold: 0.5 });

  counters.forEach(el => observer.observe(el));
}

/* =============================================
   PAGE INIT
   ============================================= */
document.addEventListener('DOMContentLoaded', function() {
  // General inits
  initCounters();

  // Auth UI — update sidebar/navbar/dashboard based on login state
  initAuthUI();

  // Auth page
  initAuthTabs();
  initLoginForm();

  // Dashboard
  const donorPrompt = document.getElementById('donorIncompletePrompt');
  if (donorPrompt) {
    donorPrompt.style.display = currentUser.isDonorActive ? 'none' : 'flex';
  }

  // Cari Donor
  if (document.getElementById('donorGrid')) {
    const container = document.getElementById('donorGrid');
    showSkeleton(container, 6);
    setTimeout(() => {
      filterDonors();
      initDonorFilters();
    }, 800);
  }

  // Permintaan Darurat form
  initRequestForm();

  // Riwayat Permintaan
  if (document.getElementById('myRequestsContainer')) {
    const container = document.getElementById('myRequestsContainer');
    showSkeleton(container, 3);
    setTimeout(() => {
      renderMyRequests();
      updateMyRequestStats();
    }, 700);
  }

  // Permintaan Cocok
  if (document.getElementById('matchedRequestsGrid')) {
    const container = document.getElementById('matchedRequestsGrid');
    showSkeleton(container, 3);
    setTimeout(() => {
      renderMatchedRequests();
    }, 700);
  }

  // Riwayat Donor
  if (document.getElementById('donorHistoryContainer')) {
    const container = document.getElementById('donorHistoryContainer');
    showSkeleton(container, 4, 'card');
    setTimeout(() => {
      renderDonorHistory();
    }, 600);
  }

  // Notifikasi
  if (document.getElementById('notifList')) {
    renderNotifications();
  }

  // Edukasi
  if (document.getElementById('articlesGrid')) {
    const container = document.getElementById('articlesGrid');
    showSkeleton(container, 6);
    setTimeout(() => {
      renderArticles();
    }, 600);
    const searchEl = document.getElementById('searchArticle');
    if (searchEl) searchEl.addEventListener('input', searchArticles);
  }

  // Profil Donor
  initDonorToggle();
  initDonorStatusToggle();
  initDonorProfileForm();

  // Settings
  initSettingsForm();

  // Admin
  if (document.getElementById('adminRequestsTbody')) {
    showSkeleton(document.getElementById('adminRequestsTbody'), 5, 'row');
    setTimeout(() => {
      renderAdminRequests();
      renderAdminUsers();
      renderAdminReports();
    }, 800);
  }

  // Confirm action button
  const confirmActionBtn = document.getElementById('btnConfirmAction');
  if (confirmActionBtn) confirmActionBtn.addEventListener('click', executeAction);

  // Willing confirm button
  const willingConfirmBtn = document.getElementById('btnConfirmWilling');
  if (willingConfirmBtn) willingConfirmBtn.addEventListener('click', confirmWilling);

  // Mark all read button
  const markAllBtn = document.getElementById('btnMarkAllRead');
  if (markAllBtn) markAllBtn.addEventListener('click', markAllRead);

  // Auth success redirect
  const authRedirectBtn = document.getElementById('btnAuthRedirect');
  if (authRedirectBtn) authRedirectBtn.addEventListener('click', redirectToDashboard);

  // Init logout links
  initLogoutLinks();
  // Re-init hamburger after navbar rewrite
  const ham = document.getElementById('hamburger');
  const mob = document.getElementById('mobileMenu');
  if (ham && mob) {
    ham.addEventListener('click', () => mob.classList.toggle('open'));
  }
});
