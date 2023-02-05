(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // // Back to top button
    // $(window).scroll(function () {
    //     if ($(this).scrollTop() > 300) {
    //         $('.back-to-top').fadeIn('slow');
    //     } else {
    //         $('.back-to-top').fadeOut('slow');
    //     }
    // });
    // $('.back-to-top').click(function () {
    //     $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
    //     return false;
    // });


    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });


    // Progress Bar
    $('.pg-bar').waypoint(function () {
        $('.progress .progress-bar').each(function () {
            $(this).css("width", $(this).attr("aria-valuenow") + '%');
        });
    }, {offset: '80%'});

    
})(jQuery);

//--> Presentation de message retourner par ajax
function messageComponants(message, className, iconFa) {
    const messageComponant = `
    <div class="alert alert-${className} alert-dismissible fade show" role="alert">
        <i class="fas ${iconFa}"></i> ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`;
    return messageComponant;
}

$('#close-btn').click(function(){
    $('.alert').removeClass("show");
    $('.alert').addClass("hide");
  })
  setTimeout(function(){
    $('.alert').removeClass("show");
    $('.alert').addClass("hide");
    $('.alert').addClass("hideAlert");
  },3000);

function changeTextContent(sender, input_id) {
    const fileChosen = document.getElementById('file-chosen' + input_id);
    fileChosen.textContent = sender.files[0].name
}
