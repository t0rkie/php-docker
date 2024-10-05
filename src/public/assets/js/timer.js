let timerInterval = null // タイマーID
let startTime = localStorage.getItem('startTime')
let elapsedSeconds = 0
let isPaused = localStorage.getItem('isPaused') === 'true'

// ページ読み込み時にカウントを再開する
if (startTime && !isPaused) {
  elapsedSeconds = Math.floor((Date.now() - startTime) / 1000)
  startCountUp(elapsedSeconds)  // 経過秒数を基にタイマーを再開
} else if (startTime && isPaused) {
  elapsedSeconds = Math.floor((Date.now() - startTime) / 1000)
  updateTimer(elapsedSeconds)
}

function updateTimer(seconds) {
  let hours = Math.floor(seconds / 3600)
  let minutes = Math.floor((seconds % 3600) / 60)
  let secs = seconds % 60

  // 2桁の表示にするためにゼロ埋め
  hours = String(hours).padStart(2, '0')
  minutes = String(minutes).padStart(2, '0')
  secs = String(secs).padStart(2, '0')

  document.getElementById('timer').textContent = `${hours}:${minutes}:${secs}`
}

// カウントアップを開始する関数
function startCountUp(initialSeconds) {
  let seconds = initialSeconds
  // 1秒ごとにタイマーを更新
  timerInterval = setInterval(() => {
    updateTimer(seconds)
    seconds++
    elapsedSeconds = seconds
  }, 1000)
}

// タイマーをスタートする関数
function startTimer() {
  if (!timerInterval) {
    if (!startTime) {
      // 初回すたーと
      startTime = Date.now()
      localStorage.setItem('startTime', startTime)
      // 0秒からカウントアップを開始
      startCountUp(0);
    } else {
      startCountUp(elapsedSeconds)
    }
    localStorage.setItem('isPaused', 'false')
  }
}

function endTimer() {

}

function stopTimer() {
  if (timerInterval) {
    clearInterval(timerInterval)
    timerInterval = null
    localStorage.setItem('isPaused', 'true')
  }
  
}

function resetTimer() {
  stopTimer()
  localStorage.removeItem('startTime')
  localStorage.setItem('isPaused', 'false')
  startTime = null
  elapsedSeconds = 0
  document.getElementById('timer').textContent = '00:00:00'
}