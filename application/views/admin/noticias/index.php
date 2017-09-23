
    <div class="box">
        <div id="list" class="row"> 
            <?=showErrorHtml($erro);?>
            <?=showSuccessHtml($sucesso)?>
            <div class="table-responsive col-md-12">
             <a href="<?=base_url('admin/noticias/cadastrar')?>" class="btn btn-primary pull-right h2">Novo Item</a>
                <table class="table table-striped" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Título</th>
                            <th>Conteúdo</th>
                            <th>Data</th>
                            <th>Acessos</th>
                            <th>Aprovacao</th>
                            <th>Status</th>
                            <th class="actions">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php   foreach ($tuplas as $tupla) { ?>
                                <tr>
                                    <td><?=$tupla->id?></td>
                                    <td><?=$tupla->titulo?></td>
                                    <td><?=$tupla->conteudo?></td>
                                    <td><?=dataHoraBrasileira($tupla->created_at)?></td>
                                    <td><?=$tupla->acessos?></td>
                                    <td><?=$tupla->aprovacao?></td>
                                    <td><?=($tupla->status) ? 'ATIVO' : 'INATIVO';?></td>
                                    <td class="actions" WIDTH="200" HEIGHT="30">
                                        <a class="btn btn-success btn-xs pull-left" href="<?=base_url("admin/noticias/exibir/".$tupla->id);?>">Exibir</a>
                                        <form action="<?=base_url("noticias/editar");?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?=$tupla->id?>">
                                            <input type="submit" class="btn btn-warning btn-xs pull-left" value="Editar"/>
                                        </form>
                                        <form action="<?=base_url("noticias/excluir");?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?=$tupla->id?>">
                                            <input type="submit" class="btn btn-danger btn-xs pull-left" data-toggle="modal" data-target="#delete-modal" value="Excluir"/>
                                        </form>
                                    </td>
                                </tr>
                    <?php   } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php   if (!count($tuplas)) { echo showInfoHtml('Sem registros cadastrados');} ?>
    </div>