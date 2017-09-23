<div class="box">
    <div id="list" class="row"> 
        <?=showErrorHtml($erro);?>
        <?=showSuccessHtml($sucesso)?>
        <?=showInfoHtml($info)?>
        <div class="table-responsive col-md-12">
         <a href="<?=base_url('admin/links/cadastrar')?>" class="btn btn-primary pull-right h2">Novo Item</a>
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Icone</th>
                        <th>Site</th>
                        <th>Link</th>
                        <th>Data criação</th>
                        <th>Status</th>
                        <th>Tipo</th>
                        <th class="actions">Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php   foreach ($tuplas as $tupla) { ?>
                            <tr>
                                <td><?=$tupla->id?></td>
                                <td><?=(!empty($tupla->icone)) ? "<i class=\"fa {$tupla->icone}\">": '' ;?></td>
                                <td><?=$tupla->site?></td>
                                <td><?=$tupla->link?></td>
                                <td><?=dataHoraBrasileira($tupla->created_at)?></td>
                                <td><?=($tupla->tipo) ? 'INTERNO' : 'EXTERNO';?></td>
                                <td><?=($tupla->status) ? 'ATIVO' : 'INATIVO';?></td>
                                <td class="actions" WIDTH="200" HEIGHT="30">
                                    <a class="btn btn-success btn-xs pull-left" href="<?=base_url("admin/links/exibir/".$tupla->id);?>">Exibir</a>
                                    <form action="<?=base_url("links/editar");?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?=$tupla->id?>">
                                        <input type="submit" class="btn btn-warning btn-xs pull-left" value="Editar"/>
                                    </form>
                                    <form action="<?=base_url("links/excluir");?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?=$tupla->id?>">
                                        <input type="hidden" name="tipo" value="<?=$tupla->tipo?>">
                                        <input type="submit" class="btn btn-danger btn-xs pull-left" data-toggle="modal" data-target="#delete-modal" value="Excluir"/>
                                    </form>
                                </td>
                            </tr>
                <?php   } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php   if (!count($tuplas)) { ?>
                <div class="alert alert-info">Nenhum registro encontrado.</div>
    <?php   } ?>
</div>