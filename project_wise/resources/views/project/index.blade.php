<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Project Wise</title>
<!-- Load Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<style>
body {
font-family: 'Inter', sans-serif;
background-color: #f7f7f7;
}
.card {
box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}
.input-group label {
font-weight: 600;
}
.prediction-result {
transition: all 0.5s ease;
}
.icon {
width: 20px;
height: 20px;
fill: currentColor;
}
/* Style untuk Header Kolom */
.header-grid {
display: grid;
gap: 0.75rem; /* gap-3 */
margin-bottom: 0.5rem; /* mb-2 */
padding-left: 0.75rem; /* px-3 for alignment */
padding-right: 0.75rem; /* px-3 for alignment */
}
.header-item {
font-weight: 600; /* font-semibold */
color: #4b5563; /* text-gray-600 */
font-size: 0.875rem; /* text-sm */
}
.report-section {
border-bottom: 2px solid #e5e7eb;
padding-bottom: 1.5rem;
margin-bottom: 1.5rem;
}
/* Mobile adjustment for input groups */
@media (max-width: 640px) {
.input-group > * {
min-width: 0;
}
}
</style>
</head>
<body class="p-4 sm:p-8">

<div class="max-w-4xl mx-auto">
<header class="text-left mb-10">
<h1 class="text-3xl sm:text-4xl font-extrabold text-blue-700">Predictive Project Planner</h1>
<p class="text-gray-500 mt-2">Masukkan detail proyek untuk memprediksi keberhasilan menggunakan model Stacking (GB → ANN → NB).</p>
<p class="text-red-500 mt-2"><a href="/home">[ kembali ke dashboard ]</a></p>
</header>

<form id="predictionForm" class="space-y-8">

<!-- SECTION 1: Project Information -->
<div class="card bg-white p-6 rounded-xl border border-gray-200">
<h2 class="text-xl font-bold text-gray-700 mb-6 flex items-center">
<svg class="icon mr-2 text-blue-500" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
Informasi Proyek
</h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="input-group">
<label for="projectName" class="block mb-1 text-sm text-gray-600">Nama Proyek</label>
<input type="text" id="projectName" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="Implementasi Sistem Akuntansi X">
</div>

<div class="input-group">
<label for="projectType" class="block mb-1 text-sm text-gray-600">Jenis Proyek *</label>
<select id="projectType" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
<option value="Software Development">Software Development</option>
<option value="System Integration">System Integration</option>
<option value="Cloud Migration">Cloud Migration</option>
<option value="Data Migration">Data Migration</option>
<option value="Security Implementation">Security Implementation</option>
<option value="Data Science/Analytics">Data Science/Analytics Project</option>
<option value="Infrastructure Upgrade">Infrastructure Upgrade</option>
<option value="Hardware Installation">Hardware Installation</option>
<option value="Marketing Campaign">Marketing Campaign</option>
<option value="Research">Research</option>
</select>
</div>

<div class="input-group">
<label for="projectScale" class="block mb-1 text-sm text-gray-600">Skala Proyek *</label>
<select id="projectScale" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
<option value="Medium">Medium</option>
<option value="Large">Large</option>
<option value="Small">Small</option>
</select>
</div>

<div class="input-group">
<label for="sdlcMethod" class="block mb-1 text-sm text-gray-600">Metode Siklus Hidup *</label>
<select id="sdlcMethod" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
<option value="Agile">Agile</option>
<option value="Scrum">Scrum</option>
<option value="Kanban">Kanban</option>
<option value="Lean">Lean</option>
<option value="DevOps">DevOps</option>
<option value="Iterative">Iterative</option>
<option value="Prototype">Prototype</option>
<option value="Waterfall">Waterfall</option>
<option value="Spiral">Spiral</option>
<option value="V-Model">V-Model</option>
</select>
</div>

<div class="input-group">
<label for="startDate" class="block mb-1 text-sm text-gray-600">Tanggal Mulai *</label>
<input type="date" id="startDate" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="2025-01-01">
</div>

<div class="input-group">
<label for="endDate" class="block mb-1 text-sm text-gray-600">Tanggal Selesai *</label>
<input type="date" id="endDate" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="2025-07-01">
</div>

<div class="input-group">
<label for="totalBudget" class="block mb-1 text-sm text-gray-600">Anggaran Pokok (Rp/Unit) *</label>
<input type="number" id="totalBudget" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="150000" min="0">
</div>

<div class="input-group">
<label for="additionalCost" class="block mb-1 text-sm text-gray-600">Dana Kontingensi (Rp/Unit) *</label>
<input type="number" id="additionalCost" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="25000" min="0">
</div>
</div>
</div>

<!-- SECTION 4: Technology Allocation (Dynamic - NEW SECTION) -->
<div class="card bg-white p-6 rounded-xl border border-gray-200">
<h2 class="text-xl font-bold text-gray-700 mb-6 flex items-center">
<svg class="icon mr-2 text-purple-500" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect><polyline points="17 2 12 7 7 2"></polyline></svg>
Alokasi Teknologi
</h2>
<!-- Header Kolom Teknologi -->
<div class="header-grid grid-cols-4">
<div class="header-item">Kategori</div>
<div class="header-item col-span-2">Nama Spesifik (Contoh: React, Python)</div>
<div class="header-item text-right">Aksi</div>
</div>
<!-- Kontainer Input Teknologi -->
<div id="techContainer" class="space-y-4">
<!-- Dynamic Technology Inputs Here -->
<div class="tech-input grid grid-cols-4 gap-3 p-3 bg-gray-50 rounded-lg border border-gray-200">
<select class="col-span-1 p-2 border border-gray-300 rounded-lg text-sm" title="Kategori Teknologi">
<!-- Options filled by JS -->
</select>
<input type="text" class="col-span-2 p-2 border border-gray-300 rounded-lg text-sm" placeholder="Nama Spesifik (e.g., React, Python)" value="React">
<button type="button" onclick="removeDynamicInput(this)" class="col-span-1 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-lg">Hapus</button>
</div>
<div class="tech-input grid grid-cols-4 gap-3 p-3 bg-gray-50 rounded-lg border border-gray-200">
<select class="col-span-1 p-2 border border-gray-300 rounded-lg text-sm" title="Kategori Teknologi">
<!-- Options filled by JS -->
</select>
<input type="text" class="col-span-2 p-2 border border-gray-300 rounded-lg text-sm" placeholder="Nama Spesifik (e.g., React, Python)" value="PostgreSQL">
<button type="button" onclick="removeDynamicInput(this)" class="col-span-1 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-lg">Hapus</button>
</div>
</div>
<button type="button" onclick="addTechnology()" class="mt-4 w-full p-2 bg-purple-500 text-white font-semibold rounded-lg hover:bg-purple-600 transition duration-150">
+ Tambah Teknologi
</button>
</div>


