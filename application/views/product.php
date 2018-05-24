<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// opening div is in common/left_panel.php
$current_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$action = $this->uri->segment(2);

?>

    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
            <?php
            switch ($action) {
            	case 'add':
            	?>
        		<div class="x_title">
					<h2>Product</h2>
					<div class="clearfix"></div>
				</div>

				<div class="x_content">
					<form class="form-horizontal form-label-left" novalidate>

                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Confirm Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email2" name="confirm_email" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="number" name="number" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Website URL <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="url" id="website" name="website" required="required" placeholder="www.website.com" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Occupation <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="occupation" type="text" name="occupation" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="telephone" name="phone" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Textarea <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="textarea" required="required" name="textarea" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                        	<button id="send" type="submit" class="btn btn-primary">Save</button>
                          	<a href="javascript:history.go(-1)" class="btn btn-default">Cancel</a>
                          
                        </div>
                      </div>
                    </form>
				</div>
				<?php
            		break;
            	
            	default:
            	?>
				<div class="x_title">
					<h2>Product</h2>
					<a class="btn btn-default add-new" href="<?php echo $current_url;?>/add">Add new</a> 
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
				<table class="table table-hover" id="myTable">
				  <thead>
				    <tr>
				      <th>#</th>
				      <th>First Name</th>
				      <th>Last Name</th>
				      <th>Username</th>
				      <th width="50">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
				  	$names = array(
				  		array(
				  			'first' =>'Danielius',
				  			'last' => 'Vickers',
				  		),
				  		array(
				  			'first' =>'Adriana',
				  			'last' => 'Norman',
				  		),
				  		array(
				  			'first' =>'Lilly-May',
				  			'last' => 'Yates',
				  		),
				  		array(
				  			'first' =>'Summer-Rose',
				  			'last' => 'Thatcher',
				  		),
				  		array(
				  			'first' =>'Rabia',
				  			'last' => 'Davenport',
				  		),
				  		array(
				  			'first' =>'Leticia',
				  			'last' => 'Braun',
				  		),
				  		array(
				  			'first' =>'Trey',
				  			'last' => 'Reid',
				  		),
				  		array(
				  			'first' =>'Weronika',
				  			'last' => 'East',
				  		),
				  		array(
				  			'first' =>'Reece',
				  			'last' => 'Cochran',
				  		),
				  		array(
				  			'first' =>'Rio',
				  			'last' => 'Mcmillan',
				  		),
				  		array(
				  			'first' =>'Alayna',
				  			'last' => 'Garner',
				  		),
				  		array(
				  			'first' =>'Harriet',
				  			'last' => 'Cross',
				  		),
				  		array(
				  			'first' =>'Danielius',
				  			'last' => 'Vickers',
				  		),
				  		array(
				  			'first' =>'Farhan',
				  			'last' => 'Sims',
				  		),
				  		array(
				  			'first' =>'Frank',
				  			'last' => 'Potter',
				  		),
				  		array(
				  			'first' =>'Annakin',
				  			'last' => 'Skywalker',
				  		),
				  		array(
				  			'first' =>'Aaminah',
				  			'last' => 'Woods',
				  		),
				  		array(
				  			'first' =>'Ava-Mae',
				  			'last' => 'Hodge',
				  		),
				  		array(
				  			'first' =>'Amie',
				  			'last' => 'Goff',
				  		),
				  		array(
				  			'first' =>'Sammy',
				  			'last' => 'Kaiser',
				  		),
				  	);
				  	for ($i=0; $i<count($names) ; $i++) { 
				  		?>
				  		<tr>
				          <th scope="row"><?php echo $i+1;?></th>
				          <td><?php echo $names[$i]['first'];?></td>
				          <td><?php echo $names[$i]['last'];?></td>
				          <td>@<?php echo $names[$i]['first'];?></td>
				          <td>
				          	<a class="btn btn-primary btn-xs"><i class="fas fa-pencil-alt"></i></a>
				          	<a class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i></a>
				          	
				          </td>
				        </tr>
				        <?php
				  	}
				  	?>
				    
				  </tbody>
				</table>

				  
				</div>
				<?php
				break;
			}
			?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content -->

    

    