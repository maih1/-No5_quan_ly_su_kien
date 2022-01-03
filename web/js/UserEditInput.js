document.querySelector('.btn-browse-file').onclick = function (e) {
  document.querySelector('.input-browse-file').click();
};

document.querySelector('.input-browse-file').onchange = function (e) {
  document.querySelector('.img-dir').value = e.target.value;
  var fReader = new FileReader();
  fReader.readAsDataURL(e.target.files[0]);
  fReader.onloadend = function (event) {
    document.querySelector('.img-group > img').src = event.target.result;
  };
  console.log(e.target.value);
};

document.querySelector('.img-group > img').onload = function (e) {};
