$(function () {

    var urlLocation = window.location.href;

    /* Update user */
    $(".send_form_update").on("submit", function (e) {
        e.preventDefault();

        var updateData = $(this).serialize();

        $.ajax({
            url: urlLocation + "App/Send/send-form.php",
            data: updateData,
            type: "POST",
            dataType: "json",
            beforeSend: function () {
                $(".container-modal").fadeIn(800).css("display", "flex");
            },
            success: function (data) {
                console.clear();
                console.log(data);

                if (data[0]) {
                    console.log(data[2]);
                    window.setTimeout(function () {
                        $(".container-modal").fadeOut(function () {
                            $(".container-form").fadeIn(function(){
                                $("form .value_name").val(data[1]);
                                $("form .value_email").val(data[2]);
                                $("form .value_sexo").val(data[3]);
                                $(".modal-close").on("click", function () {
                                    $(".container-form").fadeOut();
                                });
                            }).css("display", "flex");
                        });
                    }, 500);
                }
                if (data.error) {
                    $(".container-modal").fadeOut(function () {
                        $(".container-error").fadeIn(function () {
                            $(".content-error .modal-title").text("Erro ao tentar atualizar os dados do usuário :(");
                            $(".content-error p").text("Por favor, tente novamente mais tarde!!!");
                            $(".modal-close").on("click", function () {
                                $(".container-error").fadeOut();
                            });
                        }).css("display", "flex");
                    });
                }
            },
            error: function(){
                $(".container-modal").fadeOut(function () {
                    $(".container-error").fadeIn(function () {
                        $(".content-error .modal-title").text("Erro ao tentar atualizar os dados do usuário :(");
                        $(".content-error p").text("Por favor, tente novamente mais tarde!!!");
                        $(".modal-close").on("click", function () {
                            $(".container-error").fadeOut();
                        });
                    }).css("display", "flex");
                });
            }
        });

    });
    /* Delete user */
    $(".send_form_delete").on("submit", function (e) {
        e.preventDefault();

        var deleteData = $(this).serialize();
        var urlDelete = window.location.href;

        /* AJAX - Enviado dados do formulário */
        $.ajax({
            url: urlDelete + "App/Send/send-form.php",
            data: deleteData,
            type: "POST",
            dataType: "json",
            beforeSend: function () {
                $(".container-modal").fadeIn(800).css("display", "flex");
            },
            success: function (data) {
                console.clear();
                console.log(data);

                if (data.success) {
                    window.setTimeout(function () {
                        $(".container-modal").fadeOut(function () {
                            $(".container-success").fadeIn(function () {
                                $(".content-success .modal-title").text("Uhulll!!!");
                                $(".content-success p").text("Usuário excluido com sucesso.");
                                $(".modal-close").on("click", function () {
                                    window.location.href = urlDelete;
                                });
                            }).css("display", "flex");
                        });
                    }, 500);
                }

                if (data.error) {
                    $(".container-modal").fadeOut(function () {
                        $(".container-error").fadeIn(function () {
                            $(".content-error .modal-title").text("Erro ao excluir o usuário :(");
                            $(".content-error p").text("Por favor, tente novamente mais tarde!!!");
                            $(".modal-close").on("click", function () {
                                $(".container-error").fadeOut();
                            });
                        }).css("display", "flex");
                    });
                }
            }
        });
        return false;
    });
    /* Delete user */
    /* Register user */
    $(".send_form").on("submit", function () {

        var dados = $(this).serialize();
        var url = window.location.href;

        /* AJAX - Enviado dados do formulário */
        $.ajax({
            url: url + "App/Send/send-form.php",
            data: dados,
            type: "POST",
            dataType: "json",
            beforeSend: function () {
                $(".container-modal").fadeIn(800).css("display", "flex");
            },
            success: function (data) {
                console.clear();
                console.log(data);

                if (data.success) {
                    window.setTimeout(function () {
                        $(".container-modal").fadeOut(function () {
                            $(".container-success").fadeIn(function () {
                                $(".content-success .modal-title").text("Uhulll!!!!");
                                $(".content-success p").text("Cadastro efetuado com Sucesso!!!");
                                $(".modal-close").on("click", function () {
                                    window.location.href = url;
                                });
                            }).css("display", "flex");
                        });
                    }, 500);
                }

                if (data.error) {
                    $(".container-modal").fadeOut(function () {
                        $(".container-error").fadeIn(function () {
                            $(".content-error .modal-title").text("Algo deu errado :(");
                            $(".content-error p").text("Erro ao cadastrar, tente novamente ou entre em contato com nossa equipe!");
                            $(".modal-close").on("click", function () {
                                $(".container-error").fadeOut();
                            });
                        }).css("display", "flex");
                    });
                }
            }

        });

        // console.log(url);

        return false;
    });
    /* Register user */
});