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

            <form method="post" action="<?php echo base_url('admin/request_password');?>">
              <h1><img src="<?php echo base_url('assets/admin/images/logo.png');?>" alt="logo"></h1>
              <?php
	          	if(!empty($data)){
	          		echo $data['error_message'];
	          	}
	          	?>
              <div>
                <input type="text" class="form-control" placeholder="Email" required="" name="u_email" />
              </div>
              <div class="text-center">
                <input type="submit" class="btn btn-default submit" value="Submit">
              </div>

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