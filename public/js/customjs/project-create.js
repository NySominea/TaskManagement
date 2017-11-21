
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.datepicker').datepicker({
    autoclose: true
});


$('.select2').select2();


/*$('form').submit(function(event){
    event.preventDefault();
    $.ajax({
        url: '/project',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success: function(response){
        }
    })
})*/


$('#select_member').change(function (e) {
    var users = $(this).val();
    $.ajax({
        url: '/project/getUsersImage',
        type: 'POST',
        dataType: 'json',
        data:{
            'users_id': users
        },
        success: function(response){
            $('#member_image_panel').children().remove();
            for(var i=0;i<response.users.length;i++)
                $('#member_image_panel').append('<img src="/img/'+response.users[i]+'" class="img-responsive img-circle pull-left" width="40px"/>');
          //  console.log('do');
        },
        error: function(){
            $('#member_image_panel').children().remove();
        }
    });

    updateAllTaskMemberSelect();
});


function updateAllTaskMemberSelect(){
    var members = $('#select_member').select2('data');
    var select_task = $(".task_member");
    var update_member='<option value="" selected disabled>Select or Search for a developer</option>';
    var member_key=[];

    var managerId=$('#select_member option:disabled').val()
    var managerName=$('#select_member option:disabled').text()
    update_member+='<option value="'+managerId+'">'+managerName+'</option>';
    member_key.push(managerId);
    //for(var key in manager){
    //    if(manager.hasOwnProperty(key)){
    //        update_member+='<option value="'+manager[key].id+'">'+manager[key].text+'</option>';
    //        member_key.push(manager[key].id);
    //    }
    //}

    for (var key in members) {
        if (members.hasOwnProperty(key)) {
            update_member += '<option value="'+members[key].id+'">'+members[key].text+'</option>';
            member_key.push(members[key].id);
        }
    }
    var test='';
    for(var i=0;i<select_task.length;i++){
        var value = select_task[i].value;
        select_task[i].innerHTML = update_member;
        select_task[i].value=value;
        if(!member_key.includes(select_task[i].value)){
            select_task[i].value = '';
        }
    }
}



$(document).on('change','select.task_member',function(){
    var developer= $(this).val();
    var image_panel= $(this).parents('.box-task').find('.developer_image_panel');
    $.ajax({
        url:'/project/getDeveloperImage',
        type: 'POST',
        dataType: 'json',
        data:{
            'user_id': developer
        },

        success: function(response){
            image_panel.children().remove();
            image_panel.append('<img src="/img/'+response.user+'" class="img-responsive img-rounded" width="60px" height="60px"/>');

        },
        error: function(){
            image_panel.children().remove();
        }
    });
})


