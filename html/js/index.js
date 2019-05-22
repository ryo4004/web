function videoAdjust () {
  document.getElementById('video-frame').style.height = window.innerHeight
  const video = document.getElementById('video')
  const videoWidth = video.clientWidth
  const videoHeight = video.clientHeight
  // const videoWidth = video.scrollWidth
  // const videoHeight = video.scrollHeight
  // const videoWidth = window.innerHeight === video.scrollWidth ? video.scrollWidth : video.clientWidth
  // const videoHeight = window.innerWidth === video.scrollHeight ? video.scrollHeight : video.clientWidth
  const fix = Math.max(window.innerWidth / videoWidth, window.innerHeight / videoHeight)
  video.style.width = videoWidth * fix
  video.style.height = videoHeight * fix
  video.style.top = Math.floor((window.innerHeight - videoHeight * fix) / 2)
  video.style.left = Math.floor((window.innerWidth - videoWidth * fix) / 2)
}
function setQuote () {
  const quote = document.getElementById('quote')
  '音楽の輪が限りなく広がりますように'.split('').forEach(each => quote.innerHTML += '<span>' + each + '</span>')
  quote.innerHTML += '<span class="dash">&mdash;&mdash;</span>'
}
function loadingClose () {
  document.getElementById('loading').classList.add('hide')
  setTimeout(() => document.getElementById('loading').classList.add('none'), 200)
}
window.addEventListener('load', () => {
  document.getElementById('video').controls = false
  if (document.getElementById('video').readyState > 3) loadingClose()
  document.getElementById('video').addEventListener('canplay', () => loadingClose())
  videoAdjust()
  setQuote()
})
window.addEventListener('resize', () => {
  /iP(hone|(o|a)d)/.test(navigator.userAgent) ? false : videoAdjust()
})
window.addEventListener('orientationchange', () => {
  videoAdjust()
})