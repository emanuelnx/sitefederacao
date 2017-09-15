
    <div class="box">
        <div id="list" class="row"> 
            <?=showErrorHtml($erro);?>
            <?=showSuccessHtml($sucesso)?>
            <div class="table-responsive col-md-12">
             <a href="<?=base_url('admin/patrocinadores/cadastrar')?>" class="btn btn-primary pull-right h2">Novo Item</a>
                <table class="table table-striped" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Título</th>
                            <th>Subtítulo</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th class="actions">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php   foreach ($patrocinadores as $patrocinador) { ?>
                                <tr>
                                    <td><?=$patrocinador->id?></td>
                                    <td><?=$patrocinador->titulo?></td>
                                    <td><?=$patrocinador->subtitulo?></td>
                                    <td><?=dataHoraBrasileira($patrocinador->created_at)?></td>
                                    <td><?=($patrocinador->status) ? 'ATIVO' : 'INATIVO';?></td>
                                    <td class="actions" WIDTH="200" HEIGHT="30">
                                        <a class="btn btn-success btn-xs pull-left" href="<?=base_url("admin/patrocinadores/exibir/".$patrocinador->id);?>">Exibir</a>
                                        <form action="<?=base_url("patrocinadores/editar");?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?=$patrocinador->id?>">
                                            <input type="submit" class="btn btn-warning btn-xs pull-left" value="Editar"/>
                                        </form>
                                        <form action="<?=base_url("patrocinadores/excluir");?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?=$patrocinador->id?>">
                                            <input type="submit" class="btn btn-danger btn-xs pull-left" data-toggle="modal" data-target="#delete-modal" value="Excluir"/>
                                        </form>
                                    </td>
                                </tr>
                    <?php   } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php   if (!count($patrocinadores)) { ?>
                    <div class="alert alert-info">Sem patrocinadores cadastrados</div>
        <?php   } ?>
    </div>