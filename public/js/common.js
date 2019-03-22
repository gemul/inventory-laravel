var audioNotification = new Audio('audio/definite.ogg');
var audioError = new Audio('audio/system-fault.ogg');
function notifikasi(text,notiftype){
    if(notiftype===undefined)notiftype='info';
    $.notify(
        {
            // options
            message: text,
        }, 
        {
                // settings
                allow_dismiss: true,
                newest_on_top: false,
                type: notiftype,
                timer: 3000,
                z_index: 2031
        }
    );
    if(notiftype=="danger"){
        audioError.play();
    }else{
        audioNotification.play();
    }
}