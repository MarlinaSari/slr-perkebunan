@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Grafik Prediksi Produksi Tanaman</h1>
        
        <h2>Grafik Prediksi Kakao</h2>
        <canvas id="kakaoChart"></canvas>

        <h2>Grafik Prediksi Kelapa</h2>
        <canvas id="kelapaChart"></canvas>

        <h2>Grafik Prediksi Sawit</h2>
        <canvas id="sawitChart"></canvas>

        <h2>Grafik Prediksi Kopi</h2>
        <canvas id="kopiChart"></canvas>

        <h2>Grafik Prediksi Karet</h2>
        <canvas id="karetChart"></canvas>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data Kakao
        const kakaoLabels = @json($dataKakao->pluck('periode')->flatten());
        const kakaoProduksi = @json($dataKakao->flatten(1)->pluck('produksi'));
        const kakaoPrediksiRegresi = @json(collect($prediksiKakaoRegresi)->pluck('predictions')->flatten(1)->pluck('predictedY'));
        const kakaoPrediksiSES = @json(collect($prediksiKakaoSES)->pluck('predictions')->flatten(1)->pluck('predictedY'));

        // Tambahkan console.log untuk memeriksa data Kakao
        console.log(kakaoLabels, kakaoProduksi, kakaoPrediksiRegresi, kakaoPrediksiSES);

        // Chart Kakao
        const ctxKakao = document.getElementById('kakaoChart').getContext('2d');
        new Chart(ctxKakao, {
            type: 'line',
            data: {
                labels: kakaoLabels,
                datasets: [
                    {
                        label: 'Produksi Kakao',
                        data: kakaoProduksi,
                        borderColor: 'blue',
                        fill: false
                    },
                    {
                        label: 'Prediksi Regresi Kakao',
                        data: kakaoPrediksiRegresi,
                        borderColor: 'green',
                        fill: false
                    },
                    {
                        label: 'Prediksi SES Kakao',
                        data: kakaoPrediksiSES,
                        borderColor: 'red',
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Data Kelapa
        const kelapaLabels = @json($dataKelapa->pluck('periode')->flatten());
        const kelapaProduksi = @json($dataKelapa->flatten(1)->pluck('produksi'));
        const kelapaPrediksiRegresi = @json(collect($prediksiKelapaRegresi)->pluck('predictions')->flatten(1)->pluck('predictedY'));
        const kelapaPrediksiSES = @json(collect($prediksiKelapaSES)->pluck('predictions')->flatten(1)->pluck('predictedY'));

        // Chart Kelapa
        const ctxKelapa = document.getElementById('kelapaChart').getContext('2d');
        new Chart(ctxKelapa, {
            type: 'line',
            data: {
                labels: kelapaLabels,
                datasets: [
                    {
                        label: 'Produksi Kelapa',
                        data: kelapaProduksi,
                        borderColor: 'blue',
                        fill: false
                    },
                    {
                        label: 'Prediksi Regresi Kelapa',
                        data: kelapaPrediksiRegresi,
                        borderColor: 'green',
                        fill: false
                    },
                    {
                        label: 'Prediksi SES Kelapa',
                        data: kelapaPrediksiSES,
                        borderColor: 'red',
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Data Sawit
        const sawitLabels = @json($dataSawit->pluck('periode')->flatten());
        const sawitProduksi = @json($dataSawit->flatten(1)->pluck('produksi'));
        const sawitPrediksiRegresi = @json(collect($prediksiSawitRegresi)->pluck('predictions')->flatten(1)->pluck('predictedY'));
        const sawitPrediksiSES = @json(collect($prediksiSawitSES)->pluck('predictions')->flatten(1)->pluck('predictedY'));

        // Chart Sawit
        const ctxSawit = document.getElementById('sawitChart').getContext('2d');
        new Chart(ctxSawit, {
            type: 'line',
            data: {
                labels: sawitLabels,
                datasets: [
                    {
                        label: 'Produksi Sawit',
                        data: sawitProduksi,
                        borderColor: 'blue',
                        fill: false
                    },
                    {
                        label: 'Prediksi Regresi Sawit',
                        data: sawitPrediksiRegresi,
                        borderColor: 'green',
                        fill: false
                    },
                    {
                        label: 'Prediksi SES Sawit',
                        data: sawitPrediksiSES,
                        borderColor: 'red',
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Data Kopi
        const kopiLabels = @json($dataKopi->pluck('periode')->flatten());
        const kopiProduksi = @json($dataKopi->flatten(1)->pluck('produksi'));
        const kopiPrediksiRegresi = @json(collect($prediksiKopiRegresi)->pluck('predictions')->flatten(1)->pluck('predictedY'));
        const kopiPrediksiSES = @json(collect($prediksiKopiSES)->pluck('predictions')->flatten(1)->pluck('predictedY'));

        // Chart Kopi
        const ctxKopi = document.getElementById('kopiChart').getContext('2d');
        new Chart(ctxKopi, {
            type: 'line',
            data: {
                labels: kopiLabels,
                datasets: [
                    {
                        label: 'Produksi Kopi',
                        data: kopiProduksi,
                        borderColor: 'blue',
                        fill: false
                    },
                    {
                        label: 'Prediksi Regresi Kopi',
                        data: kopiPrediksiRegresi,
                        borderColor: 'green',
                        fill: false
                    },
                    {
                        label: 'Prediksi SES Kopi',
                        data: kopiPrediksiSES,
                        borderColor: 'red',
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Data Karet
        const karetLabels = @json($dataKaret->pluck('periode')->flatten());
        const karetProduksi = @json($dataKaret->flatten(1)->pluck('produksi'));
        const karetPrediksiRegresi = @json(collect($prediksiKaretRegresi)->pluck('predictions')->flatten(1)->pluck('predictedY'));
        const karetPrediksiSES = @json(collect($prediksiKaretSES)->pluck('predictions')->flatten(1)->pluck('predictedY'));

        // Chart Karet
        const ctxKaret = document.getElementById('karetChart').getContext('2d');
        new Chart(ctxKaret, {
            type: 'line',
            data: {
                labels: karetLabels,
                datasets: [
                    {
                        label: 'Produksi Karet',
                        data: karetProduksi,
                        borderColor: 'blue',
                        fill: false
                    },
                    {
                        label: 'Prediksi Regresi Karet',
                        data: karetPrediksiRegresi,
                        borderColor: 'green',
                        fill: false
                    },
                    {
                        label: 'Prediksi SES Karet',
                        data: karetPrediksiSES,
                        borderColor: 'red',
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
