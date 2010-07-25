jQuery(document).ready(function($) {
        function attachDeleteEvents(){
            $('.delete-task-form').ajaxForm({
                    beforeSubmit: startLoading,
                    success: function(response, status, xhr, form){
                        if (response){
                            var id = form.attr('id');
                            var task_id = id.split('-')[2];
                            $('#task-'+task_id).remove();
                        }
                        else{
                            //TODO - Do something here
                        }
                        endLoading();
                    }
                });
            $('.delete-task-form div.submit input').hover(function(){
                    $(this).attr('value', '☑');
                },
                function(){
                    $(this).attr('value', '☐');
                });
        }
        attachDeleteEvents();

        function startLoading(){
            //            $('#loading-gif').show();
        }
        function endLoading(){
            //            $('#loading-gif').hide();
        }
        $("#task-table ul.sortable, #new-task-list").sortable({
                connectWith: '.sortable',
                    receive: function(event, ui){
                    $(ui.item).removeClass('new-task').addClass('existing-task');
                    var task_id = parseInt($(ui.item).attr('id').split('-')[1]);
                    var id = $(event.target).attr('id');
                    var split_id = id.split('-');
                    var important = 0;
                    var urgent = 0;
                    $(split_id).each(function(){
                            var key_val = this.split(':');
                            if (key_val[0] == 'important'){
                                important = parseInt(key_val[1]);
                            }
                            else if (key_val[0] == 'urgent'){
                                urgent = parseInt(key_val[1]);
                            }
                        });
                    startLoading();
                    $.post('/tasks/move/'+task_id,
                           {'data': {'Task': {'important': important,'urgent': urgent}}},
                           function(response){
                               endLoading();
                               //TODO: do something here
                           });
                },
                    revert: 50,
                    scroll: false,
                    containment: 'div#container'

            }).disableSelection();
        $('#new-task-form').ajaxForm({
                beforeSubmit: startLoading,
                success: function(response){
                    if (response && response.success){
                        $('#new-task-list').append(response.html);
                    }
                    else{
                        alert('Something bad happened. soz like.');
                    }
                    attachDeleteEvents();
                    endLoading();
                }
            });
    });
