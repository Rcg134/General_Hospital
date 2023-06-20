
    $(document).ready(function() {
      var $image = $('#modalImage');
      var cropper;

      // Image upload and show preview
      $('#cropModal').on('shown.bs.modal', function() {
        cropper = new Cropper($image[0], {
          aspectRatio: 1,
          viewMode: 3,
          dragMode: 'move',
          autoCropArea: 0.8,
          restore: false,
          guides: false,
          center: false,
          highlight: false,
          cropBoxMovable: true,
          cropBoxResizable: false,
          toggleDragModeOnDblclick: true
        });
      }).on('hidden.bs.modal', function() {
        cropper.destroy();
      });

      // Handle crop button click
      $('#cropButton').click(function() {
        var canvas = cropper.getCroppedCanvas({
          width: 200,
          height: 200,
          fillColor: '#fff',
          imageSmoothingEnabled: false,
          imageSmoothingQuality: 'high',
        });

        // Convert canvas to base64 image to check 
        var roundedCanvas = document.createElement('canvas');
        var roundedContext = roundedCanvas.getContext('2d');
        var roundedSize = Math.min(canvas.width, canvas.height);

        roundedCanvas.width = roundedSize;
        roundedCanvas.height = roundedSize;
        roundedContext.beginPath();
        roundedContext.arc(roundedSize / 2, roundedSize / 2, roundedSize / 2, 0, 2 * Math.PI);
        roundedContext.closePath();
        roundedContext.clip();
        roundedContext.drawImage(canvas, (roundedCanvas.width - canvas.width) / 2, 
	    	(roundedCanvas.height - canvas.height) / 2);

        var roundedImage = roundedCanvas.toDataURL('image/png');

        // Display cropped image preview
        $('#imagePreview').attr('src', roundedImage);

        // Close the modal
        $('#cropModal').modal('hide');
        alert(roundedImage)
      });

      
      // Handle image input change
      $('#imageInput').change(function(e) {
        var file = e.target.files[0];
        var reader = new FileReader();

        reader.onload = function(event) {
          $image.attr('src', event.target.result);
          $('#cropModal').modal('show');
        };
        // read data image from on change
        reader.readAsDataURL(file);
      });
    });
