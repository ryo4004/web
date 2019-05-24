const firstElement = document.getElementById('first-background')
const secondElement = document.getElementById('second-background')
const photo = ['image/photo/001.jpg','image/photo/002.jpg','image/photo/003.jpg','image/photo/004.jpg','image/photo/005.jpg','image/photo/006.jpg','image/photo/007.jpg','image/photo/008.jpg','image/photo/009.jpg','image/photo/010.jpg','image/photo/011.jpg','image/photo/012.jpg'];
let number = 1
let element = false
setTimeout(() => {
  setInterval(() => {
    number = number === photo.length - 1 ? 0 : number + 1
    element = !element
    if (element) {
      firstElement.style.backgroundImage = 'url("' + photo[number] + '")'
    } else {
      secondElement.style.backgroundImage = 'url("' + photo[number] + '")'
    }
  }, 15000)
}, 2000)