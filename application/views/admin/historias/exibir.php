
<div class="box">
	<div id="list" class="row"> 
		<div class="table-responsive col-md-12">
			<?php   if (!count($historia)) {?>
                        <div class="alert alert-info">Hist�ria n�o encontrada.</div>
            <?php   } else { ?>
                        <p class="small"><?=dataHoraBrasileira($historia[0]->created_at,false)?></p>
                        <a href="">
                            <h5 class="media-heading"><strong><?=$historia[0]->titulo?></strong></h5>
                        </a>

                        <!-- <img src="<?=asset_url($template)?>imagens/logocbkb.png" class="img-responsive" alt="<?=$historia[0]->titulo?>"> -->
                        <br>

                        <p align="justify"><?=$historia[0]->conteudo?></p>
            <?php   } ?>
		</div>
	</div>
</div>