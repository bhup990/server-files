// Get the modal
var modal = $("#myModal");
var modalImg = modal.find('.modal-content');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = $(".myImg");
var captionBox =$("#caption");

img.click(function() {
    modalImg.attr('src', $(this).attr('src'));
    captionBox.text( $(this).attr('alt') );
    modal.show();
});

// Get the elements that closes the modal
var modalCloser = $(".close");

// When the user clicks on the close element, close the modal
modalCloser.click(function() {
    modal.hide();
});