<!-- SECTION 2: Team & Resource Allocation (Dynamic) -->
<div class="card bg-white p-6 rounded-xl border border-gray-200">
<h2 class="text-xl font-bold text-gray-700 mb-6 flex items-center">
<svg class="icon mr-2 text-green-500" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
Alokasi Tim
</h2>
<!-- Header Kolom Tim -->
<div class="header-grid grid-cols-5">
<div class="header-item">Role</div>
<div class="header-item">Qty</div>
<div class="header-item">Expertise (1-5)</div>
<div class="header-item">Gaji Rata-Rata (Rp/Bulan)</div>
<div class="header-item text-right">Aksi</div>
</div>
<!-- Kontainer Input Tim -->
<div id="teamContainer" class="space-y-4">
<!-- Dynamic Team Inputs Here -->
<div class="team-input grid grid-cols-5 gap-3 p-3 bg-gray-50 rounded-lg border border-gray-200">
<input type="text" class="col-span-1 p-2 border border-gray-300 rounded-lg text-sm" placeholder="Nama Role" value="Project Manager">
<input type="number" class="col-span-1 p-2 border border-gray-300 rounded-lg text-sm" placeholder="Qty" min="1" value="1">
<input type="number" class="col-span-1 p-2 border border-gray-300 rounded-lg text-sm" placeholder="Expertise (1-5)" min="1" max="5" value="4">
<input type="number" class="col-span-1 p-2 border border-gray-300 rounded-lg text-sm" placeholder="Avg Salary" min="1000" value="12000">
<button type="button" onclick="removeDynamicInput(this)" class="col-span-1 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-lg">Hapus</button>
</div>
<div class="team-input grid grid-cols-5 gap-3 p-3 bg-gray-50 rounded-lg border border-gray-200">
<input type="text" class="col-span-1 p-2 border border-gray-300 rounded-lg text-sm" placeholder="Nama Role" value="Developer">
<input type="number" class="col-span-1 p-2 border border-gray-300 rounded-lg text-sm" placeholder="Qty" min="1" value="3">
<input type="number" class="col-span-1 p-2 border border-gray-300 rounded-lg text-sm" placeholder="Expertise (1-5)" min="1" max="5" value="3">
<input type="number" class="col-span-1 p-2 border border-gray-300 rounded-lg text-sm" placeholder="Avg Salary" min="1000" value="7000">
<button type="button" onclick="removeDynamicInput(this)" class="col-span-1 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-lg">Hapus</button>
</div>
</div>
<button type="button" onclick="addTeamMember()" class="mt-4 w-full p-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition duration-150">
+ Tambah Anggota Tim
</button>
</div>

<!-- SECTION 3: Initial Risk & Constraints (Dynamic) -->
<div class="card bg-white p-6 rounded-xl border border-gray-200">
<h2 class="text-xl font-bold text-gray-700 mb-6 flex items-center">
<svg class="icon mr-2 text-red-500" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
Risiko Awal & Batasan
</h2>
<!-- Header Kolom Risiko -->
<div class="header-grid grid-cols-5">
<div class="header-item col-span-2">Kategori Risiko</div>
<div class="header-item">Dampak (1-5)</div>
<div class="header-item">Kemungkinan (1-5)</div>
<div class="header-item text-right">Aksi</div>
</div>
<!-- Kontainer Input Risiko -->
<div id="riskContainer" class="space-y-4">
<!-- Dynamic Risk Inputs Here -->
<div class="risk-input grid grid-cols-5 gap-3 p-3 bg-gray-50 rounded-lg border border-gray-200">
<select class="col-span-2 p-2 border border-gray-300 rounded-lg text-sm" title="Jenis Kategori Risiko">
<!-- Options filled by JS -->
</select>
<input type="number" class="col-span-1 p-2 border border-gray-300 rounded-lg text-sm" placeholder="Dampak (1-5)" min="1" max="5" value="4">
<input type="number" class="col-span-1 p-2 border border-gray-300 rounded-lg text-sm" placeholder="Kemungkinan (1-5)" min="1" max="5" value="3">
<button type="button" onclick="removeDynamicInput(this)" class="col-span-1 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-lg">Hapus</button>
</div>
</div>
<button type="button" onclick="addRisk()" class="mt-4 w-full p-2 bg-yellow-500 text-white font-semibold rounded-lg hover:bg-yellow-600 transition duration-150">
+ Tambah Risiko
</button>
</div>

<button type="submit" class="w-full py-3 bg-blue-600 text-white text-lg font-bold rounded-xl hover:bg-blue-700 transition duration-300">
PREDIKSI KEBERHASILAN PROYEK
</button>
</form>

