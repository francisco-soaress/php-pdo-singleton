<div class="container-modal">
    <div class="content-modal">
        <img class="img-100" src="<?= $imgPath; ?>ajaxloading.gif" alt="Cadastrando usuário" title="Cadastrando usuário" />
        <p>Enviando...</p>
    </div>
</div>

<div class="container-success">
    <div class="content-success">
        <div class="modal-close">x</div>
        <div class="modal-title"></div>
        <p></p>
        </>
    </div>
</div>
<div class="container-error">
    <div class="content-error">
        <div class="modal-close">x</div>
        <div class="modal-title"></div>
        <p></p>
    </div>
</div>
<div class="container-form">
    <div class="content-form">
        <div class="modal-close">x</div>
        <form method="POST" action="" class="send_form">

            <input type="hidden" name="key-form" value="form-edit">

            <label>
                <input type="text" class="value_name" name="name" value="" required>
            </label>
            <label>
                <input type="email" class="value_email" name="email" value="" required>
            </label>
            <label>
                <select name="sexo" class="value_sexo" required>
                    <option value="masculino" selected>Masculino</option>
                    <option value="feminino">Feminino</option>
                </select>
            </label>
            <button class="bt-blue box-transition">Atualizar</button>
        </form>
    </div>
</div>