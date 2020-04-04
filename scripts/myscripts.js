$(document).ready(function() {
    // Sự kiện đăng nhập
    $("#fLogin #btnLogin").click(function() {
        $("#login_msg").html('<div class="loading"><img src="templates/images/loading.gif" /></div>');
        var user = $("#txtUser").val();
        var pass = $("#txtPass").val();
        $.ajax({
            "url": "login.php",
            "type": "post",
            "async": true,
            "data": "user="+user+"&pass="+pass,
            "success": function(kq_login) {
                if (kq_login == 'Miss') {
                    $("#login_msg").html('<div class="error_msg">Vui lòng nhập đầy đủ thông tin</div>');
                } else if (kq_login == 'Wrong') {
                    $("#login_msg").html('<div class="error_msg">Sai thông tin đăng nhập</div>');
                } else {
                    $("#login_msg").html(kq_login);
                    // Reset form
                    document.fLogin.reset();
                    // ẩn form đăng nhập
                    $("#fLogin").fadeOut(300);

                    // Xóa bỏ nội dung vùng comment_msg, cho hiện vùng comment_element
                    $("#comment_msg").empty();
                    $("#comment_element").fadeIn(300);
                }
            }
        });
        return false;
    });

    // Sự kiện đăng xuất
    $(document).on("click", "input[name=btnLogout]", function() {
        $.ajax({
            "url": "logout.php",
            "type": "get",
            "async": true,
            "success": function(kq_logout) {
                if (kq_logout == 'Finish') {
                    $("#login_msg").empty();
                    $("#fLogin").fadeIn(300);

                    // Cập nhật nội dung vùng comment_msg, cho ẩn vùng comment_element
                    $("#comment_msg").html('Vui lòng đăng nhập để bình luận cho bản tin');
                    $("#comment_element").fadeOut(300);
                }
            }
        });
        return false;
    });

    // Sự kiện comment
    $("#fComment #btnComment").click(function() {
        $("#comment_msg").html('<img src="templates/images/loading.gif" />');
        var content = $("#txtComment").val();
        var newsid = $("input[name=newsid]").val();
        $.ajax({
            "url": "comment.php",
            "type": "post",
            "async": true,
            "data": "content="+content+"&newsid="+newsid,
            "success": function(kq_comment) {
                if (kq_comment == 'Miss') {
                    $("#comment_msg").html('Vui lòng nhập đầy đủ thông tin');
                } else {
                    $("#comment_content").html(kq_comment);
                    // Xóa form comment
                    document.fComment.reset();
                    // Xóa nội dung vùng thông báo
                    $("#comment_msg").empty();
                }
            }
        });
        return false;
    });

    // Sự kiện đăng ký
    $("#fSignin #btnSignin").click(function() {
        //alert(2);
        var user = $("#signin_userName").val();
        var pass = $("#signin_userPass").val();
        var repass = $("#signin_userRePass").val();
        var email = $("#signin_userEmail").val();
        var tel = $("#signin_usertel").val();
        $.ajax({
            "url": "signin.php",
            "type": "post",
            "async": true,
            "data": "user="+user+"&pass="+pass+"&repass="+repass+"&email="+email+"&tel="+tel,
            "success": function(kq_signin) {
                if (kq_signin == 'Miss') {
                    $("#signin_msg").html('<div class="error_msg">Vui lòng nhập đầy đủ thông tin</div>');
                }
                else if (kq_signin == 'Duplicate') {
                    $("#signin_msg").html('<div class="error_msg">Vui lòng chọn email khác</div>');
                }
                else if (kq_signin == 'PwError') {
                    $("#signin_msg").html('<div class="error_msg">Mật khẩu không khớp</div>');
                } else {
                    $("#signin_msg").html(kq_signin);
                    // Reset form
                    document.fLogin.reset();
                }
            }
        });
        return false;
    });
});
