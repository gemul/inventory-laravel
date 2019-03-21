function notifikasi(text,notiftype){
    if(notiftype===undefined)notiftype='info';
    $.notify(
        {
            // options
            title: 'Notifikasi',
            message: text,
        }, 
        {
                // settings
                allow_dismiss: true,
                newest_on_top: false,
                type: notiftype,
                timer: 3000
        }
    );
}