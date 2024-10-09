// ポップアップを表示する関数
function showPopup() {
  const popup = document.getElementById('popup')
  const overlay = document.getElementById('overlay')

  // オーバーレイとポップアップを表示
  popup.classList.remove('hidden')
  overlay.classList.remove('hidden')

  setTimeout(() => {
    popup.classList.add('show');
    overlay.classList.add('show');
  }, 10); // 10msの遅延を加える
}

// ポップアップを閉じる関数
function closePopup() {
  const popup = document.getElementById('popup')
  const overlay = document.getElementById('overlay')

  // アニメーションを削除して非表示に
  popup.classList.remove('show')
  overlay.classList.remove('show')

  // アニメーションの終了を待ってから非表示にする
  setTimeout(() => {
    popup.classList.add('hidden')
    overlay.classList.add('hidden')
  }, 300) // transitionの時間と合わせる
}