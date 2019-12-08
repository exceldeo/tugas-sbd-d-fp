var keyword = document.getElementById('keyword');
var content = document.getElementById('diganti');
var uang = document.getElementById('uangg');
var total = document.getElementById('totall');
var kembali = document.getElementById('kembalii');


keyword.addEventListener('keyup', function () {

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            content.innerHTML = xhr.responseText;
            // console.log('okok');
            // alert("ok");
        }
    }

    xhr.open('GET', 'js/tampil.php?keyword=' + keyword.value, true);
    xhr.send();

});

uang.addEventListener('keyup', function () {

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            kembali.innerHTML = xhr.responseText;
            // console.log('okok');
            // alert("ok");
        }
    }

    xhr.open('GET', 'js/kembalii.php?uangg=' + uang.value '&totall=' + total.value, true);
    xhr.send();

});