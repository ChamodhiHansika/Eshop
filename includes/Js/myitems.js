function previewImage() {
    var itemPhotoInput = document.getElementById('item_photo');
    var itemPicture = document.getElementById('item_picture');
    var previewImage = new Image();
    
    itemPicture.src = '';
    
    var file = itemPhotoInput.files[0];
    if(file) {
        var reader = new FileReader();

        reader.onload = function(e) {
            previewImage.src = e.target.result;
            previewImage.onload = function() {
                var maxWidth = 150;
                var maxHeight = 150;

                var width = this.width;
                var height = this.height;

                if (width > height) {
                    if (width > maxWidth) {
                        height *= maxWidth / width;
                        width = maxWidth;
                    }
                } else {
                    if (height > maxHeight) {
                        width *= maxHeight / height;
                        height = maxHeight;
                    }
                }

                itemPicture.style.maxWidth = width + 'px';
                itemPicture.style.maxHeight = height + 'px';
                itemPicture.src = this.src;
            }
        }

        reader.readAsDataURL(file);
    }
}
