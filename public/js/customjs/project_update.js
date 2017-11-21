/**
 * Created by NySominea on 18/09/2017.
 */
$('.box-module').each(function(){
    var option = $(this).children('.box-header').find('.priority').val();
    var buttonTask = $(this).children().last().children().last().children().last();
    var boxtask=$(this).find('.box-task');

    if(option==1){
        $(this).removeClass('box-primary box-warning box-info').addClass('box-danger')
        $(this).find('.priority').css('color','#dd4b39');
        buttonTask.css('background-color','#dd4b39').css('border-color','#dd4b39').css('color','white');
        boxtask.addClass('box-danger').removeClass('box-primary box-warning box-info').css('color','white');
    }else if(option==2){
        $(this).removeClass('box-primary box-danger box-info').addClass('box-warning')
        $(this).find('.priority').css('color','#f39c12');
        buttonTask.css('background-color','#f39c12').css('border-color','#f39c12').css('color','white');
        boxtask.addClass('box-warning').removeClass('box-primary box-danger box-info').css('color','white');
    }else if(option==3){
        $(this).removeClass('box-primary box-danger box-warning').addClass('box-info')
        $(this).find('.priority').css('color', '#00c0ef');
        buttonTask.css('background-color','#00c0ef').css('border-color','#00c0ef').css('color','white');
        boxtask.addClass('box-info').removeClass('box-primary box-warning box-danger').css('color','white');
    }
})

$('.box-task').each(function(){

})