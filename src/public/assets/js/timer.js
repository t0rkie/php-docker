const STORED_ITEM = {
  studyStatus: 'studyStatus',
  startTime: 'startTime'
}
const STUDY_STATUS = {
  none: '0',
  studing: '1',
  paused: '2',
}

let timerInterval = null // タイマーID
let startTime = localStorage.getItem(STORED_ITEM.startTime)
let elapsedSeconds = 0
let isPaused = localStorage.getItem(STORED_ITEM.studyStatus) === STUDY_STATUS.paused

// study-status更新
const currentStatus = localStorage.getItem(STORED_ITEM.studyStatus)
if (currentStatus == STUDY_STATUS.studing) {
  changeStudyStatusText('NOW STUDYING')
} else if (currentStatus == STUDY_STATUS.paused) {
  changeStudyStatusText('PAUSE')
} else {
  changeStudyStatusText()
}

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
      // 初回スタート
      showPopup()
      startTime = Date.now()
      localStorage.setItem(STORED_ITEM.startTime, startTime)
      // 0秒からカウントアップを開始
      startCountUp(0)
    } else {
      startCountUp(elapsedSeconds)
    }
    localStorage.setItem(STORED_ITEM.studyStatus, STUDY_STATUS.studing)
    changeStudyStatusText('NOW STUDYING')
  }
}

function endTimer() {

}

function stopTimer() {
  if (timerInterval) {
    clearInterval(timerInterval)
    timerInterval = null
    localStorage.setItem(STORED_ITEM.studyStatus, STUDY_STATUS.paused)
    changeStudyStatusText('PAUSE')
  }
  
}

function resetTimer() {
  stopTimer()
  localStorage.removeItem('startTime')
  localStorage.setItem(STORED_ITEM.studyStatus, STUDY_STATUS.none)
  changeStudyStatusText()
  startTime = null
  elapsedSeconds = 0
  document.getElementById('timer').textContent = '00:00:00'
}

function changeStudyStatusText(text = '') {
  const e = document.getElementById('study-status')
  e.textContent = text
}


/*
 * ポップアップ
 */
let countdownInterval

// ポップアップを表示する関数
function showPopup() {
  const popup = document.getElementById('popup')
  const overlay = document.getElementById('overlay')
  const countdownElement = document.getElementById('countdown')

  // オーバーレイとポップアップを表示
  popup.classList.remove('hidden')
  overlay.classList.remove('hidden')

  let countdownValue = 3
  countdownElement.textContent = countdownValue

  // カウントダウン開始
  countdownInterval = setInterval(() => {
    countdownValue--
    countdownElement.textContent = countdownValue

    // カウントが0になったらポップアップを閉じる
    if (countdownValue <= 0) {
      closePopup()
    }
  }, 1000)
}

// ポップアップを閉じる関数
function closePopup() {
  clearInterval(countdownInterval) // カウントダウンを止める
  document.getElementById('popup').classList.add('hidden')
  document.getElementById('overlay').classList.add('hidden')
}