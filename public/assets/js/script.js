// let img = document.getElementById("preview");
// let changeimage = document.getElementById("image");

// changeimage.addEventListener("change", (e) => {
// 	img.src = URL.createObjectURL(e.target.files[0]);
// });

function changeImg() {
    const fileInput1 = document.getElementById('foto_krywn');
    const fileInput2 = document.getElementById('rekktp');
    const fileInput3 = document.getElementById('image_news');
    const fileInput4 = document.getElementById('imagePartner');
    const fileInput5 = document.getElementById('transfer_photo');
   
    
    const imgPreview1 = document.getElementById('previmagekrywn');
    const imgPreview2 = document.getElementById('prevrekktp');
    const imgPreview3 = document.getElementById('previmageNews');   
    const imgPreview4 = document.getElementById('previmagePartner');
    const imgPreview5 = document.getElementById('prevtransfer');
   
    
   

    const updateImagePreview = (fileInput, imgPreview) => {
        if (fileInput && imgPreview) { 
            const file = fileInput.files[0];
            if (file) {
                imgPreview.src = URL.createObjectURL(file);
            } else {
                console.log(`No file selected for: ${fileInput.id}`);
            }
        }
    }

    updateImagePreview(fileInput1, imgPreview1);
    updateImagePreview(fileInput2, imgPreview2);
    updateImagePreview(fileInput3, imgPreview3);
    updateImagePreview(fileInput4, imgPreview4);
    updateImagePreview(fileInput5, imgPreview5);
}