<!-- Prediction Result Display -->
<div id="resultContainer" class="prediction-result mt-10 p-6 rounded-xl text-center bg-white border border-gray-300 hidden">
<h3 class="text-2xl font-bold mb-4 text-blue-700">Hasil Prediksi & Laporan Rekomendasi</h3>

<!-- Simple Prediction Indicator -->
<div class="p-4 mb-6 rounded-lg inline-block">
<p class="text-xl font-bold text-gray-700">Status Prediksi Pipeline:</p>
<div id="predictionOutput" class="text-3xl font-extrabold p-2 rounded-lg mt-1"></div>
<p id="predictionDetail" class="text-gray-600 mt-2 text-sm"></p>
</div>

<!-- Detailed Report Content -->
<div id="detailedReport" class="text-left mt-8 p-4 border border-gray-100 rounded-lg bg-gray-50">
<h4 class="text-xl font-bold text-gray-800 mb-6">Laporan Rencana Aksi Proyek</h4>
<div id="reportContent">
<!-- Dynamic HTML content for detailed report will be inserted here -->
</div>
</div>

</div>

<div id="errorBox" class="mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg hidden" role="alert">
<p class="font-bold">Error:</p>
<p id="errorMessage"></p>
</div>

</div>

<script>
// Data Kategori untuk Dropdown
const RISK_CATEGORIES = [
{ id: 1, name: "Technical" },
{ id: 2, name: "Operational" },
{ id: 3, name: "Financial" },
{ id: 4, name: "Legal" },
{ id: 5, name: "Strategic" },
{ id: 6, name: "Compliance" },
{ id: 7, name: "Market" },
{ id: 8, name: "Project Management" },
{ id: 9, name: "Environmental" }
];

const TECH_CATEGORIES = [
{ id: 1, name: "Frontend" },
{ id: 2, name: "Backend" },
{ id: 3, name: "Database" },
{ id: 4, name: "DevOps" },
{ id: 5, name: "Mobile" },
{ id: 6, name: "Analytics" },
{ id: 7, name: "AI/ML" },
{ id: 8, name: "Security" },
{ id: 9, name: "Cloud" },
{ id: 10, name: "Testing" }
];


// --- 1. Fungsi Utility untuk Input Dinamis ---

function getCategoryOptions(categories, selectedValue) {
let options = '';
categories.forEach(cat => {
options += `<option value="${cat.id}" ${cat.id == selectedValue ? 'selected' : ''}>${cat.name}</option>`;
});
return options;
}

function createTechInput(category = 1, name = 'React') {
return `
<div class="tech-input grid grid-cols-4 gap-3 p-3 bg-gray-50 rounded-lg border border-gray-200">
<select class="col-span-1 p-2 border border-gray-300 rounded-lg text-sm" title="Kategori Teknologi">
${getCategoryOptions(TECH_CATEGORIES, category)}
</select>
<input type="text" class="col-span-2 p-2 border border-gray-300 rounded-lg text-sm" placeholder="Nama Spesifik (e.g., React, Python)" value="${name}">
<button type="button" onclick="removeDynamicInput(this)" class="col-span-1 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-lg">Hapus</button>
</div>
`;
}

function createTeamInput(role = 'Developer', qty = 1, expertise = 3, salary = 5000) {
return `
<div class="team-input grid grid-cols-5 gap-3 p-3 bg-gray-50 rounded-lg border border-gray-200">
<input type="text" class="col-span-1 p-2 border border-gray-300 rounded-lg text-sm" placeholder="Nama Role" value="${role}">
<input type="number" class="col-span-1 p-2 border border-gray-300 rounded-lg text-sm" placeholder="Qty" min="1" value="${qty}">
<input type="number" class="col-span-1 p-2 border border-gray-300 rounded-lg text-sm" placeholder="Expertise (1-5)" min="1" max="5" value="${expertise}">
<input type="number" class="col-span-1 p-2 border border-gray-300 rounded-lg text-sm" placeholder="Avg Salary" min="1000" value="5000">
<button type="button" onclick="removeDynamicInput(this)" class="col-span-1 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-lg">Hapus</button>
</div>
`;
}

function createRiskInput(category = 8, impact = 3, likelihood = 3) {
return `
<div class="risk-input grid grid-cols-5 gap-3 p-3 bg-gray-50 rounded-lg border border-gray-200">
<select class="col-span-2 p-2 border border-gray-300 rounded-lg text-sm" title="Jenis Kategori Risiko">
${getCategoryOptions(RISK_CATEGORIES, category)}
</select>
<input type="number" class="col-span-1 p-2 border border-gray-300 rounded-lg text-sm" placeholder="Dampak (1-5)" min="1" max="5" value="4">
<input type="number" class="col-span-1 p-2 border border-gray-300 rounded-lg text-sm" placeholder="Kemungkinan (1-5)" min="1" max="5" value="3">
<button type="button" onclick="removeDynamicInput(this)" class="col-span-1 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-lg">Hapus</button>
</div>
`;
}

function addTechnology() {
document.getElementById('techContainer').insertAdjacentHTML('beforeend', createTechInput(1, ''));
}

function addTeamMember() {
document.getElementById('teamContainer').insertAdjacentHTML('beforeend', createTeamInput('', 1, 3, 5000));
}

function addRisk() {
document.getElementById('riskContainer').insertAdjacentHTML('beforeend', createRiskInput(8, 3, 3)); // Default: Project Management, Dampak 3, Kemungkinan 3
}

function removeDynamicInput(button) {
button.closest('.grid').remove();
}

function showError(message) {
document.getElementById('errorMessage').textContent = message;
document.getElementById('errorBox').classList.remove('hidden');
}

function hideError() {
document.getElementById('errorBox').classList.add('hidden');
}

function formatDate(dateString) {
const options = { year: 'numeric', month: 'short', day: 'numeric' };
const date = new Date(dateString);
return date.toLocaleDateString('id-ID', options);
}