$('#add_module').click(function () {
    $('#div_module').append(
        '<div class="box box-primary box-solid box-module" >'+
            '<div class="box-header with-border">'+
                '<h3 class="box-title">' +
                '<input name="module[][name]" class="module-name" value="Module Name" readonly="readonly" type="text"></h3>'+
                '<button type="button" class="btn btn-box-tool module-edit"><i class="fa fa-edit"></i></button>'+
                '<div class="pull-right">'+
                    '<select class="priority" data-value="0" name="module[][priority]" style="vertical-align: middle ;margin-right: 20px; color:#3c8dbc">' +
                        '<option selected disabled value="4">Select Priority</option>' +
                        '<option value="1">Important</option>' +
                        '<option value="2">Less important</option>' +
                        '<option value="3">Not important</option>' +
                    '</select>' +
                    '<button type="button" class="btn btn-box-tool collapse-button"><i class="fa fa-minus"></i></button>'+
                    '<button type="button" class="btn btn-box-tool remove-module"><span><i class="fa fa-times"></i></button>'+
                '</div>'+
            '</div>'+
            '<div class="box-body" style="">'+
                '<div class="form-group col-md-6">' +
                    '<label for="title">Start Date</label>' +
                    '<div class="input-group date">' +
                        '<div class="input-group-addon">' +
                            '<i class="fa fa-calendar"></i>' +
                        '</div>' +
                        '<input type="text" name="module[][startdate]" class="form-control pull-right date startdate">' +
                    '</div>' +
                '</div>'+

                '<div class="form-group col-md-6">' +
                    '<label for="title">End Date</label>' +
                    '<div class="input-group date">' +
                        '<div class="input-group-addon">' +
                            '<i class="fa fa-calendar"></i>' +
                        '</div>' +
                        '<input type="text" name="module[][enddate]" class="form-control pull-right date enddate">' +
                    '</div>' +
                '</div>' +

                '<div class="box-header">' +
                    '<h3 class="box-title">Module Task(s)</h3>'+
                '</div>'+

                '<div class="row div-task box-body" id="#div_task">' +

                '</div>'+
            '</div>'+

            '<div class="box-footer">' +
                '<div class="form-group col-md-12">' +
                    '<button class="btn btn-primary btn-add-task" type="button" id="btn_add_task">Add Task</button>' +
                '</div>' +
            '</div>'+
        '</div>'
    );
    $('.date').datepicker({
        autoclose: true
    });

});


$(document).on('click', 'button#btn_add_task', function () {
    var option = $(this).parents('.box-module').children('.box-header').children().last().children('.priority').val();
    var boxclass='box-primary';

    var members = $('#select_member').select2('data');

    var managerId=$('#select_member option:disabled').val();
    var managerName=$('#select_member option:disabled').text();

    if(option=='1') boxclass='box-danger';
    else if(option=='2') boxclass='box-warning';
    else if(option=='3') boxclass='box-info';
    var element = '<div class="col-sm-12">'+
        '<div class="box '+boxclass+' box-solid box-task">'+
            '<div class="box-header with-border">'+
                '<h3 class="box-title"><input name="task[module_name][][name]" class="task-name" value="Task Name" readonly="readonly" type="text"></h3>'+
                '<button type="button" class="btn btn-box-tool task-edit"><i class="fa fa-edit"></i></button>'+
                '<div class="box-tools pull-right">'+
                    '<button type="button" class="btn btn-box-tool remove-task"><i class="fa fa-times"></i></button>'+
                '</div>'+
            '</div>'+
            '<div class="box-body">'+
                '<div class="form-group col-sm-5">'+
                    '<label for="title">Add a developer to this task</label>'+
                    '<select class="form-control task_member" name="task[module_name][][developer]" style="width: 100%;">';
    element+= '<option value="" disabled selected>Select or Search for a developer</option>';

    element+='<option value="'+managerId+'">'+managerName+'</option>';


    for (var key in members) {
        if (members.hasOwnProperty(key)) {
            element += '<option value="'+members[key].id+'">'+members[key].text+'</option>';
        }
    }
    element +=          '</select>'+
        '</div>'+
        '<div class="form-group col-sm-2 col-sm-offset-1">' +
            '<div class="developer_image_panel">' +
            '</div>' +
        '</div>'+
        '</div>'+
        '</div>'+
        '</div>';
    $(element)
        .appendTo($(this).parents('.box-module').find('.div-task'));//children('.box-body').last());

});


