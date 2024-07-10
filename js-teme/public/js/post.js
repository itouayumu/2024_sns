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
