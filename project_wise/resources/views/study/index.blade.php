<?php
$num = explode(',',$data->duration_weeks);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Wise</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
            gap: 0.75rem;
            /* gap-3 */
            margin-bottom: 0.5rem;
            /* mb-2 */
            padding-left: 0.75rem;
            /* px-3 for alignment */
            padding-right: 0.75rem;
            /* px-3 for alignment */
        }

        .header-item {
            font-weight: 600;
            /* font-semibold */
            color: #4b5563;
            /* text-gray-600 */
            font-size: 0.875rem;
            /* text-sm */
        }

        .report-section {
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 1.5rem;
            margin-bottom: 1.5rem;
        }

        /* Mobile adjustment for input groups */
        @media (max-width: 640px) {
            .input-group>* {
                min-width: 0;
            }
        }
    </style>
</head>

<body class="p-4 sm:p-8">

    <div class="max-w-4xl mx-auto">
        <header class="text-left mb-10">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-blue-700">Predictive Project Planner</h1>
            <p class="text-gray-500 mt-2">Masukkan detail proyek untuk memprediksi keberhasilan menggunakan model
                Stacking (GB → ANN → NB).</p>
            <p class="text-red-500 mt-2"><a href="/home">[ kembali ke dashboard ]</a></p>
        </header>


        <div id="resultContainer"
            class="prediction-result mt-10 p-6 rounded-xl text-center bg-white border border-gray-300">
            <h3 class="text-2xl font-bold mb-4 text-blue-700">Hasil Prediksi &amp; Laporan Rekomendasi</h3>

            <?php 
            if($output->prediction == 0){
            ?>
             <div class="p-4 mb-6 rounded-lg inline-block">
                <p class="text-xl font-bold text-gray-700">Status Prediksi Pipeline:</p>
                <div id="predictionOutput" class="text-3xl font-extrabold p-2 rounded-lg mt-1 bg-red-200 text-red-700">
                    GAGAL
                </div>
                <p id="predictionDetail" class="text-gray-600 mt-2 text-sm">Model memprediksi proyek **Berisiko Tinggi
                    Gagal** dengan probabilitas gabungan: <strong><?php $has = ($output->probability * 100); ?>{{number_format($has, 2)}}%</strong>. Harap tinjau laporan rinci di bawah.
                </p>
            </div>
            <?php
            }else{
            ?>
            <div class="p-4 mb-6 rounded-lg inline-block">
                <p class="text-xl font-bold text-gray-700">Status Prediksi Pipeline:</p>
                <div id="predictionOutput" class="text-3xl font-extrabold p-2 rounded-lg mt-1 bg-green-200 text-green-700">
                    SUKSES
                </div>
                <p id="predictionDetail" class="text-gray-600 mt-2 text-sm">Model memprediksi proyek **Sangat Mungkin Berhasil** dengan probabilitas gabungan: <strong><?php $has = ($output->probability * 100); ?>{{number_format($has, 2)}}%</strong>.
                </p>
            </div>
            <?php    
            }
            ?>
           

            <div id="detailedReport" class="text-left mt-8 p-4 border border-gray-100 rounded-lg bg-gray-50">
                <h4 class="text-xl font-bold text-gray-800 mb-6">Laporan Rencana Aksi Proyek</h4>
                <div id="reportContent">
                    <div class="report-section">
                        <h5 class="text-lg font-semibold text-gray-700 mb-3">1. Kerangka Waktu dan Fase Proyek</h5>
                        <p class="mb-3 text-sm text-gray-600">Durasi total proyek diperkirakan {{$data->duration_months}} bulan (sekitar {{$data->duration_months * 4}}
                            minggu), dimulai dari {{$data->startDate}} hingga {{$data->endDate}}.</p>
                        <table class="min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden">
                            <thead class="bg-blue-100">
                                <tr>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-blue-800 uppercase">Fase
                                    </th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-blue-800 uppercase">Durasi
                                        (Minggu)</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-blue-800 uppercase">Kegiatan
                                        Utama</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-sm">
                                <tr>
                                    <td class="px-3 py-2 whitespace-nowrap">Penemuan &amp; Akuisisi Data</td>
                                    <td class="px-3 py-2 whitespace-nowrap">{{$num[0]}}</td>
                                    <td class="px-3 py-2">Definisi metrik, identifikasi sumber data.</td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-2 whitespace-nowrap">Pemrosesan Data &amp; Rekayasa Fitur</td>
                                    <td class="px-3 py-2 whitespace-nowrap">{{$num[1]}}</td>
                                    <td class="px-3 py-2">Pembersihan data, normalisasi, pembuatan fitur.</td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-2 whitespace-nowrap">Pengembangan Model &amp; Evaluasi</td>
                                    <td class="px-3 py-2 whitespace-nowrap">{{$num[2]}}</td>
                                    <td class="px-3 py-2">Pelatihan model, *tuning* hyperparameter, validasi.</td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-2 whitespace-nowrap">Integrasi &amp; Penerapan (Deployment)</td>
                                    <td class="px-3 py-2 whitespace-nowrap">{{$num[3]}}</td>
                                    <td class="px-3 py-2">Membangun API, mengemas model (Docker), integrasi sistem.</td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-2 whitespace-nowrap">Pemantauan &amp; Serah Terima Akhir</td>
                                    <td class="px-3 py-2 whitespace-nowrap">{{$num[4]}}</td>
                                    <td class="px-3 py-2">Mengatur dasbor pemantauan kinerja model.</td>
                                </tr>
                                <tr class="bg-gray-100 font-bold">
                                    <td class="px-3 py-2 whitespace-nowrap">TOTAL</td>
                                    <td class="px-3 py-2 whitespace-nowrap">{{$data->duration_months * 4}}</td>
                                    <td class="px-3 py-2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="report-section">
                        <h5 class="text-lg font-semibold text-gray-700 mb-3">2. Rekomendasi Anggaran Proyek (Berdasarkan
                            Model)</h5>
                        <p class="mb-3 text-sm text-gray-600">Model memproyeksikan total biaya tenaga kerja selama {{$data->duration_months}}
                            bulan dan merekomendasikan dana kontingensi berdasarkan skor risiko.</p>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-green-50 p-4 rounded-lg">
                                <p class="text-sm font-medium text-green-700">A. Biaya Tenaga Kerja (Projected)</p>
                                <p class="text-xl font-bold text-green-900">Rp {{number_format($metrix->projectedLaborCost,0,',','.')}}</p>
                                <p class="text-xs text-gray-500">* Berdasarkan total gaji tim input ({{$data->total_team_members}}) dan durasi.</p>
                            </div>
                            <div class="bg-yellow-50 p-4 rounded-lg">
                                <p class="text-sm font-medium text-yellow-700">B. Dana Kontingensi (Direkomendasikan)
                                </p>
                                <p class="text-xl font-bold text-yellow-900">Rp {{number_format($metrix->recommendedContingency,0,',','.')}}</p>
                                <p class="text-xs text-gray-500">* Skala risiko (TRS {{number_format($metrix->TRS,2)}}/25) mempengaruhi rekomendasi
                                    ini.</p>
                            </div>
                            <?php
                                $infraCostEstimate = $metrix->projectedLaborCost * 0.05;
                                $totalProjectedCost = $metrix->projectedLaborCost + $infraCostEstimate + $metrix->recommendedContingency;
                            ?>
                            <div class="bg-blue-100 p-4 rounded-lg">
                                <p class="text-sm font-medium text-blue-700">C. TOTAL ANGGARAN PROYEKSI</p>
                                <p class="text-xl font-extrabold text-blue-900">Rp {{number_format($totalProjectedCost,0,',','.')}}</p>
                                <p class="text-xs text-gray-500">* Total (A + B + Est. Infrastruktur).</p>
                            </div>
                        </div>

                        <div class="mt-4 text-sm text-gray-600 p-3 bg-gray-100 rounded-lg">
                            <p class="font-semibold text-base text-gray-800 mb-1">Perbandingan Anggaran Input:</p>
                            <p>Anggaran Pokok Input: <span class="font-bold">Rp {{number_format($data->base_budget_input,0,',','.')}}</span></p>
                            <p>Kontingensi Input: <span class="font-bold">Rp {{number_format($data->contingency_cost_input,0,',','.')}}</span></p>
                            <p class="mt-2 italic text-xs">Pastikan anggaran input Anda mencukupi total proyeksi dan
                                kontingensi yang direkomendasikan model untuk manajemen risiko yang optimal.</p>
                        </div>
                    </div>

                    <div class="report-section">
                        <h5 class="text-lg font-semibold text-gray-700 mb-3">3. Analisis Tim dan Rekomendasi Expertise
                        </h5>
                        <p class="mb-3 text-sm text-gray-600">Tim input Anda terdiri dari {{$data->total_team_members}} anggota. Berikut analisis
                            model terhadap keahlian rata-rata tim:</p>

                        <div class="bg-gray-100 p-4 rounded-lg mb-4">
                            <p class="text-sm font-medium text-gray-700">Skor Keahlian Rata-Rata Tim:</p>
                            <p class="text-3xl font-extrabold text-blue-700">{{$metrix->avgExpertise}}/5.0</p>
                            <p class="text-sm mt-2"><span class="text-green-600"><?php if($metrix->avgExpertise < 3.0) { echo '<span class="text-red-600">Level keahlian ini di bawah rata-rata ideal (3.0).</span> Risiko kualitas dan penundaan tinggi. Direkomendasikan menambah peran senior atau meningkatkan keahlian tim yang ada.'; } else  { echo '<span class="text-green-600">Level keahlian ini optimal.</span> Tim ini mampu mengatasi tantangan teknis dengan baik.';} ?></p>
                        </div>

                        <h6 class="text-md font-semibold text-gray-600 mb-2">Rincian Tim Input (Untuk Referensi):</h6>
                        <table class="min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden">
                            <thead class="bg-green-100">
                                <tr>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-green-800 uppercase">Role
                                    </th>
                                    <th class="px-3 py-2 text-center text-xs font-medium text-green-800 uppercase">Qty
                                    </th>
                                    <th class="px-3 py-2 text-center text-xs font-medium text-green-800 uppercase">
                                        Expertise (1-5)</th>
                                    <th class="px-3 py-2 text-right text-xs font-medium text-green-800 uppercase">Gaji
                                        Bulanan (Rp)</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-sm">
                                @foreach($teams as $tim)
                                <tr>
                                    <td class="px-3 py-2 whitespace-nowrap">{{$tim->role}}</td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center">{{$tim->qty}}</td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center">{{$tim->expertise}}</td>
                                    <td class="px-3 py-2 whitespace-nowrap text-right">{{$tim->salary}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <?php
                    $techDiversity = $metrix->techDiversity;
                    $techComplexity = $metrix->techComplexity;
                    $complexityRating = $techComplexity > 5 ? 'Tinggi' : $techComplexity > 2 ? 'Sedang' : 'Rendah';
                    $diversityRating = $techDiversity < 2 ? 'Kurang Diversifikasi' : $techDiversity >= 4 ? 'Diversifikasi Kuat' : 'Cukup Diversifikasi';

                    if ($techComplexity > 8 && $data->project_scale !== 'Large') {
                        $techRecommendation = `<span class="text-red-600">Peringatan Kompleksitas:</span> Jumlah teknologi spesifik ($techComplexity) terlalu tinggi untuk proyek skala ${features.project_scale}. Pertimbangkan konsolidasi untuk mengurangi biaya lisensi dan risiko integrasi.`;
                    } else if ($techDiversity < 2 && $techComplexity > 1) {
                        $techRecommendation = `<span class="text-yellow-600">Diversifikasi Rendah:</span> Semua teknologi berfokus pada tech baru saja. Pastikan kategori penting lainnya (Database, Cloud) tidak diabaikan.`;
                    } else {
                        $techRecommendation = `<span class="text-green-600">Analisis Model:</span> Profil teknologi menunjukkan keseimbangan yang baik antara spesialisasi dan cakupan kategori.`;
                    }
                    ?>

                    <div class="report-section">
                        <h5 class="text-lg font-semibold text-gray-700 mb-3">4. Analisis dan Rekomendasi Teknologi</h5>
                        <p class="mb-3 text-sm text-gray-600">Model mengevaluasi jumlah teknologi spesifik dan
                            diversifikasi kategorinya.</p>

                        <div class="grid grid-cols-2 gap-4 bg-gray-100 p-4 rounded-lg mb-4">
                            <div>
                                <p class="text-sm font-medium text-gray-700">Kompleksitas (Jumlah Spesifik):</p>
                                <p class="text-2xl font-bold text-purple-700">{{$techDiversity}} | {{$complexityRating}}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-700">Diversifikasi (Jumlah Kategori):</p>
                                <p class="text-2xl font-bold text-purple-700">{{$techDiversity}} Kategori | {{$diversityRating}} Diversifikasi</p>
                            </div>
                        </div>
                        <p class="text-sm mt-2 font-medium">{{$techRecommendation}}</p>

                        <h6 class="text-md font-semibold text-gray-600 mt-4 mb-2">Rincian Teknologi Input (Untuk
                            Referensi):</h6>
                        <table class="min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden">
                            <thead class="bg-purple-100">
                                <tr>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-purple-800 uppercase">
                                        Kategori</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-purple-800 uppercase">Nama
                                        Spesifik</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-sm">
                                @foreach($tech as $teknologi)
                                <tr>
                                    <td class="px-3 py-2 whitespace-nowrap">{{$teknologi->category_name}}</td>
                                    <td class="px-3 py-2 whitespace-nowrap">{{$teknologi->name}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <?php
                        $TRS = $metrix->TRS;
                        $riskSeverity = $TRS > 15 ? 'KRITIS' : $TRS > 8 ? 'Signifikan' : 'Terkelola';
                        $riskColor = $TRS > 15 ? 'bg-red-200 text-red-800' : $TRS > 8 ? 'bg-yellow-200 text-yellow-800' : 'bg-green-200 text-green-800';
                    ?>

                    <div class="report-section">
                        <h5 class="text-lg font-semibold text-gray-700 mb-3">5. Analisis dan Rekomendasi Risiko Awal
                        </h5>
                        <p class="mb-3 text-sm text-gray-600">Model menghitung skor risiko total berdasarkan input
                            Dampak dan Kemungkinan (D*K).</p>

                        <div class="bg-gray-100 p-4 rounded-lg mb-4">
                            <p class="text-sm font-medium text-gray-700">Skor Risiko Gabungan (Total Risk Score - TRS):
                            </p>
                            <div class="flex justify-between items-center mt-1">
                                <p class="text-3xl font-extrabold text-red-700">{{$TRS}}/25.0</p>
                                <span
                                    class="px-3 py-1 rounded-full text-sm font-bold <?= $riskColor; ?>">{{$riskSeverity}}</span>
                            </div>
                            <p class="text-sm mt-2"> {{($TRS / number_format($data->risk_count,2))}}.00</span> {{ $riskSeverity === 'KRITIS' ? 'Perlu tindakan mitigasi segera.' : '' }} </p>
                        </div>

                        <h6 class="text-md font-semibold text-gray-600 mt-4 mb-2">Rincian Risiko Input (Untuk
                            Referensi):</h6>
                        <table class="min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden">
                            <thead class="bg-red-100">
                                <tr>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-red-800 uppercase">Kategori
                                        Risiko</th>
                                    <th class="px-3 py-2 text-center text-xs font-medium text-red-800 uppercase">Dampak
                                        (1-5)</th>
                                    <th class="px-3 py-2 text-center text-xs font-medium text-red-800 uppercase">
                                        Kemungkinan (1-5)</th>
                                    <th class="px-3 py-2 text-center text-xs font-medium text-red-800 uppercase">Tingkat
                                        Risiko (D*K)</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-sm">
                                @foreach($risk as $risiko)
                                <tr>
                                    <td class="px-3 py-2 whitespace-nowrap">{{$risiko->category_name}}</td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center">{{$risiko->impact}}</td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center">{{$risiko->likelihood}}</td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center font-semibold">{{($risiko->impact * $risiko->likelihood)}}.00</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="report-section border-b-0">
                        <h5 class="text-lg font-semibold text-gray-700 mb-3">6. Rekomendasi Aksi Cepat (Model Gabungan)
                        </h5>
                        <ul class="list-disc list-inside text-left mx-auto max-w-full space-y-2 text-sm">
                           <?php 
                                foreach($rek as $rekom){
                                    $colorClass = $rekom->type === 'Negatif' ? 'text-red-600 font-medium' : 'text-green-600';
                                    echo '<li class="'.$colorClass.'">'.$rekom->text.'</li>';
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>