<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Schema;
use Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        /* khi có rằng buộc khóa ngoại thì hàm truncate() sẽ ko thể thực hiện đc,
        hàm disableForeignKeyConstraints() sẽ tắt tạm thời rằng buộc khóa ngoại lại
        để thực hiện truncate */

        ProductVariant::query()->truncate(); // xóa toàn bộ dữ liệu bảng
        ProductGallery::query()->truncate();
        DB::table('product_tag')->truncate();
        Product::query()->truncate();
        ProductSize::query()->truncate();
        ProductColor::query()->truncate();
        Tag::query()->truncate();

        Tag::factory(15)->create();

        // S M L XL XXL
        foreach (['S', 'M', 'L', 'XL', 'XXL'] as $item) {
            ProductSize::query()->create([
                'name' => $item
            ]);
        }

        // S M L XL XXL
        foreach (['blue', 'pink', 'black', 'red', 'green', 'darkgray', 'blueviolet', 'lightskyblue'] as $item) {
            ProductColor::query()->create([
                'name' => $item
            ]);
        }

        for ($i = 0; $i < 1000; $i++) {
            $name = fake()->name(100);
            Product::query()->create([
                'catalogue_id' => rand(1, 5),
                'name' => $name,
                'slug' => Str::slug($name) . '-' . Str::random(8),
                'sku' => Str::random(8) . $i,
                'img_thumbnail' => 'https://canifa.com/img/1517/2000/resize/8/t/8ts24s009-sw001-1.webp',
                'price_regular' => rand(499000, 699000),
                'price_sale' => rand(199000, 499000),
            ]);
        }

        for ($i = 1; $i < 1001; $i++) {
            ProductGallery::query()->insert([
                [
                    'product_id' => $i,
                    'image' => 'https://canifa.com/img/1517/2000/resize/8/t/8ts24s009-sw001-1.webp'
                ],
                [
                    'product_id' => $i,
                    'image' => 'https://canifa.com/img/1517/2000/resize/8/t/8ts24s009-sw001-xl-2.webp'
                ],
                [
                    'product_id' => $i,
                    'image' => 'https://canifa.com/img/1517/2000/resize/8/t/8ts24s009-sw001-xl-2.webp'
                ],
            ]);
        }

        for ($i = 1; $i < 1001; $i++) {
            DB::table('product_tag')->insert([
                [
                    'product_id' => $i,
                    'tag_id' => rand(1, 8)
                ],
                [
                    'product_id' => $i,
                    'tag_id' => rand(9, 15)
                ]
            ]);
        }

        for ($productID = 1; $productID < 1001; $productID++) {
            $data = [];
            for ($sizeID = 1; $sizeID < 6; $sizeID++) {
                for ($colorID = 1; $colorID < 6; $colorID++) {
                    $data[] = [
                        'product_id' => $productID,
                        'product_size_id' => $sizeID,
                        'product_color_id' => $colorID,
                        'quantity' => rand(11, 180),
                        'image' => 'https://canifa.com/img/1517/2000/resize/8/t/8ts24s009-sw001-xl-2.webp',
                    ];
                }
            }

            DB::table('product_variants')->insert($data);
        }

    }
}
