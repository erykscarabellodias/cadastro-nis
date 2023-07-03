<?php require_once __DIR__  . '/layouts/header.php' ?>

<form id="buscar-cidadao">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="my-3">
                <label for="codigoNis" class="form-label">Código NIS</label>
                <input type="text" minlength="11" maxlength="11" required class="form-control" id="codigoNis" placeholder="Digite o código NIS">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Buscar</button>
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
        $('#buscar-cidadao').submit(function(event) {
            event.preventDefault();

            const codigoNis = $('#codigoNis').val();

            $.ajax({
                url: `<?= $_ENV['URL_API'] . '?r=buscar-cidadao' ?>&codigoNis=${codigoNis}`,
                method: 'GET',
                dataType: 'json',

                beforeSend: function() {
                    exibirLoading();
                },

                success: function(response) {
                    ocultarLoading()

                    const nomeCompleto = response.nome_completo;

                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso',
                        html: `Cidadão encontrado:<br>` +
                            `Nome completo: <strong>${nomeCompleto}</strong>`
                    })

                    return;
                },

                error: function(error) {
                    ocultarLoading();

                    Swal.fire({
                        icon: 'error',
                        title: 'Erro',
                        html: `Houve um erro ao buscar o cidadão: ` +
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