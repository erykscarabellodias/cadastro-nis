<?php require_once __DIR__  . '/layouts/header.php' ?>

<form id="cadastrar-cidadao">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="my-3">
                <label for="nomeCompleto" class="form-label">Nome do cidadão</label>
                <input type="text" required class="form-control" id="nomeCompleto" placeholder="Digite o nome completo do cidadão">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </div>
    </div>
</form>
<div id="loading" style="display: none;">
    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Carregando...</span>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#cadastrar-cidadao').submit(function(event) {
            event.preventDefault();

            const nomeCompleto = $('#nomeCompleto').val();

            $.ajax({
                url: '<?= $_ENV['URL_API'] . '?r=cadastrar-cidadao' ?>',
                method: 'POST',
                data: {
                    nomeCompleto
                },
                dataType: 'json',

                beforeSend: function() {
                    exibirLoading();
                },

                success: function(response) {
                    ocultarLoading()

                    const nis = response.codigo_nis;

                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso',
                        text: `Cidadão cadastrado com com o NIS ${nis}`
                    })

                    return;
                },

                error: function(error) {
                    ocultarLoading();

                    Swal.fire({
                        icon: 'error',
                        title: 'Erro',
                        html: `Houve um erro ao cadastrar o cidadão: ` +
                            `<br>` +
                            `<strong>${error.responseJSON.message}.</strong>`
                    })
                }
            });
        });
    });

    function cadastrarCidadao(nomeCompleto) {

    }

    function exibirLoading() {
        $('#loading').show();
    }

    function ocultarLoading() {
        $('#loading').hide();
    }
</script>

<?php require_once __DIR__  . '/layouts/footer.php' ?>