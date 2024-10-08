// ポップアップを表示する関数
function showPopup() {
  const popup = document.getElementById('popup')
  const overlay = document.getElementById('overlay')

  // オーバーレイとポップアップを表示
  popup.classList.remove('hidden')
  overlay.classList.remove('hidden')
}

// ポップアップを閉じる関数
function closePopup() {
  document.getElementById('popup').classList.add('hidden')
  document.getElementById('overlay').classList.add('hidden')
}