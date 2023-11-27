<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Hasil Analisis</title>
</head>

<body style="padding-top: 3rem; background-color: #fff;">
    <div
        style="margin-left: auto; margin-right: auto; padding-left: 1.5rem; padding-right: 1.5rem; lg:padding-left: 2rem; lg:padding-right: 2rem;">
        <div style="margin-bottom: 0.5rem; display: flex; flex-direction: row;">
            <h1 style="font-size: 1.5rem; font-weight: 600;">Hasil Tes Kepribadian</h1>
        </div>
        <hr style="width: 100%;">
        <div
            style="width: 100%; overflow: hidden; border-radius: 0.375rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); margin-top: 1rem; display: flex; flex-direction: row;">
            <div style="width: 50%;">
                <table style="width: 100%;">
                    <tr>
                        <td style="padding-top: 0.25rem; width: 40%;">Nama</td>
                        <td style="padding-top: 0.25rem; width: 2%;"> : </td>
                        <td style="padding-top: 0.25rem; width: 50%;"> {{ $user->name }} </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 0.25rem; width: 40%;">Tanggal lahir</td>
                        <td style="padding-top: 0.25rem; width: 2%;"> : </td>
                        <td style="padding-top: 0.25rem; width: 50%;"> {{ avoidNullError($user->profile, 'birth_date') }} </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 0.25rem; width: 40%;">Pendidikan</td>
                        <td style="padding-top: 0.25rem; width: 2%;"> : </td>
                        <td style="padding-top: 0.25rem; width: 50%;"> S1 </td>
                    </tr>
                </table>
            </div>
            <div style="width: 50%;">
                <table style="width: 100%;">
                    <tr>
                        <td style="padding-top: 0.25rem; width: 40%;">Tanggal Tes</td>
                        <td style="padding-top: 0.25rem; width: 2%;"> : </td>
                        <td style="padding-top: 0.25rem; width: 50%;"> {{ $answered_at }} </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 0.25rem; width: 40%;">Email</td>
                        <td style="padding-top: 0.25rem; width: 2%;"> : </td>
                        <td style="padding-top: 0.25rem; width: 50%;"> {{ $user->email }} </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 0.25rem; width: 40%;">Prodi</td>
                        <td style="padding-top: 0.25rem; width: 2%;"> : </td>
                        <td style="padding-top: 0.25rem; width: 50%;"> {{ avoidNullError($user->profile, 'major') }} </td>
                    </tr>
                </table>
            </div>
        </div>
        <h1 style="font-size: 1.125rem; margin-bottom: 0.5rem; font-weight: 600; margin-top: 1.5rem;">Hasil Tes
            Kepribadian</h1>
        <div style="margin-top: 1rem;">
            <table style="width: 100%; white-space: wrap;">
                <thead>
                    <tr
                        style="font-size: 0.75rem; font-weight: 600; letter-spacing: 0.05em; text-align: left; color: #718096; border-bottom: 1px solid #e2e8f0; background-color: #f8fafc;">
                        <th style="padding: 0.75rem; width: 12%;">Dimensi</th>
                        <th style="padding: 0.75rem; width: 39%;">Gambaran perilaku persentil 'Rendah'</th>
                        <th style="padding: 0.75rem; width: 2%;">SR*</th>
                        <th style="padding: 0.75rem; width: 2%;">R*</th>
                        <th style="padding: 0.75rem; width: 2%;">S*</th>
                        <th style="padding: 0.75rem; width: 2%;">T*</th>
                        <th style="padding: 0.75rem; width: 2%;">ST*</th>
                        <th style="padding: 0.75rem; width: 39%;">Gambaran perilaku persentil "Tinggi"</th>
                    </tr>
                </thead>
                <tbody style="background-color: #fff; border-bottom: 1px solid #e2e8f0; dark:border-gray-700;">
                    @foreach ($results as $dimension => $result)
                        <tr style="color: #4a5568; dark:text-gray-400;">
                            <td style="padding: 0.75rem; font-weight: 600;">{{ $dimension }}</td>
                            <td style="padding: 0.75rem;">{{ $result['low_percentile_description'] }}</td>
                            <td
                                style="padding: 0.75rem; font-weight: 600; background-color: #ebf5ff; text-align: center;">
                                {{ $result['total'] == 1 ? 'X' : '' }}</td>
                            <td style="padding: 0.75rem; font-weight: 600; text-align: center;">
                                {{ $result['total'] == 2 ? 'X' : '' }}</td>
                            <td
                                style="padding: 0.75rem; font-weight: 600; background-color: #ebf5ff; text-align: center;">
                                {{ $result['total'] == 3 ? 'X' : '' }}</td>
                            <td style="padding: 0.75rem; font-weight: 600; text-align: center;">
                                {{ $result['total'] == 4 ? 'X' : '' }}</td>
                            <td
                                style="padding: 0.75rem; font-weight: 600; background-color: #ebf5ff; text-align: center;">
                                {{ $result['total'] == 5 ? 'X' : '' }}
                            </td>
                            <td style="padding: 0.75rem;">
                                {{ $result['high_percentile_description'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
