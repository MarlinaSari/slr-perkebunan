<!DOCTYPE html>
<html>
<head>
    <title>Hasil Prediksi Produksi Sawit</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Hasil Prediksi Produksi Sawit</h1>

    <h2>Hasil Regresi Linear</h2>
    @if(!empty($sawitRegression))
    <table>
        <thead>
            <tr>
                <th>Lokasi</th>
                <th>Intercept (a)</th>
                <th>Slope (b)</th>
                <th>MAPE (%)</th>
                <th>Prediksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sawitRegression as $location => $data)
            <tr>
                <td>{{ $location }}</td>
                <td>{{ number_format($data['a'], 2) }}</td>
                <td>{{ number_format($data['b'], 2) }}</td>
                <td>{{ number_format($data['MAPE'], 2) }}</td>
                <td>
                    <table>
                        <thead>
                            <tr>
                                <th>Periode</th>
                                <th>Produksi Aktual</th>
                                <th>Produksi Prediksi</th>
                                <th>APE (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['predictions'] as $prediction)
                            <tr>
                                <td>{{ $prediction['periode'] }}</td>
                                <td>{{ number_format($prediction['produksi'], 2) }}</td>
                                <td>{{ number_format($prediction['predictedY'], 2) }}</td>
                                <td>{{ number_format($prediction['APE'], 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Tidak ada data regresi linear tersedia.</p>
    @endif

    <h2>Hasil Simple Exponential Smoothing (SES)</h2>
    @if(!empty($sawitSES))
    <table>
        <thead>
            <tr>
                <th>Lokasi</th>
                <th>MAPE (%)</th>
                <th>Prediksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sawitSES as $location => $data)
            <tr>
                <td>{{ $location }}</td>
                <td>{{ number_format($data['MAPE'], 2) }}</td>
                <td>
                    <table>
                        <thead>
                            <tr>
                                <th>Periode</th>
                                <th>Produksi Aktual</th>
                                <th>Produksi Prediksi</th>
                                <th>APE (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['predictions'] as $prediction)
                            <tr>
                                <td>{{ $prediction['periode'] }}</td>
                                <td>{{ number_format($prediction['produksi'], 2) }}</td>
                                <td>{{ number_format($prediction['predictedY'], 2) }}</td>
                                <td>{{ number_format($prediction['APE'], 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Tidak ada data SES tersedia.</p>
    @endif

</body>
</html>
