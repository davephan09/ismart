


$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var height = $(window).height() - $('#footer-wp').outerHeight(true) - $('#header-wp').outerHeight(true);
    $('#content').css('min-height', height);

    //  CHECK ALL
    $('input[name="checkAll"]').click(function () {
        var status = $(this).prop('checked');
        $('.list-table-wp tbody tr td input[type="checkbox"]').prop("checked", status);
    });

    // EVENT SIDEBAR MENU
    $('#sidebar-menu .nav-item .nav-link .title').after('<span class="fa fa-angle-right arrow"></span>');
    var sidebar_menu = $('#sidebar-menu > .nav-item > .nav-link');
    sidebar_menu.on('click', function () {
        if (!$(this).parent('li').hasClass('active')) {
            $('.sub-menu').slideUp();
            $(this).parent('li').find('.sub-menu').slideDown();
            $('#sidebar-menu > .nav-item').removeClass('active');
            $(this).parent('li').addClass('active');
            return false;
        } else {
            $('.sub-menu').slideUp();
            $('#sidebar-menu > .nav-item').removeClass('active');
            return false;
        }
    });

    // Upload multiple File AJAX
    $("#add-file").click(function () {
        $('#files').append("<input type='file' name='files[]' id='upload-multiple-thumb'> <div id='image-show'></div> <input type='hidden' name='thumb[]' id='thumb'>");
    });

    $("#multiFiles").change(function () {
        const formData = new FormData();
        let TotalFiles = $('#multiFiles')[0].files.length; //Total files
        let files = $('#multiFiles')[0];
        for (let i = 0; i < TotalFiles; i++) {
            formData.append('files' + i, files.files[i]);
        }
        formData.append('TotalFiles', TotalFiles);

        $.ajax({
            type: 'POST',
            datatype: 'JSON',
            data: formData,
            cache:false,
            processData: false,
            contentType: false,
            url: '/admin/uploads/services',
            success: function (results) {
                if (results.error == false) {
                    results.thumbs.forEach(thumb => {
                        document.getElementById('files').insertAdjacentHTML("beforeend", ('<div id="image-show"><a href="' + thumb +
                        '" target="_blank">' + '<img src="' + thumb + '" width="100px"></a></div>' 
                        + '<input type="hidden" name="thumb[]" value="' + thumb + '" id="thumb">'));
                    });
                    alert('Upload Files thành công!');
                } else {
                    alert('Upload File Lỗi!');
                }
            },
        });
    });


    // Upload File AJAX
    $("#upload-thumb").change(function () {
        const form = new FormData();
        form.append('file', $(this)[0].files[0]);

        $.ajax({
            type: 'POST',
            datatype: 'JSON',
            data: form,
            processData: false,
            contentType: false,
            url: '/admin/upload/services',
            success: function (results) {
                if (results.error == false) {
                    $("#image-show").html('<a href="' + results.url + '" target="_blank">' +
                        '<img src="' + results.url + '" width="100px"></a>');
                    $("#thumb").val(results.url);
                } else {
                    alert('Upload File Lỗi!');
                }
            },
        });
    });

});

// Remove Row AJAX
function removeRow(id, url) {
    if (confirm('Bạn có muốn xóa không?')) {
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: { id },
            url: url,
            success: function (result) {
                if (result.error == false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Lỗi! Vui lòng thử lại');
                }
            }
        });
    }
}