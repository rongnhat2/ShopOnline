
// copy clipboard multi
$('.image-tile').click(function(event){
	// console.log(this)
	// console.log($(this).find(".image_url")[0])
	var item = $(this).find(".image_url")[0];
    var range = document.createRange();
    range.selectNode(item);
    window.getSelection().removeAllRanges(); // clear current selection
    window.getSelection().addRange(range); // to select text
    document.execCommand("copy");
    window.getSelection().removeAllRanges();// to deselect
    // hông được none đối tượng
});
$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
        	    	$('#lightgallery').append(
        	    		'<div class="image-tile">'+
                        '    <img src="'+ event.target.result +'" alt="image small" />'+
                        '</div>'				
			    		); 
                    }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $('#LoadImage').on('change', function() {
        $('#lightgallery').find('.image-tile').remove();
        imagesPreview(this, '.upload-image');
    });
});


          
$('.image-select').on('click', function(e){
    var image = $(this).find('.image_url').text()
    var image_id = $(this).find('img').attr('image_id')
    // console.log(image_id)
    $('.image_loading').find('img').attr('src', image)
    $('.image_loader').find('input').attr('value', image_id)
    
})

$('.image_loader').on('click', function(){
    console.log(1)
    $('.lightGallery').find('.image-tile').remove();                                   
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/gallery/getLibrary",
        type: "GET",
        success:function(data){ //dữ liệu nhận về
            // console.log(data)
            for (var i = 0; i < data.length; i++) {
                 console.log(data[i].image_url)
                $('.lightGallery').append( 
                    '<div class="image-tile image-select" onclick="showSwal(\'append-image\')">'+
                    '    <div class="image_url">'+
                    '        http://' + window.location.host + '/' + data[i].image_url +
                    '    </div>'+
                    '    <img src="http://' + window.location.host + '/' + data[i].image_url + '" image_id="'+data[i].id+'" />'+
                    '</div>'                              
                );
            }  
            $('.image-select').on('click', function(e){
                var image = $(this).find('.image_url').text()
                var image_id = $(this).find('img').attr('image_id')
                // console.log(image_id)
                $('.image_loading').find('img').attr('src', image)
                $('.image_loader').find('input').attr('value', image_id)
                
                var item = $(this).find(".image_url")[0];
                var range = document.createRange();
                range.selectNode(item);
                window.getSelection().removeAllRanges(); // clear current selection
                window.getSelection().addRange(range); // to select text
                document.execCommand("copy");
                window.getSelection().removeAllRanges();// to deselect
            })              
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    })

})    

