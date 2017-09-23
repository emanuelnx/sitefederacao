<div class="box">
    <?=showErrorHtml($erro);?>
    <div class="box-header">
        <h3 class="box-title"><?=strtoupper($objetivo)?> LINK</h3>
        <br>
        <div class="pull-right box-tools">
            <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body pad">
        <form method="post" action="<?=$action?>">
            <input type="hidden" name="id" value="<?=(isset($tupla[0]->id)) ? $tupla[0]->id : '';?>">
            <div class="form-group">
                <label>Nome do site</label>
                <input type="text" <?=inputEnviaOuExibir('site',$objetivo)?> class="form-control" value="<?=(isset($tupla[0]->site)) ? $tupla[0]->site : '';?>" placeholder="Insira um nome para o site">
            </div>
            <div class="form-group">
                <label>Link do site</label>
                <input type="text" <?=inputEnviaOuExibir('link',$objetivo)?> class="form-control" value="<?=(isset($tupla[0]->link)) ? $tupla[0]->link : '';?>" placeholder="Insira um link para o site">
            </div>
            <div class="form-group">
                <label>icone <span><a href="http://fontawesome.io/icons/#search-input" target="blank">Visualizar icones</a></span></label>
                <input type="text" <?=inputEnviaOuExibir('icone',$objetivo)?> class="form-control" value="<?=(isset($tupla[0]->icone)) ? $tupla[0]->icone : '';?>" placeholder="Insira um link para o site">
            </div>
            <div class="form-control">
                <label>Tipo</label>
                <input type="radio" <?=inputEnviaOuExibir('tipo',$objetivo,'chk')?> value="1" <?=is_checked('1', $tupla[0]->tipo, TRUE);?> >Interno
                <input type="radio" <?=inputEnviaOuExibir('tipo',$objetivo,'chk')?> value="0" <?=is_checked('0', $tupla[0]->tipo);?> >Externo
            </div>
            <br>
            <div class="form-control">
                <label>Status</label>
                <input type="radio" <?=inputEnviaOuExibir('status',$objetivo,'chk')?> value="1" <?=is_checked('1', $tupla[0]->status, TRUE);?> >Ativo
                <input type="radio" <?=inputEnviaOuExibir('status',$objetivo,'chk')?> value="0" <?=is_checked('0', $tupla[0]->status);?> >Inativo
            </div>
            <br>
            <?php   if ($objetivo == 'exibir'): ?>
                        <a href="<?=base_url('admin/links')?>" class="btn btn-info">Voltar</a>
            <?php   else: ?>
                        <input type="submit" class="btn btn-info" value="<?=ucfirst($objetivo)?>">
            <?php   endif; ?>
        </form>
    </div>
</div>