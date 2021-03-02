new Quill('.compose-quill-editor', {
    modules: {
        toolbar: ".compose-quill-toolbar"
    },
    placeholder: "Type something... ",
    theme: "snow"
});

new Quill('.mail-reply-editor', {
    modules: {
        toolbar: ".mail-reply-editor-toolbar"
    },
    placeholder: "Type something... ",
    theme: "snow"
});

$(function () {
    $(document).on('click', '#selectAllMail', function () {
        $('.app-lists ul li input[type="checkbox"]').prop('checked', $(this).prop('checked'));
        if ($(this).prop('checked')) {
            $('#selectedMailActions').removeClass('d-none');
            $('.app-lists ul li input[type="checkbox"]').closest('li').addClass('active');
        } else {
            $('#selectedMailActions').addClass('d-none');
            $('.app-lists ul li input[type="checkbox"]').closest('li').removeClass('active');
        }
    });

    $(document).on('click', '.app-block .app-content .app-content-body .app-lists ul.list-group li.list-group-item', function (e) {
        var url = $(this).data('url'),
            target = e.target;
        if (target.nodeName != 'INPUT' && target.nodeName != 'LABEL' && !$(target).hasClass('add-star') && !$(target).hasClass('app-sortable-handle')) {
            $('#mailDetail').modal('show');
        }
    });

    $(document).on('click', '.app-lists ul li input[type="checkbox"]', function () {
        if ($(this).prop('checked')) {
            $(this).closest('li').addClass('active');
        } else {
            $(this).closest('li').removeClass('active');
        }
        if ($('.app-lists ul li input[type="checkbox"]:checked').length == 0) {
            $('#selectedMailActions').addClass('d-none');
        } else {
            $('#selectedMailActions').removeClass('d-none');
        }
    });

    $(document).on('click', '.app-sidebar-menu-button', function () {
        $('.app-block .app-sidebar').addClass('show');
        $.createOverlay();
        return false;
    });
});
