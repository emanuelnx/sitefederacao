<div class="content-wrapper">
    <div class="box">
        <a href="<?=base_url('admin/historias/cadastrar')?>" class="btn btn-primary pull-right h2">Novo Item</a>
        <div id="list" class="row"> 

            <div class="table-responsive col-md-12">
                <table class="table table-striped" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Título</th>
                            <!-- <th>Usuário</th> -->
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
                                        <!-- <td>Emanuel</td> -->
                                        <td><?=dataHoraBrasileira($historia->created_at)?></td>
                                        <td><?=($historia->status) ? 'ATIVO' : 'INATIVO';?></td>
                                        <td class="actions">
                                            <a class="btn btn-success btn-xs" href="view.html">Visualizar</a>
                                            <a class="btn btn-warning btn-xs" href="edit.html">Editar</a>
                                            <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
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
</div>