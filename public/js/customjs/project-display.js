/**
 * Created by NySominea on 09/09/2017.
 */

$('table tbody tr').each(function(idx){
    $(this).children(":eq(0)").html(idx + 1+'.');
});

$('.project').click(function(){
    $(this).find('.project_preview').submit()
})

//Progress_bar color
$('.project').each(function(index){
    var percent=$(this).find('.progress-bar').width();
    if(percent<40){
        $(this).find('.progress-bar').addClass('progress-bar-danger').removeClass('progress-bar-warning progress-bar-success')
    }else if(percent<80){
        $(this).find('.progress-bar').addClass('progress-bar-warning').removeClass('progress-bar-danger progress-bar-success')
    }else{
        $(this).find('.progress-bar').addClass('progress-bar-success').removeClass('progress-bar-warning progress-bar-danger')
    }
})