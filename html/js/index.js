function videoAdjust () {
  const video = document.getElementById('video')
  const videoWidth = video.clientWidth
  const videoHeight = video.clientWidth
  console.log(videoWidth, videoHeight)
  const fix = Math.max(window.innerWidth / videoWidth, window.innerHeight / videoHeight)
  video.style.width = videoWidth * fix
  video.style.height = videoHeight * fix
  video.style.top = Math.floor((window.innerHeight - videoHeight * fix) / 2)
  video.style.left = Math.floor((window.innerWidth - videoWidth * fix) / 2)
  document.getElementById('video-frame').style.height = window.innerHeight
}
function setQuote () {
  const quote = document.getElementById('quote')
  '音楽の輪が限りなく広がりますように'.split('').forEach(each => quote.innerHTML += '<span>' + each + '</span>')
  quote.innerHTML += '<span>&mdash;&mdash;</span>'
}
window.addEventListener('load', () => {
  videoAdjust()
  setQuote()
})
window.addEventListener('resize', () => {
  videoAdjust()
})