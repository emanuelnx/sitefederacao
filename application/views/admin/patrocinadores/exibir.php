
<div class="box">
	<div id="list" class="row"> 
		<div class="table-responsive col-md-12">
			<?php   if (!count($patrocinador)) {?>
                        <div class="alert alert-info">História não encontrada.</div>
            <?php   } else { ?>
                        <p class="small"><?=dataHoraBrasileira($patrocinador[0]->created_at,false)?></p>
                        <h5 class="media-heading"><strong><?=$patrocinador[0]->titulo?></strong></h5>
                        <p align="justify"><?=$patrocinador[0]->subtitulo?></p>

                        <!-- <img src="<?=asset_url($template)?>imagens/logocbkb.png" class="img-responsive" alt="<?=$patrocinador[0]->titulo?>"> -->
                        <br>

                        <p align="justify"><?=$patrocinador[0]->conteudo?></p>
            <?php   } ?>
		</div>
	</div>
</div>