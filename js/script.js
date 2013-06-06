$(function() {

    var json = getMatchPlayback(),
        count = 0,
        timer = $.timer(
        function() {
            count++;
            $('#timer').text(count);
            
            if(json.events['event_' + count] !== undefined) {
                timer.pause();
                $("#match").text(json.events['event_' + count].desc);
                timer.play();
            }
        },
        500,
        false
    );


    $(document).on('click', '#start-match', function() {
        timer.play();
    });
    
    
    $(document).on('click', '#pause-match', function() {
        timer.pause();
    })
  
//        $.each(json.events, function(event) {
//            console.log(json.events[event]);
//        });            

//
//        for(var i = 1; i <= 90; i++) {
//
//            $("#timer").text(i);
//
//            if(json.events['event_' + i] !== undefined) {
//                console.log('Event at ' + i + ' minutes');
//                console.log(json.events['event_' + i]);
//            }
//        }
//        
   
});


function getMatchPlayback() {
   
    var json = (function () {
        var json = null;
        $.ajax({
            'async': false,
            'global': false,
            'url': 'ajax.php',
            'dataType': "json",
            'data': 'controller=Match&action=playMatch',
            'success': function (data) {
                json = data;
            }
        });
        return json;
    })();
   
    return json;
}


function playbackMatch() {
    
}