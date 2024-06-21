// let img = document.getElementById("preview");
// let changeimage = document.getElementById("image");

// changeimage.addEventListener("change", (e) => {
// 	img.src = URL.createObjectURL(e.target.files[0]);
// });

function changeImg() {
    const fileInput1 = document.getElementById('foto_krywn');
    const fileInput2 = document.getElementById('rekktp');
    const imgPreview1 = document.getElementById('previmagekrywn');
    const imgPreview2 = document.getElementById('prevrekktp');

    const updateImagePreview = (fileInput, imgPreview) => {
        const file = fileInput.files[0];
        if (file) {
            imgPreview.src = URL.createObjectURL(file);
        }
    }

    updateImagePreview(fileInput1, imgPreview1);
    updateImagePreview(fileInput2, imgPreview2);
}