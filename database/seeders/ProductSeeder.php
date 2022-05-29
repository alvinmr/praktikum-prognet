<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'product_name' => 'MIYAKO KIPAS ANGIN KAD06',
                'price' => '118000',
                'description' => 'Merupakan desk fan atau kipas meja yang memiliki ukuran 6 Inch, sehingga tidak memakan banyak tempat dan mudah diletakan dimana saja. Kipas angin ini di lengkapi dengan thermofuse safety yang melindungin kipas dari overheat. Kipas ini juga sangat hemat listrik karena hanya membutuhkan saya 15 watt saja. Selain itu kipas angin ini juga memiliki 2 pilihan kecepatan yang dapat disesuaikan',
                'product_rate' =>'0',
                'stock' => '50',
                'weight' => '5',
            ],
            [
                'product_name' => 'COSMOS KIPAS ANGIN 16XDC',
                'price' => '208000',
                'description' => 'Kipas Angin Berdiri / Stand Fan dengan bilah kipas berukuran 16 inch. Memiliki 3 level kecepatan dan tombol berhenti yang dapat digunakan sesuai dengan kebutuhan. Desain elegan dengan tombol model berputar (Rotary Model Switch). Blade dirancang untuk menghasilkan angin sejuk yang lebih melebar dan merata ke seluruh ruangan.',
                'product_rate' =>'0',
                'stock' => '30',
                'weight' => '10',
            ],
            [
                'product_name' => 'SHARP VACUM CLEANER SHARP EC8305P',
                'price' => '858000',
                'description' => 'Nikmati kenyamanan vacuum cleaner praktis persembahan Sharp, Sharp EC-8305-B Vacuum Cleaner - Biru. Sharp EC-8305-B dirancang untuk menghisap kotoran di lantai dengan lebih kuat dan lebih cepat. Desain vacuum yang fashionable dan elegan dengan karet roda lembut membuat lantai rumah tidak mudah kotor. Bekerja dengan daya mulai dari 400W, alat ini pun siap lebih hemat listrik di rumah Anda selama digunakan.',
                'product_rate' =>'0',
                'stock' => '40',
                'weight' => '15',
            ],
            [
                'product_name' => 'Denpoo HRV8003 – Vacuum Hand 400 Watt',
                'price' => '388000',
                'description' => 'Denpoo HRV-8003 – Vacuum Hand 400 Watt memiliki desain minimalis dengan gagang yang nyaman digenggam. Dapat Anda bawa kemana saja sehingga mampu membersihkan ruangan Anda dengan lebih leluasa. Wadah tampung debu mudah dibersihkan sehingga Anda dapat dengan cepat membersihkan wadah dan menggunakannya kembali.',
                'product_rate' =>'0',
                'stock' => '15',
                'weight' => '5',
            ],
            [
                'product_name' => 'Maspion MWP125KMA Pompa Air Non Auto 125 Watt',
                'price' => '488000',
                'description' => 'Maspion MWP-125-KMA - Pompa Air Non Auto 125 Watt dengan daya 125 watt mampu menghasilkan air yang banyak untuk kebutuhan Anda dan keluarga tercinta di rumah sehingga membuat Anda dan keluarga menjadi lebih mudah untuk mendapatkan air dalam jumlah yang banyak.Menghadirkan keistimewaan pompa air sumur dangkal atau shallow pump',
                'product_rate' =>'0',
                'stock' => '60',
                'weight' => '7',
            ],
            [
                'product_name' => 'MASPION Dispenser Meja Hot Normal MD15PAS',
                'price' => '488000',
                'description' => 'Dispenser meja
                Jumlah Kran: 2 Kran (Heater & Cooling)
                Bahan Material Luar: Plastik
                Bahan Material Tangki: Stainless Steel
                Daya : 320 Watt Panas - Dingin 60 Watt
                Unit Utama',
                'product_rate' =>'0',
                'stock' => '25',
                'weight' => '3',
            ],
            [
                'product_name' => 'WATER HEATER MODENA GI6NV',
                'price' => '1468000',
                'description' => 'Water heater gas Modena GI 6V sangat praktis, dan juga sangat aman di gunakan karna sudah di lengkapi :

                1. Full Otomatis Water Heater ( begitu anda buka kran langsung air hangat tersedia untuk anda)
                2. Flame Failur Savety ( pengaman gas akan menutup aliran gas secara otomatis apabila terjadi kesalahan pembakaran pada tungku )
                3. Timer 20mnt Cut Off ( alat akan mati secara otomatis setelah 20mnt penggunaan untuk mencegah terjadi nya kerusakan pada alat akibat offerheat)
                4. Water Filer ( terdapat saringan air agar air yg masuk ke alat tetap bersih agar alat tetap awet)
                5. Instalasi mudah & cepat ( tanpa bobok tembok )
                Garansi 1Th
                6. Natural Gas : Untuk Gas Alam',
                'product_rate' =>'0',
                'stock' => '70',
                'weight' => '4',
            ],
            [
                'product_name' => 'Maspion MD19PAS – Dispenser Meja Hot Cool Normal',
                'price' => '460000',
                'description' => 'Maspion MD19PAS – Dispenser Meja Hot Cool Normal adalah dispenser air minum panas dan dingin. Menghasilkan air minum fresh dan sehat karena menggunakan tangki stainless steel. Sangat cocok untuk Anda dan keluarga.

                Konsumsi air minum sehat dan fresh semakin praktis dengan Maspion MD19PAS – Dispenser Meja Hot Cool Normal. Adalah dispenser yang bekerja sebagai pemanas dan pendingin air. Satu kran untuk air dingin dan satunya lagi untuk air panas. Menjadikan pilihan air minum yang lebih bervariasi tanpa ribet.',
                'product_rate' =>'0',
                'stock' => '100',
                'weight' => '6',
            ],
            [
                'product_name' => 'CHANGHONG CSC12NVB3 AC SPLIT 1,5 PK STANDART',
                'price' => '4158000',
                'description' => 'Changhong menghadirkan produk AC ekslusif pada AC Split Deluxe Double Gold untuk lebih menyejukkan rumah Anda. AC tipe deluxe ini menjamin mendinginkan ruangan dengan cepat berkat teknologi Turbo Jet Cool yang dimiliki. Dengan lapisan Double Gold Fin pada kondensor, sparepart AC ini akan terjaga tahan lama dari bebas karat dan tidak mudah bocor.

                AC ini bekerja dengan cara menghembuskan angin dingin selama 3 menit untuk membuat titik ruangan sejauh 2.5 meter menjadi dingin.',
                'product_rate' =>'0',
                'stock' => '10',
                'weight' => '10',
            ],
            [
                'product_name' => 'AC STANDARD AQA-KCR5ANR TURBO COOL R32 SERIES, FAST & POWERFUL COOLING',
                'price' => '2998000',
                'description' => 'Dengan fitur Turbo Cool, Mampu mencapai suhu yang diinginkan lebih cepat hanya butuh waktu 5 menit.

                Big Blade, Unit indoor ditingkatkan kinerjanya dengan motor yang dioptimalkan, kipas yang lebih panjang dan besar. Mampu mendinginkan ruangan secara cepat dan menghembuskan udara yang kuat dengan jarak maksimal.
                Powerful cooling, Kinerja pendinginan lebih baik meningkat 10% dengan pengaturan kecepatan kipas turbo dalam kondisi kerja yang stabil di ruangan (dibandingkan dengan model sebelumnya).
                High EER, sertifikasi energi bintang 4 terbukti hemat energi.',
                'product_rate' =>'0',
                'stock' => '80',
                'weight' => '12',
            ],
        ]);
    }
}