function formatCurrency(amount) {
// Simple formatter, assuming 'Rp' or generic unit
return new Intl.NumberFormat('id-ID').format(amount);
}

// --- 2. Feature Engineering & Aggregation ---

function calculateDurationMonths(start, end) {
const startDate = new Date(start);
const endDate = new Date(end);
if (endDate <= startDate) return 1; // Minimal 1 bulan

const years = endDate.getFullYear() - startDate.getFullYear();
const months = endDate.getMonth() - startDate.getMonth();
return Math.max(1, years * 12 + months);
}

function engineerFeatures() {
// A. Ambil Data Proyek Dasar
const projectName = document.getElementById('projectName').value || 'Proyek Tanpa Nama';
const startDate = document.getElementById('startDate').value;
const endDate = document.getElementById('endDate').value;
const base_budget_input = parseFloat(document.getElementById('totalBudget').value) || 0;
const contingency_cost_input = parseFloat(document.getElementById('additionalCost').value) || 0;

const duration_months = calculateDurationMonths(startDate, endDate);
const total_input_cost = base_budget_input + contingency_cost_input;
const project_type = document.getElementById('projectType').value;
const project_scale = document.getElementById('projectScale').value;
const sdlc_method = document.getElementById('sdlcMethod').value;

// B. Agregasi Data Teknologi
const techInputs = document.getElementById('techContainer').querySelectorAll('.tech-input');
const tech_count = techInputs.length;
const distinct_tech_categories = new Set();
const raw_tech_data = [];

techInputs.forEach(tech => {
const select = tech.querySelector('select');
const input = tech.querySelector('input');
const category_id = select.value;
distinct_tech_categories.add(category_id);
raw_tech_data.push({
category_id: category_id,
name: input.value,
category_name: TECH_CATEGORIES.find(c => c.id == category_id)?.name || 'Lain-lain'
});
});
const distinct_tech_count = distinct_tech_categories.size;


// C. Agregasi Data Tim
const teamInputs = document.getElementById('teamContainer').querySelectorAll('.team-input');
let total_team_members = 0;
let total_weighted_salary = 0; // Total Gaji Bulanan Tim
let total_weighted_expertise = 0;
const raw_team_data = [];

teamInputs.forEach(team => {
const inputs = team.querySelectorAll('input');
const role = inputs[0].value;
const qty = parseInt(inputs[1].value) || 0;
const expertise = parseFloat(inputs[2].value) || 0;
const salary = parseFloat(inputs[3].value) || 0;

total_team_members += qty;
total_weighted_salary += qty * salary;
total_weighted_expertise += qty * expertise;
raw_team_data.push({role, qty, expertise, salary});
});

const avg_member_salary = total_team_members > 0 ? total_weighted_salary / total_team_members : 0;
const avg_expertise_score = total_team_members > 0 ? total_weighted_expertise / total_team_members : 0;

// D. Agregasi Data Risiko
const riskInputs = document.getElementById('riskContainer').querySelectorAll('.risk-input');
const risk_count = riskInputs.length;
let total_impact = 0;
let total_likelihood = 0;
const raw_risk_data = [];

riskInputs.forEach(risk => {
const selects = risk.querySelectorAll('select');
const inputs = risk.querySelectorAll('input[type="number"]');
const category_id = selects[0].value;
const impact = parseFloat(inputs[0].value) || 0;
const likelihood = parseFloat(inputs[1].value) || 0;
total_impact += impact;
total_likelihood += likelihood;
raw_risk_data.push({
category_id: category_id,
impact,
likelihood,
category_name: RISK_CATEGORIES.find(c => c.id == category_id)?.name || 'Lain-lain'
});
});

const avg_impact_level = risk_count > 0 ? total_impact / risk_count : 0;
const avg_likelihood = risk_count > 0 ? total_likelihood / risk_count : 0;

// Validasi Input Kritis
if (total_input_cost <= 0 || duration_months <= 0 || total_team_members <= 0 || tech_count === 0) {
showError("Pastikan Anggaran Pokok, Durasi Proyek, Anggota Tim, dan minimal satu Teknologi ada dan bernilai positif/valid.");
return null;
}
hideError();

return {
projectName,
startDate,
endDate,
duration_months,
total_input_cost,
base_budget_input,
contingency_cost_input,
total_team_members,
total_weighted_salary,
avg_member_salary,
avg_expertise_score,
risk_count,
avg_impact_level,
avg_likelihood,
tech_count,
distinct_tech_count,
project_type,
project_scale,
sdlc_method,
raw_team_data,
raw_tech_data,
raw_risk_data
};
}

