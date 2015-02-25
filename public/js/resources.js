$(document).ready(function () {

    //Deal with the audio
    $('.audio_button').click(function() {
    	//Get the audio tag based on the buttons position
        var button = $(this);
        var audio = $(this).parent().next().get(0);

        //Pause all other audio except itself
        $('.audio_button').parent().next().each(function (){
        	if(audio != this){
                this.pause();

                //Fix glyphs
                $(this).prev().children().children().removeClass("glyphicon glyphicon-volume-up");
                $(this).prev().children().children().addClass("glyphicon glyphicon-volume-off");
            } 
        });

		if (audio.duration > 0 && !audio.paused) {//The audio is playing
			audio.pause();

            //Turn on muted glyph
            button.children().removeClass("glyphicon glyphicon-volume-up");
            button.children().addClass("glyphicon glyphicon-volume-off");
            
		} 
		else{//Not playing...maybe paused, stopped or never played.
			audio.play();

            //Turn on playing glyph
            button.children().removeClass("glyphicon glyphicon-volume-off");
            button.children().addClass("glyphicon glyphicon-volume-up");
		}
    });


});
