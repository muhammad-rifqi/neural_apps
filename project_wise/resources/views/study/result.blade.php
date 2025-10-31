@extends('layouts.apps')

@section('content')   

<?php
$num = explode(',', $data->duration_weeks);
?>


<div class="container my-5" style="height: 1200px; overflow-y:scroll;scrollbar-width: none;">
    <div id="resultContainer" class="card p-4 prediction-result">
    <header class="mb-5">
        <h1 class="display-4 text-dark font-weight-bold" id="warna_texts">Predictive Project Planner</h1>
        <p class="text-muted" id="warna_texts">Berikut tingkat keberhasilan menggunakan model Stacking (GB → ANN → NB).</p>
    </header>
        <h3 class="h4 text-primary font-weight-bold mb-4 text-center">Hasil Prediksi &amp; Laporan Rekomendasi</h3>

        <?php if($output->prediction == 0): ?>
            <div class="alert alert-danger text-center">
                <h5 class="font-weight-bold">Status Prediksi Pipeline:</h5>
                <div class="display-4 text-danger font-weight-bold">GAGAL</div>
                <p class="text-muted mt-2">Model memprediksi proyek <strong>Berisiko Tinggi Gagal</strong> dengan probabilitas gabungan:
                    <strong>
                        <?php $has = ($output->probability * 100); ?>
                        {{ number_format($has, 2) }}%
                    </strong>.
                </p>
            </div>
        <?php else: ?>
            <div class="alert alert-success text-center">
                <h5 class="font-weight-bold">Status Prediksi Pipeline:</h5>
                <div class="display-4 text-success font-weight-bold">SUKSES</div>
                <p class="text-muted mt-2">Model memprediksi proyek <strong>Sangat Mungkin Berhasil</strong> dengan probabilitas gabungan:
                    <strong>
                        <?php $has = ($output->probability * 100); ?>
                        {{ number_format($has, 2) }}%
                    </strong>.
                </p>
            </div>
        <?php endif; ?>

        <div id="detailedReport" class="mt-5 bg-light p-4 rounded">
            <h4 class="font-weight-bold text-dark mb-4">Laporan Rencana Aksi Proyek</h4>

            <!-- 1. Kerangka waktu -->
            <div class="report-section">
                <h5 class="font-weight-bold mb-3">1. Kerangka Waktu dan Fase Proyek</h5>
                <p class="text-muted">
                    Durasi total proyek diperkirakan {{$data->duration_months}} bulan (sekitar {{$data->duration_months * 4}} minggu),
                    dimulai dari {{$data->startDate}} hingga {{$data->endDate}}.
                </p>

                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>Fase</th>
                                <th>Durasi (Minggu)</th>
                                <th>Kegiatan Utama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>Penemuan & Akuisisi Data</td><td>{{$num[0]}}</td><td>Definisi metrik, identifikasi sumber data.</td></tr>
                            <tr><td>Pemrosesan Data & Rekayasa Fitur</td><td>{{$num[1]}}</td><td>Pembersihan data, normalisasi, pembuatan fitur.</td></tr>
                            <tr><td>Pengembangan Model & Evaluasi</td><td>{{$num[2]}}</td><td>Pelatihan model, tuning hyperparameter, validasi.</td></tr>
                            <tr><td>Integrasi & Penerapan (Deployment)</td><td>{{$num[3]}}</td><td>Membangun API, mengemas model (Docker), integrasi sistem.</td></tr>
                            <tr><td>Pemantauan & Serah Terima Akhir</td><td>{{$num[4]}}</td><td>Mengatur dasbor pemantauan kinerja model.</td></tr>
                            <tr class="font-weight-bold bg-light"><td>TOTAL</td><td>{{$data->duration_months * 4}}</td><td></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 2. Rekomendasi Anggaran -->
            <div class="report-section">
                <h5 class="font-weight-bold mb-3">2. Rekomendasi Anggaran Proyek (Model)</h5>
                <p class="text-muted">
                    Model memproyeksikan total biaya tenaga kerja selama {{$data->duration_months}} bulan dan rekomendasi dana kontingensi.
                </p>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card bg-success text-white p-3">
                            <h6>Biaya Tenaga Kerja</h6>
                            <h4>Rp {{number_format($metrix->projectedLaborCost,0,',','.')}}</h4>
                            <small>Berdasarkan total gaji tim ({{$data->total_team_members}}) dan durasi.</small>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card bg-warning p-3">
                            <h6 class="text-dark">Dana Kontingensi</h6>
                            <h4 class="text-dark">Rp {{number_format($metrix->recommendedContingency,0,',','.')}}</h4>
                            <small class="text-muted">TRS {{number_format($metrix->TRS,2)}}/25 mempengaruhi rekomendasi.</small>
                        </div>
                    </div>
                    <?php
                        $infraCostEstimate = $metrix->projectedLaborCost * 0.05;
                        $totalProjectedCost = $metrix->projectedLaborCost + $infraCostEstimate + $metrix->recommendedContingency;
                    ?>
                    <div class="col-md-4 mb-3">
                        <div class="card bg-info text-white p-3">
                            <h6>Total Anggaran</h6>
                            <h4>Rp {{number_format($totalProjectedCost,0,',','.')}}</h4>
                            <small>Total (A + B + Infrastruktur).</small>
                        </div>
                    </div>
                </div>

                <div class="alert alert-secondary mt-3">
                    <strong>Perbandingan Anggaran Input:</strong><br>
                    Anggaran Pokok: Rp {{number_format($data->base_budget_input,0,',','.')}}
                    <br>Kontingensi Input: Rp {{number_format($data->contingency_cost_input,0,',','.')}}
                    <br><small><em>Pastikan anggaran mencukupi total proyeksi dan kontingensi model.</em></small>
                </div>
                
            </div>

            <div class="report-section mb-4">
                <h5 class="h5 font-weight-semibold text-secondary mb-3">
                    3. Analisis Tim dan Rekomendasi Expertise
                </h5>
                <p class="mb-3 text-muted small">
                    Tim input Anda terdiri dari {{$data->total_team_members}} anggota. Berikut analisis
                    model terhadap keahlian rata-rata tim:
                </p>

                <div class="bg-light p-4 rounded mb-4 border">
                    <p class="small font-weight-medium text-secondary mb-1">Skor Keahlian Rata-Rata Tim:</p>
                    <p class="display-4 font-weight-bold text-primary mb-2">{{$metrix->avgExpertise}}/5.0</p>
                    <p class="small mt-2 mb-0">
                        <?php if($metrix->avgExpertise < 3.0) { ?>
                            <span class="text-danger">
                                Level keahlian ini di bawah rata-rata ideal (3.0).
                                Risiko kualitas dan penundaan tinggi. Direkomendasikan menambah peran senior atau meningkatkan keahlian tim yang ada.
                            </span>
                        <?php } else { ?>
                            <span class="text-success">
                                Level keahlian ini optimal. Tim ini mampu mengatasi tantangan teknis dengan baik.
                            </span>
                        <?php } ?>
                    </p>
                </div>

                <h6 class="h6 font-weight-semibold text-secondary mb-2">Rincian Tim Input (Untuk Referensi):</h6>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="bg-success text-white">
                            <tr>
                                <th class="text-left text-uppercase small">Role</th>
                                <th class="text-center text-uppercase small">Qty</th>
                                <th class="text-center text-uppercase small">Expertise (1-5)</th>
                                <th class="text-right text-uppercase small">Gaji Bulanan (Rp)</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($teams as $tim)
                            <tr>
                                <td>{{$tim->role}}</td>
                                <td class="text-center">{{$tim->qty}}</td>
                                <td class="text-center">{{$tim->expertise}}</td>
                                <td class="text-right">{{$tim->salary}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <?php
            $techDiversity = $metrix->techDiversity;
            $techComplexity = $metrix->techComplexity;
            $complexityRating = $techComplexity > 5 ? 'Tinggi' : ($techComplexity > 2 ? 'Sedang' : 'Rendah');
            $diversityRating = $techDiversity < 2 ? 'Kurang Diversifikasi' : ($techDiversity >= 4 ? 'Diversifikasi Kuat' : 'Cukup Diversifikasi');

            if ($techComplexity > 8 && $data->project_scale !== 'Large') {
                $techRecommendation = '<span class="text-danger">Peringatan Kompleksitas:</span> Jumlah teknologi spesifik ('.$techComplexity.') terlalu tinggi untuk proyek skala '.$data->project_scale.'. Pertimbangkan konsolidasi untuk mengurangi biaya lisensi dan risiko integrasi.';
            } else if ($techDiversity < 2 && $techComplexity > 1) {
                $techRecommendation = '<span class="text-warning">Diversifikasi Rendah:</span> Semua teknologi berfokus pada satu bidang saja. Pastikan kategori penting lainnya (Database, Cloud) tidak diabaikan.';
            } else {
                $techRecommendation = '<span class="text-success">Analisis Model:</span> Profil teknologi menunjukkan keseimbangan yang baik antara spesialisasi dan cakupan kategori.';
            }
            ?>

            <div class="report-section mb-4">
                <h5 class="h5 font-weight-semibold text-secondary mb-3">
                    4. Analisis dan Rekomendasi Teknologi
                </h5>
                <p class="mb-3 text-muted small">
                    Model mengevaluasi jumlah teknologi spesifik dan diversifikasi kategorinya.
                </p>

                <div class="row bg-light p-4 rounded mb-4 border">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <p class="small font-weight-medium text-secondary mb-1">Kompleksitas (Jumlah Spesifik):</p>
                        <p class="h3 font-weight-bold text-purple">{{$techComplexity}} | {{$complexityRating}}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="small font-weight-medium text-secondary mb-1">Diversifikasi (Jumlah Kategori):</p>
                        <p class="h3 font-weight-bold text-purple">{{$techDiversity}} Kategori | {{$diversityRating}} Diversifikasi</p>
                    </div>
                </div>
                <p class="small mt-2 font-weight-medium">{!! $techRecommendation !!}</p>

                <h6 class="h6 font-weight-semibold text-secondary mt-4 mb-2">
                    Rincian Teknologi Input (Untuk Referensi):
                </h6>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-left text-uppercase small">Kategori</th>
                                <th class="text-left text-uppercase small">Nama Spesifik</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tech as $teknologi)
                            <tr>
                                <td>{{$teknologi->category_name}}</td>
                                <td>{{$teknologi->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <?php
            $TRS = $metrix->TRS;
            $riskSeverity = $TRS > 15 ? 'KRITIS' : ($TRS > 8 ? 'Signifikan' : 'Terkelola');
            $riskColor = $TRS > 15 ? 'badge-danger' : ($TRS > 8 ? 'badge-warning' : 'badge-success');
            ?>

            <div class="report-section mb-4">
                <h5 class="h5 font-weight-semibold text-secondary mb-3">
                    5. Analisis dan Rekomendasi Risiko Awal
                </h5>
                <p class="mb-3 text-muted small">
                    Model menghitung skor risiko total berdasarkan input Dampak dan Kemungkinan (D*K).
                </p>

                <div class="bg-light p-4 rounded mb-4 border">
                    <p class="small font-weight-medium text-secondary mb-1">Skor Risiko Gabungan (Total Risk Score - TRS):</p>
                    <div class="d-flex justify-content-between align-items-center mt-1">
                        <p class="display-4 font-weight-bold text-danger mb-0">{{$TRS}}/25.0</p>
                        <span class="badge {{$riskColor}} px-3 py-2 font-weight-bold">{{$riskSeverity}}</span>
                    </div>
                    <p class="small mt-2 mb-0">
                        {{($TRS / number_format($data->risk_count,2))}}.00
                        {{ $riskSeverity === 'KRITIS' ? 'Perlu tindakan mitigasi segera.' : '' }}
                    </p>
                </div>

                <h6 class="h6 font-weight-semibold text-secondary mt-4 mb-2">Rincian Risiko Input (Untuk Referensi):</h6>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="bg-danger text-white">
                            <tr>
                                <th class="text-left text-uppercase small">Kategori Risiko</th>
                                <th class="text-center text-uppercase small">Dampak (1-5)</th>
                                <th class="text-center text-uppercase small">Kemungkinan (1-5)</th>
                                <th class="text-center text-uppercase small">Tingkat Risiko (D*K)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($risk as $risiko)
                            <tr>
                                <td>{{$risiko->category_name}}</td>
                                <td class="text-center">{{$risiko->impact}}</td>
                                <td class="text-center">{{$risiko->likelihood}}</td>
                                <td class="text-center font-weight-semibold">{{($risiko->impact * $risiko->likelihood)}}.00</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

           <div class="report-section border-0">
            <h5 class="h5 font-weight-semibold text-secondary mb-3">
                6. Rekomendasi Aksi Cepat (Model Gabungan)
            </h5>
            <ul class="list-unstyled text-left mx-auto w-100" style="font-size: 0.9rem;">
                <?php 
                    foreach($rek as $rekom){
                        $colorClass = $rekom->type === 'Negatif' 
                            ? 'text-danger font-weight-medium' 
                            : 'text-success';
                        echo '<li class="'.$colorClass.'">• '.$rekom->text.'</li>';
                    }
                ?>
            </ul>
        </div>


        </div>
    </div>
</div>
@endsection