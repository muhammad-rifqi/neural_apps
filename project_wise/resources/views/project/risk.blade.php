@extends('layouts.apps')

@section('content')      
<style>
    .nav-tabs .nav-link.active {
      font-weight: bold;
    }
    .top-buttons {
      text-align: right;
    }
    .top-buttons .btn {
      margin-left: 8px;
    }
  </style>
        <main class="main">
            <section class="welcome-section" style="height: 800px; overflow-y:scroll">
                
                <h2 style="margin-top:200px" id="warna_text">Hi,{{ Auth::user()->name }}! Let’s power up your next project.</h2>
                <div class="welcome-section_tab">

                      <!-- Tabs -->
                    <ul class="nav nav-tabs mb-4">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('projects')}}">Project Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('teamp')}}">Team & Resource Allocation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('riskp')}}">Initial Risk & Constrains</a>
                        </li>
                    </ul>


                    <div class="tab-content text-left" id="myTabContent">
                        <div class="tab-pane fade show active p-3" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="risk-type">Risk Type *</label>
                                    <select class="form-control" id="risk-type">
                                        <option disabled selected>Choose risk type</option>
                                        @foreach($rt as $rts)
                                            <option value="{{$rts->id}}">{{$rts->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>

                                 <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="description">Description *</label>
                                    <input class="form-control" type="text" id="description" placeholder="Description"/>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="impact-level">Impact Level *</label>
                                    <select class="form-control" id="impact-level">
                                        <option disabled selected>Choose level</option>
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="likelihood">Likelihood *</label><br>
                                    <select class="form" style="width:150px; padding: 6px; border:1px solid #ccc; border-radius: 4px" id="likelihood">
                                        <option disabled selected>Possibility</option>
                                        <option value="unlikely">Unlikely</option>
                                        <option value="possible">Possible</option>
                                        <option value="like">Likely</option>
                                    </select> <button class="btn btn-primary" onclick="save3()">add</button>
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-dark w-100" onclick="generate()">Generate</button>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </section>
        </main>

 <script>
   function save3(){
    const www = localStorage.getItem('sess_id').split('===')[2];
    const aaa = www;
    const bbb = document.getElementById("risk-type").value;
    const ccc = document.getElementById("description").value;
    const ddd = document.getElementById("impact-level").value;
    const eee = document.getElementById("likelihood").value;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    let riskPrediction = "";

    if (ddd === "high" && eee === "like") {
        riskPrediction = "Critical Risk";
    } else if (ddd === "high" && eee === "possible") {
        riskPrediction = "High Risk";
    } else if (ddd === "medium" && eee === "like") {
        riskPrediction = "High Risk";
    } else if (ddd === "medium" && eee === "possible") {
        riskPrediction = "Medium Risk";
    } else if (ddd === "low" && eee === "like") {
        riskPrediction = "Medium Risk";
    } else {
        riskPrediction = "Low Risk";
    }



function getRiskTypeName(id) {
    switch (id) {
        case "1": return "Finance";
        case "2": return "Operational";
        case "3": return "Compliance";
        default: return "Unknown";
    }
}
    fetch('/api/risk', {
    method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({
            "id_project" : aaa,
            "risk_type" : bbb,
            "description" : ccc,
            "impact_level" : ddd,
            "likelihood" : eee,
            "risk_prediction" : riskPrediction,
            "risk_type_prediction" : getRiskTypeName(bbb),
        })
    })
    .then(response => response.json())
    .then(data => {     
        if(data.success){
            swal("Sukses!", "Data Risk berhasil disimpan.", "success")
            .then(() => {
                window.location.reload();
            });  
        }else{
            swal("Gagal!", "Data Risk.", "danger")
            .then(() => {
                window.location.reload();
            });  
        } 
    })
    }


        function engineerFeatures() {
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
                raw_team_data.push({ role, qty, expertise, salary });
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

            if (total_input_cost <= 0 || duration_months <= 0 || total_team_members <= 0 || tech_count === 0) {
                showError("Pastikan Anggaran Pokok, Durasi Proyek, Anggota Tim, dan minimal satu Teknologi ada dan bernilai positif/valid.");
                return null;
            }

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

        function predict(features) {

            const MAX_COST = 500000;
            const MAX_TEAM = 20;
            const MAX_RISK_LEVEL = 5;
            const MAX_TECH_COUNT = 10;

            const scaled_cost = features.base_budget_input / MAX_COST; 
            const scaled_team = features.total_team_members / MAX_TEAM;
            const scaled_impact = features.avg_impact_level / MAX_RISK_LEVEL;
            const scaled_tech_diversity = features.distinct_tech_count / MAX_TECH_COUNT;

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

            if (features.project_scale === 'Large') {
                base_score += 0.05;
            } else if (features.project_scale === 'Small') {
                base_score -= 0.03;
            }

            const final_probability = Math.min(1.0, Math.max(0.0, base_score));

            const THRESHOLD = 0.55;
            const ann_proba = final_probability * 0.9 + 0.05;
            const nb_final_proba = ann_proba;

            const prediction = nb_final_proba >= THRESHOLD ? 1 : 0;

            const recommendations = [];
            const TRS = features.avg_impact_level * features.avg_likelihood; // Total Risk Score (Max 25)
            const projectedLaborCost = features.total_weighted_salary * features.duration_months;
            const recommendedContingency = (TRS / 25) * projectedLaborCost * 0.20; // 20% of labor cost scaled by risk

            if (TRS >= 12) { 
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

            if (sdlc_contribution < 0) {
                recommendations.push({
                    type: "Negatif",
                    text: `**Metode SDLC:** Metode ${features.sdlc_method} memiliki fleksibilitas rendah. Pertimbangkan pendekatan yang lebih adaptif seperti Agile, Scrum, atau Iterative untuk meningkatkan kemampuan tim merespons perubahan.`
                });
            }

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



    function generate(){
        window.location.href='/project';
    }
</script>

@endsection
