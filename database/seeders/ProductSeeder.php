<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID brand dan category yang sudah ada
        $appleBrand = Brand::where('slug', 'apple')->first();
        $samsungBrand = Brand::where('slug', 'samsung')->first();
        $xiaomiBrand = Brand::where('slug', 'xiaomi')->first();
        $oppoBrand = Brand::where('slug', 'oppo')->first();
        $googleBrand = Brand::where('slug', 'google')->first();

        $smartphoneCategory = Category::where('slug', 'smartphone')->first();
        $laptopCategory = Category::where('slug', 'laptop')->first();
        $headphonesCategory = Category::where('slug', 'headphones')->first();
        $smartwatchCategory = Category::where('slug', 'smartwatch')->first();
        $tabletCategory = Category::where('slug', 'tablet')->first();

        $products = [
            // Apple Products
            [
                'category_id' => $smartphoneCategory?->id ?? 1,
                'brand_id' => $appleBrand?->id ?? 1,
                'name' => 'iPhone 16 Pro Max Black',
                'slug' => 'iphone-16-pro-max-black',
                'image' => json_encode([]),
                'description' => '**iPhone 16 Pro Max Black**

Rasakan inovasi tanpa batas dengan iPhone 16 Pro Max dalam balutan warna Black yang elegan dan futuristik. Didesain dengan material Titanium kelas aerospace, ponsel ini tidak hanya ringan dan kuat, tetapi juga memberikan kesan mewah yang premium.

Ditenagai oleh chip A18 Pro terbaru, iPhone 16 Pro Max menghadirkan performa luar biasa untuk multitasking, gaming, dan kebutuhan profesional lainnya. Dengan layar Super Retina XDR 6.9 inci yang kini lebih terang dan responsif, pengalaman visual Anda akan terasa lebih imersif dan realistis.

**Fitur Unggulan:**
- Layar Super Retina XDR 6.9" dengan ProMotion
- Chip A18 Pro Neural Engine untuk performa maksimal
- Kamera belakang triple-lens 48MP + 12MP ultrawide + 12MP telephoto
- Bodi Titanium Black – ringan, kokoh, dan premium
- Penyimpanan hingga 1TB
- Face ID, USB-C, dan konektivitas 5G
- iOS terbaru dengan fitur AI terintegrasi',
                'price' => 15000000.00,
                'is_active' => true,
                'is_featured' => true,
                'in_stock' => true,
                'on_sale' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => $smartphoneCategory?->id ?? 1,
                'brand_id' => $appleBrand?->id ?? 1,
                'name' => 'iPhone 15 Pro',
                'slug' => 'iphone-15-pro',
                'image' => json_encode([]),
                'description' => 'iPhone 15 Pro dengan chip A17 Pro dan kamera 48MP yang revolusioner. Tersedia dalam berbagai warna elegan dengan build quality premium titanium.',
                'price' => 12000000.00,
                'is_active' => true,
                'is_featured' => true,
                'in_stock' => true,
                'on_sale' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => $laptopCategory?->id ?? 2,
                'brand_id' => $appleBrand?->id ?? 1,
                'name' => 'MacBook Pro 14" M3',
                'slug' => 'macbook-pro-14-m3',
                'image' => json_encode([]),
                'description' => 'MacBook Pro 14 inci dengan chip M3 yang powerful. Perfect untuk professional content creator, developer, dan power user yang membutuhkan performa tinggi.',
                'price' => 28000000.00,
                'is_active' => true,
                'is_featured' => true,
                'in_stock' => true,
                'on_sale' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Samsung Products
            [
                'category_id' => $smartphoneCategory?->id ?? 1,
                'brand_id' => $samsungBrand?->id ?? 2,
                'name' => 'Samsung Galaxy S24 Ultra',
                'slug' => 'samsung-galaxy-s24-ultra',
                'image' => json_encode([]),
                'description' => 'Samsung Galaxy S24 Ultra dengan S Pen built-in, kamera 200MP, dan layar Dynamic AMOLED 2X 6.8". Smartphone flagship Android terbaik untuk produktivitas dan fotografi.',
                'price' => 18000000.00,
                'is_active' => true,
                'is_featured' => true,
                'in_stock' => true,
                'on_sale' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => $tabletCategory?->id ?? 3,
                'brand_id' => $samsungBrand?->id ?? 2,
                'name' => 'Samsung Galaxy Tab S9',
                'slug' => 'samsung-galaxy-tab-s9',
                'image' => json_encode([]),
                'description' => 'Tablet Android premium dengan layar 11 inci, S Pen included, dan performa yang powerful untuk work dan entertainment.',
                'price' => 8500000.00,
                'is_active' => true,
                'is_featured' => false,
                'in_stock' => true,
                'on_sale' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Xiaomi Products
            [
                'category_id' => $smartphoneCategory?->id ?? 1,
                'brand_id' => $xiaomiBrand?->id ?? 3,
                'name' => 'Xiaomi 14 Pro',
                'slug' => 'xiaomi-14-pro',
                'image' => json_encode([]),
                'description' => 'Flagship Xiaomi dengan Snapdragon 8 Gen 3, kamera Leica 50MP, dan fast charging 120W. Kombinasi performa tinggi dengan harga kompetitif.',
                'price' => 9500000.00,
                'is_active' => true,
                'is_featured' => true,
                'in_stock' => true,
                'on_sale' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => $smartphoneCategory?->id ?? 1,
                'brand_id' => $xiaomiBrand?->id ?? 3,
                'name' => 'Redmi Note 13 Pro',
                'slug' => 'redmi-note-13-pro',
                'image' => json_encode([]),
                'description' => 'Smartphone mid-range terbaik dengan kamera 200MP, fast charging 67W, dan performa gaming yang solid. Best value for money.',
                'price' => 4500000.00,
                'is_active' => true,
                'is_featured' => false,
                'in_stock' => true,
                'on_sale' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Oppo Products
            [
                'category_id' => $smartphoneCategory?->id ?? 1,
                'brand_id' => $oppoBrand?->id ?? 4,
                'name' => 'Oppo Find X7 Pro',
                'slug' => 'oppo-find-x7-pro',
                'image' => json_encode([]),
                'description' => 'Flagship Oppo dengan fokus pada fotografi portrait dan selfie. Dilengkapi dengan Hasselblad camera system dan design premium.',
                'price' => 11000000.00,
                'is_active' => true,
                'is_featured' => false,
                'in_stock' => true,
                'on_sale' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Google Products
            [
                'category_id' => $smartphoneCategory?->id ?? 1,
                'brand_id' => $googleBrand?->id ?? 7,
                'name' => 'Google Pixel 8 Pro',
                'slug' => 'google-pixel-8-pro',
                'image' => json_encode([]),
                'description' => 'Pure Android experience dengan AI photography terdepan. Magic Eraser, Best Take, dan Audio Magic Eraser untuk editing foto dan video yang sempurna.',
                'price' => 13000000.00,
                'is_active' => true,
                'is_featured' => true,
                'in_stock' => true,
                'on_sale' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Apple Accessories
            [
                'category_id' => $headphonesCategory?->id ?? 4,
                'brand_id' => $appleBrand?->id ?? 1,
                'name' => 'AirPods Pro 2nd Gen',
                'slug' => 'airpods-pro-2nd-gen',
                'image' => json_encode([]),
                'description' => 'Wireless earbuds premium dengan Active Noise Cancellation yang powerful, Spatial Audio, dan battery life hingga 30 jam dengan charging case.',
                'price' => 3500000.00,
                'is_active' => true,
                'is_featured' => false,
                'in_stock' => true,
                'on_sale' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => $smartwatchCategory?->id ?? 5,
                'brand_id' => $appleBrand?->id ?? 1,
                'name' => 'Apple Watch Series 9',
                'slug' => 'apple-watch-series-9',
                'image' => json_encode([]),
                'description' => 'Smartwatch terdepan dengan health monitoring lengkap, ECG, Blood Oxygen, dan integrasi sempurna dengan ecosystem Apple.',
                'price' => 5500000.00,
                'is_active' => true,
                'is_featured' => false,
                'in_stock' => true,
                'on_sale' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($products as $productData) {
            Product::updateOrCreate(
                ['slug' => $productData['slug']], // Cari berdasarkan slug
                $productData
            );
        }
    }
}
