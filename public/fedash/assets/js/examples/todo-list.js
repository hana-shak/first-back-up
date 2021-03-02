new Quill('.todo-textarea-editor', {
    modules: {
        toolbar: ".todo-textarea-toolbar"
    },
    placeholder: "Type something... ",
    theme: "snow"
});
new Quill('.todo-textarea-editor2', {
    modules: {
        toolbar: ".todo-textarea-toolbar2"
    },
    placeholder: "Type something... ",
    theme: "snow"
});

$(function () {
    $(document).on('click', '.app-block .app-content .app-action .action-left input[type="checkbox"]', function () {
        $('.app-lists ul li input[type="checkbox"]').prop('checked', $(this).prop('checked'));
        if ($(this).prop('checked')) {
            $('.app-lists ul li input[type="checkbox"]').closest('li').addClass('active');
        } else {
            $('.app-lists ul li input[type="checkbox"]').closest('li').removeClass('active');
        }
    });

    $(document).on('click', '.app-block .app-content .app-content-body .app-lists ul.list-group li.list-group-item', function (e) {
        var url = $(this).data('url'),
            target = e.target;
        if (target.nodeName != 'INPUT' && target.nodeName != 'LABEL' && !$(target).hasClass('add-star') && !$(target).hasClass('app-sortable-handle')) {
            $('#todoDetail').modal('show');
        }
    });

    $('#editTaskModal, #newTaskModal').on('show.bs.modal', function (e) {
        $('#todoDetail').modal('hide');
    });

    $(document).on('click', '.app-lists ul li input[type="checkbox"]', function () {
        if ($(this).prop('checked')) {
            $(this).closest('li').addClass('active');
        } else {
            $(this).closest('li').removeClass('active');
        }
    });

    $(document).on('click', '.app-sidebar-menu-button', function () {
        $('.app-block .app-sidebar').addClass('show');
        $.createOverlay();
        return false;
    });

    $('.app-block .app-content .app-content-body .app-lists ul').sortable({
        axis: "y",
        cursor: "move",
        handle: '.app-sortable-handle'
    }).disableSelection();
});
