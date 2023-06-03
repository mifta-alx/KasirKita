<style>
</style>
<div class="row row-xs">
  <?php if(session()->get('role_id') == 1) { ?>
  <div class="col-sm-6 col-lg-3">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Jumlah User</h6>
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?= $hitunguser; ?></h3>
          </div>
          <div class="col-3">
            <i class="las la-user icon d-flex justify-content-end align-items-center" style="font-size: 50px; color: #9db2c6;"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Jumlah User Active</h6>
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?= $hitunguseractive; ?></h3>
          </div>
          <div class="col-3">
            <i class="las la-user-check icon d-flex justify-content-end align-items-center" style="font-size: 50px; color: #9db2c6;"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Jumlah SuperUser</h6>
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?= $hitungsuperuser; ?></h3>
          </div>
          <div class="col-3">
            <i class="las la-hashtag icon d-flex justify-content-end align-items-center" style="font-size: 50px; color: #9db2c6;"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Jumlah Role</h6>
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?= $hitungrole; ?></h3>
          </div>
          <div class="col-3">
            <i class="las la-user-tag icon d-flex justify-content-end align-items-center" style="font-size: 50px; color: #9db2c6;"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-lg-12 mt-2">
    <div class="card">
      <div class="card-body">
        <select class="form-control mb-3" id="tahun">
          <?php foreach ($tahun as $row) : ?>
            <?php if ($row['tahun'] !== '') : ?>
              <option value="<?= $row['tahun'] ?>"><?= $row['tahun'] ?></option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
        <div class="row">
          <div class="col-sm-12 col-lg-6">
            <canvas id="roleChart"></canvas>
          </div>
          <div class="col-sm-12 col-lg-6">
            <canvas id="tahunChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } elseif (session()->get('role_id') == 2) { ?>
    <div class="col-sm-6 col-lg-3">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Jumlah Kasir</h6>
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?= $kasir; ?></h3>
          </div>
          <div class="col-3">
            <i class="las la-cash-register icon d-flex justify-content-end align-items-center" style="font-size: 50px; color: #9db2c6;"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="col-sm-6 col-lg-3">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Jumlah Staff</h6>
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?= $staff; ?></h3>
          </div>
          <div class="col-3">
            <i class="las la-user-cog icon d-flex justify-content-end align-items-center" style="font-size: 50px; color: #9db2c6;"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="col-sm-6 col-lg-3">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Jumlah Produk</h6>
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?= $produk; ?></h3>
          </div>
          <div class="col-3">
            <i class="las la-box icon d-flex justify-content-end align-items-center" style="font-size: 50px; color: #9db2c6;"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="col-sm-6 col-lg-3">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Jumlah Kategori Produk</h6>
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?= $kategoriproduk; ?></h3>
          </div>
          <div class="col-3">
            <i class="las la-tags icon d-flex justify-content-end align-items-center" style="font-size: 50px; color: #9db2c6;"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
    <?php } ?>
</div><!-- container -->
</div><!-- content -->
<!-- 
<div style="margin-bottom: 12px; position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(72, 94, 144, 0.16);
    border-radius: 0.25rem; align-items: center !important; justify-content: center !important; font-family: Poppins, sans-serif;">
    <p style="font-size: 24px;  
    font-weight: 700;
    margin-top: 24px;
    font-size: 22px;
    letter-spacing: -1px;
    color: inherit;
    display: flex;
    align-items: center;
    position: relative;
    color: #031a61;">Kasir <span style="display: inline-block;
    font-weight: 400;
    color: #0168fa;">Kita</span></p>
<h4 style="font-weight: 500;
    line-height: 1.25;
    color: #001737; margin-top: 12px; margin-bottom: 24px;font-family: Poppins, sans-serif;">Kasir Kita Sign-Up Verification Code</h4>
<p style="margin-bottom: 0px; margin-top: 8px; font-family: Poppins, sans-serif;">Thanks For Signing Up</p>
<p style="margin-bottom: 24px; font-family: Poppins, sans-serif;">Please confirm your email address to get access to KasirKita</p>
<h1 style="margin-bottom: 8px; font-family: Poppins, sans-serif;">123345</h1>
<p style="margin-bottom: 16px; margin-top: 8px; font-family: Poppins, sans-serif;">Enter this code or click the button below.</p>

<a href="" style="margin-bottom: 24px; color: #fff;
font-family: Poppins, sans-serif;
    background-color: #0168fa;
    border-color: #0168fa; display: inline-block;
    font-weight: 400;
    text-align: center;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.46875rem 0.9375rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">Agree And Confirm Your Email</a>
</div>

<small style="text-align: center; font-family: Poppins, sans-serif;color: #8392a5; justify-content: center !important; display:flex;">You're receiving this email because you (or someone using this email) created an account on KasirKita using this address.</small>
<p style="font-size: 10px;color: #8392a5; justify-content: center !important; font-family: Poppins, sans-serif; display:flex;">&copy; 2021 KasirKita v1.0.0</p>

<div class="card d-flex justify-content-center align-items-center">
<h4 class="my-4">Kasir Kita Sign-Up Verification Code</h4>
<p class="mt-2 mb-0 pb-0">Thanks For Signing Up</p>
<p class="mb-4">Please confirm your email address to get access to KasirKita</p>
<h1>123345</h1>
<p class="mt-2">Enter this code or click the button below.</p>

<div class="row d-flex justify-content-center align-items-center mb-3">
            <div class="col-sm-6 ">
              <div class="card card-body shadow-none bd-primary">
                <div class="marker marker-ribbon marker-primary pos-absolute t-10 l-0"><i data-feather="shield"></i> Your privacy is important</div>
                <small class="mg-b-0 mg-t-30">We may send you member updates, recruiter messages, job suggestions, invitations, reminders and promotional messages from us and our partners.</small>
              </div>
            </div>
            </div>

<a href="" class="btn btn-primary mb-4">Agree And Confirm Your Email</a>
</div>
<div class="row d-flex justify-content-center align-items-center">
<div class="col-6">
<small class="d-flex justify-content-center tx-color-03" style="text-align: center;">You're receiving this email because you (or someone using this email) created an account on KasirKita using this address.</small>
<p class="d-flex justify-content-center mt-2 tx-color-03" style="font-size: 10px;">&copy; 2021 KasirKita v1.0.0</p>
</div>
</div> -->