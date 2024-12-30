import {preview} from "vite";

document.addEventListener("DOMContentLoaded", () => {
    const previewArea = document.getElementById("preview-area") as HTMLDivElement | null;
    const previewTrigger = document.getElementById("preview-trigger") as HTMLButtonElement | null;
    const imageInput = document.getElementById("image-input") as HTMLInputElement | null;
    const imagePreview = document.getElementById("image-preview") as HTMLImageElement | null;
    const clearButton = document.getElementById("image-clear") as HTMLButtonElement | null;

    // 必要な要素が存在しない場合は処理を終了
    if (!previewTrigger || !imageInput || !imagePreview || !clearButton) {
        console.error("要素が存在しない");
        return;
    }

    // ページロード時に既存の画像がある場合はプレビューを表示
    if (imagePreview.src) {
        imagePreview.style.display = "block";
        imageInput.style.display = "none"
        previewArea.style.border = "none"; // プレビューエリアの枠線を消す
        previewTrigger.style.display = "none" // ファイル入力を非表示
        clearButton.style.display = "block"; // クリアボタンを表示
    }

    // カスタムボタンクリックでファイル選択を発火
    previewTrigger.addEventListener("click", (event: MouseEvent) => {
        event.preventDefault();
        imageInput.click();
    });

    // ファイル選択時にプレビューを表示し、クリアボタンを表示
    imageInput.addEventListener("change", (event: Event) => {
        const target = event.target as HTMLInputElement;
        const file = target.files?.[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = (e: ProgressEvent<FileReader>) => {
                if (e.target?.result && typeof e.target.result === "string") {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = "block";
                    previewArea.style.border = "none"; // プレビューエリアの枠線を消す
                    previewTrigger.style.display = "none" // ファイル入力を非表示
                    clearButton.style.display = "block"; // クリアボタンを表示
                }
            };

            reader.readAsDataURL(file);
        }
    });

    // クリアボタンの動作
    clearButton.addEventListener("click", (event: MouseEvent) => {
        event.preventDefault();

        // プレビュー画像を非表示に
        imagePreview.src = "#";
        imagePreview.style.display = "none";

        // ファイル入力をリセット
        imageInput.value = "";

        // クリアボタンを非表示に
        clearButton.style.display = "none";

        // エリアとカスタムボタンを表示
        previewArea.style.border = "1px dotted #CACACA";
        previewTrigger.style.display = "block";
    });
});
