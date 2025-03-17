<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Nupet',
            'username' => 'NupetUserName',
            'email' => 'nupet@gmail.com',
            'password' => '123456',
            'email_verified_at' => Carbon::now()
        ]);

        User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create([
            'name' => 'Slice Of Life',
            'slug' => 'slice-of-life'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Belajar Laravel Dasar',
        //     'slug' => Str::slug('Belajar Laravel Dasar'),
        //     'excerpt' => 'Panduan dasar untuk belajar Laravel bagi pemula.',
        //     'body' => 'Laravel adalah salah satu framework PHP yang sangat populer untuk membangun aplikasi web modern. Dengan fitur seperti Eloquent ORM, Blade Templating, dan Artisan CLI, Laravel mempermudah pengembangan aplikasi berbasis web. 
        //                Dalam artikel ini, kita akan membahas bagaimana cara memulai dengan Laravel, termasuk instalasi, konfigurasi awal, serta membuat fitur sederhana menggunakan MVC (Model-View-Controller).',
        //     'category_id' => 1, // Web Programming
        //     'user_id' => 1,
        // ]);
        
        // Post::create([
        //     'title' => 'Mengenal Vue.js untuk Frontend',
        //     'slug' => Str::slug('Mengenal Vue.js untuk Frontend'),
        //     'excerpt' => 'Pengenalan dasar tentang Vue.js dan manfaatnya untuk pengembangan frontend.',
        //     'body' => 'Vue.js adalah framework JavaScript progresif yang digunakan untuk membangun antarmuka pengguna yang interaktif. 
        //                Vue sangat ringan, mudah dipelajari, dan memiliki konsep reaktif yang memungkinkan pengembang membuat aplikasi yang lebih dinamis. 
        //                Dalam artikel ini, kita akan membahas dasar-dasar Vue.js, seperti bagaimana mengatur Vue instance, bekerja dengan directives, computed properties, dan bagaimana menghubungkannya dengan backend API.',
        //     'category_id' => 1, // Web Programming
        //     'user_id' => 7,
        // ]);
        
        // Post::create([
        //     'title' => 'Pengalaman Pertama di Dunia Freelance',
        //     'slug' => Str::slug('Pengalaman Pertama di Dunia Freelance'),
        //     'excerpt' => 'Cerita nyata tentang pengalaman pertama kali menjadi freelancer.',
        //     'body' => 'Menjadi freelancer adalah tantangan yang cukup besar, terutama bagi seseorang yang baru pertama kali terjun ke dunia kerja tanpa supervisor langsung. 
        //                Saya memulai perjalanan sebagai freelancer di bidang web development, dan menghadapi berbagai kendala seperti mencari klien, mengatur jadwal kerja sendiri, hingga memastikan proyek selesai tepat waktu. 
        //                Dalam artikel ini, saya akan berbagi tips dan pengalaman berharga yang bisa membantu kamu jika ingin mencoba dunia freelance.',
        //     'category_id' => 2, // Personal
        //     'user_id' => 5,
        // ]);
        
        // Post::create([
        //     'title' => 'Tips Meningkatkan Produktivitas Kerja',
        //     'slug' => Str::slug('Tips Meningkatkan Produktivitas Kerja'),
        //     'excerpt' => 'Beberapa cara efektif untuk meningkatkan produktivitas saat bekerja.',
        //     'body' => 'Produktivitas dalam bekerja sangat penting agar kita bisa menyelesaikan tugas dengan efektif dan efisien. 
        //                Beberapa cara yang bisa dilakukan untuk meningkatkan produktivitas antara lain: mengatur to-do list setiap hari, fokus pada satu tugas dalam satu waktu (single-tasking), dan menghindari gangguan seperti media sosial saat bekerja. 
        //                Dalam artikel ini, saya juga akan membahas bagaimana teknik Pomodoro dan metode "Deep Work" bisa membantu kamu bekerja lebih produktif.',
        //     'category_id' => 2, // Personal
        //     'user_id' => 9,
        // ]);
        
        // Post::create([
        //     'title' => 'Membuat REST API dengan Node.js dan Express',
        //     'slug' => Str::slug('Membuat REST API dengan Node.js dan Express'),
        //     'excerpt' => 'Tutorial lengkap tentang cara membangun REST API menggunakan Node.js dan Express.',
        //     'body' => 'REST API (Representational State Transfer Application Programming Interface) adalah standar komunikasi antar sistem yang banyak digunakan dalam pengembangan aplikasi modern. 
        //                Dalam tutorial ini, kita akan belajar bagaimana cara membuat REST API menggunakan Node.js dengan framework Express. 
        //                Kita akan mulai dengan mengatur environment menggunakan npm, membuat endpoint API untuk operasi CRUD (Create, Read, Update, Delete), serta mengintegrasikan middleware seperti body-parser dan cors.',
        //     'category_id' => 1, // Web Programming
        //     'user_id' => 2,
        // ]);
    }
}