// --- 3. Simulasi Model Pipeline & Prediksi ---
function predict(features) {

const MAX_COST = 500000;
const MAX_TEAM = 20;
const MAX_RISK_LEVEL = 5;
const MAX_TECH_COUNT = 10;

// 1. Simulasikan Pra-pemrosesan & Feature Encoding
const scaled_cost = features.base_budget_input / MAX_COST; // Use base budget for core prediction
const scaled_team = features.total_team_members / MAX_TEAM;
const scaled_impact = features.avg_impact_level / MAX_RISK_LEVEL;
const scaled_tech_diversity = features.distinct_tech_count / MAX_TECH_COUNT;

// 2. Tentukan Kontribusi Fitur (Simplified Score based on the Python logic)
let base_score = 0.35;

// Biaya dan Durasi
base_score += 0.20 * scaled_cost;
base_score += 0.05 * (features.duration_months < 12 ? 1 : 0.5);

// Tim dan Keahlian
base_score += 0.15 * scaled_team;
base_score += 0.10 * (features.avg_expertise_score / MAX_RISK_LEVEL);

// Teknologi
base_score += 0.10 * scaled_tech_diversity;

// Risiko (Dampak negatif)
base_score -= 0.15 * scaled_impact;
base_score -= 0.05 * (features.avg_likelihood / MAX_RISK_LEVEL);

// Metode SDLC
let sdlc_contribution = 0;
switch (features.sdlc_method) {
case 'Agile':
case 'Scrum':
case 'Kanban':
case 'DevOps':
case 'Lean':
sdlc_contribution = 0.12;
break;
case 'Iterative':
case 'Prototype':
sdlc_contribution = 0.05;
break;
case 'Waterfall':
case 'Spiral':
case 'V-Model':
sdlc_contribution = -0.05;
break;
}
base_score += sdlc_contribution;

// Project Scale
if (features.project_scale === 'Large') {
base_score += 0.05;
} else if (features.project_scale === 'Small') {
base_score -= 0.03;
}

const final_probability = Math.min(1.0, Math.max(0.0, base_score));

// 4. Simulasi Tahap Stacking (NB Threshold)
const THRESHOLD = 0.55;
const ann_proba = final_probability * 0.9 + 0.05;
const nb_final_proba = ann_proba;

const prediction = nb_final_proba >= THRESHOLD ? 1 : 0;

// --- Logika Rekomendasi/Mitigasi (ENHANCED) ---
const recommendations = [];
const TRS = features.avg_impact_level * features.avg_likelihood; // Total Risk Score (Max 25)
const projectedLaborCost = features.total_weighted_salary * features.duration_months;
const recommendedContingency = (TRS / 25) * projectedLaborCost * 0.20; // 20% of labor cost scaled by risk

// 1. RISK RECOMMENDATION (Risiko)
if (TRS >= 12) { // High Risk Zone (e.g., 4x3)
recommendations.push({
type: "Negatif",
text: `**Fokus Risiko:** Tingkat Risiko Gabungan (Dampak * Kemungkinan) adalah ${TRS.toFixed(1)}/25. Segera prioritaskan Rencana Mitigasi untuk kategori risiko kritis.`
});
} else if (TRS < 6) {
recommendations.push({
type: "Positif",
text: `**Risiko Terkelola:** Tingkat risiko awal proyek tergolong rendah, indikasi perencanaan risiko yang baik.`
});
}

// 2. TEAM RECOMMENDATION (Tim)
if (features.avg_expertise_score < 3.0) {
recommendations.push({
type: "Negatif",
text: `**Keahlian Tim:** Nilai rata-rata keahlian tim (${features.avg_expertise_score.toFixed(1)}/5) di bawah ideal. Pertimbangkan merekrut anggota tim yang lebih senior atau program pelatihan intensif.`
});
} else if (features.avg_expertise_score >= 4.0) {
recommendations.push({
type: "Positif",
text: "**Keahlian Tim Kuat:** Anggota tim memiliki tingkat keahlian yang tinggi, faktor kunci keberhasilan."
});
}
// Tambahan check untuk SDLC yang kurang adaptif
if (sdlc_contribution < 0) {
recommendations.push({
type: "Negatif",
text: `**Metode SDLC:** Metode ${features.sdlc_method} memiliki fleksibilitas rendah. Pertimbangkan pendekatan yang lebih adaptif seperti Agile, Scrum, atau Iterative untuk meningkatkan kemampuan tim merespons perubahan.`
});
}

// 3. TECHNOLOGY RECOMMENDATION (Teknologi)
const requiredCriticalTech = features.project_scale === 'Large' ? 4 : 2; // Large projects need more diversity
if (features.distinct_tech_count < requiredCriticalTech) {
recommendations.push({
type: "Negatif",
text: `**Diversitas Teknologi:** Hanya ${features.distinct_tech_count} kategori teknologi yang tercakup. Untuk proyek skala ${features.project_scale}, pastikan cakupan teknologi (misalnya, Database, Cloud, DevOps) memadai untuk menghindari celah fungsional.`
});
} else if (features.tech_count > 10 && features.project_scale === 'Small') {
recommendations.push({
type: "Negatif",
text: `**Kompleksitas Teknologi:** Terlalu banyak (${features.tech_count}) teknologi spesifik untuk proyek skala Kecil. Pertimbangkan konsolidasi untuk mengurangi kompleksitas integrasi dan biaya overhead.`
});
}

// 4. BUDGET RECOMMENDATION (Anggaran - Contingency Check)

if (features.contingency_cost_input < recommendedContingency * 0.8) { // If actual is less than 80% of recommended
recommendations.push({
type: "Negatif",
text: `**Dana Kontingensi:** Anggaran kontingensi input (Rp ${formatCurrency(features.contingency_cost_input)}) terlalu rendah mengingat tingkat risiko proyek. Direkomendasikan kontingensi setidaknya Rp ${formatCurrency(recommendedContingency.toFixed(0))} untuk mitigasi risiko tak terduga.`
});
} else if (features.contingency_cost_input >= recommendedContingency * 1.2) {
recommendations.push({
type: "Positif",
text: `**Dana Kontingensi:** Anggaran kontingensi Anda kuat dan melebihi rekomendasi berbasis risiko. Ini memberikan *buffer* yang baik terhadap biaya tak terduga.`
});
}

// Fallback for good status (Positif)
if (recommendations.filter(r => r.type === 'Negatif').length === 0 && prediction === 1) {
recommendations.unshift({
type: "Positif",
text: "Struktur Proyek Seimbang: Semua faktor utama (Tim, Biaya, Risiko, Metode) menunjukkan keselarasan yang optimal."
});
}


return {
probability: nb_final_proba,
prediction: prediction,
recommendations: recommendations,
// Tambahkan metrik turunan yang akan digunakan di laporan
derivedMetrics: {
TRS: TRS,
projectedLaborCost: projectedLaborCost,
recommendedContingency: recommendedContingency,
avgExpertise: features.avg_expertise_score,
techDiversity: features.distinct_tech_count,
techComplexity: features.tech_count,
inputTeamSize: features.total_team_members
}
};
}

