<div class="px-3 py-2 border-bottom mb-3">
    <div class="container d-flex flex-wrap justify-content-center">
        <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto"
              action="<?php echo URL; ?>buscar">
        <input type="search" name="s" class="form-control" placeholder="Procurar..."
               aria-label="Procurar">
        </form>

        <div class="text-end">
            <a href="<?php echo URL; ?>vendas/importar">
                <button type="button" class="btn btn-outline-primary">
                    <span style="vertical-align: inherit;">
                        <span style="vertical-align: inherit;">IMPORTAR VENDAS</span>
                    </span>
                </button>
            </a>
            <a href="<?php echo URL; ?>vendas/incluir">
                <button type="button" class="btn btn-success">
                    <span style="vertical-align: inherit;">
                        <span style="vertical-align: inherit;">INCLUIR NOVA VENDA</span>
                    </span>
                </button>
            </a>
        </div>
    </div>
</div>


