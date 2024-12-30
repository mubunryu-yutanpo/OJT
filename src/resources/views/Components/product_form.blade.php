<form action="{{ $action }}" method="POST" class="{{ $formClass }}" enctype="multipart/form-data">
    @csrf

    {{-- 商品名 --}}
    <div class="p-product-form__container c-form__container">
        <label for="title" class="p-product-form__label c-form__label">
            商品名
            <span class="c-form__required">*</span>
        </label>
        <input type="text" name="title" class="p-product-form__input c-form__input" value="{{ $title }}" required>
    </div>
    @error('title')
        <p class="c-valid-error">{{ $message }}</p>
    @enderror

    {{-- 商品説明 --}}
    <div class="p-product-form__container c-form__container">
        <label for="description" class="p-product-form__label c-form__label">
            商品説明
            <span class="c-form__required">*</span>
        </label>
        <textarea name="description" id="description" class="p-product-form__textarea c-form__textarea" cols="30" rows="10" required>{{ $description }}</textarea>

        {{-- 文字数カウンター --}}
        <div class="p-text-counter">
            <span id="text-length" class="p-text-counter__length">0</span>
            / 1500
        </div>
    </div>
    @error('description')
        <p class="c-valid-error">{{ $message }}</p>
    @enderror

    {{-- 商品価格 --}}
    <div class="p-product-form__container c-form__container">
        <label for="price" class="p-product-form__label c-form__label">
            商品価格
            <span class="c-form__required">*</span>
        </label>
        <input type="number" name="price" class="p-product-form__input c-form__input" value="{{ $price }}" placeholder="￥" required>
    </div>
    @error('price')
        <p class="c-valid-error">{{ $message }}</p>
    @enderror

    {{-- 商品画像 --}}
    <div class="p-product-form__container c-form__container">
        <label for="image" class="p-product-form__label c-form__label">商品画像</label>

        {{-- プレビューエリア --}}
        <div id="preview-area" class="p-image-preview">
            <input type="file" id="image-input" name="image" class="p-product-form__image c-form__input" accept="image/*">
            <button type="button" id="preview-trigger" class="p-image-preview__trigger">ファイルを選択</button>
            <img src="{{ $image }}" id="image-preview" class="p-image-preview__item">
        </div>

        <button type="button" id="image-clear" class="p-image-preview__clear">クリアする</button>
    </div>
    @error('image')
        <p class="c-valid-error">{{ $message }}</p>
    @enderror

    <div class="p-product-form__submit c-form__submit">
        <button type="submit" class="c-form__submit--button">{{ $buttonText }}</button>
    </div>
</form>
