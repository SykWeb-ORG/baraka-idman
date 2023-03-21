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


    // // Progress Bar
    // $('.pg-bar').waypoint(function () {
    //     $('.progress .progress-bar').each(function () {
    //         $(this).css("width", $(this).attr("aria-valuenow") + '%');
    //     });
    // }, {offset: '80%'});

    
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

function changeTextContent(sender, input_id) {
    const fileChosen = document.getElementById('file-chosen' + input_id);
    fileChosen.textContent = sender.files[0].name
}
const alertMsg = (msg, classDanger = "") => {
    let divAlert = $("div.showAlert");
    divAlert.find("span:first").remove();
    if (classDanger == "danger") {
        divAlert.addClass(classDanger);
        divAlert.removeClass("success");
        divAlert.prepend(`<span class="fas fa-exclamation-circle"></span>`);
    } else {
        divAlert.addClass("success");
        divAlert.removeClass("danger");
        divAlert.prepend(`<span class="fas fa-check"></span>`);
    }
    divAlert.find(`span.msg`).text(msg);
    divAlert.toggleClass(["hide", "d-none", "show"]);
    setTimeout(function () {
        divAlert.toggleClass(["hide", "d-none", "show"]);
    }, 3000);
}
function interveantLogin(){
    var password =document.getElementById('passw-input');
    var email =document.getElementById('email-input');
    var interLiNK =document.getElementById('log-inter');
    var title = document.getElementById('Sign-title');
    var interMatricule = document.getElementById('matricule-input')
    if(password.style.display != 'none'){
        password.style.display = 'none';
        email.style.display = 'none';
        interLiNK.textContent = "Tu n'es pas un intervenant ?";
        title.textContent = "Sign In For Intervenant";
        interMatricule.style.display = 'block';
    }
    else{
        password.style.display = 'block';
        email.style.display = 'block';
        interLiNK.textContent = "T'es un intervenant ?";
        title.textContent = "Sign In";
        interMatricule.style.display = 'none';
    }
}
function SelectDB(){
    var formSociete =document.getElementById('form-societe');
    var selectDatabase = document.getElementById('switch-db');
    if(selectDatabase.value !=""){
        formSociete.style.display = 'block';
    }
    else{
        formSociete.style.display = 'none';
    }

}
