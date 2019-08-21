		<?php $this->load->view('emails/header'); ?>
            <tr  style="background-color: #EAF1F5;">
                <td align="center" colspan="2" style="padding: 20px;">
                <table border="0" width="100%">
                <tr><td style="padding:0px 15px">  <img src="<?php echo base_url(); ?>assets/custom/img/icons/alert-icon-48.png"   alt=""/> </td><td>
                    <div style="font-size: 24px; padding-bottom: 20px; text-align:left; color:#30383E; padding-top:20px"><strong><?php echo @$nombre; ?>,</strong><br> <span style="font-size: 16px;"><?php echo $texto_abajo_nombre; ?></span></div>
                    </td></tr></table>
                </td> 
            </tr>
            <tr>
                <td align="left" colspan="2" style="padding: 35px">
                <span style="font-size:15px"><?php echo @$texto; ?>
                </span>
                   
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2" style="padding: 10px 30px 30px;">
                    <strong style="font-size: 15px; text-align: left;">  <br>
         </strong><br>
                    <a href="<?php echo @$url_btn; ?>" style="font-size: 14px; margin-top: 10px; line-height: 20px; text-align: center; background-color: #59A8D2; padding: 15px 20px; width:200px; text-decoration:none; color:#FFF"><?php echo @$texto_boton; ?></a>
                    <br>
                   
                    <br clear="all">
                </td>
            </tr>
        <?php $this->load->view('emails/footer'); ?>
