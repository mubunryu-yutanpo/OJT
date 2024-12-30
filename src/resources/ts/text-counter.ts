document.addEventListener("DOMContentLoaded", () => {
    const descriptionInput = document.getElementById("description") as HTMLTextAreaElement | null;
    const textLengthDisplay = document.getElementById("text-length") as HTMLSpanElement | null;
    const maxTextLength = 1500; // 最大文字数

    if (!descriptionInput || !textLengthDisplay) {
        console.error("必要な要素が見つかりません");
        return;
    }

    // 入力イベントリスナー
    descriptionInput.addEventListener("input", () => {
        updateTextCounter();
    });

    // ページロード時に初期状態を設定
    updateTextCounter();

    // 文字数を更新する関数
    function updateTextCounter() {
        const currentLength = descriptionInput.value.length;

        // 現在の文字数を表示
        textLengthDisplay.textContent = currentLength.toString();

        // 1500文字を超えた場合にクラスを追加
        if (currentLength > maxTextLength) {
            textLengthDisplay.classList.add("over");
        } else {
            textLengthDisplay.classList.remove("over");
        }
    }
});
