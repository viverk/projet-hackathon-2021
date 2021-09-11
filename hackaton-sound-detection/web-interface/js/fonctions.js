function getListenningStatus()
{
    $.ajax
            (
                {
                    type: "GET",
                    url: "/php/get_listenning_status.php",
                    success: function (data)
                    {
                        if(data == '1' && document.getElementById('microphone')){
                            $('#microphone').show();
                            document.getElementById('microphone').classList.remove('micro-inactif');
                            document.getElementById('microphone').classList.add('micro-actif');
                            document.createElement('p');
                            
                            if($("#signal-audio-info").length == 0){
                                $('<p id="signal-audio-info" class="text">Le programme de reconnaissance et de traitement de signal audio est activé.</p>').insertAfter('#microphone');
                            }
                        } else if(data != '1' && document.getElementById('microphone')){

                            document.getElementById('microphone').classList.remove('micro-actif');
                            document.getElementById('microphone').classList.add('micro-inactif');
                            
                        }

                        
                    },
                    error: function ()
                    {
                        //alert("Erreur d'envoie d'email");
                    }
                }
            );
}
id_alerte = '';
function getAlertStatus()
{
    $.ajax
            (
                {
                    type: "GET",
                    url: "../php/get_alert_status.php",
                    success: function (data)
                    {
                        data = JSON.parse(data);
                        console.log(data.user_alert);
                        if(data && data.user_alert != '1'){
                            //$('#microphone').hide();
                            id_alerte = data.id

                            if (document.getElementsByClassName('cercle-main')[0]) {
                                document.getElementsByClassName('cercle-main')[0].classList.add('cercle-renfort');
                                $('#sound_date').remove();
                                $('#sound_nature').remove();
                                $('<p class="txt" id="sound_date">Son anormal détecté à ' + data.datetime + '</p>').insertAfter('.cercle-renfort');
                                $('<p class="txt" id="sound_nature">Nature du son :' + data.sound_nature + '</p>').insertAfter('.cercle-renfort');
                                document.getElementsByClassName('cercle-renfort')[0].classList.add('cercle-mains');

                                document.getElementById('submit').style.display = 'block';
                                document.getElementById('submit-fa').style.display = 'block';
                            }

                            

                        
                        }
                        else {
                            document.getElementsByClassName('cercle-main')[0].classList.remove('cercle-renfort');
                            if ($('#sound_date')) {
                             $('#sound_date').remove();
                             $('#sound_nature').remove();

                            }


                        }
                    },
                    error: function ()
                    {
                        //alert("Erreur d'envoie d'email");
                    }
                }
            );
}

function cancelAlert(evt) {
    evt.preventDefault();
    if ( id_alerte != '') {
        $.ajax
        (
            {
                type: "POST",
                url: "/php/cancel_alert.php",
                data: {"id_alerte": id_alerte},
                success: function (data)
                {

                    
                },
                error: function ()
                {
                    //alert("Erreur d'envoie d'email");
                }
            }
        );

    }

}
function getStatus()
{
    getListenningStatus();
    getAlertStatus();

}
getStatus();
setInterval(getStatus, 5000);
$("#submit-fa").click(cancelAlert);


let btnEnregistrer = document.getElementById("enregistrer");

let btnStop = document.getElementById("stop");
let inputTexte = document.getElementById("texte");


function addAlertComment(valeur,types)
{
    console.log({"valeur":valeur, 'type':types})
    $.ajax
            (
                    {
                        type: "POST",
                        url: "/php/add_alert_comment.php",
                        data: {"valeur":valeur, 'types':types},
                        success: function (data)
                        {
                            //envoieEmail(types);
                            $('#text').html("<p>Votre signalement a été pris en compte</p>");
                            setTimeout(function(){
                                window.location.href = '/views/main.php'
                            },5000)
                            console.log("Commentaire enregistré");
                            console.log(data.response)
                        },
                        error: function ()
                        {
                            console.log("Erreur d'insertion");
                        }
                    }
            );
}

var reconnaissance = new webkitSpeechRecognition();

//recognition.onresult = function(event) {
if ('webkitSpeechRecognition' in window) {
    console.log("oui")
  } else {
    console.log("non")
  }
reconnaissance.lang = 'fr-FR';
reconnaissance.continuous = true;

reconnaissance.onresult = function (event) {

    var valeur = inputTexte.value = event.results[0][0].transcript;
    if (valeur.includes("code 10") == true) { //ce n'est pas la maniere la plus optimal (à changer)
        type = 1;
    } else if (valeur.includes("code 11") == true) {
        type = 2;
    } else if (valeur.includes("code 12") == true) {
        type = 3;
    } else if (valeur.includes("code 13") == true) {
        type = 4;
    } else {
        type = null;
    }


    addAlertComment(valeur,type);

}

function startVoiceRecognition() {//lance la reconnaissance du son
    $('#record-progress').show();
    console.log('j\'enregistre');
    reconnaissance.start();
}

function stopVoiceRecognition() {//stop la reconnaissance du son
    console.log('stop recording');
    reconnaissance.stop();
}

function envoieEmail(types)
{
    $.ajax
            (
                    {
                        type: "GET",
                        url: "envoieEmail.php",
                        data: "types=" + types,
                        success: function (data)
                        {
                            //alert("L'email a bien été envoyé !")
                        },
                        error: function ()
                        {
                            //alert("Erreur d'envoie d'email");
                        }
                    }
            );
}

function envoieEmail(types)
{
    $.ajax
            (
                    {
                        type: "GET",
                        url: "envoieEmail.php",
                        data: "types=" + types,
                        success: function (data)
                        {
                            //alert("L'email a bien été envoyé !")
                        },
                        error: function ()
                        {
                            //alert("Erreur d'envoie d'email");
                        }
                    }
            );
}
