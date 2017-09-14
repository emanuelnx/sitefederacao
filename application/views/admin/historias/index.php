
    <div class="box">
        <div id="list" class="row"> 
            <?=showErrorHtml($erro);?>
            <?=showSuccessHtml($sucesso)?>
            <div class="table-responsive col-md-12">
             <a href="<?=base_url('admin/historias/cadastrar')?>" class="btn btn-primary pull-right h2">Novo Item</a>
                <table class="table table-striped" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Título</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th class="actions">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php   foreach ($historias as $historia) { ?>
                                <tr>
                                    <td><?=$historia->id?></td>
                                    <td><?=$historia->titulo?></td>
                                    <td><?=dataHoraBrasileira($historia->created_at)?></td>
                                    <td><?=($historia->status) ? 'ATIVO' : 'INATIVO';?></td>
                                    <td class="actions" WIDTH="200" HEIGHT="30">
                                        <a class="btn btn-success btn-xs pull-left" href="<?=base_url("admin/historias/exibir/".$historia->id);?>">Exibir</a>
                                        <form action="<?=base_url("historias/editar");?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?=$historia->id?>">
                                            <input type="submit" class="btn btn-warning btn-xs pull-left" value="Editar"/>
                                        </form>
                                        <form action="<?=base_url("historias/excluir");?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?=$historia->id?>">
                                            <input type="submit" class="btn btn-danger btn-xs pull-left" data-toggle="modal" data-target="#delete-modal" value="Excluir"/>
                                        </form>
                                    </td>
                                </tr>
                    <?php   } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php   if (!count($historias)) { ?>
                    <div class="alert alert-info">Sem histórias cadastradas</div>
        <?php   } ?>
    </div>