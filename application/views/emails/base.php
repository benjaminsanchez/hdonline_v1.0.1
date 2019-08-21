		<?php $this->load->view('emails/header'); ?>
            <tr  style="background-color: #EAF1F5;">
                <td align="center" colspan="2" style="padding: 30px;">
                <table border="0">
                <tr><td>logo</td><td>
                    <div style="font-size: 24px; padding-bottom: 20px; text-align:left; color:#30383E"><strong>Francisco Urrutia,</strong><br> <span style="font-size: 16px;">Ha solicitado reestablecer contraseña desde <?php echo name_system(); ?></span></div>
                    <div style="border-top: 1px solid #DDDDDD; width: 270px; margin: 0 auto;"></div>
                    </td></tr></table>
                </td>
            </tr>
            <tr>
                <td align="left" colspan="2" style="padding: 0 30px 30px;">
                    <strong style="font-size: 15px;">Página de consulta:</strong> &lt;Página donde se Gatillo&gt;
                </td>
            </tr>
            <tr>
                <td align="left" colspan="2" style="padding: 0 30px 30px;">
                    <strong style="font-size: 15px;">Datos del Contacto:</strong><br><br>
                    Nombre: Miguel Salazar Velásquez<br>
                    Email: miguel.salazar@oqo.cl<br> 
                    Teléfono: (09) 65477477<br>
                    Comuna: Ñuñoa
                </td> 
            </tr>
            <tr>
                <td align="left" colspan="2" style="padding: 0 30px;">
                    <strong style="font-size: 15px;">Comentario:</strong><br><br>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                </td>
            </tr>
            <tr>
                <td align="left" colspan="2" style="padding: 30px;">
                    <strong style="font-size: 15px; text-align: left;">Favoritos:</strong><br>
                    <div style="font-size: 12px; margin-top: 10px; line-height: 16px; text-align: center; background-color: #fcffd7; padding: 10px;">Recuerda que Miguel Salazar ha marcado estos productos como favoritos y no está consultando por estos, te pueden ayudar a la hora de asesorarlo.</div>
                    <br>
                    <div style="font-size: 12px; float: left; text-align: center;">
                        <a href="#" style="color: #242424; text-decoration: none; text-align: center;"><img src="<?=base_url()?>images/email/favorito.jpg" width="120" height="130" border="0"><br>Nombre</a>
                    </div>
                    <div style="font-size: 12px; float: left; text-align: center;">
                    	<a href="#" style="color: #242424; text-decoration: none; text-align: center;"><img src="<?=base_url()?>images/email/favorito-2.jpg" width="120" height="130" border="0"><br>Nombre</a>
                    </div>
                    <div style="font-size: 12px; float: left; text-align: center;">
                    	<a href="#" style="color: #242424; text-decoration: none; text-align: center;"><img src="<?=base_url()?>images/email/favorito-3.jpg" width="120" height="130" border="0"><br>Nombre</a>
                    </div>
                    <br clear="all">
                </td>
            </tr>
        <?php $this->load->view('emails/footer'); ?>
