<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * 商品一覧画面を表示
     * @return View
    */
    public function index(): View
    {
        dd('一覧');
        //return view('products.index');
    }

    /**
     * 商品新規登録画面を表示
     * @return View
    */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * 商品新規作成
     * @param CreateOrUpdateProductRequest $request
     * @return RedirectResponse
    */
    public function store(CreateOrUpdateProductRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // 画像がある場合
        if($request->hasFile('image')) {
            $imageUrl = $this->productService->createImageUrl($request->file('image'));
        }

        $userId = Auth::id();

        $this->productService->createProduct($userId, $validated, $imageUrl ?? null);

        return redirect()->route('my_page')->with('success', '商品を登録しました');
    }

    /**
     * 商品編集画面を表示
     * @param int $id
     * @return View|RedirectResponse
    */
    public function edit(int $id): View|RedirectResponse
    {
        $userId = Auth::id();
        $product = Product::where('id', $id)->where('user_id', $userId)->first();

        if($product === null || $userId !== $product->user_id) {
            return redirect()->route('my_page')->with('error', '商品が見つかりません');
        }

        return view('products.edit', compact('product'));
    }

    /**
     * 商品編集
     * @todo 商品編集用のバリデーション作成・適用
     * @param CreateOrUpdateProductRequest $request
     * @param int $id
     * @return RedirectResponse
    */
    public function update(CreateOrUpdateProductRequest $request, int $id): RedirectResponse
    {
        $validated = $request->validated();

        // 画像がある場合
        if($request->hasFile('image')) {
            $imageUrl = $this->productService->createImageUrl($request->file('image'));
        }

        $product = Product::findOrFail($id);

        $this->productService->productUpdate($product, $validated, $imageUrl ?? null);

        return redirect()->route('my_page')->with('success', '商品を更新しました');
    }

    /**
     * 商品削除
     * @param int $id
     * @return RedirectResponse
    */
    public function destroy(int $id): RedirectResponse
    {
        dd('destroy');
        //return redirect()->back()->with('success', '商品を削除しました');
    }
}
