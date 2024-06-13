function showAlertDelete(button) {
    var form = button.parents('form');
    Swal.fire({
        title: 'Apakah kamu yakin?',
        text: "Anda tidak akan dapat mengembalikan data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    })
}

function isMobileDevice(){
    return ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));
}

function showErrorMessage(message) {
    $.notify({
        title : 'Failed !!',
        message: message
    }, {
        type: 'danger',
        timer: 2500,
        placement: {
            from: 'bottom',
            align: 'right'
        },
        animate: {
            enter: "animate__animated animate__fadeInUp",
            exit: "animate__animated animate__fadeOutUp"
        },
        newest_on_top: true,
        template:
            '<div data-notify="container" class="row notification-danger card shadow-lg rounded border-left-danger col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<div class="row">'+
            '<div class="col-2">'+
            '<a href="#" data-notify="icon" class="btn btn-danger btn-circle not-clickable"> <i class="fas fa-times"></i> </a>'+
            '</div>'+
            '<div class="col-9">'+
            '<span class="notification-title" data-notify="title">{1}</span><br>' +
            '<span data-notify="message">{2}</span>' +
            '</div>'+
            '<div class="col-1">'+
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '</div>'+
            '</div>'+
            '</div>',
    });
}

function showSuccessMessage(message) {
    $.notify({
        title : 'Success !!',
        message: message
    }, {
        type: 'success',
        timer: 2500,
        placement: {
            from: 'bottom',
            align: 'right'
        },
        animate: {
            //enter: "animate__animated animate__fadeInUp",
            //exit: "animate__animated animate__fadeOutUp"
            //enter: "animated fadeInUp",
            //exit: "animated fadeOutUp"
            enter: 'animated fadeInRight',
            exit: 'animated fadeOutRight'
        },
        newest_on_top: true,
        template:
            '<div data-notify="container" class="row notification-success card shadow-lg rounded border-left-success col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<div class="row">'+
            '<div class="col-2">'+
            '<a href="#" data-notify="icon" class="btn btn-success btn-circle not-clickable"> <i class="fas fa-check"></i> </a>'+
            '</div>'+
            '<div class="col-9">'+
            '<span class="notification-title" data-notify="title">{1}</span><br>' +
            '<span data-notify="message">{2}</span>' +
            '</div>'+
            '<div class="col-1">'+
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '</div>'+
            '</div>'+
            '</div>',
    });
}
