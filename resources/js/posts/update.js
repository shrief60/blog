/**
 
 $(document).ready(function() {
    let $container = $('.bootstrap-tagsinput');
    console.log($container);
    tags.forEach(function(tag) {
        let child = `<span class="badge badge badge-info">${tag.body}<span data-role="remove"></span></span>`;
        $container.prepend(child);
    });
});
*/
$(document).on('change', '#post_image', function() {
    $('.post-image').hide();
});