// --- 4. Fungsi Pembuatan Laporan Detail (Diperbarui untuk Rekomendasi) ---

function generateReportHTML(features, result) {
const projectDurationWeeks = features.duration_months * 4.3; // Approx 4.3 weeks per month

// 1. Durasi dan Fase (TETAP)
let phaseHtml = `
<div class="report-section">
<h5 class="text-lg font-semibold text-gray-700 mb-3">1. Kerangka Waktu dan Fase Proyek</h5>
<p class="mb-3 text-sm text-gray-600">Durasi total proyek diperkirakan ${features.duration_months} bulan (sekitar ${projectDurationWeeks.toFixed(0)} minggu), dimulai dari ${formatDate(features.startDate)} hingga ${formatDate(features.endDate)}.</p>
<table class="min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden">
<thead class="bg-blue-100">
<tr>
<th class="px-3 py-2 text-left text-xs font-medium text-blue-800 uppercase">Fase</th>
<th class="px-3 py-2 text-left text-xs font-medium text-blue-800 uppercase">Durasi (Minggu)</th>
<th class="px-3 py-2 text-left text-xs font-medium text-blue-800 uppercase">Kegiatan Utama</th>
</tr>
</thead>
<tbody class="bg-white divide-y divide-gray-200 text-sm">
<tr><td class="px-3 py-2 whitespace-nowrap">Penemuan & Akuisisi Data</td><td class="px-3 py-2 whitespace-nowrap">2</td><td class="px-3 py-2">Definisi metrik, identifikasi sumber data.</td></tr>
<tr><td class="px-3 py-2 whitespace-nowrap">Pemrosesan Data & Rekayasa Fitur</td><td class="px-3 py-2 whitespace-nowrap">4</td><td class="px-3 py-2">Pembersihan data, normalisasi, pembuatan fitur.</td></tr>
<tr><td class="px-3 py-2 whitespace-nowrap">Pengembangan Model & Evaluasi</td><td class="px-3 py-2 whitespace-nowrap">4</td><td class="px-3 py-2">Pelatihan model, *tuning* hyperparameter, validasi.</td></tr>
<tr><td class="px-3 py-2 whitespace-nowrap">Integrasi & Penerapan (Deployment)</td><td class="px-3 py-2 whitespace-nowrap">2</td><td class="px-3 py-2">Membangun API, mengemas model (Docker), integrasi sistem.</td></tr>
<tr><td class="px-3 py-2 whitespace-nowrap">Pemantauan & Serah Terima Akhir</td><td class="px-3 py-2 whitespace-nowrap">2</td><td class="px-3 py-2">Mengatur dasbor pemantauan kinerja model.</td></tr>
<tr class="bg-gray-100 font-bold"><td class="px-3 py-2 whitespace-nowrap">TOTAL</td><td class="px-3 py-2 whitespace-nowrap">14</td><td class="px-3 py-2"></td></tr>
</tbody>
</table>
</div>
`;

// 2. Anggaran (DIUBAH MENJADI REKOMENDASI MODEL)
const laborCost = result.derivedMetrics.projectedLaborCost;
const recommendedContingency = result.derivedMetrics.recommendedContingency;
const infraCostEstimate = laborCost * 0.05;
const totalProjectedCost = laborCost + infraCostEstimate + recommendedContingency;

let budgetHtml = `
<div class="report-section">
<h5 class="text-lg font-semibold text-gray-700 mb-3">2. Rekomendasi Anggaran Proyek (Berdasarkan Model)</h5>
<p class="mb-3 text-sm text-gray-600">Model memproyeksikan total biaya tenaga kerja selama ${features.duration_months} bulan dan merekomendasikan dana kontingensi berdasarkan skor risiko.</p>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
<div class="bg-green-50 p-4 rounded-lg">
<p class="text-sm font-medium text-green-700">A. Biaya Tenaga Kerja (Projected)</p>
<p class="text-xl font-bold text-green-900">Rp ${formatCurrency(laborCost)}</p>
<p class="text-xs text-gray-500">* Berdasarkan total gaji tim input (${features.total_team_members}) dan durasi.</p>
</div>
<div class="bg-yellow-50 p-4 rounded-lg">
<p class="text-sm font-medium text-yellow-700">B. Dana Kontingensi (Direkomendasikan)</p>
<p class="text-xl font-bold text-yellow-900">Rp ${formatCurrency(recommendedContingency.toFixed(0))}</p>
<p class="text-xs text-gray-500">* Skala risiko (TRS ${result.derivedMetrics.TRS.toFixed(1)}/25) mempengaruhi rekomendasi ini.</p>
</div>
<div class="bg-blue-100 p-4 rounded-lg">
<p class="text-sm font-medium text-blue-700">C. TOTAL ANGGARAN PROYEKSI</p>
<p class="text-xl font-extrabold text-blue-900">Rp ${formatCurrency(totalProjectedCost.toFixed(0))}</p>
<p class="text-xs text-gray-500">* Total (A + B + Est. Infrastruktur).</p>
</div>
</div>

<div class="mt-4 text-sm text-gray-600 p-3 bg-gray-100 rounded-lg">
<p class="font-semibold text-base text-gray-800 mb-1">Perbandingan Anggaran Input:</p>
<p>Anggaran Pokok Input: <span class="font-bold">Rp ${formatCurrency(features.base_budget_input)}</span></p>
<p>Kontingensi Input: <span class="font-bold">Rp ${formatCurrency(features.contingency_cost_input)}</span></p>
<p class="mt-2 italic text-xs">Pastikan anggaran input Anda mencukupi total proyeksi dan kontingensi yang direkomendasikan model untuk manajemen risiko yang optimal.</p>
</div>
</div>
`;

// 3. Tim (DIUBAH MENJADI ANALISIS EXPERTISE)
const avgExpertise = result.derivedMetrics.avgExpertise;
const expertiseRecommendation = avgExpertise < 3.0
? `<span class="text-red-600">Level keahlian ini di bawah rata-rata ideal (3.0).</span> Risiko kualitas dan penundaan tinggi. Direkomendasikan menambah peran senior atau meningkatkan keahlian tim yang ada.`
: `<span class="text-green-600">Level keahlian ini optimal.</span> Tim ini mampu mengatasi tantangan teknis dengan baik.`;

let teamHtml = `
<div class="report-section">
<h5 class="text-lg font-semibold text-gray-700 mb-3">3. Analisis Tim dan Rekomendasi Expertise</h5>
<p class="mb-3 text-sm text-gray-600">Tim input Anda terdiri dari ${features.total_team_members} anggota. Berikut analisis model terhadap keahlian rata-rata tim:</p>

<div class="bg-gray-100 p-4 rounded-lg mb-4">
<p class="text-sm font-medium text-gray-700">Skor Keahlian Rata-Rata Tim:</p>
<p class="text-3xl font-extrabold text-blue-700">${avgExpertise.toFixed(2)}/5.0</p>
<p class="text-sm mt-2">${expertiseRecommendation}</p>
</div>

<h6 class="text-md font-semibold text-gray-600 mb-2">Rincian Tim Input (Untuk Referensi):</h6>
<table class="min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden">
<thead class="bg-green-100">
<tr>
<th class="px-3 py-2 text-left text-xs font-medium text-green-800 uppercase">Role</th>
<th class="px-3 py-2 text-center text-xs font-medium text-green-800 uppercase">Qty</th>
<th class="px-3 py-2 text-center text-xs font-medium text-green-800 uppercase">Expertise (1-5)</th>
<th class="px-3 py-2 text-right text-xs font-medium text-green-800 uppercase">Gaji Bulanan (Rp)</th>
</tr>
</thead>
<tbody class="bg-white divide-y divide-gray-200 text-sm">
${features.raw_team_data.map(t => `
<tr>
<td class="px-3 py-2 whitespace-nowrap">${t.role}</td>
<td class="px-3 py-2 whitespace-nowrap text-center">${t.qty}</td>
<td class="px-3 py-2 whitespace-nowrap text-center">${t.expertise}</td>
<td class="px-3 py-2 whitespace-nowrap text-right">${formatCurrency(t.salary)}</td>
</tr>
`).join('')}
</tbody>
</table>
</div>
`;

// 4. Teknologi (DIUBAH MENJADI ANALISIS KOMPLEKSITAS & DIVERSIFIKASI)
const techDiversity = result.derivedMetrics.techDiversity;
const techComplexity = result.derivedMetrics.techComplexity;
const complexityRating = techComplexity > 5 ? 'Tinggi' : techComplexity > 2 ? 'Sedang' : 'Rendah';
const diversityRating = techDiversity < 2 ? 'Kurang Diversifikasi' : techDiversity >= 4 ? 'Diversifikasi Kuat' : 'Cukup Diversifikasi';

let techRecommendation = '';
if (techComplexity > 8 && features.project_scale !== 'Large') {
techRecommendation = `<span class="text-red-600">Peringatan Kompleksitas:</span> Jumlah teknologi spesifik (${techComplexity}) terlalu tinggi untuk proyek skala ${features.project_scale}. Pertimbangkan konsolidasi untuk mengurangi biaya lisensi dan risiko integrasi.`;
} else if (techDiversity < 2 && techComplexity > 1) {
techRecommendation = `<span class="text-yellow-600">Diversifikasi Rendah:</span> Semua teknologi berfokus pada ${features.raw_tech_data[0]?.category_name}. Pastikan kategori penting lainnya (Database, Cloud) tidak diabaikan.`;
} else {
techRecommendation = `<span class="text-green-600">Analisis Model:</span> Profil teknologi menunjukkan keseimbangan yang baik antara spesialisasi dan cakupan kategori.`;
}


let techHtml = `
<div class="report-section">
<h5 class="text-lg font-semibold text-gray-700 mb-3">4. Analisis dan Rekomendasi Teknologi</h5>
<p class="mb-3 text-sm text-gray-600">Model mengevaluasi jumlah teknologi spesifik dan diversifikasi kategorinya.</p>

<div class="grid grid-cols-2 gap-4 bg-gray-100 p-4 rounded-lg mb-4">
<div>
<p class="text-sm font-medium text-gray-700">Kompleksitas (Jumlah Spesifik):</p>
<p class="text-2xl font-bold text-purple-700">${techComplexity} | ${complexityRating}</p>
</div>
<div>
<p class="text-sm font-medium text-gray-700">Diversifikasi (Jumlah Kategori):</p>
<p class="text-2xl font-bold text-purple-700">${techDiversity} Kategori | ${diversityRating}</p>
</div>
</div>
<p class="text-sm mt-2 font-medium">${techRecommendation}</p>

<h6 class="text-md font-semibold text-gray-600 mt-4 mb-2">Rincian Teknologi Input (Untuk Referensi):</h6>
<table class="min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden">
<thead class="bg-purple-100">
<tr>
<th class="px-3 py-2 text-left text-xs font-medium text-purple-800 uppercase">Kategori</th>
<th class="px-3 py-2 text-left text-xs font-medium text-purple-800 uppercase">Nama Spesifik</th>
</tr>
</thead>
<tbody class="bg-white divide-y divide-gray-200 text-sm">
${features.raw_tech_data.map(t => `
<tr>
<td class="px-3 py-2 whitespace-nowrap">${t.category_name}</td>
<td class="px-3 py-2 whitespace-nowrap">${t.name}</td>
</tr>
`).join('')}
</tbody>
</table>
</div>
`;

// 5. Risiko Awal (DIUBAH MENJADI TOTAL RISK SCORE)
const TRS = result.derivedMetrics.TRS;
const riskSeverity = TRS > 15 ? 'KRITIS' : TRS > 8 ? 'Signifikan' : 'Terkelola';
const riskColor = TRS > 15 ? 'bg-red-200 text-red-800' : TRS > 8 ? 'bg-yellow-200 text-yellow-800' : 'bg-green-200 text-green-800';

let riskHtml = `
<div class="report-section">
<h5 class="text-lg font-semibold text-gray-700 mb-3">5. Analisis dan Rekomendasi Risiko Awal</h5>
<p class="mb-3 text-sm text-gray-600">Model menghitung skor risiko total berdasarkan input Dampak dan Kemungkinan (D*K).</p>

<div class="bg-gray-100 p-4 rounded-lg mb-4">
<p class="text-sm font-medium text-gray-700">Skor Risiko Gabungan (Total Risk Score - TRS):</p>
<div class="flex justify-between items-center mt-1">
<p class="text-3xl font-extrabold text-red-700">${TRS.toFixed(1)}/25.0</p>
<span class="px-3 py-1 rounded-full text-sm font-bold ${riskColor}">${riskSeverity}</span>
</div>
<p class="text-sm mt-2">Risiko rata-rata per item risiko: <span class="font-bold">${(TRS / features.risk_count).toFixed(1)}</span>. ${riskSeverity === 'KRITIS' ? 'Perlu tindakan mitigasi segera.' : ''}</p>
</div>

<h6 class="text-md font-semibold text-gray-600 mt-4 mb-2">Rincian Risiko Input (Untuk Referensi):</h6>
<table class="min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden">
<thead class="bg-red-100">
<tr>
<th class="px-3 py-2 text-left text-xs font-medium text-red-800 uppercase">Kategori Risiko</th>
<th class="px-3 py-2 text-center text-xs font-medium text-red-800 uppercase">Dampak (1-5)</th>
<th class="px-3 py-2 text-center text-xs font-medium text-red-800 uppercase">Kemungkinan (1-5)</th>
<th class="px-3 py-2 text-center text-xs font-medium text-red-800 uppercase">Tingkat Risiko (D*K)</th>
</tr>
</thead>
<tbody class="bg-white divide-y divide-gray-200 text-sm">
${features.raw_risk_data.map(r => `
<tr>
<td class="px-3 py-2 whitespace-nowrap">${r.category_name}</td>
<td class="px-3 py-2 whitespace-nowrap text-center">${r.impact}</td>
<td class="px-3 py-2 whitespace-nowrap text-center">${r.likelihood}</td>
<td class="px-3 py-2 whitespace-nowrap text-center font-semibold">${(r.impact * r.likelihood).toFixed(1)}</td>
</tr>
`).join('')}
</tbody>
</table>
</div>
`;

// 6. Rekomendasi/Mitigasi Khusus (TETAP SAMA)
let recommendationHtml = `
<div class="report-section border-b-0">
<h5 class="text-lg font-semibold text-gray-700 mb-3">6. Rekomendasi Aksi Cepat (Model Gabungan)</h5>
<ul class="list-disc list-inside text-left mx-auto max-w-full space-y-2 text-sm">
${result.recommendations.map(rec => {
const colorClass = rec.type === 'Negatif' ? 'text-red-600 font-medium' : 'text-green-600';
return `<li class="${colorClass}">${rec.text}</li>`;
}).join('')}
</ul>
</div>
`;

return phaseHtml + budgetHtml + teamHtml + techHtml + riskHtml + recommendationHtml;
}

