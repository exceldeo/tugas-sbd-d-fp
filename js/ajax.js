var keyword = document.getElementById('keyword');
var content = document.getElementById('diganti');


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