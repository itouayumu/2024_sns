// 1つ目のモーダル用のコード
const buttonOpen = document.getElementById('modalOpen');
const modal = document.getElementById('easyModal');
const buttonClose = document.getElementsByClassName('modalClose')[0];

// ボタンがクリックされた時
buttonOpen.addEventListener('click', modalOpen);
function modalOpen() {
  modal.style.display = 'block';
}

// バツ印がクリックされた時
buttonClose.addEventListener('click', modalClose);
function modalClose() {
  modal.style.display = 'none';
}

// モーダルコンテンツ以外がクリックされた時
window.addEventListener('click', outsideClose);
function outsideClose(e) {
  if (e.target == modal) {
    modal.style.display = 'none';
  }
}

// 2つ目のモーダル用のコード
var modal1 = document.getElementById("myModal");
var btn = document.getElementById("openModalBtn");
var span = document.getElementsByClassName("close")[0];

// ボタンがクリックされたときにモーダルを開く
btn.onclick = function() {
  modal1.style.display = "block";
}

// <span>がクリックされたときにモーダルを閉じる
span.onclick = function() {
  modal1.style.display = "none";
}

// モーダルの外側がクリックされたときにモーダルを閉じる
window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
}
