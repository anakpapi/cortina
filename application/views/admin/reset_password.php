<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// var_dump($data);
?><body class="login">
	<div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">

            <form method="post" action="<?php if(!empty($data['randid']) && !empty($data['userid'])){echo base_url('admin/reset_password/'.$data['randid'].'/'.$data['userid']);}?>">
              <h1><img src="<?php echo base_url('assets/admin/images/logo.png');?>" alt="logo"></h1>
              <?php
	          	if(!empty($data['error_message'])){
	          		echo $data['error_message'];
	          	}else{
                if(!empty($data['error_message2'])){
                  echo $data['error_message2'];
                }
	          	?>
              <div>
                <input type="password" class="form-control" placeholder="New Password" required="" name="u_enc_pwd" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Confirm New Password" required="" name="u_confirm_pwd" />
              </div>
              <div class="text-center">
                <input type="submit" class="btn btn-default submit" value="Log in">
              </div>
              <?php }?>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <p>©2018 All Rights Reserved</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        
      </div>
    </div>
</body>