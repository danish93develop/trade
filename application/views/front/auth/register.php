<?php
if ($this->session->userdata('trade_session')) {
  redirect("/", "");
}
?>
<section class="reason Access-Detailed">
  <h3>Aegis Registration</h3>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <?php if ($this->session->flashdata('message')) { ?>
          <div class="alets-pop">
            <div class="alert alert-<?= $this->session->flashdata('type'); ?>">
              <strong><?= ucfirst($this->session->flashdata('type')); ?>!</strong> <?= $this->session->flashdata('message'); ?>
            </div>
          </div>
        <?php } ?>

        <?php if (validation_errors()) { ?>
          <div class="alets-pop">
            <div class="alert alert-danger">
              <strong>Error!</strong> <?php echo validation_errors(); ?>
            </div>
          </div>
        <?php } ?>
        <form action="<?= base_url(); ?>home/buySubscription" method="post" class="member_register_form" id="registerform">
          <div class="form-group">
            <!-- <label class="w-100" for="OldPassword">Old Password</label> -->
            <input type="text" name="fname" class="form-control txtstyle" placeholder="First Name" required>
          </div>
          <div class="form-group">
            <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control txtstyle" placeholder="Email" id="userEmail" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control txtstyle datepicker hasDatepicker" id="dobDate" name="dob" placeholder="DOB" required>
          </div>
          <div class="form-group">
            <input type="password" name="password" require class="form-control txtstyle" id="password" placeholder="Password">
          </div>
          <div class="form-group">
            <input type="password" name="cpassword" require class="form-control txtstyle cnfrmpassword" placeholder="Confirm Password">
          </div>
          <input type="hidden" name="type" value="user" class="form-control">
          <input type="hidden" name="subs_id" value="<?php if ($subsdata) {
                                                        echo $subsdata->plan_id;
                                                      } else {
                                                        echo '';
                                                      } ?>" class="form-control">
          <input type="hidden" name="planid" value="<?php if ($subsdata) {
                                                      echo $subsdata->id;
                                                    } else {
                                                      echo '';
                                                    } ?>" class="form-control">
          <input type="hidden" name="price" value="<?php if ($subsdata) {
                                                      echo $subsdata->price . '.00';
                                                    } else {
                                                      echo '';
                                                    } ?>" class="form-control price_add">

          <div class="form-group  text-center">
            <button type="button" onclick="paynow()" class="btn btn-primary btnstyle paybtn">Register</button>
            <div class="RegisterNow text-center border-top mt-4 pt-4">
              <h4 class="font-weight-bold mb-4">Already a member?</h4>
              <a class="ml-auto btn btn-warning" href="<?=base_url();?>">Log In</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- <section class="Hero registersection">
  <video autoplay muted loop id="myVideo">
    <source src="<?= base_url(); ?>assets/front/images/stocksloop.mp4" type="video/mp4">
  </video>
  <div class="container">
    <div class="herodiv">

      <div class="row">
        <div class="col-md-8 padding">
          <div class="herotext">

            <h2>Guaranteed 25%-55% Profit</h2>
            <h2>on US Stocks, Every Year.</h2>
            <a class="btn  StartNowLinkLink" href="#">START NOW</a>
          </div>
        </div>
        <?php if ($this->session->userdata('trade_session')) {
          redirect("/", "");
        }
        ?>
        <div class="col-md-4 padding">
          <div class="formstyle">
            <form action="<?= base_url(); ?>home/buySubscription" method="post" class="member_register_form" id="registerform">
              <h4><strong>Register</strong></h4>
              <?php if ($this->session->flashdata('message')) { ?>
                <div class="alets-pop">
                  <div class="alert alert-<?= $this->session->flashdata('type'); ?>">
                    <strong><?= ucfirst($this->session->flashdata('type')); ?>!</strong> <?= $this->session->flashdata('message'); ?>
                  </div>
                </div>
              <?php } ?>

              <?php if (validation_errors()) { ?>
                <div class="alets-pop">
                  <div class="alert alert-danger">
                    <strong>Error!</strong> <?php echo validation_errors(); ?>
                  </div>
                </div>
              <?php } ?>
              <div class="form-group">
                <input type="text" name="fname" class="form-control txtstyle" placeholder="First Name" required>
              </div>
               <div class="form-group">
                <input type="text" name="lname" class="form-control txtstyle" placeholder="Last Name" required>
              </div>
               <div class="form-group">
                <input type="email" name="email" class="form-control txtstyle" placeholder="Email" id="userEmail" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control txtstyle datepicker hasDatepicker" id="dobDate" name="dob"  placeholder="DOB" required>
              </div>
              <div class="form-group">
                <input type="password" name="password" require class="form-control txtstyle" id="password" placeholder="Password">
              </div>
              <div class="form-group">
                <input type="password" name="cpassword" require class="form-control txtstyle cnfrmpassword" placeholder="Confirm Password">
              </div>
              <input type="hidden" name="type" value="user" class="form-control">
              <input type="hidden" name="subs_id" value="<?php if ($subsdata) {
                                                            echo $subsdata->plan_id;
                                                          } else {
                                                            echo '';
                                                          } ?>" class="form-control">
              <input type="hidden" name="planid" value="<?php if ($subsdata) {
                                                          echo $subsdata->id;
                                                        } else {
                                                          echo '';
                                                        } ?>" class="form-control">
              <input type="hidden" name="price" value="<?php if ($subsdata) {
                                                          echo $subsdata->price . '.00';
                                                        } else {
                                                          echo '';
                                                        } ?>" class="form-control price_add">

              <button type="button" onclick="paynow()" class="btn btn-default btnstyle paybtn">Register</button>              
              <div class="RegisterNow">
                <p>Already a member?</p>
                <a class="RegisterNowLink" href="#plans">Log In</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
<div class="clearfix"></div> -->

<script src="<?php echo base_url(); ?>/assets/theme/plugins/jquery/jquery.min.js"></script>
<script src="https://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
<script src="https://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
<script src="https://checkout.stripe.com/checkout.js"></script>
<script>
  jQuery(document).ready(function() {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#dobDate').datepicker({
      dateFormat: 'dd/mm/yy',
      todayHighlight: true,
      //startDate: today,
      //endDate: end,
      //autoclose: true
    });
  });
  jQuery('#registerform').validate({
    rules: {
      password: {
        minlength: 6
      },
      cpassword: {
        minlength: 6,
        equalTo: "#password"
      }
    }
  });

  function paynow() {
    var form = $(".member_register_form");
    var str = form.valid();
    if (str.toString().indexOf("false") >= 0) {} else {
      var uemail = $("#userEmail").val();
      var publish = 'pk_test_PwEoCXTLsySVauIX0df7gCkA00Vpa93dtk';
      var token = function(res) {
        var $input = $('<input type=hidden name=stripeToken />').val(res.id);
        $('#registerform').append($input);
        form.submit();
      };
      var dealValue;
      var dealValue = 100 * $(".price_add").val();
      StripeCheckout.open({
        key: publish,
        amount: dealValue,
        currency: 'USD',
        name: 'Testing Stripe',
        billingAddress: false,
        panelLabel: 'Pay',
        token: token,
        email: uemail
      });
      return false;
    }
  }
</script>