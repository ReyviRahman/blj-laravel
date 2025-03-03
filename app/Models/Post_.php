<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post_ 
{
  private static $blog_posts = [
    [
      "title" => "Judul Post Pertama",
      "slug" => "judul-post-pertama",
      "author" => "Nupet",
      "body" => "Ini adalah isi dari post pertama. Dalam artikel ini, kita akan membahas bagaimana cara memulai belajar pemrograman dengan langkah-langkah yang sederhana namun efektif. Dengan memahami dasar-dasar seperti variabel, tipe data, dan struktur kontrol, kita bisa membangun aplikasi yang lebih kompleks di masa depan.",
    ],
    [
      "title" => "Judul Post Kedua",
      "slug" => "judul-post-kedua",
      "author" => "Reyvi",
      "body" => "Isi dari post kedua yang membahas tentang Laravel Blade. Laravel Blade adalah templating engine yang powerful dan memudahkan kita dalam membuat tampilan dinamis. Dengan fitur seperti template inheritance dan komponen, kita dapat mengelola tampilan secara lebih rapi dan modular. Artikel ini akan menjelaskan bagaimana cara menggunakannya dengan contoh kode yang jelas.",
    ],
    [
      "title" => "Judul Post Ketiga",
      "slug" => "judul-post-ketiga",
      "author" => "Dimas",
      "body" => "Post ketiga membahas tentang penggunaan API di Laravel. API (Application Programming Interface) memungkinkan aplikasi kita untuk berkomunikasi dengan layanan lain. Di Laravel, kita dapat menggunakan fitur seperti Laravel Sanctum atau Passport untuk mengamankan API. Selain itu, kita juga bisa menggunakan paket seperti Guzzle untuk melakukan request ke API lain.",
    ],
    [
      "title" => "Judul Post Keempat",
      "slug" => "judul-post-keempat",
      "author" => "Siti",
      "body" => "Artikel ini membahas dasar-dasar PHP untuk pemula. PHP adalah bahasa pemrograman yang digunakan untuk membangun aplikasi web dinamis. Kita akan mempelajari sintaks dasar, seperti variabel, array, fungsi, dan bagaimana menggunakan PHP untuk berinteraksi dengan database menggunakan MySQL.",
    ],
    [
      "title" => "Judul Post Kelima",
      "slug" => "judul-post-kelima",
      "author" => "Budi",
      "body" => "Membahas cara membuat aplikasi mobile dengan React Native. React Native memungkinkan kita untuk membangun aplikasi mobile dengan JavaScript. Dalam artikel ini, kita akan membahas bagaimana mengatur proyek, menggunakan komponen, serta menghubungkan aplikasi dengan backend menggunakan API.",
    ],
    [
      "title" => "Judul Post Keenam",
      "slug" => "judul-post-keenam",
      "author" => "Aisyah",
      "body" => "Tips dan trik dalam menggunakan database MySQL dengan Laravel. Salah satu kekuatan Laravel adalah kemampuannya dalam mengelola database dengan fitur seperti Eloquent ORM dan Query Builder. Artikel ini akan membahas bagaimana cara membuat tabel, mengelola data, serta melakukan query yang efisien menggunakan Laravel.",
    ],
  ];

  public static function all() {
    return collect(self::$blog_posts);
  }

  public static function find($slug) {
    $posts = static::all();
    return $posts -> firstWhere('slug', $slug);
  }
}
