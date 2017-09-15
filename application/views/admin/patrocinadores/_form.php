
<div class="box">
    <?=showErrorHtml($erro);?>
    <div class="box-header">
        <h3 class="box-title">CADASTRO DE PATROCINADOR</h3>
        <br>
        <div class="pull-right box-tools">
            <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body pad">
        <form method="post" action="<?=$action?>">
            <input type="hidden" name="id" value="<?=(isset($patrocinador[0]->id)) ? $patrocinador[0]->id : '';?>">
            <div class="form-group">
                <label>Título</label>
                <input type="text" name="titulo" class="form-control" value="<?=(isset($patrocinador[0]->titulo)) ? $patrocinador[0]->titulo : '';?>" placeholder="Insira um título para o patrocinador">
            </div>
            <div class="form-group">
                <label>Subtítulo</label>
                <input type="text" name="subtitulo" class="form-control" value="<?=(isset($patrocinador[0]->titulo)) ? $patrocinador[0]->titulo : '';?>" placeholder="Insira um subtítulo para o patrocinador">
            </div>
            <div class="form-control">
                <label>Status</label>
                <input type="radio" name="status" value="1" <?=is_checked('1', $patrocinador[0]->status, TRUE);?> >Ativo
                <input type="radio" name="status" value="0" <?=is_checked('0', $patrocinador[0]->status);?> >Inativo
            </div>
            <textarea class="textarea" name="conteudo" placeholder="Insira o conteúdo da história" style="width: 100%; height: 800px; font-size: 14px; line-height: 18px; border: 2px solid #dddddd; padding: 10px;"><?=(isset($patrocinador[0]->conteudo)) ? $patrocinador[0]->conteudo : '';?></textarea>
            <input type="submit" class="btn btn-info" value="<?=$btnSubmit?>">
        </form>
    </div>
</div>