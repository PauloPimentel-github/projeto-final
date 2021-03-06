<footer class="main-footer" id="contato">
    <section class="container">
        <nav>
            <h3 class="line_title"><span>Categorias:</span></h3>
            <ul>
                <li><a href="http://www.cruzeirodosul.edu.br/" title="Home">Conheça o curso</a></li>
                <li><a href="<?= HOME ?>/cadastra-empresa" title="Home">Cadastre Sua Empresa</a></li>
                <li><a href="https://pt-br.facebook.com/acruzeirodosul/" target="_blank" title="Home">Cruzeiro do Sul No Facebook</a></li>
                <li><a href="<?= HOME ?>" title="Home">Voltar ao início</a></li>
            </ul>
        </nav>

        <section>
            <h3 class="line_title"><span>Um resumo:</span></h3>
            <p>Este site foi desenvolvido por Paulo H.G. Pimentel.</p>
            <p>O mesmo utiliza toda técnologia semântica do HTML5 e foi criado com as últimas técnologias disponíveis.</p>
        </section>

        <section class="footer_contact">
            <h3 class="line_title"><span>Contato:</span></h3>

            <?php
            $Contato = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if($Contato && $Contato['SendFormContato']):
                unset($Contato['SendFormContato']);

                $Contato['Assunto'] = 'Mensagem via Site!';
                $Contato['DestinoNome'] = 'Paulo H.G Pimentel';
                $Contato['DestinoEmail'] = 'paulo.h.g.pimentel@gmail.com';

                $SendMail = new Email;
                $SendMail->Enviar($Contato);

                if($SendMail->getError()):
                    WSErro($SendMail->getError()[0], $SendMail->getError()[1]);
                endif;

            endif;
            ?>

            <form name="FormContato" action="#contato" method="post">
                <label>
                    <span>nome:</span>
                    <input type="text" title="Informe seu nome" name="RemetenteNome" required />
                </label>

                <label>
                    <span>e-mail:</span>
                    <input type="email" title="Informe seu e-mail" name="RemetenteEmail" required />
                </label>

                <label>
                    <span>mensagem:</span>
                    <textarea title="Envie sua mensagem" name="Mensagem" required rows="3"></textarea>
                </label>

                <input type="submit" value="Enviar" name="SendFormContato" class="btn">
            </form>
        </section>
        <div class="clear"></div>
    </section><!-- /container -->

    <div class="footer_logo">Cidade Online - Eventos, Promoções e Novidades!</div><!-- footer logo -->
</footer>
