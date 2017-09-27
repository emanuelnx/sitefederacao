<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <div id="blog-post">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-1">
                    <div class="post-wrap">
                        <p class="small"><?=dataHoraBrasileira($tupla[0]->created_at,false)?></p>
                        <h5 class="media-heading"><strong><?=$tupla[0]->titulo?></strong></h5>

                        <ul class="list-inline metas pull-left">
                            <li><a href="#">por <?=$tupla[0]->usuario->login?></a></li>
                            <li><a href="#comments" class="scroll">0 Comentários</a></li>
                        </ul>

                        <img src="<?=$tupla[0]->imagem?>" width="800" height="500" class="img-responsive" alt="<?=$tupla[0]->titulo?>">

                        <p><?=$tupla[0]->conteudo?></p>
                    </div>

                    <div class="media post-author">
                        <div class="media-left media-middle">
                            <a href="#">
                              <img class="media-object" width="90" height="90" src="<?=asset_url()?>imagens/user.png" alt="foto do usuario">
                            </a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">Postado por <a href="#"><?=$tupla[0]->usuario->login?></a></h5>
                            Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
                        </div>
                    </div>

                    <div id="comments" class="comment">
                        <h4 class="text-uppercase">Comentários <span class="comments">(3)</span></h4>
                        <div class="media comment-block">
                            <div class="media-left media-top">
                                <a href="#">
                                  <img class="media-object" src="http://placehold.it/90x90" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <small class="pull-right">Feb. 15, 2015</small>
                                <h5 class="media-heading">Post by <a href="#">Rudhi Design</a></h5> 
                                <div class="clearfix"></div>
                                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
                                <div class="clearfix"></div>
                                <a href="#" class="pull-right text-uppercase">Reply</a>
                            </div>
                        </div>

                        <div class="media comment-block"> <!-- Comment Block #2 -->
                            <div class="media-left media-top">
                                <a href="#">
                                  <img class="media-object" src="http://placehold.it/90x90" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <small class="pull-right">Feb. 15, 2015</small>
                                <h5 class="media-heading">Post by <a href="#">Rudhi Design</a></h5> 
                                <div class="clearfix"></div>
                                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
                                <div class="clearfix"></div>
                                <a href="#" class="pull-right text-uppercase">Reply</a>
                            </div>
                        </div>

                        <div class="media comment-block"> <!-- Comment Block #3 -->
                            <div class="media-left media-top">
                                <a href="#">
                                  <img class="media-object" src="http://placehold.it/90x90" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <small class="pull-right">Feb. 15, 2015</small>
                                <h5 class="media-heading">Post by <a href="#">Rudhi Design</a></h5> 
                                <div class="clearfix"></div>
                                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
                                <div class="clearfix"></div>
                                <a href="#" class="pull-right text-uppercase">Reply</a>
                            </div>
                        </div>
                    </div>

                    <div class="comment">
                        <h4 class="text-uppercase">Deixe um comentário</h4>
                        <form id="contact-form" class="form">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Seu Nome">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Seu Email">
                                </div>
                            </div>
                            <textarea class="form-control" rows="6" placeholder="Seu Comentário..."></textarea>
                            <button type="submit" class="btn btn-default en-btn">Salvar Comentário</button>
                        </form>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="sidebar">

                        <div class="widget categories"> <!-- Category Widget -->
                            <h4 class="text-uppercase">Categorias</h4>
                            <ul class="list-unstyled bullet-lists">
                                <li><a href="#"><span class="fa fa-circle"></span> Filosofia</a></li>
                                <li><a href="#"><span class="fa fa-circle"></span> Academias</a></li>
                                <li><a href="#"><span class="fa fa-circle"></span> Pancadarias</a></li>
                                <li><a href="#"><span class="fa fa-circle"></span> Torneios</a></li>
                                <li><a href="#"><span class="fa fa-circle"></span> Histórias</a></li>
                                <li><a href="#"><span class="fa fa-circle"></span> Instrutores</a></li>
                            </ul>
                        </div>

                        <!-- <div class="widget archive">
                            <h4 class="text-uppercase">Archives</h4>
                            <ul class="list-unstyled bullet-lists">
                                <li><a href="#"><span class="fa fa-circle"></span> March 2015</a></li>
                                <li><a href="#"><span class="fa fa-circle"></span> February 2015</a></li>
                                <li><a href="#"><span class="fa fa-circle"></span> January 2015</a></li>
                                <li><a href="#"><span class="fa fa-circle"></span> December 2015</a></li>
                                <li><a href="#"><span class="fa fa-circle"></span> November 2015</a></li>
                                <li><a href="#"><span class="fa fa-circle"></span> October 2015</a></li>
                                <li><a href="#"><span class="fa fa-circle"></span> September 2015</a></li>
                            </ul>
                        </div> -->

                        <div class="widget post-tab">
                            <div role="tabpanel">

                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#popular" aria-controls="popular" role="tab" data-toggle="tab">Popular</a></li><!-- Popular Posts -->
                                    <li role="presentation"><a href="#recent" aria-controls="recent" role="tab" data-toggle="tab">Recent</a></li><!-- Recent Posts -->
                                    <li role="presentation"><a href="#comment" aria-controls="comment" role="tab" data-toggle="tab">Comment</a></li><!-- Comments -->
                                </ul>

                                <div class="tab-content"> 
                                    <div role="tabpanel" class="tab-pane active" id="popular"><!-- Popular Posts -->
                                        <div class="list-group">
                                            <a href="#" class="list-group-item">
                                                <p class="small">January 27, 2015</p>
                                                <h5 class="media-heading"><strong>Condimentum aliquam, mollit magna velit nec et scelerisque</strong></h5>
                                            </a>
                                            <a href="#" class="list-group-item">
                                                <p class="small">January 14, 2015</p>
                                                <h5 class="media-heading"><strong>Pellentesque vehicula. Eget sed, dapibus. Vel et scelerisque donec et</strong></h5>
                                            </a>
                                            <a href="#" class="list-group-item">
                                                <p class="small">Feb 12, 2015</p>
                                                <h5 class="media-heading"><strong>Et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                                            </a>
                                            <a href="#" class="list-group-item">
                                                <p class="small">January 14, 2015</p>
                                                <h5 class="media-heading"><strong>Scelerisque vestibulum Condimentum aliquam, mollit magna velit nec</strong></h5>
                                            </a>
                                            <a href="#" class="list-group-item">
                                                <p class="small">December 19, 2015</p>
                                                <h5 class="media-heading"><strong>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                                            </a>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="recent"><!-- Recent Posts -->
                                        <div class="list-group">
                                            <a href="#" class="list-group-item">
                                                <p class="small">January 14, 2015</p>
                                                <h5 class="media-heading"><strong>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                                            </a>
                                            <a href="#" class="list-group-item">
                                                <p class="small">January 14, 2015</p>
                                                <h5 class="media-heading"><strong>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                                            </a>
                                            <a href="#" class="list-group-item">
                                                <p class="small">January 14, 2015</p>
                                                <h5 class="media-heading"><strong>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                                            </a>
                                            <a href="#" class="list-group-item">
                                                <p class="small">January 14, 2015</p>
                                                <h5 class="media-heading"><strong>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                                            </a>
                                            <a href="#" class="list-group-item">
                                                <p class="small">January 14, 2015</p>
                                                <h5 class="media-heading"><strong>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                                            </a>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="comment"><!-- Comments -->
                                        <div class="list-group">
                                            <a href="#" class="list-group-item">
                                                <p class="small">Ms. Lijoy <strong>Comments</strong> on:</p>
                                                <h5 class="media-heading"><strong>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                                            </a>
                                            <a href="#" class="list-group-item">
                                                <p class="small">Coder Expert <strong>Comments</strong> on:</p>
                                                <h5 class="media-heading"><strong>Pellentesque vehicula. Eget sed, dapibus. Vel et scelerisque donec et</strong></h5>
                                            </a>
                                            <a href="#" class="list-group-item">
                                                <p class="small">Cool Design <strong>Comments</strong> on:</p>
                                                <h5 class="media-heading"><strong>Et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                                            </a>
                                            <a href="#" class="list-group-item">
                                                <p class="small">Mark Szuckerburg <strong>Comments</strong> on:</p>
                                                <h5 class="media-heading"><strong>Scelerisque vestibulum Condimentum aliquam, mollit magna velit nec</strong></h5>
                                            </a>
                                            <a href="#" class="list-group-item">
                                                <p class="small">Ruji <strong>Comments</strong> on:</p>
                                                <h5 class="media-heading"><strong>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="widget tags">
                            <h4 class="text-uppercase">Tags</h4>
                            <ul class="list-inline bullet-lists">
                                <li><a href="#">web design</a></li>
                                <li><a href="#">business</a></li>
                                <li><a href="#">psd design</a></li>
                                <li><a href="#">themeforest</a></li>
                                <li><a href="#">wordpress</a></li>
                                <li><a href="#">responsive</a></li>
                                <li><a href="#">bootstrap</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>