// --- 5. Event Handler Utama ---

document.getElementById('predictionForm').addEventListener('submit', function(e) {
e.preventDefault();

const features = engineerFeatures();
if (!features) {
document.getElementById('resultContainer').classList.add('hidden');
return;
}

const result = predict(features);
const resultContainer = document.getElementById('resultContainer');
const predictionOutput = document.getElementById('predictionOutput');
const predictionDetail = document.getElementById('predictionDetail');
const reportContent = document.getElementById('reportContent');

// Tampilkan Hasil Prediksi Sederhana
resultContainer.classList.remove('hidden');
resultContainer.scrollIntoView({ behavior: 'smooth' });

const probabilityPercent = (result.probability * 100).toFixed(2);

if (result.prediction === 1) {
predictionOutput.textContent = "SUKSES";
predictionOutput.classList.remove('bg-red-200', 'text-red-700');
predictionOutput.classList.add('bg-green-200', 'text-green-700');
predictionDetail.innerHTML = `Model memprediksi proyek **Sangat Mungkin Berhasil** dengan probabilitas gabungan: <strong>${probabilityPercent}%</strong>.`;
} else {
predictionOutput.textContent = "GAGAL";
predictionOutput.classList.remove('bg-green-200', 'text-green-700');
predictionOutput.classList.add('bg-red-200', 'text-red-700');
predictionDetail.innerHTML = `Model memprediksi proyek **Berisiko Tinggi Gagal** dengan probabilitas gabungan: <strong>${probabilityPercent}%</strong>. Harap tinjau laporan rinci di bawah.`;
}

// Generate dan Tampilkan Laporan Detail
reportContent.innerHTML = generateReportHTML(features, result);
});

// Initialize default inputs
window.onload = function() {
// Render options for existing Risk and Tech inputs
document.querySelectorAll('#riskContainer select').forEach(select => {
const initialValue = select.value;
select.innerHTML = getCategoryOptions(RISK_CATEGORIES, initialValue);
});
document.querySelectorAll('#techContainer select').forEach(select => {
const initialValue = select.value || 1;
select.innerHTML = getCategoryOptions(TECH_CATEGORIES, initialValue);
});
}

</script>
</body>
</html>