$('#btn_create').click(function(){

    $('.module-name').each(function(moduleIndex){
        var module_name=$(this).attr('name');
        module_name=module_name.replace('[]','['+moduleIndex+']')
        $(this).attr('name',module_name);

        var module_priority=$(this).parents('.box-module').find('.priority').attr('name');
        module_priority=module_priority.replace('[]','['+moduleIndex+']')
        $(this).parents('.box-module').find('.priority').attr('name',module_priority);

        var module_startdate=$(this).parents('.box-module').find('.startdate').attr('name');
        module_startdate=module_startdate.replace('[]','['+moduleIndex+']')
        $(this).parents('.box-module').find('.startdate').attr('name',module_startdate);

        var module_enddate=$(this).parents('.box-module').find('.enddate').attr('name');
        module_enddate=module_enddate.replace('[]','['+moduleIndex+']')
        $(this).parents('.box-module').find('.enddate').attr('name',module_enddate);

        $(this).parents('.box-module').find('.task-name').each(function(taskIndex){
            var task_name=$(this).attr('name');
            task_name=task_name.replace('module_name', moduleIndex);
            task_name=task_name.replace('[]', '['+taskIndex+']');
            $(this).attr('name',task_name);
        })
        //alert($(this).parents('.box-module').find('.task-name').attr('name'))
        $(this).parents('.box-module').find('.task_member').each(function(taskIndex){
            var task_member=$(this).attr('name');
            task_member=task_member.replace('module_name', moduleIndex);
            task_member=task_member.replace('[]', '['+taskIndex+']');
            $(this).attr('name',task_member);
        })
    })
})


$(document).on('click','button.module-edit',function(){
    var module_name=$(this).parent().children().children('input[type=text].module-name')
    if(!$(this).children().hasClass('fa-check')){
        $(this).children('.fa-edit').removeClass('fa-edit').addClass('fa-check');
        module_name.removeAttr('readonly').focus();
    }else{
        $(this).children('.fa-check').removeClass('fa-check').addClass('fa-edit');
        module_name.attr('readonly','true');
    }
})



$(document).on('click','button.task-edit',function(){
    var task_name=$(this).parent().children().children('input[type=text].task-name')
    if(!$(this).children().hasClass('fa-check')){
        $(this).children('.fa-edit').removeClass('fa-edit').addClass('fa-check');
       task_name.removeAttr('readonly').focus();
    }else{
        $(this).children('.fa-check').removeClass('fa-check').addClass('fa-edit');
        task_name.attr('readonly','true');
    }
})


$(document).on('click','button.remove-module',function(){
    $(this).parents('.box-module').remove();
})


$(document).on('click','button.remove-task',function(){
    $(this).parents('.box-task').remove();
})

$(document).on('change', 'select.priority', function () {
        var option= $(this).val();
        var module= $(this).parents('.box-module');
        var buttonTask = module.children().last().children().last().children().last();
        var boxtask=module.find('.box-task');

        if(option=='1'){
            module.addClass('box-danger').removeClass('box-primary box-warning box-info');
            $(this).css('color','#dd4b39');
            buttonTask.css('background-color','#dd4b39').css('border-color','#dd4b39').css('color','white');
            boxtask.addClass('box-danger').removeClass('box-primary box-warning box-info').css('color','white');
        }

        else if(option=='2'){
            module.addClass('box-warning').removeClass('box-primary box-danger box-info');
            $(this).css('color','#f39c12');
            buttonTask.css('background-color','#f39c12').css('border-color','#f39c12').css('color','white');
            boxtask.addClass('box-warning').removeClass('box-primary box-danger box-info').css('color','white');

        }else if(option=='3') {
            module.addClass('box-info').removeClass('box-primary box-warning box-danger').css('color','white');
            $(this).css('color', '#00c0ef');
            buttonTask.css('background-color','#00c0ef').css('border-color','#00c0ef').css('color','white');
            boxtask.addClass('box-info').removeClass('box-primary box-warning box-danger').css('color','white');

        }
});


$(document).on('click','.collapse-button',function(){
    var box = $(this).parents('.box-module');
    //Find the body and the footer
    var bf = box.find(".box-body, .box-footer ");
    if (!$(this).children().hasClass("fa-plus")) {
        $(this).children(".fa-minus").removeClass("fa-minus").addClass("fa-plus");
        bf.slideUp();
    } else {
        //Convert plus into minus
        $(this).children(".fa-plus").removeClass("fa-plus").addClass("fa-minus");
        bf.slideDown();
    }
});






