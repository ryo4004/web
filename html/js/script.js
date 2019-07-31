console.log('%c　　　　　　　　　　　', 'background: rgba(255,255,255,0) url(https://winds-n.com/image/logo/logo.svg) no-repeat center center /contain;font-size: 32px;')
console.log('お問い合わせはcontact@winds-n.comまで')

document.getElementById('scrollTop') ? document.getElementById('scrollTop').addEventListener('click', () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  })
}) : false