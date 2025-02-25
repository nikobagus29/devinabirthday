<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $images = [
            [
                'id' => 1,
                'src' => 'images/9.jpg',
                'message' => '28-11-23 - Awal awal nih'
            ],
            [
                'id' => 2,
                'src' => 'images/6.jpg',
                'message' => '11-03-24 - Ini sih story wa hehe'
            ],
            [
                'id' => 3,
                'src' => 'images/1.PNG',
                'message' => '29-06-24 - Masa masa pkl check'
            ],
            [
                'id' => 4,
                'src' => 'images/12.jpg',
                'message' => '05-07-24 - Masa Akhir PKL'
            ],
            [
                'id' => 5,
                'src' => 'images/10.jpg',
                'message' => '27-08-24 - Devina in Karnaval Skaneda'
            ],
            [
                'id' => 6,
                'src' => 'images/16.jpg',
                'message' => '23-10-24 - Hari santri terakhir di masa SMK'
            ],
            [
                'id' => 7,
                'src' => 'images/26.jpg',
                'message' => '07-11-24 - ini ada apa ya? lupa'
            ],
            [
                'id' => 8,
                'src' => 'images/a5.jpg',
                'message' => '19-12-24 - Devina X Xterious'
            ],
            [
                'id' => 9,
                'src' => 'images/a4.jpg',
                'message' => '13-01-25 - Udah foto ijazah aja nih'
            ],
            [
                'id' => 10,
                'src' => 'images/a3.jpg',
                'message' => '23-01-25 - Ini terlalu lucu untuk dilewatkan'
            ],
            [
                'id' => 11,
                'src' => 'images/a1.jpg',
                'message' => '18-02-25 - Hari pertama UKK nih'
            ],
            [
                'id' => 12,
                'src' => 'images/a6.jpg',
                'message' => '20-02-25 - Hari terakhir UKK dan Selesaiii'
            ],
            // ... tambahkan gambar lainnya
        ];

        return view('galery', compact('images'));
    }
}
