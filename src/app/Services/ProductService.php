<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;


class ProductService
{
    public function __construct()
    {
        //
    }

    /**
     * 商品の画像URLを生成
     * @return string
    */
    public function createImageUrl(UploadedFile $image): string
    {
        $path = $image->store('images', 'public'); // publicディスクに保存
        return asset('storage/' . $path); // 公開URLを生成
    }

    /**
     * 商品新規作成
     * @param int $userId
     * @param array $validated
     * @param string|null $imageUrl
     * @return void
    */
    public function createProduct(int $userId, array $validated, string|null $imageUrl): void
    {
        try{
            Product::create([
                'user_id'     => $userId,
                'title'       => $validated['title'],
                'description' => $validated['description'],
                'price'       => $validated['price'],
                'image_url'   => $imageUrl ?? null,
            ]);

        }catch (\Exception $e){
            Log::error('商品の新規作成に失敗しました'. $e->getMessage());
            throw new Exception('商品の新規作成に失敗しました'. $e->getMessage());
        }

    }

    /**
     * 商品情報の更新
     * @param Product $product
     * @param array $validated
     * @param string|null $imageUrl
     * @return void
    */
    public function productUpdate(Product $product, array $validated, string|null $imageUrl): void
    {
        try{
            $product->update([
                'title'       => $validated['title'],
                'description' => $validated['description'],
                'price'       => $validated['price'],
                'image_url'   => $imageUrl ?? null,
            ]);
        }catch (\Exception $e){
            Log::error('商品情報の更新に失敗しました'. $e->getMessage());
            throw new Exception('商品情報の更新に失敗しました'. $e->getMessage());
        }
    }

}
