<?php

return [
  'guest' => [
    'result' => [
      'title' => 'Riwayat Pengisian',
      'table' => [
        'columns' => [
          'created' => 'Tanggal Pengisian',
          'status' => 'Status',
          'result' => 'Hasil'
        ],
        'body' => [
          'result' => 'Hasil',
          'statuses' => [
            'done' => 'Selesai',
          ],
          'cta' => [
            'show' => 'Lihat Hasil'
          ]
        ]
      ]
    ]
  ],
  'all' => [
    'pdf' => [
      'title' => 'Hasil Tes Kepribadian',
      'name' => 'Nama',
      'birth' => 'Tanggal Lahir',
      'edu' => 'Pendidikan',
      'test_date' => 'Tanggal Tes',
      'email' => 'Email',
      'major' => 'Prodi',
      'columns' => [
        'dimension' => 'Dimensi',
        'percentile' => [
          'low' => 'Gambaran perilaku persentil rendah',
          'high' => 'Gambaran perilaku persentil tinggi',
        ]
      ]
    ]
  ]
];
