/**
 * Created by NySominea on 11/09/2017.
 */
$(document).ready(function(){
    $(['data-toggle="tooltip"']).tooltip();

})

$('.module_row').each(function(index){
    var percent=$(this).find('.progress-bar').width();
    if(percent<40){
        $(this).find('.progress-bar').addClass('progress-bar-danger').removeClass('progress-bar-warning progress-bar-success')
    }else if(percent<80){
        $(this).find('.progress-bar').addClass('progress-bar-warning').removeClass('progress-bar-danger progress-bar-success')
    }else{
        $(this).find('.progress-bar').addClass('progress-bar-success').removeClass('progress-bar-warning progress-bar-danger')
    }
})