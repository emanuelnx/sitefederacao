
<div class="box">
    <?=showErrorHtml($erro);?>
    <div class="box-header">
        <h3 class="box-title"><?=strtoupper($objetivo)?> NOTÍCIA</h3>
        <br>
        <div class="pull-right box-tools">
            <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body pad">
        <form method="post" action="<?=$action?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=(isset($tupla[0]->id)) ? $tupla[0]->id : '';?>">
            <div class="form-group">
                <label>Título</label>
                <input type="text" <?=inputEnviaOuExibir('titulo',$objetivo)?> class="form-control" value="<?=(isset($tupla[0]->titulo)) ? $tupla[0]->titulo : '';?>" placeholder="Insira um título">
            </div>
            <div class="form-control">
                <label>Status</label>
                <input type="radio" <?=inputEnviaOuExibir('status',$objetivo,'chk')?> value="1" <?=is_checked('1', $tupla[0]->status, TRUE);?> >Ativo
                <input type="radio" <?=inputEnviaOuExibir('status',$objetivo,'chk')?> value="0" <?=is_checked('0', $tupla[0]->status);?> >Inativo
            </div>
            <textarea id="conteudo" class="textarea col-md-12" <?=inputEnviaOuExibir('conteudo',$objetivo)?> placeholder="Insira o conteúdo" rows="10" cols="80"><?=(isset($tupla[0]->conteudo)) ? $tupla[0]->conteudo : '';?></textarea>
            <br>
            <?php   if ($objetivo == 'exibir'): ?>
                        <div><img src="<?=$imagem?>"></div>
                        <a href="<?=base_url('admin/patrocinadores')?>" class="btn btn-info">Voltar</a>
            <?php   else: ?>
                        <div class="form-group">
                            <input type="file" name="userfile" size="20" />
                        </div>
                        <input type="submit" class="btn btn-info" value="<?=ucfirst($objetivo)?>">
            <?php   endif; ?>
        </form>
    </div>
</div>